-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2020 pada 16.27
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_depot_air`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(225) NOT NULL,
  `purchase_price` int(225) NOT NULL,
  `selling_price` int(225) NOT NULL,
  `stock_product` int(225) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `name_product`, `purchase_price`, `selling_price`, `stock_product`, `image`) VALUES
(1, 'Galon Aqua', 18000, 20000, 12, 'aqua.jpg'),
(2, 'Gas 3 Kg', 18000, 22000, 10, 'gas3kg.jpg'),
(3, 'Gas 12 Kg', 50000, 60000, 8, 'gas12kg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sales`
--

CREATE TABLE `tb_sales` (
  `id_sales` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `jumlah_beli` int(100) NOT NULL,
  `sales_date` date NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sales`
--

INSERT INTO `tb_sales` (`id_sales`, `id_user`, `id_product`, `amount`, `jumlah_beli`, `sales_date`, `status`) VALUES
(1, 7, 2, 22000, 0, '2020-08-31', 'kirim'),
(2, 7, 1, 20000, 0, '2020-08-31', 'kirim'),
(3, 7, 3, 60000, 0, '2020-08-31', 'kirim'),
(5, 7, 1, 20000, 0, '2020-09-04', 'kirim'),
(6, 7, 1, 20000, 0, '2020-09-04', ''),
(7, 7, 2, 22000, 0, '2020-12-12', ''),
(8, 7, 1, 20000, 0, '2020-12-12', ''),
(9, 7, 3, 60000, 0, '2020-12-12', ''),
(10, 7, 1, 20000, 0, '2020-12-12', ''),
(11, 7, 1, 20000, 0, '2020-12-12', ''),
(12, 7, 2, 44000, 2, '2020-12-12', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `level_user` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `gender`, `phone_number`, `address`, `level_user`) VALUES
(1, 'owner', 'b3duZXI=', 'Pria', '08998868936', 'Tambun', 'owner'),
(6, 'karyawan', 'a2FyeWF3YW4=', 'Pria', '08998868937', 'Tambun', 'karyawan'),
(7, 'konsumen', 'a29uc3VtZW4=', 'Pria', '08998868938', 'Tambun', 'konsumen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_sales`
--
ALTER TABLE `tb_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
