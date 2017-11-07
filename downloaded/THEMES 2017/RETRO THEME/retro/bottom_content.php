<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	global $product;
	if ( is_product() ) {
		if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
			$upsells = $product->get_upsells();
		} else {
			$upsells = $product->get_upsell_ids();
		}
		if ( $upsells ) { ?>
			<div class="second-content-area row clearfix">
				<div class="content-area">
					<article class="grid_12 entry-content">
						<?php
						do_action( 'retro_woocommerce_bottom_content' );
						?>
					</article>
				</div>
			</div>

		<?php }
	}
}
?>
<?php
if ( is_home() ) {
$_id = get_option( 'page_for_posts' );
} elseif ( is_post_type_archive( 'product' ) ) {

if ( is_shop() ) {
$_id = wc_get_page_id( 'shop' );
}
} else {
$_id = get_the_ID();
}

if ( $bottom_content = get_post_meta( $_id, SHORTNAME . '_content_wysiwyg', true ) ) { ?>

<div class="second-content-area row clearfix">
	<div class="content-area">
		<article class="grid_12 entry-content">
			<?php echo ox_the_content( $bottom_content ); ?>
		</article>
	</div>
</div>

<?php } ?>
