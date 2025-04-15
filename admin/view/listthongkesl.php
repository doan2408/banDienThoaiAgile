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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- code ở đây -->
                 

<!-- Content Row -->
<div class="row">
    <!-- code ở đây -->
    <div class="container-fluid">
        <!-- Page Heading -->
<<<<<<< HEAD
        <h1 class="h3 mb-2 text-gray-800">THỐNG KÊ SỐ LƯỢNG SẢN PHẨM</h1>
=======
        <h1 class="h3 mb-2 text-gray-800">THỐNG KÊ SỐ LƯỢNG SẢN PHẨM.</h1>
>>>>>>> 9eaa1e6d76c48c9a8e4c26ea5e7f3a2e8678c56c

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>MÃ LOẠI</th>
                                <th>TÊN</th>
                                <th>SỐ LƯỢNG SẢN PHẨM CÒN TRONG KHO</th>
                                <th>SỐ LƯỢNG ĐÃ BÁN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($thongkesk as $key => $value) {
                            ?>
                            <tr>
                                <td><?= $value['id_category'] ?></td>
                                <td><?= $value['name_cat'] ?></td>
                                <td><?= $value['total_quantity'] ?></td>
                                <td><?= $value['sold_quantity'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="input_button">
                        <a href="index.php?act=bieudosl"><input class="btn btn-success" type="button" value="Xem Biểu Đồ"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



                 
            </div>
             
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>