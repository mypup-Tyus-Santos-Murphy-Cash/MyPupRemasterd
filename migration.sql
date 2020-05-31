-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema adlister_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema adlister_db
-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `mypupRemasterd_db` DEFAULT CHARACTER SET utf8 ;
USE `mypupRemasterd_db` ;

-- -----------------------------------------------------
-- Table `adlister_db`.`users`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mypupRemasterd_db`.`users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `phone_number` VARCHAR(20) NOT NULL,
  `city` VARCHAR(20) NOT NULL,
  `state` VARCHAR(20) NOT NULL,
  `zipcode` VARCHAR(20) NOT NULL,
  `user_role` VARCHAR(20) NOT NULL,
  `image` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `adlister_db`.`ads`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mypupRemasterd_db`.`dog_post` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `dog_breed` VARCHAR(200) NOT NULL,
  `dog_group` DOUBLE NOT NULL,
  `dog_description` TEXT NULL DEFAULT NULL,
  `dog_price` VARCHAR(20) NOT NULL,
  `images` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id_idx` (`user_id` ASC),
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `mypupRemasterd_db`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `adlister_db`.`categories`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mypupRemasterd_db`.`breed` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adlister_db`.`ads_has_category`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mypupRemasterd_db`.`dog_post_has_breed` (
  `dog_post_id` INT(10) UNSIGNED NOT NULL,
  `breed_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`dog_post_id`, `breed_id`),
  INDEX `fk_dog_post_has_breed_breed1_idx` (`breed_id` ASC),
  INDEX `fk_dog_post_has_breed_dog_post1_idx` (`dog_post_id` ASC),
  CONSTRAINT `fk_dog_post_has_breed_dog_post1` FOREIGN KEY (`dog_post_id`) REFERENCES `mypupRemasterd_db`.`dog_post` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_dog_post_has_breed_breed1` FOREIGN KEY (`breed_id`) REFERENCES `mypupRemasterd_db`.`breed` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mypupRemasterd_db`.`breed_selection` (
  `user_id` INT(10) UNSIGNED NOT NULL,
  `breed_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `breed_id`),
  INDEX `fk_users_has_breed_breed1_idx` (`breed_id` ASC),
  INDEX `fk_users_has_breed_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_breed_users1` FOREIGN KEY (`user_id`) REFERENCES `mypupRemasterd_db`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_breed_breed1` FOREIGN KEY (`breed_id`) REFERENCES `mypupRemasterd_db`.`breed` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `adlister_db`.`favorites`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mypupRemasterd_db`.`favorites` (
  `user_id` INT(10) UNSIGNED NOT NULL,
  `dog_post_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `dog_post_id`),
  INDEX `fk_users_has_dog_post_dog_post1_idx` (`dog_post_id` ASC),
  INDEX `fk_users_has_dog_post_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_dog_post_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mypupRemasterd_db`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_dog_post_dog_post1`
    FOREIGN KEY (`dog_post_id`)
    REFERENCES `mypupRemasterd_db`.`dog_post` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
