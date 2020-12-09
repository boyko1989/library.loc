<?php session_start();
include 'main_controller.php';
include "models/articles_model.php";
include "models/{$view}_model.php";
// формируем список родительских тем
$options = get_option_theme();
extract($_POST);
// если нам нужно отредактировать статью, это будет ясно по наличию алиаса после адреса http://<домен>/editor/

$url_art = $_SERVER['REQUEST_URI'];  // определяем URI
$url_art = is_alias($url_art);
    if($url_art !== "") {
        $is_alias = true;
        // значит нужно загрузить статью в форму и после редактирования - обновить 
        $arr_values = get_article_for_edit($url_art);
        extract($arr_values); 
        // $content - содержание статьи, FROM `articles`
        // $title - название статьи, FROM `articles`
        // $parent - название темы статьи, FROM `theme` $res_theme ['title'] 
        // $id - номер статьи, FROM `articles`
        // $option - родительская тема теме статьи (идёт единственным опшеном в селект) 
        
        // update_content($theme_title, $name_articles,  $content_articles, $theme_parent, $article_id);
    } else {
        $is_alias = false;
        // require_once('views/editor.php');
        // значит полученное из массива $_POST заносим в БД в новую строку
        // insert_content($theme_title, $theme_parent, $content_articles, $name_articles, $article_alias);
        // $_SESSION['theme_id'] = $theme_id;
    }

    require_once('views/editor.php');
    //if(isset($submit)) 
/*if ($url_art !== "") {    
    $res = get_article_for_edit($url_art);
}

if(isset($res)){
    @$title = $res['title'];
    $parent = $res['parent'];
    @$option = $res['option'];
    //@$article_id = $res['id'];
} else {
    @$option = $options;
}

if (isset($_POST['submit'])) {
    $article_id = $_POST['article_id'];
	$theme_title = $_POST['theme'];
	$theme_parent = $_POST['partheme'];
    $content_articles = $_POST['txt'];
    $name_articles = $_POST['name_articles'];
    $article_alias = $_POST['alias'];
    $_SESSION = [
        "theme" => $theme_title,
        "partheme" => $theme_parent,
        "txt" => $content_articles,
        "name_articles" => $name_articles,        
        "article_alias" => $article_alias
    ];

        // такой алиас уже есть, то функция обновления
    if (isset($article_id)) {
        update_content($theme_title, $name_articles,  $content_articles, $theme_parent, $article_id);
    } else {
        $theme_id = insert_content($theme_title, $theme_parent, $content_articles, $name_articles, $article_alias);
        $_SESSION['theme_id'] = $theme_id;
    }
    //header("Location: ".PATH."articles/".$article_alias."");
}*/
// Справочно:

/*
$_POST['name_articles']
$_POST['theme']
$_POST['partheme']
$_POST['txt']
$_POST['alias']
$_POST['article_id']
$_POST['submit']

$arr_values:

Array
(
    [content] => Проверочный контент
    [title] => Вторая статья
    [parent] => Проверка
    [id] => 28
    [option] => <option>Свернуть</option>
)
*/



?>
