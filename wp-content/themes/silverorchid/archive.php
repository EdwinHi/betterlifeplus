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
	$gazpo_settings = get_option( 'gazpo_options');
	
	if(is_category()):
		$archive_title = 'Category: '. single_term_title("", false);
	elseif (is_day()):
		$archive_title = 'Archive for: '. get_the_time('F jS, Y');
	elseif (is_month()):
		$archive_title = 'Archive for: '. get_the_time('F Y');
	elseif (is_year()):
		$archive_title = 'Archive for: '. get_the_time('Y');
	elseif (is_author()):
		$archive_title = 'Author: '.get_the_author();
	else:
		$archive_title = "Archive";
	endif;

?>
	<div id="content" >	
		<h2><?php echo $archive_title ?></h2>
		<?php get_template_part('includes/gazpo_loop'); ?>
		
		<div id="pagination">
			<?php echo gazpo_pagination(); ?>
		</div>	
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>