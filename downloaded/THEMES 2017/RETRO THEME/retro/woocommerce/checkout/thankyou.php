<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $order ) : ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<div
			class="ox_notification notification_error"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></div>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
			   class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"
				   class="button pay left_fix"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

		<div
			class="ox_notification notification_mark"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></div>

		<ul class="order_details">
			<li class="order">
				<?php _e( 'Order number:', 'woocommerce' ); ?>
				<strong><?php echo $order->get_order_number(); ?></strong>
			</li>

			<li class="date">
				<?php _e( 'Date:', 'woocommerce' ); ?>
				<?php if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) { ?>
					<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
				<?php } else { ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				<?php } ?>
			</li>

			<li class="total">
				<?php _e( 'Total:', 'woocommerce' ); ?>
				<strong><?php echo $order->get_formatted_order_total(); ?></strong>
			</li>
			<?php
			if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
				$payment_method_title = ( $order->payment_method_title );
			} else {
				$payment_method_title = ( $order->get_payment_method_title() );
			}
			?>
			<?php if ( $payment_method_title ) : ?>

				<li class="method">
					<?php _e( 'Payment method:', 'woocommerce' ); ?>
					<?php if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) { ?>
						<strong><?php echo $order->payment_method_title; ?></strong>
					<?php } else { ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					<?php } ?>

				</li>

			<?php endif; ?>
		</ul>
		<div class="clear"></div>

	<?php endif; ?>

	<?php


	if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
		$payment_method = $order->payment_method;
		$order_id = $order->id;
	} else {
		$payment_method = $order->get_payment_method();
		$order_id = $order->get_id();
	}

	do_action( 'woocommerce_thankyou_' . $payment_method, $order_id ); ?>
	<?php do_action( 'woocommerce_thankyou', $order_id ); ?>

<?php else : ?>

	<div
		class="ox_notification notification_mark"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></div>

<?php endif; ?>
