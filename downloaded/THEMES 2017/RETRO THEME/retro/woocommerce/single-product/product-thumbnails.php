<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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
 * @version     3.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce, $shop_single_image, $shop_thumbnail_image, $post_layout;

$image_width_original = isset( $shop_single_image['width'] ) ? $shop_single_image['width'] : '100';
$thumb_width_original = isset( $shop_thumbnail_image['width'] ) ? $shop_thumbnail_image['width'] : '100';
$image_width          = ( $post_layout == 'layout_none_sidebar' ) ? $image_width_original + 16 : round( $image_width_original * 0.67 ) + 16;
$thumb_width          = ( $post_layout == 'layout_none_sidebar' ) ? $thumb_width_original : round( $thumb_width_original * 0.9 );
if ( version_compare( WC_VERSION, '3.0.0', '<' ) || ! get_option( SHORTNAME . '_product_gallery_woo_3' ) ) {


	if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
		$attachment_ids = $product->get_gallery_attachment_ids();
	} else {
		$attachment_ids = $product->get_gallery_image_ids();
	}


	if ( $attachment_ids && has_post_thumbnail() ) {

		$loop    = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
		?>
		<div class="thumbnails wooflexslider_thumb">
			<ul class="slides">
				<?php

				foreach ( $attachment_ids as $attachment_id ) {

					$classes = array( 'zoom' );

					if ( $loop === 0 || $loop % $columns === 0 ) {
						$classes[] = 'first';
					}

					if ( ( $loop + 1 ) % $columns === 0 ) {
						$classes[] = 'last';
					}

					$image_link = wp_get_attachment_url( $attachment_id );

					if ( ! $image_link ) {
						continue;
					}

					$image      = theme_post_thumbnail_src( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'retro_shop_thumbnail' ) );
					$image_meta = wp_prepare_attachment_for_js( $attachment_id );
					$image      = '<img src="' . $image[0] . '" width="' . $image[1] . '" height="' . $image[2] . '" class="attachment-retro_shop_thumbnail" alt="' . $image_meta['alt'] . '" />';

					$image_class = esc_attr( implode( ' ', $classes ) );
					$image_title = esc_attr( get_the_title( $attachment_id ) );
					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li><a href="%s" class="%s image_decor" title="%s"  data-rel="prettyPhoto[product-gallery]">%s</a></li>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );

					$loop ++;
				}
				?>
			</ul>


		</div>

		<script>
			var thumbsFlexslider, computedM, computedW;
			jQuery(window).load(function () {

				computedM = Math.ceil(jQuery('.wooflexslider_thumb').width() /<?php echo (int) $thumb_width + 16 ?>);
				computedW = Math.floor((jQuery('.wooflexslider_thumb').width() - computedM * 10 + 10) / computedM);

				jQuery('.wooflexslider_thumb').flexslider({
					animation: "slide",
					itemWidth: computedW,
					itemMargin: 10,
					directionNav: true,
					controlNav: false,
					reverse: false,
					allowOneSlide: false,
					minItems: 1,
					maxItems: computedM,
					start: function (slider) {
						max_items = <?php echo floor( ( $image_width + 26 ) / ( (int) $thumb_width + 16 ) ) ?>;
						items_count = jQuery('.wooflexslider_thumb').find('.slides li').length;

						if (items_count <= max_items) {
							jQuery('.wooflexslider_thumb').find('.flex-direction-nav').remove();
						}

						if (items_count == 1) {
							jQuery('.wooflexslider_thumb .slides li').css({'display': 'inline-block'});
						}
						thumbsFlexslider = slider;


						jQuery(window).resize(function () {


							setTimeout(function () {
								computedM = Math.ceil(jQuery('.wooflexslider_thumb').width() /<?php echo (int) $thumb_width + 16 ?>);
								computedW = Math.floor((jQuery('.wooflexslider_thumb').width() - computedM * 10 + 10) / computedM);

								thumbsFlexslider.vars.maxItems = computedM;
								thumbsFlexslider.vars.itemWidth = computedW;
								thumbsFlexslider.flexAnimate(0);
								thumbsFlexslider.slides.width(thumbsFlexslider.vars.itemWidth);
								thumbsFlexslider.update(thumbsFlexslider.pagingCount);
								thumbsFlexslider.setProps();
							}, 300);

						});


					}
				});
			});


		</script>
		<?php
	}
} else {

	$attachment_ids = $product->get_gallery_image_ids();

	if ( $attachment_ids && has_post_thumbnail() ) {
		foreach ( $attachment_ids as $attachment_id ) {
			$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
			$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
			$image_title     = get_post_field( 'post_excerpt', $attachment_id );

			$attributes = array(
				'title'                   => $image_title,
				'data-src'                => $full_size_image[0],
				'data-large_image'        => $full_size_image[0],
				'data-large_image_width'  => $full_size_image[1],
				'data-large_image_height' => $full_size_image[2],
			);

			$html = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
			$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
			$html .= '</a></div>';

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
		}
	}

}
