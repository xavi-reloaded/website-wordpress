<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version 3.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $woocommerce, $product, $shop_single_image, $post_layout;
$image_width = isset( $shop_single_image['width'] ) ? $shop_single_image['width'] : '480';

if ( version_compare( WC_VERSION, '3.0.0', '<' ) || ! get_option( SHORTNAME . '_product_gallery_woo_3' ) ) {
	?>
	<div class="images"
	     style="width:<?php echo ( $post_layout == 'layout_none_sidebar' ) ? $image_width + 16 : round( $image_width * 0.67 ) + 16 ?>px">

		<?php
		if ( has_post_thumbnail() ) {

			$image_title   = esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );

			$image      = theme_post_thumbnail_src( get_post_thumbnail_id( $post->ID ), apply_filters( 'single_product_large_thumbnail_size', 'retro_shop_single' ) );
			$image_meta = wp_prepare_attachment_for_js( get_post_thumbnail_id( $post->ID ) );
			$image      = '<img src="' . $image[0] . '" width="' . $image[1] . '" height="' . $image[2] . '" class="attachment-retro_shop_single" alt="' . $image_meta['alt'] . '" />';

			if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
				$attachment_count = count( $product->get_gallery_attachment_ids() );
			} else {
				$attachment_count = count( $product->get_gallery_image_ids() );
			}


			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom image_decor" title="%s"  data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
		?>

		<?php do_action( 'woocommerce_product_thumbnails' ); ?>

	</div>
<?php } else {

	global $post, $product;
	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	?>
	<div class="images <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>"
	     data-columns="<?php echo esc_attr( $columns ); ?>"
	     style="opacity: 0; transition: opacity .25s ease-in-out;width:<?php echo ( $post_layout == 'layout_none_sidebar' ) ? $image_width + 16 : round( $image_width * 0.67 ) + 16 ?>px;position:relative;">
		<figure class="woocommerce-product-gallery__wrapper ">
			<?php
			$attributes = array(
				'title'                   => $image_title,
				'data-src'                => $full_size_image[0],
				'data-large_image'        => $full_size_image[0],
				'data-large_image_width'  => $full_size_image[1],
				'data-large_image_height' => $full_size_image[2],
			);

			if ( has_post_thumbnail() ) {
				$html = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
				$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
				$html .= '</a></div>';
			} else {
				$html = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image attachment-retro_shop_single" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
				$html .= '</div>';
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

			do_action( 'woocommerce_product_thumbnails' );
			?>
		</figure>
	</div>
<?php }
