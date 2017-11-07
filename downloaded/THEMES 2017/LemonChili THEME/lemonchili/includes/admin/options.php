<?php

function optionsframework_option_name() {
        
        // This gets the theme name from the stylesheet (lowercase and without spaces)    
        if (function_exists('wp_get_theme')){
                $theme_data = wp_get_theme('theme-name');
                $themename = $theme_data->Name;
        } else {
                $theme_data = wp_get_theme(STYLESHEETPATH . '/style.css');
                $themename = $theme_data['Name'];
        }    
        $themename = preg_replace("/\W/", "", strtolower($themename) );
        
        $optionsframework_settings = get_option('optionsframework');
        $optionsframework_settings['id'] = $themename;
        update_option('optionsframework', $optionsframework_settings);
}

function optionsframework_options() {
   
    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }

    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }

    // If using image radio buttons, define a directory path
    $imagepath =  get_template_directory_uri() . '/includes/admin/images/';
    
    
    // VARIABLES        
    $shortname = "gg";    
    $skin = array("light" => __('light','gxg_textdomain'), "dark" => __('dark','gxg_textdomain'),);
    $fonts = array("Open Sans" => "default (Open Sans)",
                   "Open Sans Condensed" => "Open Sans Condensed",
                   "Montserrat" => "Montserrat",
                   "Bree Serif" => "Bree Serif",
                   "Patua One" => "Patua One",
                   "Croissant One" => "Croissant One",
                   "Cherry Swash" => "Cherry Swash",
                    "Ruda" => "Ruda",
                    "Dosis" => "Dosis",
                    "Ubuntu Mono" => "Ubuntu Mono",
                    "Anonymous Pro" => "Anonymous Pro",
                    "Love Ya Like A Sister" => "Love Ya Like A Sister",
                    "Patrick Hand" => "Patrick Hand",
                    "Rancho" => "Rancho" );
    
    $trans = array("none" => "none", "uppercase" => "uppercase");
    
    $teamcols = array("3cols" => "3 columns", "2cols" => "2 columns");
    
    $showevents = array("remove" => "remove event from events page", "keep" => "keep event on events page");
   


    // Pull all the slider posts into an array
    $args = array("numberposts" => -1 , "orderby" => "post_date" , "post_type" => "slider"); 
    $options_slides = array();
    $options_slides_obj = get_posts($args);
    $options_slides[''] = 'Select a slider:';
    foreach ($options_slides_obj as $page) {
        $options_slides[$page->ID] = $page->post_title;
    }
    
    
    
    // OPTIONS    
    $options = array();        

//------------------------------------------------------------------------------
// GENERAL
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('GENERAL','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/g.png");

        $options[] = array( "name" => __('Configure the general setup of your theme.','gxg_textdomain'),
        "type" => "info");


        $options[] = array( "name" => __('Load responsive stylesheets','gxg_textdomain'),
                                                "desc" => __('Check this box if you would like to load responsive stylesheets for tablets and mobile phones','gxg_textdomain'),   
                                                "id" => $shortname."_responsive",
                                                "std" => "1",
                                                "type" => "checkbox");


        
        $options[] = array( "name" => __('Custom CSS','gxg_textdomain'),
                                                "desc" => __('Want to add any custom CSS code? Put it in here, and the rest is taken care of. This overrides any other stylesheets.','gxg_textdomain'),
                                                "id" => $shortname."_custom_css",
                                                "std" => "",
                                                "type" => "textarea");
        
        $options[] = array( "name" => __('404 Error','gxg_textdomain'),
                                                "desc" => __('Add your own text to display on error pages.','gxg_textdomain'),
                                                "id" => $shortname."_404error",
                                                "std" => "",
                                                "type" => "textarea");

        $options[] = array( "name" => __('Google Analytics Code','gxg_textdomain'),
                                                "desc" => __('Enter your Google Analytics or other tracking code here. It will be inserted before the closing head tag of your theme.','gxg_textdomain'),
                                                "id" => $shortname."_google_analytics",
                                                "std" => "",
                                                "type" => "textarea");

// THEME CUSTOMIZATION
        $options[] = array( "name" => __('Theme Customization','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");

        $options[] = array( "name" => __('Text for "Navigation" on mobile devices','gxg_textdomain'),
                                                "desc" => __('Text to be used for the <strong>Navigation</strong> on mobile devices','gxg_textdomain'),
                                                "id" => $shortname."_navitext",
                                                "std" => "Navigation",
                                                "type" => "text");
        
        $options[] = array( "name" => __('Make left area scrollable','gxg_textdomain'),
                                                "desc" => __('Check this box if you would like the left area (Logo, navigation, search bar, social icons) to scroll with the content','gxg_textdomain'),   
                                                "id" => $shortname."_scroll",
                                                "std" => "0",
                                                "type" => "checkbox");
        
        $options[] = array( "name" => __('Make top bar scrollable','gxg_textdomain'),
                                                "desc" => __('Check this box if you would like the Top Bar to scroll with the content','gxg_textdomain'),   
                                                "id" => $shortname."_scroll_top",
                                                "std" => "0",
                                                "type" => "checkbox");

        $options[] = array( "name" =>  __('Team Page - Number of columns','gxg_textdomain'),
                                                "id" => $shortname."_teamcols",
                                                "std" => "3cols",
                                                "type" => "select",
                                                "options" => $teamcols);

        $options[] = array( "name" =>  __('When event is over...','gxg_textdomain'),
                                                "desc" => __('This does not affect the events widget (past events will always be removed from the event widget).','gxg_textdomain'),                           
                                                "id" => $shortname."_showevents",
                                                "std" => "remove",
                                                "type" => "select",
                                                "options" => $showevents);

        $options[] = array( "name" => __('Display search bar','gxg_textdomain'),
                                                "desc" => __('Check this box if you would like to display a search bar below the navigation area','gxg_textdomain'),   
                                                "id" => $shortname."_searchbar",
                                                "std" => "1",
                                                "type" => "checkbox");

        $options[] = array( "name" => __('Show author info in the news info section','gxg_textdomain'),
                                                "desc" => __('Check this box if you would like to display the name of the author for each news posts','gxg_textdomain'),   
                                                "id" => $shortname."_author",
                                                "std" => "0",
                                                "type" => "checkbox");

        $options[] = array( "name" => __('Remove Comments','gxg_textdomain'),
                                                "id" => $shortname."_commentremove",
                                                "desc" => __('Remove all comment sections from the entire website','gxg_textdomain'),
                                                "std" => "0",
                                                "type" => "checkbox");
        
        $options[] = array( "name" => __('Copyright text','gxg_textdomain'),
                                                "desc" => __('Add your own  copyright text to display below content.','gxg_textdomain'),
                                                "id" => $shortname."_copyright",
                                                "std" => "",
                                                "type" => "textarea");


// LOGO
        $options[] = array( "name" => __('Logo','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");
                                        
        $options[] = array( "name" => __('Upload Logo','gxg_textdomain'),
                                                "desc" => __('Upload your Logo. Recommended image width: 140px.','gxg_textdomain'),
                                                "id" => $shortname."_logo_image",
                                                "type" => "upload");

        $options[] = array( "name" => __('Upload Retina Logo (Optional)','gxg_textdomain'),
                                                "desc" => __('Upload your Retina Logo. This should be your Logo in double size (If your Logo is 140 x 50px, it should be 280 x 100px)','gxg_textdomain'),
                                                "id" => $shortname."_logo_retina",
                                                "type" => "upload");
                                                
        $options[] = array( "name" => __('Original Logo Width','gxg_textdomain'),
                                                "desc" => __('Enter the width of the Standard Logo you have uploaded (not the Retina Logo). If your Logo has a width of 140px, enter: 140. This is important for your Retina Logo to display properly.','gxg_textdomain'),
                                                "id" => $shortname."_logo_width",
                                                "std" => "",
                                                "type" => "text");
                                                
        $options[] = array( "name" => __('Original Logo Height','gxg_textdomain'),
                                                "desc" => "Enter the height of the Standard Logo you have uploaded (not the Retina Logo). If your Logo has a height of 100px, enter: 100. This is important for your Retina Logo to display properly.",
                                                "id" => $shortname."_logo_height",
                                                "std" => "",
                                                "type" => "text");

// FAVICON
        $options[] = array( "name" => __('Favicon','gxg_textdomain'),
                                                "desc" => "The below field is deprecated. Please use Appearance > Customize > Site Identity > Site Icon instead.",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");

        $options[] = array( "name" => __('Favicon','gxg_textdomain'),
                                                "desc" => __('Upload a 16 x 16 favicon','gxg_textdomain'),
                                                "id" => $shortname."_favicon",
                                                "std" => "",
                                                "type" => "upload");
        
// GRAVATAR
        $options[] = array( "name" => __('Custom Gravatar','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");
        
        $options[] = array( "name" => __('Custom Gravatar','gxg_textdomain'),
                                                "desc" => __('Upload a Gravatar','gxg_textdomain'),
                                                "id" => $shortname."_gravatar",
                                                "std" => "",
                                                "type" => "upload");


//------------------------------------------------------------------------------
// STYLE
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('STYLE','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/st.png");

        $options[] = array( "name" => __('Choose light or dark skin, set a background image or color and add a box shadow and rounded corners.','gxg_textdomain'),
        "type" => "info");
        
        $options[] = array( "name" => __('Theme Skin','gxg_textdomain'),
                                                "desc" => __('Choose light or dark skin','gxg_textdomain'),
                                                "id" => $shortname."_skin",
                                                "std" => "light",
                                                "type" => "select",
                                                "options" => $skin);

        $options[] = array( "name" => __('Box Shadow','gxg_textdomain'),
        					   "desc" =>  __('Add box shadow to Left Area, Slider and Main Content','gxg_textdomain'),
                                                "id" => $shortname."_shadow",
                                                "std" => "0",
                                                "type" => "checkbox");
        
        $options[] = array( "name" => __('Rounded Corners','gxg_textdomain'),
                                                "desc" =>  __('Add rounded corners to Left Area, Slider and Main Content','gxg_textdomain'), 
                                                "id" => $shortname."_borderradius",
                                                "std" => "0",
                                                "type" => "checkbox");        



        $options[] = array( "name" => __('Background','gxg_textdomain'),
                                                "desc" => "Optionally you can upload your background image in Appearance > Customize > Background Image.",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");

        $options[] = array( "name" => __('Background Image ','gxg_textdomain'),
                                                "id" => $shortname."_bg_image_custom",
                                                "type" => "upload");

        $options[] = array( "name" => __('Background Position','gxg_textdomain'),
                                                "desc" => __('Choose background image positioning','gxg_textdomain'),
                                                "id" => $shortname."_bg_position",
                                                "std" => "stretched",
                                                "type" => "radio",
                                                "options" => array(
                                                        'repeat' => __('Repeat Background','gxg_textdomain'),
                                                        'stretched' => __('Stretched Background  /  Fixed Position','gxg_textdomain'),
                                                        'fixed' => __('No Repeat  /  Position: Top Center','gxg_textdomain'),
                                                        )
                                                );

        $options[] = array( "name" => __('Background Color','gxg_textdomain'),
                                                "desc" =>  __('Choose a simple color instead of a background image.','gxg_textdomain'),
                                                "id" => $shortname."_bg_color",
                                                "std" => "",
                                                "type" => "color");



   
//------------------------------------------------------------------------------
// TYPOGRAPHY
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('TYPOGRAPHY','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/t.png");

        $options[] = array( "name" =>  __('Select your favorite font or upload one of hundreds of Google Web fonts. This applies to headings, page title, widget title, navigation, slider caption, event date, price and button text.','gxg_textdomain'),
        "type" => "info");

        $options[] = array( "name" => __('Predefined Fonts','gxg_textdomain'),
                                                "desc" => __('Choose a font for your headings, page title, widget title, navigation, slider caption, event date, price and button text','gxg_textdomain'),
                                                "id" => $shortname."_font",
                                                "std" => "Open Sans",
                                                "type" => "select",
                                                "options" => $fonts);
        
        $options[] = array( "name" =>  __('Custom Google Web Font','gxg_textdomain'),
                                                "desc" => __('Simply enter the name of the Google font here. The rest is taken care of. (Applies to headings, page title, widget title, navigation, slider caption, event date, price and button text)','gxg_textdomain'),
                                                "id" => $shortname."_font2",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" =>  __('Font Weight','gxg_textdomain'),
                                                "desc" => __('Set font weight. Default: 800 (Applies to headings, page title, widget title, navigation, slider caption, event date, price and button text) Info: Normal = 400','gxg_textdomain'),
                                                "id" => $shortname."_fontweight",
                                                "std" => "800",
                                                "type" => "text");        

        $options[] = array( "name" =>  __('Text Transform','gxg_textdomain'),
                                                "desc" => __('Some Headings are UPPERCASE letters by default. However, some fonts simply don\'t look right with just uppercase letters. Here you can set the text transform to NONE','gxg_textdomain'),
                                                "id" => $shortname."_trans",
                                                "std" => "uppercase",
                                                "type" => "select",
                                                "options" => $trans);

        $options[] = array( "name" =>  __('Letter Spacing','gxg_textdomain'),
                                                "desc" => __('Letter spacing for page title and widget title is set to -1px by default. However, some fonts simply don\'t look right with negative letter spacing. Here you can set letter spacing to 0. If you want to set letter spacing to -1px, enter: -1','gxg_textdomain'),
                                                "id" => $shortname."_letterspacing",
                                                "std" => "-1",
                                                "type" => "text");

//------------------------------------------------------------------------------
// COLOR
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('COLOR','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/col.png");

        $options[] = array( "name" => __('Set the theme color.','gxg_textdomain'),
        "type" => "info");


        $options[] = array( "name" => __('Predefined Theme Color','gxg_textdomain'),
                                                "id" => $shortname."_link_color",
                                                "std" => "#00BECC",
                                                "type" => "images",
                                                "options" => array(
                                                        '#FDB813' => $imagepath . '/color/fdb813.jpg',
                                                        '#F1592A' => $imagepath . '/color/f1592a.jpg',
                                                        '#ff4229' => $imagepath . '/color/ff4229.jpg',                                                         
                                                        '#fb2e2e' => $imagepath . '/color/fb2e2e.jpg',
                                                        
                                                        '#EF65A3' => $imagepath . '/color/ef65a3.jpg',
                                                        '#fc416a' => $imagepath . '/color/fc416a.jpg',
                                                        '#ff4354' => $imagepath . '/color/ff4354.jpg',
                                                        '#ff1190' => $imagepath . '/color/ff1190.jpg',
                                                        
                                                        '#14b8f5' => $imagepath . '/color/14b8f5.jpg',
                                                        '#00BECC' => $imagepath . '/color/00becc.jpg',
                                                        '#18cece' => $imagepath . '/color/18cece.jpg',
                                                        '#16a085' => $imagepath . '/color/16a085.jpg',
                                                        
                                                        '#BC5727' => $imagepath . '/color/bc5727.jpg',
                                                        '#9e5f35' => $imagepath . '/color/9e5f35.jpg',
                                                        '#927155' => $imagepath . '/color/927155.jpg',
                                                        '#9a8764' => $imagepath . '/color/9a8764.jpg'                                                       
                                                        )
                                                );
        
        $options[] = array( "name" => __('Custom Theme Color','gxg_textdomain'),
                                                "desc" => __('If you prefer a different color than the ones above,  you can select a custom color here. This field has priority over the Predefined Theme Color.','gxg_textdomain'),
                                                "id" => $shortname."_link_colorpicker",
                                                "std" => "",
                                                "type" => "color");

        $options[] = array( "name" => __('Navigation Menu Active/Hover Color','gxg_textdomain'),
                                                "id" => $shortname."_navicolor",
                                                "std" => "#26282A",
                                                "type" => "color");

        $options[] = array( "name" => __('Seondary (Hover) Color','gxg_textdomain'),
                                                "desc" => __('Pick a secondary color.','gxg_textdomain'),
                                                "id" => $shortname."_hovercolor",
                                                "std" => "#B07D5B",
                                                "type" => "color");


        $options[] = array( "name" => __('Copyright Text Color','gxg_textdomain'),
                                                "desc" => __('Pick a color for the copyright text below content','gxg_textdomain'),
                                                "id" => $shortname."_copyright_colorpicker",
                                                "std" => "#eeeeee",
                                                "type" => "color");        


//------------------------------------------------------------------------------
// SLIDER
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('SLIDER','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/s.png");

        $options[] = array( "name" => __('Set up your slider','gxg_textdomain'),
        "type" => "info");


        $options[] = array( "name" => __('Show Slider on Homepage','gxg_textdomain'),
                                                "id" => $shortname."_slider",
                                                "std" => "1",
                                                "type" => "checkbox");
                                                
                                                
        $options[] = array( "name" => __('Select a Slider','gxg_textdomain'),
                                                "desc" => __('After you have created a slider, you can select it here.','gxg_textdomain'),
                                                "id" => $shortname."_sliderimages",
                                                "type" => "select",
                                                "options" => $options_slides);
 
//------------------------------------------------------------------------------
// SOCIAL
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('SOCIAL','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/so.png");

        $options[] = array( "name" => __('Enter the info for your social network accounts to display them below the navigation or in the Top Bar.','gxg_textdomain'), 
        "type" => "info");


        $options[] = array( "name" => __('Social icons position','gxg_textdomain'),
                                                "id" => $shortname."_social_pos",
                                                "std" => "left",
                                                "type" => "radio",
                                                "options" => array(
                                                        'top' => __('in Top Bar','gxg_textdomain'),
                                                        'left' => __('below navigation','gxg_textdomain'),
                                                        )
                                                );        

        $options[] = array( "name" => "Facebook",
                                                "desc" => __('Enter the full URL to your Facebook profile','gxg_textdomain'),
                                                "id" => $shortname."_fb",
                                                "std" => "",
                                                "type" => "text");   
        
        $options[] = array( "name" => "Twitter",
                                                "desc" => __('Enter the full URL to your Twitter profile','gxg_textdomain'),
                                                "id" => $shortname."_twitter",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Google Plus",
                                                "desc" => __('Enter the full URL to your Google Plus profile','gxg_textdomain'),
                                                "id" => $shortname."_googleplus",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Foursquare",
                                                "desc" => __('Enter the full URL to your FourSquare profile','gxg_textdomain'),
                                                "id" => $shortname."_foursquare",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Yelp",
                                                "desc" => __('Enter the full URL to your Yelp page','gxg_textdomain'),
                                                "id" => $shortname."_yelp",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Tripadvisor",
                                                "desc" => __('Enter the full URL to your Tripadvisor page','gxg_textdomain'),
                                                "id" => $shortname."_tripadvisor",
                                                "std" => "",
                                                "type" => "text");        

        $options[] = array( "name" => "YouTube",
                                                "desc" => __('Enter the full URL to your YouTube page','gxg_textdomain'),
                                                "id" => $shortname."_youtube",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Instagram",
                                                "desc" => __('Enter the full URL to your Instagram profile','gxg_textdomain'),
                                                "id" => $shortname."_instagram",
                                                "std" => "",
                                                "type" => "text"); 
        
        $options[] = array( "name" => "Pinterest",
                                                "desc" => __('Enter the full URL to your Pinterest profile','gxg_textdomain'),
                                                "id" => $shortname."_pinterest",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Flickr",
                                                "desc" => __('Enter the full URL to your Flickr profile','gxg_textdomain'),
                                                "id" => $shortname."_flickr",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "LinkedIn",
                                                "desc" => __('Enter the full URL to your LinkedIn profile','gxg_textdomain'),
                                                "id" => $shortname."_linkedin",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Skype",
                                                "desc" => __('Enter the full URL to your Skype profile','gxg_textdomain'),
                                                "id" => $shortname."_skype",
                                                "std" => "",
                                                "type" => "text");

        
//------------------------------------------------------------------------------
// CONTACT
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('CONTACT','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/cont.png");

        $options[] = array( "name" => __('Enter the contact info for the Top Bar - and the settings for your Contact Form.','gxg_textdomain'),
        "type" => "info");


// CONTACT FORM
        $options[] = array( "name" => __('Contact Form','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");

        $options[] = array( "name" => __('Contact Form - Email Address','gxg_textdomain'),
                                                "desc" => __('Enter the email address where the email from the contact form should be sent to.','gxg_textdomain'),
                                                "id" => $shortname."_email_adress",
                                                "std" => "my@email.com",
                                                "type" => "text");

        $options[] = array( "name" => __('Contact Form - Subject','gxg_textdomain'),
                                                "desc" => __('Enter the subject for messages that are sent via the contact form.','gxg_textdomain'),
                                                "id" => $shortname."_email_subject",
                                                "std" => "contact form mail",
                                                "type" => "text");
        
        
// TOP BAR
        $options[] = array( "name" => __('Top Bar','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");        

        $options[] = array( "name" => __('Top Bar - Phone','gxg_textdomain'),
                                                "desc" => __('Enter a phone number to diplay in the Top Bar.','gxg_textdomain'),
                                                "id" => $shortname."_phone",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => __('Top Bar - Tap To Call','gxg_textdomain'),
                                                "desc" => __('If you want to enable "Tap to Call" for mobile phones, enter the phone number including country and area code, without any punctuation here.','gxg_textdomain'),
                                                "id" => $shortname."_taptocall",
                                                "std" => "",
                                                "type" => "text");
        

        $options[] = array( "name" => __('Top Bar - Address','gxg_textdomain'),
                                                "desc" => __('Enter an address to diplay in the Top Bar.','gxg_textdomain'),
                                                "id" => $shortname."_address",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => __('Top Bar - Link to Google Maps','gxg_textdomain'),
                                                "desc" => __('If you would like your address to link to Google maps, enter the google maps full URL here.','gxg_textdomain'),
                                                "id" => $shortname."_googlemaps",
                                                "std" => "",
                                                "type" => "textarea");        


        $options[] = array( "name" => __('Top Bar Font Size','gxg_textdomain'),
                                                "desc" => "Enter the font size for the text in the Top Bar. If you would like to use a font size of 11px, enter: 11. (default: 11)",
                                                "id" => $shortname."_topbarfontsize",
                                                "std" => "11",
                                                "type" => "text");  

        $options[] = array( "name" => __('Top Bar Icon Size','gxg_textdomain'),
                                                "desc" => "Enter the size for the icons in the Top Bar. If you would like to use a icon size of 14px, enter: 14. (default: 14)",
                                                "id" => $shortname."_topbariconsize",
                                                "std" => "14",
                                                "type" => "text");  

        $options[] = array( "name" => __('Top Bar Text and Icon Color','gxg_textdomain'),
                                                "desc" => __('Pick a color for the text and icons in the top bar.','gxg_textdomain'),
                                                "id" => $shortname."_topbartextcolor",
                                                "std" => "#909294",
                                                "type" => "color");


        return $options;
}