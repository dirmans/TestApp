-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2020 pada 08.33
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
-- Struktur dari tabel `career`
--

CREATE TABLE `career` (
  `id_career` int(11) NOT NULL,
  `code_career` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `create_by` varchar(128) NOT NULL,
  `create_date` int(11) NOT NULL,
  `update_by` varchar(128) NOT NULL,
  `update_date` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `career`
--

INSERT INTO `career` (`id_career`, `code_career`, `title`, `content`, `create_by`, `create_date`, `update_by`, `update_date`, `status`) VALUES
(1, 'IT-001', 'IT Support', '<h4><span style=\"font-size:18px\"><u><strong>Requirements :</strong></u></span></h4>\r\n\r\n<p><u><strong>Tugas dan Tanggung Jawab :</strong></u></p>\r\n\r\n<ul>\r\n	<li>Memastikan hardware device (Router, Switch, Akses point, PABX) berjalan dengan baik untuk mendukung proses bisnis organisasi.</li>\r\n	<li>Trouble shooting dan instalasi komputer, notebook, jaringan komputer, internet dan telepon.</li>\r\n	<li>Memastikan instalasi komputer, instalasi jaringan, maupun instalasi telepon aman sesuai prosedur K3.</li>\r\n	<li>Memastikan instalasi komputer, instalasi jaringan, maupun instalasi telepon aman sesuai prosedur K3.</li>\r\n	<li>dll</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u><strong>Job Requirements</strong></u></p>\r\n\r\n<ul>\r\n	<li>Laki-laki usia min 20 tahun pada saat masuk</li>\r\n	<li>Pendidikan min&nbsp;<strong>D3 Ilmu Komputer, Teknik Informatika atau Manajemen Informatika</strong></li>\r\n	<li>Pengalaman min&nbsp;<strong>1 tahun dibidangnya</strong></li>\r\n	<li>Memamahami kegiatan / langkah-langkah Proses Bisnis di Organisasi Perusahaan</li>\r\n	<li>Menguasai instalasi komputer, instalasi jaringan, troubleshooting komputer dan jaringan, dan instalasi telephone (PABX).</li>\r\n	<li>Mampu bekerja dibawah tekanan</li>\r\n</ul>\r\n', 'Namrid Artupas', 1593665065, 'Namrid Artupas', 1593665827, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
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
(1, 'Eksistensi Panda Tirai Bambu', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'debbie-molle-6DSID8Ey9-U-unsplash.jpg', 'Namrid Artupas', 1593525744, 'Namrid Artupas', 1593666005, 0);

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
(11, 'Namrid Artupas', 'testappnamrid@gmail.com', '$2y$10$9UDDNXTR77WGxtQDydmOv.qN5V3QIPWNTCgTzpJUTDdhfJt1KPSLq', 'IMG_0660.JPG', 1, 1),
(15, 'Dirman', 'm.dirmansaputra@gmail.com', '$2y$10$bjwHnu0t855niMLUE8hvWuIbPgTQd8svag6FJhnpCbQn31iY68HwW', 'default.jpg', 1, 1);

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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id_career`);

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
-- AUTO_INCREMENT untuk tabel `career`
--
ALTER TABLE `career`
  MODIFY `id_career` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
