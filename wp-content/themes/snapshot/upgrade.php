<?php

function snapshot_upgrade_text($text){
	$text['purchase_url'] = 'http://go.siteorigin.com/snapshot-premium';
	$text['first_line'] = __("If you've enjoyed using Snapshot, you're going to love Snapshot Premium. It's a robust upgrade to Snapshot that gives you loads of cool features and premium support. At just $7.50, it's a cost effective way to give your site a professional edge.", 'snapshot');
	
	$text['below_first_buy'] = __("If you're not delighted with Snapshot Premium, I'll give you a full refund", 'snapshot');
	
	$text['features'] = array(
		array(
			'title' => __('Premium Support', 'snapshot'),
			'text' => __("New to WordPress? Need to chat to someone? There is a WordPress guru, waiting to answer your questions. You'll be familiar with our theme in no time.", 'snapshot'),
		),
		array(
			'title' => __('Sprite Maps', 'snapshot'),
			'text' => __("If you're targeting a perfect Google PageSpeed score and all the SEO benefits it brings, then sprite maps are essential. They'll make your site load faster and put less load on your servers - saving you cash.", 'snapshot'),
		),
		array(
			'title' => __('Video Posts', 'snapshot'),
			'text' => __('Are you more of a video guy/gal? Snapshot Premium makes adding videos, from any popular video sharing site, easy. Your video goes front and center - where the featured photo usually goes. Perfect for your video blog or web series.', 'snapshot'),
		),
		array(
			'title' => __('Ajax Comments', 'snapshot'),
			'text' => __("Keep the conversation flowing with ajax comments. Your visitors will be able to post comments without leaving the page or interrupting your videos. Ajax comments makes commenting more enjoyable for your visitors. So you'll probably get more comments and more visitors.", 'snapshot'),
		),
		array(
			'title' => __('A Dashing Dark Style', 'snapshot'),
			'text' => __('Prefer to keep the lights out? Snapshot Premium ships with both dark and light styles. So you can set the mood you really want.', 'snapshot'),
		),
		array(
			'title' => __('Remove Attribution Links', 'snapshot'),
			'text' => __('Want to look professional? Snapshot Premium gives you the option to remove the "Theme by SiteOrigin" text from your footer in the options panel.', 'snapshot'),
		),
		array(
			'title' => __('Slick Search', 'snapshot'),
			'text' => __('Snapshot Premium has an option to add a non-obtrusive search button to your main menu. Clicking it slides out a big, beautiful search bar so your visitors can explore your content.', 'snapshot'),
		),
		array(
			'title' => __('Continued Updates', 'snapshot'),
			'text' => __("We'll keep Snapshot Premium up to date with new features and performance enhancements.", 'snapshot'),
		),
	);
	
	$text['below_second_buy'] = __("Risk Free Money Back Guarantee", 'snapshot');
	
	$text['promo_image'] = array(
		'http://sopremium.s3.amazonaws.com/snapshot-premium.jpg',
		1280,
		960
	);
	
	return $text;
}
add_filter('so_premium_content', 'snapshot_upgrade_text');