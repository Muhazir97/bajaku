-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Mar 2020 pada 13.09
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(20) NOT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `harga_beli` varchar(15) DEFAULT NULL,
  `harga_jual` int(15) DEFAULT NULL,
  `keuntungan` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `barcode`, `nama`, `harga_beli`, `harga_jual`, `keuntungan`) VALUES
(3, '111', 'sikat gigi formula', '1300', 1500, '200'),
(4, '222', 'good day mocca', '1200', 1300, '100'),
(5, '333', 'Top Kopi White', '900', 1100, '200'),
(6, '555', 'Ikan Bandeng 1 ons', '2000', 2500, '500'),
(29, '890078', 'molto', '1500', 2000, '500'),
(9, '777', 'Bawang Merah 1 ons', '1000', 1500, '500'),
(10, '23555', 'teh kotak', '2300', 2500, '200'),
(31, '0009876', 'bayclean', '1500', 2000, '500'),
(13, '986663', 'Roti Roma', '2400', 2700, '300'),
(14, '96555', 'sikat gigi', '1200', 1500, '300'),
(27, '444', 'ayam', '1500', 5000, '1000'),
(24, '909090', 'kayu', '2000', 1500, '500'),
(25, '1111', 'bedak', '2000', 1500, '500'),
(26, '3333', 'terasi', '1500', 2000, '500'),
(32, '8992745326229', 'Stella green fantasi', '4000', 5000, '1000'),
(33, '8992745140955', 'Hit', '10000', 12000, '2000'),
(34, '111334', 'kopi kapal api', '1500', 2500, '500'),
(36, '000', 'SUSU', '7000', 8000, '1000'),
(37, '12345', 'Bodrex', '500', 1000, '500'),
(38, '12345', 'Bodrex', '500', 1000, '500'),
(39, '909091', 'kisspray', '4000', 5000, '1000'),
(40, '67977', 'Minyak goreng 1 L', '7000', 8000, '1000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `belanja`
--

CREATE TABLE `belanja` (
  `id` int(20) NOT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `harga_beli` varchar(10) DEFAULT NULL,
  `harga_jual` varchar(10) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT '1',
  `sub_total` decimal(10,0) DEFAULT NULL,
  `kasir` varchar(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `flag` char(1) DEFAULT '1',
  `waktu` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `belanja`
--

INSERT INTO `belanja` (`id`, `barcode`, `nama`, `harga_beli`, `harga_jual`, `jumlah`, `sub_total`, `kasir`, `tgl`, `flag`, `waktu`) VALUES
(284, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'mukidi', '2019-10-01', '1', '00:38:06'),
(285, NULL, 'Aqua segar', '13000', '15000', '2', '30000', 'azir', '2019-10-01', '1', '00:38:45'),
(291, NULL, 'Kecap abc', '1500', '1650', '56', '92400', 'mukidi', '2019-10-02', '1', '15:43:39'),
(309, NULL, 'good day mocca', '1200', '1300', '22', '28600', 'azir', '2019-10-07', '1', '17:19:15'),
(307, NULL, 'Bawang Merah 1 ons', '1000', '1500', '77', '115500', 'azir', '2019-10-07', '1', '17:15:45'),
(306, NULL, 'Kecap abc B', '1500', '1650', '66', '108900', 'azir', '2019-10-07', '1', '17:15:38'),
(305, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '2', '5000', 'azir', '2019-10-07', '1', '17:15:31'),
(303, NULL, 'Top Kopi White', '900', '1100', '3', '3300', 'azir', '2019-10-07', '1', '17:15:17'),
(304, NULL, 'ayam', '1500', '5000', '4', '20000', 'azir', '2019-10-07', '1', '17:15:26'),
(302, NULL, 'good day mocca', '1200', '1300', '2', '2600', 'azir', '2019-10-07', '1', '17:15:12'),
(301, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-07', '1', '17:15:07'),
(300, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-07', '1', '13:50:04'),
(299, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-06', '1', '01:57:15'),
(298, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-05', '1', '01:57:11'),
(297, NULL, 'Kecap abc B', '1500', '1650', '2', '3300', 'azir', '2019-10-05', '1', '01:17:44'),
(294, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', 'azir', '2019-10-04', '1', '23:22:29'),
(295, NULL, 'Bawang Merah 1 ons', '1000', '1500', '6', '9000', 'azir', '2019-10-04', '1', '23:23:04'),
(290, NULL, 'Aqua segar', '13000', '15000', '3', '45000', 'azir', '2019-10-01', '1', '01:00:49'),
(292, NULL, 'ayam', '1500', '5000', '564', '2820000', 'mukidi', '2019-10-02', '1', '15:43:58'),
(288, NULL, 'Aqua segar', '13000', '15000', '2', '30000', 'azir', '2019-10-01', '1', '00:51:46'),
(289, NULL, 'Aqua segar', '13000', '15000', '3', '45000', 'azir', '2019-10-01', '1', '01:00:36'),
(283, NULL, 'Aqua segar', '13000', '15000', '2', '30000', 'mukidi', '2019-10-01', '1', '00:34:51'),
(293, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', 'mukidi', '2019-10-03', '1', '15:45:30'),
(296, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '2', '5000', 'azir', '2019-10-04', '1', '23:33:03'),
(308, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-07', '1', '17:19:11'),
(325, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', '', '2019-10-09', '1', '11:00:27'),
(324, NULL, 'Bawang Merah 1 ons', '1000', '1500', '3', '4500', 'azir', '2019-10-09', '1', '09:27:55'),
(323, NULL, 'ayam', '1500', '5000', '2', '10000', 'azir', '2019-10-09', '1', '09:25:02'),
(281, NULL, 'Kecap abc', '1500', '1650', '2', '3300', 'mukidi', '2019-10-01', '1', '00:27:48'),
(282, NULL, 'Aqua segar', '13000', '15000', '3', '45000', 'mukidi', '2019-10-01', '1', '00:27:53'),
(310, NULL, 'Top Kopi White', '900', '1100', '3', '3300', 'azir', '2019-10-07', '1', '17:19:19'),
(311, NULL, 'ayam', '1500', '5000', '1', '5000', 'azir', '2019-10-07', '1', '17:19:24'),
(312, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '1', '2500', 'azir', '2019-10-07', '1', '17:19:29'),
(313, NULL, 'sikat gigi formula', '1300', '1500', '1', '1500', 'azir', '2019-10-07', '1', '17:19:33'),
(314, NULL, 'sikat gigi formula', '1300', '1500', '1', '1500', 'azir', '2019-10-07', '1', '17:19:40'),
(315, NULL, 'Kecap abc B', '1500', '1650', '2', '3300', 'azir', '2019-10-07', '1', '18:44:45'),
(316, NULL, 'sikat gigi formula', '1300', '1500', '1', '1500', 'azir', '2019-10-07', '1', '18:44:54'),
(319, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-08', '1', '13:15:20'),
(320, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-09', '1', '09:09:59'),
(321, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-09', '1', '09:10:04'),
(322, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-09', '1', '09:11:06'),
(326, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', '', '2019-10-09', '1', '11:01:58'),
(327, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', '', '2019-10-09', '1', '11:04:04'),
(328, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', '', '2019-10-09', '1', '11:05:22'),
(329, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', '', '2019-10-09', '1', '11:05:59'),
(330, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', 'azir', '2019-10-09', '1', '11:06:29'),
(331, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', '', '2019-10-09', '1', '11:11:05'),
(332, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '2', '5000', '', '2019-10-09', '1', '11:12:25'),
(333, NULL, 'ayam', '1500', '5000', '3', '15000', '', '2019-10-09', '1', '11:22:21'),
(334, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', '', '2019-10-09', '1', '14:07:33'),
(335, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', '', '2019-10-09', '1', '14:09:23'),
(336, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', '', '2019-10-09', '1', '14:10:12'),
(337, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', 'mukidi', '2019-10-09', '1', '14:11:25'),
(338, NULL, 'Kecap abc B', '1500', '1650', '2', '3300', 'mukidi', '2019-10-09', '1', '14:13:05'),
(339, NULL, 'Bawang Merah 1 ons', '1000', '1500', '1', '1500', 'azir', '2019-10-09', '1', '14:16:21'),
(340, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', 'mukidi', '2019-10-09', '1', '14:18:38'),
(344, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'mukidi', '2019-10-09', '1', '17:09:42'),
(342, NULL, 'ayam', '1500', '5000', '4', '20000', 'azir', '2019-10-09', '1', '14:21:16'),
(343, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'mukidi', '2019-10-09', '1', '17:08:33'),
(345, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-10', '1', '11:15:43'),
(346, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '1', '2500', 'azir', '2019-10-10', '1', '11:15:54'),
(347, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '1', '2500', 'azir', '2019-10-10', '1', '11:44:08'),
(348, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-10', '1', '11:15:43'),
(349, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '1', '2500', 'azir', '2019-10-10', '1', '11:15:54'),
(350, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '1', '2500', 'azir', '2019-10-10', '1', '11:44:08'),
(351, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-10', '1', '11:15:43'),
(352, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '1', '2500', 'azir', '2019-10-10', '1', '11:15:54'),
(353, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '1', '2500', 'azir', '2019-10-10', '1', '11:44:08'),
(354, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-10', '1', '11:55:51'),
(355, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-10', '1', '11:55:51'),
(356, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-10', '1', '11:55:51'),
(357, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-10', '1', '11:55:51'),
(358, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-10', '1', '11:55:51'),
(359, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-10', '1', '11:55:51'),
(360, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-10', '1', '11:55:51'),
(361, NULL, 'ayam', '1500', '5000', '3', '15000', 'azir', '2019-10-10', '1', '12:04:44'),
(362, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '3', '7500', 'azir', '2019-10-10', '1', '11:55:51'),
(363, NULL, 'ayam', '1500', '5000', '3', '15000', 'azir', '2019-10-10', '1', '12:04:44'),
(364, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-10', '1', '12:44:53'),
(365, NULL, 'Bawang Merah 1 ons', '1000', '1500', '10', '15000', 'azir', '2019-10-10', '1', '12:54:27'),
(366, NULL, 'Kecap abc B', '1500', '1650', '6', '9900', 'azir', '2019-10-10', '1', '13:06:25'),
(367, NULL, 'ayam', '1500', '5000', '4', '20000', 'azir', '2019-10-10', '1', '13:12:00'),
(368, NULL, 'Kecap abc B', '1500', '1650', '4', '6600', 'azir', '2019-10-10', '1', '13:16:07'),
(369, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '4', '10000', 'azir', '2019-10-10', '1', '13:17:11'),
(370, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-10', '1', '13:26:00'),
(371, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-10', '1', '14:14:25'),
(372, NULL, 'SUSU', '7000', '8000', '2', '16000', 'azir', '2019-10-10', '1', '14:14:30'),
(373, NULL, 'SUSU', '7000', '8000', '1', '8000', 'azir', '2019-10-10', '1', '14:14:35'),
(374, NULL, 'SUSU', '7000', '8000', '2', '16000', 'azir', '2019-10-10', '1', '14:15:02'),
(375, NULL, 'SUSU', '7000', '8000', '4', '32000', 'azir', '2019-10-10', '1', '14:15:07'),
(376, NULL, 'sikat gigi formula', '1300', '1500', '4', '6000', 'azir', '2019-10-10', '1', '14:15:30'),
(377, NULL, 'Kecap abc B', '1500', '1650', '4', '6600', 'azir', '2019-10-10', '1', '14:15:33'),
(378, NULL, 'Bawang Merah 1 ons', '1000', '1500', '4', '6000', 'azir', '2019-10-10', '1', '14:15:36'),
(379, NULL, 'ayam', '1500', '5000', '3', '15000', 'azir', '2019-10-10', '1', '14:15:40'),
(380, NULL, 'Kecap abc B', '1500', '1650', '10', '16500', 'azir', '2019-10-10', '1', '14:15:44'),
(381, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-10', '1', '14:15:47'),
(382, NULL, 'Kecap abc B', '1500', '1650', '10', '16500', 'azir', '2019-10-10', '1', '14:15:50'),
(383, NULL, 'Kecap abc B', '1500', '1650', '1', '1650', 'azir', '2019-10-10', '1', '14:15:54'),
(384, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-10', '1', '14:15:58'),
(385, NULL, 'SUSU', '7000', '8000', '3', '24000', 'azir', '2019-10-10', '1', '14:16:01'),
(386, NULL, 'Kecap abc B', '1500', '1650', '4', '6600', 'azir', '2019-10-10', '1', '14:16:06'),
(387, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', 'azir', '2019-10-10', '1', '14:16:08'),
(388, NULL, 'SUSU', '7000', '8000', '2', '16000', 'azir', '2019-10-10', '1', '14:16:12'),
(389, NULL, 'Kecap abc B', '1500', '1650', '4', '6600', 'azir', '2019-10-10', '1', '14:16:17'),
(390, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '6', '15000', 'azir', '2019-10-10', '1', '14:16:22'),
(393, NULL, 'Kecap abc B', '1500', '1650', '3', '4950', 'azir', '2019-10-11', '1', '17:10:58'),
(394, NULL, 'ayam', '1500', '5000', '4', '20000', 'mukidi', '2019-10-14', '1', '07:39:09'),
(395, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', '', '2019-10-14', '1', '08:04:34'),
(396, NULL, 'sikat gigi formula', '1300', '1500', '3', '4500', '', '2019-10-14', '1', '08:06:34'),
(397, NULL, 'Ikan Bandeng 1 ons', '2000', '2500', '4', '10000', '', '2019-10-14', '1', '08:06:39'),
(398, NULL, 'sikat gigi formula', '1300', '1500', '2', '3000', '', '2019-10-14', '1', '08:47:54'),
(399, NULL, 'SUSU', '7000', '8000', '2', '16000', 'azir', '2019-10-14', '1', '08:49:45'),
(400, NULL, 'SUSU', '7000', '8000', '3', '24000', 'azir', '2019-12-01', '1', '08:30:47'),
(401, NULL, 'sikat gigi formula', '1300', '1500', '1', '1500', 'azir', '2020-03-13', '1', '10:52:55'),
(402, NULL, 'good day mocca', '1200', '1300', '1', '1300', 'azir', '2020-03-13', '1', '10:53:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_login`
--

CREATE TABLE `data_login` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_login`
--

INSERT INTO `data_login` (`id`, `nama`, `password`, `level`) VALUES
(1, 'azir', '0997', 'admin'),
(2, 'mukidi', '123', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(20) NOT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `harga_beli` varchar(10) DEFAULT NULL,
  `harga_jual` varchar(10) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT '1',
  `sub_total` varchar(10) DEFAULT NULL,
  `kasir` varchar(10) DEFAULT NULL,
  `tgl` varchar(10) DEFAULT NULL,
  `waktu` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_bayar`
--

CREATE TABLE `temp_bayar` (
  `id` int(11) NOT NULL,
  `bayar` char(8) DEFAULT NULL,
  `kembali` char(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_bayar`
--
ALTER TABLE `temp_bayar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `belanja`
--
ALTER TABLE `belanja`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;
--
-- AUTO_INCREMENT for table `data_login`
--
ALTER TABLE `data_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;
--
-- AUTO_INCREMENT for table `temp_bayar`
--
ALTER TABLE `temp_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
