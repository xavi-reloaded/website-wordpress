<?php
/**
 * Create if not exist slide thumbnail image with given width&height values.
 * Old slide images (with differen size values) dont't delete
 */
class Custom_Thumbnail_Slideshow extends Custom_Thumbnail
{

	// **
	// * Meta box data names
	// */
	// const META_SIZE_TYPE        = '_post_size_type';
	// const META_POST_WIDTH       = '_post_width';
	// const META_POST_HEIGHT      = '_post_height';
	// **
	// * Admin theme post size settings
	// */
	// const GLOBAL_POST_WIDTH     = '_global_post_width';
	// const GLOBAL_POST_HEIGHT    = '_global_post_height';
	/**
	 * Width & height default values in px;
	 */
	const DEFAULT_WIDTH = 250;
	const DEFAULT_HEIGHT = 250;



	/**
	 * ID of Current post slide
	 *
	 * @var int
	 */
	private $post_id;

	/**
	 * Slide width
	 *
	 * @var int pixels
	 */
	private $width;

	/**
	 * Slide Height
	 *
	 * @var integer pixels
	 */
	private $height;

	static private $instance = null;

	function __construct() {

		;
	}


	static function getInstance() {

		if ( is_null( self::$instance ) ) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
	 * Create if not exist slide with given values<br/>
	 * and ECHO it html
	 *
	 * @param int  $id slider post id
	 * @param type $width needed slide width value
	 * @param type $height needed slide height value
	 */
	public function getThumbnail( $post_id, $width = self::DEFAULT_WIDTH, $height = self::DEFAULT_HEIGHT ) {
		$thum_id = get_post_thumbnail_id( $post_id );
		if ( $post_id && $thum_id ) {
			$this->setPostID( $post_id );
			$this->setWidth( $width );
			$this->setHeight( $height );

			$size_name = $this->getSizeNameForSlide();
			if ( ! is_array( $attachment_meta = wp_get_attachment_metadata( $thum_id ) ) && ! empty( $attachment_meta ) ) {
				return false; }

			$this->setCurrentAttachmentMeta( $attachment_meta );

			if ( $this->isAbsentThumbnailSize( $size_name ) ) {
				require_once ABSPATH . 'wp-admin/includes/media.php';
				require_once ABSPATH . 'wp-admin/includes/image.php';

				if ( is_array( $theme_size = $this->getSlideThumbnaiSize() ) ) {
					// add to global vars
					if ( $this->addToWPImageSizes( $size_name, $theme_size ) ) {
						if ( $file_path = $this->getOriginThumbnailFilePath() ) {
							/**
							 * generate attachment data
							 */
							$new_meta_date = wp_generate_attachment_metadata( $thum_id, $file_path );

							/**
							 * Add to old meta new 'sizes'
							 */
							$old_meta = $this->getCurrentAttachmentMeta();

							/**
							 * new images was created successfully
							 */
							if ( isset( $new_meta_date['sizes'][ $size_name ] ) ) {
								$theme_size_meta = $new_meta_date['sizes'][ $size_name ];

								if ( isset( $old_meta['sizes'] ) ) {
									$old_meta['sizes'][ $size_name ] = $theme_size_meta;

									wp_update_attachment_metadata( $thum_id, $old_meta );
								}
							}
						}
						$this->removeFromWPImagesSize( $size_name );
					}
				}
			}
		}
		echo $this->getClearedHTML( $post_id, $size_name );
	}

	/**
	 * Generate size name for thumbnail based on post id width & height
	 *
	 * @param array $size
	 * @return string
	 */
	private function getSizeNameForSlide() {

			return "slide-{$this->getPostID()}-{$this->getWidth()}-{$this->getHeight()}";
	}

	/**
	 * Select from custom or meta thumbnails size and return its value
	 *
	 * @return array array('width'=>'250', 'height'=>'250')
	 */
	private function getSlideThumbnaiSize() {

		//
		// if($this->isCustomSizeUsing())
		// {
		// $width  = (int) get_post_meta($this->getPostID(), SHORTNAME . self::META_POST_WIDTH, true);
		// $height = (int) get_post_meta($this->getPostID(), SHORTNAME . self::META_POST_HEIGHT, true);
		// }
		// else
		// {
		// $width  = (int) get_option(SHORTNAME . self::GLOBAL_POST_WIDTH);
		// $height = (int) get_option(SHORTNAME . self::GLOBAL_POST_HEIGHT);
		// }
		//
		// if(!$width || $width < 0 )
		// {
		// $width  = self::DEFAULT_WIDTH;
		// }
		//
		// if(!$height || $height < 0)
		// {
		// $height = self::DEFAULT_HEIGHT;
		// }
		return array(
			self::WIDTH		=> $this->getWidth(),
			self::HEIGHT	=> $this->getHeight(),
				);
	}

	/**
	 * Setter
	 *
	 * @param int $id
	 */
	private function setPostID( $id ) {
		$this->post_id = $id;
	}

	/**
	 * Get current post ID
	 *
	 * @return int
	 */
	private function getPostID() {

		return $this->post_id;
	}

	/**
	 * Get slide width
	 *
	 * @return int
	 */
	private function getWidth() {

		return $this->width;
	}

	/**
	 * Get slide Height
	 *
	 * @return int
	 */
	private function getHeight() {

		return $this->height;
	}

	/**
	 * Set Slide Width
	 *
	 * @param int $width
	 */
	private function setWidth( $width ) {
		$this->width = (int) $width;
	}

	/**
	 * Get slide height
	 *
	 * @param int $height
	 */
	private function setHeight( $height ) {
		$this->height = (int) $height;
	}
}
?>
