<?php

/**
 * Initialize the admin settings
 *
 * @action admin_init
 */
function snapshot_settings_admin_init(){
	siteorigin_settings_add_section('general', __('General', 'snapshot'));
	siteorigin_settings_add_section('appearance', __('Appearance', 'snapshot'));
	siteorigin_settings_add_section('posts', __('Posts', 'snapshot'));
	siteorigin_settings_add_section('slider', __('Slider', 'snapshot'));
	siteorigin_settings_add_section('social', __('Social', 'snapshot'));
	siteorigin_settings_add_section('comments', __('Comments', 'snapshot'));
	siteorigin_settings_add_section('messages', __('Text', 'snapshot'));

	// General Stuff
	
	siteorigin_settings_add_teaser('general', 'search', __('Search in Menu', 'snapshot'), array(
		'description' => __('Display a search link in your menu that slides out a big beautiful search bar.', 'snapshot')
	));
	siteorigin_settings_add_field('general', 'latest_posts', 'text', __('Latest Posts Title', 'snapshot'));
	siteorigin_settings_add_field('general', 'copyright', 'text', __('Copyright Message', 'snapshot'));
	siteorigin_settings_add_teaser('general', 'attribution', __('Attribution Link', 'snapshot'), array(
		'description' => __('Hide or display "Theme By SiteOrigin" link from your footer.', 'snapshot')
	));

	// Appearance Stuff

	siteorigin_settings_add_field('appearance', 'link', 'color', __('Link Color', 'snapshot'));
	
	siteorigin_settings_add_teaser('appearance', 'style', __('Style', 'snapshot'), array(
		'description' => __('Choose the style of your site.', 'snapshot')
	));
	
	// Posts stuff
	
	siteorigin_settings_add_field('posts', 'clickable_thumbnails', 'checkbox', __('Clickable Thumbnails', 'snapshot'), array(
		'description' => __('Make the entire post thumbnail clickable on the home page and post archive pages.', 'snapshot')
	));

	siteorigin_settings_add_field('posts', 'sidebar_images', 'checkbox', __('Sidebar Images', 'snapshot'), array(
		'description' => __('Show or hide the post thumbnails down the right sidebar.', 'snapshot')
	));
	
	siteorigin_settings_add_teaser('posts', 'video_autoplay', __('Video: Autoplay', 'snapshot'), array(
		'description' => __('Automatically start playing post videos', 'snapshot'),
	));

	siteorigin_settings_add_teaser('posts', 'video_hide_related', __('Video: Hide Related', 'snapshot'), array(
		'description' => __('Hides related videos after YouTube videos stop playing.', 'snapshot'),
	));

	siteorigin_settings_add_teaser('posts', 'video_default_hd', __('Video: Default to HD', 'snapshot'), array(
		'description' => __('Defaults YouTube and Vimeo videos to HD. Can be overwritten by user/video settings.', 'snapshot'),
	));

	// The slider section
	
	siteorigin_settings_add_field('slider', 'enabled', 'checkbox', __('Home Page Slider', 'snapshot'), array());
	siteorigin_settings_add_field('slider', 'speed', 'number', __('Transition Speed', 'snapshot'), array(
		'description' => __('Number of milliseconds a photo is displayed for.', 'snapshot')
	));
	siteorigin_settings_add_field('slider', 'transition', 'number', __('Transition Delay', 'snapshot'), array(
		'description' => __('How many milliseconds the transition takes.', 'snapshot'),
	));
	siteorigin_settings_add_field('slider', 'post_count', 'number', __('Post Count', 'snapshot'), array(
		'description' => __('The number of posts displayed on your home page slider.', 'snapshot'),
	));
	
	siteorigin_settings_add_teaser('slider', 'posts', __('Posts Order', 'snapshot'), array(
		'description' => __('How Snapshot chooses your home page slides.', 'snapshot')
	));
	siteorigin_settings_add_teaser('slider', 'category', __('Posts Category', 'snapshot'), array(
		'description' => __('Choose which posts are displayed on your home page slider.', 'snapshot')
	));

	// Social and sharing
	
	siteorigin_settings_add_field('social', 'display_share', 'checkbox', __('Share Buttons', 'snapshot'), array(
		'label' => __('Show share buttons next to posts', 'snapshot')
	));
	siteorigin_settings_add_field('social', 'twitter', 'text', __('Twitter Username', 'snapshot'), array('validator' => 'twitter'));
	siteorigin_settings_add_field('social', 'recommend', 'checkbox', __('Recommend SiteOrigin', 'snapshot'), array(
		'label' => __('Yes', 'snapshot'),
		'description' => __("Recommends your's and SiteOrigin's Twitter accounts after someone tweets your post.", 'snapshot')
	));

	// Comments
	
	siteorigin_settings_add_teaser('comments', 'ajax', __('Ajax Comments', 'snapshot'), array(
		'description' => __('Let your visitors post comments without leaving the page.', 'snapshot')
	));

	// Site messages
	
	siteorigin_settings_add_field('messages', '404', 'textarea', __('Error 404 Message', 'snapshot'));
	siteorigin_settings_add_field('messages', 'no_results', 'textarea', __('No Search Results', 'snapshot'));
}
add_action('admin_init', 'snapshot_settings_admin_init');

/**
 * Set up the default settings
 * @param $defaults
 * @return array
 *
 * @filter siteorigin_theme_default_settings
 */
function snapshot_settings_default($defaults){
	$defaults['general_search'] = true;
	$defaults['general_latest_posts'] = __('Latest Posts', 'snapshot');
	$defaults['general_copyright'] = __('Copyright &copy; {sitename} {year}', 'snapshot');
	$defaults['general_attribution'] = true;

	$defaults['appearance_style'] = 'light';
	$defaults['appearance_link'] = '#dc5c3b';
	
	$defaults['posts_clickable_thumbnails'] = false;
	$defaults['posts_sidebar_images'] = true;
	$defaults['posts_video_autoplay'] = false;
	$defaults['posts_video_hide_related'] = false;
	$defaults['posts_video_default_hd'] = false;

	$defaults['slider_enabled'] = true;
	$defaults['slider_speed'] = 7500;
	$defaults['slider_transition'] = 500;
	$defaults['slider_post_count'] = 5;
	$defaults['slider_posts'] = 'date';
	$defaults['slider_category'] = 'date';

	$defaults['social_display_share'] = true;
	$defaults['social_recommend'] = false;
	$defaults['social_twitter'] = '';

	$defaults['comments_ajax'] = true;

	$defaults['messages_404'] = '';
	$defaults['messages_no_results'] = '';

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'snapshot_settings_default');