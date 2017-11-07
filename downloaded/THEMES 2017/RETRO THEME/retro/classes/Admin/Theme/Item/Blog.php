<?php

/**
 * 'Blog' admin menu page
 */
class Admin_Theme_Item_Blog extends Admin_Theme_Menu_Item
{

	public function __construct( $parent_slug = '' ) {

		$this->setPageTitle( __( 'Blog', 'retro' ) );
		$this->setMenuTitle( __( 'Blog', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_blog' );
		parent::__construct( $parent_slug );

		$this->init();
	}

	public function init() {

		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'Blog Settings', 'retro' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Sidebar position for blog listing', 'retro' ) )
				->setDescription( __( 'Choose a sidebar position for blog listing', 'retro' ) )
				->setId( SHORTNAME . '_post_listing_layout' )
				->setStd( 'none' )
				->setOptions( array( 'none', 'left', 'right' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_SelectSidebar();
		$option->setName( __( 'Sidebar for blog listing', 'retro' ) )
				->setDescription( __( 'Choose a sidebar for blog listing', 'retro' ) )
				->setId( SHORTNAME . '_post_listing_sidebar' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Blog listing template', 'retro' ) )
				->setDescription( __( 'Choose a blog listing template', 'retro' ) )
				->setId( SHORTNAME . '_post_listing_variation' )
				->setStd( 'Wide feature image' )
				->setOptions( array( 'Wide feature image', 'Square feature image' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setDescription( __( 'Switch On to disable excerpts on blog listing', 'retro' ) )
				->setName( __( 'Disable excerpts', 'retro' ) )
				->setId( SHORTNAME . '_excerpt' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setDescription( __( 'Switch On to disable about author box on post entry', 'retro' ) )
				->setName( __( 'Disable about author box', 'retro' ) )
				->setId( SHORTNAME . '_authorbox' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Sidebar position for single post', 'retro' ) )
				->setDescription( __( 'Choose a sidebar position for single post', 'retro' ) )
				->setId( SHORTNAME . '_post_layout' )
				->setStd( 'none' )
				->setOptions( array( 'none', 'left', 'right' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_SelectSidebar();
		$option->setName( __( 'Sidebar for single post', 'retro' ) )
				->setDescription( __( 'Choose a sidebar for single post', 'retro' ) )
				->setId( SHORTNAME . '_post_sidebar' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		if ( ! get_option( 'page_on_front' ) ) {
			$option = new Admin_Theme_Element_Select();
			$option->setName( __( 'Select a  slideshow type', 'retro' ) )
					->setDescription( __( 'Select a  slideshow type ', 'retro' ) )
					->setId( SHORTNAME . '_blog_slideshow' )
					->setStd( 'Disable' )
					->setOptions( array( 'Disable', 'revSlider' ) );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select_Slider();
			$option->setName( __( 'Select one of sliders', 'retro' ) )
					->setDescription( __( 'Select one of sliders ', 'retro' ) )
					->setId( SHORTNAME . '_blog_slider' );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Text();
			$option->setName( __( 'Blog page title', 'retro' ) )
					->setDescription( __( 'Title will be shown on any blog post', 'retro' ) )
					->setId( SHORTNAME . '_blog_title' )
					->setStd( '' );
			$this->addOption( $option );
			$option = null;
		}
	}
}

?>
