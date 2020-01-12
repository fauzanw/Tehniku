-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 12 Jan 2020 pada 13.46
-- Versi Server: 5.7.28-0ubuntu0.18.04.4
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(288) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_ponsel` varchar(20) NOT NULL,
  `user_id` varchar(288) NOT NULL,
  `foto_admin` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `nomor_ponsel`, `user_id`, `foto_admin`) VALUES
('5dff41bf96258', 'Fathiah Hana Nur Aisyah', '082-112-848-887', '5dff4088205c5', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` varchar(288) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(288) NOT NULL,
  `nomor_ponsel` varchar(20) NOT NULL,
  `foto_ktp` varchar(288) NOT NULL,
  `nomor_ktp` int(16) NOT NULL,
  `user_id` varchar(288) NOT NULL,
  `foto_customer` varchar(288) NOT NULL,
  `latlon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `nomor_ponsel`, `foto_ktp`, `nomor_ktp`, `user_id`, `foto_customer`, `latlon`) VALUES
('5e024299723af', 'Pojan', 'pojan', '082-818-219-821', '7267117dd872c56b5ff66ab73b588cf3.jpg', 2147483647, '5e0242991fa89', 'default.png', '-6.914744, 107.609810');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id` varchar(288) NOT NULL,
  `nama_jasa` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `perusahaan_id` varchar(288) NOT NULL,
  `jasa_keyword_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id`, `nama_jasa`, `description`, `harga`, `perusahaan_id`, `jasa_keyword_id`) VALUES
('5e08d1fb1df95', 'Air Conditioner', 'pemasangan ac', 'Rp. 2.000.000', '8a345e15-9690-4a89-9b63-da230e170490', '5e08bb32a8161'),
('5e134ab006a1d', 'CCTV', 'pemasangan ac', 'Rp. 1.500.000', '8a345e15-9690-4a89-9b63-da230e170490', '5e08bb32a8161');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_keyword`
--

CREATE TABLE `jasa_keyword` (
  `id` varchar(288) NOT NULL,
  `keyword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa_keyword`
--

INSERT INTO `jasa_keyword` (`id`, `keyword`) VALUES
('5e08bb32a8161', 'AC'),
('5e08be859ea7a', 'CCTV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_pivot_type`
--

CREATE TABLE `jasa_pivot_type` (
  `id` varchar(288) NOT NULL,
  `jasa_id` varchar(288) NOT NULL,
  `jasa_type_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa_pivot_type`
--

INSERT INTO `jasa_pivot_type` (`id`, `jasa_id`, `jasa_type_id`) VALUES
('5e08d26078b6e', '5e08d1fb1df95', '5e070e95b9fee'),
('5e134ab006a2c', '5e134ab006a1d', '5e070e95b9fee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_type`
--

CREATE TABLE `jasa_type` (
  `id` varchar(288) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa_type`
--

INSERT INTO `jasa_type` (`id`, `type`) VALUES
('5e070e95b9fee', 'instalasi'),
('5e070e9b9bcea', 'service');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id` varchar(288) NOT NULL,
  `nama_material` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `merek_id` varchar(288) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `jasa_keyword_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `nama_material`, `description`, `merek_id`, `harga`, `jasa_keyword_id`) VALUES
('5e0d9a3ebb97a', 'Compressor', 'FOR AC', '5e0b6e792469a', '200.000', '5e08bb32a8161'),
('5e0d9a3ecc1ae', 'Capasitor Fan', 'FOR AC', '5e0b6e792469a', '300.000', '5e08bb32a8161'),
('5e0d9a3ed6af6', 'Capasitor Compressor', 'FOR AC', '5e0b6e792469a', '400.000', '5e08bb32a8161'),
('5e0d9a3ef2019', 'Overload', 'FOR AC', '5e0b6e792469a', '500.000', '5e08bb32a8161'),
('5e0d9a3f08d4e', 'Kontraktor', 'FOR AC', '5e0b6e792469a', '100.000', '5e08bb32a8161'),
('5e0d9a3f13d9b', 'Thermis Indoor', 'FOR AC', '5e0b6e792469a', '100.000', '5e08bb32a8161'),
('5e0d9a3f1ec09', 'Thermis Outdoor', 'FOR AC', '5e0b6e792469a', '200.000', '5e08bb32a8161');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id` varchar(288) NOT NULL,
  `nama_merek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id`, `nama_merek`) VALUES
('5e0b6e78bf650', 'LG'),
('5e0b6e78d8c1d', 'Polytron'),
('5e0b6e790e9cc', 'Sharp'),
('5e0b6e792469a', 'Samsung'),
('5e0b99b753ba6', 'Panasonic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `umur`, `nomor_ponsel`, `nomor_ktp`, `gender`, `perusahaan_id`, `user_id`, `foto_pegawai`, `status`) VALUES
('5e017625df559', 'Brilly4n', 23, '082-813-892-838', 2147483647, 'laki-laki', '8a345e15-9690-4a89-9b63-da230e170490', '5e017625c3951', 'd16a701df2df860c7d10189950211c16.png', 0),
('5e1a9e677c8cc', 'Rizsyad AR', 19, '085-816-872-942', 2147483647, 'laki-laki', '8a345e15-9690-4a89-9b63-da230e170490', '5e1a9e670f6f4', '7339a9f47e63f6d363813ff45cffdea2.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` varchar(288) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_ponsel` varchar(20) NOT NULL,
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
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `nomor_ponsel`, `nomor_npwp`, `foto_npwp`, `nomor_ktp`, `foto_ktp`, `user_id`, `logo_perusahaan`, `alamat`, `latlon`) VALUES
('8a345e15-9690-4a89-9b63-da230e170490', 'LG Tech', '028-984-989-298', '66.422.976.2-405.000', '233b4a025ba212ec11dca240f9b31800.jpeg', '3174096112900001', '902e75187c6dbb34898130acb8fd8d4b.jpeg', '7a0cee80-f48d-4fc2-af8f-f927aa67878e', '41618a127507e1b8c032f575088ad747.png', 'South Jakarta City', '-6.205439999999999, 106.87692799999999');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` varchar(288) NOT NULL,
  `jasa_id` varchar(288) NOT NULL,
  `perusahaan_id` varchar(288) NOT NULL,
  `customer_id` varchar(288) NOT NULL,
  `waktu` varchar(288) NOT NULL,
  `description` varchar(288) NOT NULL,
  `pegawai_id` text NOT NULL,
  `status` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `jasa_id`, `perusahaan_id`, `customer_id`, `waktu`, `description`, `pegawai_id`, `status`) VALUES
('5e18a63423788', '5e08d1fb1df95', '8a345e15-9690-4a89-9b63-da230e170490', '5e024299723af', 'Sabtu, 11 Januari 2020 Jam 22:59', 'Survey ke alamat jalan bekasi timur raya rt04/05 13250', '5e017625df559', '2'),
('5e1a9f197eb1a', '5e134ab006a1d', '8a345e15-9690-4a89-9b63-da230e170490', '5e024299723af', 'Kamis, 30 Januari 2020 Jam 11:59', 'instalasi ke rumah jl raya bekasi rt 05/09 1350', '5e1a9e677c8cc', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `is_verified`, `is_blocked`, `date_joined`) VALUES
('5dff4088205c5', 'fgaming386@gmail.com', '$2y$10$QDxp40NrVjFVVugJJdyxaeG2qY/eTo0XqjQ43nWPZHhqorLu74bm2', '2c282814-d165-4625-8ed3-492f82c57116', 1, 0, 'Minggu, 22 Desember 2019'),
('5e017625c3951', 'brilly4n@gmail.com', '$2y$10$NBn8gIePPLa5I1nTCfRABek904DqQ1SCKtFxxAmERNBF1AONVuhwS', 'adc5ce5d-0491-4d88-b9d4-8bc11b40415a', 1, 0, 'Selasa, 24 Desember 2019'),
('5e0242991fa89', 'pojan@gmail.com', '$2y$10$MQjY8s9iDxLPWC64vQDFT.qUttZUbsj1Z.E5hEduJ24JoaULkrgKO', 'ef40c680-03f0-45b9-ab98-290200f5ff13', 1, 0, 'Selasa, 24 Desember 2019'),
('5e1a9e670f6f4', 'rizsyad@gmail.com', '$2y$10$lh5kvvjA1bMYLgiZa9F.I.95y06zSc1AVbH/bmN2vzmWRHHYUXdni', 'adc5ce5d-0491-4d88-b9d4-8bc11b40415a', 1, 0, 'Minggu, 12 Januari 2020'),
('7a0cee80-f48d-4fc2-af8f-f927aa67878e', 'lg_tech@gmail.com', '$2y$10$7feDHCG9QCMDt5kbN0i.a.wfR.R2LunxK2Syr0rF0stj2Sj2bQt2W', 'a3253f9d-0741-4838-8583-20816cd63e11', 1, 0, 'Senin, 16 Desember 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` varchar(288) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
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
  ADD KEY `jasa_fk0` (`perusahaan_id`),
  ADD KEY `jasa_fk1` (`jasa_keyword_id`);

--
-- Indexes for table `jasa_keyword`
--
ALTER TABLE `jasa_keyword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa_pivot_type`
--
ALTER TABLE `jasa_pivot_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jasa_pivot_type_fk0` (`jasa_id`),
  ADD KEY `jasa_pivot_type_fk1` (`jasa_type_id`);

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
  ADD KEY `material_fk1` (`merek_id`),
  ADD KEY `material_fk2` (`jasa_keyword_id`);

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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD CONSTRAINT `jasa_fk0` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jasa_fk1` FOREIGN KEY (`jasa_keyword_id`) REFERENCES `jasa_keyword` (`id`);

--
-- Ketidakleluasaan untuk tabel `jasa_pivot_type`
--
ALTER TABLE `jasa_pivot_type`
  ADD CONSTRAINT `jasa_pivot_type_fk0` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jasa_pivot_type_fk1` FOREIGN KEY (`jasa_type_id`) REFERENCES `jasa_type` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_fk1` FOREIGN KEY (`merek_id`) REFERENCES `merek` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_fk2` FOREIGN KEY (`jasa_keyword_id`) REFERENCES `jasa_keyword` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_fk0` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`),
  ADD CONSTRAINT `pegawai_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_fk0` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`id`),
  ADD CONSTRAINT `pesanan_fk1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`),
  ADD CONSTRAINT `pesanan_fk2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
