<?php
class thongkeslController
{
    public $thongkeslModel;
    function __construct()
    {
        $this->thongkeslModel = new thongkeslModel();
    }
    function listThongkesl()
{
    $thongkesk = $this->thongkeslModel->thongkesl();
    require_once 'view/listthongkesl.php';
}

    function bieudosl(){
        $thongkesk = $this->thongkeslModel->thongkesl();
        require_once 'view/bieudosl.php';
    }
}

?>