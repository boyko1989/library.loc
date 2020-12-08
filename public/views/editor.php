<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic|Playfair+Display:400,700&subset=latin,cyrillic">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
	<link rel="stylesheet" href="<?=PATH?>public/views/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/decoupled-document/ckeditor.js"></script>
    <title>Библиотека</title>
</head>
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
        <li><a href="view/html/example.php">Файл примера</a></li> 
        <li><a href="view/html/exp.php">WYSIWIG</a></li> 
      </ul>
    </nav>
</header>
<body>
    <div class="content">
        <a href="/">На главную</a><br><br>      
        <form action="editor_controller.php" method="post">
            <p><b>Название:</b> 
            <input type="text" name="name_articles"><br><br></p>

            <p><b>Тема статьи:</b> 
            <input type="text" name="theme"><br><br></p>

            <p><b>Родительская тема:</b>
            <select size="1" name="partheme">
                <?php echo $options; ?>
            </select><br><br>

            <textarea name="txt" cols="60" rows="40"></textarea></textarea><br><br>
            
            <p><b>Алиас:</b> 
            <input type="text" name="alias"><br><br></p>

            <input type="submit" name="submit" value="Сохранить">
        </form>            
        
    </div>
</body>
</html>