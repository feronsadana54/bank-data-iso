-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2021 pada 05.20
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_triwulan`
--

CREATE TABLE `data_triwulan` (
  `id` int(11) NOT NULL,
  `nama_berkas` varchar(256) NOT NULL,
  `judul_file` varchar(256) NOT NULL,
  `tanggal` date NOT NULL,
  `bussinnes_area` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_triwulan`
--

INSERT INTO `data_triwulan` (`id`, `nama_berkas`, `judul_file`, `tanggal`, `bussinnes_area`, `file`) VALUES
(27, 'UAS_ML_09021381823085_Feron_Sadana4.docx', 'FORMULIR PC/LAPTOP CHECKING', '2021-11-04', '123-123', '.docx'),
(28, '349__SURAT_PEMASANGAN_wifi.docx', 'FORMULIR PC/LAPTOP CHECKING', '2021-11-04', '345-345', '.docx'),
(29, 'Daftar_Pustaka.docx', 'Radio', '2021-11-05', '312-312', '.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `image`, `pass`, `role_id`, `is_active`, `date_created`) VALUES
(53, 'feron sadana', 'feronsadana', 'default.jpg', '$2y$10$PNg2mrFAToSm5DTudWEKl.UYnM85Sl8ySN95cOL1OvYkzNni389Ae', 2, 1, 1636033706),
(54, 'Manager', 'manager', 'default.jpg', '$2y$10$Pm1THLCJ8veyswz9UyRsDuDW2TvUmAV9rSg0NB8n9fMJuwUIkI.Hi', 3, 1, 1636050302),
(55, 'User', 'user', 'default.jpg', '', 2, 1, 1636050316),
(58, 'admin', 'admin', 'default.jpg', '$2y$10$zR/cu2SQHFe/QRZJ/28Wy.L53j4Rxvw0o8/TFP1O4pzcopleBUs12', 1, 1, 1636172148);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(17, 1, 3),
(19, 3, 4),
(21, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data_perbulan`
--

CREATE TABLE `user_data_perbulan` (
  `id` int(11) NOT NULL,
  `nama_berkas` varchar(256) NOT NULL,
  `bisnis_area` varchar(250) NOT NULL,
  `judul_file` varchar(256) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_data_perbulan`
--

INSERT INTO `user_data_perbulan` (`id`, `nama_berkas`, `bisnis_area`, `judul_file`, `tanggal`, `file`) VALUES
(10, 'Daftar_Pustaka.docx', '321-321', 'FORMULIR CHECKLIST PEMANTAUAN RUANG DATA CENTER', '2021-11-04', '.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_judul`
--

CREATE TABLE `user_judul` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `kategori_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_judul`
--

INSERT INTO `user_judul` (`id`, `judul`, `kategori_id`) VALUES
(7, 'FORMULIR PC/LAPTOP CHECKING', 1),
(8, 'FORMULIR CHECKLIST PEMANTAUAN RUANG DATA CENTER', 2),
(9, 'Radio', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_kategori_judul`
--

CREATE TABLE `user_kategori_judul` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_kategori_judul`
--

INSERT INTO `user_kategori_judul` (`id`, `kategori`) VALUES
(1, 'Triwulan'),
(2, 'Perbulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(13, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(25, 1, 'Managemen Akun', 'admin/manageakun', 'fas fa-fw fa-tasks', 1),
(33, 2, 'My Profile', 'user/myprofile', 'fas fa-fw fa-user', 1),
(34, 4, 'Dashboard', 'manager', 'fas fa-fw fa-columns', 1),
(43, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-circle', 1),
(44, 2, 'ISO', 'joint/iso', 'fas fa-fw fa-key', 1),
(49, 2, 'Kategori file', 'joint', 'fas fa-tasks', 1),
(51, 4, 'Kategori file', 'manager/kategori_file', 'fas fa-fw fa-tasks', 1),
(52, 3, 'Menu management', 'menu', 'fas fa-fw fa-folder', 1),
(53, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(54, 1, 'Input ISO', 'joint/inputiso', 'fas fa-fw fa-check-square', 1),
(57, 5, 'Home', 'manager', 'fas fa-fw fa-columns', 1),
(58, 5, 'Kategori file', 'manager/kategori_file', 'fas fa-fw fa-tasks', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(85, 'feronsadana16@gmail.com', 'vF3vZhnCD1vtq9+A25G+X59rieiBhp9XTm0pbCZrZG0=', 1628256824),
(86, 'feron1223@gmail.com', 'b5cb93d894bb4b45639865b00fdf4d2adab39409cd5c7605d23295b2dc01be4d', 1628257045),
(87, 'feron1223@gmail.com', '1aea4932ea9a91a9e16b2e92f7b0733be382d6a507467628a93f53af62f2ae06', 1628257096),
(88, 'feron1223@gmail.com', '7ebfc5dfc10ddf8f873d36ddd71f8eca4d1ec145a552ba53431899c54c55de35', 1628257215),
(89, 'feron1223@gmail.com', 'e8c994cd553748b3e3629f693becdc5e856fd7c410bcd4131174a5a2808a7aba', 1628257306),
(90, 'feron1223@gmail.com', '2e6df3541ad92bea73ff6c80bd8e7d03a0f037073080d3fa71bbf4297609b248', 1628258035),
(91, 'feron1223@gmail.com', 'IYP3hRfwcNAaT1mhd2aA+d87VW/7brG7AYa8OCxVYfw=', 1628842539);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_triwulan`
--
ALTER TABLE `data_triwulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_data_perbulan`
--
ALTER TABLE `user_data_perbulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_judul`
--
ALTER TABLE `user_judul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_kategori_judul`
--
ALTER TABLE `user_kategori_judul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_triwulan`
--
ALTER TABLE `data_triwulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_data_perbulan`
--
ALTER TABLE `user_data_perbulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_judul`
--
ALTER TABLE `user_judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_kategori_judul`
--
ALTER TABLE `user_kategori_judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
