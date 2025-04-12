<?php
require_once 'model/user.php';

class RegisterController
{
    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                $error = "Mật khẩu xác nhận không khớp";
            } else if (checkEmailExists($email)) {
                $error = "Email đã tồn tại trong hệ thống";
            } else {
                if (registerUser($fullname, $email, $password)) {
                    header('Location: index.php?act=login');
                    exit;
                } else {
                    $error = "Đăng ký thất bại";
                }
            }
        }
        require_once 'view/register.php';
    }
}