<?php
class trang_chu{
    public $mainModel;
    function __construct()
    {
        $this->mainModel = new mainModel();
    }
    function trang_chu() {
        $topPro = $this->mainModel->topProduct();
        require_once 'view/trangchu.php';
    }
}