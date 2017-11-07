<?php

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */

function wealth_register_meta_boxes( $meta_boxes ) {



	$prefix = '_cmb_';

	// Post format

	$meta_boxes[] = array(

		'id'       => 'format_detail',

		'title'    => esc_html__( 'Format Details', 'wealth' ),

		'pages'    => array( 'post' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(

			array(

				'name'             => esc_html__( 'Image', 'wealth' ),

				'id'               => $prefix . 'image',

				'type'             => 'image_advanced',

				'class'            => 'image',

				'max_file_uploads' => 1,

			),

			array(

				'name'  => esc_html__( 'Gallery', 'wealth' ),

				'id'    => $prefix . 'images',

				'type'  => 'image_advanced',

				'class' => 'gallery',

			),

			array(

				'name'  => esc_html__( 'Quote', 'wealth' ),

				'id'    => $prefix . 'quote',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'quote',

			),

			array(

				'name'  => esc_html__( 'Author', 'wealth' ),

				'id'    => $prefix . 'quote_author',

				'type'  => 'text',

				'class' => 'quote',

			),

			array(

				'name'  => esc_html__( 'Audio', 'wealth' ),

				'id'    => $prefix . 'link_audio',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'audio',

				'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',

			),

			array(

				'name'  => esc_html__( 'Video', 'wealth' ),

				'id'    => $prefix . 'link_video',

				'type'  => 'textarea',

				'cols'  => 20,

				'rows'  => 2,

				'class' => 'video',

				'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',

			),			

		),

	);



	$meta_boxes[] = array(

		'id'       => 'link_holiday',

		'title'    => esc_html__( 'Link', 'wealth' ),

		'pages'    => array( 'holiday' ),

		'context'  => 'normal',

		'priority' => 'high',

		'autosave' => true,

		'fields'   => array(	
			array(
				'name'             => esc_html__( 'Link Of Holiday', 'wealth' ),
				'id'               => $prefix . 'link_package',
				'type'             => 'text',			
				'max_file_uploads' => 1,
			),			
		),

	);
	$meta_boxes[] = array(

		'id'         => 'job_testimonial',

		'title'      => 'Testimonials Info',

		'pages'      => array( 'testimonial' ), // Post type

		'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox

		'fields' => array(

			array(

                'name' => 'Job',

                'desc' => 'Job of Person',

                'id'   => $prefix . 'job_testi',

                'type' => 'text',

            ),
            array(

                'name' => 'Address',

                'desc' => 'Address of Person',

                'id'   => $prefix . 'address_testi',

                'type' => 'text',

            ),

		)

	);
	$meta_boxes[] = array(

		'id'         => 'price',

		'title'      => 'Price Portfolio',

		'pages'      => array( 'portfolio' ), // Post type

		'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox

		'fields' => array(

			array(

                'name' => 'Price',

                'desc' => 'Price of product',

                'id'   => $prefix . 'price_portfolio',

                'type' => 'text',

            ),

		)

	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wealth_register_meta_boxes' );

/**
 * Enqueue scripts for admin
 *
 * @since  1.0
 */
function wealth_admin_enqueue_scripts( $hook ) {
	// Detect to load un-minify scripts when WP_DEBUG is enable
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_script( 'wealth-backend-js', get_template_directory_uri()."/js/admin.js", array( 'jquery' ), '1.0.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'wealth_admin_enqueue_scripts' );

