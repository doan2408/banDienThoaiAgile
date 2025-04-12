<?php
class detailModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connDBAss();
    }
    function product_variant($id)
    {
        $sql = "SELECT * FROM product_variant JOIN variant ON product_variant.id_variant=variant.id_variant WHERE id_product=$id";
        return $this->conn->query($sql)->fetchAll();
    }
    function findProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id_product=$id";
        return $this->conn->query($sql)->fetch();
    }
    function updateView($id)
    {
        $sql = "UPDATE products SET view = view + 1 WHERE id_product=$id";
        return $this->conn->query($sql);
    }
    function allComment($id)
    {
        $sql = "SELECT * FROM comments JOIN customers ON comments.id_user=customers.id_user WHERE id_product=$id";
        return $this->conn->query($sql)->fetchAll();
    }
    function addComment($id_pro, $id_user, $content)
    {
        $sql = "INSERT INTO comments values (null,$id_pro,$id_user,'$content',0,CURRENT_TIMESTAMP)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
    function hasPurchasedProduct($id_user, $id_pro)
    {
        $sql = "SELECT b.id_customer
            FROM bills b
            JOIN customers c ON b.id_customer = c.id_customer
            WHERE c.id_user = ? AND b.status = 5 AND b.id_bill IN (
                SELECT id_bill FROM detail_bills WHERE id_product = ?
            )";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_user, $id_pro]);
        $result = $stmt->fetchColumn();
        return $result > 0;  // Return true if the user has purchased the product
    }
    function commentLimitReached($id_user, $id_pro)
    {
        $sql = "SELECT COUNT(*) FROM comments WHERE id_user = ? AND id_product = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_user, $id_pro]);
        $commentCount = $stmt->fetchColumn();
        return $commentCount >= 2;  // Return true if the user has already commented 2 times
    }
    function relatedProduct($id_category, $id_product)
    {
        $sql = "SELECT * FROM products WHERE id_category = :id_category AND id_product != :id_product LIMIT 4";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id_category' => $id_category, 'id_product' => $id_product]);
        return $stmt->fetchAll();
    }
    function addRating($id_product, $id_user, $point)
    {
        $sql = "INSERT INTO rates (id_product, id_user, point, updated_at) VALUES ($id_product, $id_user, $point, CURRENT_TIMESTAMP)
                ON DUPLICATE KEY UPDATE point = $point";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
    function getAverageRating($id_product)
    {
        $sql = "SELECT AVG(point) as avg_rating, COUNT(point) as total_ratings FROM rates WHERE id_product = $id_product";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}