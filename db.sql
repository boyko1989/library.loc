CREATE TABLE `library`.`articles` ( `id_articles` INT UNSIGNED NOT NULL AUTO_INCREMENT , `name_articles` VARCHAR(128) NOT NULL , `link_articles` VARCHAR(255) NOT NULL , `content_articles` MEDIUMTEXT NOT NULL , PRIMARY KEY (`id_articles`)) ENGINE = MyISAM;

/*---------------------------*/

CREATE TABLE `library`.`editor` ( `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT , `text` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

/*---------------------------*/

ALTER TABLE `editor` ADD `theme` VARCHAR(255) NOT NULL AFTER `text`;

/*---------------------------*/

ALTER TABLE `editor` ADD `partheme` VARCHAR(255) NOT NULL AFTER `theme`;

/*---------------------------*/

CREATE TABLE `library`.`theme` ( `theme_id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `theme_title` VARCHAR(255) NOT NULL , `theme_parent` INT UNSIGNED NOT NULL , PRIMARY KEY (`theme_id`)) ENGINE = InnoDB;

/*---------------------------*/

ALTER TABLE `articles` ADD `theme_id` INT UNSIGNED NOT NULL AFTER `id_articles`;

/*---------------------------*/

ALTER TABLE `articles` DROP `link_articles`;

/*---------------------------*/

ALTER TABLE `articles` CHANGE `id_articles` `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, CHANGE `theme_id` `parent` INT UNSIGNED NOT NULL, CHANGE `name_articles` `title` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `content_articles` `content` MEDIUMTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL;

ALTER TABLE `articles` ADD `alias` VARCHAR(255) NOT NULL AFTER `content`, ADD `image` VARCHAR(255) NOT NULL DEFAULT 'empty_thumb.jpg' AFTER `alias`;

ALTER TABLE `theme` CHANGE `theme_id` `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, CHANGE `theme_title` `title` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `theme_parent` `parent` INT UNSIGNED NOT NULL;