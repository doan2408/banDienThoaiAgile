<?php
class categoriesModel {
    public $conn;

    function __construct() {
        $this->conn = connDBAss(); // Giả sử hàm này trả về kết nối PDO
    }
    function insert_categories($tenloai) {
        $sql = "INSERT INTO categories(name_cat) VALUES(:tenloai)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tenloai' => $tenloai]);
    }
    function check_categories_exists($tenloai) {
        $sql = "SELECT COUNT(*) as count FROM categories WHERE name_cat = :tenloai";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tenloai' => $tenloai]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0; // Trả về true nếu biến thể đã tồn tại
    }
    function delete_categories($id_category) {
        $sql = "DELETE FROM categories WHERE id_category = :id_category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_category' => $id_category]);
    }

    function loadall_categories() {
        $sql = "SELECT * FROM categories ORDER BY id_category DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function loadone_categories($id_category) {
        $sql = "SELECT * FROM categories WHERE id_category = :id_category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_category' => $id_category]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    function update_categories($id_category, $tenloai, ) {
        $sql = "UPDATE categories SET name_cat = :tenloai WHERE id_category = :id_category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tenloai' => $tenloai,  ':id_category' => $id_category]);
    }

}

?>