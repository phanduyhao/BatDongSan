-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 28, 2025 lúc 05:44 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `batdongsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_id` bigint UNSIGNED DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `ward_id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, NULL, 3, 11.03868040, 106.30448020, '2025-03-15 22:13:10', '2025-03-15 22:13:10'),
(4, NULL, 4, 21.04569420, 105.84825030, '2025-03-15 22:22:22', '2025-03-15 22:22:22'),
(5, NULL, 5, 22.49897690, 103.97510830, '2025-03-16 01:52:46', '2025-03-16 01:52:46'),
(6, NULL, 6, 20.96357120, 105.87015090, '2025-03-16 02:00:05', '2025-03-16 02:00:05'),
(10, NULL, 10, 21.02813000, 105.85358000, '2025-03-16 02:17:29', '2025-03-16 02:17:29'),
(11, NULL, 11, 22.14413000, 105.27277000, '2025-03-16 02:19:13', '2025-03-16 02:19:13'),
(12, NULL, 12, 22.27720000, 106.48332000, '2025-03-16 02:51:14', '2025-03-16 02:51:14'),
(13, NULL, 13, 21.06632000, 105.81972000, '2025-03-16 02:55:03', '2025-03-16 02:55:03'),
(15, NULL, 14, 22.19801390, 102.45350510, '2025-03-16 02:58:25', '2025-03-16 02:58:25'),
(16, NULL, 15, 21.32010000, 105.29156000, '2025-03-16 03:00:35', '2025-03-16 03:00:35'),
(17, NULL, 4, 21.03587000, 105.82163000, '2025-03-17 10:38:20', '2025-03-17 10:38:20'),
(18, NULL, 16, 21.02813000, 105.85358000, '2025-03-20 07:21:31', '2025-03-20 07:21:31'),
(19, NULL, 17, 16.16667000, 107.83333000, '2025-03-20 07:48:47', '2025-03-20 07:48:47'),
(20, NULL, 16, NULL, NULL, '2025-03-22 07:50:10', '2025-03-25 07:44:38'),
(27, NULL, 16, NULL, NULL, '2025-03-25 07:22:46', '2025-03-25 08:14:11'),
(28, NULL, 24, 21.02813000, 105.85358000, '2025-03-25 07:29:42', '2025-03-25 07:29:42'),
(30, NULL, 24, NULL, NULL, '2025-03-25 07:55:07', '2025-03-28 08:42:25'),
(35, NULL, 4, 21.03587000, 105.82163000, '2025-03-28 10:16:11', '2025-03-28 10:16:11'),
(37, NULL, 30, 21.02744000, 105.79026000, '2025-03-28 10:36:54', '2025-03-28 10:36:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidangs`
--

CREATE TABLE `baidangs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `address_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` json DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` bigint DEFAULT NULL,
  `dientich` decimal(10,0) DEFAULT NULL,
  `bedrooms` int NOT NULL DEFAULT '0',
  `bathrooms` int NOT NULL DEFAULT '0',
  `huongnha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noithat` tinyint(1) DEFAULT '0',
  `adminduyet` tinyint(1) DEFAULT '0',
  `status` enum('cosan','dathue','hethan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cosan',
  `mohinh` enum('thue','ban','chuyennhuong','oghep') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isVip` tinyint(1) NOT NULL DEFAULT '0',
  `expired_at` timestamp NULL DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `huongbancong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thietbis` json DEFAULT NULL,
  `loainhadat_id` bigint UNSIGNED NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lienhe_id` bigint UNSIGNED NOT NULL,
  `baidangchitiet_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baidangs`
--

INSERT INTO `baidangs` (`id`, `user_id`, `address_id`, `title`, `slug`, `images`, `description`, `price`, `dientich`, `bedrooms`, `bathrooms`, `huongnha`, `noithat`, `adminduyet`, `status`, `mohinh`, `created_at`, `updated_at`, `isVip`, `expired_at`, `age`, `huongbancong`, `thietbis`, `loainhadat_id`, `thumb`, `lienhe_id`, `baidangchitiet_id`) VALUES
(21, 1, 35, 'Cho thuê nhà riêng 1 trệt, 1 lầu, 2 phòng ngủ, 3WC, Dtich sử dụng: 84m2, 12.5 tr/tháng', 'cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-21', '[\"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bbb238.jpg\", \"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bbb764.jpg\", \"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bbbb49.jpg\", \"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bbbf96.jpg\", \"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bbc395.jpg\", \"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bbc78e.jpg\", \"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bc19e2.jpg\", \"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bc1e45.jpg\", \"/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bc2334.jpg\"]', '<p>Cho thu&ecirc; nh&agrave; ri&ecirc;ng 1 trệt, 1 lầu, 2 ph&ograve;ng ngủ, 3WC, Dtich sử dụng: 90m&sup2;, 12.5 tr/th&aacute;ng:<br />\r\n- 5 ph&uacute;t ra trung t&acirc;m quận 1, thuận tiện cho đi l&agrave;m.<br />\r\n- gần đường Nguyễn Hữu Cảnh, gần ga metro Văn Th&aacute;nh, T&acirc;n Cảng, thuận tiện đi metro.<br />\r\n- gần chợ, gần trường học cấp 1, cấp 2<br />\r\n- khu vực cao r&aacute;o, ko ngập nước<br />\r\n- trước nh&agrave; c&oacute; s&acirc;n để xe chung rộng r&atilde;i, khu d&acirc;n cư y&ecirc;n tĩnh</p>', 12500000, 84, 3, 1, 'Đông Bắc', 0, 1, 'cosan', 'thue', '2025-03-28 10:16:11', '2025-03-28 10:16:11', 1, NULL, '0 - 5 Năm', 'Nam', '[{\"icon\": \"/temp/images/thietbi/dieu-hoa.jpg\", \"name\": \"Điều hòa\"}, {\"icon\": \"/temp/images/thietbi/tu-quan-ao.jpg\", \"name\": \"Tủ quần áo\"}, {\"icon\": \"/temp/images/thietbi/nong-lanh.jpg\", \"name\": \"Nóng lạnh\"}, {\"icon\": \"/temp/images/thietbi/tu-lanh.jpg\", \"name\": \"Tủ lạnh\"}, {\"icon\": \"/temp/images/thietbi/bep-ga.jpg\", \"name\": \"Bếp ga\"}, {\"icon\": \"/temp/images/thietbi/ti-vi.jpg\", \"name\": \"Ti vi\"}, {\"icon\": \"/temp/images/thietbi/may-giat.jpg\", \"name\": \"Máy giặt\"}, {\"icon\": \"/temp/images/thietbi/bao-ve.jpg\", \"name\": \"Bảo vệ\"}, {\"icon\": \"/temp/images/thietbi/bai-do-xe.jpg\", \"name\": \"Bãi đỗ xe\"}, {\"icon\": \"/temp/images/thietbi/internet.jpg\", \"name\": \"Internet\"}]', 5, '/temp/images/baidang/cho-thue-nha-rieng-1-tret-1-lau-2-phong-ngu-3wc-dtich-su-dung-84m2-125-trthang-1743182171-67e6d95bbb238.jpg', 27, 10),
(22, 1, 37, 'Chính chủ căn View vườn hoa đường 15m dự án Himlam Boulevard Vị trí Vàng đẹp nhất Himlam Thường Tín', 'chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-22', '[\"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183414-67e6de36f2b28.jpg\", \"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183414-67e6de36f3120.jpg\", \"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183414-67e6de36f357f.jpg\", \"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183414-67e6de36f3ad7.jpg\", \"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183414-67e6de36f4023.jpg\", \"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183415-67e6de370028d.jpg\", \"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183415-67e6de3700832.jpg\", \"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183415-67e6de3700ca5.jpg\", \"/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183415-67e6de37011e8.jpg\"]', '<p>Ch&iacute;nh chủ căn View vườn hoa đường 15m dự &aacute;n Himlam Boulevard<br />\r\nDiện t&iacute;ch 75m mặt tiền 5m x&acirc;y 5 tầng<br />\r\nXung quanh khu h&agrave;nh ch&iacute;nh c&ocirc;ng thường t&iacute;n<br />\r\nC&aacute;ch 500m đến khu phố ấm thực<br />\r\nGần vườn hoa khu vui chơi giải tr&iacute;<br />\r\nC&aacute;ch 1km đến trường cấp 2.3 v&agrave; Trường gi&aacute;o dục Thường Xuy&ecirc;n<br />\r\nC&aacute;ch 500km Gần Trường cao đẳng truyền h&igrave;nh v&agrave; Bệnh viện đa khoa thường t&iacute;n<br />\r\nTiện &iacute;ch nhiều c&ocirc;ng năng<br />\r\nGi&aacute; Nhỉnh 13 tỷ<br />\r\nGiảm gi&aacute; s&acirc;u cho kh&aacute;ch thiện ch&iacute;</p>', 13000000000, 74, 7, 3, NULL, 0, 1, 'cosan', 'ban', '2025-03-28 10:36:55', '2025-03-28 10:36:55', 1, NULL, '0 - 5 Năm', NULL, '[{\"icon\": \"/temp/images/thietbi/dieu-hoa.jpg\", \"name\": \"Điều hòa\"}, {\"icon\": \"/temp/images/thietbi/tu-quan-ao.jpg\", \"name\": \"Tủ quần áo\"}, {\"icon\": \"/temp/images/thietbi/nong-lanh.jpg\", \"name\": \"Nóng lạnh\"}, {\"icon\": \"/temp/images/thietbi/tu-lanh.jpg\", \"name\": \"Tủ lạnh\"}, {\"icon\": \"/temp/images/thietbi/bep-ga.jpg\", \"name\": \"Bếp ga\"}, {\"icon\": \"/temp/images/thietbi/ti-vi.jpg\", \"name\": \"Ti vi\"}, {\"icon\": \"/temp/images/thietbi/may-giat.jpg\", \"name\": \"Máy giặt\"}, {\"icon\": \"/temp/images/thietbi/bao-ve.jpg\", \"name\": \"Bảo vệ\"}, {\"icon\": \"/temp/images/thietbi/bai-do-xe.jpg\", \"name\": \"Bãi đỗ xe\"}, {\"icon\": \"/temp/images/thietbi/internet.jpg\", \"name\": \"Internet\"}]', 7, '/temp/images/baidang/chinh-chu-can-view-vuon-hoa-duong-15m-du-an-himlam-boulevard-vi-tri-vang-dep-nhat-himlam-thuong-tin-1743183414-67e6de36f2b28.jpg', 29, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang_chitiets`
--

CREATE TABLE `baidang_chitiets` (
  `id` bigint UNSIGNED NOT NULL,
  `sophong` int DEFAULT NULL,
  `sotang` int DEFAULT NULL,
  `hoahong` int DEFAULT NULL,
  `thangdatcoc` int DEFAULT NULL,
  `thangtratruoc` int DEFAULT NULL,
  `hopdong` enum('1thang','6thang','1nam') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baidang_chitiets`
--

INSERT INTO `baidang_chitiets` (`id`, `sophong`, `sotang`, `hoahong`, `thangdatcoc`, `thangtratruoc`, `hopdong`, `video`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 2, 2, 2, '1thang', NULL, '2025-03-20 07:48:47', '2025-03-20 07:48:47'),
(3, 2, 2, 2, 2, 2, '1thang', NULL, '2025-03-22 07:50:10', '2025-03-22 07:50:10'),
(6, 2, 2, 2, 2, 2, '1thang', NULL, '2025-03-25 07:22:46', '2025-03-25 07:22:46'),
(7, 2, 2, 2, 2, 2, '1thang', NULL, '2025-03-25 07:29:42', '2025-03-25 07:29:42'),
(9, 2, 2, 2, 2, 2, '1thang', NULL, '2025-03-25 07:55:07', '2025-03-25 07:55:07'),
(10, 4, 1, 12, 1, 1, '6thang', NULL, '2025-03-28 10:16:11', '2025-03-28 10:16:11'),
(12, 6, 3, 12, 1, 1, NULL, NULL, '2025-03-28 10:36:54', '2025-03-28 10:36:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang_lienhes`
--

CREATE TABLE `baidang_lienhes` (
  `id` bigint UNSIGNED NOT NULL,
  `agent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zalo_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loailienhe` enum('moigioi','daidien','chunha') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baidang_lienhes`
--

INSERT INTO `baidang_lienhes` (`id`, `agent_name`, `phone`, `email`, `zalo_link`, `created_at`, `updated_at`, `loailienhe`, `facebook`, `telegram`) VALUES
(11, 'Phan Duy Hào', '0855840100', 'maidg1302@gmail.com', 'https://zalo.me/0855840100', '2025-03-17 10:38:20', '2025-03-17 10:38:20', NULL, NULL, NULL),
(12, 'Phan Duy Hào', '423425325', 'maidg1302@gmail.com', NULL, '2025-03-20 07:21:31', '2025-03-20 07:21:31', NULL, NULL, NULL),
(13, 'Phan Duy Hào', '12313131445', 'maidg1302@gmail.com', NULL, '2025-03-20 07:48:47', '2025-03-20 07:48:47', NULL, NULL, NULL),
(14, 'Phan Duy Hào', '1231231244', 'maidg1302@gmail.com', NULL, '2025-03-22 07:50:10', '2025-03-22 07:50:10', NULL, NULL, NULL),
(21, 'Phan Duy Hào', '1231231244', 'maidg1302@gmail.com', NULL, '2025-03-25 07:22:46', '2025-03-25 07:22:46', NULL, NULL, NULL),
(22, 'Phan Duy Hào123', '3234324543', 'maidg1302@gmail.com', NULL, '2025-03-25 07:29:42', '2025-03-25 07:29:42', NULL, NULL, NULL),
(24, 'Phan Duy Hào123', '3234324543', 'maidg1302@gmail.com', NULL, '2025-03-25 07:55:07', '2025-03-28 08:42:25', 'moigioi', NULL, NULL),
(27, 'Phan Duy Hào123', '3234324543', 'maidg1302@gmail.com', NULL, '2025-03-28 10:16:11', '2025-03-28 10:16:11', 'moigioi', NULL, NULL),
(29, 'Phan Duy Hào123', '3234324543', 'maidg1302@gmail.com', NULL, '2025-03-28 10:36:54', '2025-03-28 10:36:54', 'moigioi', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `province_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(3, 4, 'Thành phố Cao Bằng', '40', '2025-03-15 22:13:10', '2025-03-15 22:13:10'),
(4, 5, 'Quận Ba Đình', '1', '2025-03-15 22:22:22', '2025-03-15 22:22:22'),
(5, 6, 'Thành phố Lào Cai', '80', '2025-03-16 01:52:46', '2025-03-16 01:52:46'),
(6, 5, 'Quận Hoàng Mai', '8', '2025-03-16 02:00:05', '2025-03-16 02:00:05'),
(10, 5, 'Quận Hoàn Kiếm', '2', '2025-03-16 02:17:29', '2025-03-16 02:17:29'),
(11, 8, 'Huyện Chiêm Hóa', '73', '2025-03-16 02:19:13', '2025-03-16 02:19:13'),
(12, 9, 'Huyện Tràng Định', '180', '2025-03-16 02:51:14', '2025-03-16 02:51:14'),
(13, 5, 'Quận Tây Hồ', '3', '2025-03-16 02:55:03', '2025-03-16 02:55:03'),
(14, 10, 'Huyện Mường Nhé', '96', '2025-03-16 02:58:25', '2025-03-16 02:58:25'),
(15, 11, 'Huyện Lâm Thao', '237', '2025-03-16 03:00:35', '2025-03-16 03:00:35'),
(16, 10, 'Huyện Mường Chà', '97', '2025-03-20 07:48:47', '2025-03-20 07:48:47'),
(26, 5, 'Quận Cầu Giấy', '5', '2025-03-28 10:36:54', '2025-03-28 10:36:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `baidang_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainhadats`
--

CREATE TABLE `loainhadats` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loainhadats`
--

INSERT INTO `loainhadats` (`id`, `title`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(4, 'Căn hộ chung cư', 'can-ho-chung-cu', '/temp/images/loainhadat/can-ho-chung-cu.jpg', '2025-03-28 09:21:41', '2025-03-28 10:31:06'),
(5, 'Nhà dân', 'nha-dan', '/temp/images/loainhadat/nha-dan.jpg', '2025-03-28 09:21:49', '2025-03-28 10:30:59'),
(6, 'Phòng trọ', 'phong-tro', '/temp/images/loainhadat/phong-tro.jpg', '2025-03-28 09:21:58', '2025-03-28 10:30:52'),
(7, 'Biệt thự', 'biet-thu', '/temp/images/loainhadat/biet-thu.jpg', '2025-03-28 09:22:09', '2025-03-28 10:30:42'),
(8, 'Khách sạn', 'khach-san', '/temp/images/loainhadat/khach-san.jpg', '2025-03-28 09:22:19', '2025-03-28 10:30:36'),
(9, 'Văn phòng công ty', 'van-phong-cong-ty', '/temp/images/loainhadat/van-phong-cong-ty.jpg', '2025-03-28 09:22:29', '2025-03-28 10:30:28'),
(10, 'Mặt bằng kinh doanh', 'mat-bang-kinh-doanh', '/temp/images/loainhadat/mat-bang-kinh-doanh.jpg', '2025-03-28 09:22:40', '2025-03-28 10:30:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_03_12_142359_create_users_table', 1),
(4, '2025_03_12_142508_create_settings_table', 1),
(5, '2025_03_12_143524_addresses', 1),
(6, '2025_03_12_145722_create_loainhadats_table', 1),
(7, '2025_03_12_153615_baidangs', 1),
(8, '2025_03_12_164230_baidang_lienhes', 2),
(9, '2025_03_13_141419_create_sessions_table', 3),
(10, '2025_03_15_152416_update_baidang', 4),
(11, '2025_03_15_172625_update_baidang2', 5),
(12, '2025_03_16_021234_update_baidang3', 6),
(13, '2025_03_16_025949_update_diachi', 7),
(14, '2025_03_16_031010_update_baidang4', 8),
(15, '2025_03_16_162121_create_favourite', 9),
(16, '2025_03_16_162517_create_favourite', 10),
(17, '2025_03_17_172550_update_baidang6', 11),
(18, '2025_03_17_173312_update_baidang_lienhe', 12),
(19, '2025_03_19_165841_baidang_chitiet', 13),
(20, '2025_03_20_143735_update_baidang7', 14),
(21, '2025_03_22_083440_create_password_resets_table', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@gmail.com', 'zfwo8ex7gNdUmWkORrxWK2t0NaUXS7VKOeRUARuzhTh0YptUtuLUQXFeTav3bOaV', '2025-03-22 01:36:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(4, 'Tỉnh Cao Bằng', '4', '2025-03-15 22:13:10', '2025-03-15 22:13:10'),
(5, 'Thành phố Hà Nội', '1', '2025-03-15 22:22:22', '2025-03-15 22:22:22'),
(6, 'Tỉnh Lào Cai', '10', '2025-03-16 01:52:46', '2025-03-16 01:52:46'),
(8, 'Tỉnh Tuyên Quang', '8', '2025-03-16 02:19:13', '2025-03-16 02:19:13'),
(9, 'Tỉnh Lạng Sơn', '20', '2025-03-16 02:51:14', '2025-03-16 02:51:14'),
(10, 'Tỉnh Điện Biên', '11', '2025-03-16 02:58:25', '2025-03-16 02:58:25'),
(11, 'Tỉnh Phú Thọ', '25', '2025-03-16 03:00:35', '2025-03-16 03:00:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BXfUwE3B63avAGD8qXf0RyI2w2LueCSrBqQGEC42', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSHcySGZlWkZoY0tISGxYdTVOekZqQVF3N1JjaE8yeUFxUE02TkRBdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9iYXRkb25nc2FuLnRlc3Q6ODA4MCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1743183806);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(6, 'logo', '/temp/images/settings/logo.jpg', NULL, '2025-03-21 20:24:39'),
(7, 'banner', '/temp/images/settings/banner.jpg', NULL, '2025-03-22 02:19:12'),
(8, 'phone', '0855840100', NULL, '2025-03-22 02:19:27'),
(9, 'email', 'maidg1302@gmail.com', NULL, '2025-03-22 02:19:27'),
(10, 'address', '63 Hoàng Phan Thái, xóm 17, xã Nghi Phú, thành phố Vinh, Nghệ An , Việt Nam', NULL, '2025-03-26 06:36:22'),
(11, 'link_fb', 'https://www.facebook.com/haostbv.duy/', NULL, '2025-03-26 06:36:21'),
(12, 'tudongduyet', '1', NULL, '2025-03-27 10:17:57'),
(13, 'link_telegram', 'https://telegram', NULL, '2025-03-26 06:36:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbis`
--

CREATE TABLE `thietbis` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thietbis`
--

INSERT INTO `thietbis` (`id`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(7, 'Điều hòa', '/temp/images/thietbi/dieu-hoa.jpg', '2025-03-28 09:58:22', '2025-03-28 09:58:22'),
(8, 'Tủ quần áo', '/temp/images/thietbi/tu-quan-ao.jpg', '2025-03-28 09:58:30', '2025-03-28 09:58:30'),
(9, 'Nóng lạnh', '/temp/images/thietbi/nong-lanh.jpg', '2025-03-28 09:58:39', '2025-03-28 09:58:39'),
(10, 'Tủ lạnh', '/temp/images/thietbi/tu-lanh.jpg', '2025-03-28 09:58:48', '2025-03-28 09:58:48'),
(11, 'Bếp ga', '/temp/images/thietbi/bep-ga.jpg', '2025-03-28 09:58:58', '2025-03-28 09:58:58'),
(12, 'Ti vi', '/temp/images/thietbi/ti-vi.jpg', '2025-03-28 09:59:05', '2025-03-28 09:59:05'),
(13, 'Máy giặt', '/temp/images/thietbi/may-giat.jpg', '2025-03-28 09:59:13', '2025-03-28 09:59:13'),
(14, 'Bảo vệ', '/temp/images/thietbi/bao-ve.jpg', '2025-03-28 09:59:50', '2025-03-28 09:59:50'),
(15, 'Bãi đỗ xe', '/temp/images/thietbi/bai-do-xe.jpg', '2025-03-28 09:59:58', '2025-03-28 09:59:58'),
(16, 'Internet', '/temp/images/thietbi/internet.jpg', '2025-03-28 10:00:06', '2025-03-28 10:00:06'),
(17, 'Dọn vệ sinh', '/temp/images/thietbi/don-ve-sinh.jpg', '2025-03-28 10:00:15', '2025-03-28 10:00:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin','nhanvien') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Phan Duy Hào123', 'maidg1302@gmail.com', '$2y$12$InxKnQfUAGDtEWLa4zpJfes5Tt06KTOBPg//fgElwG2/tHuGf7THK', '3234324543', '/temp/images/avatar/phan-duy-hao123.jpg', 'admin', '2025-03-13 09:04:40', '2025-03-27 08:33:46'),
(2, 'test', 'test@gmail.com', '$2y$12$7pd9eX6b6g5Pf4Aet.JX7.iJC3oyewqq.Yv/z6HjDWqUbWxbJueO2', NULL, '/temp/images/baidang/dfdsfs-1742116649-67d697291098f.jpg', 'user', '2025-03-14 19:38:58', '2025-03-14 19:38:58'),
(5, 'Phan Duy Hào', 'haomrvuii@gmail.com', '$2y$12$FslMm3eUZgWwanrD7w7YsOjuR3HG1m1Yuf.ja5IaoDr/lk7H1cXee', '0904848855', NULL, 'user', '2025-03-24 07:30:26', '2025-03-24 07:30:26'),
(6, 'test2', 'test2@gmail.com', '$2y$12$InxKnQfUAGDtEWLa4zpJfes5Tt06KTOBPg//fgElwG2/tHuGf7THK', '0855840100', NULL, 'nhanvien', '2025-03-25 10:26:52', '2025-03-25 10:26:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wards`
--

CREATE TABLE `wards` (
  `id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wards`
--

INSERT INTO `wards` (`id`, `district_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(3, 3, 'Phường Sông Hiến', '1267', '2025-03-15 22:13:10', '2025-03-15 22:13:10'),
(4, 4, 'Phường Phúc Xá', '1', '2025-03-15 22:22:22', '2025-03-15 22:22:22'),
(5, 5, 'Phường Duyên Hải', '2635', '2025-03-16 01:52:46', '2025-03-16 01:52:46'),
(6, 6, 'Phường Yên Sở', '340', '2025-03-16 02:00:05', '2025-03-16 02:00:05'),
(10, 10, 'Phường Hàng Đào', '49', '2025-03-16 02:17:29', '2025-03-16 02:17:29'),
(11, 11, 'Xã Xuân Quang', '2326', '2025-03-16 02:19:13', '2025-03-16 02:19:13'),
(12, 12, 'Xã Tân Minh', '6028', '2025-03-16 02:51:14', '2025-03-16 02:51:14'),
(13, 13, 'Phường Tứ Liên', '97', '2025-03-16 02:55:03', '2025-03-16 02:55:03'),
(14, 14, 'Xã Mường Nhé', '3160', '2025-03-16 02:58:25', '2025-03-16 02:58:25'),
(15, 15, 'Xã Cao Xá', '8527', '2025-03-16 03:00:35', '2025-03-16 03:00:35'),
(16, 10, 'Phường Đồng Xuân', '40', '2025-03-20 07:21:31', '2025-03-20 07:21:31'),
(17, 16, 'Xã Mường Tùng', '3181', '2025-03-20 07:48:47', '2025-03-20 07:48:47'),
(24, 10, 'Phường Hàng Buồm', '46', '2025-03-25 07:29:42', '2025-03-25 07:29:42'),
(30, 26, 'Phường Nghĩa Tân', '160', '2025-03-28 10:36:54', '2025-03-28 10:36:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_ward_id_foreign` (`ward_id`);

--
-- Chỉ mục cho bảng `baidangs`
--
ALTER TABLE `baidangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `baidangs_slug_unique` (`slug`),
  ADD KEY `baidangs_user_id_foreign` (`user_id`),
  ADD KEY `baidangs_address_id_foreign` (`address_id`),
  ADD KEY `baidangs_loainhadat_id_foreign` (`loainhadat_id`),
  ADD KEY `baidangs_lienhe_id_foreign` (`lienhe_id`),
  ADD KEY `baidangs_baidangchitiet_id_foreign` (`baidangchitiet_id`);

--
-- Chỉ mục cho bảng `baidang_chitiets`
--
ALTER TABLE `baidang_chitiets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `baidang_chitiets_video_unique` (`video`);

--
-- Chỉ mục cho bảng `baidang_lienhes`
--
ALTER TABLE `baidang_lienhes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_baidang_id_foreign` (`baidang_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loainhadats`
--
ALTER TABLE `loainhadats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provinces_name_unique` (`name`),
  ADD UNIQUE KEY `provinces_code_unique` (`code`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thietbis`
--
ALTER TABLE `thietbis`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wards_district_id_foreign` (`district_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `baidangs`
--
ALTER TABLE `baidangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `baidang_chitiets`
--
ALTER TABLE `baidang_chitiets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `baidang_lienhes`
--
ALTER TABLE `baidang_lienhes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loainhadats`
--
ALTER TABLE `loainhadats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thietbis`
--
ALTER TABLE `thietbis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ward_id_foreign` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `baidangs`
--
ALTER TABLE `baidangs`
  ADD CONSTRAINT `baidangs_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `baidangs_baidangchitiet_id_foreign` FOREIGN KEY (`baidangchitiet_id`) REFERENCES `baidang_chitiets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `baidangs_lienhe_id_foreign` FOREIGN KEY (`lienhe_id`) REFERENCES `baidang_lienhes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `baidangs_loainhadat_id_foreign` FOREIGN KEY (`loainhadat_id`) REFERENCES `loainhadats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `baidangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_baidang_id_foreign` FOREIGN KEY (`baidang_id`) REFERENCES `baidangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
