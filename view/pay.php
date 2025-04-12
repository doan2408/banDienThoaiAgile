<?php require_once 'layout/header.php' ?>
<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card shopping-cart" style="border-radius: 15px;">
                    <div class="card-body text-black">
                        <div class="row">
                            <div class="col-lg-6 px-5 py-4">
                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Các sản phẩm bạn đã chọn
                                </h3>
                                <div class="box_show_cart">
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION['mycart'] as $index => $item) {
                                        $subtotal = $item['price'] * $item['quantity'];
                                        $total += $subtotal;
                                        ?>
                                        <div class="d-flex align-items-center mb-5">
                                            <div class="flex-shrink-0">
                                                <img src="assets/img/<?= $item['img'] ?>" class="img-fluid"
                                                    style="width: 150px;" alt="Product Image">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <a href="index.php?act=deleteToCart&id=<?= $item['id'] ?>"
                                                    class="float-end text-black"><i class="fas fa-times"></i></a>
                                                <h5 class="text-primary"><?= $item['name'] ?></h5>
                                                <h6 style="color: #9e9e9e;">Thương hiệu: <?= $item['brand'] ?></h6>
                                                <h6 style="color: #9e9e9e;">Màu: <?= $item['color'] ?></h6>
                                                <div class="d-flex align-items-center">
                                                    <p class="fw-bold mb-0 me-5 pe-3">
                                                        <?= number_format($item['price'] * $item['quantity']) ?>đ
                                                    </p>
                                                    <div class="def-number-input number-input safari_only">
                                                        Số lượng:<input class="quantity fw-bold text-black" min="0"
                                                            name="quantity" value="<?= $item['quantity'] ?>" type="number"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">
                                <!-- <div class="d-flex justify-content-between px-x">
                                    <p class="fw-bold">Giảm:</p>
                                    <p class="fw-bold">Discount VNĐ</p>
                                </div> -->
                                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                                    <h5 class="fw-bold mb-0">Tổng tiền:</h5>
                                    <h5 class="fw-bold mb-0"><?= number_format($total) ?>đ</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 px-5 py-4">
                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Thông tin thanh toán</h3>
                                <form action="index.php?act=payment" method="post" class="mb-5">
                                    <label class="form-label" for="typeText">Tên người nhận</label>
                                    <div class="form-outline mb-5">
                                        <input type="text" id="typeText" name="receiver_name"
                                            class="form-control form-control-lg"
                                            value="<?= $_SESSION['user']['customer_info']['full_name'] ?>" required />
                                    </div>
                                    <label class="form-label" for="typeText">Số điện thoại người nhận</label>
                                    <div class="form-outline mb-5">
                                        <input type="text" id="typeText" name="receiver_phone"
                                            class="form-control form-control-lg"
                                            value="<?= $_SESSION['user']['customer_info']['phone'] ?>" required />
                                    </div>
                                    <label class="form-label" for="typeName">Địa chỉ giao hàng</label>
                                    <div class="form-outline mb-5">
                                        <input type="text" id="typeName" name="receiver_address"
                                            class="form-control form-control-lg"
                                            value="<?= $_SESSION['user']['customer_info']['address'] ?>" required />
                                    </div>
                                    <p class="mb-5">Hình thức thanh toán: Thanh toán khi nhận hàng</p>
                                    <input type="submit" class="btn btn-primary btn-block btn-lg" name="order_cart"
                                        value="Đặt hàng">
                                    <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                                        <a href="?act=shop"><i class="fas fa-angle-left me-2"></i>Quay lại mua sắm</a>
                                    </h5>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php'
    ?>
<?php if (isset($_SESSION['payment_status'])): ?>
    <div class="modal fade show animate__animated <?= ($_SESSION['payment_status'] === 'success') ? 'animate__fadeIn' : 'animate__shakeX'; ?>" 
         id="paymentSuccessPopup" tabindex="-1" role="dialog"
         aria-labelledby="paymentSuccessPopupLabel" style="display: block;" inert>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img id="img" src="assets/img/<?= ($_SESSION['payment_status'] === 'success') ? 'success.gif' : 'comp_3.gif'; ?>" 
                         alt="<?= ($_SESSION['payment_status'] === 'success') ? 'Thanh toán thành công' : 'Có lỗi xảy ra'; ?>" 
                         style="width: 100%; height: auto;">
                    <p><?= $_SESSION['payment_message']; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    var paymentSuccessPopup = new bootstrap.Modal(document.getElementById('paymentSuccessPopup'));

    // Hiển thị modal
    paymentSuccessPopup.show();

    // Đóng popup tự động sau 3 giây và redirect
    setTimeout(function () {
        paymentSuccessPopup.hide(); // Đóng modal sau 3 giây
        window.location.href = 'index.php?act=shop';
    }, 2000);
    <?php
    unset($_SESSION['payment_status']);
    unset($_SESSION['payment_message']);
    ?>
</script>