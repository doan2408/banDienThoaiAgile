<?php
class detailController
{
    public $detailModel;
    function __construct()
    {
        $this->detailModel = new detailModel();
    }
    function detail($id)
    {
        $this->detailModel->updateView($id);
        $productOne = $this->detailModel->findProductById($id);
        $comments = $this->detailModel->allComment($id);
        $product_variant = $this->detailModel->product_variant($id);

        $ratingData = $this->detailModel->getAverageRating($productOne['id_product']);
        $avgRating = isset($ratingData['avg_rating']) ? (float) $ratingData['avg_rating'] : 0;
        $totalRatings = isset($ratingData['total_ratings']) ? (int) $ratingData['total_ratings'] : 0;

        $relatedProducts = $this->detailModel->relatedProduct($productOne['id_category'], $id);
        require_once 'view/shop-single.php';
    }
    function addComment()
    {
        if (isset($_POST['detail']) && isset($_POST['id_pro'])) {
            if (!isset($_SESSION['user'])) {
                $_SESSION['Message'] = "Bạn cần đăng nhập để có thể bình luận";
                exit();
            }
            $content = $_POST['detail'];
            $id_user = $_SESSION['user']['id_user'];
            $id_pro = $_POST['id_pro'];

            // 1. Check if the user has purchased the product
            if (!$this->detailModel->hasPurchasedProduct($id_user, $id_pro)) {
                $_SESSION['Message'] = "Bạn cần mua sản phẩm này để có thể bình luận.";
                exit();
            }

            // 2. Check if the user has already commented twice
            if ($this->detailModel->commentLimitReached($id_user, $id_pro)) {
                $_SESSION['Message'] = "Bạn chỉ có thể bình luận 2 lần cho sản phẩm này.";
                exit();
            }
            $_SESSION['Message'] = "Cảm ơn bạn đã bình luận!";
            $this->detailModel->addComment($id_pro, $id_user, $content);
            exit();
        }
    }
    function addRating()
    {
        if (isset($_POST['rating']) && isset($_POST['id_pro'])) {
            if (!isset($_SESSION['user'])) {
                $_SESSION['Message'] = "Bạn cần đăng nhập để đánh giá";
                exit();
            }
            $point = (int) $_POST['rating'];
            $id_user = $_SESSION['user']['id_user'];
            $id_pro = $_POST['id_pro'];
            if (!$this->detailModel->hasPurchasedProduct($id_user, $id_pro)) {
                $_SESSION['Message'] = "Bạn cần mua sản phẩm này để có thể đánh giá.";
                exit();
            }
            $_SESSION['Message'] = "Cảm ơn bạn đã đánh giá!";
            $this->detailModel->addRating($id_pro, $id_user, $point);
            exit();
        }
    }
}