<?php
require_once 'view/layout/header.php';
require_once 'view/layout/navbar.php';
?>

<div class="container-fluid">
<!-- Topbar -->
<?php require_once 'layout/topbar.php'?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">THÊM DANH MỤC</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <form action="" method="POST">
            <div class="input">
                Mã loại <br>
                <input type="text" name="maloai" disabled id="maloai">
            </div>
            <div class="input">
                Tên loại <br>
                <input type="text" name="tenloai" id="tenloai">
                    <br>
                    <p style="color: red ;" id="loitl"></p>
                    <br>
            </div>
            <div style="margin-top: 20px;" class="input">
                <input class="btn btn-primary" type="submit" name="themmoi" value="THÊM MỚI" onclick="return validate()">
                <a href="index.php?act=listcategories"><input class="btn btn-success" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if(isset($thongbao)&&($thongbao != "")) echo $thongbao;

            ?>
        </form>
            </div>
        </div>
        <script>
            function validate(){
                var tenloai =  document.getElementById("tenloai").value;

                if (tenloai == "") {
                document.getElementById("loitl").innerHTML = "Không được để trống ";
                return false;
                } else document.getElementById("loitl").innerHTML = "";
            }
        </script>
    </div>
    <?php
    require_once 'view/layout/scripts.php';
    require_once 'view/layout/footer.php';
    ?>

 
