<?php 
    require_once('../../connect.php');
    require_once('../../model/exp_model.php');
    if($_POST['submit']) {
        update($_POST['txt'], $_POST['id'], $_POST['theme'], $_POST['partheme']);
        header("Location: exp.php");
        echo '<pre>'; print_r($_POST); echo '</pre>';
        exit;
    }
    $title = 'Редактор';
    require_once('head.php');  
    $txt = selectTxt();
?>
    <body>
        <div class="content">

            <a href="exp.php">Результат</a><br><br>
            <a href="/">На главную</a><br><br>

            <?php //echo '<pre>'; print_r($txt); echo '</pre>'; ?>

            <form action="" method="post">
                <p><b>Тема статьи</b> 
                <input type="text" name="theme" value="<?php echo $txt[0]['theme']?>"><br><br></p>

                <p><b>Родительская тема</b>
                <input type="text" name="partheme" value="<?php echo $txt[0]['partheme']?>"><br><br></p>
                
                <textarea name="txt" cols="100" rows="20"><?php echo $txt[0]['text'];                    
                    /*foreach($txt as $item) {
                        echo $item['text'];}*/ 
                ?></textarea><br>
                <input type="hidden" name="id" value="<?php echo $txt[0]['id']?>"/>
                <input type="submit" name="submit" value="Обновить"/>
            </form>            
            
        </div>
    </body>
</html>