<?php
/*
Template Name: Full Width
*/

get_header(); 
?>

	<div id="content" class="wide-content">
		<?php the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
					<div class="entry">						
						<?php the_content(); ?>
					</div> <!-- entry -->          
            </div><!-- /post --> 
	</div><!-- /content -->
	
<?php get_footer(); ?>
