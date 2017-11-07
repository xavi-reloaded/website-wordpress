<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! function_exists( 'ox_retro_integrateWithVCWidget' ) ) {

	function ox_retro_integrateWithVCWidget() {

		class WPBakeryShortCode_oxwvc_contact_form extends WPBakeryShortCode {

		}

		class WPBakeryShortCode_oxwvc_feedburner_email extends WPBakeryShortCode {

		}

		class WPBakeryShortCode_oxwvc_flickr extends WPBakeryShortCode {

		}

		class WPBakeryShortCode_oxwvc_mail_chimp extends WPBakeryShortCode {

		}

		class WPBakeryShortCode_oxwvc_popular_posts extends WPBakeryShortCode {

		}

		class WPBakeryShortCode_oxwvc_portfolio extends WPBakeryShortCode {

		}

		class WPBakeryShortCode_oxwvc_recent_posts extends WPBakeryShortCode {

		}

		class WPBakeryShortCode_oxwvc_testimonial extends WPBakeryShortCode {

		}

		class WPBakeryShortCode_oxwvc_twitter extends WPBakeryShortCode {

		}

		vc_map( array(
			'base'     => 'oxwvc_contact_form',
			'name'     => __( 'Retro Contact form', 'retro' ),
			'category' => __( 'WordPress Widgets', 'js_composer' ),
			'class'    => 'wpb_vc_wp_widget',
			'icon'     => '',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Widget title', 'js_composer' ),
					'param_name'  => 'title',
					'std'         => __( 'Contact us', 'retro' ),
					'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Recipient email', 'retro' ),
					'param_name'  => 'recipient',
					'std'         => '',
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
				),
			),
		) );

		vc_map( array(
			'base'     => 'oxwvc_feedburner_email',
			'name'     => __( 'Retro FeedburnerEmail form', 'retro' ),
			'category' => __( 'WordPress Widgets', 'js_composer' ),
			'class'    => 'wpb_vc_wp_widget',
			'icon'     => '',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Widget title', 'js_composer' ),
					'param_name'  => 'title',
					'std'         => __( 'Sign up for our Newsletter', 'retro' ),
					'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Description', 'retro' ),
					'param_name'  => 'description',
					'std'         => __( 'Keep up with the latest news and events.', 'retro' ),
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Write only feedburner name', 'retro' ),
					'param_name'  => 'feedname',
					'std'         => 'olegnax',
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
				),
			),
		) );

		vc_map( array(
			'base'     => 'oxwvc_flickr',
			'name'     => __( 'Retro Flickr', 'retro' ),
			'category' => __( 'WordPress Widgets', 'js_composer' ),
			'class'    => 'wpb_vc_wp_widget',
			'icon'     => '',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Widget title', 'js_composer' ),
					'param_name'  => 'title',
					'std'         => __( 'Flickr', 'retro' ),
					'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Number of photos', 'retro' ),
					'param_name'  => 'number',
					'std'         => 4,
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Flickr ID', 'retro' ),
					'param_name'  => 'user',
					'std'         => '',
					'description' => '<a href="http://www.idgettr.com" target="_blank">idGettr</a>',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
				),
			),
		) );

		vc_map( array(
			'base'     => 'oxwvc_popular_posts',
			'name'     => __( 'Retro Popular posts', 'retro' ),
			'category' => __( 'WordPress Widgets', 'js_composer' ),
			'class'    => 'wpb_vc_wp_widget',
			'icon'     => '',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Widget title', 'js_composer' ),
					'param_name'  => 'title',
					'std'         => __( 'Popular posts', 'retro' ),
					'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Show post thumbnail', 'retro' ),
					'param_name'  => 'show_image',
					'value'       => 'on',
					'std'         => 'on',
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Number of photos', 'retro' ),
					'param_name'  => 'number',
					'std'         => 5,
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
				),
			),
		) );

		$category_array = array();
		if ( class_exists( 'Custom_Posts_Type_Portfolio' ) ) {
			$portfolio_terms = get_terms( Custom_Posts_Type_Portfolio::TAXONOMY );
			if ( $portfolio_terms ) {
				foreach ( $portfolio_terms as $cat ) {
					$category_array[ $cat->name ] = $cat->slug;
				}
			}
		}
		vc_map( array(
			'base'     => 'oxwvc_portfolio',
			'name'     => __( 'Retro From Portfolio', 'retro' ),
			'category' => __( 'WordPress Widgets', 'js_composer' ),
			'class'    => 'wpb_vc_wp_widget',
			'icon'     => '',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Widget title', 'js_composer' ),
					'param_name'  => 'title',
					'std'         => __( 'From portfolio', 'retro' ),
					'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Category of portfolio', 'retro' ),
					'param_name'  => 'category',
					'value'       => $category_array,
					'admin_label' => true,
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Number of items to show', 'retro' ),
					'param_name'  => 'number',
					'std'         => 5,
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
				),
			),
		) );

		vc_map( array(
			'base'     => 'oxwvc_recent_posts',
			'name'     => __( 'Retro Recent posts', 'retro' ),
			'category' => __( 'WordPress Widgets', 'js_composer' ),
			'class'    => 'wpb_vc_wp_widget',
			'icon'     => '',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Widget title', 'js_composer' ),
					'param_name'  => 'title',
					'std'         => __( 'Recent posts', 'retro' ),
					'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Show post thumbnail', 'retro' ),
					'param_name'  => 'show_image',
					'value'       => 'on',
					'std'         => true,
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Number of photos', 'retro' ),
					'param_name'  => 'number',
					'std'         => 5,
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
				),
			),
		) );


		$category_array = array(
			__( 'All', 'retro' ) => 'all',
		);
		if ( class_exists( 'Custom_Posts_Type_Testimonial' ) ) {
			$testimonial_category = get_terms( Custom_Posts_Type_Testimonial::TAXONOMY );
			if ( $testimonial_category ) {
				foreach ( $testimonial_category as $cat ) {
					$category_array[ $cat->name ] = $cat->slug;
				}
			}
		}
		vc_map( array(
			'base'     => 'oxwvc_testimonial',
			'name'     => __( 'Retro Testimonials', 'retro' ),
			'category' => __( 'WordPress Widgets', 'js_composer' ),
			'class'    => 'wpb_vc_wp_widget',
			'icon'     => '',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Widget title', 'js_composer' ),
					'param_name'  => 'title',
					'std'         => __( 'Testimonials', 'retro' ),
					'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Category of testimonials', 'retro' ),
					'param_name'  => 'category',
					'std'         => 'all',
					'value'       => $category_array,
					'admin_label' => true,
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Number of second to show', 'retro' ),
					'param_name'  => 'time',
					'std'         => 10,
					'description' => '',
				),
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Randomize testimonial', 'retro' ),
					'param_name'  => 'randomize',
					'value'       => 'on',
					'description' => '',
					'save_always' => true,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Transition effect', 'retro' ),
					'param_name'  => 'effect',
					'std'         => 'fade',
					'value'       => array(
						__( 'Fade', 'retro' )              => 'fade',
						__( 'Fade Out', 'retro' )          => 'fadeout',
						__( 'Scroll Horizontal', 'retro' ) => 'scrollHorz',
						__( 'None', 'retro' )              => 'none',
					),
					'description' => '',
					'save_always' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
				),
			),
		) );

		vc_map( array(
			'base'     => 'oxwvc_twitter',
			'name'     => __( 'Retro Twitter', 'retro' ),
			'category' => __( 'WordPress Widgets', 'js_composer' ),
			'class'    => 'wpb_vc_wp_widget',
			'icon'     => '',
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Widget title', 'js_composer' ),
					'param_name'  => 'title',
					'std'         => __( 'Twitter', 'retro' ),
					'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Twitter username', 'retro' ),
					'param_name'  => 'username',
					'std'         => 'olegnax',
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Number of tweets', 'retro' ),
					'param_name'  => 'num',
					'std'         => 1,
					'description' => '',
				),
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Show date posted', 'retro' ),
					'param_name'  => 'update',
					'value'       => 'on',
					'description' => '',
					'save_always' => true,
				),
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Discover hyperlinks', 'retro' ),
					'param_name'  => 'hyperlinks',
					'value'       => 'on',
					'description' => '',
					'save_always' => true,
				),
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Discover @replies', 'retro' ),
					'param_name'  => 'twitter_users',
					'value'       => 'on',
					'description' => '',
					'save_always' => true,
				),
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'UTF8 Encode', 'retro' ),
					'param_name'  => 'encode_utf8',
					'value'       => 'on',
					'description' => '',
					'save_always' => true,
				),
				array(
					'type'        => 'checkbox',
					'heading'     => __( 'Open in new tab', 'retro' ),
					'param_name'  => 'target_blank',
					'value'       => 'on',
					'description' => '',
					'save_always' => true,
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
				),
			),
		) );
	}

	add_action( 'vc_before_init', 'ox_retro_integrateWithVCWidget' );
}
