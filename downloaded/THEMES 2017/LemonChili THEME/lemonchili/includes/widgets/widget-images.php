<?php
/*
Plugin Name: Images Widget
Plugin URI: http://www.red-sun-design.com
Description: Display images from your gallery
Version: 1.0
Author: Gerda Gimpl
Author URI: http://www.red-sun-design.com
*/

class lemonchili_Images_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* CONSTRUCT THE WIDGET
	/*--------------------------------------------------*/
	public function __construct() {
	$widget_options = array( 
		'classname' => 'images_widget', 
		'description' => esc_html__( 'Display images from your gallery.', 'gxg_textdomain' ) 
	);
	parent::__construct( 'images-widget', 'LEMONCHILI - Images', $widget_options );
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
		$number = $instance['number'];
		$select = esc_attr($instance['select']);

		/* before widget */
		echo $before_widget;

		/* display title */
		if ( $title && $icon )
                        echo $before_title . '<i class="fa ' . $icon . ' "></i>' . $title . $after_title;
                elseif ( $title )
                        echo $before_title . $title . $after_title;
   
		/* display the widget */
		?>
						
		<div <?php post_class(); ?> id="images-widget-<?php the_ID(); ?>">
                        
                        <div class="gallery-widget">
                        
                        <ul>
                        <?php  
                                global $post;
                                        
                                $args = array(
                                        'order' => 'DESC',
                                        'post_type' => 'gallery',
					'p' => $select,
                                        'posts_per_page' => 1 );
                                        
                                $loop = new WP_Query( $args );
                                        
                                while ( $loop->have_posts() ) : $loop->the_post();
     
                                        $images = rwmb_meta( 'gxg_gallery_images', 'type=image&size=square2', false );
                                        $i = 0;
                                        foreach ( $images as $image )  {
                                                
                                        $imageurl = $image['url'];
                                        $imagefull = $image['full_url'];
                                        $imagecaption = $image['caption'];
                                                
                                                if ($i++ < $number) {
                                                echo "<li class='prettyimage-wrap'><a class='pretty_image' title='$imagecaption' data-rel='prettyPhoto[pp_gallery]' href='$imagefull'><span class='image-rollover'><i class='gallery-resize-icon fa fa-expand'></i></span><img src='$imageurl' alt='' /></a></li>";
                                                }
                                        }   
            	
                                endwhile; wp_reset_query(); ?>
                
                        </ul>
                        </div><!-- .gallery-widget --> 
                        </div><!-- .post-? --> 
		
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
    	$instance['number'] = strip_tags( $new_instance['number']);
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
				'icon' => 'fa-camera-retro',
                                'title' => 'Images',
				'number' => 4,
				'select' => ''
			)
		);


        $selectgallery = esc_attr($instance['select']);
        
        // Pull all the menu posts into an array
        $args = array("numberposts" => -1 , "orderby" => "post_date" , "post_type" => "gallery"); 
        $options_menu = array();
        $options_menu_obj = get_posts($args);
        $options_menu[''] = '<option value="BLANK">Select a menu item:</option>';
        foreach ($options_menu_obj as $page) {
                $selected = $selectgallery == $page->ID ? ' selected="selected"' : '';
                $options_gallery[$page->ID] = '<option value="' . $page->ID .'"' . $selected . '>' . $page->post_title . '</option>';
        } 

		
	
	// Display the admin form
	?>
        <p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Icon (choose from <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a>) </br> Example: <b>fa-camera-retro</b> ', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" />
	</p>	        
        <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Posts Number:', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e('select a gallery:', 'gxg_textdomain') ?></label>
		<select id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'select' ); ?>">
                        <?php echo implode('', $options_gallery); ?>
                </select>
        </p>
	<?php		
		
	} // end form

	
} // end class


/*--------------------------------------------------*/
/* REGISTER THE WIDGET
/*--------------------------------------------------*/
function lemonchili_register_images_widget() { 
	register_widget( 'lemonchili_Images_Widget' );
}
add_action( 'widgets_init', 'lemonchili_register_images_widget' );
?>