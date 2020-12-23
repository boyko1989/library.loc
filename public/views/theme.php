<?php 
	require_once('html/head.php');
	require_once('html/header.php');?>

	<div class="container">
		<div class="sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div class="content">
			<p><?=$breadcrumbs;?></p><br><hr><br>			
				<select name="perpage" id="perpage">
					<?php foreach($option_perpage as $option): ?>
						<option <?php if($perpage == $option) echo "selected"; ?> value="<?=$option?>"> <?=$option?> статей на страницу</option>
					<?php endforeach; ?>
				</select><br><br>
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
			$('.nav-toggle').on('click', function(){
			$('#menu').toggleClass('active');
			});
	</script>
<?php require_once('html/footer.php');?>
</div>
</body>
</html>
