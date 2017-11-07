<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce_loop,$post_layout,$shop_catalog_image,$woo_ratio;

// Store loop count we're currently on.
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid.
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Increase loop count.
$woocommerce_loop['loop']++;
$item_width = (isset( $shop_catalog_image['width'] ) ? $shop_catalog_image['width'] : '226');
?>
	<li <?php wc_product_cat_class( 'retro_product product-category product', $category ); ?>>
		<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">

		<?php
			/**
			 * woocommerce_before_subcategory hook.
			 *
			 * @hooked woocommerce_template_loop_category_link_open - 10
			 */
		do_action( 'woocommerce_before_subcategory', $category );

		/**
	 * woocommerce_before_subcategory_title hook.
	 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
		?>
</a>

	<h3 class="product_cat_indent product_loop_title"><a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>"><?php echo $category->name; ?></a></h3>

		<?php
			/**
			 * woocommerce_after_subcategory_title hook.
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );

		/**
	 * woocommerce_after_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_close - 10
	 */
		do_action( 'woocommerce_after_subcategory', $category ); ?>
</li>
