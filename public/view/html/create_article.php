<?php 
require_once('../../connect.php');
require_once('../../model/create_model.php');

echo '<pre>'; print_r($_POST); echo '</pre>';

//$theme_id = $_POST[''];
$theme_title = $_POST['theme'];
$theme_parent = $_POST['partheme'];
$content_articles = $_POST['txt'];
$name_articles = $_POST['name_articles'];

insert_content($theme_title, $theme_parent, $content_articles, $name_articles);

?>