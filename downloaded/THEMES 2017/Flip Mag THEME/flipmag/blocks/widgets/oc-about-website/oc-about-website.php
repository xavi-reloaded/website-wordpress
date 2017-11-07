<?php

/*
Widget Name: About Website (Flipmag)
Description: A widget which allows editing of content using the TinyMCE editor.
Author: OctoCreation
Author URI: https://octocreation.com
*/

class Flipmag_About_Website extends SiteOrigin_Widget {

    private $widget_id;

	function __construct() {

		parent::__construct(
			'oc-about-website',
			__('About Website - Flipmag', 'flipmag'),
			array(
				'description' => __('A rich-text, text editor.', 'flipmag'),
                'panels_groups' => array('oc-widgets-bundle'),
                'panels_icon' => 'oc-widget-icon'
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'flipmag'),
				),
                'theme_bgcolor' => array(
                    'type' => 'color',
                    'label' => __('Color', 'flipmag'),
                    'description' => __('Set main color for this block.', 'flipmag')
                ),
				'text' => array(
					'type' => 'tinymce',
					'rows' => 20
				),
				'autop' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => __('Automatically add paragraphs', 'flipmag'),
				),
			),
            get_template_directory_uri()
		);
        $this->widget_id = Flipmag::blocks()->unique_id();
	}

	function unwpautop($string) {
		$string = str_replace("\n", "", $string);
		$string = str_replace("<p>", "", $string);
		$string = str_replace(array("<br />", "<br>", "<br/>"), "\n", $string);
		$string = str_replace("</p>", "\n\n", $string);

		return $string;
	}

	public function get_template_variables( $instance, $args ) {
		$instance = wp_parse_args(
			$instance,
			array(  'text' => '' )
		);

		$instance['text'] = $this->unwpautop( $instance['text'] );

		/* @var $field_factory SiteOrigin_Widget_Field_Factory */
		$field_factory = SiteOrigin_Widget_Field_Factory::single();
		$form_options = $this->form_options();
		$field = $field_factory->create_field( $this->id_base, $form_options['text'], $this );
		$instance['text'] = $field->sanitize( $instance['text'] );

		// Run some known stuff
		if( !empty($GLOBALS['wp_embed']) ) {
			$instance['text'] = $GLOBALS['wp_embed']->autoembed( $instance['text'] );
		}
		if( $instance['autop'] ) {
			$instance['text'] = wpautop( $instance['text'] );
		}
		$instance['text'] = do_shortcode( $instance['text'] );

		return array(
			'text' => $instance['text'],
		);
	}

    function modify_instance($instance){

        $instance['widget_id'] = $this->widget_id;

        return $instance;
    }

    function get_less_variables( $instance ) {

        return array(
            'id' => $this->widget_id,
            'theme_bgcolor' => $instance['theme_bgcolor'],
        );
    }

    function get_template_name($instance) {
        return 'editor';
    }

    function get_style_name($instance){
        return 'default';
    }
}

siteorigin_widget_register( 'oc-about-website', __FILE__, 'Flipmag_About_Website' );