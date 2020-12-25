<form class="list-theme-item" action="<?=$action?>" method="post">
    <label>Название:</label>
    <input name="title" type="text" value="<?=$title?>" class="title-table-input"><br><br> 
    <label>ID темы:</label><span> <?=$id?></span><br><br><label>Количество статей:</label><span> <?=$count_articles?></span><br><br>     
    <label>Родитель:</label>
    <select name="parent" type="text" class="title-table-input">
    <?=$options?>
    </select>
    <input name="id" type="hidden" value="<?=$id?>"><br>
    <!-- <input name="out" type="text" class="title-table-input" id="out<?//=$id?>"> -->
    <!-- <input name="sel" type="hidden"id="sel<?//=$id?>'" value="<?//=$id?>">-->
   
    <a href="delete-theme?id=<?=$id?>" class="delete-bottom">Удалить</a>
    <!-- <a href="vis-bottom?id=<?=$value_submit?>" class="vis-bottom">Статьи</a><br>
     -->
     <input type="submit" class="vis-bottom" value="<?=$value_submit?>" id="art<?=$id?>">
    <!-- <input type="submit" class="save-bottom-submit" value="Обновить"> -->
    <hr><hr>    
</form>
    <div class="del-message">
        <?php 
            if ($id == $_SESSION['theme_d_id'] ) {
                echo '<div class="attention"><h1>'.$_SESSION['delete_message'].'</h1></div>'; 
                unset($_SESSION['delete_message']);
            } 
        ?>
    </div>
    <div class="articles">
    <?php 
         if ($id == $_SESSION['theme'] ) echo $_SESSION['form_articles']; 
    ?>
    </div>