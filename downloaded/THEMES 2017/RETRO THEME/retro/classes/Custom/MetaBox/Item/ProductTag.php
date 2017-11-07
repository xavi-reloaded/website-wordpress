<?php

class Custom_MetaBox_Item_ProductTag extends Custom_MetaBox_Item_Default
{

	const TAG_TAX = 'product_tag';

	function __construct() {

		parent::__construct( self::TAG_TAX );
		$this->setId( 'product_tag_post_meta_box' )
			->setTitle( 'Product Tag Taxonomy Meta Box' );
		$this->addFields();
	}

	protected function addFields() {

		parent::addFields();
		$this->getMetaTaxInstance()->addSelect( SHORTNAME . '_post_listing_layout', array( '' => 'Use Shop page settings', 'layout_none_sidebar' => 'Full width', 'layout_left_sidebar' => 'Left sidebar', 'layout_right_sidebar' => 'Right sidebar' ), array( 'name' => 'Layout', 'std' => '' ) );

		$this->getMetaTaxInstance()->addSelect(
			SHORTNAME . '_post_listing_sidebar',
			array_merge(
				array(
					'' => 'Use Shop page settings',
					'default-sidebar' => 'Use default',
				),
				$this->getSidebars()
			),
			array(
				'name' => 'Sidebar',
				'std' => 'default',
			)
		);

		/**
		 * @todo add paragraph text
		 */
		$this->getMetaTaxInstance()->addParagraph( SHORTNAME . '_slider_option_type_description', array( 'value' => 'Slideshow option description' ) );
		$this->getMetaTaxInstance()->addSelect( SHORTNAME . '_tax_slider', array( '' => 'Use global', 'revSlider' => 'revSlider', 'Disable' => 'Disable' ), array( 'name' => 'Slideshow type', 'std' => '', 'desc' => 'Select a slideshow type for current taxonomy' ) );
		$this->getMetaTaxInstance()->addSelect( SHORTNAME . '_tax_revslider_alias', Admin_Theme_Element_Select_Slider::getSliders(), array( 'name' => 'Slider', 'std' => '', 'desc' => 'Select a slider for current category' ) );
	}
}
?>
