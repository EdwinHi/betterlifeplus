<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying widgets in the right sidebar column
 *
   Template Name: Page Right Sidebar
 *
 * @file           page-right-sidebar.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013
 * @license        license.txt
 */
 
get_header(); ?>

	<div id="primary" class="site-content span9">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( '/partials/content', 'page' ); ?>
				<?php if ( get_theme_mod('page_comments','0') ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
		<div id="secondary" class="widget-area span3" role="complementary">
			<div id="st-right" class="st-sidebar-list">
			<?php dynamic_sidebar( 'sidebar-9' ); ?>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>
	
<?php get_footer(); ?>