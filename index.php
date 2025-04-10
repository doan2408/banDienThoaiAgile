<?php
session_start();
if (isset($_SESSION['Message'])) {
    $successMessage = $_SESSION['Message'];
    unset($_SESSION['Message']);
    echo "<script>alert('$successMessage');</script>";
}
// Include các tệp cần thiết
// require_once 'commons/helpers.php';
// require_once 'controller/admincontroller.php';
require_once 'controller/cartcontroller.php';
require_once 'controller/profilecontroller.php';
require_once 'controller/maincontroller.php';
require_once 'controller/aboutcontroller.php';
require_once 'controller/shopcontroller.php';
require_once 'controller/contactcontroller.php';
require_once 'controller/shop-singleController.php';
require_once 'controller/orderController.php';
require_once 'controller/payController.php';
require_once 'model/shop-singleModel.php';
require_once 'model/shopModel.php';
require_once 'model/orderModel.php';
require_once 'model/payModel.php';
require_once 'model/mainModel.php';
require_once 'commons/function.php';
require_once 'controller/logincontroller.php';
require_once 'controller/logoutcontroller.php';
require_once 'controller/registercontroller.php';

if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

$act = $_GET['act'] ?? '/';
$action = $_GET['action'] ?? '';

// Xử lý các route chính của ứng dụng
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'about' => (new aboutController())->about(),
    'shop' => (new shopController())->allProduct(),
    'shop_cat' => (new shopController())->cat_pro($_GET['id']),
    'shop_single' => (new detailController())->detail($_GET['id']),
    'addRating'=>(new detailController())->addRating(),
    'contact' => (new contactController())->contact(),
    'cart' => (new cartController())->cart(),
    'login' => (new LoginController())->login(),
    'logout' => (new LogoutController())->logout(),
    'register' => (new RegisterController())->register(),
    'addComment' => (new detailController())->addComment(),
    'addToCart' => (new cartController())->addToCart(),
    'deleteToCart' => (new cartController())->deleteToCart(),
    'order' => (new orderController())->order($_SESSION['user']['customer_info']['id_customer']),
    'orderDetail'=> (new orderController())->orderDetail($_GET['id']),
    'cancelOrder' => (new orderController())->cancelOrder(),
    'pay' => (new payController())->pay(),
    'payment' => (new payController())->payment(),
    'profile' => (new profileController())->profile(),
    'updateProfile' => (new profileController())->updateProfile(),
};
