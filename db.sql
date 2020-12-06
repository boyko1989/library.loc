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