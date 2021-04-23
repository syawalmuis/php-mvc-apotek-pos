-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2021 pada 03.52
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_x`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(40) NOT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `cust_name` varchar(40) DEFAULT NULL,
  `sub_total` int(100) DEFAULT NULL,
  `qty` int(50) DEFAULT NULL,
  `cash` int(40) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `invoice`, `cust_name`, `sub_total`, `qty`, `cash`, `date`) VALUES
(1, 'Invoice-2021-01-29-AX000001', 'Muh Syawal', 6800, 2, 10000, '2021-01-29 16:11:17'),
(2, 'Invoice-2021-01-30-AX000002', 'John Doe', 13600, 4, 20000, '2021-01-30 10:03:56'),
(3, 'Invoice-2021-01-30-AX000003', 'Umum', 3000, 1, 5000, '2021-01-30 10:04:33'),
(4, 'Invoice-2021-01-30-AX000004', 'John Doe', 2550, 1, 6000, '2021-01-30 10:14:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_product`
--

CREATE TABLE `like_product` (
  `id` int(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `value` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `like_product`
--

INSERT INTO `like_product` (`id`, `code`, `username`, `value`) VALUES
(63, 'prdk001', 'shwwl', 1),
(64, 'prdk002', 'shwwl', 1),
(66, 'prdk001', 'jondoe', 0),
(67, 'prdk002', 'jondoe', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `code` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `price` varchar(30) DEFAULT NULL,
  `stock` int(50) DEFAULT NULL,
  `info` varchar(30) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `value` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`code`, `name`, `category`, `type`, `unit`, `price`, `stock`, `info`, `image`, `value`) VALUES
('prdk001', 'Paramex', 'Flu & Batuk', 'Biru', 'Botol', '4000', 2, 'Bebas terbatas', 'Paramex_6013a3454b387-2021-01-29.png', 1),
('prdk002', 'Bodrex', 'Flu & Batuk', 'Biru', 'Botol', '5000', 14, 'Bebas terbatas', 'Bodrex_6013a35bb4c37-2021-01-29.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_out`
--

CREATE TABLE `stock_out` (
  `id` int(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `stock_out` int(50) DEFAULT NULL,
  `info` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `stock_first` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock_out`
--

INSERT INTO `stock_out` (`id`, `code`, `name`, `stock_out`, `info`, `date`, `stock_first`) VALUES
(1, 'prdk001', 'Paramex', 5, 'Hilang', '2021-01-29', 10),
(2, 'prdk002', 'Bodrex', 5, 'Hilang', '2021-01-30', 18),
(3, 'prdk001', 'Paramex', 5, 'Obat bebas', '2021-01-30', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supp` int(50) NOT NULL,
  `supp_name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `supp_addr` varchar(50) DEFAULT NULL,
  `supp_date` date DEFAULT NULL,
  `supp_note` varchar(50) DEFAULT NULL,
  `stock_supp` varchar(50) DEFAULT NULL,
  `stock_first` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supp`, `supp_name`, `code`, `name`, `supp_addr`, `supp_date`, `supp_note`, `stock_supp`, `stock_first`) VALUES
(1, 'PT. GELORA MEMBARA', 'prdk001', 'Paramex', 'Sidrap', '2021-01-29', 'Gratis', '10', '0'),
(2, 'PT Maju-Mundur', 'prdk002', 'Bodrex', 'Pinrang', '2021-01-29', 'Gratis', '10', '0'),
(3, 'PT. GELORA MEMBARA', 'prdk003', 'bodrex', 'Sidrap', '2021-01-30', 'Gratis', '5', '0'),
(4, 'PT. GELORA MEMBARA', 'prdk001', 'Paramex', 'Sidrap', '2021-01-30', '', '6', '3'),
(5, 'PT Maju-Mundur', 'prdk004', 'paramex', 'Pinrang', '2021-01-30', 'Gratis', '6', '0'),
(6, 'PT. GELORA MEMBARA', 'prdk005', 'bodrex', 'Sidrap', '2021-01-30', 'Gratis', '3', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supp_data`
--

CREATE TABLE `supp_data` (
  `id` varchar(30) NOT NULL,
  `supp_name` varchar(20) DEFAULT NULL,
  `supp_addr` varchar(50) DEFAULT NULL,
  `supp_contact` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supp_data`
--

INSERT INTO `supp_data` (`id`, `supp_name`, `supp_addr`, `supp_contact`) VALUES
('Supp002', 'PT. GELORA MEMBARA', 'Sidrap', 'tes@gmail.com'),
('Supp003', 'PT Maju-Mundur', 'Pinrang', 'example@gmail.com'),
('Supp004', 'PT. JAYA ABADI', 'Sidrap', 'jayaabadi223@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(30) NOT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `qty` int(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(20) NOT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dsc` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `invoice`, `code`, `name`, `price`, `qty`, `date`, `dsc`) VALUES
(1, 'Invoice-2021-01-29-AX000001', 'prdk001', 'Paramex', 4000, 2, '2021-01-29', 0.15),
(2, 'Invoice-2021-01-30-AX000002', 'prdk002', 'Bodrex', 5000, 1, '2021-01-30', 0.15),
(3, 'Invoice-2021-01-30-AX000002', 'prdk001', 'Paramex', 4000, 2, '2021-01-30', 0.15),
(4, 'Invoice-2021-01-30-AX000002', 'prdk003', 'bodrex', 3000, 1, '2021-01-30', 0.15),
(5, 'Invoice-2021-01-30-AX000003', 'prdk003', 'bodrex', 3000, 1, '2021-01-30', 0),
(6, 'Invoice-2021-01-30-AX000004', 'prdk003', 'bodrex', 3000, 1, '2021-01-30', 0.15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `id` varchar(20) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `qrcode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `email`, `name`, `password`, `level`, `alamat`, `image`, `qrcode`) VALUES
('usr0001', 'admin', NULL, 'admin', 'admin', 'admin', NULL, NULL, NULL),
('usr0002', 'shwwl', 'ms.muis.launggu@gmail.com', 'Muh Syawal', '1234', 'member', 'Barugae', 'shwwl_6013c283e4e45-2021-01-29.gif', 'usr0002-6013c283e51ea_2021-01-29'),
('usr0003', 'jondoe', 'example@gmail.com', 'John Doe', '1234', 'member', 'Madrid', 'jondoe_6014bafa142c7-2021-01-30.gif', 'usr0003-6014bafa14827_2021-01-30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `like_product`
--
ALTER TABLE `like_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`code`);

--
-- Indeks untuk tabel `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supp`);

--
-- Indeks untuk tabel `supp_data`
--
ALTER TABLE `supp_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `like_product`
--
ALTER TABLE `like_product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supp` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
