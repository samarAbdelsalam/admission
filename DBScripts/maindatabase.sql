-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema admission-laravel
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema admission-laravel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `admission-laravel` DEFAULT CHARACTER SET latin1 ;
USE `admission-laravel` ;

-- -----------------------------------------------------
-- Table `admission-laravel`.`admins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`admins` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`admins` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `email` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `job_title` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `password` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `admins_email_unique` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `admission-laravel`.`migrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`migrations` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `admission-laravel`.`password_resets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`password_resets` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`password_resets` (
  `email` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `token` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC),
  INDEX `password_resets_token_index` (`token` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `admission-laravel`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`users` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `email` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `password` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `admission-laravel`.`submission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`submission` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`submission` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `academic_year` VARCHAR(10) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`application` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`application` (
  `id` INT NOT NULL,
  `status` TINYINT NULL DEFAULT 0,
  `agreement_of_academic_department` TINYINT NULL DEFAULT 0,
  `application_form` TINYINT NULL DEFAULT 0,
  `statment_of_purpose` TINYINT NULL DEFAULT 0,
  `bsc_cert` TINYINT NULL DEFAULT 0,
  `msc_cert` TINYINT NULL DEFAULT 0,
  `bsc_transscript` TINYINT NULL DEFAULT 0,
  `msc_transcript` TINYINT NULL DEFAULT 0,
  `msc_summary` TINYINT NULL DEFAULT 0,
  `letter_1` TINYINT NULL DEFAULT 0,
  `letter_2` TINYINT NULL DEFAULT 0,
  `letter_3` TINYINT NULL DEFAULT 0,
  `english_cert` TINYINT NULL DEFAULT 0,
  `personal_photo` TINYINT NULL DEFAULT 0,
  `military_cert` TINYINT NULL DEFAULT 0,
  `id_scan` TINYINT NULL DEFAULT 0,
  `marriage_cert` TINYINT NULL DEFAULT 0,
  `children_birth_cert` TINYINT NULL DEFAULT 0,
  `confirm_date` DATE NULL,
  `submission_id` INT NOT NULL,
  `users_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_application_submission1_idx` (`submission_id` ASC),
  INDEX `fk_application_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_application_submission1`
    FOREIGN KEY (`submission_id`)
    REFERENCES `admission-laravel`.`submission` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_application_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `admission-laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`nationality`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`nationality` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`nationality` (
  `Id` INT NOT NULL,
  `Name` VARCHAR(100) NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`personal_info`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`personal_info` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`personal_info` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NULL,
  `mname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
  `gender` VARCHAR(10) NULL,
  `date_of_birth` DATE NULL,
  `country_of_birth_id` INT NULL,
  `id_type` VARCHAR(20) NULL,
  `id_number` VARCHAR(30) NULL,
  `id_issue_date` DATE NULL,
  `marital_status` VARCHAR(15) NULL,
  `application_id` INT NOT NULL,
  `nationality_Id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_personal_info_application_idx` (`application_id` ASC),
  INDEX `fk_tbl_personal_info_nationality1_idx` (`nationality_Id` ASC),
  CONSTRAINT `fk_tbl_personal_info_application`
    FOREIGN KEY (`application_id`)
    REFERENCES `admission-laravel`.`application` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_personal_info_nationality1`
    FOREIGN KEY (`nationality_Id`)
    REFERENCES `admission-laravel`.`nationality` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`military_info`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`military_info` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`military_info` (
  `id` INT NOT NULL,
  `military_number` VARCHAR(20) NULL,
  `trible_military_number` VARCHAR(30) NULL,
  `military_region` VARCHAR(100) NULL,
  `application_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_military_info_application1_idx` (`application_id` ASC),
  CONSTRAINT `fk_military_info_application1`
    FOREIGN KEY (`application_id`)
    REFERENCES `admission-laravel`.`application` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`country` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`country` (
  `Code` VARCHAR(3) NOT NULL,
  `Name` VARCHAR(30) NULL,
  PRIMARY KEY (`Code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`city` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`city` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(30) NULL,
  `country_Code` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `fk_city_country1_idx` (`country_Code` ASC),
  CONSTRAINT `fk_city_country1`
    FOREIGN KEY (`country_Code`)
    REFERENCES `admission-laravel`.`country` (`Code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`contact_info`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`contact_info` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`contact_info` (
  `id` INT NOT NULL,
  `mobile` VARCHAR(20) NULL,
  `landline` VARCHAR(20) NULL,
  `country_Code` VARCHAR(3) NOT NULL,
  `city_Id` INT NOT NULL,
  `application_id` INT NOT NULL,
  `email` VARCHAR(30) NULL,
  `postal_code` VARCHAR(10) NULL,
  `street` VARCHAR(25) NULL,
  `buliding_number` VARCHAR(10) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_contact_info_country1_idx` (`country_Code` ASC),
  INDEX `fk_tbl_contact_info_city1_idx` (`city_Id` ASC),
  INDEX `fk_tbl_contact_info_application1_idx` (`application_id` ASC),
  CONSTRAINT `fk_tbl_contact_info_country1`
    FOREIGN KEY (`country_Code`)
    REFERENCES `admission-laravel`.`country` (`Code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_contact_info_city1`
    FOREIGN KEY (`city_Id`)
    REFERENCES `admission-laravel`.`city` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_contact_info_application1`
    FOREIGN KEY (`application_id`)
    REFERENCES `admission-laravel`.`application` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`occupation_info`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`occupation_info` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`occupation_info` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `affilation` VARCHAR(45) NULL,
  `department` VARCHAR(45) NULL,
  `position` VARCHAR(45) NULL,
  `date_of_hiring` DATE NULL,
  `country_Code` VARCHAR(3) NOT NULL,
  `city_Id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_occupation_info_country1_idx` (`country_Code` ASC),
  INDEX `fk_occupation_info_city1_idx` (`city_Id` ASC),
  CONSTRAINT `fk_occupation_info_country1`
    FOREIGN KEY (`country_Code`)
    REFERENCES `admission-laravel`.`country` (`Code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_occupation_info_city1`
    FOREIGN KEY (`city_Id`)
    REFERENCES `admission-laravel`.`city` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`major`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`major` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`major` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(75) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`academic_interest`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`academic_interest` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`academic_interest` (
  `id` INT NOT NULL,
  `major_id` INT NOT NULL,
  `application_id` INT NOT NULL,
  `term` VARCHAR(10) NULL,
  `applied_degree` VARCHAR(4) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_academic_interest_major1_idx` (`major_id` ASC),
  INDEX `fk_academic_interest_application1_idx` (`application_id` ASC),
  CONSTRAINT `fk_academic_interest_major1`
    FOREIGN KEY (`major_id`)
    REFERENCES `admission-laravel`.`major` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_academic_interest_application1`
    FOREIGN KEY (`application_id`)
    REFERENCES `admission-laravel`.`application` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`department`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`department` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`department` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`research_topic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`research_topic` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`research_topic` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `department_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_research_topic_department1_idx` (`department_id` ASC),
  CONSTRAINT `fk_research_topic_department1`
    FOREIGN KEY (`department_id`)
    REFERENCES `admission-laravel`.`department` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`academic_interest_research_topic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`academic_interest_research_topic` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`academic_interest_research_topic` (
  `research_topic_id` INT NOT NULL,
  `academic_interest_id` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_research_topic_has_academic_interest_academic_interest1_idx` (`academic_interest_id` ASC),
  INDEX `fk_research_topic_has_academic_interest_research_topic1_idx` (`research_topic_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_research_topic_has_academic_interest_research_topic1`
    FOREIGN KEY (`research_topic_id`)
    REFERENCES `admission-laravel`.`research_topic` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_research_topic_has_academic_interest_academic_interest1`
    FOREIGN KEY (`academic_interest_id`)
    REFERENCES `admission-laravel`.`academic_interest` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`academic_background`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`academic_background` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`academic_background` (
  `id` INT NOT NULL,
  `english_language_test` VARCHAR(20) NULL,
  `score` VARCHAR(10) NULL,
  `application_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_academic_background_application1_idx` (`application_id` ASC),
  CONSTRAINT `fk_academic_background_application1`
    FOREIGN KEY (`application_id`)
    REFERENCES `admission-laravel`.`application` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`university`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`university` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`university` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`academic_bagckground_degree`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`academic_bagckground_degree` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`academic_bagckground_degree` (
  `id` INT NOT NULL,
  `type` VARCHAR(10) NULL,
  `major` VARCHAR(150) NULL,
  `department` VARCHAR(150) NULL,
  `faculty_name` VARCHAR(150) NULL,
  `percentage` VARCHAR(20) NULL,
  `thesis_name` VARCHAR(200) NULL,
  `rank` VARCHAR(45) NULL,
  `recieve_date` DATE NULL,
  `academic_background_id` INT NOT NULL,
  `university_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_academic_bagckground_degree_academic_background1_idx` (`academic_background_id` ASC),
  INDEX `fk_academic_bagckground_degree_university1_idx` (`university_id` ASC),
  CONSTRAINT `fk_academic_bagckground_degree_academic_background1`
    FOREIGN KEY (`academic_background_id`)
    REFERENCES `admission-laravel`.`academic_background` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_academic_bagckground_degree_university1`
    FOREIGN KEY (`university_id`)
    REFERENCES `admission-laravel`.`university` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`refrence`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`refrence` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`refrence` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NULL,
  `mname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
  `affiliation` VARCHAR(45) NULL,
  `position` VARCHAR(45) NULL,
  `telephone` VARCHAR(45) NULL,
  `mobile` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `application_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_refrence_application1_idx` (`application_id` ASC),
  CONSTRAINT `fk_refrence_application1`
    FOREIGN KEY (`application_id`)
    REFERENCES `admission-laravel`.`application` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`financial_source`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`financial_source` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`financial_source` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `source` VARCHAR(45) NULL,
  `organization_name` VARCHAR(100) NULL,
  `application_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_financial_source_application1_idx` (`application_id` ASC),
  CONSTRAINT `fk_financial_source_application1`
    FOREIGN KEY (`application_id`)
    REFERENCES `admission-laravel`.`application` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `admission-laravel`.`school`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `admission-laravel`.`school` ;

CREATE TABLE IF NOT EXISTS `admission-laravel`.`school` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `major_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_school_major1_idx` (`major_id` ASC),
  CONSTRAINT `fk_school_major1`
    FOREIGN KEY (`major_id`)
    REFERENCES `admission-laravel`.`major` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
