<?php
class variantController
{
    public $variantModel;
    function __construct() {
        $this->variantModel = new variantModel(); // Khởi tạo model
    }
    function listvariant()
    {
    // Sửa lại thành loadall_variant
    $variants = $this->variantModel->loadall_variant(); 
    require_once "view/listvariant.php";
    }
    function insert() {
        require_once "view/addvariant.php";
    
        if (isset($_POST['themmoi']) && $_POST['themmoi']) {
            $tenloai = $_POST['tenloai'];
            if ($this->variantModel->check_variant_exists($tenloai)) {
                echo "<p style='color:red;'>Biến thể đã tồn tại!</p>";
            } else {
                if ($this->variantModel->insert_variant($tenloai)) {
                    echo "<p style='color:green;'>Thêm biến thể thành công!</p>";
                }
            }
        }
    }
    function update($id_variant) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Kiểm tra nếu form được submit
            $tenloai = $_POST['tenloai'];
           
            
            // Gọi model để cập nhật
            $this->variantModel->update_variant($id_variant, $tenloai,);
            
            // Redirect sau khi cập nhật
            header("Location: index.php?act=listvariant");
            exit;
        }
        // Lấy dữ liệu biến thể hiện tại
        $stmt = $this->variantModel->loadone_variant($id_variant);
        // Hiển thị trang cập nhật
        require_once "view/updatevariant.php";
    }
    function delete($id_variant) {
        if ($id_variant) {
            // Gọi model để xóa biến thể
            $this->variantModel->delete_variant($id_variant);   
            // Chuyển hướng về danh sách biến thể sau khi xóa
            header("Location: index.php?act=listvariant");
            exit();
        } else {
            // Nếu không có id_variant, thông báo lỗi
            echo "Không tìm thấy biến thể cần xóa.";
        }
    }
}
?>