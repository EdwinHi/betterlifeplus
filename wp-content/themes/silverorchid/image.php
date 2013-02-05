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
            <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                <h2><?php the_title(); ?></h2>
				<div class="post-meta">
					<span class="info">
						<span class="date"><?php the_time('M. d') ?></span>
						<span class="comments"><?php comments_popup_link( __('no comments', 'silverorchid'), __( '1 comment', 'silverorchid'), __('% comments', 'silverorchid')); ?></span>	
					</span>								
				</div> <!-- /post-meta -->
				
				<div class="entry">						
					<?php the_attachment_link($post->ID, true) ?>
				</div> <!-- entry -->   

				<div class="image-nav">
					<span class="previous"><?php previous_image_link( false, __( '&larr; Previous' , 'silverorchid' ) ); ?></span>
					<span class="next"><?php next_image_link( false, __( 'Next &rarr;' , 'silverorchid' ) ); ?></span>
				</div><!-- /image-navigation -->
				
				<div class="parent-post-link">
					<a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s', 'silverorchid' ), esc_html( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><span class="meta-nav">&laquo; </span><?php echo get_the_title($post->post_parent) ?></a>
				</div>
		
            </div><!-- /post --> 
			
			<?php comments_template(); ?>
			
	</div>	<!-- /content -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>