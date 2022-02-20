-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 06:08 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `idBuku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahunTerbit` varchar(4) NOT NULL,
  `harga` int(12) NOT NULL,
  `sinopsis` text NOT NULL,
  `gambar` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`idBuku`, `judul`, `pengarang`, `penerbit`, `tahunTerbit`, `harga`, `sinopsis`, `gambar`, `stok`) VALUES
(1, 'ayah', 'Andrea Hirata', 'gramedia', '2019', 300000, 'hanya buku basis', 'ayah.jpeg', 11),
(2, 'Selamat Tinggal', 'Tere Liye', 'Gramedia Pustaka Utama', '2020', 85000, 'Kita tidak sempurna. Kita mungkin punya keburukan, melakukan kesalahan, bahkan berbuat jahat, menyakiti orang lain. Tapi beruntunglah yang mau berubah. Berjanji tidak melakukannya lagi, memperbaiki, dan menebus kesalahan tersebut. Mari tutup masa lalu yang kelam, mari membuka halaman yang baru. Jangan ragu-ragu. Jangan cemas. Tinggalkanlah kebodohan dan ketidakpedulian. “Selamat Tinggal” suka berbohong, “Selamat Tinggal” kecurangan, “Selamat Tinggal” sifat-sifat buruk lainnya. Karena sejatinya, kita tahu persis apakah kita memang benar-benar bahagia, baik, dan jujur. Sungguh “Selamat Tinggal” kepalsuan hidup. Selamat membaca novel ini. Dan jika kamu telah tiba di halaman terakhirnya, merasa novel ini menginspirasimu, maka kabarkan kepada teman, kerabat, keluarga lainnya. Semoga inspirasinya menyebar luas.', 'selamat_tinggal.jpg', 8),
(3, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', ' Gramedia Pustaka Utama', '2016', 54000, 'Robert Kiyosaki telah menantang dan mengubah cara pikir puluhan juta orang di seluruh dunia tentang uang. Dengan perspektif yang kerap bertentangan dengan kebijaksanaan umum, Robert memiliki reputasi sebagai orang yang bicara secara apa adanya, tidak menganggap penting hal-hal yang umumnya dianggap serius, dan berani. Dia diakui di seluruh dunia sebagai orang yang berdedikasi dan peduli dengan pendidikan keuangan.', 'richdad.jpg', 10),
(5, 'view', 'hanya', 'hanya contoh        ', '2021', 100000, 'silahkan pikir sendiri', 'f144096d508631df66a541d09e9cd03f.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `idMember` int(12) NOT NULL,
  `namaMember` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`idMember`, `namaMember`, `alamat`, `telepon`, `username`, `password`) VALUES
(3, 'qwerty', 'cirebon', '0899999', 'qwerty', 'poiuy'),
(4, 'qwerty1', 'cirebon', '08999999', 'qwerty', 'qwerty'),
(5, 'poiuy', 'cirebon', '0899999', 'poiuy', 'poiuy'),
(6, 'Gusti', 'Cirebon', '087700091101', 'gusti', 'gusti'),
(8, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `idPeminjaman` int(11) NOT NULL,
  `idMember` varchar(20) NOT NULL,
  `idBuku` varchar(20) NOT NULL,
  `idPetugas` varchar(20) NOT NULL,
  `tanggalPeminjaman` varchar(50) NOT NULL,
  `tanggalPengembalian` varchar(50) DEFAULT '-',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`idPeminjaman`, `idMember`, `idBuku`, `idPetugas`, `tanggalPeminjaman`, `tanggalPengembalian`, `keterangan`) VALUES
(3, '5', '1', '1', 'Wednesday, 24-11-2021  03:40:44 am', 'Saturday, 12-02-2022  07:00:00 pm', 'dikembalikan'),
(4, '3', '1', '1', 'Tuesday, 30-11-2021  10:52:17 am', 'Tuesday, 30-11-2021  01:30:02 pm', 'hilang'),
(5, '3', '1', '1', 'Tuesday, 07-12-2021  05:16:20 pm', 'Tuesday, 07-12-2021  05:24:22 pm', 'hilang, ganti rugi: Rp.300000'),
(6, '3', '1', '1', 'Tuesday, 07-12-2021  06:41:51 pm', 'Tuesday, 07-12-2021  06:45:19 pm', 'dikembalikan'),
(7, '3', '1', '1', 'Wednesday, 08-12-2021  11:53:02 am', 'Wednesday, 08-12-2021  11:53:43 am', 'dikembalikan'),
(8, '5', '2', '1', 'Sunday, 13-02-2022  11:40:10 am', 'Sunday, 13-02-2022  12:01:22 pm', 'hilang, ganti rugi: Rp.85000'),
(9, '', '2', '1', 'Sunday, 13-02-2022  11:44:05 am', '-', 'Belum dikembalikan'),
(10, '', '2', '1', 'Sunday, 13-02-2022  11:47:58 am', '-', 'Belum dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `idPetugas` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`idPetugas`, `nama`, `username`, `password`) VALUES
('1', 'qwerty', 'qw', 'qw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`idBuku`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`idMember`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`idPeminjaman`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`idPetugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `idBuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `idMember` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `idPeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
