
CREATE TABLE `users` (
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
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));


CREATE TABLE `dog_post` (
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
    ON UPDATE CASCADE);

CREATE TABLE `breed` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC));


CREATE TABLE `dog_post_has_breed` (
  `dog_post_id` INT(10) UNSIGNED NOT NULL,
  `breed_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`dog_post_id`, `breed_id`),
  INDEX `fk_dog_post_has_breed_breed1_idx` (`breed_id` ASC),
  INDEX `fk_dog_post_has_breed_dog_post1_idx` (`dog_post_id` ASC),
  CONSTRAINT `fk_dog_post_has_breed_dog_post1`
  FOREIGN KEY (`dog_post_id`)
  REFERENCES `mypupRemasterd_db`.`dog_post` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_dog_post_has_breed_breed1`
  FOREIGN KEY (`breed_id`)
  REFERENCES `mypupRemasterd_db`.`breed` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE `breed_selection` (
  `user_id` INT(10) UNSIGNED NOT NULL,
  `breed_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `breed_id`),
  INDEX `fk_users_has_breed_breed1_idx` (`breed_id` ASC),
  INDEX `fk_users_has_breed_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_breed_users1`
  FOREIGN KEY (`user_id`)
  REFERENCES `mypupRemasterd_db`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_breed_breed1`
  FOREIGN KEY (`breed_id`)
  REFERENCES `mypupRemasterd_db`.`breed` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


CREATE TABLE `favorites` (
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
    ON UPDATE CASCADE);

