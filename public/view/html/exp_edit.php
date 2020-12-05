<?php 
    $title = 'Редактор';
    require_once('../../model/exp_model.php');
    require_once('head.php');

    if($_POST['submit']) {
        update($_POST['txt'], $_POST['id']);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }

    $txt = selectTxt();
?>
    <body>
        <div class="content">
            <a href="exp.php">Результат</a><br><br>
            <a href="/">На главную</a><br><br>

            <form method="post">
                <textarea name="txt" cols="100" rows="20"><?php echo $txt[0]['text']?></textarea><br>
                <input type="hidden" name="id" value="<?php echo $txt[0]['id']?>"/>
                <input type="submit" name="submit" value="Обновить"/>
            </form>
        </div>
    </body>
</html>