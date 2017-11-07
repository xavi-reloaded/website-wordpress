<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 *
 * @todo add $icon_... defaults
 * @todo add $icon_typicons and etc
 *
 * @var $atts
 * @var $el_class
 * @var $message_box_style
 * @var $style
 * @var $color
 * @var $message_box_color
 * @var $css_animation
 * @var $icon_type
 * @var $icon_fontawesome
 * @var $content - shortcode content
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Message
 */
if ('retro' !== @$atts['message_box_style']) {
	$default_dir = vc_manager()->getDefaultShortcodesTemplatesDir() . '/';
	if ( is_file( $default_dir . $this->getFileName() . '.php' ) ) {
		include $this->setTemplate( $default_dir . $this->getFileName() . '.php' );
	}
} else {
$el_class = $message_box_color = $message_box_style = $style = $css = $color = $css_animation = $icon_type = '';
$icon_fontawesome = $icon_linecons = $icon_openiconic = $icon_typicons = $icon_entypo = '';


$atts = $this->convertAttributesToMessageBox2( $atts );
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$elementClass = array(
	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_message_box', $this->settings['base'], $atts ),
	'style' => 'vc_message_box-' . $message_box_style,
	'type' => 'vc_type-' . $type,
);

$class_to_filter = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

?>
<div class="<?php echo esc_attr( $css_class ); ?>"><?php echo wpb_js_remove_wpautop( $content, true ); ?></div>
<?php
}