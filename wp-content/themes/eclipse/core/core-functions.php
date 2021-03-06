<?php
/**
* CyberChimps response Core Functions
*
* Authors: Tyler Cunningham
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package response
* @since 1.0
*/

/**
* Load styles.
*/ 

function eclipse_styles() {
	global $options, $ec_themeslug, $wp_styles;
	
	// set paths to stylesheet dir
	$core_path =  get_template_directory_uri() ."/core/css";
	$path = get_template_directory_uri() ."/css";
	
	// register stylesheets
	wp_register_style( 'foundation', $core_path.'/foundation.css' );
	wp_register_style( 'foundation_apps', $core_path.'/app.css', array( 'foundation' ) );
	wp_register_style( 'shortcode', $path.'/shortcode.css' );
	wp_register_style( 'eclipse_style', $path.'/style.css', array( 'foundation' ) );
	wp_register_style( 'elements', $path.'/elements.css', array( 'foundation', 'eclipse_style' ) );
	
	// ie conditional stylesheet
	wp_register_style( 'eclipse_ie', $core_path.'/ie.css' );
	$wp_styles->add_data( 'eclipse_ie', 'conditional', 'IE' );
	
	// child theme support
	wp_register_style( 'child_theme', get_stylesheet_directory_uri().'/style.css', array( 'eclipse_style' ) );
	if( is_child_theme() ) {
		wp_enqueue_style( 'child_theme' );
	}
	
	// get fonts
	if ($options->get($ec_themeslug.'_font') == "" AND $options->get($ec_themeslug.'_custom_font') == "") {
		$font = apply_filters( 'synapse_default_font', 'Arial' );
	}		
	elseif ($options->get($ec_themeslug.'_custom_font') != "" && $options->get($ec_themeslug.'_font') == 'custom') {
		$font = $options->get($ec_themeslug.'_custom_font');	
	}	
	else {
		$font = $options->get($ec_themeslug.'_font'); 
	} 
	
	// register font stylesheet
	if( $font == 'Actor' ||
		$font == 'Coda' ||
		$font == 'Maven Pro' ||
		$font == 'Metrophobic' ||
		$font == 'News Cycle' ||
		$font == 'Nobile' ||
		$font == 'Tenor Sans' ||
		$font == 'Quicksand' ||
		$font == 'Ubuntu') {
		
		// Check if SSL is present, if so then use https othereise use http
		$protocol = is_ssl() ? 'https' : 'http';
		wp_register_style( 'fonts', $protocol . '://fonts.googleapis.com/css?family='.$font, array( 'eclipse_style' ) ); 		
	}
	
	// enqueue stylesheets
	wp_enqueue_style( 'foundation' );
	wp_enqueue_style( 'foundation_apps' );
	wp_enqueue_style( 'shortcode' );
	wp_enqueue_style( 'eclipse_style' );
	wp_enqueue_style( 'elements' );
	wp_enqueue_style( 'fonts' );
	wp_enqueue_style( 'eclipse_ie' );
}

add_action( 'wp_enqueue_scripts', 'eclipse_styles' );

/**
* Load jQuery and register additional scripts.
*/ 
function response_scripts() {
	global $options, $ec_themeslug;
	if ( !is_admin() ) {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-tabs');
	}
	
	$path =  get_template_directory_uri() ."/core/library";
	
	wp_register_script( 'orbit' ,$path.'/js/foundation/jquery.orbit.js');
	wp_register_script( 'apps' ,$path.'/js/foundation/app.js');
	wp_register_script( 'placeholder' ,$path.'/js/foundation/jquery.placeholder.min.js');
	wp_register_script( 'reveal' ,$path.'/js/foundation/jquery.reveal.js');
	wp_register_script( 'tooltips' ,$path.'/js/foundation/jquery.tooltips.js');
	wp_register_script( 'modernizr' ,$path.'/js/foundation/modernizr.foundation.js');
	wp_register_script( 'menu' ,$path.'/js/menu.js');
	wp_register_script( 'slimbox' ,$path.'/js/jquery.slimbox.js');
	wp_register_script( 'plusone' ,$path.'/js/plusone.js');
	wp_register_script( 'mobilemenu' ,$path.'/js/mobilemenu.js');
	wp_register_script( 'oembed' ,$path.'/js/oembed-twitter.js');
	
	wp_enqueue_script ('orbit');
	wp_enqueue_script ('apps');
	wp_enqueue_script ('placeholder');
	wp_enqueue_script ('reveal');
	wp_enqueue_script ('tooltips');
	wp_enqueue_script ('modernizr');
	wp_enqueue_script ('menu');
	wp_enqueue_script ('slimbox');
	wp_enqueue_script ('plusone');
	wp_enqueue_script ('mobilemenu');
	wp_enqueue_script ('oembed');
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
	if ($options->get($ec_themeslug.'_responsive_video') == '1' ) {
	
		wp_register_script( 'video' ,$path.'/js/video.js');
		wp_enqueue_script ('video');	
	}

}
add_action('wp_enqueue_scripts', 'response_scripts');	

/**
* Custom pagination.
*
* @since 1.0
*/
function response_custom_pagination($pages = '', $range = 4)
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
         echo '<div class="pagination"><span>'.__( 'Page', 'core' ).' '.$paged.' of '.$pages.'</span>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'.get_pagenum_link(1).'">'.__( '&laquo; First', 'response' ).'</a>';
         if($paged > 1 && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged - 1).'">'.__( '&lsaquo; Previous', 'response' ).'</a>';
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'"">'.__( 'Next &rsaquo;', 'response').'</a>';
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($pages).'">'.__( 'Last &raquo;', 'response' ).'</a>';
         echo "</div>\n";
     }
}


/**
* Truncate next/previous post link text for post pagination.
*
* @since 1.0
*/
function response_shorten_linktext($linkstring,$link) {
	$characters = 33;
	preg_match('/<a.*?>(.*?)<\/a>/is',$linkstring,$matches);
	$displayedTitle = $matches[1];
	$newTitle = shorten_with_ellipsis($displayedTitle,$characters);
	return str_replace('>'.$displayedTitle.'<','>'.$newTitle.'<',$linkstring);
}

function shorten_with_ellipsis($inputstring,$characters) {
  return (strlen($inputstring) >= $characters) ? substr($inputstring,0,($characters-3)) . '...' : $inputstring;
}

add_filter('previous_post_link','response_shorten_linktext',10,2);
add_filter('next_post_link','response_shorten_linktext',10,2);

/**
* Comment function
*
* @since 1.0
*/
function response_comment($comment, $args, $depth) {
	global $ec_root;
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar( $comment, 66 ); ?>
      </div>
      <img class="triangle" style="margin-bottom: -30px; margin-left: 7px;" src="<?php echo "$ec_root/images/comment-triangle.png";?>">
     <div style="background-color: #1a1a1a; margin-left: 100px; padding: 15px 15px 10px 10px; margin-top: -18px; border-radius: 4px; ;">
     <div class="comment-meta commentmetadata">     <span class="comment_author" style="float:left"><?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?></span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'core' ), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'core' ),'  ','') ?> | <span class="reply"> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
     </div>
      
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.', 'core' ) ?></em>
         <br />
      <?php endif; ?>
		
		<div class="comment_wrap">	
      <?php comment_text() ?>
      </div>

     </div></div>
<?php
}

/**
* Breadcrumbs function
*
* @since 1.0
*/
function response_breadcrumbs() {
  global $ec_root;
  
  $delimiter = "<img src='$ec_root/images/breadcrumb-arrow.png'>";
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div class="row"><div id="crumbs" class="twelve columns"><div class="crumbs_text">';
 
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive for category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') ) ? '' : $cat_parents;
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') ) ? '' : $cat_parents;
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'response') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div></div></div>';
 
  }
} 

function response_title_tag_filter( $old_title ) {
	global $options, $themeslug, $query, $post; 
	
	$blogtitle = ($options->get($themeslug.'_home_title'));
	if (!is_404()) {
		$title = get_post_meta($post->ID, 'seo_title' , true);
	}
	else {
		$title = '';
	}
	
	if (function_exists('is_tag') && is_tag()) { /*Title for tags */
		$title_tag = get_bloginfo('name').' - Tag Archive for &quot;'.single_tag_title("", FALSE).'&quot;  ';
	}
	elseif( is_feed() ) {
		$title_tag = '';
	}
	elseif (is_archive()) { /*Title for archives */ 
		$title_tag = get_bloginfo('name').$old_title.' Archive '; 
	}    
	elseif (is_search()) { /*Title for search */ 
		$title_tag = get_bloginfo('name').' - Search for &quot;'.get_search_query().'&quot;  '; 
	}    
	elseif (is_404()) { /*Title for 404 */
		$title_tag = get_bloginfo('name').' - Not Found '; 
	}
	elseif (is_front_page() AND !is_page() AND $blogtitle == '') { /*Title if front page is latest posts and no custom title */
		$title_tag = get_bloginfo('name').' - '.get_bloginfo('description'); 
	}
	elseif (is_front_page() AND !is_page() AND $blogtitle != '') { /*Title if front page is latest posts with custom title */
		$title_tag = get_bloginfo('name').' - '.$blogtitle ; 
	}
	elseif (is_front_page() AND is_page() AND $title == '') { /*Title if front page is static page and no custom title */
		$title_tag = get_bloginfo('name').' - '.get_bloginfo('description'); 
	}
	elseif (is_front_page() AND is_page() AND $title != '') { /*Title if front page is static page with custom title */
		$title_tag = get_bloginfo('name').' - '.$title ; 
	}
	elseif (is_page() AND $title == '') { /*Title if static page is static page with no custom title */
		$title_tag = get_bloginfo('name').$old_title; 
	}
	elseif (is_page() AND $title != '') { /*Title if static page is static page with custom title */
		$title_tag = get_bloginfo('name').' - '.$title ; 
	}
	elseif (is_page() AND is_front_page() AND $blogtitle == '') { /*Title if blog page with no custom title */
		$title_tag = get_bloginfo('name').$old_title; 
	}
	elseif ($blogtitle != '') { /*Title if blog page with custom title */ 
		$title_tag = get_bloginfo('name').' - '.$blogtitle ; 
	}
	else { /*Title if blog page without custom title */
		$title_tag = get_bloginfo('name').$old_title; 
	}
	
	return $title_tag;
}

add_filter( 'wp_title', 'response_title_tag_filter', 10, 3 )

/**
* End
*/
		    
?>