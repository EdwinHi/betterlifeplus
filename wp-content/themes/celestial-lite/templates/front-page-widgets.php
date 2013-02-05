<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying a custom front page with only widgets and no content
 *
   Template Name: Front Page Widgets Only
 *
 * @file           front-page-widgets.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); ?>

<?php get_sidebar( 'front' ); ?>
	
<?php get_footer(); ?>