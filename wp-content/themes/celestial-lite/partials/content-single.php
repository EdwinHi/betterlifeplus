<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying content in the single.php template
 *
 * @file           content-single.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 

 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<header class="page-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<span><?php the_date('F j, Y', __('Date: ', 'celestial') ); ?></span>
			<span><?php printf( __( 'Author: ', 'celestial' ) );	the_author_link(); ?></span>					
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
	<?php  if ( has_post_format( 'image' , '' )) : ?>
		<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
			<div class="post-thumbnail"><?php the_post_thumbnail( ); ?></div>
		<?php endif;?>
	<?php endif; ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	
		<?php wp_link_pages( array( 'before' => '<span><span class="page-links">' . __( 'Pages: </span>', 'celestial' ), 'after' => '</span><br />' ) ); ?>
		
		<?php
		$categories_list = get_the_category_list( _x( ', ', 'used between list items, there is a space after the comma', 'celestial' ) );
		$tags_list = get_the_tag_list( '', _x( ', ', 'used between list items, there is a space after the comma', 'celestial' ) );
		
		if ( $categories_list )
			printf( '<span>' . __( '<span class="cat-links">Posted in: </span> %1$s.', 'celestial' ) . '</span><br />', $categories_list );
		if ( $tags_list )
			printf( '<span>' . __( '<span class="tag-links">Tagged: </span> %1$s.', 'celestial' ) . '</span><br />', $tags_list );		 
		?>
		<?php  the_modified_date( 'F j, Y', __( '<span class="modified-date">Last Modified: </span> ', 'celestial') ); ?>
	</footer><!-- .entry-footer -->
	
	
</article><!-- #post-<?php the_ID(); ?> -->
<?php 

if ( get_the_author_meta( 'description' ) AND is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>




<aside id="author-info">
	<div class="row-fluid">
		<div id="author-avatar" class="span1">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'styledthemes_author_bio_avatar_size', 70 ) ); ?>
		</div>
		<div id="author-description" class="span11">
			<h4 id="author-title"><?php printf( __( 'About %s', 'celestial' ), get_the_author() ); ?></h4>
			<?php the_author_meta( 'description' ); ?>
			<span id="author-link"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s here...', 'celestial' ), get_the_author() ); ?>
			</a></span>
		</div><!-- #author-description -->
		
	</div>
</aside><!-- #author-info -->




















<?php endif; ?>