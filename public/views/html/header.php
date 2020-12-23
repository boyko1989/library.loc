<body>
  <div class="wrapper">
    <header>
        <nav class="container">
            <a class="logo" href="/">
                <span>Б</span>
                <span>А</span>
                <span>З</span>
                <span>А</span>        
            </a>
            <div class="nav-toggle"><span></span></div>
                <?php if (!empty($_SESSION)):?>
                <div class="user"><?=$_SESSION['user']['user']?></div>
                <?php endif; ?>
                <form action="../../controller/search.php" method="get" id="searchform">
                    <input type="text" placeholder="Искать на сайте...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <ul id="menu">
                <?php if (empty($_SESSION['user'])): ?>	
                    <li><a href="<?php echo PATH; ?>register/">Регистрация</a></li>
                    <li><a href="<?php echo PATH; ?>authorization/">Авторизация</a></li>
                <?php else: ?>
                    <li><a href="<?php echo PATH; ?>themeditor/">Редактор зависимостей</a></li>
                    <li><a href="<?php echo PATH; ?>signup/">Выйти</a></li>
                <?php endif;?>
                </ul>
        </nav>
    </header>
