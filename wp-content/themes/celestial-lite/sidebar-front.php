<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying widgets in the front page sidebar top group
 *
 * @file           sidebar-front.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
	if (   ! is_active_sidebar( 'sidebar-2'  )
		&& ! is_active_sidebar( 'sidebar-3' )
		&& ! is_active_sidebar( 'sidebar-4'  )
		&& ! is_active_sidebar( 'sidebar-5'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<aside id="st-sidebar-top" class="clearfix">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="top1" <?php st_topgroup_sidebar_class(); ?> role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #top1 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
		<div id="top2" <?php st_topgroup_sidebar_class(); ?> role="complementary">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div><!-- #top2 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
		<div id="top4" <?php st_topgroup_sidebar_class(); ?> role="complementary">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div><!-- #top4 -->
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
		<div id="top5" <?php st_topgroup_sidebar_class(); ?> role="complementary">
			<?php dynamic_sidebar( 'sidebar-5' ); ?>
		</div><!-- #top5 -->
	<?php endif; ?>
</aside><!-- #sidebar-top -->