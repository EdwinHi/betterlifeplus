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
		<?php the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
					<div class="entry">						
						<?php the_content(); ?>
					</div> <!-- entry -->          
            </div><!-- /post --> 
			
			<?php comments_template(); ?>
			
	</div><!-- /content -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
