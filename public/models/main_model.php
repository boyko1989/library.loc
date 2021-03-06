<?php 
function print_arr($array){
	echo "<pre>" . print_r($array, true) . "</pre>";
}

function get_theme($author){
	global $connection;
	$query = "SELECT * FROM `theme` WHERE `author`= $author";
	$res = mysqli_query($connection, $query);

	$arr_cat = array();
	
	while($row = mysqli_fetch_assoc($res)){
		$arr_cat[$row['id']] = $row;
	}
	return $arr_cat;
}

function themes_in_form($array) {
	global $connection;
    $ht_code = null;

    foreach ($array as $key => $value) {
        $id = $value['id'];
        $title = $value['title'];
		$parent = $value['parent'];
		$select = $value['parent'];
		if ($parent != 0) {
			$query_count = "SELECT COUNT(*) FROM `articles` WHERE `parent` = $id";
			$count_articles = mysqli_query($connection, $query_count);
			$count_articles = mysqli_fetch_all($count_articles, MYSQLI_ASSOC);
			$count_articles = $count_articles[0]['COUNT(*)'];
			if (empty($count_articles)) $count_articles == 0;

			$query_parent = "SELECT `title` FROM `theme` WHERE `id`= $parent";
			$res_parent = mysqli_query($connection, $query_parent);
			$res_parent = mysqli_fetch_all($res_parent, MYSQLI_ASSOC);
			$parent = $res_parent[0]['title'];
			
		} else {
			$parent = 'Корневая тема';
		}
		$options = get_option_theme($_SESSION['user']['user_id'], $select);

        $ht_code .= themes_to_form_tamplate($id, $title, $parent, $count_articles, $options).'<br>';    
    }  
    return  $ht_code;
}

function themes_to_form_tamplate($id, $title, $parent, $count_articles, $options) {
	$value_submit = "Статьи";
	$action = 'get_articles.php';
	ob_start();
	include('views/template_theme_list.php');
	return ob_get_clean();
}

function get_articles_ed($theme_id) {
	global $connection;
    $query_articles = "SELECT `title` FROM `articles` WHERE `parent` = $theme_id";
    $res_articles = mysqli_query($connection, $query_articles);
    $res_articles = mysqli_fetch_all($res_articles, MYSQLI_ASSOC);
    return $res_articles;
}

function articles_in_form($array) {
    $ht_code = null; 
    foreach ($array as $key => $value) {
        $title = $value['title'];
        // $theme = $value['theme'];
        $ht_code .= articles_to_tamplate($title).'<br>';    
    } 
    return $ht_code;
}

function articles_to_tamplate($title) {
	ob_start();
	include('views/template_article_list.php');
	return ob_get_clean();
}

function map_tree($dataset) {
	$tree = array();

	foreach ($dataset as $id=>&$node) {    
		if (!$node['parent']){
			$tree[$id] = &$node;
		}else{ 
            $dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}
	return $tree;
}

function theme_to_string($data){
	$string = null;
	foreach($data as $item){
		$string .= theme_to_template($item);
	}
	return $string;
}

function theme_to_template($theme){
	ob_start();
	include 'views/theme_template.php';
	return ob_get_clean();
}

function theme_to_string_without_links($data){
	$string_without_links = null;
	foreach($data as $item){
		$string_without_links .= theme_to_template_without_links($item);
	}
	return $string_without_links;
}

function theme_to_template_without_links($theme){
	ob_start();
	include 'views/theme_template_without_links.php';
	return ob_get_clean();
}

function pagination($page, $count_pages, $modrew = true){
	// << < 3 4 5 6 7 > >>
	$back = null; // ссылка НАЗАД
	$forward = null; // ссылка ВПЕРЕД
	$startpage = null; // ссылка В НАЧАЛО
	$endpage = null; // ссылка В КОНЕЦ
	$page2left = null; // вторая страница слева
	$page1left = null; // первая страница слева
	$page2right = null; // вторая страница справа
	$page1right = null; // первая страница справа

	$uri = "?";
	if(!$modrew){
		// если есть параметры в запросе
		if( $_SERVER['QUERY_STRING'] ){
			foreach ($_GET as $key => $value) {
				if( $key != 'page' ) $uri .= "{$key}=$value&amp;";
			}
		}
	}else{
		$url = $_SERVER['REQUEST_URI'];
		$url = explode("?", $url);
		if(isset($url[1]) && $url[1] != ''){
			$params = explode("&", $url[1]);
			foreach($params as $param){
				if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
			}
		}
	}

	if( $page > 1 ){
		$back = "<a class='nav-link' href='{$uri}page=" .($page-1). "'>&lt;</a>";
	}
	if( $page < $count_pages ){
		$forward = "<a class='nav-link' href='{$uri}page=" .($page+1). "'>&gt;</a>";
	}
	if( $page > 3 ){
		$startpage = "<a class='nav-link' href='{$uri}page=1'>&laquo;</a>";
	}
	if( $page < ($count_pages - 2) ){
		$endpage = "<a class='nav-link' href='{$uri}page={$count_pages}'>&raquo;</a>";
	}
	if( $page - 2 > 0 ){
		$page2left = "<a class='nav-link' href='{$uri}page=" .($page-2). "'>" .($page-2). "</a>";
	}
	if( $page - 1 > 0 ){
		$page1left = "<a class='nav-link' href='{$uri}page=" .($page-1). "'>" .($page-1). "</a>";
	}
	if( $page + 1 <= $count_pages ){
		$page1right = "<a class='nav-link' href='{$uri}page=" .($page+1). "'>" .($page+1). "</a>";
	}
	if( $page + 2 <= $count_pages ){
		$page2right = "<a class='nav-link' href='{$uri}page=" .($page+2). "'>" .($page+2). "</a>";
	}

	return $startpage.$back.$page2left.$page1left.'<a class="nav-active">'.$page.'</a>'.$page1right.$page2right.$forward.$endpage;
}

function breadcrumbs($array, $id){
	if(!$id) return false;

	$count = count($array);
	$breadcrumbs_array = array();
	for($i = 0; $i < $count; $i++){
		if(isset($array[$id])){
			$breadcrumbs_array[$array[$id]['id']] = $array[$id]['title'];
			$id = $array[$id]['parent'];
		}else break;
	}
	return array_reverse($breadcrumbs_array, true);
}

?>