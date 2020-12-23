<?php 
	require_once('html/head.php');
    require_once('html/header.php');
    $form_theme = themes_in_form($theme);
?>
<body>
<h1>Редактор зависимостей</h1>
<h2>Дерево тем</h2>
<?=$theme_menu_without_links;?>
<h2>Список тем</h2>
    <div class="themes"> 
        <?=$form_theme?>
    </div>
</body>
</html>