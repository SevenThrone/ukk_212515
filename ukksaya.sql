-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2024 pada 19.14
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukksaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `AlbumID` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserID` int(11) NOT NULL,
  `LokasiFile` varchar(225) NOT NULL,
  `GambarAlbum` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserID`, `LokasiFile`, `GambarAlbum`) VALUES
(14, 'Animal', '', '2024-03-06', 3, '', 'animal5.jpg'),
(15, 'Food & Drink', '', '2024-03-06', 3, '', 'makanan1.jpeg'),
(16, 'Beach', '', '2024-03-06', 3, '', 'beach-1761410_6401.jpg'),
(17, 'Street', '', '2024-03-06', 3, '', 'pngtree-winter-city-street-road-street-night-view-image_5191151.jpg'),
(18, 'Mountain', '', '2024-03-06', 3, '', 'mt-assiniboine-provincial-park-at-sunrise-royalty-free-image-16232535641.jpg'),
(19, 'Village', '', '2024-03-06', 3, '', 'pexels-photo-3568071.jpeg'),
(20, 'Town', '', '2024-03-06', 3, '', 'pbutke_Flicker_com1.jpg'),
(21, 'Space', '', '2024-03-06', 3, '', 'mathew-schwartz-7YiZKj9A3DM-unsplash1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `FotoID` int(11) NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` text NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`FotoID`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumID`, `UserID`) VALUES
(3, 'Burger Cheese', '', '2024-02-29', 'burger_cheese.jpg', 0, 0),
(4, 'Burger Cheese', '', '2024-02-29', 'burger_cheese1.jpg', 0, 0),
(5, 'Burger Cheese', '', '2024-02-29', 'burger_cheese2.jpg', 0, 0),
(6, 'Burger Cheese', '', '2024-02-29', 'burger_cheese3.jpg', 0, 0),
(7, 'Burger Cheese', 'burger dilapisi keju yang lumer', '2024-02-29', 'burger_cheese4.jpg', 0, 0),
(8, 'Burger Cheese', '', '2024-02-29', 'burger_cheese5.jpg', 0, 0),
(9, 'Burger Cheese', '', '2024-02-29', 'burger_cheese6.jpg', 0, 0),
(10, 'Singa Afrika', '', '2024-03-06', 'animal.jpg', 5, 3),
(11, 'Rendang', 'Makanan khas dari daerah Sumatera Barat, Indonesia', '2024-03-06', 'rendang1.jpg', 6, 3),
(12, 'Gado-gado', '', '2024-03-06', 'Gado_gado.jpg', 6, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `KomentarID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`LikeID`, `FotoID`, `UserID`, `TanggalLike`) VALUES
(2, 11, 3, '2024-03-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 'BantengMerah', '$2y$10$WciE6xiGlISLVFfFsT9DqeJuoFY.bvFb8fG3TXA4oyvBt8NmSRXvK', 'bantengmerah@gmail.com', 'Banteng Merah Megawati', 'Jl banteng'),
(2, 'Admin1', '$2y$10$yPFBzPztntKxjbS77KZxDelORDamgd5CmA2aQOVM3M49dz8eYyify', 'admin@gmail.com', 'admin', 'Tamrin'),
(3, 'Admin', '$2y$10$twD6Q.qEA1m7jt70vcUhh.oEOKGGjlweOvRD4Gkit9BqYxXlKB3QC', 'admin@gmail.com', 'admin', 'Tamrin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`KomentarID`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `KomentarID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
