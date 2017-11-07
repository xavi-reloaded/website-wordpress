<?php

if ( ! class_exists( 'WPBakeryShortCode' ) ) {
	return false;
}

vc_add_shortcode_param( 'multiselect', 'ox_multiselect_param_field' );

if ( ! function_exists( 'ox_multiselect_param_field' ) ) {
	function ox_multiselect_param_field( $settings, $value ) {
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$type       = isset( $settings['type'] ) ? $settings['type'] : '';
		$options    = isset( $settings['options'] ) ? $settings['options'] : '';
		$output     = '';
		$uniqeID    = uniqid();

		$output .= '<select multiple="multiple" name="' . $param_name . '" id="multiselect-' . $uniqeID . '" style="width:100%" class="wpb-multiselect wpb_vc_param_value ' . $param_name . ' ' . $type . '">';
		if ( is_array( $options ) && ! empty( $options ) ) {
			foreach ( $options as $key => $option ) {
				$selected = '';
				if ( in_array( $key, explode( ',', $value ) ) ) {
					$selected = ' selected="selected"';
				}
				$output .= '<option value="' . $key . '"' . $selected . '>' . $option . '</option>';
			}
		}
		$output .= '</select>';

//		$output .= '<script type="text/javascript">jQuery("#multiselect-' . $uniqeID . '").select2({placeholder: "Select Options"});</script>';

		return $output;
	}
}

if ( ! function_exists( 'ox_retro_dropdown_categories' ) ) {

	function ox_retro_dropdown_categories( $args = '' ) {
		$output = wp_dropdown_categories( $args );
		preg_match_all( '|<option[^<>]*value="([^<>\"]+)"[^<>]*>(.*?)</option>|', $output, $output, PREG_SET_ORDER );
		$_output = array();
		if ( ! empty( $output ) ) {
			foreach ( $output as $value ) {
				if ( array_key_exists( 1, $value ) && array_key_exists( 2, $value ) ) {
					$value[2]             = str_replace( '&nbsp;&nbsp;&nbsp;', '- ', $value[2] );
					$value[2]             = str_replace( '&nbsp;&nbsp;', ' ', $value[2] );
					$_output[ $value[2] ] = $value[1];
				}
			}
		}

		return $_output;
	}

}

if ( ! function_exists( 'ox_retro_integrateWithVC' ) ) {

	function ox_retro_integrateWithVC() {
		if ( function_exists( 'ox_testimonial' ) ) {
			$category_array = array(
				__( 'All', 'retro' ) => 'all',
			);
			$cats           = get_terms( array( 'taxonomy' => Custom_Posts_Type_Testimonial::TAXONOMY ) );
			foreach ( $cats as $cat ) {
				$category_array[ $cat->name ] = $cat->slug;
			}
			vc_map( array(
				'name'              => __( 'Testimonials', 'retro' ),
				'base'              => 'testimonials',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'front_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Testimonial Category', 'retro' ),
						'param_name'  => 'category',
						'value'       => $category_array,
						'admin_label' => true,
						'description' => __( 'Choose testimonial category.', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Number of second to show', 'retro' ),
						'param_name'  => 'time',
						'class'       => 'retro-vc-number',
						'value'       => 10,
						'description' => __( 'Second', 'retro' ),
					),
					array(
						'type'       => 'checkbox',
						'heading'    => __( 'Randomize testimonial', 'retro' ),
						'param_name' => 'randomize',
						'value'      => 'true',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Transition effect', 'retro' ),
						'param_name'  => 'effect',
						'value'       => array(
							__( 'Fade', 'retro' )              => 'fade',
							__( 'Fade Out', 'retro' )          => 'fadeout',
							__( 'Scroll Horizontal', 'retro' ) => 'scrollHorz',
							__( 'None', 'retro' )              => 'none',
						),
						'description' => __( 'Choose effect', 'retro' ),
					),
				),
			) );
		}
		if ( function_exists( 'ox_slogan' ) ) {
			vc_map( array(
				'name'              => __( 'Slogan', 'retro' ),
				'base'              => 'slogan',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'textfield',
						'heading'     => __( 'H1 title', 'retro' ),
						'param_name'  => 'h1',
						'value'       => '',
						'description' => __( 'Type your top title here', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'H3 title', 'retro' ),
						'param_name'  => 'h3',
						'value'       => '',
						'description' => __( 'Type your second title here', 'retro' ),
					),
					array(
						'type'        => 'textarea_html',
						'heading'     => __( 'Description', 'retro' ),
						'param_name'  => 'content',
						'value'       => '',
						'description' => __( 'Type your description', 'retro' ),
					),
				),
			) );
		}
		if ( function_exists( 'blog_shortcode' ) ) {
			$category_array = array(
				'' => __( 'All', 'retro' ),
			);
			$cats           = get_terms( array( 'taxonomy' => 'category' ) );
			foreach ( $cats as $cat ) {
				$category_array[ $cat->term_id ] = $cat->name;
			}
			vc_map( array(
				'name'              => __( 'Blog', 'retro' ),
				'base'              => 'blog',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'multiselect',
						'heading'     => __( 'Category of blog', 'retro' ),
						'param_name'  => 'category',
						'options'     => $category_array,
						'admin_label' => true,
						'description' => __( 'Choose a category', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Show per page', 'retro' ),
						'param_name'  => 'perpage',
						'class'       => 'retro-vc-number',
						'value'       => 1,
						'description' => __( 'Number to show', 'retro' ),
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Pagination', 'retro' ),
						'param_name'  => 'pagination',
						'value'       => 'true',
						'description' => __( 'Check if you want show pagination', 'retro' ),
					),
				),
			) );
		}
		$category_array = ox_retro_dropdown_categories( 'name=taxonomy_terms&echo=0&id=taxonomy_terms&show_count=1&hierarchical=1&taxonomy=' . Custom_Posts_Type_Portfolio::TAXONOMY );
		if ( function_exists( 'portfolio_shortcode' ) ) {
			vc_map( array(
				'name'              => __( 'Portfolio', 'retro' ),
				'base'              => 'terms_portfolio',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Taxonomy terms', 'retro' ),
						'param_name'  => 'terms',
						'value'       => $category_array,
						'description' => __( 'Choose a taxonomy terms', 'retro' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Filterable portfolios', 'retro' ),
						'param_name'  => 'isotope',
						'value'       => 'true',
						'value'       => array(
							__( 'Filterable', 'retro' ) => 'on',
							__( 'Pagination', 'retro' ) => 'off',
						),
						'description' => __( 'Choose if you want use filterable portfolios or with pagination', 'retro' ),
						'on',
						'save_always' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Show per page', 'retro' ),
						'param_name'  => 'perpage',
						'class'       => 'retro-vc-number',
						'value'       => 1,
						'description' => __( 'Number to show', 'retro' ),
						'dependency'  => array(
							'element'            => 'isotope',
							'value_not_equal_to' => 'on',
						),
						'save_always' => true,
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Show Pagination', 'retro' ),
						'param_name'  => 'pagination',
						'value'       => array(
							__( 'Yes', 'js_composer' ) => 'on',
						),
						'std'         => 'on',
						'description' => __( 'Check to show pagenation', 'retro' ),
						'dependency'  => array(
							'element'            => 'isotope',
							'value_not_equal_to' => 'on',
						),
						'save_always' => true,
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Layout Type', 'retro' ),
						'param_name'  => 'layout',
						'value'       => array(
							__( 'Big', 'retro' )    => '',
							__( 'Medium', 'retro' ) => 'medium',
							__( 'Small', 'retro' )  => 'small',
						),
						'description' => __( 'Choose a layout type', 'retro' ),
					),
				),
			) );
		}
		if ( function_exists( 'portfolio_carousel_shortcode' ) ) {
			vc_map( array(
				'name'              => __( 'Portfolio Carousel', 'retro' ),
				'base'              => 'portfolio_carousel',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Title', 'retro' ),
						'param_name'  => 'title',
						'value'       => '',
						'description' => __( 'Choose custom title', 'retro' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Taxonomy terms', 'retro' ),
						'param_name'  => 'terms',
						'value'       => $category_array,
						'description' => __( 'Choose a taxonomy terms', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Show', 'retro' ),
						'param_name'  => 'number',
						'class'       => 'retro-vc-number',
						'value'       => '',
						'description' => __( 'Number to show', 'retro' ),
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Autoplay', 'retro' ),
						'param_name'  => 'autoplay',
						'value'       => 'true',
						'description' => __( 'Check to enable autoplay', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Autoplay timeout', 'retro' ),
						'param_name'  => 'timeout',
						'class'       => 'retro-vc-number',
						'value'       => 4000,
						'description' => __( 'Choose autoplay timeout(millisecond)', 'retro' ),
					),
				),
			) );
		}
		if ( function_exists( 'ox_teaser' ) ) {
			$posts_array = array(
				'' => '',
			);
			$posts       = get_posts( array(
				'post_type'        => array( 'page', 'post', Custom_Posts_Type_Portfolio::POST_TYPE ),
				'post_status'      => 'publish',
				'numberposts'      => - 1,
				'suppress_filters' => '0',
			) );
			foreach ( $posts as $post ) {
				$posts_array[ $post->post_title ] = $post->ID;
			}
			vc_map( array(
				'name'              => __( 'Teaser', 'retro' ),
				'base'              => 'teaser',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Choose a template', 'retro' ),
						'param_name'  => 'post',
						'value'       => $posts_array,
						'description' => __( 'Post, Page, Gallery', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Image src', 'retro' ),
						'param_name'  => 'src',
						'value'       => '',
						'description' => __( 'Type your image here', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Title', 'retro' ),
						'param_name'  => 'title',
						'value'       => get_bloginfo( 'name' ),
						'admin_label' => true,
						'description' => __( 'Type your teaser title', 'retro' ),
					),
					array(
						'type'        => 'textarea',
						'heading'     => __( 'Content', 'retro' ),
						'param_name'  => 'excerpt',
						'value'       => '',
						'description' => __( 'Type your teaser content', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Button title', 'retro' ),
						'param_name'  => 'content',
						'value'       => __( 'learn more...', 'retro' ),
						'description' => __( 'Type your button title here', 'retro' ),
					),
					array(
						'type'        => 'vc_link',
						'heading'     => __( 'URL for button', 'retro' ),
						'param_name'  => 'vcurl',
						'value'       => '',
						'description' => __( 'Type your button URL here. Check if you want open in new window.', 'retro' ),
					),
				),
			) );
		}
		if ( function_exists( 'ox_social_button' ) ) {
			vc_map( array(
				'name'              => __( 'Share Button', 'retro' ),
				'base'              => 'social_button',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Button', 'retro' ),
						'param_name'  => 'button',
						'value'       => array(
							__( 'Google++', 'retro' )  => 'google',
							__( 'Twitter', 'retro' )   => 'twitter',
							__( 'Facebook', 'retro' )  => 'facebook',
							__( 'Pinterest', 'retro' ) => 'pinterest',
						),
						'save_always' => true,
						'admin_label' => true,
						'description' => __( 'Description!!!', 'retro' ),
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Share url: page URL', 'js_composer' ),
						'param_name'  => 'share_use_page_url',
						'value'       => array(
							__( 'Yes', 'js_composer' ) => 'yes',
						),
						'std'         => 'yes',
						'description' => __( 'Use the current page url to share?', 'js_composer' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Share url: custom URL', 'js_composer' ),
						'param_name'  => 'url',
						'value'       => '',
						'dependency'  => array(
							'element'            => 'share_use_page_url',
							'value_not_equal_to' => 'yes',
						),
						'description' => __( 'Enter custom page url which you like to share on twitter?', 'js_composer' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Size', 'js_composer' ),
						'param_name'  => 'gsize',
						'value'       => array(
							__( 'Standard', 'js_composer' ) => 'standard',
							__( 'Small', 'js_composer' )    => 'small',
							__( 'Medium', 'js_composer' )   => 'medium',
							__( 'Tall', 'js_composer' )     => 'tall',
						),
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'google' ),
						),
						'description' => __( 'Select button size.', 'js_composer' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Type of Annotation', 'js_composer' ),
						'param_name'  => 'gannatation',
						'value'       => array(
							__( 'Bubble', 'js_composer' ) => 'bubble',
							__( 'Inline', 'js_composer' ) => 'inline',
							__( 'None', 'js_composer' )   => 'none',
						),
						'std'         => 'bubble',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'google' ),
						),
						'description' => __( 'Choose a Annotation.', 'js_composer' ),
					),
					array(
						'type'       => 'checkbox',
						'heading'    => __( 'HTML5 valid syntax', 'retro' ),
						'param_name' => 'ghtml5',
						'value'      => 'true',
						'dependency' => array(
							'element' => 'button',
							'value'   => array( 'google' ),
						),
					),
					array(
						'type'        => 'textarea',
						'heading'     => __( 'Default Tweet text', 'retro' ),
						'param_name'  => 'text',
						'value'       => '',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'twitter', 'pinterest' ),
						),
						'description' => __( 'Text', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'tcount', 'retro' ),
						'param_name'  => 'tcount',
						'value'       => '',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'twitter' ),
						),
						'description' => __( 'Description!!!', 'retro' ),
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Use large button', 'js_composer' ),
						'param_name'  => 'tsize',
						'value'       => array(
							__( 'Yes', 'js_composer' ) => 'large',
						),
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'twitter' ),
						),
						'description' => __( 'Do you like to display a larger Tweet button?', 'js_composer' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Via @', 'js_composer' ),
						'param_name'  => 'tvia',
						'value'       => '',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'twitter' ),
						),
						'description' => __( 'Enter your Twitter username.', 'js_composer' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Related', 'retro' ),
						'param_name'  => 'trelated',
						'value'       => '',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'twitter' ),
						),
						'description' => __( 'Enter your Twitter related.', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Width', 'retro' ),
						'param_name'  => 'fwidth',
						'value'       => '',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'facebook' ),
						),
						'description' => __( 'Description!!!', 'retro' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Button type', 'js_composer' ),
						'param_name'  => 'flayout',
						'value'       => array(
							__( 'Horizontal', 'js_composer' )            => 'standard',
							__( 'Horizontal with count', 'js_composer' ) => 'button_count',
							__( 'Vertical with count', 'js_composer' )   => 'box_count',
						),
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'facebook' ),
						),
						'description' => __( 'Select button type.', 'js_composer' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Button action', 'retro' ),
						'param_name'  => 'faction',
						'save_always' => true,
						'value'       => array(
							__( 'Like', 'retro' )      => 'like',
							__( 'Recommend', 'retro' ) => 'recommend',
						),
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'facebook' ),
						),
						'description' => __( 'Select button action.', 'retro' ),
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Send', 'retro' ),
						'param_name'  => 'fsend',
						'value'       => 'true',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'facebook' ),
						),
						'description' => __( 'Description!!!', 'retro' ),
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Show Faces', 'retro' ),
						'param_name'  => 'fshow_faces',
						'value'       => 'true',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'facebook' ),
						),
						'description' => __( 'Description!!!', 'retro' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'colorsheme', 'retro' ),
						'param_name'  => 'fcolorsheme',
						'value'       => array(
							__( 'Light', 'retro' ) => 'light',
							__( 'Dark', 'retro' )  => 'dark',
						),
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'facebook' ),
						),
						'description' => __( 'Description!!!', 'retro' ),
					),
					array(
						'type'        => 'attach_image',
						'heading'     => __( 'Image', 'retro' ),
						'param_name'  => 'vcpmedia',
						'value'       => '',
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'pinterest' ),
						),
						'description' => __( 'Description!!!', 'retro' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Button type', 'js_composer' ),
						'param_name'  => 'pcount',
						'value'       => array(
							__( 'Horizontal', 'js_composer' ) => 'horizontal',
							__( 'Vertical', 'js_composer' )   => 'vertical',
							__( 'No count', 'js_composer' )   => 'none',
						),
						'dependency'  => array(
							'element' => 'button',
							'value'   => array( 'pinterest' ),
						),
						'description' => __( 'Select button layout.', 'js_composer' ),
					),
				),
			) );
		}

		if ( function_exists( 'ox_audio' ) ) {
			vc_map( array(
				'name'              => __( 'Audio', 'retro' ),
				'base'              => 'thaudio',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Audio file', 'retro' ),
						'param_name'  => 'href',
						'value'       => '',
						'description' => __( 'Type your audion file URL here.', 'retro' ),
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Hide Title', 'retro' ),
						'param_name'  => 'hide_title',
						'value'       => 'false',
						'description' => __( 'Check to hide title', 'retro' ),
					),
					array(
						'type'        => 'textarea',
						'heading'     => __( 'Title', 'retro' ),
						'param_name'  => 'content',
						'value'       => '',
						'description' => __( 'Type your title', 'retro' ),
					),
				),
			) );
		}

		if ( function_exists( 'ox_social_link' ) ) {
			vc_map( array(
				'name'              => __( 'Social Link', 'retro' ),
				'base'              => 'social_link',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Type of button', 'retro' ),
						'param_name'  => 'type',
						'value'       => array(
							__( 'RSS', 'retro' )         => 'rss_feed',
							__( 'Facebook', 'retro' )    => 'facebook_account',
							__( 'Twitter', 'retro' )     => 'twitter_account',
							__( 'Dribbble', 'retro' )    => 'dribble_account',
							__( 'Flickr', 'retro' )      => 'flicker_account',
							__( 'Vimeo', 'retro' )       => 'vimeo_account',
							__( 'Email to', 'retro' )    => 'email_to',
							__( 'Youtube', 'retro' )     => 'youtube_account',
							__( 'Pinterest', 'retro' )   => 'pinterest_account',
							__( 'Google+', 'retro' )     => 'google_plus_account',
							__( 'Linked In', 'retro' )   => 'linked_in_account',
							__( 'Picasa', 'retro' )      => 'picasa_account',
							__( 'Digg', 'retro' )        => 'digg_account',
							__( 'Plurk', 'retro' )       => 'plurk_account',
							__( 'TripAdvisor', 'retro' ) => 'tripadvisor_account',
							__( 'Yahoo!', 'retro' )      => 'yahoo_account',
							__( 'Delicious', 'retro' )   => 'delicious_account',
							__( 'deviantART', 'retro' )  => 'devianart_account',
							__( 'Tumblr', 'retro' )      => 'tumblr_account',
							__( 'Skype', 'retro' )       => 'skype_account',
							__( 'Apple', 'retro' )       => 'apple_account',
							__( 'AIM', 'retro' )         => 'aim_account',
							__( 'PayPal', 'retro' )      => 'paypal_account',
							__( 'Blogger', 'retro' )     => 'blogger_account',
							__( 'Behance', 'retro' )     => 'behance_account',
							__( 'Myspace', 'retro' )     => 'myspace_account',
							__( 'Stumble', 'retro' )     => 'stumble_account',
							__( 'Forrst', 'retro' )      => 'forrst_account',
							__( 'IMDb', 'retro' )        => 'imdb_account',
							__( 'Instagram', 'retro' )   => 'instagram_account',
						),
						'description' => __( 'Choose a type.', 'retro' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Style of button', 'retro' ),
						'param_name'  => 'style',
						'value'       => array(
							__( 'Default', 'retro' ) => 'default',
							__( 'Dark', 'retro' )    => 'dark',
							__( 'Stamp', 'retro' )   => 'stamp',
						),
						'description' => __( 'Choose a style.', 'retro' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'URL for button', 'retro' ),
						'param_name'  => 'url',
						'value'       => '',
						'description' => __( 'Type your URL here.', 'retro' ),
					),
					array(
						'type'        => 'checkbox',
						'heading'     => __( 'Link target', 'retro' ),
						'param_name'  => 'target',
						'value'       => 'false',
						'description' => __( 'Check if you want open in new window', 'retro' ),
					),
				),
			) );
		}

		if ( function_exists( 'ox_list' ) ) {
			vc_map( array(
				'name'              => __( 'List', 'retro' ),
				'base'              => 'ox_list',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(

					array(
						'type'        => 'dropdown',
						'heading'     => __( 'Type of list', 'retro' ),
						'param_name'  => 'type',
						'value'       => array(
							__( 'Simple dots', 'retro' ) => 'ox_list_simple',
							__( 'Animated', 'retro' )    => 'ox_list_animated',
						),
						'description' => __( 'Choose a type.', 'retro' ),
					),
					array(
						'type'       => 'textarea_html',
						'heading'    => __( 'Text', 'retro' ),
						'param_name' => 'content',
						'value'      => '<ul><li>Item #1</li><li>Item #2</li><li>Item #3</li></ul>',
					),
				),
			) );
		}

		if ( function_exists( 'ox_table' ) ) {
			vc_map( array(
				'name'              => __( 'Table', 'retro' ),
				'base'              => 'ox_table',
				'class'             => '',
				'category'          => __( 'Retro', 'retro' ),
				'admin_enqueue_css' => array( get_template_directory_uri() . '/backend/css/vc_admin.css' ),
				'icon'              => 'vc-retro-i-general',
				'params'            => array(
					array(
						'type'       => 'textarea_html',
						'heading'    => __( 'Text', 'retro' ),
						'param_name' => 'content',
						'value'      => '<table><thead><tr><th>Header 1</th><th>Header 2</th></tr></thead><tbody><tr><td>Division 1</td><td>Division 2</td></tr></tbody></table>',
					),
				),
			) );
		}
	}

	add_action( 'vc_before_init', 'ox_retro_integrateWithVC' );
}


