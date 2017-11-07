<?php

class Custom_Thumbnail
{
	/**
	 * Remove old size image file on size change
	 */
	const REMOVE_ON_CHANGE	= true;

	const HEIGHT		= 'height';
	const WIDTH			= 'width';
	const CROP			= 'crop';
	const REMOVE		= 'remove';

	/**
	 * List off Theme images size
	 *
	 * @var array
	 */
	private $theme_images = array();

	/**
	 * Attacment data befor update
	 *
	 * @var array
	 */
	private $attachment_meta = null;

	/**
	 * Check has thumbnail image size
	 * create it if not exist
	 * call WP function the_post_thumbnail($size_name);
	 *
	 * @param array $size_name
	 * @return mix
	 */
	public function getThumbnail( $id, $size_name ) {

		$post_id = is_null( $id )?get_the_ID():$id;
		$thumb_id = $this->getPostThumbnailId( $post_id );

		if ( $post_id && $thumb_id ) {
			if ( ! is_array( $attachment_meta = wp_get_attachment_metadata( $thumb_id ) ) && ! empty( $attachment_meta ) ) {
				return false; }

			$this->setCurrentAttachmentMeta( $attachment_meta );
			if ( $this->isAbsentThumbnailSize( $size_name ) || $this->isSizeChanged( $size_name ) ) {
				require_once ABSPATH . 'wp-admin/includes/media.php';
				require_once ABSPATH . 'wp-admin/includes/image.php';

				if ( is_array( $theme_size = $this->getThemeSizeDetailsByName( $size_name ) ) ) {
					// add to global vars
					if ( $this->addToWPImageSizes( $size_name, $theme_size ) ) {
						if ( $file_path = $this->getOriginThumbnailFilePath() ) {
							if ( $this->isSizeChanged( $size_name ) && $this->needRemoveOld( $size_name ) ) {
								$this->removeOldImage( $size_name );
							}

							/**
							 * generate attachment data and add part of it to old meta
							 */
							$new_meta_date = wp_generate_attachment_metadata( $thumb_id, $file_path );

							/**
							 * Add to old meta new 'sizes'
							 */
							if ( isset( $new_meta_date['sizes'][ $size_name ] ) ) {
								$new_meta_date['sizes'][ $size_name ]['crop'] = true;
								$theme_size_meta = $new_meta_date['sizes'][ $size_name ];

								$old_meta = $this->getCurrentAttachmentMeta();

								if ( isset( $old_meta['sizes'] ) ) {
									$old_meta['sizes'][ $size_name ] = $theme_size_meta;
									wp_update_attachment_metadata( $thumb_id, $old_meta );
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


	public function getThumbnailSrc( $thumb_id, $size_name ) {

		if ( $thumb_id ) {
			if ( ! is_array( $attachment_meta = wp_get_attachment_metadata( $thumb_id ) ) && ! empty( $attachment_meta ) ) {
				return false; }

			$this->setCurrentAttachmentMeta( $attachment_meta );
			if ( $this->isAbsentThumbnailSize( $size_name ) || $this->isSizeChanged( $size_name ) ) {
				require_once ABSPATH . 'wp-admin/includes/media.php';
				require_once ABSPATH . 'wp-admin/includes/image.php';

				if ( is_array( $theme_size = $this->getThemeSizeDetailsByName( $size_name ) ) ) {
					// add to global vars
					if ( $this->addToWPImageSizes( $size_name, $theme_size ) ) {
						if ( $file_path = $this->getOriginThumbnailFilePath() ) {
							if ( $this->isSizeChanged( $size_name ) && $this->needRemoveOld( $size_name ) ) {
								$this->removeOldImage( $size_name );
							}

							/**
							 * generate attachment data and add part of it to old meta
							 */
							$new_meta_date = wp_generate_attachment_metadata( $thumb_id, $file_path );

							/**
							 * Add to old meta new 'sizes'
							 */
							if ( isset( $new_meta_date['sizes'][ $size_name ] ) ) {
								$new_meta_date['sizes'][ $size_name ]['crop'] = true;
								$theme_size_meta = $new_meta_date['sizes'][ $size_name ];

								$old_meta = $this->getCurrentAttachmentMeta();

								if ( isset( $old_meta['sizes'] ) ) {
									$old_meta['sizes'][ $size_name ] = $theme_size_meta;
									wp_update_attachment_metadata( $thumb_id, $old_meta );
								}
							}
						}
						$this->removeFromWPImagesSize( $size_name );
					}
				}
			}
		}
		return wp_get_attachment_image_src( $thumb_id, $size_name );
	}

	protected function getPostThumbnailId( $post_id ) {
		return get_post_thumbnail_id( $post_id );
	}

	/**
	 * Removing width & height from post thumbnail html
	 *
	 * @param string $size_name size of thumbnail
	 * @return string
	 */
	protected function getClearedHTML( $id, $size_name ) {
		$html = get_the_post_thumbnail( $id, $size_name );

		$cleaned_html = preg_replace( array( '/\swidth="\d+"/', '/\sheight="\d+"/' ), '', $html );

		/**
		 * adding Product image src to tag image
		 */
		if ( Custom_Thumbnail_Product::isProductThumbnail( $id ) ) {
			$product = new Custom_Thumbnail_Product( $this->getThemeSizes() );

			$src = $product->getProductImageSrc( $id, $size_name );
			if ( $src ) {
				return $cleaned_html . ' <img class="product_hover_image" src="' . $src . '" />';
			}
		}

		return $cleaned_html;
	}

	/**
	 * Remove old size image
	 *
	 * @param array  $attachment_meta wp_get_attachment_metadata
	 * @param string $size_name
	 */
	protected function removeOldImage( $size_name ) {
		if ( $path = $this->getResizedThumbnailFilePath( $size_name ) ) {
			$info = pathinfo( $path );
			$dirname = $info['dirname'];

			if ( file_exists( $path ) && is_writeable( $path ) && is_writeable( $dirname ) ) {
				unlink( $path );
			}
		}
	}

	/**
	 * Check is need remove old size file
	 *
	 * @param string $size_name
	 * @return boolean
	 */
	private function needRemoveOld( $size_name ) {
		if ( $size = $this->getThemeSizeDetailsByName( $size_name ) ) {
			return $size[ self::REMOVE ];
		}
		return false;
	}

	/**
	 * Compare current meta image size with old meta data
	 *
	 * @param string $size_name
	 * @return boolean
	 */
	protected function isSizeChanged( $size_name ) {
		$current_attachment_meta = $this->getCurrentAttachmentMeta();

		if ( is_array( $current_attachment_meta ) && isset( $current_attachment_meta['sizes'] ) && key_exists( $size_name, $current_attachment_meta['sizes'] ) ) {
			/**
			 * i.e. :
					array (
					'file' => 'v1-287x300.jpg',
					'width' => '287',
					'height' => '300',
					),
			 */
			$size_meta = $current_attachment_meta['sizes'][ $size_name ];

			if ( $theme_size = $this->getThemeSizeDetailsByName( $size_name ) ) {
				if ( ( array_key_exists( self::WIDTH, $theme_size ) && $theme_size[ self::WIDTH ] != $size_meta[ self::WIDTH ] )
					|| ( array_key_exists( self::HEIGHT, $theme_size ) && $theme_size[ self::HEIGHT ] != $size_meta[ self::HEIGHT ] )
					|| ( array_key_exists( self::CROP, $theme_size ) && array_key_exists( self::CROP, $size_meta ) && $theme_size[ self::CROP ] != (bool) $size_meta[ self::CROP ] ) ) {
					// wp_die(var_dump($size_meta).var_dump($theme_size));
					return true;
				}
			}
		}
		return false;
	}

	/**
	 * Get thumbnail file path in uplad dir
	 *
	 * @return string|boolean
	 */
	protected function getOriginThumbnailFilePath() {

		$imagedata = $this->getCurrentAttachmentMeta();
		if ( isset( $imagedata['file'] ) ) {
			$upload_dir = wp_upload_dir();
			if ( $upload_dir && isset( $upload_dir['basedir'] ) ) {
				$path = $upload_dir['basedir'] . DIRECTORY_SEPARATOR . $imagedata['file'];
				return $path;
			}
		}
		return false;
	}

	/**
	 * Path to certain size Thumbnail
	 *
	 * @param array  $imagedata wp_get_attachment_metadata
	 * @param string $size_name certain size
	 * @return string|boolean
	 */
	protected function getResizedThumbnailFilePath( $size_name ) {
		$imagedata = $this->getCurrentAttachmentMeta();

		if ( isset( $imagedata['file'] ) ) {
			$pathinfo = pathinfo( $imagedata['file'] );
			$dir = $pathinfo['dirname'];
			$upload_dir_path = wp_upload_dir();

			if ( $dir && $upload_dir_path && isset( $upload_dir_path['basedir'] ) ) {
				if ( isset( $imagedata['sizes'][ $size_name ]['file'] ) ) {
					$full_file_path = $upload_dir_path['basedir'] . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $imagedata['sizes'][ $size_name ]['file'];
					return $full_file_path;
				}
			}
		}
		return false;
	}

	/**
	 * Check is thumbnail have this size
	 *
	 * @param string $size_name size name
	 * @param array  $imagedata result of wp_get_attachment_metadata
	 * @return type
	 */
	protected function isAbsentThumbnailSize( $size_name ) {
		$imagedata = $this->getCurrentAttachmentMeta();
		return isset( $imagedata['sizes'] ) && ! key_exists( $size_name, $imagedata['sizes'] );
	}

	/**
	 * Registers a new image size in global $_wp_additional_image_sizes;
	 *
	 * @param string $name size name
	 * @param array  $size details
	 * @return boolean
	 */
	protected function addToWPImageSizes( $name, $size ) {
		if ( isset( $size[ self::WIDTH ] ) && isset( $size[ self::HEIGHT ] ) && isset( $size[ self::CROP ] ) ) {
			add_image_size( $name, $size[ self::WIDTH ], $size[ self::HEIGHT ], $size[ self::CROP ] );
			return true;
		}
		return false;
	}

	/**
	 * Remove from global $_wp_additional_image_sizes; theme image size.
	 *
	 * @global array $_wp_additional_image_sizes
	 * @param string $name theme size to delete
	 */
	protected function removeFromWPImagesSize( $name ) {
		global $_wp_additional_image_sizes;

		if ( isset( $_wp_additional_image_sizes[ $name ] ) ) {
			unset( $_wp_additional_image_sizes[ $name ] );
		}
	}

	/**
	 * Add theme image size
	 *
	 * @param string $name - image name
	 * @param int    $width - image width
	 * @param int    $height - image height
	 * @return \Custom_Thumbnail
	 */
	public function addThemeImageSize( $name, $width, $height, $remove_on_change = false, $crop ) {
		$this->theme_images[ $name ] = array(
		self::WIDTH		=> absint( $width ),
											self::HEIGHT	=> absint( $height ),
											self::CROP		=> $crop,
											self::REMOVE	=> $remove_on_change,
		);
		return $this;
	}

	/**
	 * Get theme image details bu name
	 *
	 * @param string $size_name
	 * @return array|boolean
	 */
	protected function getThemeSizeDetailsByName( $size_name ) {
		if ( isset( $this->theme_images[ $size_name ] ) ) {
			return $this->theme_images[ $size_name ];
		}
		return false;
	}

	/**
	 * Get all theme Images
	 *
	 * @return array
	 */
	private function getThemeSizes() {

		return $this->theme_images;
	}

	protected function setCurrentAttachmentMeta( $meta ) {
		$this->attachment_meta = $meta;
	}

	protected function getCurrentAttachmentMeta() {

		return $this->attachment_meta;
	}
}
?>
