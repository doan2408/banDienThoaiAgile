<!-- addUser.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Nền xanh nhạt */
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #003366; /* Màu xanh đậm */
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #ffffff; /* Nền trắng */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #003366;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007acc; /* Nút màu xanh */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #005999; /* Đậm hơn khi hover */
        }

        a {
            color: #007acc;
            text-decoration: none;
            margin-top: 10px;
            display: block;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Thêm người dùng mới</h1>
    <form action="index.php?act=insertUser" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Thêm người dùng">
    </form>
    <a href="index.php?act=listUser">Quay lại danh sách người dùng</a>
</body>

</html>