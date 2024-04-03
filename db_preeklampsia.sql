-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Apr 2024 pada 17.07
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_preeklampsia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bmi`
--

CREATE TABLE `bmi` (
  `id_bmi` int(100) NOT NULL,
  `tb` varchar(100) NOT NULL,
  `bb` varchar(100) NOT NULL,
  `total_bmi` varchar(100) NOT NULL,
  `id_pasien` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bmi`
--

INSERT INTO `bmi` (`id_bmi`, `tb`, `bb`, `total_bmi`, `id_pasien`) VALUES
(7, '123', '40', '26.439288783132', 7),
(8, '165', '66', '24.242424242424', 8),
(9, '165', '50', '18.365472910927', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `map`
--

CREATE TABLE `map` (
  `id_map` int(100) NOT NULL,
  `id_pasien` int(100) NOT NULL,
  `sistole` varchar(100) NOT NULL,
  `diastole1` varchar(100) NOT NULL,
  `diastole2` varchar(100) NOT NULL,
  `total_map` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `map`
--

INSERT INTO `map` (`id_map`, `id_pasien`, `sistole`, `diastole1`, `diastole2`, `total_map`) VALUES
(7, 7, '23', '23', '23', '23'),
(8, 8, '34', '34', '34', '34'),
(9, 9, '110', '60', '60', '76.666666666667');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(100) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `umur_pasien` varchar(100) NOT NULL,
  `nama_suami` varchar(100) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `bmi` varchar(100) NOT NULL DEFAULT 'belum',
  `map` varchar(100) NOT NULL DEFAULT 'belum',
  `rot` varchar(100) NOT NULL DEFAULT 'belum',
  `sub_total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_user`, `nama_pasien`, `umur_pasien`, `nama_suami`, `alamat_pasien`, `bmi`, `map`, `rot`, `sub_total`) VALUES
(7, 2, 'aka', '23', '23', 'r', 'sudah', 'sudah', 'sudah', '52.744199881023'),
(8, 2, 'NOVITA', '23', 'MARDI', 'PRINGSEWU', 'sudah', 'sudah', 'sudah', ''),
(9, 2, 'DPRD', '28', 'MARDI', 'PRINGSEWU', 'sudah', 'sudah', 'sudah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(20) NOT NULL,
  `nama_app` varchar(100) NOT NULL,
  `tahun` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alias` varchar(350) NOT NULL,
  `alamat` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `akabest` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_app`, `tahun`, `nama`, `alias`, `alamat`, `isi`, `gambar`, `akabest`) VALUES
(1, 'APP', '2022/2023', 'preeklampsia', 'IBU HAMIL', 'JL Wismarini No 09 Pringsewu Lampung', 'tes', '26122022051024.jpg', 'mardybest@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rot`
--

CREATE TABLE `rot` (
  `id_rot` int(100) NOT NULL,
  `id_pasien` int(100) NOT NULL,
  `terlentang` varchar(100) NOT NULL,
  `miring` varchar(100) NOT NULL,
  `total_rot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rot`
--

INSERT INTO `rot` (`id_rot`, `id_pasien`, `terlentang`, `miring`, `total_rot`) VALUES
(7, 7, '23', '23', '0'),
(8, 8, '34', '34', '0'),
(9, 9, '123', '121', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `email`, `user_username`, `user_password`, `user_foto`, `status`) VALUES
(1, 'admin', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'admin'),
(2, 'aka', NULL, 'aka', '6ac933301a3933c8a22ceebea7000326', NULL, 'user'),
(3, 'user', 'user@gmail.com', 'user', '202cb962ac59075b964b07152d234b70', NULL, 'user'),
(4, 'd', 'desrilmusa6@gmail.com', 'd', '8277e0910d750195b448797616e091ad', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
  ADD PRIMARY KEY (`id_bmi`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id_map`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `rot`
--
ALTER TABLE `rot`
  ADD PRIMARY KEY (`id_rot`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmi`
--
ALTER TABLE `bmi`
  MODIFY `id_bmi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id_map` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rot`
--
ALTER TABLE `rot`
  MODIFY `id_rot` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bmi`
--
ALTER TABLE `bmi`
  ADD CONSTRAINT `bmi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `map`
--
ALTER TABLE `map`
  ADD CONSTRAINT `map_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rot`
--
ALTER TABLE `rot`
  ADD CONSTRAINT `rot_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
