<?php
require_once('main_controller.php');
require_once('models/register_model.php');
$url = $_SERVER['REQUEST_URI']; 
$url = array_reverse(explode('/', $url));
$url = $url[0];
if ($url == 'create-user') {
	$login = $_POST['login'];
	$password = $_POST['password'];
	$vis_name = $_POST['vis_name'];
	
	create_new_user($login, $password, $vis_name);
	$mes = 'New user create';
	}
//$url = ltrim($url, '/');
require_once('views/register.php');
?>