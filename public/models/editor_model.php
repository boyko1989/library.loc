<?php 
function insert_content($theme_title, $theme_parent, $content_articles, $name_articles, $article_alias) {
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
        
    $query_txt = "INSERT INTO `articles`(`id`, `parent`, `title`, `content`, `alias`, `image`) VALUES (NULL, '$theme_id', '$name_articles', '$content_articles', '$article_alias', 'thumb');";		
    $res_txt = mysqli_query($connection, $query_txt);	
    return $theme_id;
}
function get_option_theme() {
    global $connection;
    $query = "SELECT `id`,`title` FROM `theme`";
    $res = mysqli_query($connection, $query);
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $options = "";
    foreach($res as $item) {        
        $options .= '<option value="'.$item['id'].'">'.$item['title'].'</option>';              
    }
    return $options;
}
function get_article_for_edit($url_art){
    global $connection;   
    $query = "SELECT `content`, `title`, `parent` FROM `articles` WHERE `alias`='$url_art';";
    
    $res = mysqli_query($connection, $query);
    $res = mysqli_fetch_assoc($res);
    @$parent_theme = $res['parent'];

    $query_theme = "SELECT `title`, `parent` FROM `theme` WHERE `id`=$parent_theme;";
    $res_theme = mysqli_query($connection, $query_theme);
    if (isset($res_theme)){
        $res_theme = @mysqli_fetch_assoc($res_theme);
    }

    @$res['parent'] = $res_theme['title'];
    @$parent_theme_2 = $res_theme['parent'];

    $query_theme_parent = "SELECT `title` FROM `theme` WHERE `id`=$parent_theme_2;";    
    $res_theme_parent = mysqli_query($connection, $query_theme_parent);
    
    $res_theme_parent = @mysqli_fetch_assoc($res_theme_parent);
    @$res_theme_parent = $res_theme_parent['title'];
    $option = '<option>'. $res_theme_parent .'</option>';

    $res['option'] = $option;
    return $res;
}
?>