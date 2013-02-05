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
	$slider_cat_id = $gazpo_settings['gazpo_slider_category'];
	//if no category is selected for slider, show latest posts
	if ( $slider_cat_id == 0 ) {
		$post_query = 'posts_per_page=4&ignore_sticky_posts=1';
	} else {
		$post_query = 'cat='.$slider_cat_id.'&posts_per_page=4&ignore_sticky_posts=1';
	}
?>

<div id="gazpo-slider" >
		<ul class="ui-tabs-nav ui-tabs-selected">			
			<?php query_posts( $post_query ); ?>
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<li class="ui-tabs-nav-item" id="nav-fragment-<?php echo $post->ID; ?>">
			<a href="#fragment-<?php echo $post->ID; ?>">
				<?php the_post_thumbnail( 'slider-thumb' ); ?>				
				<span class="title">
						<?php $short_title = mb_substr(the_title('','',FALSE),0,40);
						echo $short_title; if (strlen($short_title) >39){ echo '...'; } ?>	
				</span>
				<br />				
				<span class="date"><?php the_time('F j'); ?></span>
			</a>
			</li>	
			<?php endwhile; endif;?>
			<?php wp_reset_query();?>			
	    </ul>
		
		<?php query_posts( $post_query ); ?>
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<div id="fragment-<?php echo $post->ID; ?>" class="ui-tabs-panel ui-tabs-hide" style="">
			<?php the_post_thumbnail( 'slider-image' ); ?>
			 <div class="info" >
				<h2> 
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					<?php $short_title = mb_substr(the_title('','',FALSE),0,35);
					echo $short_title; if (strlen($short_title) >34){ echo '...'; } ?>	
					</a>
				</h2>				
				<p>
				<?php 
					$content = get_the_content();
					$content = strip_tags($content);
					echo mb_substr($content, 0, 150). '...';
				?>				
				</p>
			 </div>
	    </div>
		
			<?php endwhile; endif;?>
			<?php wp_reset_query();?>
</div>