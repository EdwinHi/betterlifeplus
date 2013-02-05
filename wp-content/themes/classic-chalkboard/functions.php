<?php register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'classicchalkboard' ),
	) );
if ( ! isset( $content_width ) ) $content_width = 900;
add_theme_support( 'automatic-feed-links' );
function classicchalkboard_widgets_init() {
	register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="sidebar">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'classicchalkboard_widgets_init' );

function classicchalkboard_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'classicchalkboard' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'classicchalkboard_wp_title', 10, 2 );