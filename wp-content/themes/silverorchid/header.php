<?php
/**
 * Theme:  	  silverOrchid
 * Theme URL: http://gazpo.com/2012/04/silverorchid 
 * Created:   April 2012
 * Author:    Sami Ch.
 * URL: 	  http://gazpo.com
 * 
 **/
$gazpo_settings = get_option( 'gazpo_options');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" type="text/css" media="all"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php if ( isset ($gazpo_settings['gazpo_rss_url']) &&  ($gazpo_settings['gazpo_rss_url']!="") ) { ?>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo $gazpo_settings['gazpo_rss_url']; ?>" />
	<?php } else {?>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<?php }	

		if ( isset ($gazpo_settings['gazpo_css_code']) &&  ($gazpo_settings['gazpo_css_code']!="") ) {
			$output = '<style type="text/css">'."\n";
			$output .= $gazpo_settings['gazpo_css_code'] . "\n";
			$output .= '</style>'."\n";
			echo $output;
		}	
	
		if ( isset ($gazpo_settings['gazpo_favicon_url']) &&  ($gazpo_settings['gazpo_favicon_url']!="") ) { ?>
			<link rel="shortcut icon" href="<?php echo $gazpo_settings['gazpo_favicon_url']; ?>" />	
	<?php 
		}	
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );	
		?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">	
	<div id="gazpo-header">
		<!-- site logo and description -->
		<div class="logo">
			<?php if ( isset ($gazpo_settings['gazpo_logo_url']) &&  ($gazpo_settings['gazpo_logo_url']!="") ) { ?>
		
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo $gazpo_settings['gazpo_logo_url']; ?>" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
			
		<?php } else {?>
		       
			<h1 class="site-title">
				<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
					<?php bloginfo('name'); ?>
				</a>
			</h1> 
			
			<h3>
					<?php bloginfo('description'); ?>
			</h3>
		<?php } ?>	
		</div>	<!-- /logo -->	
		
		<!-- header 468x60px ad -->
		<?php if ( isset($gazpo_settings['gazpo_ad468_code']) && ($gazpo_settings['gazpo_ad468_code']!="") ){ ?>
			<div class="ad468_60">			
				<?php echo(stripslashes ($gazpo_settings['gazpo_ad468_code'])); ?>
			</div>
		<?php } ?>			
	</div>
	
	<!-- header menu -->
	<div id="gazpo-nav">
		
		
		<?php wp_nav_menu( array( 'container_class' => 'main-menu', 'theme_location' => 'header_menu' ) ); ?>
	
	</div>
	
	<div id="content-container">