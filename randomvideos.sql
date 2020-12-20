-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2020 pada 08.59
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `randomvideos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` varchar(30) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
('kWXbE', 'Horor'),
('mHs20', 'Sejarah'),
('nzT52', 'Adventure'),
('oiOZ9', 'Drama'),
('Tt9ad', 'Romantic'),
('ySezt', 'Action');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rilis`
--

CREATE TABLE `rilis` (
  `kd_rilis` varchar(20) NOT NULL,
  `waktu_rilis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rilis`
--

INSERT INTO `rilis` (`kd_rilis`, `waktu_rilis`) VALUES
('6L8JQ', '2019'),
('aZBGN', '2016'),
('FQMcE', '2018'),
('MSUtE', '2017'),
('zYk98', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `streaming`
--

CREATE TABLE `streaming` (
  `id_streaming` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_video` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `streaming`
--

INSERT INTO `streaming` (`id_streaming`, `id_user`, `id_video`) VALUES
('8PNQyeT', 'urEyaOphgf', 'qXIWdNg'),
('JtduZ3U', 'urEyaOphgf', 'ckFqP4K'),
('PpwhO23', 'bvcFKNiPoh', 'dcSAaR1'),
('QBFrmfq', 'XFkOgBCbQp', 'QcGMVfw'),
('r6cPIFJ', 'bvcFKNiPoh', 'F9mAsv8'),
('WzjxBK0', 'XFkOgBCbQp', 'ORkyGYj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `email`, `no_tlp`, `role`) VALUES
('bvcFKNiPoh', 'blachkz', '$2y$10$IRjWnEIwXjnwnXgtpo8Zh.ZUdtiGSiG88j359Bc9zeQWZYewAW1wW', 'blksz@gmail.com', '08921538626', 'user'),
('GflzjUhJIA', 'w1sznu', '$2y$10$/qc/hz0A1bKoFdHnFAhmjOaxcWqII8CaM6nRU0SpDT8.lQpee1r3G', 'w1sznuam@gmail.com', '08621394813', 'admin'),
('urEyaOphgf', 'artzy', '$2y$10$IEx8sUXCCq6Y10lwFKg1supX9mnXknJDFRw9HnBoSWhhkcyC0eROC', 'trz78@ymail.com', '08621378956', 'user'),
('XFkOgBCbQp', 'rawis', '$2y$10$l3LyGEXMCaABZgE2byu9..vDkdPVWFO9TvgTgVEC/Ynvp2zcZG.Oy', 'ranggssn@gmail.com', '087213039022', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nama_video` varchar(50) NOT NULL,
  `link_video` varchar(225) NOT NULL,
  `poster` varchar(50) NOT NULL,
  `kd_kategori` varchar(30) NOT NULL,
  `pemeran` text NOT NULL,
  `deskripsi` text NOT NULL,
  `durasi_waktu` varchar(20) NOT NULL,
  `skor` varchar(20) NOT NULL,
  `kd_rilis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `id_user`, `nama_video`, `link_video`, `poster`, `kd_kategori`, `pemeran`, `deskripsi`, `durasi_waktu`, `skor`, `kd_rilis`) VALUES
('ckFqP4K', 'urEyaOphgf', 'Deadpool', 'https://www.youtube.com/embed/ONHBaC-pfsk', 'ddpl.jpg', 'ySezt', 'Ryan Relnolds, Morena Bacarin', 'A wisecracking mercenary gets experimented on and becomes immortal but ugly, and sets out to track down the man who ruined his looks', '160minutes', '8.0', 'aZBGN'),
('dcSAaR1', 'bvcFKNiPoh', 'Dunkirk', 'https://www.youtube.com/embed/F-eMt3SrfFU', 'dunkirk.jpg', 'mHs20', 'Fionn Whitehead,  Barry Keoghan', 'Allied soldiers from Belgium, the British Empire, and France are surrounded by the German Army and evacuated during a fierce battle in World War II.', '1 hours 46 minutes', '7.8', 'MSUtE'),
('F9mAsv8', 'bvcFKNiPoh', 'High And Low The Worst', 'https://www.youtube.com/embed/fQHStGrqXv0', 'halow.jpg', 'nzT52', 'Kazuma Kawamura, Goki Maeda, Hayato Komori,Yo Aoi', 'Demon High School is divide into a part-time system and a full-time system, Yoshiki Murayama is the head of the Demon high school and Kaede Hanaoka has an ambition to take on the full-time world in order to challenge Murayama one day', '2 hours 10 minutes', '9.7', '6L8JQ'),
('ORkyGYj', 'XFkOgBCbQp', 'IT', 'https://www.youtube.com/embed/7no56Zw1e20', 'it.jpg', 'kWXbE', 'Bill Skarsgard, Jaeden Martell', 'In the summer of 1989, a group of bullied kids band together to destroy a shape-shifting monster, which disguises itself as a clown and preys on the children of Derry, their small Maine town.', '2 hours', '7.5', 'MSUtE'),
('QcGMVfw', 'XFkOgBCbQp', 'Alladin', 'https://www.youtube.com/embed/yRh-dzrI4Z4', 'aladin.jpg', 'oiOZ9', 'Sam Smith, Mena Massoud, Naomi Scott ', 'Aladdin, a street urchin in the Arabian city of Agrabah, and his monkey Abu meet Princess Jasmine, who has snuck away from her sheltered life in the palace.', '2 hours', '7.7', '6L8JQ'),
('qXIWdNg', 'urEyaOphgf', 'Dillan 1990', 'https://www.youtube.com/embed/C2yFJaXmdQs', 'dilan1991.jpg', 'Tt9ad', 'Iqbaal Dhiafakhri Ramadhan, Vanesha Prescilla, Yoriko Angeline', 'Milea (Vanesha Prescilla) met with Dilan (Iqbaal Ramadhan) at a high school in Bandung in 1990. An unusual introduction brings Milea to know the uniqueness of Dilan who is smart, kind, and romantic in her eyes.', '2 hours', '6.5', 'FQMcE'),
('UoMvaVW', 'urEyaOphgf', 'Aquaman', 'https://www.youtube.com/embed/h-k0-Z9b4Cw', 'aquaman.jpg', 'ySezt', 'Jason Momoa, Amber Heard, Willem Dafoe', 'Arthur Curry, the human-born heir to the underwater kingdom of Atlantis, goes on a quest to prevent a war between the worlds of ocean and land.', '2 hours 30 minutes', '7.0', 'FQMcE'),
('y9kO2K1', 'XFkOgBCbQp', 'Wonder Woman', 'https://www.youtube.com/embed/INLzqh7rZ-U', 'ww.jpg', 'ySezt', 'Chris Pine, Gal Gadot', 'Fast forward to the 1980s as Wonder Woman\'s next big screen adventure finds her facing two all-new foes: Max Lord and The Cheetah.', '2 hours 32 minutes', '8.4', 'FQMcE');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `rilis`
--
ALTER TABLE `rilis`
  ADD PRIMARY KEY (`kd_rilis`);

--
-- Indeks untuk tabel `streaming`
--
ALTER TABLE `streaming`
  ADD PRIMARY KEY (`id_streaming`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_video` (`id_video`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `streaming`
--
ALTER TABLE `streaming`
  ADD CONSTRAINT `streaming_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `streaming_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
