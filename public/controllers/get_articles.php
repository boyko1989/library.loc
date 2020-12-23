<?php
    $theme = $_POST;
    $theme_id = $_POST['id']; 
    $theme_title = $_POST['title']; 
    $res_articles = get_articles_ed($theme_id);
    if (!empty($res_articles)) {
            $ht_code = '<h3>Список статей темы <b>'.$theme_title.'</b>:</h3>'.articles_in_form($res_articles);
        }else{
            $ht_code = '<h3>В теме <b>'.$theme_title.'</b> статей нет</h3>';
        }
    $_SESSION['theme'] = $theme_id;
    $_SESSION['form_articles'] = $ht_code;
    header("Location: ".PATH."themeditor/");
?>