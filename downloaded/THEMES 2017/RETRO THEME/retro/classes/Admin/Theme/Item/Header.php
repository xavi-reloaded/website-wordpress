<?php

/**
 * 'Header' admin menu page
 */
class Admin_Theme_Item_Header extends Admin_Theme_Menu_Item
{

	public function __construct( $parent_slug = '' ) {

		$this->setPageTitle( __( 'Header', 'retro' ) );
		$this->setMenuTitle( __( 'Header', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_header' );
		parent::__construct( $parent_slug );

		$this->init();
	}

	public function init() {

		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'Header Settings', 'retro' ) );
		$this->addOption( $option );
		$option = null;

				/**
		 * Example of group using
		 */
		// $option = new Admin_Theme_Element_Separator();
		// $this->addOption($option);
		// $option = null;
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Header_HeaderDefault() );
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Header_HeaderSkin1() );
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Header_HeaderSkin2() );
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Header_HeaderSkin3() );
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Header_HeaderSkin4() );
				$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Editor();

		$option->setName( __( 'Header custom content - left', 'retro' ) )
				->setDescription( __( 'headder left text area', 'retro' ) )
				->setOptions( '' )
				->setId( SHORTNAME . '_header_logo_tinymce' );
		$this->addOption( $option );
		$option = null;

		
		$wishlist_plug_name = defined( 'TINVWL_LOAD_PREMIUM' ) ? TINVWL_LOAD_PREMIUM : ( defined( 'TINVWL_LOAD_FREE' ) ? TINVWL_LOAD_FREE : false );
		$wishlist_plug = $wishlist_plug_name ? in_array( $wishlist_plug_name, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) : false;
		$woocommerce_plug = in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
		if ( ( ( $woocommerce_plug && get_option( SHORTNAME . '_my_account' ) && get_option( SHORTNAME . '_shopping_cart' ) ) || ! $woocommerce_plug ) && ( ( $wishlist_plug && get_option( SHORTNAME . '_wishlist' ) ) || ! $wishlist_plug ) ) {
			$option = new Admin_Theme_Element_Editor();
			$option->setName( __( 'Header custom content - right', 'retro' ) )
					->setDescription( __( 'header right text area', 'retro' ) )
					->setOptions( '' )
					->setId( SHORTNAME . '_header_custom_content' );
			$this->addOption( $option );
			$option = null;
		}

		if ( $woocommerce_plug ) {
			$option = new Admin_Theme_Element_Checkbox();
			$option->setName( __( 'Hide my account link', 'retro' ) )
					->setDescription( __( 'Check this box if you want to hide my account link at top line', 'retro' ) )
					->setId( SHORTNAME . '_my_account' )
					->setStd( '' );
			$this->addOption( $option );
			$option = null;
		}
		if ( $wishlist_plug ) {
			$option = new Admin_Theme_Element_Checkbox();
			$option->setName( __( 'Hide wishlist link', 'retro' ) )
					->setDescription( __( 'Check this box if you want to hide wishlist link at top line', 'retro' ) )
					->setId( SHORTNAME . '_wishlist' )
					->setStd( '' );
			$this->addOption( $option );
			$option = null;
		}
		
		if ( $wishlist_plug && ! get_option( SHORTNAME . '_wishlist' ) ) {
			if ( ! get_option( SHORTNAME . '_wishlist_icon' ) ) {
				update_option( SHORTNAME . '_wishlist_icon', get_template_directory_uri() . '/images/icon_heart_plus.png' );
			}
			$option = new Admin_Theme_Element_File();
			$option->setName( __( 'Wishlist icon', 'retro' ) )
					->setDescription( __( 'Click upload button, then choose and upload your wishlist icon', 'retro' ) )
					->setId( SHORTNAME . '_wishlist_icon' )
					->setStd( get_template_directory_uri() . '/images/icon_heart_plus.png' );
			$this->addOption( $option );
			$option = null;
		}

		if ( $woocommerce_plug ) {
			$option = new Admin_Theme_Element_Checkbox();
			$option->setName( __( 'Hide shopping cart', 'retro' ) )
					->setDescription( __( 'Check this box if you want to hide shopping cart at top line', 'retro' ) )
					->setId( SHORTNAME . '_shopping_cart' )
					->setStd( '' );
			$this->addOption( $option );
			$option = null;
		}
	}
}

?>
