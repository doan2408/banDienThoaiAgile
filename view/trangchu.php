<?php
require_once 'layout/header.php';
require_once 'layout/banner.php'
    ?>




<!-- Start Categories of The Month -->

<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Sản phẩm nổi bật</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($topPro as $key => $value) {
                ?>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card h-100">
                        <a href="?act=shop_single&id=<?= $value['id_product'] ?>">
                            <img src="assets/img/<?= $value['img_product']?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right"><?= number_format($value['price'])?>đ</li>
                            </ul>
                            <a href="?act=shop_single&id=<?= $value['id_product'] ?>" class="h2 text-decoration-none text-dark"><?= $value['name']?></a>
                            <p class="card-text"><?= $value['description']?></p>
                            <p class="text-muted">Lượt xem (<?= $value['view']?>)</p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- End Featured Product -->

<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php'
    ?>