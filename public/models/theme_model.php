<?php 
function cats_id($array, $id){
	if(!$id) return false;
	$data = null;
	foreach($array as $item){
		if($item['parent'] == $id){
			$data .= $item['id'] . ",";
			$data .= cats_id($array, $item['id']);
		}
	}
	return $data;
}

function get_articles($ids, $start_pos, $perpage, $author){
	global $connection;
	if($ids){
		$query = "SELECT * FROM `articles` WHERE `parent` IN($ids) AND `author` = $author  ORDER BY title LIMIT $start_pos, $perpage";
	}else{
		$query = "SELECT * FROM `articles` WHERE `author` = $author  ORDER BY `title` LIMIT $start_pos, $perpage";
	}
	$res = mysqli_query($connection, $query);
	$articles = array();
	if (!empty($res)) {
		while($row = mysqli_fetch_assoc($res)){
			$articles[] = $row;
		}
	}	
	return $articles;
}

function count_goods($ids, $author){
	global $connection;
	if( !$ids ){
		$query = "SELECT COUNT(*) FROM articles WHERE `author` = $author";
	}else{
		$query = "SELECT COUNT(*) FROM articles WHERE parent IN($ids)";
	}
	$res = mysqli_query($connection, $query);
	$count_goods = mysqli_fetch_row($res);
	return $count_goods[0];
}
?>