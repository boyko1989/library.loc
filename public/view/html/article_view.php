    <body>    
        <div class="container">
            <div class="posts-list"> 
                <article id="post-1" class="post">
                    <div class="post-content">
                                            
                        <br><br><h1><u>Тема: <?=$_SESSION['theme']?></u><a href="exp_edit.php" class="widget-title">Редактировать</a></h1><br>
                        <?php  echo $_SESSION['txt'];
                         //echo '<pre>'; print_r($_SESSION); echo '</pre>'; ?>    

                    </div>
                </article>
            </div>
        </div>
    </body>
</html>