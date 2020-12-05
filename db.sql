CREATE TABLE `library`.`articles` ( `id_articles` INT UNSIGNED NOT NULL AUTO_INCREMENT , `name_articles` VARCHAR(128) NOT NULL , `link_articles` VARCHAR(255) NOT NULL , `content_articles` MEDIUMTEXT NOT NULL , PRIMARY KEY (`id_articles`)) ENGINE = MyISAM;

/*---------------------------*/

CREATE TABLE `library`.`editor` ( `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT , `text` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;