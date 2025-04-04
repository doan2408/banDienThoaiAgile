<?php
class orderController
{
    public $orderModel;
    function __construct()
    {
        $this->orderModel = new orderModel();
    }
    function order($id)
    {
        $orders = $this->orderModel->getOrdersByStatus($id); // Lấy tất cả đơn hàng
        $orderStatuses = [];
        // Lấy danh sách đơn hàng cho từng trạng thái
        for ($status = 0; $status <= 6; $status++) {
            $orderStatuses[$status] = $this->orderModel->getOrdersByStatus($id, $status);
        }
        $tabIds = [
            0 => "pending-payment",
            1 => "processing",
            2 => "awaiting-pickup",
            3 => "shipping",
            4 => "return-request",
            5 => "successful-delivery",
            6 => "cancelled"
        ];
        $tabLabels = [
            0 => "Chờ xác nhận",
            1 => "Đã xác nhận",
            2 => "Chờ lấy hàng",
            3 => "Đang vận chuyển",
            4 => "Yêu cầu trả hàng",
            5 => "Giao hàng thành công",
            6 => "Đã hủy"
        ];
        require_once "commons/function.php";
        require_once 'view/order.php';
    }
    function orderDetail($id_bill)
    {
        // Lấy thông tin chi tiết đơn hàng
        $orderDetails = $this->orderModel->getOrderDetails($id_bill);
    
        // Nếu không có dữ liệu, chuyển hướng hoặc hiển thị thông báo
        if (empty($orderDetails)) {
            echo "<script>alert('Đơn hàng không tồn tại.'); window.location.href='?act=order';</script>";
            exit;
        }
    
        // Render giao diện chi tiết đơn hàng
        require_once 'view/orderDetail.php';
    }
    function cancelOrder()
{
    if (isset($_POST['cancel'])) {
        $id_bill = $_POST['id_bill'];
        $currentStatus = $this->orderModel->getOrderStatus($id_bill);

        if (in_array($currentStatus, [0, 1])) { // Trạng thái cho phép hủy
            $updated = $this->orderModel->cancelOrder($id_bill);

            if ($updated) {
                $_SESSION['Message'] = 'Hủy đơn hàng thành công.';
            } else {
                $_SESSION['Message'] = 'Hủy đơn hàng thất bại.';
            }
        } else {
            $_SESSION['Message'] = 'Không thể hủy đơn hàng vì trạng thái đã thay đổi.';
        }

        header('Location: ?act=order');
        exit;
    }
}
}