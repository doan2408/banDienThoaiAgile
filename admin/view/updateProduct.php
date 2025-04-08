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
                <input type="hidden" class="visually-hidden" name="amount" value="<?= $oneProduct['amount'] ?>" />
                    <div class="mb-3">
                        <label for="" class="form-label">Tên</label>
                        <input type="text" class="form-control" name="name" value="<?= $oneProduct['name'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hãng</label>
                        <input type="text" class="form-control" name="firms" value="<?= $oneProduct['firms'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giá</label>
                        <input type="number" class="form-control" name="price" value="<?= $oneProduct['price'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giảm giá</label>
                        <input type="number" class="form-control" name="discount"
                            value="<?= $oneProduct['discount'] ?>" />
                    </div>
                    <div class="mb-3">
                        <img src="../assets/img/<?= $oneProduct['img_product'] ?>" alt="" width="200px"
                            height="130px">
                        <label for="" class="form-label">Chọn ảnh</label>
                        <input type="file" class="" name="img" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="2"><?= $oneProduct['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Loại hàng</label>
                        <select class="form-select form-select-lg" name="category">
                            <?php
                            foreach ($category as $key => $value) {
                                ?>
                                <option value="<?= $value['id_category'] ?>" <?php if ($value['id_category'] === $oneProduct['id_category'])
                                      echo 'selected'; ?>>
                                    <?= $value['name_cat'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit" name="btn_update">Sửa sản phẩm</button>
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