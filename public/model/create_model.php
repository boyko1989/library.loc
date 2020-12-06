<?php 

function insert_content($theme_title, $theme_parent, $content_articles, $name_articles) {
    global $connection;
    $query_check = "SELECT `theme_title` FROM `theme` WHERE `theme_title`='$theme_title'";
    $res_check = mysqli_query($connection, $query_check);
    $rows = mysqli_num_rows($res_check);
    if ($rows == 0){
        $query = "INSERT INTO `theme`(`theme_id`, `theme_title`, `theme_parent`) VALUES (NULL, '$theme_title', $theme_parent)";
        $res = mysqli_query($connection, $query);
    } else {
        $message = '<br>Тема уже используется';
    }
    if (!empty($res)) {
        $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
        echo '<br>Успешный запрос<br>'.$res; 
    } else {
        echo $message;
    }

    //-------------------------- 
    /*$query_theme_id =  
    $query_txt = "INSERT INTO `articles`(`id_articles`, `theme_id`, `name_articles`, `content_articles`) VALUES (NULL, NULL, '$name_articles', '$content_articles')";
    $res_txt = mysqli_query($connection, $query);*/


}

function get_option_theme() {
    global $connection;
    $query = "SELECT `theme_id`,`theme_title` FROM `theme`";
    $res = mysqli_query($connection, $query);
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    foreach($res as $item) {        
        $options .= '<option value="'.$item['theme_id'].'">'.$item['theme_title'].'</option>';              
    }
    //$options = $res;
    return $options;//$item;
}

?>