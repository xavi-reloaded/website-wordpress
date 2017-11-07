<?php

/**
 * @since wp 3.4
 */
add_action( 'customize_register', 'admin_menu_run' );

function admin_menu_run() {

	if ( ! function_exists( 'get_plugin_data' ) ) {
		include( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	global $rt_admin_menu;
	$rt_admin_menu->run();
}

add_action( 'customize_save', array( 'Custom_CSS_Style', 'setNeedReinitFlag' ) );

add_action( 'init', 'ox_reinit_custom_style_if_need' );

function ox_reinit_custom_style_if_need() {

	if ( Custom_CSS_Style::needReinit() ) {
		$custom_stylesheet = new Custom_CSS_Style();
		$custom_stylesheet->reinit();
	}
}

?>
