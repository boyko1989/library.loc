CREATE DATABASE `library`;

/*--------------------------------------------------------*/

CREATE TABLE `library`.`articles` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL ,`parent` INT UNSIGNED NOT NULL, `alias` VARCHAR(255) NOT NULL , `content` MEDIUMTEXT NOT NULL, `image` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
CREATE TABLE `library`.`theme` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `parent` INT UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
INSERT INTO `theme` (`id`, `title`, `parent`) VALUES (NULL, 'Корень', 0);
INSERT INTO `articles` (`id`, `title`, `parent`, `alias`, `content`, `image`) VALUES(NULL, 'Начальная статья', 1, 'erst', '<h1>Приветствуем в системе!</h1><p>Это первая статья в Вашей библиотеке</p>', 'hello.jpg');
