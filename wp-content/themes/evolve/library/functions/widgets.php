<?php

$evl_layout = evl_get_option('evl_layout','2cr');
$evl_widgets_header = evl_get_option('evl_widgets_header','one');
$evl_widgets_footer = evl_get_option('evl_widgets_num','disable');

if (($evl_layout == "2cr" || $evl_layout == "2cl" || $evl_layout == "3cr" || $evl_layout == "3cl" || $evl_layout == "3cm"))  
{

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar 1',
'id' => 'sidebar-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
} else {
register_sidebar(array(
'name' => 'Sidebar Widgets Disabled',
'id' => 'sidebar-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
'description' => __('You are using one column layout. Please visit theme settings page and change layout to enable sidebar widgets. Widgets placed on this area won\'t be active.', 'pure-line'),
));
}

if (($evl_layout == "3cr" || $evl_layout == "3cl" || $evl_layout == "3cm"))  
{
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar 2',
'id' => 'sidebar-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}


function evl_header1() {
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 1',
'id' => 'header-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_header2() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 2',
'id' => 'header-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_header3() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 3',
'id' => 'header-3',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_header4() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 4',
'id' => 'header-4',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}

function evl_footer1() {
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 1',
'id' => 'footer-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_footer2() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 2',
'id' => 'footer-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_footer3() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 3',
'id' => 'footer-3',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_footer4() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 4',
'id' => 'footer-4',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}

// Header widgets

  if (($evl_widgets_header == "one"))  
{
evl_header1();
}
  if (($evl_widgets_header == "two"))  
{
evl_header1();
evl_header2();
}
  if (($evl_widgets_header == "three"))  
{
evl_header1();
evl_header2();
evl_header3();
}
  if (($evl_widgets_header == "four"))  
{
evl_header1();
evl_header2();
evl_header3();
evl_header4();
} else {}

// Footer widgets

  if (($evl_widgets_footer == "one"))  
{
evl_footer1();
}
  if (($evl_widgets_footer == "two"))  
{
evl_footer1();
evl_footer2();
}
  if (($evl_widgets_footer == "three"))  
{
evl_footer1();
evl_footer2();
evl_footer3();
}
  if (($evl_widgets_footer == "four"))  
{
evl_footer1();
evl_footer2();
evl_footer3();
evl_footer4();
} else {}

function evlwidget_area_active( $index ) {
	global $wp_registered_sidebars;
	
	$widgetarea = wp_get_sidebars_widgets();
	if ( isset($widgetarea[$index]) ) return true;
	
	return false;
}

function evolve_widget_area( $name = false ) {
	if ( !isset($name) ) {
		$widget[] = "widget.php";
	} else {
		$widget[] = "widget-{$name}.php";
	}
	locate_template( $widget, true );
}




function evlwidget_before_title() { ?>

<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">

<?php }

function evlwidget_after_title() { ?>

</h3></div>

<?php }

function evlwidget_before_widget() { ?>

<div class="widget"><div class="widget-content">

<?php }

function evlwidget_after_widget() { ?>

</div></div>

<?php }


function evlwidget_text($args, $number = 1) {
extract($args);
$options = get_option('evlwidget_text');
$title = $options[$number]['title'];
if ( empty($title) )
$title = '';  }



class evolve_carousel_WP_Widget extends WP_Widget {

function __construct() {
		$widget_ops = array('classname' => 'carousel-slider', 'description' => __('Insert your custom image slides', 'evolve' ));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('carousel-slider', __('Carousel Slider', 'evolve'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
  
  $evldefaultslider = "<div id='myCarousel' class='carousel slide'>
<div class='carousel-inner'>
<div class='item active'>

<img src='".get_template_directory_uri()."/library/media/images/slider/slider_img_01.png' alt='' />
<div class='carousel-caption'>
<h4>Built-in Bootstrap Elements let you do amazing things with your website</h4>
</div>
</div>

<div class='item'>

<img src='".get_template_directory_uri()."/library/media/images/slider/slider_img_02.png' alt='' />
<div class='carousel-caption'>
<h4>Easy to use control panel with a lot of options</h4> 
</div>
</div>

<div class='item'>

<img src='".get_template_directory_uri()."/library/media/images/slider/slider_img_03.png' alt='' />
<div class='carousel-caption'>
<h4>Fully responsive theme for any device</h4>  
</div>
</div> 

<div class='item'>

<img src='".get_template_directory_uri()."/library/media/images/slider/slider_img_04.png' alt='' />
<div class='carousel-caption'>
<h4>Unlimited color schemes</h4> 
</div>
</div>


</div>

<a class='left carousel-control' href='#myCarousel' data-slide='prev'><img src='".get_template_directory_uri()."/library/media/images/left-ar.png' /></a>
<a class='right carousel-control' href='#myCarousel' data-slide='next'><img src='".get_template_directory_uri()."/library/media/images/right-ar.png' /></a>

</div>



<div id='carousel-nav'>
<a href='#myCarousel' data-to='1' class='active'>1</a>
<a href='#myCarousel' data-to='2'>2</a>
<a href='#myCarousel' data-to='3'>3</a>
<a href='#myCarousel' data-to='4'>4</a>
</div>

";
  
  
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => $evldefaultslider ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'evolve'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

<?php
	}
}


function evolve_carousel_init() {
   
	register_widget('evolve_carousel_WP_Widget');

	do_action('widgets_init');
}

add_action('init', 'evolve_carousel_init', 1);

?>
