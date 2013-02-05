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
				<div class="post-meta">
					<span class="info">
						<span class="date"><?php the_time('M. d') ?></span>
						<span class="category"><?php the_category(', ' ); ?></span> 
						<span class="comments"><?php comments_popup_link( __('no comments', 'silverorchid'), __( '1 comment', 'silverorchid'), __('% comments', 'silverorchid')); ?></span>	
					</span>								
				</div> <!-- /post-meta -->
				
				<div class="entry">						
					<?php the_content(); ?>
				</div> <!-- entry -->   

				<div class="post-tags">
					 <?php the_tags(); ?> 
				</div>
				
				<div class="post-nav">
					<div class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . __( '&larr;', 'Previous post link', 'silverorchid' ) . '</span> %title' ); ?></div>
					<div class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . __( '&rarr;', 'Next post link', 'silverorchid' ) . '</span>' ); ?></div>
				</div><!-- /page links -->
		
            </div><!-- /post --> 
			
		<?php 
			wp_link_pages( __('before=<div class="post-page-links">Pages:&after=</div>', 'silverorchid') ) ;
			comments_template(); 
		?>
		
		
		
	</div>	<!-- /content -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>