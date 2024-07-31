-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Jul 2024 pada 05.40
-- Versi server: 8.0.37
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_produk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int NOT NULL,
  `id_produk` int DEFAULT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_produk`, `nama_alternatif`, `kode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Batik Sasa', 'A1', '2024-07-24 17:45:55', '2024-07-28 03:28:00'),
(2, 2, 'Batik Tubo', 'A2', '2024-07-24 17:46:45', '2024-07-28 12:14:16'),
(3, 3, 'Batik Kalumpang', 'A3', '2024-07-24 17:47:19', '2024-07-28 12:14:22'),
(4, 4, 'Batik Kalumata', 'A4', '2024-07-24 17:51:57', '2024-07-28 12:14:28'),
(5, 5, 'Batik Moya', 'A5', '2024-07-24 17:52:29', '2024-07-28 12:14:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_produk_wp`
--

CREATE TABLE `bobot_produk_wp` (
  `id_produk` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `bobot_kriteria_wp` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmail.com|127.0.0.1', 'i:1;', 1721726368),
('admin@gmail.com|127.0.0.1:timer', 'i:1721726368;', 1721726368);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_penilaian`
--

CREATE TABLE `kriteria_penilaian` (
  `id_kriteria` int NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot_kriteria` decimal(5,2) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bobot_kepentingan` decimal(5,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kriteria_penilaian`
--

INSERT INTO `kriteria_penilaian` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `kode`, `jenis`, `created_at`, `updated_at`, `bobot_kepentingan`) VALUES
(1, 'Kualitas kain', 4.00, 'C1', 'Benefit', '2024-07-18 17:39:08', '2024-07-18 17:42:40', 0.167),
(2, 'Harga', 5.00, 'C2', 'Cost', '2024-07-18 17:40:40', '2024-07-18 17:43:05', 0.208),
(3, 'Warna', 3.00, 'C3', 'Benefit', '2024-07-18 18:22:19', '2024-07-18 18:22:19', 0.125),
(4, 'Teknik Pembuatan', 4.00, 'C4', 'Benefit', '2024-07-18 18:22:57', '2024-07-18 18:22:57', 0.167),
(5, 'Desain Motif', 5.00, 'C5', 'Benefit', '2024-07-18 18:23:55', '2024-07-24 18:45:06', 0.208),
(6, 'Keaslian dan Asal Batik', 3.00, 'C6', 'Benefit', '2024-07-18 18:24:26', '2024-07-24 05:54:00', 0.125);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_batik`
--

CREATE TABLE `produk_batik` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `kualitas_kain` varchar(255) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `teknik_pembuatan` varchar(255) DEFAULT NULL,
  `desain_motif` varchar(255) DEFAULT NULL,
  `keaslian` varchar(255) DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `produk_batik`
--

INSERT INTO `produk_batik` (`id_produk`, `nama_produk`, `harga`, `kualitas_kain`, `warna`, `teknik_pembuatan`, `desain_motif`, `keaslian`, `asal`, `created_at`, `updated_at`) VALUES
(1, 'Batik Sasa', '5', '5', '4', '5', '3', '5', NULL, '2024-07-24 17:45:55', '2024-07-28 03:23:03'),
(2, 'Batik Tubo', '5', '5', '5', '4', '3', '5', NULL, '2024-07-24 17:46:45', '2024-07-24 17:46:45'),
(3, 'Batik Kalumpang', '5', '5', '4', '5', '5', '4', NULL, '2024-07-24 17:47:19', '2024-07-24 17:51:06'),
(4, 'Batik Kalumata', '5', '5', '4', '5', '5', '3', NULL, '2024-07-24 17:51:57', '2024-07-24 17:51:57'),
(5, 'Batik Moya Ternate', '5', '4', '5', '5', '5', '4', NULL, '2024-07-24 17:52:29', '2024-07-24 19:30:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('V2EMBVorjQiCJ0gsU7VRDp2R5bY3UpvCbyIrGnJr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUh3T01ZTE9ObkRTQXFLNVh3QVFKSEhEQkxKYzlqSFlFRWRmTzVPZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1722231622);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ari', 'aritaha@unkhair.ac.id', NULL, '$2y$12$69zvUgp4KMxypbbD.pjZiuDYudl0Clq2KYqVMNEx0WKW9qVOt/Lle', NULL, '2024-07-23 00:19:52', '2024-07-23 00:19:52'),
(2, 'timurtech', 'asfdsfdsb@gmail.com', NULL, '$2y$12$kAcPNBRVnHbkKLOYyFndqueGI50nySX2mtUY223OeQjGfmCSADI8i', NULL, '2024-07-28 20:35:13', '2024-07-28 20:35:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `fk_produk` (`id_produk`);

--
-- Indeks untuk tabel `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `produk_batik`
--
ALTER TABLE `produk_batik`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kriteria_penilaian`
--
ALTER TABLE `kriteria_penilaian`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk_batik`
--
ALTER TABLE `produk_batik`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `produk_batik` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk_batik` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
