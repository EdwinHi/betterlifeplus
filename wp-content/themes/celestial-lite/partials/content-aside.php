<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying posts in the Aside post format
 *
 * @file           content-aside.php
 * @package        Celestial Lite 
 * @since          Celestial Lite 1.0
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary clearfix">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content aside-post clearfix">
			<header class="page-header">
				<hgroup>
					<h2 class="aside-title"><?php printf( __( 'Aside', 'celestial' ) ) ; ?></h2>
				</hgroup>
			</header><!-- .entry-header -->
		<?php the_content(); ?>		
			<footer class="entry-footer">
				<div class="aside-entry-meta">
					<span><?php the_date('F j, Y', __('<strong>Published:</strong> ', 'celestial') ); ?></span>	
					<span><a href="<?php echo get_permalink(); ?>"><?php printf( __( 'Permalink ', 'celestial' ) ) ; ?></a></span>			
				</div><!-- .entry-meta -->
			</footer><!-- .entry-footer -->
	</div><!-- .entry-content -->
	<?php endif; ?>
	
</article><!-- #post-<?php the_ID(); ?>-->