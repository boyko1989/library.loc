<?php
function get_articles(){
	global $connection;
	$query = "SELECT `name_articles`, `link_articles`  FROM `articles`";
	$res = mysqli_query($connection, $query);

    $rows = mysqli_num_rows($res);
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $n = $rows - 1;

    for($i = 0; $i <= $n; $i++) {
        $link = 'files/'.$res[$i]['link_articles'];
        echo '<a href="'.$link.'" class="list">'.$res[$i]['name_articles'] .'</a><br>';
    }

    return $res;
}