<?php

/**
 * 'WooCommerce' admin menu page
 */
class Admin_Theme_Item_Woocommerce extends Admin_Theme_Menu_Item {

	/**
	 * prefix of file icons option
	 */
	public function __construct( $parent_slug = '' ) {
		$this->setPageTitle( __( 'WooCommerce', 'retro' ) );
		$this->setMenuTitle( __( 'WooCommerce', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_woocommerce' );
		parent::__construct( $parent_slug );
		$this->init();
	}

	public function init() {

		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'WooCommerce settings', 'retro' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Sidebar position for products listing', 'retro' ) )
		       ->setDescription( __( 'Choose a sidebar position for products listing', 'retro' ) )
		       ->setId( SHORTNAME . '_products_listing_layout' )
		       ->setStd( 'none' )
		       ->setOptions( array( 'none', 'left', 'right' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_SelectSidebar();
		$option->setName( __( 'Sidebar for products listing', 'retro' ) )
		       ->setDescription( __( 'Choose a sidebar for products listing', 'retro' ) )
		       ->setId( SHORTNAME . '_products_listing_sidebar' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Sidebar position for product page', 'retro' ) )
		       ->setDescription( __( 'Choose a sidebar position for product page', 'retro' ) )
		       ->setId( SHORTNAME . '_product_layout' )
		       ->setStd( 'none' )
		       ->setOptions( array( 'none', 'left', 'right' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_SelectSidebar();
		$option->setName( __( 'Sidebar for product page', 'retro' ) )
		       ->setDescription( __( 'Choose a sidebar for product page', 'retro' ) )
		       ->setId( SHORTNAME . '_product_sidebar' );
		$this->addOption( $option );
		$option = null;

		if ( version_compare( WC_VERSION, '2.7.0', '>' ) ) {
			$option = new Admin_Theme_Element_Separator();
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Checkbox();
			$option->setName( __( 'Use WooCommerce 3 Product Gallery', 'retro' ) )
			       ->setDescription( __( 'Use WooCommerce 3 Product Gallery Zoom, Lightbox and Slider. ', 'retro' ) )
			       ->setId( SHORTNAME . '_product_gallery_woo_3' )
			       ->setStd( 'none' );
			$this->addOption( $option );
			$option = null;
		}
	}

	/**
	 * Save form and set option-flag for reinit rewrite rules on init
	 */
	public function saveForm() {

		parent::saveForm();
		$this->setNeedReinitRulesFlag();
	}

	/**
	 * Reset form and set option-flag for reinit rewrite rules on init
	 */
	public function resetForm() {

		parent::resetForm();
		$this->setNeedReinitRulesFlag();
	}

	/**
	 * save to DB flag of need do flush_rewrite_rules on next init
	 */
	private function setNeedReinitRulesFlag() {

		update_option( SHORTNAME . '_need_flush_rewrite_rules', '1' );
	}
}

?>
