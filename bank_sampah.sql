-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 06:46 PM
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
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `no_hp`, `email`, `password`) VALUES
(1, 'yudha', '081373794653', 'yudha22ti@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `histori_poin`
--

CREATE TABLE `histori_poin` (
  `id_histori` int(50) NOT NULL,
  `poin_awal` int(50) NOT NULL,
  `transaksi_poin` int(50) NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `poin_akhir` int(50) NOT NULL,
  `id_nasabah` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histori_poin`
--

INSERT INTO `histori_poin` (`id_histori`, `poin_awal`, `transaksi_poin`, `jenis_transaksi`, `poin_akhir`, `id_nasabah`, `date`) VALUES
(1, 1000, 50, 'Redeem', 950, 9, '2024-01-01 07:49:02'),
(2, 950, 60, 'Setor', 1010, 9, '2024-01-01 07:49:02'),
(3, 1010, 250, 'Redeem', 760, 9, '2024-01-01 08:09:31'),
(4, 760, 300, 'Redeem', 460, 9, '2024-01-01 08:09:33'),
(5, 460, 350, 'Redeem', 110, 9, '2024-01-01 08:09:35'),
(6, 71060, 50, 'Redeem', 71010, 8, '2024-01-01 12:41:51'),
(7, 71010, 100, 'Setor', 71110, 8, '2024-01-01 12:42:20'),
(8, 71110, 300, 'Redeem', 70810, 8, '2024-01-01 12:47:17'),
(9, 70810, 500, 'Redeem', 70310, 8, '2024-01-01 12:47:24'),
(10, 70310, 500, 'Redeem', 69810, 8, '2024-01-01 12:47:31'),
(11, 110, 50, 'Setor', 160, 9, '2024-01-02 09:03:52'),
(12, 69810, 50, 'Setor', 69860, 8, '2024-01-02 09:05:02'),
(13, 69860, 50, 'Setor', 69910, 8, '2024-01-02 09:05:09'),
(14, 69910, 125, 'Setor', 70035, 8, '2024-01-02 09:05:47'),
(15, 70035, 40, 'Setor', 70075, 8, '2024-01-02 09:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id` int(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `saldo` int(50) NOT NULL,
  `poin` int(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama`, `alamat`, `jenis_kelamin`, `no_hp`, `email`, `password`, `gambar`, `saldo`, `poin`, `date_created`, `is_active`) VALUES
(8, 'Yudha Febriansyah', 'Jl. Agenda', 'Laki-Laki', '0812131313331', 'yudha13@gmail.com', '$2y$10$.sP/Q34kmjU8MfW2BDOfQOBT7j27PA..ymntX8m8t4InWoXbLNaPu', 'default.png', 253000, 70075, '2023-10-30 09:37:35', 1),
(9, 'Febss', 'Jl. Paus', 'Laki-Laki', '081373794653', 'febs1402@gmail.com', '$2y$10$kiGV7dWYMWZqVT0nckiL3uKWBdCf45NKjZ81YugfHPxZpBAj6UZRy', 'batu1.jpeg', 90000, 160, '2023-12-30 09:37:35', 1),
(18, 'rawrwrwrwrwrwr', 'wqw', 'Laki-Laki', '1221', 'raihanmulia19@gmail.com', '$2y$10$fF1NT60hsRT8UQE9fEJ9bu.v1g1xBjOxLSbHQIolMv9qpKWp3kEia', '', 0, 0, '2023-12-30 13:35:14', 0),
(19, 'Yudha Febriansyah', 'Jl. Agenda', 'Laki-Laki', '081373794653', 'yudhafby1314@gmail.com', '$2y$10$PXnfPWLszYAsi4OD.tTQZuZ6xX/r1HvO58QSUrsFX3wNHynsw1r.G', 'batu2.jpeg', 0, 0, '2023-12-30 13:35:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah_token`
--

CREATE TABLE `nasabah_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nasabah_token`
--

INSERT INTO `nasabah_token` (`id`, `email`, `token`) VALUES
(9, 'raihanmulia19@gmail.com', 'qoWCr3Uov9kb6bKceXuMIXV/tU+5Oy28Ajp7hpE5trY='),
(11, 'yudhafby1314@gmail.com', 'M7gFzZ6n5ZfameHsAvjUQnj8MLSBmoi+VSqF3OWCuX0=');

-- --------------------------------------------------------

--
-- Table structure for table `penjemputan`
--

CREATE TABLE `penjemputan` (
  `id_penjemputan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjemputan`
--

INSERT INTO `penjemputan` (`id_penjemputan`, `nama`, `alamat`, `no_hp`, `id_nasabah`, `status`, `date`) VALUES
(8, 'Akang', 'Jl. Umban Sari', '0813737393932', 8, 'Done', '2024-01-01 10:12:13'),
(9, 'Along', 'Jl. Paus', '081373794653', 8, 'Done', '2024-01-01 11:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id_sampah` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `point` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id_sampah`, `nama`, `jenis`, `point`) VALUES
(5, 'Kertas', 'Organik', 10),
(8, 'Plastik', 'Anorganik', 10),
(10, 'Tutup Botol', 'Anorganik', 20),
(11, 'Botol Kaca', 'Anorganik', 25),
(12, 'Makanan', 'Organik', 10);

-- --------------------------------------------------------

--
-- Table structure for table `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(50) NOT NULL,
  `id_nasabah` int(50) NOT NULL,
  `id_sampah` int(50) NOT NULL,
  `id_admin` int(50) NOT NULL,
  `berat` int(50) NOT NULL,
  `poin` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setor`
--

INSERT INTO `setor` (`id_setor`, `id_nasabah`, `id_sampah`, `id_admin`, `berat`, `poin`, `date`) VALUES
(6, 8, 6, 1, 30, 600, '2023-12-29 21:21:22'),
(11, 9, 4, 1, 10, 200, '2024-01-01 06:06:17'),
(13, 8, 4, 1, 5, 100, '2024-01-01 12:42:20'),
(15, 8, 5, 1, 5, 50, '2024-01-02 09:05:02'),
(16, 8, 8, 1, 5, 50, '2024-01-02 09:05:09'),
(17, 8, 11, 1, 5, 125, '2024-01-02 09:05:47'),
(18, 8, 12, 1, 4, 40, '2024-01-02 09:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(50) NOT NULL,
  `id_nasabah` int(50) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `jumlah_tarik` int(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_nasabah`, `metode`, `jenis`, `nomor`, `penerima`, `jumlah_tarik`, `status`, `date`) VALUES
(7, 8, 'Bank Transfer', 'Bank BCA', '86464612', 'Yudha Febriansyah', 250000, 'Success', '2023-12-28 20:07:09'),
(8, 8, 'Dompet Digital', 'Go-Pay', '081213131313', 'Yudha Febriansyah', 100000, 'Success', '2023-12-28 20:09:29'),
(9, 8, 'Bank Transfer', 'Bank Mandiri', '17229138913', 'Azalea Rania', 120000, 'Success', '2023-12-28 20:14:20'),
(10, 8, 'Bank Transfer', 'Bank Syariah Mandiri', '12121314', 'Yudha Febriansyah', 60000, 'Success', '2023-12-28 20:17:35'),
(11, 8, 'Dompet Digital', 'OVO', '081373794653', 'Dia', 150000, 'Success', '2024-01-01 04:47:07'),
(12, 8, 'Dompet Digital', 'Link Aja', '081373794653', 'Yudha', 120000, 'Success', '2024-01-01 04:51:07'),
(13, 8, 'Bank Transfer', 'Bank BNI', '17229138913', 'Yudha', 12000, 'Success', '2024-01-01 04:51:07'),
(14, 9, 'Dompet Digital', 'Dana', '081213131313', 'Yudha', 25000, 'Success', '2024-01-01 08:07:59'),
(15, 8, 'Bank Transfer', 'Bank BRI', '17229138913', 'Yudha', 100000, 'Menunggu Pembayaran', '2024-01-02 08:13:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `histori_poin`
--
ALTER TABLE `histori_poin`
  ADD PRIMARY KEY (`id_histori`),
  ADD KEY `tarik_nasabah` (`id_nasabah`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `nasabah_token`
--
ALTER TABLE `nasabah_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjemputan`
--
ALTER TABLE `penjemputan`
  ADD PRIMARY KEY (`id_penjemputan`),
  ADD KEY `fk_penjemputan_nasabah` (`id_nasabah`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id_sampah`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nasabah_history` (`id_nasabah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `histori_poin`
--
ALTER TABLE `histori_poin`
  MODIFY `id_histori` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nasabah_token`
--
ALTER TABLE `nasabah_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjemputan`
--
ALTER TABLE `penjemputan`
  MODIFY `id_penjemputan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id_sampah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histori_poin`
--
ALTER TABLE `histori_poin`
  ADD CONSTRAINT `tarik_nasabah` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`);

--
-- Constraints for table `penjemputan`
--
ALTER TABLE `penjemputan`
  ADD CONSTRAINT `fk_penjemputan_nasabah` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `nasabah_history` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
