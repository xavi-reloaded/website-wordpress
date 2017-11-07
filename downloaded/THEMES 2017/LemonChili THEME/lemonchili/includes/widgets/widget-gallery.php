<?php
/*
Plugin Name: Gallery Widget
Plugin URI: http://www.red-sun-design.com
Description: Display your latest galleries
Version: 1.0
Author: Gerda Gimpl
Author URI: http://www.red-sun-design.com
*/

class lemonchili_Gallery_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* CONSTRUCT THE WIDGET
	/*--------------------------------------------------*/
	public function __construct() {
	$widget_options = array( 
		'classname' => 'gallery_widget', 
		'description' => esc_html__( 'Display your latest galleries.', 'gxg_textdomain' ) 
	);
	parent::__construct( 'gallery-widget', 'LEMONCHILI - Gallery', $widget_options );
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

		/* before widget */
		echo $before_widget;

		/* display title */
		if ( $title && $icon )
                        echo $before_title . '<i class="fa ' . $icon . ' "></i>' . $title . $after_title;
                elseif ( $title )
                        echo $before_title . $title . $after_title;
   
		/* display the widget */
		?>
				
			<div <?php post_class(); ?> id="gallery-widget-<?php the_ID(); ?>">
                        
                        <div class="gallery-widget">
                        
                        <ul>
                        <?php  
                                global $post;
                                        
                                $args = array(
                                                        'order' => 'DESC',
                                                        'post_type' => 'gallery',
                                                        'posts_per_page' => $number );
                                        
                                $loop = new WP_Query( $args );
                                        
                                while ( $loop->have_posts() ) : $loop->the_post();
                                
                                $gallery_title = $post->post_title;
                                $gallery_thumb = get_the_post_thumbnail($post->ID, 'square2');

                                ?>
                                <li>                                        
                                        <div class="gallery_item prettyimage-wrap">
                                                <a href="<?php the_permalink() ?>">
                                                        
                                                        <span class="image-rollover" >
                                                                <p><?php echo $gallery_title ?></p>
                                                        </span>
                                                    
                                                        <?php echo $gallery_thumb; ?>     
                                                        
                                                </a>
                                        </div><!-- .gallery_item-->                                           
                                </li>                       
            	
                                <?php endwhile; wp_reset_query(); ?>
                
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
                                'title' => 'Latest Galleries',
				'number' => 4
			)
		);
		
	
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
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of galleries:', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
	</p>
	<?php		
		
	} // end form

	
} // end class


/*--------------------------------------------------*/
/* REGISTER THE WIDGET
/*--------------------------------------------------*/
function lemonchili_register_gallery_widget() { 
	register_widget( 'lemonchili_Gallery_Widget' );
}
add_action( 'widgets_init', 'lemonchili_register_gallery_widget' );
?>