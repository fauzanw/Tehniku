-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2019 at 10:32 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tehniku`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` varchar(288) NOT NULL,
  `nama_jasa` varchar(100) NOT NULL,
  `harga` int(150) NOT NULL,
  `perusahaan_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` varchar(288) NOT NULL,
  `nama_material` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `merek` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `jasa_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id` int(11) NOT NULL,
  `nama_merek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` varchar(288) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `nomor_ponsel` varchar(20) NOT NULL,
  `nomor_ktp` int(16) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `perusahaan_id` varchar(288) NOT NULL,
  `user_id` varchar(288) NOT NULL,
  `foto_pegawai` varchar(288) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `umur`, `nomor_ponsel`, `nomor_ktp`, `gender`, `perusahaan_id`, `user_id`, `foto_pegawai`, `status`) VALUES
('5df902ccac3e6', 'Muhammad Fauzan W', 14, '082-112-848-887', 2147483647, 'laki-laki', '8a345e15-9690-4a89-9b63-da230e170490', '5df902cc7964a', 'e0cc12910b71fad2520474f061835616.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` varchar(288) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nomor_npwp` varchar(20) NOT NULL,
  `foto_npwp` varchar(288) NOT NULL,
  `nomor_ktp` varchar(16) NOT NULL,
  `foto_ktp` varchar(288) NOT NULL,
  `user_id` varchar(288) NOT NULL,
  `logo_perusahaan` varchar(288) NOT NULL,
  `alamat` varchar(288) NOT NULL,
  `latlon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `nomor_npwp`, `foto_npwp`, `nomor_ktp`, `foto_ktp`, `user_id`, `logo_perusahaan`, `alamat`, `latlon`) VALUES
('8a345e15-9690-4a89-9b63-da230e170490', 'LG Tech', '66.422.976.2-405.000', '233b4a025ba212ec11dca240f9b31800.jpeg', '3329091003780012', '902e75187c6dbb34898130acb8fd8d4b.jpeg', '7a0cee80-f48d-4fc2-af8f-f927aa67878e', '099c8a7bc0983abfe4c38f529bca29da.png', 'South Jakarta City\r\n', '-6.205439999999999, 106.87692799999999');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(288) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(288) NOT NULL,
  `role_id` varchar(288) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `date_joined` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `is_verified`, `date_joined`) VALUES
('5df7d47e80890', 'f@f.f', '$2y$10$sZcwS..vIQSW2V1f.T7AQ.Qz/bRwrQUU4HubvUjvyQLVpgCjENKfS', 'adc5ce5d-0491-4d88-b9d4-8bc11b40415a', 1, 'Selasa, 17 Desember 2019'),
('5df902cc7964a', 'fgaming386@gmail.com', '$2y$10$OdWZpasO5AXs/ZfCNer0m.OcM9ocLW2pAGNjFAzcR0LWbpRnwu2j6', 'adc5ce5d-0491-4d88-b9d4-8bc11b40415a', 1, 'Selasa, 17 Desember 2019'),
('7a0cee80-f48d-4fc2-af8f-f927aa67878e', 'lg_tech@gmail.com', '$2y$10$P0Zf9VhDZ/xgsGqOotRp4.yCN4L9pAPccxM6eIjZRcSovpUiEwKhy', 'a3253f9d-0741-4838-8583-20816cd63e11', 1, 'Senin, 16 Desember 2019');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` varchar(288) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
('2c282814-d165-4625-8ed3-492f82c57116', 'Admin\r\n'),
('a3253f9d-0741-4838-8583-20816cd63e11', 'Perusahaan'),
('adc5ce5d-0491-4d88-b9d4-8bc11b40415a', 'Pegawai'),
('ef40c680-03f0-45b9-ab98-290200f5ff13', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jasa_fk0` (`perusahaan_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`,`nama_material`),
  ADD KEY `material_fk0` (`jasa_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`,`nomor_ponsel`,`nomor_ktp`),
  ADD KEY `pegawai_fk0` (`perusahaan_id`),
  ADD KEY `pegawai_fk1` (`user_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`,`nomor_npwp`,`foto_npwp`,`nomor_ktp`,`logo_perusahaan`,`latlon`),
  ADD KEY `perusahaan_fk0` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`,`role_id`),
  ADD KEY `users_fk0` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`,`role`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jasa`
--
ALTER TABLE `jasa`
  ADD CONSTRAINT `jasa_fk0` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_fk0` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`id`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_fk0` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pegawai_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
