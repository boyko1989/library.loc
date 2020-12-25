<?php 

function get_articles_for_themeditor($sel, $author){
    global $connection;
	$query = "SELECT `title` FROM `articles` WHERE `author`= $author AND `parent` = $sel;"; // это переменная, которая определит выбранную тему
    $res = mysqli_query($connection, $query);
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);

    return $res;
}

function get_title_sel_theme($sel){
    global $connection;
    $query = "SELECT `title` FROM `theme` WHERE `id`=$sel";
    $res = mysqli_query($connection, $query);
    //$row = mysqli_fetch_row($res);
    //if ($row == 0) return false;
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);    
    $res = $res[0]['title'];

    return $res;
}

function delete_theme($id) {
    global $connection;

    $query_check = "SELECT `parent` FROM `theme` WHERE `id` = $id";
    $res_check = mysqli_query($connection, $query_check);
    $res_check = mysqli_fetch_all($res_check, MYSQLI_ASSOC);
    $parent_del = $res_check[0]['parent'];

    $query_check_3 = "SELECT * FROM `theme` WHERE `parent` = $id";
    $res_check_3 = mysqli_query($connection, $query_check_3);
    $res_check_3 = mysqli_num_rows($res_check_3);

    $query_check_2 = "SELECT * FROM `articles` WHERE `parent` = $id";
    $res_check_2 = mysqli_query($connection, $query_check_2);
    $res_check_2 = mysqli_num_rows($res_check_2);    

    if ($parent_del != 0 AND $res_check_2 == 0 AND $res_check_3 == 0) {
        $query_delete = "DELETE FROM `theme` WHERE `theme`.`id` = $id";
        $res_delete = mysqli_query($connection, $query_delete); 
        $delete_message = 'Удалено успешно';
    } else if ($parent_del == 0) {
        $delete_message = 'Нельзя удалить корневую тему!!';
    } else if ($res_check_3 != 0) {
        $delete_message = 'Нельзя удалить тему-родителя!!';
    } else {
        $delete_message = 'Нельзя удалить тему со статьями!!';
    }
    return $delete_message;
}
?>
