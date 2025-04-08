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
                <h1 class="h3 mb-0 text-gray-800">Danh sách đơn hàng</h1>
            </div>

            <!-- Content Row -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bảng đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <form method="GET" class="mb-4">
                                <input type="hidden" name="act" value="listBill">
                                    <div class="form-group d-flex align-items-center">
                                        <label for="status" class="me-2">Lọc theo trạng thái:</label>
                                        <select id="status" name="status" class="form-select w-auto me-3">
                                            <option value="">Tất cả</option>
                                            <option value="0" <?= isset($_GET['status']) && $_GET['status'] == '0' ? 'selected' : '' ?>>Chờ xác nhận</option>
                                            <option value="1" <?= isset($_GET['status']) && $_GET['status'] == '1' ? 'selected' : '' ?>>Đã xác nhận</option>
                                            <option value="2" <?= isset($_GET['status']) && $_GET['status'] == '2' ? 'selected' : '' ?>>Chờ lấy hàng</option>
                                            <option value="3" <?= isset($_GET['status']) && $_GET['status'] == '3' ? 'selected' : '' ?>>Đang vận chuyển</option>
                                            <option value="4" <?= isset($_GET['status']) && $_GET['status'] == '4' ? 'selected' : '' ?>>Đang hoàn trả hàng</option>
                                            <option value="5" <?= isset($_GET['status']) && $_GET['status'] == '5' ? 'selected' : '' ?>>Giao hàng thành công</option>
                                            <option value="6" <?= isset($_GET['status']) && $_GET['status'] == '6' ? 'selected' : '' ?>>Đã hủy</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên người nhận</th>
                                    <th>Số điện thoại người nhận</th>
                                    <th>Địa chỉ người nhận</th>
                                    <th>Ngày mua</th>
                                    <th>Trạng thái của đơn hàng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bills as $bill) {
                                    ?>
                                    <tr>
                                        <td><?= $bill['id_bill'] ?></td>
                                        <td><?= $bill['receiver_name'] ?></td>
                                        <td><?= $bill['receiver_phone'] ?></td>
                                        <td><?= $bill['receiver_address'] ?></td>
                                        <td><?= $bill['purchase_date'] ?></td>
                                        <td><?= getOrderStatus($bill['status']) ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="?act=updateBill&id=<?= $bill['id_bill'] ?>"
                                                role="button">Xem chi tiết</a>
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