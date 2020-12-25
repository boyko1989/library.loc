<form class="list-theme-item" action="<?=$action?>" method="post">
    <label>Название:</label>
    <input name="title" type="text" value="<?=$title?>" class="title-table-input"><br><br> 
    <label>ID темы:</label><span> <?=$id?></span><br><br><label>Количество статей:</label><span> <?=$count_articles?></span><br><br>     
    <label>Родитель:</label>
    <!-- <input name="parent" type="text" value="<?=$parent?>" class="title-table-input"><br> -->
    <select name="parent" type="text" class="title-table-input">
    <?=$options?>
    </select>
    <input name="id" type="hidden" value="<?=$id?>">
    <!-- <input name="out" type="text" class="title-table-input" id="out<?//=$id?>"> -->
    <!-- <input name="sel" type="hidden"id="sel<?//=$id?>'" value="<?//=$id?>">-->
    <!-- <input type="button" class="delete-bottom" value="Удалить"> -->
    <input type="submit" class="vis-bottom" value="<?=$value_submit?>" id="art<?=$id?>">
    <!-- <input type="submit" class="save-bottom-submit" value="Обновить"> -->
    <div class="articles">
    <?php 
         if ($id == $_SESSION['theme'] ) echo $_SESSION['form_articles']; 
    ?>
    </div>
    <hr><hr>
</form>