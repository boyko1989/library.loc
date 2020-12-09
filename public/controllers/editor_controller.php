<?php session_start();
include 'main_controller.php';
include "models/articles_model.php";
include "models/{$view}_model.php";

$options = get_option_theme();

$url_art = $_SERVER['REQUEST_URI'];
$url_art = array_reverse(explode('/', $url_art));
$url_art = $url_art[0];
if ($url_art !== "") {    
    $res = get_article_for_edit($url_art);
}

if(isset($res)){
    @$title = $res['title'];
    @$parent = $res['parent'];
    @$option = $res['option'];
} else {
    @$option = $options;
}

include "views/{$view}.php";

if (isset($_POST['submit'])) {
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
$theme_id = insert_content($theme_title, $theme_parent, $content_articles, $name_articles,$article_alias);
$_SESSION['theme_id'] = $theme_id;
header("Location: ".PATH."articles/".$article_alias."");
}
?>
