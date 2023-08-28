-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2023 at 12:20 PM
-- Server version: 8.0.34
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `nama`, `jenisKelamin`, `tanggalLahir`, `phone`, `nip`, `email`, `alamat`, `photo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ANIM ARYANTO S.Pd', 'laki-laki', '1997-01-01', '085659282962', '69947174012', 'anim@gmail.com', 'Bekasi', 'photos/xDsaqbdBBQistb5NJ8FyNxD2efBwHhN2qjjyOvP9.jpg', 2, '2023-08-23 10:53:40', '2023-08-28 00:54:34'),
(2, 'BAYU KUSUMO', 'laki-laki', '1999-01-01', '089665860377', '69947174046', 'bayu@gmail.com', 'Bekasi', 'photos/cSOgYyXONytx8DXF9Mh2sTIF3UPrRvMmETSFrYaY.jpg', 3, '2023-08-23 17:32:44', '2023-08-23 17:32:44'),
(3, 'EKO RUSLAMSYAH, S.E', 'laki-laki', '1998-01-01', '089601660826', '69947174067', 'eko@gmail.com', 'Bekasi', 'photos/CuMrO9aEbuChMac6B6CFMMeEvTjMUBQHdZisQw2y.jpg', 4, '2023-08-23 17:34:09', '2023-08-23 17:34:09'),
(4, 'FERI SUPRIATNA, S.H', 'laki-laki', '1999-01-01', '081285087335', '69947174007', 'feri@gmail.com', 'Bekasi', 'photos/p9ZblulDEJYbM2o8zfc6kwImr4QLpcpWRtmaG8GM.jpg', 5, '2023-08-23 17:36:30', '2023-08-23 17:36:30'),
(5, 'Fiqri Mahadi Fathurohman, S.Pd', 'laki-laki', '2000-01-01', '085695048950', '69947174034', 'mahadi@gmail.com', 'Bekasi', 'photos/Vb8ddDt26YYPgxfRswdPpjcjEPAC8Iy7ICjlYFY7.jpg', 6, '2023-08-23 17:46:13', '2023-08-23 17:46:13'),
(6, 'HETTY FERAWATY, S.E', 'perempuan', '2000-01-01', '082213348788', '69947174002', 'hetty@gmail.com', 'Bekasi', 'photos/9lB3TgMbVgtMMwE7cX6zK125rKfzzzTRMOTqv9MF.jpg', 7, '2023-08-23 19:03:30', '2023-08-23 19:03:30'),
(7, 'Isnaeni Hidayah, S.Kom', 'perempuan', '2000-01-01', '083807262473', '69947174032', 'isnaeni@gmail.com', 'Bekasi', 'photos/VqkYgeFoZNwEclaEz6nl1tWNNec44BwWagrYd5qw.jpg', 8, '2023-08-23 19:07:26', '2023-08-23 19:07:26'),
(8, 'ITA FIBRIYANTI, S.Kom', 'perempuan', '2000-01-01', '081220845269', '69947174056', 'ita@gmail.com', 'Bekasi', 'photos/APgSQ0wdlL5RJ99KXk31Yvg9dusY6ypBoNYJph0l.jpg', 9, '2023-08-23 19:08:42', '2023-08-23 19:08:42'),
(9, 'Mahzi Abuzar Farankhan, M.M', 'laki-laki', '2000-01-01', '082187771997', '69947174030', 'mahzi@gmail.com', 'Bekasi', 'photos/PBlxxNJFhKwjBgLTsinoGnigeOiYOf65ojck7F7A.jpg', 10, '2023-08-23 19:09:45', '2023-08-23 19:09:45'),
(10, 'MALIK ABDUL AZIS, S.T', 'laki-laki', '2000-01-01', '082114762851', '69947174001', 'malik@gmail.com', 'Bekasi', 'photos/cEDUtiDSDC0NtmHw7zvZEcAm7A6Q38DjDPm9GlfK.jpg', 11, '2023-08-23 19:10:46', '2023-08-23 19:10:46'),
(11, 'MUHAMMAD ARIF AFIQIH, S.Pd', 'laki-laki', '2000-01-01', '08999557762', '69947174023', 'arif@gmail.com', 'Bekasi', 'photos/VUesXG1UfF9eC44tUDcjyoBeYI2yuqwJ0PWkJYae.jpg', 12, '2023-08-23 19:11:51', '2023-08-23 19:11:51'),
(12, 'NESEM SUGIRI, S.Pd', 'perempuan', '2000-01-01', '085813064597', '69947174060', 'nesem@gmail.com', 'Bekasi', 'photos/ScX5vRWjbm3iiGhv1pFW55jw1LeYHZ2f6vjFq3uq.jpg', 13, '2023-08-23 19:12:39', '2023-08-23 19:12:39'),
(13, 'NOMIN HERYANTO, S.Pd', 'laki-laki', '2000-01-01', '087887632048', '69947174025', 'nomin@gmail.com', 'Bekasi', 'photos/c0xBerViv2axdE4pscvm8WREgm03zGG2Pj2YP12X.jpg', 14, '2023-08-23 19:13:49', '2023-08-23 19:13:49'),
(14, 'NOVALD SC.REFLIZON, S.T', 'laki-laki', '2000-01-01', '0895618465618', '69947174063', 'novald@gmail.com', 'Bekasi', 'photos/SNq1LBHhswtUPgLH6fqHaLHPgqInIpTUFr26moOL.jpg', 15, '2023-08-23 19:19:08', '2023-08-23 19:19:08'),
(15, 'NUR ALWI, S.Kom', 'laki-laki', '2000-01-01', '085777546620', '69947174009', 'nur@gmail.com', 'Bekasi', 'photos/7seMSmPIHWrzG6M3UKu8eYW7GKsexg4X2Sd9CzfK.jpg', 16, '2023-08-23 19:20:02', '2023-08-23 19:20:02'),
(16, 'Rizky Ramadhan, S.Pd', 'laki-laki', '2000-01-01', '085777940090', '69947174031', 'rizky@gmail.com', 'Bekasi', 'photos/ioJo92ZGaUPIUs2G0T2dUQg01oFm4sOztWRCglJk.jpg', 17, '2023-08-23 19:23:31', '2023-08-23 19:23:31'),
(17, 'RONI PURNAWAN, S.T', 'laki-laki', '2000-01-01', '089664646444', '69947174021', 'roni@gmail.com', 'Bekasi', 'photos/pTSsHSLKkiCojRV8CWPks0gK5Oa5kivXAthYvO1F.jpg', 18, '2023-08-23 19:30:09', '2023-08-23 19:30:09'),
(18, 'SADAM ARYA S.Pd', 'laki-laki', '2000-01-01', '089662641831', '69947174014', 'sadam@gmail.com', 'Bekasi', 'photos/HekJrF9ZozhAhHmWTXPcE7x9Ku5fpPN2qbpZNeIL.jpg', 19, '2023-08-23 19:31:25', '2023-08-23 19:31:25'),
(19, 'SAVIRA ARLIANA PRAMESTY, S.Pd', 'perempuan', '2000-01-01', '0895331941098', '69947174008', 'savira@gmail.com', 'Bekasi', 'photos/t66FZrhSbXjMQnXEvzEIRHi1yEbuVPRKgnB2Jnu8.jpg', 20, '2023-08-24 02:10:47', '2023-08-24 02:10:47'),
(20, 'Siti Yusihar, S.Pd S.Pd', 'perempuan', '2000-01-01', '085819457778', '69947174036', 'siti@gmail.com', 'Bekasi', 'photos/iDhMOthTMwBgDDMXtPt0abv08u01T5mvAnfaiYOO.jpg', 21, '2023-08-24 02:11:53', '2023-08-24 02:11:53'),
(21, 'SUSILOWATI, A.Md.Ak', 'perempuan', '2000-01-01', '081386226100', '69947174010', 'susilowati@gmail.com', 'Bekasi', 'photos/cDppJnVzACRK3hiR43i7qfoVKvozXLwHSbIpVbAu.jpg', 22, '2023-08-24 02:12:49', '2023-08-24 02:12:49'),
(22, 'Usman, S.Pd', 'laki-laki', '2000-01-01', '081293628747', '69947174024', 'usman@gmail.com', 'Bekasi', 'photos/jvyTsDp6D3RIu6vjFEUEJn1cLrWDu0OnzxEOOYyi.jpg', 23, '2023-08-24 02:13:29', '2023-08-24 02:13:29'),
(23, 'YUDI HARTONO, S.Psi', 'laki-laki', '2000-01-01', '89508207505', '69947174006', 'yudi@gmail.com', 'Bekasi', 'photos/5Jbox3BWZ4gi7pRIv7I5ZpSOU8ZOnfYHptG2QXZG.jpg', 24, '2023-08-24 02:14:09', '2023-08-24 02:14:09'),
(24, 'DEDE SUJANA DIREJA, S.IP S.IP', 'laki-laki', '2000-01-01', '0895346540472', '69947174005', 'dede@gmail.com', 'Bekasi', 'photos/bM83lsvFFHLjEaN6kWO34is3tGk8yVTwqm2PY3or.jpg', 25, '2023-08-24 02:14:49', '2023-08-24 02:14:49'),
(25, 'Ir. H. Pebri Subhan Somantri Ir.', 'laki-laki', '2000-01-01', '081294084507', '69947174043', 'pebri@gmail.com', 'Bekasi', 'photos/s2Hie19UTS2bQvvNKzdPPfc6FOMUO8Qso7pxZ5nt.jpg', 26, '2023-08-24 02:15:43', '2023-08-24 02:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaJurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `kode`, `namaJurusan`, `created_at`, `updated_at`) VALUES
(1, 'STK-AK', 'AKUNTANSI DAN LEMBAGA KEUANGAN', '2023-08-24 07:23:09', '2023-08-28 04:28:30'),
(2, 'STK-TKR', 'TEKNIK KENDARAAN RINGAN', '2023-08-24 07:23:51', '2023-08-24 07:23:51'),
(3, 'STK-MM', 'MULTIMEDIA', '2023-08-24 07:24:52', '2023-08-24 07:24:52'),
(4, 'STK-TKJ', 'TEKNIK KOMPUTER DAN JARINGAN', '2023-08-24 07:25:15', '2023-08-24 07:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `namaKelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waliKelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `namaKelas`, `waliKelas`, `created_at`, `updated_at`) VALUES
(1, 'XII TKRO 2', 'ANIM ARYANTO, S.Pd', '2023-08-24 02:44:51', '2023-08-24 02:44:51'),
(2, 'XI TKRO 1', 'BAYU KUSUMO', '2023-08-24 02:45:07', '2023-08-24 02:45:07'),
(3, 'X MM', 'EKO RUSLAMSYAH, S.E', '2023-08-24 02:45:24', '2023-08-24 02:45:24'),
(4, 'X. AKL 1', 'FERI SUPRIATNA, S.H', '2023-08-24 02:51:45', '2023-08-24 02:51:45'),
(5, 'X TKRO 1', 'Fiqri Mahadi Fathurohman, S.Pd', '2023-08-24 04:38:23', '2023-08-24 04:38:23'),
(6, 'XII AKL 1', 'HETTY FERAWATY, S.E', '2023-08-24 04:39:14', '2023-08-24 04:39:14'),
(7, 'X TKJ 1', 'Isnaeni Hidayah, S.Kom', '2023-08-24 04:39:33', '2023-08-24 04:39:33'),
(8, 'X TKJ 2', 'ITA FIBRIYANTI, S.Kom', '2023-08-24 04:39:51', '2023-08-24 04:39:51'),
(9, 'X AKL 2', 'Mahzi Abuzar Farankhan, M.M', '2023-08-24 04:52:12', '2023-08-28 04:34:47'),
(10, 'XI TKRO 2', 'MUHAMMAD ARIF AFIQIH, S.Pd', '2023-08-24 04:52:31', '2023-08-24 04:52:31'),
(11, 'X TKRO 3', 'NESEM SUGIRI, S.Pd', '2023-08-24 04:52:53', '2023-08-24 04:52:53'),
(12, 'XII TKRO 1', 'NOMIN HERYANTO, S.Pd', '2023-08-24 04:53:06', '2023-08-24 04:53:06'),
(13, 'X TKRO 2', 'NOVALD SC.REFLIZON, S.T', '2023-08-24 04:53:25', '2023-08-24 04:53:25'),
(14, 'XII TKJ 2', 'NUR ALWI, S.Kom', '2023-08-24 04:53:43', '2023-08-24 04:53:43'),
(15, 'XII AKL 2', 'Rizky Ramadhan, S.Pd', '2023-08-24 04:55:55', '2023-08-24 04:55:55'),
(16, 'XI TKRO 3', 'RONI PURNAWAN, S.T', '2023-08-24 04:56:13', '2023-08-24 04:56:13'),
(17, 'XI MM', 'SADAM ARYA S.Pd', '2023-08-24 04:56:29', '2023-08-24 04:56:29'),
(18, 'XI TKJ 2', 'SAVIRA ARLIANA PRAMESTY, S.Pd', '2023-08-24 04:56:47', '2023-08-24 04:56:47'),
(19, 'XI TKJ 1', 'Siti Yusihar, S.Pd S.Pd', '2023-08-24 04:57:05', '2023-08-24 04:57:05'),
(20, 'XI AKL', 'SUSILOWATI, A.Md.Ak', '2023-08-24 04:57:25', '2023-08-24 04:57:25'),
(21, 'XII MM', 'Usman, S.Pd', '2023-08-24 04:57:48', '2023-08-24 04:57:48'),
(22, 'XII TKJ 1', 'YUDI HARTONO, S.Psi', '2023-08-24 04:58:07', '2023-08-24 04:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kkm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mataPelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `code`, `kkm`, `mataPelajaran`, `created_at`, `updated_at`) VALUES
(7, 'STK-AK', '70', 'PENDIDIKAN AGAMA DAN BP', '2023-08-25 05:17:04', '2023-08-28 04:44:29'),
(8, 'STK-AK', '70', 'PKN', '2023-08-25 05:17:16', '2023-08-25 05:17:16'),
(9, 'STK-AK', '70', 'BAHASA INDONESIA', '2023-08-25 05:17:25', '2023-08-25 05:17:25'),
(10, 'STK-AK', '70', 'MATEMATIKA', '2023-08-25 05:17:46', '2023-08-25 05:17:46'),
(11, 'STK-AK', '70', 'SEJARAH INDONESIA', '2023-08-25 05:17:58', '2023-08-25 05:17:58'),
(12, 'STK-AK', '70', 'BAHASA INGGRIS', '2023-08-25 05:18:08', '2023-08-25 05:18:08'),
(13, 'STK-AK', '70', 'BAHASA ASING LAINNYA', '2023-08-25 05:18:18', '2023-08-25 05:18:18'),
(14, 'STK-AK', '70', 'SENI BUDAYA', '2023-08-25 05:18:33', '2023-08-25 05:18:33'),
(15, 'STK-AK', '70', 'PENJAS / ORKES', '2023-08-25 05:18:43', '2023-08-25 05:18:43'),
(16, 'STK-AK', '70', 'BAHASA SUNDA', '2023-08-25 05:18:54', '2023-08-25 05:18:54'),
(17, 'STK-AK', '70', 'SIMDIG', '2023-08-25 05:19:04', '2023-08-25 05:19:04'),
(18, 'STK-AK', '70', 'EKONOMI BISNIS', '2023-08-25 05:19:13', '2023-08-25 05:19:13'),
(19, 'STK-AK', '70', 'ADMINISTRASI UMUM', '2023-08-25 05:19:24', '2023-08-25 05:19:24'),
(20, 'STK-AK', '70', 'IPA', '2023-08-25 05:19:34', '2023-08-25 05:19:34'),
(21, 'STK-AK', '70', 'ETIKA PROFESI', '2023-08-25 05:19:47', '2023-08-25 05:19:47'),
(22, 'STK-AK', '70', 'APLIKASI PENGOLAHAN ANGKA', '2023-08-25 05:21:08', '2023-08-25 05:21:08'),
(23, 'STK-AK', '70', 'AKUNTANSI DASAR', '2023-08-25 05:21:16', '2023-08-25 05:21:16'),
(24, 'STK-AK', '70', 'PERBANKAN DASAR', '2023-08-25 05:21:30', '2023-08-25 05:21:30'),
(25, 'STK-AK', '70', 'PRAKTIKUM AK JASA,DAGANG,MANUFAKTUR', '2023-08-25 05:21:40', '2023-08-25 05:21:40'),
(26, 'STK-AK', '70', 'PRAKTIMUM AK LEMBAGA/INSTANSI', '2023-08-25 05:21:58', '2023-08-25 05:21:58'),
(27, 'STK-AK', '70', 'AKUNTANSI KEUANGAN', '2023-08-25 05:22:07', '2023-08-25 05:22:07'),
(28, 'STK-AK', '70', 'KOMPUTER AK', '2023-08-25 05:22:15', '2023-08-25 05:22:15'),
(29, 'STK-AK', '70', 'ADMINISTRASI PAJAK', '2023-08-25 05:22:28', '2023-08-25 05:22:28'),
(30, 'STK-AK', '70', 'PKK', '2023-08-25 05:22:39', '2023-08-25 05:22:39'),
(31, 'STK-TKR', '70', 'PENDIDIKAN AGAMA DAN BP', '2023-08-25 05:22:54', '2023-08-25 05:22:54'),
(32, 'STK-TKR', '70', 'PKN', '2023-08-25 05:23:06', '2023-08-25 05:23:06'),
(33, 'STK-TKR', '70', 'BAHASA INDONESIA', '2023-08-25 05:23:27', '2023-08-25 05:23:27'),
(34, 'STK-TKR', '70', 'MATEMATIKA', '2023-08-25 05:23:53', '2023-08-25 05:23:53'),
(35, 'STK-TKR', '70', 'SEJARAH', '2023-08-25 05:24:05', '2023-08-25 05:24:05'),
(36, 'STK-TKR', '70', 'BAHASA INGGRIS', '2023-08-25 05:24:15', '2023-08-25 05:24:15'),
(37, 'STK-TKR', '70', 'BAHASA ASING LAINNYA', '2023-08-25 05:24:27', '2023-08-25 05:24:27'),
(38, 'STK-TKR', '70', 'SENI BUDAYA', '2023-08-25 05:24:44', '2023-08-25 05:24:44'),
(39, 'STK-TKR', '70', 'PENJAS / ORKES', '2023-08-25 05:24:55', '2023-08-25 05:24:55'),
(40, 'STK-TKR', '70', 'BAHASA SUNDA', '2023-08-25 05:25:12', '2023-08-25 05:25:12'),
(41, 'STK-TKR', '70', 'SIMDIG', '2023-08-25 05:25:24', '2023-08-25 05:25:24'),
(42, 'STK-TKR', '70', 'FISIKA', '2023-08-25 05:25:37', '2023-08-25 05:25:37'),
(43, 'STK-TKR', '70', 'KIMIA', '2023-08-25 05:25:48', '2023-08-25 05:25:48'),
(44, 'STK-TKR', '70', 'Gambar Teknik Otomotif', '2023-08-25 05:26:11', '2023-08-25 05:26:11'),
(45, 'STK-TKR', '70', 'Teknologi Dasar Otomotif', '2023-08-25 05:26:58', '2023-08-25 05:26:58'),
(46, 'STK-TKR', '70', 'Pekerjaan Dasar Teknik Otomotif', '2023-08-25 05:27:09', '2023-08-25 05:27:09'),
(47, 'STK-TKR', '70', 'Pemeliharaan Mesin Kendaraan Ringan', '2023-08-25 05:27:21', '2023-08-25 05:27:21'),
(48, 'STK-TKR', '70', 'Pemeliharaan Sasis dan PTKR', '2023-08-25 05:27:32', '2023-08-25 05:27:32'),
(49, 'STK-TKR', '70', 'Pemeliharana Kelistrikan Kendaraan Ringan', '2023-08-25 05:27:43', '2023-08-25 05:27:43'),
(50, 'STK-TKR', '70', 'PKK', '2023-08-25 05:27:58', '2023-08-25 05:27:58'),
(51, 'STK-MM', '70', 'PENDIDIKAN AGAMA DAN BP', '2023-08-25 05:31:59', '2023-08-25 05:31:59'),
(52, 'STK-MM', '70', 'PKN', '2023-08-25 06:07:42', '2023-08-25 06:07:42'),
(53, 'STK-MM', '70', 'BAHASA INDONESIA', '2023-08-25 06:07:52', '2023-08-25 06:07:52'),
(54, 'STK-MM', '70', 'MATEMATIKA', '2023-08-25 06:08:03', '2023-08-25 06:08:03'),
(55, 'STK-MM', '70', 'SEJARAH', '2023-08-25 06:08:20', '2023-08-25 06:08:20'),
(56, 'STK-MM', '70', 'BAHASA INGGRIS', '2023-08-25 06:22:24', '2023-08-25 06:22:24'),
(57, 'STK-MM', '70', 'BAHASA ASING LAINNYA', '2023-08-25 06:24:49', '2023-08-25 06:24:49'),
(58, 'STK-MM', '70', 'SENI BUDAYA', '2023-08-25 06:27:02', '2023-08-25 06:27:02'),
(59, 'STK-MM', '70', 'PENJAS / ORKES', '2023-08-25 06:27:12', '2023-08-25 06:27:12'),
(60, 'STK-MM', '70', 'BAHASA SUNDA', '2023-08-25 06:27:27', '2023-08-25 06:27:27'),
(61, 'STK-MM', '70', 'SIMDIG', '2023-08-25 06:27:34', '2023-08-25 06:27:34'),
(62, 'STK-MM', '70', 'FISIKA', '2023-08-25 06:27:46', '2023-08-25 06:27:46'),
(63, 'STK-MM', '70', 'KIMIA', '2023-08-25 06:27:54', '2023-08-25 06:27:54'),
(64, 'STK-MM', '70', 'SISTEM KOMPUTER', '2023-08-25 06:28:09', '2023-08-25 06:28:09'),
(65, 'STK-MM', '70', 'KOMPUTER DAN JARINGAN DASAR', '2023-08-25 06:28:19', '2023-08-25 06:28:19'),
(66, 'STK-MM', '70', 'PEMOGRAMAN DASAR', '2023-08-25 06:28:33', '2023-08-25 06:28:33'),
(67, 'STK-MM', '70', 'DASA DASAR DESAIN GRAFIS', '2023-08-25 06:28:43', '2023-08-25 06:28:43'),
(68, 'STK-MM', '70', 'DESSAIN GRAFIS PERCETAKAN', '2023-08-25 06:28:54', '2023-08-25 06:28:54'),
(69, 'STK-MM', '70', 'DESAIN MEDIA INTERAKTIF', '2023-08-25 06:29:04', '2023-08-25 06:29:04'),
(70, 'STK-MM', '70', 'ANIMASI 2D DAN 3D', '2023-08-25 06:29:14', '2023-08-25 06:29:14'),
(71, 'STK-MM', '70', 'TEKNIK PENGOLAHAN AUDIO DAN VIDEO', '2023-08-25 06:29:24', '2023-08-25 06:29:24'),
(72, 'STK-MM', '70', 'PKK', '2023-08-25 06:29:34', '2023-08-25 06:29:34'),
(73, 'STK-TKJ', '70', 'PENDIDIKAN AGAMA DAN BP', '2023-08-25 06:29:58', '2023-08-25 06:29:58'),
(74, 'STK-TKJ', '70', 'PKN', '2023-08-25 06:30:10', '2023-08-25 06:30:10'),
(75, 'STK-TKJ', '70', 'BAHASA INDONESIA', '2023-08-25 06:30:19', '2023-08-25 06:30:19'),
(76, 'STK-TKJ', '70', 'MATEMATIKA', '2023-08-25 06:30:29', '2023-08-25 06:30:29'),
(77, 'STK-TKJ', '70', 'SEJARAH', '2023-08-25 06:30:39', '2023-08-25 06:30:39'),
(78, 'STK-TKJ', '70', 'BAHASA INGGRIS', '2023-08-25 06:30:49', '2023-08-25 06:30:49'),
(79, 'STK-TKJ', '70', 'BAHASA ASING LAINNYA', '2023-08-25 06:30:59', '2023-08-25 06:30:59'),
(80, 'STK-TKJ', '70', 'SENI BUDAYA', '2023-08-25 06:31:09', '2023-08-25 06:31:09'),
(81, 'STK-TKJ', '70', 'PENJAS / ORKES', '2023-08-25 06:31:18', '2023-08-25 06:31:18'),
(82, 'STK-TKJ', '70', 'BAHASA SUNDA', '2023-08-25 06:31:28', '2023-08-25 06:31:28'),
(83, 'STK-TKJ', '70', 'SIMDIG', '2023-08-25 06:31:37', '2023-08-25 06:31:37'),
(84, 'STK-TKJ', '70', 'SIMDIG', '2023-08-25 06:31:44', '2023-08-25 06:31:44'),
(85, 'STK-TKJ', '70', 'FISIKA', '2023-08-25 06:31:54', '2023-08-25 06:31:54'),
(86, 'STK-TKJ', '70', 'KIMIA', '2023-08-25 06:32:03', '2023-08-25 06:32:03'),
(87, 'STK-TKJ', '70', 'SISTEM KOMPUTER', '2023-08-25 06:32:47', '2023-08-25 06:32:47'),
(88, 'STK-TKJ', '70', 'KOMPUTER DAN JARINGAN DASAR', '2023-08-25 06:32:59', '2023-08-25 06:32:59'),
(89, 'STK-TKJ', '70', 'PEMOGRAMAN DASAR', '2023-08-25 06:33:11', '2023-08-25 06:33:11'),
(90, 'STK-TKJ', '70', 'DASAR DESAIN GRAFIS', '2023-08-25 06:33:19', '2023-08-25 06:33:19'),
(91, 'STK-TKJ', '70', 'TEKNOLOGI JARINGAN BERBASIS LUAS / WAN', '2023-08-25 06:33:28', '2023-08-25 06:33:28'),
(92, 'STK-TKJ', '70', 'ADMINISTRASI INFRASTUKTUT JARINGAN', '2023-08-25 06:33:39', '2023-08-25 06:33:39'),
(93, 'STK-TKJ', '70', 'ADMINISTRASI SISTEM JARINGAN', '2023-08-25 06:33:48', '2023-08-25 06:33:48'),
(94, 'STK-TKJ', '70', 'TEKNOLOGI LAYANAN JARINGAN', '2023-08-25 06:33:56', '2023-08-25 06:33:56'),
(95, 'STK-TKJ', '70', 'PKK', '2023-08-25 06:34:05', '2023-08-25 06:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_07_24_143542_create_gurus_table', 1),
(5, '2023_07_24_143601_create_siswas_table', 1),
(6, '2023_07_25_152126_create_kelas_table', 1),
(7, '2023_07_25_152206_create_mapels_table', 1),
(8, '2023_07_25_152222_create_semesters_table', 1),
(9, '2023_07_30_082529_create_scores_table', 1),
(10, '2023_08_24_132421_create_jurusans_table', 2),
(11, '2023_08_25_171221_add_jurusan_to_siswas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `tugas` int DEFAULT NULL,
  `uas` int DEFAULT NULL,
  `uts` int DEFAULT NULL,
  `grade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `siswa_id`, `mapel_id`, `tugas`, `uas`, `uts`, `grade`, `created_at`, `updated_at`) VALUES
(1, 11, 51, 80, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-28 04:54:20'),
(2, 11, 52, 70, 80, 70, 'C', '2023-08-25 18:17:39', '2023-08-28 04:54:20'),
(3, 11, 53, 70, 70, 80, 'C', '2023-08-25 18:17:39', '2023-08-28 04:54:20'),
(4, 11, 54, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(5, 11, 55, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(6, 11, 56, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(7, 11, 57, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(8, 11, 58, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(9, 11, 59, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(10, 11, 60, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(11, 11, 61, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(12, 11, 62, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(13, 11, 63, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(14, 11, 64, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(15, 11, 65, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(16, 11, 66, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(17, 11, 67, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(18, 11, 68, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(19, 11, 69, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(20, 11, 70, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(21, 11, 71, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39'),
(22, 11, 72, 70, 70, 70, 'C', '2023-08-25 18:17:39', '2023-08-25 18:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint UNSIGNED NOT NULL,
  `tahunAjaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `tahunAjaran`, `status`, `semester`, `created_at`, `updated_at`) VALUES
(1, '2022/2023', 1, 'SEMESTER 1', '2023-08-24 06:02:40', '2023-08-28 04:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orangTua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `kelas_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nama`, `jenisKelamin`, `tanggalLahir`, `phone`, `nis`, `email`, `alamat`, `photo`, `orangTua`, `user_id`, `kelas_id`, `created_at`, `updated_at`, `jurusan`) VALUES
(1, 'Adelia Nursefila', 'laki-laki', '2000-01-01', '08123456789', '23240907199', 'adelia@gmail.com', 'Bekasi', 'photos/aBfudugmYIp6xJI1taeRPXNCDGYQ4P63vSf4bWdK.png', 'John Doe', 35, 4, '2023-08-25 11:04:49', '2023-08-28 02:21:34', 'STK-AK'),
(2, 'Anggun Salfiah', 'perempuan', '2000-01-01', '08123456789', '23242206168', 'anggun@gmail.com', 'Bekasi', 'photos/Z3dnITFb5o1fpLxY7wNCvo2Dh60FIq4SXPwdxk7M.png', 'John Doe', 36, 4, '2023-08-25 11:08:27', '2023-08-25 11:08:27', 'STK-AK'),
(3, 'Amelia Putri', 'perempuan', '2000-01-01', '08123456789', '23240707198', 'amelia@gmail.com', 'Bekasi', 'photos/5uyYIqoRxT3XE1kxvJp6XGimQDTDgLB0yJ7TKiQy.png', 'John Doe', 37, 9, '2023-08-25 11:09:51', '2023-08-25 11:09:51', 'STK-AK'),
(4, 'Ayu Septianing Wardhani', 'perempuan', '2000-01-01', '08123456789', '23241006149', 'ayu@gmail.com', 'Bekasi', 'photos/MuzJXCqaO8VinAo4t92sUUnLwCxscEe6BaPPgRvn.png', 'John Doe', 38, 9, '2023-08-25 11:11:02', '2023-08-25 11:11:02', 'STK-AK'),
(5, 'Aisyah Rahma Aulia', 'perempuan', '2000-01-01', '08123456789', '222329235001', 'aisyah@gmail.com', 'Bekasi', 'photos/dJAUfoInycyuszyjDfvRaUwPYbi1FsJ2g9uBS9r7.png', 'John Doe', 39, 20, '2023-08-25 11:13:00', '2023-08-25 11:13:00', 'STK-AK'),
(6, 'Ananda Safitri', 'perempuan', '2000-01-01', '08123456789', '222329235002', 'ananda@gmail.com', 'Bekasi', 'photos/kZi4G6COEyi9Tl8z06Bg4xze75mwqFfOFI2loJ8H.png', 'John Doe', 40, 20, '2023-08-25 11:13:32', '2023-08-25 11:13:32', 'STK-AK'),
(7, 'Alfidha Putri Taurustia', 'perempuan', '2000-01-01', '08123456789', '212210128', 'alfidha@gmail.com', 'Bekasi', 'photos/i33hWVW6p8sEhMh7adMsK5WFQkVsAnJyzoFM1jwf.png', 'John Doe', 41, 6, '2023-08-25 17:34:15', '2023-08-25 17:34:15', 'STK-AK'),
(8, 'Amanda Sari Devi', 'perempuan', '2000-01-01', '08123456789', '212210130', 'amanda@gmail.com', 'Bekasi', 'photos/VmTbcJoNbOZS8IkeU58DR83vDoplJwzTGqoEZhU0.png', 'John Doe', 42, 6, '2023-08-25 17:35:24', '2023-08-25 17:35:24', 'STK-AK'),
(9, 'Alda Lia', 'perempuan', '2000-01-01', '08123456789', '212210155', 'alda@gmail.com', 'Bekasi', 'photos/txOQiSkGcC2KusVV8MbKHEk1wzlzPmePpqNeXimF.png', 'John Doe', 43, 15, '2023-08-25 17:36:29', '2023-08-25 17:36:29', 'STK-AK'),
(10, 'Anih Suherman', 'perempuan', '2000-01-01', '08123456789', '212210156', 'anih@gmail.com', 'Bekasi', 'photos/gFF8mSt1lMAAGk1Iix5ITiKnpFt93YNtr0IhTjDK.png', 'John Doe', 44, 15, '2023-08-25 17:37:12', '2023-08-25 17:37:12', 'STK-AK'),
(11, 'Ahmad Nurdin', 'laki-laki', '2000-01-01', '08123456789', '23241206154', 'ahmad@gmail.com', 'Bekasi', 'photos/DF9IOrAk8bfaqyen8S8nW6Z1grxvpyOuhQWqkqkq.png', 'John Doe', 45, 3, '2023-08-25 17:39:55', '2023-08-25 17:39:55', 'STK-MM'),
(12, 'Alysa Putri Ananda', 'perempuan', '2000-01-01', '08123456789', '23241107218', 'alysa@gmail.com', 'Bekasi', 'photos/uZY53alQxYlV2esP3ap3tAJpoMe9siTQP6R0PIVK.png', 'John Doe', 46, 3, '2023-08-25 17:40:34', '2023-08-25 17:40:34', 'STK-MM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', 0, '$2y$10$hfIte8CVCdXUKc1a5aDr6e6zevhUxsV1GZWRezjrmqiFOsOoH4YF6', NULL, '2023-08-23 09:54:07', '2023-08-23 09:54:07'),
(2, 'ANIM ARYANTO, S.Pd', 'anim@gmail.com', 1, '$2y$10$d8KKCt6B5BqHqOOUY1DT/O22U.rYMPY/GMg1Y0qcP95NIaiXKZPVm', NULL, '2023-08-23 10:53:40', '2023-08-23 10:53:40'),
(3, 'BAYU KUSUMO', 'bayu@gmail.com', 1, '$2y$10$E0OMt0AdDD2vViZ.Q2pCS.9MMXSWTVxeDHwJdVXUW9FOSG//h9y5m', NULL, '2023-08-23 17:32:44', '2023-08-23 17:32:44'),
(4, 'EKO RUSLAMSYAH, S.E', 'eko@gmail.com', 1, '$2y$10$lpKUtKgMTRObZnFtKVa4b.rDa5jKZSu99sQ7L8lnXycoks/h/XYj6', NULL, '2023-08-23 17:34:09', '2023-08-23 17:34:09'),
(5, 'FERI SUPRIATNA, S.H', 'feri@gmail.com', 1, '$2y$10$AXg0D5WUox2XmZai4.cnleZgXKt4.Ajg19RGaLHTWcvrxxOxzTJW2', NULL, '2023-08-23 17:36:30', '2023-08-23 17:36:30'),
(6, 'Fiqri Mahadi Fathurohman, S.Pd', 'mahadi@gmail.com', 1, '$2y$10$6V4tfzHFrsMoQcIgqP7jWucG7TdViBtZ2W9Fz4PCxo3ulEb9bOAj2', NULL, '2023-08-23 17:46:13', '2023-08-23 17:46:13'),
(7, 'HETTY FERAWATY, S.E', 'hetty@gmail.com', 1, '$2y$10$RbBB6K/XVs9R2cX0DxQwj.Agi.LfK2pNaka5kouI9MLhB.BdSlOPO', NULL, '2023-08-23 19:03:30', '2023-08-23 19:03:30'),
(8, 'Isnaeni Hidayah, S.Kom', 'isnaeni@gmail.com', 1, '$2y$10$1wE6a77JzUuhO2vnwoS2de09JNz26N4m1Y56IXtEdSxLJaPTKPhVO', NULL, '2023-08-23 19:07:26', '2023-08-23 19:07:26'),
(9, 'ITA FIBRIYANTI, S.Kom', 'ita@gmail.com', 1, '$2y$10$8oauhFzAUg8mEfo1Q4u8pODbDvAfSYuBoDtQATWAryQFUaPvpdT9a', NULL, '2023-08-23 19:08:42', '2023-08-23 19:08:42'),
(10, 'Mahzi Abuzar Farankhan, M.M', 'mahzi@gmail.com', 1, '$2y$10$Jzs8.IW04A/QUTozHhh6fOD9DZF1pjM3KXFjqO8F1SXK4XpITO0yC', NULL, '2023-08-23 19:09:45', '2023-08-23 19:09:45'),
(11, 'MALIK ABDUL AZIS, S.T', 'malik@gmail.com', 1, '$2y$10$Kskj5.xBSGCQM4RBu6qSCuzTUiubUkmBrFFV.6PhwZqLm/P28qNPy', NULL, '2023-08-23 19:10:46', '2023-08-23 19:10:46'),
(12, 'MUHAMMAD ARIF AFIQIH, S.Pd', 'arif@gmail.com', 1, '$2y$10$QoltEEJ1TBcnEKWE.xh6y.J/X0BC9M0wkJH2c1nh9fc5deqLa2HSu', NULL, '2023-08-23 19:11:51', '2023-08-23 19:11:51'),
(13, 'NESEM SUGIRI, S.Pd', 'nesem@gmail.com', 1, '$2y$10$NNs2.yoSTeOHrz1RHPi4vOMmemQuD2vxVJEUOd6wHIFmosGK2AgaK', NULL, '2023-08-23 19:12:39', '2023-08-23 19:12:39'),
(14, 'NOMIN HERYANTO, S.Pd', 'nomin@gmail.com', 1, '$2y$10$4sdFK0RrNEaQrf8b5WWyhelu6YIgVD1ijg2C9JHOtK4CnCRlYFLeK', NULL, '2023-08-23 19:13:49', '2023-08-23 19:13:49'),
(15, 'NOVALD SC.REFLIZON, S.T', 'novald@gmail.com', 1, '$2y$10$Px3tatqN/shKALgh.U/Oz.IhlkJlZuAc9gHjyHXB0j93MSunHvLiS', NULL, '2023-08-23 19:19:08', '2023-08-23 19:19:08'),
(16, 'NUR ALWI, S.Kom', 'nur@gmail.com', 1, '$2y$10$7ZO6niHOhl2RVJLB/EbkBe53Gi0sNajq/UCBmXh9uOLPezM2Sn.IW', NULL, '2023-08-23 19:20:02', '2023-08-23 19:20:02'),
(17, 'Rizky Ramadhan, S.Pd', 'rizky@gmail.com', 1, '$2y$10$0qGi.ioTtvTaTnBXaMRNHes1wu.7CBLxBzGJdxfdaALZn/LrbMfTy', NULL, '2023-08-23 19:23:31', '2023-08-23 19:23:31'),
(18, 'RONI PURNAWAN, S.T', 'roni@gmail.com', 1, '$2y$10$7FDSCv7NUJTK.9n6weebhOn5q6OE3xZNcTRocq6DIA7dQvzApyOBq', NULL, '2023-08-23 19:30:09', '2023-08-23 19:30:09'),
(19, 'SADAM ARYA S.Pd', 'sadam@gmail.com', 1, '$2y$10$auiuq5.cWYF49gADFAEbaubW1YcRg33eJ4LllGC8K3DIQhR5/JFJ.', NULL, '2023-08-23 19:31:24', '2023-08-23 19:31:24'),
(20, 'SAVIRA ARLIANA PRAMESTY, S.Pd', 'savira@gmail.com', 1, '$2y$10$ouzG3ekwXJOXBUsMM3y87.mL8x.VksimEfKjLmYwpTm7NfxgUan5C', NULL, '2023-08-24 02:10:47', '2023-08-24 02:10:47'),
(21, 'Siti Yusihar, S.Pd S.Pd', 'siti@gmail.com', 1, '$2y$10$vsJhf3dPj.oDDb5ynSR8yuxJ15rmyYxLjVWZVsXQ2GstoeTrdrGCK', NULL, '2023-08-24 02:11:53', '2023-08-24 02:11:53'),
(22, 'SUSILOWATI, A.Md.Ak', 'susilowati@gmail.com', 1, '$2y$10$4UkwYMIVdmonT4E8ne7GbOOCajidD3C.iMsQL71DjagtyZ1f8I8cW', NULL, '2023-08-24 02:12:49', '2023-08-24 02:12:49'),
(23, 'Usman, S.Pd', 'usman@gmail.com', 1, '$2y$10$KUXLrTP9RntHP9FczBOlSOmOCGJX8RkPCiUV1H3ZCiUz4OWRT19Ty', NULL, '2023-08-24 02:13:29', '2023-08-24 02:13:29'),
(24, 'YUDI HARTONO, S.Psi', 'yudi@gmail.com', 1, '$2y$10$G5z8CGjIXa3kpSy3Gi/.8.BXAtxm0/eq9/GUwtOz.aHwB4fLbBSge', NULL, '2023-08-24 02:14:09', '2023-08-24 02:14:09'),
(25, 'DEDE SUJANA DIREJA, S.IP S.IP', 'dede@gmail.com', 1, '$2y$10$iY0Cfozz8OiuWxwxmDtTzuCp19BwdEaBtXzjUEEJyc98n.mbF5o5y', NULL, '2023-08-24 02:14:49', '2023-08-24 02:14:49'),
(26, 'Ir. H. Pebri Subhan Somantri Ir.', 'pebri@gmail.com', 1, '$2y$10$lhsAUPN2wJtYxYaGwCEQNOeLxaZfEyxhsmH5qYb6wxZDbD0fVrKi2', NULL, '2023-08-24 02:15:43', '2023-08-24 02:15:43'),
(35, 'Adelia Nursefila', 'adelia@gmail.com', 2, '$2y$10$N44EIraWaOHjOcfbXsyTDujluBZWG1.LmzR578cqTYZGP4Ju9jz5W', NULL, '2023-08-25 11:04:49', '2023-08-25 11:04:49'),
(36, 'Anggun Salfiah', 'anggun@gmail.com', 2, '$2y$10$lGKthCRQyFiNLl4OWstak.JHiUlBTs1gZZFbFf33H9fXlRc1GQ.cy', NULL, '2023-08-25 11:08:27', '2023-08-25 11:08:27'),
(37, 'Amelia Putri', 'amelia@gmail.com', 2, '$2y$10$hzhgJtT2sogjej0ebr840eLOE5ZRGUlN.IKyiq4Ft8BexuBwrN4ye', NULL, '2023-08-25 11:09:51', '2023-08-25 11:09:51'),
(38, 'Ayu Septianing Wardhani', 'ayu@gmail.com', 2, '$2y$10$/a18NgwEKfc/xRyWPgH6vOKZiZpUAYL6e5VLF9bjU9GiuMDu3rPdW', NULL, '2023-08-25 11:11:02', '2023-08-25 11:11:02'),
(39, 'Aisyah Rahma Aulia', 'aisyah@gmail.com', 2, '$2y$10$zpWGVToGceZLFdRYKzV1kOde7ckQwQT2l/WgYa/j/uT2z3cp8vfyi', NULL, '2023-08-25 11:13:00', '2023-08-25 11:13:00'),
(40, 'Ananda Safitri', 'ananda@gmail.com', 2, '$2y$10$H9DOiMKfUv8K8IiOStCrpOq0aOOkJn80hDir7BYtrBMopw8bTCsDG', NULL, '2023-08-25 11:13:32', '2023-08-25 11:13:32'),
(41, 'Alfidha Putri Taurustia', 'alfidha@gmail.com', 2, '$2y$10$pI.y1GgPSbfR4pDNoC4f3.r6wHWBSYM.RwdhZw9o1undu5wdnBwxe', NULL, '2023-08-25 17:34:15', '2023-08-25 17:34:15'),
(42, 'Amanda Sari Devi', 'amanda@gmail.com', 2, '$2y$10$qsMHyEABfKDIVGTqMdDKju8G83ywECVrf2kGInXLMT6FJA0N4v1PW', NULL, '2023-08-25 17:35:24', '2023-08-25 17:35:24'),
(43, 'Alda Lia', 'alda@gmail.com', 2, '$2y$10$Au3cZAs.gd1Z/lX.nYVCbuuCm8TBalQjOiOPKyQtOcdfB1RMzyPWO', NULL, '2023-08-25 17:36:29', '2023-08-25 17:36:29'),
(44, 'Anih Suherman', 'anih@gmail.com', 2, '$2y$10$VbKMTFFrzikTeBFHSIK.FOIlS4P6z/RMqP6wshA.FXEYlNKNoKeHi', NULL, '2023-08-25 17:37:12', '2023-08-25 17:37:12'),
(45, 'Ahmad Nurdin', 'ahmad@gmail.com', 2, '$2y$10$2t1HOUjhgCiTxZUV5ZRsc..JYkVM74SmT2bbUbcG9ZqQQ3XgkNHt6', NULL, '2023-08-25 17:39:55', '2023-08-25 17:39:55'),
(46, 'Alysa Putri Ananda', 'alysa@gmail.com', 2, '$2y$10$JvMYQRxgUpmp2vfRbW3mhenU8nxDB13rR9WiLV20Yxb6/u6jRaf56', NULL, '2023-08-25 17:40:34', '2023-08-25 17:40:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gurus_user_id_foreign` (`user_id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_siswa_id_foreign` (`siswa_id`),
  ADD KEY `scores_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_user_id_foreign` (`user_id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
