-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Agu 2023 pada 14.43
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_asrama_politani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduans`
--

CREATE TABLE `aduans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `jenis_aduan_id` bigint UNSIGNED DEFAULT NULL,
  `isi_aduan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_aduan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum dibaca','sudah dibaca') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_users`
--

CREATE TABLE `data_users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_wajah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_pembayarans`
--

CREATE TABLE `harga_pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `nominal_pembayaran` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `infromasis`
--

CREATE TABLE `infromasis` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_aduans`
--

CREATE TABLE `jenis_aduans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_aduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamars`
--

CREATE TABLE `kamars` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian_kamar` enum('atas','bawah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kamar` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_08_053259_create_data_users_table', 1),
(6, '2023_06_09_040547_create_jenis_aduans_table', 1),
(7, '2023_06_09_050640_create_aduans_table', 1),
(8, '2023_06_09_112416_create_kamars_table', 1),
(9, '2023_06_09_134207_create_penghuni_kamars_table', 1),
(10, '2023_06_14_041725_create_infromasis_table', 1),
(11, '2023_06_14_062748_create_harga_pembayarans_table', 1),
(12, '2023_06_14_063040_create_pembayarans_table', 1),
(13, '2023_08_01_095903_create_galeris_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `kamar_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tahun` year NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni_kamars`
--

CREATE TABLE `penghuni_kamars` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `kamar_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('mahasiswa','admin1','admin2','pengawas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$Zh3Yd21IxpiL7DTXiTyi9esT4szoIoxj5kFWf7887YYrgPYbDQvZu', 'admin1', NULL, '2023-08-01 07:41:15', '2023-08-01 07:41:15'),
(2, 'admin2', 'admin2', '$2y$10$n7nKvqNiZgxvo8LPqiSmzeE.x08BnY/EwgcuPqBws14DQRyXcxfO2', 'admin2', NULL, '2023-08-01 07:41:15', '2023-08-01 07:41:15'),
(3, 'pengawas', 'pengawas', '$2y$10$zLKUwMK/nQlFaF5skfCjA.Eh6YiyctsOQ78MfFsled2MSUft7T1s.', 'pengawas', NULL, '2023-08-01 07:41:15', '2023-08-01 07:41:15'),
(4, 'mahasiswa', 'mahasiswa', '$2y$10$Ken8C58Sdq3pCjJ9YTXFi.tDVes.DtsoOqnFnFW5EI/f2WS/7aWDu', 'mahasiswa', NULL, '2023-08-01 07:41:15', '2023-08-01 07:41:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aduans`
--
ALTER TABLE `aduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aduans_user_id_foreign` (`user_id`),
  ADD KEY `aduans_jenis_aduan_id_foreign` (`jenis_aduan_id`);

--
-- Indeks untuk tabel `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_users_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `harga_pembayarans`
--
ALTER TABLE `harga_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infromasis`
--
ALTER TABLE `infromasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_aduans`
--
ALTER TABLE `jenis_aduans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamars`
--
ALTER TABLE `kamars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_kamar_id_foreign` (`kamar_id`),
  ADD KEY `pembayarans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `penghuni_kamars`
--
ALTER TABLE `penghuni_kamars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penghuni_kamars_user_id_foreign` (`user_id`),
  ADD KEY `penghuni_kamars_kamar_id_foreign` (`kamar_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aduans`
--
ALTER TABLE `aduans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_users`
--
ALTER TABLE `data_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `harga_pembayarans`
--
ALTER TABLE `harga_pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `infromasis`
--
ALTER TABLE `infromasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_aduans`
--
ALTER TABLE `jenis_aduans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penghuni_kamars`
--
ALTER TABLE `penghuni_kamars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aduans`
--
ALTER TABLE `aduans`
  ADD CONSTRAINT `aduans_jenis_aduan_id_foreign` FOREIGN KEY (`jenis_aduan_id`) REFERENCES `jenis_aduans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `aduans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `data_users`
--
ALTER TABLE `data_users`
  ADD CONSTRAINT `data_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `kamars` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pembayarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `penghuni_kamars`
--
ALTER TABLE `penghuni_kamars`
  ADD CONSTRAINT `penghuni_kamars_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `kamars` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penghuni_kamars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
