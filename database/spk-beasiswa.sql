-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 07:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_hasil_seleksi`
--

CREATE TABLE `detail_hasil_seleksi` (
  `id_detail_hasil_seleksi` int(11) NOT NULL,
  `id_hasil_seleksi` int(11) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `nrp` varchar(255) NOT NULL,
  `id_program_studi` int(11) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL,
  `hasil` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_seleksi`
--

CREATE TABLE `hasil_seleksi` (
  `id_hasil_seleksi` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `nama_kelompok`) VALUES
(2, 'CSR Bank BJB'),
(3, 'Bank BNI'),
(4, 'Bawaku');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(2) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `penggolongan` varchar(10) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `penggolongan`, `bobot`) VALUES
(2, 'C1', 'IPK', 'Benefit', 70),
(3, 'C2', 'Penghasilan Orangtua', 'Cost', 15),
(4, 'C3', 'Jumlah Tanggungan Orangtua', 'Benefit', 15);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `id_program_studi` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `nrp` varchar(15) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `id_program_studi`, `id_kelompok`, `nrp`, `c1`, `c2`, `c3`) VALUES
(1, 'Ahmad Rifai', 8, 3, '173010006', 3.29, 9018070, 1),
(2, 'Alya Kamila Najila ', 6, 3, '183020251', 3.08, 4648730, 1),
(3, 'Angela Deviliana', 7, 3, '153050078', 3.56, 4863000, 5),
(4, 'Anggi Farhan Permana', 5, 3, '183030021', 3.82, 7078630, 5),
(5, 'Anggyta Ayu Lestari', 7, 3, '183050026', 3.96, 6032660, 1),
(6, 'Annysa Eka Yusilawati', 3, 3, '143040107', 3.94, 3300000, 5),
(7, 'Arfan Ghifari', 3, 3, '183040016', 3.08, 2500000, 4),
(8, 'Arief Budi Kusumah ', 3, 3, '183040014', 3, 1167110, 1),
(9, 'Azmi Azizah', 8, 3, '153010011', 3.2, 6500000, 5),
(10, 'Bagas Nuryadi ', 6, 3, '183020020', 3.65, 1325220, 4),
(11, 'Bian Aldi Ibrahim S', 6, 3, '183020252', 3.72, 8995520, 4),
(12, 'Candra Kurnia Sandi', 5, 3, '173030022', 3.52, 7775750, 5),
(13, 'Dikdik Afriyanto ', 3, 3, '183040110', 3.7, 1325820, 2),
(14, 'Diky Harfan Djasin', 5, 3, '183030045', 3.35, 2300000, 2),
(15, 'Dimas Taufiqurrahman', 7, 3, '183050020', 3.25, 8767080, 2),
(16, 'Evan Rivaldi Apriana', 5, 3, '153030107', 3.46, 7000000, 5),
(17, 'Evi Fitriani', 6, 3, '143020378', 3.66, 6020000, 5),
(18, 'Fajar Suryawirawan', 5, 3, '173030062', 3.36, 2456600, 2),
(19, 'Fajar Yusup Maulana', 8, 3, '183010133', 3.05, 510000, 5),
(20, 'Fanny Feria', 3, 3, '163040087', 3.15, 4800000, 5),
(21, 'Fatimah Zuhrah', 6, 3, '163020176', 3.85, 6500000, 2),
(22, 'Fikri Ikramullah', 5, 3, '173030068', 3.6, 9305840, 2),
(23, 'Hadi Sutarma', 3, 3, '183040035', 3.54, 5111410, 2),
(24, 'Halimatun Sa\'adah', 6, 3, '143020245', 3.84, 7000000, 2),
(25, 'Hamzah Maulana', 5, 3, '173030043', 3.22, 588053, 3),
(26, 'Himawan sidiq', 5, 3, '183030018', 3.59, 8880220, 5),
(27, 'Ika Purwanti', 6, 3, '143020110', 3.56, 8850000, 2),
(28, 'Irfan Abdillah M', 5, 3, '203030076', 3.31, 5900000, 2),
(29, 'Irfan Iskandar', 9, 3, '183060077', 3.6, 200000, 5),
(30, 'Jatnika Salman R', 8, 3, '193010091', 3.3, 1000000, 3),
(31, 'Kania Jamilah Marwa', 9, 3, '193060052', 3.78, 7500000, 5),
(32, 'Kartika Pratiwi', 7, 3, '183050003', 3.23, 5527640, 3),
(33, 'Luthfia Lismawan S', 8, 3, '133010151', 3.24, 2750000, 3),
(34, 'Monica Agustina', 7, 3, '183050025', 3.27, 5180420, 4),
(35, 'Muhamad Haykal A', 5, 3, '183030024', 3.16, 2210740, 5),
(36, 'Muhammad Miftahul H', 3, 3, '203030062', 4, 5000000, 1),
(37, 'Muhammad Rifqi M', 8, 3, '163010055', 3.63, 1900000, 1),
(38, 'Nadya Melita V.P', 9, 3, '203060021', 3.06, 5000000, 1),
(39, 'Niken Rahmawati ', 6, 3, '183020021', 3.9, 3474120, 2),
(40, 'Novi Nur Rahmawati', 8, 3, '143010222', 3.48, 8000000, 3),
(41, 'Peri Setiawan ', 6, 3, '183020003', 3.63, 8410410, 1),
(42, 'Refiandy Noverando', 7, 3, '193050019', 3.54, 3000000, 2),
(43, 'Reva Febrianda', 9, 3, '153060038', 3.66, 3800000, 1),
(44, 'Riang Karunia G.', 8, 3, '153010193', 3.42, 4500000, 4),
(45, 'Riki Apriono', 3, 3, '183040198', 3.99, 4254560, 4),
(46, 'Riki M Iqbal Prabowo', 5, 3, '143030129', 3.68, 650000, 1),
(47, 'Salman M Rizki H', 8, 3, '183010161	', 4, 7250000, 1),
(48, 'Sheilla Zona Zavira', 9, 3, '173060025', 3, 2647810, 5),
(49, 'Susilawati Amran', 7, 3, '173050005', 3.99, 9690620, 4),
(50, 'Winda Hanifah', 7, 3, '173050024', 3.7, 2802440, 4);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_program_studi` int(11) NOT NULL,
  `nama_program_studi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_program_studi`, `nama_program_studi`) VALUES
(3, 'Teknik Informatika'),
(4, 'Teknik Sipil'),
(5, 'Teknik Mesin '),
(6, 'Teknologi Pangan '),
(7, 'Teknik Lingkungan'),
(8, 'Teknik Industri'),
(9, 'Teknik PWK');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `nama` varchar(255) NOT NULL,
  `nilai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`nama`, `nilai`) VALUES
('jumlah_penerimaan', '12'),
('jumlah_penerima_cadangan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `range_awal` double DEFAULT 0,
  `range_akhir` double DEFAULT 0,
  `kategori` varchar(50) NOT NULL,
  `nilai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `range_awal`, `range_akhir`, `kategori`, `nilai`) VALUES
(2, 2, 3, 3.29, 'Rendah', 2),
(3, 2, 3.3, 3.49, 'Cukup', 3),
(4, 2, 3.5, 3.74, 'Tinggi', 4),
(5, 2, 3.75, 4, 'Sangat Tinggi', 5),
(6, 3, 5000000, 15000000, 'Sangat Rendah', 1),
(7, 3, 3000000, 4999999, 'Rendah', 2),
(8, 3, 1000000, 2999999, 'Cukup', 3),
(9, 3, 500000, 999999, 'Tinggi', 4),
(11, 4, 1, 1, 'Sangat Rendah', 1),
(12, 4, 2, 2, 'Rendah', 2),
(13, 4, 3, 3, 'Cukup', 3),
(14, 4, 4, 4, 'Tinggi', 4),
(15, 4, 5, 10, 'Sangat Tinggi', 5),
(16, 3, 0, 499999, 'Sangat Tinggi', 5),
(17, 2, 0, 2.99, 'Sangat Rendah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `id_program_studi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `role`, `id_program_studi`) VALUES
(1, 'Admin', 'admin', '$2y$10$timAVeOLE9cnjyssG4Jyae7d9Q/dzqfqYb7vl9csjVLczSoaVmFBC', 'Admin', NULL),
(4, 'Sekprodi', 'sekprodi', '$2y$10$vRgMzo1BkHJB9rKIMwXByOdvcwB.Z3WpsJs0glwW5Yu5OfUKa/97e', 'Sekprodi', 3),
(5, 'kemahasiswaan', 'kemahasiswaan', '$2y$10$timAVeOLE9cnjyssG4Jyae7d9Q/dzqfqYb7vl9csjVLczSoaVmFBC', 'Bag Kemahasiswaan', NULL),
(9, 'asd', 'asd', '$2y$10$QvcH8hF2wEGuP61wAGolX.Z8RFebUXbIItg8gDsCnxkyfKb9See6m', 'Sekprodi', 3),
(10, 'asd', 'asdd', '$2y$10$7SUD2ID4qcdts6Q/GMWgxu8axcjojDvbqohUqAaz0JLQpWoOjjzmO', 'Sekprodi', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_hasil_seleksi`
--
ALTER TABLE `detail_hasil_seleksi`
  ADD PRIMARY KEY (`id_detail_hasil_seleksi`);

--
-- Indexes for table `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  ADD PRIMARY KEY (`id_hasil_seleksi`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_program_studi`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_hasil_seleksi`
--
ALTER TABLE `detail_hasil_seleksi`
  MODIFY `id_detail_hasil_seleksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  MODIFY `id_hasil_seleksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_program_studi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
