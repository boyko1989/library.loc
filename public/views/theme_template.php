<li>
	<a href="<?=PATH?>theme/<?=$theme['id']?>"><?=$theme['title']?></a>
	<?php if( isset($theme['childs']) && $theme['childs'] ): ?>
	<ul>
		<?php echo theme_to_string($theme['childs']); ?>
	</ul>
	<?php endif; ?>
</li>