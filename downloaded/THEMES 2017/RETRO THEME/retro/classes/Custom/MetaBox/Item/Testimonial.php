<?php

class Custom_MetaBox_Item_Testimonial extends Custom_MetaBox_Item_Default
{

	function __construct( $taxonomy ) {
		parent::__construct( $taxonomy );
		$this->setId( 'testimonial_meta_box' )
			->setTitle( 'Testimonial Taxonomy Meta Box' );
		$this->addFields();
	}

	protected function addFields() {

		parent::addFields();
		$this->getMetaTaxInstance()->addSelect( SHORTNAME . '_post_listing_layout', array( '' => 'Use global', 'layout_none_sidebar' => 'Full width', 'layout_left_sidebar' => 'Left sidebar', 'layout_right_sidebar' => 'Right sidebar' ), array( 'name' => 'Layout', 'std' => '' ) );

		$this->getMetaTaxInstance()->addSelect(
			SHORTNAME . '_post_listing_sidebar',
			array_merge(
				array(
					'' => 'Use global',
					'default-sidebar' => 'Use default',
				),
				$this->getSidebars()
			),
			array(
				'name' => 'Sidebar',
				'std' => 'default',
			)
		);

		$this->getMetaTaxInstance()->addText( SHORTNAME . '_post_listing_number', array( 'name' => 'Items per page' ) );

				$this->getMetaTaxInstance()->addParagraph( SHORTNAME . '_slider_option_type_description', array( 'value' => 'Slideshow option description' ) );
				$this->getMetaTaxInstance()->addSelect( SHORTNAME . '_tax_slider', array( '' => 'Use global', 'revSlider' => 'revSlider', 'Disable' => 'Disable' ), array( 'name' => 'Slideshow type', 'std' => '', 'desc' => 'Select a slideshow type for current taxonomy' ) );
				$this->getMetaTaxInstance()->addSelect( SHORTNAME . '_tax_revslider_alias', Admin_Theme_Element_Select_Slider::getSliders(), array( 'name' => 'Slider', 'std' => '', 'desc' => 'Select a slider for current category' ) );

	}
}
?>