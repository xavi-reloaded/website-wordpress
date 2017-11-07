<?php
global $post;
$pid = (isset( $post->ID )) ? $post->ID : null;

if ( is_home() ) {
	$pid = get_option( 'page_for_posts' );
}
	global $wp_query;
	$current_term = $wp_query->get_queried_object();

// PREVIEW
if ( get_option( SHORTNAME . '_preview' ) && session_id() ) {
	$sliderAlias = get_skin_option( SHORTNAME . Admin_Theme_Item_Slideshow::REVSLIDER, false );
} // taxonomy page
elseif ( (is_tax() || is_tag() || is_category()) && $current_term && get_tax_meta( $current_term->term_id, SHORTNAME . '_tax_slider', true ) ) {
	$sliderAlias = get_tax_meta( $current_term->term_id, SHORTNAME . '_tax_revslider_alias', true );
} // post page
elseif ( ! is_tax() && ! is_tag() && ! is_category() && get_post_meta( $pid, SHORTNAME . '_post_slider', true ) ) {
	$sliderAlias = get_post_meta( $pid, SHORTNAME . '_post_revslider_alias', true );
} elseif ( is_home() && ! get_option( 'page_on_front' ) ) {
	$sliderAlias = get_option( SHORTNAME . '_blog_slider' );
} else {
	$sliderAlias = get_option( SHORTNAME . Admin_Theme_Item_Slideshow::REVSLIDER );
}
echo ($sliderAlias != '') ? do_shortcode( "[rev_slider $sliderAlias]" ) : '';
?>
