-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2023 at 12:16 PM
-- Server version: 8.0.34
-- PHP Version: 7.4.28

SET FOREIGN_KEY_CHECKS=0;
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gurus_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
