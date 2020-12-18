<?php
require_once('main_controller.php');
require_once('models/editor_model.php');
require_once('models/themeditor_model.php');
require_once('models/main_model.php');

$url = $_SERVER['REQUEST_URI'];
//$url = is_alias($url);
//$url = explode('/', $url);
$url = ltrim($url, '/');

if ($url == "themeditorprot.php") {
	require_once '/themeditorprot.php';
	die;
}
$author = $_SESSION['user']['user_id'];
$theme = get_theme($author);
$theme_tree = map_tree($theme);
$theme_menu_without_links = theme_to_string_without_links($theme_tree);

require_once('views/themeditor.php');

?>