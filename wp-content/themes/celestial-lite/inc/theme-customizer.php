<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme customizer options
 *
 * @file           theme-customizer.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 

add_action('after_setup_theme','themedemo_setup');
function themedemo_setup() {
	add_theme_support( 'custom-background', array(
		'default-color' => '000000',
	) );
}



// Lets add some colours to our theme
add_action('customize_register', 'themedemo_customize');
function themedemo_customize($wp_customize) {

// Lets remove the Display Header Text setting and control
$wp_customize->remove_setting( 'display_header_text');
$wp_customize->remove_control( 'display_header_text');

// Lets begin adding our own settings and controls

	$wp_customize->add_setting( 'logo_style', array(
		'default' => 'default',
	) );
	
	$wp_customize->add_control( 'logo_style', array(
    'label'   => __( 'Logo Style', 'celestial' ),
    'section' => 'title_tagline',
	'priority' => '3',
    'type'    => 'radio',
        'choices' => array(
            'default' => __( 'Default Logo', 'celestial' ),
            'custom' => __( 'Your Logo', 'celestial' ),
            'text' => __( 'Text Title', 'celestial' ),
        ),
    ));

    $wp_customize->add_setting('my_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'my_logo', array(
        'label'    => __('Your Logo', 'celestial'),
        'section'  => 'title_tagline',
        'settings' => 'my_logo',
		'priority' => '4',
    )));

	$wp_customize->add_setting( 'page_top_bar', array(
		'default'        => '#3c3f41',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_top_bar', array(
		'label'   => __( 'Page Top Bar', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'page_top_bar',
		'priority' => '1',
	) ) );

	$wp_customize->add_setting( 'header_topline', array(
		'default'        => '#ffffff',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_topline', array(
		'label'   => __( 'Header Top Line', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'header_topline',
		'priority' => '2',
	) ) );	
	
	$wp_customize->add_setting( 'header_submenu_bg', array(
		'default'        => '#f6f6f6',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_submenu_bg', array(
		'label'   => __( 'Header and Submenu Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'header_submenu_bg',
		'priority' => '2',
	) ) );

	$wp_customize->add_setting( 'content_bg', array(
		'default'        => '#ffffff',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
		'label'   => __( 'Content Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'content_bg',
		'priority' => '3',
	) ) );
	
	$wp_customize->add_setting( 'social_bg', array(
		'default'        => '#393c3f',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_bg', array(
		'label'   => __( 'Social Bar Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'social_bg',
		'priority' => '4',
	) ) );
	
	$wp_customize->add_setting( 'banner_background', array(
		'default'        => '#446b9a',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_background', array(
		'label'   => __( 'Banner Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'banner_background',
		'priority' => '5',
	) ) );
	
	$wp_customize->add_setting( 'banner_top_line', array(
		'default'        => '#525458',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_top_line', array(
		'label'   => __( 'Banner Top Line', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'banner_top_line',
		'priority' => '6',
	) ) );	
	$wp_customize->add_setting( 'content_text', array(
		'default'        => '#848484',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text', array(
		'label'   => __( 'Content Text Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'content_text',
		'priority' => '7',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_bg', array(
		'default'        => '#272b30',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_bg', array(
		'label'   => __( 'Footer Widgets Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_bg',
		'priority' => '8',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_heading', array(
		'default'        => '#ced4da',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_heading', array(
		'label'   => __( 'Footer Widgets Heading Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_heading',
		'priority' => '9',
	) ) );
	
	$wp_customize->add_setting( 'footer_widgets_text', array(
		'default'        => '#959798',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_text', array(
		'label'   => __( 'Footer Widgets Text Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_text',
		'priority' => '10',
	) ) );

	$wp_customize->add_setting( 'footer_widgets_links', array(
		'default'        => '#ffffff',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widgets_links', array(
		'label'   => __( 'Footer Widgets Links Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'footer_widgets_links',
		'priority' => '11',
	) ) );	
	
	$wp_customize->add_setting( 'copyright_bg', array(
		'default'        => '#161718',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg', array(
		'label'   => __( 'Copyright Background', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'copyright_bg',
		'priority' => '12',
	) ) );

	$wp_customize->add_setting( 'copyright_text', array(
		'default'        => '#c4cacf',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text', array(
		'label'   => __( 'Copyright Text Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'copyright_text',
		'priority' => '13',
	) ) );

	$wp_customize->add_setting( 'copyright_link_hover', array(
		'default'        => '#cccccc',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_hover', array(
		'label'   => __( 'Copyright Link Hover', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'copyright_link_hover',
		'priority' => '14',
	) ) );	
	
	
	$wp_customize->add_setting( 'copyright_bottom_line', array(
		'default'        => '#333333',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bottom_line', array(
		'label'   => __( 'Copyright Bottom Line', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'copyright_bottom_line',
		'priority' => '15',
	) ) );

	$wp_customize->add_setting( 'link_colour', array(
		'default'        => '#467fc2',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
		'label'   => __( 'Page Link Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'link_colour',
		'priority' => '16',
	) ) );

	$wp_customize->add_setting( 'link_colour_hover', array(
		'default'        => '#000000',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour_hover', array(
		'label'   => __( 'Page Link Colour on Hover', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'link_colour_hover',
		'priority' => '17',
	) ) );	
	
	$wp_customize->add_setting( 'main_menu_link', array(
		'default'        => '#555555',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_link', array(
		'label'   => __( 'Primary Menu Link Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'main_menu_link',
		'priority' => '18',
	) ) );	

	$wp_customize->add_setting( 'parent_hover_active', array(
		'default'        => '#477bbe',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'parent_hover_active', array(
		'label'   => __( 'Parent Menu Hover &amp; Active Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'parent_hover_active',
		'priority' => '19',
	) ) );	
	
	$wp_customize->add_setting( 'submenu_link_colour', array(
		'default'        => '#555555',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_link_colour', array(
		'label'   => __( 'Submenu Link Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'submenu_link_colour',
		'priority' => '20',
	) ) );	
	
	$wp_customize->add_setting( 'submenu_hover_active', array(
		'default'        => '#477bbe',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover_active', array(
		'label'   => __( 'Submenu Hover &amp; Active Colour', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'submenu_hover_active',
		'priority' => '21',
	) ) );	
	
	$wp_customize->add_setting( 'submenu_bg_hover', array(
		'default'        => '#f3f3f3',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg_hover', array(
		'label'   => __( 'Submenu Background on Hover', 'celestial' ),
		'section' => 'colors',
		'settings'   => 'submenu_bg_hover',
		'priority' => '22',
	) ) );	
	


// BASIC SETTINGS Section
	$wp_customize->add_section( 'basic_settings', array(
		'title'          => __( 'Basic Settings', 'celestial' ),
		'priority'       => 36,
	) );

// Setting group for a Checkbox
	$wp_customize->add_setting( 'blog_image', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'blog_image', array(
    'settings' => 'blog_image',
    'label'    => __( 'Small Blog Image', 'celestial' ),
    'section'  => 'basic_settings',
    'type'     => 'checkbox',
	) );
// Setting group for a blog sidebar choice
	$wp_customize->add_setting( 'blog_left', array(
		'default'        => '',
	) );
	$wp_customize->add_control( 'blog_left', array(
    'settings' => 'blog_left',
    'label'    => __( 'Blog with Left Sidebar', 'celestial' ),
    'section'  => 'basic_settings',
    'type'     => 'checkbox',
	) );

// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Copyright &copy; 2012 Styledthemes.com All rights reserved.',
	) );

	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => __( 'Your Copyright Notice', 'celestial' ),
		'section'  => 'basic_settings',
		'type'     => 'text',
	) );
	
// Setting group for a page comments
	$wp_customize->add_setting( 'page_comments', array(
		'default'        => '1',
	) );
	$wp_customize->add_control( 'page_comments', array(
    'settings' => 'page_comments',
    'label'    => __( 'Turn on Page Comments', 'celestial' ),
    'section'  => 'basic_settings',
    'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'demo_on', array(
		'default'        => '0',
	) );
	$wp_customize->add_control( 'demo_on', array(
    'settings' => 'demo_on',
    'label'    => __( 'Showcase Demo Banner', 'celestial' ),
    'section'  => 'header_image',
    'type'     => 'checkbox',
	'priority' => '1'
	) );	
	
	$wp_customize->add_setting( 'header_all', array(
		'default'        => '1',
	) );
	$wp_customize->add_control( 'header_all', array(
    'settings' => 'header_all',
    'label'    => __( 'WP Header Every Page', 'celestial' ),
    'section'  => 'header_image',
    'type'     => 'checkbox',
	'priority' => '10'
	) );	
	
	
	
	
	
	$wp_customize->add_setting( 'banner_bg_padding', array(
		'default'        => '7px 0px',
	) );

	$wp_customize->add_control( 'banner_bg_padding', array(
		'label'   => __( 'Banner Background Padding', 'celestial' ),
		'section' => 'header_image',
		'settings'   => 'banner_bg_padding',
		'type'     => 'text',
		'priority' => '3'
	) );
	$wp_customize->add_setting( 'banner_fp_bg_padding', array(
		'default'        => '0px',
	) );

	$wp_customize->add_control( 'banner_fp_bg_padding', array(
		'label'   => __( 'Front Page Banner Padding', 'celestial' ),
		'section' => 'header_image',
		'settings'   => 'banner_fp_bg_padding',
		'type'     => 'text',
		'priority' => '4'
	) );

	$wp_customize->add_setting( 'curve_on', array(
		'default'        => '1',
	) );
	$wp_customize->add_control( 'curve_on', array(
    'settings' => 'curve_on',
    'label'    => __( 'Front Page Showcase Curve', 'celestial' ),
    'section'  => 'header_image',
    'type'     => 'checkbox',
	'priority' => '5'
	) );
	
// SOCIAL NETWORKING SETTINGS Section
	$wp_customize->add_section( 'social_networking', array(
		'title'          => __( 'Social Networking', 'celestial' ),
		'priority'       => 38,
	) );	

// Setting group for a Twitter
	$wp_customize->add_setting( 'twitter_on', array(
		'default'        => '0',
	) );
	$wp_customize->add_control( 'twitter_on', array(
    'settings' => 'twitter_on',
    'label'    => __( 'Turn on Twitter', 'celestial' ),
    'section'  => 'social_networking',
    'type'     => 'checkbox',
	'priority' => '1'
	) );
	
	$wp_customize->add_setting( 'twitter_link', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'twitter_link', array(
		'settings' => 'twitter_link',
		'label'    => __( 'Twitter URL', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => '2'
	) );

	$wp_customize->add_setting( 'facebook_on', array(
		'default'        => '0',
	) );
	$wp_customize->add_control( 'facebook_on', array(
    'settings' => 'facebook_on',
    'label'    => __( 'Turn on Facebook', 'celestial' ),
    'section'  => 'social_networking',
    'type'     => 'checkbox',
	'priority' => '3'
	) );
	
	$wp_customize->add_setting( 'facebook_link', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'facebook_link', array(
		'settings' => 'facebook_link',
		'label'    => __( 'Facebook URL', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => '4'
	) );	

	$wp_customize->add_setting( 'google_on', array(
		'default'        => '0',
	) );
	$wp_customize->add_control( 'google_on', array(
    'settings' => 'google_on',
    'label'    => __( 'Turn on Google+', 'celestial' ),
    'section'  => 'social_networking',
    'type'     => 'checkbox',
	'priority' => '5'
	) );
	
	$wp_customize->add_setting( 'google_link', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'google_link', array(
		'settings' => 'google_link',
		'label'    => __( 'Google+ URL', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => '6'
	) );	

	$wp_customize->add_setting( 'linkedin_on', array(
		'default'        => '0',
	) );
	$wp_customize->add_control( 'linkedin_on', array(
    'settings' => 'linkedin_on',
    'label'    => __( 'Turn on LinkedIn', 'celestial' ),
    'section'  => 'social_networking',
    'type'     => 'checkbox',
	'priority' => '7'
	) );
	
	$wp_customize->add_setting( 'linkedin_link', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'linkedin_link', array(
		'settings' => 'linkedin_link',
		'label'    => __( 'LinkedIn URL', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => '8'
	) );

	$wp_customize->add_setting( 'pinterest_on', array(
		'default'        => '0',
	) );
	$wp_customize->add_control( 'pinterest_on', array(
    'settings' => 'pinterest_on',
    'label'    => __( 'Turn on Pinterest', 'celestial' ),
    'section'  => 'social_networking',
    'type'     => 'checkbox',
	'priority' => '9'
	) );
	
	$wp_customize->add_setting( 'pinterest_link', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'pinterest_link', array(
		'settings' => 'pinterest_link',
		'label'    => __( 'Pinterest URL', 'celestial' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => '10'
	) );	
	
	
	
	
}