<?php
/**
 * Plugin Name: Meta Box Include Exclude
 * Plugin URI: https://metabox.io/plugins/meta-box-include-exclude/
 * Description: Easily show/hide meta boxes by ID, page template, taxonomy or custom defined function.
 * Version: 1.0.5
 * Author: Rilwis
 * Author URI: http://www.deluxeblogtips.com
 * License: GPL2+
 */

if ( defined( 'ABSPATH' ) && is_admin() && ! class_exists( 'MB_Include_Exclude' ) ) {
	require META_BOXES_DIRECTORY . 'meta-box-include-exclude/class-mb-include-exclude.php';
	add_filter( 'rwmb_show', array( 'MB_Include_Exclude', 'check' ), 10, 2 );
}
