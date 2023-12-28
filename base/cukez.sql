-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2022 at 04:21 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19661023_cukez`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `subject` varchar(255) CHARACTER SET latin1 NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `username`, `subject`, `message`) VALUES
(1, 'Rendy Irawan', 'rendy9008@gmail.com', 'rendyy', 'Reservasi Mobil', 'Halo saya ingin reservasi untuk hari...'),
(2, 'adsdas', 'dasdasd', 'asdasd', 'asdasd', 'adsadasd'),
(3, 'rendy', 'rendy9008@gmail.com', 'rendyy', 'manani', 'mananich');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `tipe_mobil` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `kategori` enum('mobil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`id`, `tipe_mobil`, `harga`, `kategori`) VALUES
(1, 'Sedan', 75000, 'mobil'),
(2, 'SUV', 95000, 'mobil'),
(3, 'Mini Bus', 85000, 'mobil');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `nomor_plat` varchar(100) NOT NULL,
  `tipe_mobil` varchar(255) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tipe_pembayaran` enum('dana','cash') NOT NULL,
  `status` enum('gagal','pending','Processing','Selesai') NOT NULL,
  `tanggal_reservasi` varchar(15) NOT NULL,
  `waktu_reservasi` varchar(100) NOT NULL,
  `tanggal_pesan` varchar(255) NOT NULL,
  `waktu_pesan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `atas_nama`, `no_hp`, `nomor_plat`, `tipe_mobil`, `jenis_mobil`, `jumlah`, `total`, `tipe_pembayaran`, `status`, `tanggal_reservasi`, `waktu_reservasi`, `tanggal_pesan`, `waktu_pesan`) VALUES
(1, 'Rendy Irawan', '082362211676', 'BK 666 DVL', 'Sedan', 'Honda Civic', 1, 75000, 'cash', 'Selesai', '10/10/2022', '18:05', '2022-10-09', '22:36:30'),
(2, 'Rendy Irawan', '082362211676', 'BK 666 STN', 'SUV', 'Toyota Rush', 1, 95000, 'cash', 'Processing', '20/10/2022', '12:00', '2022-10-09', '22:38:17'),
(3, 'Rendy', '082362211676', 'BK 666 STN', 'SUV', 'Toyota Rush', 1, 95000, 'dana', 'Processing', '26/10/2022', '12:05', '2022-10-09', '22:59:11'),
(4, 'Rendy', '082362211676', 'BK 666 STN', 'Sedan', 'Honda Civic', 1, 75000, 'cash', 'Processing', '26/10/2022', '12:55', '2022-10-09', '23:00:15'),
(5, 'Alwi', '08222', 'BK 1111', 'SUV', 'Toyota Rush', 1, 95000, 'dana', 'Processing', '26/10/2022', '23:00', '2022-10-10', '11:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin1', 'admin1', 'admin'),
(2, 'user1', 'user1', 'user'),
(5, 'joko', '123', 'admin'),
(6, 'rendyy', '123', 'user'),
(7, 'rendyyy', '123', 'user'),
(8, 'rendylg', '123', 'user'),
(9, 'dwiarya', 'acumalaka', 'user'),
(10, 'alwi', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
