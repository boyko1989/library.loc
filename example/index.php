<?php session_start();
require_once('functions.php');
//require_once('query_articles.php');
require_once('check.php');
//require_once('get_articles.php');

$author = 1;
/*----- Список авторов -----*/
$res_user = get_users($res_user); //Переменные для списка авторов
$form_users = users_in_form($res_user); // Форма вывода отдельного автора

/*----- Статьи автора ------*/

// $res_articles = get_articles($author);
// if (!empty($res_articles)) $form_articles = '<h3>Список статей автора:</h3>'.articles_in_form($res_articles);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>    
    <title>Информация по запросу</title>
</head>
<body>
    <div class="authors"> 
        <h3>Список авторов:</h3>
            <?=$form_users?>
    </div>
    <div class="articles">        
        <?php         
            echo $_SESSION['form_articles'];        
        ?>  
    </div>
    <script type="text/javascript" src="js/script.js"></script> 
</body>
</html>