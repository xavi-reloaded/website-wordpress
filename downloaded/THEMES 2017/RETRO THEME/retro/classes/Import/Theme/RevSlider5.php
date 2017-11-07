<?php

/**
 * Class for adding import from file functinaliti to Revolution slider importer
 */
final class Import_Theme_RevSlider5 extends RevSlider {

	/**
	 * slider params array key
	 */
	const SLIDES = 'slides';

	/**
	 * slider params array key
	 */
	const PARAMS = 'params';

	/**
	 * Path inside theme with dummy images
	 */
	const DUMMY_IMG_PATH = '/backend/dummy/img/';

	/**
	 * Full path to import file
	 *
	 * @var string
	 */
	private $import_file_path	 = '';
	private $dummy_img_url		 = '';

	public function __construct() {

		parent::__construct();
		$this->setDummyImgDir();
	}

	/**
	 * Method for create slider and update it with import data
	 */
	public function import() {

		$alias	 = $this->getBaseName();
		$slideID = null;
		if ( $this->isAliasExistsInDB( $alias ) ) {
			$this->initByAlias( $alias );
			$slideID = $this->getID();
		}
		return $this->importSliderFromFile( $slideID, $this->getImportFilePath() );
	}

	/**
	 *
	 * import slider from multipart form
	 */
	public function importSliderFromFile( $sliderID, $filepath ) {

		try {
			$sliderExists = ! empty( $sliderID );

			if ( $sliderExists ) {
				$this->initByID( $sliderID ); }

			WP_Filesystem();

			global $wp_filesystem;

			$importZip	 = true; // raus damit..
			// read all files needed
			$content	 = ( $wp_filesystem->exists( $filepath ) ) ? $wp_filesystem->get_contents( $filepath ) : '';
			if ( $content == '' ) {
				RevSliderFunctions::throwError( __( basename( $filepath ) . ' does not exist!', 'revslider' ) );
			}

			$db = new RevSliderDB();

			// $content = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $content); //clear errors in string //deprecated in newest php version
			$content = preg_replace_callback( '!s:(\d+):"(.*?)";!', array( 'RevSliderSlider', 'clear_error_in_string' ), $content ); // clear errors in string

			$arrSlider = @unserialize( $content );
			if ( empty( $arrSlider ) ) {
				RevSliderFunctions::throwError( __( 'Wrong export slider file format! Please make sure that the uploaded file is either a zip file with a correct slider_export.txt in the root of it or an valid slider_export.txt file.', 'revslider' ) );
			}

			// update slider params
			$sliderParams = $arrSlider['params'];

			if ( $sliderExists ) {
				$sliderParams['title']	 = $this->arrParams['title'];
				$sliderParams['alias']	 = $this->arrParams['alias'];
				$sliderParams['shortcode'] = $this->arrParams['shortcode'];
			}

			if ( isset( $sliderParams['background_image'] ) ) {
				$sliderParams['background_image'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $sliderParams['background_image'] ) ); }

			$import_statics = true;
			if ( isset( $sliderParams['enable_static_layers'] ) ) {
				if ( $sliderParams['enable_static_layers'] == 'off' ) {
					$import_statics = false; }
				unset( $sliderParams['enable_static_layers'] );
			}

			$json_params = json_encode( $sliderParams );

			// update slider or create new
			if ( $sliderExists ) {
				$arrUpdate = array( 'params' => $json_params );
				$this->db->update( RevSliderGlobals::$table_sliders, $arrUpdate, array( 'id' => $sliderID ) );
			} else { // new slider
				$arrInsert				 = array();
				$arrInsert['params']	 = $json_params;
				// check if Slider with title and/or alias exists, if yes change both to stay unique
				$arrInsert['title']	 = RevSliderFunctions::getVal( $sliderParams, 'title', 'Slider1' );
				$arrInsert['alias']	 = RevSliderFunctions::getVal( $sliderParams, 'alias', 'slider1' );
				$talias					 = $arrInsert['alias'];
				$ti						 = 1;
				while ( $this->isAliasExistsInDB( $talias ) ) { // set a new alias and title if its existing in database
					$talias = $arrInsert['alias'] . $ti;
					$ti++;
				}

				if ( $talias !== $arrInsert['alias'] ) {
					$sliderParams['title'] = $talias;
					$sliderParams['alias'] = $talias;
					$arrInsert['title']	 = $talias;
					$arrInsert['alias']	 = $talias;
					$json_params			 = json_encode( $sliderParams );
					$arrInsert['params']	 = $json_params;
				}

				$sliderID = $this->db->insert( RevSliderGlobals::$table_sliders, $arrInsert );
			}

			// -------- Slides Handle -----------
			// delete current slides
			if ( $sliderExists ) {
				$this->deleteAllSlides(); }

			// create all slides
			$arrSlides = $arrSlider['slides'];

			$alreadyImported = array();

			// $content_url = content_url();
			$upload_dir	 = wp_upload_dir();
			$content_url = $upload_dir['baseurl'] . '/revslider/assets/svg/';

			// wpml compatibility
			$slider_map = array();
			foreach ( $arrSlides as $sl_key => $slide ) {
				$params		 = $slide['params'];
				$layers		 = $slide['layers'];
				$settings	 = (isset( $slide['settings'] )) ? $slide['settings'] : '';

				// convert params images:
				if ( $importZip === true ) { // we have a zip, check if exists
					// remove image_id as it is not needed in import
					if ( isset( $params['image_id'] ) ) {
						unset( $params['image_id'] ); }

					if ( isset( $params['image'] ) ) {
						$params['image'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $params['image'] ) );
					}

					if ( isset( $params['background_image'] ) ) {
						$params['background_image'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $params['background_image'] ) );
					}

					if ( isset( $params['slide_thumb'] ) ) {
						$params['slide_thumb'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $params['slide_thumb'] ) );
					}

					if ( isset( $params['show_alternate_image'] ) ) {
						$params['show_alternate_image'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $params['show_alternate_image'] ) );
					}
					if ( isset( $params['background_type'] ) && $params['background_type'] == 'html5' ) {
						if ( isset( $params['slide_bg_html_mpeg'] ) && $params['slide_bg_html_mpeg'] != '' ) {
							$params['slide_bg_html_mpeg'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $params['slide_bg_html_mpeg'] ) );
						}
						if ( isset( $params['slide_bg_html_webm'] ) && $params['slide_bg_html_webm'] != '' ) {
							$params['slide_bg_html_webm'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $params['slide_bg_html_webm'] ) );
						}
						if ( isset( $params['slide_bg_html_ogv'] ) && $params['slide_bg_html_ogv'] != '' ) {
							$params['slide_bg_html_ogv'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $params['slide_bg_html_ogv'] ) );
						}
					}
				}

				// convert layers images:
				foreach ( $layers as $key => $layer ) {
					// import if exists in zip folder
					if ( $importZip === true ) { // we have a zip, check if exists
						if ( isset( $layer['image_url'] ) ) {
							$layer['image_url'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $layer['image_url'] ) );
						}
						if ( isset( $layer['type'] ) && ($layer['type'] == 'video' || $layer['type'] == 'audio') ) {

							$video_data = (isset( $layer['video_data'] )) ? (array) $layer['video_data'] : array();

							if ( ! empty( $video_data ) && isset( $video_data['video_type'] ) && $video_data['video_type'] == 'html5' ) {

								if ( isset( $video_data['urlPoster'] ) && $video_data['urlPoster'] != '' ) {
									$video_data['urlPoster'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlPoster'] ) );
								}

								if ( isset( $video_data['urlMp4'] ) && $video_data['urlMp4'] != '' ) {
									$video_data['urlMp4'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlMp4'] ) );
								}
								if ( isset( $video_data['urlWebm'] ) && $video_data['urlWebm'] != '' ) {
									$video_data['urlWebm'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlWebm'] ) );
								}
								if ( isset( $video_data['urlOgv'] ) && $video_data['urlOgv'] != '' ) {
									$video_data['urlOgv'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlOgv'] ) );
								}
							} elseif ( ! empty( $video_data ) && isset( $video_data['video_type'] ) && $video_data['video_type'] != 'html5' ) { // video cover image
								if ( $video_data['video_type'] == 'audio' ) {
									if ( isset( $video_data['urlAudio'] ) && $video_data['urlAudio'] != '' ) {
										$video_data['urlAudio'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlAudio'] ) );
									}
								} else {
									if ( isset( $video_data['previewimage'] ) && $video_data['previewimage'] != '' ) {
										$video_data['previewimage'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['previewimage'] ) );
									}
								}
							}

							$layer['video_data'] = $video_data;
						}

						if ( isset( $layer['type'] ) && $layer['type'] == 'svg' ) {
							if ( isset( $layer['svg'] ) && isset( $layer['svg']->src ) ) {
								if ( strpos( $layer['svg']->src, 'revslider-whiteboard-addon' ) !== false ) {
									$layer['svg']->src = content_url() . $layer['svg']->src;
								} else {
									$layer['svg']->src = str_replace( '/plugins/revslider/public/assets/assets/svg/', '', $content_url . $layer['svg']->src );
								}
							}
						}
					}

					$layer['text'] = stripslashes( $layer['text'] );
					$layers[ $key ]	 = $layer;
				}

				$arrSlides[ $sl_key ]['layers'] = $layers;

				// create new slide
				$arrCreate					 = array();
				$arrCreate['slider_id']	 = $sliderID;
				$arrCreate['slide_order']	 = $slide['slide_order'];

				$my_layers	 = json_encode( $layers );
				if ( empty( $my_layers ) ) {
					$my_layers	 = stripslashes( json_encode( $layers ) ); }
				$my_params	 = json_encode( $params );
				if ( empty( $my_params ) ) {
					$my_params	 = stripslashes( json_encode( $params ) ); }
				$my_settings = json_encode( $settings );
				if ( empty( $my_settings ) ) {
					$my_settings = stripslashes( json_encode( $settings ) ); }

				$arrCreate['layers']	 = $my_layers;
				$arrCreate['params']	 = $my_params;
				$arrCreate['settings'] = $my_settings;

				$last_id = $this->db->insert( RevSliderGlobals::$table_slides, $arrCreate );

				if ( isset( $slide['id'] ) ) {
					$slider_map[ $slide['id'] ] = $last_id;
				}
			}

			// change for WPML the parent IDs if necessary
			if ( ! empty( $slider_map ) ) {
				foreach ( $arrSlides as $sl_key => $slide ) {
					if ( isset( $slide['params']['parentid'] ) && isset( $slider_map[ $slide['params']['parentid'] ] ) ) {
						$update_id	 = $slider_map[ $slide['id'] ];
						$parent_id	 = $slider_map[ $slide['params']['parentid'] ];

						$arrCreate = array();

						$arrCreate['params']				 = $slide['params'];
						$arrCreate['params']['parentid'] = $parent_id;
						$my_params							 = json_encode( $arrCreate['params'] );
						if ( empty( $my_params ) ) {
							$my_params							 = stripslashes( json_encode( $arrCreate['params'] ) ); }

						$arrCreate['params'] = $my_params;

						$this->db->update( RevSliderGlobals::$table_slides, $arrCreate, array( 'id' => $update_id ) );
					}

					$did_change = false;
					foreach ( $slide['layers'] as $key => $value ) {
						if ( isset( $value['layer_action'] ) ) {
							if ( isset( $value['layer_action']->jump_to_slide ) && ! empty( $value['layer_action']->jump_to_slide ) ) {
								$value['layer_action']->jump_to_slide = (array) $value['layer_action']->jump_to_slide;
								foreach ( $value['layer_action']->jump_to_slide as $jtsk => $jtsval ) {
									if ( isset( $slider_map[ $jtsval ] ) ) {
										$slide['layers'][ $key ]['layer_action']->jump_to_slide[ $jtsk ] = $slider_map[ $jtsval ];
										$did_change															 = true;
									}
								}
							}
						}

						$link_slide = RevSliderFunctions::getVal( $value, 'link_slide', false );
						if ( $link_slide != false && $link_slide !== 'nothing' ) { // link to slide/scrollunder is set, move it to actions
							if ( ! isset( $slide['layers'][ $key ]['layer_action'] ) ) {
								$slide['layers'][ $key ]['layer_action'] = new stdClass(); }
							switch ( $link_slide ) {
								case 'link':
									$link														 = RevSliderFunctions::getVal( $value, 'link' );
									$link_open_in												 = RevSliderFunctions::getVal( $value, 'link_open_in' );
									$slide['layers'][ $key ]['layer_action']->action		 = array( 'a' => 'link' );
									$slide['layers'][ $key ]['layer_action']->link_type		 = array( 'a' => 'a' );
									$slide['layers'][ $key ]['layer_action']->image_link	 = array( 'a' => $link );
									$slide['layers'][ $key ]['layer_action']->link_open_in	 = array( 'a' => $link_open_in );

									unset( $slide['layers'][ $key ]['link'] );
									unset( $slide['layers'][ $key ]['link_open_in'] );
								case 'next':
									$slide['layers'][ $key ]['layer_action']->action			 = array( 'a' => 'next' );
									break;
								case 'prev':
									$slide['layers'][ $key ]['layer_action']->action			 = array( 'a' => 'prev' );
									break;
								case 'scroll_under':
									$scrollunder_offset												 = RevSliderFunctions::getVal( $value, 'scrollunder_offset' );
									$slide['layers'][ $key ]['layer_action']->action			 = array( 'a' => 'scroll_under' );
									$slide['layers'][ $key ]['layer_action']->scrollunder_offset = array( 'a' => $scrollunder_offset );

									unset( $slide['layers'][ $key ]['scrollunder_offset'] );
									break;
								default: // its an ID, so its a slide ID
									$slide['layers'][ $key ]['layer_action']->action		 = array( 'a' => 'jumpto' );
									$slide['layers'][ $key ]['layer_action']->jump_to_slide	 = array( 'a' => $slider_map[ $link_slide ] );
									break;
							}
							$slide['layers'][ $key ]['layer_action']->tooltip_event = array( 'a' => 'click' );

							unset( $slide['layers'][ $key ]['link_slide'] );

							$did_change = true;
						}

						if ( $did_change === true ) {

							$arrCreate	 = array();
							$my_layers	 = json_encode( $slide['layers'] );
							if ( empty( $my_layers ) ) {
								$my_layers	 = stripslashes( json_encode( $layers ) ); }

							$arrCreate['layers'] = $my_layers;

							$this->db->update( RevSliderGlobals::$table_slides, $arrCreate, array( 'id' => $slider_map[ $slide['id'] ] ) );
						}
					}
				}
			}

			// check if static slide exists and import
			if ( isset( $arrSlider['static_slides'] ) && ! empty( $arrSlider['static_slides'] ) && $import_statics ) {
				$static_slide = $arrSlider['static_slides'];
				foreach ( $static_slide as $slide ) {

					$params		 = $slide['params'];
					$layers		 = $slide['layers'];
					$settings	 = (isset( $slide['settings'] )) ? $slide['settings'] : '';

					// remove image_id as it is not needed in import
					if ( isset( $params['image_id'] ) ) {
						unset( $params['image_id'] ); }

					// convert params images:
					if ( isset( $params['image'] ) ) {
						// import if exists in zip folder
						if ( strpos( $params['image'], 'http' ) !== false ) {

						} else {
							if ( trim( $params['image'] ) !== '' ) {
								if ( $importZip === true ) { // we have a zip, check if exists
									$params['image']	 = $this->sliderDummyImage( $params['image'] );
									$image				 = $wp_filesystem->exists( $params['image'] );
									if ( ! $image ) {
										echo $params['image'] . __( ' not found!<br>', 'revslider' );
									} else {
										if ( ! isset( $alreadyImported[ $params['image'] ] ) ) {
											$importImage = RevSliderFunctionsWP::import_media( $params['image'], $sliderParams['alias'] . '/' );

											if ( $importImage !== false ) {
												$alreadyImported[ $params['image'] ] = $importImage['path'];

												$params['image'] = $importImage['path'];
											}
										} else {
											$params['image'] = $alreadyImported[ $params['image'] ];
										}
									}
								}
							}
							$params['image'] = RevSliderFunctionsWP::getImageUrlFromPath( $params['image'] );
						}
					}

					// convert layers images:
					foreach ( $layers as $key => $layer ) {
						if ( isset( $layer['image_url'] ) ) {
							// import if exists in zip folder
							if ( trim( $layer['image_url'] ) !== '' ) {
								if ( strpos( $layer['image_url'], 'http' ) !== false ) {

								} else {
									if ( $importZip === true ) { // we have a zip, check if exists
										$layer['image_url']	 = $this->sliderDummyImage( $layer['image_url'] );
										$image_url				 = $wp_filesystem->exists( $layer['image_url'] );
										if ( ! $image_url ) {
											echo $layer['image_url'] . __( ' not found!<br>' );
										} else {
											if ( ! isset( $alreadyImported[ $layer['image_url'] ] ) ) {
												$importImage = RevSliderFunctionsWP::import_media( $layer['image_url'], $sliderParams['alias'] . '/' );

												if ( $importImage !== false ) {
													$alreadyImported[ $layer['image_url'] ] = $importImage['path'];

													$layer['image_url'] = $importImage['path'];
												}
											} else {
												$layer['image_url'] = $alreadyImported[ $layer['image_url'] ];
											}
										}
									}
								}
							}
							$layer['image_url'] = RevSliderFunctionsWP::getImageUrlFromPath( $layer['image_url'] );
						}

						$layer['text'] = stripslashes( $layer['text'] );

						if ( isset( $layer['type'] ) && ($layer['type'] == 'video' || $layer['type'] == 'audio') ) {

							$video_data = (isset( $layer['video_data'] )) ? (array) $layer['video_data'] : array();

							if ( ! empty( $video_data ) && isset( $video_data['video_type'] ) && $video_data['video_type'] == 'html5' ) {

								if ( isset( $video_data['urlPoster'] ) && $video_data['urlPoster'] != '' ) {
									$video_data['urlPoster'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlPoster'] ) );
								}

								if ( isset( $video_data['urlMp4'] ) && $video_data['urlMp4'] != '' ) {
									$video_data['urlMp4'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlMp4'] ) );
								}
								if ( isset( $video_data['urlWebm'] ) && $video_data['urlWebm'] != '' ) {
									$video_data['urlWebm'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlWebm'] ) );
								}
								if ( isset( $video_data['urlOgv'] ) && $video_data['urlOgv'] != '' ) {
									$video_data['urlOgv'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlOgv'] ) );
								}
							} elseif ( ! empty( $video_data ) && isset( $video_data['video_type'] ) && $video_data['video_type'] != 'html5' ) { // video cover image
								if ( $video_data['video_type'] == 'audio' ) {
									if ( isset( $video_data['urlAudio'] ) && $video_data['urlAudio'] != '' ) {
										$video_data['urlAudio'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['urlAudio'] ) );
									}
								} else {
									if ( isset( $video_data['previewimage'] ) && $video_data['previewimage'] != '' ) {
										$video_data['previewimage'] = RevSliderFunctionsWP::getImageUrlFromPath( $this->sliderDummyImage( $video_data['previewimage'] ) );
									}
								}
							}

							$layer['video_data'] = $video_data;
						}

						if ( isset( $layer['type'] ) && $layer['type'] == 'svg' ) {
							if ( isset( $layer['svg'] ) && isset( $layer['svg']->src ) ) {
								$layer['svg']->src = str_replace( '/plugins/revslider/public/assets/assets/svg/', '', $content_url . $layer['svg']->src );
							}
						}

						if ( isset( $layer['layer_action'] ) ) {
							if ( isset( $layer['layer_action']->jump_to_slide ) && ! empty( $layer['layer_action']->jump_to_slide ) ) {
								foreach ( $layer['layer_action']->jump_to_slide as $jtsk => $jtsval ) {
									if ( isset( $slider_map[ $jtsval ] ) ) {
										$layer['layer_action']->jump_to_slide[ $jtsk ] = $slider_map[ $jtsval ];
									}
								}
							}
						}

						$link_slide = RevSliderFunctions::getVal( $layer, 'link_slide', false );
						if ( $link_slide != false && $link_slide !== 'nothing' ) { // link to slide/scrollunder is set, move it to actions
							if ( ! isset( $layer['layer_action'] ) ) {
								$layer['layer_action'] = new stdClass(); }

							switch ( $link_slide ) {
								case 'link':
									$link									 = RevSliderFunctions::getVal( $layer, 'link' );
									$link_open_in							 = RevSliderFunctions::getVal( $layer, 'link_open_in' );
									$layer['layer_action']->action		 = array( 'a' => 'link' );
									$layer['layer_action']->link_type		 = array( 'a' => 'a' );
									$layer['layer_action']->image_link	 = array( 'a' => $link );
									$layer['layer_action']->link_open_in	 = array( 'a' => $link_open_in );

									unset( $layer['link'] );
									unset( $layer['link_open_in'] );
								case 'next':
									$layer['layer_action']->action			 = array( 'a' => 'next' );
									break;
								case 'prev':
									$layer['layer_action']->action			 = array( 'a' => 'prev' );
									break;
								case 'scroll_under':
									$scrollunder_offset							 = RevSliderFunctions::getVal( $value, 'scrollunder_offset' );
									$layer['layer_action']->action			 = array( 'a' => 'scroll_under' );
									$layer['layer_action']->scrollunder_offset = array( 'a' => $scrollunder_offset );

									unset( $layer['scrollunder_offset'] );
									break;
								default: // its an ID, so its a slide ID
									$layer['layer_action']->action		 = array( 'a' => 'jumpto' );
									$layer['layer_action']->jump_to_slide	 = array( 'a' => $slider_map[ $link_slide ] );
									break;
							}
							$layer['layer_action']->tooltip_event = array( 'a' => 'click' );

							unset( $layer['link_slide'] );

							$did_change = true;
						}

						$layers[ $key ] = $layer;
					}

					// create new slide
					$arrCreate					 = array();
					$arrCreate['slider_id']	 = $sliderID;

					$my_layers	 = json_encode( $layers );
					if ( empty( $my_layers ) ) {
						$my_layers	 = stripslashes( json_encode( $layers ) ); }
					$my_params	 = json_encode( $params );
					if ( empty( $my_params ) ) {
						$my_params	 = stripslashes( json_encode( $params ) ); }
					$my_settings = json_encode( $settings );
					if ( empty( $my_settings ) ) {
						$my_settings = stripslashes( json_encode( $settings ) ); }

					$arrCreate['layers']	 = $my_layers;
					$arrCreate['params']	 = $my_params;
					$arrCreate['settings'] = $my_settings;

					if ( $sliderExists ) {
						unset( $arrCreate['slider_id'] );
						$this->db->update( RevSliderGlobals::$table_static_slides, $arrCreate, array( 'slider_id' => $sliderID ) );
					} else {
						$this->db->insert( RevSliderGlobals::$table_static_slides, $arrCreate );
					}
				}
			}

			$c_slider = new RevSliderSlider();
			$c_slider->initByID( $sliderID );

			// check to convert styles to latest versions
			RevSliderPluginUpdate::update_css_styles(); // set to version 5
			RevSliderPluginUpdate::add_animation_settings_to_layer( $c_slider ); // set to version 5
			RevSliderPluginUpdate::add_style_settings_to_layer( $c_slider ); // set to version 5
			RevSliderPluginUpdate::change_settings_on_layers( $c_slider ); // set to version 5
			RevSliderPluginUpdate::add_general_settings( $c_slider ); // set to version 5
			RevSliderPluginUpdate::change_general_settings_5_0_7( $c_slider ); // set to version 5.0.7

			$cus_js = $c_slider->getParam( 'custom_javascript', '' );

			if ( strpos( $cus_js, 'revapi' ) !== false ) {
				if ( preg_match_all( '/revapi[0-9]*/', $cus_js, $results ) ) {

					if ( isset( $results[0] ) && ! empty( $results[0] ) ) {
						foreach ( $results[0] as $replace ) {
							$cus_js = str_replace( $replace, 'revapi' . $sliderID, $cus_js );
						}
					}

					$c_slider->updateParam( array( 'custom_javascript' => $cus_js ) );
				}
			}
		} catch ( Exception $e ) {
			$errorMessage = $e->getMessage();
			return(array( 'success' => false, 'error' => $errorMessage, 'sliderID' => $sliderID ));
		}

		return(array( 'success' => true, 'sliderID' => $sliderID ));
	}

	/**
	 * Return file base name, and slider slug
	 */
	private function getBaseName() {
		return pathinfo( $this->getImportFilePath(), PATHINFO_FILENAME );
		;
	}

	public function setImportFilePath( $path ) {
		$this->import_file_path = $path;
		return $this;
	}

	private function getImportFilePath() {
		return $this->import_file_path;
	}

	private function sliderDummyImage( $url ) {
		if ( $url ) {
			if ( $fileName = pathinfo( $url, PATHINFO_BASENAME ) ) {
				return $this->getDummyImgDir() . $fileName;
			}
		}
		return $url;
	}

	private function setDummyImgDir() {
		$this->dummy_img_url = get_template_directory_uri() . self::DUMMY_IMG_PATH;
	}

	private function getDummyImgDir() {
		return $this->dummy_img_url;
	}
}

?>
