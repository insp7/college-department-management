-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 01:36 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frcrce-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `performed_on` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performed_on_id` int(11) DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_columns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_funding` int(11) NOT NULL DEFAULT 0,
  `sponsor_funding` int(11) NOT NULL DEFAULT 0,
  `expenditure` int(11) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `internal_participants_count` int(11) NOT NULL DEFAULT 0,
  `external_participants_count` int(11) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `additional_columns` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `details`, `address`, `type`, `institute_funding`, `sponsor_funding`, `expenditure`, `start_date`, `end_date`, `internal_participants_count`, `external_participants_count`, `is_completed`, `additional_columns`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Machine learning', 'some details', 'some add', 'fdp', 1, 10, 10, '2019-07-12', '2019-07-25', 10, 1012, 1, 'some columns', 1, 2, NULL, '2019-07-03 12:07:32', '2019-07-03 13:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `event_coordinators`
--

CREATE TABLE `event_coordinators` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `additional_columns` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_columns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `event_id`, `event_image_path`, `additional_columns`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 1, '/storage/attachments/event-images/2_0_1562179695.png', NULL, 2, NULL, NULL, '2019-07-03 13:18:15', '2019-07-03 13:18:15'),
(9, 1, '/storage/attachments/event-images/2_0_1562179695.png', NULL, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_staff`
--

CREATE TABLE `event_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_staff`
--

INSERT INTO `event_staff` (`id`, `staff_id`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL),
(2, 4, 1, NULL, NULL),
(3, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ipr`
--

CREATE TABLE `ipr` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patents_published_count` int(11) NOT NULL,
  `patents_granted_count` int(11) NOT NULL,
  `additional_columns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_18_110816_create_activity_table', 1),
(4, '2019_06_18_110816_create_event_coordinators_table', 1),
(5, '2019_06_18_110816_create_event_images_table', 1),
(6, '2019_06_18_110816_create_events_table', 1),
(7, '2019_06_18_110816_create_ipr_table', 1),
(8, '2019_06_18_110816_create_news_feed_images_table', 1),
(9, '2019_06_18_110816_create_news_feed_table', 1),
(10, '2019_06_18_110816_create_publications_table', 1),
(11, '2019_06_18_110816_create_published_books_table', 1),
(12, '2019_06_18_110816_create_research_projects_table', 1),
(13, '2019_06_18_110816_create_staff_table', 1),
(14, '2019_06_18_110816_create_students_table', 1),
(15, '2019_06_18_144309_create_notifications_table', 1),
(16, '2019_06_24_110546_create_permission_tables', 1),
(17, '2019_06_28_190432_create_event_staff_table', 1),
(18, '2019_07_01_105843_create_classes_table', 1),
(19, '2019_07_01_110208_create_student_events_table', 1),
(20, '2019_07_01_110231_create_student_event_images_table', 1),
(21, '2019_07_01_110304_create_student_courses_table', 1),
(22, '2019_07_01_110331_create_student_course_images_table', 1),
(23, '2019_07_01_110409_create_student_internship_images_table', 1),
(24, '2019_07_01_110422_create_student_internships_table', 1),
(25, '2019_07_01_110456_create_student_scholarships_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`id`, `title`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Machine learning', 'some details<br> Address: some add<br> Type: fdp<br> Start Date: 2019-07-12<br> End date: 2019-07-25', 2, NULL, '2019-07-03 16:06:56', '2019-07-03 16:06:56', NULL),
(6, 'Machine learning', 'some details<br> Address: some add<br> Type: fdp<br> Start Date: 2019-07-12<br> End date: 2019-07-25', 2, NULL, '2019-07-03 16:07:09', '2019-07-03 16:07:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_feed_images`
--

CREATE TABLE `news_feed_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_feed_id` int(11) NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_feed_images`
--

INSERT INTO `news_feed_images` (`id`, `news_feed_id`, `image_path`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, '/storage/attachments/event-images/2_0_1562179695.png', NULL, NULL, NULL, '2019-07-03 16:06:56', '2019-07-03 16:06:56'),
(2, 5, '/storage/attachments/event-images/2_0_1562179695.png', NULL, NULL, NULL, '2019-07-03 16:06:56', '2019-07-03 16:06:56'),
(3, 6, '/storage/attachments/event-images/2_0_1562179695.png', NULL, NULL, NULL, '2019-07-03 16:07:09', '2019-07-03 16:07:09'),
(4, 6, '/storage/attachments/event-images/2_0_1562179695.png', NULL, NULL, NULL, '2019-07-03 16:07:09', '2019-07-03 16:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `year` date NOT NULL,
  `citation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_columns` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `staff_id`, `year`, `citation`, `additional_columns`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 2, '2019-07-16', 'This is some citation * EDIT *', 'Additional Columns are yet to be removed from the ui ! *SHOULD WORL*', '2019-07-03 17:54:55', '2019-07-03 17:55:47', 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `published_books`
--

CREATE TABLE `published_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_columns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `published_books`
--

INSERT INTO `published_books` (`id`, `details`, `additional_columns`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'hello0', 'string', 3, NULL, NULL, '2019-07-03 10:43:05', '2019-07-03 10:43:05'),
(2, 'hello1', 'string', 3, NULL, NULL, '2019-07-03 10:43:05', '2019-07-03 10:43:05'),
(3, 'hello2', 'string', 3, NULL, NULL, '2019-07-03 10:43:05', '2019-07-03 10:43:05'),
(4, 'hello3', 'string', 3, NULL, NULL, '2019-07-03 10:43:05', '2019-07-03 10:43:05'),
(5, 'hello4', 'string', 3, NULL, NULL, '2019-07-03 10:43:06', '2019-07-03 10:43:06'),
(6, 'hello5', 'string', 3, NULL, NULL, '2019-07-03 10:43:06', '2019-07-03 10:43:06'),
(7, 'hello6', 'string', 3, NULL, NULL, '2019-07-03 10:43:06', '2019-07-03 10:43:06'),
(8, 'hello7', 'string', 3, NULL, NULL, '2019-07-03 10:43:06', '2019-07-03 10:43:06'),
(9, 'hello8', 'string', 3, NULL, NULL, '2019-07-03 10:43:06', '2019-07-03 10:43:06'),
(10, 'hello9', 'string', 3, NULL, NULL, '2019-07-03 10:43:06', '2019-07-03 10:43:06'),
(11, 'This are the details about the published book! * EDIT *', NULL, 2, 2, NULL, '2019-07-03 17:45:08', '2019-07-03 17:59:20'),
(12, 'These are the Edited Details!', NULL, 2, NULL, '2019-07-03 17:59:28', '2019-07-03 17:47:37', '2019-07-03 17:59:28'),
(13, 'This are the details about the published book! shoud worknow!', NULL, 2, NULL, NULL, '2019-07-03 17:49:10', '2019-07-03 17:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `research_projects`
--

CREATE TABLE `research_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `principal_investigator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grant_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `year` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-07-03 10:43:05', '2019-07-03 10:43:05'),
(2, 'Staff', 'web', '2019-07-03 10:43:05', '2019-07-03 10:43:05'),
(3, 'Student', 'web', '2019-07-03 10:43:05', '2019-07-03 10:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `is_permanent` tinyint(1) DEFAULT 0,
  `is_teaching` tinyint(1) DEFAULT 0,
  `pan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date_of_joining_institute` date DEFAULT NULL,
  `is_bos_chairman` tinyint(1) DEFAULT 0,
  `bos_chairman_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bos_chairman_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_bos_member` tinyint(1) DEFAULT 0,
  `bos_member_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bos_member_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_industry_experience` tinyint(1) DEFAULT 0,
  `industry_experience_years` int(11) DEFAULT NULL,
  `industry_experience_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_experience_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_subject_chairman` tinyint(1) DEFAULT 0,
  `subject_chairman_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_chairman_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_subject_expert` tinyint(1) DEFAULT 0,
  `subject_expert_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_expert_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_staff_selection_committee_member` int(11) DEFAULT NULL,
  `staff_selection_committee_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_selection_committee_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_department_advisory_board` tinyint(1) DEFAULT 0,
  `department_advisory_board_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_advisory_board_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_academic_audit` tinyint(1) DEFAULT 0,
  `academic_audit_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_audit_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_subject_expert_phd` tinyint(1) DEFAULT 0,
  `subject_expert_phd_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_expert_phd_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_other_universities_examiner` tinyint(1) DEFAULT 0,
  `other_universities_examiner_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_universities_examiner_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_examination_auditor` tinyint(1) DEFAULT 0,
  `examination_auditor_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination_auditor_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_subject_coordinator_src` tinyint(1) DEFAULT 0,
  `subject_coordinator_src_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_coordinator_src_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_iste` tinyint(1) DEFAULT 0,
  `iste_membership_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iste_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_csi` tinyint(1) DEFAULT 0,
  `csi_membership_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `csi_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_ieee` tinyint(1) DEFAULT 0,
  `ieee_membership_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ieee_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_acm` tinyint(1) DEFAULT 0,
  `acm_membership_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acm_certificate_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_fully_registered` int(11) DEFAULT 0,
  `additional_columns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `user_id`, `is_permanent`, `is_teaching`, `pan`, `employee_id`, `date_of_joining_institute`, `is_bos_chairman`, `bos_chairman_details`, `bos_chairman_certificate_path`, `is_bos_member`, `bos_member_details`, `bos_member_certificate_path`, `is_industry_experience`, `industry_experience_years`, `industry_experience_details`, `industry_experience_certificate_path`, `is_subject_chairman`, `subject_chairman_details`, `subject_chairman_certificate_path`, `is_subject_expert`, `subject_expert_details`, `subject_expert_certificate_path`, `is_staff_selection_committee_member`, `staff_selection_committee_details`, `staff_selection_committee_certificate_path`, `is_department_advisory_board`, `department_advisory_board_details`, `department_advisory_board_certificate_path`, `is_academic_audit`, `academic_audit_details`, `academic_audit_certificate_path`, `is_subject_expert_phd`, `subject_expert_phd_details`, `subject_expert_phd_certificate_path`, `is_other_universities_examiner`, `other_universities_examiner_details`, `other_universities_examiner_certificate_path`, `is_examination_auditor`, `examination_auditor_details`, `examination_auditor_certificate_path`, `is_subject_coordinator_src`, `subject_coordinator_src_details`, `subject_coordinator_src_certificate_path`, `is_iste`, `iste_membership_id`, `iste_certificate_path`, `is_csi`, `csi_membership_id`, `csi_certificate_path`, `is_ieee`, `ieee_membership_id`, `ieee_certificate_path`, `is_acm`, `acm_membership_id`, `acm_certificate_path`, `is_fully_registered`, `additional_columns`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1, NULL, 1, 1, NULL, '2019-07-03 10:43:05', '2019-07-03 12:05:55'),
(2, 4, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL),
(4, 2, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `roll_no` int(11) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `is_fully_registered` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `additional_columns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `name`, `details`, `location`, `start_date`, `end_date`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ds2222', '2222asdas', 'dssd EDITEdada22', '2231-03-03', '2221-03-01', 2, 2, '2019-07-03 12:00:59', '2019-07-03 11:35:46', '2019-07-03 12:00:59'),
(2, 'asd', 'asdas', 'asdas', '0212-07-29', '2019-08-06', 2, NULL, NULL, '2019-07-03 11:36:14', '2019-07-03 11:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_images`
--

CREATE TABLE `student_course_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_events`
--

CREATE TABLE `student_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_event_images`
--

CREATE TABLE `student_event_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_internships`
--

CREATE TABLE `student_internships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_internship_images`
--

CREATE TABLE `student_internship_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_scholarships`
--

CREATE TABLE `student_scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `role` int(11) DEFAULT 0,
  `gender` enum('M','F','O') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_columns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `contact_no`, `date_of_birth`, `role`, `gender`, `additional_columns`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 1, 'M', 'additional coloumns', 'admin@gmail.com', NULL, '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.', NULL, '2019-05-23 02:05:39', '2019-07-03 12:05:55', NULL),
(2, 'Dhananjay', 'Dhananjay Ghumare', 'sanjay', '9168977662', '2019-05-23', 1, 'M', 'additional coloumns', 'satff1@gmail.com', NULL, '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.', NULL, '2019-05-23 02:05:39', '2019-05-23 02:05:39', NULL),
(3, 'Dhananjay', 'Dhananjay Ghumare', 'sanjay', '9168977662', '2019-05-23', 1, 'M', 'additional coloumns', 'staff2@gmail.com', NULL, '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.', NULL, '2019-05-23 02:05:39', '2019-05-23 02:05:39', NULL),
(4, 'test', 'user', 'name', '1231212', NULL, 0, NULL, NULL, 'test@gmail.com', NULL, '$2y$10$zXhY8SU1BlPKbUGOUEWGGOcy1ylX7A3Gh1RfKnrMyL7Y6O2nmBUr.', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_coordinators`
--
ALTER TABLE `event_coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_staff`
--
ALTER TABLE `event_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipr`
--
ALTER TABLE `ipr`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_feed_images`
--
ALTER TABLE `news_feed_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `published_books`
--
ALTER TABLE `published_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_projects`
--
ALTER TABLE `research_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course_images`
--
ALTER TABLE `student_course_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_events`
--
ALTER TABLE `student_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_event_images`
--
ALTER TABLE `student_event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_internships`
--
ALTER TABLE `student_internships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_internship_images`
--
ALTER TABLE `student_internship_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_scholarships`
--
ALTER TABLE `student_scholarships`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_coordinators`
--
ALTER TABLE `event_coordinators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_staff`
--
ALTER TABLE `event_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ipr`
--
ALTER TABLE `ipr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_feed_images`
--
ALTER TABLE `news_feed_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `published_books`
--
ALTER TABLE `published_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `research_projects`
--
ALTER TABLE `research_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_course_images`
--
ALTER TABLE `student_course_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_events`
--
ALTER TABLE `student_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_event_images`
--
ALTER TABLE `student_event_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_internships`
--
ALTER TABLE `student_internships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_internship_images`
--
ALTER TABLE `student_internship_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_scholarships`
--
ALTER TABLE `student_scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
