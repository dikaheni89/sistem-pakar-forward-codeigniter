-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2020 pada 16.07
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_asep`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `status_active` enum('N','Y') NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `nama_admin`, `alamat`, `email`, `no_telp`, `username`, `password`, `image`, `status_active`, `create_date`) VALUES
(1, 'Asep', 'Kp. Sodong', 'asep@gmail.com', '083872838604', 'admin', '$2y$10$ot5L.eCBKLTTrB6KYPFTCeiOFrYKH4R4QxXj9vR3IuWxGlejnephK', 'Koala.jpg', 'Y', '2020-07-17 07:42:38'),
(10, 'Robby RIzky Johara', 'Kp. Maja', 'robby_bae@yahoo.com', '085722996564', 'robby123', '$2y$10$cn6Mhg9SmV1E56X/r3uYp.x/xeV5wrla5KoQCltsqa53Ac4oD1qdy', '', 'Y', '2020-07-13 08:37:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` varchar(11) NOT NULL,
  `gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G01', 'Mata Menguning'),
('G02', 'Berat tubuh kurang dari 10 kg'),
('G03', 'Mengalami kelemasan pada tubuh secara terus menerus.'),
('G04', 'Berat tubuh kurang dari 10 kg'),
('G05', 'Mata Menguning'),
('G06', 'Warna kulit lebam'),
('G07', 'Penurunan berat badan yang drastis.'),
('G08', 'Tampak lebih besar dari anak seusianya.'),
('G09', 'Kurang gesit.'),
('G10', 'Kecenderungan banyak makan atau ngemil.'),
('G11', 'Berat badan pada KMS berada pada lajur kuning bagian atas atau di atasnya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosis`
--

CREATE TABLE `hasil_diagnosis` (
  `id_hasil` int(11) NOT NULL,
  `idusers` varchar(11) NOT NULL,
  `kd_penyakit` varchar(11) NOT NULL,
  `tgl_diagnosis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_diagnosis`
--

INSERT INTO `hasil_diagnosis` (`id_hasil`, `idusers`, `kd_penyakit`, `tgl_diagnosis`) VALUES
(1, '1', 'G02', '2020-06-29'),
(2, '1', 'G02', '2020-06-29'),
(3, '1', 'P01', '2020-06-29'),
(4, '1', 'P01', '2020-06-29'),
(5, '2', 'P01', '2020-06-30'),
(6, '3', 'P01', '2020-07-09'),
(7, '2', 'P01', '2020-07-10'),
(8, '5', 'P01', '2020-07-17'),
(9, '5', 'P01', '2020-07-17'),
(10, '5', 'P01', '2020-07-17'),
(11, '5', 'P01', '2020-07-17'),
(12, '5', 'P01', '2020-07-17'),
(13, '5', 'P01', '2020-07-17'),
(14, '5', 'P01', '2020-07-17'),
(15, '5', 'P02', '2020-07-17'),
(16, '5', 'P01', '2020-07-17'),
(17, '6', 'P02', '2020-07-17'),
(18, '6', 'undefined', '2020-07-17'),
(19, '6', 'P01', '2020-07-17'),
(20, '6', 'undefined', '2020-07-17'),
(21, '5', 'P01', '2020-07-17'),
(22, '5', 'P01', '2020-07-17'),
(23, '5', 'P01', '2020-07-17'),
(24, '5', 'P01', '2020-07-17'),
(25, '5', 'P01', '2020-07-17'),
(26, '5', 'P01', '2020-07-17'),
(27, '5', 'P01', '2020-07-17'),
(28, '5', 'P01', '2020-07-17'),
(29, '5', 'P01', '2020-07-17'),
(30, '5', 'P01', '2020-07-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z', 1, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id_analisis_solusi` int(11) NOT NULL,
  `kd_penyakit` varchar(11) NOT NULL,
  `kd_gejala` varchar(11) NOT NULL,
  `jika_ya` varchar(11) NOT NULL,
  `jika_tidak` varchar(11) NOT NULL,
  `solusi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_analisis_solusi`, `kd_penyakit`, `kd_gejala`, `jika_ya`, `jika_tidak`, `solusi`) VALUES
(6, 'P01', 'G01', 'G02', 'G04', '0'),
(7, 'P01', 'G02', 'G03', 'G04', '0'),
(8, 'P01', 'G03', '0', 'G04', 'P01'),
(9, 'P02', 'G04', 'G05', 'G07', '0'),
(13, 'P02', 'G05', 'G06', 'G07', '0'),
(14, 'P02', 'G06', '0', 'G07', 'P02'),
(16, 'P03', 'G07', 'G08', '0', '0'),
(17, 'P03', 'G08', 'G09', '0', '0'),
(19, 'P03', 'G09', 'G10', '0', '0'),
(20, 'P03', 'G10', 'G11', '0', 'P03'),
(21, 'P03', 'G11', 'G07', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(11) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `keterangan_penyakit` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nama_penyakit`, `keterangan_penyakit`, `image`, `solusi`) VALUES
('P01', 'Gizi Buruk Kwashiorkor', 'Berat Badan Berkurang secara terus menerus kurang dari 10 kg', '', 'Memberikan asupan gizi sesuai aturan dokter'),
('P02', 'Gizi Buruk Marasmus', 'Tubuh mengalami lemas dan kurang berat tubuh secara drastis.', '', 'Berikan asupan gizi dan konsultasi dengan doker gizi.'),
('P03', 'Kegemukan', 'Anak gemuk jika berat badannya berada pada lajur kuning atas pada KMS, sedangkan anak dinyatakan sangat gemuk (obese) jika berat badannya telah melampaui lajur kuning atas. Gemuk dapat terjadi karena penumpukan lemak tubuh yang berlebih, sehingga berat badan seseorang melebihi normal. Akibatnya adalah meningkatnya risiko menderita penyakit degeneratif pada usia dewasa muda, seperti tekanan darah tinggi, jantung, penyakit kencing manis.', '', '1. Pemantauan berat badan rutin bulanan di Posyandu;\r\n2. Menerapkan pola makan gizi seimbang sesuai umurnya;\r\n3. Pemberian ASI eksklusif dan melanjutkan pemberian ASI sampai anak usia 2 tahun;\r\n4. Mendidik anak untuk melakukan aktivitas fisik di luar rumah;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `nama_users` varchar(100) NOT NULL,
  `alamat_users` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `umur` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `status` enum('N','Y') NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idusers`, `nama_users`, `alamat_users`, `email`, `telp`, `umur`, `username`, `password`, `image`, `status`, `last_date`) VALUES
(1, 'vito', 'cening', 'vitoefriesi@gmail.com', '083872838604', '12', 'admin', '$2y$10$STg2kuTUkb4RixPPpir19O.DdKdqhEV1.Pmh6Dadvp9b5LwfZymwW', '', 'Y', '2020-06-22 07:42:46'),
(2, 'Andri', 'Kp. Ranca Mulya Desa Pasirsedang', 'andriagustian98@gmail.com', '085888485031', '18', 'andri', '$2y$10$BdqCcNdOm.EocuKFHd/4kespFHh8XYtDmCNCOaGkPNZqKmZ3jXvWi', '', 'N', '2020-06-30 09:42:04'),
(3, 'asep', 'saepullah', 'asaepsaepullah@gmail.com', '085888485032', '21', 'asep1', '$2y$10$W8fWoOWkxRJ0hIhQ6SoTMO6zyP44xhCj6NbeDiZVyS8KPWLHagNQS', '', 'N', '2020-07-09 08:31:55'),
(4, 'wibobo', 'Kp. Muncang', 'wibobo74@gmail.com', '085888485031', '41', 'wibowo24', '$2y$10$J1ZNCri5BtUumUS5OW9JmuJXq4WaAybOKwL8UkjFnr0bpzBcUhHTy', '', 'Y', '2020-07-17 07:15:52'),
(5, 'Andri Andriansyah', 'Kp. Sareseh', 'andri78@gmail.com', '085888485032', '18', 'andri123', '$2y$10$Ha7DPYJny8CiHG/W9XKI5ei0Mu1Dpb3NWdZDHku7QdnCyjxmCWu1e', '67141389_109137743739028_305815166262444032_n.jpg', 'Y', '2020-07-17 07:33:00'),
(6, 'Iwan Ridwanudin', 'Kp. Kadumula RT/RW. 007/002 Desa Kolelet Kec. Picung Kab. Pandeglang - Banten', 'iwanridwanudin12@gmail.com', '0812111098765', '19', 'iwan001', '$2y$10$wMe4RjJ1qFRoiTuL/uvSReq3Ov.fYxRPAgzY5t/7DcZG.8U3odtiO', '', 'Y', '2020-07-17 11:36:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indeks untuk tabel `hasil_diagnosis`
--
ALTER TABLE `hasil_diagnosis`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id_analisis_solusi`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `hasil_diagnosis`
--
ALTER TABLE `hasil_diagnosis`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id_analisis_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
