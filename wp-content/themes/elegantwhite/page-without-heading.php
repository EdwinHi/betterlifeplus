<?php $elegantwhite_options = get_option('elegantwhite_options'); ?>
<?php
 /*
 Template Name: Page without Heading
 */
 ?>
<?php 
/*
Copyright: Themes by Fimply
Theme: elegantWhite

All rights reserved.
Alle Rechte vorbehalten.
*/
?>

<?php get_header(); ?>

<div id="second-container">

<div id="content2">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <div id="post" <?php post_class(); ?>>
  
  
   <?php the_content(); ?>
   
   
  <div id="clear"></div>
  
  
    
   
  </div>

<?php endwhile; ?> 

<?php endif; ?>


<?php if ( comments_open() ) : ?>
<?php comments_template(); ?> 

<?php endif; ?>

</div>

<div id="clear"></div>

</div>



<?php get_footer(); ?>