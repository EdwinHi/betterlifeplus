<?php
/**
 * Theme:  	  silverOrchid
 * Theme URL: http://gazpo.com/2012/04/silverorchid 
 * Created:   April 2012
 * Author:    Sami Ch.
 * URL: 	  http://gazpo.com
 * 
 **/
 ?>
 
</div> <!-- content container -->
 
<div id="gazpo-footer">
	<div class="wrap">
		<div class="widgets_area">
			<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer') ) ?>
		</div>
		
		<div class="info">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo ('name');?>">
			<?php bloginfo ('name');?></a> 
			<?php _e('Powered by','silverorchid'); ?> <a href="http://www.wordpress.org"><?php _e('WordPress','silverorchid'); ?></a> <?php _e('and theme by','silverorchid'); ?>	 <a href="http://gazpo.com/" title="gazpo.com"><?php _e('gazpo.com','silverorchid'); ?></a>.		
		</div>
	</div>	
</div><!-- /footer -->
</div><!-- /wrapper -->
<?php  
$gazpo_settings = get_option( 'gazpo_options');
	if ( isset($gazpo_settings['gazpo_tracking_code']) && ($gazpo_settings['gazpo_tracking_code']!="") ){
			echo(stripslashes ($gazpo_settings['gazpo_tracking_code']));
} 
?>
<?php wp_footer(); ?>
</body>
</html>
<!-- Theme by gazpo.com -->