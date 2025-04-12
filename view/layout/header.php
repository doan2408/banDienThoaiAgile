<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop
-->
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="./">
                HiTech
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?act=about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?act=shop">Shop</a>
                        </li>                
                        <li class="nav-item">
                            <a class="nav-link" href="?act=contact">Contact</a>
                        </li>
                </div>
                <div class="navbar align-self-center d-flex">
                    <form action="?act=shop" method="POST" class="d-flex">
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" class="form-control">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                    <!-- <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                    <form action="?act=shop" method="POST">
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" class="form-control">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a> -->
                    
                    <a class="nav-icon position-relative text-decoration-none" href="?act=cart">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    </a>
                    
                        <?php if (isset($_SESSION['user'])): ?>
                            <div class="dropdown">
                                <a class="dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fa fa-fw fa-user text-dark mr-3"></i>                           
                                    <?php echo $_SESSION['user']['customer_info']['full_name'];?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="?act=profile">Hồ sơ</a></li>
                                    <li><a class="dropdown-item" href="?act=order">Đơn hàng</a></li>
                                    <?php if ($_SESSION['user']['role'] == 2): ?>
                                        <li><a class="dropdown-item" href="admin">Quản trị</a></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item" href="?act=logout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <a href="?act=login" class="text-decoration-none text-dark">
                                <i class="fa fa-fw fa-user text-dark mr-3"></i>
                                Đăng nhập
                            </a>
                        <?php endif; ?>
                   
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>