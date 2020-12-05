    <body>
        <div class="content">
            <a href="exp_edit.php">Редактор</a><br><br>
            <a href="/">На главную</a><br><br>
            <?php         
                $txt = selectTxt();
                /*foreach($txt as $item) {
                    echo $item['text'];
                    echo '<br>===================================================<br>';
                }*/ 
                echo '<pre>';
                print_r($txt);
                echo '</pre>';       
            ?>
        </div>
    </body>
</html>