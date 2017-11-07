<?php

class Admin_Theme_SkinGroup_ContentSkin1 extends Admin_Theme_Menu_SkinGroup {

	const NAME = 'skin1';

	protected function init() {

		/*
        Body background settings
		--------------------------------------*/
			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Body background color' )
					->setDescription( 'Please select your custom color for body background' )
					->setId( SHORTNAME . '_body_background_color' . '_' . $this->getName() )
					->setStd( '#5c757a' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option->setName( 'Body pattern image' )
					->setDescription( 'You can upload custom pattern image.' )
					->setId( SHORTNAME . '_body_pattern' . '_' . $this->getName() );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Body pattern repeat' )
					->setDescription( 'Custom pattern repeat settings for color header' )
					->setId( SHORTNAME . '_body_pattern_repeat' . '_' . $this->getName() )
					->setOptions( array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			// $this->getFonts();
			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Body attachment' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_body_attachment' . '_' . $this->getName() )
					->setOptions( array( 'fixed', 'scroll' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Body pattern horizontal position' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_body_pattern_x' . '_' . $this->getName() )
					->setOptions( array( 'left', 'right', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Body pattern vertical' )
					->setDescription( 'Custom pattern vertical position  for color header' )
					->setId( SHORTNAME . '_body_pattern_y' . '_' . $this->getName() )
					->setOptions( array( 'top', 'bottom', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			/*
            Page background settings
			--------------------------------------*/
			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Page background color' )
					->setDescription( 'Please select your custom color for Page background' )
					->setId( SHORTNAME . '_page_background_color' . '_' . $this->getName() )
					->setStd( '#e6e7e2' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option->setName( 'Page pattern image' )
					->setDescription( 'You can upload custom pattern image.' )
					->setId( SHORTNAME . '_page_pattern' . '_' . $this->getName() )
					->setStd( get_template_directory_uri() . '/images/skin/skin1/content-pattern.png' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Page pattern repeat' )
					->setDescription( 'Custom pattern repeat settings for color header' )
					->setId( SHORTNAME . '_page_pattern_repeat' . '_' . $this->getName() )
					->setStd( 'repeat' )
					->setOptions( array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Page attachment' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_page_attachment' . '_' . $this->getName() )
					->setStd( 'scroll' )
					->setOptions( array( 'fixed', 'scroll' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Page pattern horizontal position' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_page_pattern_x' . '_' . $this->getName() )
					->setStd( 'left' )
					->setOptions( array( 'left', 'right', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Page pattern vertical' )
					->setDescription( 'Custom pattern vertical position  for color header' )
					->setId( SHORTNAME . '_page_pattern_y' . '_' . $this->getName() )
					->setStd( 'top' )
					->setOptions( array( 'top', 'bottom', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			/*
            Content background settings
			--------------------------------------*/
			$option = new Admin_Theme_Element_File();
			$option->setName( 'Content pattern image' )
					->setDescription( 'You can upload custom pattern image.' )
					->setId( SHORTNAME . '_content_pattern' . '_' . $this->getName() )
					->setStd( get_template_directory_uri() . '/images/main-pattern.jpg' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Content pattern repeat' )
					->setDescription( 'Custom pattern repeat settings for color header' )
					->setId( SHORTNAME . '_content_pattern_repeat' . '_' . $this->getName() )
					->setStd( 'repeat' )
					->setOptions( array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Content attachment' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_content_attachment' . '_' . $this->getName() )
					->setStd( 'scroll' )
					->setOptions( array( 'fixed', 'scroll' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Content pattern horizontal position' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_content_pattern_x' . '_' . $this->getName() )
					->setStd( 'left' )
					->setOptions( array( 'left', 'right', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Content pattern vertical' )
					->setDescription( 'Custom pattern vertical position  for color header' )
					->setId( SHORTNAME . '_content_pattern_y' . '_' . $this->getName() )
					->setStd( 'top' )
					->setOptions( array( 'top', 'bottom', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Content headings color' )
					->setDescription( 'Please select your custom color for content headings text.' )
					->setId( SHORTNAME . '_headingscolor' . '_' . $this->getName() )
					->setStd( '#6a6a6a' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Content text color' )
					->setDescription( 'Please select your custom color for content text.' )
					->setId( SHORTNAME . '_textcolor' . '_' . $this->getName() )
					->setStd( '#867e72' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Content links color' )
					->setDescription( 'Please select your custom color for content links.' )
					->setId( SHORTNAME . '_linkscolor' . '_' . $this->getName() )
					->setStd( '#6a6a6a' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Accent color' )
					->setDescription( 'Please select your custom color for content links.' )
					->setId( SHORTNAME . '_accentcolor' . '_' . $this->getName() )
					->setStd( '#a65b3b' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			                        $option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Catalog title color' )
					->setDescription( 'Please select your custom color for catalog title color.' )
					->setId( SHORTNAME . '_pt_catalogue' . '_' . $this->getName() )
					->setStd( '#867e72' );
			$this->addOptionToGroup( $option );

						$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Catalog price color' )
					->setDescription( 'Please select your custom color for catalog price color.' )
					->setId( SHORTNAME . '_pp_catalogue' . '_' . $this->getName() )
					->setStd( '#6A6A6A' );
			$this->addOptionToGroup( $option );

						$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Product page title color' )
					->setDescription( 'Please select your custom color for product page title color.' )
					->setId( SHORTNAME . '_tc_page' . '_' . $this->getName() )
					->setStd( '#6A6A6A' );
			$this->addOptionToGroup( $option );

						$option = new Admin_Theme_Element_Colorchooser();
						$option->setName( 'Product page price color' )
					->setDescription( 'Please select your custom color for product page price color.' )
					->setId( SHORTNAME . '_pp_page' . '_' . $this->getName() )
					->setStd( '#6A6A6A' );
			$this->addOptionToGroup( $option );

						$option = new Admin_Theme_Element_Colorchooser();
						$option->setName( 'Special price color' )
					->setDescription( 'Please select your custom color for special price color.' )
					->setId( SHORTNAME . '_spc_page' . '_' . $this->getName() )
					->setStd( '#a65b3b' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Widget headings color' )
					->setDescription( 'Please select your custom color for content headings text.' )
					->setId( SHORTNAME . '_headingscolor_widget' . '_' . $this->getName() )
					->setStd( '#6a6a6a' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Widget text color' )
					->setDescription( 'Please select your custom color for content text.' )
					->setId( SHORTNAME . '_textcolor_widget' . '_' . $this->getName() )
					->setStd( '#867e72' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Widget links color' )
					->setDescription( 'Please select your custom color for some links inside widgets.' )
					->setId( SHORTNAME . '_linkscolor_widget' . '_' . $this->getName() )
					->setStd( '#6a6a6a' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;
	}

	function getName() {
		return self::NAME;
	}
}
?>
