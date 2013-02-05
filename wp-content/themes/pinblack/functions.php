<?php
/**
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 650;
}

if ( ! function_exists( 'pinblack_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function pinblack_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'pinblack', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pinblack' ),
	) );

	add_theme_support('post-thumbnails'); 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// adding post format support
	add_theme_support( 'post-formats', 
		array( 
			'aside', /* Typically styled without a title. Similar to a Facebook note update */
			'gallery', /* A gallery of images. Post will likely contain a gallery shortcode and will have image attachments */
			'link', /* A link to another site. Themes may wish to use the first <a href=ÓÓ> tag in the post content as the external link for that post. An alternative approach could be if the post consists only of a URL, then that will be the URL and the title (post_title) will be the name attached to the anchor for it */
			'image', /* A single image. The first <img /> tag in the post could be considered the image. Alternatively, if the post consists only of a URL, that will be the image URL and the title of the post (post_title) will be the title attribute for the image */
			'quote', /* A quotation. Probably will contain a blockquote holding the quote content. Alternatively, the quote may be just the content, with the source/author being the title */
			'status', /*A short status update, similar to a Twitter status update */
			'video', /* A single video. The first <video /> tag or object/embed in the post content could be considered the video. Alternatively, if the post consists only of a URL, that will be the video URL. May also contain the video as an attachment to the post, if video support is enabled on the blog (like via a plugin) */
			'audio', /* An audio file. Could be used for Podcasting */
			'chat' /* A chat transcript */
		)
	);
}
endif;

add_action( 'after_setup_theme', 'pinblack_setup' );

/**
 * Title filter 
 */
function pinblack_filter_wp_title( $old_title, $sep, $sep_location ) {

	$site_name = get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description' );
	// add padding to the sep
	$ssep = ' ' . $sep . ' ';
	
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		return $site_name . ' | ' . $site_description;
	} else {
		// find the type of index page this is
		if( is_category() ) $insert = $ssep . __( 'Category', 'pinblack' );
		elseif( is_tag() ) $insert = $ssep . __( 'Tag', 'pinblack' );
		elseif( is_author() ) $insert = $ssep . __( 'Author', 'pinblack' );
		elseif( is_year() || is_month() || is_day() ) $insert = $ssep . __( 'Archives', 'pinblack' );
		else $insert = NULL;
		 
		// get the page number we're on (index)
		if( get_query_var( 'paged' ) )
		$num = $ssep . __( 'Page ', 'pinblack' ) . get_query_var( 'paged' );
		 
		// get the page number we're on (multipage post)
		elseif( get_query_var( 'page' ) )
		$num = $ssep . __( 'Page ', 'pinblack' ) . get_query_var( 'page' );
		 
		// else
		else $num = NULL;
		 
		// concoct and return new title
		return $site_name . $insert . $old_title . $num;
		
	}

}

// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'pinblack_filter_wp_title', 10, 3 );


/**
* Filter the RSS Feed Site Title
*/
function pinblack_blogname_rss( $val, $show ) {
    if( 'name' == $show )
        $out = '';
    else
        $out = $val;

    return $out;
}
add_filter('bloginfo_rss', 'pinblack_blogname_rss', 10, 2);


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
if ( ! function_exists( 'pinblack_main_nav' ) ) :
function pinblack_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => '', /* menu name */
    		'theme_location' => 'primary', /* where in the theme it's assigned */
    		'container_class' => 'menu', /* container class */
    		'fallback_cb' => 'pinblack_main_nav_fallback' /* menu fallback */
    	)
    );
}
endif;

if ( ! function_exists( 'pinblack_main_nav_fallback' ) ) :
	function pinblack_main_nav_fallback() { wp_page_menu( 'show_home=Home&menu_class=menu' ); }
endif;


function pinblack_enqueue_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
 }
add_action( 'wp_enqueue_scripts', 'pinblack_enqueue_comment_reply' );


function pinblack_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'pinblack_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function pinblack_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'pinblack' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );

}
add_action( 'widgets_init', 'pinblack_widgets_init' );

if ( ! function_exists( 'pinblack_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function pinblack_content_nav( $nav_id ) {
	global $wp_query;

	?>
	<nav id="<?php echo $nav_id; ?>">
		<h1 class="assistive-text section-heading"><?php _e( 'Post navigation', 'pinblack' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'pinblack' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'pinblack' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'pinblack' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'pinblack' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif;


if ( ! function_exists( 'pinblack_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */
function pinblack_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'pinblack' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'pinblack' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="clearfix">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s', 'pinblack' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'pinblack' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'pinblack' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'pinblack' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif;

if ( ! function_exists( 'pinblack_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function pinblack_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'pinblack' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'pinblack' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 */
function pinblack_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'pinblack_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 */
function pinblack_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so pinblack_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so pinblack_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in pinblack_categorized_blog
 */
function pinblack_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'pinblack_category_transient_flusher' );
add_action( 'save_post', 'pinblack_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function pinblack_enhanced_image_navigation( $url ) {
	global $post, $wp_rewrite;

	$id = (int) $post->ID;
	$object = get_post( $id );
	if ( wp_attachment_is_image( $post->ID ) && ( $wp_rewrite->using_permalinks() && ( $object->post_parent > 0 ) && ( $object->post_parent != $id ) ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'pinblack_enhanced_image_navigation' );


if ( ! function_exists( 'pinblack_pagination' ) ) :
function pinblack_pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         printf( __( '<div class="pagination"><span>Page %1$s of %2$s</span>', 'pinblack'), $paged, $pages );
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) printf( __( '<a href="%1$s">&laquo; First</a>', 'pinblack' ), get_pagenum_link(1) );
         if($paged > 1 && $showitems < $pages) printf( __( '<a href="%1$s">&lsaquo; Previous</a>', 'pinblack' ), get_pagenum_link($paged - 1) );
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) printf( __( '<a href="%1$s">Next &rsaquo;</a>', 'pinblack' ), get_pagenum_link($paged + 1) );
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) printf( __( '<a href="%1$s">Last &raquo;</a>', 'pinblack' ), get_pagenum_link($pages) );
         echo "</div>\n";
     }
}
endif;

function pinblack_w3c_valid_rel( $text ) {
	$text = str_replace('rel="category tag"', 'rel="tag"', $text); return $text; 
}
add_filter( 'the_category', 'pinblack_w3c_valid_rel' );


function pinblack_modernizr_addclass($output) {
    return $output . ' class="no-js"';
}
add_filter('language_attributes', 'pinblack_modernizr_addclass');


function pinblack_modernizr_script() {
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/library/js/modernizr-2.6.2.min.js', false, '2.6.2');
}    
add_action('wp_enqueue_scripts', 'pinblack_modernizr_script');


function pinblack_scripts_custom() {
	wp_register_script( 'masonry', get_template_directory_uri() . '/library/js/jquery.masonry.min.js');
    wp_enqueue_script( 'pinblack_custom_js', get_template_directory_uri() . '/library/js/scripts.js', array( 'jquery', 'masonry' ), '1.0.0', true );
	wp_enqueue_style('pinblack_style', get_stylesheet_uri() );
}    
add_action('wp_enqueue_scripts', 'pinblack_scripts_custom');