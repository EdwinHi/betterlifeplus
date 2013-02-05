<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying the search form
 *
 * @file           searchform.php
 * @package        Celestial Lite 
 * @since          Celestial Lite 1.0  
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
?>
<form method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text hidden"><?php _e( 'Search', 'celestial' ); ?></label>
	<div class="input-append">
		<input id="s" class="input-medium search-query" type="search" name="s" placeholder="<?php esc_attr_e( 'Search', 'celestial' ); ?>">
		<button class="btn btn-primary" name="submit" id="searchsubmit" type="submit"><?php _e( 'Go', 'celestial' ); ?></button>
   	</div>
</form>
<?php
