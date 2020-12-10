<?php 
	require_once('html/head.php');
  require_once('html/header.php');
  require_once('models/editor_model.php');?>
<body>
    <div class="content">
        <a href="/">На главную</a><br><br>      
        <form action="editor_controller.php" method="post">
            <p><b>Название:</b> 
            <input type="text" name="name_articles" value="<?php if (isset($title)) echo $title;?>" size="80">
            <br><br></p>

            <p><b>Тема статьи:</b> 
            <input type="text" name="theme" value="<?php if (isset($parent)) echo $parent;?>" size="80">
            
              <br><br></p>

            <p><b>Родительская тема:</b>
            <select size="1" name="partheme">
                <?php if (isset($option)) { 
                  echo $option;
                } else {
                  echo $options;
                }?>
            </select><br><br>

            <textarea name="txt" cols="60" rows="40">
            <?php if (isset($content)) echo $content;?>            
            </textarea><br><br>
            
            <p><b>Алиас:</b> 
            <input type="text" name="alias" value="<?php if (isset($url_art)) echo $url_art;?>"><br><br></p>
            <input type="hidden" name="article_id" value="<?php if (isset($id)) echo $id ;?>">
            <input type="submit" name="submit" value="Сохранить">
        </form> 
    </div>
</body>
</html>