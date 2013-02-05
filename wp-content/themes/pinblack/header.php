<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'before' ); ?>
	<header id="branding" role="banner">
      <div id="inner-header" class="clearfix">
		<hgroup id="site-heading">
			<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
      </div>
	</header><!-- #branding -->

<div id="container">

	<nav id="access" role="navigation">
        <h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'pinblack' ); ?></h1>
        <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'pinblack' ); ?>"><?php _e( 'Skip to content', 'pinblack' ); ?></a></div>

        <?php pinblack_main_nav(); // Adjust using Menus in Wordpress Admin ?>
        <?php get_search_form(); ?>
    </nav><!-- #access -->

