<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying archived posts
 *
 * @file           archive.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 

get_header(); ?>

	<section id="primary" class="site-content span8">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Article for %s', 'celestial' ), '<span>' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'celestial' ) ) . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Articles for %s', 'celestial' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'celestial' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Articles for %s', 'celestial' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'celestial' ) ) . '</span>' );
					else :
						_e( 'Articles', 'celestial' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( '/partials/content', get_post_format() ); 

			endwhile;

			styledthemes_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>