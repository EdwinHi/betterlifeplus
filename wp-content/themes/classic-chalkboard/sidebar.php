<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php do_action( 'before_widget' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>
				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'classicchalkboard' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>
				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'classicchalkboard' ); ?></h1>
					<ul>
					<?php wp_register(); ?>
					<aside><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->