<?php get_header(); ?>
<div id="primary">
			<div id="content" role="main">
			<?php if (have_posts()) : ?>
<h2 class="page-title"><?php printf( __( 'Tag Archives: %s', 'classicchalkboard' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h2>
   <?php while (have_posts()) : the_post(); ?>
<div <?php post_class(); ?>>
     <h2 id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="entry-meta">
<span>Posted on <?php the_time('l, F jS, Y') ?> - Filed Under <?php the_category(', ') ?></span>
</div><!-- .entry-meta -->
<div class="entry-content">
<?php the_content('Read more...'); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'classicchalkboard' ), 'after' => '</div>' ) ); ?>
</div>
<div class="post-end"><img src="<?php echo get_template_directory_uri(); ?>/images/postseparator.png" alt="Separator" /></div>
</div><!-- .entry-content -->
<?php endwhile; ?>
<div class="navigation">
<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
<div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
</div>
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