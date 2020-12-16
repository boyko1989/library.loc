<?php 
include '../config.php';
include 'models/main_model.php';
if (!empty($_SESSION)) {
    $author = $_SESSION['user']['user_id'];

    $theme = get_theme($author);
    $theme_tree = map_tree($theme);
    $theme_menu = theme_to_string($theme_tree);
}
?>