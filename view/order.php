<?php require_once 'layout/header.php' ?>
<div class="container my-5">
    <!-- Tiêu đề -->
    <h2 class="mb-4">Đơn hàng của tôi</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="orderTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" data-bs-target="#all-orders"
                type="button" role="tab" aria-controls="all-orders" aria-selected="true">Tất cả đơn</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pending-payment-tab" data-bs-toggle="tab" data-bs-target="#pending-payment"
                type="button" role="tab" aria-controls="pending-payment" aria-selected="false">Chờ xác nhận</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing" type="button"
                role="tab" aria-controls="processing" aria-selected="false">Đã xác nhận</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="awaiting-pickup-tab" data-bs-toggle="tab" data-bs-target="#awaiting-pickup"
                type="button" role="tab" aria-controls="awaiting-pickup" aria-selected="false">Chờ lấy hàng</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button"
                role="tab" aria-controls="shipping" aria-selected="false">Đang vận chuyển</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="return-request-tab" data-bs-toggle="tab" data-bs-target="#return-request"
                type="button" role="tab" aria-controls="return-request" aria-selected="false">Yêu cầu trả hàng</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="successful-delivery-tab" data-bs-toggle="tab"
                data-bs-target="#successful-delivery" type="button" role="tab" aria-controls="successful-delivery"
                aria-selected="false">Giao hàng thành công</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button"
                role="tab" aria-controls="cancelled" aria-selected="false">Đã hủy</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="orderTabsContent">
        <!-- Tất cả đơn -->
        <div class="tab-pane fade show active" id="all-orders" role="tabpanel" aria-labelledby="all-orders-tab">
            <?php renderOrders($orders); ?>
        </div>

        <?php foreach ($orderStatuses as $status => $ordersStatus):
            ?>
            <div class="tab-pane fade" id="<?= $tabIds[$status]; ?>" role="tabpanel"
                aria-labelledby="<?= $tabIds[$status]; ?>-tab">
                <?php renderOrders($ordersStatus); ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php'
?>