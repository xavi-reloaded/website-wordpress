<?php
/*
Widget Name: Recent Tweet
Description: Get recent tweet from your twitter account.
Author: Flipmag
Author URI: http://octocreation.com/
*/

class Flipmag_Recent_Tweet extends SiteOrigin_Widget {

    private $widget_id;

    function __construct() {
        parent::__construct(
            'oc-recent-tweet',
            __('Recent Tweet - Flipmag', 'flipmag'),
            array(
                'description' => __('Get recent tweet from your twitter account.', 'flipmag'),
                'panels_groups' => array('oc-widgets-bundle'),
                'panels_icon' => 'oc-widget-icon'
            ),
            array(

            ),
            array(
                'info' => array(
                    'type' => 'error',
                    'description' => sprintf(__('Get your API keys &amp; tokens at: %s', 'flipmag') , '<a href="'.esc_url('https://apps.twitter.com/').'" target="_blank">'.esc_url('https://apps.twitter.com/').'</a>'),
                ),

                'title' => array(
                    'type' => 'text',
                    'label' => __('Title', 'flipmag'),
                ),

                'theme_bgcolor' => array(
                    'type' => 'color',
                    'label' => __('Color', 'flipmag'),
                    'description' => __('Set main color for this block.', 'flipmag')
                ),

                'consumer-key' => array(
                    'type' => 'text',
                    'label' => __('Consumer Key', 'flipmag'),
                ),

                'consumer-secret' => array(
                    'type' => 'text',
                    'label' => __('Consumer Secret', 'flipmag'),
                ),

                'access-token' => array(
                    'type' => 'text',
                    'label' => __('Access Token', 'flipmag'),
                ),

                'token-secret' => array(
                    'type' => 'text',
                    'label' => __('Access Token Secret', 'flipmag'),
                ),

                'twitter-username' => array(
                    'type' => 'text',
                    'label' => __('Twitter Username', 'flipmag'),
                ),

                'count' => array(
                    'type' => 'select',
                    'label' => __('Tweets to display', 'flipmag'),
                    'options' => array(
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                        6 => 6,
                        7 => 7,
                        8 => 8,
                        9 => 9,
                        10 => 10
                    ),
                    'default' => 3,
                ),


            ),
            get_template_directory_uri()
        );
        $this->widget_id = Flipmag::blocks()->unique_id();
    }

    function initialize() {
        $this->register_frontend_styles(
            array(
                array(
                    'oc-tweet-base',
                    get_template_directory_uri(). '/blocks/widgets/oc-recent-tweet/css/'.(is_rtl() ? 'rtl-' : '').'style.css',
                    array(),
                    SOW_BUNDLE_VERSION
                ),
            )
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

    function get_template_name($instance){
        return 'base';
    }

    function get_style_name($instance){
        return 'default';
    }
}

siteorigin_widget_register('oc-recent-tweet', __FILE__, 'Flipmag_Recent_Tweet');