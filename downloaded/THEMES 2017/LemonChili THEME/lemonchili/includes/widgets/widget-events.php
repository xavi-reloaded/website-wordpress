<?php
/*
Plugin Name: Events Widget
Plugin URI: http://www.red-sun-design.com
Description: Display Events
Version: 1.0
Author: Gerda Gimpl
Author URI: http://www.red-sun-design.com
*/

class lemonchili_Events_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* CONSTRUCT THE WIDGET
	/*--------------------------------------------------*/
	public function __construct() {
	$widget_options = array( 
		'classname' => 'events_widget', 
		'description' => esc_html__( 'Display upcoming events.', 'gxg_textdomain' ) 
	);
	parent::__construct( 'events-widget', 'LEMONCHILI - Events', $widget_options );
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
                 
	                <ul> <?php
	                
	                global $post;
 
	                $args = array(
	                                'orderby' => 'meta_value',
	                                'meta_key' => 'gxg_date',                                        
	                                'order_by' => 'meta_value',                                        
	                                'order' => 'ASC',
	                                'post_type' => 'events',
	                                'posts_per_page' => -1 );
	                
	                $loop = new WP_Query( $args );
	                
	                $i = 0;  
	                        
	                if ($loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
	                        
	                        $today = date('U') - (60 * 60 * 24);
	                                $date = get_post_meta($post->ID, 'gxg_date', true);
	                                $timestamp = strtotime($date);
	                                $timestamp = strtotime($date);   
	                                $pretty_date_yy = date('Y', $timestamp);
	                                $pretty_date_M = date('M', $timestamp);
	                                $pretty_date_d = date('d', $timestamp);
	                                $pretty_date_l = date('l', $timestamp);
	                                
	                                 $enddate = get_post_meta($post->ID, 'gxg_eventenddate', true);
                                
	                                 if ($enddate) {
	                                	$showdate = strtotime($enddate);
	                                }
	                                else {
	                                	$showdate = strtotime($date);
	                                }
	                                
	                                
                                        $time = get_post_meta($post->ID, 'gxg_time', true);
                                        $event_thumb = get_the_post_thumbnail($post->ID, 'full', array('title' => ''));  
	                                                                                                
	                                        switch($pretty_date_l) /*make weekday translation ready */
	                                        {
                                                case "Monday":  $pretty_date_l = __('Monday', 'gxg_textdomain');  break;
                                                case "Tuesday":  $pretty_date_l = __('Tuesday', 'gxg_textdomain');  break;
                                                case "Wednesday":  $pretty_date_l = __('Wednesday', 'gxg_textdomain');  break;
                                                case "Thursday":  $pretty_date_l = __('Thursday', 'gxg_textdomain');  break;
                                                case "Friday":  $pretty_date_l = __('Friday', 'gxg_textdomain');  break;
                                                case "Saturday":  $pretty_date_l = __('Saturday', 'gxg_textdomain');  break;
                                                case "Sunday":  $pretty_date_l = __('Sunday', 'gxg_textdomain');  break;
                                                default:     $pretty_date_l = ""; break;
	                                        }
	                                        
	                                        switch($pretty_date_M) /*make month translation ready */
	                                        {
	                                                case "Jan":  $pretty_date_M = __('Jan', 'gxg_textdomain');  break;
	                                                case "Feb":  $pretty_date_M = __('Feb', 'gxg_textdomain');  break;
	                                                case "Mar":  $pretty_date_M = __('Mar', 'gxg_textdomain');  break;
	                                                case "Apr":  $pretty_date_M = __('Apr', 'gxg_textdomain');  break;
	                                                case "May":  $pretty_date_M = __('May', 'gxg_textdomain');  break;
	                                                case "Jun":  $pretty_date_M = __('Jun', 'gxg_textdomain');  break;
	                                                case "Jul":  $pretty_date_M = __('Jul', 'gxg_textdomain');  break;                                                
	                                                case "Aug":  $pretty_date_M = __('Aug', 'gxg_textdomain');  break;
	                                                case "Sep":  $pretty_date_M = __('Sep', 'gxg_textdomain');  break;
	                                                case "Oct":  $pretty_date_M = __('Oct', 'gxg_textdomain');  break;
	                                                case "Nov":  $pretty_date_M = __('Nov', 'gxg_textdomain');  break;
	                                                case "Dec":  $pretty_date_M = __('Dec', 'gxg_textdomain');  break;                                                
	                                                default:     $pretty_date_M = ""; break;
	                                        }
	                              	         
	                
                        //recurring events
                        $recurring = get_post_meta($post->ID, 'gxg_recurring', true);
                        if ($recurring && $i < $number) {
                                
                        $i++;
                        
                        ?>
                        <li class="eventwidget-item">
                                <div class="inner-box">
                                        <h1 class="event-title-w text-center"><?php the_title(); ?></h1>
                                          
                                        <div class="recurring text-center">
                                        <?php echo $recurring; ?>    
                                        </div>

                                        <div class="clear"></div>
                                        
                                        <div class="event-info text-center"> 
                                                <?php global $more; $more = 0; ?>
                                                <?php the_content(__('<span class="moretext"> view details </span>', 'gxg_textdomain')); ?>
                                        </div>
                                        
                                        <?php if ($event_thumb){
                                        	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                                        ?>   
                                                <div class="events-thumb prettyimage-wrap">   
                                                
                                                	<a class="pretty_image" data-rel="prettyPhoto" href="<?php echo $image[0] ?>"> 
                                                	
                                                	<span class='image-rollover'><i class='gallery-resize-icon fa fa-expand'></i></span>                                            
                                                        	<?php echo $event_thumb; ?>
                                                        	
                                                        </a>    
                                                </div> 
                                        <?php
                                        }
                                        ?>                                        
	                </li>
                        <?php
                        }
  
                        // regular events                         
                        elseif ($showdate > $today && $i < $number) {  
	                
	                $i++;
	                
	                ?>
	                
	                <li class="eventwidget-item">

                                        <h1 class="event-title-w text-center"><?php the_title(); ?></h1>
                                                                        
                                        <div class="pretty-date text-center">
                                      
                                                <div class="pretty-day"><?php echo $pretty_date_d; ?></div>
                                         
                                                <div class="pretty-date-right">
                                                        <div class="pretty-date-top">
                                                                <?php echo $pretty_date_M ; ?> <?php echo $pretty_date_yy; ?> 
                                                        </div>
                                                        <div class="pretty-date-bottom">
                                                                <div class="pretty-weekday"><?php echo $pretty_date_l; ?> </div>
                                                        </div>
                                                </div>
                                                
                                        </div>                                        
                                        
                                        
                                        <?php if ($time) { ?> <div class="event-time text-center"> - <?php echo $time; ?> - </div> <?php } ?> 
                                        
                                        
                                        <div class="clear"></div>
                                        
                                        <div class="event-info text-center"> 
                                                <?php global $more; $more = 0; ?>
                                                <?php the_content(__('<span class="moretext"> view details </span>', 'gxg_textdomain')); ?>
                                        </div>
                                        
                                        <?php if ($event_thumb){
                                        	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                                        ?>   
                                                <div class="events-thumb prettyimage-wrap">   
                                                
                                                	<a class="pretty_image" data-rel="prettyPhoto" href="<?php echo $image[0] ?>"> 
                                                	
                                                	<span class='image-rollover'><i class='gallery-resize-icon fa fa-expand'></i></span>                                            
                                                        	<?php echo $event_thumb; ?>
                                                        	
                                                        </a>    
                                                </div> 
                                        <?php
                                        }
                                        ?>                                        

 
	                </li>
	        
	                <?php 
	                } 
	                

	                
	                endwhile; else: 
	              
	                ?>
	                        <!-- what if there are no dates? -->
	                        <div class="no-dates">
	                        <p> <?php _e('There are no dates yet.', 'gxg_textdomain'); ?> </p>
	                        </div>
	                <?php
	                 
	                endif;
	                
	                
	                        
	                // Always include a reset at the end of a loop to prevent conflicts with other possible loops                 
	                wp_reset_query();
	                ?>
	                
	                </ul>
                        
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
				'icon' => 'fa-calendar',
                                'title' => 'Events',
				'number' => '1'
			)
		);
		
	
	// Display the admin form
	?>
        <p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Icon (choose from <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a>) </br> Example: <b>fa-calendar</b> ', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" />
	</p>           
        <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of Dates:', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
	</p>
	<?php		
		
	} // end form

	
} // end class



/*--------------------------------------------------*/
/* REGISTER THE WIDGET
/*--------------------------------------------------*/
function lemonchili_register_events_widget() { 
	register_widget( 'lemonchili_Events_Widget' );
}
add_action( 'widgets_init', 'lemonchili_register_events_widget' );
?>