-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 03:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peternakan_ayam`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_group` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_login` datetime(6) NOT NULL,
  `create_login` datetime(6) NOT NULL,
  `stok` int(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `password`, `id_group`, `nama`, `alamat`, `kota`, `telepon`, `email`, `last_login`, `create_login`, `stok`, `harga`) VALUES
('anto', '$2y$10$p5F8em8WGK9hzEcstCKkluPHPF/dP3cV68P.criITbFTfsqlpwffC', 'peternak', 'Anto Ayam', 'Jl. Ayam Jago No. 1', 'Semarang', '813254678', 'anto_ayam@gmail.com', '2016-01-23 08:05:00.000000', '2015-12-10 19:10:23.000000', 1200, 30000),
('budi', '$2y$10$p5F8em8WGK9hzEcstCKkluPHPF/dP3cV68P.criITbFTfsqlpwffC', 'penjual', 'Budi Luhur', 'Jl. Gang Ayam No. 23', 'Kudus', '0854-5678-980', 'budiluhur@gmail.com', '2016-01-22 02:25:21.000000', '2015-12-20 19:20:43.000000', 200, 42000),
('ryan', '$2y$10$p5F8em8WGK9hzEcstCKkluPHPF/dP3cV68P.criITbFTfsqlpwffC', 'penjual', 'Ryan Bakul', 'Jl. Jalan Rezeki Gg. II No.4', 'Semarang', '0881-28978-90', 'ryan_jos@gmail.com', '2016-01-20 20:35:45.000000', '2015-12-20 18:11:33.000000', 100, 40000),
('tukul', '$2y$10$p5F8em8WGK9hzEcstCKkluPHPF/dP3cV68P.criITbFTfsqlpwffC', 'peternak', 'Tukul Ayam', 'Jl. Ayam Boiler No. 2', 'Pati', '0888-578-8901', 'tukul_ayam@gmail.com', '2016-01-23 09:15:00.000000', '2015-11-05 09:22:50.000000', 100, 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
