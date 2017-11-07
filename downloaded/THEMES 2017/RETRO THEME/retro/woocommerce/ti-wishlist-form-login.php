<?php
/**
 * The Template for displaying dialog for login in wishlist.
 *
 * @version             1.3.1
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>


<h2><?php esc_html_e( 'Login', 'ti-woocommerce-wishlist-premium' ); ?></h2>

<form method="post" class="login">

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<div class="input-group">

		<p class="form-row form-row-first">
			<input type="text" placeholder="<?php esc_html_e( 'Username', 'ti-woocommerce-wishlist-premium' ); ?>"
			       class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) {
				echo esc_attr( $_POST['username'] );
			} // @codingStandardsIgnoreLine WordPress.VIP.SuperGlobalInputUsage.AccessDetected ?>"/>
			<span class="tinvwl-icon"></span>
		</p>
		<p class="form-row form-row-last">
			<input placeholder="<?php esc_html_e( 'Password', 'ti-woocommerce-wishlist-premium' ); ?>"
			       class="input-text" type="password" name="password" id="password"/>
			<span class="tinvwl-icon"></span>
		</p>

		<span class="input-group-btn">
					<?php wp_nonce_field( 'woocommerce-login' ); ?>
			<input type="submit" class="" name="login"
			       value="<?php echo esc_attr_e( 'Login', 'ti-woocommerce-wishlist-premium' ); ?>"/>
				</span>

	</div>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<div class="tinv-wishlist-clear"></div>

	<p class="form-row tinv-rememberme">
		<label for="rememberme" class="inline">
			<input name="rememberme" type="checkbox" id="rememberme"
			       value="forever"/> <?php esc_html_e( 'Remember me', 'ti-woocommerce-wishlist-premium' ); ?>
		</label>
	</p>

	<p class="lost_password">
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot your password?', 'ti-woocommerce-wishlist-premium' ); ?></a>
	</p>

	<div class="tinv-wishlist-clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>


<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
