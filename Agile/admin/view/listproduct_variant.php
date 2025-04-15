<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once 'layout/topbar.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Danh sách biến thể của sản phẩm: <?= $product['name'] ?></h1>
            </div>

            <!-- Content Row -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bảng biến thể sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Biến thể màu</th>
                                    <th>Số lượng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($variants as $variant) { ?>
                                    <tr>
                                        <td><img src="../assets/img/<?= $variant['img_product'] ?>" alt="" width="150px"
                                                height="100px"></td>
                                        <td><?= $variant['name_color'] ?></td>
                                        <td><?= $variant['quantity'] ?></td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="?act=updateProduct_variant&id_pro=<?= $variant['id_product'] ?>&id_var=<?= $variant['id_variant'] ?>"
                                                role="button">Sửa</a>
                                            <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"
                                                href="?act=deleteProduct_variant&id_pro=<?= $variant['id_product'] ?>&id_var=<?= $variant['id_variant'] ?>"
                                                role="button">Xóa</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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