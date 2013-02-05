<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * This is the main template file
 *
 * @file           index.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0  
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); ?>

<?php if (get_theme_mod('blog_left') ) : // Use this layout if the blog left is selected ?>		
	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
		<div id="secondary" class="widget-area span3" role="complementary">
			<div id="st-left" class="st-sidebar-list">
			<?php dynamic_sidebar( 'sidebar-6' ); ?>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>	
	<section id="primary" class="span8 offset1">
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( '/partials/content', get_post_format() ); ?>
				<?php endwhile; ?>	 
			<?php endif; // end have_posts() check ?> 
			<?php styledthemes_post_nav( 'nav-below' ); ?>
		</div><!-- #content -->
	</section><!-- #primary -->	
	
<?php else : // If the left sidebar is not selected - use this layout ?>
	
	<section id="primary" class="span8">
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( '/partials/content', get_post_format() ); ?>	
				<?php endwhile; ?>	 
			<?php endif; // end have_posts() check ?> 
			<?php styledthemes_post_nav( 'nav-below' ); ?>

		</div><!-- #content -->
	</section><!-- #primary -->
	
	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
		<div id="secondary" class="widget-area span3 offset1" role="complementary">
			<div id="st-right" class="st-sidebar-list">
			<?php dynamic_sidebar( 'sidebar-7' ); ?>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>	

<?php endif; ?>

<?php get_footer(); ?>
