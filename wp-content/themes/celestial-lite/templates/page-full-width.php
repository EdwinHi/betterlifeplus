<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying content without left or right sidebar columns
 *
   Template Name: Page Full Width
 *
 * @file           page-full-width.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013
 * @license        license.txt
 */
 
get_header(); ?>


	
	<div id="primary" class="site-content span12">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
	<div class="row-fluid">
		<div class="post-thumbnail span12" style="margin-bottom:40px;"><?php the_post_thumbnail( ); ?></div>
	</div>
	<?php endif; ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'celestial' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'celestial' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
				<?php if ( get_theme_mod('page_comments','0') ) : ?>
					<?php comments_template( '', true ); ?>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->	

<?php get_footer(); ?>