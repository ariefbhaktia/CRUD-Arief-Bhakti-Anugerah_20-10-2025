-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 12:19 PM
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
-- Database: `mecnesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(7, 'ADJZDSF', 'admin', '$2y$10$ujT/e1G8CQor0u/YvXvlVexkfrElnEy.bK7f968bmvYB/tDU0yWFC');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `noregist` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `no_ayah` varchar(20) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `no_ibu` varchar(20) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `total_payment` varchar(50) NOT NULL,
  `stts` varchar(100) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `info_sumber` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `noregist`, `nama`, `email`, `ttl`, `alamat`, `sekolah`, `kelas`, `whatsapp`, `kota`, `program`, `nama_ayah`, `no_ayah`, `pekerjaan_ayah`, `nama_ibu`, `no_ibu`, `pekerjaan_ibu`, `total_payment`, `stts`, `bukti_transfer`, `info_sumber`, `created_at`) VALUES
(40, '1408/67356', 'Arief Bhakti Anugrah', 'ariefbhakti2002@gmail.com', 'Dabo Singkep, 10 Mei 2002', 'Jl. Natuna 27 B RT 011 RW 003 Kec. Ilir Barat 1 Kel. Lorok Pakjo, Palembang, Sumatera Selatan', 'Politeknik Negeri Sriwijaya', 'S1 Teknik Informatika', '085969358633', 'Palembang', 'Super TOEFL', 'Bonar', '088277532478', 'Pensiunan PNS', 'Ginem', '081373785125', 'Ibu Rumah Tangga', '3000000', 'Lunas', 'uploads/1755141361_Cuplikan layar 2025-08-12 183914.png', 'Tidak Ada', '2025-08-14 03:16:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
