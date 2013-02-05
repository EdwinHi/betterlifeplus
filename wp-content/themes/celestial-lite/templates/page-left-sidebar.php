<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying widgets in the left sidebar column
 *
   Template Name:  Page Left Sidebar
 *
 * @file           page-left-sidebar.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); ?>

	<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
		<div id="secondary" class="widget-area span3 " role="complementary">
			<div id="st-left" class="st-sidebar-list">
			<?php dynamic_sidebar( 'sidebar-8' ); ?>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>
	
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
	
	
<?php get_footer(); ?>