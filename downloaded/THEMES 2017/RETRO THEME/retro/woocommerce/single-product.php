<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<?php
$post_layout = (get_post_meta( get_the_ID(), SHORTNAME . '_post_layout', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_post_layout', true ) : 'layout_' . get_option( SHORTNAME . '_product_layout' ) . '_sidebar';
$post_sidebar = (get_post_meta( get_the_ID(), SHORTNAME . '_post_sidebar', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_post_sidebar', true ) : get_option( SHORTNAME . '_product_sidebar' );
?>
<div class="row content-area clearfix">

		<div class="<?php if ( $post_layout == 'layout_left_sidebar' ) {echo ('for-left-sidebar ');
} echo ($post_layout == 'layout_none_sidebar') ? 'grid_12' : 'grid_8'; ?>">
			<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
			?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php
			/**
			 * woocommerce_after_main_content hook.
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
	<div class="clear"></div>
</div>

<?php get_footer(); ?>
