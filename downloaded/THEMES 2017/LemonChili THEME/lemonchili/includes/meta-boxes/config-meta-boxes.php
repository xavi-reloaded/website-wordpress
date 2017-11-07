<?php

add_filter( 'rwmb_meta_boxes', 'gxg_register_meta_boxes' );


/**
 * Register meta boxes
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function gxg_register_meta_boxes( $meta_boxes )
{

$prefix = 'gxg_';



/** EVENTS **/
$meta_boxes[] = array(
        'id' => 'events',
        'title' =>  __('DATE / TIME','gxg_textdomain'), 
        'pages' => array('events'),
        'fields' => array(                
                array(
                        'name' =>   __('Date','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'date',      
                        'type' => 'date',
                        'format' => 'yy/mm/dd',               
                        'std' => '',                    
                ),
                array(
                        'name' =>   __('Time','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'time',      
                        'type' => 'text',               
                        'std' => '',                    
                ),
                array(
                        'name' =>   __('Event ends (date)','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'eventenddate',      
                        'type' => 'date',   
                        'format' => 'yy/mm/dd',            
                        'std' => '',                    
                ),                
                array(
                        'name' =>   __('Event ends (time)','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'eventendtime',      
                        'type' => 'text',
                        'std' => '',                    
                ),
                array(
                        'name' =>   __('Recurring Event?','gxg_textdomain'),             
                        'desc' => 'If you enter any text here, this event will always display up top and never be removed from the site. Enter your text, like <br> "Every Monday from 5 - 6 p.m." here, it will be displayed instead of the date.',        
                        'id' => $prefix . 'recurring',      
                        'type' => 'text',
                        'std' => '',                    
                ),                  
                array(
                        'name' =>   __('link to facebook event','gxg_textdomain'),             
                        'desc' => 'Enter full URL including http://',        
                        'id' => $prefix . 'facebookevent',      
                        'type' => 'text',               
                        'std' => '',                    
                ),                 
        )
);


/** GALLERY **/
$meta_boxes[] = array(
	'id' => 'gallery',
	'title' => __('GALLERY','gxg_textdomain'), 
	'pages' => array( 'gallery' ),

	'fields' => array(
		array(
			'name' => __('Upload your images. </br></br> Drag and drop images to reorder them.','gxg_textdomain'), 
			'desc' => '',
			'id' => $prefix . 'gallery_images',
			'type' => 'image_advanced'       
		)
	)
);


/** MENU **/
$meta_boxes[] = array(
        'id' => 'menu',
        'title' => __('MENU DETAILS','gxg_textdomain'), 
        'pages' => array('menu'),
        'fields' => array(                
                array(
                        'name' => __('Menu Item Description','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'menu_description',      
                        'type' => 'textarea',               
                        'std' => '',                    
                ),            
                array(
                        'name' => __('Price','gxg_textdomain'),              
                        'desc' => __('Enter the price (and optionally the currency symbol)','gxg_textdomain'),        
                        'id' => $prefix . 'price',      
                        'type' => 'text',               
                        'std' => '',                    
                ),   
                array(
                        'name' => __('Cents','gxg_textdomain'),              
                        'desc' => __('If you want to style the cents (smaller font size, bottom border), enter the cent amount here.','gxg_textdomain'),        
                        'id' => $prefix . 'cents',      
                        'type' => 'text',               
                        'std' => '',                    
                ),                  
                
        )
);


/** TEAM **/
$meta_boxes[] = array(
        'id' => 'menu',
        'title' => __('TEAM MEMBER INFO','gxg_textdomain'), 
        'pages' => array('team'),
        'fields' => array(
                array(
                        'name' => __('Name','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'name',      
                        'type' => 'text',               
                        'std' => '',                    
                ),                             
                array(
                        'name' => __('Position','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'position',      
                        'type' => 'text',               
                        'std' => '',                    
                ),            
                array(
                        'name' => __('Email','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'email',      
                        'type' => 'text',               
                        'std' => '',                    
                ),
                array(
                        'name' => __('About','gxg_textdomain'),              
                        'desc' => '(You can use HTML too.)',        
                        'id' => $prefix . 'about',      
                        'type' => 'textarea',               
                        'std' => '',                    
                ),                 
        )
);



/** SLIDER **/
$meta_boxes[] = array(
	'id' => 'slider',
	'title' => __('SLIDER','gxg_textdomain'), 
	'pages' => array( 'slider' ),
	'fields' => array(
		array(
			'name' => __('<b>Recommended </br> image size:</b> </br> 700px x 340px </br></br>
                                      Drag and drop images to reorder them. </br></br>
                                      To enter an URL where the image should link to, click <b>Edit</b> and enter the full URL under <b>SLIDER Image Links To</b>. </br></br>
                                      To display a caption over the slider image,click <b>Edit</b> and enter the text under <b>SLIDER Caption</b>.','gxg_textdomain'), 
			'desc' => '',
			'id' => $prefix . 'slider_images',
			'type' => 'image_advanced'       
		)
	)
);



/** CHOSE MENU CATEGORY ON PAGES WITH MENU TEMPLATE **/
$meta_boxes[] = array(
	'id' => 'menucat',
	'title' => __('MENU CATEGORY','gxg_textdomain'), 
	'pages' => array( 'page' ),
	'fields' => array(
		array(
			'name'    => __('Menu Category','gxg_textdomain'), 
			'id'      => $prefix . 'menucat',
			'type'    => 'taxonomy',
                        'multiple'    => 'true',
			'options' => array(                                
				'taxonomy' => 'menu_category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree' or 'select'. Optional
				'type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'args' => array(
                                        //'parent' => 0
                                )
			),
			'desc' => '',
		),
	),
	'include'    => array(
		'template' => array( 'template-menu1.php', 'template-menu2.php', 'template-menu3.php' ),
	),
);





return $meta_boxes;
}



/** "IMAGE LINKS TO" FIELD ON MEDIA EDITOR - FOR SLIDER **/
function gg_image_attachment_fields_to_edit($form_fields, $post) {
        
        $form_fields["sliderurl"] = array(  
            "label" => __('SLIDER Image Links To','gxg_textdomain'),  
            "input" => "text",
            "value" => get_post_meta($post->ID, "_sliderurl", true),
            "helps" => __('Enter full URL. To be used with SLIDER images only.' ,'gxg_textdomain'),    
        );
        
        $form_fields["slidercaption"] = array(  
        "label" => __('SLIDER Caption','gxg_textdomain'),  
        "input" => "text",
        "value" => get_post_meta($post->ID, "_slidercaption", true),
        "helps" => __('Slider Caption. To be used with SLIDER images only. Use &#60;/br> for line breaks','gxg_textdomain'),
        );
    
    return $form_fields;  
}  

function gg_image_attachment_fields_to_save($post, $attachment) {    
        if( isset($attachment['sliderurl']) ){  
            update_post_meta($post['ID'], '_sliderurl', $attachment['sliderurl']);  
        }
        if( isset($attachment['sliderurl']) ){  
            update_post_meta($post['ID'], '_slidercaption', $attachment['slidercaption']);  
        }  
        return $post;  
}  

add_filter("attachment_fields_to_edit", "gg_image_attachment_fields_to_edit", null, 2); 
add_filter("attachment_fields_to_save", "gg_image_attachment_fields_to_save", null, 2); 

?>