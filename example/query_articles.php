<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DB", "practice");

$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB) or die("Нет соединения с БД");
mysqli_set_charset($connection, "utf8") or die("Не установлена кодировка соединения");


function articles_to_tamplate($title, $theme) {
    ob_start();
	include 'template_articles_list.php';
	return ob_get_clean();
}


if(isset( $_POST['author'])) {
    $author = $_POST['author'];
    //echo $author;
    $query_id = "SELECT `id` FROM `user1` WHERE `login` = '$author'";
    $res_id = mysqli_query($connection, $query_id);
    $res_id = mysqli_fetch_all($res_id, MYSQLI_ASSOC);
    //print_r($res_id);
    $author = $res_id[0]['id'];

    $query_articles = "SELECT `title`, `theme` FROM `products` WHERE `author` = $author";

    $res_articles = mysqli_query($connection, $query_articles);
    $res_articles = mysqli_fetch_all($res_articles, MYSQLI_ASSOC);
    
    $ht_code = null; 
    foreach ($res_articles as $key => $value) {
        $title = $value['title'];
        $theme = $value['theme'];
        $ht_code .= articles_to_tamplate($title, $theme).'<br>';    
    } 
    echo $ht_code;
}

?>