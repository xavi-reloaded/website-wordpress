<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce_loop, $woocommerce, $product, $shop_catalog_image, $post_layout, $woo_ratio, $responsive_ratio_1024, $responsive_ratio_768, $responsive_ratio_480;
$item_width = (isset( $shop_catalog_image['width'] ) ? $shop_catalog_image['width'] : '226');
$slider_width = ($post_layout == 'layout_none_sidebar') ? 1050 : 690;

if ( ! $crosssells = WC()->cart->get_cross_sells() ) {
	return;
}

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => apply_filters( 'woocommerce_cross_sells_total', 10 ),
	'orderby'             => $orderby,
	'post__in'            => $crosssells,
	'meta_query'          => WC()->query->get_meta_query(),
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = apply_filters( 'woocommerce_cross_sells_columns', $columns );

if ( $products->have_posts() ) : ?>


	<div class="cross-sells products entry-content wooflexslider">
		<div class="flex-viewport">
			<ul class="carousel-nav flex-direction-nav">
				<li><a class="flex-prev" href="#"><?php _e( 'Previous', 'retro' ); ?></a></li>
				<li><h2 class="carousel-title"><?php _e( 'You may be interested in&hellip;', 'retro' ); ?></h2></li>
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
		var crosssellFlexslider, iwc, computedWC, computedMC;

		if (window.matchMedia("(min-width: 1024px) and (max-width: 1230px)").matches) {
			iwc = <?php echo ($post_layout == 'layout_none_sidebar') ? (($item_width * $responsive_ratio_1024 + 16 < 900) ? $item_width * $responsive_ratio_1024 + 16 : 900) : ((round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 < 590) ? round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 : 590); ?>;
		} else if (window.matchMedia("(min-width: 768px) and (max-width: 1023px)").matches) {
			iwc = <?php echo ($item_width * $responsive_ratio_768 + 16 < 648 ) ? $item_width * $responsive_ratio_768 + 16 : 648; ?>;
		} else if (window.matchMedia("(min-width: 480px) and (max-width: 767px)").matches) {
			iwc = <?php echo ($item_width * $responsive_ratio_480 + 16 < 456) ? $item_width * $responsive_ratio_480 + 16 : 456; ?>;
		} else if (window.matchMedia("(max-width: 479px)").matches) {
			iwc = <?php echo ($item_width + 16 < 280) ? $item_width + 16 : 280; ?>;
		} else {
			iwc = <?php echo ($post_layout == 'layout_none_sidebar') ? (($item_width + 16 < 1050) ? $item_width + 16 : 1050) : ((round( $item_width * $woo_ratio ) + 16 < 690) ? round( $item_width * $woo_ratio ) + 16 : 690); ?>;
		}
		jQuery(window).load(function() {

			computedMC = Math.ceil(jQuery('.cross-sells.wooflexslider').width() / iwc);
			computedWC = Math.floor((jQuery('.cross-sells.wooflexslider').width() - computedMC * 24 + 24) / computedMC);


			jQuery('.cross-sells.wooflexslider').flexslider({
				animation: "slide",
				itemWidth: computedWC,
				itemMargin: 24,
				minItems: 1,
				maxItems: computedMC,
				directionNav: true,
				controlNav: false,
				reverse: false,
				allowOneSlide: false,
				start: function(slider) {
					jQuery('.cross-sells.wooflexslider .thumb_holder').each(function() {
						jQuery(this).height(jQuery(this).find('img').first().height());
						jQuery(this).find('img.product_hover_image').css({'margin-top': -jQuery(this).find('img').first().height()});
					});
					crosssellFlexslider = slider;

					jQuery(window).resize(function() {

						setTimeout(function() {

							if (window.matchMedia("(min-width: 1024px) and (max-width: 1230px)").matches) {
								iwc = <?php echo ($post_layout == 'layout_none_sidebar') ? (($item_width * $responsive_ratio_1024 + 16 < 900) ? $item_width * $responsive_ratio_1024 + 16 : 900) : ((round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 < 590) ? round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 : 590); ?>;
							} else if (window.matchMedia("(min-width: 768px) and (max-width: 1023px)").matches) {
								iwc = <?php echo ($item_width * $responsive_ratio_768 + 16 < 648 ) ? $item_width * $responsive_ratio_768 + 16 : 648; ?>;
							} else if (window.matchMedia("(min-width: 480px) and (max-width: 767px)").matches) {
								iwc = <?php echo ($item_width * $responsive_ratio_480 + 16 < 456) ? $item_width * $responsive_ratio_480 + 16 : 456; ?>;
							} else if (window.matchMedia("(max-width: 479px)").matches) {
								iwc = <?php echo ($item_width + 16 < 280) ? $item_width + 16 : 280; ?>;
							} else {
								iwc = <?php echo ($post_layout == 'layout_none_sidebar') ? (($item_width + 16 < 1050) ? $item_width + 16 : 1050) : ((round( $item_width * $woo_ratio ) + 16 < 690) ? round( $item_width * $woo_ratio ) + 16 : 690); ?>;
							}


							computedMC = Math.ceil(jQuery('.cross-sells.wooflexslider').width() / iwc);
							computedWC = Math.floor((jQuery('.cross-sells.wooflexslider').width() - computedMC * 24 + 24) / computedMC);

							crosssellFlexslider.vars.itemWidth = computedWC;
							crosssellFlexslider.vars.maxItems = computedMC;
							crosssellFlexslider.flexAnimate(0);
							crosssellFlexslider.slides.width(crosssellFlexslider.vars.itemWidth);
							crosssellFlexslider.update(crosssellFlexslider.pagingCount);
							crosssellFlexslider.setProps();

							jQuery('.cross-sells.wooflexslider .thumb_holder').each(function() {
								jQuery(this).height(jQuery(this).find('img').first().height());
								jQuery(this).find('img.product_hover_image').css({'margin-top': -jQuery(this).find('img').first().height()});
							});
						});
					}, 300);
				}

			});

		});



	</script>
	<?php
endif;

wp_reset_query();
