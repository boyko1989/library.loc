<?php 
	require_once('html/head.php');
	require_once('html/header.php');
?>
	<body>	
		<div class="container">
			<?php include 'sidebar.php'; ?>
			<div class="posts-list"> 
				<article  class="post">
					<div class="post-content">
						<p><?=$breadcrumbs;?></p><br><hr>
							<?php if($get_one_articles){
								echo '<br><h1>'.$get_one_articles['title'].'</h1>';
								echo '<br>'.$get_one_articles['content'];
							} else {
								echo 'Статьи не существует';
							} 
							?>				
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

		$('.nav-toggle').on('click', function(){
		$('#menu').toggleClass('active');
		});

	</script>
		<?php //require_once('html/header.php');?>
	</body>
</html>
