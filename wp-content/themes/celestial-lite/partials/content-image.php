<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying posts in the image post format
 *
 * @file           sidebar-front.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
  
?>
<div class="row-fluid">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content span12">
		

		<header class="entry-meta">		
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'celestial' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<h1><?php the_title(); ?></h1>
				</a>
				<span><?php the_date('F j, Y', __('Date: ', 'celestial') ); ?></span>
				<span><?php printf( __( 'Photo By: ', 'celestial' ) );	the_author_link(); ?></span>
				<?php if ( comments_open() ) : ?>
					<span class="comments-link">
						<?php echo esc_attr( sprintf( __( 'Photo Comments: ', 'celestial' ) ) ); ?>
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'celestial' ) . '</span>', __( '1 Reply', 'celestial' ), __( '% Replies', 'celestial' ) ); ?>
					</span><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'celestial' ), '<span class="edit-link">', '</span>' ); ?>
			
		</header><!-- .entry-meta -->
		<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail( ); ?>
			</div>
		<?php endif;?>	
		
			<?php the_content( __( 'See More...', 'celestial' ) ); ?>
		
		
		</div><!-- .entry-content -->
		<footer>
			
		</footer>
	</article><!-- #post -->
</div>