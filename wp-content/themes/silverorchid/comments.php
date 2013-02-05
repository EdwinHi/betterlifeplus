<?php
/**
 * Theme:  	  silverOrchid
 * Theme URL: http://gazpo.com/2012/04/silverorchid 
 * Created:   April 2012
 * Author:    Sami Ch.
 * URL: 	  http://gazpo.com
 * 
 **/
 ?>
 
<div id="comments">
	
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'silverorchid' ); ?></p>
	</div><!-- /comments -->
	<?php
		return;
	endif;
	?>
	
	<?php if ( have_comments() ) : ?>
	
		<h3 class="title">
			<?php printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'silverorchid' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>	
		</h3>
	
		<ol class="commentlist">
			<?php wp_list_comments('avatar_size=32'); ?>
		</ol>
		
		<div class="navigation">
			<?php paginate_comments_links(); ?> 
		</div>
	
	<?php else : // or, if we don't have comments:

		if ( ! comments_open() ) :
	?>	
		<p class="nocomments"><?php _e( 'Comments are closed.', 'silverorchid' ); ?></p>

		<?php endif; // end ! comments_open() ?>
				
	<?php endif; // end have_comments() ?>
	
	<?php comment_form(); ?>

</div>