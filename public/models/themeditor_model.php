<?php 

function get_articles_for_themeditor($sel, $author){
    global $connection;
	$query = "SELECT `title` FROM `articles` WHERE `author`= $author AND `parent` = $sel;"; // это переменная, которая определит выбранную тему
    $res = mysqli_query($connection, $query);
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);

    return $res;
}

function get_title_sel_theme($sel){
    global $connection;
    $query = "SELECT `title` FROM `theme` WHERE `id`=$sel";
    $res = mysqli_query($connection, $query);
    //$row = mysqli_fetch_row($res);
    //if ($row == 0) return false;
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);    
    $res = $res[0]['title'];

    return $res;
}
?>
