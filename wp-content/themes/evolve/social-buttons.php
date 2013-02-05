<?php 
$evl_rss_feed = evl_get_option('evl_rss_feed','');
$evl_newsletter = evl_get_option('evl_newsletter','');
$evl_facebook = evl_get_option('evl_facebook','');
$evl_twitter_id = evl_get_option('evl_twitter_id','');
$evl_googleplus = evl_get_option('evl_googleplus','');
$evl_myspace = evl_get_option('evl_myspace','');
$evl_skype = evl_get_option('evl_skype','');
$evl_youtube = evl_get_option('evl_youtube','');
$evl_flickr = evl_get_option('evl_flickr','');
$evl_linkedin = evl_get_option('evl_linkedin','');
?>   

<ul class="sc_menu">

<li><a target="_blank" href="<?php $options = get_option('evolve');if ($evl_rss_feed != "" ) { echo $evl_rss_feed; } else { bloginfo( 'rss_url' ); } ?>" class="tipsytext" id="rss" original-title="RSS Feed"></a></li>

<?php 
  if (!empty($evl_newsletter)) { ?>
<li><a target="_blank" href="<?php $options = get_option('evolve');if ($evl_newsletter != "" ) echo $evl_newsletter; ?>" class="tipsytext" id="email-newsletter" original-title="Newsletter"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($evl_facebook)) { ?>
<li><a target="_blank" href="http://facebook.com/<?php $options = get_option('evolve');if ($evl_facebook == "" ) $evl_facebook = $default_facebook;echo esc_attr($evl_facebook);?>" class="tipsytext" id="facebook" original-title="Facebook"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($evl_twitter_id)) { ?>
<li><a target="_blank" href="http://twitter.com/<?php $options = get_option('evolve');if ($evl_twitter_id == "" ) $evl_twitter_id = $default_twitter_id;echo esc_attr($evl_twitter_id);?>" class="tipsytext" id="twitter" original-title="Twitter"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($evl_googleplus)) { ?>
<li><a target="_blank" href="http://plus.google.com/<?php $options = get_option('evolve');if ($evl_googleplus != "" ) echo $evl_googleplus; ?>" class="tipsytext" id="plus" original-title="Google Plus"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($evl_myspace)) { ?>
<li><a target="_blank" href="http://myspace.com/<?php $options = get_option('evolve');if ($evl_myspace != "" ) echo $evl_myspace; ?>" class="tipsytext" id="myspace" original-title="MySpace"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($evl_skype)) { ?>
<li><a href="skype:<?php $options = get_option('evolve');if ($evl_skype != "" ) echo $evl_skype; ?>?call" class="tipsytext" id="skype" original-title="Skype"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($evl_youtube)) { ?>
<li><a target="_blank" href="http://youtube.com/user/<?php $options = get_option('evolve');if ($evl_youtube != "" ) echo $evl_youtube; ?>" class="tipsytext" id="youtube" original-title="YouTube"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($evl_flickr)) { ?>
<li><a target="_blank" href="http://flickr.com/photos/<?php $options = get_option('evolve');if ($evl_flickr != "" ) echo $evl_flickr; ?>" class="tipsytext" id="flickr" original-title="Flickr"></a></li><?php } else { ?><?php } ?>

<?php 
  if (!empty($evl_linkedin)) { ?>
<li><a target="_blank" href="<?php $options = get_option('evolve');if ($evl_linkedin != "" ) echo $evl_linkedin; ?>" class="tipsytext" id="linkedin" original-title="LinkedIn"></a></li><?php } else { ?><?php } ?>

</ul>