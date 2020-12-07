<?php //defined("CATALOG") or die("Access denied");

/**
* Получение ID дочерних категорий
**/
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

/**
* Получение товаров
**/
function get_articles($ids, $start_pos, $perpage){
	global $connection;
	if($ids){
		$query = "SELECT * FROM articles WHERE parent IN($ids) ORDER BY title LIMIT $start_pos, $perpage";
	}else{
		$query = "SELECT * FROM articles ORDER BY title LIMIT $start_pos, $perpage";
	}
	$res = mysqli_query($connection, $query);
	$articles = array();
	while($row = mysqli_fetch_assoc($res)){
		$articles[] = $row;
	}
	return $articles;
}

/**
* Кол-во товаров
**/
function count_goods($ids){
	global $connection;
	if( !$ids ){
		$query = "SELECT COUNT(*) FROM articles";
	}else{
		$query = "SELECT COUNT(*) FROM articles WHERE parent IN($ids)";
	}
	$res = mysqli_query($connection, $query);
	$count_goods = mysqli_fetch_row($res);
	return $count_goods[0];
}

?>