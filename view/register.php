<?php require_once 'layout/header.php' ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Đăng ký tài khoản</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?act=register" method="post">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Đăng ký</button>
                        <a href="?act=login" class="btn btn-link">Đã có tài khoản? Đăng nhập</a>
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