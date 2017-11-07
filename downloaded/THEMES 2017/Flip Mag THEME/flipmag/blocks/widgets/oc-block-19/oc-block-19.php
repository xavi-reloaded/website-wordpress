<?php
/*
Widget Name: Block 19
Description: Gives you a widget to display your posts as a block.
Author: Flipmag
Author URI: http://octocreation.com/
*/

class Flipmag_Block_19 extends SiteOrigin_Widget {

    private $widget_id;

    function __construct() {
            parent::__construct(
                    'oc-block-19',
                    __('Block 19 - Flipmag', 'flipmag'),
                    array(
                            'description' => __('Display your posts as block 19 module.', 'flipmag'),
                            'panels_groups' => array('oc-widgets-bundle'),
                            'panels_icon' => 'oc-widget-icon'
                    ),
                    array(

                    ),
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

                            'posts' => array(
                                    'type' => 'posts',
                                    'label' => __('Posts query', 'flipmag'),
                            ),
                            
                            'controls' => array(
                                            'type' => 'section',
                                            'label' => __('Controls', 'flipmag'),
                                            'fields' => array(
                                                
                                                'pagination' => array(
                                                                'type' => 'select',
                                                                'label' => __('Pagination', 'flipmag'),
                                                                'options' => array(
                                                                        'disable' => __('Disable', 'flipmag'),
                                                                        'normal' => __('Normal Pagination', 'flipmag'),
                                                                        'ajax' => __('Ajax pagination', 'flipmag'),                                                                        
                                                                        'infinite' => __('Infinite Scroll', 'flipmag'),
                                                                ),
                                                                'default' => 'normal',
                                                        ),
                                                
                                                'animation' => array(
                                                                'type' => 'select',
                                                                'label' => __('Animation', 'flipmag'),
                                                                'options' => array(
                                                                        '' => __('None', 'flipmag'),
                                                                        'fadeInDown animation' => __('Fade In Down', 'flipmag'),                                                                        
                                                                        'fadeInUp animation' => __('Fade In Up', 'flipmag'),
                                                                        'fadeInLeft animation' => __('Fade In Left', 'flipmag'),
                                                                        'fadeInRight animation' => __('Fade In Right', 'flipmag'),
                                                                ),
                                                                'default' => 'normal',
                                                        ),
                                                
                                                'disable_date' => array(
                                                                'type' => 'select',
                                                                'label' => __('Disable Date', 'flipmag'),
                                                                'options' => array(
                                                                        'yes' => __('Yes', 'flipmag'),
                                                                        'no' => __('No', 'flipmag'),                                            
                                                                ),
                                                                'default' => 'no',
                                                        ),

                                                'date_format' => array(
                                                    'type' => 'select',
                                                    'label' => __('Choose date format ', 'flipmag'),
                                                    'description' => sprintf(__( 'example date : JANUARY 25, %s  When date is enable.', 'flipmag'), date('Y')),
                                                    'options' => array(
                                                        '' => sprintf(__('JANUARY 25, %s', 'flipmag'), date('Y')),
                                                        'F jS, Y' => sprintf(__('JANUARY 25TH, %s' , 'flipmag'), date('Y')),
                                                        'j F, Y' => sprintf(__('25 JANUARY, %s' , 'flipmag'), date('Y')),
                                                        'jS F, Y' => sprintf(__('25TH JANUARY, %s' , 'flipmag'), date('Y')),
                                                        'M j, Y' => sprintf(__('JAN 25, %s' , 'flipmag'), date('Y')),
                                                        'M jS, Y' => sprintf(__('JAN 25TH, %s', 'flipmag'), date('Y')),
                                                        'j M, Y' => sprintf(__('25 JAN, %s' , 'flipmag'), date('Y')),
                                                        'jS M, Y' => sprintf(__('25TH JAN, %s', 'flipmag'), date('Y')),
                                                        'd-m-Y' => sprintf(__( '25-1-%s' , 'flipmag'), date('Y')),
                                                        'd/m/Y' => sprintf(__( '25/1/%s' , 'flipmag'), date('Y')),
                                                        'Y-m-d' => sprintf(__( '%s-1-25' , 'flipmag'), date('Y')),
                                                        'Y/m/d' => sprintf(__( '%s/1/25' , 'flipmag'), date('Y')),
                                                    ),
                                                    'default' => 'Y-m-d\TH:i:sP',
                                                ),
                                                
                                                'date_link' => array(
                                                                'type' => 'select',
                                                                'label' => __('Date archive link url', 'flipmag'),
                                                                'description' => __( 'If date enable.', 'flipmag'),
                                                                'options' => array(
                                                                        'day' => __('Day', 'flipmag'),
                                                                        'month' => __('Month', 'flipmag'),
                                                                        'year' => __('Year', 'flipmag'),
                                                                ),
                                                                'default' => 'day',
                                                        ),
                                                
                                                'disable_cat' => array(
                                                                'type' => 'select',
                                                                'label' => __('Disable Category', 'flipmag'),
                                                                'options' => array(
                                                                        'yes' => __('Yes', 'flipmag'),
                                                                        'no' => __('No', 'flipmag'),                                            
                                                                ),
                                                                'default' => 'no',
                                                        ),
                                                
                                                'disable_comment' => array(
                                                                'type' => 'select',
                                                                'label' => __('Disable Comment', 'flipmag'),
                                                                'options' => array(
                                                                        'yes' => __('Yes', 'flipmag'),
                                                                        'no' => __('No', 'flipmag'),                                            
                                                                ),
                                                                'default' => 'no',
                                                        ),
                                                
                                                'disable_author' => array(
                                                                'type' => 'select',
                                                                'label' => __('Disable Author', 'flipmag'),
                                                                'options' => array(
                                                                        'yes' => __('Yes', 'flipmag'),
                                                                        'no' => __('No', 'flipmag'),                                            
                                                                ),
                                                                'default' => 'no',
                                                        ),
                                                
                                                'disable_excerpt' => array(
                                                                'type' => 'select',
                                                                'label' => __('Disable Excerpt', 'flipmag'),
                                                                'options' => array(
                                                                        'yes' => __('Yes', 'flipmag'),
                                                                        'no' => __('No', 'flipmag'),                                            
                                                                ),
                                                                'default' => 'no',
                                                        ),
                                                
                                                'excerpt_length' => array(
                                                                'type' => 'number',
                                                                'label' => __('Excerpt Length ', 'flipmag'),
                                                                'description' => __( 'If excerpt enable.', 'flipmag'),
                                                                'default' => 55,
                                                        ),
                                                
                                                'disable_more' => array(
                                                                'type' => 'select',
                                                                'label' => __('Disable Read More (If excerpt enable)', 'flipmag'),
                                                                'description' => __( 'If excerpt enable.', 'flipmag'),
                                                                'options' => array(
                                                                        'yes' => __('Yes', 'flipmag'),
                                                                        'no' => __('No', 'flipmag'),                                            
                                                                ),
                                                                'default' => 'no',
                                                        ),
                                                
                                                
                                                )
                                    )
                        
                    ),
                    get_template_directory_uri()
            );

        $this->widget_id = Flipmag::blocks()->unique_id();
    }

    function initialize() {

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

    function get_template_name($instance){
        return 'base';
    }

    function get_style_name($instance){
        return 'default';
    }
}

siteorigin_widget_register('oc-block-19', __FILE__, 'Flipmag_Block_19');