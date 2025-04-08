<?php require_once 'layout/header.php' ?>
<style>
    .color-label input[type="radio"] {
        display: none;
    }

    /* Style cho span */
    .color-label span {
        cursor: pointer;
        padding: 10px 15px;
        border: 1px solid transparent;
        transition: all 0.3s ease;
    }

    /* Hiệu ứng khi radio được chọn */
    .color-label input[type="radio"]:checked+span {
        border-color: #28a745;
        /* Thêm viền để hiển thị được chọn */
        background-color: #218838;
        /* Màu nền đậm hơn */
        color: #fff;
        /* Đổi màu chữ */
    }
</style>
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="assets/img/<?= $productOne['img_product'] ?>"
                        alt="Card image cap" id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $productOne['name'] ?></h1>
                        <p class="h3 py-2"><?= number_format($productOne['price']) ?>đ</p>
                        <p class="py-2">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= floor($avgRating)) {
                                    // Hiển thị sao đầy nếu điểm rating >= i
                                    echo '<i class="fa fa-star text-warning"></i>';
                                } elseif ($i - $avgRating < 1) {
                                    // Hiển thị sao rỗng nếu điểm rating còn thiếu một chút
                                    echo '<i class="fa fa-star-half-alt text-warning"></i>';
                                } else {
                                    // Hiển thị sao rỗng nếu điểm rating < i
                                    echo '<i class="fa fa-star text-secondary"></i>';
                                }
                            }
                            ?>
                            <span class="list-inline-item text-dark"><?= $avgRating ?></span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Thương hiệu:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?= $productOne['firms'] ?></strong></p>
                            </li>
                        </ul>

                        <h6>Mô tả:</h6>
                        <p><?= $productOne['description'] ?></p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Số lượng còn lại :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong id="remaining-quantity"><?= $product_variant[0]['quantity'] ?></strong></p>
                            </li>
                            <ul class="list-inline pb-3">
                                <li class="list-inline-item text-right">
                                    Số lượng
                                </li>
                                <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span>
                                </li>
                                <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                            </ul>
                        </ul>

                        <form action="index.php?act=addToCart" method="POST">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Màu :</li>
                                        <?php foreach ($product_variant as $key => $value): ?>
                                            <li class="list-inline-item">
                                                <label class="color-label">
                                                    <input type="radio" name="color" value="<?= $value['name_color'] ?>"
                                                        <?= $key === 0 ? 'checked' : '' ?>
                                                        data-quantity="<?= $value['quantity'] ?>">
                                                    <!-- Dữ liệu số lượng cho mỗi biến thể -->
                                                    <span><?= $value['name_color'] ?></span>
                                                </label>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                        </div>
                        <!-- <form action="index.php?act=addToCart" method="POST"> -->
                        <input type="hidden" name="productId" value="<?= $productOne['id_product'] ?>">
                        <input type="hidden" name="name" value="<?= $productOne['name'] ?>">
                        <input type="hidden" name="price" value="<?= $productOne['price'] ?>">
                        <input type="hidden" name="brand" value="<?= $productOne['firms'] ?>">
                        <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                        <input type="hidden" name="img" value="<?= $productOne['img_product'] ?>">
                        <div class="col d-grid">
                            <button href="index.php?act=cart" type="submit" class="btn btn-success btn-lg"
                                name="addtocart">Add To Cart</button>
                        </div>

                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Close Content -->
<!-- Start Article -->
<section class="py-5">
    <div class="container">

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">
            <!-- Product Rating -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Đánh giá sản phẩm</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="text-warning me-2">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= $avgRating ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';
                            }
                            ?>
                        </div>
                        <span class="text-muted">(<?= $avgRating ?> / 5 từ <?= $totalRatings ?> đánh giá)</span>
                    </div>

                    <!-- Rating Form -->
                    <?php if (isset($_SESSION['user'])): ?>
                        <form id="ratingForm" class="mt-3">
                            <input type="hidden" name="id_pro" value="<?= $productOne['id_product'] ?>">
                            <div class="d-flex align-items-center">
                                <div class="rating-input">
                                    <?php for ($i = 5; $i >= 1; $i--): ?>
                                        <label>
                                            <input type="radio" name="rating" value="<?= $i ?>" />
                                            <?= str_repeat('<i class="fa fa-star text-warning"></i>', $i) ?>
                                        </label>
                                    <?php endfor; ?>
                                </div>
                                <button class="btn btn-primary btn-sm ms-2" type="submit">Đánh giá</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p class="mt-3">Vui lòng <a href="index.php?act=login">đăng nhập</a> để đánh giá sản phẩm.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="p-2 pb-3">
                <div class="product-wap card rounded-0">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Bình luận</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($comments as $com) {
                            if ($com['censorship'] == 1) {
                                continue; // Skip comments with censorship = 1
                            }
                            ?>
                            <div class="card mb-3 shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="text-primary fw-bold mb-0">
                                                    <?= $com['full_name'] ?>
                                                </h6>
                                                <p class="text-muted"><?= $com['day_post'] ?></p>
                                            </div>
                                            <p class="text-muted mt-2"><?= $com['content'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <!-- Comment Form -->
                        <?php if (isset($_SESSION['user'])): ?>
                            <form id="commentForm" class="mt-4">
                                <input type="hidden" name="id_pro" value="<?= $productOne['id_product'] ?>">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex flex-column">
                                            <div class="mb-3">
                                                <input type="text" name="detail" class="form-control"
                                                    placeholder="Nhập bình luận" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm px-4" name="post_comment">
                                                Gửi bình luận
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Article -->

<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Sản phẩm cùng loại</h2>
        <div class="row">
            <?php foreach ($relatedProducts as $product): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="assets/img/<?= $product['img_product'] ?>" class="card-img-top"
                            alt="<?= $product['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text text-success"><?= number_format($product['price']) ?>đ</p>
                            <a href="index.php?act=shop_single&id=<?= $product['id_product'] ?>" class="btn btn-primary">Xem
                                chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php'
    ?>
<script>
    $(document).ready(function () {
        $('input[name="color"]').on('change', function () {
            const selectedVariant = $(this);
            const quantity = selectedVariant.data('quantity');  // Lấy số lượng của biến thể đã chọn
            const quantityElem = document.getElementById('var-value');

            quantityElem.innerText = 1;  // Đặt lại số lượng về 1 khi thay đổi biến thể
            document.getElementById('product-quanity').value = 1;  // Cập nhật giá trị hidden field

            // Cập nhật số lượng sản phẩm còn lại cho biến thể được chọn
            document.getElementById('remaining-quantity').innerText = quantity;  // Cập nhật số lượng còn lại
        });
        $('#commentForm').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: 'index.php?act=addComment',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response === "Bạn cần đăng nhập để có thể bình luận") {
                        alert(response);
                    } else {
                        location.reload();
                    }
                }
            });
        });
        $('#ratingForm').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: 'index.php?act=addRating',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response === "Bạn cần đăng nhập để có thể đánh giá") {
                        alert(response);
                    } else {
                        location.reload();
                    }
                }
            });
        });
        document.getElementById('btn-minus').addEventListener('click', () => {
            const quantityElem = document.getElementById('var-value');
            let quantity = parseInt(quantityElem.innerText);
            if (quantity > 1) {
                quantityElem.innerText = --quantity;
                document.getElementById('product-quanity').value = quantity;
            }
        });
        document.getElementById('btn-plus').addEventListener('click', () => {
            const quantityElem = document.getElementById('var-value');
            let quantity = parseInt(quantityElem.innerText);
            quantityElem.innerText = +quantity;
            document.getElementById('product-quanity').value = quantity;
        });
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('added') === 'true') {
                alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
            }
        });
        let tang = document.querySelector(".buttontang");
        let giam = document.querySelector(".buttongiam");
        let quantity = document.querySelector("#quantity");
        tang.onclick = () => {
            quantity.value++;
        }
        giam.onclick = () => {
            quantity.value--;
            if (quantity.value <= 0) {
                quantity.value = 1;
            }
        }
    });


</script>