<?php
/**
 * Template: Footer.php
 *
 * @package EvoLve
 * @subpackage Template
 */
?>
		<!--END #content-->
		</div>
    
    	<!--END .container-->
	</div> 
  
  

      	<!--END .content-->
	</div> 
  
     <!--BEGIN .content-bottom--> 
  <div class="content-bottom">
  
       	<!--END .content-bottom-->
  </div>
			
		<!--BEGIN .footer-->
		<div class="footer">

   	<!--BEGIN .container-->
	<div class="container container-footer">    
  
  
           <!-- AD Space 9 -->
  
  
    <?php $options = get_option('evolve');
    
    
    if (!empty($options['evl_space_9'])) {  
    
 $ad_space_9 = $options['evl_space_9']; 
 echo '<div class="ad-9">'.esc_attr($ad_space_9).'</div>';
 
 } 
?> 


  <?php $evl_widgets_footer = evl_get_option('evl_widgets_num','disable');

// if Footer widgets exist

  if (($evl_widgets_footer  == "") || ($evl_widgets_footer  == "disable"))  
{ } else { ?> 
  
  <!--BEGIN .widgets-holder-->
    <div class="widgets-holder">
    
    <div class="footer-1">
    	<?php	if ( !dynamic_sidebar( 'footer-1' ) ) : ?>
      <?php endif; ?>
      </div>
     
     <div class="footer-2"> 
      <?php	if ( !dynamic_sidebar( 'footer-2' ) ) : ?>
      <?php endif; ?>
      </div>
    
    <div class="footer-3">  
	    <?php	if ( !dynamic_sidebar( 'footer-3' ) ) : ?>
      <?php endif; ?>
      </div>      
    
    
    <div class="footer-4">  
    	<?php	if ( !dynamic_sidebar( 'footer-4' ) ) : ?>
      <?php endif; ?>
      </div>
        
    </div> 
    
    <!--END .widgets-holder--> 
    
    <?php } ?>


<div class="clearfix"></div> 
  
  <?php $footer_content = evl_get_option('evl_footer_content',''); 
 if ($footer_content === false) $footer_content = '';
 echo esc_attr($footer_content);
?>   


 

  
  

			<!-- Theme Hook -->
      
      <?php evlfooter_hooks(); ?> 
      
		  

          	<!--END .container-->  
	</div> 

 
		
		<!--END .footer-->
		</div>

<!--END body-->  



  <?php $evl_pos_button = evl_get_option('evl_pos_button','disable');
  if ($evl_pos_button == "disable" || $evl_pos_button == "") { ?>
  
   <?php } else { ?>
   
     <div id="backtotop"><a href="#top" id="top-link"><span class="top-icon"><?php _e( 'Back to Top', 'evolve' ); ?></span></a></div>   

<?php } ?>

<?php $evl_custom_background = evl_get_option('evl_custom_background','0'); if ($evl_custom_background == "1") { ?>
</div>
<?php } ?>

<?php wp_footer(); ?> 

</body>
<!--END html(kthxbye)-->
</html>