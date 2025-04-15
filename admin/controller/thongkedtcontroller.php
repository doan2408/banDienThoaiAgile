<?php
class thongkedtController
{
    public $thongkedtModel;
    function __construct()
    {
        $this->thongkedtModel = new thongkedtModel();
    }
    function listThongkedt()
    {
        $thongkesk = $this->thongkedtModel->thongkedt();
        require_once 'view/listthongkedt.php';
    }
    function bieudodt(){
        $thongkesk = $this->thongkedtModel->thongkedt();
        require_once 'view/bieudodt.php';
    }
}

?>