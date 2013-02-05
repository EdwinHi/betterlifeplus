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
?>
	<div id="content" >	
		<h2><?php echo 'Tag: '. single_term_title("", false); ?></h2>
		
		<div class="posts-list">
		
		<?php 
			if (have_posts()) :
				while (have_posts()) : the_post();
				?>			
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
										
						<div class="post-meta">
							
							<span class="info">
								<span class="date"><?php the_time('M. d') ?></span>
								<span class="category"><?php the_category(', ' ); ?></span> 
								<span class="comments"><?php comments_popup_link( __('no comments', 'silverorchid'), __( '1 comment', 'silverorchid'), __('% comments', 'silverorchid')); ?></span>	
							</span>								
							
						</div> <!-- /post-meta -->
					
						<div class="entry">
						
						<?php													
							if ( $gazpo_settings['gazpo_read_more'] != ''){
								$readmore_text= $gazpo_settings['gazpo_read_more'];
							} else {
								$readmore_text= 'Read more &rarr;';
							}													
							the_content($readmore_text); 
						?>							
						</div> <!-- entry -->
						
						<div class="post-tags">
							<?php the_tags(); ?> 
						</div>						
						
					</div><!-- /post-->

				<?php 
					endwhile;
			endif;
			wp_reset_query(); 
		?>

</div>
		
		<div id="pagination">
			<?php echo gazpo_pagination(); ?>
		</div>	
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>