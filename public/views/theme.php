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
	<div class="container">
		<div class="sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div class="content">
			<p><?=$breadcrumbs;?></p>
			<br><hr><br>
			<div>
				<select name="perpage" id="perpage">
					<?php foreach($option_perpage as $option): ?>
						<option <?php if($perpage == $option) echo "selected"; ?> value="<?=$option?>"> <?=$option?> статей на страницу</option>
					<?php endforeach; ?>
				</select><br>
			</div><br>

			<?php if($articles): ?>
				
				<?php if( $count_pages > 1 ): ?>
					<div class="pagination"><?=$pagination?></div>
				<?php endif; ?>

				<?php foreach($articles as $art): ?>
					<a href="<?=PATH?>articles/<?=$art['alias']?>"><?=$art['title']?></a><br><br>
				<?php endforeach; ?>				
				
			<?php else: ?>
				<p>К теме не относится ни одна статья...</p>
			<?php endif; ?>
		</div>
	</div>
	<script src="<?=PATH?>public/views/js/jquery-1.9.0.min.js"></script>
	<script src="<?=PATH?>public/views/js/jquery.accordion.js"></script>
	<script src="<?=PATH?>public/views/js/jquery.cookie.js"></script>
	<script>
		$(document).ready(function(){
			/*$(".theme").dcAccordion();*/
			$(".widget-category-list").dcAccordion();
			$("#perpage").change(function(){
				var perPage = this.value; // $(this).val()
				$.cookie('per_page', perPage, {expires:7, path:'public/'});
				window.location = location.href;
			});
		});
	</script>
</body>
</html>