-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2024 at 09:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1014`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id_bill` int NOT NULL COMMENT 'Mã đơn hàng',
  `id_customer` int NOT NULL COMMENT 'Mã customer',
  `receiver_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên người nhận',
  `receiver_phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Số điện thoại người nhận',
  `receiver_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Địa chỉ người nhận',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 => "Chờ xác nhận",\r\n        1 => "Đã xác nhận",\r\n        2 => "Chờ lấy hàng",\r\n        3 => "Đang vận chuyển",\r\n        4 => "Đang hoàn trả hàng",\r\n        5 => "Giao hàng thành công",\r\n        6 => "Đã hủy",',
  `purchase_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày mua '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id_bill`, `id_customer`, `receiver_name`, `receiver_phone`, `receiver_address`, `status`, `purchase_date`) VALUES
(12, 2, 'hoang', '0988765678', 'ha noi', 5, '2024-11-29 15:58:07'),
(14, 2, 'hoang', '0988765678', 'ha noi', 5, '2024-12-02 17:47:01'),
(15, 2, 'hoang', '0988765678', 'ha noi', 6, '2024-12-02 18:39:54'),
(16, 2, 'hoang', '0988765678', 'ha noi', 6, '2024-12-04 17:28:27'),
(17, 2, 'hoang', '0988765678', 'ha noi', 3, '2024-12-04 17:29:22'),
(18, 2, 'hoang', '0988765678', 'ha noi', 6, '2024-12-04 17:40:42'),
(19, 2, 'hoang', '0988765678', 'ha noi', 3, '2024-12-04 17:41:13'),
(20, 2, 'hoang', '0988765678', 'ha noi', 0, '2024-12-04 18:29:24'),
(21, 3, 'hoanght', '000000', 'ha noi', 5, '2024-12-09 07:00:15'),
(22, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 0, '2024-12-10 22:03:18'),
(23, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 5, '2024-12-10 22:05:14'),
(24, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 4, '2024-12-11 16:29:54'),
(25, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 3, '2024-12-11 16:29:54'),
(26, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 3, '2024-12-11 16:29:54'),
(27, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 2, '2024-12-11 16:31:21'),
(28, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 2, '2024-12-11 16:31:21'),
(29, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 1, '2024-12-11 16:32:40'),
(30, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 1, '2024-12-11 16:32:56'),
(31, 7, 'nguyen van b', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 0, '2024-12-11 16:41:51'),
(32, 7, 'nguyen van b', '0123456789', 'Nam dinh', 0, '2024-12-11 16:43:02'),
(33, 8, 'nguyen van c', '0123456798', 'Hoa binh', 0, '2024-12-11 16:44:27'),
(34, 8, 'nguyen van c', '0123456798', 'Hoa binh', 0, '2024-12-11 16:44:27'),
(35, 6, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', 5, '2024-12-11 16:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL COMMENT 'Mã loại hàng',
  `name_cat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên của loại hàng',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name_cat`, `created_at`, `updated_at`) VALUES
(3, 'Điện Thoại', '2024-11-22 20:01:34', '2024-11-22 20:01:34'),
(4, 'Tai Nghe', '2024-11-22 20:01:52', '2024-11-22 20:01:52'),
(5, 'LapTop', '2024-11-22 20:02:00', '2024-11-22 20:02:00'),
(6, 'Loa', '2024-11-22 21:35:40', '2024-11-22 21:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int NOT NULL COMMENT 'Mã bình luận',
  `id_product` int NOT NULL COMMENT 'Mã sản phẩm',
  `id_user` int NOT NULL COMMENT 'Mã user',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nội dung bình luận ',
  `censorship` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hiện, 1 là đã ẩn',
  `day_post` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_product`, `id_user`, `content`, `censorship`, `day_post`) VALUES
(1, 49, 3, 'hay', 1, '2024-11-25 17:44:39'),
(3, 49, 3, 'Máy tính mans', 0, '2024-11-25 20:49:48'),
(4, 49, 3, 'Máy tính mans', 0, '2024-11-25 20:49:52'),
(5, 49, 3, 'anh', 0, '2024-11-25 20:53:21'),
(6, 49, 3, '1', 0, '2024-11-25 20:54:50'),
(7, 49, 3, 'Máy tính 51', 0, '2024-11-26 16:58:04'),
(8, 49, 3, 'g', 0, '2024-11-26 17:33:25'),
(9, 48, 3, 'haha', 0, '2024-11-28 23:06:57'),
(10, 45, 3, 'dep', 0, '2024-12-09 05:32:32'),
(11, 46, 4, 'haha', 0, '2024-12-09 07:00:50'),
(12, 46, 4, '2', 0, '2024-12-09 07:01:25'),
(13, 49, 7, 'xịn nha', 0, '2024-12-10 22:12:10'),
(14, 49, 7, 'oce đấy', 0, '2024-12-10 22:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int NOT NULL COMMENT 'Mã customer',
  `id_user` int DEFAULT NULL COMMENT 'Mã user',
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Số điện thoại',
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Địa chỉ',
  `note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Ghi chú(nếu có)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `id_user`, `full_name`, `phone`, `address`, `note`) VALUES
(2, 3, 'hoang', '0988765678', 'ha noi', NULL),
(3, 4, 'hoanght', '', '', NULL),
(4, 5, 'hello', '', '', NULL),
(5, 6, 'admin', '', '', NULL),
(6, 7, 'nguyen van a', '0326291026', 'Khu Phố Yên Hòa Thi Trấn Hàng Tram Yên Thủy Hòa Bình', NULL),
(7, 8, 'nguyen van b', '0123456789', 'Nam dinh', NULL),
(8, 9, 'nguyen van c', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bills`
--

CREATE TABLE `detail_bills` (
  `id_detailbill` int NOT NULL COMMENT 'Mã chi tiết đơn hàng',
  `id_bill` int NOT NULL COMMENT 'Mã đơn hàng',
  `id_product` int NOT NULL COMMENT 'Mã sản phẩm',
  `id_variant` int NOT NULL COMMENT 'Mã biến thể',
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên của sản phẩm',
  `price` int UNSIGNED NOT NULL COMMENT 'Giá của sản phẩm ',
  `quantity` int UNSIGNED NOT NULL COMMENT 'Số lượng sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_bills`
--

INSERT INTO `detail_bills` (`id_detailbill`, `id_bill`, `id_product`, `id_variant`, `name_product`, `price`, `quantity`) VALUES
(9, 12, 38, 24, 'Sam sung', 20000, 3),
(10, 14, 49, 23, 'Loa tháp Samsung MX-T70', 4490000, 1),
(11, 14, 49, 21, 'Loa tháp Samsung MX-T70', 4490000, 1),
(12, 15, 42, 24, 'Laptop ASUS Vivobook 15 X1504ZA-NJ517W', 27980000, 2),
(13, 16, 49, 23, 'Loa tháp Samsung MX-T70', 8980000, 2),
(14, 17, 44, 24, 'Tai nghe Bluetooth Apple AirPods 4', 3450000, 1),
(15, 18, 46, 24, 'Tai nghe Bluetooth chụp tai Sony WH-1000XM5', 6490000, 1),
(16, 19, 40, 24, 'iPhone 13 128GB', 13390000, 1),
(17, 20, 42, 23, 'Laptop ASUS Vivobook 15 X1504ZA-NJ517W', 13990000, 1),
(18, 21, 46, 24, 'Tai nghe Bluetooth chụp tai Sony WH-1000XM5', 6490000, 1),
(19, 22, 49, 21, 'Loa tháp Samsung MX-T70', 4490000, 1),
(20, 23, 49, 23, 'Loa tháp Samsung MX-T70', 4490000, 1),
(21, 24, 39, 19, 'iPhone 16 Pro Max 256GB', 34090000, 1),
(22, 25, 43, 23, 'Laptop Acer Gaming Aspire ', 13990000, 1),
(23, 26, 44, 24, 'Tai nghe Bluetooth Apple AirPods 4', 10350000, 3),
(24, 27, 41, 21, 'Laptop Lenovo IdeaPad Slim 5 14Q8X9 83HL000KVN', 45980000, 2),
(25, 28, 40, 23, 'iPhone 13 128GB', 26780000, 2),
(26, 29, 47, 23, 'Loa Bluetooth Edifier Hecate G200', 390000, 1),
(27, 30, 38, 21, 'Samsung Galaxy S23', 27380000, 2),
(28, 31, 41, 23, 'Laptop Lenovo IdeaPad Slim 5 14Q8X9 83HL000KVN', 45980000, 2),
(29, 32, 40, 23, 'iPhone 13 128GB', 13390000, 1),
(30, 33, 45, 23, 'Tai nghe Bluetooth True Wireless Anker Soundcore R50i A3949', 360000, 1),
(31, 34, 44, 23, 'Tai nghe Bluetooth Apple AirPods 4', 6900000, 2),
(32, 35, 46, 24, 'Tai nghe Bluetooth chụp tai Sony WH-1000XM5', 12980000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL COMMENT 'Mã sản phẩm',
  `id_category` int NOT NULL COMMENT 'Mã loại hàng',
  `firms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Hãng của sản phẩm',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên của sản phẩm',
  `price` int UNSIGNED NOT NULL COMMENT 'Giá của sản phẩm ',
  `amount` int UNSIGNED NOT NULL COMMENT 'Số lượng',
  `discount` int UNSIGNED NOT NULL COMMENT 'Giảm giá của sản phẩm. Mặc định là 0% và giảm tối đa 20%',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Mô tả của sản phẩm',
  `img_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Hình ảnh của sản phẩm',
  `censorship` tinyint NOT NULL DEFAULT '0' COMMENT '0 là hiện, 1 là đã ẩn',
  `view` int NOT NULL DEFAULT '0' COMMENT 'Số lượt xem của sản phẩm',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `firms`, `name`, `price`, `amount`, `discount`, `description`, `img_product`, `censorship`, `view`, `created_at`, `updated_at`) VALUES
(38, 3, 'Samsung', 'Samsung Galaxy S23', 13690000, 21, 0, 'Galaxy AI tiện ích - Khoanh vùng search đa năng, là trợ lý chỉnh ảnh, chat thông minh, phiên dịch trực tiếp', 'samsung-s23_1.webp', 0, 22, '2024-11-22 20:06:28', '2024-11-22 20:06:28'),
(39, 3, 'Apple', 'iPhone 16 Pro Max 256GB', 34090000, 26, 0, 'Màn hình Super Retina XDR 6,9 inch lớn hơn có viền mỏng hơn, đem đến cảm giác tuyệt vời khi cầm trên tay.', 'iphone-16-pro-max.webp', 0, 6, '2024-11-22 21:12:54', '2024-11-22 21:12:54'),
(40, 3, 'Apple', 'iPhone 13 128GB', 13390000, 43, 0, 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao', 'iphone-13_2_.webp', 0, 43, '2024-11-22 21:16:49', '2024-11-22 21:16:49'),
(41, 5, 'Laptop Lenovo', 'Laptop Lenovo IdeaPad Slim 5 14Q8X9 83HL000KVN', 22990000, 36, 0, 'Laptop có màu xám thanh lịch, kiểu dáng mỏng nhẹ, dễ dàng mang theo khi di chuyển.', 'group_633_1_.webp', 0, 12, '2024-11-22 21:21:24', '2024-11-22 21:21:24'),
(42, 5, 'ASUS', 'Laptop ASUS Vivobook 15 X1504ZA-NJ517W', 13990000, 30, 0, 'Màn hình FHD 15.6 inch với độ sáng 250 nits và độ phủ màu 45% NTSC, mang lại hình ảnh sắc nét và sống động', 'laptop-asus-vivobook-15x-oled-m3504ya-l1268w-thumbnails.webp', 0, 13, '2024-11-22 21:23:05', '2024-11-22 21:23:05'),
(43, 5, 'Acer', 'Laptop Acer Gaming Aspire ', 13990000, 38, 0, 'CPU Intel Core i5-12450H dễ dàng xử lý mọi tác vụ làm việc học tập, làm việc thường ngày.', 'group_509_11__1.webp', 0, 5, '2024-11-22 21:27:10', '2024-11-22 21:27:10'),
(44, 4, 'Apple', 'Tai nghe Bluetooth Apple AirPods 4', 3450000, 25, 0, 'Chip H2 nổi bật, mạnh mẽ được tích hợp trong Airpod 4 giúp trải nghiệm âm thanh của bạn mượt mà hơn.', 'apple-airpods-4-thumb.webp', 0, 12, '2024-11-22 21:29:27', '2024-11-22 21:29:27'),
(45, 4, 'Soundcore ', 'Tai nghe Bluetooth True Wireless Anker Soundcore R50i A3949', 360000, 39, 0, 'Tai nghe không dây Anker Soundcore R50I-A3949 - Chất âm tốt, thiết kế sang trọng', 'tai-nghe-khong-day-anker-soundcore-r50i-a3949_2_.webp', 0, 8, '2024-11-22 21:31:40', '2024-11-22 21:31:40'),
(46, 4, 'Sony', 'Tai nghe Bluetooth chụp tai Sony WH-1000XM5', 6490000, 43, 0, 'Công nghệ Auto NC Optimizer tự động khử tiếng ồn dựa theo môi trường', 'group_172_2.webp', 0, 18, '2024-11-22 21:34:32', '2024-11-22 21:34:32'),
(47, 6, 'Edifier ', 'Loa Bluetooth Edifier Hecate G200', 390000, 30, 0, 'Màng loa kích thước lớn 40mm, giúp tái tạo âm thanh chất lượng cao, mạnh mẽ và sống động', 'loa-bluetooth-edifier-hecate-g200_2_.webp', 0, 21, '2024-11-22 21:36:44', '2024-11-22 21:36:44'),
(48, 6, 'Tronsmart ', 'Loa Bluetooth Tronsmart Groove 2', 630000, 33, 0, 'Thiết kế nhỏ gọn, tích hợp đèn LED cho trải nghiệm thêm sống động', 'group_218_3.webp', 0, 31, '2024-11-22 21:37:48', '2024-11-22 21:37:48'),
(49, 6, 'Samsung', 'Loa tháp Samsung MX-T70', 4490000, 47, 0, 'Thưởng thức dải âm trầm mạnh mẽ, chất âm sống động với công suất lên đến 1500W', 'loa-thap-samsung-mx-t70-thumb.webp', 0, 278, '2024-11-22 21:39:38', '2024-11-22 21:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant`
--

CREATE TABLE `product_variant` (
  `id_product` int NOT NULL,
  `id_variant` int NOT NULL,
  `quantity` int UNSIGNED NOT NULL COMMENT 'Số lượng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variant`
--

INSERT INTO `product_variant` (`id_product`, `id_variant`, `quantity`) VALUES
(38, 24, 9),
(38, 21, 9),
(38, 23, 3),
(39, 23, 7),
(39, 21, 8),
(39, 19, 11),
(40, 25, 13),
(40, 23, 14),
(40, 21, 6),
(40, 24, 10),
(41, 21, 21),
(41, 23, 15),
(42, 24, 13),
(42, 23, 7),
(42, 21, 10),
(43, 21, 15),
(43, 23, 23),
(44, 24, 15),
(44, 23, 10),
(45, 23, 18),
(45, 24, 21),
(46, 24, 28),
(46, 23, 15),
(47, 23, 19),
(47, 19, 11),
(48, 23, 14),
(48, 21, 9),
(48, 24, 10),
(49, 23, 34),
(49, 21, 13);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id_rate` int NOT NULL COMMENT 'Mã đánh giá',
  `id_product` int NOT NULL COMMENT 'Mã sản phẩm',
  `id_user` int NOT NULL COMMENT 'Mã user',
  `point` float NOT NULL DEFAULT '1' COMMENT 'Điểm đánh giá ',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id_rate`, `id_product`, `id_user`, `point`, `updated_at`) VALUES
(1, 49, 3, 4, '2024-12-09 06:16:27'),
(7, 49, 4, 3, '2024-12-09 06:28:05'),
(13, 42, 4, 1, '2024-12-09 06:37:50'),
(17, 40, 4, 3, '2024-12-09 06:43:25'),
(18, 49, 7, 5, '2024-12-10 22:03:30'),
(19, 46, 7, 5, '2024-12-10 22:06:14'),
(20, 42, 7, 5, '2024-12-10 22:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL COMMENT 'Mã user',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Địa chỉ email của user',
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Mật khẩu đăng nhặp của user',
  `role` tinyint NOT NULL DEFAULT '0' COMMENT '0 là khách hàng, 1 là nhân viên, 2 là quản trị',
  `day_registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày đăng kí tài khoản của user '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role`, `day_registered`) VALUES
(3, 'hoangnvph49147@fpt.edu.vn', 'ddb97b2aa7373d256bd254683c7c0e7a', 2, '2024-11-25 10:35:51'),
(4, 'hoangnvph49147@gmail.com', 'f82e62d7c3ea69cc12b5cdb8d621dab6', 0, '2024-11-27 22:05:02'),
(5, 'hoang@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0, '2024-11-29 11:51:40'),
(6, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '2024-12-10 15:01:47'),
(7, 'a@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0, '2024-12-10 15:01:58'),
(8, 'b@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0, '2024-12-11 09:41:01'),
(9, 'c@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0, '2024-12-11 09:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `id_variant` int NOT NULL COMMENT 'Mã biến thể',
  `name_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tên biến thể màu',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo ',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`id_variant`, `name_color`, `created_at`, `updated_at`) VALUES
(19, 'Vàng', '2024-11-22 18:22:06', '2024-11-22 18:22:06'),
(21, 'Xám', '2024-11-22 18:22:43', '2024-11-22 18:22:43'),
(22, 'Đỏ', '2024-11-22 20:02:19', '2024-11-22 20:02:19'),
(23, 'Đen', '2024-11-22 20:02:34', '2024-11-22 20:02:34'),
(24, 'Trắng', '2024-11-22 20:02:38', '2024-11-22 20:02:38'),
(25, 'Hồng', '2024-11-22 21:15:37', '2024-11-22 21:15:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_bills`
--
ALTER TABLE `detail_bills`
  ADD PRIMARY KEY (`id_detailbill`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `detail_bills_ibfk_1` (`id_product`),
  ADD KEY `id_variant` (`id_variant`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_variant` (`id_variant`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id_rate`),
  ADD UNIQUE KEY `unique_rating` (`id_product`,`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id_variant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id_bill` int NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng', AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT COMMENT 'Mã loại hàng', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT COMMENT 'Mã customer', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_bills`
--
ALTER TABLE `detail_bills`
  MODIFY `id_detailbill` int NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết đơn hàng', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id_rate` int NOT NULL AUTO_INCREMENT COMMENT 'Mã đánh giá', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT COMMENT 'Mã user', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `id_variant` int NOT NULL AUTO_INCREMENT COMMENT 'Mã biến thể', AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_bills`
--
ALTER TABLE `detail_bills`
  ADD CONSTRAINT `detail_bills_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `detail_bills_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_bills_ibfk_3` FOREIGN KEY (`id_variant`) REFERENCES `variant` (`id_variant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD CONSTRAINT `product_variant_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_variant_ibfk_2` FOREIGN KEY (`id_variant`) REFERENCES `variant` (`id_variant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
