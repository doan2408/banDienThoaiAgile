<?php
ob_start();
session_start();
require_once __DIR__ . '/../commons/function.php';
require_once __DIR__ . '/controller/usercontroller.php';
require_once __DIR__ . '/controller/thongkecontroller.php';
require_once __DIR__ . '/controller/thongkedtcontroller.php';
require_once __DIR__ . '/controller/categoriesController.php';
require_once __DIR__ . '/model/categoriesmodel.php';
require_once __DIR__ . '/model/thongkemodel.php';
require_once __DIR__ . '/model/thongkedtmodel.php';
require_once __DIR__ . '/controller/variantcontroller.php';
require_once __DIR__ . '/model/variantmodel.php';
require_once __DIR__ . '/controller/trangchu.php';
require_once __DIR__ . '/controller/productcontroller.php';
require_once __DIR__ . '/controller/billcontroller.php';
require_once __DIR__ . '/model/productmodel.php';
require_once __DIR__ . '/model/billmodel.php';
require_once __DIR__ . '/controller/commentcontroller.php';
require_once __DIR__ . '/model/commentmodel.php';

// index.php

// Bao gồm tệp chứa lớp CommentController


// Tạo đối tượng CommentController

// Các hành động tiếp theo...

$act = $_GET['act'] ?? '/';
$id_category = $_GET['id_category'] ?? null;
$id_variant = $_GET['id_variant'] ?? null;
$id_user = $_GET['id_user'] ?? null;
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'listProduct' => (new productController())->listProduct(),
    'insertProduct' => (new productController())->insert(),
    'updateProduct' => (new productController())->update($_GET['id']),
    'deleteProduct' => (new productController())->delete($_GET['id']),
    'listProduct_variant' => (new productController())->listProduct_variant($_GET['id']),
    'updateProduct_variant' => (new productController())->updateProduct_variant($_GET['id_pro'], $_GET['id_var']),
    'deleteProduct_variant' => (new productController())->deleteProduct_variant($_GET['id_pro'], $_GET['id_var']),
    'listBill' => (new billController())->listBill(),
    'updateBill' => (new billController())->updateBill($_GET['id']),
    'addvariant' => (new variantController())->insert(),
    'listvariant' => (new variantController())->listvariant(),
    'updatevariant' => (new variantController())->update($id_variant),
    'deletevariant' => (new variantController())->delete($id_variant),
    'addcategories' => (new catagoriesController())->insert(),
    'listcategories' => (new catagoriesController())->listcategories(),
    'updatecategories' => (new catagoriesController())->update($id_category),
    'deletecategories' => (new catagoriesController())->delete($id_category),
    'listUser' => (new UserController())->listUsers(),
    'addUser' => (new UserController())->addUser(),
    'insertUser' => (new UserController())->insertUser(),
    'deleteUser' => (new UserController())->deleteUser($id_user),
    'listthongkesl' => (new thongkeslController())->listThongkesl(),
    'bieudosl' => (new thongkeslController())->bieudosl(),
    'bieudodt' => (new thongkedtController())->bieudodt(),
    'listthongkedt' => (new thongkedtController())->listThongkedt(),
    'listComments' => (new CommentController())->listComments(),
    'toggleCensorship' => (new CommentController())->toggleCensorship($_GET['id'], $_GET['status']),
    'deleteComment' => (new CommentController())->deleteComment($_GET['id']),
    default => throw new Exception("No matching action found for '$act'"),
};

ob_end_flush();
