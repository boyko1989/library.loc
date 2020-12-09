<aside> 
    <div class="widget">
        <h4 class="widget-title">Темы:</h4>
        <ul class="widget-category-list">
	<?php echo $theme_menu ?>
</ul>
</div>
    <br>
<a href="<?=PATH?>editor/" class="widget-title">Добавить статью</a><br><br><br><br> 
    <?php
        if (isset($get_one_articles['articles_alias'])) {
            echo '<a href="'.PATH.'editor/'.$get_one_articles['articles_alias'].'" class="widget-title">Редактировать</a><br><br><br><br> ';
        }
    ?>
</aside>