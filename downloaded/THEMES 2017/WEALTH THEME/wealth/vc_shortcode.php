<?php 
//Custom Heading
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Heading", 'wealth'),
   "base"      => "heading",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Text", 'wealth'),
         "param_name"=> "text",
         "value"     => "",
         "description" => esc_html__("Add Text", 'wealth')
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Element Tag', 'wealth'),
        "param_name" => "tag",
        "value" => array(
                     esc_html__('Select Tag', 'wealth') => '',
                     esc_html__('h1', 'wealth') => 'h1',
                     esc_html__('h2', 'wealth') => 'h2',
                     esc_html__('h3', 'wealth') => 'h3',  
                     esc_html__('h4', 'wealth') => 'h4',
                     esc_html__('h5', 'wealth') => 'h5',
                     esc_html__('h6', 'wealth') => 'h6',  
                     esc_html__('p', 'wealth')  => 'p',
                     esc_html__('div', 'wealth') => 'div',
                    ),
        "description" => esc_html__("Section Element Tag", 'wealth'),      
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Text Align', 'wealth'),
        "param_name" => "align",
        "value" => array( 
                     esc_html__('Select Align', 'wealth') => '',  
                     esc_html__('left', 'wealth') => 'left',
                     esc_html__('right', 'wealth') => 'right',  
                     esc_html__('center', 'wealth') => 'center',
                     esc_html__('justify', 'wealth') => 'justify',                    
                    ),

        "description" => esc_html__("Section Overlay", 'wealth'),      

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => esc_html__("Font Size", 'wealth'),

         "param_name"=> "size",

         "value"     => "",

         "description" => esc_html__("Font Size", 'wealth')

      ),
      array(

         "type"      => "colorpicker",

         "holder"    => "div",

         "class"     => "",

         "heading"   => esc_html__("Color", 'wealth'),

         "param_name"=> "color",

         "value"     => "",

         "description" => esc_html__("Color", 'wealth')

      ),
      
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Class Extra", 'wealth'),
         "param_name"=> "class",
         "value"     => "",
         "description" => esc_html__("Class extra for style", 'wealth')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Font Weight", 'wealth'),
         "param_name"=> "fontw",
         "value"     => "",
         "description" => esc_html__("Ex: 200, 500, 600, 700 ...", 'wealth')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Letter Spacing", 'wealth'),
         "param_name"=> "spacing",
         "value"     => "",
         "description" => esc_html__("Ex: 1, 2, 3  ...(px)", 'wealth')
      ),

      array(
        "type" => "dropdown",
        "heading" => esc_html__('Font Family', 'wealth'),
        "param_name" => "font",
        "value" => array(   
                     
                     esc_html__('Roboto', 'wealth') => 'font1',
                     esc_html__('Roboto Slab', 'wealth') => 'font2',
                     esc_html__('Roboto Condensed', 'wealth') => 'font3',
                     //esc_html__('Lato', 'wealth') => 'font4',
                     esc_html__('Vidaloka', 'wealth') => 'font5',
                     esc_html__('Pacifico', 'wealth') => 'font6',
                     //esc_html__('Source Sans Pro', 'wealth') => 'font7',                     
                     esc_html__('PT Sans Narrow', 'wealth') => 'font8',
                     esc_html__('PT Sans', 'wealth') => 'font9',
                     esc_html__('Comfortaa', 'wealth') => 'font10',
                     esc_html__('Open Sans', 'wealth') => 'font11',                     
                     esc_html__('Contrail One', 'wealth') => 'font12',
                     esc_html__('Cabin', 'wealth') => 'font13',                     
                     esc_html__('Hammersmith One', 'wealth') => 'font14',
                     esc_html__('Domine', 'wealth') => 'font15',
                     esc_html__('Oswald', 'wealth') => 'font16',
                     esc_html__('Montserrat:400,700', 'wealth') => 'font17',
                     esc_html__('Playfair Display', 'wealth') => 'font18',
                     esc_html__('Josefin Sans', 'wealth') => 'font19',
                     esc_html__('Asap', 'wealth') => 'font20',
                     esc_html__('Source Sans Pro', 'wealth') => 'font21',
                                       
                    ),

        "description" => esc_html__("Section Overlay", 'wealth'),      
      ),
      array(
         'type' => 'css_editor',
         'heading' => esc_html__( 'CSS box', 'wealth' ),
         'param_name' => 'css',
         // 'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'smileshop' ),
         'group' => esc_html__( 'Design Options', 'wealth' )
      ), 
    )));

}

// Buttons
if(function_exists('vc_map')){
   vc_map( array(

   "name" => esc_html__("OT Button", 'wealth'),

   "base" => "button",

   "class" => "",

   "category" => 'Wealth Element',

   "icon" => "icon-st",

   "params" => array(

      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Link Button", 'wealth'),
         "param_name" => "linkbox",         
         "description" => esc_html__("Add link to button.", 'wealth')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Font Size", 'wealth'),
         "param_name"=> "size",
         "value"     => "",
         "description" => esc_html__("Font Size", 'wealth'),
      ),
      array(
         "type"      => "colorpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Color", 'wealth'),
         "param_name"=> "color",
         "value"     => "",
         "description" => esc_html__("Color", 'wealth'),
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Font Weight", 'wealth'),
         "param_name"=> "fontw",
         "value"     => "",
         "description" => esc_html__("Ex: 200, 500, 600, 700 ...", 'wealth')
      ), 
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Letter Spacing", 'wealth'),
         "param_name"=> "spacing",
         "value"     => "",
         "description" => esc_html__("Ex: 1, 2, 3  ...(px)", 'wealth')
      ),
      array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Use Icon?', 'wealth' ),
        'param_name' => 'icon_check',
        'description' => esc_html__( 'If checked, icon will be used as button.', 'wealth' ),
        'value' => array( esc_html__( 'Yes', 'wealth' ) => 'yes' )
      ),
      array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wealth' ),
        'param_name' => 'icon',
        'dependency' => array(
          'element' => 'icon_check',
          'not_empty' => true,
        ),
      ),         
      array(
         'type' => 'css_editor',
         'heading' => esc_html__( 'CSS box', 'wealth' ),
         'param_name' => 'css',
         // 'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'smileshop' ),
         'group' => esc_html__( 'Design Options', 'wealth' )
      ), 
    )));

}

// Gallery
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Gallery", 'wealth'),
   "base" => "galeryposts",
   "class" => "",
   "category" => 'Wealth Element',
   "icon" => "icon-st",
   "params" => array(        
      
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Gallery",
         "param_name" => "gallery",
         "value" => "",
         "description" => esc_html__("Slider", 'wealth')
      ),

      array(
        "type" => "dropdown",
        "heading" => esc_html__('Style', 'wealth'),
        "param_name" => "style",
        "value" => array( 
                     esc_html__('Style 1: Photorgaphy', 'wealth') => 'style1',
                     esc_html__('Style 2: Diet Product', 'wealth') => 'style2', 
                     esc_html__('Style 3: Makeup Artist', 'wealth') => 'style3',
                     esc_html__('Style 4: Moving', 'wealth') => 'style4',
                     esc_html__('Style 5: Wedding Venue', 'wealth') => 'style5',
                    ),
      ),
      array(
         "type"      => "dropdown",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Visible", 'wealth'),
         "param_name"=> "visible",
         "value" => array( 
                     esc_html__('1 Col', 'wealth') => '1',
                     esc_html__('2 Col', 'wealth') => '2', 
                     esc_html__('3 Col', 'wealth') => '3',
                     esc_html__('4 Col', 'wealth') => '4',
                     esc_html__('5 Col', 'wealth') => '5',
                     esc_html__('6 Col', 'wealth') => '6',
                    ),
      ),
    )
    ));
}


// Call To Action
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Call To Action", 'wealth'),
   "base"      => "callto",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Style', 'wealth'),
        "param_name" => "style",
        "value" => array( 
                     esc_html__('Style 1: Car Booking', 'wealth') => 'style1',
                     esc_html__('Style 2: Fitness', 'wealth') => 'style2', 
                    ),
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'), 
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ),       
      ),
      array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon 1", 'wealth'),
         "param_name"=> "icon1",
         "value"     => "",         
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2' ) ),
      ),
       array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon 2", 'wealth'),
         "param_name"=> "icon2",
         "value"     => "",         
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2' ) ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2' ) ),         
      ), 
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Sub Title", 'wealth'),
         "param_name" => "stitle",
         "value" => "",   
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2' ) ),      
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Button 1", 'wealth'),
         "param_name" => "linkbox1",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2' ) ),         
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo button 1", 'wealth'),
         "param_name" => "photo2",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),         
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Button 2", 'wealth'),
         "param_name" => "linkbox2",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2' ) ),         
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo button 2", 'wealth'),
         "param_name" => "photo3",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),         
      ),
    )));
}

// Question
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Question", 'wealth'),
   "base"      => "question",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
       
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Question", 'wealth'),
         "param_name" => "question",
         "value" => "",         
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Answer", 'wealth'),
         "param_name" => "content",
         "value" => "",         
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Style', 'wealth'),
        "param_name" => "style",
        "value" => array(   
                     
                     esc_html__('Style 1', 'wealth') => 'style1',
                     esc_html__('Style 2: Car Booking', 'wealth') => 'style2',
                     esc_html__('Style 3: Car Wash', 'wealth') => 'style3',
                                       
                    ),

        "description" => esc_html__("Select Style", 'wealth'),      
      ),

    )));
}

// Quick View
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Quick View", 'wealth'),
   "base"      => "quick",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth')
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),         
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Style', 'wealth'),
        "param_name" => "style",
        "value" => array(   
                     
                     esc_html__('Style 1: With Button (cake booking)', 'wealth') => 'style1',
                     esc_html__('Style 2: No Button (diet products)', 'wealth') => 'style2',  
                                       
                    ),

        "description" => esc_html__("Select Style", 'wealth'),      
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price", 'wealth'),
         "param_name" => "price",
         "value" => "",
         "description" => esc_html__("Price of products", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2' ) ),
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Ratting', 'wealth'),
        "param_name" => "ratting",
        "value" => array(   
                     
                     esc_html__('No ratting', 'wealth') => '0',
                     esc_html__('0,5 star', 'wealth') => '0.5',
                     esc_html__('1 star', 'wealth') => '1',
                     esc_html__('1,5 star', 'wealth') => '1.5',
                     esc_html__('2 star', 'wealth') => '2',
                     esc_html__('2,5 star', 'wealth') => '2.5',
                     esc_html__('3 star', 'wealth') => '3',
                     esc_html__('3,5 star', 'wealth') => '3.5',
                     esc_html__('4 star', 'wealth') => '4', 
                     esc_html__('4,5 star', 'wealth') => '4.5', 
                     esc_html__('5 star', 'wealth') => '5',
                                       
                    ),
        "dependency"  => array( 'element' => 'style', 'value' => array( 'style2' ) ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Phone Number", 'wealth'),
         "param_name" => "number",
         "value" => "",
         "description" => esc_html__("Phone number or hotline", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ),
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'wealth'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("Content right.", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1', 'style2' ) ),
      ),
      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Link Button", 'wealth'),
         "param_name" => "linkbox",         
         "description" => esc_html__("Add link to Button.", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ),
      ), 

    )));
}

// Quick View Video
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Quick View Video", 'wealth'),
   "base"      => "quickvideo",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Sub Title", 'wealth'),
         "param_name" => "stitle",
         "value" => "",
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'wealth'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("Content right.", 'wealth'),
      ),
      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Link Button", 'wealth'),
         "param_name" => "linkbox",         
         "description" => esc_html__("Add link to Button.", 'wealth'),
      ), 
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),         
      ),      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video Youtube or Vimeo",
         "param_name" => "video_link",
         
      ), 
      

    )));
}

// Services
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Service", 'wealth'),
   "base"      => "quickview",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth')
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Services Style', 'wealth'),
        "param_name" => "style",
        "value" => array(  
                     
                     esc_html__('Style 1: Background Image', 'wealth') => 'style1',
                     esc_html__('Style 2: Background color & Icon', 'wealth') => 'style2',  
                     esc_html__('Style 3: Background transparent & Image', 'wealth') => 'style3',  
                     esc_html__('Style 4: Background transparent & Icon', 'wealth') => 'style4', 
                     esc_html__('Style 5: With Image (pool cleaning)', 'wealth') => 'style5', 
                     esc_html__('Style 6: With Image (wedding venue)', 'wealth') => 'style6', 
                     esc_html__('Style 7: With Image (Makeup Artist)', 'wealth') => 'style7',
                     esc_html__('Style 8: With Image (Education)', 'wealth') => 'style8',
                     esc_html__('Style 9: Background color & Icon (Car Booking)', 'wealth') => 'style9',
                     esc_html__('Style 10: With Image (Moving)', 'wealth') => 'style10',
                     esc_html__('Style 11: With Icon (Mortgage)', 'wealth') => 'style11',
                     esc_html__('Style 12: With Image (Rental)', 'wealth') => 'style12',
                     esc_html__('Style 13: With Image (Car Wash)', 'wealth') => 'style13',
                     esc_html__('Style 14: With Image (Insurance)', 'wealth') => 'style14',
                     esc_html__('Style 15: With Image (Hardware)', 'wealth') => 'style15',

                    ),

        "description" => esc_html__("Section Overlay", 'wealth'),      
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1', 'style3','style5','style6','style7','style8','style10','style12','style13','style14','style15' ) ),
      ), 
      array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon", 'wealth'),
         "param_name"=> "icon",
         "value"     => "",         
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2','style4','style9','style11' ) ),
      ),    
      
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'wealth'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("Content right.", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2','style3','style4','style5','style6','style7','style8','style10','style11','style13','style14','style15' ) ),         
      ),
      array(
         'type' => 'css_editor',
         'heading' => esc_html__( 'CSS box', 'wealth' ),
         'param_name' => 'css',
         // 'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'smileshop' ),
         'group' => esc_html__( 'Design Options', 'wealth' )
      ), 
    )));
}

// Service Slider

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => esc_html__("OT Service Silder", 'wealth'),
   "base" => "serviceslider",
   "class" => "",
   "category" => 'Wealth Element',
   "icon" => "icon-st",
   "params" => array(
      
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => "Testimonial Style",
         "param_name" => "style",
         "value" => array(
                     esc_html__('Style 1: Handyman', 'wealth') => 'style1',
                     esc_html__('Style 2: Wealth Law', 'wealth') => 'style2',
                     ),          
      ),
      array(
         "type"      => "dropdown",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Visible", 'wealth'),
         "param_name"=> "visible",
         "value" => array(
                     esc_html__('1', 'wealth') => '1',
                     esc_html__('2', 'wealth') => '2',
                     esc_html__('3', 'wealth') => '3',
                     esc_html__('4', 'wealth') => '4',
                     ), 
         "description" => esc_html__("Visible of row", 'wealth'),    
      ), 
          
    )
    ));
}

// Packages
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Package", 'wealth'),
   "base"      => "package",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Package Style', 'wealth'),
        "param_name" => "style",
        "value" => array(  
                     
                      esc_html__('Style 1: Travel', 'wealth') => 'style1', 
                      esc_html__('Style 2: Meeting Room', 'wealth') => 'style2',
                      esc_html__('Style 3: Makeup Artist', 'wealth') => 'style3',                      
                      esc_html__('Style 4: Rental', 'wealth') => 'style4', 
                      esc_html__('Style 5: Car Wash', 'wealth') => 'style5',

                    ),             
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2','style3','style4','style5' ) ), 
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),  
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2','style3','style4' ) ),        
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Quantity", 'wealth'),
         "param_name" => "quantity",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ), 
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price", 'wealth'),
         "param_name" => "price",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2','style3','style5' ) ), 
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Note", 'wealth'),
         "param_name" => "note",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2','style3','style5' ) ), 
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Date", 'wealth'),
         "param_name" => "date",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ), 
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'wealth'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("Content right.", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2','style3','style4','style5' ) ), 
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Code", 'wealth'),
         "param_name" => "code",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style5' ) ), 
      ),
    )));
}

// Packages Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Package Slider", 'wealth'),
   "base"      => "packageslider",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Package Style', 'wealth'),
        "param_name" => "style",
        "value" => array(
                      esc_html__('Style 1: Travel', 'wealth') => 'style1',
                      esc_html__('Style 2: Hotel', 'wealth') => 'style2',
                      ),             
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Visible", 'wealth'),
         "param_name" => "visible",
         "value" => array(
                     esc_html__('2', 'wealth') => '2',
                     esc_html__('3', 'wealth') => '3',
                     esc_html__('4', 'wealth') => '4',
                     ), 
         "description" => esc_html__("Visible of row", 'wealth'),
      ),
    )));
}

// Pricing Table
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Pricing Table", 'wealth'),
   "base"      => "pricingtable",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(

      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",         
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Pricing Table Style', 'wealth'),
        "param_name" => "style",
        "value" => array(   
                     
                     esc_html__('Style 1: Photorgaphy', 'wealth') => 'style1',
                     esc_html__('Style 2: Pool Cleaning', 'wealth') => 'style2',
                     esc_html__('Style 3: Wedding Venue', 'wealth') => 'style3',
                     esc_html__('Style 4: Education', 'wealth') => 'style4',
                     esc_html__('Style 5: Fitness Responsive', 'wealth') => 'style5',
                     esc_html__('Style 6: Car Booking', 'wealth') => 'style6',
                     esc_html__('Style 7: Handyman', 'wealth') => 'style7',
                     esc_html__('Style 8: Hotel', 'wealth') => 'style8',
                     esc_html__('Style 9: Rental', 'wealth') => 'style9',
                     esc_html__('Style 10: Car Wash', 'wealth') => 'style10',

                    ),             
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Sub Title", 'wealth'),
         "param_name" => "stitle",
         "value" => "", 
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style4' ) ),        
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Content", 'wealth'),
         "param_name" => "content",
         "value" => "",
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price", 'wealth'),
         "param_name" => "price",
         "value" => "",         
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Unit", 'wealth'),
         "param_name" => "unit",
         "value" => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2','style3','style4','style5','style6','style7','style8','style10' ) ),        
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Quantity", 'wealth'),
         "param_name" => "per",
         "value" => "", 
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style4','style5','style9' ) ),        
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3','style8','style9' ) ),
      ), 
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Feature", 'wealth'),
         "param_name" => "feature",
         'description' => esc_html__( 'If checked, Use Feature', 'wealth' ),
         'value' => array( esc_html__( 'Yes', 'wealth' ) => 'yes' ),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style2','style5' ) ),         

      ),
      
      array(
        'type' => 'vc_link',
         "heading" => esc_html__("Link", 'wealth'),
         "param_name" => "linkbox",         
         "description" => esc_html__("Add link to pricing table.", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2','style4','style5','style8' ) ),
      ), 
    )));
}

// Price List
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Price List", 'wealth'),
   "base"      => "pricelist",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(      
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title Lists", 'wealth'),
      ),  
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Product 1", 'wealth'),
         "param_name" => "name1",
         "value" => "",
         "description" => esc_html__("Product's Name", 'wealth'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price 1", 'wealth'),
         "param_name" => "price1",
         "value" => "",
         "description" => esc_html__("Price of Product 1", 'wealth'),
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description 1", 'wealth'),
         "param_name" => "sname1",
         "value" => "",
         "description" => esc_html__("Description of Product 1", 'wealth'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Product 2", 'wealth'),
         "param_name" => "name2",
         "value" => "",
         "description" => esc_html__("Product's Name", 'wealth'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price 2", 'wealth'),
         "param_name" => "price2",
         "value" => "",
         "description" => esc_html__("Price of Product 2", 'wealth'),
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description 2", 'wealth'),
         "param_name" => "sname2",
         "value" => "",
         "description" => esc_html__("Description of Product 2", 'wealth'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Product 3", 'wealth'),
         "param_name" => "name3",
         "value" => "",
         "description" => esc_html__("Product's Name", 'wealth'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price 3", 'wealth'),
         "param_name" => "price3",
         "value" => "",
         "description" => esc_html__("Price of Product 3", 'wealth'),
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description 3", 'wealth'),
         "param_name" => "sname3",
         "value" => "",
         "description" => esc_html__("Description of Product 3", 'wealth'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Product 4", 'wealth'),
         "param_name" => "name4",
         "value" => "",
         "description" => esc_html__("Product's Name", 'wealth'),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price 4", 'wealth'),
         "param_name" => "price4",
         "value" => "",
         "description" => esc_html__("Price of Product 4", 'wealth'),
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description 4", 'wealth'),
         "param_name" => "sname4",
         "value" => "",
         "description" => esc_html__("Description of Product 4", 'wealth'),
      ),
    )));
}

// Feature
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Feature", 'wealth'),
   "base"      => "feature",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth')
      ),
      array(
        "type" => "dropdown",
        "heading" => esc_html__('Services Style', 'wealth'),
        "param_name" => "style",
        "value" => array(   
                     
                     esc_html__('Style 1: Use Image', 'wealth') => 'style1',
                     esc_html__('Style 2: Use Icon(cake booking)', 'wealth') => 'style2',
                     esc_html__('Style 3: Use Icon(diet products)', 'wealth') => 'style3', 
                     esc_html__('Style 4: Use Icon(diet products)', 'wealth') => 'style4',
                     esc_html__('Style 5: Use Icon(diet products)', 'wealth') => 'style5',
                     esc_html__('Style 6: Use Icon(wealth life 1 & 2)', 'wealth') => 'style6',
                     esc_html__('Style 7: Use Icon(wealth life 3)', 'wealth') => 'style7',
                     esc_html__('Style 8: Use Icon(wealth life 3)', 'wealth') => 'style8',
                     esc_html__('Style 9: Use Icon(Travel)', 'wealth') => 'style9',
                     esc_html__('Style 10: Use Image(Travel)', 'wealth') => 'style10',
                     esc_html__('Style 11: Use Icon(Metting Room)', 'wealth') => 'style11',
                     esc_html__('Style 12: Use Icon(Car Repair)', 'wealth') => 'style12',
                     esc_html__('Style 13: Use Image(Fitness Responsive)', 'wealth') => 'style13',
                     esc_html__('Style 14: Use Icon(Car Booking)', 'wealth') => 'style14',
                     esc_html__('Style 15: Use Image(Moving)', 'wealth') => 'style15',
                     esc_html__('Style 16: Use Icon(Rental)', 'wealth') => 'style16',
                     esc_html__('Style 17: Use Icon(Car Wash)', 'wealth') => 'style17',
                                       
                    ),             
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style10','style13','style15' ) ),
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Link", 'wealth'),
         "param_name"=> "link",
         "value"     => "",         
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style10' ) ),
      ),     
      array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon", 'wealth'),
         "param_name"=> "icon",
         "value"     => "",         
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2','style3','style4','style5','style6','style7','style8','style9','style11','style12','style14','style16','style17' ) ),
      ),    
      
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'wealth'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("Content right.", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style6','style7','style8','style10','style12','style13','style14','style15','style16' ) ),         
      ),
      
      array(
         'type' => 'css_editor',
         'heading' => esc_html__( 'CSS box', 'wealth' ),
         'param_name' => 'css',
         // 'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'smileshop' ),
         'group' => esc_html__( 'Design Options', 'wealth' )
      ), 
    )));
}

// Social
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Social", 'wealth'),
   "base"      => "social",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'wealth'),
         "param_name" => "icon",
         "value" => "",         
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link", 'wealth'),
         "param_name" => "link",
         "value" => "",         
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Font Size", 'wealth'),
         "param_name" => "size",
         "value" => "",         
      ),
      array(
         'type' => 'css_editor',
         'heading' => esc_html__( 'CSS box', 'wealth' ),
         'param_name' => 'css',
         // 'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'smileshop' ),
         'group' => esc_html__( 'Design Options', 'wealth' )
      ), 
    )));
}

// Step
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Step", 'wealth'),
   "base"      => "step",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Step Number", 'wealth'),
         "param_name" => "number",
         "value" => "",         
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth')
      ),
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => "Step Style",
         "param_name" => "style",
         "value" => array(
                     esc_html__('Style 1: Cake Booking ', 'wealth') => 'style1',
                     esc_html__('Style 2: ', 'wealth') => 'style2',
                     esc_html__('Style 3: Wedding venue ', 'wealth') => 'style3',
                     esc_html__('Style 4: Moving ', 'wealth') => 'style4',
                     esc_html__('Style 5: Wealth Loss ', 'wealth') => 'style5',
                     esc_html__('Style 6: Dating ', 'wealth') => 'style6',
                     ),          
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo of step", 'wealth'), 
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style4' ) ),         
      ),        
      
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description", 'wealth'),
         "param_name" => "content",
         "value" => "",
         "description" => esc_html__("Content right.", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3','style5','style6' ) ),         
      ),
    )));
}

// Address
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Address", 'wealth'),
   "base"      => "address",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(      
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth')
      ),
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon", 'wealth'),
         "param_name" => "icon",
         "value" => "",         
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo of step", 'wealth'),         
      ), 
    )));
}

// Products
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Products", 'wealth'),
   "base"      => "products",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo of product", 'wealth'),         
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price", 'wealth'),
         "param_name" => "price",
         "value" => "",
         "description" => esc_html__("Price of Product", 'wealth')
      ),
      array(
         'type' => 'checkbox',
         'heading' => esc_html__( 'Use Border Right', 'wealth' ),
         'param_name' => 'borderright',
         'description' => esc_html__( 'If checked, Use Border Right', 'wealth' ),
         'value' => array( esc_html__( 'Yes', 'wealth' ) => 'yes' )
      ),      
    )));
}

// Contact
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Contact", 'wealth'),
   "base"      => "contact",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth')
      ),
      array(
         "type"      => "textarea_html",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Content", 'wealth'),
         "param_name"=> "content",
         "value"     => "", 
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3','style4' ) ),   
      ),    
    )));
}

// Infomation
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Infomation", 'wealth'),
   "base"      => "infomation",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title", 'wealth')
      ),      
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Photo", 'wealth'),
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Photo", 'wealth'),         
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Note", 'wealth'),
         "param_name" => "note",
         "value" => "",
         "description" => esc_html__("Note", 'wealth')
      ), 
      array(
         'type' => 'checkbox',
         'heading' => esc_html__( 'Use Sale', 'wealth' ),
         'param_name' => 'sale',
         'description' => esc_html__( 'If checked, Use Notification', 'wealth' ),
         'value' => array( esc_html__( 'Yes', 'wealth' ) => 'yes' )
      ),
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon 1", 'wealth'),
         "param_name" => "icon1",
         "value" => "",         
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Infomation 1", 'wealth'),
         "param_name" => "infomation1",
         "value" => "",         
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description 1", 'wealth'),
         "param_name" => "description1",
         "value" => "",         
      ),
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon 2", 'wealth'),
         "param_name" => "icon2",
         "value" => "",         
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Infomation 2", 'wealth'),
         "param_name" => "infomation2",
         "value" => "",         
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description 2", 'wealth'),
         "param_name" => "description2",
         "value" => "",         
      ),
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon 3", 'wealth'),
         "param_name" => "icon3",
         "value" => "",         
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Infomation 3", 'wealth'),
         "param_name" => "infomation3",
         "value" => "",         
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description 3", 'wealth'),
         "param_name" => "description3",
         "value" => "",         
      ), 
      array(
         "type" => "iconpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Icon 4", 'wealth'),
         "param_name" => "icon4",
         "value" => "",         
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Infomation 4", 'wealth'),
         "param_name" => "infomation4",
         "value" => "",         
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description 4", 'wealth'),
         "param_name" => "description4",
         "value" => "",         
      ),                   
    )));
}

// Our Facts (use)
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Our Facts", 'wealth'),
   "base" => "ourfacts",
   "class" => "",
   "category" => 'Wealth Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Fun Fact Icon",
         "param_name" => "icon",
         "value" => "",
         "description" => esc_html__("Find <a target='_blank' href='http://vegatheme.com/html/etlinefont-icons/'>Here</a>", 'wealth')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title Fact", 'wealth'),
         "param_name" => "title",
         "value" => "",
         "description" => esc_html__("Title display in Our Facts box.", 'wealth')
      ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number Fact", 'wealth'),
         "param_name" => "number",
         "value" => "",
         "description" => esc_html__("Number display in Our Facts box.", 'wealth')
      ),
      
    )));
}

//Portfolio Filter
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Portfolio Filter", 'wealth'),
   "base"      => "foliof",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(

      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Text Show All Portfolio", 'wealth'),
         "param_name"=> "all",
         "value"     => "",
         "description" => esc_html__("Text Filter Show All Portfolio.", 'wealth')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Number portfolio per page", 'wealth' ),
         "param_name" => "num",
         "value" => "10",
         "description" => esc_html__("Enter Number Portfolio.", 'wealth' )
      ), 
      
    )));
}

//Clients Logo 
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Clients Logo", 'wealth'),
   "base"      => "logos",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Logo Client",
         "param_name" => "gallery",
         "value" => "",
         "description" => esc_html__("Logos", 'wealth')
      ), 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => "Visible Logo",
         "param_name" => "visible",
         "value" => array(
                     esc_html__('Select Visible', 'wealth') => '',
                     esc_html__('4 items', 'wealth') => '4',
                     esc_html__('5 items', 'wealth') => '5',
                     esc_html__('6 items', 'wealth') => '6',
                    ),
         "description" => esc_html__("Number visible", 'wealth')
      ), 
      
    )));
}



//Our Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Our Team", 'wealth'),
   "base" => "team",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => "Team Style",
         "param_name" => "style",
         "value" => array(
                     esc_html__('Style 1: Broker', 'wealth') => 'style1',
                     esc_html__('Style 2: Photorgaphy', 'wealth') => 'style2',
                     esc_html__('Style 3: wealth Life', 'wealth') => 'style3',
                     esc_html__('Style 4: Pool Cleaning', 'wealth') => 'style4',
                     esc_html__('Style 5: Fitness Responsive', 'wealth') => 'style5',
                     ),          
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Photo Member",
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Avarta of member, Recomended Size: 420 x 420", 'wealth')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Name", 'wealth'),
         "param_name" => "name",
         "value" => "",
         "description" => esc_html__("Member's Name", 'wealth')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Job", 'wealth'),
         "param_name"=> "job",
         "value"     => "",
         "description" => esc_html__("Member's Job", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style2','style3','style5' ) ),         
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Phone Number", 'wealth'),
         "param_name"=> "number",
         "value"     => "",
         "description" => esc_html__("Member's Phone Number", 'wealth'),
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3' ) ),         
      ),
      array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon 1", 'wealth'),
         "param_name"=> "icon1",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style3' ) ),         
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Link Icon1",
         "param_name"=> "link1",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3' ) ),
      ),
     array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Infomation 1",
         "param_name"=> "infomation1",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ),
      ),
     array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon 2", 'wealth'),
         "param_name"=> "icon2",
         "value"     => "",  
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style3' ) ),       
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Link Icon2",
         "param_name"=> "link2",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3' ) ),
      ),
      array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Infomation 2",
         "param_name"=> "infomation2",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ),
      ),
     array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon 3", 'wealth'),
         "param_name"=> "icon3",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style3' ) ),
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Link Icon3",
         "param_name"=> "link3",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3' ) ),
      ),
      array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Infomation 3",
         "param_name"=> "infomation3",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ),
      ),
     array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon 4", 'wealth'),
         "param_name"=> "icon4",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1','style3' ) ),
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Link Icon4",
         "param_name"=> "link4",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3' ) ),
      ),
     array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Infomation 4",
         "param_name"=> "infomation4",
         "value"     => "",
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style1' ) ),
      ),
      array(
         "type"      => "textarea_html",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Content", 'wealth'),
         "param_name"=> "content",
         "value"     => "", 
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style3','style4' ) ),   
      ),
    )));
}

// Our Team Slider

if(function_exists('vc_map')){
   
   vc_map( array(
   "name" => esc_html__("OT Our Team Silder", 'wealth'),
   "base" => "teamslide",
   "class" => "",
   "category" => 'Wealth Element',
   "icon" => "icon-st",
   "params" => array(         
      array(
         "type"      => "dropdown",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Visible", 'wealth'),
         "param_name"=> "visible",
         "value" => array(
                     esc_html__('2', 'wealth') => '2',
                     esc_html__('3', 'wealth') => '3',
                     esc_html__('4', 'wealth') => '4',
                     esc_html__('5', 'wealth') => '5',
                     esc_html__('6', 'wealth') => '6',
                     ), 
         "description" => esc_html__("Visible of row", 'wealth'),    
      ),         
    )
    ));
}

// Testimonial
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Testimonial", 'wealth'),
   "base" => "testimonial",
   "class" => "",
   "category" => 'Wealth Element',
   "icon" => "icon-st",
   "params" => array(
      
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Photo Member",
         "param_name" => "photo",
         "value" => "",
         "description" => esc_html__("Member's Image", 'wealth')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Name", 'wealth'),
         "param_name" => "name",
         "value" => "",
         "description" => esc_html__("Member's Name", 'wealth')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Job", 'wealth'),
         "param_name"=> "job",
         "value"     => "",
         "description" => esc_html__("Member's Job", 'wealth'),      
      ), 
      array(
         "type"      => "textarea_html",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Content", 'wealth'),
         "param_name"=> "content",
         "value"     => "",    
      ), 
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => "Testimonial Style",
         "param_name" => "style",
         "value" => array(
                     esc_html__('Style 1: Diet Products', 'wealth') => 'style1',
                     esc_html__('Style 2: Wealth Life', 'wealth') => 'style2',
                     esc_html__('Style 3: Travel', 'wealth') => 'style3',
                     esc_html__('Style 4: Meeting Room', 'wealth') => 'style4',
                     esc_html__('Style 5: Education', 'wealth') => 'style5',
                     esc_html__('Style 6: Car Repair', 'wealth') => 'style6',
                     esc_html__('Style 7: Rental', 'wealth') => 'style7',
                     esc_html__('Style 8: Car Wash', 'wealth') => 'style8',
                     esc_html__('Style 9: Dating', 'wealth') => 'style9',
                     ),          
      ),
      array(
         "type"      => "iconpicker",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Icon", 'wealth'),
         "param_name"=> "icon",
         "value"     => "",         
         "dependency"  => array( 'element' => 'style', 'value' => array( 'style9' ) ),
      ),   
    )
    ));
}


// Testimonial Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Testimonial Silder", 'wealth'),
   "base" => "testslide",
   "class" => "",
   "category" => 'Wealth Element',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => "Testimonial Style",
         "param_name" => "style",
         "value" => array(
                     esc_html__('Style 1: Broker', 'wealth') => 'style1',
                     esc_html__('Style 2: Photorgaphy', 'wealth') => 'style2',
                     esc_html__('Style 3: Pool Cleaning', 'wealth') => 'style3',
                     esc_html__('Style 4: Wedding Venue', 'wealth') => 'style4',
                     esc_html__('Style 5: Makeup Artist', 'wealth') => 'style5',
                     esc_html__('Style 6: Fitness Responsive', 'wealth') => 'style6',
                     esc_html__('Style 7: Handyman', 'wealth') => 'style7',
                     esc_html__('Style 8: Insurance', 'wealth') => 'style8',
                     esc_html__('Style 9: Foot & Restaurant', 'wealth') => 'style9',
                     esc_html__('Style 10: Cake Booking', 'wealth') => 'style10',
                     esc_html__('Style 11: Hardware', 'wealth') => 'style11',
                     ),          
      ),
      array(
         "type"      => "dropdown",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Visible", 'wealth'),
         "param_name"=> "visible",
         "value" => array(
                     esc_html__('1', 'wealth') => '1',
                     esc_html__('2', 'wealth') => '2',
                     ), 
         "description" => esc_html__("Visible of row", 'wealth'),    
      ),  
    )
    ));
}

// Newsletters
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => esc_html__("OT Newsletters", 'wealth'),
   "base"      => "newsletter",
   "class"     => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params"    => array(
     array(
        "type" => "dropdown",
        "heading" => esc_html__('Style', 'wealth'),
        "param_name" => "style",
        "value" => array( 
                     esc_html__('Style 1: Foot & Restaurant', 'wealth') => 'style1',
                     esc_html__('Style 2: Wealth Loss', 'wealth') => 'style2', 
                     esc_html__('Style 3: Wealth Skin', 'wealth') => 'style3',
                     esc_html__('Style 4: Insurance', 'wealth') => 'style4',
                     esc_html__('Style 5: Wealth Life && Handyman', 'wealth') => 'style5',
                     esc_html__('Style 6: Rental', 'wealth') => 'style6',
                     esc_html__('Style 7: Hotel', 'wealth') => 'style7',
                     esc_html__('Style 8: Mortgage', 'wealth') => 'style8',
                     esc_html__('Style 9: Broker', 'wealth') => 'style9',
                    ),
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => esc_html__("Button Submit", 'wealth'),
         "param_name"=> "btntext",
         "value"     => "",
         "description" => esc_html__("", 'wealth')
      ),
    )));

}


//Google Map
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("OT Google Map", 'wealth'),
   "base" => "ggmap",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Wealth Element',
   "params" => array(  
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Height Map", 'wealth'),
         "param_name" => "height",
         "value" => 320,
         "description" => esc_html__("Please enter number height Map, 300, 350, 380, ..etc. Default: 420.", 'wealth')
      ),    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Latitude", 'wealth'),
         "param_name" => "lat",
         "value" => -6.373091,
         "description" => esc_html__("Please enter <a href='http://www.latlong.net/'>Latitude</a> google map", 'wealth')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Longitude", 'wealth'),
         "param_name" => "long",
         "value" => 106.835175,
         "description" => esc_html__("Please enter <a href='http://www.latlong.net/'>Longitude</a> google map", 'wealth')

      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Zoom Map", 'wealth'),
         "param_name" => "zoom",
         "value" => 15,
         "description" => esc_html__("Please enter Zoom Map, Default: 15", 'wealth')
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Map marker",
         "param_name" => "icon",
         "value" => "",
         "description" => esc_html__("Icon Map marker, 85 x 85", 'wealth')
      ),  
    )));
}
?>