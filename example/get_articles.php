<?php session_start();
require_once('functions.php');
require_once('check.php');
$author_login = $_GET['login'];
$author = get_author_id($author_login);
$res_articles = get_articles($author);
if (!empty($res_articles)) $form_articles = '<h3>Список статей автора '.$author_login.':</h3>'.articles_in_form($res_articles);
$_SESSION['form_articles'] = $form_articles;
header('Location: http://example/');
?>