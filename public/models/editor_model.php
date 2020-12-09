<?php 

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

function is_alias($url_art) {  
    $url_art = $_SERVER['REQUEST_URI'];  // определяем URI                      
    $url_art = array_reverse(explode('/', $url_art));       // создаём массив, из которого возьмём алиас статьи 
    $url_art = $url_art[0];                                 // берём наш алиас 
    return $url_art;
}

function get_article_for_edit($url_art){
    global $connection;   
    $query_article = "SELECT `content`, `title`, `parent`, `id` FROM `articles` WHERE `alias`='$url_art';";    
    $res_article = mysqli_query($connection, $query_article);
    $res_article = mysqli_fetch_assoc($res_article);

    # Получили ключи массива $res_article:

    // $res_article['content'] - содержание статьи,
    // $res_article['title'] - название стаьи,
    // $res_article['parent'] - номер темы статьи,
    // $res_article['id'] - номер статьи,      
    
    $parent_theme = $res_article['parent']; // переменная для следующего запроса 

    $query_theme = "SELECT `title`, `parent` FROM `theme` WHERE `id`=$parent_theme;";
    $res_theme = mysqli_query($connection, $query_theme);
    $res_theme = mysqli_fetch_assoc($res_theme);

    # Получили ключи массива $res_theme:

    // $res_theme['title'] - название темы статьи,
    // $res_theme['parent'] - номер родительской нашей теме темы,  
    
    $parent_theme = $res_theme['parent'];

    $query_parent_theme = "SELECT `title` FROM `theme` WHERE `id`=$parent_theme;";    
    $res_parent_theme = mysqli_query($connection, $query_parent_theme);    
    $res_parent_theme = mysqli_fetch_assoc($res_parent_theme);
    
    #Получили ключи массива $res_parent_theme:

    // $res_parent_theme['title'] - название родительской темы теме статьи,

    $option = '<option>'. $res_parent_theme['title'] .'</option>';

    $arr_values['content'] = $res_article ['content'];  //  - содержание статьи,
    $arr_values['title'] = $res_article ['title'];      //  - название стаьи, 
    $arr_values['parent'] = $res_theme['title'];        //  - название темы статьи,
    $arr_values['id'] = $res_article['id'];             //  - номер статьи,
    $arr_values['option'] = $option;                    //  - родительская тема теме статьи (идёт единственным опшеном в селект)          
    return $arr_values;
}
/*
function update_content($theme_title, $name_articles,  $content_articles, $theme_parent, $article_id) {
    global $connection;

    $query_check = "SELECT `id`, `parent` FROM `theme` WHERE `title`='$theme_title'";  
    $res_check = mysqli_query($connection, $query_check);
    $rows = mysqli_num_rows($res_check);
        if ($rows == 0){
            $query = "INSERT INTO `theme`(`id`, `title`, `parent`) VALUES (NULL, '$theme_title', $theme_parent)";
            $res = mysqli_query($connection, $query);            
        } 
        $query_theme_id = "SELECT `id` FROM `theme` WHERE `title`='$theme_title'"; // сократить условием
        $res_theme_id = mysqli_query($connection, $query_theme_id);
        $res_theme_id = mysqli_fetch_all($res_theme_id, MYSQLI_ASSOC);    
        $theme_id = $res_theme_id[0]['id'];

            $res= mysqli_fetch_all($res_check, MYSQLI_ASSOC);
            print_arr($res);
            echo $theme_id = $res['id'];
        }
    $query_article = "UPDATE `articles` SET `parent`='$theme_id',`title`='$name_articles',`content`='$content_articles' WHERE `articles`.`id` = '$article_id';";

function insert_content($theme_title, $theme_parent, $content_articles, $name_articles, $article_alias) {
    global $connection;
        // проверяем есть ли тема, которую будет освещать статья
    $query_check = "SELECT `title`, `id` FROM `theme` WHERE `title`='$theme_title'";
    $res_check = mysqli_query($connection, $query_check);
    $rows = mysqli_num_rows($res_check);
        if ($rows == 0){
            $query = "INSERT INTO `theme`(`id`, `title`, `parent`) VALUES (NULL, '$theme_title', $theme_parent)";
            $res = mysqli_query($connection, $query);            
        } 
    $query_theme_id = "SELECT `id` FROM `theme` WHERE `title`='$theme_title'"; // сократить условием
    $res_theme_id = mysqli_query($connection, $query_theme_id);
    $res_theme_id = mysqli_fetch_all($res_theme_id, MYSQLI_ASSOC);    
    $theme_id = $res_theme_id[0]['id'];
        
    $query_txt = "INSERT INTO `articles`(`id`, `parent`, `title`, `content`, `alias`, `image`) VALUES (NULL, '$theme_id', '$name_articles', '$content_articles', '$article_alias', 'thumb');";		
    $res_txt = mysqli_query($connection, $query_txt);	
    return $theme_id;
}
*/
?>