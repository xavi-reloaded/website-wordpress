<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();


global $wp_query;
$term = $wp_query->get_queried_object();
$pid = wc_get_page_id( 'shop' );
if ( get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true ) ) {
	$post_layout = get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true );
} else {
	if ( get_option( SHORTNAME . '_products_listing_layout' ) ) {
		$post_layout = 'layout_' . get_option( SHORTNAME . '_products_listing_layout' ) . '_sidebar';
	} elseif ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-leftsidebar.php' ) {
		$post_layout = 'layout_left_sidebar';
	} elseif ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-rightsidebar.php' ) {
		$post_layout = 'layout_right_sidebar';
	} else {
		$post_layout = 'layout_none_sidebar';
	}
}

$post_sidebar = (get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_sidebar', true )) ? get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_sidebar', true ) : ((get_option( SHORTNAME . '_products_listing_sidebar' ))?get_option( SHORTNAME . '_products_listing_sidebar' ):get_post_meta( $pid, SHORTNAME . '_page_sidebar', true ));
?>
<div class="row content-area clearfix">

	<div class="<?php if ( $post_layout == 'layout_left_sidebar' ) {echo ('for-left-sidebar ');
} echo ($post_layout == 'layout_none_sidebar') ? 'grid_12' : 'grid_8'; ?>">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php // if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<!--<h1 class="page-title"><?php // woocommerce_page_title(); ?></h1>-->

		<?php // endif; ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	</div>
	<?php if ( $post_layout == 'layout_left_sidebar' ) { ?>
		<aside class="grid_4">
			<div class="left-sidebar">
				<?php $sidebar = ($post_sidebar) ? $post_sidebar : 'default-sidebar';
					generated_dynamic_sidebar_th( $sidebar );
				?>
			</div>
		</aside>
	<?php } ?>
	<?php if ( $post_layout == 'layout_right_sidebar' ) { ?>
		<aside class="grid_4">
			<div class="right-sidebar">
				<?php $sidebar = ($post_sidebar) ? $post_sidebar : 'default-sidebar';
					generated_dynamic_sidebar_th( $sidebar );
				?>
			</div>
		</aside>
	<?php } ?>
</div>
<?php get_footer(); ?>
