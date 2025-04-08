<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Quản lý bình luận</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sản phẩm</th>
                                    <th>Người dùng</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($comments as $comment): ?>
                                <tr>
                                    <td><?= $comment['id_comment'] ?></td>
                                    <td><?= $comment['product_name'] ?></td>
                                    <td><?= $comment['user_email'] ?></td>
                                    <td><?= $comment['content'] ?></td>
                                    <td><?= $comment['day_post'] ?></td>
                                    <td>
                                        <a href="?act=toggleCensorship&id=<?= $comment['id_comment'] ?>&status=<?= $comment['censorship'] ?>"
                                            class="btn btn-sm <?= $comment['censorship'] == 0 ? 'btn-success' : 'btn-warning' ?>">
                                            <?= $comment['censorship'] == 0 ? 'Hiện' : 'Ẩn' ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')"
                                            href="?act=deleteComment&id=<?= $comment['id_comment'] ?>"
                                            class="btn btn-danger btn-sm">Xóa</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php';
?>