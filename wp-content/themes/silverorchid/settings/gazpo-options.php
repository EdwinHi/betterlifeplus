<?php
function gazpo_theme_options_init() {
	wp_enqueue_style( 'gazpo-theme-options-style', get_template_directory_uri() . '/settings/options.css' );
}
add_action( 'admin_init', 'gazpo_theme_options_init' );

global $gazpo_options;
$settings = get_option( 'gazpo_options', $gazpo_options );
$gazpo_read_more = __('Read more' , 'silverorchid');
$gazpo_logo_url = get_template_directory_uri().'/images/logo.png';
$gazpo_ad468_img = get_template_directory_uri().'/images/ad468.png';
$gazpo_ad468_code = "<a href=".get_site_url()."><img src=".$gazpo_ad468_img." /></a>";

$gazpo_options = array(
	'gazpo_logo_url' => $gazpo_logo_url,
	'gazpo_favicon_url' => '',
	'gazpo_rss_url' => get_bloginfo('rss2_url'),
	'gazpo_show_latest_posts' => true,
	'gazpo_read_more' => $gazpo_read_more,
	'gazpo_show_slider' => true,
	'gazpo_show_carousel' => true,
	'gazpo_show_homecats' => true,	
	'gazpo_slider_category' => '',
	'gazpo_carousel_category' => '',	
	'gazpo_feat_cat1' => '',
	'gazpo_feat_cat2' => '',
	'gazpo_feat_cat3' => '',
	'gazpo_feat_cat4' => '',
	'gazpo_feat_cat5' => '',
	'gazpo_tracking_code' => '',
	'gazpo_css_code' => '',
	'gazpo_ad468_code' => $gazpo_ad468_code
);

function gazpo_validate_options( $input ) {
	global $gazpo_options;	

	$settings = get_option( 'gazpo_options', $gazpo_options );
	
	if ( ! isset( $input['gazpo_logo_url'] ) )
	$input['gazpo_logo_url'] = null;
	$input['gazpo_logo_url'] = esc_url_raw( $input['gazpo_logo_url'] );
	
	if ( ! isset( $input['gazpo_favicon_url'] ) )
	$input['gazpo_favicon_url'] = null;
	$input['gazpo_favicon_url'] = esc_url_raw( $input['gazpo_favicon_url'] );
	
	if ( ! isset( $input['gazpo_rss_url'] ) )
	$input['gazpo_rss_url'] = null;
	$input['gazpo_rss_url'] = esc_url_raw( $input['gazpo_rss_url'] );
	
	if ( ! isset( $input['gazpo_show_slider'] ) )
	$input['gazpo_show_slider'] = null;
	$input['gazpo_show_slider'] = ( $input['gazpo_show_slider'] == 1 ? 1 : 0 );
	
	if ( ! isset( $input['gazpo_show_carousel'] ) )
	$input['gazpo_show_carousel'] = null;
	$input['gazpo_show_carousel'] = ( $input['gazpo_show_carousel'] == 1 ? 1 : 0 );
		
	if ( ! isset( $input['gazpo_show_latest_posts'] ) )
	$input['gazpo_show_latest_posts'] = null;
	$input['gazpo_show_latest_posts'] = ( $input['gazpo_show_latest_posts'] == 1 ? 1 : 0 );
	
	if ( ! isset( $input['gazpo_read_more'] ) )
	$input['gazpo_read_more'] = null;
	$input['gazpo_read_more'] = wp_kses_stripslashes($input['gazpo_read_more']);
	
	if ( ! isset( $input['gazpo_tracking_code'] ) )
	$input['gazpo_tracking_code'] = null;
	$input['gazpo_tracking_code'] = wp_kses_stripslashes($input['gazpo_tracking_code']);
	
	if ( ! isset( $input['gazpo_css_code'] ) )
	$input['gazpo_css_code'] = null;
	$input['gazpo_css_code'] = wp_kses_stripslashes($input['gazpo_css_code']);
	
	if ( ! isset( $input['gazpo_ad468_code'] ) )
	$input['gazpo_ad468_code'] = null;
	$input['gazpo_ad468_code'] = wp_kses_stripslashes($input['gazpo_ad468_code']);

	return $input;
}


if ( is_admin() ) : 

//register settings and call sanitation functions
function gazpo_register_settings() {
	register_setting( 'gazpo_theme_options', 'gazpo_options', 'gazpo_validate_options' );
}
add_action( 'admin_init', 'gazpo_register_settings' );

function gazpo_theme_options() {
	add_theme_page('silverorchid'.__('Theme Options','silverorchid'), 'silverorchid '.__('Theme Options','silverorchid'), 'edit_theme_options', 'theme-options', 'gazpo_theme_options_page' );
}
add_action( 'admin_menu', 'gazpo_theme_options' );

//default options
function gazpo_default_options() {
     global $gazpo_options;
     $gazpo_options_temp = $gazpo_options;
     $options = get_option( 'gazpo_options', $gazpo_options );
	foreach ( $gazpo_options as $gazpo_option_key => $gazpo_option_value ) {
		if ( isset($options[$gazpo_option_key])) {
			$gazpo_options[$gazpo_option_key] = $options[$gazpo_option_key];
		}
	}     
     update_option( 'gazpo_options', $gazpo_options );
}
add_action( 'init', 'gazpo_default_options' );

//generate options page
function gazpo_theme_options_page() {
	global $gazpo_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	if( isset( $_REQUEST['action'])&&('reset' == $_REQUEST['action']) ) 
		delete_option( 'gazpo_options' );
?>

	<div id="gazpo-admin" class="wrap">
	
	<div class="header">	
			<div class="gazpo-logo">
				<a href="http://gazpo.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/settings/images/logo.png" alt="" /></a>
			</div>		
			<div class="theme-info">		
				<h3>silverOrchid</h3>			
				<ul>
					<li class="docs"><a href="http://gazpo.com/2012/04/silverorchid" target="_blank">Theme Support</a></li>
					<li class="support"><a href="http://gazpo.com/contact/" target="_blank">Contact</a></li>					
				</ul>
			</div>
	</div><!-- /header -->	
	
	<div class="options-form">
	
	<?php screen_icon(); echo "<h2>" . __( 'Theme Options' ,'silverorchid' ) . "</h2>"; ?>
	<?php if ( isset( $_REQUEST['action'])&&('reset' == $_REQUEST['action']) ) : ?>
	<div class="updated_status fade"><?php _e( 'Options reset successfully. Remember to save the default settings!','silverorchid' ); ?></div>
	<?php elseif ( $_REQUEST['settings-updated'] ) : ?>
	<div class="updated_status fade"><?php _e( 'Options saved successfully!','silverorchid' ); ?></div>
	<?php endif;?>
	
	<form method="post" action="options.php">

	<?php $settings = get_option( 'gazpo_options', $gazpo_options ); ?>	
	<?php settings_fields( 'gazpo_theme_options' ); ?>
		
	
	<h3>Homepage Settings</h3>
	<div class="field">
		<label><?php _e( 'Logo URL','silverorchid' ); ?></label>
       	<input class="input" id="gazpo_logo_url" name="gazpo_options[gazpo_logo_url]" type="text" value="<?php esc_attr_e($settings['gazpo_logo_url']); ?>" />
		<span><?php _e( 'Enter full URL for logo image starting with <strong>http:// </strong>.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Favicon URL','silverorchid' ); ?></label>
       	<input class="input" id="gazpo_favicon_url" name="gazpo_options[gazpo_favicon_url]" type="text" value="<?php esc_attr_e($settings['gazpo_favicon_url']); ?>" />
		<span><?php _e( 'Enter full URL for favicon image starting with <strong>http:// </strong>.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'RSS Feeds URL','silverorchid' ); ?></label>
       	<input class="input" id="gazpo_rss_url" name="gazpo_options[gazpo_rss_url]" type="text" value="<?php esc_attr_e($settings['gazpo_rss_url']); ?>" />
		<span><?php _e( 'Enter full URL for favicon image starting with <strong>http:// </strong>. Leave blank to use default RSS Feed URL.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Show Slider?','silverorchid' ); ?></label>
       	<input class="checkbox" type="checkbox" id="gazpo_show_slider" name="gazpo_options[gazpo_show_slider]" value="1" <?php checked( true, $settings['gazpo_show_slider'] ); ?> />
		<span><?php _e( 'Show slider on homepage?','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Slider Category','silverorchid' ); ?></label>
		<?php 
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );  ?>
		<select id="gazpo_slider_category" name="gazpo_options[gazpo_slider_category]">
		<option <?php selected( 0 == $settings['gazpo_slider_category'] ); ?> value="0"><?php _e( '--none--', 'silverorchid' ); ?></option>
		<?php foreach( $categories as $category ) : ?>
			<option <?php selected( $category->term_id == $settings['gazpo_slider_category'] ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
		<span><?php _e( 'Select the category for the slider. Select <strong>none</strong> to show latest posts.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Show Carousel?','silverorchid' ); ?></label>
       	<input class="checkbox" type="checkbox" id="gazpo_show_carousel" name="gazpo_options[gazpo_show_carousel]" value="1" <?php checked( true, $settings['gazpo_show_carousel'] ); ?> />
		<span><?php _e( 'Show Carousel posts on homepage?','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Carousel Category','silverorchid' ); ?></label>
		<?php 
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );  ?>
		<select id="gazpo_carousel_category" name="gazpo_options[gazpo_carousel_category]">
		<option <?php selected( 0 == $settings['gazpo_carousel_category'] ); ?> value="0"><?php _e( '--none--', 'silverorchid' ); ?></option>
		<?php foreach( $categories as $category ) : ?>
			<option <?php selected( $category->term_id == $settings['gazpo_carousel_category'] ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
		<span><?php _e( 'Select the category for the carousel. Select <strong>none</strong> to show latest posts.','silverorchid' ); ?></span>
	</div>
	
	
	<div class="field">
		<label><?php _e( 'Homepage Category 1','silverorchid' ); ?></label>
		<?php 
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );  ?>
		<select id="gazpo_feat_cat1" name="gazpo_options[gazpo_feat_cat1]">
		<option <?php selected( 0 == $settings['gazpo_feat_cat1'] ); ?> value="0"><?php _e( '--none--', 'silverorchid' ); ?></option>
		<?php foreach( $categories as $category ) : ?>
			<option <?php selected( $category->term_id == $settings['gazpo_feat_cat1'] ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
		<span><?php _e( 'First featured category. Select <strong>none</strong> if you don\'t want to display.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Homepage Category 2','silverorchid' ); ?></label>
		<?php 
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );  ?>
		<select id="gazpo_feat_cat2" name="gazpo_options[gazpo_feat_cat2]">
		<option <?php selected( 0 == $settings['gazpo_feat_cat2'] ); ?> value="0"><?php _e( '--none--', 'silverorchid' ); ?></option>
		<?php foreach( $categories as $category ) : ?>
			<option <?php selected( $category->term_id == $settings['gazpo_feat_cat2'] ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
		<span><?php _e( 'Second featured category. Select <strong>none</strong> if you don\'t want to display.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Homepage Category 3','silverorchid' ); ?></label>
		<?php 
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );  ?>
		<select id="gazpo_feat_cat3" name="gazpo_options[gazpo_feat_cat3]">
		<option <?php selected( 0 == $settings['gazpo_feat_cat3'] ); ?> value="0"><?php _e( '--none--', 'silverorchid' ); ?></option>
		<?php foreach( $categories as $category ) : ?>
			<option <?php selected( $category->term_id == $settings['gazpo_feat_cat3'] ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
		<span><?php _e( 'Third featured category. Select <strong>none</strong> if you don\'t want to display.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Homepage Category 4','silverorchid' ); ?></label>
		<?php 
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );  ?>
		<select id="gazpo_feat_cat4" name="gazpo_options[gazpo_feat_cat4]">
		<option <?php selected( 0 == $settings['gazpo_feat_cat4'] ); ?> value="0"><?php _e( '--none--', 'silverorchid' ); ?></option>
		<?php foreach( $categories as $category ) : ?>
			<option <?php selected( $category->term_id == $settings['gazpo_feat_cat4'] ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
		<span><?php _e( 'Fourth featured category. Select <strong>none</strong> if you don\'t want to display.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Homepage Category 5','silverorchid' ); ?></label>
		<?php 
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );  ?>
		<select id="gazpo_feat_cat5" name="gazpo_options[gazpo_feat_cat5]">
		<option <?php selected( 0 == $settings['gazpo_feat_cat5'] ); ?> value="0"><?php _e( '--none--', 'silverorchid' ); ?></option>
		<?php foreach( $categories as $category ) : ?>
			<option <?php selected( $category->term_id == $settings['gazpo_feat_cat5'] ); ?> value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
		<span><?php _e( 'Fifth featured category. Select <strong>none</strong> if you don\'t want to display.','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Show latest posts','silverorchid' ); ?></label>
       	<input class="checkbox" type="checkbox" id="gazpo_show_latest_posts" name="gazpo_options[gazpo_show_latest_posts]" value="1" <?php checked( true, $settings['gazpo_show_latest_posts'] ); ?> />
		<span><?php _e( 'Show latest posts on homepage?','silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Read more text','silverorchid' ); ?></label>
       	<input class="input" id="gazpo_read_more" name="gazpo_options[gazpo_read_more]" type="text" value="<?php esc_attr_e($settings['gazpo_read_more']); ?>" />
		<span><?php _e( 'Text for the read more link.','silverorchid' ); ?></span>
	</div>
	
	<h3>Miscellaneous</h3>
	
	<div class="field">
		<label><?php _e( 'Header ad code','silverorchid' ); ?></label>
       	<textarea class="textarea" id="gazpo_ad468_code" name="gazpo_options[gazpo_ad468_code]" ><?php echo stripslashes($settings['gazpo_ad468_code']); ?></textarea>
		<span><?php _e( 'Enter full <strong>html code</strong> for the 468x60 px header ad. ', 'silverorchid' ); ?></span>
	</div>	
	
	<div class="field">
		<label><?php _e( 'Tracking Code','silverorchid' ); ?></label>
       	<textarea class="textarea" id="gazpo_tracking_code" name="gazpo_options[gazpo_tracking_code]" ><?php echo stripslashes($settings['gazpo_tracking_code']); ?></textarea>
		<span><?php _e( 'If you want to add any tracking code (eg. Google Analytics). It will appear in the footer of the theme.', 'silverorchid' ); ?></span>
	</div>
	
	<div class="field">
		<label><?php _e( 'Custom CSS Code','silverorchid' ); ?></label>
       	<textarea class="textarea" id="gazpo_css_code" name="gazpo_options[gazpo_css_code]" ><?php echo stripslashes($settings['gazpo_css_code']); ?></textarea>
		<span><?php _e( 'If you want to add any CSS code.', 'silverorchid' ); ?></span>
	</div>
	
	</div> <!-- /gazpo_options -->
	<!---- /form fields ---->
	
	
	<p class="submit"><input type="submit" class="button-primary" value="Save Settings" /></p>
	</form>
	
	<form method="post">
		<p class="submit">
			<input class="button" name="reset" type="submit" value="Reset All Settings" />
			<input type="hidden" name="action" value="reset" />
		</p>
	</form>

	</div>

	<?php
}

endif;  // EndIf is_admin()