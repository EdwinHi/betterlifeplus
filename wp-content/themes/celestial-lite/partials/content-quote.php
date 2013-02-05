<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying posts in the quote post format
 *
 * @file           sidebar-front.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
  
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content( __( 'Read More...', 'celestial' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			
			<?php edit_post_link( __( 'Edit', 'celestial' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->