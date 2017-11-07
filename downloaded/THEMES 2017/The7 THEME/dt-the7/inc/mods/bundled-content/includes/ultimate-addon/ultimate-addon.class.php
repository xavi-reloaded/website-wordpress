<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class The7UltimateAddon extends BundledContent {

	private $product_id = 6892199;

	public function activatePlugin() {
		$this->disableNotification();
		return;
	}

	public function deactivatePlugin() {
	}

	public function isActivatedPlugin() {
		return false;
	}

	protected function getBundledPluginCode() {
		return '';
	}

	private function disableNotification() {
		if ( class_exists( 'Ultimate_VC_Addons', false ) ) {
			$constants = array(
				'ULTIMATE_USE_BUILTIN'           => true,
				'ULTIMATE_NO_UPDATE_CHECK'       => true,
				'ULTIMATE_NO_EDIT_PAGE_NOTICE'   => true,
				'ULTIMATE_NO_PLUGIN_PAGE_NOTICE' => true,
				'BSF_PRODUCTS_NOTICES'           => false,
				'BSF_CHECK_PRODUCT_UPDATES'      => false,
			);

			foreach ( $constants as $const => $val ) {
				if ( ! defined( $const ) ) {
					define( $const, $val );
				}
			}
			add_filter( "envato_active_oauth_title_{$this->product_id}", array(
				&$this,
				'the7_ultimate_addon_oauth_title',
			), 30, 2 );
		}
	}

	public function isActivatedByTheme() {
		$themeCode = get_site_option( 'the7_purchase_code', '' );
		$retval = ! empty( $themeCode );
		return $retval;
	}

	public static function the7_ultimate_addon_oauth_title( $text ) {
		$text = '<span class="active">Active!</span>';
		return $text;
	}
}