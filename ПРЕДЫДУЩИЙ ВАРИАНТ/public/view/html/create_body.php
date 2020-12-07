<body>
        <div class="content">

            <a href="exp.php">Результат</a><br><br>
            <a href="/">На главную</a><br><br>

            <?php 
            require_once('../../model/create_model.php');
            require_once('../../connect.php');
            $options = get_option_theme();

            //echo '<pre>'; print_r($txt); echo '</pre>'; ?>

            <form action="create_article.php" method="post">
                <p><b>Название:</b> 
                <input type="text" name="name_articles"><br><br></p>

                <p><b>Тема статьи:</b> 
                <input type="text" name="theme"><br><br></p>

                <p><b>Родительская тема:</b>
                <select size="1" name="partheme">
                    <?php echo $options; ?>
                </select><br><br>
                <!-- <input type="text" name="partheme"><br><br></p>                 -->
                <textarea name="txt" cols="100" rows="20"></textarea><br>                
                <input type="submit" name="submit" value="Сохранить">
            </form>            
            
        </div>
    </body>
</html>