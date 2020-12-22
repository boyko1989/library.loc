<?php
require_once('main_controller.php');
require_once('models/editor_model.php');
require_once('models/themeditor_model.php');
require_once('models/main_model.php');

$url = $_SERVER['REQUEST_URI'];
$tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$dtab = $tab.$tab;
$url = ltrim($url, '/');

if ($url == "themeditorprot.php") {
	require_once '/themeditorprot.php';
	die;
}

$author = $_SESSION['user']['user_id'];
# Получаем данные для списка тем
$theme = get_theme($author);
$theme_tree = map_tree($theme);
$theme_menu_without_links = theme_to_string_without_links($theme_tree);

foreach ($theme as $title) {	
	$theme_arr[] = $title['title'];
	$theme_id[] = $title['id'];
}
$max_theme = (count($theme_arr)) - 1;

# Получаем данные для списка статей выбраной темы
$sel = 23;
//if (isset($sel)) {
	$atricles = get_articles_for_themeditor($sel, $author);
	@$count_articles = count($articles);
//}

$sel_title = get_title_sel_theme($sel);

foreach ($atricles as $title) {	
	$atricles_arr[] = $title['title'];
}
if (isset($atricles_arr)) $max_articles = (count($atricles_arr)) - 1;

if ($url == "themeditor/get_articles.php") {
	require_once 'get_articles.php';
	die;
}

require_once('views/themeditor.php');

?>