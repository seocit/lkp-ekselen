-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2025 at 10:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekselen_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya_spps`
--

CREATE TABLE `biaya_spps` (
  `id` char(36) NOT NULL,
  `id_kelas` char(36) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswas`
--

CREATE TABLE `calon_siswas` (
  `id` char(36) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_wa` varchar(14) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `nama_ortu` varchar(30) DEFAULT NULL,
  `pekerjaan_ortu` varchar(255) DEFAULT NULL,
  `id_kelas` char(36) NOT NULL,
  `id_session` char(36) NOT NULL,
  `id_jadwal` char(36) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_siswas`
--

CREATE TABLE `data_siswas` (
  `id` char(36) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_wa` varchar(14) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `pekerjaan_ortu` varchar(255) NOT NULL,
  `id_kelas` char(36) NOT NULL,
  `id_session` char(36) NOT NULL,
  `id_jadwal` char(36) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kelas`
--

CREATE TABLE `kategori_kelas` (
  `id` char(36) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_kelas`
--

INSERT INTO `kategori_kelas` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
('65897bdb-50d2-11f0-9e32-047c1637aa45', '1 Semester', NULL, NULL),
('745c052b-50d2-11f0-9e32-047c1637aa45', '1 Tahun', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_programs`
--

CREATE TABLE `kelas_programs` (
  `id` char(36) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `biaya_pendaftaran` int(11) NOT NULL,
  `id_program` char(36) NOT NULL,
  `id_kategori` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_programs`
--

INSERT INTO `kelas_programs` (`id`, `nama_kelas`, `biaya_pendaftaran`, `id_program`, `id_kategori`, `created_at`, `updated_at`) VALUES
('f0a39198-50d3-11f0-9e32-047c1637aa45', 'Primary', 550000, '6c748362-50d1-11f0-9e32-047c1637aa45', NULL, NULL, NULL),
('f0a39c19-50d3-11f0-9e32-047c1637aa45', 'Elementary', 550000, '6c748362-50d1-11f0-9e32-047c1637aa45', NULL, NULL, NULL),
('f0a3a8ac-50d3-11f0-9e32-047c1637aa45', 'Intermediate', 600000, '6c748362-50d1-11f0-9e32-047c1637aa45', NULL, NULL, NULL),
('f0a3b468-50d3-11f0-9e32-047c1637aa45', 'Advance', 600000, '6c748362-50d1-11f0-9e32-047c1637aa45', NULL, NULL, NULL),
('f0a3bf90-50d3-11f0-9e32-047c1637aa45', 'Kelas 4', 1800000, '73d55fc9-50d1-11f0-9e32-047c1637aa45', '65897bdb-50d2-11f0-9e32-047c1637aa45', NULL, NULL),
('f0a3cc5a-50d3-11f0-9e32-047c1637aa45', 'Kelas 4', 3100000, '73d55fc9-50d1-11f0-9e32-047c1637aa45', '745c052b-50d2-11f0-9e32-047c1637aa45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id` char(36) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `id_kelas` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_10_163343_create_program_pelatihans_table', 1),
(5, '2025_06_10_163509_create_kategori_kelas_table', 1),
(6, '2025_06_10_163510_create_kelas_programs_table', 1),
(7, '2025_06_10_163721_create_materis_table', 1),
(8, '2025_06_11_021040_create_pengumumans_table', 1),
(9, '2025_06_12_023928_create_pilihan_sessions_table', 1),
(10, '2025_06_12_024355_create_pilihan_jadwals_table', 1),
(11, '2025_06_12_174201_create_data_siswas_table', 1),
(12, '2025_06_16_025338_create_calon_siswas_table', 1),
(13, '2025_06_22_091519_create_pembayaran_transfers_table', 1),
(14, '2025_06_22_162007_create_biaya_spps_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_transfers`
--

CREATE TABLE `pembayaran_transfers` (
  `id` char(36) NOT NULL,
  `tipe_pembayaran` enum('pendaftaran','spp') NOT NULL,
  `id_refrensi` char(36) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nominal` decimal(12,2) NOT NULL,
  `status_verifikasi` enum('pending','diterima','ditolak') NOT NULL DEFAULT 'pending',
  `catatan_admin` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumumans`
--

CREATE TABLE `pengumumans` (
  `id` char(36) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_jadwals`
--

CREATE TABLE `pilihan_jadwals` (
  `id` char(36) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pilihan_jadwals`
--

INSERT INTO `pilihan_jadwals` (`id`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
('e3084cc6-50d1-11f0-9e32-047c1637aa45', 'SRJ', 'Senin-Rabu-Jumat', NULL, NULL),
('e3085559-50d1-11f0-9e32-047c1637aa45', 'SKS', 'Selasa-Kamis-Sabtu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_sessions`
--

CREATE TABLE `pilihan_sessions` (
  `id` char(36) NOT NULL,
  `label` varchar(20) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pilihan_sessions`
--

INSERT INTO `pilihan_sessions` (`id`, `label`, `jam`, `created_at`, `updated_at`) VALUES
('c106ed01-50d1-11f0-9e32-047c1637aa45', 'Sesi 1', '14.00-15.00', NULL, NULL),
('c106f7c8-50d1-11f0-9e32-047c1637aa45', 'Sesi 2', '15.30-16.20', NULL, NULL),
('c106ff95-50d1-11f0-9e32-047c1637aa45', 'Sesi 3', '16.30-18.00', NULL, NULL),
('c107077c-50d1-11f0-9e32-047c1637aa45', 'Sesi 4', '19.00-20.30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_pelatihans`
--

CREATE TABLE `program_pelatihans` (
  `id` char(36) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_pelatihans`
--

INSERT INTO `program_pelatihans` (`id`, `nama_program`, `created_at`, `updated_at`) VALUES
('6c748362-50d1-11f0-9e32-047c1637aa45', 'English', NULL, NULL),
('73d55fc9-50d1-11f0-9e32-047c1637aa45', 'MIPA', NULL, NULL),
('8b78b13d-50d1-11f0-9e32-047c1637aa45', 'Komputer', NULL, NULL),
('8b78be32-50d1-11f0-9e32-047c1637aa45', 'TOEFL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VSnybCRffvmaK9El27Zi2YYqlNvhUJvO5FF6UshQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnJaN1gzWlB6WFVzN0RHYWxzTnp1V0dhd2F1Tzg3QmZxMlpKa1NwTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1750751934);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya_spps`
--
ALTER TABLE `biaya_spps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biaya_spps_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `calon_siswas`
--
ALTER TABLE `calon_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calon_siswas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `calon_siswas_id_session_foreign` (`id_session`),
  ADD KEY `calon_siswas_id_jadwal_foreign` (`id_jadwal`);

--
-- Indexes for table `data_siswas`
--
ALTER TABLE `data_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_siswas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `data_siswas_id_session_foreign` (`id_session`),
  ADD KEY `data_siswas_id_jadwal_foreign` (`id_jadwal`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_programs`
--
ALTER TABLE `kelas_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_programs_id_program_foreign` (`id_program`),
  ADD KEY `kelas_programs_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materis_id_kelas_foreign` (`id_kelas`);

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
-- Indexes for table `pembayaran_transfers`
--
ALTER TABLE `pembayaran_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumumans`
--
ALTER TABLE `pengumumans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilihan_jadwals`
--
ALTER TABLE `pilihan_jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilihan_sessions`
--
ALTER TABLE `pilihan_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_pelatihans`
--
ALTER TABLE `program_pelatihans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biaya_spps`
--
ALTER TABLE `biaya_spps`
  ADD CONSTRAINT `biaya_spps_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas_programs` (`id`);

--
-- Constraints for table `calon_siswas`
--
ALTER TABLE `calon_siswas`
  ADD CONSTRAINT `calon_siswas_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `pilihan_jadwals` (`id`),
  ADD CONSTRAINT `calon_siswas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas_programs` (`id`),
  ADD CONSTRAINT `calon_siswas_id_session_foreign` FOREIGN KEY (`id_session`) REFERENCES `pilihan_sessions` (`id`);

--
-- Constraints for table `data_siswas`
--
ALTER TABLE `data_siswas`
  ADD CONSTRAINT `data_siswas_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `pilihan_jadwals` (`id`),
  ADD CONSTRAINT `data_siswas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas_programs` (`id`),
  ADD CONSTRAINT `data_siswas_id_session_foreign` FOREIGN KEY (`id_session`) REFERENCES `pilihan_sessions` (`id`);

--
-- Constraints for table `kelas_programs`
--
ALTER TABLE `kelas_programs`
  ADD CONSTRAINT `kelas_programs_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_kelas` (`id`),
  ADD CONSTRAINT `kelas_programs_id_program_foreign` FOREIGN KEY (`id_program`) REFERENCES `program_pelatihans` (`id`);

--
-- Constraints for table `materis`
--
ALTER TABLE `materis`
  ADD CONSTRAINT `materis_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas_programs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
