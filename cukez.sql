-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 03:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cukez`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `username`, `subject`, `message`) VALUES
(1, 'adasd', 'adeferuzi24@gmail.com', 'asdsad', 'sads', 'dsadda'),
(2, 'asdsad', 'rendy9008@gmail.com', 'sdasa', 'dasdsad', 'sadds'),
(4, 'ddfads', 'hilaljimenk@gmail.com', 'asdsad', 'asdasd', 'asdasdsad'),
(5, 'adsd', 'rendy9008@gmail.com', 'asdasd', 'sadsa', 'dsad'),
(6, 'Rendy Irawan', 'rendy9008@gmail.com', 'asds', 'sadsad', 'sadsad'),
(7, 'Rendy Irawan', 'rendy9008@gmail.com', 'asds', 'sadsad', 'sadsad');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `tipe_mobil` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `kategori` enum('mobil','motor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`id`, `tipe_mobil`, `harga`, `kategori`) VALUES
(1, 'Sedan', 50000, 'mobil'),
(2, 'SUV', 70000, 'mobil'),
(3, 'Mini Bus', 65000, 'mobil'),
(4, 'Motor Bebek/Matic (Under 250cc)', 16000, 'motor'),
(5, 'Motor Sports (250cc+)', 30000, 'motor');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `nomor_plat` varchar(100) NOT NULL,
  `tipe_mobil` varchar(255) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tipe_pembayaran` enum('dana','cash','midtrans') NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_reservasi` varchar(15) NOT NULL,
  `waktu_reservasi` varchar(100) NOT NULL,
  `tanggal_pesan` varchar(255) NOT NULL,
  `waktu_pesan` time NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `username`, `email`, `atas_nama`, `no_hp`, `nomor_plat`, `tipe_mobil`, `jenis_mobil`, `jumlah`, `total`, `tipe_pembayaran`, `status`, `tanggal_reservasi`, `waktu_reservasi`, `tanggal_pesan`, `waktu_pesan`, `order_id`, `transaction_id`) VALUES
(1, 'admin1', '', 'Rendy Irawan', '082362211676', 'adasdasd', 'Sedan', 'asdasd', 1, 50000, 'dana', 1, '08/12/2022', '23:55', '2022-12-01', '16:33:57', 0, 0),
(2, 'admin1', '', 'asd', '0822', 'sad', 'Sedan', 'asd', 1, 50000, 'midtrans', 2, '29/12/2022', '23:00', '2022-12-01', '21:40:33', 0, 0),
(3, 'rendyirawann', 'rendy9008@gmail.com', 'Rendy', '082362211676', 'BK 666 STN', 'Sedan', 'Honda Civic', 1, 50000, 'midtrans', 5, '23/12/2022', '11:56', '2022-12-01', '22:49:31', 0, 0),
(6, 'admin1', 'admin1@gmail.com', 'Rendy Irawan', '082362211676', 'BK 1111', 'SUV', 'Honda City', 1, 70000, 'midtrans', 1, '23/12/2022', '23:55', '2022-12-03', '09:10:59', 848109, 848109),
(7, 'admin1', 'admin1@gmail.com', 'Rendy Irawan', '082362211676', 'BK 666 STN', 'Sedan', 'asdasd', 1, 50000, 'midtrans', 1, '29/12/2022', '00:55', '2022-12-03', '09:11:50', 634055, 634055),
(8, 'admin1', 'admin1@gmail.com', 'Rendy Irawan', 'asdasd', 'asdasd', 'SUV', 'asdasd', 1, 70000, 'dana', 2, '04/01/2023', '00:56', '2022-12-03', '09:13:34', 729019, 729019),
(9, 'admin1', 'admin1@gmail.com', 'Rendy Irawan', '082362211676', 'BK 666 STN', 'Motor Bebek/Matic (Under 250cc)', 'supra', 1, 16000, 'cash', 4, '22/12/2022', '13:00', '2022-12-03', '09:30:29', 480315, 480315);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_se`
--

CREATE TABLE `riwayat_se` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `nomor_plat` varchar(100) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tipe_pembayaran` enum('dana','cash','midtrans') NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_reservasi` varchar(15) NOT NULL,
  `waktu_reservasi` varchar(100) NOT NULL,
  `tanggal_pesan` varchar(255) NOT NULL,
  `waktu_pesan` time NOT NULL,
  `orders_id` int(11) NOT NULL,
  `transactions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_se`
--

INSERT INTO `riwayat_se` (`id`, `username`, `email`, `atas_nama`, `no_hp`, `nomor_plat`, `nama_item`, `jenis_kendaraan`, `jumlah`, `total`, `tipe_pembayaran`, `status`, `tanggal_reservasi`, `waktu_reservasi`, `tanggal_pesan`, `waktu_pesan`, `orders_id`, `transactions_id`) VALUES
(6, 'user1', '', 'Rendy Irawan', '082362211676', 'BK 666 STN', 'Service Mesin', 'Honda V-Xion', 1, 120000, 'cash', 5, '18/11/2022', '12:55', '2022-11-08', '20:38:13', 0, 0),
(7, 'admin1', '', 'asdasd', '082362211676', 'BK 666 STN', 'Service Mesin', 'asdasd', 1, 200000, 'midtrans', 3, '28/12/2022', '11:55', '2022-12-01', '21:53:45', 0, 0),
(10, 'rendyirawann', 'rendy9008@gmail.com', 'Rendy', '082362211676', 'BK 666 STN', 'Service Mesin', 'adsad', 1, 200000, 'midtrans', 2, '15/12/2022', '11:55', '2022-12-01', '22:41:53', 0, 0),
(11, 'rendyirawann', 'rendy9008@gmail.com', 'Rendy Irawan', '082362211676', 'BK 666 STN', 'Service Mesin', 'Honda V-Xion', 1, 120000, 'midtrans', 2, '23/12/2022', '11:55', '2022-12-01', '22:46:08', 0, 0),
(12, 'rendyirawann', 'rendy9008@gmail.com', 'Rendy Irawan', '082362211676', 'BK 666 STN', 'Service Mesin', 'vixion', 1, 120000, 'midtrans', 2, '14/12/2022', '23:55', '2022-12-02', '13:13:51', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `kategori` enum('Tune Up','Sparepart') NOT NULL,
  `kendaraan` enum('mobil','motor') NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `nama_item`, `harga`, `kategori`, `kendaraan`, `img`) VALUES
(1, 'Service Mesin', 200000, 'Tune Up', 'mobil', ''),
(3, 'Service Mesin', 120000, 'Tune Up', 'motor', ''),
(8, 'Fog Lamp', 250000, 'Sparepart', 'mobil', 'foglamp.jpeg'),
(9, 'Head Lamp', 250000, 'Sparepart', 'mobil', 'headlamp.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin1', 'admin1', 'admin1@gmail.com', 'admin'),
(15, 'rendyirawann', 'rendy123', 'rendy9008@gmail.com', 'user'),
(16, 'admin2', 'admin2', 'admin2@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `riwayat_se`
--
ALTER TABLE `riwayat_se`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat_se`
--
ALTER TABLE `riwayat_se`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
