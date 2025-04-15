<?php
class variantModel {
    public $conn;

    function __construct() {
        $this->conn = connDBAss(); // Giả sử hàm này trả về kết nối PDO
    }
    function insert_variant($tenloai) {
        $sql = "INSERT INTO variant(name_color) VALUES(:tenloai)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tenloai' => $tenloai]);
    }
    function check_variant_exists($tenloai) {
        $sql = "SELECT COUNT(*) as count FROM variant WHERE name_color = :tenloai";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tenloai' => $tenloai]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0; // Trả về true nếu biến thể đã tồn tại
    }
    function delete_variant($id_variant) {
        $sql = "DELETE FROM variant WHERE id_variant = :id_variant";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_variant' => $id_variant]);
    }

    function loadall_variant() {
        $sql = "SELECT * FROM variant ORDER BY id_variant DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function loadone_variant($id_variant) {
        $sql = "SELECT * FROM variant WHERE id_variant = :id_variant";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_variant' => $id_variant]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    function update_variant($id_variant, $tenloai, ) {
        $sql = "UPDATE variant SET name_color = :tenloai WHERE id_variant = :id_variant";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tenloai' => $tenloai,  ':id_variant' => $id_variant]);
    }

}

?>
