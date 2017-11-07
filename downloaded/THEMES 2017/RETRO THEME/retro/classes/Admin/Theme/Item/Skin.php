<?php
/**
 * 'Header' admin menu page
 */
class Admin_Theme_Item_Skin extends Admin_Theme_Menu_Item
{

	public function __construct( $parent_slug = '' ) {
		$this->setPageTitle( __( 'Theme Skin Layout', 'retro' ) );
		$this->setMenuTitle( __( 'Theme Skin', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_skin' );
		parent::__construct( $parent_slug );

		$this->init();
	}

	public function init() {

			$option = new Admin_Theme_Element_Pagetitle();
			$option->setName( __( 'Skin Settings', 'retro' ) );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( __( 'Skin layout', 'retro' ) )
					->setDescription( __( 'Select to activate skin layout for theme', 'retro' ) )
					->setId( SHORTNAME . Admin_Theme_Menu_SkinGroup::ACTIVE_SKIN_OPTION )
					->setStd( Admin_Theme_SkinGroup_ContentDefault::NAME )
		// ->setCustomized()
					->setOptions(array(
						Admin_Theme_SkinGroup_ContentDefault::NAME,
						Admin_Theme_SkinGroup_ContentSkin1::NAME,
						Admin_Theme_SkinGroup_ContentSkin2::NAME,
						Admin_Theme_SkinGroup_ContentSkin3::NAME,
						Admin_Theme_SkinGroup_ContentSkin4::NAME,
					));
			$this->addOption( $option );
			$option = null;

	}

	public function saveForm() {

		global $rt_admin_menu;
		$rt_admin_menu->clearMenuItemList();

		parent::saveForm();
	}

	public function resetForm() {

		global $rt_admin_menu;
		$rt_admin_menu->clearMenuItemList();
		parent::resetForm();
	}
}
?>
