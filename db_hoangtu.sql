-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 01:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hoangtu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_banners`
--

CREATE TABLE `tb_banners` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `unsigned_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `locate` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cate_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_banners`
--

INSERT INTO `tb_banners` (`id`, `name`, `unsigned_name`, `images`, `description`, `locate`, `status`, `cate_id`, `created_at`, `updated_at`) VALUES
(4, 'OPPO A52, OPPO A92 trả góp 0%, giảm đến 500.000đ', 'oppo-a52-oppo-a92-tra-gop-0-giam-den-500000d', 'oppo-a52-oppo-a92-tra-gop-0-giam-den-500000d-06-06-2020-fhR89JJc-Combo-800-300-800x300.png', 'OPPO A92, OPPO A92 chính hãng, OPPO, giá OPPO A92, mua OPPO A92, OPPO A92 2020, OPPO A52, OPPO A52 chính hãng, OPPO, giá OPPO A52, mua OPPO A52, OPPO A52 2020', 1, 1, 4, '2020-06-06 14:36:25', '2020-06-07 09:34:39'),
(5, 'test', 'test', 'test-15-06-2020-P2gTiJ5F-combo-A3-1-398-110-398x110.png', 'ghfghfg', 2, 1, 1, '2020-06-15 09:42:21', '2020-06-15 09:42:21'),
(6, 'ghjfg', 'ghjfg', 'ghjfg-15-06-2020-TCv6VIea-398-110copy-398x110.png', 'fghjfghj', 3, 1, 4, '2020-06-15 09:43:10', '2020-06-15 09:43:10'),
(7, 'tytrt', 'tytrt', 'tytrt-15-06-2020-BwnBCwRo-combo-A3-1-398-110-398x110.png', 'rtrty', 3, 1, 5, '2020-06-15 09:46:28', '2020-06-15 09:47:32'),
(8, 'hfgh', 'hfgh', 'hfgh-15-06-2020-V039TDH3-398-110copy-398x110.png', 'fght', 2, 1, 4, '2020-06-15 09:46:43', '2020-06-15 09:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_carriers`
--

CREATE TABLE `tb_carriers` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `unsigned_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locations` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_carriers`
--

INSERT INTO `tb_carriers` (`id`, `name`, `unsigned_name`, `phone`, `email`, `website`, `locations`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Công ty CP và TM Hoàng Phi Mobile', 'cong-ty-cp-va-tm-hoang-phi-mobile', '0867604321', 'contact@hoangphi.works', 'http://hoangphi.works/', 'Tứ Yên - Sông Lô - Vĩnh Phúc', 'không rõ', 1, '2020-06-07 09:20:36', '2020-06-07 09:20:36'),
(4, 'Công ty truyền thông Minh Hằng Official', 'cong-ty-truyen-thong-minh-hang-official', '0373821691', 'minhhangvlogs@gmail.com', NULL, 'Tứ Yên - Sông Lô - Vĩnh Phúc', 'không', 1, '2020-06-13 08:40:21', '2020-06-13 08:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unsigned_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`id`, `name`, `unsigned_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chuột', 'chuot', 1, '2020-06-05 08:49:18', '2020-06-14 03:22:51'),
(2, 'Bàn phím', 'ban-phim', 1, '2020-06-05 08:49:47', '2020-06-05 14:38:21'),
(3, 'Usb', 'usb', 1, '2020-06-05 08:54:04', '2020-06-06 15:01:23'),
(4, 'Ổ cứng HDD, SSD', 'o-cung-hdd-ssd', 1, '2020-06-05 08:55:08', '2020-06-07 09:13:15'),
(5, 'Màn hình máy tính', 'man-hinh-may-tinh', 1, '2020-06-07 09:31:55', '2020-06-07 09:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_details`
--

CREATE TABLE `tb_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_details`
--

INSERT INTO `tb_details` (`id`, `order_id`, `product_id`, `count`, `created_at`, `updated_at`) VALUES
(6, 5, 44, 1, '2020-04-09 00:46:42', '2020-04-09 00:46:42'),
(7, 6, 3, 3, '2020-06-15 10:10:25', '2020-06-15 10:10:25'),
(8, 7, 9, 1, '2020-06-15 10:21:13', '2020-06-15 10:21:13'),
(9, 7, 3, 1, '2020-06-15 10:21:13', '2020-06-15 10:21:13'),
(10, 8, 9, 1, '2020-07-08 03:07:47', '2020-07-08 03:07:47'),
(11, 9, 9, 1, '2020-07-08 03:15:33', '2020-07-08 03:15:33'),
(12, 10, 3, 2, '2020-07-08 03:15:59', '2020-07-15 07:44:28'),
(13, 11, 3, 1, '2020-07-14 15:06:46', '2020-07-14 15:06:46'),
(14, 11, 9, 1, '2020-07-14 15:06:46', '2020-07-14 15:06:46'),
(15, 12, 3, 1, '2020-07-14 20:22:21', '2020-07-14 20:22:21'),
(16, 12, 9, 1, '2020-07-14 20:22:21', '2020-07-14 20:22:21'),
(17, 13, 3, 5, '2020-07-15 07:42:23', '2020-07-15 07:42:23'),
(18, 13, 9, 5, '2020-07-15 07:42:23', '2020-07-15 07:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `cost_total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_orders`
--

INSERT INTO `tb_orders` (`id`, `name`, `phone`, `email`, `customer_address`, `cost_total`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Hoàng Phi', '0989324221', 'hoangphi.dev@gmail.com', 'Yên Mỹ - Tứ Yên - Sông Lô - Vĩnh Phúc', 1050000, 2, '2020-06-15 10:10:25', '2020-07-15 06:06:39'),
(7, 'Lương Minh Hằng', '0373821691', 'minhhang27121999@gmail.com', 'Tứ Yên - Sông Lô - Vĩnh Phúc', 540000, 0, '2020-06-15 10:21:13', '2020-06-15 10:21:13'),
(8, 'Hoàng Phi', '0989324221', 'hoangphi.dev@gmail.com', 'Vĩnh Phúc', 190000, 3, '2020-07-08 03:07:47', '2020-07-15 07:18:50'),
(9, 'Hoàng Phi', '0989324221', 'hoangphi.dev@gmail.com', 'Vĩnh Phúc', 190000, 2, '2020-07-08 03:15:33', '2020-07-15 07:38:46'),
(10, 'Hoàng Phi', '0989324221', 'hoangphi.dev@gmail.com', 'Vĩnh Phúc', 350000, 2, '2020-07-08 03:15:59', '2020-07-15 07:44:37'),
(11, 'Nguyên Trần', '0123456789', 'hoangphidev@gmail.com', 'Hà Nội', 540000, 3, '2020-07-14 15:06:45', '2020-07-14 16:38:51'),
(12, 'Lương Minh Hằng', '0373821691', 'minhhang27121999@gmail.com', 'Phú Cường - Tứ Yên - Sông Lô - Vĩnh Phúc', 540000, 2, '2020-07-14 20:22:20', '2020-07-15 07:40:51'),
(13, 'Hoàng Mỹ', '0989324221', 'hoangphi.dev@gmail.com', 'Phú Thượng - Tứ Yên - Sông Lô - Vĩnh Phúc', 2700000, 2, '2020-07-15 07:42:23', '2020-07-15 07:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_positions`
--

CREATE TABLE `tb_positions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unsigned_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_positions`
--

INSERT INTO `tb_positions` (`id`, `name`, `unsigned_name`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị hệ thống', 'quan-tri-he-thong', '2020-06-05 08:19:34', '2020-06-05 08:19:34'),
(2, 'Quản lý cửa hàng', 'quan-ly-cua-hang', '2020-06-05 08:19:56', '2020-06-05 08:19:56'),
(3, 'Nhân viên bán hàng', 'nhan-vien-ban-hang', '2020-06-05 08:20:07', '2020-06-07 09:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unsigned_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `sale` int(11) NOT NULL DEFAULT '0',
  `percent_promotion` int(11) DEFAULT NULL,
  `start_promotion` date DEFAULT NULL,
  `end_promotion` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `special` int(11) DEFAULT '0',
  `cate_id` int(11) NOT NULL,
  `carrier_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id`, `name`, `unsigned_name`, `price`, `description`, `images`, `amount`, `sale`, `percent_promotion`, `start_promotion`, `end_promotion`, `status`, `special`, `cate_id`, `carrier_id`, `created_at`, `updated_at`) VALUES
(3, 'Chuột máy tính LOGITECH M187 (Trắng)', 'chuot-may-tinh-logitech-m187-trang', 350000, 'TÍNH NĂNG NỔI BẬT\r\nThiết kế nhỏ gọn\r\nChuột không dây LOGITECH M187 có thiết kế nhỏ nhắn, có thể nằm gọn trong lòng bàn tay người dùng. Đây là sản phẩm lý tưởng để bạn có thể đem theo mọi nơi mà không lo tốn nhiều diện tích cất giữ. Các đường cong uốn lượn quanh thân chuột giúp chuột bo sát lòng bàn tay, tạo cảm giác cầm nắm chắc chắn và điều khiển dễ dàng hơn.\r\n\r\nCông nghệ kết nối không dây 2.4GHz tiên tiến\r\nLOGITECH M187 Trắng không chỉ nâng khoảng cách sử dụng chuột tối đa lên đến 10m, công nghệ kết nối không dây 2.4GHz còn đảm bảo dữ liệu được truyền tải liên tục, không bị gián đoạn và nhanh hơn 60% so với những công nghệ không dây cũ trước đây.\r\n\r\nThiết bị thu sóng nhỏ gọn\r\n Có thể gắn đầu thu sóng vào máy tính mà không cần phải tháo ra khi không sử dụng. Đầu thu sóng tích hợp công nghệ Nano Receiver cho phép nhận cùng lúc nhiều thiết bị khác nhau sử dụng cùng công nghệ. Đây sẽ là mảnh ghép tuyệt vời cho hệ thống máy tính hiện đại của bạn.', 'chuot-12-06-2020-NryiD1d7-chuot-co-day-genius-dx-125-den-ava-600x600.jpg', 91, 9, NULL, NULL, NULL, 1, 1, 1, 3, '2020-06-12 13:29:02', '2020-07-15 07:44:37'),
(9, 'Bàn phím giả cơ chuyên Game Marvo K616 Led 7 màu tự chuyển (Đen)', 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den', 190000, 'Marvo - 1 thương hiệu nổi tiếng đến từ Hong Kong chuyên lĩnh vực về thiết bị & phụ kiện Gaming như: Computer Speaker, Gaming Mouse, Gaming keyboard & combo, Gaming Headphone, Gaming Cooling pad, Computer Case, Gaming Chair, Gaming Mouse Pad, Game Pad,....\r\n\r\nXin giới thiệu đến các bạn sản phẩm: Bàn phím giả cơ chuyên Game Marvo K616 Led 7 màu tự chuyển\r\n\r\nNHÌN LÀ THÍCH!\r\nBạn là game thủ, Bạn chưa tìm được bàn phím chuyên chơi game nào thật ưng ý. Tin vui cho bạn, Bàn phím chuyên game cao cấp Marvo K616 led 7 màu tùy chỉnh - Một siêu phẩm của dòng bàn phím chuyên dành cho game thủ.\r\n\r\nThiết kế:\r\n- Bàn phím giả cơ chuyên Game Marvo K616 Led 7 màu tự chuyển được thiết kế đẹp mắt với hệ thống đèn led chuyển theo cụm màu tùy thích, Đèn Led cực kỳ nổi bật tỏa khắp bàn phím làm nổi bật các chữ và hình ảnh các logo, đường nét.\r\n\r\n Chất lượng vượt trội\r\n- Phím được khắc laser chống bay chữ, các nút phím theo chuẩn chơi game tạo cảm giác bám tốt vào ngón tay, gõ chữ cực êm.\r\n- Chân đế bàn phím chịu được lực cao.\r\n- Các chữ nổi bật màu sắc, sử dụng êm nhẹ, dễ dàng.\r\n- Có khả năng chống nước, va đập\r\n\r\n Phong các game thủ..\r\n- Ngoài ra phím còn được tích hợp hệ thống đèn led tùy chỉnh đổi màu bằng Fn + SL; hoặc cho các cụm đèn tự thay đổi liên tục (FN + PS) và tăng giảm độ sáng tối màu phím tùy thích ( Fn + up; Fn + Down ).\r\n- Núm cao su dưới bằng phím được làm từ chất liệu cao su tốt giúp phím có độ đàn hồi cao và nhận tín hiệu nhanh rất thích hợp cho game thủ ra chơi thoải mái hơn.\r\n- Ngoài ra bàn phím còn được thiết kế chống nước dưới bàn phím với 8 lỗ thoát nước rất nhanh giúp người dùng lỡ tay đỗ nước vào cũng ko ảnh hưởng đến các mạch bên trong.\r\n- Mặt bàn phím được phủ một lớp chống trầy đen bóng, và chữ trên phím được khắc lazer độ bền cực cao.', 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den-15-06-2020-4vg6y3ip-278b7bc4baf20057996b930d72a660fa.jpeg', 93, 7, NULL, NULL, NULL, 1, 0, 2, 3, '2020-06-13 09:06:42', '2020-07-15 07:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products_views`
--

CREATE TABLE `tb_products_views` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unsigned_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_products_views`
--

INSERT INTO `tb_products_views` (`id`, `product_id`, `unsigned_name`, `url`, `session_id`, `ip`, `agent`, `created_at`, `updated_at`) VALUES
(1, 9, 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den', 'http://localhost/hoangtu/public/detail/9/ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den.html', 'Y1m4fohsmcpklFQpDsWCrestrtJBMWKaFRD7qPmr', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-08 03:06:20', '2020-07-08 03:06:20'),
(2, 9, 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den', 'http://localhost/hoangtu/public/detail/9/ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den.html', 'Y1m4fohsmcpklFQpDsWCrestrtJBMWKaFRD7qPmr', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-08 03:06:46', '2020-07-08 03:06:46'),
(3, 9, 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den', 'http://localhost/hoangtu/public/detail/9/ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den.html', '4AHRxGfYZNcLTF54nkOSXTtxw6UVrSIK16RQz5ht', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-08 03:07:29', '2020-07-08 03:07:29'),
(4, 9, 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den', 'http://localhost/hoangtu/public/detail/9/ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den.html', '4AHRxGfYZNcLTF54nkOSXTtxw6UVrSIK16RQz5ht', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-08 03:15:22', '2020-07-08 03:15:22'),
(5, 3, 'chuot-may-tinh-logitech-m187-trang', 'http://localhost/hoangtu/public/detail/3/chuot-may-tinh-logitech-m187-trang.html', '4AHRxGfYZNcLTF54nkOSXTtxw6UVrSIK16RQz5ht', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-08 03:15:52', '2020-07-08 03:15:52'),
(6, 3, 'chuot-may-tinh-logitech-m187-trang', 'http://localhost/hoangtu/public/detail/3/chuot-may-tinh-logitech-m187-trang.html', '4AHRxGfYZNcLTF54nkOSXTtxw6UVrSIK16RQz5ht', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-08 04:02:53', '2020-07-08 04:02:53'),
(7, 3, 'chuot-may-tinh-logitech-m187-trang', 'http://localhost/hoangtu/public/detail/3/chuot-may-tinh-logitech-m187-trang.html', '4AHRxGfYZNcLTF54nkOSXTtxw6UVrSIK16RQz5ht', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-08 04:20:37', '2020-07-08 04:20:37'),
(8, 3, 'chuot-may-tinh-logitech-m187-trang', 'http://localhost/hoangtu/public/detail/3/chuot-may-tinh-logitech-m187-trang.html', 'WC6M7B3AoN0U504i6xFRp7Re4VBKD8anJErWRNkS', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-14 15:05:56', '2020-07-14 15:05:56'),
(9, 3, 'chuot-may-tinh-logitech-m187-trang', 'http://localhost/hoangtu/public/detail/3/chuot-may-tinh-logitech-m187-trang.html', 'WC6M7B3AoN0U504i6xFRp7Re4VBKD8anJErWRNkS', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-14 15:06:04', '2020-07-14 15:06:04'),
(10, 9, 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den', 'http://localhost/hoangtu/public/detail/9/ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den.html', 'WC6M7B3AoN0U504i6xFRp7Re4VBKD8anJErWRNkS', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-14 15:06:07', '2020-07-14 15:06:07'),
(11, 3, 'chuot-may-tinh-logitech-m187-trang', 'http://localhost/hoangtu/public/detail/3/chuot-may-tinh-logitech-m187-trang.html', 'Q0F0K0xUmakLX5UzZ7miTxZKOj2V51rVoYkGQ5Ci', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-14 20:20:06', '2020-07-14 20:20:06'),
(12, 9, 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den', 'http://localhost/hoangtu/public/detail/9/ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den.html', 'Q0F0K0xUmakLX5UzZ7miTxZKOj2V51rVoYkGQ5Ci', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-14 20:20:37', '2020-07-14 20:20:37'),
(13, 3, 'chuot-may-tinh-logitech-m187-trang', 'http://localhost/hoangtu/public/detail/3/chuot-may-tinh-logitech-m187-trang.html', 'JS46yu8XlKewTws3zpwKFvmgtBoRWVecieeT7EiX', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-15 07:41:29', '2020-07-15 07:41:29'),
(14, 9, 'ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den', 'http://localhost/hoangtu/public/detail/9/ban-phim-gia-co-chuyen-game-marvo-k616-led-7-mau-tu-chuyen-den.html', 'JS46yu8XlKewTws3zpwKFvmgtBoRWVecieeT7EiX', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/87.0.152 Chrome/81.0.4044.152 Safari/537.36', '2020-07-15 07:41:55', '2020-07-15 07:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locations` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `position_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `password`, `avatar`, `birthday`, `sex`, `phone`, `locations`, `facebook`, `status`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'Quản Trị Hệ Thống', 'admin@gmail.com', '$2y$10$JNSBUWigChCGBX/t/LsRvuoPdZ7DJ5K2KHjvVDJW/Zmj.eDSqaxtm', 'quan-tri-he-thong-1-13-06-2020-6x4NceUi-unnamed.png', NULL, 1, NULL, NULL, NULL, 1, 1, '2020-06-05 07:12:59', '2020-06-13 08:29:22'),
(2, 'Lương Minh Hằng', 'minhhangvlogs@gmail.com', '$2y$10$i.VQdeyKh0BKF7zSF.zNieDd8UQSxrZuf5nZei9ELhhohAI1u7Gvq', 'hang.jpg', '1999-12-29', 1, '0373821691', 'Phú Cường, Yên Lương, Tứ Yên, Sông Lô, Vĩnh Phúc', 'https://www.facebook.com/LuongMinhHangOfficial', 1, 3, '2020-06-05 07:20:30', '2020-06-08 07:59:38'),
(3, 'Phi Hoàng', 'hoangphi.dev@gmail.com', '$2y$10$wOnFW5GOQ3Mx.vhy25vXWO2XEPsdYyw4d7SkQzF82OfZ2jI69fD.G', 'phi-hoang-3-12-06-2020-ueUqVeE8-profile-img.jpg', '1998-02-09', 0, '0867604321', 'Xóm Sơn Tiến, xã Quyết Thắng, TP Thái Nguyên, tỉnh Thái Nguyên', 'https://www.facebook.com/PhiHoangOfficial', 1, 2, '2020-06-05 07:21:42', '2020-06-12 04:12:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_banners`
--
ALTER TABLE `tb_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_carriers`
--
ALTER TABLE `tb_carriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_details`
--
ALTER TABLE `tb_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_positions`
--
ALTER TABLE `tb_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_products_views`
--
ALTER TABLE `tb_products_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_banners`
--
ALTER TABLE `tb_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_carriers`
--
ALTER TABLE `tb_carriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_details`
--
ALTER TABLE `tb_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_positions`
--
ALTER TABLE `tb_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_products_views`
--
ALTER TABLE `tb_products_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
