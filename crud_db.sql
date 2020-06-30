-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2020 pada 16.05
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `create_by` varchar(128) NOT NULL,
  `create_date` int(11) NOT NULL,
  `update_by` varchar(128) NOT NULL,
  `update_date` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `title`, `content`, `image`, `create_by`, `create_date`, `update_by`, `update_date`, `status`) VALUES
(1, 'Pajak Indonesia', '<p>Pajak Indonesia</p>\r\n', 'Test.png', 'Namrid Artupas', 1593525744, 'Namrid Artupas', 1593525744, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `code_product` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `create_by` varchar(128) NOT NULL,
  `update_on` int(11) NOT NULL,
  `update_by` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `code_product`, `name`, `category`, `image`, `create_by`, `update_on`, `update_by`, `status`) VALUES
(1, 'TRIM-01', 'Trim Pillar A', 'Cars', 'trim_A_Pillar_R-L.png', 'Namrid Artupas', 1593505470, 'Namrid Artupas', 1),
(2, 'TRIM-02', 'Trim Pillar B', 'Cars', 'trim_pillar_b.png', 'Namrid Artupas', 1593505479, 'Namrid Artupas', 1),
(5, 'TRIM-03', 'Trim Pillar C', 'Cars', 'trim_c_pilar.png', 'Namrid Artupas', 1593505857, 'Namrid Artupas', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `user_active` int(11) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `image`, `user_active`, `role_id`) VALUES
(11, 'Namrid Artupas', 'testappnamrid@gmail.com', '$2y$10$9UDDNXTR77WGxtQDydmOv.qN5V3QIPWNTCgTzpJUTDdhfJt1KPSLq', 'Screenshot_20200504-124904.png', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `created_date`) VALUES
(24, 'm.dirmansaputra@gmail.com', 'IuU9WC4Sxn8xF6ErJE+N5+gnRmMeTPyf+Ih2dS/O55Y=', 1593486038),
(25, 'm.dirmansaputra@gmail.com', 'ZveS/tfUKn3RWOOUgZi+qKsA+8zyGgmaA9qU5vFfOXo=', 1593486253);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
