<?php

class Import_Theme_Media implements Import_Theme_Item
{
	/**
	 * Name of dummy image for replace content and featured image
	 */
	const DUMMY_IMAGE = 'not_included.jpg';

	/**
	 * Name of dummy image for replace content in blog page
	 */
	const DUMMY_IMAGE_SMALL = 'not_included_small.jpg';

	const DUMMY_IMG_DIR = '/backend/dummy/img/';


	private $attach_ids = array();

	function __construct() {

		$this->uploadImages();
	}

	public function import() {

		$this->setPostsMedia();
		$this->setPortfolioOption();
	}

	private function uploadImages() {

		$uploads		= wp_upload_dir();
		$upload_dir_path		= $uploads['path'];
		$default_images	= array(
								self::DUMMY_IMAGE,
								self::DUMMY_IMAGE_SMALL,
							);

		foreach ( $default_images as $original_filename ) {
			/*
            $def_image = array(
                "src" => get_template_directory() . "/images/" . $filename,
                "link" => "", "description" => "", "type" => "upload",
                "title" => "");
			*/
			$upload_file = $upload_dir_path . '/' . $original_filename;
			$original_file_path = get_template_directory() . self::DUMMY_IMG_DIR . $original_filename;

			if ( file_exists( $original_file_path ) ) {
				copy( $original_file_path, $upload_file );
				$wp_filetype = wp_check_filetype( basename( $upload_file ), null );
				$attachment = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $upload_file ) ),
					'post_content' => '',
					'post_status' => 'inherit',
				);

				$attach_id = wp_insert_attachment( $attachment, $upload_file );

				$imagesize = getimagesize( $upload_file );

				$metadata					= array();
				$metadata['width']			= $imagesize[0];
				$metadata['height']			= $imagesize[1];
				list($uwidth, $uheight)		= wp_constrain_dimensions( $metadata['width'], $metadata['height'], 128, 96 );
				$metadata['hwstring_small'] = "height='$uheight' width='$uwidth'";
				$metadata['file']			= _wp_relative_upload_path( $upload_file );

				global $_wp_additional_image_sizes;

				foreach ( get_intermediate_image_sizes() as $s ) {
					$sizes[ $s ] = array( 'name' => '', 'width' => '', 'height' => '', 'crop' => false );
					$sizes[ $s ]['name'] = $s;

					if ( isset( $_wp_additional_image_sizes[ $s ]['width'] ) ) {
						$sizes[ $s ]['width'] = intval( $_wp_additional_image_sizes[ $s ]['width'] ); } else {
						$sizes[ $s ]['width'] = get_option( "{$s}_size_w" ); }

						if ( isset( $_wp_additional_image_sizes[ $s ]['height'] ) ) {
							$sizes[ $s ]['height'] = intval( $_wp_additional_image_sizes[ $s ]['height'] ); } else {
							$sizes[ $s ]['height'] = get_option( "{$s}_size_h" ); }

							if ( isset( $_wp_additional_image_sizes[ $s ]['crop'] ) ) {
								$sizes[ $s ]['crop'] = intval( $_wp_additional_image_sizes[ $s ]['crop'] ); } else {
								$sizes[ $s ]['crop'] = get_option( "{$s}_crop" ); }
				}

				$sizes = apply_filters( 'intermediate_image_sizes_advanced', $sizes );
				set_time_limit( 30 );
				foreach ( $sizes as $size => $size_data ) {
					$metadata['sizes'][ $size ] = image_make_intermediate_size( $upload_file, $size_data['width'], $size_data['height'], $size_data['crop'] );
				}

				apply_filters( 'wp_generate_attachment_metadata', $metadata, $attach_id );
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				$att_data = wp_generate_attachment_metadata( $attach_id, $upload_file );
				wp_update_attachment_metadata( $attach_id, $att_data );

				$this->attach_ids[] = $attach_id;
			}
		}
	}

	// private function getAttachedId($id = '')
	// {
	// if(isset($this->attach_ids[$id]))
	// {
	// return $this->attach_ids[$id];
	// }
	// return 0;
	// }
	// private function getRandomAttachedId()
	// {
	// return $this->attach_ids[array_rand($this->attach_ids)];
	// }
	private function setPostsMedia() {

		// set default image for all posts
		$args = array(
			'post_type' => array( 'post' ),
			'posts_per_page' => '-1',
		);

		$all_posts = new WP_Query( $args );
		while ( $all_posts->have_posts() ) :
			$all_posts->the_post();
			set_post_thumbnail( get_the_ID(), $this->bigDummyImageId() );
		endwhile;
	}


	private function setPortfolioOption() {

		// set default image for slides posts
		$args = array(
			'post_type'			=> array( Custom_Posts_Type_Portfolio::POST_TYPE ),
			'posts_per_page'	=> '-1',
		);

		$all_gallery_query = new WP_Query( $args );

		while ( $all_gallery_query->have_posts() ) :
			$all_gallery_query->the_post();
			set_post_thumbnail( get_the_ID(), $this->bigDummyImageId() );
		endwhile;
	}

	private function bigDummyImageId() {

		return $this->attach_ids[0];
	}
}
?>
