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
	$carousel_cat_id = $gazpo_settings['gazpo_carousel_category'];
	//if no category is selected for carousel, show latest posts
	if ( $carousel_cat_id == 0 ) {
		$post_query = 'posts_per_page=10';
	} else {
		$post_query = 'cat='.$carousel_cat_id.'&posts_per_page=10';
	}
?>
	<div id="gazpo-carousel">
		<div class="carousel-posts">
				<ul>
					<?php query_posts( $post_query ); if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<li>
						<?php the_post_thumbnail( 'carousel-thumb' ); ?>	
						<h5> 
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
								<?php $short_title = mb_substr(the_title('','',FALSE),0,25);
								echo $short_title; if (strlen($short_title) >24){ echo '...'; } ?>	
							</a>
						</h5>
						<div class="post-meta">
							<span class="date"><?php the_time('F j'); ?></span>
							<span class="comments"><?php comments_popup_link( __('no comments', 'silverorchid'), __( '1 comment', 'silverorchid'), __('% comments', 'silverorchid')); ?></span>
						</div>
					</li>
					
					<?php endwhile; endif;?>
					<?php wp_reset_query();?>
				</ul>
			</div>
	</div>