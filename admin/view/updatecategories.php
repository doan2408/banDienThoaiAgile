<?php 
require_once 'layout/header.php'; 
require_once 'layout/navbar.php'; 

    if (is_array($stmt)) {
        extract($stmt);
    }    
?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
    <!-- Topbar -->
    <?php require_once 'layout/topbar.php'?>

        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Cập Nhật Biến Thể</h1>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="input">
                            Mã Biến Thể <br>
                            <input type="text" name="maloai" disabled id="maloai" value="<?= htmlspecialchars($id_category) ?>">
                        </div>
                        <div class="input">
                            Tên Biến Thể <br>
                            <input type="text" id="tenloai" name="tenloai" value="<?= htmlspecialchars($name_cat) ?>">
                            <br>
                            <p style="color: red;" id="loitl"></p>
                        </div>
                        <div style="margin-top: 20px;" class="input">
                            <input class="btn btn-primary" type="submit" name="update" value="Cập Nhật" onclick="return validate()">
                            <a href="index.php?act=listcategories"><input class="btn btn-success" type="button" value="DANH SÁCH"></a>
                        </div>
                    </form>
                    <?php if (isset($thongbao)) echo "<p>$thongbao</p>"; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validate() {
        var tenloai = document.getElementById("tenloai").value;
        if (tenloai == "") {
            document.getElementById("loitl").innerHTML = "Không được để trống ";
            return false;
        } else {
            document.getElementById("loitl").innerHTML = "";
        }
    }
</script>

<?php 
require_once 'layout/scripts.php'; 
require_once 'layout/footer.php';
?>