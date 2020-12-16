<?php
require_once('main_controller.php');
require_once('models/register_model.php');
$url = $_SERVER['REQUEST_URI']; 
$url = array_reverse(explode('/', $url));
$url = $url[0];
if ($url == 'create-user') {
	if (!empty($_POST)) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		$vis_name = $_POST['vis_name'];	
		$name_of_user = create_new_user($login, $password, $vis_name);
		$_SESSION['user'] = $name_of_user;
		header("Location: ".PATH."theme/");
	} else {
		$error_create_mes = 'Заполните все поля!';
		require_once('views/register.php');
	}	
} 
require_once('views/register.php');
?>