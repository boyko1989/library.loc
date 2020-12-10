CREATE TABLE `library`.`articles` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL ,`parent` INT UNSIGNED NOT NULL, `alias` VARCHAR(255) NOT NULL , `content` MEDIUMTEXT NOT NULL, `image` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
CREATE TABLE `library`.`theme` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `parent` INT UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
INSERT INTO `theme` (`id`, `title`, `parent`) VALUES (NULL, 'Корень', 0);
INSERT INTO `articles` (`id`, `title`, `parent`, `alias`, `content`, `image`) VALUES(NULL, 'Начальная статья', 1, 'erst', '<h1>Приветствуем в системе!</h1><p>Это первая статья в Вашей библиотеке</p>', 'hello.jpg');
/*---------------------------*/

CREATE TABLE `library`.`editor` ( `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT , `text` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

/*---------------------------*/

ALTER TABLE `editor` ADD `theme` VARCHAR(255) NOT NULL AFTER `text`;

/*---------------------------*/

ALTER TABLE `editor` ADD `partheme` VARCHAR(255) NOT NULL AFTER `theme`;

/*---------------------------*/

ALTER TABLE `articles` ADD `theme_id` INT UNSIGNED NOT NULL AFTER `id_articles`;

/*---------------------------*/

ALTER TABLE `articles` DROP `link_articles`;

/*---------------------------*/

ALTER TABLE `articles` CHANGE `id_articles` `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, CHANGE `theme_id` `parent` INT UNSIGNED NOT NULL, CHANGE `name_articles` `title` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `content_articles` `content` MEDIUMTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL;

ALTER TABLE `articles` ADD `alias` VARCHAR(255) NOT NULL AFTER `content`, ADD `image` VARCHAR(255) NOT NULL DEFAULT 'empty_thumb.jpg' AFTER `alias`;

ALTER TABLE `theme` CHANGE `theme_id` `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, CHANGE `theme_title` `title` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, CHANGE `theme_parent` `parent` INT UNSIGNED NOT NULL;