<?php 
include 'main_controller.php';
include "models/{$view}_model.php";

$get_one_articles = get_one_articles($articles_alias);
// получаем ID категории
$id = $get_one_articles['parent'];

include 'libs/breadcrumbs.php';
include "views/{$view}.php";

?>