
</div>

<footer id="colophon" role="contentinfo">
    <div id="site-generator">
        <?php echo __('&copy; ', 'pinblack') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
		<?php if ( is_home() || is_front_page() ) : ?>
        <?php _e('- Powered by ', 'pinblack'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'pinblack' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'pinblack' ); ?>"><?php _e('Wordpress' ,'pinblack'); ?></a>
        <?php _e(' and ', 'pinblack'); ?><a href="<?php echo esc_url( __( 'http://wpthemes.co.nz/', 'pinblack' ) ); ?>"><?php _e('WPThemes.co.nz', 'pinblack'); ?></a>
        <?php endif; ?>
    </div>
</footer>
    
<?php wp_footer(); ?>

</body>
</html>