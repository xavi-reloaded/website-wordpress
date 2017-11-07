<?php
/**
 * 'Custom Icon' admin menu page
 */
class Admin_Theme_Item_Portfolios extends Admin_Theme_Menu_Item
{
	/**
	 * prefix of file icons option
	 */


	public function __construct( $parent_slug = '' ) {
		$this->setPageTitle( __( 'Portfolios', 'retro' ) );
		$this->setMenuTitle( __( 'Portfolios', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_portfolios' );
		parent::__construct( $parent_slug );
		$this->init();
	}

	public function init() {

		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'Portfolios settings', 'retro' ) );
		$this->addOption( $option );
		$option = null;

				$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Sidebar position for portfolios listing', 'retro' ) )
				->setDescription( __( 'Choose a sidebar position for portfolios listing', 'retro' ) )
				->setId( SHORTNAME . '_portfolios_listing_layout' )
				->setStd( 'none' )
				->setOptions( array( 'none', 'left', 'right' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_SelectSidebar();
		$option->setName( __( 'Sidebar for portfolios listing', 'retro' ) )
				->setDescription( __( 'Choose a sidebar for portfolios listing', 'retro' ) )
				->setId( SHORTNAME . '_portfolios_listing_sidebar' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Side content position for single portfolio post', 'retro' ) )
				->setDescription( __( 'Choose a sidebar position for single portfolio', 'retro' ) )
				->setId( SHORTNAME . '_portfolio_layout' )
				->setStd( 'none' )
				->setOptions( array( 'none', 'left', 'right' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$custom_page = new Custom_Posts_Type_Portfolio();
		$option = new Admin_Theme_Element_Text();
		$option->setName( __( 'Portfolio post slug', 'retro' ) )
				->setDescription( __( 'Write custom slug for portfolio post', 'retro' ) )
				->setId( $custom_page->getPostSlugOptionName() )
				->setStd( $custom_page->getDefaultPostSlug() );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Text();
		$option->setName( __( 'Portfolio category slug', 'retro' ) )
				->setDescription( __( 'Write custom slug for portfolio category', 'retro' ) )
				->setId( $custom_page->getTaxSlugOptionName() )
				->setStd( $custom_page->getDefaultTaxSlug() );
		$this->addOption( $option );

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
