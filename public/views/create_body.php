<?php //defined("CATALOG") or die("Access denied"); ?>
<body>
        <div class="content">

            <a href="exp.php">Результат</a><br><br>
            <a href="/">На главную</a><br><br>

            <?php 
            require_once('../models/create_model.php');
            require_once('../../config.php');
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
                <textarea name="txt"cols="60" rows="40"></textarea></textarea><br><br>
                
                <p><b>Алиас:</b> 
                <input type="text" name="alias"><br><br></p>

                <input type="submit" name="submit" value="Сохранить">
            </form>            
            
        </div>
    </body>
</html>