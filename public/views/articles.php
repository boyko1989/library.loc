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
<?php if($get_one_articles): ?>
	<?php print_arr($get_one_articles); ?>
<?php else: ?>
	Такого товара нет
<?php endif; ?>
		</div>
	</div>
	<script src="<?=PATH?>public/views/js/jquery-1.9.0.min.js"></script>
	<script src="<?=PATH?>public/views/js/jquery.accordion.js"></script>
	<script src="<?=PATH?>public/views/js/jquery.cookie.js"></script>
	<script>
		$(document).ready(function(){
			$(".theme").dcAccordion();
		});
	</script>
</body>
</html>