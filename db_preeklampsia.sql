-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jan 2024 pada 18.04
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
(1, '200', '70', '17.5', 1),
(2, '123', '50', '33.049110978915', 2);

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
(1, 1, '110', '90', '90', '96.666666666667'),
(2, 2, '110', '60', '60', '76.666666666667');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `umur_pasien` varchar(100) NOT NULL,
  `nama_suami` varchar(100) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `bmi` varchar(100) NOT NULL DEFAULT 'belum',
  `map` varchar(100) NOT NULL DEFAULT 'belum',
  `rot` varchar(100) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `umur_pasien`, `nama_suami`, `alamat_pasien`, `bmi`, `map`, `rot`) VALUES
(1, 'SUMI', '28', 'JONI', 'PRINGSEWU', 'sudah', 'sudah', 'sudah'),
(2, 'NOVITA', '28', 'MARDI', 'PRINGSEWU', 'sudah', 'sudah', 'sudah'),
(4, 'DPRD', '12', 'AKA', '12', 'belum', 'belum', 'belum');

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
(1, 'APP', '2022/2023', 'preeklampsia', 'IBU HAMIL', 'JL Wismarini No 09 Pringsewu Lampung', '', '26122022051024.jpg', 'mardybest@gmail.com'),
(2, 're', '', 'MARDIYANTO', '19081989578978975', '', '', '', '');

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
(1, 1, '123', '121', '2'),
(2, 2, '123', '12', '111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`) VALUES
(1, 'Adminatun Jhony', 'admin', '21232f297a57a5a743894a0e4a801fc3', '482937136_avatar.png'),
(10, 'aka', 'aka', 'c4ca4238a0b923820dcc509a6f75849b', '1869563217_ilustrasi-ikan-lele-1_169.jpeg'),
(11, 'tes', '123', '202cb962ac59075b964b07152d234b70', ''),
(12, 'bangsat', 'bangsat', '528f980649c80a7269402447b51e815a', '1638032220_17-52-06-IMG-20221008-WA0001.jpg');

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
  MODIFY `id_bmi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id_map` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rot`
--
ALTER TABLE `rot`
  MODIFY `id_rot` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
