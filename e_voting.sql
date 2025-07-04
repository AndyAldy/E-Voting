-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2025 pada 09.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_voting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id`, `user_id`, `visi`, `misi`, `foto`) VALUES
(10, 13, 'jdbagyvfuy', 'DUHUydfbb', '1751613659_476208122b2698e363f9.png'),
(11, 14, NULL, NULL, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_unik` varchar(10) NOT NULL,
  `sudah_memilih` tinyint(1) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`id`, `nama`, `kode_unik`, `sudah_memilih`, `dibuat_pada`) VALUES
(1, 'Pemilih-984AuRue', '984AuRue', 0, '2025-06-20 14:13:53'),
(2, 'Pemilih-DwaUkd4u', 'DwaUkd4u', 0, '2025-06-20 14:13:53'),
(3, 'Pemilih-MnIQXgBN', 'MnIQXgBN', 0, '2025-06-20 14:13:53'),
(4, 'Pemilih-WZfBlUK2', 'WZfBlUK2', 0, '2025-06-20 14:13:53'),
(5, 'Pemilih-1zIkG8BP', '1zIkG8BP', 0, '2025-06-20 14:13:53'),
(6, 'Pemilih-aiblpvh3', 'aiblpvh3', 0, '2025-06-20 14:13:53'),
(7, 'Pemilih-UAQScTWl', 'UAQScTWl', 0, '2025-06-20 14:13:53'),
(8, 'Pemilih-kgAQakUY', 'kgAQakUY', 0, '2025-06-20 14:13:53'),
(9, 'Pemilih-E9j0Z1sY', 'E9j0Z1sY', 0, '2025-06-20 14:13:53'),
(10, 'Pemilih-NXK0c6mg', 'NXK0c6mg', 0, '2025-06-20 14:13:53'),
(11, 'Pemilih-TDnDHJfI', 'TDnDHJfI', 0, '2025-06-20 14:30:54'),
(12, 'Pemilih-AvpEo2st', 'AvpEo2st', 0, '2025-06-20 14:30:54'),
(13, 'Pemilih-2SUUTuO2', '2SUUTuO2', 0, '2025-06-20 14:30:54'),
(14, 'Pemilih-S2TZgNF6', 'S2TZgNF6', 0, '2025-06-20 14:30:54'),
(15, 'Pemilih-VtvSoF8a', 'VtvSoF8a', 0, '2025-06-20 14:30:54'),
(16, 'Pemilih-IulHmF6B', 'IulHmF6B', 0, '2025-06-20 14:30:54'),
(17, 'Pemilih-4a85FT1T', '4a85FT1T', 0, '2025-06-20 14:30:54'),
(18, 'Pemilih-xoM6rf91', 'xoM6rf91', 0, '2025-06-20 14:30:54'),
(19, 'Pemilih-cLTV9TPH', 'cLTV9TPH', 0, '2025-06-20 14:30:54'),
(20, 'Pemilih-TIKXANGn', 'TIKXANGn', 0, '2025-06-20 14:30:54'),
(21, 'Pemilih-M69esJoA', 'M69esJoA', 0, '2025-06-20 14:31:15'),
(22, 'Pemilih-BGPL9ni3', 'BGPL9ni3', 0, '2025-06-20 14:31:15'),
(23, 'Pemilih-yKnrVQwR', 'yKnrVQwR', 0, '2025-06-20 14:31:15'),
(24, 'Pemilih-92maD2xN', '92maD2xN', 0, '2025-06-20 14:31:15'),
(25, 'Pemilih-Mq4witpw', 'Mq4witpw', 0, '2025-06-20 14:31:15'),
(26, 'Pemilih-tqYkRLIO', 'tqYkRLIO', 0, '2025-06-20 14:31:15'),
(27, 'Pemilih-paiFe0x5', 'paiFe0x5', 0, '2025-06-20 14:31:15'),
(28, 'Pemilih-tWz1FnlV', 'tWz1FnlV', 0, '2025-06-20 14:31:15'),
(29, 'Pemilih-neHPiuig', 'neHPiuig', 0, '2025-06-20 14:31:15'),
(30, 'Pemilih-JPM1T0sX', 'JPM1T0sX', 0, '2025-06-20 14:31:15'),
(31, 'Pemilih-2G9Jy3cY', '2G9Jy3cY', 0, '2025-06-20 14:36:20'),
(32, 'Pemilih-g2JoLqi8', 'g2JoLqi8', 0, '2025-06-20 14:36:20'),
(33, 'Pemilih-7Wo0lbDN', '7Wo0lbDN', 0, '2025-06-20 14:36:20'),
(34, 'Pemilih-sL8iOXn5', 'sL8iOXn5', 0, '2025-06-20 14:36:20'),
(35, 'Pemilih-L2Nup6L3', 'L2Nup6L3', 0, '2025-06-20 14:36:20'),
(36, 'Pemilih-F7LyoAZh', 'F7LyoAZh', 0, '2025-06-20 14:36:20'),
(37, 'Pemilih-BZ3IbKqG', 'BZ3IbKqG', 0, '2025-06-20 14:36:20'),
(38, 'Pemilih-dMyPMXFu', 'dMyPMXFu', 0, '2025-06-20 14:36:20'),
(39, 'Pemilih-6kn36301', '6kn36301', 0, '2025-06-20 14:36:20'),
(40, 'Pemilih-B2GQxOPY', 'B2GQxOPY', 0, '2025-06-20 14:36:20'),
(41, 'Pemilih-TVq1IZqF', 'TVq1IZqF', 0, '2025-06-20 14:40:32'),
(42, 'Pemilih-UL1aQ38Q', 'UL1aQ38Q', 0, '2025-06-20 14:40:32'),
(43, 'Pemilih-LKtWMbIY', 'LKtWMbIY', 0, '2025-06-20 14:40:32'),
(44, 'Pemilih-wMtX2Ain', 'wMtX2Ain', 0, '2025-06-20 14:40:32'),
(45, 'Pemilih-fYDf5JJa', 'fYDf5JJa', 0, '2025-06-20 14:40:32'),
(46, 'Pemilih-8RHK5AvG', '8RHK5AvG', 0, '2025-06-20 14:40:32'),
(47, 'Pemilih-b1vaggrg', 'b1vaggrg', 0, '2025-06-20 14:40:32'),
(48, 'Pemilih-eRI8pLVi', 'eRI8pLVi', 0, '2025-06-20 14:40:32'),
(49, 'Pemilih-YoCTKw1P', 'YoCTKw1P', 0, '2025-06-20 14:40:32'),
(50, 'Pemilih-RLcynjBl', 'RLcynjBl', 0, '2025-06-20 14:40:32'),
(51, 'Pemilih-DwvnDxzd', 'DwvnDxzd', 0, '2025-06-20 14:46:45'),
(52, 'Pemilih-PIoE1eNT', 'PIoE1eNT', 0, '2025-06-20 14:46:45'),
(53, 'Pemilih-WEafa6k9', 'WEafa6k9', 0, '2025-06-20 14:46:45'),
(54, 'Pemilih-wbgVCqm5', 'wbgVCqm5', 0, '2025-06-20 14:46:45'),
(55, 'Pemilih-abbloPAb', 'abbloPAb', 0, '2025-06-20 14:46:45'),
(56, 'Pemilih-NRErh05G', 'NRErh05G', 0, '2025-06-20 14:46:45'),
(57, 'Pemilih-nhOnSAO2', 'nhOnSAO2', 0, '2025-06-20 14:46:45'),
(58, 'Pemilih-PSOfjUiY', 'PSOfjUiY', 0, '2025-06-20 14:46:45'),
(59, 'Pemilih-i4fWrdVK', 'i4fWrdVK', 0, '2025-06-20 14:46:45'),
(60, 'Pemilih-0Y7SkoPx', '0Y7SkoPx', 0, '2025-06-20 14:46:45'),
(61, 'Pemilih-XCXNWp9i', 'XCXNWp9i', 0, '2025-06-21 16:56:15'),
(62, 'Pemilih-wZPqj1RS', 'wZPqj1RS', 0, '2025-06-21 16:56:15'),
(63, 'Pemilih-WpoEDWW2', 'WpoEDWW2', 0, '2025-06-21 16:56:15'),
(64, 'Pemilih-lSv1Kfpz', 'lSv1Kfpz', 0, '2025-06-21 16:56:15'),
(65, 'Pemilih-sN3jKYKy', 'sN3jKYKy', 0, '2025-06-21 16:56:15'),
(66, 'Pemilih-zYEjZMLQ', 'zYEjZMLQ', 0, '2025-06-21 16:56:15'),
(67, 'Pemilih-7cPRdPEK', '7cPRdPEK', 0, '2025-06-21 16:56:15'),
(68, 'Pemilih-SqmQizYq', 'SqmQizYq', 0, '2025-06-21 16:56:15'),
(69, 'Pemilih-0KAxg8z1', '0KAxg8z1', 0, '2025-06-21 16:56:15'),
(70, 'Pemilih-XsCijSUm', 'XsCijSUm', 0, '2025-06-21 16:56:15'),
(71, 'Pemilih-1kwZHPWa', '1kwZHPWa', 0, '2025-06-21 17:18:58'),
(72, 'Pemilih-UWOvCeYR', 'UWOvCeYR', 0, '2025-06-21 17:18:58'),
(73, 'Pemilih-PUxkXXev', 'PUxkXXev', 0, '2025-06-21 17:18:58'),
(74, 'Pemilih-t0LbXWKa', 't0LbXWKa', 0, '2025-06-21 17:18:58'),
(75, 'Pemilih-uOO6A9lN', 'uOO6A9lN', 0, '2025-06-21 17:18:58'),
(76, 'Pemilih-gxLb1YxD', 'gxLb1YxD', 0, '2025-06-21 17:18:58'),
(77, 'Pemilih-6LpBRZj5', '6LpBRZj5', 0, '2025-06-21 17:18:58'),
(78, 'Pemilih-5eEADDKu', '5eEADDKu', 0, '2025-06-21 17:18:58'),
(79, 'Pemilih-eMDPHoH2', 'eMDPHoH2', 0, '2025-06-21 17:18:58'),
(80, 'Pemilih-T3lgGtWG', 'T3lgGtWG', 0, '2025-06-21 17:18:58'),
(81, 'Pemilih-Q1ertaq5', 'Q1ertaq5', 0, '2025-06-21 17:19:46'),
(82, 'Pemilih-EJN5Ws56', 'EJN5Ws56', 0, '2025-06-21 17:19:46'),
(83, 'Pemilih-3DNgF079', '3DNgF079', 0, '2025-06-21 17:19:46'),
(84, 'Pemilih-ITaXNOwj', 'ITaXNOwj', 0, '2025-06-21 17:19:46'),
(85, 'Pemilih-n9K4c4Gg', 'n9K4c4Gg', 0, '2025-06-21 17:19:46'),
(86, 'Pemilih-Nn5nwN4a', 'Nn5nwN4a', 0, '2025-06-21 17:19:46'),
(87, 'Pemilih-mSAigEYX', 'mSAigEYX', 0, '2025-06-21 17:19:46'),
(88, 'Pemilih-kTdBlIfW', 'kTdBlIfW', 0, '2025-06-21 17:19:46'),
(89, 'Pemilih-d4hOejbt', 'd4hOejbt', 0, '2025-06-21 17:19:46'),
(90, 'Pemilih-viF4UPBh', 'viF4UPBh', 0, '2025-06-21 17:19:46'),
(91, 'Pemilih-YxdRCluj', 'YxdRCluj', 0, '2025-06-21 17:22:15'),
(92, 'Pemilih-44vkf8L8', '44vkf8L8', 0, '2025-06-21 17:22:15'),
(93, 'Pemilih-MrbCVjCX', 'MrbCVjCX', 0, '2025-06-21 17:22:15'),
(94, 'Pemilih-WKPMCffO', 'WKPMCffO', 0, '2025-06-21 17:22:15'),
(95, 'Pemilih-hi5EV58s', 'hi5EV58s', 0, '2025-06-21 17:22:15'),
(96, 'Pemilih-BeEQO4b2', 'BeEQO4b2', 0, '2025-06-21 17:22:15'),
(97, 'Pemilih-fWi1xUfJ', 'fWi1xUfJ', 0, '2025-06-21 17:22:15'),
(98, 'Pemilih-T2dgG6h5', 'T2dgG6h5', 0, '2025-06-21 17:22:15'),
(99, 'Pemilih-ULxM71le', 'ULxM71le', 0, '2025-06-21 17:22:15'),
(100, 'Pemilih-Yh8jOggr', 'Yh8jOggr', 0, '2025-06-21 17:22:15'),
(101, 'Pemilih-s6mAHGw2', 's6mAHGw2', 0, '2025-06-21 17:23:41'),
(102, 'Pemilih-hqxosqBI', 'hqxosqBI', 0, '2025-06-21 17:23:41'),
(103, 'Pemilih-8lpTSwEq', '8lpTSwEq', 0, '2025-06-21 17:23:41'),
(104, 'Pemilih-GJajbDY8', 'GJajbDY8', 0, '2025-06-21 17:23:41'),
(105, 'Pemilih-9b41NiOt', '9b41NiOt', 0, '2025-06-21 17:23:41'),
(106, 'Pemilih-fwxdTKTA', 'fwxdTKTA', 0, '2025-06-21 17:23:41'),
(107, 'Pemilih-Ygpq12Xq', 'Ygpq12Xq', 0, '2025-06-21 17:23:41'),
(108, 'Pemilih-O0RtE5WK', 'O0RtE5WK', 0, '2025-06-21 17:23:41'),
(109, 'Pemilih-l90Xtn9m', 'l90Xtn9m', 0, '2025-06-21 17:23:41'),
(110, 'Pemilih-wER85Rm9', 'wER85Rm9', 0, '2025-06-21 17:23:41'),
(111, 'Pemilih-iooXahVx', 'iooXahVx', 0, '2025-06-21 17:30:27'),
(112, 'Pemilih-zQD0qlWj', 'zQD0qlWj', 0, '2025-06-21 17:30:27'),
(113, 'Pemilih-OUTdGWaw', 'OUTdGWaw', 0, '2025-06-21 17:30:27'),
(114, 'Pemilih-4EZIBl5z', '4EZIBl5z', 0, '2025-06-21 17:30:27'),
(115, 'Pemilih-wS1Y9lrF', 'wS1Y9lrF', 0, '2025-06-21 17:30:27'),
(116, 'Pemilih-p9hXsad7', 'p9hXsad7', 0, '2025-06-21 17:30:27'),
(117, 'Pemilih-mJhjKrTn', 'mJhjKrTn', 0, '2025-06-21 17:30:27'),
(118, 'Pemilih-pjt8fzX0', 'pjt8fzX0', 0, '2025-06-21 17:30:27'),
(119, 'Pemilih-Gdwf4IMx', 'Gdwf4IMx', 0, '2025-06-21 17:30:27'),
(120, 'Pemilih-L32Ns4fN', 'L32Ns4fN', 0, '2025-06-21 17:30:27'),
(121, 'Pemilih-X18SkSD0', 'X18SkSD0', 0, '2025-06-21 17:38:04'),
(122, 'Pemilih-odwSb82D', 'odwSb82D', 0, '2025-06-21 17:38:04'),
(123, 'Pemilih-XZ70UlRv', 'XZ70UlRv', 0, '2025-06-21 17:38:04'),
(124, 'Pemilih-bnxNNfMn', 'bnxNNfMn', 0, '2025-06-21 17:38:04'),
(125, 'Pemilih-2NhxylG0', '2NhxylG0', 0, '2025-06-21 17:38:04'),
(126, 'Pemilih-1b09vrba', '1b09vrba', 0, '2025-06-21 17:38:04'),
(127, 'Pemilih-v20uvmWl', 'v20uvmWl', 0, '2025-06-21 17:38:04'),
(128, 'Pemilih-0oXOudkt', '0oXOudkt', 0, '2025-06-21 17:38:04'),
(129, 'Pemilih-1zIQZhYX', '1zIQZhYX', 0, '2025-06-21 17:38:04'),
(130, 'Pemilih-bFWpovYx', 'bFWpovYx', 0, '2025-06-21 17:38:04'),
(131, 'Pemilih-UYLTCTgL', 'UYLTCTgL', 0, '2025-06-21 17:40:03'),
(132, 'Pemilih-VK2Acnps', 'VK2Acnps', 0, '2025-06-21 17:40:03'),
(133, 'Pemilih-NUycUFo7', 'NUycUFo7', 0, '2025-06-21 17:40:03'),
(134, 'Pemilih-xs3aK0so', 'xs3aK0so', 0, '2025-06-21 17:40:03'),
(135, 'Pemilih-TZyG2sNJ', 'TZyG2sNJ', 0, '2025-06-21 17:40:03'),
(136, 'Pemilih-qLifilqf', 'qLifilqf', 0, '2025-06-21 17:40:03'),
(137, 'Pemilih-0AeXlkwL', '0AeXlkwL', 0, '2025-06-21 17:40:03'),
(138, 'Pemilih-MTHH0VPd', 'MTHH0VPd', 0, '2025-06-21 17:40:03'),
(139, 'Pemilih-rATD8vEw', 'rATD8vEw', 0, '2025-06-21 17:40:03'),
(140, 'Pemilih-8V1GAwaG', '8V1GAwaG', 0, '2025-06-21 17:40:03'),
(141, 'Pemilih-hee0CVqz', 'hee0CVqz', 0, '2025-06-24 10:15:53'),
(142, 'Pemilih-CUIo6EKX', 'CUIo6EKX', 0, '2025-06-24 10:15:53'),
(143, 'Pemilih-PqCfSqta', 'PqCfSqta', 0, '2025-06-24 10:15:53'),
(144, 'Pemilih-tkQtM6JP', 'tkQtM6JP', 0, '2025-06-24 10:15:53'),
(145, 'Pemilih-OBwvQqVL', 'OBwvQqVL', 0, '2025-06-24 10:15:53'),
(146, 'Pemilih-hBAOjf2p', 'hBAOjf2p', 0, '2025-06-24 10:15:53'),
(147, 'Pemilih-E0m2emxC', 'E0m2emxC', 0, '2025-06-24 10:15:53'),
(148, 'Pemilih-yatOoHEW', 'yatOoHEW', 0, '2025-06-24 10:15:53'),
(149, 'Pemilih-nx7862Rw', 'nx7862Rw', 0, '2025-06-24 10:15:53'),
(150, 'Pemilih-EqeTey4o', 'EqeTey4o', 0, '2025-06-24 10:15:53'),
(151, 'Pemilih-OiLpqJAP', 'OiLpqJAP', 0, '2025-07-04 14:21:18'),
(152, 'Pemilih-PQK4ieGk', 'PQK4ieGk', 0, '2025-07-04 14:21:18'),
(153, 'Pemilih-Erql1Kol', 'Erql1Kol', 0, '2025-07-04 14:21:18'),
(154, 'Pemilih-dB8dWf7N', 'dB8dWf7N', 0, '2025-07-04 14:21:18'),
(155, 'Pemilih-zjUdV3zw', 'zjUdV3zw', 0, '2025-07-04 14:21:18'),
(156, 'Pemilih-WLsRrPqf', 'WLsRrPqf', 0, '2025-07-04 14:21:18'),
(157, 'Pemilih-Rf2qlWf1', 'Rf2qlWf1', 0, '2025-07-04 14:21:18'),
(158, 'Pemilih-7q6nj00p', '7q6nj00p', 0, '2025-07-04 14:21:18'),
(159, 'Pemilih-X1HTJb2x', 'X1HTJb2x', 0, '2025-07-04 14:21:18'),
(160, 'Pemilih-K9DC30mt', 'K9DC30mt', 0, '2025-07-04 14:21:18'),
(161, 'Pemilih-AegdkARw', 'AegdkARw', 0, '2025-07-04 14:24:42'),
(162, 'Pemilih-a1n7Li3R', 'a1n7Li3R', 0, '2025-07-04 14:24:42'),
(163, 'Pemilih-1pHtULt4', '1pHtULt4', 0, '2025-07-04 14:24:42'),
(164, 'Pemilih-OVZYO6Qh', 'OVZYO6Qh', 0, '2025-07-04 14:24:42'),
(165, 'Pemilih-sd4DAZy5', 'sd4DAZy5', 0, '2025-07-04 14:24:42'),
(166, 'Pemilih-G6MTioHe', 'G6MTioHe', 0, '2025-07-04 14:24:42'),
(167, 'Pemilih-dTQgYoDu', 'dTQgYoDu', 0, '2025-07-04 14:24:42'),
(168, 'Pemilih-F0F36wR9', 'F0F36wR9', 0, '2025-07-04 14:24:42'),
(169, 'Pemilih-cjCyRyrr', 'cjCyRyrr', 0, '2025-07-04 14:24:42'),
(170, 'Pemilih-VNmWQSko', 'VNmWQSko', 0, '2025-07-04 14:24:42'),
(171, 'Pemilih-EsoOYgA2', 'EsoOYgA2', 0, '2025-07-04 14:26:20'),
(172, 'Pemilih-m2cy3Ist', 'm2cy3Ist', 0, '2025-07-04 14:26:20'),
(173, 'Pemilih-JVgsAXFM', 'JVgsAXFM', 0, '2025-07-04 14:26:20'),
(174, 'Pemilih-z6qQnJhs', 'z6qQnJhs', 0, '2025-07-04 14:26:20'),
(175, 'Pemilih-TzXYCTzb', 'TzXYCTzb', 0, '2025-07-04 14:26:20'),
(176, 'Pemilih-exxAMGJp', 'exxAMGJp', 0, '2025-07-04 14:26:20'),
(177, 'Pemilih-kmiOeWji', 'kmiOeWji', 0, '2025-07-04 14:26:20'),
(178, 'Pemilih-xAAzRi7B', 'xAAzRi7B', 0, '2025-07-04 14:26:20'),
(179, 'Pemilih-UPJY9yde', 'UPJY9yde', 0, '2025-07-04 14:26:20'),
(180, 'Pemilih-PXYLV33u', 'PXYLV33u', 0, '2025-07-04 14:26:20'),
(181, 'Pemilih-CTSCj6MK', 'CTSCj6MK', 0, '2025-07-04 14:28:09'),
(182, 'Pemilih-qYOAqLGx', 'qYOAqLGx', 0, '2025-07-04 14:28:09'),
(183, 'Pemilih-NbpP4z7U', 'NbpP4z7U', 0, '2025-07-04 14:28:09'),
(184, 'Pemilih-lsp4fNsT', 'lsp4fNsT', 0, '2025-07-04 14:28:09'),
(185, 'Pemilih-eWgDPd2t', 'eWgDPd2t', 0, '2025-07-04 14:28:09'),
(186, 'Pemilih-djKCQJgs', 'djKCQJgs', 0, '2025-07-04 14:28:09'),
(187, 'Pemilih-GZ7bbdj9', 'GZ7bbdj9', 0, '2025-07-04 14:28:09'),
(188, 'Pemilih-q3ZBYRIx', 'q3ZBYRIx', 0, '2025-07-04 14:28:09'),
(189, 'Pemilih-x8h6jDOu', 'x8h6jDOu', 0, '2025-07-04 14:28:09'),
(190, 'Pemilih-RRcI2PVc', 'RRcI2PVc', 0, '2025-07-04 14:28:09'),
(191, 'Pemilih-mARwPosG', 'mARwPosG', 0, '2025-07-04 14:30:01'),
(192, 'Pemilih-HFCWwNYg', 'HFCWwNYg', 1, '2025-07-04 14:30:01'),
(193, 'Pemilih-DTRmR9Py', 'DTRmR9Py', 0, '2025-07-04 14:30:01'),
(194, 'Pemilih-xvZm4KSv', 'xvZm4KSv', 0, '2025-07-04 14:30:01'),
(195, 'Pemilih-mdD2TbTf', 'mdD2TbTf', 0, '2025-07-04 14:30:01'),
(196, 'Pemilih-NkreAqS8', 'NkreAqS8', 0, '2025-07-04 14:30:01'),
(197, 'Pemilih-c8KPYN4R', 'c8KPYN4R', 0, '2025-07-04 14:30:01'),
(198, 'Pemilih-Gyedk9jH', 'Gyedk9jH', 0, '2025-07-04 14:30:01'),
(199, 'Pemilih-aOHNB1EE', 'aOHNB1EE', 0, '2025-07-04 14:30:01'),
(200, 'Pemilih-veauPuvS', 'veauPuvS', 0, '2025-07-04 14:30:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','kandidat') NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `dibuat_pada`) VALUES
(1, 'Administrator', 'admin', '$2y$10$WHkE0HilHyXLoqKCtD5MNOYPEOAIsL8LI/ZjSNSkEhLxlh8sDoROK', 'admin', '2025-06-20 01:04:18'),
(13, 'Andy Aldyansyah', 'kandidat1', '$2y$10$guaDptU/lAZh.QEvrTl.h.X3k/5dd7L3O6nbMxhArdqwHm.Ieq.wy', 'kandidat', '2025-06-24 03:16:32'),
(14, 'Arga Alwi', 'kandidat2', '$2y$10$4bRmMsuXpBXkYm7TIqChlOsRK3kmirZIm/7XG7MVxbIt2lC0rd2ai', 'kandidat', '2025-07-04 07:23:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `pemilih_id` int(11) NOT NULL,
  `kandidat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vote`
--

INSERT INTO `vote` (`id`, `pemilih_id`, `kandidat_id`, `created_at`) VALUES
(5, 192, 11, '2025-07-04 07:31:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_unik` (`kode_unik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pemilih` (`pemilih_id`),
  ADD KEY `fk_kandidat` (`kandidat_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `fk_kandidat` FOREIGN KEY (`kandidat_id`) REFERENCES `kandidat` (`id`),
  ADD CONSTRAINT `fk_pemilih` FOREIGN KEY (`pemilih_id`) REFERENCES `pemilih` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
