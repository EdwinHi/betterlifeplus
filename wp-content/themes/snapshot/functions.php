<?php

define( 'SITEORIGIN_THEME_VERSION' , '1.1' );
define( 'SITEORIGIN_THEME_ENDPOINT' , 'http://siteorigin.com' );

include get_template_directory().'/functions/settings.php';
include get_template_directory().'/functions/admin.php';

if(file_exists(get_template_directory().'/premium/functions.php'))
	include get_template_directory().'/premium/functions.php';

if(!defined('SITEORIGIN_IS_PREMIUM')) {
	include get_template_directory().'/upgrade/upgrade.php';
}

include get_template_directory().'/extras/settings/settings.php';
include get_template_directory().'/extras/premium/premium.php';
include get_template_directory().'/extras/update/update.php';
include get_template_directory().'/extras/admin/admin.php';

if(!function_exists('snapshot_setup_theme')) :
/**
 * General theme setup
 * 
 * @action after_setup_theme
 */
function snapshot_setup_theme(){
	// Enable translation
	load_theme_textdomain( 'snapshot', get_template_directory() . '/languages' );
	
	// We're using SiteOrigin theme settings
	siteorigin_settings_init();

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = siteorigin_setting('posts_sidebar_images') ? 440 : 775;
	
	// The custom header is used for the logo
	add_theme_support('custom-header', array(	
		'flex-width' => true,
		'flex-height' => true,
		'header-text' => false,
	));
	
	// Custom background images are nice
	$background = array();
	switch(siteorigin_setting('appearance_style')){
		case 'light' :
			$background['default-color'] = 'FEFEFE';
			break;
		case 'dark' :
			$background['default-color'] = '333';
			$background['default-image'] = get_template_directory_uri().'/images/dark/bg.png';
			break;
	}
	add_theme_support('custom-background', $background);
	
	add_theme_support('post-thumbnails');
	
	add_theme_support( 'automatic-feed-links' );
	
	set_post_thumbnail_size(310, 420, true);
	add_image_size('single-large', 960, 960, false);
	add_image_size('slider-large', 1600, 1600, false);
	
	// The navigation menus
	register_nav_menu('main-menu', __('Main Menu', 'snapshot'));
	
	add_editor_style();
}
endif;
add_action('after_setup_theme', 'snapshot_setup_theme');


if(!function_exists('snapshot_print_scripts')) :
/**
 * Add the custom style CSS
 * @return mixed
 * 
 * @action wp_print_styles
 */
function snapshot_print_scripts(){
	if(is_admin()) return;

	$header = get_custom_header()
	?>
	<style type="text/css" media="all">
		a{ color: <?php echo siteorigin_setting('appearance_link') ?>; }
		<?php if($header->url) : ?>
			#menu-main-menu,
			#top-area .menu > ul{
				width: <?php echo max(200, 960-$header->width - 20) ?>px;
			}
		<?php endif; ?>
	</style>
	<?php
}
endif;
add_action('wp_print_styles', 'snapshot_print_scripts');


if(!function_exists('snapshot_print_html_shiv')) :
/**
 * Display the HTML 5 shiv conditional
 */
function snapshot_print_html_shiv(){
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
	<![endif]-->
	<?php
}
endif;
add_action('wp_print_scripts', 'snapshot_print_html_shiv');


if(!function_exists('snapshot_setup_widgets')) :
/**
 * Setup the widgets
 * 
 * @action widgets_init
 */
function snapshot_setup_widgets(){
	register_sidebar(array(
		'name' => __('Site Footer', 'snapshot'),
		'id' => 'site-footer',
	));
}
endif;
add_action('widgets_init', 'snapshot_setup_widgets');


if(!function_exists('snapshot_enqueue_scripts')) :
/**
 * Enqueue Snapshot's Scripts.
 * 
 * @action wp_enqueue_scripts
 */
function snapshot_enqueue_scripts(){
	wp_enqueue_style('snapshot', get_stylesheet_uri(), array(), SITEORIGIN_THEME_VERSION);
	
	if(siteorigin_setting('appearance_style') != 'light'){
		wp_enqueue_style('snapshot-style', get_template_directory_uri().'/premium/style-'.siteorigin_setting('appearance_style').'.css', array(), SITEORIGIN_THEME_VERSION);
	}

	wp_enqueue_script('imgpreload', get_template_directory_uri() . '/js/jquery.imgpreload.min.js', array('jquery'), '1.4');
	wp_enqueue_script('snapshot', get_template_directory_uri() . '/js/snapshot.min.js', array('jquery', 'imgpreload'), SITEORIGIN_THEME_VERSION);

	wp_localize_script('snapshot', 'snapshot', array(
		'sliderLoaderUrl' => get_template_directory_uri().'/images/slider-loader.gif',
		'imageLoaderUrl' => get_template_directory_uri().'/images/photo-loader.gif',
	));

	if(is_home() || is_page_template('page-slidertext.php')){
		wp_enqueue_script('imgpreload', get_template_directory_uri() . '/js/jquery.imgpreload.min.js', array('jquery'));
		wp_enqueue_script('snapshot-home', get_template_directory_uri() . '/js/snapshot-home.min.js', array('jquery'), SITEORIGIN_THEME_VERSION);
		wp_localize_script('snapshot-home', 'snapshotHome', array(
			'sliderSpeed' => siteorigin_setting('slider_speed'),
			'transitionSpeed' => siteorigin_setting('slider_transition'),
			'loaderUrl' => get_template_directory_uri().'/images/slider-loader.gif'
		));
	}
	
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	if(is_singular() && siteorigin_setting('social_display_share'))
		wp_enqueue_script('snapshot-google-plusone', get_template_directory_uri() . '/js/plusone.min.js', array(), SITEORIGIN_THEME_VERSION);
		
}
endif;
add_action('wp_enqueue_scripts', 'snapshot_enqueue_scripts');

if(!function_exists('snapshot_wp_title')) :
/**
 * Filter the title
 * @param $title
 * @param $sep
 * @param $seplocation
 * @return string
 * 
 * @filter wp_title
 */
function snapshot_wp_title($title, $sep, $seplocation){
	if(trim($sep) != ''){
		if(!empty($title)) {
			$title_array = explode($sep, $title);
		}
		else $title_array = array();
		
		$title_array[] = get_bloginfo('title');
		if(is_home()) $title_array[] = get_bloginfo('description');

		$title_array = array_map('trim', $title_array);
		$title_array = array_filter($title_array);
		
		if($seplocation == 'left') $title_array = array_reverse($title_array);
		
		$title = implode( " $sep ", $title_array );
	}
	
	return $title;
}
endif;
add_filter('wp_title', 'snapshot_wp_title', 10, 3);


if(!function_exists('snapshot_single_comment')) :
/**
 * Display a single comment.
 * 
 * @param $comment
 * @param $depth
 * @param $args
 */
function snapshot_single_comment($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	?>
	<li id="comment-<?php echo get_comment_ID() ?>" <?php comment_class() ?>>
		<?php if(empty($comment->comment_type) || $comment->comment_type == 'comment') : ?>
			<div class="comment-avatar">
				<?php echo get_avatar(get_comment_author_email(), 60) ?>
			</div>
		<?php elseif($comment->comment_type == 'trackback' || $comment->comment_type == 'pingback') : ?>
			<div class="pingback-icon"></div>
		<?php endif; ?>
		
		<div class="comment-main">
			<div class="comment-info">
				<span class="author"><?php echo get_comment_author_link() ?></span>
				<span class="date"><?php comment_date() ?></span>
		
				<?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])) ?>
			</div>
			<div class="comment-content entry-content">
				<?php comment_text() ?>
			</div>
		</div>
	<?php
}
endif;


if(!function_exists('snapshot_previous_posts_link_attributes')):
/**
 * Add the proper class to the posts nav link
 * @param $attr
 * @return string
 * 
 * @filter previous_posts_link_attributes
 */
function snapshot_previous_posts_link_attributes($attr){
	$attr = 'class="next"';
	return $attr;
}
endif;
add_filter('previous_posts_link_attributes', 'snapshot_previous_posts_link_attributes');


if(!function_exists('snapshot_next_posts_link_attributes')):
/**
 * Add the proper class to the posts nav link
 * @param $attr
 * @return string
 * 
 * @filter next_posts_link_attributes
 */
function snapshot_next_posts_link_attributes($attr){
	$attr = 'class="prev"';
	return $attr;
}
endif;
add_filter('next_posts_link_attributes', 'snapshot_next_posts_link_attributes');


if(!function_exists('snapshot_footer_widget_params')):
/**
 * Set the widths of the footer widgets
 *
 * @param $params
 * @return mixed
 * 
 * @filter dynamic_sidebar_params
 */
function snapshot_footer_widget_params($params){
	// Check that this is the footer
	if($params[0]['id'] != 'site-footer') return $params;

	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = count($sidebars_widgets[$params[0]['id']]);
	$params[0]['before_widget'] = preg_replace('/\>$/', ' style="width:'.round(100/$count,4).'%" >', $params[0]['before_widget']);

	return $params;
}
endif;
add_filter('dynamic_sidebar_params', 'snapshot_footer_widget_params');

function snapshot_wp_page_menu($args){
	?><div id="menu-main-menu-container"><?php
	$args['walker'] = new Snapshot_Walker_Page; 
	wp_page_menu($args);
	?></div><?php
}

if(!class_exists('Snapshot_Walker_Page')) :
class Snapshot_Walker_Page extends Walker_Page{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='sub-menu'><div class='sub-wrapper'><div class='pointer'></div>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</div></ul>\n";
	}

	function start_el( &$output, $page, $depth, $args, $current_page = 0 ) {
		if ( $depth ) $indent = str_repeat("\t", $depth);
		else $indent = '';

		$output .= $indent . '<li class="menu-item"><a href="' . get_permalink($page->ID) . '">' . apply_filters( 'the_title', $page->post_title, $page->ID ) . '</a>';
	}
}
endif;

if(!class_exists('Snapshot_Walker_Nav_Menu')) :
class Snapshot_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='sub-menu'><div class='sub-wrapper'><div class='pointer'></div>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</div></ul>\n";
	}
}
endif;


if(!function_exists('snapshot_get_slider_query')) :
/**
 * Get the method for the slider query
 */
function snapshot_get_slider_query(){
	$query_args = apply_filters('snapshot_slider_query_args', array(
		'post_type' => 'post',
		'posts_per_page' => siteorigin_setting('slider_post_count'),
	));
	return new WP_Query($query_args);
}
endif;

function snapshot_premium_before_post_summary(){
	if(! siteorigin_setting('posts_clickable_thumbnails')) return;
	?><a href="<?php the_permalink() ?>" class="post-content-link"><?php
}
add_action('before_post_summary', 'snapshot_premium_before_post_summary');

function snapshot_premium_after_post_summary(){
	if(! siteorigin_setting('posts_clickable_thumbnails')) return;
	?></a><?php
}
add_action('after_post_summary', 'snapshot_premium_after_post_summary');

if(!function_exists('so_setting')) :
/**
 * This is a wrapper for siteorigin_setting to support legacy child themes.
 *
 * @param $name
 * @param null $default
 * @return mixed
 */
function so_setting($name, $default = null){
	return siteorigin_setting($name, $default);
}
endif;