<header>
    <nav class="container">
        <a class="logo" href="/">
        <span>Б</span>
        <span>А</span>
        <span>З</span>
        <span>А</span>        
        </a>
        <div class="nav-toggle"><span></span></div>
        <form action="../../controller/search.php" method="get" id="searchform">
        <input type="text" placeholder="Искать на сайте...">
        <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <ul id="menu">
        <!-- <li><a href="<?=PATH?>public/controllers/themeditor_controller.php">Редактор тем</a></li>  -->
        <li><a href="<?php echo PATH; ?>themeditor/">Редактор тем</a></li> 
        <!-- <li><a href="view/html/exp.php">WYSIWIG</a></li>  -->
        </ul>
    </nav>
</header>