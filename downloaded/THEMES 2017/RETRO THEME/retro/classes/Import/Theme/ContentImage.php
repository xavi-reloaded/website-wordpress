<?php

class Import_Theme_ContentImage implements Import_Theme_Item
{

	/**
	 * Path to dummy portfolio image in UPLOAD dir
	 *
	 * @var string
	 */
	private $dummy_portfolio_image_url = '';

	private $post_names_for_replace = array(
											'post-with-custom-left-sidebar',
											'sunday-girl-picks-her-favourites-from-this-weeks',
											'hello-world-2',
											'home-2',
											'just-another-post-with-long-content',
											'portfolio-post-with-audio-and-left-sidebar',
											'portfolio-post-with-audio-and-left-sidebar',
											'portfolio-post-with-slideshow-and-long-content',
											'translation-ready',
										);


	private $post_with_small_dummy_image_in_content = array(
											'home-2'
	);


	function __construct() {

		$this->setDummyImagesURL();
	}

	public function import() {

		foreach ( $this->getPostNamesForReplace() as $slug ) {
			if ( $post = $this->getPostByName( $slug ) ) {
				try {
					$this->updatePostImageContent( $post );
				}  catch ( Exception $e ) {
					$errorMessage = $e->getMessage();
				}
			}
		}
	}

	private function updatePostImageContent( $post ) {
		$post->post_content = $this->replaceTeaserImage( $post->post_content );
		$post->post_content = $this->replaceContentImage( $post->post_content, $post->post_name );
		wp_update_post( $post );
	}

	private function replaceContentImage( $content, $post_name ) {
		preg_match_all( "/<img[^>]*src *= *[\"']?([^\"']*)/i", $content, $matches );
		if ( ! empty( $matches[1] ) ) {
			if ( $this->isPostWithSmallDummyImage( $post_name ) ) {
				$img_url = $this->getSmallDummyImageURL();
			} else {
				$img_url = $this->getDummyImageURL();
			}
			return str_replace( $matches[1], $img_url, $content );
		}
		return $content;
	}

	private function replaceTeaserImage( $content ) {
		preg_match_all( "/[teaset[^\]]*src *= *[\"']?([^\"']*)/i", $content, $matches );
		if ( ! empty( $matches[1] ) ) {
			return str_replace( $matches[1], $this->getDummyImageURL(), $content );
		}
		return $content;
	}

	private function getPostByName( $name, $output = OBJECT ) {
		global $wpdb;
		$post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s", $name ) );
		if ( $post ) {
			return get_post( $post, $output ); }

		return null;
	}

	private function setDummyImagesURL() {

		$this->dummy_portfolio_image_url = $this->getImageUrl( Import_Theme_Media::DUMMY_IMAGE );
		$this->dummy_small_image_url = $this->getImageUrl( Import_Theme_Media::DUMMY_IMAGE_SMALL );
	}

	private function getImageUrl( $file_name ) {
		$uploads = wp_upload_dir();
		$upload_dir_path = $uploads['path'];
		$upload_dir_url = $uploads['url'];

		$image_path = $upload_dir_path . DIRECTORY_SEPARATOR . $file_name;

		if ( file_exists( $image_path ) ) {
			return $upload_dir_url . '\/' . $file_name;
		}

		return '';
	}

	private function isPostWithSmallDummyImage( $post_name ) {
		return in_array( $post_name, $this->post_with_small_dummy_image_in_content );
	}

	public function getPostNamesForReplace() {

		return $this->post_names_for_replace;
	}

	private function getDummyImageURL() {

		return $this->dummy_portfolio_image_url;
	}

	private function getSmallDummyImageURL() {

		return $this->dummy_small_image_url;
	}
}

?>
