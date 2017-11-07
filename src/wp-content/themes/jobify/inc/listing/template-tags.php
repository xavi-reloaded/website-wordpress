<?php
/**
 * Listing Template Tags
 * 
 * @since 3.7.0
 */


/**
 * Get listing permalink
 *
 * @since 3.7.0
 *
 * @return string|bool
 */
function jobify_get_listing_page_permalink() {
	if ( function_exists( 'job_manager_get_permalink' ) ) {
		return job_manager_get_permalink( 'jobs' );
	}
	return false;
}

/**
 * Get submit listing permalink
 *
 * @since 3.7.0
 *
 * @return string|bool
 */
function jobify_get_submit_listing_page_permalink() {
	if ( function_exists( 'job_manager_get_permalink' ) ) {
		return job_manager_get_permalink( 'submit_job_form' );
	}
	return false;
}

/**
 * Get a listing.
 *
 * @since 3.7.0
 *
 * @param null|int|WP_Post
 * @return false|object
 */
function jobify_get_listing( $post = null ) {
	$factory = new Jobify_Listing_Factory();
	$listing = $factory->get_listing( $post );

	return $listing;
}

/**
 * get_the_job_permalink function.
 *
 * @access public
 * @param mixed $post (default: null)
 * @return string
 */
function jobify_get_listing_permalink( $post = null ) {
	return jobify_get_listing( $post )->get_permalink();
}

/**
 * Listing Permalink function.
 *
 * @since 3.7.0
 *
 * @access public
 * @return void
 */
function jobify_listing_permalink( $post = null ) {
	echo jobify_get_listing_permalink( $post );
}

/**
 * Get Listing HTML Class
 * 
 * @since 3.7.0
 *
 * @param string|array $class
 * @param int|object $post
 * @return array
 */
function jobify_get_listing_html_class( $class = '', $post = null ) {
	return jobify_get_listing( $post )->get_html_class( $class );
}


/**
 * Listing HTML Class
 * 
 * @since 3.7.0
 *
 * @param string|array $class
 * @param int|object $post
 * @return void
 */
function jobify_listing_html_class( $class = '', $post = null ) {
	echo 'class="' . join( ' ', jobify_get_listing_html_class( $class, $post ) ) . '"';
}

/**
 * Return whether or not the position has been marked as filled
 *
 * @since 3.7.0
 *
 * @param  object $post
 * @return boolean
 */
function jobify_is_listing_position_filled( $post = null ) {
	return jobify_get_listing( $post )->is_position_filled();
}

/**
 * get_the_job_type function.
 *
 * @access public
 * @param mixed $post (default: null)
 * @return array|bool
 */
function jobify_get_the_job_type( $post = null ) {
	return jobify_get_listing( $post )->get_the_job_type();
}

/**
 * the_job_type function.
 *
 * @access public
 * @return void
 */
function jobify_the_job_type( $post = null ) {
	echo jobify_get_listing( $post )->get_the_job_type_name();
}

/**
 * The company featured image
 *
 * @since 3.0.0
 *
 * @param string $size
 * @param object $post
 * @return string $image
 */
function jobify_get_the_featured_image( $size = 'content-job-featured', $post = null ) {
	return jobify_get_listing( $post )->get_featured_image( $size );
}

/**
 * Get the company name.
 *
 * @since Jobify 1.0
 *
 * @return string
 */
function jobify_get_the_company_name( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_name();
}

/**
 * Display or retrieve the current company name with optional content.
 *
 * @access public
 * @param mixed $id (default: null)
 * @return void
 */
function jobify_the_company_name( $before = '', $after = '', $echo = true, $post = null ) {
	$company_name = jobify_get_the_company_name( $post );

	if ( strlen( $company_name ) == 0 ) {
		return;
	}

	$company_name = esc_attr( strip_tags( $company_name ) );
	$company_name = $before . $company_name . $after;

	if ( $echo ) {
		echo $company_name;
	}
	else {
		return $company_name;
	}
}

/**
 * get_the_company_tagline function.
 *
 * @access public
 * @param int $post (default: 0)
 * @return void
 */
function jobify_get_the_company_tagline( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_tagline();
}

/**
 * Display or retrieve the current company tagline with optional content.
 *
 * @access public
 * @param mixed $id (default: null)
 * @return void|bool|string
 */
function jobify_the_company_tagline( $before = '', $after = '', $echo = true, $post = null ) {
	$company_tagline = jobify_get_the_company_tagline( $post );

	if ( strlen( $company_tagline ) == 0 ) {
		return false;
	}

	$company_tagline = esc_attr( strip_tags( $company_tagline ) );
	$company_tagline = $before . $company_tagline . $after;

	if ( $echo ) {
		echo $company_tagline;
	}
	else {
		return $company_tagline;
	}
}

/**
 * Get the company description.
 *
 * @since Jobify 1.0
 *
 * @return string
 */
function jobify_get_the_company_description( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_description();
}


/**
 * The Company Description template tag.
 *
 * @since Jobify 1.0
 * 
 * @param string $before
 * @param string $after
 * @return void
 */
function jobify_the_company_description( $before = '', $after = '', $post = null ) {
	$company_description = jobify_get_the_company_description( $post );

	if ( strlen( $company_description ) == 0 ) {
		return;
	}

	$company_description = wp_kses_post( $company_description );
	$company_description = $before . wpautop( $company_description ) . $after;

	echo $company_description;
}

/**
 * Get the company logo
 * 
 * @since 3.7.0
 * 
 * @param string $size
 * @return string
 */
function jobify_get_the_company_logo( $size = 'thumbnail', $post = null ) {
	return jobify_get_listing( $post )->get_the_company_logo( $size );
}

/**
 * The Company Logo
 * 
 * @since 3.7.0
 */
function jobify_the_company_logo( $size = 'thumbnail', $default = null, $post = null ) {
	$logo = jobify_get_the_company_logo( $post, $size );

	if ( has_post_thumbnail( $post ) ) {
		echo '<img class="company_logo" src="' . esc_attr( $logo ) . '" alt="' . esc_attr( jobify_get_the_company_name( $post ) ) . '" />';
	}

	// Before 1.24.0, logo URLs were stored in post meta.
	elseif ( ! empty( $logo ) && ( strstr( $logo, 'http' ) || file_exists( $logo ) ) ) {
		if ( $size !== 'full' && function_exists( 'job_manager_get_resized_image' ) ) {
			$logo = job_manager_get_resized_image( $logo, $size );
		}
		echo '<img class="company_logo" src="' . esc_attr( $logo ) . '" alt="' . esc_attr( jobify_get_the_company_name( $post ) ) . '" />';
	} 
	elseif ( $default ) {
		echo '<img class="company_logo" src="' . esc_attr( $default ) . '" alt="' . esc_attr( jobify_get_the_company_name( $post ) ) . '" />';
	}
	elseif( defined( 'JOB_MANAGER_PLUGIN_URL' ) ) {
		echo '<img class="company_logo" src="' . esc_attr( apply_filters( 'job_manager_default_company_logo', JOB_MANAGER_PLUGIN_URL . '/assets/images/company.png' ) ) . '" alt="' . esc_attr( jobify_get_the_company_name( $post ) ) . '" />';
	}
}


/**
 * Get the Company Video
 * 
 * @since 3.7.0
 *
 * @return string
 */
function jobify_get_the_company_video( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_video();
}

/**
 * The Company Video (Embed)
 * 
 * @since 3.7.0
 */
function jobify_the_company_video( $post = null ) {
	$video_embed = false;
	$video       = jobify_get_the_company_video( $post );
	$filetype    = wp_check_filetype( $video );

	if( ! empty( $video ) ){
		// FV Wordpress Flowplayer Support for advanced video formats
		if ( shortcode_exists( 'flowplayer' ) ) {
			$video_embed = '[flowplayer src="' . esc_attr( $video ) . '"]';
		} elseif ( ! empty( $filetype[ 'ext' ] ) ) {
			$video_embed = wp_video_shortcode( array( 'src' => $video ) );
		} else {
			$video_embed = wp_oembed_get( $video );
		}
	}

	$video_embed = apply_filters( 'the_company_video_embed', $video_embed, $post );

	if ( $video_embed ) {
		echo '<div class="company_video">' . $video_embed . '</div>';
	}
}

/**
 * Get the Company Website
 *
 * @since 3.7.0
 *
 * @return string $company_twitter
 */
function jobify_get_the_company_website( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_website();
}

/**
 * Get the Company Twitter
 *
 * @since 3.0.0
 *
 * @return string $company_twitter
 */
function jobify_get_the_company_twitter( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_twitter();
}

/**
 * Get the Company Facebook
 *
 * @since Jobify 1.0
 *
 * @return string
 */
function jobify_get_the_company_facebook( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_facebook();
}

/**
 * Get the Company Google Plus
 *
 * @since Jobify 1.0
 *
 * @return string
 */
function jobify_get_the_company_gplus( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_gplus();
}

/**
 * Get the Company LinkedIn
 *
 * @since Jobify 1.6.0
 *
 * @return string
 */
function jobify_get_the_company_linkedin( $post = null ) {
	return jobify_get_listing( $post )->get_the_company_linkedin();
}

/**
 * Get location data
 *
 * @since 3.7.0
 *
 * @return array
 */
function jobify_get_location_data( $post = null ) {
	return jobify_get_listing( $post )->get_location_data();
}

/**
 * Get listing location function.
 *
 * @since 3.7.0
 * 
 * @access public
 * @param mixed $post (default: null)
 * @return string
 */
function jobify_get_the_job_location( $post = null ) {
	return jobify_get_listing( $post )->get_location();
}

/**
 * Get location formatted address
 * 
 * @since 3.7.0
 * 
 * @return string 
 */
function jobify_get_formatted_address( $post = null, $format = false ) {
	/* Get location */
	$data = jobify_get_location_data( $post );
	$full = jobify_get_the_job_location();

	/* Filter: for back compat */
	$data = apply_filters( 'jobify_formatted_address', $data );

	/* Get Address format from theme mod if not set */
	$format = $format ? $format : get_theme_mod( 'job-display-address-format', '{city}, {state}' );

	$location = jobify_format_address( $data, $format );

	$location = apply_filters( 'the_job_location_map_link', '<a class="google_map_link" href="' . esc_url( 'http://maps.google.com/maps?q=' . urlencode( strip_tags( $full ) ) . '&zoom=14&size=512x512&maptype=roadmap&sensor=false' ) . '" target="_blank">' . esc_html( strip_tags( $location ) ) . '</a>', $location, $post );

	return $location;
}

/**
 * Jobify Format Address
 * This function will return a formatted address from location data.
 * 
 * @since 3.7.0
 *
 * @param array $data Address/location datas
 * @param string $format Address format using tags {address_1}, {city}, etc
 * @return string $formatted_address
 */
function jobify_format_address( $data, $format ) {
	/* No format, bail */
	if ( ! $format ) {
		return jobify_get_the_job_location();
	}

	/* Set default data */
	$default_args = array(
		'street_number' => '',
		'address_1'     => '',
		'address_2'     => '',
		'city'          => '',
		'state'         => '',
		'full_state'    => '',
		'postcode'      => '',
		'country'       => '',
		'full_country'  => '',
	);

	$data = array_map( 'trim', wp_parse_args( $data, $default_args ) );

	/* Extract args */
	extract( $data );

	/* Substitute address parts into the string */
	$replace = array(
		'{street_number}'    => $street_number,
		'{address_1}'        => $address_1,
		'{address_2}'        => $address_2,
		'{city}'             => $city,
		'{state}'            => $full_state,
		'{postcode}'         => $postcode,
		'{country}'          => $full_country,
		'{address_1_upper}'  => strtoupper( $address_1 ),
		'{address_2_upper}'  => strtoupper( $address_2 ),
		'{city_upper}'       => strtoupper( $city ),
		'{state_upper}'      => strtoupper( $full_state ),
		'{state_code}'       => strtoupper( $state ),
		'{postcode_upper}'   => strtoupper( $postcode ),
		'{country_upper}'    => strtoupper( $full_country ),
	);

	/* Sanitize */
	$replace = array_map( 'esc_html', $replace );

	/* Replace */
	$formatted_address = str_replace( array_keys( $replace ), $replace, $format );

	// See if there is anything added.
	$valid = str_replace( array( ' ', ',' ), '', $formatted_address );

	if ( '' == $valid ) {
		return wp_kses_post( apply_filters( 'the_job_location_anywhere_text', __( 'Anywhere', 'jobify' ) ) );
	}

	return $formatted_address;
}


/**
 * Output the listing's JSON-LD in single listing footer
 *
 * @since 3.7.0
 */
function jobify_listing_json_ld_footer() {
	if ( ! is_singular( 'job_listing' ) ) {
		return;
	}

	$data = jobify_get_listing()->get_json_ld();

	echo '<script type="application/ld+json">' . wp_json_encode( $data ) . '</script>';
}
add_action( 'wp_footer', 'jobify_listing_json_ld_footer' );

/**
 * Array Filter Deep Helper
 */
function jobify_array_filter_deep( $item ) {
	if ( is_array( $item ) ) {
		return array_filter( $item, 'jobify_array_filter_deep' );
	}

	if ( ! empty( $item ) ) {
		return true;
	}
}
