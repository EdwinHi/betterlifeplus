<?php

/**
 * Display the premium admin menu
 *
 * @action admin_menu
 */
function siteorigin_premium_admin_menu() {
	// Don't display this page if the user has alreeady upgraded to premium
	if ( defined( 'SITEORIGIN_IS_PREMIUM' ) ) return;

	add_theme_page( __( 'Premium Upgrade', 'siteorigin' ), __( 'Premium Upgrade', 'siteorigin' ), 'switch_themes', 'premium_upgrade', 'siteorigin_premium_page_render' );
}

add_action( 'admin_menu', 'siteorigin_premium_admin_menu' );

/**
 * Render the premium page
 */
function siteorigin_premium_page_render() {
	$theme = basename( get_template_directory() );

	if ( isset( $_GET['action'] ) ) $action = $_GET['action'];
	else $action = 'view';

	switch ( $action ) {
		case 'view':
			$premium = apply_filters( 'siteorigin_premium_content', array() );

			if ( empty( $premium ) ) {
				?>
				<div class="wrap" id="theme-upgrade">
					<h2><?php _e( 'Premium Upgrade', 'siteorigin' ) ?></h2>
					<p>
						<?php
						printf(
							__( "There's a premium version of %s available, <a href='%s'>find out more</a>.", 'siteorigin' ),
							ucfirst( $theme ),
							'http://siteorigin.com/premium/' . $theme . '/'
						);
						?>
					</p>
				</div>
				<?php
				return;
			}

			?>
			<div class="wrap" id="theme-upgrade">
				<form id="theme-upgrade-info" method="post" action="<?php echo esc_url( add_query_arg( 'action', 'enter-order' ) ) ?>">
					<p>
						<?php
						printf(
							__( "After you pay for %s Premium, we'll email you a download link and an order number to your <strong>PayPal email address</strong>. ", 'siteorigin' ) ,
							ucfirst( $theme )
						);
						printf(
							__( "Use <a href='%s' target='_blank'>this form</a> if you don't receive your order number in the next 15 minutes. ", 'siteorigin' ) ,
							'http://siteorigin.com/orders/'
						);
						_e( 'Be sure to check your spam folder.', 'siteorigin' );
						?>
					</p>

					<label><strong><?php _e( 'Order Number', 'siteorigin' ) ?></strong></label>
					<input type="text" class="regular-text" name="order_number" />
					<input type="submit" value="<?php esc_attr_e( 'Enable Upgrade', 'siteorigin' ) ?>" />
					<?php wp_nonce_field( 'save_order_number', '_upgrade_nonce' ) ?>
				</form>
				
				<a href="#" id="theme-upgrade-already-paid" class="button"><?php _e( 'Already Paid?', 'siteorigin' ) ?></a>
				<?php if ( isset( $premium['premium_title'] ) ) : ?><h2><?php echo $premium['premium_title'] ?></h2><?php endif; ?>
				<?php if ( isset( $premium['premium_summary'] ) ) : ?><p><?php echo $premium['premium_summary'] ?></p><?php endif; ?>

				<?php if ( isset( $premium['buy_url'] ) ) : ?>
				<p class="download">
					<span class="buy-button-wrapper">
						<a href="<?php echo esc_url( $premium['buy_url'] ) ?>" class="buy-button">
							<span><?php _e('Buy Upgrade', 'siteorigin') ?></span><em><?php echo $premium['buy_price'] ?></em>
						</a>
					</span>
					<?php if ( isset( $premium['buy_message_1'] ) ) : ?><span class="info"><?php echo $premium['buy_message_1'] ?></span><?php endif; ?>
				</p>
				<?php endif; ?>

				<?php if ( !empty( $premium['featured'] ) ) : ?>
					<p id="promo-image">
						<img src="<?php echo esc_url( $premium['featured'][ 0 ] ) ?>" width="<?php echo intval( $premium['featured'][ 1 ] ) ?>" height="<?php echo intval( $premium['featured'][ 2 ] ) ?>" class="magnify" />
					</p>
				<?php endif; ?>
				<div class="content">
					<?php if ( !empty( $premium['features'] ) ) : foreach ( $premium['features'] as $feature ) : ?>
						<h3><?php echo $feature['heading'] ?></h3>
						<p><?php echo $feature['content'] ?></p>
					<?php endforeach; endif; ?>
				</div>

				<?php if ( isset( $premium['buy_url'] ) ) : ?>
				<p class="download">
					<span class="buy-button-wrapper">
						<a href="<?php echo esc_url( $premium['buy_url'] ) ?>" class="buy-button">
							<span><?php _e('Buy Upgrade', 'siteorigin') ?></span><em><?php echo $premium['buy_price'] ?></em>
						</a>
					</span>
					<?php if ( isset( $premium['buy_message_2'] ) ) : ?><span class="info"><?php echo $premium['buy_message_2'] ?></span><?php endif; ?>
				</p>
				<?php endif; ?>
				
				<?php if(!empty($premium['testimonials'])): ?>
					<ul class="testimonials">
						<?php foreach($premium['testimonials'] as $testimonial) : ?>
							<li>
								<div class="avatar" style="background-image: url(http://www.gravatar.com/avatar/<?php echo esc_attr($testimonial['gravatar']) ?>?d=identicon&s=55)"></div>
								<div class="text">
									<div class="content"><?php echo $testimonial['content'] ?></div>
									<div class="name"><?php echo $testimonial['name'] ?></div>
								</div>
								<div class="clear"></div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div id="magnifier">
				<div class="image"></div>
			</div>
			<?php
			break;

		case 'enter-order' :
			$option_name = 'siteorigin_order_number_' . $theme;
			if ( isset( $_POST['_upgrade_nonce'] ) && wp_verify_nonce( $_POST['_upgrade_nonce'], 'save_order_number' ) && isset( $_POST['order_number'] ) ) {
				update_option( $option_name, trim( $_POST['order_number'] ) );
			}

			// Validate the order number
			$result = wp_remote_get(
				add_query_arg( array(
					'order_number' => get_option( $option_name ),
					'action' => 'validate_order_number',
				), SITEORIGIN_THEME_ENDPOINT . '/premium/' . $theme . '/' )
			);
			$valid = null;
			if ( !is_wp_error( $result ) ) {
				$validation_result = unserialize( $result['body'] );
				$valid = isset( $validation_result['valid'] ) ? $validation_result['valid'] : null;
				if ( $valid ) {
					// Trigger a refresh of the theme update information
					set_site_transient( 'update_themes', null );
				}
			}


			?>
			<div class="wrap" id="theme-upgrade">
				<h2><?php printf(__('Your Order Number Is [%s]', 'siteorigin'), get_option( $option_name )) ?></h2>

				<?php if ( is_null( $valid ) ) : ?>
				<p>
					<?php _e( "There was a problem contacting our validation servers.", 'siteorigin' ) ?>
					<?php _e( "Please try again later, or upgrade manually using the ZIP file we sent you.", 'siteorigin' ) ?>
				</p>
				<?php elseif ( $valid ) : ?>
				<p>
					<?php _e( "We've validated your order number.", 'siteorigin' ) ?>
					<?php
					printf(
						__( 'You can update now, or later on your <a href="%s">Themes page</a>.', 'siteorigin' ),
						admin_url( 'themes.php' )
					);
					?>
					<?php _e( 'This update will unlock all the premium features.', 'siteorigin' ) ?>
				</p>
				<p class="submit">
					<?php
					$update_url = wp_nonce_url( admin_url( 'update.php?action=upgrade-theme&amp;theme=' . urlencode( $theme ) ), 'upgrade-theme_' . $theme );
					$update_onclick = 'onclick="if ( confirm(\'' . esc_js( __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'siteorigin' ) ) . '\') ) {return true;}return false;"';
					?>
					<a href="<?php echo esc_url( $update_url ) ?>" <?php echo $update_onclick ?> class="button-primary">
						<?php _e( 'Update Theme', 'siteorigin' ) ?>
					</a>
				</p>
				<?php else : ?>
				<p>
					<?php _e( 'We  <strong>invalid</strong>.', 'siteorigin' ) ?>
					<?php _e( "Please try again, or upgrade manually using the ZIP file we sent you.", 'siteorigin' ) ?>
					<?php _e( 'Note that you need a valid order number to receive automatic updates in the future.', 'siteorigin' ) ?>
				</p>
				<?php endif; ?>
			</div>
			<?php
			break;
	}
}

/**
 * Enqueue admin scripts
 *
 * @param $prefix
 * @return mixed
 *
 * @action admin_enqueue_scripts
 */
function siteorigin_premium_admin_enqueue( $prefix ) {
	if ( $prefix != 'appearance_page_premium_upgrade' ) return;

	wp_enqueue_script( 'siteorigin-magnifier', get_template_directory_uri() . '/extras/premium/magnifier.min.js', array( 'jquery' ), SITEORIGIN_THEME_VERSION );
	wp_enqueue_script( 'siteorigin-cycle', get_template_directory_uri() . '/extras/premium/cycle.min.js', array( 'jquery' ), SITEORIGIN_THEME_VERSION );
	wp_enqueue_script( 'siteorigin-premium-upgrade', get_template_directory_uri() . '/extras/premium/premium.min.js', array( 'jquery' ), SITEORIGIN_THEME_VERSION );
	wp_enqueue_style( 'siteorigin-premium-upgrade', get_template_directory_uri() . '/extras/premium/premium.css', array(), SITEORIGIN_THEME_VERSION );
}
add_action( 'admin_enqueue_scripts', 'siteorigin_premium_admin_enqueue' );

function siteorigin_premium_enqueue_teaser(){
	wp_enqueue_style( 'siteorigin-premium-teaser', get_template_directory_uri() . '/extras/premium/premium-teaser.css', array(), SITEORIGIN_THEME_VERSION );
	wp_enqueue_script( 'siteorigin-premium-teaser', get_template_directory_uri() . '/extras/premium/premium-teaser.min.js', array('jquery'), SITEORIGIN_THEME_VERSION );
}

function siteorigin_premium_call_function($callback, $param_array, $args = array()){
	if(defined('SITEORIGIN_IS_PREMIUM') && function_exists($callback)){
		call_user_func_array($callback, $param_array);
	}
	else{
		$theme = basename( get_template_directory() );
		if(!empty($args['before'])) echo $args['before'];
		?>
		<a class="siteorigin-premium-teaser" href="<?php echo admin_url( 'themes.php?page=premium_upgrade' ) ?>" target="_blank">
			<em></em>
			<?php printf( __( 'This feature is available in <strong>%s Premium</strong> - <strong class="upgrade">Upgrade Now</strong>', 'siteorigin' ), ucfirst($theme) ) ?>
			<?php if(!empty($args['teaser-image'])) : ?>
				<div class="teaser-image"><img src="<?php echo esc_url($args['teaser-image']) ?>" width="220" height="120" /><div class="pointer"></div></div>
			<?php endif; ?>
		</a>
		<?php if(!empty($args['description'])) : ?>
			<div class="siteorigin-premium-teaser-description"><?php echo $args['description'] ?></div>
		<?php
		endif;
		if(!empty($args['after'])) echo $args['after'];
	}
}