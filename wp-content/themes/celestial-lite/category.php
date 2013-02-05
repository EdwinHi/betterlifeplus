<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying category posts
 *
 * @file           category.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 

get_header(); ?>


<?php if ( is_category( 'portfolio' ) || post_is_in_descendant_category( 'portfolio' ) ) : ?>

<section id="primary" class="span12">
	<div id="content" role="main">
		<header class="page-header">
			<h1 class="page-title"><?php
				printf( __( 'Showcase %s', 'celestial' ), '<span>' . single_cat_title( '', false ) . '</span>' );
			?></h1>

			<?php if ( $category_description = category_description() ) {
				echo apply_filters( 'category_archive_meta', '<div class="category-description">' . $category_description . '</div>' );
			} ?>
			
<?php if ( has_nav_menu( 'portfolio-menu' ) ) { // only show this menu if we have the portfolio menu active ?>
	<div id="st-portfolio-menu">
		<strong><?php printf( __('Portfolio Categories:', 'celestial')); ?></strong>
		<?php wp_nav_menu( array( 'theme_location' => 'portfolio-menu', 'fallback_cb' => false, 'container' => false, 'menu_id' => 'portfolio-menu') ); ?>
	</div>
<?php 
} 
?>			
			
		</header><!-- .page-header -->
		<div class="row">
		<?php 
			$portcol = get_theme_mod( 'portfolio_col'); 
			get_template_part( '/partials/content', $portcol ); 
		?>
		</div>
	</div><!-- #content -->
</section><!-- #primary -->
	
<?php else : // or if this is the standard blog, use this layout ?>
	
<section id="primary" class="span8">
	<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php $current_category = single_cat_title("", true); ?></h1>
	
				<?php if ( $category_description = category_description() ) {
					echo apply_filters( 'category_archive_meta', '<div class="category-description">' . $category_description . '</div>' );
				} ?>
			</header><!-- .page-header -->		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( '/partials/content', get_post_format() ); ?>
		<?php endwhile; ?>		
		<?php endif; ?>	
	</div><!-- #content -->
</section><!-- #primary -->				
<?php endif; ?>

<?php if ( is_category( 'portfolio' ) || post_is_in_descendant_category( 'portfolio' ) ) : ?>
	<?php else : ?>

	<?php get_sidebar(); ?>
<?php endif; ?>
	<?php get_footer(); ?>