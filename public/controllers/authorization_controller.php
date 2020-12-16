<?php 
    require_once('main_controller.php');
    require_once('models/authorization_model.php');
    $url = $_SERVER['REQUEST_URI']; 
    $url = array_reverse(explode('/', $url));
    $url = $url[0];
    if ($url == 'enter') {
        $login = $_POST['login'];
        $password = $_POST['password'];        
        $name_of_user = authorization_user($login, $password);
        $_SESSION['user'] = $name_of_user;
        header("Location: ".PATH."");
	}
    require_once('views/authorization.php');
?>
