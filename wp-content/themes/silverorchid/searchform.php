<?php
/**
 * Theme:  	  silverOrchid
 * Theme URL: http://gazpo.com/2012/04/silverorchid 
 * Created:   April 2012
 * Author:    Sami Ch.
 * URL: 	  http://gazpo.com
 * 
 **/
?>
 
<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div>
		<input class="searchfield" type="text" value="<?php _e('Search','silverorchid');?>" name="s" id="s" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" />
	</div>
</form>
