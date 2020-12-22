<?php 
require_once('functions.php');
$a = array(
    array('title' => 'Первая статья', 'theme' => 'Основная тема'),
    array('title' => 'Вторая статья', 'theme' => 'Дополнительная тема'),
    array('title' => 'Пятая статья', 'theme' => 'Дополнительная тема'),
    array('title' => 'Шестая статья', 'theme' => 'Дополнительная тема')
);
$ht_code = null; 
$list = null; 
foreach ($a as $key => $value) {
    $title = $value['title'];
    $theme = $value['theme'];

    $ht_code .= articles_to_tamplate($title, $theme).'<br>';
}
echo $ht_code;

?>