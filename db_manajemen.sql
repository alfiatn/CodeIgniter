-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 04:35 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_manajemen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` int(11) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `id_talent` varchar(4) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detil_transaksi`
--

CREATE TABLE `tb_detil_transaksi` (
  `id_detil_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_talent` varchar(4) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Solo'),
(2, 'Grup'),
(3, 'Band'),
(4, 'Girlband'),
(5, 'Boyband'),
(8, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_talent`
--

CREATE TABLE `tb_talent` (
  `id_talent` varchar(4) NOT NULL,
  `nama_talent` varchar(255) NOT NULL,
  `jenis_kelamin` enum('PEREMPUAN','LAKI-LAKI') NOT NULL,
  `genre` varchar(10) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_talent`
--

INSERT INTO `tb_talent` (`id_talent`, `nama_talent`, `jenis_kelamin`, `genre`, `id_jenis`) VALUES
('A001', 'Pee Wee Gaskin', 'LAKI-LAKI', 'Rock', 3),
('B001', 'SMASH', 'LAKI-LAKI', 'POP', 5),
('G001', 'BLACKPINK', 'PEREMPUAN', 'Pop', 4),
('S001', 'Cheryl Gloria P M', 'PEREMPUAN', 'Pop', 1),
('S002', 'Raisa Andriana', 'PEREMPUAN', 'Jazz', 1),
('S003', 'Via Vallen', 'PEREMPUAN', 'Dangdut', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_manajer` varchar(20) NOT NULL,
  `nama_cust` varchar(100) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'Cheryl Gloria', 'rylgloria', 'f3d667c86f5873d11f41150d71b44a45'),
(2, 'Alfia Teresia', 'alfiaaa', '6946ca6a48ac224ca0f9a07d448fc288'),
(3, 'admin', 'admin', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'sherlyuke', 'sherlyuke', 'ce5ed70cc6cc094998b84b466e68fbfd'),
(9, 'aa', 'bb', 'bee397acc400449ea3a35ed3fc87fea1'),
(10, 'coba', 'dulu', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_talent` (`id_talent`);

--
-- Indexes for table `tb_detil_transaksi`
--
ALTER TABLE `tb_detil_transaksi`
  ADD PRIMARY KEY (`id_detil_transaksi`),
  ADD KEY `id_talent` (`id_talent`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_talent`
--
ALTER TABLE `tb_talent`
  ADD PRIMARY KEY (`id_talent`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detil_transaksi`
--
ALTER TABLE `tb_detil_transaksi`
  MODIFY `id_detil_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `tb_cart_ibfk_1` FOREIGN KEY (`id_talent`) REFERENCES `tb_talent` (`id_talent`);

--
-- Constraints for table `tb_detil_transaksi`
--
ALTER TABLE `tb_detil_transaksi`
  ADD CONSTRAINT `tb_detil_transaksi_ibfk_1` FOREIGN KEY (`id_talent`) REFERENCES `tb_talent` (`id_talent`),
  ADD CONSTRAINT `tb_detil_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`);

--
-- Constraints for table `tb_talent`
--
ALTER TABLE `tb_talent`
  ADD CONSTRAINT `tb_talent_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
