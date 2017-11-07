<?php

class Admin_Theme_SkinGroup_Footer_FooterSkin3 extends Admin_Theme_SkinGroup_ContentSkin3 {

	const NAME = 'skin3';

	protected function init() {

		/*
        Footer background settings
		--------------------------------------*/
			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Footer background color' )
					->setDescription( 'Please select your custom color for Footer background' )
					->setId( SHORTNAME . '_footer_background_color' . '_' . $this->getName() )
					->setStd( '#77493e' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option->setName( 'Footer pattern image' )
					->setDescription( 'You can upload custom pattern image.' )
					->setId( SHORTNAME . '_footer_pattern' . '_' . $this->getName() )
					->setStd( get_template_directory_uri() . '/images/skin/skin3/footer-area-bg.png' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Footer pattern repeat' )
					->setDescription( 'Custom pattern repeat settings for color header' )
					->setId( SHORTNAME . '_footer_pattern_repeat' . '_' . $this->getName() )
					->setStd( 'repeat' )
					->setOptions( array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Footer attachment' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_footer_attachment' . '_' . $this->getName() )
					->setStd( 'scroll' )
					->setOptions( array( 'fixed', 'scroll' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Footer pattern horizontal position' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_footer_pattern_x' . '_' . $this->getName() )
					->setStd( 'left' )
					->setOptions( array( 'left', 'right', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Footer pattern vertical' )
					->setDescription( 'Custom pattern vertical position  for color header' )
					->setId( SHORTNAME . '_footer_pattern_y' . '_' . $this->getName() )
					->setStd( 'top' )
					->setOptions( array( 'top', 'bottom', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Copyright text color' )
					->setDescription( 'Please select your custom color for footer text' )
					->setId( SHORTNAME . '_footertextcolor' . '_' . $this->getName() )
					->setStd( '#f6e8d3' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$option->setType( Admin_Theme_Menu_Element::TYPE_SEPARATOR );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Footer widget headings color' )
					->setDescription( 'Please select your custom color for footer headings' )
					->setId( SHORTNAME . '_footerheadingscolor_widget' . '_' . $this->getName() )
					->setStd( '#f4f1ee' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Footer widget text color' )
					->setDescription( 'Please select your custom color for footer text' )
					->setId( SHORTNAME . '_footertextcolor_widget' . '_' . $this->getName() )
					->setStd( '#e9d9c0' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Footer widget links color' )
					->setDescription( 'Please select your custom color for footer links' )
					->setId( SHORTNAME . '_footerlinkscolor_widget' . '_' . $this->getName() )
					->setStd( '#d88889' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$option->setType( Admin_Theme_Menu_Element::TYPE_SEPARATOR );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Footer elements color' )
					->setDescription( 'Please select your custom color for footer elements' )
					->setId( SHORTNAME . '_footer_element_color' . '_' . $this->getName() )
					->setStd( '#4d251d' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$option->setType( Admin_Theme_Menu_Element::TYPE_SEPARATOR );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option->setName( 'Footer custom logo image' )
					->setDescription( 'You can upload custom logo image.' )
					->setId( SHORTNAME . '_logo_footer_custom' . '_' . $this->getName() )
					->setStd( get_template_directory_uri() . '/images/skin/skin3/logo-footer.png' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Checkbox();
			$option->setName( __( 'Hide logo image', 'retro' ) )
					->setDescription( __( 'Check this box if you want to hide logo image and use text site name instead', 'retro' ) )
					->setId( SHORTNAME . '_logo_footer_txt' )
					->setStd( '' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Separator();
			$option->setType( Admin_Theme_Menu_Element::TYPE_SEPARATOR );
			$this->addOptionToGroup( $option );
			$option = null;
	}
}
?>
