<?php require_once 'layout/header.php' ?>
<div class="container my-5">
    <h2 class="mb-4">Chi tiết đơn hàng</h2>

    <!-- Thông tin cơ bản -->
    <div class="card">
        <div class="card-header">
            <strong>Mã đơn hàng:</strong> <?= $orderDetails[0]['id_bill'] ?>
        </div>
        <div class="card-body">
            <p><strong>Người nhận:</strong> <?= $orderDetails[0]['receiver_name'] ?></p>
            <p><strong>Điện thoại:</strong> <?= $orderDetails[0]['receiver_phone'] ?></p>
            <p><strong>Địa chỉ:</strong> <?= $orderDetails[0]['receiver_address'] ?></p>
            <p><strong>Ngày mua:</strong> <?= $orderDetails[0]['purchase_date'] ?></p>
            <p><strong>Trạng thái:</strong> <?= getOrderStatus($orderDetails[0]['status']) ?></p>

            <?php if (in_array($orderDetails[0]['status'], [0, 1])): ?>
                <form method="post" action="?act=cancelOrder">
                    <input type="hidden" name="id_bill" value="<?= $orderDetails[0]['id_bill'] ?>">
                    <button type="submit" class="btn btn-danger" name="cancel" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy đơn hàng</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <!-- Chi tiết sản phẩm -->
    <h3 class="mt-4">Danh sách sản phẩm</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Màu</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $detail): ?>
                <tr>
                    <td><img src="assets/img/<?= $detail['img_product'] ?>" alt="Ảnh sản phẩm" style="width: 50px; height: 50px; object-fit: cover;"></td>
                    <td><?= $detail['name_product'] ?></td>
                    <td><?= $detail['name_color'] ?></td>
                    <td><?= number_format($detail['price']) ?> đ</td>
                    <td><?= $detail['quantity'] ?></td>
                    <td><?= number_format($detail['price'] * $detail['quantity']) ?> đ</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-end mt-3">
        <strong>Tổng tiền:</strong> 
        <?= number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $orderDetails))) ?> đ
    </div>
</div>
<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php';
?>