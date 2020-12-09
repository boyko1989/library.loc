<?php session_start();
include 'main_controller.php';
include "models/articles_model.php";
include "models/{$view}_model.php";
$articles_alias = 
$options = get_option_theme();
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
        "theme_id" => $theme_id,
        "article_alias" => $article_alias
    ];
    //echo $_SESSION['theme_id'].'<br>';
insert_content($theme_title, $theme_parent, $content_articles, $name_articles,$article_alias);
die;
//sleep(2);
//header("Location: ".PATH."articles/".$article_alias."");
}

if (isset($_SESSION)) {
    print_arr($_SESSION);
    $get_one_articles = get_one_articles($_SESSION['article_alias']);
    print_arr($get_one_articles);
    if (isset($get_one_articles['articles_alias'])) {
        $alias_for_editor = $get_one_articles['articles_alias'];
        echo $alias_for_editor .' - нужный алиас';
    }
} else {
    echo '$articles_alias не найден';
}
