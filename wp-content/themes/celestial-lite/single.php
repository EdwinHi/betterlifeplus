<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying single posts
 *
 * @file           single.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); ?>

	<section id="primary" class="site-content span8">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( '/partials/content', 'single' ); ?>
				
				<div class="navigation">
			        <div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
                    <div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
		        </div><!-- .navigation -->
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

	
<?php get_footer(); ?>