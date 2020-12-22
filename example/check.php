<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DB", "practice");

$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB) or die("Нет соединения с БД");
mysqli_set_charset($connection, "utf8") or die("Не установлена кодировка соединения");

if($_POST['check'] == 'login'){
    $login = mysqli_real_escape_string($connection, trim($_POST['data']));
    $query = "SELECT `login` FROM `user1` WHERE `login` = '$login' LIMIT 1";
    $res = mysqli_query($connection, $query);
    if(mysqli_num_rows($res)) {
        echo 'no';
    } else {
        echo 'yes';
    }
} 

if($_POST['check'] == 'email'){
    $login = mysqli_real_escape_string($connection, trim($_POST['data']));
    $query = "SELECT `email` FROM `user1` WHERE `email` = '$email' LIMIT 1";
    $res = mysqli_query($connection, $query);
    if(mysqli_num_rows($res)) {
        echo 'no';
    } else {
        echo 'yes';
    }
} 