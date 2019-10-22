-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2018 pada 07.43
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Anna', 'ADM0001', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `email`, `no_hp`, `username`, `password`) VALUES
(1, 'Haris Angriawan', 'haris.angriawan@students.amikom.ac.id', '082384383680', '16.11.0339', 'haris11'),
(2, 'Ahmad Hanjaya', 'ahmad.hanjaya@students.amikom.ac.id', '085857564678', '16.11.0386', 'ahmad'),
(3, 'Sri Handayani', 'sri.handayani@students.amikom.ac.id', '082345718812', '16.11.0378', 'yani'),
(4, 'Titi Fathima Az-Zahra', 'titi.fathima@students.amikom.ac.id', '085782394512', '16.11.0366', 'zahra'),
(5, 'Fauzan Zaki ', 'fauzan.zaki@students.amikom.ac.id', '089936478977', '18.21.1208', 'fauzan'),
(6, 'Yuda Surya Saputra', 'yuda.surya@students.amikom.ac.id', '083399874433', '18.21.1279', 'yuda'),
(7, 'Jarot Nur Hidayat', 'jarot.hidayat@students.amikom.ac.id', '082233777788', '16.11.0365', 'jarot'),
(8, 'Afrizal Kusuma Putra ', 'afrizal.kusuma@students.amikom.ac.id', '089777665555', '16.11.0345', 'rizal'),
(9, 'Haris Angriawan', 'silah766@gmail.com', '082384383680', '16.11.0440', 'd41d8cd98f00b204e9800998ecf8427e'),
(10, 'Haris Angriawan', 'crazymone_atlantica@yahoo.com', '082384383680', '16.11.0445', 'c0ba88b8bca79ca3b50b96abdf431766');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`nama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
