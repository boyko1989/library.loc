<aside>
    <div class="widget">
        <h4 class="widget-title">Темы:</h4>
        <ul class="widget-category-list">
            <?php             
                $articles = get_articles();
                if (empty($articles)) echo '<li>Библиотека пуста!</li>';
            ?>
        </ul>
    </div>
    <br>
<a href="view/input.php" class="widget-title">Добавить статью</a>

</aside>