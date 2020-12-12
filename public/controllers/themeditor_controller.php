<?php
require_once('main_controller.php');
//require_once('models/articles_model.php');
require_once('models/themeditor_model.php');
$theme = get_theme();
$theme_tree = map_tree($theme);
$theme_menu_without_links = theme_to_string_without_links($theme_tree);

require_once('views/themeditor.php');

?>