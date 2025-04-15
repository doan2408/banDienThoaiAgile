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
                <h1 class="h3 mb-0 text-gray-800">Sửa sản phẩm</h1>
            </div>

            <!-- Content Row -->
            <div class="row-cols-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Màu sắc</label>
                        <select class="form-select form-select-lg" name="new_id_variant">
                            <?php
                            foreach ($variant as $key => $value) {
                                ?>
                                <option value="<?= $value['id_variant'] ?>" <?php if ($value['id_variant'] === $oneProduct_variant['id_variant'])
                                      echo 'selected'; ?>>
                                    <?= $value['name_color'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" name="quantity" value="<?= $oneProduct_variant['quantity'] ?>" />
                    </div>
                    

                    <button class="btn btn-primary" type="submit" name="btn_update">Sửa biến thể sản phẩm</button>
                </form>

            </div>


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>