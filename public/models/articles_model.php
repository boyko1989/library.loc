<?php 
function get_one_articles($articles_alias, $author){
	global $connection;
	$articles_alias = mysqli_real_escape_string($connection, $articles_alias);
	$query = "SELECT * FROM articles WHERE alias = '$articles_alias' AND `author`=$author";
	$res = mysqli_query($connection, $query);
	$rows = mysqli_num_rows($res);
        if ($rows == 0){
			return false;
		}
	$res = mysqli_fetch_assoc($res);
	$res += ['articles_alias' => $articles_alias];
	return $res;
}
?>