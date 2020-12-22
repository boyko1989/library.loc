<?php 
function print_arr($array){
	echo "<pre>" . print_r($array, true) . "</pre>";
}

function get_users() {
    global $connection;
    $query_user = "SELECT `login`, `id` FROM `user1`";
    $res_user = mysqli_query($connection, $query_user);
    $res_user = mysqli_fetch_all($res_user, MYSQLI_ASSOC);
    return $res_user;
}

function users_in_form($array) {
    $ht_code = null;

    foreach ($array as $key => $value) {
        $login = $value['login'];
        $id = $value['id'];
        $ht_code .= users_to_tamplate($login, $id).'<br>';    
    }  
    return $ht_code;
}

function users_to_tamplate($login, $id) {
    ob_start();
	include 'template_autotlist.php';
	return ob_get_clean();
}

function get_articles($author) {
    global $connection;
    $query_articles = "SELECT `title`, `theme` FROM `products` WHERE `author` = $author";
    $res_articles = mysqli_query($connection, $query_articles);
    $res_articles = mysqli_fetch_all($res_articles, MYSQLI_ASSOC);
    return $res_articles;
}

function get_author_id($author_login) {
    global $connection;
    $query_id = "SELECT `id` FROM `user1` WHERE `login` = '$author_login'";
    $res_id = mysqli_query($connection, $query_id);
    $res_id = mysqli_fetch_all($res_id, MYSQLI_ASSOC);
    $res_id = $res_id[0]['id'];
    return $res_id;
}

function articles_in_form($array) {
    $ht_code = null; 
    foreach ($array as $key => $value) {
        $title = $value['title'];
        $theme = $value['theme'];
        $ht_code .= articles_to_tamplate($title, $theme).'<br>';    
    } 
    return $ht_code;
}

function articles_to_tamplate($title, $theme) {
    ob_start();
	include 'template_articles_list.php';
	return ob_get_clean();
}

?>