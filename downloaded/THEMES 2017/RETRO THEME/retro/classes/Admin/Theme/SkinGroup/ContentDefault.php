<?php

class Admin_Theme_SkinGroup_ContentDefault extends Admin_Theme_Menu_SkinGroup {



	protected function init() {

		/*
        Body background settings
		--------------------------------------*/
			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Body background color' )
					->setDescription( 'Please select your custom color for body background' )
					->setId( SHORTNAME . '_body_background_color' )
					->setStd( '#3b1812' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option->setName( 'Body pattern image' )
					->setDescription( 'You can upload custom pattern image.' )
					->setId( SHORTNAME . '_body_pattern' )
					->setStd( get_template_directory_uri() . '/images/skin/default/body-tail-1.png' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Body pattern repeat' )
					->setDescription( 'Custom pattern repeat settings for color header' )
					->setId( SHORTNAME . '_body_pattern_repeat' )
					->setStd( 'repeat-x' )
					->setOptions( array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Body attachment' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_body_attachment' )
					->setStd( 'scroll' )
					->setOptions( array( 'fixed', 'scroll' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Body pattern horizontal position' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_body_pattern_x' )
					->setStd( 'left' )
					->setOptions( array( 'left', 'right', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Body pattern vertical' )
					->setDescription( 'Custom pattern vertical position  for color header' )
					->setId( SHORTNAME . '_body_pattern_y' )
					->setStd( 'top' )
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
					->setId( SHORTNAME . '_page_background_color' )
					->setStd( '#f6e5c8' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option->setName( 'Page pattern image' )
					->setDescription( 'You can upload custom pattern image.' )
					->setId( SHORTNAME . '_page_pattern' )
					->setStd( get_template_directory_uri() . '/images/skin/default/content-pattern.png' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Page pattern repeat' )
					->setDescription( 'Custom pattern repeat settings for color header' )
					->setId( SHORTNAME . '_page_pattern_repeat' )
					->setStd( 'repeat' )
					->setOptions( array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Page attachment' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_page_attachment' )
					->setStd( 'scroll' )
					->setOptions( array( 'fixed', 'scroll' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Page pattern horizontal position' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_page_pattern_x' )
					->setStd( 'left' )
					->setOptions( array( 'left', 'right', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Page pattern vertical' )
					->setDescription( 'Custom pattern vertical position  for color header' )
					->setId( SHORTNAME . '_page_pattern_y' )
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
					->setId( SHORTNAME . '_content_pattern' )
					->setStd( get_template_directory_uri() . '/images/main-pattern.jpg' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Content pattern repeat' )
					->setDescription( 'Custom pattern repeat settings for color header' )
					->setId( SHORTNAME . '_content_pattern_repeat' )
					->setStd( 'repeat' )
					->setOptions( array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Content attachment' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_content_attachment' )
					->setStd( 'scroll' )
					->setOptions( array( 'fixed', 'scroll' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Content pattern horizontal position' )
					->setDescription( 'Custom pattern horizontal position  for color header' )
					->setId( SHORTNAME . '_content_pattern_x' )
					->setStd( 'left' )
					->setOptions( array( 'left', 'right', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Content pattern vertical' )
					->setDescription( 'Custom pattern vertical position  for color header' )
					->setId( SHORTNAME . '_content_pattern_y' )
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
					->setId( SHORTNAME . '_headingscolor' )
					->setStd( '#723f32' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Content text color' )
					->setDescription( 'Please select your custom color for content text.' )
					->setId( SHORTNAME . '_textcolor' )
					->setStd( '#867e72' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Content links color' )
					->setDescription( 'Please select your custom color for content links.' )
					->setId( SHORTNAME . '_linkscolor' )
					->setStd( '#723f32' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Accent color' )
					->setDescription( 'Please select your custom color for content links.' )
					->setId( SHORTNAME . '_accentcolor' )
					->setStd( '#959d3b' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

						$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Catalog title color' )
					->setDescription( 'Please select your custom color for catalog title color.' )
					->setId( SHORTNAME . '_pt_catalogue' )
					->setStd( '#867e72' );
			$this->addOptionToGroup( $option );

						$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Catalog price color' )
					->setDescription( 'Please select your custom color for catalog price color.' )
					->setId( SHORTNAME . '_pp_catalogue' )
					->setStd( '#723f32' );
			$this->addOptionToGroup( $option );

						$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Product page title color' )
					->setDescription( 'Please select your custom color for product page title color.' )
					->setId( SHORTNAME . '_tc_page' )
					->setStd( '#723f32' );
			$this->addOptionToGroup( $option );

						$option = new Admin_Theme_Element_Colorchooser();
						$option->setName( 'Product page price color' )
					->setDescription( 'Please select your custom color for product page price color.' )
					->setId( SHORTNAME . '_pp_page' )
					->setStd( '#723f32' );
			$this->addOptionToGroup( $option );

						$option = new Admin_Theme_Element_Colorchooser();
						$option->setName( 'Special price color' )
					->setDescription( 'Please select your custom color for special price color.' )
					->setId( SHORTNAME . '_spc_page' )
					->setStd( '#959d3b' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Widget headings color' )
					->setDescription( 'Please select your custom color for content headings text.' )
					->setId( SHORTNAME . '_headingscolor_widget' )
					->setStd( '#723f32' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Widget text color' )
					->setDescription( 'Please select your custom color for content text.' )
					->setId( SHORTNAME . '_textcolor_widget' )
					->setStd( '#867e72' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Widget links color' )
					->setDescription( 'Please select your custom color for some links inside widgets.' )
					->setId( SHORTNAME . '_linkscolor_widget' )
					->setStd( '#723f32' );
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
