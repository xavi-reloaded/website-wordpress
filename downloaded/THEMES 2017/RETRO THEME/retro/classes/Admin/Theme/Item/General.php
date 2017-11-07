<?php
/**
 * 'General' admin menu page
 */
class Admin_Theme_Item_General extends Admin_Theme_Menu_Item
{

	public function __construct( $parent_slug = '' ) {

		$this->setPageTitle( __( 'General', 'retro' ) );
		$this->setMenuTitle( __( 'General', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_general' );
		parent::__construct( $parent_slug );
		$this->init(); // $parent_slug
	}

	public function init() {

		// if($parent_slug)
		{
			$option = new Admin_Theme_Element_Pagetitle();
			$option->setName( __( 'General Settings', 'retro' ) );
			$this->addOption( $option );
			$option = null;

		if ( isset( $_GET['preview'] ) ) {
			$option = new Admin_Theme_Element_Checkbox();
			$option->setName( __( 'Show preview switcher', 'retro' ) )
					->setDescription( __( 'Check to show preview color switcher', 'retro' ) )
					->setId( SHORTNAME . '_preview' )
					->setStd( '' );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select_Slider();
			$option->setName( __( 'Preview default Skin slider', 'retro' ) )
				->setDescription( __( 'Select a slideshow fore preview default skin', 'retro' ) )
				->setId( SHORTNAME . Admin_Theme_Item_Slideshow::REVSLIDER . '_default' );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select_Slider();
			$option->setName( __( 'Preview Skin 1 slider', 'retro' ) )
				->setDescription( __( 'Select a slideshow fore preview skin 1', 'retro' ) )
				->setId( SHORTNAME . Admin_Theme_Item_Slideshow::REVSLIDER . '_skin1' );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select_Slider();
			$option->setName( __( 'Preview 2 slider', 'retro' ) )
				->setDescription( __( 'Select a slideshow fore preview skin 2', 'retro' ) )
				->setId( SHORTNAME . Admin_Theme_Item_Slideshow::REVSLIDER . '_skin2' );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select_Slider();
			$option->setName( __( 'Preview 3 slider', 'retro' ) )
				->setDescription( __( 'Select a slideshow fore preview skin 3', 'retro' ) )
				->setId( SHORTNAME . Admin_Theme_Item_Slideshow::REVSLIDER . '_skin3' );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select_Slider();
			$option->setName( __( 'Preview 4 slider', 'retro' ) )
				->setDescription( __( 'Select a slideshow fore preview skin 4', 'retro' ) )
				->setId( SHORTNAME . Admin_Theme_Item_Slideshow::REVSLIDER . '_skin4' );
			$this->addOption( $option );
			$option = null;

			$option = new Admin_Theme_Element_Separator();
			$this->addOption( $option );
			$option = null;

		}

					/**
			 * Example of group using
			 */

				$this->addGroupedOptions( new Admin_Theme_SkinGroup_ContentDefault() );
				$this->addGroupedOptions( new Admin_Theme_SkinGroup_ContentSkin1() );
				$this->addGroupedOptions( new Admin_Theme_SkinGroup_ContentSkin2() );
				$this->addGroupedOptions( new Admin_Theme_SkinGroup_ContentSkin3() );
				$this->addGroupedOptions( new Admin_Theme_SkinGroup_ContentSkin4() );

						$option = new Admin_Theme_Element_Title();
					$option->setName( 'Font styles' );
					$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Select_Gfont();
				$option->setName( __( 'Choose Google font for titles', 'retro' ) )
						->setDescription( __( 'Choose a Font for titles, etc.', 'retro' ) )
						->setId( SHORTNAME . '_gfont' )
						->setStd( 'Medula One' )
						->setCustomized();
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Checkbox();
				$option->setDescription( __( 'Disable Google fonts', 'retro' ) )
						->setName( __( 'Check to disable Google fonts', 'retro' ) )
						->setCustomized()					// Show this element on WP Customize Admin menu
						->setStd( 'on' )
						->setId( SHORTNAME . '_gfontdisable' );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Checkbox();
				$option->setDescription( __( 'Check to disable default theme font and use "font family for content" value', 'retro' ) )
						->setName( __( 'Use default theme font BazarMedium(if google font disable)', 'retro' ) )
						->setCustomized()					// Show this element on WP Customize Admin menu
						->setStd( 'on' )
						->setId( SHORTNAME . '_bazar_font' );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Separator();
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Checkbox();
				$option->setDescription( __( 'Disable Font Awesome', 'retro' ) )
						->setName( __( 'Check to disable Font Awesome', 'retro' ) )
						->setCustomized()					// Show this element on WP Customize Admin menu
						->setStd( 'on' )
						->setId( SHORTNAME . '_fontawesomedisable' );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Separator();
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Select();
				$option->setName( __( 'Choose a font family for content', 'retro' ) )
						->setDescription( __( 'Choose a font family for content', 'retro' ) )
						->setId( SHORTNAME . '_fontfamily' )
						->setStd( "Georgia, 'Times New Roman', Times, serif" )
						->setOptions( array( "'Times New Roman', Times, serif", 'Arial, Helvetica, sans-serif', "'Courier New', Courier, monospace", "Georgia, 'Times New Roman', Times, serif", 'Verdana, Arial, Helvetica, sans-serif', 'Geneva, Arial, Helvetica, sans-serif' ) );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Select();
				$option->setName( __( 'Choose a font style for content', 'retro' ) )
						->setDescription( __( 'Choose a font style for content', 'retro' ) )
						->setId( SHORTNAME . '_fontstyle' )
						->setStd( 'normal' )
						->setOptions( array( 'italic', 'normal' ) );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Separator();
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_File_Favicon();
				$option->setName( __( 'Favicon', 'retro' ) )
						->setDescription( __( 'Click upload button, then choose and upload your favicon file', 'retro' ) )
						->setId( SHORTNAME . '_favicon' )
						->setStd( get_template_directory_uri() . '/images/favicon.ico' );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Separator();
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Checkbox();
				$option->setName( __( 'Disable responsive','retro' ) )
					->setDescription( __( 'Check to disable responsive support','retro' ) )
					->setId( SHORTNAME . '_responsive' )
					->setStd( '' );
				$this->addOption( $option );
				$option = null;

				}
	}
}
?>
