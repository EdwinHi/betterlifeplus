<?php 
/**
 * Theme:  	  silverOrchid
 * Theme URL: http://gazpo.com/2012/04/silverorchid 
 * Created:   April 2012
 * Author:    Sami Ch.
 * URL: 	  http://gazpo.com
 * 
 **/
 
require( get_template_directory() . '/settings/gazpo-options.php' );
require( get_template_directory() . '/widgets/ad125.php' );
require( get_template_directory() . '/widgets/facebook.php' );
require( get_template_directory() . '/widgets/twitter.php' );
//require( get_template_directory() . '/widgets/subscribers_count.php' );

if (!is_admin()){
	add_action('wp_enqueue_scripts', 'gazpo_script_loader');
	add_action('wp_print_styles', 'gazpo_styles_loader');
}    

if (!function_exists('gazpo_script_loader')) {
    function gazpo_script_loader() {
		wp_enqueue_script('jquery-ui-tabs-rotate', get_template_directory_uri().'/js/jquery-ui-tabs-rotate.js', array('jquery', 'jquery-ui-tabs'));
		wp_enqueue_script('gazpo_custom', get_template_directory_uri().'/js/gazpo_custom.js', array('jquery', 'jquery-ui-tabs-rotate'));
		wp_enqueue_script('jcarousellite', get_template_directory_uri() . '/js/jcarousellite_1.0.1.min.js', array('jquery'), '1.0.1', false);
    }
}
	
if (!function_exists('gazpo_styles_loader')) {
    function gazpo_styles_loader() {
		wp_enqueue_style( 'google_fonts', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700' );			
    }
}

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );	
}

add_image_size( 'slider-image', 430, 300, true );		//slider image
add_image_size( 'slider-thumb', 70, 50, true );			//slider thumb
add_image_size( 'carousel-thumb', 190, 130, true );		//carousel image

if ( !isset($content_width) ) {
	$content_width = 600;
}

if ( function_exists('add_theme_support') ) {
	add_theme_support('automatic-feed-links');
}

if ( function_exists('add_theme_support') ){
	add_theme_support('post-thumbnails');
}

if ( function_exists('add_editor_style') ) {
	add_editor_style();
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		));
	
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}

function gazpo_pagination( $type = 'plain', $endsize = 1, $midsize = 1 ) {
	global $wp_query, $wp_rewrite;	
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	if ( ! in_array( $type, array( 'plain', 'list', 'array' ) ) ) $type = 'plain';
	$endsize = (int) $endsize;
	$midsize = (int) $midsize;

	$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => false,
		'end_size' => $endsize,
		'mid_size' => $midsize,
		'type' => $type,
		'prev_text' => '&larr;',
		'next_text' => '&rarr;'
	);

	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

	return paginate_links( $pagination );
}

function gazpo_wp_title( $old_title, $sep, $sep_location ) {
    global $page, $paged;
    $gazpo_title_text = $old_title . get_bloginfo( 'name' );
    $sep = ' ' . $sep . ' ';

    $site_tagline = get_bloginfo( 'description', 'display' );
    if ( $site_tagline && ( is_home() || is_front_page() ) )
        $gazpo_title_text .= "$sep$site_tagline";

        if ( $paged >= 2 || $page >= 2 )
            $gazpo_title_text .= $sep . sprintf( __( 'Page %s', 'silverorchid' ), max( $paged, $page ) );
    
	return $gazpo_title_text;
}
add_filter( 'wp_title', 'gazpo_wp_title', 10, 3 );


function register_my_menus() {
register_nav_menus( array(
		'header_menu' => __( 'Header Navigation', 'silverorchid' ),
		) );	
}
add_action( 'init', 'register_my_menus' );

//remove default RSS links from header
remove_action( 'wp_head', 'feed_links', 2 );
?>