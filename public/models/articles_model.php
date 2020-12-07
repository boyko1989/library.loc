<?php defined("CATALOG") or die("Access denied");

/**
* Получение отдельного товара
**/
function get_one_articles($articles_alias){
	global $connection;
	$articles_alias = mysqli_real_escape_string($connection, $articles_alias);
	$query = "SELECT * FROM articles WHERE alias = '$articles_alias'";
	$res = mysqli_query($connection, $query);
	return mysqli_fetch_assoc($res);
}
?>