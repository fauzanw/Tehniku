-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 23 Jan 2020 pada 21.40
-- Versi Server: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

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
('5dff41bf96258', 'Muhammad Fauzan W', '082-112-848-887', '5dff4088205c5', 'default.png');

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
('5e08be859ea7a', 'CCTV'),
('5e22c647c619f', 'Kipas Angin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_pivot_type`
--

CREATE TABLE `jasa_pivot_type` (
  `id` varchar(288) NOT NULL,
  `jasa_id` varchar(288) NOT NULL,
  `jasa_type_id` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` varchar(288) NOT NULL,
  `uang_masuk` varchar(288) NOT NULL,
  `pegawai_id` varchar(288) NOT NULL,
  `perusahaan_id` varchar(288) NOT NULL,
  `customer_id` varchar(288) NOT NULL,
  `pesanan_id` varchar(288) NOT NULL,
  `date_created` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('5e0d9a3ecc1ae', 'Capasitor Fan', 'FOR AC', '5e0b6e792469a', '300.000', '5e08bb32a8161'),
('5e0d9a3ed6af6', 'Capasitor Compressor', 'FOR AC', '5e0b6e792469a', '400.000', '5e08bb32a8161'),
('5e0d9a3ef2019', 'Overload', 'FOR AC', '5e0b6e792469a', '500.000', '5e08bb32a8161'),
('5e0d9a3f08d4e', 'Kontraktor', 'FOR AC', '5e0b6e792469a', '100.000', '5e08bb32a8161'),
('5e0d9a3f13d9b', 'Thermis Indoor', 'FOR AC', '5e0b6e792469a', '100.000', '5e08bb32a8161'),
('5e0d9a3f1ec09', 'Thermis Outdoor', 'FOR AC', '5e0b6e792469a', '200.000', '5e08bb32a8161'),
('5e22d4d8798cd', 'Switch', 'FOR KIPAS ANGIN', '5e0b6e78bf650', '8.500', '5e22c647c619f'),
('5e22d515355cc', 'Dinamo', 'FOR KIPAS ANGIN', '5e0b6e78bf650', '50.000', '5e22c647c619f'),
('5e2311627ee6f', 'Spul Dinamo', 'Spul Dinamo', '5e0b6e78bf650', '75.000', '5e22c647c619f');

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
  `material_id_used` text NOT NULL,
  `status` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('5dff4088205c5', 'fgaming386@gmail.com', '$2y$10$8MYOSkjiQIBAbiszkicnaembMj1UBzhaSDSv2XPeH/aEZnK5DgCvG', '2c282814-d165-4625-8ed3-492f82c57116', 1, 0, 'Minggu, 22 Desember 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_token`
--

CREATE TABLE `users_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_token`
--

INSERT INTO `users_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'fgaming386@gmail.com', 'ddfbab6e1b341f95e1128165b3097f06', 1579099727);

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
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_fk0` (`pegawai_id`),
  ADD KEY `laporan_fk1` (`perusahaan_id`),
  ADD KEY `laporan_fk2` (`customer_id`),
  ADD KEY `laporan_fk3` (`pesanan_id`);

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
-- Indexes for table `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`,`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `jasa_fk1` FOREIGN KEY (`jasa_keyword_id`) REFERENCES `jasa_keyword` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jasa_pivot_type`
--
ALTER TABLE `jasa_pivot_type`
  ADD CONSTRAINT `jasa_pivot_type_fk0` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jasa_pivot_type_fk1` FOREIGN KEY (`jasa_type_id`) REFERENCES `jasa_type` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_fk0` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_fk1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_fk2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_fk3` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `pegawai_fk0` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pegawai_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_fk0` FOREIGN KEY (`jasa_id`) REFERENCES `jasa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_fk1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_fk2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
