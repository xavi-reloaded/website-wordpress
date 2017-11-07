<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
$item_width   = ( isset( $shop_catalog_image['width'] ) ? $shop_catalog_image['width'] : '226' );
$slider_width = ( $post_layout == 'layout_none_sidebar' ) ? 1050 : 690;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
	$related = $product->get_related( 10 );
} else {
	$related = wc_get_related_products( $product->get_id(), 10 );
}

if ( ! $related ) {
	return;
}

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => 10,
	'orderby'             => $orderby,
	'post__in'            => $related,
	'post__not_in'        => array( $product->get_id() ),
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = '5';

if ( $products->have_posts() ) : ?>

	<div class="related products entry-content wooflexslider">
		<div class="flex-viewport">
			<ul class="carousel-nav flex-direction-nav">
				<li><a class="flex-prev" href="#"><?php _e( 'Previous', 'retro' ); ?></a></li>
				<li><h2 class="carousel-title"><?php _e( 'Related Products', 'retro' ); ?></h2></li>
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

		var relatedFlexslider, iwr, computedWR, computedMR;

		if (window.matchMedia("(min-width: 1024px) and (max-width: 1230px)").matches) {
			iwr = <?php echo ( $post_layout == 'layout_none_sidebar' ) ? ( ( $item_width * $responsive_ratio_1024 + 16 < 900 ) ? $item_width * $responsive_ratio_1024 + 16 : 900 ) : ( ( round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 < 590 ) ? round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 : 590 ); ?>;
		} else if (window.matchMedia("(min-width: 768px) and (max-width: 1023px)").matches) {
			iwr = <?php echo ( $item_width * $responsive_ratio_768 + 16 < 648 ) ? $item_width * $responsive_ratio_768 + 16 : 648; ?>;
		} else if (window.matchMedia("(min-width: 480px) and (max-width: 767px)").matches) {
			iwr = <?php echo ( $item_width * $responsive_ratio_480 + 16 < 456 ) ? $item_width * $responsive_ratio_480 + 16 : 456; ?>;
		} else if (window.matchMedia("(max-width: 479px)").matches) {
			iwr = <?php echo ( $item_width + 16 < 280 ) ? $item_width + 16 : 280; ?>;
		} else if (window.matchMedia("(min-width: 1231px)").matches) {
			iwr = <?php echo ( $post_layout == 'layout_none_sidebar' ) ? ( ( $item_width + 16 < 1050 ) ? $item_width + 16 : 1050 ) : ( ( round( $item_width * $woo_ratio ) + 16 < 690 ) ? round( $item_width * $woo_ratio ) + 16 : 690 ); ?>;
		}

		jQuery(window).load(function () {

			computedMR = Math.ceil(jQuery('.related.wooflexslider').width() / iwr);
			computedWR = Math.floor((jQuery('.related.wooflexslider').width() - computedMR * 24 + 24) / computedMR);


			jQuery('.related.wooflexslider').flexslider({
				animation: "slide",
				itemWidth: computedWR,
				itemMargin: 24,
				minItems: 1,
				maxItems: computedMR,
				directionNav: true,
				controlNav: false,
				reverse: false,
				allowOneSlide: false,
				start: function (slider) {
					jQuery('.related.wooflexslider .thumb_holder').each(function () {
						jQuery(this).height(jQuery(this).find('img').first().height());
						jQuery(this).find('img.product_hover_image').css({'margin-top': -jQuery(this).find('img').first().height()});
					});
					relatedFlexslider = slider;

					items_count = jQuery('.related.wooflexslider').find('.slides li').length;

					if (items_count <= computedMR) {
						jQuery('.related.wooflexslider').find('.flex-direction-nav .flex-prev, .flex-direction-nav .flex-next').remove();
					}


					jQuery(window).resize(function () {


						setTimeout(function () {

							if (window.matchMedia("(min-width: 1024px) and (max-width: 1230px)").matches) {
								iwr = <?php echo ( $post_layout == 'layout_none_sidebar' ) ? ( ( $item_width * $responsive_ratio_1024 + 16 < 900 ) ? $item_width * $responsive_ratio_1024 + 16 : 900 ) : ( ( round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 < 590 ) ? round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 : 590 ); ?>;
							} else if (window.matchMedia("(min-width: 768px) and (max-width: 1023px)").matches) {
								iwr = <?php echo ( $item_width * $responsive_ratio_768 + 16 < 648 ) ? $item_width * $responsive_ratio_768 + 16 : 648; ?>;
							} else if (window.matchMedia("(min-width: 480px) and (max-width: 767px)").matches) {
								iwr = <?php echo ( $item_width * $responsive_ratio_480 + 16 < 456 ) ? $item_width * $responsive_ratio_480 + 16 : 456; ?>;
							} else if (window.matchMedia("(max-width: 479px)").matches) {
								iwr = <?php echo ( $item_width + 16 < 280 ) ? $item_width + 16 : 280; ?>;
							} else {
								iwr = <?php echo ( $post_layout == 'layout_none_sidebar' ) ? ( ( $item_width + 16 < 1050 ) ? $item_width + 16 : 1050 ) : ( ( round( $item_width * $woo_ratio ) + 16 < 690 ) ? round( $item_width * $woo_ratio ) + 16 : 690 ); ?>;
							}

							computedMR = Math.ceil(jQuery('.related.wooflexslider').width() / iwr);
							computedWR = Math.floor((jQuery('.related.wooflexslider').width() - computedMR * 24 + 24) / computedMR);

							relatedFlexslider.vars.itemWidth = computedWR;
							relatedFlexslider.vars.maxItems = computedMR;
							relatedFlexslider.flexAnimate(0);
							relatedFlexslider.slides.width(relatedFlexslider.vars.itemWidth);
							relatedFlexslider.update(relatedFlexslider.pagingCount);
							relatedFlexslider.setProps();


							jQuery('.related.wooflexslider .thumb_holder').each(function () {
								jQuery(this).height(jQuery(this).find('img').first().height());
								jQuery(this).find('img.product_hover_image').css({'margin-top': -jQuery(this).find('img').first().height()});
							});
						}, 300);
					});

				}

			});

		});


	</script>
	<?php
endif;

wp_reset_postdata();
