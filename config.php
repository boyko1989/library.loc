<?php //defined("CATALOG") or die("Access denied");

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "XE2Z5NMNXE2Z5NMN");
define("DB", "library");
define("PATH", "http://boyko.sytes.net/");
define("PERPAGE", 5);
$option_perpage = array(5, 10, 15);

$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB) or die("Нет соединения с БД");
mysqli_set_charset($connection, "utf8") or die("Не установлена кодировка соединения");
