-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2024 lúc 11:05 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chuyennganh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: không đọc, 1: đọc',
  `created_date` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `file`, `status`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 110120020, 2, 'dạ, thưa thầy', NULL, 1, 1704512726, '2024-01-06 03:45:26', '2024-01-06 04:00:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doan`
--

CREATE TABLE `doan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `loai` varchar(255) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: đăng ký, 1: chưa đăng ký',
  `sv_da` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not, 1: yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `doan`
--

INSERT INTO `doan` (`id`, `name`, `loai`, `created_by`, `trangthai`, `sv_da`, `is_delete`, `created_at`, `updated_at`) VALUES
(4, 'Xây dựng', 'Cơ sở ngành', '2', 1, NULL, 0, '2024-01-01 14:11:18', '2024-01-02 16:08:01'),
(5, 'Quản lý', 'Khóa luận tốt nghiệp', '2', 1, NULL, 0, '2024-01-01 14:18:27', '2024-01-02 16:07:57'),
(6, 'Tìm hiểu', 'Cơ sở ngành', 'LÊ MINH TỰ', 1, NULL, 0, '2024-01-02 16:20:42', '2024-01-02 16:20:42'),
(7, 'Tìm hiểu', 'Cơ sở ngành', 'LÊ MINH TỰ', 1, NULL, 0, '2024-01-02 16:23:08', '2024-01-02 16:23:08'),
(8, 'Tìm hiểu', 'Cơ sở ngành', '2', 1, NULL, 0, '2024-01-02 16:25:52', '2024-01-02 16:25:52'),
(9, 'Phát triển web', 'Chuyên ngành', '9', 1, NULL, 0, '2024-01-02 16:33:25', '2024-01-02 16:33:25'),
(10, 'Kiểm tra', 'Cơ sở ngành', '2', 1, NULL, 0, '2024-01-03 03:02:11', '2024-01-03 03:02:11'),
(11, 'Thiết kế web', 'Cơ sở ngành', '12', 1, NULL, 0, '2024-01-03 03:14:13', '2024-01-03 03:26:22'),
(12, 'Xây dựng Website Quản lý sinh viên thực hiện đồ án', 'Chuyên ngành', '2', 1, NULL, 0, '2024-01-06 03:52:56', '2024-01-06 03:52:56'),
(13, 'ads', 'Cơ sở ngành', '2', 0, NULL, 1, '2024-01-06 16:18:04', '2024-01-06 16:18:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doan_namhoc`
--

CREATE TABLE `doan_namhoc` (
  `id` int(11) NOT NULL,
  `doan_id` int(11) DEFAULT NULL,
  `namhoc_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0 COMMENT '0:active, 1:inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: no, 1: yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `name`, `trangthai`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'DA20TTB', 0, 0, '2024-01-01 06:44:59', '2024-01-02 08:06:29'),
(2, 'DA20TTA', 0, 0, '2024-01-01 07:44:02', '2024-01-02 08:06:25'),
(3, 'DA20TTD', 1, 0, '2024-01-01 07:52:14', '2024-01-06 14:39:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: no, 1:yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`id`, `name`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, '2022 - 2023', 0, '2024-01-03 02:09:07', '2024-01-03 02:09:07'),
(2, '2023 - 2024', 0, '2024-01-03 02:11:51', '2024-01-03 02:11:51'),
(3, '2024 - 2025', 0, '2024-01-03 02:12:00', '2024-01-03 02:12:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `mssv` varchar(50) DEFAULT NULL,
  `msgv` varchar(50) DEFAULT NULL,
  `lop_id` int(11) DEFAULT NULL,
  `phai` varchar(20) DEFAULT NULL,
  `ngsinh` date DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `user_type` tinytext NOT NULL DEFAULT '2' COMMENT '1: admin, 2: giangvien, 3: sinhvien',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: xóa, 1: không xóa',
  `trangthai` tinyint(4) DEFAULT 0 COMMENT '0: Còn học, 1: Nghỉ học',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `mssv`, `msgv`, `lop_id`, `phai`, `ngsinh`, `sdt`, `user_type`, `is_delete`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$bhmSDjAHj2s15VYrrTagBOxOn4jfrWeB0ic4UtLWBvLf5CUNWq9GO', 'PZLhZSGzsYPfaQNQ30Uxl1qHJALBbC9QkLMX9K1SZwBy8EDBRqGSm0yypp1V', '', NULL, NULL, NULL, NULL, NULL, '1', 0, 0, NULL, NULL),
(2, 'LÊ MINH TỰ', 'lmt@gmail.com', NULL, '$2y$12$bhmSDjAHj2s15VYrrTagBOxOn4jfrWeB0ic4UtLWBvLf5CUNWq9GO', 'LXYlYAzavuMqiA7gqZ73v20JgBWLbIpz0JZ2PxAVH03LhxfcVnBnTrrN5gOh', '', '123', NULL, 'Nam', NULL, '1231321', '2', 0, 0, NULL, '2024-01-02 18:29:30'),
(7, 'NGUYỄN MINH ĐỨC', 'ducnm@gmail.com', NULL, '$2y$12$yMm4TvFdKie15nvqJ8UV/Ofkh5xlAcqMixZ7VN.2t8TmHNCJQBbjm', NULL, '110120020', NULL, 1, 'Nam', '2000-07-04', '0918586877', '3', 1, 0, '2024-01-01 23:55:45', '2024-01-05 19:55:37'),
(8, 'NGUYỄN XUÂN VINH', 'vinh@gmail.com', NULL, '$2y$12$hjSlGP5uYl6dneEnl2VLIeBmp.qyI15zs0pd3R7yhdCw.VDZmF0g2', NULL, '110120085', NULL, 1, 'Nam', '2002-02-08', '12312312321', '3', 1, 0, '2024-01-02 02:41:43', '2024-01-05 19:55:39'),
(9, 'Đoàn Phước Miền', 'dpm@gmail.com', NULL, '$2y$12$GL.jLwQMEjNSMZQgIxz8C.C.ywnmLo34hOJGlKceKqhDRCmYarXvi', NULL, '', '1234', NULL, 'Nam', NULL, '123456123', '2', 0, 0, '2024-01-02 08:28:00', '2024-01-02 17:58:20'),
(12, 'NGUYỄN THỊ TRÚC MAI', 'mai@gmail.com', NULL, '$2y$12$nhxcliP/86S/kUMCUei3vuGWV1nCmJBShdg.wKsYcqNmt/COR9Yba', NULL, '', '123', NULL, 'Nữ', NULL, '123123123', '2', 0, 0, '2024-01-02 20:13:43', '2024-01-04 22:51:38'),
(13, 'THẠCH TẤN LỘC', 'loc@gmail.com', NULL, '$2y$12$axrGB2GGoBG0J3vFDYBx1eFYUz54KxUdbHbuSywL2EFQS1ZMW9Jly', NULL, '123', NULL, 1, 'Nam', '2000-02-02', '321312321', '3', 1, 0, '2024-01-05 20:08:15', '2024-01-05 20:18:15'),
(110120020, 'NGUYỄN MINH ĐỨC', 'duc@gmail.com', NULL, '$2y$12$bhmSDjAHj2s15VYrrTagBOxOn4jfrWeB0ic4UtLWBvLf5CUNWq9GO', 'o3ymZN5BR6Ohj0VzjQdOwtNfR80bvhOvoSRPgR7b6sshUQjWq4L0znAV8CtY', '110120020', NULL, 1, 'Nam', '2000-07-04', '0869091005', '3', 0, 0, NULL, '2024-01-05 19:57:06'),
(110120021, 'NGUYỄN XUÂN VINH', 'vinh123@gmail.com', NULL, '$2y$12$ZVTpt6QhH3HZgqS5v3g55emZPYZisjmAISkIH3FSCSWvERA/XvK6a', NULL, '1101200856', NULL, 2, 'Nữ', '2002-01-01', '0123456789', '3', 0, 0, '2024-01-05 20:15:35', '2024-01-05 20:19:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doan`
--
ALTER TABLE `doan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doan_namhoc`
--
ALTER TABLE `doan_namhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `doan`
--
ALTER TABLE `doan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `doan_namhoc`
--
ALTER TABLE `doan_namhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110120022;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
