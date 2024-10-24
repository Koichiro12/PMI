-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 01:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_biodata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` text COLLATE utf8mb4_unicode_ci,
  `umur` int NOT NULL DEFAULT '0',
  `tb` int NOT NULL DEFAULT '0',
  `bb` int NOT NULL DEFAULT '0',
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WNI',
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `bahasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indonesia',
  `status_pernikahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_ayah` int NOT NULL DEFAULT '0',
  `umur_ayah` int DEFAULT '0',
  `status_ibu` int NOT NULL DEFAULT '0',
  `umur_ibu` int DEFAULT '0',
  `jumlah_saudara` int DEFAULT '0',
  `kakak_laki_laki` int DEFAULT '0',
  `kakak_perempuan` int DEFAULT '0',
  `adik_laki_laki` int DEFAULT '0',
  `adik_perempuan` int DEFAULT '0',
  `anak_ke` int DEFAULT '1',
  `nama_suami` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `karir_suami` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `jml_anak` int DEFAULT '0',
  `jml_anak_laki_laki` int DEFAULT '0',
  `umur_anak_laki_laki` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_anak_perempuan` int DEFAULT '0',
  `umur_anak_perempuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_in_taiwan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `kode_biodata`, `foto`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `asal`, `umur`, `tb`, `bb`, `agama`, `kewarganegaraan`, `pendidikan`, `bahasa`, `status_pernikahan`, `status_ayah`, `umur_ayah`, `status_ibu`, `umur_ibu`, `jumlah_saudara`, `kakak_laki_laki`, `kakak_perempuan`, `adik_laki_laki`, `adik_perempuan`, `anak_ke`, `nama_suami`, `karir_suami`, `jml_anak`, `jml_anak_laki_laki`, `umur_anak_laki_laki`, `jml_anak_perempuan`, `umur_anak_perempuan`, `family_in_taiwan`, `created_at`, `updated_at`) VALUES
(1, 'AT-002', '2024_Oct_05_07_40_27Picture1.png', NULL, 'Fina', 'Malang', '2000-11-12', 'P', NULL, 24, 178, 78, 'Islam', 'WNI', 'Sekolah Menengah Keatas', 'Indonesia', NULL, 1, 90, 0, NULL, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-10-05 00:40:27', '2024-10-11 21:48:54'),
(2, 'AT-001', '2024_Oct_12_04_51_23Home.png', NULL, 'TESDF', 'Malang', '2000-12-12', 'P', NULL, 24, 176, 80, 'Islam', 'WNI', 'Sekolah Menengah Pertama', 'Indonesia', NULL, 1, 89, 1, 56, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-10-11 21:51:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biodata_answers`
--

CREATE TABLE `biodata_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `questions_id` bigint UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata_answers`
--

INSERT INTO `biodata_answers` (`id`, `biodata_id`, `questions_id`, `answer`, `custom_answer`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '0', 'tester', NULL, NULL),
(6, 1, 2, '0', 'testersdfasdfasdfasasasfsf', NULL, NULL),
(7, 1, 3, '4', '', NULL, NULL),
(8, 1, 4, 'test', '', NULL, NULL),
(9, 2, 1, '1', '', NULL, NULL),
(10, 2, 2, '0', 'tester', NULL, NULL),
(11, 2, 3, '4', '', NULL, NULL),
(12, 2, 4, 'tester', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biodata_experiences`
--

CREATE TABLE `biodata_experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `type_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_pekerjaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata_experiences`
--

INSERT INTO `biodata_experiences` (`id`, `biodata_id`, `type_pekerjaan`, `masa_kerja`, `wilayah_kerja`, `desc_pekerjaan`, `created_at`, `updated_at`) VALUES
(11, 1, 'domestic', '2021 - 2022', 'Malang', 'Membersihkan Rumah dan lain lain', NULL, NULL),
(12, 1, 'overseas', '2022 - 2023', 'Jepang', 'Menjadi Pengantar Paket', NULL, NULL),
(13, 2, 'domestic', '2021', 'Congin', 'kkmdmdkmcmka', NULL, NULL),
(14, 2, 'overseas', '2022', 'assdfa', 'Menjadi Pengantar Paket', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biodata_family_overseas`
--

CREATE TABLE `biodata_family_overseas` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata_family_overseas`
--

INSERT INTO `biodata_family_overseas` (`id`, `biodata_id`, `name`, `relasi`, `lokasi`, `created_at`, `updated_at`) VALUES
(6, 1, 'Chiko', 'Keluarga', 'Conqin', NULL, NULL),
(7, 2, 'Nico', 'Keluarga', 'Chonqing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `file_categories`
--

CREATE TABLE `file_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_files` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_categories`
--

INSERT INTO `file_categories` (`id`, `category_files`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'KTP', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(2, 'KK', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(3, 'Akte Kelahiran', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(4, 'Buku Nikah / Akte Cerai', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(5, 'PK', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(6, 'Paspor', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(7, 'Visa', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_21_021232_create_sessions_table', 1),
(6, '2024_09_21_024219_create_biodatas_table', 1),
(7, '2024_09_22_033804_create_biodata_experiences_table', 1),
(8, '2024_09_22_034407_create_biodata_family_overseas_table', 1),
(9, '2024_09_27_112654_create_p_m_i_s_table', 1),
(10, '2024_10_01_022800_create_file_categories_table', 1),
(11, '2024_10_01_022938_create_p_m_i_files_table', 1),
(12, '2024_10_01_024935_create_payment_categories_table', 1),
(13, '2024_10_03_062632_create_payment_amounts_table', 1),
(14, '2024_10_04_084018_create_payments_table', 1),
(17, '2024_10_07_013947_create_selected_information_table', 2),
(21, '2024_10_11_014537_create_questions_table', 3),
(22, '2024_10_11_014544_create_options_table', 3),
(23, '2024_10_11_014557_create_biodata_answers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `questions_id` bigint UNSIGNED NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `questions_id`, `option_text`, `created_at`, `updated_at`) VALUES
(1, 1, '可以煮豬肉 但是不吃豬肉', NULL, NULL),
(2, 1, '可配合僱主煮和吃豬肉', NULL, NULL),
(3, 2, '怕', NULL, NULL),
(4, 3, '接受', NULL, NULL);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `payment_categories_id` bigint UNSIGNED NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_amounts`
--

CREATE TABLE `payment_amounts` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `payment_categories_id` bigint UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_amounts`
--

INSERT INTO `payment_amounts` (`id`, `biodata_id`, `payment_categories_id`, `amount`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '12000000', '-', NULL, NULL),
(2, 1, 2, '15000000', '-', NULL, NULL),
(3, 1, 3, '18000000', '-', NULL, NULL),
(4, 1, 4, '154000000', '-', NULL, NULL),
(5, 1, 5, '25000000', '-', NULL, NULL),
(6, 1, 6, '54000000', '-', NULL, NULL),
(7, 1, 7, '0', '-', NULL, NULL),
(8, 1, 8, '0', '-', NULL, NULL),
(9, 1, 9, '0', '-', NULL, NULL),
(10, 1, 10, '0', '-', NULL, NULL),
(11, 1, 11, '0', '-', NULL, NULL),
(12, 1, 12, '0', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_categories`
--

CREATE TABLE `payment_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_category_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_categories`
--

INSERT INTO `payment_categories` (`id`, `payment_category`, `payment_category_status`, `created_at`, `updated_at`) VALUES
(1, 'Biaya BLK', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(2, 'Biaya Pendaftaran', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(3, 'Biaya MCU Pra', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(4, 'Marketing', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(5, 'Biaya Job', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(6, 'Biaya id', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(7, 'Pasporan', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(8, 'Medical Full', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(9, 'Biaya Leges', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(10, 'Biaya TETO', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(11, 'Biaya PAP', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59'),
(12, 'Biaya Penerbangan', '1', '2024-10-05 00:38:59', '2024-10-05 00:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `pmi`
--

CREATE TABLE `pmi` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paspor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pk_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pmi`
--

INSERT INTO `pmi` (`id`, `biodata_id`, `nik`, `nama`, `umur`, `jenis_kelamin`, `asal`, `paspor`, `visa`, `pk_number`, `created_at`, `updated_at`) VALUES
(1, 1, '1212415234523', 'Fina', '24', 'P', 'Malang', '1252452242', '452411521', '445221415121411451', '2024-10-05 00:41:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pmi_files`
--

CREATE TABLE `pmi_files` (
  `id` bigint UNSIGNED NOT NULL,
  `pmi_id` bigint UNSIGNED NOT NULL,
  `file_categories_id` bigint UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `type_question` int NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type_question`, `question`, `created_at`, `updated_at`) VALUES
(1, 0, '你是否可以煮 和 吃 煮肉？', '2024-10-11 20:47:56', NULL),
(2, 0, '你是否怕狗 ？', '2024-10-11 20:53:23', NULL),
(3, 0, '你是否接受不休假', '2024-10-11 20:54:01', NULL),
(4, 1, '其它說明', '2024-10-11 20:55:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `selected_information`
--

CREATE TABLE `selected_information` (
  `id` bigint UNSIGNED NOT NULL,
  `job_order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_paspor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tionghoa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_inggris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemberi_kerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekanan_perekrutan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress_staff_asing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_pemasaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luar_negeri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terpilih_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_terpilih_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penempatan_aktual_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penempatan_aktual_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_mulai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_selesai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_seri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penempatan_aktual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diproses` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kembali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dibatalkan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ditempatkan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tampilkan_semua_progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prioritas_dan_ubah_backup_keprioritas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cadangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AsqBQJuS3hJNO7m30rLqUyB8l63jpqd1RugfIxSx', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOWFUZGpxdGJaakJ3RHk0S1kyejNuTzZoVkpvcUduYUNVZkFuMm53ZyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3F1ZXN0aW9ucy8xL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1728709620),
('TyUHjEJXvxdRJPschPGiC8cE6vQqIBBz4t24nWJb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaU5uNmxKY0tHbEUxMVBuV1dzdUlFZ1M4Sm8xZkFTRU96Nk9qa21BYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZW5nZ3VuYS9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1729256052);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Administrator','User') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `foto`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2024_Oct_07_01_36_15pe_logo.jpg', 'Administrator', 'admin', 'admin@admin.com', '2024-10-05 00:38:59', '$2y$12$Fv7.P.4aDRR1dajH7GInROMSFj/DwIqudMaGq8TJZMHupuKrCxMQm', 'Administrator', 'CspOmZ18c4EPp0md0jhpFKar0YPqOUhePLBawNeirkIrP8kot4G5wdP9SpAw', '2024-10-05 00:38:59', '2024-10-06 18:36:15'),
(2, '2024_Oct_07_05_41_41pe_logo.jpg', 'User', 'user', 'user@user.com', NULL, '$2y$12$/VbscVYcnAml8sEQZy.H9Os9FmzTwN9n8Lf32rooLKbcdOKJyK/YK', 'User', 'ZXHTaZ4LAcCPc28BymO33aPIaQQ7SSDmzx6Ux5yraJBqC8SmDmv6aNM9sSOi', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata_answers`
--
ALTER TABLE `biodata_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_answers_biodata_id_foreign` (`biodata_id`),
  ADD KEY `biodata_answers_questions_id_foreign` (`questions_id`);

--
-- Indexes for table `biodata_experiences`
--
ALTER TABLE `biodata_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_experiences_biodata_id_foreign` (`biodata_id`);

--
-- Indexes for table `biodata_family_overseas`
--
ALTER TABLE `biodata_family_overseas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_family_overseas_biodata_id_foreign` (`biodata_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_categories`
--
ALTER TABLE `file_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_questions_id_foreign` (`questions_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_biodata_id_foreign` (`biodata_id`),
  ADD KEY `payments_payment_categories_id_foreign` (`payment_categories_id`);

--
-- Indexes for table `payment_amounts`
--
ALTER TABLE `payment_amounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_amounts_biodata_id_foreign` (`biodata_id`),
  ADD KEY `payment_amounts_payment_categories_id_foreign` (`payment_categories_id`);

--
-- Indexes for table `payment_categories`
--
ALTER TABLE `payment_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pmi`
--
ALTER TABLE `pmi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pmi_biodata_id_foreign` (`biodata_id`);

--
-- Indexes for table `pmi_files`
--
ALTER TABLE `pmi_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pmi_files_file_categories_id_foreign` (`file_categories_id`),
  ADD KEY `pmi_files_pmi_id_foreign` (`pmi_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_information`
--
ALTER TABLE `selected_information`
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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `biodata_answers`
--
ALTER TABLE `biodata_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `biodata_experiences`
--
ALTER TABLE `biodata_experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `biodata_family_overseas`
--
ALTER TABLE `biodata_family_overseas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_categories`
--
ALTER TABLE `file_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_amounts`
--
ALTER TABLE `payment_amounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_categories`
--
ALTER TABLE `payment_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmi`
--
ALTER TABLE `pmi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pmi_files`
--
ALTER TABLE `pmi_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `selected_information`
--
ALTER TABLE `selected_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata_answers`
--
ALTER TABLE `biodata_answers`
  ADD CONSTRAINT `biodata_answers_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biodata_answers_questions_id_foreign` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `biodata_experiences`
--
ALTER TABLE `biodata_experiences`
  ADD CONSTRAINT `biodata_experiences_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `biodata_family_overseas`
--
ALTER TABLE `biodata_family_overseas`
  ADD CONSTRAINT `biodata_family_overseas_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_questions_id_foreign` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_payment_categories_id_foreign` FOREIGN KEY (`payment_categories_id`) REFERENCES `payment_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_amounts`
--
ALTER TABLE `payment_amounts`
  ADD CONSTRAINT `payment_amounts_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_amounts_payment_categories_id_foreign` FOREIGN KEY (`payment_categories_id`) REFERENCES `payment_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pmi`
--
ALTER TABLE `pmi`
  ADD CONSTRAINT `pmi_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pmi_files`
--
ALTER TABLE `pmi_files`
  ADD CONSTRAINT `pmi_files_file_categories_id_foreign` FOREIGN KEY (`file_categories_id`) REFERENCES `file_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pmi_files_pmi_id_foreign` FOREIGN KEY (`pmi_id`) REFERENCES `pmi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
