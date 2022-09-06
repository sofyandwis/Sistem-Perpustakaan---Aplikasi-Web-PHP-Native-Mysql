-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2021 pada 09.09
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(4, 'jarwo', '$2y$10$m/.HpbkESeAxV.UuN4WgAO/S.pSUr0OpZCsFhS5sOOM0RpRlNnP7i');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nim` int(12) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `jk` varchar(5) NOT NULL,
  `prodi` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nim`, `nama_anggota`, `tempat_lahir`, `jk`, `prodi`) VALUES
(4, 2042011001, 'Agus Shofyan Dwi Saputro', 'Kab.Semarang', 'L', 'Management Informatika'),
(5, 204201107, 'Bayu Wijiana', 'Banyumas', 'L', 'Management Informatika'),
(16, 2042011002, 'Aren Kurnia', 'Subang', 'P', 'Manajemen Informatika'),
(20, 2042011003, 'Arie Akbar', 'Pekanbaru', 'L', 'Manajemen Informatika'),
(22, 2042011006, 'Aris Purnama', 'Cianjur', 'L', 'Management Informatika'),
(25, 2042011027, 'Yusfa Julian', 'Bandung', 'P', 'Management Informatika'),
(27, 2042011007, 'Awaludin Muhammad Iqbal', 'Ciamis', 'L', 'Management Informatika'),
(36, 2042011008, 'Bayu Wijiana', 'Banyumas', 'L', 'Management Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `pengarang_buku` varchar(100) NOT NULL,
  `penerbit_buku` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('Rak 1','Rak 2','Rak 3') NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang_buku`, `penerbit_buku`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(6, 'Belajar Codeigniter', 'ridho', 'budi store', '2018', '45234521', 10, 'Rak 2', '2020-07-27'),
(9, 'Ayah', 'Andrea Hirata', 'Bentang Pustaka', '2015', '9786022911029', 1, 'Rak 1', '2021-12-07'),
(10, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2015', '978144415750', 1, 'Rak 3', '2021-12-07'),
(11, 'Edensor', 'Andrea Hirata', 'Bentang Pustaka', '', '9789791227025', 5, 'Rak 3', '2021-12-07'),
(12, 'Sang Pemimpi', 'Andrea Hirata', 'Bentang Pustaka', '2006', '9793062924', 2, 'Rak 3', '2021-12-07'),
(13, 'Hidup Itu Keras Maka Gebuklah', 'Prie GS, Lord Ahmad, Gadis Ania ', 'Visimedia', '2012', '9789790651494', 2, 'Rak 3', '2021-12-07'),
(14, 'Mr &amp; Mrs Writer', 'Achi T. M.', 'PT Gramedia Pustaka Utama', '2016', '9789792953534', 4, 'Rak 3', '2021-12-07'),
(15, 'Ensiklopedia Sains : Perkembangbiakan Makhluk Hidup', 'Sri Winarsih', 'Alprin', '2020', '9786232633636', 2, 'Rak 1', '2021-12-07'),
(17, 'Mariam Kapoor', 'Andrea Hirata', 'Bentang Pustaka', '2012', '978-144-341-575-0', 2, 'Rak 3', '2021-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nim_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_buku`, `nim_transaksi`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(15, 9, 2, 2, '08-12-2021', '15-12-2021', 'pinjam'),
(16, 9, 0, 2, '08-12-2021', '15-12-2021', 'kembali'),
(17, 10, 0, 3, '08-12-2021', '15-12-2021', 'kembali'),
(18, 9, 4, 4, '10-12-2021', '17-12-2021', 'pinjam'),
(19, 10, 20, 20, '10-12-2021', '17-12-2021', 'kembali'),
(20, 12, 27, 27, '10-12-2021', '17-12-2021', 'pinjam'),
(21, 6, 5, 5, '10-12-2021', '17-12-2021', 'pinjam'),
(22, 11, 27, 27, '10-12-2021', '17-12-2021', 'pinjam'),
(23, 6, 35, 35, '10-12-2021', '17-12-2021', 'kembali'),
(24, 10, 5, 5, '10-12-2021', '17-12-2021', 'pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_admin`, `username`, `password`, `nama`) VALUES
(6, 'bayu', '$2y$10$UED/3dTZqhwsIWP9uh6sWOnKeaEx0UR4viLc5kY2cyjNHkPq30JHu', 'Bayu Wijiana'),
(7, 'aren', '$2y$10$PdeoqDUxsq27GM5pUNqj8O1goEzQlP9mrFKDT.7SeUrjRDgfLW6Zy', 'Aren Kurnia'),
(10, 'arie', '$2y$10$va2MzFUyZhlSqwK8NHvz1.daLRwRCaL0pazH3R1.OGCVSnFMFJJ8K', 'Arie Akbar'),
(11, 'aris', '$2y$10$TZwtGAxz/BisycM1X4l/6eM4OqS9uSUv8yElnNB5qeqWNMwjR/uYq', 'Aris Purnama'),
(12, 'awal', '$2y$10$5QmWXLZjpG4Gz2ztkjWX/uvwcguiC9zkSuOITuLkovQBuhjVgXICW', 'Awaludin Muhammad Iqbal'),
(13, 'sopo', '$2y$10$JT8y936GnfyGb16dTF4UZOR9TXzw32JEjk5AGiCaSBhkC3KC/o2Sy', 'Sopo');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
