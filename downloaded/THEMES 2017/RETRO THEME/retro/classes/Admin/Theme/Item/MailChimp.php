<?php
class Admin_Theme_Item_MailChimp extends Admin_Theme_Menu_Item {

	public function __construct( $parent_slug = '' ) {
		$this->setPageTitle( __( 'MailChimp', 'retro' ) );
		$this->setMenuTitle( __( 'MailChimp', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_mailchimp' );
		parent::__construct( $parent_slug );
		$this->init();
	}

	public function init() {

		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'MailChimp API key', 'retro' ) );
		$this->addOption( $option );
		$option = null;

		$option = new Admin_Theme_Element_Info();
		$option->setName( __( 'Enter a valid MailChimp API key here to get started. Once you\'ve done that, you can use the MailChimp Widget from the Widgets menu. You will need to have at least MailChimp list set up before the using the widget.','retro' ) );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_Info();
		$option->setName( __( 'Don\'t know where to get? please visit this link, <a href="http://kb.mailchimp.com/article/how-do-i-log-in-to-the-mailchimp-iphone-app-through-google-apps" target="_blank">Get API Key</a>','retro' ) );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_TextClean();
		$option->setName( __( 'MailChimp API key', 'retro' ) )
				->setDescription( __( 'MailChimp API key', 'retro' ) )
				->setId( SHORTNAME . '_mailchimp_key' )
				->setStd( '' );
		$this->addOption( $option );
	}
}
?>
