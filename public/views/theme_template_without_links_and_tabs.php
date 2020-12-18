<p><?=$theme['title']?></p>
	<?php if( isset($theme['childs']) && $theme['childs'] ): ?>	
	<?php echo theme_to_string_without_links($theme['childs']);?>	
	<?php endif; ?>