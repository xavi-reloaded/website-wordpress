<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "wealth_option";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'wealth_option',
        'use_cdn' => TRUE,
        'display_name'     => $theme->get('Name'),
        'display_version'  => $theme->get('Version'),
        'page_title' => 'Wealth Options',
        'update_notice' => FALSE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Wealth Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => FALSE,
        'dev_mode'   => false,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );    

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'wealth' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'wealth' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'wealth' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'wealth' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'wealth' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    // ACTUAL DECLARATION OF SECTIONS   
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-picture',
        'title' => esc_html__('Logo & Favicon Settings', 'wealth'),
        'fields' => array(
            array(
                'id' => 'favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Favicon', 'wealth'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => esc_html__('Favicon.', 'wealth'),
                'subtitle' => esc_html__('Favicon', 'wealth'),
               'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),                     
            ),
            array(
                'id' => 'logo',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo', 'wealth'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => esc_html__('logo.', 'wealth'),
                'subtitle' => esc_html__('Logo', 'wealth'),
               'default' => array('url' => get_template_directory_uri().'/images/logo.png'),                     
            ), 
            array(
                'id' => 'apple_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Apple Touch Icon 57x57', 'wealth'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => esc_html__('Upload your Apple touch icon 57x57.', 'wealth'),
                'subtitle' => esc_html__('', 'wealth'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon.png'),
            ),                  
            array(
                'id' => 'apple_icon_72',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Apple Touch Icon 72x72', 'wealth'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => esc_html__('Upload your Apple touch icon 72x72.', 'wealth'),
                'subtitle' => esc_html__('', 'wealth'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-72x72.png'),
            ),
            array(
                'id' => 'apple_icon_114',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Apple Touch Icon 114x114', 'wealth'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => esc_html__('Upload your Apple touch icon 114x114.', 'wealth'),
                'subtitle' => esc_html__('', 'wealth'),
                'default' => array('url' => get_template_directory_uri().'/images/apple-touch-icon-114x114.png'),
            ),                                   
        )
    ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-qrcode',
        'title' => esc_html__('Header Settings', 'wealth'),
        'fields' => array(
            array(

                'id' => 'header_layout',

                'type' => 'image_select',

                'title' => esc_html__('Header Layout', 'wealth'),

                'subtitle' => esc_html__('Select Your Header layout', 'wealth'),

                'desc' => '',

                'options' => array(

                    'header1' => array(

                        'alt'   => 'Hlayout 1',

                        'img'   => get_template_directory_uri().'/images/hlayout1.png'

                    ),

                    'header2' => array(

                        'alt'   => 'Hlayout 2',

                        'img'   => get_template_directory_uri().'/images/hlayout2.png'

                    ),  
                  
                ), 

                'default' => 'header1'

            ),
            array(
                'id' => 'header-background-color',
                'type' => 'color',
                'title' => esc_html__('Header Static Background Color', 'wealth'),
                'subtitle' => esc_html__('Pick the header static background color for the theme (default: transparent).', 'wealth'),
                'default' => 'transparent',
                'validate' => 'color',
            ),
            
            array(
                'id' => 'header-small-background-color',
                'type' => 'color',
                'title' => esc_html__('Header Scroll Background Color', 'wealth'),
                'subtitle' => esc_html__('Pick the header scroll background color for the theme.', 'wealth'),
                'default' => '#18191b',
                'validate' => 'color',
            ),
            array(
                'id' => 'header-text-color',
                'type' => 'color',
                'title' => esc_html__('Header Text Color', 'wealth'),
                'subtitle' => esc_html__('Pick the header text color for the theme (default: #fff).', 'wealth'),
                'default' => '#fff',
                'validate' => 'color',
            ),            
        )
    ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-font',
        'title' => esc_html__('Typography', 'wealth'),
        'fields' => array(
            array(
                'id' => 'h1-typography',
                'type' => 'typography',
                'output' => array('h1'),
                'title' => esc_html__('Heading 1', 'wealth'),
                'subtitle' => esc_html__('Specify the heading 1 font properties.', 'wealth'),
                'google' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),   
            array(
                'id' => 'h2-typography',
                'type' => 'typography',
                'output' => array('h2'),
                'title' => esc_html__('Heading 2', 'wealth'),
                'subtitle' => esc_html__('Specify the heading 2 font properties.', 'wealth'),
                'google' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ), 
            array(
                'id' => 'h3-typography',
                'type' => 'typography',
                'output' => array('h3'),
                'title' => esc_html__('Heading 3', 'wealth'),
                'subtitle' => esc_html__('Specify the heading 3 font properties.', 'wealth'),
                'google' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ), 
            array(
                'id' => 'h4-typography',
                'type' => 'typography',
                'output' => array('h4'),
                'title' => esc_html__('Heading 4', 'wealth'),
                'subtitle' => esc_html__('Specify the heading 4 font properties.', 'wealth'),
                'google' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ), 
            array(
                'id' => 'h5-typography',
                'type' => 'typography',
                'output' => array('h5'),
                'title' => esc_html__('Heading 5', 'wealth'),
                'subtitle' => esc_html__('Specify the heading 5 font properties.', 'wealth'),
                'google' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ), 
            array(
                'id' => 'h6-typography',
                'type' => 'typography',
                'output' => array('h6'),
                'title' => esc_html__('Heading 6', 'wealth'),
                'subtitle' => esc_html__('Specify the heading 6 font properties.', 'wealth'),
                'google' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),    

            array(
                'id' => 'menu-typography',
                'type' => 'typography',
                'output' => array('.lp-header .navbar-default .navbar-nav>li>a'),
                'title' => esc_html__('Menu item', 'wealth'),
                'subtitle' => esc_html__('Specify the Menu item font properties.', 'wealth'),
                'google' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => '',
                ),
            ),                                   
        )
    ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-blogger',
        'title' => esc_html__('Blog Settings', 'wealth'),
        'fields' => array(
            array(
                'id' => 'bg_blog',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Background Blog subHeader Pages', 'wealth'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => esc_html__('Background Blog subHeader Pages', 'wealth'),
                'subtitle' => esc_html__('Background Blog subHeader Pages', 'wealth'),
               'default' => array('url' => get_template_directory_uri().'/images/subheader-1.jpg'),                     
            ),
            array(
                'id' => 'blog_excerpt',
                'type' => 'text',
                'title' => esc_html__('Blog custom excerpt lenght', 'wealth'),
                'subtitle' => esc_html__('Input Blog custom excerpt lenght', 'wealth'),
                'desc' => esc_html__('Blog custom excerpt lenght', 'wealth'),
                'default' => '30'
            ),
            array(
                'id' => 'the_blog_single',
                'type' => 'text',
                'title' => esc_html__('The Blog Single Title', 'wealth'),
                'subtitle' => esc_html__('Input blog single', 'wealth'),
                'desc' => esc_html__('The Blog Single Title', 'wealth'),
                'default' => 'The Blog Single'
            ),                     
         )
    ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-group',
        'title' => esc_html__('Social Settings', 'wealth'),
        'fields' => array(
            array(
                'id' => 'facebook',
                'type' => 'text',
                'title' => esc_html__('Facebook Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://www.facebook.com/',
            ),
            array(
                'id' => 'twitter',
                'type' => 'text',
                'title' => esc_html__('Twitter Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://twitter.com/',
            ),
            array(
                'id' => 'google',
                'type' => 'text',
                'title' => esc_html__('Google+ Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://plus.google.com',
            ),
            array(
                'id' => 'github',
                'type' => 'text',
                'title' => esc_html__('Github Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '#'
            ),
            array(
                'id' => 'youtube',
                'type' => 'text',
                'title' => esc_html__('Youtube Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'linkedin',
                'type' => 'text',
                'title' => esc_html__('Linkedin Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'behance',
                'type' => 'text',
                'title' => esc_html__('Behance Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),
            array(
                'id' => 'instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),
            array(
                'id' => 'skype',
                'type' => 'text',
                'title' => esc_html__('Skype Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),  
            array(
                'id' => 'pinterest',
                'type' => 'text',
                'title' => esc_html__('pinterest Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'vimeo',
                'type' => 'text',
                'title' => esc_html__('vimeo Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'tumblr',
                'type' => 'text',
                'title' => esc_html__('tumblr Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'soundcloud',
                'type' => 'text',
                'title' => esc_html__('soundcloud Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'lastfm',
                'type' => 'text',
                'title' => esc_html__('lastfm Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'rss',
                'type' => 'text',
                'title' => esc_html__('RSS Url', 'wealth'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '#',
            ),
            array(
                'id' => 'social_extended',
                'type' => 'editor',
                'title' => esc_html__('Social Extended', 'wealth'),
                'subtitle' => esc_html__('Add html social extended code here, eg: <a target="_blank" href="#"><i class="fa fa-facebook-square"></i></a>', 'wealth'),
                'default' => '',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-credit-card',
        'title' => esc_html__('Footer Settings', 'wealth'),
        'fields' => array(
            array(

                'id' => 'footer_layout',

                'type' => 'image_select',

                'title' => esc_html__('Footer Layout', 'wealth'),

                'subtitle' => esc_html__('Select Your Footer layout', 'wealth'),

                'desc' => '',

                'options' => array(

                    'footer1' => array(

                        'alt'   => 'Flayout 1',

                        'img'   => get_template_directory_uri().'/images/flayout1.png'

                    ),

                    'footer2' => array(

                        'alt'   => 'Flayout 2',

                        'img'   => get_template_directory_uri().'/images/flayout2.png'

                    ), 
                  
                ), 

                'default' => 'footer1'

            ),  
            array(
                'id' => 'footer_textcolor',
                'type' => 'color',
                'title' => esc_html__('Footer Text Color', 'wealth'),
                'subtitle' => esc_html__('Pick the Footer Text color for the theme.', 'wealth'),
                'default' => '#cccccc',
                'validate' => 'color',
            ),
            array(
                'id' => 'footer_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'wealth'),
                'subtitle' => esc_html__('Pick the Footer Background color for the theme.', 'wealth'),
                'default' => '#111111',
                'validate' => 'color',
            ),
            array(
                'id' => 'footer_text',
                'type' => 'editor',
                'title' => esc_html__('Footer Text', 'wealth'),
                'subtitle' => esc_html__('Copyright Text', 'wealth'),
                'default' => '&copy; Copyright 2015 &#8211; wealth by OceanThemes',
            ),            
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-website',
        'title' => esc_html__('Styling Options', 'wealth'),
        'fields' => array(
            
            array(
                'id' => 'main-color',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color', 'wealth'),
                'subtitle' => esc_html__('Pick the main color for the theme.', 'wealth'),
                'default' => '#FAB207',
                'validate' => 'color',
            ),  
            array(
                'id' => 'second-color',
                'type' => 'color',
                'title' => esc_html__('Theme Second Color', 'wealth'),
                'subtitle' => esc_html__('Pick the second color for the theme.', 'wealth'),
                'default' => '#FAB207',
                'validate' => 'color',
            ),                  
            array(
                'id' => 'body-font2',
                'type' => 'typography',
                'output' => array('body'),
                'title' => esc_html__('Body Font', 'wealth'),
                'subtitle' => esc_html__('Specify the body font properties.', 'wealth'),
                'google' => true,
                'default' => array(
                    'color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-family' => '',
                    'font-weight' => ''
                ),
            ),
             array(
                'id' => 'custom-css',
                'type' => 'ace_editor',
                'title' => esc_html__('CSS Code', 'wealth'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'wealth'),
                'mode' => 'css',
                'theme' => 'monokai',
                'desc' => 'Possible modes can be found at http://ace.c9.io/.',
                'default' => "#header{\nmargin: 0 auto;\n}"
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
