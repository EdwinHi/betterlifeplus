<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying the main content part
 *
 * @file           content.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="featured-post"><?php _e( 'Featured', 'celestial' ); ?></span>
			<?php endif; ?>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'celestial' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<div class="entry-meta">
				<span><?php the_date('F j, Y', __('Date: ', 'celestial') ); ?></span>
				<span><?php printf( __( 'Author: ', 'celestial' ) );	the_author_link(); ?></span>
				<?php if ( comments_open() ) : ?>
					<span class="comments-link">
						<?php echo esc_attr( sprintf( __( 'Comments: ', 'celestial' ) ) ); ?>
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'celestial' ) . '</span>', __( '1 Reply', 'celestial' ), __( '% Replies', 'celestial' ) ); ?>
					</span><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'celestial' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="row-fluid">
				<div class="entry-summary span12">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			</div>
		<?php else : // for regular blog posts use this layout ?>	
				
			<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>		
				<?php if (get_theme_mod('blog_image') ) : // if the small thumbnail is used then use this layout ?>			
					<div class="entry-content">
						<div class="row-fluid">
							<div class="post-thumbnail span4"><?php the_post_thumbnail( 'blog-small' ); ?></div>									
							<div class="span8">								
								<?php the_content( __( ' Continue reading...', 'celestial' ) ); ?>
								
							</div>
						</div>
					</div><!-- .entry-content -->
				<?php else : // if the default large image is used then use this layout ?>
					<div class="entry-content">
						<div class="row-fluid">
						
							<div class="post-thumbnail span12"><?php the_post_thumbnail( 'blog-large' ); ?></div>
						</div>
						<div class="row-fluid">
							<div class="span12">								
								<?php the_content( __( ' Continue reading...', 'celestial' ) ); ?>
								
							</div>
						</div>
					</div><!-- .entry-content -->
				<?php endif; ?>
			<?php else : // if our post has no thumbnail then use this layout ?>
					<div class="entry-content">
						<div class="row-fluid">
							<div class="span12">								
								<?php the_content( __( ' Continue reading...', 'celestial' ) ); ?>
								
							</div>
						</div>
					</div><!-- .entry-content -->
			<?php endif; ?>
								
		<?php endif; ?>

		<footer></footer>
	</article><!-- #post -->



