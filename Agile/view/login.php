<?php require_once 'layout/header.php' ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Đăng nhập</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?act=login" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Đăng nhập</button>
                        <a href="?act=register" class="btn btn-link">Chưa có tài khoản? Đăng ký ngay</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php'
?>