<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying the main page footer
 *
 * @file           footer.php
 * @package        Celestial Lite
 * @since          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 

?>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- #st-content-wrapper -->	

					<div id="st-footer-wrapper" style="background-color:<?php echo get_theme_mod( 'footer_widgets_bg', '#272b30' ); ?>; color:<?php echo get_theme_mod( 'footer_widgets_text', '#959798' ); ?>;">
						<aside id="sidebar-footer" class="container">
							<div class="row">
							<?php if ( is_active_sidebar( 'sidebar-16' ) ) : ?>
								<div id="footer1" <?php st_footergroup_sidebar_class(); ?> role="complementary">
									<?php dynamic_sidebar( 'sidebar-16' ); ?>
								</div><!-- #footer1 -->
							<?php endif; ?>
							
							<?php if ( is_active_sidebar( 'sidebar-17' ) ) : ?>
								<div id="footer2" <?php st_footergroup_sidebar_class(); ?> role="complementary">
									<?php dynamic_sidebar( 'sidebar-17' ); ?>
								</div><!-- #footer2 -->
							<?php endif; ?>
							
							<?php if ( is_active_sidebar( 'sidebar-18' ) ) : ?>
								<div id="footer3" <?php st_footergroup_sidebar_class(); ?> role="complementary">
									<?php dynamic_sidebar( 'sidebar-18' ); ?>
								</div><!-- #footer3 -->
							<?php endif; ?>
								
							<?php if ( is_active_sidebar( 'sidebar-19' ) ) : ?>
								<div id="footer4" <?php st_footergroup_sidebar_class(); ?> role="complementary">
									<?php dynamic_sidebar( 'sidebar-19' ); ?>
								</div><!-- #bottom4 -->
							<?php endif; ?>
							</div>
						</aside><!-- #sidebar-bottom -->
						
						<?php if ( is_active_sidebar( 'sidebar-20' ) ) : ?>
						
							<aside id="inset-footer" class="container">
								<div class="row" role="complementary">
									<?php dynamic_sidebar( 'sidebar-20' ); ?>
								</div><!-- #inset-footer -->
							</aside>
						
						<?php endif; ?>
					</div>
				
			<div id="st-copyright-wrapper" style="background-color:<?php echo get_theme_mod( 'copyright_bg', '#161718' ); ?>; border-color: <?php echo get_theme_mod( 'copyright_bottom_line', '#333333' ); ?>; color:<?php echo get_theme_mod( 'copyright_text', '#c4cacf' ); ?>;">
				<div class="container">
					<div class="row">
						<div class="span12">
							<div><?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'fallback_cb' => false, 'container' => false, 'depth' => 1,'menu_id' => 'st-footer-menu' ) ); ?></div>
							<div><?php echo get_theme_mod( 'copyright', 'Copyright &copy; 2012 Styledthemes.com All rights reserved.' ); ?></div>
							
						</div>
					</div>
				</div>
			</div>
		</div><!-- #st-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>
<?php
/* End of file footer.php */