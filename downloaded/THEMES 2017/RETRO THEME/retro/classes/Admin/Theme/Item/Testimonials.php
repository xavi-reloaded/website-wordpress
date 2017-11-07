<?php
/**
 * 'Footer' admin menu page
 */
class Admin_Theme_Item_Testimonials extends Admin_Theme_Menu_Item
{
	public function __construct( $parent_slug = '' ) {

		$this->setPageTitle( __( 'Testimonials', 'retro' ) );
		$this->setMenuTitle( __( 'Testimonials', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_testimonials' );
		parent::__construct( $parent_slug );
		$this->init();
	}

	public function init() {

		$option = null;
		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'Testimonials Settings', 'retro' ) );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Sidebar position for testimonials listing', 'retro' ) )
				->setDescription( __( 'Choose a sidebar position for testimonials listing', 'retro' ) )
				->setId( SHORTNAME . '_testimonials_listing_layout' )
				->setStd( 'none' )
				->setOptions( array( 'none', 'left', 'right' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_SelectSidebar();
		$option->setName( __( 'Sidebar for testimonials listing', 'retro' ) )
				->setDescription( __( 'Choose a sidebar for testimonials listing', 'retro' ) )
				->setId( SHORTNAME . '_testimonials_listing_sidebar' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Sidebar position for single testimonial', 'retro' ) )
				->setDescription( __( 'Choose a sidebar position for single testimonial', 'retro' ) )
				->setId( SHORTNAME . '_testimonial_layout' )
				->setStd( 'none' )
				->setOptions( array( 'none', 'left', 'right' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_SelectSidebar();
		$option->setName( __( 'Sidebar for single testimonial', 'retro' ) )
				->setDescription( __( 'Choose a sidebar for single testimonial', 'retro' ) )
				->setId( SHORTNAME . '_testimonial_sidebar' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$custom_page = new Custom_Posts_Type_Testimonial();
		$option = new Admin_Theme_Element_Text();
		$option->setName( __( 'Testimonial post slug', 'retro' ) )
				->setDescription( __( 'Write custom slug for testimonial post', 'retro' ) )
				->setId( $custom_page->getPostSlugOptionName() )
				->setStd( $custom_page->getDefaultPostSlug() );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Text();
		$option->setName( __( 'Testimonial category slug', 'retro' ) )
				->setDescription( __( 'Write custom slug for testimonial category', 'retro' ) )
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
