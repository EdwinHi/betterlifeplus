<?php
/**
* Archive actions used by response.
*
* Author: Tyler Cunningham
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
* response archive actions
*/
add_action( 'response_archive_title', 'response_archive_page_title' );

/**
* Output archive page title based on archive type. 
*
* @since 1.0
*/
function response_archive_page_title() { 
	global $post; ?>
	
		<?php if (is_category()) { ?>
			<h2 class="archivetitle"><?php _e( 'Archive for the &#8216;', 'response' ); ?><?php single_cat_title(); ?><?php _e( '&#8217; Category:', 'response' ); ?></h2><br />

		<?php } elseif( is_tag() ) { ?>
			<h2 class="archivetitle"><?php _e( 'Posts Tagged &#8216;', 'response' ); ?><?php single_tag_title(); ?><?php _e( '&#8217;:', 'response' ); ?></h2><br />

		<?php } elseif (is_day()) { ?>
			<h2 class="archivetitle"><?php _e( 'Archive for', 'response' ); ?> <?php the_time('F jS, Y'); ?>:</h2><br />

		<?php } elseif (is_month()) { ?>
			<h2 class="archivetitle"><?php _e( 'Archive for', 'response' ); ?> <?php the_time('F, Y'); ?>:</h2><br />

		<?php } elseif (is_year()) { ?>
			<h2 class="archivetitle"><?php _e( 'Archive for:', 'response' ); ?> <?php the_time('Y'); ?>:</h2><br />

		<?php } elseif (is_author()) { ?>
			<h2 class="archivetitle"><?php _e( 'Author Archive:', 'response' ); ?></h2><br />

		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="archivetitle"><?php _e('Blog Archives:', 'response' ); ?></h2><br />
	
		<?php } 
}

/**
* End
*/

?>