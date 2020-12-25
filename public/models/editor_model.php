<?php 

function get_data($arr) {
    extract($arr);
    $data['parent'] = $arr['theme'];                        // название темы статьи
    $data['title'] = $arr['name_articles'];                 // название статьи
    $data['content'] = $arr['txt'] ;                        // содержание статьи
    $data['parent_theme_id'] = $arr['parent_theme_id'] ;    // номер темы темы статьи
    $data['theme_id'] = $arr['theme_id'];                   // номер темы статьи
    $data['id'] = $arr['article_id'] ;                      // номер статьи
    $data['article_alias'] = $arr['alias'];// алиас
    $data['author'] = $arr['author'];                 
    return $data;
}

function get_option_theme($author, $select) {
    global $connection;
    $query = "SELECT `id`,`title` FROM `theme` WHERE `author` = $author";
    $res = mysqli_query($connection, $query);
    $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $options = "";
    foreach($res as $item) {        
        if(isset($select)) {
            if($select == $item['id']) $options .= '<option value="'.$item['id'].'" selected>'.$item['title'].' (ID: '.$item['id'].')</option>';
        }
        $options .= '<option value="'.$item['id'].'">'.$item['title'].' (ID: '.$item['id'].')</option>';              
    }
    return $options;
}

function is_alias($url_art) {  
    $url_art = $_SERVER['REQUEST_URI'];                     // определяем URI                      
    $url_art = array_reverse(explode('/', $url_art));       // создаём массив, из которого возьмём алиас статьи 
    $url_art = $url_art[0];                                 // берём наш алиас 
    return $url_art;
}

function get_article_for_edit($url_art){
    global $connection;   

    # сначала нужно проверить есть ли тема, которая попала из $_POST['theme']

    $query_article = "SELECT `content`, `title`, `parent`, `id` FROM `articles` WHERE `alias`='$url_art';";    
    $res_article = mysqli_query($connection, $query_article);
    $res_article = mysqli_fetch_assoc($res_article);

    # Получили ключи массива $res_article:

    // $res_article['content'] - содержание статьи,
    // $res_article['title'] - название стаьи,
    // $res_article['parent'] - номер темы статьи,
    // $res_article['id'] - номер статьи,      
    
    $parent_theme = $res_article['parent']; // переменная для следующего запроса 

    $query_theme = "SELECT `title`, `parent` FROM `theme` WHERE `id`=$parent_theme;";
    $res_theme = mysqli_query($connection, $query_theme);
    $res_theme = mysqli_fetch_assoc($res_theme);

    # Получили ключи массива $res_theme:

    // $res_theme['title'] - название темы статьи,
    // $res_theme['parent'] - номер родительской нашей теме темы,  
    
    $parent_theme = $res_theme['parent'];

    $query_parent_theme = "SELECT `title` FROM `theme` WHERE `id`=$parent_theme;";    
    $res_parent_theme = mysqli_query($connection, $query_parent_theme);    
    $res_parent_theme = mysqli_fetch_assoc($res_parent_theme);
    
    #Получили ключи массива $res_parent_theme:

    // $res_parent_theme['title'] - название родительской темы теме статьи,

    $option = '<option>'. $res_parent_theme['title'] .'</option>';

    $arr_values['alias'] = $url_art;                            //  - алиас
    $arr_values['theme_id'] = $res_article['parent'];           //  - номер темы статьи
    $arr_values['parent_theme_id'] = $res_theme['parent'];      //  - номер темы темы статьи 
    $arr_values['content'] = $res_article ['content'];          //  - содержание статьи,
    $arr_values['title'] = $res_article ['title'];              //  - название стаьи, 
    $arr_values['parent'] = $res_theme['title'];                //  - название темы статьи,
    $arr_values['id'] = $res_article['id'];                     //  - номер статьи,
    $arr_values['option'] = $option;                            //  - родительская тема теме статьи (идёт единственным опшеном в селект)         
    
    return  $arr_values;
}

function update_content($parent,            // название темы статьи
                        $title,             // название статьи
                        $content,           // содержание статьи
                        $parent_theme_id,   // номер темы темы статьи
                        $theme_id,          // номер темы статьи
                        $id) {              // номер статьи  
    global $connection;

    # сначала нужно проверить есть ли тема, которая попала из $parent
        // проверка нужна потому что возможно теме нужно поменять название, тогда используем UPDATE
        // либо мы создали новую тему, для нашей имеющейся статьи, тогда используем INSERT

    $query_select_theme = "SELECT `id`, `parent` FROM `theme` WHERE `title`='$parent';";  
    $res_select_theme = mysqli_query($connection, $query_select_theme);
    $rows_theme = mysqli_num_rows($res_select_theme);

        if ($rows_theme == 0){
            $query_insert_theme = "INSERT INTO `theme`(`id`, `title`, `parent`) VALUES (NULL, '$parent', $parent_theme_id);";
            $res_insert_theme = mysqli_query($connection, $query_insert_theme);  

                // получаем номер новой темы

            $query_select_id_theme = "SELECT `id` FROM `theme` WHERE `title`='$parent';"; 
            $res_select_id_theme = mysqli_query($connection, $query_select_id_theme);     
            $res_select_id_theme = mysqli_fetch_assoc($res_select_id_theme);
            $theme_id = $res_select_id_theme['id'];

        } else {
            $query_update_theme = "UPDATE `theme` SET `title`='$parent' WHERE `theme`.`id`='$theme_id';";
            $res_update_theme = mysqli_query($connection, $query_update_theme); 
        }

    # теперь обновляем таблицу статей
        
    $query_update_article = "UPDATE `articles` SET `parent`='$theme_id',`title`='$title',`content`='$content' WHERE `articles`.`id` = '$id';";
    $res_update_article = mysqli_query($connection, $query_update_article); 
    return $article_alias;
}

function create_alias() {
    $article_alias = date("Y-m-d-H-i-s");
    return $article_alias;
}

function insert_content($parent,            // название темы статьи
                        $title,             // название статьи
                        $content,           // содержание статьи
                        $article_alias,     // алиас
                        $author,            // автор
                        $parent_theme_id) { // номер темы темы статьи
    global $connection;

        # сначала нужно проверить есть ли тема, которая попала из $parent

    $query_select_theme = "SELECT `id`, `parent` FROM `theme` WHERE `title`='$parent' AND `author`=$author;";  
    $res_select_theme = mysqli_query($connection, $query_select_theme);
    $rows_theme = mysqli_num_rows($res_select_theme);

    if ($rows_theme == 0){

        $query_insert_theme = "INSERT INTO `theme`(`id`, `title`, `parent`, `author`) VALUES (NULL, '$parent', $parent_theme_id, $author);";
        $res_insert_theme = mysqli_query($connection, $query_insert_theme);  

            // получаем номер новой темы

        $query_select_id_theme = "SELECT `id` FROM `theme` WHERE `title`='$parent' AND `author`=$author;"; 
        $res_select_id_theme = mysqli_query($connection, $query_select_id_theme);     
        $res_select_id_theme = mysqli_fetch_assoc($res_select_id_theme);
        $theme_id = $res_select_id_theme['id'];

    } else {

        $query_select_id_theme = "SELECT `id` FROM `theme` WHERE `title`='$parent' AND `author`=$author;"; 
        $res_select_id_theme = mysqli_query($connection, $query_select_id_theme);     
        $res_select_id_theme = mysqli_fetch_assoc($res_select_id_theme);
        $theme_id = $res_select_id_theme['id'];

        $query_update_theme = "UPDATE `theme` SET `title`='$parent' WHERE `theme`.`id`='$theme_id' AND `theme`.`author`=$author;";
        $res_update_theme = mysqli_query($connection, $query_update_theme); 
    }

    $query_insert_article = "INSERT INTO `articles`(`id`, `parent`, `title`, `content`, `alias`, `image`, `author`) VALUES (NULL, '$theme_id', '$title', '$content', '$article_alias', 'empty_thumb.jpg', $author);";
    $res_insert_article = mysqli_query($connection, $query_insert_article);
    
    return $theme_id;
}

function delete_article($article_alias) {
    global $connection;
	$query_delete_article = "DELETE FROM `articles` WHERE `alias` = '$article_alias';";
	$res_delete_article = mysqli_query($connection, $query_delete_article);
}
?>