<?php 
function get_one_articles($articles_alias){
	global $connection;
	$articles_alias = mysqli_real_escape_string($connection, $articles_alias);
	$query = "SELECT * FROM articles WHERE alias = '$articles_alias'";
	$res = mysqli_query($connection, $query);
	$res = mysqli_fetch_assoc($res);
	$res += ['articles_alias' => $articles_alias];

	if (empty($res)) $res = ['articles_alias' => ""];

	return $res;
}
?>