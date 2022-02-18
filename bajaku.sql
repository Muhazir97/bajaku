-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2022 pada 08.01
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bajaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(20) NOT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `harga_beli` varchar(15) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_brg`, `barcode`, `nama`, `harga_beli`, `stock`) VALUES
(63, 'spdk1', 'Spandek', '100000', -5),
(62, 'ts1', 'Taso ', '200000', -25),
(64, 'br1', 'Baja Ringan ', '100000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `belanja`
--

CREATE TABLE `belanja` (
  `id` int(20) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
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

INSERT INTO `belanja` (`id`, `id_brg`, `id_nota`, `barcode`, `nama`, `harga_beli`, `harga_jual`, `jumlah`, `sub_total`, `kasir`, `tgl`, `flag`, `waktu`) VALUES
(697, 62, 84, 'ts1', 'Taso ', '200000', '30000', '5', '150000', 'Oky', '2022-02-16', '1', '21:04:17'),
(696, 64, 83, 'br1', 'Baja Ringan ', '100000', '100000', '2', '200000', 'Oky', '2022-02-16', '1', '19:20:57'),
(695, 62, 83, 'ts1', 'Taso ', '200000', '30000', '2', '60000', 'Oky', '2022-02-16', '1', '19:20:40'),
(694, 64, 82, 'br1', 'Baja Ringan ', '100000', '100000', '5', '500000', 'Oky', '2022-02-16', '1', '10:08:16'),
(693, 62, 82, 'ts1', 'Taso ', '200000', '100000', '2', '200000', 'Oky', '2022-02-15', '1', '10:08:05'),
(692, 64, 81, 'br1', 'Baja Ringan ', '100000', '100000', '2', '200000', 'Oky', '2022-02-15', '1', '10:03:50'),
(691, 62, 81, 'ts1', 'Taso ', '200000', '200000', '5', '1000000', 'Oky', '2022-02-14', '1', '10:03:35'),
(690, 64, 80, 'br1', 'Baja Ringan ', '100000', '100000', '10', '1000000', 'Oky', '2022-02-13', '1', '10:01:33'),
(689, 63, 80, 'spdk1', 'Spandek', '100000', '100000', '5', '500000', 'Oky', '2022-02-14', '1', '10:01:13'),
(688, 62, 80, 'ts1', 'Taso ', '200000', '200000', '2', '400000', 'Oky', '2022-02-16', '1', '10:00:58');

--
-- Trigger `belanja`
--
DELIMITER $$
CREATE TRIGGER `barang_out` BEFORE INSERT ON `belanja` FOR EACH ROW BEGIN 
    UPDATE barang SET stock = stock-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_login`
--

CREATE TABLE `data_login` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_login`
--

INSERT INTO `data_login` (`id`, `nama`, `email`, `password`, `level`) VALUES
(10, 'azir', 'muhazir@gmail.com', '123', 'admin'),
(16, 'mukidi', 'mukidi@gmail.com', '123', 'pegawai'),
(17, 'Oky', 'oky@gmail.com', '123', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemasangan`
--

CREATE TABLE `data_pemasangan` (
  `id_pemasangan` int(11) NOT NULL,
  `id_nota_pemasangan` int(11) DEFAULT NULL,
  `id_brg` int(11) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `kasir` varchar(100) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pemasangan`
--

INSERT INTO `data_pemasangan` (`id_pemasangan`, `id_nota_pemasangan`, `id_brg`, `material`, `jumlah`, `harga_jual`, `sub_total`, `kasir`, `tgl`, `waktu`) VALUES
(112, 29, 62, 'Taso ', 2, NULL, NULL, 'Oky', '2022-02-16', '10:11:13'),
(113, 29, 64, 'Baja Ringan ', 10, NULL, NULL, 'Oky', '2022-02-16', '10:11:20'),
(114, 29, 63, 'Spandek', 5, NULL, NULL, 'Oky', '2022-02-16', '10:11:31'),
(115, 30, 64, 'Baja Ringan ', 15, NULL, NULL, 'Oky', '2021-02-27', '10:12:43'),
(116, 30, 63, 'Spandek', 7, NULL, NULL, 'Oky', '2021-02-27', '10:12:57'),
(117, 31, 62, 'Taso ', 2, NULL, NULL, 'Oky', '2022-02-16', '19:23:07'),
(118, 31, 64, 'Baja Ringan ', 5, NULL, NULL, 'Oky', '2022-02-16', '19:23:23'),
(119, 32, 62, 'Taso ', 2, NULL, NULL, 'Oky', '2022-02-16', '21:01:41'),
(120, 33, 62, 'Taso ', 15, NULL, NULL, 'Oky', '2022-02-16', '21:02:33');

--
-- Trigger `data_pemasangan`
--
DELIMITER $$
CREATE TRIGGER `barang_outp` BEFORE INSERT ON `data_pemasangan` FOR EACH ROW BEGIN 
    UPDATE barang SET stock = stock-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_belanja`
--

CREATE TABLE `nota_belanja` (
  `id_nota` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` char(10) DEFAULT NULL,
  `kasir` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nota_belanja`
--

INSERT INTO `nota_belanja` (`id_nota`, `tgl`, `waktu`, `kasir`) VALUES
(80, '2021-02-26', '10:01:46', 'Oky'),
(81, '2021-02-27', '10:04:08', 'Oky'),
(82, '2021-02-25', '10:08:29', 'Oky'),
(83, '2022-02-16', '19:21:09', 'Oky'),
(84, '2022-02-16', '21:04:21', 'Oky');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_pemasangan`
--

CREATE TABLE `nota_pemasangan` (
  `id_nota_pemasangan` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `kasir` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_customer` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_tlp` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dp1` int(11) DEFAULT NULL,
  `dp2` int(11) DEFAULT NULL,
  `dp3` int(11) DEFAULT NULL,
  `catatan` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `nota_pemasangan`
--

INSERT INTO `nota_pemasangan` (`id_nota_pemasangan`, `tgl`, `waktu`, `kasir`, `nama_customer`, `no_tlp`, `alamat`, `dp1`, `dp2`, `dp3`, `catatan`, `status`) VALUES
(29, '2021-02-27', '10:12:07', 'Oky', 'Haji midi', '089678327', 'serang', 2000000, 0, 0, '', 'LUNAS'),
(30, '2021-02-27', '10:13:55', 'Oky', 'Haji munir', '08967628', 'serang', 1000000, 0, 0, 'Sisa 1000.000 lagi, segera di lunaskan', 'BELUM LUNAS'),
(31, '2022-02-16', '19:23:55', 'Oky', 'Haji munir', '035656', 'cdcdc', 50000, 0, 0, 'oke', 'LUNAS'),
(32, '2022-02-16', '21:02:08', 'Oky', 'Muhamad Safei', '07987', 'dvfd', 2000000, 0, 0, '', 'LUNAS'),
(33, '2022-02-16', '21:02:54', 'Oky', 'Haji munir', '0', '34ed', 0, 0, 0, '', 'LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(20) NOT NULL,
  `id_brg` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_pemasangan`
--

CREATE TABLE `temp_pemasangan` (
  `id_pemasangan` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `material` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `kasir` varchar(80) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_surat`
--

CREATE TABLE `temp_surat` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `satuan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temp_surat`
--

INSERT INTO `temp_surat` (`id`, `nama_barang`, `jumlah_barang`, `satuan`) VALUES
(42, 'taso 17M', 2, 'lembar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pemasangan`
--
ALTER TABLE `data_pemasangan`
  ADD PRIMARY KEY (`id_pemasangan`),
  ADD KEY `id_nota_pemasangan` (`id_nota_pemasangan`);

--
-- Indeks untuk tabel `nota_belanja`
--
ALTER TABLE `nota_belanja`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `nota_pemasangan`
--
ALTER TABLE `nota_pemasangan`
  ADD PRIMARY KEY (`id_nota_pemasangan`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temp_bayar`
--
ALTER TABLE `temp_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temp_pemasangan`
--
ALTER TABLE `temp_pemasangan`
  ADD PRIMARY KEY (`id_pemasangan`);

--
-- Indeks untuk tabel `temp_surat`
--
ALTER TABLE `temp_surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `belanja`
--
ALTER TABLE `belanja`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=698;

--
-- AUTO_INCREMENT untuk tabel `data_login`
--
ALTER TABLE `data_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `data_pemasangan`
--
ALTER TABLE `data_pemasangan`
  MODIFY `id_pemasangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `nota_belanja`
--
ALTER TABLE `nota_belanja`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `nota_pemasangan`
--
ALTER TABLE `nota_pemasangan`
  MODIFY `id_nota_pemasangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=763;

--
-- AUTO_INCREMENT untuk tabel `temp_bayar`
--
ALTER TABLE `temp_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT untuk tabel `temp_pemasangan`
--
ALTER TABLE `temp_pemasangan`
  MODIFY `id_pemasangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `temp_surat`
--
ALTER TABLE `temp_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pemasangan`
--
ALTER TABLE `data_pemasangan`
  ADD CONSTRAINT `data_pemasangan_ibfk_1` FOREIGN KEY (`id_nota_pemasangan`) REFERENCES `nota_pemasangan` (`id_nota_pemasangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
