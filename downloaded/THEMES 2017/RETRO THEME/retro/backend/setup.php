<?php
/**
 * Add admin context menu items
 */
function ox_add_menu() {

	global $rt_admin_menu;
	echo $rt_admin_menu->run();
}
add_action( 'admin_menu', 'ox_add_menu' );

/**
 * Adding JS includes
 *
 * @param type $hook
 */
function ox_admin_enqueue_scripts( $hook ) {
	global $rt_admin_menu;

	if ( ($hook == 'post.php')
		|| ($hook == 'post-new.php')
		|| $rt_admin_menu->isEditThemeSubmenu() ) {
		$rt_admin_menu->getJSIncludes();
	}
}
add_action( 'admin_enqueue_scripts', 'ox_admin_enqueue_scripts' );


/**
 * Add to admin
 */
function ox_add_theme_uri() {

	?>
	<script language="javascript" type="text/javascript">
		if(typeof  THEME_URI == 'undefined')
		{
			var THEME_URI = '<?php echo get_template_directory_uri(); ?>';
		}
	</script>
	<?php
}
add_action( 'admin_enqueue_scripts', 'ox_add_theme_uri', 1 );

/**
 * Print JS Code
 *
 * @global object $rt_admin_menu
 * @param string $hook
 */
function ox_admin_print_scripts( $hook ) {
	global $rt_admin_menu;

	if ( ($hook == 'post.php')
		|| ($hook == 'post-new.php')
		||  $rt_admin_menu->isEditThemeSubmenu() ) {
		echo $rt_admin_menu->getJSCode();
		$rt_admin_menu->printAdminScript();
	}
}
add_action( 'admin_head', 'ox_admin_print_scripts' );

	/**
	 * Enqueue CSS for admin part
	 *
	 * @global string $shortname
	 */
function ox_admin_enqueue_styles() {
	global $rt_admin_menu;
	if ( $rt_admin_menu->isEditThemeSubmenu() ) {
		$rt_admin_menu->getCSS();
	}
}
	add_action( 'admin_init', 'ox_admin_enqueue_styles' );

	/**
	 * Removing file using Ajax
	 *
	 * @global object $rt_admin_menu
	 */
function ajax_file_rm() {
	global $rt_admin_menu;

	$rt_admin_menu->removeFile();
}
	add_action( 'wp_ajax_file_rm', 'ajax_file_rm' );

function ajax_file_up() {

	global $rt_admin_menu;

	$rt_admin_menu->addtheFile();
}
	add_action( 'wp_ajax_file_up', 'ajax_file_up' );

	/**
	 * Deleting sidebar using ajax
	 *
	 * @global object $rt_admin_menu
	 * @global object $wpdb
	 */
function ajax_sidebar_rm() {

	global $rt_admin_menu, $wpdb;

	$rt_admin_menu->removeSidebar( $wpdb );
}
	add_action( 'wp_ajax_sidebar_rm', 'ajax_sidebar_rm' );

	/**
	 * ??
	 */
function ajax_install_dummy() {

	// Import can use a lot of memory
	if ( defined( 'WP_MAX_MEMORY_LIMIT' ) && intval( WP_MAX_MEMORY_LIMIT ) > intval( ini_get( 'memory_limit' ) ) ) {
		@ini_set( 'memory_limit',  WP_MAX_MEMORY_LIMIT );
	}
	set_time_limit( 0 );
	$importer = new Import_Dummy();
	$importer->run();
}
	add_action( 'wp_ajax_install_dummy', 'ajax_install_dummy' );


	/**
	 * Add menu items to top admin bar.
	 *
	 * @global object $wp_admin_bar WP_Admin_Bar
	 * @global object $rt_admin_menu Admin_Theme_Menu
	 */
function ox_admin_bar_render() {
	global $wp_admin_bar, $rt_admin_menu;
	$rt_admin_menu->setAdminBar( $wp_admin_bar );
}
	add_action( 'wp_before_admin_bar_render', 'ox_admin_bar_render' );

function ox_media_send_to_editor( $html, $attachment_id, $attachment ) {

	$post = get_post( $attachment_id );

	if ( in_array( $post->post_mime_type, get_allowed_mime_types() ) // is supported by WP
	&& in_array( $post->post_mime_type, array( 'audio/mpeg', 'audio/mp4', 'audio/ogg', 'audio/webm', 'audio/wav' ) ) ) {
		/**
		 * isn't file metabox
		 */
		if ( ! isset( $_POST['attachments'] ) ) {
			return "[thaudio href='" . esc_url( $attachment['url'] ) . "']{$post->post_title}[/thaudio]";
		}
	}
	return $html;
}

	add_filter( 'media_send_to_editor', 'ox_media_send_to_editor', 10, 3 );

	add_action( 'admin_head', 'wpml_lang_init' );

function wpml_lang_init() {

	if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
	?>
		<script>
			var ox_wpml_lang = '?lang=<?php echo ICL_LANGUAGE_CODE?>';
		</script>
		<?php
	} else { ?>
		<script>
			var ox_wpml_lang = '';
		</script>
		<?php
	}
}

	add_action( 'admin_head', 'theme_time_format' );

function theme_time_format() {

	$format = get_option( 'time_format' );
	$is24 = ! preg_match( '/[aA]{1}/', $format );
	if ( $is24 ) {
	?>
		<script>
			var time_24_format = true;
		</script>
		<?php
	} else { ?>
		<script>
			var time_24_format = false;
		</script>
		<?php
	}
}
?>
