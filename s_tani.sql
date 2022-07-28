-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 03:44 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_tani`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_a` int(9) NOT NULL,
  `id_ke` int(9) NOT NULL,
  `id_k` int(9) NOT NULL,
  `nik` varchar(12) NOT NULL,
  `nama_a` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jabatan` enum('Sekretaris','Bendahara','Anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_a`, `id_ke`, `id_k`, `nik`, `nama_a`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `jabatan`) VALUES
(3, 4, 19, '2147483647', 'Akhmad Suprianto', 'Martapura', '2022-06-05', 'Jl, Ahmad Yani, Banjarbaru', '082345677644', 'Bendahara'),
(4, 4, 19, '2147483647', 'zaenal', 'Martapura', '2022-06-10', 'Jl, Ahmad Yani, Banjarbaru', '083344556611', 'Anggota'),
(5, 4, 19, '2147483647', 'Madafaka Aladeen', 'Banten', '2022-06-02', 'Jl. Golf, Citra Mega, Cempaka, Banjarbaru.', '081277659955', 'Anggota'),
(7, 2, 20, '2147483647', 'Samuel', 'Binuang', '2022-06-09', 'Jl, Ahmad Yani, Banjarbaru', '081277659955', 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id_b` int(9) NOT NULL,
  `id_p` int(9) NOT NULL,
  `id_pegawai` int(9) NOT NULL,
  `jenis_b` varchar(150) NOT NULL,
  `jumlah_b` int(11) NOT NULL,
  `tgl_b` date NOT NULL,
  `kode_b` varchar(12) NOT NULL,
  `bantuan` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`id_b`, `id_p`, `id_pegawai`, `jenis_b`, `jumlah_b`, `tgl_b`, `kode_b`, `bantuan`) VALUES
(10, 11, 2, 'Barang', 7000000, '2021-06-23', 'hghw', 'Semen 30 Sak dan Pasir 1 rit'),
(11, 11, 3, 'Uang', 7000000, '2022-06-23', 'pwf4', 'Uang Tunai');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_h` int(9) NOT NULL,
  `id_k` int(9) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `nama_h` varchar(55) NOT NULL,
  `jenis_h` varchar(88) NOT NULL,
  `jml_h` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_h`, `id_k`, `tgl_awal`, `tgl_akhir`, `nama_h`, `jenis_h`, `jml_h`) VALUES
(3, 20, '2022-01-23', '2022-05-24', 'Kembang Kol', 'Sayuran', '412'),
(4, 19, '2020-07-17', '2021-07-17', 'Kentang', '19', '300'),
(5, 19, '2022-07-19', '2022-10-06', 'Melon', 'Buah-buahan', '377');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tani`
--

CREATE TABLE `hasil_tani` (
  `id` int(11) NOT NULL,
  `id_kt` int(11) NOT NULL,
  `nama_tanaman` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `awal_periode` date NOT NULL,
  `akhir_periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_tani`
--

INSERT INTO `hasil_tani` (`id`, `id_kt`, `nama_tanaman`, `jumlah`, `awal_periode`, `akhir_periode`) VALUES
(4, 10, 'Palaijo', 100, '2022-01-17', '2023-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `id_jual` int(9) NOT NULL,
  `id_h` int(9) NOT NULL,
  `jml` varchar(25) NOT NULL,
  `satuan` varchar(166) NOT NULL,
  `tgl_j` date NOT NULL,
  `harga_j` varchar(25) NOT NULL,
  `jml_j` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`id_jual`, `id_h`, `jml`, `satuan`, `tgl_j`, `harga_j`, `jml_j`) VALUES
(3, 4, '300', 'Bijian', '2022-07-25', '3000', '40'),
(4, 3, '412', 'Satuan Tanaman', '2022-07-26', '2500', '20');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_tani`
--

CREATE TABLE `kelompok_tani` (
  `id_k` int(9) NOT NULL,
  `id_w` int(9) NOT NULL,
  `id_ke` int(9) NOT NULL,
  `nama_k` varchar(177) NOT NULL,
  `alamat_k` varchar(177) NOT NULL,
  `tahun_k` varchar(4) NOT NULL,
  `unggulan` varchar(177) NOT NULL,
  `id_pegawai` int(9) NOT NULL,
  `tgl_k` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok_tani`
--

INSERT INTO `kelompok_tani` (`id_k`, `id_w`, `id_ke`, `nama_k`, `alamat_k`, `tahun_k`, `unggulan`, `id_pegawai`, `tgl_k`) VALUES
(19, 3, 2, 'KT. Srikandi', 'Jl. Sukamaju, Gg. Swadaya', '1997', 'Tan. Sayuran, Toga', 2, '2021-07-25'),
(20, 2, 4, 'KT. Angkasa', 'Jl. Sukamaju, Gg. Swadaya', '2020', 'Tan. Sayuran, Toga', 4, '2022-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `ketua`
--

CREATE TABLE `ketua` (
  `id_ke` int(9) NOT NULL,
  `username` varchar(77) NOT NULL,
  `password` varchar(77) NOT NULL,
  `level` varchar(33) NOT NULL,
  `nama` varchar(188) NOT NULL,
  `nik` varchar(28) NOT NULL,
  `alamat` varchar(188) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketua`
--

INSERT INTO `ketua` (`id_ke`, `username`, `password`, `level`, `nama`, `nik`, `alamat`, `telp`) VALUES
(2, 'murtika', 'murtika', 'ketua', 'murtika', '122144345', 'Jl. A. Yani', '086525378476'),
(4, 'ahmad', 'ahmad', 'ketua', 'Ahmad Sarip', '6372122123', 'Jl, Ahmad Yani, Banjarbaru', '087365372875');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id_m` int(9) NOT NULL,
  `id_b` int(9) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `kesimpulan` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id_m`, `id_b`, `tgl_awal`, `tgl_akhir`, `kesimpulan`, `foto`) VALUES
(7, 10, '2022-06-23', '2022-06-25', 'Berjalan Sangat Baik', '36756976avatar4.png');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(9) NOT NULL,
  `nip` varchar(45) NOT NULL,
  `nama_lengkap` varchar(180) NOT NULL,
  `gol` varchar(85) NOT NULL,
  `jabatan` varchar(80) NOT NULL,
  `no_ktp` varchar(55) NOT NULL,
  `tmp_lhr` varchar(188) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` varchar(55) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_mp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_lengkap`, `gol`, `jabatan`, `no_ktp`, `tmp_lhr`, `tgl_lhr`, `jk`, `alamat`, `no_hp`, `tgl_mp`) VALUES
(2, '19770421312', 'Chris ,S.Pd', 'C/III', 'Staff', '637321334323', 'Banten', '1990-04-25', 'Laki-laki', 'Jl, Ahmad Yani, Banjarbaru', '081277659955', '2009-01-01'),
(3, '167100751212', 'Sugiatno', 'B/IIIc', 'Kabid', '', '', '0000-00-00', '', '', '', '0000-00-00'),
(4, '1671333333', 'Syamsudin Noor', 'B/IIIa', 'Kabid III', '', '', '0000-00-00', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_p` int(9) NOT NULL,
  `id_user` int(9) NOT NULL,
  `id_ke` int(9) NOT NULL,
  `id_k` int(9) NOT NULL,
  `keperluan_p` varchar(200) NOT NULL,
  `anggaran` varchar(12) NOT NULL,
  `file_p` varchar(200) NOT NULL,
  `tgl_p` date NOT NULL,
  `ket_p` varchar(100) NOT NULL,
  `status_p` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_p`, `id_user`, `id_ke`, `id_k`, `keperluan_p`, `anggaran`, `file_p`, `tgl_p`, `ket_p`, `status_p`) VALUES
(10, 0, 2, 20, 'Duit', '70000000', '4014contoh.surat.kelompok.tani.pdf', '2021-06-06', 'Tidak Masuk Akal Anggarannya', 'Ditolak'),
(11, 0, 4, 19, 'Pembangunan Embung', '7000000', '5164Data.Kelompok.Tani.pdf', '2022-06-06', 'Sudah Sesuai', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi`
--

CREATE TABLE `realisasi` (
  `id_r` int(9) NOT NULL,
  `id_b` int(9) NOT NULL,
  `tgl_r` date NOT NULL,
  `jumlah_b` varchar(44) NOT NULL,
  `anggaran_r` varchar(44) NOT NULL,
  `terpakai_r` varchar(44) NOT NULL,
  `kembalian_r` varchar(44) NOT NULL,
  `belanja_netto` varchar(44) NOT NULL,
  `realisasi_a` varchar(44) NOT NULL,
  `sisa_a` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi`
--

INSERT INTO `realisasi` (`id_r`, `id_b`, `tgl_r`, `jumlah_b`, `anggaran_r`, `terpakai_r`, `kembalian_r`, `belanja_netto`, `realisasi_a`, `sisa_a`) VALUES
(7, 10, '2022-06-23', '7000000', '6800000', '6000000', '700000', '5300000', '88.235294117647', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(9) NOT NULL,
  `kode_u` varchar(12) NOT NULL,
  `email` varchar(66) NOT NULL,
  `nama_u` varchar(255) NOT NULL,
  `username` varchar(44) NOT NULL,
  `level` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `kode_u`, `email`, `nama_u`, `username`, `level`, `password`) VALUES
(1, 'ad1', '', 'setiawan', 'admin', 'admin', 'admin'),
(2, 'at1', '', 'Ongky Ramadhani', 'atasan', 'atasan', 'atasan'),
(3, 'ksrl3', '', 'Murtika', 'murtika', 'user', 'murtika');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_binaan`
--

CREATE TABLE `wilayah_binaan` (
  `id_w` int(9) NOT NULL,
  `kode_w` varchar(55) NOT NULL,
  `kel` varchar(155) NOT NULL,
  `kec` varchar(177) NOT NULL,
  `kota` varchar(177) NOT NULL,
  `luas_w` varchar(77) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah_binaan`
--

INSERT INTO `wilayah_binaan` (`id_w`, `kode_w`, `kel`, `kec`, `kota`, `luas_w`) VALUES
(2, 'W01', 'Syamsudin Noor', 'Landasan Ulin', 'Banjarbaru', '2Hektar'),
(3, 'W02', 'Landasan Ulin Timur', 'Liang Anggang', 'Banjarbaru', '100 Hektar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_b`),
  ADD KEY `id_kt` (`id_p`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_h`);

--
-- Indexes for table `hasil_tani`
--
ALTER TABLE `hasil_tani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  ADD PRIMARY KEY (`id_k`),
  ADD KEY `id_wilayah` (`id_w`),
  ADD KEY `id_ke` (`id_ke`);

--
-- Indexes for table `ketua`
--
ALTER TABLE `ketua`
  ADD PRIMARY KEY (`id_ke`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_m`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `nik` (`id_ke`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`id_r`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilayah_binaan`
--
ALTER TABLE `wilayah_binaan`
  ADD PRIMARY KEY (`id_w`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_a` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id_b` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_h` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hasil_tani`
--
ALTER TABLE `hasil_tani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_jual` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  MODIFY `id_k` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ketua`
--
ALTER TABLE `ketua`
  MODIFY `id_ke` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_m` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_p` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `id_r` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wilayah_binaan`
--
ALTER TABLE `wilayah_binaan`
  MODIFY `id_w` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
