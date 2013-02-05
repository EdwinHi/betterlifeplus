<?php


// Basic Setup

add_editor_style();
add_theme_support( 'automatic-feed-links' );
load_theme_textdomain( 'elegantwhite', get_template_directory() . '/languages' );
wp_enqueue_script( 'comment-reply' );
if ( ! isset( $content_width ) ) $content_width = 700;


// Setup all core settings

add_action( 'after_setup_theme', 'elegantwhite_theme_setup' );

function elegantwhite_theme_setup() {

$the_theme_status = get_option( 'elegantwhite_options' );
if ( $the_theme_status == '' ) {
 $data = array(
        'search_ac' => '0',
		'lines_ac' => '1',
		'bild_text' => '',
		'footer_text' => '',
		'author-box' => '0',
		'show-tags' => '0',
		'show-categories' => '0',
		'pub-date' => '0',
		'pub-date-full' => '0',
		'analytics' => '',
		'top_line' => '0',
		'post-navi' => '0',
	);

update_option('elegantwhite_options', $data);
}
elseif ( $the_theme_status !== '' && isset( $_GET['activated'] ) ) {
	
	}


}

// IE Options

locate_template( array( '/inc/ie.php' ), true );


// Update


$elegantwhite_options = get_option('elegantwhite_options');
if ( !isset($elegantwhite_options['analytics']) or !isset($elegantwhite_options['search_ac']) ) {
	$new_data = array(
	    'search_ac' => '0',
		'lines_ac' => $elegantwhite_options['lines_ac'],
		'bild_text' => $elegantwhite_options['bild_text'],
		'footer_text' => $elegantwhite_options['footer_text'],
		'author-box' => $elegantwhite_options['author-box'],
		'show-tags' => $elegantwhite_options['show-tags'],
		'show-categories' => $elegantwhite_options['show-categories'],
		'pub-date' => $elegantwhite_options['pub-date'],
		'pub-date-full' => $elegantwhite_options['pub-date-full'],
		'analytics' => '',
		);
  update_option('elegantwhite_options', $new_data);
} 


$elegantwhite_options_2 = get_option('elegantwhite_options');
if ( !isset($elegantwhite_options['top_line']) or !isset($elegantwhite_options['post-navi']) ) {
	$new_data_2 = array(
	    'search_ac' => $elegantwhite_options_2['search_ac'],
		'lines_ac' => $elegantwhite_options_2['lines_ac'],
		'bild_text' => $elegantwhite_options_2['bild_text'],
		'footer_text' => $elegantwhite_options_2['footer_text'],
		'author-box' => $elegantwhite_options_2['author-box'],
		'show-tags' => $elegantwhite_options_2['show-tags'],
		'show-categories' => $elegantwhite_options_2['show-categories'],
		'pub-date' => $elegantwhite_options_2['pub-date'],
		'pub-date-full' => $elegantwhite_options_2['pub-date-full'],
		'analytics' => $elegantwhite_options_2['analytics'],
		'top_line' => '0',
		'post-navi' => '0',
		);
  update_option('elegantwhite_options', $new_data_2);
} 



// Analytics Code 

function elegantwhite_analytics_code() { ?>
<?php $elegantwhite_options = get_option('elegantwhite_options');
echo $elegantwhite_options['analytics']; ?>
<?php }
add_action('wp_head', 'elegantwhite_analytics_code');

// Custom Password Form

add_filter( 'the_password_form', 'elegantwhite_password_form' );
locate_template( array( '/inc/password-form.php' ), true );

// Footer elegantwhite 

function elegantwhite_footer_text() {
$ew_text = 'Theme: elegantWhite by <a href="http://fimply.de">Fimply</a>';
echo $ew_text;
}


// Output Date of an Article

function elegantwhite_get_date() {

$date_format = get_option( 'date_format' );
the_time($date_format);

}


// wp_title filter

function elegantwhite_filter_wp_title( $title ) {
 $elegantwhite_site_name = get_bloginfo( 'name' );
 $elegantwhite_filtered_title = $elegantwhite_site_name . $title;
 return $elegantwhite_filtered_title;
}

add_filter( 'wp_title', 'elegantwhite_filter_wp_title' );


// Setup Default Theme Options

function elegantwhite_get_default_theme_options() {
  $default_theme_options = array(
        'search_ac' => '0',
		'lines_ac' => '1',
		'bild_text' => '',
		'footer_text' => '',
		'author-box' => '0',
		'show-tags' => '0',
		'show-categories' => '0',
		'pub-date' => '0',
		'pub-date-full' => '0',
		'analytics' => '',
		'top_line' => '0',
		'post-navi' => '0',
	);

	if ( is_rtl() )
 		$default_theme_options['theme_layout'] = 'sidebar-content';

	return apply_filters( 'elegantwhite_default_theme_options', $default_theme_options );
}

function elegantwhite_get_theme_options() {
	return get_option( 'elegantwhite_options', elegantwhite_get_default_theme_options() );
}


// Header Image

locate_template( array( '/inc/custom-header.php' ), true );
        
        
// Filter for Untitled Articles
        
add_filter('the_title', 'elegantwhite_title');
function elegantwhite_title($title) {
	if ( $title == '' ) {
		return __( 'Untitled', 'elegantwhite');
	} else {
		return $title;
	}
}
        
        
// Custom Menus
 
function elegantwhite_nav() {
    register_nav_menus(array(
        'header-nav' => 'Header Menu',
        'footer-nav' => 'Footer Menu',
    ));
}
add_action('init', 'elegantwhite_nav');


// Stylesheets

function elegantwhite_style() {
 wp_register_style('elegantwhite_style', get_stylesheet_uri(), array(), 1.1, 'all'); 
 wp_enqueue_style('elegantwhite_style');	 
}

add_action('wp_enqueue_scripts', 'elegantwhite_style');

// jQuery

function elegantwhite_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/inc/jquery.js');
    wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'elegantwhite_jquery');

// Nav Script

function elegantwhite_nav_js() {
    wp_register_script( 'nav', get_template_directory_uri() . '/inc/nav.js', array(), 1.1, true);
    wp_enqueue_script( 'nav' );
}    
 
add_action('wp_enqueue_scripts', 'elegantwhite_nav_js');


// Admin Styles

function elegantwhite_admin_enqueue() {
 
   wp_enqueue_style( 'admin_style', get_template_directory_uri() . '/css/options.css', array(), null, 'all' );
}

add_action( 'admin_enqueue_scripts', 'elegantwhite_admin_enqueue' );


// Sidebar

locate_template( array( '/inc/register-sidebar.php' ), true );





// Fields

function elegantwhite_fields($elegantwhite_fields) {
  locate_template( array( '/inc/comments-form.php' ), true );
 return $elegantwhite_fields;
}

add_filter('comment_form_default_fields','elegantwhite_fields');


// Comment Form

function elegantwhite_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'div';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div class="comment">
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		
	
		
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<div class="comment-box">
		<div class="comment-name"><?php printf(__('%s', 'elegantwhite'), get_comment_author_link()) ?> </div>
		<div class="comment-date"><?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s', 'elegantwhite'), get_comment_date(),  get_comment_time()) ?></div>
				<div class="comment-line"></div>


		<div class="comment-text">
		<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'elegantwhite') ?></em></br>
		<?php endif; ?>
		
		<?php comment_text() ?>
		
		<div class="comment-reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php edit_comment_link( __('[Edit]', 'elegantwhite'),'','' );
			?></div>


		</div></div></div></div>

				<?php if ( 'div' != $args['style'] ) : ?>
		</div><div style="clear:both;"></div>
		<?php endif; 
}


// Create Theme Options

add_action('admin_menu', 'elegantwhite_create_menu');

function elegantwhite_create_menu() {
  add_theme_page('elegantWhite Settings', 'elegantWhite Options', 'edit_theme_options', 'themeoptions', 'elegantwhite_settings_page');
  add_theme_page('Other Fimply Themes', 'Other Fimply Themes', 'edit_theme_options', 'fimplythemes', 'elegantwhite_other_themes');
  add_action( 'admin_init', 'elegantwhite_register_settings' );
}


function elegantwhite_other_themes () {
	locate_template( array( '/inc/other-themes.php' ), true );
}


function elegantwhite_register_settings() {
	register_setting( 'elegantwhite-settings-group', 'new_option_name' );
	register_setting( 'elegantwhite-settings-group', 'some_other_option' );
	register_setting( 'elegantwhite-settings-group', 'option_etc' );
}

add_action( 'admin_init', 'elegantwhite_theme_options' );

function elegantwhite_theme_options(){
	register_setting( 'elegantwhite_options', 'elegantwhite_options', 'elegantwhite_validate_options' );
}


function elegantwhite_settings_page() {
	global $select_options, $radio_options;
if ( ! isset( $_REQUEST['settings-updated'] ) )
	$_REQUEST['settings-updated'] = false;
?>

<?php locate_template( array( '/inc/theme-options.php' ), true ); ?>
 

<?php } function elegantwhite_validate_options( $input ) {

if ( ! isset( $input['top_line'] ) )
		$input['top_line'] = null;
	$input['top_line'] = ( $input['top_line'] == 1 ? 1 : 0 );
	
if ( ! isset( $input['post-navi'] ) )
		$input['post-navi'] = null;
	$input['post-navi'] = ( $input['post-navi'] == 1 ? 1 : 0 );

if ( ! isset( $input['search_ac'] ) )
		$input['search_ac'] = null;
	$input['search_ac'] = ( $input['search_ac'] == 1 ? 1 : 0 );
	
if ( ! isset( $input['lines_ac'] ) )
		$input['lines_ac'] = null;
	$input['lines_ac'] = ( $input['lines_ac'] == 1 ? 1 : 0 );
	
if ( ! isset( $input['author-box'] ) )
		$input['author-box'] = null;
	$input['author-box'] = ( $input['author-box'] == 1 ? 1 : 0 );
	
if ( ! isset( $input['show-tags'] ) )
		$input['show-tags'] = null;
	$input['show-tags'] = ( $input['show-tags'] == 1 ? 1 : 0 );
	
if ( ! isset( $input['show-categories'] ) )
		$input['show-categories'] = null;
	$input['show-categories'] = ( $input['show-categories'] == 1 ? 1 : 0 );
	
if ( ! isset( $input['pub-date'] ) )
		$input['pub-date'] = null;
	$input['pub-date'] = ( $input['pub-date'] == 1 ? 1 : 0 );
	
if ( ! isset( $input['pub-date-full'] ) )
		$input['pub-date-full'] = null;
	$input['pub-date-full'] = ( $input['pub-date-full'] == 1 ? 1 : 0 );

$input['bild_text'] = esc_attr( $input['bild_text'] );
$input['footer_text'] = esc_attr( $input['footer_text'] );
$input['analytics'] = wp_kses( $input['analytics'], array('script' => array()) );

return $input;
} ?>