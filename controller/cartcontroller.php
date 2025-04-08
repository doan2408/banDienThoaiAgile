<?php
// session_start();
// if(isset($_SESSION['cart'])) $_SESSION['cart']=[];
class cartController {
    public function addToCart() {
        

        // Lấy dữ liệu sản phẩm từ POST
        $productId = $_POST['productId'] ?? 0;
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? 0;
        $color = $_POST['color'] ?? 'Default Color';
        $quantity = $_POST['product-quanity'] ?? 1;
        $img = $_POST['img'] ?? '';
        $brand = $_POST['brand'] ?? '';

        // Kiểm tra nếu thiếu dữ liệu
        if (empty($productId) || empty($name) || $price <= 0) {
            header('Location: index.php?act=cart&error=invalid_data');
            exit();
        }

        // Kiểm tra nếu session giỏ hàng chưa tồn tại
        if (!isset($_SESSION['mycart'])) {
            $_SESSION['mycart'] = [];
        }

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $found = false;
        foreach ($_SESSION['mycart'] as &$item) {
            if ($item['id'] == $productId && $item['color'] == $color) {
                $item['quantity'] += $quantity; // Cập nhật số lượng
                $found = true;
                break;
            }
        }

        // Nếu sản phẩm chưa có, thêm sản phẩm mới
        if (!$found) {
            $_SESSION['mycart'][] = [
                'id' => $productId,
                'name' => $name,
                'price' => $price,
                'color' => $color,
                'quantity' => $quantity,
                'img' => $img,
                'brand' => $brand,
            ];
        }

        // Chuyển hướng đến trang cart
        header('Location: index.php?act=cart');
        exit();
    }

    public function cart() {
        require_once 'view/cart.php';  // Tải view giỏ hàng
    }

    // public function deleteToCart() {
    //     if(isset($_GET['id'])){
    //         array_splice( $_SESSION['mycart'],$_GET['id'],1);
    //     }else{
    //         $_SESSION['mycart']=[];
    //     }
    //     header('Location: index.php?act=cart');
    //     exit();
    // }
    public function deleteToCart() {
    

    // Kiểm tra nếu có id sản phẩm trong GET
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        // Duyệt qua giỏ hàng để tìm sản phẩm cần xóa
        foreach ($_SESSION['mycart'] as $index => $item) {
            if ($item['id'] == $productId) {
                // Xóa sản phẩm tại vị trí $index
                unset($_SESSION['mycart'][$index]);
                break;
            }
        }

        // Sắp xếp lại chỉ số của mảng
        $_SESSION['mycart'] = array_values($_SESSION['mycart']);
    }

    // Chuyển hướng lại trang giỏ hàng
    // header('Location: index.php?act=cart');
    
    //Tải lại trang
    header('Location: '. $_SERVER['HTTP_REFERER']);
     
    exit();
}
}


?>

