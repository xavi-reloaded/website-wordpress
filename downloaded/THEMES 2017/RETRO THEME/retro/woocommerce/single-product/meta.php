<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta widget_tag_cloud">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php
	if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
		echo $product->get_tags( ' ', '<div class="tagcloud">' . _n( '<h3 class="widget-title">Tag</h3>', '<h3 class="widget-title">Tags</h3>', $tag_count, 'retro' ) . '</div>' );
	} else {
		echo wc_get_product_tag_list( $product->get_id(), ' ', '<div class="tagcloud">' . _n( '<h3 class="widget-title">Tag</h3>', '<h3 class="widget-title">Tags</h3>', $tag_count, 'retro' ) . '</div>' );
	}


	if ( get_option( 'woocommerce_product_page_categories' ) !== 'yes' ) {
		if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
			echo $product->get_categories( ' ', '<div class="tagcloud">' . _n( '<h3 class="widget-title">Category</h3>', '<h3 class="widget-title">Categories</h3>', $cat_count, 'retro' ) . '</div>' );
		} else {
			echo wc_get_product_category_list( $product->get_id(), ' ', '<div class="tagcloud">' . _n( '<h3 class="widget-title">Category</h3>', '<h3 class="widget-title">Categories</h3>', $cat_count, 'retro' ) . '</div>' );
		}

	}
	?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
