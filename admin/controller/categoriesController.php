<?php
class catagoriesController
{
    public $categoriesModel;
    function __construct() {
        $this->categoriesModel = new categoriesModel(); // Khởi tạo model
    }
    function listcategories()
    {
    // Sửa lại thành loadall_categories
    $categoriess= $this->categoriesModel->loadall_categories(); 
    require_once "view/listcategories.php";
    }
    function insert() {
        require_once "view/addcategories.php";
    
        if (isset($_POST['themmoi']) && $_POST['themmoi']) {
            $tenloai = $_POST['tenloai'];
            if ($this->categoriesModel->check_categories_exists($tenloai)) {
                echo "<p style='color:red;'>Biến thể đã tồn tại!</p>";
            } else {
                if ($this->categoriesModel->insert_categories($tenloai)) {
                    echo "<p style='color:green;'>Thêm biến thể thành công!</p>";
                }
            }
        }
    }
    function update($id_category) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Kiểm tra nếu form được submit
            $tenloai = $_POST['tenloai'];
           
            
            // Gọi model để cập nhật
            $this->categoriesModel->update_categories($id_category, $tenloai,);
            
            // Redirect sau khi cập nhật
            header("Location: index.php?act=listcategories");
            exit;
        }
        // Lấy dữ liệu biến thể hiện tại
        $stmt = $this->categoriesModel->loadone_categories($id_category);
        // Hiển thị trang cập nhật
        require_once "view/updatecategories.php";
    }
    function delete($id_category) {
        if ($id_category) {
            // Gọi model để xóa biến thể
            $this->categoriesModel->delete_categories($id_category);   
            // Chuyển hướng về danh sách biến thể sau khi xóa
            header("Location: index.php?act=listcategories");
            exit();
        } else {
            // Nếu không có id_variant, thông báo lỗi
            echo "Không tìm thấy biến thể cần xóa.";
        }
    }
}
?>