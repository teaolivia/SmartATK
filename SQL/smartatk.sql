-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2016 at 01:53 PM
-- Server version: 10.1.8-MariaDB-log
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartatk`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_atk`
--

CREATE TABLE `t_atk` (
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_atk`
--

INSERT INTO `t_atk` (`kode_barang`, `nama_barang`, `stok`) VALUES
('A01', 'Snowman Permanent Marker', 300);

-- --------------------------------------------------------

--
-- Table structure for table `t_pemakaian`
--

CREATE TABLE `t_pemakaian` (
  `id_pemakaian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `kategori_user` varchar(16) NOT NULL,
  `n_pakai` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemakaian`
--

INSERT INTO `t_pemakaian` (`id_pemakaian`, `id_user`, `nama_user`, `kategori_user`, `n_pakai`, `kode_barang`, `nama_barang`, `deskripsi`, `tanggal`) VALUES
(1, 1, 'Calvin', 'Mahasiswa', 100, 'A01', 'Snowman Permanent Marker', 'asdasd', '2016-01-27'),
(2, 1, 'Calvin', 'Mahasiswa', 100, 'A01', 'Snowman Permanent Marker', 'asdasd', '2016-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `kategori_user` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_atk`
--
ALTER TABLE `t_atk`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `t_pemakaian`
--
ALTER TABLE `t_pemakaian`
  ADD PRIMARY KEY (`id_pemakaian`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_pemakaian`
--
ALTER TABLE `t_pemakaian`
  MODIFY `id_pemakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
