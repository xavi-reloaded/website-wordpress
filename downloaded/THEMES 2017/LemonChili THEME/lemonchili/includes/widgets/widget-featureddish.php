<?php
/*
Plugin Name: Featured Dish Widget
Plugin URI: http://www.red-sun-design.com
Description: Display Featured Dish
Version: 1.0
Author: Gerda Gimpl
Author URI: http://www.red-sun-design.com
*/

class lemonchili_Featureddish_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* CONSTRUCT THE WIDGET
	/*--------------------------------------------------*/
	public function __construct() {
	$widget_options = array( 
		'classname' => 'featureddish_widget', 
		'description' => esc_html__( 'Display a featured dish.', 'gxg_textdomain' ) 
	);
	parent::__construct( 'featureddish-widget', 'LEMONCHILI - Featured Dish', $widget_options );
	}



	/*--------------------------------------------------*/
	/* DISPLAY THE WIDGET
	/*--------------------------------------------------*/	
	/* outputs the content of the widget
	 * @args --> The array of form elements*/	
	function widget($args, $instance) {	
		extract($args, EXTR_SKIP);
		
		global
		$icon;
		
		$icon = $instance['icon'];
                $title = apply_filters('widget_title', $instance['title'] );
                $select = esc_attr($instance['select']);
                

		/* before widget */
		echo $before_widget;


		/* display title */
		if ( $title && $icon )
                        echo $before_title . '<i class="fa ' . $icon . ' "></i>' . $title . $after_title;
                elseif ( $title )
                        echo $before_title . $title . $after_title;
   
   
		/* display the widget */                
                global $post;
                               
                $args = array(
                        'numberposts' => 1,
                        'post_type' => 'menu',
                        'p' => $select,
                );
           
                query_posts( $args );
                
                ?>
                
                <div class="text-center">
	                <ul class="featureddish">
	                <?php
	                        
	                        if (have_posts()) : while (have_posts()) : the_post();
	
	                                $menu_title = $post->post_title;
	                                $menu_description = rwmb_meta( 'gxg_menu_description' );
	                                $price = rwmb_meta( 'gxg_price' );
	                                $cents = rwmb_meta( 'gxg_cents' );
	                                  
	                                ?>                     
	
	                                        <li>

	                                        <h6 class="menu-title"><?php the_title(); ?></h6>   
 
                                                        <?php if ($menu_description){
                                                        ?>   
                                                               <div class="menu-description"> <?php echo apply_filters('the_content', get_post_meta($post->ID, 'gxg_menu_description', true)); ?> </div>
                                                        <?php
                                                        }
                                                        ?>                                                                        

                                                       
                                                        <div class="clear"></div>
                                                        
                                                        <div class="price-wrap">
	                                                       <?php if ($price){
	                                                       ?>   
	                                                              <div class="price"> <?php echo $price; ?> </div>
	                                                       <?php
	                                                       }
	                                                       ?>
	                                                       
	                                                       <?php if ($cents){
	                                                       ?>   <div class="cents"> <?php echo $cents ?> </div>
	                                                       <?php
	                                                       }
	                                                       ?>                                                         
                                                       </div>
                                                       
                                                        <?php if ( has_post_thumbnail() ) {
                                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                                                        ?>						
                                                        <div class="menu-thumb prettyimage-wrap">
                                                        
                                                        
                                                               <a class="pretty_image" data-rel="prettyPhoto" href="<?php echo $image[0] ?>">
                                                               
                                                               <span class='image-rollover'><i class='gallery-resize-icon fa fa-expand'></i></span>

	                                                        	<?php the_post_thumbnail('square3', 'alt= '); ?> 
                                                               
                                                               </a>
                                                               
                                                               
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>                                                       
	                                        
                                                </li>
	  
	                        <?php
	                        
	                        endwhile; endif; wp_reset_query(); 
	                ?>
	                </ul>
	       </div>
                <?php
                
		/* after widget */
		echo $after_widget;		
	}
	
	
	/*--------------------------------------------------*/
	/* UPDATE THE WIDGET
	/*--------------------------------------------------*/
	function update($new_instance, $old_instance) {		
		$instance = $old_instance;
 	
    	$instance['icon'] = strip_tags( $new_instance['icon'] );
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['select'] = strip_tags( $new_instance['select']);
    	
	return $instance;		
	} 
	
	
	/*--------------------------------------------------*/
	/* WIDGET ADMIN FORM
	/*--------------------------------------------------*/
	/* @instance	The array of keys and values for the widget. */
	function form($instance) {
	
		$instance = wp_parse_args(
			(array)$instance,
			array(
				'icon' => 'fa-cutlery',
                                'title' => 'Today\'s Special',
                                'select' => ''
			)
		);
	   

        $selectmenu = esc_attr($instance['select']);
        
        // Pull all the menu posts into an array
        $args = array("numberposts" => -1 , "orderby" => "post_date" , "post_type" => "menu"); 
        $options_menu = array();
        $options_menu_obj = get_posts($args);
        $options_menu[''] = '<option value="BLANK">Select a menu item:</option>';
        foreach ($options_menu_obj as $page) {
                $selected = $selectmenu == $page->ID ? ' selected="selected"' : '';
                $options_menu[$page->ID] = '<option value="' . $page->ID .'"' . $selected . '>' . $page->post_title . '</option>';
        } 
	
        
	// Display the admin form
	?>
        <p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Icon (choose from <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a>) </br> Example: <b>fa-cutlery</b> ', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" />
	</p>        
        <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e('select a menu item:', 'gxg_textdomain') ?></label>
		<select id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'select' ); ?>">
                        <?php echo implode('', $options_menu); ?>
                </select>
        </p>
	<?php		
		
	} // end form

	
} // end class


/*--------------------------------------------------*/
/* REGISTER THE WIDGET
/*--------------------------------------------------*/
function lemonchili_register_featureddish_widget() { 
	register_widget( 'lemonchili_Featureddish_Widget' );
}
add_action( 'widgets_init', 'lemonchili_register_featureddish_widget' );
?>