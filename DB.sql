-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 04:42 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasppaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `uidbarang` int(11) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `hargabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`uidbarang`, `namabarang`, `hargabarang`) VALUES
(1, 'pulpen joyko', 3000),
(2, 'Pensil 2B', 4000),
(3, 'Pengahapus', 2000),
(4, 'Buku Tulis', 5000),
(5, 'Spidol', 7000),
(6, 'Serutan Kecil', 1000),
(7, 'Serutan Besar', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `uiddetail` int(11) NOT NULL,
  `uidtransaksi` varchar(20) NOT NULL,
  `uidbarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `hargabarang` int(11) NOT NULL,
  `jumlahbeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`uiddetail`, `uidtransaksi`, `uidbarang`, `namabarang`, `hargabarang`, `jumlahbeli`) VALUES
(1, '61bc6d7246347', 1, 'pulpen joyko', 3000, 3),
(2, '61bc6d7246347', 7, 'Serutan Besar', 10000, 5),
(3, '61bc70820e94e', 2, 'Pensil 2B', 4000, 2),
(4, '61bc70c4cf063', 2, 'Pensil 2B', 4000, 2),
(5, '61bc7103c99d6', 2, 'Pensil 2B', 4000, 2),
(6, '61bc71425a69a', 2, 'Pensil 2B', 4000, 2),
(7, '61bc9a02b84d9', 6, 'Serutan Kecil', 1000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `uidtransaksi` varchar(20) NOT NULL,
  `namapembeli` varchar(50) NOT NULL,
  `tanggalpembelian` date NOT NULL,
  `totalsebelumdiskon` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`uidtransaksi`, `namapembeli`, `tanggalpembelian`, `totalsebelumdiskon`, `totalharga`, `diskon`) VALUES
('61bc6d7246347', 'jamal', '2010-12-11', 59000, 53100, 5900),
('61bc70820e94e', 'hahahh', '2019-12-12', 8000, 8000, 0),
('61bc70c4cf063', '1111', '2019-11-11', 17000, 17000, 0),
('61bc7103c99d6', 'hiya', '2021-11-30', 8000, 8000, 0),
('61bc71425a69a', 'hiya', '2021-11-30', 8000, 8000, 0),
('61bc9a02b84d9', 'farhan', '2021-12-17', 500000, 450000, 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`uidbarang`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`uiddetail`),
  ADD KEY `transaksi to detail` (`uidtransaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`uidtransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `uidbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `uiddetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `transaksi to detail` FOREIGN KEY (`uidtransaksi`) REFERENCES `transaksi` (`uidtransaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
