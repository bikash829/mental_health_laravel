-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 12:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mental_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `zip_code` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `address2`, `zip_code`, `city`, `state`, `country`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mohammadpur', NULL, '1207', 'Dhaka', 'Dhaka', 'Bangladesh', 5, '2023-11-27 12:13:22', '2023-11-27 12:13:22'),
(2, 'Dhanmondi 15', NULL, '1209', 'Dhaka', 'Dhaka', 'Bangladesh', 2, '2023-11-27 15:44:18', '2023-11-27 15:44:18'),
(3, 'asdfasdf', 'asdfasd', 'asdfasdf', 'asdfasdf', 'asdfasfas', 'Australia', 3, '2023-11-28 12:42:06', '2023-11-28 12:42:06'),
(4, '947 White Cowley Court', 'Recusandae Ducimus', '52861', 'Nostrud omnis ea adi', 'Enim dolor omnis ut', 'Singapore', 4, '2023-11-28 12:46:34', '2023-11-28 12:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `biological_infos`
--

CREATE TABLE `biological_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `height` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `10` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `group`, `created_at`, `updated_at`) VALUES
(1, 'A+', '2023-11-27 11:25:05', NULL),
(2, 'A-', '2023-11-27 11:25:05', NULL),
(3, 'B+', '2023-11-27 11:25:05', NULL),
(4, 'B-', '2023-11-27 11:25:05', NULL),
(5, 'AB+', '2023-11-27 11:25:05', NULL),
(6, 'AB-', '2023-11-27 11:25:05', NULL),
(7, 'O+', '2023-11-27 11:25:05', NULL),
(8, 'O-', '2023-11-27 11:25:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Bikash', 'Chowdhury', 'chowdhurybikash@email.com', 'Hello, How can i book an appointment?', '2023-11-27 11:45:10', '2023-11-27 11:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `counselor_sessions`
--

CREATE TABLE `counselor_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recorded_session` varchar(255) NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `counselor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselor_session_chats`
--

CREATE TABLE `counselor_session_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `text_message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselor_session_feedback`
--

CREATE TABLE `counselor_session_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `counselor_id` bigint(20) UNSIGNED NOT NULL,
  `counselor_session_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num_code` varchar(255) NOT NULL,
  `alpha_2_code` varchar(255) NOT NULL,
  `alpha_3_code` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointments`
--

CREATE TABLE `doctor_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_schedule_id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `fee` double(8,2) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `address` varchar(255) NOT NULL,
  `patient_problem` varchar(255) DEFAULT NULL,
  `appointment_rating` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_appointments`
--

INSERT INTO `doctor_appointments` (`id`, `patient_id`, `doctor_id`, `doctor_schedule_id`, `department`, `appointment_date`, `time`, `payment_method`, `payment_status`, `fee`, `patient_name`, `age`, `email`, `phone`, `quantity`, `address`, `patient_problem`, `appointment_rating`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 5, 2, 'Cognitive Psychology', '2023-11-28', '11-12 PM', 'bkash', 'Paid', 1500.00, 'Labib Majumder', '22', 'testpatient@email.com', '01817716161', 1, ', ,', 'Panic Attack', NULL, NULL, 1, NULL, '2023-11-27 13:09:53'),
(2, 2, 5, 2, 'Cognitive Psychology', '2023-11-28', '03-04 PM', 'bkash', 'Paid', 1500.00, 'Luke Dillard', '33', 'zaqyxita@mailinator.com', '08129348128', 1, 'Nostrum aut commodo', 'Culpa earum minim di', 4, 'Ut cumque lorem quis', 1, NULL, '2023-11-28 14:19:01'),
(3, 2, 5, 2, 'Cognitive Psychology', '2023-11-28', '01-02 PM', 'roket', 'Paid', 1500.00, 'Ravi Jadaja', '33', 'patient@email.com', '08129348128', 1, 'Dhanmondi 15, Dhaka-1209', NULL, 4, NULL, 1, NULL, '2023-11-28 14:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_departments`
--

CREATE TABLE `doctor_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_department` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_departments`
--

INSERT INTO `doctor_departments` (`id`, `doctor_department`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clinical Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(2, 'Counseling Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(3, 'School Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(4, 'Industrial-Organizational Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(5, 'Health Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(6, 'Forensic Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(7, 'Sports Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(8, 'Neuropsychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(9, 'Social Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(10, 'Developmental Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(11, 'Experimental Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(12, 'Cognitive Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(13, 'Positive Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(14, 'Environmental Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06'),
(15, 'Consumer Psychology', 1, '2023-11-27 11:25:06', '2023-11-27 11:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `set_date` date NOT NULL,
  `set_time` varchar(255) NOT NULL,
  `patient_qty` int(11) NOT NULL,
  `patient_fee` double(8,2) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `meeting_link` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`id`, `user_id`, `department_id`, `set_date`, `set_time`, `patient_qty`, `patient_fee`, `specialist`, `meeting_link`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 5, '2023-11-30', '10-11 AM|12-01 PM|01-02 PM|02-03 PM|03-04 PM|04-05 PM', 6, 1000.00, 'Psychology', 'https://meet.google.com/zry-ehus-vfs', NULL, 1, '2023-11-27 12:29:37', '2023-11-27 12:29:37'),
(2, 5, 12, '2023-11-28', '10-11 AM|11-12 PM|12-01 PM|01-02 PM|03-04 PM', 2, 1500.00, 'Psychology', 'https://meet.google.com/qwg-vfgd-cew', NULL, 1, '2023-11-27 12:31:14', '2023-11-28 14:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `passing_year` date NOT NULL,
  `edu_doc_title` varchar(100) NOT NULL,
  `education_certificate` varchar(255) NOT NULL,
  `certificate_location` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `institute`, `specialization`, `duration`, `passing_year`, `edu_doc_title`, `education_certificate`, `certificate_location`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka Medical College and institute', '7', '160', '1991-09-14', 'Nuropsychology', 'f98ab4cd-4b23-4c5a-a41d-85b6bb206e1c.pdf', 'uploads/important_documents/educational_documents', 5, '2023-11-27 12:17:50', '2023-11-27 12:17:50'),
(2, 'easdfdfasdfasdf', '10', '324', '2023-11-16', 'adsfasdfasdf', '571a49c3-2487-4c58-b6a2-b9cee859f387.pdf', 'uploads/important_documents/educational_documents', 3, '2023-11-28 12:42:24', '2023-11-28 12:42:24'),
(3, 'Exercitation aut por', '15', '32', '1989-04-28', 'Quaerat pariatur Do', 'b8a11a89-065a-4ddf-a64d-0cdf555aa805.png', 'uploads/important_documents/educational_documents', 4, '2023-11-28 12:46:49', '2023-11-28 12:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `experience_infos`
--

CREATE TABLE `experience_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `job_status` varchar(10) DEFAULT NULL,
  `position` varchar(50) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience_infos`
--

INSERT INTO `experience_infos` (`id`, `org_name`, `department`, `from_date`, `to_date`, `job_status`, `position`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Savage Decker LLC', 'Quidem eius ut quia', '1994-07-27', NULL, 'true', 'Omnis aliquid molest', 5, '2023-11-27 12:18:56', '2023-11-27 12:18:56'),
(2, 'Hunter and Erickson Inc', 'Cumque voluptatem pr', '1971-04-12', NULL, 'true', 'Quam et sed eos eni', 3, '2023-11-28 12:44:30', '2023-11-28 12:44:30'),
(3, 'Reid and Wiley Co', 'Laboriosam sunt au', '2008-11-24', NULL, 'true', 'Ad assumenda recusan', 4, '2023-11-28 12:47:06', '2023-11-28 12:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_title` int(11) DEFAULT NULL COMMENT '1=Professor Dr. ,2=Assistant Professor Dr., 3=Associate Professor Dr., 4 = Distinguished Professor Dr., 5 = Dr. ',
  `license_no` varchar(50) DEFAULT NULL,
  `license_attachment` varchar(255) DEFAULT NULL,
  `license_attachment_location` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `doc_title`, `license_no`, `license_attachment`, `license_attachment_location`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '656615236515612361635767676', '7c5d5462-a12a-4a3d-9124-2cdcb4e26345.pdf', 'uploads/important_documents/doctor_license', 5, '2023-11-27 12:13:22', '2023-11-27 12:49:15'),
(2, 3, '508545', '90517c72-0d0a-43fe-b7ae-41f94b4cb3c4.png', 'uploads/important_documents/doctor_license', 4, '2023-11-28 12:46:34', '2023-11-28 12:46:34');

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
(1, '2013_01_22_054315_create_blood_groups_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_09_19_130243_create_permission_tables', 1),
(8, '2023_09_22_091331_create_addresses_table', 1),
(9, '2023_09_22_091834_create_contact_us_table', 1),
(10, '2023_09_22_092243_create_posts_table', 1),
(11, '2023_09_22_092258_create_comments_table', 1),
(12, '2023_09_22_093051_create_departments_table', 1),
(13, '2023_09_22_093130_create_doctor_departments_table', 1),
(14, '2023_09_22_093450_create_previous_patient_reports_table', 1),
(15, '2023_09_22_094121_create_vital_signs_reports_table', 1),
(16, '2023_09_22_094559_create_biological_infos_table', 1),
(17, '2023_09_22_151020_create_counselor_sessions_table', 1),
(18, '2023_09_22_151048_create_counselor_session_feedback_table', 1),
(19, '2023_09_22_174319_create_counselor_session_chats_table', 1),
(20, '2023_10_13_164608_create_doctors_table', 1),
(21, '2023_10_13_164726_create_experts_table', 1),
(22, '2023_10_13_170119_create_education_table', 1),
(23, '2023_10_13_170142_create_training_infos_table', 1),
(24, '2023_10_13_170208_create_experience_infos_table', 1),
(25, '2023_11_02_084845_create_countries_table', 1),
(26, '2023_11_16_095608_create_doctor_schedules_table', 1),
(27, '2023_11_17_044925_create_doctor_appointments_table', 1),
(29, '2023_11_29_035813_create_user_feedback_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_location` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `previous_patient_reports`
--

CREATE TABLE `previous_patient_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_title` varchar(255) NOT NULL,
  `report_location` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-11-27 11:25:05', '2023-11-27 11:25:05'),
(2, 'Patient', 'web', '2023-11-27 11:25:05', '2023-11-27 11:25:05'),
(3, 'Counselor', 'web', '2023-11-27 11:25:05', '2023-11-27 11:25:05'),
(4, 'Doctor', 'web', '2023-11-27 11:25:05', '2023-11-27 11:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_infos`
--

CREATE TABLE `training_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `training_title` varchar(100) NOT NULL,
  `training_certificate` varchar(255) NOT NULL,
  `certificate_location` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_infos`
--

INSERT INTO `training_infos` (`id`, `institute`, `specialization`, `from_date`, `to_date`, `training_title`, `training_certificate`, `certificate_location`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Et amet quae ea dis', '1', '2020-08-28', '2021-12-03', 'Pariatur In sed pro', 'a76c0b80-6d8b-4362-84b2-fdeaeaf69412.pdf', 'uploads/important_documents/training_documents', 5, '2023-11-27 12:18:06', '2023-11-27 12:18:06'),
(2, 'Unde velit in fugia', '8', '2013-04-18', '2023-01-15', 'Voluptatem delectus', '74c0c00c-784f-4067-85bd-8badcd57c5a9.pdf', 'uploads/important_documents/training_documents', 3, '2023-11-28 12:44:22', '2023-11-28 12:44:22'),
(3, 'Debitis ipsam sit a', '3', '1982-07-01', '1991-10-10', 'Consectetur quos iu', '523d970a-b8ed-4999-ab56-fcc390ed77dc.png', 'uploads/important_documents/training_documents', 4, '2023-11-28 12:46:58', '2023-11-28 12:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `marital_status` int(11) DEFAULT NULL COMMENT '1=Unmarried, 2=Married, 3=Divorced',
  `nationality` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone_code` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `additional_phone_code` varchar(30) DEFAULT NULL,
  `additional_phone` varchar(30) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `identity_type` int(11) DEFAULT NULL COMMENT '1=passport,2=NID',
  `identity_no` varchar(100) DEFAULT NULL,
  `identity_proof` varchar(255) DEFAULT NULL,
  `identity_location` varchar(255) DEFAULT NULL,
  `pp_name` varchar(255) DEFAULT NULL,
  `pp_location` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT '0' COMMENT '1=active,0 or null = inactive, 2 = blocked',
  `is_verified` varchar(255) DEFAULT '0' COMMENT '1=verified,0 or null = unverified , 2 = pending, 3 = rejected',
  `terms` int(11) DEFAULT 0 COMMENT '0 or null = declined, 1 = accepted terms condition',
  `online` int(2) NOT NULL DEFAULT 1 COMMENT '1=online, 0 offline',
  `contact_link` text NOT NULL,
  `blood_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `marital_status`, `nationality`, `gender`, `phone_code`, `phone`, `additional_phone_code`, `additional_phone`, `date_of_birth`, `identity_type`, `identity_no`, `identity_proof`, `identity_location`, `pp_name`, `pp_location`, `religion`, `is_active`, `is_verified`, `terms`, `online`, `contact_link`, `blood_group_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, 'admin@email.com', NULL, '$2y$10$Ashe0eF7oRHz2NI2Hamuq.PqJSVfapkfSxNmRVv0y7qJ6orDQa3em', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', 0, 1, '', NULL, NULL, '2023-11-27 11:25:05', '2023-11-27 11:25:05', NULL),
(2, 'Ravi', 'Jadaja', 'patient@email.com', NULL, '$2y$10$8kmC/XLcPwRkvZwD.ZLSCeW4bU84WtSlw2BvJjH.wKIjP8udl2zxa', NULL, 'Bangladeshi', 'male', NULL, NULL, NULL, NULL, '1990-05-15', NULL, NULL, NULL, NULL, '1701165558.jpg', 'images/uploads/pp', 'Muslim', '1', '1', 0, 1, '', 5, NULL, '2023-11-27 11:25:06', '2023-11-28 09:59:42', NULL),
(3, 'asdfasdf', 'asdfasdf', 'counselor@email.com', NULL, '$2y$10$qWvBFnkf2O6AEl9TN6DEoOmQxJtht3PKlR/cvOHaXun.uwrFWB/Be', 1, 'Austrian', 'male', '40', '234234234', '31', '23423423423', '2008-10-29', 1, '24234234234', '4d79adbf-39ac-4580-a09f-deb79c147178.pdf', 'uploads/important_documents/doctor_license', '1701175908.jpg', 'images/uploads/pp', NULL, '1', '1', 1, 1, 'https://meet.google.com/kbb-iduv-pfr', NULL, NULL, '2023-11-27 11:25:06', '2023-11-28 21:28:38', NULL),
(4, 'Orla', 'Bauer', 'doctor@email.com', NULL, '$2y$10$fo5dF7heJkTkWiml.wyCCeLMsKvT/ANkxDFZuJnNHnSP2hGdsbHFu', 1, 'Bahraini', 'other', '480', '54', '480', '708', '1978-09-15', 1, 'Molestias non fugiat', '220b3d91-5539-4582-a3ea-674eb152e38e.png', 'uploads/important_documents/doctor_license', '1701175571.png', 'images/uploads/pp', NULL, '1', '0', 1, 1, '', NULL, NULL, '2023-11-27 11:25:06', '2023-11-28 12:46:34', NULL),
(5, 'John', 'Doe', 'testdoctor@email.com', NULL, '$2y$10$WxOduJFRDmMlMsuUGYWzjeDOWXv2g2V6p7GJuzN2A8NCTww/i96pi', 1, 'Bangladeshi', 'male', '880', '1777999888', '880', '1666255555', '1970-11-11', 1, '8888888727626', 'c079d005-0825-4224-b590-121be04a2dd4.pdf', 'uploads/important_documents/doctor_license', '1701087637.jpg', 'images/uploads/pp', NULL, '1', '1', 1, 1, '', NULL, NULL, '2023-11-27 12:04:22', '2023-11-27 12:48:56', NULL),
(6, 'Labib', 'Majumder', 'testpatient@email.com', NULL, '$2y$10$GEO3nkZs/LVjmmsbw/p.Zuw9NFAfxapFkRs0hCHLBAzLjrcApFmEO', NULL, 'Bangladeshi', 'male', NULL, NULL, NULL, NULL, '1982-11-24', NULL, NULL, NULL, NULL, '1701088582.jpg', 'images/uploads/pp', 'Muslim', '0', '1', 0, 1, '', 1, NULL, '2023-11-27 12:35:58', '2023-11-28 14:13:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating_point` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `expert_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`id`, `rating_point`, `feedback`, `user_id`, `expert_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'adsasdf', 2, 5, '2023-11-28 22:42:45', '2023-11-28 22:42:45'),
(2, 2, 'asdfasdf', 2, 5, '2023-11-28 22:49:04', '2023-11-28 22:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs_reports`
--

CREATE TABLE `vital_signs_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blood_pressure` varchar(5) DEFAULT NULL,
  `heart_rate` varchar(5) DEFAULT NULL,
  `sugar_level` varchar(20) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `checkup_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `biological_infos`
--
ALTER TABLE `biological_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biological_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counselor_sessions`
--
ALTER TABLE `counselor_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counselor_sessions_counselor_id_foreign` (`counselor_id`),
  ADD KEY `counselor_sessions_user_id_foreign` (`user_id`);

--
-- Indexes for table `counselor_session_chats`
--
ALTER TABLE `counselor_session_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counselor_session_chats_session_id_foreign` (`session_id`),
  ADD KEY `counselor_session_chats_user_id_foreign` (`user_id`);

--
-- Indexes for table `counselor_session_feedback`
--
ALTER TABLE `counselor_session_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counselor_session_feedback_user_id_foreign` (`user_id`),
  ADD KEY `counselor_session_feedback_counselor_id_foreign` (`counselor_id`),
  ADD KEY `counselor_session_feedback_counselor_session_id_foreign` (`counselor_session_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `doctor_appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_appointments_doctor_schedule_id_foreign` (`doctor_schedule_id`);

--
-- Indexes for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_schedules_user_id_foreign` (`user_id`),
  ADD KEY `doctor_schedules_department_id_foreign` (`department_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_user_id_foreign` (`user_id`);

--
-- Indexes for table `experience_infos`
--
ALTER TABLE `experience_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experience_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `previous_patient_reports`
--
ALTER TABLE `previous_patient_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `previous_patient_reports_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `training_infos`
--
ALTER TABLE `training_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_blood_group_id_foreign` (`blood_group_id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_feedback_user_id_foreign` (`user_id`),
  ADD KEY `user_feedback_expert_id_foreign` (`expert_id`);

--
-- Indexes for table `vital_signs_reports`
--
ALTER TABLE `vital_signs_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vital_signs_reports_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `biological_infos`
--
ALTER TABLE `biological_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counselor_sessions`
--
ALTER TABLE `counselor_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselor_session_chats`
--
ALTER TABLE `counselor_session_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselor_session_feedback`
--
ALTER TABLE `counselor_session_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experience_infos`
--
ALTER TABLE `experience_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `previous_patient_reports`
--
ALTER TABLE `previous_patient_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `training_infos`
--
ALTER TABLE `training_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vital_signs_reports`
--
ALTER TABLE `vital_signs_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `biological_infos`
--
ALTER TABLE `biological_infos`
  ADD CONSTRAINT `biological_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counselor_sessions`
--
ALTER TABLE `counselor_sessions`
  ADD CONSTRAINT `counselor_sessions_counselor_id_foreign` FOREIGN KEY (`counselor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counselor_sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counselor_session_chats`
--
ALTER TABLE `counselor_session_chats`
  ADD CONSTRAINT `counselor_session_chats_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `counselor_sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counselor_session_chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counselor_session_feedback`
--
ALTER TABLE `counselor_session_feedback`
  ADD CONSTRAINT `counselor_session_feedback_counselor_id_foreign` FOREIGN KEY (`counselor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counselor_session_feedback_counselor_session_id_foreign` FOREIGN KEY (`counselor_session_id`) REFERENCES `counselor_sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counselor_session_feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD CONSTRAINT `doctor_appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_appointments_doctor_schedule_id_foreign` FOREIGN KEY (`doctor_schedule_id`) REFERENCES `doctor_schedules` (`id`),
  ADD CONSTRAINT `doctor_appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD CONSTRAINT `doctor_schedules_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `doctor_departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `experience_infos`
--
ALTER TABLE `experience_infos`
  ADD CONSTRAINT `experience_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `experts`
--
ALTER TABLE `experts`
  ADD CONSTRAINT `experts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `previous_patient_reports`
--
ALTER TABLE `previous_patient_reports`
  ADD CONSTRAINT `previous_patient_reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_infos`
--
ALTER TABLE `training_infos`
  ADD CONSTRAINT `training_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_blood_group_id_foreign` FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`id`);

--
-- Constraints for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD CONSTRAINT `user_feedback_expert_id_foreign` FOREIGN KEY (`expert_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vital_signs_reports`
--
ALTER TABLE `vital_signs_reports`
  ADD CONSTRAINT `vital_signs_reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
