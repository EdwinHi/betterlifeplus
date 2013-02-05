<?php get_header(); ?>
		<div id="primary">
			<div id="content" role="main">
			<?php if (have_posts()) : ?>
   <?php while (have_posts()) : the_post(); ?>
      <div <?php post_class(); ?>>
     <h2 id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
      </div>

<div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'classicchalkboard' ), 'after' => '</div>' ) ); ?>
<div class="post-end"><img src="<?php echo get_template_directory_uri(); ?>/images/postseparator.png" alt="Separator" /></div>
</div><!-- .entry-content -->
  <?php endwhile; ?>
<?php comments_template( '', true ); ?>
<?php else : ?>
<h2 class="center"><?php _e('404 - Page Not Found', 'classicchalkboard'); ?></h2>
<div class="entry-content">
					<p><?php _e( 'Sorry, but no results were found. Perhaps searching will help find a related post.', 'classicchalkboard' ); ?></p>
					<?php get_search_form(); ?>
			</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>






		



			</div><!-- #content -->







		</div><!-- #primary -->







<?php get_footer(); ?>