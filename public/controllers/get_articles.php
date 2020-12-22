<?php
    $theme = $_POST;
    $theme_id = $_POST['id']; 
    $theme_title = $_POST['title']; 
    $res_articles = get_articles($theme_id);
    if (!empty($res_articles)) $ht_code = '<h3>Список статей темы <b>'.$theme_title.'</b>:</h3>'.articles_in_form($res_articles); 
    $_SESSION['form_articles'] = $ht_code;
    header("Location: ".PATH."themeditor/");
?>