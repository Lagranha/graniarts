CREATE TABLE IF NOT EXISTS `accounts` (
	`id` INT NOT NULL AUTO_INCREMENT,
  	`email` VARCHAR(255) NOT NULL,
  	`password` VARCHAR(50) NOT NULL,
  	`access` INT NOT NULL DEFAULT '0',
  	`create_date` INT NOT NULL DEFAULT '0',
  	`create_ip` INT NOT NULL DEFAULT '0',
  	PRIMARY KEY (`id`),
  	UNIQUE KEY `email` (`email`)
);

CREATE TABLE IF NOT EXISTS `products` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`category` VARCHAR(255) NOT NULL,
	`price` INT NOT NULL,
	`promotion_price` INT NOT NULL,
	`image_thumb` MEDIUMBLOB NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`)
);