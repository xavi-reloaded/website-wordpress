<?php
/**
 * Handle individual listing data.
 *
 * This class implements WordPress-level data management
 * but does not interface with any 3rd party plugins directly.
 *
 * @since 3.7.0
 */
class Jobify_Listing {

	/**
	 * The associated WordPress post object.
	 *
	 * @since 3.7.0
	 * @var WP_Post $post
	 */
	protected $post;

	/**
	 * Load a new instance of a listing.
	 *
	 * @since 3.7.0
	 *
	 * @param null|int|WP_Post
	 */
	public function __construct( $post ) {
		if ( ! $post || is_int( $post ) ) {
			$this->post = get_post( $post );
		} else if ( is_a( $post, 'WP_Post' ) ) {
			$this->post = $post;
		}
	}

	/**
	 * Listing ID
	 *
	 * @since 3.7.0
	 *
	 * @return int
	 */
	public function get_id() {
		if( $this->get_object() ){
			return $this->get_object()->ID;
		}
		return false;
	}

	/**
	 * Associated listing object
	 *
	 * @since 3.7.0
	 */
	public function get_object() {
		return $this->post;
	}

	/**
	 * Status
	 *
	 * @since 3.7.0
	 *
	 * @return string
	 */
	public function get_status() {
		return $this->get_object()->post_status;
	}

	/**
	 * Title
	 *
	 * @since 3.7.0
	 *
	 * @return string
	 */
	public function get_title() {
		return get_the_title( $this->get_id() );
	}

	/**
	 * Short Description
	 *
	 * @since 3.7.0
	 *
	 * @return string
	 */
	public function get_short_description() {
		return wp_trim_words( $this->get_object()->post_content, 55 );
	}

	/**
	 * Permalink
	 *
	 * @since 3.7.0
	 *
	 * @return string
	 */
	public function get_permalink() {
		return apply_filters( 'the_job_permalink', get_permalink( $this->get_id() ), $this->get_object() );
	}

	/**
	 * Get Posted Date
	 * 
	 * @since 3.7.0
	 * 
	 * $return string Date in YYYY-MM-DD format
	 */
	public function get_posted_date() {
		return get_the_date( 'Y-m-d', $this->get_id() );
	}

	/**
	 * Get Expiry Date
	 * 
	 * @since 3.7.0
	 * 
	 * $return string Date in YYYY-MM-DD format
	 */
	public function get_expiry_date() {
		$expiry_time = $this->get_object()->_job_expires;
		return $expiry_time ? date_i18n( 'Y-m-d', strtotime( $expiry_time ) ) : '';
	}

	/**
	 * HTML Class
	 * 
	 * @since 3.7.0
	 *
	 * @param string|array $class
	 * @return array
	 */
	public function get_html_class( $class = '' ){
		$classes = array();
		$object = $this->get_object();

		if ( empty( $object ) ) {
			return $classes;
		}

		$classes[] = 'job_listing';
		if ( $job_type = $this->get_the_job_type_name() ) {
			$classes[] = 'job-type-' . sanitize_title( $this->get_the_job_type_name() );
		}

		if ( $this->is_position_filled() ) {
			$classes[] = 'job_position_filled';
		}

		if ( is_position_featured() ) {
			$classes[] = 'job_position_featured';
		}

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		}

		return get_post_class( $classes, $this->get_id() );
	}

	/**
	 * Featured Image
	 *
	 * @since 3.7.0
	 *
	 * @param string $size
	 * @return string $image
	 */
	public function get_featured_image( $size = 'thumbnail' ) {
		$image = $this->get_object()->_featured_image;

		if ( ! $image ) {
			return;
		}

		$image = attachment_url_to_postid( $image );

		if ( $image ) {
			return wp_get_attachment_image( $image, $size, false );
		}

		return false;
	}

	/**
	 * Is Position Filled
	 * 
	 * @since 3.7.0
	 *
	 * @return bool
	 */
	public function is_position_filled() {
		return $this->get_object()->_filled ? true : false;
	}

	/**
	 * Return whether or not the position has been featured
	 * 
	 * @since 3.7.0
	 *
	 * @param  object $post
	 * @return boolean
	 */
	function is_position_featured() {
		return $this->get_object()->_featured ? true : false;
	}

	/**
	 * Application Point
	 * 
	 * @since 3.7.0
	 * 
	 * @return string can be an email or URL
	 */
	public function get_the_application_point() {
		$point = $this->get_object()->_application;
		if ( is_email( $point ) ) {
			return $point;
		}
		return esc_url( $point );
	}

	/**
	 * Get Company Name
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_name() {
		return apply_filters( 'the_company_name', $this->get_object()->_company_name, $this->get_object() );
	}

	/**
	 * Get Company Tagline
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_tagline() {
		return apply_filters( 'the_company_tagline', $this->get_object()->_company_tagline, $this->get_object() );
	}

	/**
	 * Get Company Description
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_description() {
		return apply_filters( 'the_company_description', $this->get_object()->_company_description, $this->get_object() );
	}

	/**
	 * Get Company Logo
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_logo( $size = 'thumbnail' ) {
		$url = '';
		$object = $this->get_object();

		if ( has_post_thumbnail( $this->get_id() ) ) {
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $this->get_id() ), $size );
			$url = $src ? $src[0] : '';
		} elseif ( ! empty( $object->_company_logo ) ) {
			// Before WPJM 1.24.0, logo URLs were stored in post meta.
			$url = apply_filters( 'the_company_logo', $this->get_object()->_company_logo, $this->get_object() );
		}

		return $url;
	}

	/**
	 * Get Company Video
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_video(){
		return apply_filters( 'the_company_video', $this->get_object()->_company_video, $this->get_object() );
	}

	/**
	 * Get Company Website
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_website() {
		$company_website = $this->get_object()->_company_website;
		return esc_url( $company_website );
	}

	/**
	 * Get Company Twitter
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_twitter() {
		$company_twitter = $this->get_object()->_company_twitter;

		if ( $company_twitter && filter_var( $company_twitter, FILTER_VALIDATE_URL ) === false ) {
			$company_twitter = 'http://twitter.com/' . $company_twitter;
		}

		return apply_filters( 'the_company_twitter', $company_twitter, $this->get_object() );
	}

	/**
	 * Get Company Facebook
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_facebook() {
		$company_facebook = $this->get_object()->_company_facebook;

		if ( $company_facebook && filter_var( $company_facebook, FILTER_VALIDATE_URL ) === false ) {
			$company_facebook = 'http://facebook.com/' . $company_facebook;
		}

		return apply_filters( 'the_company_facebook', $company_facebook, $this->get_object() );
	}

	/**
	 * Get Company Google Plus
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_gplus() {
		$company_google = $this->get_object()->_company_google;

		if ( $company_google && filter_var( $company_google, FILTER_VALIDATE_URL ) === false ) {
			$company_google = 'http://plus.google.com/' . $company_google;
		}

		return apply_filters( 'the_company_google', $company_google, $this->get_object() );
	}

	/**
	 * Get Company LinkedIn
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_company_linkedin() {
		$company_linkedin = $this->get_object()->_company_linkedin;

		if ( $company_linkedin && filter_var( $company_linkedin, FILTER_VALIDATE_URL ) === false ) {
			$company_linkedin = 'http://linkedin.com/company/' . $company_linkedin;
		}

		return apply_filters( 'the_company_linkedin', $company_linkedin, $this->get_object() );
	}

	/**
	 * Get Listing Location
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_location(){
		return $this->get_object()->_job_location;
	}

	/**
	 * Get Listing Location Data
	 * 
	 * @since 3.7.0
	 * 
	 * @return array
	 */
	public function get_location_data() {
		$data = array(
			'street_number' => $this->get_object()->geolocation_street_number,
			'address_1'     => $this->get_object()->geolocation_street,
			'address_2'     => '',
			'city'          => $this->get_object()->geolocation_city,
			'state'         => $this->get_object()->geolocation_state_short,
			'full_state'    => $this->get_object()->geolocation_state_long,
			'postcode'      => $this->get_object()->geolocation_postcode,
			'country'       => $this->get_object()->geolocation_country_short,
			'full_country'  => $this->get_object()->geolocation_country_long,
			'latitude'      => $this->get_object()->geolocation_lat,
			'longitude'     => $this->get_object()->geolocation_long,
		);
		return apply_filters( 'jobify_location_data', $data, $this->get_object() );
	}

	/**
	 * Get The Job Type
	 * 
	 * @since 3.7.0
	 * 
	 * @return object|bool
	 */
	public function get_the_job_type() {
		$types = wp_get_post_terms( $this->get_id(), 'job_listing_type' );

		$type = false;
		if ( ! is_wp_error( $types ) && $types ) {
			$type = current( $types );
		}
		return apply_filters( 'the_job_type', $type );
	}

	/**
	 * The Job Type
	 * 
	 * @since 3.7.0
	 * 
	 * @return string
	 */
	public function get_the_job_type_name() {
		$type_obj = $this->get_the_job_type();

		if ( isset( $type_obj->name ) ) {
			return $type_obj->name;
		}
		return '';
	}

	/**
	 * Get The Job Category
	 * 
	 * @since 3.7.0
	 *
	 * @return array
	 */
	public function get_the_job_category() {
		$_categories = wp_get_post_terms( $this->get_id(), 'job_listing_category' );
		$categories = array();

		if ( ! is_wp_error( $_categories ) && $_categories ) {
			$categories = $_categories;
		}
		return $categories;
	}

	/**
	 * Get The Job Category
	 * 
	 * @since 3.7.0
	 *
	 * @return string
	 */
	public function get_the_job_category_names() {
		$_categories = $this->get_the_job_category();
		$categories = array();
		if ( $_categories ) {
			foreach ( $_categories as $category ){
				$categories[ $category->slug ] = $category->name;
			}
		}
		return implode( ', ', $categories );
	}

	/**
	 * Generate JSON-LD for a listing.
	 *
	 * @since 3.7.0
	 *
	 * @see http://json-ld.org/
	 * @see https://github.com/woocommerce/woocommerce/blob/master/includes/class-wc-structured-data.php
	 * @see https://schema.org/JobPosting
	 *
	 * @return array
	 */
	public function get_json_ld() {

		/* Location data */
		$location_data = $this->get_location_data();

		/* Markup */
		$markup = array(
			'@context'      => 'http://schema.org',
			'@type'         => 'JobPosting',
			'title'         => $this->get_title(),
			'description'   => $this->get_short_description(),
			'url'           => array(
				'@type' => 'URL',
				'@id'   => $this->get_permalink(),
			),
		);

		/* Add address */
		$address = array();

		if ( $location_data['address_1'] ) {
			$address = array(
				'@type' => 'PostalAddress',
			);

			if ( $location_data['city'] ) {
				$address['addressLocality'] = $location_data['city'];
			}

			if ( $location_data['state'] ) {
				$address[ 'addressRegion' ] = $location_data['state'];
			}

			if ( $location_data['postcode'] ) {
				$address['postalCode'] = $location_data['postcode'];
			}

			if ( $location_data['full_country'] ) {
				$address['addressCountry'] = array(
					'@type' => 'Text',
					'@id'   => $location_data['full_country']
				);
			}

			$street_address = $location_data['address_1'];

			if ( $location_data['address_2'] ) {
				$street_address .= ' ' . $location_data['address_2'];
			}

			$address['streetAddress'] = $street_address;
		}

		if ( $address ) {
			$markup['jobLocation'] = array(
				'@type'   => 'Place',
				'address' => $address,
			);
		}

		/* Image */
		$image = get_the_post_thumbnail_url( $this->get_object(), 'full' );

		if ( $image ) {
			$markup['image'] = array(
				'@type' => 'URL',
				'@id'   => esc_url( $image ),
			);
		}

		/* Hiring Organization */
		$company_name = $this->get_the_company_name();

		if ( $company_name ) {
			$markup['hiringOrganization'] = array(
				"@type" => "Organization",
			);

			/* Website */
			$company_website = $this->get_the_company_website();

			if ( $company_website ) {
				$markup['hiringOrganization']['url'] = esc_url( $company_website );
			}

			/* Application Email */
			$application_point = $this->get_the_application_point();

			if ( is_email( $application_point ) ) {
				$markup['hiringOrganization']['email'] = $application_point;
			}
		}

		/* Date Posted */
		$markup['datePosted'] = $this->get_posted_date();

		/* Date Expire */
		$expiry_date = $this->get_expiry_date();
		
		if ( $expiry_date ) {
			$markup['validThrough'] = $expiry_date;
		}

		/* Type: full-time, part-time, contract, temporary, seasonal, internship */
		$type = $this->get_the_job_type();

		if ( $type ) {
			$markup['employmentType'] = $this->get_the_job_type_name();
		}

		/* Industry : Job Category */
		$cats = $this->get_the_job_category();

		if ( $cats ) {
			$markup['industry'] = $this->get_the_job_category_names();
		}

		return $markup;
	}

}
