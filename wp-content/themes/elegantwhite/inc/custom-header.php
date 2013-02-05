<?php

$elegantwhite_headeroptions = array(
    'header-text'   => false,
    'default-image' => get_template_directory_uri() . '/img/head.JPG',
    'random-default' => false,
	'uploads'       => true,
	'height'        => 350,
	'width'         => 1000,
);
add_theme_support( 'custom-header', $elegantwhite_headeroptions );

  $elegantwhite_customHeaders = array (
                'Clouds' => array (
                'url' => '%s/img/head.JPG',
                'thumbnail_url' => '%s/img/head_thumbnail.png',
                'description' => __( 'Clouds', 'elegantWhite' )
            ),
            
                'Blue Sky' => array (
                'url' => '%s/img/clouds.jpg',
                'thumbnail_url' => '%s/img/clouds_thumbnail.png',
                'description' => __( 'Blue Sky', 'elegantWhite' )
            ),
            
                'Baltic Sea' => array (
                'url' => '%s/img/baltic.jpg',
                'thumbnail_url' => '%s/img/baltic_thumbnail.png',
                'description' => __( 'Baltic Sea', 'elegantWhite' )
            ),

        );
        
      register_default_headers($elegantwhite_customHeaders);
        
?>