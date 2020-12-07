<?php //defined("CATALOG") or die("Access denied");
function insert_content($theme_title, $theme_parent, $content_articles, $name_articles, $article_alias) {
   // session_start();
		global $connection;
    $query_check = "SELECT `title`, `id` FROM `theme` WHERE `title`='$theme_title'";
    $res_check = mysqli_query($connection, $query_check);
    $rows = mysqli_num_rows($res_check);
        if ($rows == 0){
            $query = "INSERT INTO `theme`(`id`, `title`, `parent`) VALUES (NULL, '$theme_title', $theme_parent)";
            $res = mysqli_query($connection, $query);
        } 
    $query_theme_id = "SELECT `id` FROM `theme` WHERE `title`='$theme_title'";
    $res_theme_id = mysqli_query($connection, $query_theme_id);
    $res_theme_id = mysqli_fetch_all($res_theme_id, MYSQLI_ASSOC);    
    $theme_id = $res_theme_id[0]['id'];
		// echo $theme_id;
		 //$_SESSION = ["theme_id" => $theme_id];
        
    $query_txt = "INSERT INTO `articles`(`id`, `parent`, `title`, `content`, `alias`, `image`) VALUES (NULL, '$theme_id', '$name_articles', '$content_articles', '$article_alias', 'thumb');";
		//echo $query_txt;
    $res_txt = mysqli_query($connection, $query_txt);
		
//echo $theme_id;
}
function get_option_theme() {
    global $connection;
    $query = "SELECT `id`,`title` FROM `theme`";
    $res = mysqli_query($connection, $query);
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    foreach($res as $item) {        
        $options .= '<option value="'.$item['id'].'">'.$item['title'].'</option>';              
    }
    return $options;
}
?>
