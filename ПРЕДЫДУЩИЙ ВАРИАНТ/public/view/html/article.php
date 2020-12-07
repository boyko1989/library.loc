<?php session_start();
    $title = "Ваша статья";
    require_once('../../model/main_model.php');
    require_once('../../model/exp_model.php');
    require_once('../../connect.php');
    require_once("head.php");
    require_once("main_header.php");
    require_once("main_sidebar.php");
    require_once('article_view.php');
?>