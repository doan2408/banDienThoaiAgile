<?php
class billController
{
    public $billModel;
    function __construct()
    {
        $this->billModel = new billModel();
    }
    function listBill()
    {
        $status = isset($_GET['status']) && $_GET['status'] !== '' ? $_GET['status'] : null;
        $bills = $this->billModel->bill($status);
        require_once "../commons/function.php";
        require_once "view/listBill.php";
    }
    function updateBill($id)
    {
        $bills = $this->billModel->bill();
        $oneBill = $this->billModel->findBillById($id);
        $status = $this->billModel->billStatus($id)['status'];
        $statusDescriptions = [
            0 => "Chờ xác nhận",
            1 => "Đã xác nhận",
            2 => "Chờ lấy hàng",
            3 => "Đang vận chuyển",
            4 => "Đang hoàn trả hàng",
            5 => "Giao hàng thành công",
        ];
        require_once "../commons/function.php";
        require_once "view/updateBill.php";
        if (isset($_POST['btn_update'])) {
            $newStatus = $_POST['status']; // Lấy trạng thái mới từ form           
            if ($newStatus == 5 && $status != 5) { // Trạng thái chuyển thành 'Giao hàng thành công'
                $this->billModel->reduceQuantity($id);
            }
            if ($this->billModel->updateBill($newStatus, $id)) {
                header("Location:?act=listBill");
            } else {
                echo "Sửa thất bại";
            }
        }
    }

}