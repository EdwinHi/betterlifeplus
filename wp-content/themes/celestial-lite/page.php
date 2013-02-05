<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying all pages
 *
 * @file           page.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0  
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); ?>

<section>
	<div id="primary" class="site-content span12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( '/partials/content', 'page' ); ?>
				
				<?php if ( get_theme_mod('page_comments','1') ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</section>
	
<?php get_footer(); ?>