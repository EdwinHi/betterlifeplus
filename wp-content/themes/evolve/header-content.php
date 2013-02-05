	<?php 
  
  $evl_home_header_content = evl_get_option('evl_home_header_content', 'search_social'); 
  $evl_single_header_content = evl_get_option('evl_single_header_content', 'search_social');
  $evl_archives_header_content = evl_get_option('evl_archives_header_content', 'search_social');
  $evl_header_slider = evl_get_option('evl_header_slider', 'disable');
  
  
  if (is_home()) { 
  $settings = $evl_home_header_content;
        } elseif (is_single()) {
     $settings = $evl_single_header_content;   
        } else {
         $settings =  $evl_archives_header_content; } ?>
  
  
  <div class="container container-header">   



 <?php if ($evl_header_slider == "disable" || $evl_header_slider == "") { 
  
   $number_items = 1;
  
   } else { $number_items = 10; } ?>  
  
 
        <?php 
  if ($settings == "search_social" || $settings == "") { ?>
  
  
  
  <!--BEGIN #subscribe-follow-->
 
<div id="social" class="nosl">
<?php get_template_part('social-buttons', 'header'); ?></div>



<!--END #subscribe-follow-->
  
  
  
  
   <!--BEGIN #righttopcolumn-->  
  <div id="righttopcolumn"> 
       
<?php get_search_form(); ?> 

</div> 
  <!--END #righttopcolumn-->


  
  <?php } elseif ($settings == "post_search_social") { ?>
  
   
  
  
  
  
  
      
       
         <div id="slide_holder">
         
         

  	<div class="slide-container">
    
    
  	

	
		<ul id="slides">
		
    <?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args=array(
   'showposts'=>$number_items,
   'post__not_in' =>get_option("sticky_posts"),
   );
query_posts($args);
?>


<?php if (have_posts()) : $featured = new WP_Query($args); while($featured->have_posts()) : $featured->the_post(); ?>

<li class="slide"><div class="featured-title">
     

<a class="title" href="<?php the_permalink() ?>">
<?php
$title = the_title('', '', false);
echo evltruncate($title, 40, '...');
 ?></a> 
 
 
 </div>
 
 
 
 <?php  
           
          
if(has_post_thumbnail()) {
	echo '<div class="featured-thumbnail"><a href="'; the_permalink(); echo '">';the_post_thumbnail('slider-thumbnail'); echo '</a></div>';
  
     } else {

                      $image = evlget_first_image(); 
                      if ($image):
                      echo '<div class="featured-thumbnail"><a href="'; the_permalink(); echo'"><img src="'.$image.'" alt="';the_title();echo'" /></a></div>';
                      endif;
               } ?>

<p>
<?php $postexcerpt = get_the_content();
$postexcerpt = apply_filters('the_content', $postexcerpt);
$postexcerpt = str_replace(']]>', ']]&gt;', $postexcerpt);
$postexcerpt = strip_tags($postexcerpt);
$postexcerpt = strip_shortcodes($postexcerpt);

echo evltruncate($postexcerpt, 180, ' [...]');
 ?>
 
</p> 
 
 
 





<a class="post-more" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'evolve' ); ?></a>


</li>       




 
<?php endwhile; ?> 


<?php else: ?>

<li>
<?php _e( 'Oops, please try to refresh the page', 'evolve' ); ?>
</li>

<?php endif; ?>
   
   
<?php wp_reset_query(); ?>
   
   
   </ul>

      
       </div>  </div>
       

 <!--BEGIN #righttopcolumn-->  
  <div id="righttopcolumn"> 

       
       
 <!--BEGIN #searchform--> 
 
 
 <?php get_search_form(); ?>     
   
  


    
<!--END #searchform-->


<!--BEGIN #subscribe-follow-->


<div id="social" class="sc"><div class="clearfix"></div>
<?php get_template_part('social-buttons', 'header'); ?></div>




<!--END #subscribe-follow-->



 <!--END #righttopcolumn-->  
  </div> 
  



<?php } else { ?>
   
   
          
       
       <?php } ?>
       
    
       
       
       </div>