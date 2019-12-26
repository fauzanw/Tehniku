-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2019 at 09:04 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(288) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_ponsel` varchar(20) NOT NULL,
  `user_id` varchar(288) NOT NULL,
  `foto_admin` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `nomor_ponsel`, `user_id`, `foto_admin`) VALUES
('5dff41bf96258', 'Muhammad Fauzan W', '082-112-848-887', '5dff4088205c5', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(288) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(288) NOT NULL,
  `nomor_ponsel` varchar(20) NOT NULL,
  `foto_ktp` varchar(288) NOT NULL,
  `nomor_ktp` int(16) NOT NULL,
  `user_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `nomor_ponsel`, `foto_ktp`, `nomor_ktp`, `user_id`) VALUES
('5e024299723af', 'Pojan', 'pojan', '082-818-219-821', '7267117dd872c56b5ff66ab73b588cf3.jpg', 2147483647, '5e0242991fa89');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` varchar(288) NOT NULL,
  `nama_jasa` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `harga` int(150) NOT NULL,
  `perusahaan_id` varchar(288) NOT NULL,
  `jasa_type_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa_type`
--

CREATE TABLE `jasa_type` (
  `id` varchar(288) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` varchar(288) NOT NULL,
  `nama_material` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `merek_id` varchar(288) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `jasa_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id` varchar(288) NOT NULL,
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
('5e017625df559', 'Brilly4n', 23, '082-813-892-838', 2147483647, 'perempuan', '8a345e15-9690-4a89-9b63-da230e170490', '5e017625c3951', 'd16a701df2df860c7d10189950211c16.png', 1);

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
  `latlon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `nomor_npwp`, `foto_npwp`, `nomor_ktp`, `foto_ktp`, `user_id`, `logo_perusahaan`, `alamat`, `latlon`) VALUES
('8a345e15-9690-4a89-9b63-da230e170490', 'LG Tech', '66.422.976.2-405.000', '233b4a025ba212ec11dca240f9b31800.jpeg', '9999921929192012', '902e75187c6dbb34898130acb8fd8d4b.jpeg', '7a0cee80-f48d-4fc2-af8f-f927aa67878e', 'fc4843d5f8ef302d3d2f72d0878e67f5.png', 'South Jakarta City', '-6.2225283, 106.8466186');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` varchar(288) NOT NULL,
  `jasa_id` varchar(288) NOT NULL,
  `perusahaan_id` varchar(288) NOT NULL,
  `customer_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `is_blocked` int(1) NOT NULL,
  `date_joined` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `is_verified`, `is_blocked`, `date_joined`) VALUES
('5dff4088205c5', 'fgaming386@gmail.com', '$2y$10$sdbTMuh6DQXsSd83mL4voeQr9P.m6.jhnVAj7I5wKnhAq1e1w/MF2', '2c282814-d165-4625-8ed3-492f82c57116', 1, 0, 'Minggu, 22 Desember 2019'),
('5e017625c3951', 'brilly4n@gmail.com', '$2y$10$NBn8gIePPLa5I1nTCfRABek904DqQ1SCKtFxxAmERNBF1AONVuhwS', 'adc5ce5d-0491-4d88-b9d4-8bc11b40415a', 1, 1, 'Selasa, 24 Desember 2019'),
('5e0242991fa89', 'pojan@gmail.com', '$2y$10$Rr4/xo4ZXnDl92r3uBP5Te.DHaeSudBVyBRno2yjg9pzG2HzsEE4e', 'ef40c680-03f0-45b9-ab98-290200f5ff13', 0, 0, 'Selasa, 24 Desember 2019'),
('7a0cee80-f48d-4fc2-af8f-f927aa67878e', 'lg_tech@gmail.com', '$2y$10$7feDHCG9QCMDt5kbN0i.a.wfR.R2LunxK2Syr0rF0stj2Sj2bQt2W', 'a3253f9d-0741-4838-8583-20816cd63e11', 1, 0, 'Senin, 16 Desember 2019');

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
('2c282814-d165-4625-8ed3-492f82c57116', 'Admin'),
('a3253f9d-0741-4838-8583-20816cd63e11', 'Perusahaan'),
('adc5ce5d-0491-4d88-b9d4-8bc11b40415a', 'Pegawai'),
('ef40c680-03f0-45b9-ab98-290200f5ff13', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`foto_admin`),
  ADD KEY `admin_fk0` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`,`nomor_ponsel`),
  ADD KEY `customer_fk0` (`user_id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jasa_fk0` (`perusahaan_id`);

--
-- Indexes for table `jasa_type`
--
ALTER TABLE `jasa_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`,`nama_material`),
  ADD KEY `material_fk0` (`jasa_id`),
  ADD KEY `material_fk1` (`merek_id`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`,`nomor_npwp`,`foto_npwp`,`nomor_ktp`,`logo_perusahaan`),
  ADD KEY `perusahaan_fk0` (`user_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_fk0` (`jasa_id`),
  ADD KEY `pesanan_fk1` (`perusahaan_id`),
  ADD KEY `pesanan_fk2` (`customer_id`);

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
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jasa`
--
ALTER TABLE `jasa`
  ADD CONSTRAINT `jasa_fk0` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_fk0` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`id`),
  ADD CONSTRAINT `material_fk1` FOREIGN KEY (`merek_id`) REFERENCES `merek` (`id`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_fk0` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`),
  ADD CONSTRAINT `pegawai_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_fk0` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`id`),
  ADD CONSTRAINT `pesanan_fk1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`),
  ADD CONSTRAINT `pesanan_fk2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
