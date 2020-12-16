<?php
function create_new_user($login, $password,$vis_name) {
global $connection;
$error_create_mes = "";

if (empty($login) or empty($password)) {
    $error_create_mes = "Заполните обязательные поля!";
    return $error_create_mes;
    die;
}
if (empty($vis_name)) {
    $vis_name = $login;
} 

$check_user_query = "SELECT `id` FROM `users` WHERE `login`='$login';";
$check_user_res = mysqli_query($connection, $check_user_query);

$rows_check_user = mysqli_num_rows($check_user_res);

if ($rows_check_user !== 0){ 
    $mes = 'Такой пользователь существует...';
    return $error_create_mes;
    die;
}

$create_user_query = "INSERT INTO `users`(`id`, `login`, `password`, `vis_name`) VALUES (NULL,'$login', '$password', '$vis_name');";
$create_user_res = mysqli_query($connection, $create_user_query);

$check_create_user_query = "SELECT `vis_name`, `id` FROM `users` WHERE `login`='$login' AND `password`='$password';";
$check_create_user_query_res = mysqli_query($connection, $check_create_user_query);
$check_create_user_query_res = mysqli_fetch_assoc($check_create_user_query_res);
$name_of_user = $check_create_user_query_res['vis_name'];
$user_id = $check_create_user_query_res['id'];

$_SESSION['user'] = $name_of_user;
$_SESSION['user_id'] = $user_id;

return $_SESSION;
}
?>