ALTER TABLE `personal_info` ADD `city_of_birth` INT NOT NULL AFTER `nationality_Id`;
ALTER TABLE `personal_info` CHANGE `country_of_birth_id` `country_of_birth_id` VARCHAR(2) NULL DEFAULT NULL
ALTER TABLE `personal_info` ADD CONSTRAINT `fk_tbl_personal_info_country` FOREIGN KEY (`country_of_birth_id`) REFERENCES `country`(`Code`) ON DELETE NO ACTION ON UPDATE NO ACTION; 
ALTER TABLE `personal_info` ADD CONSTRAINT `fk_tbl_personal_info_city` FOREIGN KEY (`city_of_birth`) REFERENCES `city`(`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
