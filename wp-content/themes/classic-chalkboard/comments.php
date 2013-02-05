<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
	<?php die('You can not access this page directly!'); ?>
<?php endif; ?>
<?php if(!empty($post->post_password)) : ?>
  	<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
		<p>This post is password protected. Enter the password to view comments.</p>
  	<?php endif; ?>
<?php endif; ?>
<?php if ( have_comments() ) : ?>
  	<ol class="commentlist">
    	<?php wp_list_comments(array('style' => 'div')); ?>
	</ol>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments' , 'classicchalkboard' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>' , 'classicchalkboard' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>
<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'classicchalkboard' ); ?></p>
		<?php endif; ?>
	<?php endif; // have_comments() ?>
	<?php comment_form(); ?>