-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 20, 2025 lúc 05:29 PM
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
(19, NULL, 17, 16.16667000, 107.83333000, '2025-03-20 07:48:47', '2025-03-20 07:48:47');

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
  `price` int DEFAULT NULL,
  `dientich` decimal(10,0) NOT NULL,
  `bedrooms` int NOT NULL DEFAULT '0',
  `bathrooms` int NOT NULL DEFAULT '0',
  `huongnha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noithat` tinyint(1) DEFAULT '0',
  `adminduyet` tinyint(1) DEFAULT '0',
  `status` enum('cosan','dathue','hethan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cosan',
  `mohinh` enum('thue','ban') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(11, 1, 17, 'ggfhfghgfh', 'ggfhfghgfh-11', '[\"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4745c.png\", \"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4bbad.png\", \"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4c44c.gif\", \"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4e6f4.jpg\", \"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c568bb.jpg\"]', '<p>Cho thu&ecirc; căn hộ Masteri Thảo Điền sống sang giữa l&ograve;ng Thảo Điền!<br />\r\n<br />\r\nBạn đang t&igrave;m kiếm căn hộ cho thu&ecirc; tại Thảo Điền, nơi hội tụ sự đẳng cấp, hiện đại v&agrave; tiện nghi? Masteri Thảo Điền ch&iacute;nh l&agrave; lựa chọn ho&agrave;n hảo cho bạn vị tr&iacute; v&agrave;ng, thiết kế tinh tế v&agrave; cộng đồng cư d&acirc;n văn minh.<br />\r\n<br />\r\nTổng quan dự &aacute;n Masteri Thảo Điền.<br />\r\n<br />\r\nVị tr&iacute;: Mặt tiền V&otilde; Nguy&ecirc;n Gi&aacute;p, phường Thảo Điền, TP. Thủ Đức.<br />\r\n<br />\r\nKết nối: 1 ph&uacute;t đến Ga Metro số 7 An Ph&uacute;, 10 ph&uacute;t đến trung t&acirc;m Quận 1.<br />\r\n<br />\r\nTiện &iacute;ch nội khu: Hồ bơi tr&agrave;n bờ, ph&ograve;ng gym cao cấp, c&ocirc;ng vi&ecirc;n xanh, khu BBQ, s&acirc;n chơi trẻ em, trung t&acirc;m thương mại Vincom Mega Mall ngay b&ecirc;n dưới.<br />\r\n<br />\r\nAn ninh: Bảo vệ 24/7, thẻ từ thang m&aacute;y, camera gi&aacute;m s&aacute;t to&agrave;n khu.<br />\r\n<br />\r\nCăn hộ cho thu&ecirc; đa dạng ph&ugrave; hợp mọi nhu cầu.<br />\r\n<br />\r\nHiện ch&uacute;ng t&ocirc;i c&oacute; nhiều căn hộ cho thu&ecirc; tại Masteri Thảo Điền với đầy đủ loại h&igrave;nh, đ&aacute;p ứng mọi nhu cầu sống v&agrave; ng&acirc;n s&aacute;ch:<br />\r\n<br />\r\nCăn hộ 1 ph&ograve;ng ngủ tiện nghi, ấm c&uacute;ng.<br />\r\n<br />\r\nDiện t&iacute;ch: 45, 55m.<br />\r\nGi&aacute; thu&ecirc;: Từ 15 triệu/th&aacute;ng.<br />\r\nPh&ugrave; hợp cho người độc th&acirc;n hoặc cặp đ&ocirc;i trẻ.<br />\r\n<br />\r\nCăn hộ 2 ph&ograve;ng ngủ Tho&aacute;ng m&aacute;t, view đẹp.<br />\r\n<br />\r\nDiện t&iacute;ch: 65m&sup2;, 70m, 72m&sup2;, 75m&sup2;, 77m&sup2;.<br />\r\nGi&aacute; thu&ecirc;: Từ 16 triệu/th&aacute;ng.<br />\r\nPh&ugrave; hợp gia đ&igrave;nh nhỏ hoặc người đi l&agrave;m cần kh&ocirc;ng gian ri&ecirc;ng.<br />\r\n<br />\r\nCăn hộ 3 ph&ograve;ng ngủ Rộng r&atilde;i, thiết kế tinh tế.<br />\r\n<br />\r\nDiện t&iacute;ch: 88m&sup2;, 90m&sup2;, 95m&sup2;, 100m.<br />\r\nGi&aacute; thu&ecirc;: Từ 23 triệu/th&aacute;ng.<br />\r\nL&yacute; tưởng cho gia đ&igrave;nh c&oacute; con nhỏ, sinh hoạt thoải m&aacute;i.<br />\r\n<br />\r\nDuplex th&ocirc;ng tầng.<br />\r\n<br />\r\nThiết kế 2 tầng hiện đại, nội thất cao cấp.<br />\r\nGi&aacute; thu&ecirc;: Từ 40 triệu/th&aacute;ng.<br />\r\nThể hiện phong c&aacute;ch sống kh&aacute;c biệt, ph&aacute; c&aacute;ch.<br />\r\n<br />\r\nPenthouse Tuyệt t&aacute;c tr&ecirc;n cao.<br />\r\n<br />\r\nDiện t&iacute;ch lớn, view to&agrave;n cảnh s&ocirc;ng S&agrave;i G&ograve;n.<br />\r\nNội thất sang trọng, ban c&ocirc;ng rộng, &aacute;nh s&aacute;ng tự nhi&ecirc;n.<br />\r\nGi&aacute; thu&ecirc;: Từ 50 triệu/th&aacute;ng.<br />\r\nD&agrave;nh cho kh&aacute;ch h&agrave;ng y&ecirc;u sự ri&ecirc;ng tư v&agrave; đẳng cấp.<br />\r\n<br />\r\nV&igrave; Sao N&ecirc;n Thu&ecirc; Căn Hộ Tại Masteri Thảo Điền?<br />\r\nVị tr&iacute; trung t&acirc;m Thảo Điền, nơi tập trung người nước ngo&agrave;i, chuy&ecirc;n gia cao cấp.<br />\r\nGi&aacute; thu&ecirc; hợp l&yacute;, linh hoạt theo nhu cầu.<br />\r\nChủ nh&agrave; th&acirc;n thiện, hỗ trợ nhiệt t&igrave;nh, hợp đồng r&otilde; r&agrave;ng.<br />\r\nNội thất đầy đủ, chỉ cần x&aacute;ch vali v&agrave;o ở.<br />\r\nMiễn ph&iacute; tư vấn Hỗ trợ xem nh&agrave; 24/7.<br />\r\nLi&ecirc;n Hệ Ngay Để Được Tư Vấn V&agrave; Xem Nh&agrave; Miễn Ph&iacute;.</p>', 170000, 100, 2, 2, 'Tây', 0, 1, 'cosan', 'thue', '2025-03-17 10:38:20', '2025-03-17 10:38:20', 1, NULL, '0 - 5 Năm', 'Tây', '[{\"icon\": null, \"name\": \"bếp\"}, {\"icon\": \"/temp/images/thietbi/dsfdsf.jpg\", \"name\": \"dsfdsf\"}]', 2, '/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4745c.png', 11, NULL),
(14, 1, 17, 'ggfhfghgfh', 'ggfhfghgfh-12', '[\"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4745c.png\", \"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4bbad.png\", \"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4c44c.gif\", \"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4e6f4.jpg\", \"/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c568bb.jpg\"]', '<p>Cho thu&ecirc; căn hộ Masteri Thảo Điền sống sang giữa l&ograve;ng Thảo Điền!<br />\r\n<br />\r\nBạn đang t&igrave;m kiếm căn hộ cho thu&ecirc; tại Thảo Điền, nơi hội tụ sự đẳng cấp, hiện đại v&agrave; tiện nghi? Masteri Thảo Điền ch&iacute;nh l&agrave; lựa chọn ho&agrave;n hảo cho bạn vị tr&iacute; v&agrave;ng, thiết kế tinh tế v&agrave; cộng đồng cư d&acirc;n văn minh.<br />\r\n<br />\r\nTổng quan dự &aacute;n Masteri Thảo Điền.<br />\r\n<br />\r\nVị tr&iacute;: Mặt tiền V&otilde; Nguy&ecirc;n Gi&aacute;p, phường Thảo Điền, TP. Thủ Đức.<br />\r\n<br />\r\nKết nối: 1 ph&uacute;t đến Ga Metro số 7 An Ph&uacute;, 10 ph&uacute;t đến trung t&acirc;m Quận 1.<br />\r\n<br />\r\nTiện &iacute;ch nội khu: Hồ bơi tr&agrave;n bờ, ph&ograve;ng gym cao cấp, c&ocirc;ng vi&ecirc;n xanh, khu BBQ, s&acirc;n chơi trẻ em, trung t&acirc;m thương mại Vincom Mega Mall ngay b&ecirc;n dưới.<br />\r\n<br />\r\nAn ninh: Bảo vệ 24/7, thẻ từ thang m&aacute;y, camera gi&aacute;m s&aacute;t to&agrave;n khu.<br />\r\n<br />\r\nCăn hộ cho thu&ecirc; đa dạng ph&ugrave; hợp mọi nhu cầu.<br />\r\n<br />\r\nHiện ch&uacute;ng t&ocirc;i c&oacute; nhiều căn hộ cho thu&ecirc; tại Masteri Thảo Điền với đầy đủ loại h&igrave;nh, đ&aacute;p ứng mọi nhu cầu sống v&agrave; ng&acirc;n s&aacute;ch:<br />\r\n<br />\r\nCăn hộ 1 ph&ograve;ng ngủ tiện nghi, ấm c&uacute;ng.<br />\r\n<br />\r\nDiện t&iacute;ch: 45, 55m.<br />\r\nGi&aacute; thu&ecirc;: Từ 15 triệu/th&aacute;ng.<br />\r\nPh&ugrave; hợp cho người độc th&acirc;n hoặc cặp đ&ocirc;i trẻ.<br />\r\n<br />\r\nCăn hộ 2 ph&ograve;ng ngủ Tho&aacute;ng m&aacute;t, view đẹp.<br />\r\n<br />\r\nDiện t&iacute;ch: 65m&sup2;, 70m, 72m&sup2;, 75m&sup2;, 77m&sup2;.<br />\r\nGi&aacute; thu&ecirc;: Từ 16 triệu/th&aacute;ng.<br />\r\nPh&ugrave; hợp gia đ&igrave;nh nhỏ hoặc người đi l&agrave;m cần kh&ocirc;ng gian ri&ecirc;ng.<br />\r\n<br />\r\nCăn hộ 3 ph&ograve;ng ngủ Rộng r&atilde;i, thiết kế tinh tế.<br />\r\n<br />\r\nDiện t&iacute;ch: 88m&sup2;, 90m&sup2;, 95m&sup2;, 100m.<br />\r\nGi&aacute; thu&ecirc;: Từ 23 triệu/th&aacute;ng.<br />\r\nL&yacute; tưởng cho gia đ&igrave;nh c&oacute; con nhỏ, sinh hoạt thoải m&aacute;i.<br />\r\n<br />\r\nDuplex th&ocirc;ng tầng.<br />\r\n<br />\r\nThiết kế 2 tầng hiện đại, nội thất cao cấp.<br />\r\nGi&aacute; thu&ecirc;: Từ 40 triệu/th&aacute;ng.<br />\r\nThể hiện phong c&aacute;ch sống kh&aacute;c biệt, ph&aacute; c&aacute;ch.<br />\r\n<br />\r\nPenthouse Tuyệt t&aacute;c tr&ecirc;n cao.<br />\r\n<br />\r\nDiện t&iacute;ch lớn, view to&agrave;n cảnh s&ocirc;ng S&agrave;i G&ograve;n.<br />\r\nNội thất sang trọng, ban c&ocirc;ng rộng, &aacute;nh s&aacute;ng tự nhi&ecirc;n.<br />\r\nGi&aacute; thu&ecirc;: Từ 50 triệu/th&aacute;ng.<br />\r\nD&agrave;nh cho kh&aacute;ch h&agrave;ng y&ecirc;u sự ri&ecirc;ng tư v&agrave; đẳng cấp.<br />\r\n<br />\r\nV&igrave; Sao N&ecirc;n Thu&ecirc; Căn Hộ Tại Masteri Thảo Điền?<br />\r\nVị tr&iacute; trung t&acirc;m Thảo Điền, nơi tập trung người nước ngo&agrave;i, chuy&ecirc;n gia cao cấp.<br />\r\nGi&aacute; thu&ecirc; hợp l&yacute;, linh hoạt theo nhu cầu.<br />\r\nChủ nh&agrave; th&acirc;n thiện, hỗ trợ nhiệt t&igrave;nh, hợp đồng r&otilde; r&agrave;ng.<br />\r\nNội thất đầy đủ, chỉ cần x&aacute;ch vali v&agrave;o ở.<br />\r\nMiễn ph&iacute; tư vấn Hỗ trợ xem nh&agrave; 24/7.<br />\r\nLi&ecirc;n Hệ Ngay Để Được Tư Vấn V&agrave; Xem Nh&agrave; Miễn Ph&iacute;.</p>', 170000, 100, 2, 2, 'Tây', 0, 1, 'cosan', 'thue', '2025-03-17 10:38:20', '2025-03-17 10:38:20', 1, NULL, '0 - 5 Năm', 'Tây', '[{\"icon\": null, \"name\": \"bếp\"}, {\"icon\": \"/temp/images/thietbi/dsfdsf.jpg\", \"name\": \"dsfdsf\"}]', 2, '/temp/images/baidang/ggfhfghgfh-1742233100-67d85e0c4745c.png', 11, NULL),
(15, 1, 18, 'sdfsdf', 'sdfsdf-15', '[\"/temp/images/baidang/sdfsdf-1742480491-67dc246b5f417.png\", \"/temp/images/baidang/sdfsdf-1742480491-67dc246b601b6.png\"]', '<p>Cho thu&ecirc; căn hộ Masteri Thảo Điền sống sang giữa l&ograve;ng Thảo Điền!<br />\r\n<br />\r\nBạn đang t&igrave;m kiếm căn hộ cho thu&ecirc; tại Thảo Điền, nơi hội tụ sự đẳng cấp, hiện đại v&agrave; tiện nghi? Masteri Thảo Điền ch&iacute;nh l&agrave; lựa chọn ho&agrave;n hảo cho bạn vị tr&iacute; v&agrave;ng, thiết kế tinh tế v&agrave; cộng đồng cư d&acirc;n văn minh.<br />\r\n<br />\r\nTổng quan dự &aacute;n Masteri Thảo Điền.<br />\r\n<br />\r\nVị tr&iacute;: Mặt tiền V&otilde; Nguy&ecirc;n Gi&aacute;p, phường Thảo Điền, TP. Thủ Đức.<br />\r\n<br />\r\nKết nối: 1 ph&uacute;t đến Ga Metro số 7 An Ph&uacute;, 10 ph&uacute;t đến trung t&acirc;m Quận 1.<br />\r\n<br />\r\nTiện &iacute;ch nội khu: Hồ bơi tr&agrave;n bờ, ph&ograve;ng gym cao cấp, c&ocirc;ng vi&ecirc;n xanh, khu BBQ, s&acirc;n chơi trẻ em, trung t&acirc;m thương mại Vincom Mega Mall ngay b&ecirc;n dưới.<br />\r\n<br />\r\nAn ninh: Bảo vệ 24/7, thẻ từ thang m&aacute;y, camera gi&aacute;m s&aacute;t to&agrave;n khu.<br />\r\n<br />\r\nCăn hộ cho thu&ecirc; đa dạng ph&ugrave; hợp mọi nhu cầu.<br />\r\n<br />\r\nHiện ch&uacute;ng t&ocirc;i c&oacute; nhiều căn hộ cho thu&ecirc; tại Masteri Thảo Điền với đầy đủ loại h&igrave;nh, đ&aacute;p ứng mọi nhu cầu sống v&agrave; ng&acirc;n s&aacute;ch:<br />\r\n<br />\r\nCăn hộ 1 ph&ograve;ng ngủ tiện nghi, ấm c&uacute;ng.<br />\r\n<br />\r\nDiện t&iacute;ch: 45, 55m.<br />\r\nGi&aacute; thu&ecirc;: Từ 15 triệu/th&aacute;ng.<br />\r\nPh&ugrave; hợp cho người độc th&acirc;n hoặc cặp đ&ocirc;i trẻ.<br />\r\n<br />\r\nCăn hộ 2 ph&ograve;ng ngủ Tho&aacute;ng m&aacute;t, view đẹp.<br />\r\n<br />\r\nDiện t&iacute;ch: 65m&sup2;, 70m, 72m&sup2;, 75m&sup2;, 77m&sup2;.<br />\r\nGi&aacute; thu&ecirc;: Từ 16 triệu/th&aacute;ng.<br />\r\nPh&ugrave; hợp gia đ&igrave;nh nhỏ hoặc người đi l&agrave;m cần kh&ocirc;ng gian ri&ecirc;ng.<br />\r\n<br />\r\nCăn hộ 3 ph&ograve;ng ngủ Rộng r&atilde;i, thiết kế tinh tế.<br />\r\n<br />\r\nDiện t&iacute;ch: 88m&sup2;, 90m&sup2;, 95m&sup2;, 100m.<br />\r\nGi&aacute; thu&ecirc;: Từ 23 triệu/th&aacute;ng.<br />\r\nL&yacute; tưởng cho gia đ&igrave;nh c&oacute; con nhỏ, sinh hoạt thoải m&aacute;i.<br />\r\n<br />\r\nDuplex th&ocirc;ng tầng.<br />\r\n<br />\r\nThiết kế 2 tầng hiện đại, nội thất cao cấp.<br />\r\nGi&aacute; thu&ecirc;: Từ 40 triệu/th&aacute;ng.<br />\r\nThể hiện phong c&aacute;ch sống kh&aacute;c biệt, ph&aacute; c&aacute;ch.<br />\r\n<br />\r\nPenthouse Tuyệt t&aacute;c tr&ecirc;n cao.<br />\r\n<br />\r\nDiện t&iacute;ch lớn, view to&agrave;n cảnh s&ocirc;ng S&agrave;i G&ograve;n.<br />\r\nNội thất sang trọng, ban c&ocirc;ng rộng, &aacute;nh s&aacute;ng tự nhi&ecirc;n.<br />\r\nGi&aacute; thu&ecirc;: Từ 50 triệu/th&aacute;ng.<br />\r\nD&agrave;nh cho kh&aacute;ch h&agrave;ng y&ecirc;u sự ri&ecirc;ng tư v&agrave; đẳng cấp.<br />\r\n<br />\r\nV&igrave; Sao N&ecirc;n Thu&ecirc; Căn Hộ Tại Masteri Thảo Điền?<br />\r\nVị tr&iacute; trung t&acirc;m Thảo Điền, nơi tập trung người nước ngo&agrave;i, chuy&ecirc;n gia cao cấp.<br />\r\nGi&aacute; thu&ecirc; hợp l&yacute;, linh hoạt theo nhu cầu.<br />\r\nChủ nh&agrave; th&acirc;n thiện, hỗ trợ nhiệt t&igrave;nh, hợp đồng r&otilde; r&agrave;ng.<br />\r\nNội thất đầy đủ, chỉ cần x&aacute;ch vali v&agrave;o ở.<br />\r\nMiễn ph&iacute; tư vấn Hỗ trợ xem nh&agrave; 24/7.<br />\r\nLi&ecirc;n Hệ Ngay Để Được Tư Vấn V&agrave; Xem Nh&agrave; Miễn Ph&iacute;.</p>', NULL, 100, 2, 2, 'Đông', 0, 1, 'cosan', 'thue', '2025-03-20 07:21:31', '2025-03-20 07:21:31', 0, NULL, '0 - 5 Năm', 'Đông', '[{\"icon\": null, \"name\": \"bếp\"}, {\"icon\": \"/temp/images/thietbi/dsfdsf.jpg\", \"name\": \"dsfdsf\"}]', 2, '/temp/images/baidang/sdfsdf-1742480491-67dc246b5f417.png', 12, NULL),
(16, 1, 19, 'dsfsdfsdf', 'dsfsdfsdf-16', '[\"/temp/images/baidang/dsfsdfsdf-1742482127-67dc2acfb53bd.png\", \"/temp/images/baidang/dsfsdfsdf-1742482127-67dc2acfb61bf.png\"]', '<p>fdgdfgdf</p>', NULL, 100, 2, 2, 'Tây', 0, 1, 'cosan', 'thue', '2025-03-20 07:48:47', '2025-03-20 07:48:47', 0, NULL, '0 - 5 Năm', 'Nam', '[]', 2, '/temp/images/baidang/dsfsdfsdf-1742482127-67dc2acfb53bd.png', 13, 2);

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
(2, 2, 2, 2, 2, 2, '1thang', NULL, '2025-03-20 07:48:47', '2025-03-20 07:48:47');

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
(13, 'Phan Duy Hào', '12313131445', 'maidg1302@gmail.com', NULL, '2025-03-20 07:48:47', '2025-03-20 07:48:47', NULL, NULL, NULL);

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
(16, 10, 'Huyện Mường Chà', '97', '2025-03-20 07:48:47', '2025-03-20 07:48:47');

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
(2, 'chung cư', 'chung-cu', '/temp/images/loainhadat/chung-cu.jpg', '2025-03-15 08:14:57', '2025-03-15 08:14:57'),
(3, 'Nhà cấp 4', 'nha-cap-4', '/temp/images/loainhadat/nha-cap-4.jpg', '2025-03-15 08:15:10', '2025-03-15 08:15:10');

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
(20, '2025_03_20_143735_update_baidang7', 14);

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
('FWNZzkKbE3MJdg42gXZMoHJpncPjULdnHUeM4FlX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUZoSDRlNUxacU9FNlNFWHZUb1pDcDl3bkR0NUZ1ZVppdU1zekRLTyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4ODoiaHR0cDovL2JhdGRvbmdzYW4udGVzdDo4MDgwL3Bvc3RzL2xpc3QtY2hvLXRodWU/TG9uZ2l0dWRlPTEwNS44MjE2MyZhZGRyZXNzPSZhcmVhX21heD0mYXJlYV9taW49JmF1dGhvcj0mYmF0aHJvb21zPSZiZWRyb29tcz0mZGF0ZT0mZGlzdHJpY3RfbmFtZT1RdSVFMSVCQSVBRG4lMjBCYSUyMCVDNCU5MCVDMyVBQ25oJmRpc3RyaWN0cz0xJmh1b25nbmhhPSZsYXRpdHVkZT0yMS4wMzU4NyZsb2FpbmhhZGF0PSZwcmljZV9tYXg9JnByaWNlX21pbj0mcHJvdmluY2U9MSZwcm92aW5jZV9uYW1lPVRoJUMzJUEwbmglMjBwaCVFMSVCQiU5MSUyMEglQzMlQTAlMjBOJUUxJUJCJTk5aSZ3YXJkX25hbWU9UGglQzYlQjAlRTElQkIlOURuZyUyMFBoJUMzJUJBYyUyMFglQzMlQTEmd2FyZHM9MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1742491409);

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
(6, 'logo', 'temp/images/settings/logo.jpg', NULL, '2025-03-13 10:49:02'),
(7, 'banner_image', NULL, NULL, NULL),
(8, 'phone', NULL, NULL, NULL),
(9, 'email', NULL, NULL, NULL);

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
(2, 'bếp', NULL, '2025-03-14 20:52:16', '2025-03-14 20:52:16'),
(6, 'dsfdsf', '/temp/images/thietbi/dsfdsf.jpg', '2025-03-14 21:05:13', '2025-03-14 21:05:13');

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
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Phan Duy Hào', 'maidg1302@gmail.com', '$2y$12$kaTupFkiSEK5sVQZY4L8he40KNmULarJ78hYmQBCk/uRZ.1VgOKUm', NULL, '/temp/images/baidang/dfdsfs-1742116649-67d697291098f.jpg', 'admin', '2025-03-13 09:04:40', '2025-03-13 09:04:40'),
(2, 'test', 'test@gmail.com', '$2y$12$7pd9eX6b6g5Pf4Aet.JX7.iJC3oyewqq.Yv/z6HjDWqUbWxbJueO2', NULL, '/temp/images/baidang/dfdsfs-1742116649-67d697291098f.jpg', 'user', '2025-03-14 19:38:58', '2025-03-14 19:38:58'),
(3, 'test23', 'test2@gmail.com', '$2y$12$BmnoOmH8oTqXzPhYd5qZ4OFKmGULSucRbjs2lzYb9DMb0GSKSmbLK', NULL, '/temp/images/baidang/dfdsfs-1742116649-67d697291098f.jpg', 'admin', '2025-03-14 19:52:32', '2025-03-14 19:55:01');

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
(17, 16, 'Xã Mường Tùng', '3181', '2025-03-20 07:48:47', '2025-03-20 07:48:47');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `baidangs`
--
ALTER TABLE `baidangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `baidang_chitiets`
--
ALTER TABLE `baidang_chitiets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `baidang_lienhes`
--
ALTER TABLE `baidang_lienhes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `thietbis`
--
ALTER TABLE `thietbis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
