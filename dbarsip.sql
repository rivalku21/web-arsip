-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 10:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggaran`
--

CREATE TABLE `tbl_anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `nama_anggaran` varchar(50) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `keterangan_anggaran` varchar(100) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggaran`
--

INSERT INTO `tbl_anggaran` (`id_anggaran`, `nama_anggaran`, `tanggal_upload`, `keterangan_anggaran`, `file`) VALUES
(2, 'Proposal Anggaran Dana', '2020-07-02', '-', '5f27bffeee278.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_bantuan`
--

CREATE TABLE `tbl_data_bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `tgl_terima` date NOT NULL,
  `no_tlp_penerima` varchar(50) NOT NULL,
  `email_penerima` varchar(50) NOT NULL,
  `bentuk_bantuan` varchar(50) NOT NULL,
  `besar_bantuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data_bantuan`
--

INSERT INTO `tbl_data_bantuan` (`id_bantuan`, `nama_penerima`, `tgl_terima`, `no_tlp_penerima`, `email_penerima`, `bentuk_bantuan`, `besar_bantuan`) VALUES
(3, 'Rival Fauzi', '1999-10-22', '082226171153', 'rival4267@gmail.com', 'Buku', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_kependudukan`
--

CREATE TABLE `tbl_data_kependudukan` (
  `id_penduduk` int(11) NOT NULL,
  `nama_penduduk` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `no_tlp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data_kependudukan`
--

INSERT INTO `tbl_data_kependudukan` (`id_penduduk`, `nama_penduduk`, `tanggal_lahir`, `no_ktp`, `kota`, `kecamatan`, `kelurahan`, `no_tlp`) VALUES
(13, 'Rival Fauzi', '1999-10-22', '3309022210999002', 'Boyolali', 'Ampel', 'Ngargosari', '082226171153');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_pembangunan`
--

CREATE TABLE `tbl_data_pembangunan` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `harga_satuan` varchar(50) NOT NULL,
  `jumlah_barang` int(16) NOT NULL,
  `harga_total` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data_pembangunan`
--

INSERT INTO `tbl_data_pembangunan` (`id_barang`, `nama_barang`, `tgl_diterima`, `harga_satuan`, `jumlah_barang`, `harga_total`, `keterangan`, `file`) VALUES
(5, 'ESP32', '2020-07-16', '85000', 3, '255000', 'baru', '5f1007b1c188c.jpg'),
(6, 'mesin bor', '2020-07-22', '250000', 1, '250000', 'baru', '5f17aae243ed0.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggaran`
--
ALTER TABLE `tbl_anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `tbl_data_bantuan`
--
ALTER TABLE `tbl_data_bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indexes for table `tbl_data_kependudukan`
--
ALTER TABLE `tbl_data_kependudukan`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`);

--
-- Indexes for table `tbl_data_pembangunan`
--
ALTER TABLE `tbl_data_pembangunan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggaran`
--
ALTER TABLE `tbl_anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_data_bantuan`
--
ALTER TABLE `tbl_data_bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_data_kependudukan`
--
ALTER TABLE `tbl_data_kependudukan`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_data_pembangunan`
--
ALTER TABLE `tbl_data_pembangunan`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
