<?php
/**
 * Template: Searchform.php
 *
 * @package EvoLve
 * @subpackage Template
 */
?>
<!--BEGIN #searchform-->
       <form action="<?php echo home_url(); ?>" method="get" class="searchform">
       
         <div id="search-text-box">
  
  <label class="searchfield" id="search_label" for="search-text"><input id="search-text" type="text" tabindex="1" name="s" class="search" onfocus="if (this.value == '<?php _e( 'Type your search', 'evolve' ); ?>') {this.value=''}" onblur="if(this.value == '') { this.value='<?php _e( 'Type your search', 'evolve' ); ?>'}" value="<?php _e( 'Type your search', 'evolve' ); ?>" /></label> 
  
  </div>
  
           <div id="search-button-box">
      
	<button id="search-button" tabindex="2" type="submit" class="search-btn"></button>
  
  </div>
  
  

  
  
    
</form>

<div class="clearfix"></div> 

<!--END #searchform-->