<?php

require 'plugin-update-checker.php';

add_action( 'tgmpa_register', 'ox_theme_register_required_plugins' );

function ox_theme_register_required_plugins() {

	$wishlist_name = ( defined( 'TINVWL_LOAD_PREMIUM' ) ) ? 'ti-woocommerce-wishlist-premium' : 'ti-woocommerce-wishlist';


	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     => 'Woocommerce',
			'slug'     => 'woocommerce',
			'version'  => '3.0.7',
			'required' => false,
		),
		array(
			'name'        => 'Yoast SEO',
			'slug'        => 'wordpress-seo',
			'required'    => false,
			'is_callable' => 'wpseo_init',
		),
		array(
			'name'     => 'WooCommerce New Product Badge',
			'slug'     => 'woocommerce-new-product-badge',
			'required' => false,
		),

		array(
			'name'         => 'WPBakery Visual Composer',
			'slug'         => 'js_composer',
			'source'       => 'https://olegnax.com/extras/plugins/js_composer.zip',
			'required'     => false,
			'version'      => '5.1.1',
			'external_url' => 'http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431',
		),

		array(
			'name'             => 'Revolution Slider',
			'slug'             => 'revslider',
			'source'           => 'https://olegnax.com/extras/plugins/revslider.zip',
			'required'         => false,
			'version'          => '5.4.3.1',
			'force_activation' => false,
			'external_url'     => 'http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380',
		),
		array(
			'name'     => 'WooCommerce Wishlist',
			'slug'     => $wishlist_name,
			'required' => false,
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'            => 'tgmpa',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'  => '',
		// Default absolute path to bundled plugins.
		'menu'          => 'tgmpa-install-plugins',
		// Menu slug.
		'menu_function' => 'add_theme_page',
		// Menu location function.
		'capability'    => 'edit_theme_options',
		// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'   => true,
		// Show admin notices or not.
		'dismissable'   => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'   => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'  => false,
		// Automatically activate plugins after installation or not.
		'message'       => '',
		// Message to output right before the plugins table.

		/*
		  'strings'      => array(
		  'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
		  'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
		  'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
		  'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
		  'notice_can_install_required'     => _n_noop(
		  'This theme requires the following plugin: %1$s.',
		  'This theme requires the following plugins: %1$s.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'notice_can_install_recommended'  => _n_noop(
		  'This theme recommends the following plugin: %1$s.',
		  'This theme recommends the following plugins: %1$s.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'notice_cannot_install'           => _n_noop(
		  'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
		  'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'notice_ask_to_update'            => _n_noop(
		  'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
		  'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'notice_ask_to_update_maybe'      => _n_noop(
		  'There is an update available for: %1$s.',
		  'There are updates available for the following plugins: %1$s.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'notice_cannot_update'            => _n_noop(
		  'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
		  'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'notice_can_activate_required'    => _n_noop(
		  'The following required plugin is currently inactive: %1$s.',
		  'The following required plugins are currently inactive: %1$s.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'notice_can_activate_recommended' => _n_noop(
		  'The following recommended plugin is currently inactive: %1$s.',
		  'The following recommended plugins are currently inactive: %1$s.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'notice_cannot_activate'          => _n_noop(
		  'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
		  'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
		  'theme-slug'
		  ), // %1$s = plugin name(s).
		  'install_link'                    => _n_noop(
		  'Begin installing plugin',
		  'Begin installing plugins',
		  'theme-slug'
		  ),
		  'update_link'                       => _n_noop(
		  'Begin updating plugin',
		  'Begin updating plugins',
		  'theme-slug'
		  ),
		  'activate_link'                   => _n_noop(
		  'Begin activating plugin',
		  'Begin activating plugins',
		  'theme-slug'
		  ),
		  'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
		  'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
		  'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
		  'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
		  'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
		  'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
		  'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'retro' ),

		  'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		  ),
		 */
	);

	tgmpa( $plugins, $config );
}

if ( class_exists( 'Vc_Manager' ) ) {

	function ox_update_filters_remove_composer() {

		remove_filters_for_anonymous_class( 'pre_set_site_transient_update_plugins', 'Vc_Updating_Manager', 'check_update', 10 );
		remove_filters_for_anonymous_class( 'plugins_api', 'Vc_Updating_Manager', 'check_info', 10 );
		remove_filters_for_anonymous_class( 'upgrader_pre_download', 'Vc_Updater', 'preUpgradeFilter', 10 );
	}

	add_action( 'admin_init', 'ox_update_filters_remove_composer' );

	$autoloader_reflector = new ReflectionClass( 'Vc_Manager' );
	$class_file_name      = $autoloader_reflector->getFileName();

	$MyUpdateChecker = PucFactory::buildUpdateChecker(
		'https://olegnax.com/extras/?action=get_metadata&slug=js_composer', // Metadata URL.
		$class_file_name, // Full path to the main plugin file.
		'js_composer' // Plugin slug. Usually it's the same as the name of the directory.
	);

	function ox_remove_activation_tab( $tabs ) {

		unset( $tabs['vc-updater'] );

		return $tabs;
	}

	add_filter( 'vc_settings_tabs', 'ox_remove_activation_tab' );
}

if ( class_exists( 'RevSliderFront' ) ) {

	function ox_update_filters_remove_revslider() {
		global $productAdmin;
		remove_filters_for_anonymous_class( 'pre_set_site_transient_update_plugins', 'RevSliderUpdate', 'set_update_transient', 10 );
		remove_filters_for_anonymous_class( 'plugins_api', 'RevSliderUpdate', 'set_updates_api_results', 10 );
		remove_action( 'admin_notices', array( $productAdmin, 'addActivateNotification' ), 10 );

		$validated = get_option( 'revslider-valid', 'false' );

		if ( $validated == 'false' ) {
			update_option( 'revslider-valid', 'true' );
		}
	}

	add_action( 'admin_init', 'ox_update_filters_remove_revslider' );

	function ox_remove_activation_block( $tabs ) {

		unset( $tabs['rs-validation'] );

		return $tabs;
	}

	add_filter( 'revslider_dashboard_elements', 'ox_remove_activation_block' );


	$MyUpdateChecker = PucFactory::buildUpdateChecker(
		'https://olegnax.com/extras/?action=get_metadata&slug=revslider', // Metadata URL.
		RS_PLUGIN_FILE_PATH, // Full path to the main plugin file.
		'revslider' // Plugin slug. Usually it's the same as the name of the directory.
	);
}
