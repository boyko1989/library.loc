<?php 
	require_once('html/head.php');
	require_once('html/header.php');
?>
<body>
<h1>Редактор зависимостей</h1>
<h2>Дерево тем</h2>
<?=$theme_menu_without_links;?>
<h2>Список тем</h2>


<?php 
// print_arr($theme);
for ($i=0; $i<=$max_theme; $i++) {
    $sel = $theme_id[$i];
echo '<form action="#" method="post">
        <input name="title" type="text" value="'.$theme_arr[$i].'" class="title-table-input">
        <input name="out" type="text" class="title-table-input" id="out'.$sel.'">
        <input name="sel" type="hidden"id="sel'.$sel.'" value="'.$sel.'">        
        <input type="button" class="delete-bottom" value="Удалить">
        <input type="button" class="vis-bottom" value="Статьи" id="art'.$sel.'">
        <input type="submit" class="save-bottom-submit" value="Обновить">
    <hr>
    </form>
    <script>
        document.querySelector(\'#art'.$sel.'\').onclick = myClick;
        function myClick() {
            let a = document.querySelector(\'#sel'.$sel.'\').value
            document.querySelector(\'#out'.$sel.'\').value = a
        }
    </script>';
}

//if ($count_articles !== 0) {
    
    echo '<h2>Список статей темы <b>"'.$sel_title.'"</b></h2>';

    // echo $atricles;
    // print_arr($sel_title);

    for ($i=0; $i<=$max_articles; $i++) {
    echo '<form action="#" method="post">
            <input type="text" value="'.$atricles_arr[$i].'" class="title-table-input">
            <select>
                <option value="ID темы">Общая</option>
                <option value="ID темы">'.$tab.'Явления природы, влияющие на тактику дворнических работ</option>
                <option value="ID темы">'.$tab.'Кулинария</option>
                <option value="ID темы">'.$dtab.'Бутерброды</option>
                <option value="ID темы">'.$tab.'КМ468</option>
                <option value="ID темы">'.$tab.'Проверка</option>
                <option value="ID темы">'.$tab.'Этот сайт</option>
                <option value="ID темы">'.$dtab.'Строение</option>
                <option value="ID темы">'.$tab.'Кулинария</option>
            </select>
        <input type="button" class="delete-bottom" value="Удалить">
        <input type="submit" class="save-bottom-submit" value="Сохранить">
        <hr>
        </form>';
    }
//} else {
    //echo '<h2>Статей у темы <b>"'.$sel_title.'"</b> нет</h2>';
//}
    
//}

?>
<script>
    // получаем "Удалить" - удаляем по id через проверку
    // получаем "Статьи" - передаём переменную $sel в $themeditor_controller и получаем 

</script>
</body>
</html>

<!--<select name="parent">
            <option value="ID темы">Общая</option>
            <option value="ID темы">'.$tab.'Явления природы, влияющие на тактику дворнических работ</option>
            <option value="ID темы">'.$tab.'Кулинария</option>
            <option value="ID темы">'.$dtab.'Бутерброды</option>
            <option value="ID темы">'.$tab.'КМ468</option>
            <option value="ID темы">'.$tab.'Проверка</option>
            <option value="ID темы">'.$tab.'Этот сайт</option>
            <option value="ID темы">'.$dtab.'Строение</option>
            <option value="ID темы">'.$tab.'Кулинария</option>
        </select>-->