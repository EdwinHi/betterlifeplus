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
	$cat5_id = $gazpo_settings['gazpo_feat_cat5'];
	$cat5_name = get_cat_name($cat5_id);
	$cat5_url = get_category_link( $cat5_id );
?>

<div class="feat-cat">
	<h3 class="title"><a href="<?php echo esc_url( $cat5_url ); ?>" title="Category Name"><?php echo $cat5_name; ?></a></h3>
		<div class="category-content whitebg">
			<div class="left">	
				<?php 
					query_posts('cat='.$cat5_id.'&posts_per_page=1');
					if (have_posts()) :
						while (have_posts()) : the_post();
						//post thumbnail
						the_post_thumbnail( 'large' ); 
				?>				
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<div class="post-meta">
						<span class="date"><?php the_time('F j'); ?></span>
						<span class="comments"><?php comments_popup_link( __('no comments', 'silverorchid'), __( '1 comment', 'silverorchid'), __('% comments', 'silverorchid')); ?></span>
					</div>
					<p>
						<?php 
							$content = get_the_content();
							$content = strip_tags($content);
							echo mb_substr($content, 0, 140). '...';
						?>				
					</p>			
				<?php 
						endwhile;
					endif; 				
					wp_reset_query(); 
				?>
			</div>
		
			<div class="right">
				<ul>
				<?php 
					query_posts('cat='.$cat5_id.'&posts_per_page=3&offset=1');
					if (have_posts()) :
						while (have_posts()) : the_post(); 
				?>
					<li>
						<div class="thumb">
							<?php the_post_thumbnail( 'thumbnail' ); ?>	
						</div>
						<div class="post-right">
							<h5 class="title">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
								<?php $short_title = mb_substr(the_title('','',FALSE),0,50);
								echo $short_title; if (strlen($short_title) >49){ echo '...'; } ?>	
								</a>
							</h5>
							<div class="post-meta">
								<span class="date"><?php the_time('F j'); ?></span>
								<span class="comments"><?php comments_popup_link( __('no comments', 'silverorchid'), __( '1 comment', 'silverorchid'), __('% comments', 'silverorchid')); ?></span>
							</div>
							<p>
								<?php 
									$content = get_the_content();
									$content = strip_tags($content);
									echo mb_substr($content, 0, 60). '...';
								?>	
							</p>
						</div>
					</li>	
					<?php 
						endwhile;
					endif; 
					wp_reset_query(); 
					?>						
							
				</ul>
										
			</div>
		</div>
</div>