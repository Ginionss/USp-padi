-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 02:37 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(3) NOT NULL,
  `id_gejala` varchar(3) NOT NULL,
  `id_penyakit` varchar(3) NOT NULL,
  `nilai_cf` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `id_gejala`, `id_penyakit`, `nilai_cf`) VALUES
(15, 'G1', 'P1', 1),
(16, 'G2', 'P1', 1),
(17, 'G3', 'P1', 1),
(18, 'G3', 'P2', 1),
(19, 'G4', 'P2', 1),
(20, 'G3', 'P3', 1),
(21, 'G5', 'P3', 1),
(22, 'G6', 'P3', 1),
(23, 'G7', 'P4', 1),
(24, 'G8', 'P4', 1),
(25, 'G9', 'P4', 1),
(26, 'G10', 'P5', 0.5),
(27, 'G11', 'P5', 0.5),
(28, 'G12', 'P5', 1),
(29, 'G13', 'P5', 1),
(30, 'G14', 'P6', 1),
(31, 'G15', 'P6', 1),
(32, 'G16', 'P6', 1),
(33, 'G17', 'P7', 1),
(34, 'G18', 'P7', 0.5),
(35, 'G19', 'P7', 1),
(36, 'G20', 'P7', 1),
(37, 'G7', 'P8', 1),
(38, 'G13', 'P8', 1),
(39, 'G21', 'P8', 0.5),
(40, 'G22', 'P8', 1),
(41, 'G23', 'P8', 1),
(42, 'G24', 'P8', 1),
(43, 'G12', 'P9', 1),
(44, 'G13', 'P9', 1),
(45, 'G25', 'P9', 1),
(46, 'G26', 'P9', 1),
(47, 'G27', 'P9', 0.5),
(48, 'G28', 'P9', 0.2),
(49, 'G29', 'P9', 1),
(50, 'G7', 'P10', 1),
(51, 'G12', 'P10', 1),
(52, 'G13', 'P10', 1),
(53, 'G28', 'P10', 0.5),
(54, 'G29', 'P10', 0.5),
(55, 'G30', 'P10', 1),
(56, 'G16', 'P11', 1),
(57, 'G26', 'P11', 1),
(58, 'G31', 'P11', 1),
(59, 'G32', 'P11', 1),
(60, 'G33', 'P12', 1),
(61, 'G34', 'P12', 1),
(62, 'G35', 'P12', 1),
(63, 'G36', 'P12', 1),
(64, 'G37', 'P12', 0.5),
(65, 'G13', 'P13', 1),
(66, 'G38', 'P13', 1),
(67, 'G39', 'P14', 1),
(68, 'G40', 'P14', 0.5),
(69, 'G9', 'P15', 0.5),
(70, 'G41', 'P15', 0.5),
(71, 'G42', 'P15', 0.5),
(72, 'G43', 'P16', 0.5),
(73, 'G44', 'P16', 0.5),
(74, 'G45', 'P16', 0.5),
(75, 'G46', 'P16', 0.5),
(76, 'G47', 'P17', 0.5),
(77, 'G48', 'P17', 0.5),
(78, 'G22', 'P18', 0.5),
(79, 'G49', 'P18', 0.5),
(80, 'G50', 'P18', 0.5),
(81, 'G51', 'P18', 0.2),
(82, 'G52', 'P19', 0.5),
(83, 'G53', 'P19', 0.4),
(84, 'G54', 'P19', 0.4),
(85, 'G55', 'P19', 0.2),
(86, 'G9', 'P20', 0.4),
(87, 'G56', 'P20', 0.5),
(88, 'G52', 'P21', 1),
(89, 'G57', 'P21', 1),
(90, 'G58', 'P21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cf`
--

CREATE TABLE `cf` (
  `id_cf` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `cf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala1` int(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `id_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala1`, `nama_gejala`, `id_gejala`) VALUES
(10, 'Permukaan bawah daun yang berwarna putih ', 'G1'),
(11, 'Daun terlipat ', 'G2'),
(12, 'Kehadiran ngengat atau kupu-kupu berwarna kuning coklat  ', 'G3'),
(13, 'Daun terpotong seperti digunting ', 'G4'),
(14, 'Kematian tunas-tunas padi', 'G5'),
(15, 'Terdapat ulat pada batang tanaman padi', 'G6'),
(16, 'Daun berubah warna menjadi kuning  ', 'G7'),
(17, 'Tanaman mengering dengan cepat (seperti terbakar)', 'G8'),
(18, 'Bercak berbentuk oval atau bulat pada daun', 'G9'),
(19, 'Kepinding hitam coklat mengkilat bergerombol di pangkal batang padi', 'G10'),
(20, 'Warna tanaman berubah menjadi coklat kemerahan atau kuning', 'G11'),
(21, 'Jumlah anakan berkurang/sedikit  ', 'G12'),
(22, 'Tanaman kerdil', 'G13'),
(23, 'Bulir beras berubah warna menjadi coklat', 'G14'),
(24, 'Beras mengapur (bentuk bulir tidak sempurna)', 'G15'),
(25, 'Gabah menjadi hampa', 'G16'),
(26, 'Keberadaan jejak kaki tikus', 'G17'),
(27, 'Terlihat kotoran/feces tikus', 'G18'),
(28, 'Terdapat lubang aktif', 'G19'),
(29, 'Gejala serangan di bagian tengah lahan ', 'G20'),
(30, 'Sebagian akarnya membusuk ', 'G21'),
(31, 'Daun layu/terkulai', 'G22'),
(32, 'Pinggiran dan ujung daun tua seperti terbakar ', 'G23'),
(33, 'Berubah warna menjadi coklat dari ujung daun terus menjalar ke pangkal daun ', 'G24'),
(34, 'Pertumbuhan akar tanaman lambat ', 'G25'),
(35, 'Daun berubah warna menjadi hijau gelap', 'G26'),
(36, 'Bagian bawah daun dan batang berwarna keunguan ', 'G27'),
(37, 'Waktu pembungaan terlambat ', 'G28'),
(38, 'Gabah yang terbentuk berkurang ', 'G29'),
(39, 'Daun lebih kecil dari tanaman padi normal ', 'G30'),
(40, 'Daun bergerigi', 'G31'),
(41, 'Daun melintir ', 'G32'),
(42, 'Tanaman padi kerdil seperti rumput ', 'G33'),
(43, 'Daun tanaman padi menjadi sempit ', 'G34'),
(44, 'Daun kaku ', 'G35'),
(45, 'Daun berwarna hijau pucat ', 'G36'),
(46, 'Terdapat bercak karat pada daun', 'G37'),
(47, 'Warna daun jingga/orange ', 'G38'),
(48, 'Titik kecil berwarna jingga (orange) di helaian daun', 'G39'),
(49, 'Garis lurus (stripe) berwarna jingga pada ujung daun ', 'G40'),
(50, 'Pelepah memiliki bercak berwarna coklat ', 'G41'),
(51, 'Bulir padi berukuran sebesar biji wijen', 'G42'),
(52, 'Noda berbentuk bulat memanjang pada daun', 'G43'),
(53, 'Warna abu-abu di tengah daun ', 'G44'),
(54, 'Warna coklat atau coklat abu-abu di pinggir daun ', 'G45'),
(55, 'Sedikit bulir yang berisi ', 'G46'),
(56, 'Kulit gabah sempit  ', 'G47'),
(57, 'Berwarna coklat pada helaian daun ', 'G48'),
(58, 'Bercak kekuningan di tepi daun ', 'G49'),
(59, 'Daun menggulung ', 'G50'),
(60, 'Daun mengering ', 'G51'),
(61, 'Bercak berwarna hitam pada daun ', 'G52'),
(62, 'Bentuk bercak tidak teratur pada sisi luar pelepah daun ', 'G53'),
(63, 'Batang padi yang kemudian menjadi lemah ', 'G54'),
(64, 'Anakan mati', 'G55'),
(65, 'Bercak berwarna putih pucat pada pelepah', 'G56'),
(66, 'Bercak coklat kehitaman berbentuk belah ketupat ', 'G57'),
(67, 'Pusat bercak berwarna putih pada daun', 'G58');

-- --------------------------------------------------------

--
-- Table structure for table `keyakinan`
--

CREATE TABLE `keyakinan` (
  `id_rekammedis` int(11) NOT NULL,
  `id_penyakit` varchar(11) NOT NULL,
  `presentasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakar`
--

CREATE TABLE `pakar` (
  `username` varchar(50) NOT NULL,
  `id_pakar` int(3) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakar`
--

INSERT INTO `pakar` (`username`, `id_pakar`, `password`) VALUES
('edo', 1, 'edo');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit1` int(5) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `id_penyakit` varchar(5) NOT NULL,
  `pengendalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit1`, `nama_penyakit`, `id_penyakit`, `pengendalian`) VALUES
(6, 'Hama putih palsu (cnaphalocrocis medinalis))', 'P1', 'upayakan pemeliharaan tanaman sebaik mungkin agar pertanaman tumbuh secara baik, sehat, dan seragam, serta pergunakan insektisida (bila diperlukan) berbahan aktif fipronil atau karbofuran.'),
(7, 'Hama putih (bemisia tabaci)', 'P2', 'gunakan insektisida yang berbahan aktif fipronil atau karbofuran'),
(8, 'Penggerek batang (scirpophaga innotata)', 'P3', 'Menggunakan insektisida sistemik berbahan aktif fipronil.'),
(9, 'Wereng coklat (nilaparvata lugens)', 'P4', 'Pengendalian hama wereng coklat dapat dikendalikan dengan varietas tahan. Penanaman padi dengan jarak tanam yang tidak terlalu rapat, pergiliran varietas, dan insektisida juga efektif untuk mengendalikan hama ini. Berbagai insektisida yang efektif antara lain yang berbahan aktif amitraz, bupofresin, fipronil, imidakloprid, karbofuran, carbosulfan, metolkarb, MIPCI, propoksur, atau tiametoksam.'),
(10, 'Kepinding tanah (scotinophara coarctata)', 'P5', '1. Membersihkan lahan dari berbagai gulma agar sinar matahari dapat mencapai dasar kanopi tanaman padi<br>\r\n2. Menanam varietas padi berumur genjah, untuk menghambat peningkatan populasi kepinding tanah'),
(11, 'Walang sangit (leptocorisa oratorius)', 'P6', '1. Meratakan lahan dengan baik dan memupuk tanaman agar tanaman tumbuh seragam<br>\r\n2. Penangkap walang sangit dengan menggunakan jaring sebelum stadia pembungaan<br>\r\n3. Mengumpan walang sangit dengan ikan yang sudah busuk, daging yang sudah rusak, atau dengan kotoran ayam<br>\r\n4. Menggunakan insektisida bila diperlukan dan sebaiknya dilakukan pada pagi atau sore hari ketika walang sangit berada di kanopi. Penggunaan insektisida (bila diperlukan) antara lain yang berbahan aktif: BPMC, fipronil, metolkarb, MIPC, atau propoksur.'),
(12, 'Tikus (rattus argentiventer)', 'P7', 'pendekatan PHTT (Pengendalian Hama Tikus Terpadu), yaitu pengendalian yang didasarkan pada biologi dan ekologi tikus, dilakukan secara bersama oleh petani sejak dini (sejak sebelum tanam), intensif dan terus -menerus, memanfaatkan berbagai teknologi pengendalian yang tersedia, dan dalam wilayah sasaran pengendalian skala luas'),
(13, 'Kahat kalium (potassium deficiency)', 'P8', 'Pengendalian yang perlu dilakukan adalah pemberian pupuk NPK.'),
(14, 'Kahat fosfor (phosphorus deficiency)', 'P9', 'Pengendalian yang perlu dilakukan adalah pemberian pupuk NPK.'),
(15, 'Kahat nitrogen (nitrogen deficiency)', 'P10', 'Pengendalian yang perlu dilakukan adalah pemberian pupuk NPK'),
(16, 'Kerdil hampa (ragged stunt)', 'P11', '. Pengendalian dengan penanaman padi dengan jarak tanam yang tidak terlalu rapat, pergiliran varietas, dan insektisida juga efektif untuk mengendalikan hama ini. Berbagai insektisida yang efektif antara lain yang berbahan aktif amitraz, bupofresin, fipronil, imidakloprid, karbofuran, carbosulfan, metolkarb, MIPCI, propoksur, atau tiametoksam.'),
(17, 'Kerdil rumput (grassy stunt)', 'P12', 'Pengendalian dengan penanaman padi dengan jarak tanam yang tidak terlalu rapat, pergiliran varietas, dan insektisida juga efektif untuk mengendalikan hama ini. Berbagai insektisida yang efektif antara lain yang berbahan aktif amitraz, bupa resin, fipronil, imidakloprid, karbofuran, carbosulfan, metolkarb, MIPCI, propoksur, atau tiametoksam'),
(18, 'Tungro (tungro bacilliform)', 'P13', 'Pengendalian dengan penanaman padi dengan jarak tanam yang tidak terlalu rapat, pergiliran varietas, dan insektisida juga efektif untuk mengendalikan hama ini. Berbagai insektisida yang efektif antara lain yang berbahan aktif amitraz, bupa resin, fipronil, imidakloprid, karbofuran, carbosulfan, metolkarb, MIPCI, propoksur, atau tiametoksam'),
(19, 'Hawar daun jingga (red striptr)', 'P14', 'Pengendalian dapat dilakukan dengan penyemprotan fungisida.'),
(20, 'Bercak coklat (brown spot)', 'P15', 'Pengendalian dapat dilakukan dengan penyemprotan fungisida. '),
(21, 'Busuk pelepah (sheath rot)', 'P16', 'Pengendalian dilakukan dengan penyemprotan fungisida pada daun hanya dilakukan bila diperlukan yaitu pada fase bunting dan perlakuan benih dengan fungisida yang berbahan aktif karbendazim dan mankozeb untuk mengurangi infeksi penyakit. Penyemprotan dengan fungisida (bila diperlukan) yang berbahan aktif benomil juga efektif menekan infeksi penyakit'),
(22, 'Bercak cercospora (narrow brown leaf spot)', 'P17', 'Pengendalian dilakukan dengan melakukan pemupukan berimbang dan penyemprotan dengan fungisida.'),
(23, 'Hawar daun bakteri (bacterial leaf blight â€“ blb)', 'P18', 'Pengendalian dilakukan adalah dengan menyemprot fungisida.'),
(24, 'Busuk batang (stem rot)', 'P19', 'Pengendalian penyakit ini dilakukan dengan mengatur sistem perairan sehingga air tidak sampai menggenangi padi dan melakukan penyemprotan dengan fungisida'),
(25, 'Hawar pelepah (sheath blight)', 'P20', 'Pengendalian dilakukan adalah dengan penyemprotan fungisida'),
(26, 'Blas (blast)', 'P21', 'Pengendalian dilakukan dengan melakukan perendaman benih dengan fungisida sebelum tanam untuk mencegah penularan lewat benih.');

-- --------------------------------------------------------

--
-- Table structure for table `rekammedis`
--

CREATE TABLE `rekammedis` (
  `id_rekammedis` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `rp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_gejala` varchar(11) NOT NULL,
  `nilai_user` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id_gejala`, `nilai_user`) VALUES
('G1', 0.4),
('G2', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `true`
--

CREATE TABLE `true` (
  `id_gejala` varchar(3) NOT NULL,
  `nilai_user` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala1`);

--
-- Indexes for table `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`id_pakar`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala1` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit1` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
