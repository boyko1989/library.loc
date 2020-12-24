<?php session_start();
require_once('functions.php');
require_once('check.php');

//$author = 1;
/*----- Список авторов -----*/
$res_user = get_users($res_user); //Переменные для списка авторов
$form_users = users_in_form($res_user); // Форма вывода отдельного автора

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.min.css">
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>    
    <title>Информация по запросу</title>
</head>
    <body>
        <div class="wrapper">
            <header>
                <nav>
                    <div class="logo">
                        <img src="img/logo.png">
                    </div>
                    <div id="menu">
                        <a href="#">Вкладка 1</a>
                        <a href="#">Вкладка 2</a>
                        <a href="#">Вкладка 3</a>
                    </div>
                </nav>
            </header>
            <div class="content">
                <div class="authors"> 
                    <h3>Список авторов:</h3>
                        <?=$form_users?>
                </div>
            </div>
            <footer>
                <p>Содержание футера</p>
            </footer>
        </div>
    <script type="text/javascript" src="js/script.js"></script> 
    </body>
</html>