<form action="get_articles.php" method="get">
    <input type="text" name="login" id="<? echo 'aut'.$id; ?>" class="login" value="<?=$login?>">
    <span> <?=$count?> ст.</span>
    <input type="submit" value="Посмотреть статьи"><br>   
    <div class="articles">
        <?php  
            if ($id == $_SESSION['author'] ) echo $_SESSION['form_articles'];        
        ?> 
    </div>
</form>