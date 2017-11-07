<?php

class Admin_Theme_SkinGroup_Header_HeaderSkin2 extends Admin_Theme_SkinGroup_ContentSkin2 {

	const NAME = 'skin2';

	protected function init() {

		/*
        Top tail background settings
		--------------------------------------*/
			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Top tail background color' )
					->setDescription( 'Please select your custom color for body background' )
					->setId( SHORTNAME . '_toptail_background_color' . '_' . $this->getName() )
					->setStd( '#65473f' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option->setName( 'Top tail pattern image' )
					->setDescription( 'You can upload custom pattern image.' )
					->setId( SHORTNAME . '_toptail_pattern' . '_' . $this->getName() )
					->setStd( get_template_directory_uri() . '/images/skin/skin2/top-pattern.png' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Top tail pattern repeat' )
					->setDescription( 'Custom pattern repeat settings for color' )
					->setId( SHORTNAME . '_toptail_pattern_repeat' . '_' . $this->getName() )
					->setStd( 'repeat' )
					->setOptions( array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Top tail attachment' )
					->setDescription( 'Custom pattern position color' )
					->setId( SHORTNAME . '_toptail_attachment' . '_' . $this->getName() )
					->setStd( 'scroll' )
					->setOptions( array( 'fixed', 'scroll' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Top tail pattern horizontal position' )
					->setDescription( 'Custom pattern horizontal position  color ' )
					->setId( SHORTNAME . '_toptail_pattern_x' . '_' . $this->getName() )
					->setStd( 'left' )
					->setOptions( array( 'left', 'right', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( 'Top tail pattern vertical' )
					->setDescription( 'Custom pattern vertical position  color' )
					->setId( SHORTNAME . '_toptail_pattern_y' . '_' . $this->getName() )
					->setStd( 'top' )
					->setOptions( array( 'top', 'bottom', 'center' ) );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Colorchooser();

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Top line text color' )
					->setDescription( 'Please select your custom color for topline text' )
					->setId( SHORTNAME . '_topline_textcolor' . '_' . $this->getName() )
					->setStd( '#E9D9C0' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Top line links color' )
					->setDescription( 'Please select your custom color for topline links' )
					->setId( SHORTNAME . '_topline_linkscolor' . '_' . $this->getName() )
					->setStd( '#ffffff' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Top line hover links color' )
					->setDescription( 'Please select your custom color for topline links' )
					->setId( SHORTNAME . '_topline_linkscolor_hover' . '_' . $this->getName() )
					->setStd( '#8db3bc' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Menu text color' )
					->setDescription( 'Please select your custom color for menu text' )
					->setId( SHORTNAME . '_menu_text' . '_' . $this->getName() )
					->setStd( '#6f4135' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Menu active text color' )
					->setDescription( 'Please select your custom color for menu active item text' )
					->setId( SHORTNAME . '_menu_active_text' . '_' . $this->getName() )
					->setStd( '#bfada7' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Separator();
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Title();
				$option->setName( 'Logo styles' );
				$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option->setName( 'Use custom logo image' )
					->setDescription( 'You can upload custom logo image.' )
					->setId( SHORTNAME . '_logo_custom' . '_' . $this->getName() )
					->setStd( get_template_directory_uri() . '/images/skin/skin2/logo.png' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( __( 'Logo position', 'retro' ) )
					->setDescription( __( 'Choose logo position', 'retro' ) )
					->setId( SHORTNAME . '_logo_position' )
					->setStd( 'center' )
					->setOptions( array( 'left', 'center', 'right' ) );
			;
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Checkbox();
			$option->setName( __( 'Hide logo image', 'retro' ) )
					->setDescription( __( 'Check this box if you want to hide logo image and use text site name instead', 'retro' ) )
					->setId( SHORTNAME . '_logo_txt' )
					->setStd( '' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_File();
			$option = new Admin_Theme_Element_Colorchooser();
			$option->setName( 'Logo text color' )
					->setDescription( 'Please select your custom color for logo text' )
					->setId( SHORTNAME . '_logo_color_skin2' )
					->setStd( '#8db3bc' );
			$this->addOptionToGroup( $option );

			$option = new Admin_Theme_Element_Select_Gfont();
			$option->setName( __( 'Choose a Font for logo', 'retro' ) )
					->setDescription( __( 'Choose a Font for titles, etc.', 'retro' ) )
					->setId( SHORTNAME . '_logo_font' )
					->setStd( 'Open Sans' )
					->setCustomized();
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Select();
			$option->setName( __( 'Logo font style', 'retro' ) )
					->setDescription( __( 'Logo font style', 'retro' ) )
					->setId( SHORTNAME . '_logo_font_style' )
					->setStd( 'normal' )
					->setOptions( array( 'italic', 'normal' ) );
			;
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Text();
			$option->setName( __( 'Logo font weight', 'retro' ) )
					->setDescription( __( 'Logo font weight', 'retro' ) )
					->setId( SHORTNAME . '_logo_font_weight' )
					->setStd( '600' );
			$this->addOptionToGroup( $option );
			$option = null;

			$option = new Admin_Theme_Element_Text();
			$option->setName( __( 'Logo text size', 'retro' ) )
					->setDescription( __( 'Logo text size at any units', 'retro' ) )
					->setId( SHORTNAME . '_logo_font_size_skin2' )
					->setStd( '47px' );
			$this->addOptionToGroup( $option );
			$option = null;
	}
}
?>
