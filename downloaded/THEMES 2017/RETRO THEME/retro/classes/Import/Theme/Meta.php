<?php
class Import_Theme_Meta implements Import_Theme_Item
{
	/**
	 * Path to dummy portfolio image in UPLOAD dir
	 *
	 * @var string
	 */
	private $dummy_portfolio_image_url = '';

	/**
	 * Porfolio slides meta key
	 *
	 * @var string
	 */
	private $portfolio_meta_key = '';


	function __construct() {

		$this->setPortfolioMetaKey();
		$this->setDummyImageURL();
	}

	public function import() {

		$this->updateSlider();
	}

	private function updateSlider() {

		if ( $sliders = $this->getPortfolioSliders() ) {
			foreach ( $sliders as $slider ) {
				$slides = unserialize( $slider->meta_value );

				if ( ! empty( $slides ) && is_array( $slides ) ) {
					foreach ( $slides as &$slide ) {
						if ( isset( $slide['slide-img-src'] ) ) {
							$slide['slide-img-src'] = $this->getDummyImageURL();
						}
					}
				}
				update_post_meta( $slider->post_id, $this->getPortfolioMetaKey(), $slides );
			}
		}
	}

	/**
	 * get metas for portfolio slider
	 *
	 * @global type $wpdb
	 * @return array
	 */
	private function getPortfolioSliders() {

		global $wpdb;
		return $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->postmeta WHERE meta_key = %s", $this->getPortfolioMetaKey() ) );
	}


	private function getDummyImageURL() {

		return $this->dummy_portfolio_image_url;
	}

	private function setDummyImageURL() {

		$uploads = wp_upload_dir();
		$upload_dir_path = $uploads['path'];
		$upload_dir_url = $uploads['url'];
		$dummy_portfolio_image_path  = $upload_dir_path . DIRECTORY_SEPARATOR . Import_Theme_Media::DUMMY_IMAGE;
		$dummy_portfolio_image_url = $upload_dir_url . '\/' . Import_Theme_Media::DUMMY_IMAGE;

		if ( file_exists( $dummy_portfolio_image_path ) ) {
			$this->dummy_portfolio_image_url = $dummy_portfolio_image_url ;
		}
	}

	public function getPortfolioMetaKey() {

		return $this->portfolio_meta_key;
	}

	public function setPortfolioMetaKey() {

		$this->portfolio_meta_key = SHORTNAME . '_project_slider';
	}
}
?>
