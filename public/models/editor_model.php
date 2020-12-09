<?php 
function insert_content($theme_title, $theme_parent, $content_articles, $name_articles, $article_alias) {
		global $connection;
    $query_check = "SELECT `title`, `id` FROM `theme` WHERE `title`='$theme_title'";
    $res_check = mysqli_query($connection, $query_check);
    $rows = mysqli_num_rows($res_check);
        if ($rows == 0){
            $query = "INSERT INTO `theme`(`id`, `title`, `parent`) VALUES (NULL, '$theme_title', $theme_parent)";
            $res = mysqli_query($connection, $query);
            echo '- Создана новая тема<br>';
        } 
    $query_theme_id = "SELECT `id` FROM `theme` WHERE `title`='$theme_title'";
    $res_theme_id = mysqli_query($connection, $query_theme_id);
    $res_theme_id = mysqli_fetch_all($res_theme_id, MYSQLI_ASSOC);    
    $theme_id = $res_theme_id[0]['id'];
        echo '- Статья добавлена в тему '.$theme_title.' под номером '.$theme_id.'<br>';
    $query_txt = "INSERT INTO `articles`(`id`, `parent`, `title`, `content`, `alias`, `image`) VALUES (NULL, '$theme_id', '$name_articles', '$content_articles', '$article_alias', 'thumb');";		
    $res_txt = mysqli_query($connection, $query_txt);
        echo 'Добавление произведено<br>';		
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
/*
function get_alias (id статьи) {
    global $connection;
    $query = "SELECT `alias` FROM `articles` WHERE `id`=$id";
}*/
?>