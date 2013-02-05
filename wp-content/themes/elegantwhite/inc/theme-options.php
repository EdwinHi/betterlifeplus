

<div class="wrap">

  <form method="post" action="options.php">
	<?php settings_fields( 'elegantwhite_options' ); ?>
	<?php $elegantwhite_options = get_option( 'elegantwhite_options', elegantwhite_get_default_theme_options() ); ?>


<div class="h2"><?php screen_icon(); ?><h2><?php _e( 'elegantWhite Theme Settings', 'elegantwhite' ); ?></h2></div>



 <div class="adminitem">
 
<h2> Need more features? Upgrade to elegantWhite Pro. </h2>
<p><li>drop-down menus</li>
<li>custom color schemes</li>
<li>Custom Logo and Favicon</li>
<li>Trackbacks and Pingbacks</li>
<li>Layout Options</li>
<li>and much more</li></p>

<h3>Stay tuned! The upgrade is available soon! :) 

<p> Follow us on Twitter for more Information!</p></h3>
<p><a href="https://twitter.com/_fimply" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @_fimply</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
 
 </div>


<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
<div class="update">
	<strong><?php _e( 'The settings have been saved.', 'elegantwhite'); ?></strong>
</div>
<?php endif; ?>



            
     
      <div class="itembar"><?php _e( 'Header', 'elegantwhite' ); ?></div>
       <div class="adminitem">
      <table class="form-table">
       <tr valign="top">
        <th scope="row"><?php _e( 'Deactivate the line at the top', 'elegantwhite'); ?></th>
        <td>
        <input id="elegantwhite_options[top_line]" name="elegantwhite_options[top_line]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['top_line'] ); ?> />  
                      </td>
        
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e( 'Check this box to place a search box in the header.', 'elegantwhite'); ?></th>
        <td>
        <input id="elegantwhite_options[search_ac]" name="elegantwhite_options[search_ac]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['search_ac'] ); ?> />  
                      </td>
        
      </tr>

       <tr valign="top">
        <th scope="row"><?php _e( 'Check this box to place gray lines between the headings and the header image.', 'elegantwhite'); ?></th>
        <td>
        <input id="elegantwhite_options[lines_ac]" name="elegantwhite_options[lines_ac]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['lines_ac'] ); ?> />  
              
        <p><?php _e( 'Example', 'elegantwhite' ); ?>:</p><img src="<?php echo get_template_directory_uri() . '/img/function_lines.png'; ?>">
        </td>
        
      </tr>
    </table>
    </div>
   
    
    
    

             
              <div class="itembar"><?php _e( 'Header-Image', 'elegantwhite'); ?></div>
             <div class="adminitem">
      <table class="form-table">
      <tr valign="top">
        <th scope="row"><?php _e( 'Image-Text', 'elegantwhite'); ?></th>
        <td><input id="elegantwhite_options[bild_text]" class="regular-text" type="text" name="elegantwhite_options[bild_text]" value="<?php echo esc_attr( $elegantwhite_options['bild_text'] ); ?>" /></td>
        <td><?php _e( 'This text will be placed in the top left corner of the header image.', 'elegantwhite'); ?></td>
      </tr>
    </table>
    </div>
              
    
    
          
       
    
    
    <div class="itembar"><?php _e( 'Articles', 'elegantwhite'); ?></div>
     <div class="adminitem">
      <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e( 'Deactivate the post navigation', 'elegantwhite' ); ?></th>
        <td>
        <input id="elegantwhite_options[post-navi]" name="elegantwhite_options[post-navi]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['post-navi'] ); ?> />
        </td>
      </tr>

      <tr valign="top">
        <th scope="row"><?php _e( 'Show an Author-Box under each article.', 'elegantwhite' ); ?></th>
        <td>
        <input id="elegantwhite_options[author-box]" name="elegantwhite_options[author-box]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['author-box'] ); ?> />
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e( 'Show Tags under each article.', 'elegantwhite' ); ?></th>
        <td>
        <input id="elegantwhite_options[show-tags]" name="elegantwhite_options[show-tags]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['show-tags'] ); ?> />
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e( 'Show Categories under each article.', 'elegantwhite' ); ?></th>
        <td>
        <input id="elegantwhite_options[show-categories]" name="elegantwhite_options[show-categories]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['show-categories'] ); ?> />
        </td>
      </tr>
    </table>
    </div>
 
    
    



<div class="itembar"><?php _e( 'Pages', 'elegantwhite'); ?></div>
     <div class="adminitem">
      <table class="form-table">
      <tr valign="top">
        <th scope="row"><?php _e( 'Show the date of publication above each page.', 'elegantwhite' ); ?></th>
        <td class="option">
        <input id="elegantwhite_options[pub-date]" name="elegantwhite_options[pub-date]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['pub-date'] ); ?> />
        </td>
      </tr>
       <tr valign="top">
        <th scope="row"><?php _e( 'Show the date of publication above each full width page.', 'elegantwhite' ); ?></th>
        <td class="option">
        <input id="elegantwhite_options[pub-date-full]" name="elegantwhite_options[pub-date-full]" type="checkbox" value="1" <?php checked( '1', $elegantwhite_options['pub-date-full'] ); ?> />
        </td>
      </tr>
    </table>
    </div>

 



    
      <div class="itembar"><?php _e( 'Footer', 'elegantwhite'); ?></div>
     <div class="adminitem">
      <table class="form-table">
      <tr valign="top">
        <th scope="row"><?php _e( 'Footer-Text', 'elegantwhite' ); ?></th>
        <td><input id="elegantwhite_options[footer_text]" class="regular-text" type="text" name="elegantwhite_options[footer_text]" value="<?php echo esc_attr( $elegantwhite_options['footer_text'] ); ?>" /></td>
        <td><?php _e( 'This text is placed in the footer', 'elegantwhite' ); ?></td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e( 'Analytics Code', 'elegantwhite' ); ?></th>
        <td><textarea id="elegantwhite_options[analytics]" class="regular-text" type="text" name="elegantwhite_options[analytics]" rows="5"><?php echo esc_attr( $elegantwhite_options['analytics'] ); ?></textarea></td>
      </tr>
    </table>
    </div>
       



    <p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save Settings', 'elegantwhite'); ?>" /></p>
  </form>
</div>
