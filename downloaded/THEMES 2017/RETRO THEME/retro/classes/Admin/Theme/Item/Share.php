<?php

class Admin_Theme_Item_Share extends Admin_Theme_Menu_Item {


	const TITLE		= '_title_share';
	const STYLE		= '_style_share';
	const SHOW		= '_show_share';


	const FACEBOOK	= '_facebook_share';
	const TWITTER	= '_twitter_share';
	const LINKEDIN	= '_linkedin_share';
	const GOOGLE	= '_google_share';
	const PINTEREST	= '_pinterest_share';


	const POST		= '_post_share_show';
	const PAGE		= '_page_share_show';
	const PORTFOLIO	= '_portfolio_share_show';
	const PRODUCT	= '_product_share_show';

	public function __construct( $parent_slug = '' ) {
		$this->setPageTitle( __( 'Share buttons', 'retro' ) );
		$this->setMenuTitle( __( 'Share buttons', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_share' );
		parent::__construct( $parent_slug );
		$this->init();
	}

	public function init() {

		$option = null;
		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'Share button Settings', 'retro' ) );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show share buttons under content', 'retro' ) )
				->setDescription( 'Check this box if you want to show buttons under content' )
				->setId( SHORTNAME . self::SHOW )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Text();
		$option->setName( __( 'Share title','retro' ) )
				->setDescription( __( 'Text before share buttons.','retro' ) )
				->setId( SHORTNAME . self::TITLE )
				->setStd( 'Share' );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_Select();
		$option->setName( __( 'Share button style', 'retro' ) )
				->setDescription( __( 'Choose a Share button style', 'retro' ) )
				->setId( SHORTNAME . self::STYLE )
				->setStd( 'default' )
				->setOptions( array( 'default', 'dark', 'stamp' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Info();
		$option->setName( __( 'Share buttons list','retro' ) );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show Facebook', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show Facebook share button under content', 'retro' ) )
				->setId( SHORTNAME . self::FACEBOOK )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show Twitter', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show Twitter share button under content', 'retro' ) )
				->setId( SHORTNAME . self::TWITTER )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show Google+', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show Google+ share button under content', 'retro' ) )
				->setId( SHORTNAME . self::GOOGLE )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show LinkedIn', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show LinkedIn share button under content', 'retro' ) )
				->setId( SHORTNAME . self::LINKEDIN )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show Pinterest', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show Pinterest share button under content', 'retro' ) )
				->setId( SHORTNAME . self::PINTEREST )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Separator();
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Info();
		$option->setName( __( 'List which displays share buttons','retro' ) );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show on post', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show share button on post', 'retro' ) )
				->setId( SHORTNAME . self::POST )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show on page', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show share button on page', 'retro' ) )
				->setId( SHORTNAME . self::PAGE )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show on portfolio', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show share button on portfolio', 'retro' ) )
				->setId( SHORTNAME . self::PORTFOLIO )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Checkbox();
		$option->setName( __( 'Show on product', 'retro' ) )
				->setDescription( __( 'Check this box if you want to show share button on product', 'retro' ) )
				->setId( SHORTNAME . self::PRODUCT )
				->setStd( '' );
		$this->addOption( $option );
		$option = null;

	}
}
?>
