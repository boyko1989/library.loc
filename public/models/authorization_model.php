<?php
function authorization_user($login, $password) {
    global $connection;

    $error_enter_mes = "";

    if (empty($login) or empty($password)) {
        $error_enter_mes = "Заполните обязательные поля!";
        return $error_enter_mes;
        die;
    }

    $check_user_query = "SELECT `id`, `vis_name` FROM `users` WHERE `login`='$login' AND `password`='$password';";
    $check_user_res = mysqli_query($connection, $check_user_query);
    $rows_check_user = mysqli_num_rows($check_user_res);
    

    if ($rows_check_user == 0){ 
        $not_user_mes = 'Такого пользователя не существует...';
        return $error_create_mes;
        die;
    } else {
        $check_user_res = mysqli_fetch_assoc($check_user_res);
        $vis_name = $check_user_res['vis_name'];
        $user_id = $check_user_res['id'];

        if (!empty($vis_name)) {
            $name_of_user = $vis_name;
        } else {
            $name_of_user = $login;
        }               
        $_SESSION['user'] = $name_of_user;
        $_SESSION['user_id'] = $user_id;
        // $_SESSION['error_mess'] = array('error_enter_mes' => $error_enter_mes, 'not_user_mes' => $not_user_mes);

    }
    return $_SESSION;
}

?>