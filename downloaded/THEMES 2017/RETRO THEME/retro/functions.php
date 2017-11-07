<?php
$customize_iterator = 1;
// Defines
define( 'SHORTNAME', 'rt' );   // Required!!
define( 'THEMENAME', 'Retro' ); // Required!!
define( 'TEXTDOMAIN', 'retro' ); // Required!!
defined( 'CLASS_DIR_PATH' ) || define( 'CLASS_DIR_PATH', get_template_directory() . '/classes/' ); // Path to classes folder in Theme
$tmp = array();
if ( ! function_exists( 'wp_auto_loader' ) ) {

	function wp_auto_loader( $class ) {
		$theme_class_path = CLASS_DIR_PATH . str_replace( '_', DIRECTORY_SEPARATOR, $class ) . '.php';
		if ( ! class_exists( $class ) ) {
			if ( file_exists( $theme_class_path ) && is_readable( $theme_class_path ) ) {
				include_once( $theme_class_path );

				return true;
			}
		}

		return false;
	}
}
spl_autoload_register( 'wp_auto_loader' );

define( 'ICL_AFFILIATE_ID', 7410 );
define( 'ICL_AFFILIATE_KEY', '52286484063b643175cdfd8e743f1448' );


locate_template( array( 'wpml-integration.php' ), true, true );


// *** THEME ADMIN OBJECT ****//
$themeicon     = get_template_directory_uri() . '/backend/img/olegnax.ico';
$rt_admin_menu = new Admin_Theme_Menu( THEMENAME );
$rt_admin_menu->setMenuSlug( SHORTNAME . '_general' )
              ->setAdminMenuName( 'Theme Options' )
              ->setIconUrl( $themeicon );

// Load admin options
locate_template( array( 'backend/setup.php' ), true, true );

// Load metabox
locate_template( array( 'lib/metabox/functions.php' ), true, true );

locate_template( array( 'lib/shortcode/shortcodes.php' ), true, true );
locate_template( array( 'lib/tweaks.php' ), true, true );

// Plugin activation
locate_template( array( 'lib/plugins/class-tgm-plugin-activation.php' ), true, true );
locate_template( array( 'lib/plugins/plugins.php' ), true, true );

// Visual composer
add_action( 'vc_before_init', 'ox_vcSetAsTheme' );

function ox_vcSetAsTheme() {

	vc_set_as_theme();
}

// hack to except conflict with revslider plugin
if ( ! in_array( 'revslider/revslider.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && basename( filter_input( 5, 'SCRIPT_FILENAME' ) ) != 'plugins.php' && ! ( isset( $_GET['page'] ) && $GLOBALS['tgmpa']->menu === $_GET['page'] ) ) {
	locate_template( array( 'lib/revslider/revslider.php' ), true, true );
}

global $revSliderVersion;
if ( version_compare( '5.0.8', $revSliderVersion, 'le' ) ) {

	if ( ! function_exists( 'ox_rev_sliders_fixjs' ) ) {

		function ox_rev_sliders_fixjs() {
			global $revSliderVersion;
			if ( wp_script_is( 'revmin' ) ) {
				wp_dequeue_script( 'revmin' );
				wp_deregister_script( 'revmin' );
				if ( version_compare( '5.2.6', $revSliderVersion, '>=' ) ) {
					wp_register_script( 'revmin', get_template_directory_uri() . '/js/revslider5/source/jquery.themepunch.revolution.5.2.6.js', 'tp-tools', RevSliderGlobals::SLIDER_REVISION );
				} elseif ( version_compare( '5.4.3', $revSliderVersion, '<=' ) ) {
					wp_register_script( 'revmin', get_template_directory_uri() . '/js/revslider5/source/jquery.themepunch.revolution.5.4.3.js', 'tp-tools', RevSliderGlobals::SLIDER_REVISION );
				} elseif ( version_compare( '5.4', $revSliderVersion, '<=' ) ) {
					wp_register_script( 'revmin', get_template_directory_uri() . '/js/revslider5/source/jquery.themepunch.revolution.5.4.1.js', 'tp-tools', RevSliderGlobals::SLIDER_REVISION );
				} elseif ( version_compare( '5.3.1.4', $revSliderVersion, '<=' ) ) {
					wp_register_script( 'revmin', get_template_directory_uri() . '/js/revslider5/source/jquery.themepunch.revolution.5.3.1.4.js', 'tp-tools', RevSliderGlobals::SLIDER_REVISION );
				} else {
					wp_register_script( 'revmin', get_template_directory_uri() . '/js/revslider5/source/jquery.themepunch.revolution.js', 'tp-tools', RevSliderGlobals::SLIDER_REVISION );
				}
				wp_localize_script( 'revmin', 'revmin_retro', array(
					'jsFileLocation' => get_template_directory_uri() . '/js/revslider5/extensions/source/',
					// @todo fix to minjs
				) );
				wp_enqueue_script( 'revmin' );
			}
			if ( wp_script_is( 'unite_settings' ) ) {
				wp_enqueue_script( 'unite_settings_retro', get_template_directory_uri() . '/js/revslider5/settings.js', 'jquery', RevSliderGlobals::SLIDER_REVISION );
			}
		}
	}

	if ( ! function_exists( 'ox_rev_default_navigations' ) ) {

		function ox_rev_default_navigations( $navigations ) {
			$navigations[] = array(
				'id'       => 6000,
				'default'  => false,
				'name'     => 'Retro',
				'handle'   => 'retro',
				'markup'   => '{"arrows":"<div class=\\\\\\"tparrows-inner\\\\\\"><\\/div>","bullets":"<div class=\\\\\\"bullet-custom\\\\\\">{{index}}<\\/div><div class=\\\\\\"slidetitle\\\\\\">{{title}}<\\/div>"}',
				'css'      => '{"arrows":".retro.tp-bullets { margin: 0 auto !important; left: inherit!important; bottom: 0!important; overflow: hidden; text-align: center; height: 118px; line-height: 107px; z-index: 100; visibility: visible !important; opacity: 1 !important; position: relative; } .retro.tp-bullets:before { content: \'\'; position: absolute; bottom: 0; top: 83px; display: block; width: 100%; } .retro.tp-bullets span { position: relative; display: inline-block; line-height: normal; height: 53px; margin-top: 25px } .tparrows.retro{ position: relative; } .tparrows.retro { display: inline-block; width: 53px; height: 53px; border-radius: 100%; border: 1px solid #c7ab96; background: #fffbf4; text-align: center; transition: all .2s linear; } .tparrows.retro .tparrows-inner { border-radius: 100%; border: 1px solid #c7ab96; width: 49px; height: 49px; margin: 1px; display: block; transition: all .2s linear; background-image: url(' . get_template_directory_uri() . '/images/sprite-round-old.png); background-repeat: no-repeat; background-color: #fffbf4; } .tp-leftarrow.retro { margin-right: 64px;} .tp-leftarrow.retro .tparrows-inner { background-position: 0 0;} .tp-leftarrow.retro:hover .tparrows-inner { background-position: 100% 0;} .tp-rightarrow.retro { float: right!important; margin-left: 64px;} .tp-rightarrow.retro .tparrows-inner { background-position: 100% 100%;} .tp-rightarrow.retro:hover .tparrows-inner { background-position: 0 100%;} .tp-rightarrow.retro:hover .tparrows-inner,.tp-leftarrow.retro:hover .tparrows-inner{background-color: #959D3F;border-color: transparent;}.tparrows.tp-leftarrow.retro{float: left !important;}.tparrows.tp-leftarrow.retro,.tparrows.tp-rightarrow.retro{visibility: visible !important;opacity: 1 !important;}.tparrows.tp-leftarrow.retro:before,.tparrows.tp-rightarrow.retro:before{ content: none; }","bullets":".retro.tp-bullets { margin: 0 auto !important; left: inherit!important; bottom: 0!important; overflow: hidden; text-align: center; height: 118px; line-height: 107px; z-index: 100; visibility: visible !important; opacity: 1 !important; position: relative; } .retro.tp-bullets:before { content: \'\'; position: absolute; top: 83px; bottom: 0; display: block; width: 100%; } .retro.tp-bullets span { position: relative; display: inline-block; line-height: normal; height: 53px; } .retro.tp-bullets .tp-bullet { position: relative; font-size: 20px; font-weight: 400; display: inline-block; width: 53px; height: 53px; border-radius: 100%; border: 1px solid #c7ab96; background: #fffbf4; color: #695751; font-family: \'BazarMedium\',sans-serif; line-height: 52px; text-align: center; cursor: pointer; z-index: 2; } .retro.tp-bullets .tp-bullet, .retro.tp-bullets .bullet-custom { -moz-transition: all .2s linear; -o-transition: all .2s linear; -webkit-transition: all .2s linear; } .retro.tp-bullets .bullet-custom { border-radius: 100%; background: #fffbf4; border: 1px solid #c7ab96; width: 49px; height: 49px; margin: 1px; display: block; -moz-transition: background .2s; -webkit-transition: background .2s; -o-transition: background .2s; } .retro.tp-bullets .tp-bullet:hover, .retro.tp-bullets .tp-bullet.selected { color: #fff; } .retro.tp-bullets .separator { display: inline-block; margin-top: 27px; width: 64px; line-height: 0; vertical-align: top; } .retro.tp-bullets .separator > div { width: 0; height: 1px; background: rgba(41,17,12,.78); }"}',
				'settings' => '{"width":{"thumbs":"200","arrows":"160","bullets":"160","tabs":"160"},"height":{"thumbs":"130","arrows":"160","bullets":"160","tabs":"31"},"original":{"css":{"arrows":".retro.tp-bullets { margin: 0 auto !important; left: inherit!important; bottom: 0!important; overflow: hidden; text-align: center; height: 118px; line-height: 107px; z-index: 100; visibility: visible !important; opacity: 1 !important; position: relative; } .retro.tp-bullets:before { content: \'\'; position: relative; bottom: 0; display: block; width: 100%; } .retro.tp-bullets span { position: relative; display: inline-block; line-height: normal; height: 53px; } .tparrows.retro{ position: relative; } .tparrows.retro { display: inline-block; width: 53px; height: 53px; border-radius: 100%; border: 1px solid #c7ab96; background: #fffbf4; text-align: center; transition: all .2s linear; } .tparrows.retro .tparrows-inner { border-radius: 100%; border: 1px solid #c7ab96; width: 49px; height: 49px; margin: 1px; display: block; transition: all .2s linear; background-image: url(' . get_template_directory_uri() . '/images/sprite-round-old.png); background-repeat: no-repeat; background-color: #fffbf4; } .tp-leftarrow.retro { margin-right: 64px;} .tp-leftarrow.retro .tparrows-inner { background-position: 0 0;} .tp-leftarrow.retro:hover .tparrows-inner { background-position: 100% 0;} .tp-rightarrow.retro { float: right!important; margin-left: 64px;} .tp-rightarrow.retro .tparrows-inner { background-position: 100% 100%;} .tp-rightarrow.retro:hover .tparrows-inner { background-position: 0 100%;} .tp-rightarrow.retro:hover .tparrows-inner,.tp-leftarrow.retro:hover .tparrows-inner { background-color: #959D3F; border-color: transparent;}.tparrows.tp-leftarrow.retro{float: left !important;}.tparrows.tp-leftarrow.retro,.tparrows.tp-rightarrow.retro{visibility: visible !important;opacity: 1 !important;}.tparrows.tp-leftarrow.retro:before,.tparrows.tp-rightarrow.retro:before{ content: none; }","bullets":".retro.tp-bullets { margin: 0 auto !important; left: inherit!important; bottom: 0!important; overflow: hidden; text-align: center; height: 118px; line-height: 107px; z-index: 100; visibility: visible !important; opacity: 1 !important; position: relative; } .retro.tp-bullets:before { content: \'\'; position: relative; bottom: 0; display: block; width: 100%; } .retro.tp-bullets span { position: relative; display: inline-block; line-height: normal; height: 53px; } .retro.tp-bullets .tp-bullet { position: relative; font-size: 20px; font-weight: 400; display: inline-block; width: 53px; height: 53px; border-radius: 100%; border: 1px solid #c7ab96; background: #fffbf4; color: #695751; font-family: \'BazarMedium\',sans-serif; line-height: 52px; text-align: center; cursor: pointer; z-index: 2; } .retro.tp-bullets .tp-bullet, .retro.tp-bullets .bullet-custom { -moz-transition: all .2s linear; -o-transition: all .2s linear; -webkit-transition: all .2s linear; } .retro.tp-bullets .bullet-custom { border-radius: 100%; background: #fffbf4; border: 1px solid #c7ab96; width: 49px; height: 49px; margin: 1px; display: block; -moz-transition: background .2s; -webkit-transition: background .2s; -o-transition: background .2s; } .retro.tp-bullets .tp-bullet:hover, .retro.tp-bullets .tp-bullet.selected { color: #fff; } .retro.tp-bullets .separator { display: inline-block; margin-top: 27px; width: 64px; line-height: 0; vertical-align: top; } .retro.tp-bullets .separator > div { width: 0; height: 1px; background: rgba(41,17,12,.78); } .tparrows.tp-leftarrow.retro {  float: left !important;  } .tparrows.tp-leftarrow.retro, .tparrows.tp-rightarrow.retro {  visibility: visible !important;  opacity: 1 !important;  } .tparrows.tp-leftarrow.retro:before, .tparrows.tp-rightarrow.retro:before {  content: none;  }"},"markup":{"arrows":"","bullets":""}}}',
			);

			return $navigations;
		}
	}
	add_action( 'wp_enqueue_scripts', 'ox_rev_sliders_fixjs', 15 );
	add_action( 'admin_enqueue_scripts', 'ox_rev_sliders_fixjs', 15 );
	add_filter( 'revslider_mod_default_navigations', 'ox_rev_default_navigations' );

	if ( ! function_exists( 'upgrade_revslider5' ) ) {

		function upgrade_revslider5() {
			$sr      = new RevSlider();
			$sl      = new RevSliderSlide();
			$sliders = $sr->getArrSliders( false );
			if ( ! empty( $sliders ) && is_array( $sliders ) ) {

				foreach ( $sliders as $slider ) {
					$settingssl = $slider->getSettings();

					if ( isset( $settingssl['version'] ) && version_compare( $settingssl['version'], '5.0.7', '==' ) ) {
						$params                              = $slider->getParams();
						$params['rtl_arrows']                = 'off';
						$params['navigation_arrow_style']    = 'retro';
						$params['navigation_arrows_preset']  = 'default';
						$params['rtl_bullets']               = 'off';
						$params['navigation_bullets_style']  = 'retro';
						$params['navigation_bullets_preset'] = 'default';
						$slider->updateParam( $params );
						$slider->updateSetting( array( 'version' => 5 ) );
					}
				}
			}
		}

		upgrade_revslider5();
	}
}


// add_action('init', 'attachRevslider');
locate_template( array( 'customize.php' ), true, true );

/**
 * Custom images size
 */
$theme_images_size = new Custom_Thumbnail(); // varible name use in theme_post_thumbnail function
$theme_images_size->addThemeImageSize( 'recent_posts', 71, 55, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 )
                  ->addThemeImageSize( 'portfolio_widget', 420, 378, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 )
                  ->addThemeImageSize( 'teaser-thumbnail', 920, 440, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 )
                  ->addThemeImageSize( 'square_thumbnail', 279, 177, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 )
                  ->addThemeImageSize( 'post_thumbnail', 1034, 272, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 )
                  ->addThemeImageSize( 'portfolio_big', 674, 231, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 )
                  ->addThemeImageSize( 'portfolio_modern', 310, 186, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 )
                  ->addThemeImageSize( 'portfolio_small', 221, 165, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 )
                  ->addThemeImageSize( 'portfolio_carousel', 265, 187, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 );
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	$shop_catalog_image   = get_option( 'shop_catalog_image_size', array() );
	$shop_thumbnail_image = get_option( 'shop_thumbnail_image_size', array() );
	$shop_single_image    = get_option( 'shop_single_image_size', array() );

	$theme_images_size->addThemeImageSize( 'retro_shop_catalog', isset( $shop_catalog_image['width'] ) ? $shop_catalog_image['width'] : '200', isset( $shop_catalog_image['height'] ) ? $shop_catalog_image['height'] : '200', Custom_Thumbnail::REMOVE_ON_CHANGE, isset( $shop_catalog_image['crop'] ) ? $shop_catalog_image['crop'] : 0 )
	                  ->addThemeImageSize( 'retro_shop_thumbnail', isset( $shop_thumbnail_image['width'] ) ? $shop_thumbnail_image['width'] : '100', isset( $shop_thumbnail_image['height'] ) ? $shop_thumbnail_image['height'] : '100', Custom_Thumbnail::REMOVE_ON_CHANGE, isset( $shop_thumbnail_image['crop'] ) ? $shop_thumbnail_image['crop'] : 0 )
	                  ->addThemeImageSize( 'retro_shop_single', isset( $shop_single_image['width'] ) ? $shop_single_image['width'] : '480', isset( $shop_single_image['height'] ) ? $shop_single_image['height'] : '400', Custom_Thumbnail::REMOVE_ON_CHANGE, isset( $shop_single_image['crop'] ) ? $shop_single_image['crop'] : 0 )
	                  ->addThemeImageSize( 'retro_shop_widget', 69, 69, Custom_Thumbnail::REMOVE_ON_CHANGE, 1 );
}

/**
 * adding custom page type
 */
$portfolio = new Custom_Posts_Type_Portfolio();
$portfolio->run();

$testimonial = new Custom_Posts_Type_Testimonial();
$testimonial->run();

/**
 * Adding custom meta box to post category.
 */
$custom_category_meta = new Custom_MetaBox_Item_Category();
$custom_category_meta->run();

/**
 * Adding custom meta box to post tag.
 */
$custom_tag_met = new Custom_MetaBox_Item_Tag();
$custom_tag_met->run();

/**
 * Adding custom meta box to post category.
 */
$custom_product_category_meta = new Custom_MetaBox_Item_ProductCat();
$custom_product_category_meta->run();

/**
 * Adding custom meta box to post category.
 */
$custom_product_tag_meta = new Custom_MetaBox_Item_ProductTag();
$custom_product_tag_meta->run();


// theme update check
$envato_username = get_option( SHORTNAME . '_envato_nick' );
$envato_api      = get_option( SHORTNAME . '_envato_api' );

if ( $envato_username && $envato_api ) {
	Envato_Theme_Updater::init( $envato_username, $envato_api, 'olegnax' );
}

if ( ! function_exists( 'ox_session_admin_init' ) ) {

	function ox_session_admin_init() {

		if ( get_option( SHORTNAME . '_preview' )/* && !session_id() */ ) {
			if ( ! session_id() ) {
				session_start();
			}

			if ( isset( $_POST['use_session_values'] ) && $_POST['use_session_values'] == 1 ) {
				foreach ( $_POST as $name => $value ) {
					$_SESSION[ $name ] = $value;
				}
			} elseif ( isset( $_GET['rt_active_skin_layout'] ) ) {
				foreach ( $_GET as $name => $value ) {
					$_SESSION[ $name ] = $value;
				}
			} elseif ( isset( $_POST['reset_session_values'] ) && $_POST['reset_session_values'] == 1 || isset( $_GET['rt_active_skin_reset'] ) ) {
				if ( isset( $_SESSION ) && is_array( $_SESSION ) ) {
					foreach ( $_SESSION as $key => $value ) {
						if ( preg_match( '/^' . SHORTNAME . '_.+/', $key ) ) {
							unset( $_SESSION[ $key ] );
						}
					}
				}
			}
		}
	}
}
add_action( 'init', 'ox_session_admin_init' );

/**
 * Do flush_rewrite_rules if slug of custom post type was changed.
 */
if ( ! function_exists( 'ox_flush_rewrite_rules' ) ) {

	function ox_flush_rewrite_rules() {

		if ( get_option( SHORTNAME . '_need_flush_rewrite_rules' ) ) {
			flush_rewrite_rules();
			delete_option( SHORTNAME . '_need_flush_rewrite_rules' );
		}
	}
}
add_action( 'init', 'ox_flush_rewrite_rules' );


if ( ! function_exists( 'change_avatar_css' ) ) {

	function change_avatar_css( $class ) {
		$class = str_replace( "class='avatar", "class='imgborder ", $class );

		return $class;
	}
}
add_filter( 'get_avatar', 'change_avatar_css' );

/**
 * Remove width & height from avatr html
 */
if ( ! function_exists( 'ox_get_avatar' ) ) {

	function ox_get_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
		$avatar = preg_replace( array( '/\swidth=("|\')\d+("|\')/', '/\sheight=("|\')\d+("|\')/' ), '', $avatar );

		return $avatar;
	}
}
add_filter( 'get_avatar', 'ox_get_avatar', 10, 5 );


if ( ! function_exists( 'ox_image_send_to_editor' ) ) {

	function ox_image_send_to_editor( $html ) {
		$html = preg_replace( array( '/\swidth=("|\')\d+("|\')/', '/\sheight=("|\')\d+("|\')/' ), '', $html );

		return $html;
	}
}
add_filter( 'image_send_to_editor', 'ox_image_send_to_editor', 10, 5 );

// Custom menus
add_theme_support( 'menus' ); // sidebar

/**
 * Register all theme widgets
 */
add_action( 'widgets_init', array( 'Widget', 'run' ) );

// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
add_theme_support( 'post-thumbnails' );

load_theme_textdomain( 'retro', get_template_directory() . '/lang' );


add_theme_support( 'automatic-feed-links' );


add_editor_style();


if ( ! isset( $content_width ) ) {
	$content_width = 912;
}


if ( ! function_exists( 'ox_register_menus' ) ) {

	function ox_register_menus() {

		register_nav_menus(
			array(
				'header-menu-left'  => __( 'Header  Menu 1', 'retro' ),
				'header-menu-right' => __( 'Header  Menu 2', 'retro' ),
			)
		);
	}
}
add_action( 'init', 'ox_register_menus' );

// Print styles
if ( ! function_exists( 'ox_add_styles' ) ) {

	function ox_add_styles() {

		wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css', '', null, 'all' );
		wp_enqueue_style( 'typography', get_template_directory_uri() . '/css/typography.css', '', null, 'all' );
		wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/layout.css', '', null, 'all' );
		wp_enqueue_style( 'form', get_template_directory_uri() . '/css/form.css', '', null, 'all' );
		wp_enqueue_style( 'widget', get_template_directory_uri() . '/css/widget.css', '', null, 'all' );
		if ( ! get_option( SHORTNAME . '_fontawesomedisable' ) ) {
			wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', null, 'all' );
		}
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', '', null, 'all' );

		wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/js/prettyphoto/css/prettyPhoto.css', '', null, 'all' );

		$custom_stylesheet = new Custom_CSS_Style();
		$custom_stylesheet->run();

		wp_enqueue_style( 'default', get_stylesheet_directory_uri() . '/style.css', '', null, 'all' );

		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			wp_enqueue_style( 'retro-woocommerce', get_template_directory_uri() . '/css/woocommerce.css', null, 'all' );
		}

		if ( ! get_option( SHORTNAME . '_responsive' ) ) {
			wp_enqueue_style( 'media.queries', get_template_directory_uri() . '/css/media.queries.css', '', null, 'all' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'ox_add_styles' );

/**
 * Add to DB default settings of theme admin page and
 * try to create custom css/skin.css file if dir is writable
 *
 * @global Admin_Theme_Menu $admin_menu
 */
if ( ! function_exists( 'ox_theme_switch' ) ) {

	function ox_theme_switch() {

		defined( 'THEME_ACTIVATION_NOW' ) || define( 'THEME_ACTIVATION_NOW', true );

		global $rt_admin_menu;
		$rt_admin_menu->themeActivation();

		$custom_stylesheet = new Custom_CSS_Style();
		$custom_stylesheet->themeSetup();
		if ( class_exists( 'RevSliderAdmin' ) ) {
			RevSliderAdmin::onActivate();
		}

		wp_redirect( admin_url( 'admin.php?page=' . SHORTNAME . '_dummy' ) );
	}
}
add_action( 'after_switch_theme', 'ox_theme_switch' );

/**
 * Check is theme folder is correct
 * example WP_CONTENT_DIR /themes/theme_folder
 */
if ( ! function_exists( 'isCorrectThemeFolder' ) ) {

	function isCorrectThemeFolder() {

		$theme_dir_path = get_template_directory();
		$standart_path  = WP_CONTENT_DIR . '/themes';
		$theme_dir_name = str_replace( WP_CONTENT_DIR . '/themes', '', $theme_dir_path );
		$theme_dir_name = trim( $theme_dir_name, '\\..\/' ); // delete sleshes

		$path_info = pathinfo( $theme_dir_name );

		if ( isset( $path_info['dirname'] ) && $path_info['dirname'] == '.' ) {
			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'ox_theme_correct_path' ) ) {

	function ox_theme_correct_path() {

		if ( ! isCorrectThemeFolder() ) {
			echo '<div id="message" class="error">';
			echo '<p><strong>You have installed theme incorrectly!</strong> Please, check instructions at documentation.</p></div>';
		}
	}
}
add_action( 'admin_notices', 'ox_theme_correct_path' );

// print scripts
if ( ! function_exists( 'ox_register_scripts' ) ) {

	function ox_register_scripts() {

		wp_register_script( 'modernizer', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ), null );
		wp_register_script( 'ox_scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), null, true );
		wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish/superfish.js', array( 'jquery' ), null, true );
		wp_register_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ), null, true ); // Shortcode Contact form
		wp_register_script( 'jcycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', array( 'jquery' ), null, true );  // Widget Testimonials
		wp_register_script( 'prettyphoto', get_template_directory_uri() . '/js/prettyphoto/js/jquery.prettyPhoto.js', array( 'jquery' ), null, true );  // lightbox
		wp_register_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), null, true );  // isotope filterable gallery
		wp_register_script( 'preview', get_template_directory_uri() . '/js/preview.js', array( 'jquery' ), null, true );
		wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), null, true );
		wp_register_script( 'ox_colorpicker', get_template_directory_uri() . '/backend/js/mColorPicker/javascripts/mColorPicker.js', array( 'jquery' ), null, true );
		wp_register_script( 'sharrre', get_template_directory_uri() . '/js/jquery.sharrre.min.js', array( 'jquery' ), null, true );
		wp_register_script( 'jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', array( 'jquery' ), null, true );  // audio jPlayer

		$ajax_data = array(
			'admin_url' => admin_url( 'admin-ajax.php' ),
		);

		wp_localize_script( 'ox_scripts', 'ThemeData', $ajax_data );

		$i18n = array(
			'view'             => __( 'view', 'retro' ),
			'wrong_connection' => __( 'Something going wrong with connection...', 'retro' ),
		);
		wp_localize_script( 'ox_scripts', 'Theme_i18n', $i18n );

		if ( ! is_admin() && ! in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) {
			wp_enqueue_script( 'modernizer' );
			wp_enqueue_script( 'superfish' );
			wp_enqueue_script( 'prettyphoto' );

			wp_enqueue_script( 'flexslider' );

			wp_enqueue_script( 'ox_scripts' );
			if ( get_option( SHORTNAME . '_preview' ) ) {
				wp_enqueue_script( 'preview' );
				wp_enqueue_script( 'ox_colorpicker' );
			}
		}
	}
}

add_action( 'init', 'ox_register_scripts' );


/*
 * meta functions for easy access:
 */

// get term meta field
if ( ! function_exists( 'get_tax_meta' ) ) {

	function get_tax_meta( $term_id, $key, $multi = false ) {
		$t_id = ( is_object( $term_id ) ) ? $term_id->term_id : $term_id;
		$m    = get_option( 'tax_meta_' . $t_id );
		if ( isset( $m[ $key ] ) ) {
			return $m[ $key ];
		} else {
			return '';
		}
	}
}

// delete meta
if ( ! function_exists( 'delete_tax_meta' ) ) {

	function delete_tax_meta( $term_id, $key ) {
		$m = get_option( 'tax_meta_' . $term_id );
		if ( isset( $m[ $key ] ) ) {
			unset( $m[ $key ] );
		}
		update_option( 'tax_meta_' . $term_id, $m );
	}
}

// update meta
if ( ! function_exists( 'update_tax_meta' ) ) {

	function update_tax_meta( $term_id, $key, $value ) {
		$m         = get_option( 'tax_meta_' . $term_id );
		$m[ $key ] = $value;
		update_option( 'tax_meta_' . $term_id, $m );
	}
}

if ( ! function_exists( 'get_theme_post_thumbnail' ) ) {

	function get_theme_post_thumbnail( $id, $size = 'thumbnail' ) {
		global $theme_images_size;
		if ( $theme_images_size instanceof Custom_Thumbnail ) {
			$theme_images_size->getThumbnail( $id, $size );
		} else {
			the_post_thumbnail( $size );
		}
	}
}

if ( ! function_exists( 'theme_post_thumbnail_src' ) ) {

	function theme_post_thumbnail_src( $thum_id, $size = 'thumbnail' ) {
		global $theme_images_size;
		if ( $theme_images_size instanceof Custom_Thumbnail ) {
			return $theme_images_size->getThumbnailSrc( $thum_id, $size );
		} else {
			return wp_get_attachment_image_src( $thum_id, $size );
		}
	}
}

/**
 * Croping slide thumbnail if slide size not exist in post meta
 *
 * @param int $id post ID
 * @param int $width needed width
 * @param int $height needed height
 */
if ( ! function_exists( 'get_theme_slideshow_thumbnail' ) ) {

	function get_theme_slideshow_thumbnail( $id, $width, $height ) {
		Custom_Thumbnail_Slideshow::getInstance()->getThumbnail( $id, $width, $height );
	}
}

if ( ! function_exists( 'timezome_time' ) ) {

	function timezome_time() {

		return time() + get_option( 'gmt_offset', 0 ) * 3600;
	}
}


if ( ! function_exists( 'set_per_page' ) ) {

	function set_per_page( $query ) {
		if ( is_category() || is_tag() || is_tax() ) {
			global $wp_query;
			$term = $wp_query->get_queried_object();
			if ( $term ) {
				if ( get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_number', true ) ) {
					$post_count = get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_number', true );
					$query->set( 'posts_per_page', $post_count );
				}
			}
		}

		return $query;
	}
}

if ( ! is_admin() ) {
	add_action( 'pre_get_posts', 'set_per_page' );
}


if ( ! function_exists( 'description_in_nav_el' ) ) {

	function description_in_nav_el( $item_output, $item, $depth, $args ) {
		if ( $item->description ) {
			$replacement = "<span class='menu-title'>{$item->description}&nbsp;</span><";
		} else {
			$replacement = "<span class='empty-title'></span><";
		}

		return preg_replace( '/(<a.*?>[^<]*?)</', '$1' . $replacement, $item_output );
	}
}
add_filter( 'walker_nav_menu_start_el', 'description_in_nav_el', 10, 4 );


if ( ! function_exists( 'my_replaceblankparas' ) ) {

	function my_replaceblankparas( $content ) {
		return str_replace( '<p>&nbsp;</p>', '<br>', $content );
	}
}
add_filter( 'the_content', 'my_replaceblankparas' );
add_filter( 'the_excerpt', 'my_replaceblankparas' );

/* ---------------------------------------------- */

// Sidebars
register_sidebar( array(
	'id'            => 'default-sidebar',
	'description'   => __( 'The default sidebar!', 'retro' ),
	'name'          => 'Default sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
) );

register_sidebar( array(
	'id'            => 'footer-1',
	'name'          => 'Footer Column 1',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4  class="widget-title">',
	'after_title'   => '</h4>',
) );

register_sidebar( array(
	'id'            => 'footer-2',
	'name'          => 'Footer Column 2',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4  class="widget-title">',
	'after_title'   => '</h4>',
) );

register_sidebar( array(
	'id'            => 'footer-3',
	'name'          => 'Footer Column 3',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4  class="widget-title">',
	'after_title'   => '</h4>',
) );

register_sidebar( array(
	'id'            => 'footer-4',
	'name'          => 'Footer Column 4',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4  class="widget-title">',
	'after_title'   => '</h4>',
) );

// WOO
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	add_action( 'wp_enqueue_scripts', 'ox_remove_woo_lightbox', 99 );

	function ox_remove_woo_lightbox() {

		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
	}

	$woo_ratio             = 0.86;
	$responsive_ratio_1024 = 1;
	$responsive_ratio_768  = 1;
	$responsive_ratio_480  = 1;

	// 1 => 1
	if ( $shop_catalog_image['width'] > 495 ) {
		$woo_ratio = 0.65;
	} // 2 => 2
	elseif ( $shop_catalog_image['width'] > 316 && $shop_catalog_image['width'] <= 495 ) {
		$woo_ratio             = 0.63;
		$responsive_ratio_1024 = 0.848;
		$responsive_ratio_768  = 0.59;
	} // 3 => 2
	elseif ( $shop_catalog_image['width'] > 226 && $shop_catalog_image['width'] <= 316 ) {
		$woo_ratio             = 0.99;
		$responsive_ratio_1024 = 0.84;
		$responsive_ratio_768  = 0.93;
		$responsive_ratio_480  = 0.62;
	} // 4 => 3
	elseif ( $shop_catalog_image['width'] > 172 && $shop_catalog_image['width'] <= 226 ) {
		$woo_ratio             = 0.86;
		$responsive_ratio_1024 = 0.835;
		$responsive_ratio_768  = 0.8;
		$responsive_ratio_480  = 0.87;
	} // 5 => 4
	elseif ( $shop_catalog_image['width'] > 136 && $shop_catalog_image['width'] <= 172 ) {
		$woo_ratio             = 0.79;
		$responsive_ratio_1024 = 0.82;
		$responsive_ratio_768  = 0.73;
		$responsive_ratio_480  = 0.68;
	} // 6 => 4
	elseif ( $shop_catalog_image['width'] > 110 && $shop_catalog_image['width'] <= 136 ) {
		$woo_ratio             = 1;
		$responsive_ratio_1024 = 0.81;
		$responsive_ratio_768  = 0.91;
		$responsive_ratio_480  = 0.86;
	} // 7 => 5
	elseif ( $shop_catalog_image['width'] <= 100 ) {
		$woo_ratio = 1;
	}


	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return get_option("woo_catalog_perpage");' ), 20 );

	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
	add_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 30 );


	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
	add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
	add_action( 'woocommerce_after_main_content', 'woocommerce_pagination', 10 );

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_after_shop_loop_item_image', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	add_action( 'retro_woocommerce_bottom_content', 'woocommerce_upsell_display', 15 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_single_product_meta', 7 );
	if ( get_option( 'woocommerce_product_listing_info_button' ) == 'yes' ) {
		add_action( 'woocommerce_after_shop_loop_item_image', 'woocommerce_loop_item_info_button', 20 );
	}

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
	remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );


	/* disable woo new label styles */
	add_filter( 'woocommerce_new_badge_enqueue_styles', 'remove_new_badge_styles' );

	function remove_new_badge_styles() {

		return false;
	}

	function woocommerce_loop_item_info_button() {

		global $product;
		if ( $product->is_purchasable() && $product->is_in_stock() ) {
			echo "<div class='tinvwl-add-to-cart-wrap'><a class='button' href='" . get_permalink( $product->get_id() ) . "'>" . __( 'More info', 'retro' ) . "</a>";
			?>
			<div class="tinvwl-tooltip"><span><?php esc_html_e( 'More info', 'retro' ); ?></span></div></div>
			<?php
		}
	}

	function woocommerce_get_product_thumbnail( $size = 'retro_shop_catalog', $placeholder_width = 0, $placeholder_height = 0 ) {
		global $post, $post_layout, $woo_ratio;
		$shop_catalog_image = get_option( 'shop_catalog_image_size', array() );
		$width              = isset( $shop_catalog_image['width'] ) ? $shop_catalog_image['width'] : '300';
		$height             = isset( $shop_catalog_image['height'] ) ? $shop_catalog_image['height'] : '300';

		if ( has_post_thumbnail() ) {
			$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
			ob_start();
			get_theme_post_thumbnail( $post->ID, $size );
			$html        = ob_get_clean();
			$span_height = ( $post_layout == 'layout_none_sidebar' ) ? $image_attributes[2] : round( $image_attributes[2] * $woo_ratio );
			$html        = '<span class="thumb_holder">' . $html . '</span>';

			return $html;
		} elseif ( wc_placeholder_img_src() ) {
			$image_height = ( $post_layout == 'layout_none_sidebar' ) ? $height : round( $height * $woo_ratio );

			return '<img src="' . wc_placeholder_img_src() . '" alt="' . __( 'Placeholder', 'retro' ) . '" width="' . $width . '" height="' . $image_height . '" style="height:' . $image_height . 'px" class="img_placeholder" />';
		}
	}

	function woocommerce_subcategory_thumbnail( $category ) {
		global $woocommerce;

		$small_thumbnail_size = apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' );
		$dimensions           = wc_get_image_size( $small_thumbnail_size );

		$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

		if ( $thumbnail_id ) {
			$image = theme_post_thumbnail_src( $thumbnail_id, 'retro_shop_catalog' );
			$image = $image[0];
		} else {
			$image = wc_placeholder_img_src();
		}
		if ( $image ) {
			echo '<img src="' . $image . '" alt="' . $category->name . '" width="' . $dimensions['width'] . '" height="' . $dimensions['height'] . '" />';
		}
	}

	function woocommerce_widgets_thumbnails( $size = 'retro_shop_widget' ) {
		global $post;

		$image = '';

		if ( has_post_thumbnail( $post->ID ) ) {
			ob_start();
			get_theme_post_thumbnail( $post->ID, $size );
			$image = ob_get_clean();
		} elseif ( ( $parent_id = wp_get_post_parent_id( $post->ID ) ) && has_post_thumbnail( $parent_id ) ) {
			ob_start();
			get_theme_post_thumbnail( $parent_id, $size );
			$image = ob_get_clean();
		} else {
			$image = '<img src="' . wc_placeholder_img_src() . '" alt="' . __( 'Placeholder', 'retro' ) . '"  class="img_placeholder" />';
		}

		return $image;
	}

	function add_product_listing_new_label() {

		$settings = array(
			array(
				'name' => '',
				'type' => 'title',
				'id'   => 'wc_nb_options_colors',
			),
			array(
				'name'    => __( 'New Label Background color', 'retro' ),
				'desc'    => '',
				'id'      => 'wc_nb_newness_background',
				'default' => '#e7a82d',
				'type'    => 'color',
			),
			array(
				'name'    => __( 'New Label Font color', 'retro' ),
				'desc'    => '',
				'id'      => 'wc_nb_newness_color',
				'default' => '#ffffff',
				'type'    => 'color',
			),
			array( 'type' => 'sectionend', 'id' => 'wc_nb_options_colors' ),
		);
		woocommerce_admin_fields( $settings );
	}

	function save_product_listing_new_label() {

		$settings = array(
			array(
				'name' => '',
				'type' => 'title',
				'id'   => 'wc_nb_options_colors',
			),
			array(
				'name'    => __( 'New Label Background Color', 'retro' ),
				'desc'    => '',
				'id'      => 'wc_nb_newness_background',
				'default' => '#e7a82d',
				'type'    => 'color',
			),
			array(
				'name'    => __( 'New Label Font Color', 'retro' ),
				'desc'    => '',
				'id'      => 'wc_nb_newness_color',
				'default' => '#ffffff',
				'type'    => 'color',
			),
			array( 'type' => 'sectionend', 'id' => 'wc_nb_options_colors' ),
		);
		woocommerce_update_options( $settings );
	}

	if ( in_array( 'woocommerce-new-product-badge/new-badge.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		add_action( 'woocommerce_settings_image_options_after', 'add_product_listing_new_label', 30 );
		add_action( 'woocommerce_update_options_products', 'save_product_listing_new_label' );
		add_action( 'woocommerce_before_single_product_summary', array(
			$WC_nb,
			'woocommerce_show_product_loop_new_badge'
		), 30 );  // The new badge function
	}

	function add_product_listing_sale_label() {

		$settings = array(
			array(
				'name' => 'Sale Label Options',
				'type' => 'title',
				'id'   => 'woo_sale_label_colors',
			),
			array(
				'name'    => __( 'Sale Label Background Color', 'retro' ),
				'desc'    => '',
				'id'      => 'woo_sale_label_background',
				'default' => '#939b38',
				'type'    => 'color',
			),
			array(
				'name'    => __( 'Sale Label Font Color', 'retro' ),
				'desc'    => '',
				'id'      => 'woo_sale_label_color',
				'default' => '#ffffff',
				'type'    => 'color',
			),
			array( 'type' => 'sectionend', 'id' => 'woo_sale_label_colors' ),
		);
		woocommerce_admin_fields( $settings );
	}

	function save_product_listing_sale_label() {

		$settings = array(
			array(
				'name' => 'Sale Label Options',
				'type' => 'title',
				'id'   => 'woo_sale_label_colors',
			),
			array(
				'name'    => __( 'Sale Label Background Color', 'retro' ),
				'desc'    => '',
				'id'      => 'woo_sale_label_background',
				'default' => '#939b38',
				'type'    => 'color',
			),
			array(
				'name'    => __( 'Sale Label Font Color', 'retro' ),
				'desc'    => '',
				'id'      => 'woo_sale_label_color',
				'default' => '#ffffff',
				'type'    => 'color',
			),
			array( 'type' => 'sectionend', 'id' => 'woo_sale_label_colors' ),
		);
		woocommerce_update_options( $settings );
	}

	add_action( 'woocommerce_settings_pricing_options_after', 'add_product_listing_sale_label', 30 );
	add_action( 'woocommerce_update_options_general', 'save_product_listing_sale_label' );

	function add_product_listing_perpage() {

		$settings = array(
			array(
				'name' => 'Listing Options',
				'type' => 'title',
				'id'   => 'woo_listing_perpage',
			),
			array(
				'name'    => __( 'Listing Per Page', 'retro' ),
				'desc'    => __( 'products', 'retro' ),
				'id'      => 'woo_catalog_perpage',
				'default' => '12',
				'type'    => 'number',
			),
			array(
				'name'    => '',
				'desc'    => __( 'Show  product  info button in product listing.', 'retro' ),
				'id'      => 'woocommerce_product_listing_info_button',
				'default' => 'yes',
				'type'    => 'checkbox',
			),
			array(
				'name'    => '',
				'desc'    => __( 'Hide categories from product page.', 'retro' ),
				'id'      => 'woocommerce_product_page_categories',
				'default' => 'no',
				'type'    => 'checkbox',
			),
			array( 'type' => 'sectionend', 'id' => 'woo_listing_perpage' ),
		);
		add_option( 'woo_catalog_perpage', '12' );
		woocommerce_admin_fields( $settings );
	}

	function save_product_listing_perpage() {

		$settings = array(
			array(
				'name' => 'Listing Options',
				'type' => 'title',
				'id'   => 'woo_listing_perpage',
			),
			array(
				'name'    => __( 'Listing Per Page', 'retro' ),
				'desc'    => __( 'products', 'retro' ),
				'id'      => 'woo_catalog_perpage',
				'default' => '12',
				'type'    => 'number',
			),
			array(
				'name'    => '',
				'desc'    => __( 'Show  product  info button in product listing.', 'retro' ),
				'id'      => 'woocommerce_product_listing_info_button',
				'default' => 'yes',
				'type'    => 'checkbox',
			),
			array(
				'name'    => '',
				'desc'    => __( 'Hide categories from product page.', 'retro' ),
				'id'      => 'woocommerce_product_page_categories',
				'default' => 'no',
				'type'    => 'checkbox',
			),
			array( 'type' => 'sectionend', 'id' => 'woo_listing_perpage' ),
		);
		woocommerce_update_options( $settings );
	}


	add_action( 'woocommerce_settings_catalog_options_after', 'add_product_listing_perpage', 30 );
	add_action( 'woocommerce_update_options_products', 'save_product_listing_perpage' );

	if ( version_compare( WC_VERSION, '3.0.0', '<' ) ) {
		add_filter( 'add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
	} else {
		add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
	}


	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?>

		<span
			class="top_cart_text"><?php echo sprintf( __( 'Bag - %1$d', 'retro' ), $woocommerce->cart->cart_contents_count ); ?></span>

		<?php
		$fragments['span.top_cart_text'] = ob_get_clean();

		return $fragments;
	}

	function woocommerce_single_product_meta() {

		global $product;
		if ( get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) {
			echo '<div class="product_rating clearfix" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">';
			$count   = $product->get_rating_count();
			$average = $product->get_average_rating();
			echo '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'retro' ), $average ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __( 'out of 5', 'retro' ) . '</span></div>';
			echo '<a href="#tab-reviews" class="open_review_tab">' . sprintf( _n( '%s Review', '%s Reviews', $count, 'retro' ), '<span itemprop="ratingCount" class="count">' . $count . '</span>' ) . '</a>';
			echo '<a href="#review_form" class="show_review_form">' . __( 'Add Your Review', 'retro' ) . '</a>';
			echo '</div>';
		}
	}
}

// Woo notice filters
function ox_woo_add_notice_wrapper( $content ) {
	$content = '<div class="woocommerce-info">' . $content . '</div>';

	return $content;
}

add_filter( 'woocommerce_cart_no_shipping_available_html', 'ox_woo_add_notice_wrapper' );
add_filter( 'woocommerce_no_shipping_available_html', 'ox_woo_add_notice_wrapper' );

add_filter( 'woocommerce_available_variation', 'ox_woocommerce_available_variation_dynamic_thumbs' );

function ox_woocommerce_available_variation_dynamic_thumbs( $variations ) {

	$image                   = theme_post_thumbnail_src( get_post_thumbnail_id( $variations['variation_id'] ), apply_filters( 'single_product_large_thumbnail_size', 'retro_shop_single' ) );
	$variations['image_src'] = $image[0];

	return $variations;
}

function woocommerce_template_loop_product_title() {
	echo '<h3  class="product_loop_title">' . get_the_title() . '</h3>';
}


// END WOO
if ( ! function_exists( 'list_comments' ) ) {

	function list_comments( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
		?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="clearfix">
				<div class="avatars">
					<?php echo get_avatar( $comment, $size = '79', '', get_comment_author() ); ?>
				</div>
				<div class="extra-wrap comment-text">
					<div class="comment-meta">
						<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ?><?php comment_reply_link( array_merge( $args, array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						) ) ) ?>
					</div>
					<span
						class="comment-date"><?php printf( __( '%1$s at %2$s', 'retro' ), get_comment_date(), get_comment_time() ) ?></span>
					<div class="comment-entry">
						<?php comment_text() ?>
					</div>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'retro' ) ?></em>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'ox_modify_wishlist_default_settings' ) ) {
	function ox_modify_wishlist_default_settings( $sections = array() ) {
		foreach ( $sections as $skey => $section ) {
			if ( 'add_to_wishlist_catalog' === $section['id'] ) {
				foreach ( $section['fields'] as $fkey => $field ) {
					if ( array_key_exists( 'name', $field ) && 'icon' === $field['name'] ) {
						unset( $field['options'][''] );
						$sections[ $skey ]['fields'][ $fkey ] = $field;
					}
				}
			}
		}

		return $sections;
	}

	add_filter( 'tinwl_prepare_admsections', 'ox_modify_wishlist_default_settings' );
}

if ( ! function_exists( 'ox_modify_wishlist_option' ) ) {
	function ox_modify_wishlist_option( $values ) {
		if ( is_array( $values ) && array_key_exists( 'icon', $values ) && empty( $values['icon'] ) ) {
			$values['icon'] = 'heart';
		}

		return $values;
	}

	add_filter( 'option_tinvwl-add_to_wishlist_catalog', 'ox_modify_wishlist_option' );
}

if ( ! function_exists( 'ox_vc_backend' ) ) {
	function ox_vc_backend() {
		wp_enqueue_script( 'retro-vc-backend-min-js', get_template_directory_uri() . '/js/vc.backend.js', array( 'vc-backend-min-js' ), '1.0.0' );
		wp_enqueue_style( 'retro_js_composer', get_template_directory_uri() . '/css/js_composer_backend_editor.css', array( 'js_composer' ), '1.0.0', false );
	}

	add_action( 'vc_backend_editor_render', 'ox_vc_backend', 20 );
}

if ( ! function_exists( 'ox_order_comment_fields' ) ) {

	function ox_order_comment_fields( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;

		return $fields;
	}

	add_filter( 'comment_form_fields', 'ox_order_comment_fields', 100 );
}

define( 'TINVWL_PARTNER', 'tinv' ); //Add referal arg to all admin links.
define( 'TINVWL_CAMPAIGN', 'retro' ); //Add utm_campaign arg to all admin links. Optional.
