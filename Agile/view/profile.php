
<?php require_once 'layout/header.php'; ?>

<div class="container py-5">
    <h2>Hồ sơ người dùng</h2>
    <form action="?act=updateProfile" method="POST">
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($userProfile['full_name']); ?>" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($userProfile['email']); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($userProfile['phone']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($userProfile['address']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới (nếu thay đổi)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>

<?php require_once 'layout/footer.php'; ?>
