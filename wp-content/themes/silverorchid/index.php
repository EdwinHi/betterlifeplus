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
	
	<?php 
				
		//show on homepage only
		if (is_home() && $paged < 2 ){
			
			//include slider
			if ( $gazpo_settings['gazpo_show_slider'] == 1 ) {
				get_template_part('includes/slider'); 
			}		
			
			//include carousel posts
			if ( $gazpo_settings['gazpo_show_carousel'] == 1 ) {
				get_template_part('includes/carousel'); 
			}
			
			//include featured category 1
			if ( $gazpo_settings['gazpo_feat_cat1'] != 0) {
				get_template_part('includes/feat_cat1');			
			}
			
			//include featured category 2
			if ( $gazpo_settings['gazpo_feat_cat2'] != 0) {
				get_template_part('includes/feat_cat2');			
			}
			
			//include featured category 3
			if ( $gazpo_settings['gazpo_feat_cat3'] != 0) {
				get_template_part('includes/feat_cat3');			
			}
			
			//include featured category 4
			if ( $gazpo_settings['gazpo_feat_cat4'] != 0) {
				get_template_part('includes/feat_cat4');			
			}
			
			//include featured category 5
			if ( $gazpo_settings['gazpo_feat_cat5'] != 0) {
				get_template_part('includes/feat_cat5');			
			}
		}		
		
		//include latest posts
		if ( $gazpo_settings['gazpo_show_latest_posts'] == 1 ) {
				get_template_part('includes/gazpo_loop'); 				
			}		
	?>

		<div id="pagination">
			<?php echo gazpo_pagination(); ?>
		</div>		
	
	</div><!-- /content -->
		
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>