-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 02:12 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_bagckground_degree`
--

CREATE TABLE `academic_bagckground_degree` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `major` varchar(150) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `faculty_name` varchar(150) DEFAULT NULL,
  `percentage` varchar(20) DEFAULT NULL,
  `thesis_name` varchar(200) DEFAULT NULL,
  `rank` varchar(45) DEFAULT NULL,
  `recieve_date` date DEFAULT NULL,
  `academic_background_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `academic_interest`
--

CREATE TABLE `academic_interest` (
  `id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `term` varchar(10) DEFAULT NULL,
  `applied_degree` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `academic_interest_research_topic`
--

CREATE TABLE `academic_interest_research_topic` (
  `research_topic_id` int(11) NOT NULL,
  `academic_interest_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `agreement_of_academic_department` tinyint(4) DEFAULT '0',
  `application_form` tinyint(4) DEFAULT '0',
  `statment_of_purpose` tinyint(4) DEFAULT '0',
  `bsc_cert` tinyint(4) DEFAULT '0',
  `msc_cert` tinyint(4) DEFAULT '0',
  `bsc_transscript` tinyint(4) DEFAULT '0',
  `msc_transcript` tinyint(4) DEFAULT '0',
  `msc_summary` tinyint(4) DEFAULT '0',
  `letter_1` tinyint(4) DEFAULT '0',
  `letter_2` tinyint(4) DEFAULT '0',
  `letter_3` tinyint(4) DEFAULT '0',
  `english_cert` tinyint(4) DEFAULT '0',
  `personal_photo` tinyint(4) DEFAULT '0',
  `military_cert` tinyint(4) DEFAULT '0',
  `id_scan` tinyint(4) DEFAULT '0',
  `marriage_cert` tinyint(4) DEFAULT '0',
  `children_birth_cert` tinyint(4) DEFAULT '0',
  `confirm_date` date DEFAULT NULL,
  `submission_id` int(11) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `country_Code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `landline` varchar(20) DEFAULT NULL,
  `country_Code` varchar(3) NOT NULL,
  `city_Id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `street` varchar(25) DEFAULT NULL,
  `buliding_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `Code` varchar(3) NOT NULL,
  `Name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `english_test`
--

CREATE TABLE `english_test` (
  `id` int(11) NOT NULL,
  `english_language_test` varchar(20) DEFAULT NULL,
  `score` varchar(10) DEFAULT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `financial_source`
--

CREATE TABLE `financial_source` (
  `id` int(11) NOT NULL,
  `source` varchar(45) DEFAULT NULL,
  `organization_name` varchar(100) DEFAULT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `military_info`
--

CREATE TABLE `military_info` (
  `id` int(11) NOT NULL,
  `military_status` varchar(20) DEFAULT NULL,
  `military_number` varchar(20) DEFAULT NULL,
  `trible_military_number` varchar(30) DEFAULT NULL,
  `military_region` varchar(100) DEFAULT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_info`
--

CREATE TABLE `occupation_info` (
  `id` int(11) NOT NULL,
  `affilation` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `date_of_hiring` date DEFAULT NULL,
  `country_Code` varchar(3) NOT NULL,
  `city_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `country_of_birth_id` varchar(2) DEFAULT NULL,
  `id_type` varchar(20) DEFAULT NULL,
  `id_number` varchar(30) DEFAULT NULL,
  `id_issue_date` date DEFAULT NULL,
  `marital_status` varchar(15) DEFAULT NULL,
  `application_id` int(11) NOT NULL,
  `nationality_Id` int(11) NOT NULL,
  `city_of_birth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `affiliation` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `research_topic`
--

CREATE TABLE `research_topic` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `academic_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_bagckground_degree`
--
ALTER TABLE `academic_bagckground_degree`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_academic_bagckground_degree_academic_background1_idx` (`academic_background_id`),
  ADD KEY `fk_academic_bagckground_degree_university1_idx` (`university_id`);

--
-- Indexes for table `academic_interest`
--
ALTER TABLE `academic_interest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_academic_interest_major1_idx` (`major_id`),
  ADD KEY `fk_academic_interest_application1_idx` (`application_id`);

--
-- Indexes for table `academic_interest_research_topic`
--
ALTER TABLE `academic_interest_research_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_research_topic_has_academic_interest_academic_interest1_idx` (`academic_interest_id`),
  ADD KEY `fk_research_topic_has_academic_interest_research_topic1_idx` (`research_topic_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_application_submission1_idx` (`submission_id`),
  ADD KEY `fk_application_users1_idx` (`users_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_city_country1_idx` (`country_Code`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_contact_info_country1_idx` (`country_Code`),
  ADD KEY `fk_tbl_contact_info_city1_idx` (`city_Id`),
  ADD KEY `fk_tbl_contact_info_application1_idx` (`application_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `english_test`
--
ALTER TABLE `english_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_academic_background_application1_idx` (`application_id`);

--
-- Indexes for table `financial_source`
--
ALTER TABLE `financial_source`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_financial_source_application1_idx` (`application_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `military_info`
--
ALTER TABLE `military_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_military_info_application1_idx` (`application_id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `occupation_info`
--
ALTER TABLE `occupation_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_occupation_info_country1_idx` (`country_Code`),
  ADD KEY `fk_occupation_info_city1_idx` (`city_Id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_personal_info_application_idx` (`application_id`),
  ADD KEY `fk_tbl_personal_info_nationality1_idx` (`nationality_Id`),
  ADD KEY `fk_tbl_personal_info_country` (`country_of_birth_id`),
  ADD KEY `fk_tbl_personal_info_city` (`city_of_birth`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_refrence_application1_idx` (`application_id`);

--
-- Indexes for table `research_topic`
--
ALTER TABLE `research_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_research_topic_department1_idx` (`department_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_school_major1_idx` (`major_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
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
-- AUTO_INCREMENT for table `academic_interest_research_topic`
--
ALTER TABLE `academic_interest_research_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402910;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_source`
--
ALTER TABLE `financial_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `military_info`
--
ALTER TABLE `military_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `occupation_info`
--
ALTER TABLE `occupation_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_topic`
--
ALTER TABLE `research_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_bagckground_degree`
--
ALTER TABLE `academic_bagckground_degree`
  ADD CONSTRAINT `fk_academic_bagckground_degree_academic_background1` FOREIGN KEY (`academic_background_id`) REFERENCES `english_test` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_academic_bagckground_degree_university1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `academic_interest_research_topic`
--
ALTER TABLE `academic_interest_research_topic`
  ADD CONSTRAINT `fk_research_topic_has_academic_interest_academic_interest1` FOREIGN KEY (`academic_interest_id`) REFERENCES `academic_interest` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_research_topic_has_academic_interest_research_topic1` FOREIGN KEY (`research_topic_id`) REFERENCES `research_topic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_country1` FOREIGN KEY (`country_Code`) REFERENCES `country` (`Code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `research_topic`
--
ALTER TABLE `research_topic`
  ADD CONSTRAINT `fk_research_topic_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `fk_school_major1` FOREIGN KEY (`major_id`) REFERENCES `major` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
