<?php

class Admin_Theme_Item_Captcha extends Admin_Theme_Menu_Item
{
	public function __construct( $parent_slug = '' ) {

		$this->setPageTitle( __( 'reCaptcha','retro' ) );
		$this->setMenuTitle( __( 'reCaptcha','retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_recaptcha' );
		parent::__construct( $parent_slug );
		$this->init();
	}

	public function init() {

		$option = null;
		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( 'reCaptcha <a href=\'' . $this->getCaptchaURL() . '\' title=\'Get your reCAPTCHA API Keys\'  target=\'_blank\'>Keys</a>' );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_Info();
		$option->setName( __( 'Learn more about reCaptcha <a href=\'//developers.google.com/recaptcha/\' title=\'What is reCAPTCHA?\'  target=\'_blank\'>here</a>','retro' ) );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_TextClean();
		$option->setName( __( 'Public Key','retro' ) )
				->setDescription( __( 'These keys are required for using in reCaptcha.','retro' ) )
				->setId( SHORTNAME . '_captcha_public_key' )
				->setStd( '' );
		$this->addOption( $option );

		$option = new Admin_Theme_Element_TextClean();
		$option->setName( __( 'Private Key','retro' ) )
				->setDescription( __( 'These keys are required for using in reCaptcha.','retro' ) )
				->setId( SHORTNAME . '_captcha_private_key' )
				->setStd( '' );
		$this->addOption( $option );
	}

	private function getCaptchaURL() {

		$url = str_replace( array( 'http://', 'https://' ), '',  home_url() );
		return 'https://www.google.com/recaptcha/admin/create?domains=' . $url . '&amp;app=wordpress';
	}
}
?>
