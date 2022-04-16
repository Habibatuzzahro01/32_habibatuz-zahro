-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 10:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelairlangga`
--

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'admin', 'admin', 'admin', '12345', 'admin'),
(2, 'petugas', 'petugas', 'petugas', '0123', 'petugas'),
(5, 'habiba', 'habiba', '123', '088123456000', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas_kamar`
--

CREATE TABLE `tb_fasilitas_kamar` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas_kamar`
--

INSERT INTO `tb_fasilitas_kamar` (`id`, `id_kamar`, `fasilitas`, `gambar`) VALUES
(29, 29, 'Kamar mandi shower, lemari, televisi, meja kerja, sofa, wifi, AC', 'image/KamarmandishowerlemaritelevisimejakerjasofawifiAC20220407023024am.jpg'),
(30, 28, 'Kamar mandi shower, lemari, televisi, meja kerja, wifi, AC', 'image/KamarmandishowerlemaritelevisimejakerjawifiAC20220407030852am.jpg'),
(31, 5, 'kamar mandi, lemari, televisi, wifi, AC', 'image/kamarmandilemaritelevisiwifiAC20220407031000am.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas_umum`
--

CREATE TABLE `tb_fasilitas_umum` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas_umum`
--

INSERT INTO `tb_fasilitas_umum` (`id`, `nama_fasilitas`, `keterangan`, `gambar`) VALUES
(14, 'Rest area', 'Menyediakan tempat santai untuk para tamu sebagai tempat bercengkrama bersama keluarga maupun teman.', 'image/Restarea20220408023119am.jpg'),
(15, 'Kolam renang', 'Fasilitas kolam renang yang kami berikan sangat mementingkan kebersihan air dan lingkungan. Selain kolam renang biasa, kami juga memberikan fasilitas kolam renang air panas dan kolam renang khusus anak-anak. Ligkungan yang bersih dan menarik memberikan kesan ke aesthetican fasilitas kolam renang.', 'image/Kolamrenang20220408023235am.jpg'),
(16, 'Gym', 'Menyediakan tempat berolahraga untuk menjaga kebugaran.', 'image/Gym20220408023333am.jpg'),
(17, 'Restaurant', 'Restaurant kami melayani makanan dan minuman dengan harga terjangkau dan kualitas terbaik.', 'image/Restaurant20220408023407am.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `total_kamar` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `nama_kamar`, `total_kamar`) VALUES
(5, 'Standart', 9),
(28, 'Premium', 6),
(29, 'Deluxe', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `jml_kamar` int(2) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `id_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama_pemesan`, `email`, `hp`, `nama_tamu`, `tgl_pesan`, `checkin`, `checkout`, `jml_kamar`, `status`, `id_kamar`) VALUES
(1, 'Maklon Frare', 'maklon@gmail.com', '085234442455', 'Maklon Frare', '2022-02-05 07:09:59', '2022-02-05', '2022-02-05', 2, '', 1),
(3, 'Ferdy Durhan', 'kallonjuve@gmail.com', '23423', 'Ardy Wela', '2022-02-05 05:10:45', '2022-02-05', '2022-02-08', 2, '1', 1),
(4, 'Remigius Agut', 'kallonjuve@gmail.com', '23423', 'Noldy Saputra', '2022-02-05 05:14:59', '2022-02-07', '2022-02-10', 2, '1', 1),
(5, 'Rivan Manafe', 'admin@smkn1kuwus.sch.id', '085253227734', 'Juliana Mbau', '2022-02-05 05:58:59', '2022-02-05', '2022-02-08', 1, '1', 1),
(6, 'Lonida Ruth Manisa', 'maklonjacob.frare@gmail.com', '085253332244', 'Maklon Frare', '2022-02-06 12:28:41', '2022-02-09', '2022-02-24', 2, '1', 1),
(7, 'Egideus Helmon, S.P', 'egi@gmail.com', '085344225422', 'Hermanus Lando, S.Pd', '2022-02-06 12:31:27', '2022-02-07', '2022-02-10', 1, '', 2),
(8, 'Marsellina Patii', 'Marsel@gmail.com', '085664322455', 'John Umbu Pati', '2022-02-06 12:36:39', '2022-02-07', '2022-02-10', 2, '0', 2),
(9, 'Ipank', 'ipank@gmail.com', '678658755', 'Artho', '2022-02-07 07:04:41', '2022-02-12', '2022-02-15', 1, '0', 2),
(10, 'Maklon', 'maklonjacob.frare@gmail.com', '085253332245', 'Misel Jebabun', '2022-02-09 10:06:00', '2022-02-14', '2022-02-17', 1, '', 2),
(11, 'Zilan', 'nk8egc@erapor-smk.net', '085253332244', 'Richard', '2022-02-09 10:07:16', '2022-02-15', '2022-02-17', 1, '1', 1),
(12, 'Mizel', 'maklon@gmail.com', '085253332244', 'Maklom', '2022-02-09 12:57:04', '2022-02-10', '2022-02-12', 1, '', 2),
(13, 'habiba', 'habibatuzzahro01@gmail.com', '089564789243', 'habiba', '2022-04-05 12:37:29', '2022-04-04', '2022-04-05', 1, '1', 28),
(14, 'sifa', 'assyifa@gmail.com', '089123456', 'assyifa', '2022-04-07 04:28:23', '2022-04-06', '2022-04-07', 1, '', 28),
(15, 'fina citra', 'fina@gmail.com', '089675426866', 'fina', '2022-04-10 02:10:27', '2022-04-16', '2022-04-18', 2, '0', 29),
(16, 'habibatuz zahro', 'habiba@gmail.com', '089564709756', 'habibatuz zahro', '2022-04-12 11:42:47', '2022-04-12', '2022-04-13', 1, '0', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `tipe`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'resepsionis', '321', 'resepsionis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_fasilitas_kamar`
--
ALTER TABLE `tb_fasilitas_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fasilitas_umum`
--
ALTER TABLE `tb_fasilitas_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_fasilitas_kamar`
--
ALTER TABLE `tb_fasilitas_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_fasilitas_umum`
--
ALTER TABLE `tb_fasilitas_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
