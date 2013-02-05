<?php
/**
 * Celestial functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * @file           functions.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0  
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 770;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Celestial Lite supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Celestial Lite 1.0
 */
function styledthemes_setup() {
	/*
	 * Makes this theme available for translation.
	 *a
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Celestial Lite, use a find and replace
	 * to change 'celestial' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'celestial', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside','image','quote', 'status' ) );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu'			=>	__( 'Primary Menu', 'celestial' ),
		'footer-menu' 		=>	__( 'Footer Menu', 'celestial' )
	) );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => '000000',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts and will add these sizes to your media library.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1170, 9999 ); // Unlimited height, soft crop
	//set_post_thumbnail_size(); //original size of image - no cropping or sizing
	//add_image_size( 'blog-small', 250, 170, true ); //250x150 cropped image
	//add_image_size( 'blog-large', 750, 250, true ); //750x250 cropped image
}

	add_action( 'after_setup_theme', 'styledthemes_setup' );

	//if ( version_compare( get_bloginfo( 'version' ), '3.4', '<' ) )
		// Custom Theme Options
		//require_once( get_template_directory() . '/inc/theme-options.php' );
	//else
		// Implement the Theme Customizer script
	require_once( get_template_directory() . '/inc/theme-customizer.php' );
	
	// Implement the Custom Header feature
	require_once( get_template_directory() . '/inc/custom-header.php' );

/**
 * Enqueues scripts and styles for front-end.
 *
 */
function styledthemes_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	/*
	 * Adds Twitters Bootstrap script set.
	 */
	wp_enqueue_script( 'tw-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '2.1.1', true );
	/*
	* Adds custom bootstrap styles to wp elements.
	*/
	wp_enqueue_script( 'st-bootstrap', get_template_directory_uri() . '/js/st-bootstrap.js', array('jquery'), '1.0', true );
	/*
	 * Loads our bootstrap, main stylesheet, and extra css
	 */
	wp_enqueue_style( 'tw-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array( ), '2.1.1' );
	wp_enqueue_style( 'forms', get_template_directory_uri() . '/css/forms.css', array( ), '2.1.1' );
	wp_enqueue_style( 'styledthemes-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'menus', get_template_directory_uri() . '/css/menus.css', array( ), '1.0' );
	
	// Loads the Internet Explorer specific stylesheet if ie9.
	wp_enqueue_style( 'styledthemes-ie', get_template_directory_uri() . '/css/ie.css', array( 'styledthemes-style' ), '20121010' );
	$wp_styles->add_data( 'styledthemes-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'styledthemes_scripts_styles' );

/**
 * Adds IE specific scripts
 */
function styledthemes_print_ie_scripts() {
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
	<?php
}
add_action( 'wp_head', 'styledthemes_print_ie_scripts', 11 );

/**
 * Adds customizable styles to your <head>
 * @author	Styledthemes.com
 * @since	1.0 - November 1, 2012
 */
function theme_customize_css()
{
    ?>
<style type="text/css">
a {color:<?php echo get_theme_mod( 'link_colour','#467fc2' ); ?>; }
a:hover {color: <?php echo get_theme_mod( 'link_colour_hover','#000000' ); ?>; }
#st-footer-wrapper h4 {color:<?php echo get_theme_mod( 'footer_widgets_heading','#ced4da' ); ?>; }
#site-navigation ul li:hover > ul {background-color:<?php echo get_theme_mod( 'banner_background','#446b9a' ); ?>; }
#site-navigation ul ul li {background-color:<?php echo get_theme_mod( 'header_submenu_bg','#f6f6f6' ); ?>; }
#site-navigation ul ul li:hover,#site-navigation ul.children li a:hover, #site-navigation ul.sub-menu li a:hover {background-color: <?php echo get_theme_mod( 'submenu_bg_hover', '#f3f3f3' ); ?>;}
#site-navigation li a {color:<?php echo get_theme_mod( 'main_menu_link','#555555' ); ?>;}
#site-navigation li a:hover, #site-navigation li.current-menu-ancestor a, #site-navigation li.current-menu-item a {color:<?php echo get_theme_mod( 'parent_hover_active','#477bbe' ); ?>;}
#site-navigation li li a, #site-navigation li.current-menu-item li a, #site-navigation li.current-menu-ancestor li a, #site-navigation li li.current-menu-item li a, #site-navigation li li.current-menu-ancestor li a {color:<?php echo get_theme_mod( 'submenu_link_colour','#555555' ); ?>;}
#site-navigation li li a:hover, #site-navigation li.home a:hover,#site-navigation li li.current-menu-item li a:hover, #site-navigation li li.current-menu-ancestor li a:hover,
#site-navigation li li.current-menu-item a, #site-navigation li li.current-menu-ancestor a, #site-navigation li li.current-menu-ancestor li.current-menu-item a {color:<?php echo get_theme_mod( 'submenu_hover_active','#477bbe' ); ?>;}
#st-copyright-wrapper a {color:<?php echo get_theme_mod( 'copyright_text', '#ffffff' ); ?>;}
#st-footer-wrapper a {color:<?php echo get_theme_mod( 'footer_widgets_links', '#959798' ); ?>;}
#st-copyright-wrapper a:hover,#st-footer-wrapper a:hover  {color:<?php echo get_theme_mod( 'copyright_link_hover', '#cccccc' ); ?>;}

</style>
    <?php
}
add_action( 'wp_head', 'theme_customize_css');


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Celestial Lite 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function styledthemes_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'celestial' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'styledthemes_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 * @since Celestial Lite 1.0
 */
function styledthemes_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'styledthemes_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Celestial Lite 1.0
 */
function styledthemes_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Blog Right Sidebar', 'celestial' ),
		'id' => 'sidebar-7',
		'description' => __( 'This is the right sidebar column that appears on posts and any other blog based pages', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Blog Left Sidebar', 'celestial' ),
		'id' => 'sidebar-6',
		'description' => __( 'This is the left sidebar column that appears on posts and any other blog based pages.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Page Left Sidebar', 'celestial' ),
		'id' => 'sidebar-8',
		'description' => __( 'This is the left sidebar column that appears on pages, but not part of the blog.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Page Right Sidebar', 'celestial' ),
		'id' => 'sidebar-9',
		'description' => __( 'This is the right sidebar column that appears on pages, but not part of the blog', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Showcase Front Page', 'celestial' ),
		'id' => 'sidebar-0',
		'description' => __( 'This is a showcase banner for images or media sliders that can display on your Front Page.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s" style="margin-bottom:0;">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Page Banner', 'celestial' ),
		'id' => 'sidebar-1',
		'description' => __( 'This is a showcase banner for images or media sliders that can display on every page (except front page) but does not have the bottom curve.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s" style="margin-bottom:0;">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
		
	register_sidebar( array(
		'name' => __( 'Front Page Top 1', 'celestial' ),
		'id' => 'sidebar-2',
		'description' => __( 'This is the first top widget position on the custom front page.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Front Page Top 2', 'celestial' ),
		'id' => 'sidebar-3',
		'description' => __( 'This is the second top widget position on the custom front page.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Front Page Top 3', 'celestial' ),
		'id' => 'sidebar-4',
		'description' => __( 'This is the third top widget position on the custom front page.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Front Page Top 4', 'celestial' ),
		'id' => 'sidebar-5',
		'description' => __( 'This is the fourth top widget position on the custom front page.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Sidebars 10, 11, 12, 13, 14, and 15 are available for the pro version
	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'celestial' ),
		'id' => 'sidebar-16',
		'description' => __( 'This is the first footer widget position located in a dark background area.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'celestial' ),
		'id' => 'sidebar-17',
		'description' => __( 'This is the second footer widget position located in a dark background area.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'celestial' ),
		'id' => 'sidebar-18',
		'description' => __( 'This is the third footer widget position located in a dark background area.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 4', 'celestial' ),
		'id' => 'sidebar-19',
		'description' => __( 'This is the fourth footer widget position located in a dark background area.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	// Sidebar 20 is available for the pro version
	
	register_sidebar( array(
		'name' => __( 'Call To Action', 'celestial' ),
		'id' => 'sidebar-21',
		'description' => __( 'This is a call to action position that is centered and just below the showcase banner area but above your content.', 'celestial' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="st-cta-title">',
		'after_title' => '</h1>',
	) );	
}
add_action( 'widgets_init', 'styledthemes_widgets_init' );

/**
 * Count the number of top sidebars to enable resizable widgets
 */
function st_topgroup_sidebar_class() {
	$count = 0;
	if ( is_active_sidebar( 'sidebar-2' ) )
		$count++;
	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;
	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;		
	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'span12';
			break;
		case '2':
			$class = 'span6';
			break;
		case '3':
			$class = 'span4';
			break;
		case '4':
			$class = 'span3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Count the number of footer sidebars to enable resizable widgets
 */
function st_footergroup_sidebar_class() {
	$count = 0;
	if ( is_active_sidebar( 'sidebar-16' ) )
		$count++;
	if ( is_active_sidebar( 'sidebar-17' ) )
		$count++;
	if ( is_active_sidebar( 'sidebar-18' ) )
		$count++;		
	if ( is_active_sidebar( 'sidebar-19' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'span12';
			break;
		case '2':
			$class = 'span6';
			break;
		case '3':
			$class = 'span4';
			break;
		case '4':
			$class = 'span3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}


if ( ! function_exists( 'styledthemes_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own styledthemes_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Celestial Lite 1.0
 */
function styledthemes_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'celestial' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'celestial' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
		
		<header class="comment-meta comment-author vcard row-fluid">
			<div class="span1">
				<?php echo get_avatar( $comment, 44 ); ?>
			</div>
			<div class="span11">
			<?php
				printf( '<cite class="fn">%1$s %2$s</cite>',
					get_comment_author_link(),
					// If current post author is also comment author, make it known visually.
					( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'celestial' ) . '</span>' : ''
				);
				printf( '<time datetime="%2$s">%3$s</time>',
					esc_url( get_comment_link( $comment->comment_ID ) ),
					get_comment_time( 'c' ),
					/* translators: 1: date, 2: time */
					sprintf( __( '<br /><span class="comment-date">Commented on: %1$s</span>', 'celestial' ), get_comment_date('F j, Y'), get_comment_time() )
				);
				?>
				<?php edit_comment_link( __( '<strong>Edit</strong> this comment', 'celestial' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
		</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'celestial' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
			</section><!-- .comment-content -->

			<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<strong>Reply</strong> to this Comment', 'celestial' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/**
 * Adds markup to the comment form which is needed to make it work with Bootstrap needs
 */
function styledthemes_comment_form_top() {
	echo '<div class="form-vertical">';
}
add_action( 'comment_form_top', 'styledthemes_comment_form_top' );


/**
 * Adds markup to the comment form which is needed to make it work with Bootstrap needs
 */
function styledthemes_comment_form() {
	echo '</div></div>';
}
add_action( 'comment_form', 'styledthemes_comment_form' );


/**
 * Custom author form field for the comments form
 */
function styledthemes_comment_form_field_author( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-author control-group">
				<label for="author" class="control-label">' . __( 'Name', 'celestial' ) . '</label>
				<div class="controls">
					<input id="author" name="author" type="text" value="' . esc_attr(  $commenter['comment_author'] ) . '" class="span4' . $aria_req . ' />
					' . ( $req ? '<span class="help-inline"><span class="required">' . __('required', 'celestial') . '</span></span>' : '' ) . '
				</div>
			</div>';
}
add_filter( 'comment_form_field_author', 'styledthemes_comment_form_field_author');


/**
 * Custom HTML5 email form field for the comments form
 */
function styledthemes_comment_form_field_email( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-email control-group">
				<label for="email" class="control-label">' . __( 'Email', 'celestial' ) . '</label>
				<div class="controls">
					<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"  class="span4' . $aria_req . ' />
					<p class="help-inline">' . ( $req ? '<span class="required">' . __('required', 'celestial') . '</span>, ' : '' ) . __( 'will not be published', 'celestial' ) . '</p>
				</div>
			</div>';
}
add_filter( 'comment_form_field_email', 'styledthemes_comment_form_field_email');


/**
 * Custom HTML5 url form field for the comments form
 */
function styledthemes_comment_form_field_url( $html ) {
	$commenter	=	wp_get_current_commenter();
	
	return	'<div class="comment-form-url control-group">
				<label for="url" class="control-label">' . __( 'Website', 'celestial' ) . '</label>
				<div class="controls">
					<input id="url" name="url" type="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" class="span4 />
				</div>
			</div>';
}
add_filter( 'comment_form_field_url', 'styledthemes_comment_form_field_url');

/**
 * Filters comments_form() default arguments
 */
function styledthemes_comment_form_defaults( $defaults ) {
	return wp_parse_args( array(
		'comment_field'			=>	'<div class="comment-form-comment control-group"><label class="control-label" for="comment">' . _x( 'Comment', 'noun', 'celestial' ) . '</label><div class="controls"><textarea class="span7" id="comment" name="comment" rows="8" aria-required="true"></textarea></div></div>',
		'comment_notes_before'	=>	'',
		'comment_notes_after'	=>	'<div class="form-actions">',
		'title_reply'			=>	'<legend>' . __( 'Leave a reply', 'celestial' ) . '</legend>',
		'title_reply_to'		=>	'<legend>' . __( 'Leave a reply to %s', 'celestial' ). '</legend>',
		'must_log_in'			=>	'<div class="must-log-in control-group controls">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'celestial' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
		'logged_in_as'			=>	'<div class="logged-in-as control-group controls">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'celestial' ), admin_url( 'profile.php' ), wp_get_current_user()->display_name, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
	), $defaults );
}
add_filter( 'comment_form_defaults', 'styledthemes_comment_form_defaults' );




if ( ! function_exists( 'styledthemes_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 * Create your own styledthemes_entry_meta() to override in a child theme.
 * @since Celestial Lite 1.0
 */
function styledthemes_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'celestial' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'celestial' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all articles by %s', 'celestial' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( '<span>Article Date: %3$s</span><span>Category: %1$s</span><span>Tags: %2$s</span><span class="by-author">Author: %4$s</span>', 'celestial' );
	} elseif ( $categories_list ) {
		$utility_text = __( '<span>Article Date: %3$s</span><span>Category: %1$s</span><span class="by-author">Author: %4$s</span>', 'celestial' );
	} else {
		$utility_text = __( '<span>Article Date: %3$s</span><span class="by-author">Author: %4$s</span>', 'celestial' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Returns a password form which dispalys nicely
 */
function styledthemes_password_form( $form ) {
	return '<form class="post-password-form form-horizontal" action="' . home_url( 'wp-pass.php' ) . '" method="post"><legend>'. __( 'This post is password protected. To view it please enter your password below:', 'celestial' ) . '</legend><div class="control-group"><label class="control-label" for="post-password-' . get_the_ID() . '">' . __( 'Password:', 'celestial' ) .'</label><div class="controls"><input name="post_password" id="post-password-' . get_the_ID() . '" type="password" size="20" /></div></div><div class="form-actions"><button type="submit" class="post-password-submit submit btn btn-primary">' . __( 'Submit', 'celestial' ) . '</button></div></form>';
}
add_filter( 'password_form', 'styledthemes_password_form' );


/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Celestial Lite 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function styledthemes_body_class( $classes ) {
	$background_color = get_background_color();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'styledthemes-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'styledthemes_body_class' );



/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Celestial Lite 1.0
 */
function styledthemes_content_width() {
	if ( is_page_template( 'templates/page-full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-7' ) ) {
		global $content_width;
		$content_width = 1170;
	}
}
add_action( 'template_redirect', 'styledthemes_content_width' );


/**
 * Returns a "Continue Reading" link for excerpts
 * @author	WordPress.org
 * @since	1.0.0 - 05.02.2012
 * @param	string	$more
 * @return	string
 */
function styledthemes_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading...', 'celestial' ) . '</a>';
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and styledthemes_continue_reading_link().
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 * @author	WordPress.org
 * @since	1.0.0 - 05.02.2012
 * @param	string	$more
 * @return	string
 */
function styledthemes_auto_excerpt_more( $more ) {
	return '&hellip;' . styledthemes_continue_reading_link();
}
add_filter( 'excerpt_more', 'styledthemes_auto_excerpt_more' );


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 * @author	WordPress.org
 * @since	1.0.0 - 05.02.2012
 * @param	string	$output
 * @return	string
 */
function styledthemes_custom_excerpt_more( $output ) {
	if ( has_excerpt() AND ! is_attachment() ) {
		$output .= styledthemes_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'styledthemes_custom_excerpt_more' );

/**
 * Move the More Link outside the default content paragraph.
 * Special thanks to http://nixgadgets.vacau.com/archives/134
 */
function new_more_link($link) {
    $link = '<p class="more-link">'.$link.'</p>';
    return $link;
}

add_filter('the_content_more_link', 'new_more_link');

// Special excerpt length per instance ie showcase column excerpts
function excerpt($num) {
$limit = $num+1;
$excerpt = explode(' ', get_the_excerpt(), $limit);
array_pop($excerpt);
$excerpt = implode(" ",$excerpt)." ";
echo $excerpt;
}

if ( ! function_exists( 'styledthemes_post_nav' ) ) :
/**
 * Displays navigation to next/previous single post or page when applicable.
 * @since Celestial Lite 1.0
 */
function styledthemes_post_nav( $nav_id ) {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'celestial' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'celestial' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'celestial' ) ); ?></div>
		</nav><!-- #<?php echo $nav_id; ?> .navigation -->
	<?php endif;
}
endif;
/**
 * Displays navigation to next/previous posts or pages when applicable.
 * @since Celestial lite 1.0
 */
function styledthemes_content_nav( $nav_id ) {
global $wp_query;
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'prev_next'    => True,
    'prev_text'    => __('Previous', 'celestial'),
    'next_text'    => __('Next', 'celestial'),
	'type' => 'list',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
	) );
}


// Stops WordPress from going to middle of full post view - very irrating. Thanks to http://digwp.com
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @since Celestial Lite 1.0
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function styledthemes_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'styledthemes_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Celestial Lite 1.0
 */
function styledthemes_customize_preview_js() {
	wp_enqueue_script( 'styledthemes-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'styledthemes_customize_preview_js' );



/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 * Special thanks to Michal Ochman http://blog.scur.pl/ for modifying this to use the category name instead of ID
 */


if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			if ( is_string( $cat ) ) {
				$cat = get_term_by( 'slug', $cat, 'category' );
				if ( ! isset( $cat, $cat->term_id ) )
					continue;
				$cat = $cat->term_id;
			}
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}

/**
 * Lets strip the styles out of the default WP Gallery because they should not be loading in the content
 * Then we will have our own styled from the theme
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );