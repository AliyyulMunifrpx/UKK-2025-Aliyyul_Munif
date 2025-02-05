-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 10:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukkali`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('peminjam','petugas','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `nama`, `alamat`, `role`) VALUES
(22, 'admin', '$2y$10$bFUs3SBlQn1HIJoBw.eVN.uN34AsdkzJcPsFXeVcp3QCw6vhjPHC.', 'munif@gmail.com', 'Aliyyul Munifduwa', 'Juug', 'admin'),
(23, 'petugas', '$2y$10$a5wFZ8n2nI3ncLSwCCyt.OzXcapzw4SAStO90D04JlGw.etxbrE5S', 'munif@gmail.com', 'Aliyyul Munif', 'Juug', 'petugas'),
(24, 'user', '$2y$10$7mFsBq2c.b0RGaYpywFug.wy.saR/9LSDWyvdF9PaEWSxwSQlclb6', 'munif@gmail.com', 'Aliyyul Munifduwa', 'Juug', 'peminjam'),
(25, 'coba', '$2y$10$NXomiLheVRL.mdGZ0qpc1Ox1A5j4DoXVivVI9XAmRfnTRFgvuL/1i', 'munif@gmail.com', 'Aliyyul Munifduwa', 'Juug', 'peminjam'),
(26, 'user2', '$2y$10$.TCC8EFC9h76LmdX4fM01u0pDRCbursMloLHEi3.wwEb9fve/t9Xe', 'munif@gmail.com', 'Aliyyul Munifduwa', 'Juug', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
