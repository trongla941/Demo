-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2023 at 04:00 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xamsneaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iduser` int DEFAULT NULL,
  `bill_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_tel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - thanh toán trực tiếp \r\n2 -thanh toán chuyển khoản\r\n3 - thanh toán online',
  `ngaydathang` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `toltal` int NOT NULL,
  `bill_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - đơn hàng mới\r\n1 - Đang xử lý\r\n2 - đang giao hàng\r\n3 - đã giao hàng',
  `receive_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receive_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receive_tel` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TrangThaiThanhToan` tinyint NOT NULL DEFAULT '1' COMMENT '0- thanh toán rồi\r\n1- chưa thanh toán\r\n',
  `ghichu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=448 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `toltal`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`, `TrangThaiThanhToan`, `ghichu`) VALUES
(433, 17, 'baokhanh', 'Cao lỗ quận 8', '0768864476', 'diepbaokhanh1811@gmail.com', 1, '09:51:09pm 30/11/23', 16000000, 3, NULL, NULL, NULL, 1, ''),
(439, 4, 'admin', 'aaa', '768864476', 'admin@gmail.com', 1, '05:11:36pm 06/12/23', 2250000, 0, NULL, NULL, NULL, 1, ''),
(440, 4, 'admin', 'sdfsd', '768864476', 'admin@gmail.com', 1, '05:12:04pm 06/12/23', 4800000, 0, NULL, NULL, NULL, 1, ''),
(441, 18, 'aaa', '', '', 'diepbaokhanh1811@gmail.com', 0, '03:57:50pm 07/12/23', 3200000, 0, NULL, NULL, NULL, 1, ''),
(443, 18, 'aaa', 'asd', 'asdasd', 'diepbaokhanh1811@gmail.com', 3, '04:35:11pm 07/12/23', 30000, 0, NULL, NULL, NULL, 1, ''),
(444, 18, 'aaa', '', '', 'diepbaokhanh1811@gmail.com', 0, '04:36:29pm 07/12/23', 1600000, 0, NULL, NULL, NULL, 1, ''),
(447, 4, 'admin', 'cao lỗ', '768864476', 'admin@gmail.com', 3, '02:00:39pm 12/12/23', 3200000, 0, NULL, NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `bill_vnpay`
--

DROP TABLE IF EXISTS `bill_vnpay`;
CREATE TABLE IF NOT EXISTS `bill_vnpay` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_bill` int NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_vnpay`
--

INSERT INTO `bill_vnpay` (`id`, `id_bill`, `amount`) VALUES
(42, 274, 950000),
(43, 275, 750000),
(157, 431, 2550000),
(158, 434, 1600000),
(159, 443, 0),
(160, 447, 3200000);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iduser` int NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_general_ci NOT NULL,
  `idpro` int NOT NULL,
  `ngaybinhluan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lk_taikhoan_binhluan` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `iduser`, `name_user`, `noidung`, `idpro`, `ngaybinhluan`) VALUES
(44, 4, '', 'hay qáu', 26, '09:19:42am 02/12/2023'),
(45, 4, '', 'asdasd', 26, '09:19:46am 02/12/2023'),
(46, 18, '', 'aaa', 31, '09:33:45am 07/12/2023'),
(47, 4, '', '111', 35, '07:00:13am 12/12/2023');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iduser` int NOT NULL,
  `idpro` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `idbill` int NOT NULL,
  `size` int NOT NULL DEFAULT '35' COMMENT '= sizeof sanpham',
  `code_cart` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_bill` (`idbill`),
  KEY `cart_user` (`iduser`),
  KEY `cart_sanpham` (`idpro`)
) ENGINE=InnoDB AUTO_INCREMENT=415 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`, `size`, `code_cart`) VALUES
(328, 4, 29, 'spso8.jpg', 'Giày Nike Air Jordan 1 Retro High OG ‘Black White’ Like Auth', 1250000, 3, 1250000, 338, 35, 0),
(329, 4, 27, 'spso1.jpg', 'Giày Nike Air Jordan 1 Retro High ‘Dark Mocha’ Like Auth', 1500000, 2, 1500000, 338, 38, 0),
(330, 4, 30, 'spso9.jpg', 'Giày MLB Chunky Liner Mid Denim New York Yankees ‘D.Navy’', 950000, 1, 950000, 338, 38, 0),
(347, 4, 32, 'spso12.jpg', 'Giày MLB Chunky Liner Low New York Yankees ‘Ivory’ Siêu Cấp', 750000, 2, 750000, 0, 35, 0),
(348, 4, 32, 'spso12.jpg', 'Giày MLB Chunky Liner Low New York Yankees ‘Ivory’ Siêu Cấp', 750000, 3, 750000, 0, 35, 0),
(401, 4, 35, 'conserver1.jpg', 'Giày Converse X Dior B23 Low Top Sneaker ‘Black Dior Oblique’ Like Auth', 1600000, 1, 1600000, 434, 35, 0),
(402, 4, 32, 'spso12.jpg', 'Giày MLB Chunky Liner Low New York Yankees ‘Ivory’ Siêu Cấp', 750000, 1, 750000, 435, 35, 0),
(403, 4, 31, 'spso11.jpg', 'Giày MLB Chunky Liner Mid Denim New York Yankees ‘D.Navy’', 950000, 1, 950000, 436, 35, 0),
(404, 4, 36, '1.jpg', 'asd', 0, 1, 0, 437, 35, 0),
(405, 4, 31, 'spso11.jpg', 'Giày MLB Chunky Liner Mid Denim New York Yankees ‘D.Navy’', 950000, 2, 1900000, 438, 35, 0),
(406, 4, 32, 'spso12.jpg', 'Giày MLB Chunky Liner Low New York Yankees ‘Ivory’ Siêu Cấp', 750000, 3, 2250000, 439, 35, 0),
(407, 4, 35, 'conserver1.jpg', 'Giày Converse X Dior B23 Low Top Sneaker ‘Black Dior Oblique’ Like Auth', 1600000, 3, 4800000, 440, 38, 0),
(408, 18, 35, 'conserver1.jpg', 'Giày Converse X Dior B23 Low Top Sneaker ‘Black Dior Oblique’ Like Auth', 1600000, 2, 3200000, 441, 37, 0),
(410, 18, 36, '1.jpg', 'asd', 0, 1, 0, 443, 35, 0),
(411, 18, 35, 'conserver1.jpg', 'Giày Converse X Dior B23 Low Top Sneaker ‘Black Dior Oblique’ Like Auth', 1600000, 1, 1600000, 444, 35, 0),
(414, 4, 35, 'conserver1.jpg', 'Giày Converse X Dior B23 Low Top Sneaker ‘Black Dior Oblique’ Like Auth', 1600000, 2, 3200000, 447, 37, 0);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(5, 'ADIDAS'),
(12, 'NIKE'),
(14, 'MLB'),
(15, 'CONVERSE'),
(17, 'VANS'),
(18, 'NEW BALANCE'),
(19, 'MCQUEENasdasdas'),
(21, 'GUCCI'),
(22, 'DIOR'),
(23, 'LOUIS VUITTON'),
(27, 'ADIDAS'),
(28, 'ADIDAS'),
(31, 'like'),
(32, 'kkkk'),
(33, 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_general_ci,
  `size` int NOT NULL DEFAULT '35' COMMENT 'size from 35 to 42',
  `luotxem` int NOT NULL DEFAULT '0',
  `iddm` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lk_sanpham_danhmuc` (`iddm`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `size`, `luotxem`, `iddm`) VALUES
(23, 'Giày Adidas Yeezy Boost 350 V2 ‘Israfil’ Like Auth Boost Nén', 950000.00, '4.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 2, 5),
(24, 'Giày Adidas UltraBoost 21 ‘Core Black’ Đế Boost Thật Like Auth', 1200000.00, 'spso5.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 7, 5),
(25, 'Giày Adidas UltraBoost 21 ‘Triple Black’ Đế Boost Thật Like Auth', 1200000.00, '6.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 5, 5),
(26, 'Giày Nike Air Jordan 1 Retro High ‘University Blue’ Like Auth', 1500000.00, 'spso2.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 6, 12),
(27, 'Giày Nike Air Jordan 1 Retro High ‘Dark Mocha’ Like Auth', 1500000.00, 'spso1.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 5, 12),
(29, 'Giày Nike Air Jordan 1 Retro High OG ‘Black White’ Like Auth', 1250000.00, 'spso8.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 0, 12),
(30, 'Giày MLB Chunky Liner Mid Denim New York Yankees ‘D.Navy’', 950000.00, 'spso9.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 3, 14),
(31, 'Giày MLB Chunky Liner Mid Denim New York Yankees ‘D.Navy’', 950000.00, 'spso11.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 10, 14),
(32, 'Giày MLB Chunky Liner Low New York Yankees ‘Ivory’ Siêu Cấp', 750000.00, 'spso12.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 26, 14),
(35, 'Giày Converse X Dior B23 Low Top Sneaker ‘Black Dior Oblique’ Like Auth', 1600000.00, 'conserver1.jpg', 'Trạng thái : Còn hàng, liên hệ Shop để check size tại cửa hàng <br>\r\nTình trạng : Hàng mới 100% <br>\r\nGiao hàng & Thanh toán : Giao hàng trên toàn quốc và thanh toán khi nhận hàng, được đổi size trong vòng 7 ngày. <br>\r\nSản phẩm được bảo hành 6 tháng lỗi do nhà sản xuất.<br>', 35, 13, 15),
(36, 'asd', 0.00, '1.jpg', 'aasdasdasd', 35, 3, 5),
(37, 'eww', 0.00, 'jv.jpg', 'sdfsd', 35, 3, 5),
(38, 'sdfsdf', 0.00, 'a.jpg', 'sdfsdf', 35, 0, 5),
(40, 'asd', 90000000.00, 'ccc.jpg', 'uil', 35, 1, 5),
(41, 'asd', 20000.00, 'aaaaaa.jpg', 'aaa', 35, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sdt` int DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0' COMMENT '0 - Khách hàng \r\n1 - admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `diachi`, `sdt`, `role`) VALUES
(4, 'admin', 'admin', 'admin@gmail.com', '', 768864476, 1),
(16, 'admin', '', 'admin', '', 0, 1),
(18, 'aaa', 'aaa', 'diepbaokhanh1811@gmail.com', 'aaa', 2313, 0),
(19, 'aaa', '123', 'khanhdiep1648@gmail.com', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vnpay`
--

DROP TABLE IF EXISTS `vnpay`;
CREATE TABLE IF NOT EXISTS `vnpay` (
  `id_vnpay` int NOT NULL AUTO_INCREMENT,
  `vnp_Amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_BankCode` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_PayDate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_TmnCode` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_TransactionNo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vnpay_id_bill` int NOT NULL,
  PRIMARY KEY (`id_vnpay`),
  KEY `li_code_id_bill` (`vnpay_id_bill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_taikhoan_binhluan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);

--
-- Constraints for table `vnpay`
--
ALTER TABLE `vnpay`
  ADD CONSTRAINT `li_code_id_bill` FOREIGN KEY (`vnpay_id_bill`) REFERENCES `bill` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
