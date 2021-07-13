-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 04:10 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datakeluargasejahtera`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kb`
--

CREATE TABLE `jenis_kb` (
  `id_jenis_kb` int(50) NOT NULL,
  `nama_kb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kb`
--

INSERT INTO `jenis_kb` (`id_jenis_kb`, `nama_kb`) VALUES
(1, 'KB Implan'),
(2, 'KB Suntik'),
(3, 'KB Pil');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ks`
--

CREATE TABLE `jenis_ks` (
  `id_jenis_ks` int(50) NOT NULL,
  `nama_ks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_ks`
--

INSERT INTO `jenis_ks` (`id_jenis_ks`, `nama_ks`) VALUES
(1, 'Keluarga Pra Sejahtera'),
(2, 'Keluarga Sejahtera I'),
(3, 'Keluarga Sejahtera Tahap II'),
(4, 'Keluarga Sejahtera Tahap III'),
(5, 'Keluarga Sejahtera Tahap III Plus');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rt`
--

CREATE TABLE `jenis_rt` (
  `id_jenis_rt` int(50) NOT NULL,
  `rt_rw` varchar(50) NOT NULL,
  `kelurahan_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_rt`
--

INSERT INTO `jenis_rt` (`id_jenis_rt`, `rt_rw`, `kelurahan_id`) VALUES
(1, RT001 RW001, 1),
(2, RT004 RW001, 1),
(3, RT008 RW001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(50) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL,
  `provinsi_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `nama_kabupaten`, `provinsi_id`) VALUES
(1, 'Kubu Raya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(50) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `kabupaten_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `kabupaten_id`) VALUES
(1, 'Sungai Raya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(50) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `kecamatan_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nama_kelurahan`, `kecamatan_id`) VALUES
(1, 'Desa Kapur', 1);

-- --------------------------------------------------------
--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_penduduk` varchar(100) NOT NULL,
  `lat` float(10,6) NOT NULL
  `lng` float(10,6) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_penduduk`, `lat`, `lng`) VALUES
(1, 'Nurdiana', '-0.059810', '109.377937'),(2, 'Eggy Ramadhan A.', '-0.061050', '109.379662'),(3, 'Aisyah', '-0.059580', '109.378273'),(4, 'Mariyam', '-0.059650', '109.378181'),(5,'Agustina', '-0.059630', '109.378159'),(6, 'Nurjanah', '-0.059790','109.377953'),(7, 'Widiarti', '-0.059530', '109.378357'),(8, 'Yeni Ristianti, S.Pd', '-0.060850', '109.379967'),(9, 'Dinda Trisiwi', '-0.059620', '109.378197'),(10, 'Merry Andriani', '-0.059360', '109.378632');

-- --------------------------------------------------------
--
--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(50) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nomor_kk` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kb_id` int(50) NOT NULL,
  `jenis_rt_id` int(50) NOT NULL,
  `jenis_ks_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `id_lokasi`, `nomor_kk`, `nik`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `jenis_kb_id`, `jenis_rt_id`, `jenis_ks_id`) VALUES
(1, 1, '6112012206082622', '6112015412750004', 'Nurdiana', 'Perempuan', '1975-12-14', 'Gg.H.Gani', 3, 1, 5),
(2, 2, '6112011901170011', '6104175402950004', 'Eggy Ramadhan A.', 'Perempuan', '1995-02-14', 'Komplek Vila Kurnia', 3, 1, 5),
(3, 3, '6112010810200019', '6112014907920005', 'Aisyah', 'Perempuan', '1992-07-09', 'Gg. H. Gani', 3, 1, 3),
(4, 4, '6112012104170006', '6112094608850013', 'Mariyam', 'Perempuan', '1985-08-06', 'Gg. H.gani', 3, 1, 4),
(5, 5, '6112012907150021', '6112010507760021', 'Agustina', 'Perempuan', '1976-11-30', 'Gg. H.gani', 3, 1, 5),
(6, 6, '6102070311100007', '6102077009860001', 'Nurjanah', 'Perempuan', '1986-09-30', 'Gg. H. gani', 3, 1, 3),
(7, 7, '6112012402140015', '6112015008870007', 'Widiarti', 'Perempuan', '1987-08-10', 'Gg.H.Gani', 2, 1, 5),
(8, 8, '6112010804150017', '6103205512890005', 'Yeni Ristianti, S.Pd', 'Perempuan', '1989-12-15', 'Villa Kurnia', 2, 1, 5),
(9, 9, '6112010512180018', '6112016702970005', 'Dinda Trisiwi', 'Perempuan', '1997-02-02', 'Gg. H.Gani', 2, 1, 5),
(10, 10, '6112012005150005', '6112015203890013', 'Merry Andriani', 'Perempuan', '1988-04-12', 'Gg. H.Gani', 3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(50) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Kalimantan Barat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kb`
--
ALTER TABLE `jenis_kb`
  ADD PRIMARY KEY (`id_jenis_kb`);

--
-- Indexes for table `jenis_ks`
--
ALTER TABLE `jenis_ks`
  ADD PRIMARY KEY (`id_jenis_ks`);

--
-- Indexes for table `jenis_rt`
--
ALTER TABLE `jenis_rt`
  ADD PRIMARY KEY (`id_jenis_rt`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kb`
--
ALTER TABLE `jenis_kb`
  MODIFY `id_jenis_kb` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_ks`
--
ALTER TABLE `jenis_ks`
  MODIFY `id_jenis_ks` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jenis_rt`
--
ALTER TABLE `jenis_rt`
  MODIFY `id_jenis_rt` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
