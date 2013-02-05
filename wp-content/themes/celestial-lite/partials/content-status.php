<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying the status post format
 *
 * @file           content-status.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
  
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		

		<div class="entry-content row-fluid">
		<div class="span1"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'styledthemes_status_avatar', '70' ) ); ?></div>
		<div class="span11">
		<div class="entry-header">
			<header>
				<h1 class="entry-title"><?php the_title(); ?><?php edit_post_link( __( 'Edit', 'celestial' ), '<span class="edit-link">&nbsp;', '</span>' ); ?></h1>
				<h2 class="status-date"><?php printf( __( 'Update By: ', 'celestial' ) ) ; ?><?php the_author(); ?> <br /><span ><?php the_date('F j, Y', __('Date: ', 'celestial') ); ?></span></h2>	
			</header>			
		</div><!-- .entry-header -->
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'celestial' ) ); ?>
		</div>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			
		</footer><!-- .entry-meta -->
	</article><!-- #post -->