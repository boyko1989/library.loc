<?php session_start();
// error_reporting(E_ALL);

if (!empty($_SESSION['user'])) {
	$routes = array(
		array('url' => '#^$|^\?#', 'view' => 'theme'),
		array('url' => '#^articles/(?P<articles_alias>[a-z0-9-]+)#i', 'view' => 'articles'),
		array('url' => '#^theme/(?P<id>\d+)#i', 'view' => 'theme'),
		array('url' => '#^theme/#i', 'view' => 'theme'),
		array('url' => '#^editor/#i', 'view' =>'editor'),
		array('url' => '#^editor/(?P<articles_alias>[a-z0-9-]+)#i', 'view' =>'editor'),
		array('url' => '#^themeditor/#i', 'view' =>'themeditor'),
		array('url' => '#^themeditorprot\.php$#i', 'view' => 'themeditor'),
		array('url' => '#^signup/$#i', 'view' => 'signup'),
		array('url' => '#^example/$#i', 'view' => 'example')
	);
} else {
	$routes = array(
		array('url' => '#^$#', 'view' => 'hello'),
		array('url' => '#^articles/(?P<articles_alias>[a-z0-9-]+)#i', 'view' => 'articles'),
		array('url' => '#^register/$#i', 'view' => 'register'),
		array('url' => '#^register/(?P<register_do>[a-z0-9]+)#i', 'view' => 'register'),
		array('url' => '#^authorization/$#i', 'view' => 'authorization'),
		array('url' => '#^authorization/(?P<authorization_do>[a-z0-9]+)#i', 'view' => 'authorization'),
		array('url' => '#^example/$#i', 'view' => 'example')
	);
}

$url = ltrim($_SERVER['REQUEST_URI'], '/');

foreach ($routes as $route) {
	if( preg_match($route['url'], $url, $match) ){
		$view = $route['view'];
		break;
	}
}

if( empty($match) ){
	include 'views/404.php';
	exit;
}

extract($match);
// $id - ID категории
// $product_alias - alias продукта
// $view - вид для подключения/*
if (empty($_SESSION['user']) and $view == 'hello') {
	require_once('controllers/hello_controller.php');
	die;
} else {
	include "controllers/{$view}_controller.php";
}