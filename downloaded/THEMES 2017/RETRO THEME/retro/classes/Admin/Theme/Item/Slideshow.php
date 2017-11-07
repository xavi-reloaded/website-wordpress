<?php
/**
 * 'Footer' admin menu page
 */
class Admin_Theme_Item_Slideshow extends Admin_Theme_Menu_Item
{
	const CATEGORY	= '_global_slider_cat';
	const COUNT		= '_global_slider_count';
	const TYPE		= '_global_slider';
	const REVSLIDER	= '_global_slider_alias';


	const EFFECT			= '_global_slider_fx';
	const TIMEOUT			= '_global_slider_timeout';
	const SPEED				= '_global_slider_speed';
	const AUTOSCROLL		= '_global_slider_autoscroll';
	const PAUSE				= '_global_slider_pause';
	const FIXEDHEIGHT		= '_global_slider_fixedheight';
	const PADDING			= '_global_slider_padding';

	public static $effects_list = array(
	'fade',
	'blindX',
	'blindY',
	'blindZ',
	'cover',
	'curtainX',
	'curtainY',
					'fadeZoom',
	'growX',
	'growY',
	'none',
	'scrollUp',
					'scrollDown',
	'scrollLeft',
	'scrollRight',
	'scrollHorz',
	'scrollVert',
					'shuffle',
	'slideX',
	'slideY',
	'toss',
	'turnUp',
	'turnDown',
	'turnLeft',
					'turnRight',
	'uncover',
	'wipe',
	'zoom',
	);


	public function __construct( $parent_slug = '' ) {
		$this->setPageTitle( __( 'Slideshows', 'retro' ) );
		$this->setMenuTitle( __( 'Slideshows', 'retro' ) );
		$this->setCapability( 'administrator' );
		$this->setMenuSlug( SHORTNAME . '_slideshows' );
		parent::__construct( $parent_slug );
		$this->init();

	}

	public function init() {

		$option = null;
		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName( __( 'Slideshow Settings', 'retro' ) );
		$this->addOption( $option );
		$option = null;

				$option = new Admin_Theme_Element_Select();
				$option->setName( __( 'Select a global slideshow type', 'retro' ) )
						->setDescription( __( 'Select a global slideshow type ', 'retro' ) )
						->setId( SHORTNAME . self::TYPE )
						->setStd( 'Disable' )
						->setOptions( array( 'Disable', 'revSlider' ) );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Select_Slider();
				$option->setName( __( 'Select one of sliders', 'retro' ) )
					->setDescription( __( 'Select one of sliders ', 'retro' ) )
					->setId( SHORTNAME . self::REVSLIDER );
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Separator();
				$this->addOption( $option );
				$option = null;

				$option = new Admin_Theme_Element_Colorchooser();
				$option->setName( __( 'Headings color - H1', 'retro' ) )
						->setDescription( __( 'Please select your custom color for content headings text.', 'retro' ) )
						->setId( SHORTNAME . '_tp_caption_headings_h1' )
						->setStd( '#723f32' );
				$this->addOption( $option );

				$option = new Admin_Theme_Element_Colorchooser();
				$option->setName( __( 'Headings color - H2', 'retro' ) )
						->setDescription( __( 'Please select your custom color for content headings text.', 'retro' ) )
						->setId( SHORTNAME . '_tp_caption_headings_h2' )
						->setStd( '#723f32' );
				$this->addOption( $option );

				$option = new Admin_Theme_Element_Colorchooser();
				$option->setName( __( 'Headings with line color - H3', 'retro' ) )
						->setDescription( __( 'Please select your custom color for content headings text.', 'retro' ) )
						->setId( SHORTNAME . '_tp_caption_headings_h3' )
						->setStd( '#9f9489' );
				$this->addOption( $option );

				$option = new Admin_Theme_Element_Colorchooser();
				$option->setName( __( 'Headings color - H4', 'retro' ) )
						->setDescription( __( 'Please select your custom color for content headings text.', 'retro' ) )
						->setId( SHORTNAME . '_tp_caption_headings_h4' )
						->setStd( '#8f442f' );
				$this->addOption( $option );

				$option = new Admin_Theme_Element_Colorchooser();
				$option->setName( __( 'Text color', 'retro' ) )
						->setDescription( __( 'Please select your custom color for content text.', 'retro' ) )
						->setId( SHORTNAME . '_tp_caption_textcolor' )
						->setStd( '#9f917a' );
				$this->addOption( $option );

				$option = new Admin_Theme_Element_Separator();
				$this->addOption( $option );
				$option = null;

	}



	private function getSlideshowEffectList() {

		return self::$effects_list;
	}

	/**
	 * Static function for getting jCycle effect list in format arrya('effect name'=>'value', .....)
	 *
	 * @return type
	 */
	public static function getMetaSlideshowEffectList() {

		$meta_list = array();

		foreach ( self::$effects_list as $effect ) {
			$meta_list[]  = array( 'name' => $effect, 'value' => $effect );
		}
		return $meta_list;
	}

	/**
	 * List of slideshow effects for Custom_MetaBox_Item_Default<br/>
	 * in format array('effect1 name'=>'value', 'effect2'=>'value')
	 *
	 * @return type
	 */
	public static function getTaxonomySlideshowEffectList() {

		$meta_list = array();

		foreach ( self::$effects_list as $effect ) {
			$meta_list[ $effect ]  = $effect;
		}
		return $meta_list;
	}


	/**
	 * Save form and set option-flag for reinit rewrite rules on init
	 */
	public function saveForm() {

		parent::saveForm();

	}

	/**
	 * Reset form and set option-flag for reinit rewrite rules on init
	 */
	public function resetForm() {

		parent::resetForm();

	}
}
?>
