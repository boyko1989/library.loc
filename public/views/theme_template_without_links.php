<li>
	<p><?=$theme['title']?></p>
	<?php if( isset($theme['childs']) && $theme['childs'] ): ?>
	<ul>
		<?php echo theme_to_string_without_links($theme['childs']);?>
	</ul>
	<?php endif; ?>
</li>  