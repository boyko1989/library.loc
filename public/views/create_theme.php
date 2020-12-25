<?php
require_once('models/create_model.php');
echo 'Создание темы';
$title="";
$parent="";
$id="";
$count_articles="";
$value_submit="Сохранить";
$action = '';
$select = "";
$options = get_option_theme($_SESSION['user']['user_id'], $select);
include('template_theme_list.php');
if(!empty($_POST)) print_arr($_POST);
if(!empty($_SESSION)) print_arr($_SESSION);


?>