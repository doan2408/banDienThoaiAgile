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
                <h1 class="h3 mb-0 text-gray-800">Danh sách sản phẩm</h1>
            </div>

            <!-- Content Row -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bảng sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <form method="GET" class="mb-4">
                                    <input type="hidden" name="act" value="listProduct">
                                    <div class="form-group d-flex align-items-center">
                                        <label for="category" class="me-2">Lọc theo danh mục:</label>
                                        <select id="category" name="category" class="form-select w-auto me-3">
                                            <option value="">Tất cả</option>
                                            <?php
                                            foreach ($category as $cat) {
                                                ?>
                                                <option value="<?= $cat['id_category'] ?>" <?= isset($_GET['category']) && $_GET['category'] == $cat['id_category'] ? 'selected' : '' ?>>
                                                    <?= $cat['name_cat'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã SP</th>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Hãng</th>
                                    <th>Giá</th>
                                    <th>Giảm giá</th>
                                    <th>Số lượng</th>
                                    <th>Mô tả</th>
                                    <th>Danh mục</th>
                                    <th>Lượt xem</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?= $value['id_product'] ?></td>
                                        <td><img src="../assets/img/<?= $value['img_product'] ?>"
                                                class="img-fluid rounded-top" alt="" width="180px" height="80px"
                                                class="rounded" />
                                        </td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['firms'] ?></td>
                                        <td><?= number_format($value['price']) ?>đ</td>
                                        <td><?= $value['discount'] ?>%</td>
                                        <td><?= $value['amount'] ?></td>
                                        <td style="max-width: 220px"><?= $value['description'] ?></td>
                                        <td><?= $value['name_cat'] ?></td>
                                        <td><?= $value['view'] ?></td>
                                        <td><?= ($value['censorship'] == 0) ? 'Đang hiện' : 'Đã ẩn' ?></td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="?act=listProduct_variant&id=<?= $value['id_product'] ?>"
                                                role="button">Biến thể</a>
                                            <a class="btn btn-primary"
                                                href="?act=updateProduct&id=<?= $value['id_product'] ?>"
                                                role="button">Sửa</a>
                                            <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ko?')"
                                                href="?act=deleteProduct&id=<?= $value['id_product'] ?>"
                                                role="button">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
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