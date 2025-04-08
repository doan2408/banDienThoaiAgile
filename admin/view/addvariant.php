<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once 'layout/topbar.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div> -->

            <!-- Content Row -->
            <div class="row">
            <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">THÊM BIẾN THỂ</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <form action="" method="POST">
        <div class="input">
            Mã Biến Thể <br>
            <input type="text" name="maloai" disabled id="maloai">
        </div>
        <div class="input">
            Tên Biến Thể <br>
            <input type="text" name="tenloai" id="tenloai">
                <p style="color: red ;" id="loitl"></p>
        </div>
        <div style="margin-top: 20px;" class="input">
            <input class="btn btn-primary" type="submit" name="themmoi" value="THÊM MỚI" onclick="return validate()">
            <a href="index.php?act=listvariant"><input class="btn btn-success" type="button" value="DANH SÁCH"></a>
        </div>
        <?php
            if(isset($thongbao)&&($thongbao != "")) echo $thongbao;

        ?>
    </form>

        </div>
    </div>
    <script>
    function validate() {
        var tenloai = document.getElementById("tenloai").value;

        var isValid = true;

        // Kiểm tra tên loại
        if (tenloai == "") {
            document.getElementById("loitl").innerHTML = "Không được để trống tên biến thể";
            isValid = false;
        } else {
            document.getElementById("loitl").innerHTML = "";
        }

        // Kiểm tra số lượng

        return isValid;
    }
</script>


</div>

                 
            </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>