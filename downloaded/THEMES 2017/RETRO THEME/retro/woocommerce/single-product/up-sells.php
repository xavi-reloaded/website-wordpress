<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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

global $product, $woocommerce_loop, $shop_catalog_image, $post_layout, $woo_ratio, $responsive_ratio_1024, $responsive_ratio_768, $responsive_ratio_480;
$item_width = ( isset( $shop_catalog_image['width'] ) ? $shop_catalog_image['width'] : '226' );

if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
	$upsells = $product->get_upsells();
} else {
	$upsells = $product->get_upsell_ids();
}
if ( ! $upsells ) {
	return;
}

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => 10,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->get_id() ),
	'meta_query'          => WC()->query->get_meta_query(),
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = '3';

if ( $products->have_posts() ) : ?>

	<div class="up-sells products entry-content wooflexslider">
		<div class="flex-viewport">
			<ul class="carousel-nav flex-direction-nav">
				<li><a class="flex-prev" href="#"><?php _e( 'Previous', 'retro' ); ?></a></li>
				<li><h2 class="carousel-title"><?php _e( 'You May Also Like', 'retro' ); ?></h2></li>
				<li><a class="flex-next" href="#"><?php _e( 'Next', 'retro' ); ?></a></li>
			</ul>
		</div>
		<div class="flex-viewport">
			<ul class="products slides">


				<?php while ( $products->have_posts() ) : $products->the_post(); ?><?php wc_get_template_part( 'content', 'product' ); ?><?php endwhile; // end of the loop.  ?>


			</ul>
		</div>
	</div>
	<script>
		var upsellFlexslider, iwu, computedWU, computedMU;

		if (window.matchMedia("(min-width: 1024px) and (max-width: 1230px)").matches) {
			iwu = <?php echo( ( $item_width * $responsive_ratio_1024 + 16 < 900 ) ? $item_width * $responsive_ratio_1024 + 16 : 900 ); ?>;
		} else if (window.matchMedia("(min-width: 768px) and (max-width: 1023px)").matches) {
			iwu = <?php echo ( $item_width * $responsive_ratio_768 + 16 < 648 ) ? $item_width * $responsive_ratio_768 + 16 : 648; ?>;
		} else if (window.matchMedia("(min-width: 480px) and (max-width: 767px)").matches) {
			iwu = <?php echo ( $item_width * $responsive_ratio_480 + 16 < 456 ) ? $item_width * $responsive_ratio_480 + 16 : 456; ?>;
		} else if (window.matchMedia("(max-width: 479px)").matches) {
			iwu = <?php echo ( $item_width + 16 < 280 ) ? $item_width + 16 : 280; ?>;
		} else {
			iwu = <?php echo( ( $item_width + 16 < 1050 ) ? $item_width + 16 : 1050 ); ?>;
		}
		jQuery(window).load(function () {

			computedMU = Math.ceil(jQuery('.up-sells.wooflexslider').width() / iwu);
			computedWU = Math.floor((jQuery('.up-sells.wooflexslider').width() - computedMU * 24 + 24) / computedMU);

			jQuery('.up-sells.wooflexslider').flexslider({
				animation: "slide",
				itemWidth: computedWU,
				itemMargin: 24,
				minItems: 1,
				maxItems: computedMU,
				directionNav: true,
				controlNav: false,
				reverse: false,
				allowOneSlide: false,
				start: function (slider) {
					jQuery('.up-sells.wooflexslider .thumb_holder').each(function () {
						jQuery(this).height(jQuery(this).find('img').first().height());
						jQuery(this).find('img.product_hover_image').css({'margin-top': -jQuery(this).find('img').first().height()});
					});


					items_count = jQuery('.up-sells.wooflexslider').find('.slides li').length;

					if (items_count <= computedMU) {
						jQuery('.up-sells.wooflexslider').find('.flex-direction-nav .flex-prev, .flex-direction-nav .flex-next').remove();
					}

					upsellFlexslider = slider;

					jQuery(window).resize(function () {

						setTimeout(function () {


							if (window.matchMedia("(min-width: 1024px) and (max-width: 1230px)").matches) {
								iwu = <?php echo( ( $item_width * $responsive_ratio_1024 + 16 < 900 ) ? $item_width * $responsive_ratio_1024 + 16 : 900 ); ?>;
							} else if (window.matchMedia("(min-width: 768px) and (max-width: 1023px)").matches) {
								iwu = <?php echo ( $item_width * $responsive_ratio_768 + 16 < 648 ) ? $item_width * $responsive_ratio_768 + 16 : 648; ?>;
							} else if (window.matchMedia("(min-width: 480px) and (max-width: 767px)").matches) {
								iwu = <?php echo ( $item_width * $responsive_ratio_480 + 16 < 456 ) ? $item_width * $responsive_ratio_480 + 16 : 456; ?>;
							} else if (window.matchMedia("(max-width: 479px)").matches) {
								iwu = <?php echo ( $item_width + 16 < 280 ) ? $item_width + 16 : 280; ?>;
							} else {
								iwu = <?php echo( ( $item_width + 16 < 1050 ) ? $item_width + 16 : 1050 ); ?>;
							}

							computedMU = Math.ceil(jQuery('.up-sells.wooflexslider').width() / iwu);
							computedWU = Math.floor((jQuery('.up-sells.wooflexslider').width() - computedMU * 24 + 24) / computedMU);

							upsellFlexslider.vars.itemWidth = computedWU;
							upsellFlexslider.vars.maxItems = computedMU;
							upsellFlexslider.flexAnimate(0);
							upsellFlexslider.slides.width(upsellFlexslider.vars.itemWidth);
							upsellFlexslider.update(upsellFlexslider.pagingCount);
							upsellFlexslider.setProps();

							jQuery('.up-sells.wooflexslider .thumb_holder').each(function () {
								jQuery(this).height(jQuery(this).find('img').first().height());
								jQuery(this).find('img.product_hover_image').css({'margin-top': -jQuery(this).find('img').first().height()});
							});

						}, 300);
					});

				}

			});

		});


	</script>

<?php endif;

wp_reset_postdata();
