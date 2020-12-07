<?php 

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DB", "library");

$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB) or die("Ошибка подключения к базе данных");

mysqli_set_charset($connection, "utf8") or die("Не установлена кодировка соединения");

?>
