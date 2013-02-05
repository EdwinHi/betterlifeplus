<?php
/**
 * Theme:  	  silverOrchid
 * Theme URL: http://gazpo.com/2012/04/silverorchid 
 * Created:   April 2012
 * Author:    Sami Ch.
 * URL: 	  http://gazpo.com
 * 
 **/
$gazpo_settings = get_option( 'gazpo_options');
get_header(); 
?>

<div id="content">

	<?php if (have_posts()) : ?>
				<h2><?php _e('Search Results For ', 'silverorchid'); ?>&ldquo;<?php echo $s; ?>&rdquo;</h2>
				<?php 
					while (have_posts()) : the_post(); ?>			
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>										
							<div class="post-meta">
								<span class="info">
									<span class="date"><?php the_time('M. d') ?></span>
									<?php if ( $post->post_type == 'post' ) { ?> 
										<span class="category"><?php the_category(', ' ); ?></span> 
									<?php } ?>
									<span class="comments"><?php comments_popup_link( __('no comments', 'silverorchid'), __( '1 comment', 'silverorchid'), __('% comments', 'silverorchid')); ?></span>	
								</span>								
							</div>
					
							<div class="entry">						
								<?php
									if ( $gazpo_settings['gazpo_read_more'] != ''){
										$readmore_text= $gazpo_settings['gazpo_read_more'];
									} else {
										$readmore_text= 'Read more &rarr;';
									}							
									the_content($readmore_text); 
								?>							
							</div>						
						</div><!-- /post-->

				<?php 
					endwhile;		
			else : ?>	
				<div class="post">			
					<h2><?php _e('Nothing Found For ', 'silverorchid'); ?>&ldquo;<?php echo $s; ?>&rdquo;</h2>
					<p><?php _e('No posts found. Please try searching with different keywords.', 'silverorchid'); ?></p>
				</div>
		<?php 
			endif; 
		?>
	
		<div id="pagination">
				<?php echo gazpo_pagination(); ?>
		</div>
	</div><!-- /content -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
