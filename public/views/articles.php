<?php defined("CATALOG") or die("Access denied"); ?>
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
	<!-- <a href="<?=PATH?>">Главная</a> -->
	<!-- <div class="wrapper">
		<div class="sidebar">
			<?php //include 'sidebar.php'; ?>
		</div> -->
	<div class="container">
		<?php include 'sidebar.php'; ?>
		<div class="posts-list"> 
			<article  class="post">
				<div class="post-content">
					<p><?=$breadcrumbs;?></p><br><hr>
				<?php if($get_one_articles): ?>
				<?php 
					//print_arr($get_one_articles);
					echo '<br><h1>'.$get_one_articles['title'].'</h1>';
					echo '<br>'.$get_one_articles['content'];
				?>

				<?php else: ?>
					Статьи не существует
				<?php endif; ?>				
				</div>
			</article>
		</div>
	</div>
<script src="<?=PATH?>public/views/js/jquery-1.9.0.min.js"></script>
<script src="<?=PATH?>public/views/js/jquery.accordion.js"></script>
<script src="<?=PATH?>public/views/js/jquery.cookie.js"></script>
<script>
	$(document).ready(function(){
		//$(".theme").dcAccordion();
		$(".widget-category-list").dcAccordion();
	});
</script>
</body>
</html>