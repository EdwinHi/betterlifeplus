<?php

if(!function_exists('snapshot_attachment_fields_to_edit')):
	/**
	 * Add the sidebar exclude field
	 * @param $fields
	 * @param $post
	 * @return array
	 *
	 * @filter attachment_fields_to_edit
	 */
	function snapshot_attachment_fields_to_edit($fields, $post){
		$parent = get_post($post->post_parent);
		if($parent->post_type == 'post'){
			$exclude = get_post_meta($post->ID, 'sidebar_exclude', true);
			$fields['snapshot_exclude'] = array(
				'label' => __('Sidebar Exclude', 'snapshot'),
				'input' => 'html',
				'html' => '<input name="attachments['.$post->ID.'][sidebar_exclude]" id="attachment-'.$post->ID.'-sidebar_exclude" type="checkbox" '.checked(!empty($exclude), true, false).' /> <label for="attachment-'.$post->ID.'-sidebar_exclude">'.__('Exclude', 'snapshot').'</label>',
				'value' => !empty($exclude)
			);
		}

		return $fields;
	}
endif;
add_filter('attachment_fields_to_edit', 'snapshot_attachment_fields_to_edit', 10, 2);


if(!function_exists('snapshot_attachment_save')):
	/**
	 * Save the attachment form meta.
	 * @param $post
	 * @return mixed
	 *
	 * @filter attachment_fields_to_save
	 */
	function snapshot_attachment_save($post){
		$parent = get_post($post['post_parent']);
		if($parent->post_type == 'post' && !empty($_POST['attachments'][$post['ID']])){
			$current = get_post_meta($post['ID'], 'sidebar_exclude', true);
			$exclude = !empty($_POST['attachments'][$post['ID']]['sidebar_exclude']);
			update_post_meta($post['ID'], 'sidebar_exclude', $exclude, $current);
		}

		return $post;
	}
endif;
add_filter('attachment_fields_to_save', 'snapshot_attachment_save', 10, 2);


if(!function_exists('snapshot_add_meta_boxes')):
	/**
	 * Add the relevant metaboxes.
	 *
	 * @action add_meta_boxes
	 */
	function snapshot_add_meta_boxes(){
		add_meta_box('snapshot-post-video', __('Post Video', 'snapshot'), 'snapshot_meta_box_video_render', 'post', 'side');
	}
endif;
add_action('add_meta_boxes', 'snapshot_add_meta_boxes');


if(!function_exists('snapshot_meta_box_video_render')) :
	/**
	 * Render the video meta box added in snapshot_add_meta_boxes
	 */
	function snapshot_meta_box_video_render(){
		siteorigin_premium_call_function(
			'snapshot_premium_meta_box_video_render',
			array(),
			array(
				'description' => __('Embed a video instead of the image gallery. Any oEmbed compatible site like YouTube or Vimeo.', 'snapshot')
			)
		);
	}
endif;

if(!function_exists('snapshot_admin_enqueue')) :
/**
 * Enqueues admin scripts. Uses $prefix to ensure scripts and styles are only enqueued on the pages they're needed.
 * 
 * @param $prefix
 */
function snapshot_admin_enqueue($prefix){
	if($prefix == 'post.php') {
		siteorigin_premium_enqueue_teaser();
	}
}
endif;
add_action('admin_enqueue_scripts', 'snapshot_admin_enqueue');