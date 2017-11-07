<?php

$list_of_post_types_with_multiple_featured_image = array(
	'product',

);

foreach ( $list_of_post_types_with_multiple_featured_image as $post_type ) {
	new Custom_Thumbnail_Multi(array(
		'label' => 'Hover featured image for product',
		'id' => Custom_Thumbnail_Product::META_ID,
		'post_type' => $post_type,
		)
	);
}


// add select_sidebar rendering function.
add_action( 'cmb_render_select_post_sidebar', 'render_select_post_sidebar', 10, 2 );
add_action( 'cmb_render_select_page_sidebar', 'render_select_page_sidebar', 10, 2 );

/**
 * Render select_post_sidebar element
 *
 * @param array  $field [name, desc, id ...]
 * @param string $current_meta_value current element value
 */
function render_select_post_sidebar( $field, $current_meta_value ) {
	$options = getSidebarsList( 'global' );
	render_select_sidebar( $field, $current_meta_value, $options );
}

/**
 * Render select_page_sidebar element
 *
 * @param array  $field [name, desc, id ...]
 * @param string $current_meta_value current element value
 */
function render_select_page_sidebar( $field, $current_meta_value ) {
	$options = getSidebarsList();
	render_select_sidebar( $field, $current_meta_value, $options );
}
/**
 * Render select_sidebar element
 *
 * @param array  $field [name, desc, id ...]
 * @param string $current_meta_value current element value
 */
function render_select_sidebar( $field, $current_meta_value, $sidebars ) {
	if ( is_array( $sidebars ) && ! empty( $sidebars ) ) {
		$html = '<select name=' . $field['id'] . ' id=' . $field['id'] . '>';
		foreach ( $sidebars as $sidebar ) {
			if ( $current_meta_value == $sidebar['value'] ) {
				$html .= '<option value=' . $sidebar['value'] . " selected='selected'>" . $sidebar['name'] . "</option>\n";
			} else {
				 $html .= '<option value=' . $sidebar['value'] . ' >' . $sidebar['name'] . "</option>\n";
			}
		}
	}
	echo $html;
}

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );


function getSidebarsList( $first = 'Default' ) {

	$sidebar_list = array();
	$sidebar_list[] = array( 'name' => 'Use ' . $first . ' sidebar', 'value' => '""' );
	$sidebars = Sidebar_TIGenerator::get_sidebars( 'Default' !== $first );
	if ( is_array( $sidebars ) && ! empty( $sidebars ) ) {
		foreach ( $sidebars as $class => $name ) {
			$sidebar_list[] = array( 'name' => $name, 'value' => $class );
		}
	}
	return $sidebar_list;
}

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	$meta_boxes[] = array(
		'id'         => 'page_sidebar',
		'title'      => 'Custom sidebar',
		'pages'      => array( 'page' ), // Page type
		'context'    => 'side',
		'priority'   => 'low',
		'show_names' => false, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Sidebar',
				'desc'    => 'Sidebar to display',
				'id'      => SHORTNAME . '_page_sidebar',
				'type'    => 'select_page_sidebar',
			),
		),
	);

	$meta_boxes[] = array(
		'id'       => 'portfolio-gallery-slider',
		'title'    => __( 'Portfolio Slider', 'retro' ),
		'pages'    => array( Custom_Posts_Type_Portfolio::POST_TYPE ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(

			array(
				'name' => __( 'The Slides', 'retro' ),
				'id'   => SHORTNAME . '_project_slider',
				'type' => 'portfolio',
				'std'  => '',
				'desc' => __( 'Add slides for portfolio slider', 'retro' ),
				),
			),
	);

	$meta_boxes[] = array(
		'id'         => 'portfolio_additional',
		'title'      => 'Portfolio additional side content',
		'pages'      => array( Custom_Posts_Type_Portfolio::POST_TYPE ), // Page type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => false, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Title additional text',
				'desc'    => 'Extra text on right side of title. HTML markup supported.',
				'id'      => SHORTNAME . '_portfolio_additional',
				'type'    => 'wysiwyg',
			),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'testimonial_box',
		'title'      => 'Testimonial Options',
		'pages'      => array( Custom_Posts_Type_Testimonial::POST_TYPE ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Author',
				'desc' => 'Testimonial Author',
				'id'   => SHORTNAME . '_testimonial_author',
				'type' => 'text',
			),
			array(
				'name' => 'Position',
				'desc' => 'Testimonial Author Job',
				'id'   => SHORTNAME . '_testimonial_author_job',
				'type' => 'text',
			),

		),
	);

	// Custom page lightBox
	$meta_boxes[] = array(
		'id'         => 'light_box',
		'title'      => 'Lightbox Options for preview',
		'pages'      => array( Custom_Posts_Type_Portfolio::POST_TYPE ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Use lightbox',
				'desc' => 'Use LightBox for preview thumbnail',
				'id'   => SHORTNAME . '_use_lightbox',
				'type' => 'checkbox',
			),
			array(
				'name' => 'URL',
				'desc' => 'Custom URL LightBox',
				'id'   => SHORTNAME . '_url_lightbox',
				'type' => 'text',
			),

		),
	);

	// Custom page Portfolio Option
	$meta_boxes[] = array(
		'id'         => 'portfolio_option',
		'title'      => ' Portfolio Options',
		'pages'      => array( Custom_Posts_Type_Portfolio::POST_TYPE ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Live URL',
				'desc' => ' URL for launch project button on portfolio post',
				'id'   => SHORTNAME . '_portfolio_url',
				'type' => 'text',
			),
			array(
				'name' => 'Live URL button text',
				'desc' => 'Text for "launch project" button on portfolio post',
				'id'   => SHORTNAME . '_portfolio_url_button',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Open link in new window',
				'desc' => 'Live URL  _blank ',
				'id'   => SHORTNAME . '_portfolio_target',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Hide more',
				'desc' => ' Hide more button from preview',
				'id'   => SHORTNAME . '_portfolio_hide_more',
				'type' => 'checkbox',
			),
			array(
				'name' => 'More button text',
				'desc' => 'Custom text for more button for Big portfolio layout',
				'id'   => SHORTNAME . '_portfolio_more_text',
				'type' => 'text',
			),
			array(
				'name' => 'Show featured image inside portfolio post',
				'desc' => '',
				'id'   => SHORTNAME . '_portfolio_show_feature',
				'type' => 'checkbox',
			),

		),
	);

	$meta_boxes[] = array(
		'id'         => 'portfolio_layout_type',
		'title'      => 'Layout Type',
		'pages'      => array( Custom_Posts_Type_Portfolio::POST_TYPE ), // Post type
		'context'    => 'side',
		'priority'   => 'low',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Layout',
				'desc'    => '',
				'id'      => SHORTNAME . '_post_layout',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Use global', 'value' => '' ),
					array( 'name' => 'Full width', 'value' => 'layout_none_sidebar' ),
					array( 'name' => 'Left sidebar', 'value' => 'layout_left_sidebar' ),
					array( 'name' => 'Right sidebar', 'value' => 'layout_right_sidebar' ),
				),
			),

		),
	);

	$meta_boxes[] = array(
		'id'         => 'layout_type',
		'title'      => 'Layout Type',
		'pages'      => array( 'post', Custom_Posts_Type_Testimonial::POST_TYPE,'product' ), // Post type
		'context'    => 'side',
		'priority'   => 'low',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Layout',
				'desc'    => '',
				'id'      => SHORTNAME . '_post_layout',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Use global', 'value' => '' ),
					array( 'name' => 'Full width', 'value' => 'layout_none_sidebar' ),
					array( 'name' => 'Left sidebar', 'value' => 'layout_left_sidebar' ),
					array( 'name' => 'Right sidebar', 'value' => 'layout_right_sidebar' ),
				),
			),
			array(
				'name'    => 'Sidebar',
				'desc'    => 'Sidebar to display',
				'id'      => SHORTNAME . '_post_sidebar',
				'type'    => 'select_post_sidebar',
			),

		),
	);

	$sliderOptions = array();

	if ( class_exists( 'UniteBaseClassRev' ) ) {
		$slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		foreach ( $arrSliders as $slider ) {
			$sliderOptions[] = array( 'name' => $slider->getTitle(), 'value' => $slider->getAlias() );
		}
	}
	$meta_boxes[] = array(
		'id'         => 'sldieshow_options',
		'title'      => 'Slideshow options',
		'pages'      => array(
	'page',
	'post',
	Custom_Posts_Type_Portfolio::POST_TYPE,
								Custom_Posts_Type_Testimonial::POST_TYPE,
	'product',
		), 		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Slideshow',
				'desc'    => 'Select a slideshow type for current page',
				'id'      => SHORTNAME . '_post_slider',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Use global', 'value' => '' ),
					array( 'name' => 'revSlider', 'value' => 'revSlider' ),
					array( 'name' => 'Disable', 'value' => 'Disable' ),
				),
			),
			array(
				'name'    => 'Choose slider',
				'desc'    => 'Choose slider',
				'id'      => SHORTNAME . '_post_revslider_alias',
				'type'    => 'select',
				'options' => $sliderOptions,
			),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'content_wysiwyg',
		'title'      => 'Additional bottom content',
		'pages'      => array( 'post', 'page', Custom_Posts_Type_Portfolio::POST_TYPE ), // Page type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => false, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Additional bottom content',
				'desc'    => 'Add content for bottom page content.',
				'id'      => SHORTNAME . '_content_wysiwyg',
				'type'    => 'wysiwyg',
			),
		),
	);

	// Add other metaboxes as needed
	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) ) {
		require_once 'init.php'; }

}
