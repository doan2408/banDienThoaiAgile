<?php
class LogoutController
{
    function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php');
        exit;
    }
}