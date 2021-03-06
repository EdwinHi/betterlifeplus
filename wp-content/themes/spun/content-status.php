<?php
/**
 * @package Spun
 * @since Spun 1.0
 */

global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<div class="status-avatar">
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
		</a>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link">
				<a href="#comments-toggle">
					<span class="tail"></span>
					<?php echo comments_number( __( '+', 'spun' ), __( '1', 'spun' ), __( '%', 'spun' ) ); ?>
				</a>
			</span>
		<?php endif; ?>
		<span class="post-date">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'spun' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_date( get_option( 'date_format' ) ); ?></a> <?php _e( '@', 'spun' ); ?> <?php the_time( 'g:i a' ) ?>
		</span>

		<?php edit_post_link( __( 'Edit', 'spun' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
