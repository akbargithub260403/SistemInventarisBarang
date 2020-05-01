-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 12:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jenis` int(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `thn_peroleh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kd_barang`, `barang`, `jenis`, `jumlah`, `lokasi`, `sumber_dana`, `harga`, `kondisi`, `thn_peroleh`) VALUES
(3, 87, 'cover CD', 2, 20, 'bandung timur', 'INTEGRASI', 65000, '1', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `TTL` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `NIPTT` int(100) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama`, `TTL`, `username`, `password`, `unit_kerja`, `NIPTT`, `img`) VALUES
(25, 'admin', 'bandung', 'admin121', '$2y$10$2LumPfDXfrpzPOOwZ.T7Ve/06YlWOULx/G44UMz19TCUvYzRBvW.a', 'dosen', 89289, '5ea7598eb944f.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_pertahun`
--

CREATE TABLE `data_pertahun` (
  `id` int(11) NOT NULL,
  `tahun` varchar(200) NOT NULL,
  `elektronik` int(100) NOT NULL,
  `non_elektronik` int(100) NOT NULL,
  `jumlah_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pertahun`
--

INSERT INTO `data_pertahun` (`id`, `tahun`, `elektronik`, `non_elektronik`, `jumlah_total`) VALUES
(1, '2020', 0, 0, 0),
(2, '2021', 0, 0, 0),
(3, '2022', 0, 0, 0),
(4, '2023', 0, 0, 0),
(5, '2024', 0, 0, 0),
(6, '2025', 0, 0, 0),
(7, '2026', 0, 0, 0),
(8, '2027', 0, 0, 0),
(9, '2028', 0, 0, 0),
(10, '2029', 0, 0, 0),
(11, '2030', 0, 0, 0),
(12, '2031', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `last_data`
--

CREATE TABLE `last_data` (
  `id` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `sumber_dana` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `kondisi` int(11) NOT NULL,
  `thn_peroleh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_data`
--

INSERT INTO `last_data` (`id`, `kd_barang`, `barang`, `jenis`, `jumlah`, `lokasi`, `sumber_dana`, `harga`, `kondisi`, `thn_peroleh`) VALUES
(1, 19, 'laptop', 1, 10, 'bandung barat', 'BPPTnbh', 90000, 1, '2020'),
(2, 91, 'komputer', 1, 8, 'bandung selatan', 'KERJASAMA', 901, 1, '2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_pertahun`
--
ALTER TABLE `data_pertahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_data`
--
ALTER TABLE `last_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `data_pertahun`
--
ALTER TABLE `data_pertahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `last_data`
--
ALTER TABLE `last_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
