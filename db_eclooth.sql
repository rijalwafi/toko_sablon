-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 06:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eclooth`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_product` int(100) NOT NULL,
  `id_sales` int(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nama_ekspedisi` varchar(100) NOT NULL,
  `tgl_pembayaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bukti_bayar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_user`, `id_product`, `id_sales`, `nama_bank`, `nama_ekspedisi`, `tgl_pembayaran`, `bukti_bayar`) VALUES
(1, 28, 1, 38, 'bca', ' jne', '2020-12-30 11:51:31', 'riwaba.jpg'),
(4, 28, 1, 40, 'mandiri', 'tiki', '2020-12-30 16:02:43', 'beranda2.jpg'),
(5, 28, 1, 41, 'mandiri', 'tiki', '2020-12-30 16:53:19', 'cek.png'),
(6, 38, 3, 42, 'mandiri', ' jne', '2020-12-30 17:04:03', 'beranda3.jpg'),
(7, 38, 1, 43, 'bca', ' jne', '2020-12-30 17:12:25', 'kucing1.jpg'),
(8, 38, 2, 44, 'bri', 'tiki', '2020-12-30 17:17:02', '1.png'),
(9, 28, 1, 46, 'bca', ' jne', '2021-01-01 14:10:02', NULL),
(10, 28, 2, 45, 'bca', 'wahana', '2021-01-01 14:13:29', '1.jpg'),
(11, 39, 23, 48, 'bca', ' jne', '2021-01-01 16:30:47', NULL),
(12, 28, 3, 50, 'mandiri', ' jne', '2021-01-01 16:36:06', 'WhatsApp_Image_2021-01-01_at_23_18_56.jpeg'),
(13, 28, 20, 53, 'mandiri', ' jne', '2021-01-01 17:58:50', 'WhatsApp_Image_2021-01-01_at_23_18_561.jpeg'),
(14, 28, 20, 54, 'mandiri', ' jne', '2021-01-02 04:24:46', 'WhatsApp_Image_2021-01-01_at_23_18_562.jpeg'),
(15, 28, 3, 55, 'mandiri', ' jne', '2021-01-02 06:34:08', 'WhatsApp_Image_2021-01-01_at_23_18_563.jpeg'),
(16, 28, 23, 56, 'mandiri', ' jne', '2021-01-03 16:12:09', 'WhatsApp_Image_2021-01-01_at_23_18_564.jpeg'),
(17, 28, 23, 56, 'mandiri', ' jne', '2021-01-03 16:14:22', 'WhatsApp_Image_2021-01-01_at_23_18_565.jpeg'),
(18, 40, 20, 57, 'mandiri', 'tiki', '2021-01-05 15:55:25', '577b1ee4449c238fe4f739b0ac2eb928.jpg'),
(19, 40, 3, 58, 'bca', ' jne', '2021-01-06 09:32:59', 'WhatsApp_Image_2020-01-23_at_17_12_12.jpeg'),
(20, 39, 3, 60, 'mandiri', ' jne', '2021-01-06 10:58:19', 'WhatsApp_Image_2021-01-04_at_20_12_13.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(20) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `purchase_price` int(20) NOT NULL,
  `selling_price` int(20) NOT NULL,
  `stock_product` int(100) NOT NULL,
  `image` varchar(225) NOT NULL,
  `size` varchar(20) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `name_product`, `purchase_price`, `selling_price`, `stock_product`, `image`, `size`, `keterangan`) VALUES
(3, 'Kaos Polo Shirt Custom', 65000, 80000, 90, '577b1ee4449c238fe4f739b0ac2eb928.jpg', 'XL', 'Polo\r\nRp 80.0000\r\nKaos New States Apparel (Import)\r\n\r\nBahan katun dengan serat halus, pola standard Asia\r\ntanpa jahitan samping (Built Up), nyaman dipakai\r\nBahan katun dengan serat halus, pola stand\r\nBahan katun dengan serat halus, pola standard Asia\r\ntanpa jahitan samping (Built Up), nyaman dipakai\r\nBahan katun dengan serat halus, pola stand\r\nBahan katun dengan serat halus, pola standard Asia\r\ntanpa jahitan samping (Built Up), nyaman dipakai\r\nBahan katun dengan serat halus, pola stand\r\nBahan katun dengan serat halus, pola standard Asia\r\ntanpa jahitan samping (Built Up), nyaman dipakai\r\nBahan katun dengan serat halus, pola stand'),
(20, 'Kaos Lengan Pendek Custom', 45000, 60000, 94, 'WhatsApp_Image_2020-12-27_at_21_06_31_(1).jpeg', '', 'Kaos Lengan Pendek\r\nRp 60.0000\r\nKaos New States Apparel (Import)\r\n\r\nBahan katun dengan serat halus, pola standard Asia tanpa jahitan samping (Built Up), \r\nnyaman dipakai, jahitan rantai pada bagian pundak. \r\nKaos NSA menyediakan dua pilihan bahan:\r\n\r\nSoft Tees - Ketebalan 30s, bahan kaos lebih tipis\r\nPremium Cotton - Ketebalan 24s, bahan kaos cukup tebal (ketebalan diantara 20s dan 30s)\r\n\r\n'),
(21, 'Kaos Lengan Panjang Custom', 65000, 80000, 100, 'WhatsApp_Image_2020-12-27_at_21_06_31.jpeg', '', '\r\nKaos Lengan Panjang\r\nRp 80.0000\r\nKaos New States Apparel (Import)\r\n\r\nBahan katun dengan serat halus, pola standard Asia tanpa jahitan samping (Built Up), nyaman dipakai'),
(22, 'Hoodie Custom', 80000, 10000, 100, 'WhatsApp_Image_2020-12-27_at_21_06_31_(2).jpeg', '', '\r\nHoodie\r\nRp 100.0000\r\nKaos New States Apparel (Import)\r\n\r\nBahan katun dengan serat halus, pola standard Asia tanpa jahitan samping (Built Up), nyaman dipakai'),
(23, 'Jaket Custom', 85000, 100000, 96, 'WhatsApp_Image_2021-01-01_at_23_25_09.jpeg', '', '\r\nJaket\r\nRp 100.0000\r\nKaos New States Apparel (Import)\r\n\r\nBahan katun dengan serat halus, pola standard Asia tanpa jahitan samping (Built Up), nyaman dipakai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sales`
--

CREATE TABLE `tb_sales` (
  `id_sales` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `warna` varchar(12) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `jumlah_beli` int(100) NOT NULL,
  `amount` int(12) NOT NULL,
  `design_sablon` varchar(200) NOT NULL,
  `sales_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sales`
--

INSERT INTO `tb_sales` (`id_sales`, `id_user`, `id_product`, `warna`, `size`, `jumlah_beli`, `amount`, `design_sablon`, `sales_date`, `status`) VALUES
(44, 38, 2, 'Merah', 'S', 9, 198000, 'cek.png', '2020-12-30 17:14:37.000000', 'kirim'),
(45, 28, 2, 'Merah', 'XL', 3, 66000, '12.png', '2020-12-31 09:22:45.000000', 'done'),
(46, 28, 1, 'Kuning', 'L', 3, 60000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2).jpeg', '2021-01-01 14:04:09.000000', ''),
(47, 39, 23, 'Putih', 'M', 1, 100000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)1.jpeg', '2021-01-01 16:29:32.000000', ''),
(48, 39, 23, 'Putih', 'S', 2, 200000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)2.jpeg', '2021-01-01 16:30:14.000000', 'kirim'),
(49, 39, 20, 'Merah', 'S', 1, 60000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)3.jpeg', '2021-01-01 16:31:14.000000', ''),
(50, 28, 3, 'Merah', 'XL', 2, 160000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)4.jpeg', '2021-01-01 16:35:03.000000', 'done'),
(51, 39, 23, 'Hitam', 'M', 1, 100000, 'WhatsApp_Image_2020-01-23_at_17_12_12.jpeg', '2021-01-01 17:52:21.000000', ''),
(52, 39, 20, 'Hitam', 'S', 1, 60000, 'WhatsApp_Image_2020-01-23_at_17_12_121.jpeg', '2021-01-01 17:53:39.000000', ''),
(53, 28, 20, 'Hitam', 'S', 1, 60000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)5.jpeg', '2021-01-01 17:57:34.000000', 'kirim'),
(54, 28, 20, 'Merah', 'M', 2, 120000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)6.jpeg', '2021-01-02 04:23:43.000000', 'done'),
(55, 28, 3, 'Hitam', 'M', 2, 160000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)7.jpeg', '2021-01-02 06:33:02.000000', 'done'),
(56, 28, 23, 'Merah', 'M', 2, 200000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)8.jpeg', '2021-01-03 16:11:27.000000', 'kirim'),
(57, 40, 20, 'Hijau', 'XL', 3, 180000, '1.jpg', '2021-01-05 15:53:34.000000', 'done'),
(58, 40, 3, 'Merah', 'S', 1, 80000, '11.jpg', '2021-01-05 16:00:38.000000', ''),
(59, 36, 21, 'Merah', 'M', 1, 80000, 'delivery.png', '2021-01-05 16:57:21.000000', ''),
(60, 39, 3, 'Hitam', 'S', 3, 240000, 'WhatsApp_Image_2020-01-23_at_17_12_12_(2)9.jpeg', '2021-01-06 10:56:25.000000', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `level_user` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `gender`, `phone_number`, `address`, `level_user`) VALUES
(1, 'owner', 'b3duZXI=', 'Pria', '08998868936', 'Tambun', 'owner'),
(6, 'karyawan', 'a2FyeWF3YW4=', 'Pria', '08998868937', 'Tambun', 'karyawan'),
(7, 'intan12', 'a29uc3VtZW4=', 'Wanita', '08998868938', 'Tambun', 'konsumen'),
(9, 'antonio2', 'a29uc3VtZW4=', 'Pria', '085718448978', 'tes', 'konsumen'),
(12, '', '', '', '', '', 'konsumen'),
(13, '333', 'MzMz', '333', '08998868938', '333', 'konsumen'),
(26, 'asas', 'YXNhcw==', 'asaas', '121212', 'asaas', 'konsumen'),
(28, 'anton', 'cmlqYWw=', 'Wanita', '082111343815', 'Jl. Kenari I No.17, Kel. Margahayu, Kec. Bekasi Timur, Kota Bekasi.', 'konsumen'),
(29, 'joko', 'am9rbw==', 'laki-laki', '091', 'joko', 'konsumen'),
(30, '1212', 'MTIxMg==', '', '1221', '1221', 'konsumen'),
(37, 'Staff', 'MTIy', 'Wanita', '122', 'bekasi', 'karyawan'),
(38, 'dona', 'MTIz', 'Wanita', '0211', 'bekasi', 'konsumen'),
(39, 'Julissti', 'MTIzNDU2', 'Wanita', '089637781437', 'Jl. Kenari I No.17 ', 'konsumen'),
(40, 'barons2', 'MTEx', 'Pria', '888', 'banjar masin', 'konsumen'),
(42, 'Ecel', 'MTIz', 'Wanita', '0833', 'Bekasi Timur', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_sales`
--
ALTER TABLE `tb_sales`
  MODIFY `id_sales` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
