<?php 
include 'main_controller.php';
include "models/articles_model.php";
include "models/{$view}_model.php";
$options = get_option_theme();
include "views/{$view}.php";
if (isset($_POST['submit'])) {
	$theme_title = $_POST['theme'];
	$theme_parent = $_POST['partheme'];
$content_articles = $_POST['txt'];
$name_articles = $_POST['name_articles'];
$article_alias = $_POST['alias'];
session_start();
$_SESSION = [
    "theme" => $theme_title,
    "partheme" => $theme_parent,
    "txt" => $content_articles,
    "name_articles" => $name_articles,
    "theme_id" => $theme_id,
    "article_alias" => $article_alias
];
insert_content($theme_title, $theme_parent, $content_articles, $name_articles,$article_alias);
header("Location: ".PATH."articles/".$article_alias."");
}
?>