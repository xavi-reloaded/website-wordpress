<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_oxwvc_portfolio
 */
$title = $el_class = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$output = '<div class="vc_retro_portfolio wpb_content_element' . esc_attr( $el_class ) . '">';
$type = 'Widget_Portfolio';
$args = array();
global $wp_widget_factory;
// to avoid unwanted warnings let's check before using widget
if ( is_object( $wp_widget_factory ) && isset( $wp_widget_factory->widgets, $wp_widget_factory->widgets[ $type ] ) ) {
	ob_start();
	the_widget( $type, $atts, $args );
	$output .= ob_get_clean();

	$output .= '</div>';

	echo $output;
} else {
	echo $this->debugComment( 'Widget ' . esc_attr( $type ) . 'Not found in : oxwvc_portfolio' );
}
// TODO: make more informative if wp is in debug mode
