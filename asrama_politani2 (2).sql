-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2023 pada 10.11
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

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
-- Struktur dari tabel `aduans`
--

CREATE TABLE `aduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_aduan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `isi_aduan` varchar(255) DEFAULT NULL,
  `foto_aduan` varchar(255) DEFAULT NULL,
  `status` enum('belum dibaca','sudah dibaca') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aduans`
--

INSERT INTO `aduans` (`id`, `user_id`, `jenis_aduan_id`, `isi_aduan`, `foto_aduan`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 2, 'kunci jendala kamar rusak\nkunci,jendala kamar rusak\n\n\nkunci jendala kamar rusak\nkunci jendala kamar rusak, kunci jendala kamar rusak\nkunci jendala kamar rusak', '1691299855_boy-36727__480.png', 'sudah dibaca', '2023-08-05 21:30:55', '2023-08-06 04:20:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_users`
--

CREATE TABLE `data_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `program_studi` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `foto_wajah` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_users`
--

INSERT INTO `data_users` (`id`, `user_id`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nim`, `program_studi`, `agama`, `asal_sekolah`, `alamat`, `no_hp`, `status_pembayaran`, `foto_wajah`, `foto_ktp`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1691239590_rm.2.jpeg', NULL, '2023-08-05 04:46:30', '2023-08-05 05:03:25'),
(2, 6, 'Lia', 'Perempuan', 'samarinda', '2023-10-05', 'H191600501', 'pp', 'KATOLIK', 'smk 5 berau', 'Jl.Tepian', '08333364314821', 'Kip Kuliah', '1691241070_1691159455_download (3)_mr1556964864391.jpg', '1691241070_1691024684_child-2480291__480.png', '2023-08-05 05:11:10', '2023-08-05 05:11:10'),
(3, 8, 'Fretty', 'Perempuan', 'Medan', '2001-10-08', 'D1976391745', 'THP', 'kristen', 'SMA 6', 'jl.buah', '0844552545875', 'Mandiri', '1691974694_army.jpg', '1691974694_butter.jpg', '2023-08-13 16:58:14', '2023-08-13 16:58:14'),
(4, 10, 'arika rusli', 'Perempuan', 'samarinda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1692199143_koceng.jpg', '1692199143_koceng.jpg', '2023-08-16 07:05:11', '2023-08-16 07:19:13'),
(5, 5, 'Natalia 2x', 'Perempuan', 'samarinda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1692199253_a.jpg', '1692199253_a.jpg', '2023-08-16 07:20:53', '2023-08-16 07:21:06'),
(6, 12, 'sfsafs2', 'Laki-laki', 'ffsefesfves', '2001-01-01', 'oxford2', 'oxford2', 'oxford2', 'oxford2', 'oxfordddd', '3454362', 'oxford2', '1692256244_koceng.jpg', '1692256244_koceng.jpg', '2023-08-16 23:10:44', '2023-08-16 23:13:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penjelasan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeris`
--

INSERT INTO `galeris` (`id`, `foto`, `created_at`, `updated_at`, `penjelasan`) VALUES
(1, '1691242236_asrama.jpeg', '2023-08-05 05:30:36', '2023-08-05 05:30:36', NULL),
(2, '1692191783_a.jpg', '2023-08-16 05:10:55', '2023-08-16 05:16:23', 'meoong asramaaax');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_pembayarans`
--

CREATE TABLE `harga_pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `harga_pembayarans`
--

INSERT INTO `harga_pembayarans` (`id`, `nominal_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 500000, '2023-08-05 05:26:29', '2023-08-16 23:24:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infromasis`
--

CREATE TABLE `infromasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `infromasis`
--

INSERT INTO `infromasis` (`id`, `judul`, `isi`, `tanggal`, `jam`, `penulis`, `status`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Pembayaran', 'Diingatkan kembali untuk bayar asrama yaa, yang tidak bayar akan berurusan sama pihak kemahasiswaan', '2023-08-05', '21:05:06', 'admin', '1', '1691240804_loogbook.docx', '2023-08-05 05:06:44', '2023-08-05 05:06:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_aduans`
--

CREATE TABLE `jenis_aduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_aduan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_aduans`
--

INSERT INTO `jenis_aduans` (`id`, `nama_aduan`, `created_at`, `updated_at`) VALUES
(1, 'atap', '2023-08-05 04:10:55', '2023-08-05 04:10:55'),
(2, 'Bangunan', '2023-08-05 04:38:29', '2023-08-05 04:38:29'),
(3, 'lingkungan', '2023-08-06 04:07:26', '2023-08-06 04:07:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamars`
--

CREATE TABLE `kamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_kamar` varchar(255) NOT NULL,
  `bagian_kamar` enum('atas','bawah') NOT NULL,
  `tipe_kamar` enum('laki-laki','perempuan') NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kamars`
--

INSERT INTO `kamars` (`id`, `nomor_kamar`, `bagian_kamar`, `tipe_kamar`, `status`, `created_at`, `updated_at`, `kapasitas`) VALUES
(2, '1', 'atas', 'perempuan', 'Kurang 1', '2023-08-05 04:32:52', '2023-08-16 06:52:00', 3),
(5, '3', 'atas', 'perempuan', 'Kosong', '2023-08-05 04:33:29', '2023-08-15 08:24:24', 3),
(6, '4', 'bawah', 'perempuan', 'Kurang 2', '2023-08-05 04:34:09', '2023-08-17 00:11:13', 3),
(7, '5', 'bawah', 'perempuan', 'Kosong', '2023-08-05 04:34:41', '2023-08-05 04:34:41', 4),
(8, '10', 'bawah', 'perempuan', 'Kosong', '2023-08-13 16:52:02', '2023-08-13 16:52:02', 5),
(9, '9', 'atas', 'laki-laki', 'Kosong', '2023-08-15 07:06:56', '2023-08-15 07:14:55', 7),
(10, '8', 'bawah', 'laki-laki', 'Kurang 5', '2023-08-15 07:53:13', '2023-08-15 08:23:32', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\kamar', 10, '267fe8bf-e93a-4fde-8f74-9bbab16113d4', 'gambar_kamar', 'Screenshot_2023-03-26-08-47-41-83-removebg-preview', 'Screenshot_2023-03-26-08-47-41-83-removebg-preview.png', 'image/png', 'public', 'public', 267854, '[]', '[]', '[]', '[]', 1, '2023-08-15 08:23:00', '2023-08-15 08:23:00'),
(3, 'App\\Models\\kamar', 2, '29580ab1-882c-4fae-b5fd-bfb340d0fe24', 'gambar_kamar', 'a', 'a.jpg', 'image/jpeg', 'public', 'public', 31994, '[]', '[]', '[]', '[]', 1, '2023-08-16 06:52:43', '2023-08-16 06:52:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
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
(13, '2023_08_01_095903_create_galeris_table', 1),
(14, '2023_08_15_152236_create_media_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kamar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `kamar_id`, `user_id`, `tanggal`, `tahun`, `bukti`, `nominal`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 6, '2023-08-05', 2023, '1691242095.jpg', 100000, 'konfirmasi', '2023-08-05 05:28:15', '2023-08-05 05:30:06'),
(2, NULL, 6, '2023-09-05', 2023, '1691242155.png', 100000, 'konfirmasi', '2023-08-05 05:29:15', '2023-08-08 19:53:51'),
(3, 5, 8, '2023-08-14', 2023, '1691974725.jpg', 200000, 'konfirmasi', '2023-08-13 16:58:45', '2023-08-13 17:00:43'),
(4, 2, 6, '2023-08-17', 2023, '1692256850.jpg', 100000, 'konfirmasi', '2023-08-16 23:20:50', '2023-08-16 23:21:08'),
(5, 2, 6, '2023-08-17', 2023, '1692257092.jpg', 500000, 'konfirmasi', '2023-08-16 23:24:52', '2023-08-16 23:25:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni_kamars`
--

CREATE TABLE `penghuni_kamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kamar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penghuni_kamars`
--

INSERT INTO `penghuni_kamars` (`id`, `user_id`, `kamar_id`, `created_at`, `updated_at`) VALUES
(3, 6, 2, '2023-08-05 04:37:09', '2023-08-05 04:37:09'),
(5, 9, 6, '2023-08-13 20:29:31', '2023-08-13 20:29:31'),
(7, 10, 10, '2023-08-16 06:23:45', '2023-08-16 06:23:45'),
(8, 6, 2, '2023-08-16 06:52:22', '2023-08-16 06:52:22'),
(9, 11, 10, '2023-08-16 23:33:14', '2023-08-16 23:33:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','admin1','admin2','pengawas') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$Zh3Yd21IxpiL7DTXiTyi9esT4szoIoxj5kFWf7887YYrgPYbDQvZu', 'admin1', NULL, '2023-08-01 07:41:15', '2023-08-01 07:41:15'),
(3, 'pengawas', 'pengawas', '$2y$10$zLKUwMK/nQlFaF5skfCjA.Eh6YiyctsOQ78MfFsled2MSUft7T1s.', 'pengawas', NULL, '2023-08-01 07:41:15', '2023-08-01 07:41:15'),
(5, 'Natalia', 'natal', '$2y$10$tCLkWC7lGcl09T6LEzrKB.cqotUwvQlHA42xi.OAdWK9zse21b196', 'mahasiswa', NULL, '2023-08-05 04:05:10', '2023-08-05 04:05:10'),
(6, 'Lia', 'liacantik', '$2y$10$wj3O/UrjFmaXR5cPqdVTy.BIg4JBXwRpwwq4qmHMeaTVeU/Dz.9x2', 'mahasiswa', NULL, '2023-08-05 04:35:32', '2023-08-05 04:35:32'),
(7, 'Ririn Tinambunan', 'ririn', '$2y$10$eYJe0DyAne7t0kqqdlSlneAev.5o3a1A5m44KX/yJIwNbF0Ubhtmy', 'mahasiswa', NULL, '2023-08-05 04:36:08', '2023-08-05 04:36:08'),
(8, 'fretty', 'fretty', '$2y$10$6YdbeNXn9B8QBDRN7vjAKemrHtUzRbUuWxjd1m07.4gjsgXLhH5NO', 'mahasiswa', NULL, '2023-08-13 16:53:07', '2023-08-13 16:53:07'),
(9, 'Yani', 'yaani', '$2y$10$MSbUErEv7pni/1.DgrSNRO0uG4Lv2YbiEwa3YPIrX4FWFNCc4hX4i', 'mahasiswa', NULL, '2023-08-13 20:27:42', '2023-08-13 20:27:42'),
(10, 'arikax', 'arika', '$2y$10$AG2EtkPMJidGCtsSjtcMbeY56Z7Djv4oHCvE8KE5SruFFJChpiUQi', 'mahasiswa', NULL, '2023-08-13 20:33:37', '2023-08-13 20:33:37'),
(11, 'koir', 'koirherianto', '$2y$10$Vdm10P.TBjvbQSiNM0hbjurbF4VgOUquiis6a8weWhcpNOrOzyG1G', 'mahasiswa', NULL, '2023-08-16 07:53:17', '2023-08-16 07:53:17'),
(12, 'isran noor', 'isrannoor', '$2y$10$9rL0fHM5uzyu4rY2igNW..tZWok5n50Lgkv7E78gm0IzONY1jF6wm', 'mahasiswa', NULL, '2023-08-16 22:35:35', '2023-08-16 22:35:35');

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
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_users`
--
ALTER TABLE `data_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `harga_pembayarans`
--
ALTER TABLE `harga_pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `infromasis`
--
ALTER TABLE `infromasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_aduans`
--
ALTER TABLE `jenis_aduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penghuni_kamars`
--
ALTER TABLE `penghuni_kamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
