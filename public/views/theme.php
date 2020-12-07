<?php defined("CATALOG") or die("Access denied"); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Каталог</title>
	<link rel="stylesheet" href="<?=PATH?>views/style.css">
</head>
<body>
	<a href="<?=PATH?>">Главная</a>
	<div class="wrapper">
		<div class="sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div class="content">
			<p><?=$breadcrumbs;?></p>
			<br>
			<hr>

			<div>
				<select name="perpage" id="perpage">
					<?php foreach($option_perpage as $option): ?>
						<option <?php if($perpage == $option) echo "selected"; ?> value="<?=$option?>"> <?=$option?> товаров на страницу</option>
					<?php endforeach; ?>
				</select>
			</div>

			<?php if($articles): ?>
				
				<?php if( $count_pages > 1 ): ?>
					<div class="pagination"><?=$pagination?></div>
				<?php endif; ?>

				<?php foreach($articles as $product): ?>
					<a href="<?=PATH?>articles/<?=$product['alias']?>"><?=$product['title']?></a><br>
				<?php endforeach; ?>

				<?php if( $count_pages > 1 ): ?>
					<div class="pagination"><?=$pagination?></div>
				<?php endif; ?>
				
			<?php else: ?>
				<p>Здесь товаров нет!</p>
			<?php endif; ?>
		</div>
	</div>
	<script src="<?=PATH?>public/views/js/jquery-1.9.0.min.js"></script>
	<script src="<?=PATH?>public/views/js/jquery.accordion.js"></script>
	<script src="<?=PATH?>public/views/js/jquery.cookie.js"></script>
	<script>
		$(document).ready(function(){
			$(".theme").dcAccordion();
			$("#perpage").change(function(){
				var perPage = this.value; // $(this).val()
				$.cookie('per_page', perPage, {expires:7, path:'public/'});
				window.location = location.href;
			});
		});
	</script>
</body>
</html>