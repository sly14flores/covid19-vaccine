-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 06:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19_vaccines`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosages`
--

CREATE TABLE `dosages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vaccine_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qr_pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` int(11) DEFAULT NULL,
  `vaccine_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_of_injection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `batch_number` int(11) DEFAULT NULL,
  `lot_number` int(11) DEFAULT NULL,
  `dose` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosages`
--

INSERT INTO `dosages` (`id`, `vaccine_id`, `user_id`, `qr_pass_id`, `brand_name`, `vaccine_name`, `site_of_injection`, `expiry_date`, `batch_number`, `lot_number`, `dose`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '263001', 1, 'Vaccine', 'Left', '2021-03-31', 1, 1, 2, '2021-03-31 02:30:31', '2021-03-31 02:30:31'),
(2, NULL, 1, '263001', 1, 'Vaccine', 'Left', '2021-03-31', 1, 1, 1, '2021-03-31 02:31:16', '2021-03-31 02:31:16');

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
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slots` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `description`, `slots`, `created_at`, `updated_at`) VALUES
(1, 'Test', 1, '2021-02-23 07:33:59', '2021-02-23 07:33:59');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_01_18_025506_create_surveys_table', 1),
(10, '2021_01_18_141911_more_fields_table_surveys', 1),
(11, '2021_01_20_161300_add_more_fields_table_surveys', 1),
(12, '2021_01_21_104144_others_fields_table_surveys', 1),
(13, '2021_01_25_095758_add_none_fee_table_surveys', 1),
(14, '2021_01_25_145032_add_more_for_pregnant_table_surveys', 1),
(15, '2021_01_25_145316_add_more_for_reasons_table_surveys', 1),
(16, '2021_01_26_092055_modify_unique_qr_pass_table_surveys', 1),
(17, '2021_01_29_090239_add_columns_table_users', 1),
(18, '2021_01_29_111857_modify_email_table_users', 1),
(19, '2021_01_29_112707_modify_password_table_users', 1),
(20, '2021_02_04_145024_create_registrations_table', 2),
(21, '2021_02_04_153359_registration_unique_qr_pass_id_table_registration', 2),
(22, '2021_02_04_165021_modify_diagonsed_date_table_registration', 2),
(23, '2021_02_05_103031_more_fields_table_survey', 2),
(24, '2021_02_09_090653_add_more_fields_table', 3),
(25, '2021_02_09_095044_allergies', 3),
(26, '2021_02_09_101200_comorbitities', 3),
(27, '2021_02_09_113856_modify_tinyintegers_table_registrations', 3),
(28, '2021_02_21_210016_create_hospitals_table', 4),
(29, '2021_02_22_115557_add_slots_hospitals', 4),
(30, '2021_02_23_111256_add_hospital_users', 5),
(31, '2021_03_19_090532_create_vaccines_table', 6),
(32, '2021_03_19_112231_add_profession_group_id_table_users', 7),
(33, '2021_03_22_163504_add_qr_pass_id_table_vaccines', 8),
(34, '2021_03_25_144159_add_prc_number_table_users', 9),
(35, '2021_03_25_163746_create_pre_assessments_table', 10),
(36, '2021_03_26_090233_alter_table_pre_assessments', 11),
(38, '2021_03_30_105353_create_post_assessments_table', 12),
(39, '2021_03_30_144056_alter_table_post_assessments', 13),
(40, '2021_03_30_151924_add_vaccine_fk_table_post_assessments', 14),
(41, '2021_03_31_081704_alter_vaccine_name_table_vaccines', 15),
(42, '2021_03_31_084231_add_fields_vaccines', 16),
(43, '2021_03_31_094544_add_fk_pre_assessments', 17),
(44, '2021_03_31_105250_rename_vaccines', 18),
(45, '2021_03_31_110050_create_vaccines', 19),
(46, '2021_03_31_112005_fk_vaccines_dosages', 20),
(47, '2021_03_31_112604_alter_vaccination_site_facility_vaccines_table', 21),
(48, '2021_03_31_113346_rename_vaccine_id_pre_assessments_table', 22),
(49, '2021_03_31_113425_rename_vaccine_id_post_assessments_table', 22),
(50, '2021_03_31_114642_add_others_vaccines_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('76d5f94e168387f89cc69e6f030cbd0dd0ad95d57408c76b257bc32393e69b868535147553f5ad0a', 1, 1, 'authToken', '[]', 0, '2021-03-31 00:55:01', '2021-03-31 00:55:01', '2022-03-31 08:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Covid-19 Vaccines Personal Access Client', 'Pa4wigxYueHJMOxUxyMMDIw0SgsN3rzuqI2Gwc8o', NULL, 'http://localhost', 1, 0, 0, '2021-01-29 07:27:10', '2021-01-29 07:27:10'),
(2, NULL, 'Covid-19 Vaccines Password Grant Client', 'rHYzBUGlMUSacBit99XR8bHOhN2GbaX8XUXC0Fhk', 'users', 'http://localhost', 0, 1, 0, '2021-01-29 07:27:10', '2021-01-29 07:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-29 07:27:10', '2021-01-29 07:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_assessments`
--

CREATE TABLE `post_assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qr_pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dose` int(11) DEFAULT NULL,
  `assessments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_assessments`
--

INSERT INTO `post_assessments` (`id`, `qr_pass_id`, `dosage_id`, `dose`, `assessments`, `created_at`, `updated_at`) VALUES
(1, '263001', 1, 2, 'a:3:{i:0;a:3:{s:3:\"key\";i:1;s:11:\"description\";s:90:\"If with allergy or asthma, will the vaccinator able to monitor the patient for 30 minutes?\";s:5:\"value\";b:0;}i:1;a:3:{s:3:\"key\";i:2;s:11:\"description\";s:204:\"Does not manifest any of the following symptoms: Fever/chills, Headache, Cough, Colds, Sore throat,  Myalgia, Fatigue, Weakness, Loss of smell/taste, Diarrhea, Shortness of breath/ difficulty in breathing\";s:5:\"value\";b:0;}i:2;a:3:{s:3:\"key\";i:3;s:11:\"description\";s:69:\"If manifesting any of the mentioned symptom/s, specify all that apply\";s:5:\"value\";b:0;}}', '2021-03-31 02:30:31', '2021-03-31 02:30:31'),
(2, '263001', 2, 1, 'a:3:{i:0;a:3:{s:3:\"key\";i:1;s:11:\"description\";s:90:\"If with allergy or asthma, will the vaccinator able to monitor the patient for 30 minutes?\";s:5:\"value\";b:0;}i:1;a:3:{s:3:\"key\";i:2;s:11:\"description\";s:204:\"Does not manifest any of the following symptoms: Fever/chills, Headache, Cough, Colds, Sore throat,  Myalgia, Fatigue, Weakness, Loss of smell/taste, Diarrhea, Shortness of breath/ difficulty in breathing\";s:5:\"value\";b:0;}i:2;a:3:{s:3:\"key\";i:3;s:11:\"description\";s:69:\"If manifesting any of the mentioned symptom/s, specify all that apply\";s:5:\"value\";b:0;}}', '2021-03-31 02:31:16', '2021-03-31 02:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `pre_assessments`
--

CREATE TABLE `pre_assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qr_pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dose` int(11) DEFAULT NULL,
  `consent` tinyint(4) DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assessments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_assessments`
--

INSERT INTO `pre_assessments` (`id`, `qr_pass_id`, `dosage_id`, `dose`, `consent`, `reason`, `assessments`, `created_at`, `updated_at`) VALUES
(1, '263001', 1, 2, 1, NULL, 'a:15:{i:0;a:3:{s:3:\"key\";i:1;s:11:\"description\";s:27:\"Age more than 16 years old?\";s:5:\"value\";b:1;}i:1;a:3:{s:3:\"key\";i:2;s:11:\"description\";s:39:\"Has no allergies to PEG or polysorbate?\";s:5:\"value\";b:1;}i:2;a:3:{s:3:\"key\";i:3;s:11:\"description\";s:66:\"Has no severe allergic reaction after the 1st dose of the vaccine?\";s:5:\"value\";b:0;}i:3;a:3:{s:3:\"key\";i:4;s:11:\"description\";s:54:\"Has no allergy to food, egg, medicines, and no asthma?\";s:5:\"value\";b:0;}i:4;a:3:{s:3:\"key\";i:5;s:11:\"description\";s:73:\"Has no history of bleeding disorders or currently taking anti-coagulants?\";s:5:\"value\";b:0;}i:5;a:3:{s:3:\"key\";i:6;s:11:\"description\";s:77:\"If with bleeding history, is a gauge 23 - 25 syringe available for injection?\";s:5:\"value\";b:0;}i:6;a:3:{s:3:\"key\";i:7;s:11:\"description\";s:89:\"Has no history of exposure to a confirmed or suspected COVID-19 case in the past 2 weeks?\";s:5:\"value\";b:0;}i:7;a:3:{s:3:\"key\";i:8;s:11:\"description\";s:65:\"Has not been previously treated for COVID-19 in the past 90 days?\";s:5:\"value\";b:0;}i:8;a:3:{s:3:\"key\";i:9;s:11:\"description\";s:49:\"Has not received any vaccine in the past 2 weeks?\";s:5:\"value\";b:0;}i:9;a:3:{s:3:\"key\";i:10;s:11:\"description\";s:95:\"Has not received convalescent plasma or monoclonal antibodies for COVID-19 in the past 90 days?\";s:5:\"value\";b:0;}i:10;a:3:{s:3:\"key\";i:11;s:11:\"description\";s:13:\"Not Pregnant?\";s:5:\"value\";b:0;}i:11;a:3:{s:3:\"key\";i:12;s:11:\"description\";s:34:\"If pregnant, 2nd or 3rd Trimester?\";s:5:\"value\";b:0;}i:12;a:3:{s:3:\"key\";i:13;s:11:\"description\";s:178:\"Does not have any of the following: HIV, Cancer/ Malignancy, Underwent Transplant, Under Steroid Medication/ Treatment, Bed Ridden, terminal illness, less than 6 months prognosis\";s:5:\"value\";b:0;}i:13;a:3:{s:3:\"key\";i:14;s:11:\"description\";s:39:\"If with mentioned condition/s, specify.\";s:5:\"value\";b:0;}i:14;a:3:{s:3:\"key\";i:15;s:11:\"description\";s:86:\"If with mentioned condition, has presented medical clearance prior to vaccination day?\";s:5:\"value\";b:0;}}', '2021-03-31 02:30:31', '2021-03-31 02:32:54'),
(2, '263001', 2, 1, 0, '', 'a:15:{i:0;a:3:{s:3:\"key\";i:1;s:11:\"description\";s:27:\"Age more than 16 years old?\";s:5:\"value\";b:0;}i:1;a:3:{s:3:\"key\";i:2;s:11:\"description\";s:39:\"Has no allergies to PEG or polysorbate?\";s:5:\"value\";b:0;}i:2;a:3:{s:3:\"key\";i:3;s:11:\"description\";s:66:\"Has no severe allergic reaction after the 1st dose of the vaccine?\";s:5:\"value\";b:0;}i:3;a:3:{s:3:\"key\";i:4;s:11:\"description\";s:54:\"Has no allergy to food, egg, medicines, and no asthma?\";s:5:\"value\";b:0;}i:4;a:3:{s:3:\"key\";i:5;s:11:\"description\";s:73:\"Has no history of bleeding disorders or currently taking anti-coagulants?\";s:5:\"value\";b:0;}i:5;a:3:{s:3:\"key\";i:6;s:11:\"description\";s:77:\"If with bleeding history, is a gauge 23 - 25 syringe available for injection?\";s:5:\"value\";b:0;}i:6;a:3:{s:3:\"key\";i:7;s:11:\"description\";s:89:\"Has no history of exposure to a confirmed or suspected COVID-19 case in the past 2 weeks?\";s:5:\"value\";b:0;}i:7;a:3:{s:3:\"key\";i:8;s:11:\"description\";s:65:\"Has not been previously treated for COVID-19 in the past 90 days?\";s:5:\"value\";b:0;}i:8;a:3:{s:3:\"key\";i:9;s:11:\"description\";s:49:\"Has not received any vaccine in the past 2 weeks?\";s:5:\"value\";b:0;}i:9;a:3:{s:3:\"key\";i:10;s:11:\"description\";s:95:\"Has not received convalescent plasma or monoclonal antibodies for COVID-19 in the past 90 days?\";s:5:\"value\";b:0;}i:10;a:3:{s:3:\"key\";i:11;s:11:\"description\";s:13:\"Not Pregnant?\";s:5:\"value\";b:0;}i:11;a:3:{s:3:\"key\";i:12;s:11:\"description\";s:34:\"If pregnant, 2nd or 3rd Trimester?\";s:5:\"value\";b:0;}i:12;a:3:{s:3:\"key\";i:13;s:11:\"description\";s:178:\"Does not have any of the following: HIV, Cancer/ Malignancy, Underwent Transplant, Under Steroid Medication/ Treatment, Bed Ridden, terminal illness, less than 6 months prognosis\";s:5:\"value\";b:0;}i:13;a:3:{s:3:\"key\";i:14;s:11:\"description\";s:39:\"If with mentioned condition/s, specify.\";s:5:\"value\";b:0;}i:14;a:3:{s:3:\"key\";i:15;s:11:\"description\";s:86:\"If with mentioned condition, has presented medical clearance prior to vaccination day?\";s:5:\"value\";b:0;}}', '2021-03-31 02:31:16', '2021-03-31 02:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qr_pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `philhealth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_lgu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_municipality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direct_interaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregnancy_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drug_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insect_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latex_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mold_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pet_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pollen_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `with_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `with_allergy_others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hypertension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heart_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kidney_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diabetes_mellitus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bronchial_asthma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `immuno_deficiency_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comorbidity_others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `with_comorbidity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comorbidity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `with_comorbidity_others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `covid_classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosed_date` date DEFAULT NULL,
  `consent_vaccination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `qr_pass_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `birthdate`, `gender`, `region`, `address`, `barangay`, `town_city`, `province`, `contact_no`, `civil_status`, `category`, `category_id`, `category_id_no`, `employment_status`, `profession`, `philhealth`, `pwd_id`, `employer_name`, `employer_address`, `employer_lgu`, `employer_municipality`, `employer_contact_no`, `direct_interaction`, `pregnancy_status`, `drug_allergy`, `food_allergy`, `insect_allergy`, `latex_allergy`, `mold_allergy`, `pet_allergy`, `pollen_allergy`, `with_allergy`, `allergy`, `with_allergy_others`, `hypertension`, `heart_disease`, `kidney_disease`, `diabetes_mellitus`, `bronchial_asthma`, `immuno_deficiency_status`, `cancer`, `comorbidity_others`, `with_comorbidity`, `comorbidity`, `with_comorbidity_others`, `diagnosed`, `covid_classification`, `diagnosed_date`, `consent_vaccination`, `created_at`, `updated_at`) VALUES
(1, '263001', 'Rosemarie', 'Valdez', 'Agtarap', 'NA', '1960-03-18', '01_Female', 'Ilocos', 'Purok 3', '_13305031_DR._CAMILO_OSIAS_POB._(CABUAAN_ESTE)', '_13305_BALAOAN', '_0133_LA_UNION', '09276582969', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '190007736782', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-24 09:10:40'),
(2, '264550', 'Jason', 'Gauken', 'Aguilen', 'NA', '1974-04-21', '02_Male', 'Ilocos', 'Naguirangan Street', '_13315019_POBLACION', '_13315_SAN_GABRIEL', '_0133_LA_UNION', '09771468930', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '03_Dentist', '050000489392', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(3, '265422', 'Washington', 'Payoyo', 'Agustin', 'JR', '1982-02-04', '02_Male', 'Ilocos', '#281', '_13314022_CATBANGEN', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09177751779', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '12_Physician', '050000910950', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(4, '265583', 'Carmeling', 'Bumatay', 'Ajoc', 'NA', '1966-05-06', '01_Female', 'Ilocos', '#32', '_13310006_BUSELBUSEL', '_13310_LUNA', '_0133_LA_UNION', '09162697203', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '190008071105', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '01_Yes', '02_No', '01_Yes', '02_No', '02_No', '01_Yes', '02_No', NULL, NULL, NULL, '01_Yes', '01_Yes', '02_No', '01_Yes', '02_No', '02_No', '02_No', '01_Yes', '01_Yes', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(5, '265695', 'Cerlito', 'Bigcas', 'Ajoc', 'NA', '1969-10-04', '02_Male', 'Ilocos', '#32', '_13310006_BUSELBUSEL', '_13310_LUNA', '_0133_LA_UNION', '09158768345', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000814064', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(6, '265513', 'Shane Pheunic', 'Ostrea', 'Alagadan', 'NA', '1984-11-19', '02_Male', 'Ilocos', '#03, Ostrea Street', '_13305037_ANTONINO', '_13305_BALAOAN', '_0133_LA_UNION', '09270283584', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050000722623', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(7, '265864', 'Jeric', 'Oracion', 'Arciaga', 'NA', '1971-10-07', '02_Male', 'Ilocos', NULL, '_13305018_NAGSABARAN_NORTE', '_13305_BALAOAN', '_0133_LA_UNION', '09127395248', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000407639', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(8, '263915', 'Katheleen Joy', 'Valdez', 'Arquero', 'NA', '1986-12-31', '01_Female', 'Ilocos', 'Purok 3', '_13305022_PAGBENNECAN', '_13305_BALAOAN', '_0133_LA_UNION', '09176597732', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '05_Midwife', '050252986364', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(9, '265588', 'Evelyn', 'Ramirez', 'Arquitola', 'NA', '1961-01-31', '01_Female', 'Ilocos', 'Sitio Batuagan South', '_13305018_NAGSABARAN_NORTE', '_13305_BALAOAN', '_0133_LA_UNION', '09159442640', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '05_Midwife', '050000407647', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(10, '265381', 'Miriam', 'Casilla', 'Atijera', 'NA', '1981-08-21', '01_Female', 'Ilocos', '264', '_13305015_CAMILING', '_13305_BALAOAN', '_0133_LA_UNION', '09187467102', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050000794136', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(11, '265385', 'Lorena', 'Casem', 'Bernal', 'NA', '1987-06-03', '01_Female', 'Ilocos', NULL, '_13310026_PITPITAC', '_13310_LUNA', '_0133_LA_UNION', '09104931302', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '19_Others_', '040500933463', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(12, '263076', 'Veronica', 'Casem', 'Bucasas', 'NA', '1960-07-21', '01_Female', 'Ilocos', 'Purok 5', '_13305011_BUTUBUT_SUR', '_13305_BALAOAN', '_0133_LA_UNION', '09165986948', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050000407698', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(13, '263641', 'Romel', 'Nava', 'Bucsit', 'NA', '1975-02-25', '02_Male', 'Ilocos', '#8', '_13303024_MARAGAYAP', '_13303_BACNOTAN', '_0133_LA_UNION', '09499068503', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '04_Medical_Technologist', '050501560348', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(14, '263235', 'Emmylou Louisa', 'Antonio', 'Cabanban', 'NA', '1988-02-23', '01_Female', 'Ilocos', '153 A', '_13316042_URBIZTONDO', '_13316_SAN_JUAN', '_0133_LA_UNION', '09165986823', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050252553638', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(15, '265747', 'Maribel', 'Oblero', 'Camat', 'NA', '1977-06-15', '01_Female', 'Ilocos', NULL, '_13318002_CORROOY', '_13318_SANTOL', '_0133_LA_UNION', '09977063041', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '05_Midwife', '050000975459', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(16, '263414', 'Michelle Ann', 'Dalope', 'Canilang', 'NA', '1989-02-23', '01_Female', 'Ilocos', '#292, Flores Street', '_13314022_CATBANGEN', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09088933537', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050252730386', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(17, '265384', 'Regina', 'Octavo', 'Concepcion', 'NA', '1960-04-22', '01_Female', 'Ilocos', 'Purok 2', '_13305014_CALUNGBUYAN', '_13305_BALAOAN', '_0133_LA_UNION', '09085245252', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050000407728', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '01_Yes', NULL, NULL, '01_Yes', 'COVID-19', '1970-01-01', '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(18, '263540', 'Lorenzo', 'Ubungen', 'Consebido', 'NA', '1988-07-21', '02_Male', 'Ilocos', NULL, '_13310020_NAPASET', '_13310_LUNA', '_0133_LA_UNION', '09304219289', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050252873314', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(19, '263240', 'Marilou', 'Borja', 'Dacumos', 'NA', '1990-08-26', '01_Female', 'Ilocos', 'Purok 5', '_13314012_BIDAY', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09177567404', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050253439030', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(20, '263441', 'Elaine Ruth', 'De los Santos', 'De Guzman', 'NA', '1978-03-31', '01_Female', 'Ilocos', '#139', '_13314021_CARLATAN', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09178675765', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '12_Physician', '050252148385', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(21, '263640', 'Lina Grace', 'Barberan', 'Dingoasen', 'NA', '1982-06-02', '01_Female', 'Ilocos', NULL, '_13319008_NAMALTUGAN', '_13319_SUDIPEN', '_0133_LA_UNION', '09172489142', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '05_Midwife', '050000663325', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(22, '263624', 'Alitha', 'Anga-angan', 'Directo', 'NA', '1990-12-15', '01_Female', 'Ilocos', NULL, '_13310036_SUCOC_NORTE', '_13310_LUNA', '_0133_LA_UNION', '09297573621', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '07_Nutritionist_Dietician', '040251455459', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '01_Yes', '02_No', '01_Yes', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(23, '263401', 'Geanelle', 'Ricanor', 'Esperon', 'NA', '1991-08-24', '01_Female', 'Ilocos', 'Sipulo', '_13303043_SIPULO', '_13303_BACNOTAN', '_0133_LA_UNION', '09153621736', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050501981033', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '01_Pregnant', '01_Yes', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(24, '263255', 'Leizlee Ann', 'Sotelo', 'Espinueva', 'NA', '2008-06-16', '01_Female', 'Ilocos', '#98 Purok 2', '_13314057_SEVILLA', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09064544996', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000831538', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(25, '263430', 'Imelda', 'Tuvera', 'Estillomo', 'NA', '1963-04-11', '01_Female', 'Ilocos', NULL, '_13305012_CABUAAN_OESTE_(POB.)', '_13305_BALAOAN', '_0133_LA_UNION', '09078039425', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000407736', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '01_Yes', '01_Yes', '02_No', '02_No', '01_Yes', '02_No', '01_Yes', NULL, NULL, NULL, '02_No', '02_No', '02_No', '01_Yes', '01_Yes', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(26, '265383', 'Cesar', 'Perez', 'Ferrer', 'NA', '1962-12-03', '02_Male', 'Ilocos', '#14', '_13306021_NAGSABARAN', '_13306_BANGAR', '_0133_LA_UNION', '09157765319', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '12_Physician', '050000407744', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '01_Yes', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '01_Yes', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(27, '265797', 'Virgilio', 'Peralta', 'Fontanilla', 'NA', '1964-02-01', '02_Male', 'Ilocos', NULL, '_13305007_BUNGOL', '_13305_BALAOAN', '_0133_LA_UNION', '09453993697', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000407752', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(28, '264578', 'Rodolfo', 'Opinaldo', 'Lopez', 'JR', '1978-01-09', '02_Male', 'Ilocos', NULL, '_13305012_CABUAAN_OESTE_(POB.)', '_13305_BALAOAN', '_0133_LA_UNION', '09489434587', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '052007276095', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(29, '263434', 'Claire', 'Maramat', 'Lucina', 'NA', '1978-09-03', '01_Female', 'Ilocos', '#25 St., Therese Compound', '_13314057_SEVILLA', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09088855068', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '12_Physician', '050000700204', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '01_Yes', '02_No', '02_No', '01_Yes', '02_No', '01_Yes', '01_Yes', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(30, '263660', 'Elizabeth', 'Dingle', 'Maganis', 'NA', '1974-11-14', '01_Female', 'Ilocos', '#2, Sector #2', '_13306033_SAN_BLAS', '_13306_BANGAR', '_0133_LA_UNION', '09483301948', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '10_Pharmacist', '050250314857', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(31, '265743', 'Dante', 'Perez', 'Mantarin', 'NA', '1986-12-28', '02_Male', 'Ilocos', NULL, '_13305007_BUNGOL', '_13305_BALAOAN', '_0133_LA_UNION', '09102959521', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050252436488', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(32, '263338', 'Eufrocina', 'Obra', 'Mendoza', 'NA', '1975-01-01', '01_Female', 'Ilocos', 'Purok 3', '_13305015_CAMILING', '_13305_BALAOAN', '_0133_LA_UNION', '09196582773', '03_Widow/Widower', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '190266544859', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(33, '263927', 'Rogelio', 'Opeña', 'Mendoza', 'NA', '1969-06-13', '02_Male', 'Ilocos', NULL, '_13305015_CAMILING', '_13305_BALAOAN', '_0133_LA_UNION', '09480860974', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '052004754484', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '01_Yes', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(34, '263069', 'Analyn', 'Tangco', 'Monis', 'NA', '1975-01-07', '01_Female', 'Ilocos', NULL, '_13306023_PARATONG_NO._3', '_13306_BANGAR', '_0133_LA_UNION', '09109083760', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000104075', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '01_Yes', '02_No', '02_No', '01_Yes', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(35, '265394', 'Mae Louie Jun', 'Madayag', 'Navalta', 'NA', '1987-12-18', '02_Male', 'Ilocos', 'Purok West', '_13318008_PAAGAN', '_13318_SANTOL', '_0133_LA_UNION', '09164627862', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '040501405916', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(36, '263314', 'Rowell', 'Ybay', 'Navalta', 'NA', '1986-05-25', '02_Male', 'Ilocos', NULL, '_13305009_BUTUBUT_NORTE', '_13305_BALAOAN', '_0133_LA_UNION', '09164256482', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050252189677', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '01_Yes', '01_Yes', '01_Yes', '01_Yes', '01_Yes', '01_Yes', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_No', '02_No', '01_Yes', '01_Yes', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(37, '263629', 'Anne Janet', 'Advincula', 'Nastor', 'NA', '1991-10-22', '01_Female', 'Ilocos', 'Purok 1', '_13305006_BULBULALA', '_13305_BALAOAN', '_0133_LA_UNION', '09176363042', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050253734423', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(38, '263067', 'Melanie', 'Posadas', 'Nelmida', 'NA', '1990-04-30', '01_Female', 'Ilocos', '#37 Bet-ang Street', '_13315019_POBLACION', '_13315_SAN_GABRIEL', '_0133_LA_UNION', '09092037617', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050252870803', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '01_Yes', '01_Yes', '02_No', '01_Yes', NULL, NULL, NULL, '02_No', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(39, '263789', 'Arnel', 'Ocasion', 'Nisperos', 'NA', '1969-10-19', '02_Male', 'Ilocos', NULL, '_13305007_BUNGOL', '_13305_BALAOAN', '_0133_LA_UNION', '09272714399', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000407884', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(40, '263074', 'Edna', 'Bumatay', 'Oabe', 'NA', '1980-03-15', '01_Female', 'Ilocos', 'Purok 6', '_13310039_TALLAOEN', '_13310_LUNA', '_0133_LA_UNION', '09266956600', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050252271004', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(41, '263923', 'Pio', 'Opeña', 'Obra', 'JR', '1976-10-07', '02_Male', 'Ilocos', 'Purok 4', '_13305015_CAMILING', '_13305_BALAOAN', '_0133_LA_UNION', '09993869630', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '052004756290', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(42, '263060', 'Genoveva', 'Olais', 'Ocasion', 'NA', '1962-01-03', '01_Female', 'Ilocos', 'Purok 7', '_13305037_ANTONINO', '_13305_BALAOAN', '_0133_LA_UNION', '09162317160', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000407906', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(43, '265775', 'Guillermo', 'Fontanilla', 'Ocasion', 'NA', '1968-02-10', '02_Male', 'Ilocos', NULL, '_13305007_BUNGOL', '_13305_BALAOAN', '_0133_LA_UNION', '09466382078', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000560275', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(44, '263917', 'Denver Ralston Roi', 'Romero', 'Ogbinar', 'NA', '1986-08-29', '02_Male', 'Ilocos', 'Purok 3', '_13305022_PAGBENNECAN', '_13305_BALAOAN', '_0133_LA_UNION', '09953606328', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050252663115', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(45, '265735', 'Larina', 'Escobero', 'Olais', 'NA', '1961-09-30', '01_Female', 'Ilocos', 'Purok 4', '_13319014_SAN_FRANCISCO_SUR', '_13319_SUDIPEN', '_0133_LA_UNION', '09661734014', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '04_Medical_Technologist', '050000408090', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '01_Yes', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(46, '263409', 'Dianne', 'Azumbra', 'Opinaldo', 'NA', '1983-11-24', '01_Female', 'Ilocos', '#26', '_13305006_BULBULALA', '_13305_BALAOAN', '_0133_LA_UNION', '09171899259', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '040500665116', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '01_Yes', '01_Yes', '01_Yes', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(47, '265631', 'Emilito Andrew', 'Viloria', 'Ordoño', 'NA', '1992-08-04', '02_Male', 'Ilocos', '93 Purok 2', '_13305024_PANTAR_NORTE', '_13305_BALAOAN', '_0133_LA_UNION', '09317773556', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050000965542', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(48, '263214', 'Mario', 'Rivera', 'Panelo', 'NA', '1962-01-18', '02_Male', 'Ilocos', NULL, '_13301008_NAZARENO', '_13301_AGOO', '_0133_LA_UNION', '09983392214', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000407981', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(49, '263488', 'Arsenia', 'Negrillo', 'Peralta', 'NA', '1976-01-12', '01_Female', 'Ilocos', 'Purok 7', '_13310020_NAPASET', '_13310_LUNA', '_0133_LA_UNION', '09668113582', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '04_Medical_Technologist', '190254237101', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(50, '265752', 'Cecille Faye Giovanetti', 'Lasam', 'Perdigon', 'NA', '1976-01-15', '01_Female', 'Ilocos', 'Purok 7', '_13314042_PAGUDPUD', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09179300893/09230855531', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '12_Physician', '050000961857', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '01_Yes', '01_Yes', '02_No', '01_Yes', '01_Yes', '02_No', '01_Yes', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '01_Yes', '01_Yes', '02_No', '02_No', '01_Yes', '01_Yes', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(51, '264503', 'Cleone Fae', 'Nerona', 'Prepose', 'NA', '1992-02-10', '01_Female', 'Ilocos', 'Purok 1', '_13310021_OAQUI_NO._1', '_13310_LUNA', '_0133_LA_UNION', '09171096092', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050254667118', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '01_Yes', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(52, '263392', 'Claire', 'Villados', 'Ramirez', 'NA', '1977-06-25', '01_Female', 'Ilocos', '13 Rodriguez Street', '_13305012_CABUAAN_OESTE_(POB.)', '_13305_BALAOAN', '_0133_LA_UNION', '09178914437', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050250574824', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(53, '265865', 'Romeo', 'Bactung', 'Raquedan', 'NA', '1964-01-18', '02_Male', 'Ilocos', NULL, '_13305024_PANTAR_NORTE', '_13305_BALAOAN', '_0133_LA_UNION', '09488585658', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000484994', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(54, '265423', 'Ernesto', 'Fontanilla', 'Rola', 'NA', '1978-12-02', '02_Male', 'Ilocos', NULL, '_13305007_BUNGOL', '_13305_BALAOAN', '_0133_LA_UNION', '09758738305', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '190007736766', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(55, '265293', 'Mary Ann', 'Dumlao', 'Soriano', 'NA', '1980-10-31', '01_Female', 'Ilocos', 'Purok 5', '_13314055_SANTIAGO_SUR', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09178874048', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '12_Physician', '050251018410', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '01_Yes', '02_No', '01_Yes', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(56, '263816', 'Mark Anthony', 'Subido', 'Tomboc', 'NA', '1963-05-01', '02_Male', 'Ilocos', 'Purok 2', '_15512003_BUGAYONG', '_15512_BINALONAN', '_0155_PANGASINAN', '09285555706', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '12_Physician', '050000408031', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(57, '263382', 'Catherine Emyruth', 'Tadena', 'Valdez', 'NA', '1971-07-15', '01_Female', 'Ilocos', 'Purok 5, Singson Street', '_13310014_MAGALLANES_(POB.)', '_13310_LUNA', '_0133_LA_UNION', '09459621502', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '190007736774', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(58, '263276', 'Irish Dianne', 'Domondon', 'Valdez', 'NA', '1989-06-07', '01_Female', 'Ilocos', 'Purok 1', '_13305005_BET_ANG', '_13305_BALAOAN', '_0133_LA_UNION', '09618145105', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050252864366', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(59, '263631', 'Karla Coleen', 'Antenor', 'Balanon', 'NA', '1991-10-29', '01_Female', 'Ilocos', 'Purok 2', '_13306021_NAGSABARAN', '_13306_BANGAR', '_0133_LA_UNION', '09123416300', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050255275167', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '01_Yes', '01_Yes', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(60, '265632', 'Daniel', 'Villanueva', 'Casem', 'JR', '1982-01-09', '02_Male', 'Ilocos', 'Purok 4', '_13305007_BUNGOL', '_13305_BALAOAN', '_0133_LA_UNION', '09128958028', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050253451596', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(61, '263063', 'Gremma', 'Opetina', 'Casem', 'NA', '1985-01-31', '01_Female', 'Ilocos', 'Purok 4', '_13305007_BUNGOL', '_13305_BALAOAN', '_0133_LA_UNION', '09158305518', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050251188812', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(62, '265382', 'Lorepe', 'Oblero', 'Cleto', 'NA', '1993-10-27', '01_Female', 'Ilocos', NULL, '_13318002_CORROOY', '_13318_SANTOL', '_0133_LA_UNION', '09982078309', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050255323668', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(63, '263648', 'John Paul', 'Marron', 'Gaerlan', 'NA', '1967-06-05', '02_Male', 'Ilocos', 'Purok 2', '_13305024_PANTAR_NORTE', '_13305_BALAOAN', '_0133_LA_UNION', '09055900686', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050253384619', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(64, '263632', 'Amalia', 'Austria', 'Imperial', 'NA', '1980-12-30', '01_Female', 'Ilocos', '16 San Anastacio Street', '_13306025_CENTRAL_EAST_NO._1_(POB.)', '_13306_BANGAR', '_0133_LA_UNION', '09483303515', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '10_Pharmacist', '050501301350', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(65, '265750', 'Love Joy', 'Meneses', 'Luchina', 'NA', '1990-11-18', '01_Female', 'Ilocos', NULL, '_13305014_CALUNGBUYAN', '_13305_BALAOAN', '_0133_LA_UNION', '09383423722', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '080257802373', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(66, '263791', 'Marilou', 'Mantilla', 'Mosuela', 'NA', '1978-02-28', '01_Female', 'Ilocos', '#038', '_13306011_GENERAL_PRIM_WEST', '_13306_BANGAR', '_0133_LA_UNION', '09120566297', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050254764075', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(67, '264970', 'Wilson', 'Oabe', 'Opetina', 'NA', '1983-05-29', '02_Male', 'Ilocos', NULL, '_13306018_MARIA_CRISTINA_EAST', '_13306_BANGAR', '_0133_LA_UNION', '09183499874', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050501474824', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(68, '265521', 'Eduardo', 'Tumayoc', 'Ordoñez', 'NA', '1976-07-06', '02_Male', 'Ilocos', NULL, '_13318002_CORROOY', '_13318_SANTOL', '_0133_LA_UNION', '09157123560', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050000672642', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(69, '265589', 'Ruelito', 'De Guzman', 'Sabado', 'NA', '1966-01-04', '02_Male', 'Ilocos', NULL, '_13306027_CENTRAL_WEST_NO._1_(POB.)', '_13306_BANGAR', '_0133_LA_UNION', '09099921287', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '13_Radiologic_Technologist', '050501093502', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(70, '263141', 'Beverly', 'Corbilla', 'Soriano', 'NA', '1977-02-19', '01_Female', 'Ilocos', NULL, '_13306024_PARATONG_NO._4', '_13306_BANGAR', '_0133_LA_UNION', '09463465233', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050254725444', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21');
INSERT INTO `registrations` (`id`, `qr_pass_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `birthdate`, `gender`, `region`, `address`, `barangay`, `town_city`, `province`, `contact_no`, `civil_status`, `category`, `category_id`, `category_id_no`, `employment_status`, `profession`, `philhealth`, `pwd_id`, `employer_name`, `employer_address`, `employer_lgu`, `employer_municipality`, `employer_contact_no`, `direct_interaction`, `pregnancy_status`, `drug_allergy`, `food_allergy`, `insect_allergy`, `latex_allergy`, `mold_allergy`, `pet_allergy`, `pollen_allergy`, `with_allergy`, `allergy`, `with_allergy_others`, `hypertension`, `heart_disease`, `kidney_disease`, `diabetes_mellitus`, `bronchial_asthma`, `immuno_deficiency_status`, `cancer`, `comorbidity_others`, `with_comorbidity`, `comorbidity`, `with_comorbidity_others`, `diagnosed`, `covid_classification`, `diagnosed_date`, `consent_vaccination`, `created_at`, `updated_at`) VALUES
(71, '263626', 'Trystan Jay', 'Almodovar', 'Subido', 'NA', '1995-05-20', '02_Male', 'Ilocos', '#0104', '_13303047_ZARAGOSA', '_13303_BACNOTAN', '_0133_LA_UNION', '09389422917', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '13_Radiologic_Technologist', '050255859525', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(72, '263080', 'Jenifer', 'Pongyan', 'Tuquero', 'NA', '1976-06-05', '01_Female', 'Ilocos', 'Proper', '_13318002_CORROOY', '_13318_SANTOL', '_0133_LA_UNION', '09283808918', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '19_Others_', '050000846004', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '01_Yes', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(73, '263636', 'Sheridan Mel', 'Santos', 'Yukee', 'NA', '1992-07-14', '01_Female', 'Ilocos', '#9 National Highway', '_13310020_NAPASET', '_13310_LUNA', '_0133_LA_UNION', '09162872214', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050253649973', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '01_Yes', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(74, '263349', 'Gyzelle Jena', 'Lozano', 'Abrenica', 'NA', '1995-06-18', '01_Female', 'Ilocos', '#87 Waling-waling Street', '_13314015_CABAROAN_(NEGRO)', '_13314_CITY_OF_SAN_FERNANDO', '_0133_LA_UNION', '09757847584', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '04_Medical_Technologist', '052507801102', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(75, '263529', 'Fedmar Jostine', 'Valdez', 'Agtarap', 'NA', '1994-03-29', '02_Male', 'Ilocos', NULL, '_13305031_DR._CAMILO_OSIAS_POB._(CABUAAN_ESTE)', '_13305_BALAOAN', '_0133_LA_UNION', '09959481521', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050256001494', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(76, '263363', 'Aiko', 'Ojastro', 'Casuga', 'NA', '1992-09-27', '01_Female', 'Ilocos', NULL, '_13305019_NAGSABARAN_SUR', '_13305_BALAOAN', '_0133_LA_UNION', '09451837196', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050266334023', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(77, '263242', 'Viola Francia', 'Barrientos', 'Cueva', 'NA', '1988-10-21', '01_Female', 'Ilocos', 'Purok 5', '_13310004_BARRIENTOS', '_13310_LUNA', '_0133_LA_UNION', '09082467162', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050253221930', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(78, '263368', 'Renelyn', 'Ibañez', 'Dacanay', 'NA', '1983-11-30', '01_Female', 'Ilocos', '4', '_13306025_CENTRAL_EAST_NO._1_(POB.)', '_13306_BANGAR', '_0133_LA_UNION', '09167584767', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '190900304939', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(79, '263330', 'Khrizel', 'Mosuela', 'Delfin', 'NA', '1996-12-26', '01_Female', 'Ilocos', 'Zone 002', '_13306019_MARIA_CRISTINA_WEST', '_13306_BANGAR', '_0133_LA_UNION', '09482067392', '05_Living_with_Partner', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '010257572469', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(80, '263448', 'Kathlene Kay', 'Pascua', 'Flores', 'NA', '1991-08-13', '01_Female', 'Ilocos', 'Purok 2', '_13310002_AYAOAN', '_13310_LUNA', '_0133_LA_UNION', '09468380437', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050502215741', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(81, '263643', 'John Matthew', 'Ramos', 'Gaerlan', 'NA', '1991-11-05', '02_Male', 'Ilocos', 'Purok 2', '_13305024_PANTAR_NORTE', '_13305_BALAOAN', '_0133_LA_UNION', '09271692919', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050256083032', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '01_Yes', '01_Yes', '01_Yes', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(82, '263622', 'Ferdinand', 'Comadre', 'Mendoza', 'NA', '1986-09-11', '02_Male', 'Ilocos', NULL, '_13305015_CAMILING', '_13305_BALAOAN', '_0133_LA_UNION', '09983582759', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '052011869076', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(83, '263085', 'Shayne', 'Labao', 'Nelmida', 'NA', '1996-05-09', '01_Female', 'Ilocos', 'Purok 2, #211', '_13310034_SANTO_DOMINGO_NORTE', '_13310_LUNA', '_0133_LA_UNION', '09556052590', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '04_Medical_Technologist', '050256571460', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(84, '263052', 'Glover', 'Mendoza', 'Oabe', 'NA', '1989-09-25', '02_Male', 'Ilocos', 'Purok 2', '_13305015_CAMILING', '_13305_BALAOAN', '_0133_LA_UNION', '09453127326', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050502098389', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(85, '263649', 'Catherine', 'San Jose', 'Ocampo', 'NA', '1977-03-26', '01_Female', 'Ilocos', 'Purok 6', '_13310017_NAGREBCAN', '_13310_LUNA', '_0133_LA_UNION', '09394718971', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050251028858', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '01_Yes', '01_Yes', '01_Yes', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(86, '263291', 'Russel', 'Sabalboro', 'Olbinado', 'NA', '1976-12-23', '01_Female', 'Ilocos', 'Purok 4', '_13305014_CALUNGBUYAN', '_13305_BALAOAN', '_0133_LA_UNION', '09685908541', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '19_Others_', '190257510038', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '01_Yes', '02_No', '02_No', '01_Yes', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(87, '263450', 'Vincent Cloyd', 'Manalang', 'Onato', 'NA', '1987-09-03', '02_Male', 'Ilocos', '#101', '_13310020_NAPASET', '_13310_LUNA', '_0133_LA_UNION', '09666238890', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050502601404', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(88, '263489', 'John Paul', 'Ople', 'Orfiano', 'NA', '1983-11-27', '02_Male', 'Ilocos', NULL, '_13305002_AR_ARAMPANG', '_13305_BALAOAN', '_0133_LA_UNION', '09077778640', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050255966925', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(89, '263936', 'Jeofrey', 'Candong', 'Oriente', 'NA', '1980-05-27', '02_Male', 'Ilocos', NULL, '_13303034_POBLACION', '_13303_BACNOTAN', '_0133_LA_UNION', '09502837608', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050255966941', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(90, '263550', 'Grethel Maricon', 'Raquedan', 'Pascua', 'NA', '1993-07-12', '01_Female', 'Ilocos', NULL, '_13305024_PANTAR_NORTE', '_13305_BALAOAN', '_0133_LA_UNION', '09774736376', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050255351394', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(91, '263227', 'Rashelle', 'Rivera', 'Puno', 'NA', '1988-12-05', '01_Female', 'Ilocos', '33 Dulong Bayan Street', '_13306002_ALZATE', '_13306_BANGAR', '_0133_LA_UNION', '09481370286', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '06_Nurse', '050256340329', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '01_Yes', '02_No', '01_Yes', '01_Yes', '01_Yes', '01_Yes', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(92, '263075', 'Aivee Joy', 'Bucasas', 'Resurreccion', 'NA', '1989-06-26', '01_Female', 'Ilocos', 'Purok 5', '_13305011_BUTUBUT_SUR', '_13305_BALAOAN', '_0133_LA_UNION', '09499952468', '02_Married', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050252213659', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(93, '263558', 'Rod', 'Genetiano', 'Santiago', 'NA', '1995-01-30', '02_Male', 'Ilocos', NULL, '_13305001_APATUT', '_13305_BALAOAN', '_0133_LA_UNION', '09504173130', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050255979598', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '01_Yes', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21'),
(94, '263049', 'Romeo', 'Coloma', 'Villados', 'III', '1993-07-06', '02_Male', 'Ilocos', '#5 Viloria Street, Purok 1', '_13305037_ANTONINO', '_13305_BALAOAN', '_0133_LA_UNION', '09776964689', '01_Single', '01_Health_Care_Worker', '04_Other_ID', NULL, '01_Government_Employed', '18_Administrative_Staff', '050255527565', NULL, 'Balaoan District Hospital', 'Bungol, Balaoan, La Union', NULL, '133 - LA_UNION', '(072) 603-0280', '02_No', '02_Not_Pregnant', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', NULL, NULL, NULL, '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '02_No', '01_Yes', '02_None', NULL, NULL, '02_No', 'NA', NULL, '03_Unknown', '2021-03-09 08:09:21', '2021-03-09 08:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qr_pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Address',
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Address',
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Address',
  `frontline_health_workers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `senior_citizens` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `uniformed_personnel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `teachers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `social_workers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `government_employees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `agriculture_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `food_industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `tranportation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `tourism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `persons_deprived_of_liberty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `persons_with_disability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `ofw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `others_population_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `population_group_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Population Group',
  `lung_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `heart_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `kidney_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `diabetes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `high_blood_pressure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `cancer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `leukemia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `hiv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `mental_problem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `others_health_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `health_condition_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `none_of_the_above` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Health Condition',
  `yes_pregnant_baby` tinyint(4) DEFAULT NULL,
  `no_pregnant_baby` tinyint(4) DEFAULT NULL,
  `yes_currently_pregnant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Pregnant or planning to have a baby',
  `no_currently_pregnant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Pregnant or planning to have a baby',
  `not_sure_currently_pregnant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Pregnant or planning to have a baby',
  `yes_vaccine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Are you willing to be vaccinated with any available Covid-19 vaccine?',
  `no_vaccine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Are you willing to be vaccinated with any available Covid-19 vaccine?',
  `yes_contribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Are you willing to contribute to the vaccination fee?',
  `no_contribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Are you willing to contribute to the vaccination fee?',
  `enough_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccines_not_thoroughly_studied` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `efficacy_rate_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Why? State reasons',
  `safety_reason` tinyint(4) DEFAULT NULL,
  `presence_reason` tinyint(4) DEFAULT NULL,
  `brand_reason` tinyint(4) DEFAULT NULL,
  `pregnant_reason` tinyint(4) DEFAULT NULL,
  `lack_of_information_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Why? State reasons',
  `others_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Why? State reasons',
  `reason_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Why? State reasons',
  `one_hundred_percent_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'How much are you willing to pay for the vaccine fee?',
  `seventy_five_percent_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'How much are you willing to pay for the vaccine fee?',
  `fifty_percent_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'How much are you willing to pay for the vaccine fee?',
  `twenty_five_percent_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'How much are you willing to pay for the vaccine fee?',
  `none_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'How much are you willing to pay for the vaccine fee?',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `qr_pass_id`, `last_name`, `first_name`, `middle_name`, `birthdate`, `gender`, `province`, `town_city`, `barangay`, `frontline_health_workers`, `senior_citizens`, `uniformed_personnel`, `teachers`, `social_workers`, `government_employees`, `agriculture_group`, `food_industry`, `tranportation`, `tourism`, `persons_deprived_of_liberty`, `persons_with_disability`, `ofw`, `others_population_group`, `population_group_other`, `lung_disease`, `heart_disease`, `kidney_disease`, `diabetes`, `high_blood_pressure`, `cancer`, `leukemia`, `hiv`, `mental_problem`, `others_health_condition`, `health_condition_other`, `none_of_the_above`, `yes_pregnant_baby`, `no_pregnant_baby`, `yes_currently_pregnant`, `no_currently_pregnant`, `not_sure_currently_pregnant`, `yes_vaccine`, `no_vaccine`, `yes_contribute`, `no_contribute`, `enough_information`, `vaccines_not_thoroughly_studied`, `efficacy_rate_reason`, `safety_reason`, `presence_reason`, `brand_reason`, `pregnant_reason`, `lack_of_information_reason`, `others_reason`, `reason_other`, `one_hundred_percent_fee`, `seventy_five_percent_fee`, `fifty_percent_fee`, `twenty_five_percent_fee`, `none_fee`, `created_at`, `updated_at`) VALUES
(1, '279961', 'PIñON', 'JOY', 'JARATA', '1977-11-30', 'Female', 'LA UNION', 'AGOO', 'San Antonino', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Drug allergy', '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-01-05 08:55:56', '2021-01-05 08:55:56'),
(8, '315215', 'GALVEZ', 'JOSHUA DAVEYMARL', 'GARCIA', '1999-01-16', 'Male', 'LA UNION', 'ROSARIO', 'Nagtagaan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'unemployed', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:35:45', '2021-02-05 10:35:45'),
(9, '263853', 'Bacomo', 'Alexander', 'Garcia', '1997-07-30', 'Male', 'LA UNION', 'AGOO', 'San Antonio', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:41:00', '2021-02-05 10:41:00'),
(10, '304246', 'MANIPON', 'REANNE PAULINE', 'TONGOL', '1994-02-01', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Lingsat', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:42:11', '2021-02-05 10:42:11'),
(11, '263413', 'Dagang', 'Adamor', 'Llarenas', '1974-11-30', 'Male', 'LA UNION', 'BACNOTAN', 'Nagsimbaanan', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:42:36', '2021-02-05 10:42:36'),
(12, '312455', 'NADAL', 'JOIHANE RHAIKA', 'NOBLE', '2001-08-19', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:45:24', '2021-02-05 10:45:24'),
(13, '263695', 'BUMATAY', 'CAMILLE', 'RELANO', '1994-09-28', 'Female', 'LA UNION', 'LUNA', 'Magallanes (Pob.)', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:45:49', '2021-02-05 10:45:49'),
(14, '321617', 'RAGAY', 'HARRIES', 'CHAN', '1985-12-04', 'Male', 'LA UNION', 'BAUANG', 'Dili', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Telecom Services', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:45:56', '2021-02-05 10:45:56'),
(15, '274537', 'LUNA', 'EDWIN', 'CUEVA', '2000-12-13', 'Male', 'LA UNION', 'LUNA', 'Cantoria No. 1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:51:35', '2021-02-05 10:51:35'),
(16, '312079', 'NOVENCIDO', 'ANA FRANCESCA', 'VIRAY', '2002-12-22', 'Female', 'LA UNION', 'LUNA', 'Victoria (Pob.)', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:52:27', '2021-02-05 10:52:27'),
(17, '263088', 'Calimlim', 'Krystel', 'Lictao', '1990-02-23', 'Female', 'LA UNION', 'NAGUILIAN', 'Tuddingan', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Allergies on food', '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:55:05', '2021-02-05 10:55:05'),
(19, '312038', 'ULPINDO', 'TRIXIA ANN', 'NOVENCIDO', '1996-10-26', 'Female', 'LA UNION', 'BACNOTAN', 'Baroro', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:56:10', '2021-02-05 10:56:10'),
(20, '321640', 'MARBELLA', 'CHERRY ANN', 'AMAR', '1982-07-29', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Parian', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'House keeper', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:57:15', '2021-02-05 10:57:15'),
(21, '321639', 'ORDOñO', 'DAN NATHANIEL', 'MABALLO', '1992-12-09', 'Male', 'LA UNION', 'BALAOAN', 'Butubut Sur', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 10:58:29', '2021-02-05 10:58:29'),
(22, '284997', 'RASAY', 'JORRAINNE NOR', 'PASCUAL', '1994-06-18', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Barangay II (Pob.)', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:00:00', '2021-02-05 11:00:00'),
(23, '295100', 'ORFIANO', 'NORMAN', 'DELFIN', '1987-05-04', 'Male', 'LA UNION', 'BALAOAN', 'Ar-arampang', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:03:51', '2021-02-05 11:03:51'),
(24, '321655', 'CABANSAG JR.', 'ONOFRE', 'CABALTEJA', '1977-12-01', 'Male', 'LA UNION', 'LUNA', 'Nalvo Norte', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Construction Worker', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:07:26', '2021-02-05 11:07:26'),
(25, '293890', 'SABEROLA', 'BARVIE KAREN', 'TAGABENG', '1990-08-23', 'Female', 'LA UNION', 'PUGO', 'Duplas', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 1, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:07:40', '2021-02-05 11:07:40'),
(28, '263399', 'ESPIRITU', 'MARIA ELENA', 'CRUZ', '1981-04-03', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 1, 0, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 0, 0, 0, 1, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:08:31', '2021-02-05 11:08:31'),
(29, '315779', 'DINGLE', 'FERLAN', 'NISPEROS', '1981-04-13', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Tanqui', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:08:45', '2021-02-05 11:08:45'),
(30, '278210', 'OSTREA', 'CESAR', 'ORDOñO', '1956-01-12', 'Male', 'LA UNION', 'BALAOAN', 'Antonino', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:09:12', '2021-02-05 11:09:12'),
(32, '263914', 'Rebultan', 'Christian', 'Graycochea', '1996-01-10', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Bangbangolan', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:10:59', '2021-02-05 11:10:59'),
(33, '321663', 'BUMATAY', 'ELIZABETH', 'RELANO', '1969-05-21', 'Female', 'LA UNION', 'LUNA', 'Victoria (Pob.)', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:12:59', '2021-02-05 11:12:59'),
(34, '263000', 'BALANON', 'JOHN PAUL', 'GARCIA', '1997-06-01', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:12:59', '2021-02-05 11:12:59'),
(35, '263487', 'ALMANZA', 'NORMAN', 'DIONES', '1970-08-03', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Santiago Norte', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:17:12', '2021-02-05 11:17:12'),
(36, '265242', 'BADUA', 'VANESSA', 'CALICDAN', '1986-06-03', 'Male', 'LA UNION', 'BACNOTAN', 'Quirino', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:23:31', '2021-02-05 11:23:31'),
(37, '296382', 'MENDOZA', 'WILFREDO', 'HULIGANGA', '1979-05-18', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Pagdaraoan', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:35:55', '2021-02-05 11:35:55'),
(38, '265274', 'Bang-as', 'Joby', 'Ducusin', '1990-10-11', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 11:40:38', '2021-02-05 11:40:38'),
(39, '315028', 'MIRANDA', 'FEDERICO JR.', 'CABANELA', '1990-02-23', 'Male', 'LA UNION', 'SAN JUAN', 'Cacapian', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:03:16', '2021-02-05 12:03:16'),
(40, '264075', 'Padilla', 'Fraulein', 'Salanga', '1996-09-12', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Canaoay', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:06:42', '2021-02-05 12:06:42'),
(41, '311272', 'BAUTISTA', 'RICALYN', 'TANGALIN', '1995-10-16', 'Female', 'LA UNION', 'AGOO', 'San Antonio', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:07:22', '2021-02-05 12:07:22'),
(42, '263001', 'EBREO', 'MA. ASHLEY', 'APIGO', '1995-12-18', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Tanqui', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:15:00', '2021-02-05 12:15:00'),
(43, '304239', 'LUCERO', 'MARJORIE ANN', 'RAMISCAL', '1990-07-14', 'Female', 'LA UNION', 'BAUANG', 'Quinavite', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:15:07', '2021-02-05 12:15:07'),
(44, '263527', 'FLORES', 'GAERLI', 'CASUGA', '1987-03-30', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Tanqui', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '1', '0', '1', '0', '0', '0', '0', '0', 0, 0, 0, 1, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:17:18', '2021-02-05 12:17:18'),
(45, '315237', 'MANGLUGAY', 'MICHAEL', 'BARBACHANO', '1992-09-01', 'Male', 'LA UNION', 'SUDIPEN', 'Ipet', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:19:08', '2021-02-05 12:19:08'),
(46, '263307', 'Peñaflor', 'Karen Kate', 'Marzo', '1985-10-19', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Parian', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Allergic Rhinitis', '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:20:28', '2021-02-05 12:20:28'),
(47, '264380', 'Patacsil', 'James Andrew', 'Laigo', '1993-07-21', 'Male', 'LA UNION', 'BAUANG', 'Paringao', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:26:00', '2021-02-05 12:26:00'),
(48, '321748', 'CAñOTAL', 'HAYDEE', 'RIVERA', '1980-08-03', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Bangcusay', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Child development worker', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:28:59', '2021-02-05 12:28:59'),
(49, '315220', 'PERALTA', 'ROSE BEL', 'APILADO', '1985-11-28', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Poro', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '1', '0', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:30:05', '2021-02-05 12:30:05'),
(50, '264426', 'Tangalin', 'Elvira', 'Dulay', '1971-10-15', 'Female', 'LA UNION', 'NAGUILIAN', 'Bimmotobot', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:34:41', '2021-02-05 12:34:41'),
(51, '315662', 'GAYO', 'JOMAR', 'VERONA', '1995-12-23', 'Male', 'LA UNION', 'PUGO', 'Duplas', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Filipino cetizen', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:35:16', '2021-02-05 12:35:16'),
(52, '267342', 'AYALA', 'JUNVILLE JOSEPH', 'SISON', '2000-05-01', 'Male', 'LA UNION', 'LUNA', 'Cantoria No. 2', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'STUDENT', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:37:55', '2021-02-05 12:37:55'),
(53, '315245', 'ESTRELLA', 'NIKKO', 'ACOSTA', '1993-02-09', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Barangay I (Pob.)', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'BPO', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:45:01', '2021-02-05 12:45:01'),
(54, '268990', 'FRANKERA', 'REINA LISHEL', 'C', '1990-03-05', 'Female', 'LA UNION', 'BACNOTAN', 'Poblacion', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:48:12', '2021-02-05 12:48:12'),
(55, '265962', 'MARTINEZ', 'AICEL NECY', 'FONTANOS', '1993-12-07', 'Female', 'LA UNION', 'NAGUILIAN', 'Gusing Norte', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Allergy on Alaxan medicine', '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:55:35', '2021-02-05 12:55:35'),
(56, '263526', 'Fontanilla', 'Sharon', 'Acabado', '1971-10-29', 'Female', 'LA UNION', 'BACNOTAN', 'Santa Cruz', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 12:58:35', '2021-02-05 12:58:35'),
(57, '264458', 'Damulog', 'Linda', 'Crispin', '1976-04-13', 'Female', 'LA UNION', 'BAGULIN', 'Cambaly', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:01:30', '2021-02-05 13:01:30'),
(58, '321767', 'POLVOROSA', 'RODAMIE', 'CELESTE', '1995-08-19', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Carlatan', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:04:39', '2021-02-05 13:04:39'),
(59, '284814', 'MARQUES', 'JASTINE', 'LIBERATO', '1995-10-01', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Tanqui', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:06:53', '2021-02-05 13:06:53'),
(60, '264124', 'Sabado', 'Helen', 'Ramirez', '1978-09-25', 'Female', 'LA UNION', 'BAUANG', 'Pilar', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Skin Allergy,  Allergic Rhinitis', '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:08:29', '2021-02-05 13:08:29'),
(61, '263452', 'SACKING', 'AUJE RUSSEL', 'BACATE', '1988-05-21', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Dallangayan Oeste', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:08:56', '2021-02-05 13:08:56'),
(62, '264370', 'Macusi', 'Sheherazade', 'Bacate', '1993-10-16', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Tanqui', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Anxiety/panic attacks', '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:09:13', '2021-02-05 13:09:13'),
(63, '276864', 'NOVELA', 'MARCONS', 'NISPEROS', '1998-06-12', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Cabaroan (Negro)', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'UNEMPLOYED', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'ALLERGIES', '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:09:48', '2021-02-05 13:09:48'),
(64, '263610', 'Tolentino', 'Norma', 'Nisperos', '1968-09-13', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:11:37', '2021-02-05 13:11:37'),
(65, '321792', 'MANTILLA', 'DARREN', 'BEDANIA', '1992-10-18', 'Male', 'LA UNION', 'BANGAR', 'Maria Cristina West', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:14:43', '2021-02-05 13:14:43'),
(66, '279213', 'ROSARIO', 'JEDDAHN', 'PACALSO', '1988-01-16', 'Male', 'LA UNION', 'BAUANG', 'Baccuit Sur', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:16:05', '2021-02-05 13:16:05'),
(67, '263725', 'Calip', 'Ronalyn', 'Pascue', '1981-06-09', 'Female', 'LA UNION', 'SAN JUAN', 'Santo Rosario', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:18:04', '2021-02-05 13:18:04'),
(68, '263513', 'MIFA', 'Jamie Rose', 'Noto', '1984-05-26', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Dalumpinas Oeste', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:26:10', '2021-02-05 13:26:10'),
(69, '321807', 'MUNAR', 'CHEZTER', 'CARIG', '1989-10-25', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Poro', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:28:48', '2021-02-05 13:28:48'),
(70, '315038', 'GORICHO', 'ADRIAN CHEM', 'DE LEON', '1989-03-01', 'Male', 'LA UNION', 'SUDIPEN', 'Bulalaan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:39:31', '2021-02-05 13:39:31'),
(72, '272496', 'ESTILLORE', 'MARIO ANGELO', 'GENOVE', '1990-08-19', 'Male', 'LA UNION', 'NAGUILIAN', 'Ortiz (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:39:48', '2021-02-05 13:39:48'),
(73, '264029', 'MERIS', 'Erroll Ernesto', 'Anies', '1975-04-01', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Lingsat', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:43:58', '2021-02-05 13:43:58'),
(74, '272782', 'ORPILLA', 'ELLA', 'CACHERO', '1969-07-27', 'Female', 'LA UNION', 'NAGUILIAN', 'Lioac Norte', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:51:57', '2021-02-05 13:51:57'),
(75, '272418', 'FLORESCA', 'BRILLANTE JR.', 'BUEN', '1986-05-24', 'Male', 'LA UNION', 'NAGUILIAN', 'Ortiz (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:52:46', '2021-02-05 13:52:46'),
(76, '263705', 'Modag', 'Arlene', 'Dela Rosa', '1998-11-23', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Barangay II (Pob.)', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 13:59:33', '2021-02-05 13:59:33'),
(77, '266642', 'SAIDEN', 'JONALYN', 'BACATE', '1995-06-12', 'Female', 'LA UNION', 'SUDIPEN', 'San Francisco Sur', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:01:28', '2021-02-05 14:01:28'),
(78, '264251', 'SOBREPEÑA', 'VALERIE MARIE', 'VICTORI', '1995-05-13', 'Female', 'LA UNION', 'NAGUILIAN', 'Dal-lipaoen', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 1, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:08:55', '2021-02-05 14:08:55'),
(80, '277637', 'PERALTA', 'IRISH ANGELICA', 'VALDEZ', '1996-06-07', 'Female', 'LA UNION', 'BANGAR', 'Nagsabaran', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', 'Fatty Liver', '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:13:06', '2021-02-05 14:13:06'),
(81, '282049', 'FLORES', 'JENNY', 'DE GUZMAN', '1987-01-03', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Bungro', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Virtual assistant', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:23:02', '2021-02-05 14:23:02'),
(82, '284564', 'VITORIO', 'VILMA SONIA', 'HIPOL', '1972-01-19', 'Female', 'LA UNION', 'NAGUILIAN', 'Sili', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:23:21', '2021-02-05 14:23:21'),
(84, '321848', 'FLORES', 'JANSSEN', 'TUMALIP', '1986-01-15', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Pagudpud', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'BPO', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:24:39', '2021-02-05 14:24:39'),
(85, '264791', 'RIVERA', 'CHRISTIAN JEORGE', 'Carpio', '1992-04-08', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Lingsat', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Business', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:29:20', '2021-02-05 14:29:20'),
(86, '264036', 'balanon', 'jay allan', 'manaois', '1989-07-20', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:50:07', '2021-02-05 14:50:07'),
(87, '263776', 'OCHOCO', 'ALBY', 'SALOMON', '1991-06-28', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 14:58:40', '2021-02-05 14:58:40'),
(88, '264571', 'Sibayan', 'Nestor Glenn', 'Florendo', '1988-03-02', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Lingsat', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '1', 'better to feel the side effect of the vaccine than get sick because of the virus.', '0', '0', '0', '0', '0', '2021-02-05 15:13:15', '2021-02-05 15:13:15'),
(89, '263171', 'Artienda', 'Mark Anthony', 'Flores', '1996-08-16', 'Male', 'LA UNION', 'BAUANG', 'Disso-or', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 15:53:59', '2021-02-05 15:53:59'),
(90, '263854', 'Barrientos', 'John Russell', 'Bueno', '1993-06-24', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Langcuas', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 16:31:50', '2021-02-05 16:31:50'),
(91, '263096', 'banayat', 'john paul', 'bigornia', '1981-02-24', 'Male', 'LA UNION', 'NAGUILIAN', 'Ortiz (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 16:37:59', '2021-02-05 16:37:59'),
(95, '316179', 'TUDINO', 'MINERVA', 'V', '1979-08-07', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Housewife/store owner', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 0, 0, 0, 0, '1', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 21:34:06', '2021-02-05 21:34:06'),
(96, '285460', 'CALURA', 'MARY ROSE', 'PASCUA', '1987-10-12', 'Female', 'LA UNION', 'LUNA', 'Alcala (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 21:49:44', '2021-02-05 21:49:44'),
(97, '321923', 'GUALBERTO', 'MARISSA GRIZELDA', 'LINTAG', '1966-08-17', 'Female', 'LA UNION', 'BAUANG', 'Baccuit Sur', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 22:06:30', '2021-02-05 22:06:30'),
(98, '321924', 'COSTALES', 'ROMEO', 'AGANA', '1968-01-23', 'Male', 'LA UNION', 'BAUANG', 'Santiago', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 22:13:44', '2021-02-05 22:13:44'),
(99, '264409', 'Beligan', 'Jeorina', 'Pitlongay', '1992-12-18', 'Female', 'LA UNION', 'BURGOS', 'New Poblacion', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Allergic rhinitis', '0', 1, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 22:28:25', '2021-02-05 22:28:25'),
(100, '263652', 'joves', 'bryan', 'cera', '1988-02-08', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Santiago Norte', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 22:28:42', '2021-02-05 22:28:42'),
(101, '321929', 'AQUINO', 'JESSICA CORINE', 'PIMENTEL', '2001-02-14', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'San Vicente', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 22:33:32', '2021-02-05 22:33:32'),
(102, '263188', 'Mojica', 'Michael Janu', 'Baring', '1994-01-22', 'Male', 'LA UNION', 'BAUANG', 'Acao', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 22:38:49', '2021-02-05 22:38:49'),
(103, '263709', 'Navarro', 'Christine Paulette', 'Pupa', '1992-04-08', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Cabaroan (Negro)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 22:39:21', '2021-02-05 22:39:21'),
(104, '263571', 'Laroya', 'Emily', 'Madayag', '1965-12-22', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 22:50:45', '2021-02-05 22:50:45'),
(105, '263279', 'fernandez', 'zeus', 'ben', '1971-01-29', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Pagudpud', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:06:00', '2021-02-05 23:06:00'),
(106, '263601', 'del Rosario', 'Francisco', 'Francisco', '1970-04-15', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:08:26', '2021-02-05 23:08:26'),
(107, '265654', 'Pulido jr', 'Efren', 'Apillanes', '1977-07-14', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Francisco', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:13:32', '2021-02-05 23:13:32'),
(109, '263004', 'Sipalay', 'Chris Vincent', 'De Guzman', '1986-07-22', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Ilocanos Norte', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', 'high cholesterol', '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:25:49', '2021-02-05 23:25:49'),
(111, '265566', 'TIMOLA', 'JONATHAN RAYMOND', 'CASUGAY', '1989-01-07', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Francisco', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:32:22', '2021-02-05 23:32:22'),
(112, '270985', 'MESIAS', 'MICHAEL DAVE', 'NAVARRA', '1987-09-22', 'Male', 'LA UNION', 'AGOO', 'Santa Barbara (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:37:27', '2021-02-05 23:37:27'),
(113, '321987', 'DACANAY', 'JENNILYN', 'ADUAN', '1990-07-26', 'Female', 'LA UNION', 'ARINGAY', 'San Benito Sur', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:46:10', '2021-02-05 23:46:10'),
(114, '311576', 'ROMERO', 'MARIA LIEZL', 'FERNANDEZ', '1992-04-24', 'Female', 'LA UNION', 'AGOO', 'San Isidro', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 1, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:49:40', '2021-02-05 23:49:40'),
(115, '270984', 'AGUILAR', 'OLIVER', 'HALOG', '1990-10-03', 'Male', 'LA UNION', 'AGOO', 'Santa Barbara (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:50:36', '2021-02-05 23:50:36'),
(116, '311652', 'ROMERO', 'ROBERT JOSEPH', 'PANELO', '1994-09-08', 'Male', 'LA UNION', 'AGOO', 'San Agustin East', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:50:43', '2021-02-05 23:50:43'),
(117, '282879', 'GURION', 'JAY', 'VELASCO', '1976-12-23', 'Male', 'LA UNION', 'SAN JUAN', 'Taboc', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:51:33', '2021-02-05 23:51:33'),
(118, '311425', 'GALERA', 'MARIANNE', 'LERIOS', '1988-10-14', 'Female', 'LA UNION', 'AGOO', 'San Nicolas East', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:51:48', '2021-02-05 23:51:48'),
(121, '321997', 'HUFANA', 'RINA', 'PADILLA', '1975-06-21', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:55:24', '2021-02-05 23:55:24'),
(122, '311255', 'YANES', 'JADE LESTER', 'BOADO', '1993-10-22', 'Male', 'LA UNION', 'AGOO', 'San Julian East', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-05 23:59:32', '2021-02-05 23:59:32'),
(123, '264302', 'Nisperos', 'Ric', 'Apillanes', '1984-11-17', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Francisco', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:00:43', '2021-02-06 00:00:43'),
(124, '311410', 'VILLAR', 'ERLINDA', 'GAGAZA', '1973-07-07', 'Female', 'LA UNION', 'AGOO', 'San Pedro', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '1', '0', '1', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:00:49', '2021-02-06 00:00:49'),
(125, '263712', 'Niño', 'Joeffrey', 'Santos', '1987-07-08', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Francisco', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:01:13', '2021-02-06 00:01:13'),
(126, '322000', 'CABRERA', 'BERNACEL', 'BALDETAS', '1990-07-19', 'Female', 'LA UNION', 'AGOO', 'San Miguel', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Housewife', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:01:21', '2021-02-06 00:01:21'),
(128, '311498', 'PAGAR', 'MARK ANDREW', 'MONICADO', '1987-12-31', 'Male', 'LA UNION', 'AGOO', 'San Manuel Sur', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:05:27', '2021-02-06 00:05:27'),
(129, '312430', 'ESTILONG', 'MARY ANNE', 'CARREON', '1989-04-23', 'Female', 'LA UNION', 'AGOO', 'San Nicolas Sur (Pob.)', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:05:41', '2021-02-06 00:05:41'),
(130, '264135', 'CABULANG', 'REGOR', 'SRIANO', '1986-06-08', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Agustin', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Hyperthyroidism', '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:10:36', '2021-02-06 00:10:36'),
(131, '322005', 'HIPONIA', 'ARNEL', 'FABIA', '1992-01-01', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Pagudpud', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Entrepreneur', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:10:52', '2021-02-06 00:10:52'),
(132, '311622', 'PADILLA', 'JOHN ALFONSO', 'TONGA', '1994-09-04', 'Male', 'LA UNION', 'AGOO', 'San Joaquin Sur', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:15:38', '2021-02-06 00:15:38'),
(133, '264771', 'Pulido', 'Edmund', 'Apillanes', '1976-03-17', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Francisco', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:19:46', '2021-02-06 00:19:46'),
(134, '293632', 'GARCIA', 'MERLA', 'GALERA', '1978-05-03', 'Female', 'LA UNION', 'AGOO', 'Santa Maria', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Goiter', '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:21:31', '2021-02-06 00:21:31'),
(135, '263119', 'HULIGANGA', 'ALMA', 'DE GUZMAN', '1981-05-15', 'Female', 'LA UNION', 'BAUANG', 'Acao', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:22:40', '2021-02-06 00:22:40'),
(137, '266216', 'DE LAS PEñAS', 'RUTH', 'MAMUYAC', '1991-08-09', 'Female', 'LA UNION', 'BAUANG', 'Quinavite', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:29:06', '2021-02-06 00:29:06'),
(138, '263699', 'Gacayan', 'Sandy', 'Castro', '1995-10-31', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Lingsat', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'hypothyroidism', '0', 1, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:29:18', '2021-02-06 00:29:18'),
(139, '263682', 'Macagba', 'Maria Recah', 'Antolin', '1995-08-17', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Tanqui', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:31:40', '2021-02-06 00:31:40'),
(140, '311667', 'BELENO', 'GIRLIE ANN', 'PAGLINGAYEN', '1995-02-01', 'Female', 'LA UNION', 'AGOO', 'San Antonio', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:34:53', '2021-02-06 00:34:53'),
(141, '268779', 'CAY', 'ARRA DIANA', 'CARIÑO', '1992-11-02', 'Female', 'LA UNION', 'SAN GABRIEL', 'Poblacion', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:43:21', '2021-02-06 00:43:21');
INSERT INTO `surveys` (`id`, `qr_pass_id`, `last_name`, `first_name`, `middle_name`, `birthdate`, `gender`, `province`, `town_city`, `barangay`, `frontline_health_workers`, `senior_citizens`, `uniformed_personnel`, `teachers`, `social_workers`, `government_employees`, `agriculture_group`, `food_industry`, `tranportation`, `tourism`, `persons_deprived_of_liberty`, `persons_with_disability`, `ofw`, `others_population_group`, `population_group_other`, `lung_disease`, `heart_disease`, `kidney_disease`, `diabetes`, `high_blood_pressure`, `cancer`, `leukemia`, `hiv`, `mental_problem`, `others_health_condition`, `health_condition_other`, `none_of_the_above`, `yes_pregnant_baby`, `no_pregnant_baby`, `yes_currently_pregnant`, `no_currently_pregnant`, `not_sure_currently_pregnant`, `yes_vaccine`, `no_vaccine`, `yes_contribute`, `no_contribute`, `enough_information`, `vaccines_not_thoroughly_studied`, `efficacy_rate_reason`, `safety_reason`, `presence_reason`, `brand_reason`, `pregnant_reason`, `lack_of_information_reason`, `others_reason`, `reason_other`, `one_hundred_percent_fee`, `seventy_five_percent_fee`, `fifty_percent_fee`, `twenty_five_percent_fee`, `none_fee`, `created_at`, `updated_at`) VALUES
(142, '311639', 'MARINDUQUE', 'RHEINER', 'LAROYA', '1990-10-27', 'Male', 'LA UNION', 'AGOO', 'San Francisco', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:43:34', '2021-02-06 00:43:34'),
(143, '263108', 'Gapasin', 'Jennifer', 'Estocapio', '1976-09-25', 'Female', 'LA UNION', 'NAGUILIAN', 'Natividad (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:48:15', '2021-02-06 00:48:15'),
(144, '271018', 'GACO', 'RONNIE ARTHUR', 'CARMELO', '1981-06-01', 'Male', 'LA UNION', 'CABA', 'Gana', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 00:59:07', '2021-02-06 00:59:07'),
(145, '266245', 'FLORESCA', 'GIANELLI', 'WAGGAY', '1990-05-11', 'Female', 'LA UNION', 'SAN GABRIEL', 'Poblacion', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 1, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:10:06', '2021-02-06 01:10:06'),
(146, '270980', 'ALBAN', 'KING ROMAR', 'DE CASTRO', '1987-09-21', 'Male', 'LA UNION', 'AGOO', 'Consolacion (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:10:50', '2021-02-06 01:10:50'),
(147, '263516', 'Bugnosen', 'kristian mark moises', 'laron', '1986-06-10', 'Female', 'LA UNION', 'PUGO', 'Saytan', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:11:25', '2021-02-06 01:11:25'),
(148, '268347', 'TARADEL', 'LUZ', 'DE VERA', '1974-11-24', 'Female', 'LA UNION', 'SAN GABRIEL', 'Bumbuneg', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:15:35', '2021-02-06 01:15:35'),
(149, '322058', 'BARO', 'RUFO', 'AGALOOS', '1979-10-03', 'Male', 'LA UNION', 'BACNOTAN', 'Sapilang', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:37:24', '2021-02-06 01:37:24'),
(150, '315985', 'MENDIGORIA', 'CHERRY ANN', 'MAGAYAM', '1991-05-25', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Ordinaryong mamamayan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:40:18', '2021-02-06 01:40:18'),
(151, '311241', 'RILLERA-CARASI', 'CHERISH', 'MENNAO', '1990-08-07', 'Female', 'LA UNION', 'NAGUILIAN', 'Ortiz (Pob.)', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 1, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:41:11', '2021-02-06 01:41:11'),
(152, '264479', 'Javier', 'Harvey Aureo Jr.', 'Pableo', '1994-04-01', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Francisco', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:47:19', '2021-02-06 01:47:19'),
(153, '322069', 'MANZANO', 'ROTHELANDO, JR.', 'ABAT', '1986-02-19', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Francisco', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Allergic Rhinitis, Sinusitis, Pollen and dust allergy', '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 01:49:21', '2021-02-06 01:49:21'),
(154, '322074', 'BARREDO', 'MARC', 'DE LA PEñA', '1985-08-27', 'Male', 'LA UNION', 'SAN JUAN', 'Ili Norte (Pob.)', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:03:19', '2021-02-06 02:03:19'),
(155, '263594', 'Sibayan', 'John Paul', 'Gurtiza', '1990-09-26', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Canaoay', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:15:50', '2021-02-06 02:15:50'),
(156, '296071', 'BARADAS', 'PAUL WILFRED', 'QUINSAAT', '1986-10-05', 'Male', 'LA UNION', 'SAN JUAN', 'Santa Rosa', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:27:22', '2021-02-06 02:27:22'),
(157, '322093', 'CASUGAY', 'CRISTITO JR', 'GIRON', '1987-11-26', 'Male', 'LA UNION', 'SAN JUAN', 'Taboc', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Self-employed', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:30:08', '2021-02-06 02:30:08'),
(158, '266381', 'BELLO', 'LALLAINE JEANETTE', 'SALOMON', '1977-08-08', 'Female', 'LA UNION', 'BANGAR', 'Maria Cristina East', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:31:04', '2021-02-06 02:31:04'),
(159, '275229', 'OBILLE', 'JOENEL', 'GAOAEN', '1971-06-04', 'Male', 'LA UNION', 'BALAOAN', 'Butubut Oeste', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:32:54', '2021-02-06 02:32:54'),
(160, '313254', 'FLORES', 'MARJORIE ANN', 'GABRIEL', '1991-05-03', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Canaoay', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:36:55', '2021-02-06 02:36:55'),
(161, '311427', 'GAYO', 'JEOVY', 'MEJIA', '1966-05-26', 'Female', 'LA UNION', 'AGOO', 'Santa Rita West', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:57:48', '2021-02-06 02:57:48'),
(162, '321477', 'MEDRIANO', 'MARY GRACE', 'DUNGCA', '1988-06-30', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Poro', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:58:44', '2021-02-06 02:58:44'),
(163, '322080', 'VALDEZ', 'JOANNA MARIE', 'HUFALAR', '1997-08-26', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Pagdaraoan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 02:58:48', '2021-02-06 02:58:48'),
(164, '322130', 'GAYO', 'JEO RONEL', 'MEJIA', '1994-09-24', 'Male', 'LA UNION', 'AGOO', 'Santa Rita West', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Self employed', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 03:13:42', '2021-02-06 03:13:42'),
(165, '312696', 'NOVENCIDO', 'ANA RAPHAELLE', 'VIRAY', '1998-09-29', 'Female', 'LA UNION', 'LUNA', 'Victoria (Pob.)', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 03:19:19', '2021-02-06 03:19:19'),
(166, '311490', 'BOADO', 'EILEEN', 'CENTENO', '1987-11-12', 'Female', 'LA UNION', 'AGOO', 'San Nicolas East', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 03:33:22', '2021-02-06 03:33:22'),
(167, '263711', 'Timoteo', 'Rowell', 'Buenavista', '1982-11-03', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Pagdaraoan', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 03:34:52', '2021-02-06 03:34:52'),
(168, '267565', 'LICOS', 'ARACELI', 'SANTOS', '1966-04-28', 'Female', 'LA UNION', 'SAN GABRIEL', 'Poblacion', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 03:49:39', '2021-02-06 03:49:39'),
(169, '268311', 'QUIROS', 'RIZALINA', 'TUGELIDA', '1971-06-27', 'Female', 'LA UNION', 'SAN GABRIEL', 'Poblacion', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 03:58:38', '2021-02-06 03:58:38'),
(170, '311507', 'ECOBIZA', 'DOLORES LOLITA', 'SOTELO', '1964-02-08', 'Female', 'LA UNION', 'AGOO', 'Santa Rita (Nalinac)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 04:37:30', '2021-02-06 04:37:30'),
(171, '264391', 'Niñalga', 'Mariquet', 'Cargado', '1972-04-03', 'Female', 'LA UNION', 'AGOO', 'Ambitacay', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 04:39:55', '2021-02-06 04:39:55'),
(172, '311553', 'ECOBIZA', 'EDWIN', 'DIFUNTORUM', '1971-03-23', 'Male', 'LA UNION', 'AGOO', 'Santa Rita (Nalinac)', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 04:43:26', '2021-02-06 04:43:26'),
(173, '322274', 'CORPUZ', 'ROQUE', 'AMANDO', '1981-05-11', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Utility - Electric', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 05:20:43', '2021-02-06 05:20:43'),
(174, '311537', 'REGACHO', 'CHARINA', 'FIESTA', '1981-08-15', 'Female', 'LA UNION', 'AGOO', 'San Antonino', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 05:34:28', '2021-02-06 05:34:28'),
(175, '304347', 'HUFANA', 'EDGAR', 'PABILLONAR', '1967-12-25', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'San Agustin', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 05:38:23', '2021-02-06 05:38:23'),
(176, '263600', 'ESCALO', 'Diana Jean', 'Del Campo', '1959-10-19', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Parian', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 05:50:40', '2021-02-06 05:50:40'),
(177, '263087', 'España', 'Valerie', 'Bulan', '1987-07-10', 'Female', 'LA UNION', 'NAGUILIAN', 'Tuddingan', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', 0, 0, 0, 1, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 06:53:57', '2021-02-06 06:53:57'),
(178, '263084', 'Soriano', 'Geraldine', 'Cachero', '1981-08-26', 'Female', 'LA UNION', 'NAGUILIAN', 'Lioac Sur', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 07:39:56', '2021-02-06 07:39:56'),
(179, '263239', 'Santos', 'Bernard', 'Mangaoang', '1989-05-16', 'Male', 'LA UNION', 'SAN JUAN', 'Talogtog', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 07:53:29', '2021-02-06 07:53:29'),
(180, '263502', 'Pasuquin', 'Rodney', 'Atilano', '1988-01-28', 'Male', 'LA UNION', 'NAGUILIAN', 'Bato', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', 'Dyslipidemia', '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 07:56:32', '2021-02-06 07:56:32'),
(181, '294100', 'JUAN', 'CHRISTINE', 'REYES', '1991-04-06', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Pias', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'IP', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 08:03:50', '2021-02-06 08:03:50'),
(182, '322427', 'MILANES', 'MARIDEN', 'CALONGE', '1984-10-08', 'Female', 'LA UNION', 'AGOO', 'San Julian West', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'BHERTS/4P\'S', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Food allergy', '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 08:17:22', '2021-02-06 08:17:22'),
(183, '322407', 'RIVERA', 'SHEMALYN', 'M', '1985-02-13', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Dallangayan Oeste', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Vendor', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 0, 0, 0, 0, '1', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 08:54:35', '2021-02-06 08:54:35'),
(185, '312566', 'VENTURA', 'ERICK', 'R', '1987-06-03', 'Male', 'LA UNION', 'AGOO', 'San Antonino', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 09:27:50', '2021-02-06 09:27:50'),
(187, '322490', 'MADAYAG', 'CARLA MARIE', 'RAMOS', '1999-09-06', 'Female', 'LA UNION', 'BAUANG', 'Pagdalagan Sur', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Estudyante', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '1', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 10:54:57', '2021-02-06 10:54:57'),
(188, '263703', 'Dy Yaco', 'Michael Angelo', 'Donarbe', '1994-10-08', 'Male', 'LA UNION', 'AGOO', 'San Antonio', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 11:47:03', '2021-02-06 11:47:03'),
(189, '264434', 'CASIL', 'WARREN', 'FELICIANO', '1983-10-05', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 11:54:15', '2021-02-06 11:54:15'),
(190, '322534', 'ANTIPORDA', 'EARVIN CALROSS', 'INES', '1987-07-16', 'Male', 'LA UNION', 'NAGUILIAN', 'Ortiz (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 12:41:32', '2021-02-06 12:41:32'),
(191, '263818', 'ALVIAR', 'RONALD ALLAN', 'GABRIEL', '1981-01-20', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Carlatan', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 12:51:47', '2021-02-06 12:51:47'),
(192, '312322', 'DIFUNTORUM', 'MILAGROS', 'LAROYA', '1957-10-08', 'Female', 'LA UNION', 'AGOO', 'Macalva Sur', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 13:00:19', '2021-02-06 13:00:19'),
(193, '322555', 'PULANCO', 'ALFONSO', 'R', '1957-01-20', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-06 14:00:54', '2021-02-06 14:00:54'),
(194, '263486', 'DELIZO', 'VENICE', 'BELEN', '1988-08-13', 'Female', 'LA UNION', 'NAGUILIAN', 'Ortiz (Pob.)', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 00:06:08', '2021-02-07 00:06:08'),
(195, '263117', 'RIVERA', 'MYLA CLARISSA', 'CASUGA', '1971-11-26', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sacyud', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 00:07:12', '2021-02-07 00:07:12'),
(196, '263590', 'Turco', 'Kristina Joy', 'Hufana', '1989-12-18', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Poro', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Food allergies on crab, seasonal allergies, dermatographia', '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 01:18:03', '2021-02-07 01:18:03'),
(197, '321496', 'BOYONEN', 'SONNY FE', 'GREGORIO', '1995-02-16', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '1', 'Effectiveness of vaccine', '0', '0', '0', '0', '0', '2021-02-07 08:30:23', '2021-02-07 08:30:23'),
(198, '322742', 'HASIGAN', 'JANET', 'BATRINA', '1982-11-12', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Ilocanos Sur', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'tindera', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 08:38:36', '2021-02-07 08:38:36'),
(199, '265234', 'BUCSIT', 'AILEEN', 'LOPEZ', '1991-03-21', 'Female', 'LA UNION', 'BACNOTAN', 'Raois', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 10:43:58', '2021-02-07 10:43:58'),
(200, '322780', 'PULANCO', 'KEVIN', 'MIRANDA', '1994-09-16', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Retail', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 11:26:46', '2021-02-07 11:26:46'),
(201, '322832', 'AVILA', 'NOREJOEY', 'CABANELA', '1989-12-28', 'Male', 'LA UNION', 'SAN JUAN', 'Panicsican', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 14:47:37', '2021-02-07 14:47:37'),
(202, '322834', 'AVILA', 'HIEZLYN RIENA', 'BAñEZ', '1990-04-28', 'Female', 'LA UNION', 'BAUANG', 'Paringao', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 14:48:49', '2021-02-07 14:48:49'),
(203, '296427', 'NOVALES', 'RENEL', 'GAGARIN', '2003-01-19', 'Male', 'LA UNION', 'LUNA', 'Magallanes (Pob.)', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-07 22:44:38', '2021-02-07 22:44:38'),
(204, '263350', 'EDURIA', 'EDENEL ELIZA', 'LAGLIVA', '1992-09-16', 'Female', 'LA UNION', 'AGOO', 'San Agustin Sur', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 00:13:32', '2021-02-08 00:13:32'),
(205, '322943', 'FRIANEZA', 'CHARITY', 'JIMENEZ', '1980-06-06', 'Female', 'LA UNION', 'AGOO', 'San Marcos', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 01:07:58', '2021-02-08 01:07:58'),
(206, '322941', 'FOYAGAO', 'LARAINE JANE', 'DENA-EN', '1995-06-12', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 01:10:01', '2021-02-08 01:10:01'),
(207, '322946', 'BALUGAT', 'MELVIN', 'TALANGO', '1992-12-26', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 01:12:28', '2021-02-08 01:12:28'),
(208, '321906', 'FLORES', 'ALMA', 'MARZO', '1986-11-06', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Santiago Norte', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Housewife', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 01:27:27', '2021-02-08 01:27:27'),
(209, '322996', 'SURIBEN', 'APHRODITE', 'MACUSI', '1976-07-22', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Lingsat', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Freelancer', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 01:44:33', '2021-02-08 01:44:33'),
(210, '322955', 'ABUBO', 'BERNADETTE', 'GAPASIN', '1992-11-25', 'Female', 'LA UNION', 'BAUANG', 'Palugsi-Limmansangan', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 01:45:23', '2021-02-08 01:45:23'),
(211, '304819', 'MERIS', 'CHRISTY', 'FLORA', '1982-09-10', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Poro', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 02:34:29', '2021-02-08 02:34:29'),
(212, '263893', 'ACOSTA', 'MARISSA', 'DANIO', '1970-03-15', 'Female', 'LA UNION', 'ARINGAY', 'Poblacion', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 02:46:14', '2021-02-08 02:46:14'),
(213, '263751', 'APILADO', 'MARILYN', 'GALVEZ', '1966-01-17', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 02:53:22', '2021-02-08 02:53:22'),
(214, '263722', 'PAGUEL', 'LENITH', 'DURAN', '1995-05-02', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Biday', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 02:57:37', '2021-02-08 02:57:37'),
(215, '268447', 'CARDENAS', 'RIKA ROSETTE', 'VALDEZ', '1985-02-24', 'Female', 'LA UNION', 'SANTOL', 'Corrooy', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 03:57:49', '2021-02-08 03:57:49'),
(216, '264066', 'Caringal-Guianan', 'Julienne Gayle', 'Valdez', '1982-07-03', 'Female', 'LA UNION', 'BAUANG', 'Santiago', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 04:00:40', '2021-02-08 04:00:40'),
(217, '264063', 'Ochoco', 'Mia Jayn', 'Pimentel', '1990-09-22', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sagayad', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 04:02:58', '2021-02-08 04:02:58'),
(218, '322179', 'PULIDO', 'ANNALYN', 'DISTURA', '1964-11-28', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Store owner', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 04:13:15', '2021-02-08 04:13:15'),
(219, '323213', 'ORPILLA', 'OLIVIA', 'GUNDRAN', '1977-03-02', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'House wife', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 04:23:52', '2021-02-08 04:23:52'),
(220, '294998', 'SEGUNDO', 'GYLE', 'ESTRADA', '2000-07-09', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Dalumpinas Este', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 04:23:53', '2021-02-08 04:23:53'),
(222, '263047', 'Fernandez', 'May', 'Abon', '1979-05-07', 'Female', 'LA UNION', 'SANTO TOMAS', 'Namonitan', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 05:13:38', '2021-02-08 05:13:38'),
(223, '270703', 'NOTO', 'FELIX', 'ORMITA', '1979-07-29', 'Male', 'LA UNION', 'BANGAR', 'Alzate', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Barber', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 06:19:13', '2021-02-08 06:19:13'),
(224, '323250', 'BALANON', 'MAGDALENA MINA', 'VALDEZ', '1976-10-03', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Cabaroan (Negro)', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Barangay Tanod', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 0, 0, 0, 0, '1', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 10:47:43', '2021-02-08 10:47:43'),
(225, '278214', 'OSTREA', 'CAROLINA TRINIDAD', 'GINES', '1956-03-28', 'Female', 'LA UNION', 'BALAOAN', 'Antonino', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 11:12:03', '2021-02-08 11:12:03'),
(226, '323633', 'CONCHA', 'HARVEY', 'SISON', '1992-04-23', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Poro', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 12:16:55', '2021-02-08 12:16:55'),
(227, '323645', 'FUDOLIG', 'JOAQUIN', 'FUDOLIG', '1996-07-04', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Carlatan', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 12:33:59', '2021-02-08 12:33:59'),
(228, '323660', 'PATACSIL', 'JULIE ANN', 'MARTINEZ', '1995-04-17', 'Female', 'LA UNION', 'NAGUILIAN', 'Angin', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Unemployed', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 1, 0, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 13:11:34', '2021-02-08 13:11:34'),
(229, '323672', 'RILLERA', 'CLAUDIO', 'OBINARIO', '1968-06-18', 'Male', 'LA UNION', 'NAGUILIAN', 'Cabaritan Sur', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'professional', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 13:37:12', '2021-02-08 13:37:12'),
(230, '323681', 'ABENOJA', 'NIñO', 'LAVENGCO', '1980-05-10', 'Male', 'LA UNION', 'BAUANG', 'Central East (Pob.)', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'mamamayan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 13:49:41', '2021-02-08 13:49:41'),
(231, '323714', 'BALALA', 'DIONESIO', 'PAJARILLO', '1988-12-17', 'Male', 'LA UNION', 'LUNA', 'Suyo', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-08 20:22:24', '2021-02-08 20:22:24'),
(232, '280311', 'DELLIMA', 'RHEMELYN', 'BALAIS', '1984-11-10', 'Female', 'LA UNION', 'AGOO', 'Nazareno', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 01:17:57', '2021-02-09 01:17:57'),
(233, '263793', 'Salamanca', 'Brian Keith', 'Flores', '1990-09-11', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 02:26:41', '2021-02-09 02:26:41'),
(234, '266306', 'CAMPOS', 'JUDY ANN MAE', 'REGASPI', '1996-09-14', 'Female', 'LA UNION', 'ARINGAY', 'San Juan East', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 04:57:06', '2021-02-09 04:57:06'),
(235, '274916', 'CABASAG', 'SHIRLEY', 'MALLARI', '1980-06-09', 'Female', 'LA UNION', 'AGOO', 'Santa Maria', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Barangay kagawad', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 07:50:40', '2021-02-09 07:50:40'),
(236, '324315', 'KIMBERLY', 'JUCUTAN', 'SISON', '1995-11-23', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Pagudpud', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'N/A', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 09:09:23', '2021-02-09 09:09:23'),
(238, '295326', 'CAMBA', 'CHARLENE', 'DOMINGO', '1993-06-07', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '1', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 10:25:46', '2021-02-09 10:25:46'),
(239, '324377', 'ABASOLO', 'KARISSA', 'ESEO', '2000-03-09', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Catbangen', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'None', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 10:28:06', '2021-02-09 10:28:06'),
(240, '324388', 'MADAYAG', 'DJAMAFE AUREEN MICHELLE', 'SOTTO', '1990-10-08', 'Female', 'LA UNION', 'BACNOTAN', 'Raois', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 10:46:54', '2021-02-09 10:46:54'),
(241, '324390', 'MADAYAG', 'MARYBETH DJAUANNE', 'SOTTO', '1999-03-25', 'Female', 'LA UNION', 'BACNOTAN', 'Raois', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 10:51:57', '2021-02-09 10:51:57'),
(243, '324430', 'LUBRICA', 'ALEX', 'ABAGA', '1985-10-07', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Santiago Sur', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Merchandiser', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 12:00:03', '2021-02-09 12:00:03'),
(244, '324448', 'EBUEZA', 'NIKKA JANE', 'DASALLA', '1990-02-18', 'Female', 'LA UNION', 'SAN JUAN', 'Urbiztondo', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Allergy Rhinitis', '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 12:20:01', '2021-02-09 12:20:01'),
(245, '324462', 'YARIS', 'WILSON', 'DE GUZMAN', '1990-09-01', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Carlatan', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 12:50:38', '2021-02-09 12:50:38'),
(247, '324465', 'GALONG', 'HAZEL', 'PASIKING', '1996-08-04', 'Female', 'BENGUET', 'TUBA', 'Taloy Sur', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'IP', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 13:03:11', '2021-02-09 13:03:11'),
(248, '315634', 'JACOB', 'ABELEND', 'FLORENDO', '1986-07-13', 'Male', 'LA UNION', 'ROSARIO', 'Poblacion West', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 23:49:41', '2021-02-09 23:49:41'),
(249, '315393', 'BICERA', 'MARIVIC', 'MERCADO', '1983-03-29', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Biday', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'field researcher', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 1, 0, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-09 23:53:02', '2021-02-09 23:53:02'),
(250, '324326', 'JUCOTAN JR.', 'DOMINADOR', 'LAGUITAN', '1971-10-29', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Pagudpud', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'N/A', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 03:40:34', '2021-02-10 03:40:34'),
(251, '265279', 'Marvida', 'Cristina', 'Carbonell', '1980-05-15', 'Female', 'LA UNION', 'ROSARIO', 'Tay-ac', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 05:13:08', '2021-02-10 05:13:08'),
(252, '325073', 'GUILANDA', 'MELCHOR', 'GALAO-EY', '1985-08-15', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 08:41:13', '2021-02-10 08:41:13'),
(253, '325099', 'GALZOTE', 'EMIL', 'TUANGCO', '1970-01-09', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Lingsat', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Pastor/Missionary', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 09:09:30', '2021-02-10 09:09:30'),
(254, '324900', 'RICARDO', 'LORAINE', 'MARQUEZ', '1995-01-30', 'Female', 'LA UNION', 'BALAOAN', 'Napaset', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 10:08:59', '2021-02-10 10:08:59'),
(255, '266168', 'CARLOS', 'JANDEE', 'MIGUEL', '1987-05-27', 'Male', 'LA UNION', 'AGOO', 'Nazareno', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 10:48:46', '2021-02-10 10:48:46'),
(256, '274229', 'MARZAN', 'PEDRO', 'PAYOYO', '1976-04-15', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Pagdaraoan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Training center operator', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 11:58:18', '2021-02-10 11:58:18'),
(258, '325182', 'DELLA', 'ALEXANDER', 'DAVID', '1973-03-13', 'Male', 'LA UNION', 'AGOO', 'San Antonio', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Drugs and Medicines Distributor', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 22:54:48', '2021-02-10 22:54:48'),
(259, '325287', 'CACDAC', 'SONIA', 'NUDAS', '1985-10-20', 'Female', 'LA UNION', 'NAGUILIAN', 'Natividad (Pob.)', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-10 23:00:17', '2021-02-10 23:00:17'),
(260, '325320', 'BITANGA', 'KRISTINE', 'VICTORIANO', '1979-03-02', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Tanqui', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Call center', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-11 00:33:49', '2021-02-11 00:33:49'),
(261, '325346', 'MAGNO', 'MARINELA THEA', 'CRISOSTOMO', '1996-12-27', 'Female', 'LA UNION', 'AGOO', 'Santa Ana', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Auditor', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-11 01:13:25', '2021-02-11 01:13:25'),
(262, '325613', 'JUCUTAN', 'CLARISSE JOY', 'NEBRES', '1992-08-10', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Dallangayan Oeste', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 1, 0, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-11 06:34:44', '2021-02-11 06:34:44'),
(263, '270968', 'HIPONA', 'JULIE ANN', 'BAYBAYAN', '1990-07-02', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Pias', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-11 06:55:46', '2021-02-11 06:55:46'),
(264, '325652', 'MANUEL', 'ATHENA ERICKA', 'GIRON', '1995-05-18', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Carlatan', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-11 07:21:33', '2021-02-11 07:21:33'),
(265, '325641', 'OLIGARIO', 'REMAL', 'BALCITA', '1993-03-15', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Tanqui', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-11 07:21:47', '2021-02-11 07:21:47'),
(266, '304248', 'SIBAYAN', 'KIMBERLY', 'NERIDA', '1996-11-20', 'Female', 'LA UNION', 'LUNA', 'Nalvo Sur', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-11 10:03:02', '2021-02-11 10:03:02'),
(267, '274095', 'ESPANTO', 'MA. CLEOFE', 'DULAY', '1985-08-14', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Barangay II (Pob.)', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-11 13:18:38', '2021-02-11 13:18:38');
INSERT INTO `surveys` (`id`, `qr_pass_id`, `last_name`, `first_name`, `middle_name`, `birthdate`, `gender`, `province`, `town_city`, `barangay`, `frontline_health_workers`, `senior_citizens`, `uniformed_personnel`, `teachers`, `social_workers`, `government_employees`, `agriculture_group`, `food_industry`, `tranportation`, `tourism`, `persons_deprived_of_liberty`, `persons_with_disability`, `ofw`, `others_population_group`, `population_group_other`, `lung_disease`, `heart_disease`, `kidney_disease`, `diabetes`, `high_blood_pressure`, `cancer`, `leukemia`, `hiv`, `mental_problem`, `others_health_condition`, `health_condition_other`, `none_of_the_above`, `yes_pregnant_baby`, `no_pregnant_baby`, `yes_currently_pregnant`, `no_currently_pregnant`, `not_sure_currently_pregnant`, `yes_vaccine`, `no_vaccine`, `yes_contribute`, `no_contribute`, `enough_information`, `vaccines_not_thoroughly_studied`, `efficacy_rate_reason`, `safety_reason`, `presence_reason`, `brand_reason`, `pregnant_reason`, `lack_of_information_reason`, `others_reason`, `reason_other`, `one_hundred_percent_fee`, `seventy_five_percent_fee`, `fifty_percent_fee`, `twenty_five_percent_fee`, `none_fee`, `created_at`, `updated_at`) VALUES
(268, '326215', 'ANTONIO', 'MAY ANN', 'DR', '1989-05-01', 'Female', 'BULACAN', 'HAGONOY', 'Palapat', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Banking', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-12 09:39:23', '2021-02-12 09:39:23'),
(269, '324531', 'OCAMPO', 'BENEDICK', 'GARCIA', '1980-02-28', 'Male', 'NUEVA ECIJA', 'ZARAGOZA', 'Santo Rosario Young', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Farmer', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-12 11:24:31', '2021-02-12 11:24:31'),
(270, '326255', 'CELLONA', 'FRESHNEDIE', 'ARIOLA', '1970-01-17', 'Male', 'LA UNION', 'BAUANG', 'Paringao', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Private Employee', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-12 12:15:24', '2021-02-12 12:15:24'),
(271, '294780', 'MARASIGAN', 'JOHN BENEDICT', 'CARIÑO', '1994-09-08', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-12 23:43:03', '2021-02-12 23:43:03'),
(272, '326593', 'ROSAL', 'ZENAIDA', 'GARCIA', '1985-12-17', 'Female', 'LA UNION', 'ARINGAY', 'San Benito Sur', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 0, 0, 1, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-13 14:04:30', '2021-02-13 14:04:30'),
(273, '326617', 'ZAMORANOS', 'JOSEPH', 'MUNOZ', '1999-08-20', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Lingsat', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', 'Student', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-14 00:34:08', '2021-02-14 00:34:08'),
(275, '326392', 'TIMBREZA', 'JONATHAN JULIUS', 'BRIONES', '1991-07-06', 'Male', 'LA UNION', 'SAN FERNANDO CITY', 'Barangay III (Pob.)', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 0, '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-14 08:42:14', '2021-02-14 08:42:14'),
(277, '326740', 'GALLA', 'YANI', 'PALADIO', '1994-12-04', 'Female', 'LA UNION', 'SAN FERNANDO CITY', 'Sevilla', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '1', 0, 1, '0', '1', '0', '0', '1', '0', '0', '0', '0', '0', 1, 0, 0, 0, '0', '0', NULL, '0', '0', '0', '0', '0', '2021-02-14 12:42:11', '2021-02-14 12:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospital` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `hospital`, `email_verified_at`, `username`, `password`, `group_id`, `profession`, `prc_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sly', NULL, 'Flores', 'sly@christian.com.ph', 1, '2021-02-15 01:00:17', 'sly', '$2y$10$KudkarrcIKXwie6Z4NvDzuauci.8E0rz/Zenga4wLe8jRVVh1WNfq', 1, 'Malupet', NULL, NULL, '2021-02-15 01:00:17', '2021-03-22 05:59:11'),
(13, 'Gerry', NULL, 'Binas-o', NULL, NULL, NULL, 'gerry', '$2y$10$R4q5oY6ioUJ8PvmPNrFEQO8EjuCRRK56d1CeZCzOgZASRUaZN6usq', 5, NULL, NULL, NULL, '2021-02-16 09:07:13', '2021-02-16 09:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qr_pass_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccination_facility` int(11) DEFAULT NULL,
  `facility_others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccination_session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosages`
--
ALTER TABLE `dosages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccines_user_id_foreign` (`user_id`),
  ADD KEY `dosages_vaccine_id_foreign` (`vaccine_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post_assessments`
--
ALTER TABLE `post_assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_assessments_vaccine_id_foreign` (`dosage_id`);

--
-- Indexes for table `pre_assessments`
--
ALTER TABLE `pre_assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pre_assessments_vaccine_id_foreign` (`dosage_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registrations_qr_pass_id_unique` (`qr_pass_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surveys_qr_pass_id_unique` (`qr_pass_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosages`
--
ALTER TABLE `dosages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_assessments`
--
ALTER TABLE `post_assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pre_assessments`
--
ALTER TABLE `pre_assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosages`
--
ALTER TABLE `dosages`
  ADD CONSTRAINT `dosages_vaccine_id_foreign` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccines` (`id`),
  ADD CONSTRAINT `vaccines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `post_assessments`
--
ALTER TABLE `post_assessments`
  ADD CONSTRAINT `post_assessments_vaccine_id_foreign` FOREIGN KEY (`dosage_id`) REFERENCES `dosages` (`id`);

--
-- Constraints for table `pre_assessments`
--
ALTER TABLE `pre_assessments`
  ADD CONSTRAINT `pre_assessments_vaccine_id_foreign` FOREIGN KEY (`dosage_id`) REFERENCES `dosages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
