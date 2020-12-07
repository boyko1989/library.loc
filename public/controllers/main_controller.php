<?php //defined("CATALOG") or die("Access denied");

include '../config.php';
include 'models/main_model.php';

$theme = get_theme();
$theme_tree = map_tree($theme);
$theme_menu = theme_to_string($theme_tree);

?>