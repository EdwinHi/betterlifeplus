<?php if(get_post_meta(get_the_ID(), 'snapshot_post_video', true) && function_exists('snapshot_premium_video_viewer')) : ?>
	<div id="post-single-viewer">
		<div class="container">
			<?php snapshot_premium_video_viewer(get_the_ID()); ?>
		</div>
	</div>
<?php elseif(has_post_thumbnail()) : ?>
	<div id="post-single-viewer" class="image">
		<div class="container">
			<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'single-large', false, array('class' => 'single-image')); ?>
		</div>
	</div>
<?php endif; ?>
<div id="home-slider-below"></div>