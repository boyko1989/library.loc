<? ob_start(); ?><?php 
include 'main_controller.php';
include "models/articles_model.php";
include "models/{$view}_model.php";
$url_art = $_SERVER['REQUEST_URI'];  // определяем alias
$url_art = is_alias($url_art);
$author = $_SESSION['user']['user_id'];

if ($url_art == "") {
    $action = 'create';
    $select = "";
    $options = get_option_theme($author, $select);
    require_once('views/editor.php');
    die;

} else if ($url_art == "update") {
    
    $update_data = get_data($_POST);
    extract($update_data);    
    
    update_content($parent,             // название темы статьи
                    $title,             // название статьи
                    $content,           // содержание статьи
                    $parent_theme_id,   // номер темы темы статьи
                    $theme_id,          // номер темы статьи
                    $id);               // номер статьи

    header("Location: ".PATH."articles/".$article_alias."");
    die; 

} else if ($url_art == "create"){
    $insert_data = get_data($_POST);
    extract($insert_data);
    //$author = $_SESSION['user']['user_id'];
    $article_alias = create_alias();
    insert_content($parent,             // название темы статьи
                    $title,             // название статьи
                    $content,           // содержание статьи
                    $article_alias,     // алиас
                    $author,            // автор
                    $parent_theme_id); 
header("Location: ".PATH."articles/".$article_alias."");
    
} else if ($url_art == "delete"){
    $article_alias = $_SERVER['REQUEST_URI'];
    $article_alias = array_reverse(explode('/', $article_alias));
    $article_alias = $article_alias[1]; 
    $delete_message = 'Точно удалить статью?';
    require_once('views/editor.php'); 

} else if ($url_art == "true-delete"){ 
    $article_alias = $_SERVER['REQUEST_URI'];
    $article_alias = array_reverse(explode('/', $article_alias));
    $article_alias = $article_alias[1];    
	delete_article($article_alias);
    header("Location: ".PATH."");
    
} else {
    $arr_values = get_article_for_edit($url_art);
    $action = 'update';
    extract($arr_values); 
    require_once('views/editor.php');
    die;
}
?><? ob_flush(); ?>