<?php
/**
 * 'Footer' admin menu page
 */
class Admin_Theme_Item_Footer extends Admin_Theme_Menu_Item
{
	public function __construct( $parent_slug = '' ) {

		$this->setPageTitle( __( 'Footer', 'retro' ) );
		$this->setMenuTitle( __( 'Footer', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_footer' );
		parent::__construct( $parent_slug );

		$this->init();
	}

	public function init() {

		$option = null;
		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'Footer Settings', 'retro' ) );
		$this->addOption( $option );
		$option = null;

				$this->addGroupedOptions( new Admin_Theme_SkinGroup_Footer_FooterDefault() );
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Footer_FooterSkin1() );
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Footer_FooterSkin2() );
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Footer_FooterSkin3() );
		$this->addGroupedOptions( new Admin_Theme_SkinGroup_Footer_FooterSkin4() );
						$option = new Admin_Theme_Element_Checkbox();
				$option->setName( __( 'Enable footer widget area', 'retro' ) )
						->setDescription( __( 'Check this box if you want to enable footer widgets area for whole site.', 'retro' ) )
						->setId( SHORTNAME . '_footer_widgets_enable' )
						->setStd( true );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Select();
				$option->setName( __( 'Columns number for footer widgets area', 'retro' ) )
						->setDescription( __( 'Select how many columns(sidebars) you want display for footer widgets area.', 'retro' ) )
						->setId( SHORTNAME . '_footer_widgets_columns' )
						->setStd( '3' )
						->setOptions( array( '1', '2', '3', '4' ) );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Separator();
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Text();
				$option->setName( __( 'Footer text', 'retro' ) )
						->setDescription( __( 'Type here text that appear at botttom of each page - copyrights, etc..', 'retro' ) )
						->setId( SHORTNAME . '_copyright' )
						->setStd( "Retro 2016 &copy; by Olegnax <span class='link-inline'><a href='http://olegnax.com'>Privacy Policy</a> <span class='bull'>&bull;</span> <a href='http://olegnax.com'>Terms of Use</a></span>" );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Textarea();
				$option->setName( __( 'Google Analytics', 'retro' ) )
						->setDescription( __( 'Insert your Google Analytics (or other) code here.', 'retro' ) )
						->setId( SHORTNAME . '_GA' )
						->setStd( '' );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Separator();
				$option->setType( Admin_Theme_Menu_Element::TYPE_SEPARATOR );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Editor();
				$option->setName( __( 'Footer custom content', 'retro' ) )
					->setDescription( __( 'You can use custom content', 'retro' ) )
					->setOptions( 'highlight,buttons,social_link,social_button' )
					->setId( SHORTNAME . '_footer_tinymce' );
				$this->addOption( $option );
				$option = null;
	}
}
?>
