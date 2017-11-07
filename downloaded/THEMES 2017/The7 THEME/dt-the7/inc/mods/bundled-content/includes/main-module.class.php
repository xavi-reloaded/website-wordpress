<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'BundledContentMainModule', false ) ) :

	class BundledContentMainModule {

		/**
		 * The unique identifier of this plugin.
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $plugin_name The string used to uniquely identify this plugin.
		 */
		protected $plugin_name;

		/**
		 * The current version of the plugin.
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $version The current version of the plugin.
		 */
		protected $version;

		/**
		 * @var string $plugin_dir ; The current dir to the plugin
		 */
		protected $plugin_dir;


		public function __construct() {
			$this->plugin_name = 'bundled-content';
			$this->version = '1';
			$this->plugin_dir = trailingslashit( dirname( __FILE__ ) );

		}

		/**
		 * Execute module.
		 */
		public function execute() {
			if ( ! is_admin() ) {
				return;
			}
			require_once $this->plugin_dir . 'base.class.php';
			require_once $this->plugin_dir . 'revolution-slider/revolution-slider.class.php';
			require_once $this->plugin_dir . 'ultimate-addon/ultimate-addon.class.php';
			require_once $this->plugin_dir . 'js-composer/js-composer.php';

			$bundledPlugins = array(
				"revolutionSlider" => new The7RevolutionSlider(),
				"jsComposer"       => new The7_jsComposer(),
				"ultimateAddon"    => new The7UltimateAddon(),
			);

			foreach ( $bundledPlugins as $plugin ) {
				if ( presscore_theme_is_activated() ) {
					$plugin->activatePlugin();
				} else {
					$plugin->deactivatePlugin();
				}
			}
		}
	}
endif;

