<?php
/**
 * 'Footer' admin menu page
 */
class Admin_Theme_Item_Sidebar extends Admin_Theme_Menu_Item
{
	public function __construct( $parent_slug = '' ) {

		$this->setPageTitle( __( 'Sidebars', 'retro' ) );
		$this->setMenuTitle( __( 'Sidebars', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_sidebars' );
		parent::__construct( $parent_slug );
		$this->init();
	}

	public function init() {

		$option = null;
		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'Sidebars Settings', 'retro' ) );
		$this->addOption( $option );

		$option = null;
		$option = new Admin_Theme_Element_Sidebar();
		$option->setName( __( 'Add Sidebar:', 'retro' ) )
				->setDescription( __( 'Enter the name of the new sidebar that you would like to create.', 'retro' ) )
				->setId( 'sidebar_generator_0' )
				->setSize( '70' );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_SidebarDelete();
		$option->setDescription( __( 'Below are the Sidebars you have created:', 'retro' ) )
				->setName( __( 'Sidebars created:', 'retro' ) );
		$this->addOption( $option );
	}
}
?>
