<?php
/**
 * Description tab
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $post;

$heading = apply_filters( 'woocommerce_product_description_heading', _x('Product Description', 'woocommerce', 'flipmag') );
?>

<h2><?php echo esc_html($heading); ?></h2>

<div class="post-content"><?php the_content(); ?></div>