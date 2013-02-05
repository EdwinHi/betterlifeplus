<?php
/**
 * Theme:  	  silverOrchid
 * Theme URL: http://gazpo.com/2012/04/silverorchid 
 * Created:   April 2012
 * Author:    Sami Ch.
 * URL: 	  http://gazpo.com
 * 
 **/
get_header();
?>

	<div id="content">
		<div class="post">
		<h2><?php _e('Error 404 &mdash; Not Found', 'silverorchid'); ?></h2>
			<p>
				<?php _e('You are trying to reach a page that does not exist here. Either it has been moved or you typed a wrong address.', 'silverorchid'); ?>
			</p>
		</div>
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>