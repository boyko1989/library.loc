<?php 
//defined("CATALOG") or die("Access denied");
require_once('../../config.php');
require_once('../models/create_model.php');
//$theme_ = $_POST['theme'];
$theme_title = $_POST['theme'];
$theme_parent = $_POST['partheme'];
$content_articles = $_POST['txt'];
$name_articles = $_POST['name_articles'];
$article_alias = $_POST['alias'];
insert_content($theme_title, $theme_parent, $content_articles, $name_articles,$article_alias);
session_start();
$_SESSION = [
    "theme" => $theme_title,
    "partheme" => $theme_parent,
    "txt" => $content_articles,
    "name_articles" => $name_articles,
    "theme_id" => $theme_id,
    "article_alias" => $article_alias
];
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
header("Location: ".PATH."articles/".$article_alias."");
?>

<!--http://boyko.sytes.net/public/views/'.PATH.'artticle/'.Array.'-->








