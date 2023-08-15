-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2023 at 04:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asrama_politani2`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduans`
--

CREATE TABLE `aduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_aduan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `isi_aduan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_aduan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum dibaca','sudah dibaca') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aduans`
--

INSERT INTO `aduans` (`id`, `user_id`, `jenis_aduan_id`, `isi_aduan`, `foto_aduan`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 2, 'kunci jendala kamar rusak', '1691299855_boy-36727__480.png', 'sudah dibaca', '2023-08-05 21:30:55', '2023-08-06 04:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_users`
--

CREATE TABLE `data_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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

--
-- Dumping data for table `data_users`
--

INSERT INTO `data_users` (`id`, `user_id`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nim`, `program_studi`, `agama`, `asal_sekolah`, `alamat`, `no_hp`, `status_pembayaran`, `foto_wajah`, `foto_ktp`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1691239590_rm.2.jpeg', NULL, '2023-08-05 04:46:30', '2023-08-05 05:03:25'),
(2, 6, 'Lia', 'Perempuan', 'samarinda', '2023-10-05', 'H191600501', 'pp', 'KATOLIK', 'smk 5 berau', 'Jl.Tepian', '08333364314821', 'Kip Kuliah', '1691241070_1691159455_download (3)_mr1556964864391.jpg', '1691241070_1691024684_child-2480291__480.png', '2023-08-05 05:11:10', '2023-08-05 05:11:10'),
(3, 8, 'Fretty', 'Perempuan', 'Medan', '2001-10-08', 'D1976391745', 'THP', 'kristen', 'SMA 6', 'jl.buah', '0844552545875', 'Mandiri', '1691974694_army.jpg', '1691974694_butter.jpg', '2023-08-13 16:58:14', '2023-08-13 16:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeris`
--

INSERT INTO `galeris` (`id`, `foto`, `created_at`, `updated_at`) VALUES
(1, '1691242236_asrama.jpeg', '2023-08-05 05:30:36', '2023-08-05 05:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `harga_pembayarans`
--

CREATE TABLE `harga_pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `harga_pembayarans`
--

INSERT INTO `harga_pembayarans` (`id`, `nominal_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 100000, '2023-08-05 05:26:29', '2023-08-13 20:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `infromasis`
--

CREATE TABLE `infromasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `infromasis`
--

INSERT INTO `infromasis` (`id`, `judul`, `isi`, `tanggal`, `jam`, `penulis`, `status`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Pembayaran', 'Diingatkan kembali untuk bayar asrama yaa, yang tidak bayar akan berurusan sama pihak kemahasiswaan', '2023-08-05', '21:05:06', 'admin', '1', '1691240804_loogbook.docx', '2023-08-05 05:06:44', '2023-08-05 05:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aduans`
--

CREATE TABLE `jenis_aduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_aduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_aduans`
--

INSERT INTO `jenis_aduans` (`id`, `nama_aduan`, `created_at`, `updated_at`) VALUES
(1, 'atap', '2023-08-05 04:10:55', '2023-08-05 04:10:55'),
(2, 'Bangunan', '2023-08-05 04:38:29', '2023-08-05 04:38:29'),
(3, 'lingkungan', '2023-08-06 04:07:26', '2023-08-06 04:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `kamars`
--

CREATE TABLE `kamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian_kamar` enum('atas','bawah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kamar` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamars`
--

INSERT INTO `kamars` (`id`, `nomor_kamar`, `bagian_kamar`, `tipe_kamar`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', 'atas', 'perempuan', 'penuh', '2023-08-05 04:32:52', '2023-08-05 04:34:24'),
(4, '2', 'atas', 'perempuan', 'kurang 1', '2023-08-05 04:33:13', '2023-08-05 04:33:13'),
(5, '3', 'atas', 'perempuan', 'kurang 1', '2023-08-05 04:33:29', '2023-08-05 04:33:29'),
(6, '4', 'bawah', 'perempuan', 'kurang 1', '2023-08-05 04:34:09', '2023-08-05 04:34:09'),
(7, '5', 'bawah', 'perempuan', 'kosong', '2023-08-05 04:34:41', '2023-08-05 04:34:41'),
(8, '10', 'bawah', 'perempuan', 'kosong', '2023-08-13 16:52:02', '2023-08-13 16:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kamar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `kamar_id`, `user_id`, `tanggal`, `tahun`, `bukti`, `nominal`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 6, '2023-08-05', 2023, '1691242095.jpg', 100000, 'konfirmasi', '2023-08-05 05:28:15', '2023-08-05 05:30:06'),
(2, 4, 6, '2023-09-05', 2023, '1691242155.png', 100000, 'konfirmasi', '2023-08-05 05:29:15', '2023-08-08 19:53:51'),
(3, 5, 8, '2023-08-14', 2023, '1691974725.jpg', 200000, 'konfirmasi', '2023-08-13 16:58:45', '2023-08-13 17:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `penghuni_kamars`
--

CREATE TABLE `penghuni_kamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kamar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penghuni_kamars`
--

INSERT INTO `penghuni_kamars` (`id`, `user_id`, `kamar_id`, `created_at`, `updated_at`) VALUES
(1, 5, 2, '2023-08-05 04:35:00', '2023-08-05 04:35:00'),
(2, 7, 2, '2023-08-05 04:36:39', '2023-08-05 04:36:39'),
(3, 6, 4, '2023-08-05 04:37:09', '2023-08-05 04:37:09'),
(4, 8, 5, '2023-08-13 16:53:28', '2023-08-13 16:53:28'),
(5, 9, 6, '2023-08-13 20:29:31', '2023-08-13 20:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('mahasiswa','admin1','admin2','pengawas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$Zh3Yd21IxpiL7DTXiTyi9esT4szoIoxj5kFWf7887YYrgPYbDQvZu', 'admin1', NULL, '2023-08-01 07:41:15', '2023-08-01 07:41:15'),
(3, 'pengawas', 'pengawas', '$2y$10$zLKUwMK/nQlFaF5skfCjA.Eh6YiyctsOQ78MfFsled2MSUft7T1s.', 'pengawas', NULL, '2023-08-01 07:41:15', '2023-08-01 07:41:15'),
(5, 'Natalia', 'natal', '$2y$10$tCLkWC7lGcl09T6LEzrKB.cqotUwvQlHA42xi.OAdWK9zse21b196', 'mahasiswa', NULL, '2023-08-05 04:05:10', '2023-08-05 04:05:10'),
(6, 'Lia', 'liacantik', '$2y$10$wj3O/UrjFmaXR5cPqdVTy.BIg4JBXwRpwwq4qmHMeaTVeU/Dz.9x2', 'mahasiswa', NULL, '2023-08-05 04:35:32', '2023-08-05 04:35:32'),
(7, 'Ririn Tinambunan', 'ririn', '$2y$10$eYJe0DyAne7t0kqqdlSlneAev.5o3a1A5m44KX/yJIwNbF0Ubhtmy', 'mahasiswa', NULL, '2023-08-05 04:36:08', '2023-08-05 04:36:08'),
(8, 'fretty', 'fretty', '$2y$10$6YdbeNXn9B8QBDRN7vjAKemrHtUzRbUuWxjd1m07.4gjsgXLhH5NO', 'mahasiswa', NULL, '2023-08-13 16:53:07', '2023-08-13 16:53:07'),
(9, 'Yani', 'yaani', '$2y$10$MSbUErEv7pni/1.DgrSNRO0uG4Lv2YbiEwa3YPIrX4FWFNCc4hX4i', 'mahasiswa', NULL, '2023-08-13 20:27:42', '2023-08-13 20:27:42'),
(10, 'arika', 'arika', '$2y$10$AG2EtkPMJidGCtsSjtcMbeY56Z7Djv4oHCvE8KE5SruFFJChpiUQi', 'mahasiswa', NULL, '2023-08-13 20:33:37', '2023-08-13 20:33:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduans`
--
ALTER TABLE `aduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aduans_user_id_foreign` (`user_id`),
  ADD KEY `aduans_jenis_aduan_id_foreign` (`jenis_aduan_id`);

--
-- Indexes for table `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga_pembayarans`
--
ALTER TABLE `harga_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infromasis`
--
ALTER TABLE `infromasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_aduans`
--
ALTER TABLE `jenis_aduans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamars`
--
ALTER TABLE `kamars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_kamar_id_foreign` (`kamar_id`),
  ADD KEY `pembayarans_user_id_foreign` (`user_id`);

--
-- Indexes for table `penghuni_kamars`
--
ALTER TABLE `penghuni_kamars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penghuni_kamars_user_id_foreign` (`user_id`),
  ADD KEY `penghuni_kamars_kamar_id_foreign` (`kamar_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduans`
--
ALTER TABLE `aduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_users`
--
ALTER TABLE `data_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `harga_pembayarans`
--
ALTER TABLE `harga_pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `infromasis`
--
ALTER TABLE `infromasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_aduans`
--
ALTER TABLE `jenis_aduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penghuni_kamars`
--
ALTER TABLE `penghuni_kamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aduans`
--
ALTER TABLE `aduans`
  ADD CONSTRAINT `aduans_jenis_aduan_id_foreign` FOREIGN KEY (`jenis_aduan_id`) REFERENCES `jenis_aduans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `aduans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `data_users`
--
ALTER TABLE `data_users`
  ADD CONSTRAINT `data_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `kamars` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pembayarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `penghuni_kamars`
--
ALTER TABLE `penghuni_kamars`
  ADD CONSTRAINT `penghuni_kamars_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `kamars` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penghuni_kamars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
