<form action="get_articles.php" method="post">
    <input name="title" type="text" value="<?=$title?>" class="title-table-input">
    <input name="parent" type="text" value="<?=$parent?>" class="title-table-input">
    <input name="id" type="hidden" value="<?=$id?>">
    <!-- <input name="out" type="text" class="title-table-input" id="out<?=$id?>"> -->
    <!-- <input name="sel" type="hidden"id="sel<?//=$id?>'" value="<?//=$id?>">-->
    <!-- <input type="button" class="delete-bottom" value="Удалить"> -->
    <input type="submit" class="vis-bottom" value="Статьи" id="art<?=$id?>">
    <!-- <input type="submit" class="save-bottom-submit" value="Обновить"> -->
    <hr>
</form>