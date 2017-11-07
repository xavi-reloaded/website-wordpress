<?php
/**
 * Determine which Listing child class to load based on the
 * active integration.
 *
 * @since 3.7.0
 */
class Jobify_Listing_Factory {

	/**
	 * Get a single listing.
	 *
	 * @since 3.7.0
	 */
	public function get_listing( $listing ) {

		/* Get listing supported plugins */
		$integration = $this->get_integration();

		/* Bail, no supported plugins */
		if ( ! $integration ) {
			return false;
		}

		/* Get classname for the integration */
		$classname = $this->get_listing_classname( $integration, $listing );

		/* Bail if class not exists */
		if ( ! class_exists( $classname ) ) {
			return false;
		}

		/* Load listing class */
		return new $classname( $listing );
	}

	/**
	 * Get the current active integration.
	 *
	 * @since 3.7.0
	 *
	 * @return null|string
	 */
	public function get_integration() {

		/* Default */
		$integration = null;

		/* Add WPJM */
		if ( jobify()->get( 'wp-job-manager' ) ) {
			$integration = 'wp-job-manager';
		}

		return $integration;
	}

	/**
	 * Get the classname based on the active integration.
	 *
	 * @since 3.7.0
	 *
	 * @param string $integration
	 * @param mixed $listing
	 * @return string
	 */
	public function get_listing_classname( $integration, $listing ) {
		$classname = '';

		if ( 'wp-job-manager' == $integration ) {
			$classname = 'Jobify_Listing';
		}

		return $classname;
	}

}
