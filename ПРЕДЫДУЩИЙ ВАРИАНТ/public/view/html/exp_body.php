    <body>
        <div class="content">
            <a href="exp_edit.php">Редактор</a><br><br>
            <a href="/">На главную</a><br><br>
            <?php         
                $txt = selectTxt();
                foreach($txt as $item) {
                    echo '<article id="post-1" class="post">
                    <div class="post-content">
                    <h1><u>Тема: '.$item['theme'].'</u></h1><br>';
                    echo '<a href=""><u>Относится к теме: '.$item['partheme'].'</u></a><br><br>';
                    echo $item['text'];
                    echo '</div>
                    </article>
                    <br>===================================================<br>';
                }/*
                echo '<pre>';
                print_r($txt);
                echo '</pre>';    */    
            ?>
        </div>
    </body>
</html>