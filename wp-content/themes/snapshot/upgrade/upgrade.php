<?php

function snapshot_premium_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To Snapshot Premium', 'snapshot');
	$content['premium_summary'] = __("If you've enjoyed using Snapshot, you'll going to love Snapshot Premium. It's a robust upgrade to Snapshot that gives you loads of cool features and email support. At just <strong>$9</strong>, it's a cost effective way to give your site a professional edge.", 'snapshot');
	
	$content['buy_url'] = 'http://go.siteorigin.com/snapshot-premium';
	$content['buy_price'] = '$9';
	$content['buy_button'] = get_template_directory_uri().'/upgrade/images/download.png';
	$content['buy_message_1'] = __("If you're not delighted with Snapshot Premium, I'll give you a full refund", 'snapshot');
	$content['buy_message_2'] = __("Remember, if you're not satisfied, you get your money back", 'snapshot');

	$content['features'] = array(
		array(
			'heading' => __('Sprite Maps', 'snapshot'),
			'content' => __("If you're targeting a perfect Google PageSpeed score and all the SEO benefits it brings, then sprite maps are essential. They'll make your site load faster and put less load on your servers - saving you cash.", 'snapshot'),
		),
		array(
			'heading' => __('Video Posts', 'snapshot'),
			'content' => __('Are you more of a video guy/gal? Snapshot Premium makes adding videos, from any popular video sharing site, easy. Your video goes front and center - where the featured photo usually goes. Perfect for your video blog or web series.', 'snapshot'),
		),
		array(
			'heading' => __('Ajax Comments', 'snapshot'),
			'content' => __("Keep the conversation flowing with ajax comments. Your visitors will be able to post comments without leaving the page or interrupting your videos. Ajax comments makes commenting more enjoyable for your visitors. So you'll probably get more comments and more visitors.", 'snapshot'),
		),
		array(
			'heading' => __('A Dashing Dark Style', 'snapshot'),
			'content' => __('Prefer to keep the lights out? Snapshot Premium ships with both dark and light styles. So you can set the mood you really want.', 'snapshot'),
		),
		array(
			'heading' => __('Remove Attribution Links', 'snapshot'),
			'content' => __('Want to look professional? Snapshot Premium gives you the option to remove the "Theme by SiteOrigin" text from your footer in the options panel.', 'snapshot'),
		),
		array(
			'heading' => __('Slick Search', 'snapshot'),
			'content' => __('Snapshot Premium has an option to add a non-obtrusive search button to your main menu. Clicking it slides out a big, beautiful search bar so your visitors can explore your content.', 'snapshot'),
		),
		array(
			'heading' => __('Continued Updates', 'snapshot'),
			'content' => __("We'll keep Snapshot Premium up to date with new features and performance enhancements.", 'snapshot'),
		),
		array(
			'heading' => __('Premium Support', 'snapshot'),
			'content' => __("New to WordPress? Need to chat to someone? There is a WordPress guru, waiting to answer your questions. Your posts receive much higher priority on our support forums.", 'snapshot'),
		),
	);

	$content['featured'] = array(
		get_template_directory_uri().'/upgrade/images/premium.jpg',
		1110, 1398
	);
	
	return $content;
}
add_filter('siteorigin_premium_content', 'snapshot_premium_upgrade_content');