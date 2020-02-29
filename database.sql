CREATE TABLE IF NOT EXISTS `accounts` (
	`id` BIGINT NOT NULL AUTO_INCREMENT,
  	`email` VARCHAR(50) NOT NULL,
  	`password` VARCHAR(50) NOT NULL,
  	`access` INT NOT NULL DEFAULT '0',
  	`create_date` INT NOT NULL DEFAULT '0',
  	`create_ip` INT NOT NULL DEFAULT '0',
  	PRIMARY KEY (`id`),
  	UNIQUE KEY `email` (`email`)
);

CREATE TABLE IF NOT EXISTS `contacts` (
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`account_id` INT NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`phone` VARCHAR(20) NOT NULL,
	`message` TEXT NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `categories` (
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)	
);


CREATE TABLE IF NOT EXISTS `products` (
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`category_id` INT NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`price` INT NOT NULL,
	`promotion_price` INT NOT NULL,
	`image_thumb` MEDIUMBLOB NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`)
);


CREATE TABLE IF NOT EXISTS `historics` (
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL,
	`pages` VARCHAR(50) NOT NULL,
	`actions` ENUM('register', 'select', 'update', 'delete'), 
	`table_name`  VARCHAR(50),
	`created_at` timestamp NOT NULL,
	`updated_at` timestamp NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `budget`(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`contact_id` INT NOT NULL,
	`product_Id` INT NOT NULL,
	`cpf_cnpj` VARCHAR(14) NOT NULL,
	`address` VARCHAR(100) NOT NULL,
	`number` INT NOT NULL,
	`complement` VARCHAR(30) NOT NULL,
	`state` VARCHAR(30) NOT NULL,
	`city` VARCHAR(30) NOT NULL,
	`zip` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`id`)
);