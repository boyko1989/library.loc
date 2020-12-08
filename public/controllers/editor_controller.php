<?php 
include 'main_controller.php';
include "models/{$view}_model.php";

$options = get_option_theme();

echo 'editor_controller.php';

include "views/{$view}.php";
?>