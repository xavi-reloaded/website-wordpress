<?php
/*
Plugin Name: Hours Widget
Plugin URI: http://www.red-sun-design.com
Description: Display Opening Hours
Version: 1.0
Author: Gerda Gimpl
Author URI: http://www.red-sun-design.com
*/

class lemonchili_Hours_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* CONSTRUCT THE WIDGET
	/*--------------------------------------------------*/
	public function __construct() {
	$widget_options = array( 
		'classname' => 'hours_widget', 
		'description' => esc_html__( 'Display the opening hours.', 'gxg_textdomain' ) 
	);
	parent::__construct( 'hours-widget', 'LEMONCHILI - Opening Hours', $widget_options );
	}

	/*--------------------------------------------------*/
	/* DISPLAY THE WIDGET
	/*--------------------------------------------------*/	
	/* outputs the content of the widget
	 * @args --> The array of form elements*/	
	function widget($args, $instance) {	
		extract($args, EXTR_SKIP);
		
                
                
		$title = apply_filters('widget_title', $instance['title'] );
		
		global
		$icon,
                $day1, $day1hours,
                $day2, $day2hours,
                $day3, $day3hours,
                $day4, $day4hours,
                $day5, $day5hours,
                $day6, $day6hours,
                $day7, $day7hours;
                
                $icon = $instance['icon'];
                
		$day1 = $instance['day1'];
		$day1hours = $instance['day1hours'];
                
		$day2 = $instance['day2'];
		$day2hours = $instance['day2hours'];
                
		$day3 = $instance['day3'];
		$day3hours = $instance['day3hours'];
                
		$day4 = $instance['day4'];
		$day4hours = $instance['day4hours'];                
                
		$day5 = $instance['day5'];
		$day5hours = $instance['day5hours'];
                
		$day6 = $instance['day6'];
		$day6hours = $instance['day6hours'];
                
		$day7 = $instance['day7'];
		$day7hours = $instance['day7hours'];                

		/* before widget */
		echo $before_widget;

		/* display title */
		if ( $title && $icon )
                        echo  $before_title . '<i class="fa ' . $icon . ' "></i>' . $title . $after_title;
                elseif ( $title )
                        echo $before_title . $title . $after_title;
   
		/* display the widget */
		?>
				<div class="text-center">
                                        
		                        <?php if ($day1) echo '<h6 class="hours-title">' . $day1 . '</h6>'; ?>
                                        <?php if ($day1hours) echo '<p>' . $day1hours . '</p>'; ?>
		                        
                                        <?php if ($day2) echo '<h6 class="hours-title">' . $day2 . '</h6>'; ?>
		                        <?php if ($day2hours) echo '<p>' . $day2hours . '</p>'; ?>
                                        
                                        <?php if ($day3) echo '<h6 class="hours-title">' . $day3 . '</h6>'; ?>
		                        <?php if ($day3hours) echo '<p>' . $day3hours . '</p>'; ?>
                                        
                                        <?php if ($day4) echo '<h6 class="hours-title">' . $day4 . '</h6>'; ?>
		                        <?php if ($day4hours) echo '<p>' . $day4hours . '</p>'; ?>
                                        
                                        <?php if ($day5) echo '<h6 class="hours-title">' . $day5 . '</h6>'; ?>
		                        <?php if ($day5hours) echo '<p>' . $day5hours . '</p>'; ?>
                                        
                                        <?php if ($day6) echo '<h6 class="hours-title">' . $day6 . '</h6>'; ?>
		                        <?php if ($day6hours) echo '<p>' . $day6hours . '</p>'; ?>
                                        
                                        <?php if ($day7) echo '<h6 class="hours-title">' . $day7 . '</h6>'; ?>
		                        <?php if ($day7hours) echo '<p>' . $day7hours . '</p>'; ?>
		                        
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
        
    	$instance['day1'] = $new_instance['day1'];
    	$instance['day1hours'] = $new_instance['day1hours'];
        
    	$instance['day2'] = $new_instance['day2'];
    	$instance['day2hours'] = $new_instance['day2hours'];
        
    	$instance['day3'] = $new_instance['day3'];
    	$instance['day3hours'] = $new_instance['day3hours'];

    	$instance['day4'] = $new_instance['day4'];
    	$instance['day4hours'] = $new_instance['day4hours'];

    	$instance['day5'] = $new_instance['day5'];
    	$instance['day5hours'] = $new_instance['day5hours'];

    	$instance['day6'] = $new_instance['day6'];
    	$instance['day6hours'] = $new_instance['day6hours'];
        
    	$instance['day7'] = $new_instance['day7'];
    	$instance['day7hours'] = $new_instance['day7hours'];        
    	
	return $instance;		
	} 
	
	
	/*--------------------------------------------------*/
	/* WIDGET ADMIN FORM
	/*--------------------------------------------------*/
	/* @instance	The array of keys and values for the widget. */
	function form($instance) {	
		
		$day1 = strip_tags($instance['day1']);
		$day1hours = $instance['day1hours'];

		$day2 = strip_tags($instance['day2']);
		$day2hours = $instance['day2hours'];

		$day3 = strip_tags($instance['day3']);
		$day3hours = $instance['day3hours'];

		$day4 = strip_tags($instance['day4']);
		$day4hours = $instance['day4hours'];

		$day5 = strip_tags($instance['day5']);
		$day5hours = $instance['day5hours'];

		$day6 = strip_tags($instance['day6']);
		$day6hours = $instance['day6hours'];

		$day7 = strip_tags($instance['day7']);
		$day7hours = $instance['day7hours'];

		$instance = wp_parse_args(
			(array)$instance,
			array(
				'icon' => 'fa-clock-o',
                                'title' => 'Hours',
				'day1' => '',
				'day1hours' => '',
				'day2' => '',
				'day2hours' => '',  
				'day3' => '',
				'day3hours' => '',
				'day4' => '',
				'day4hours' => '', 
				'day5' => '',
				'day5hours' => '',  
				'day6' => '',
				'day6hours' => '',  
				'day7' => '',
				'day7hours' => ''                              
			)
		);
		
	
	// Display the admin form
	?>
        
        <p><b> INFO: use &#60;br> for line breaks </b></p>
        <p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Icon (choose from <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a>) </br> Example: <b>fa-clock-o</b> ', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" />
	</p>	       
        <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'gxg_textdomain') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>		
	
        <table>
                <tr>
                <td>
                        <label for="<?php echo $this->get_field_id( 'day1' ); ?>"><?php _e('Day 1', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day1'); ?>" name="<?php echo $this->get_field_name('day1'); ?>"><?php echo $day1; ?></textarea>                       
                </td>                        
                <td>
                        <label for="<?php echo $this->get_field_id( 'day1hours' ); ?>"><?php _e('Day 1 hours', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day1hours'); ?>" name="<?php echo $this->get_field_name('day1hours'); ?>"><?php echo $day1hours; ?></textarea>
                </td>
                </tr>
        
                <tr>
                <td>
                        <label for="<?php echo $this->get_field_id( 'day2' ); ?>"><?php _e('Day 2', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day2'); ?>" name="<?php echo $this->get_field_name('day2'); ?>"><?php echo $day2; ?></textarea>  
                </td>                        
                <td>
                        <label for="<?php echo $this->get_field_id( 'day2hours' ); ?>"><?php _e('Day 2 hours', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day2hours'); ?>" name="<?php echo $this->get_field_name('day2hours'); ?>"><?php echo $day2hours; ?></textarea>
                </td>
                </tr>      
                
                <tr>
                <td>
                        <label for="<?php echo $this->get_field_id( 'day3' ); ?>"><?php _e('Day 3', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day3'); ?>" name="<?php echo $this->get_field_name('day3'); ?>"><?php echo $day3; ?></textarea>  
                </td>                        
                <td>
                        <label for="<?php echo $this->get_field_id( 'day3hours' ); ?>"><?php _e('Day 3 hours', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day3hours'); ?>" name="<?php echo $this->get_field_name('day3hours'); ?>"><?php echo $day3hours; ?></textarea>
                </td>
                </tr>      
        
                <tr>
                <td>
                        <label for="<?php echo $this->get_field_id( 'day4' ); ?>"><?php _e('Day 4', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day4'); ?>" name="<?php echo $this->get_field_name('day4'); ?>"><?php echo $day4; ?></textarea>  
                </td>                        
                <td>
                        <label for="<?php echo $this->get_field_id( 'day4hours' ); ?>"><?php _e('Day 4 hours', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day4hours'); ?>" name="<?php echo $this->get_field_name('day4hours'); ?>"><?php echo $day4hours; ?></textarea>
                </td>
                </tr>
        
                <tr>
                <td>
                        <label for="<?php echo $this->get_field_id( 'day5' ); ?>"><?php _e('Day 5', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day5'); ?>" name="<?php echo $this->get_field_name('day5'); ?>"><?php echo $day5; ?></textarea>  
                </td>                        
                <td>
                        <label for="<?php echo $this->get_field_id( 'day5hours' ); ?>"><?php _e('Day 5 hours', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day5hours'); ?>" name="<?php echo $this->get_field_name('day5hours'); ?>"><?php echo $day5hours; ?></textarea>
                </td>
                </tr>
        
                <tr>
                <td>
                        <label for="<?php echo $this->get_field_id( 'day6' ); ?>"><?php _e('Day 6', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day6'); ?>" name="<?php echo $this->get_field_name('day6'); ?>"><?php echo $day6; ?></textarea>  
                </td>                        
                <td>
                        <label for="<?php echo $this->get_field_id( 'day6hours' ); ?>"><?php _e('Day 6 hours', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day6hours'); ?>" name="<?php echo $this->get_field_name('day6hours'); ?>"><?php echo $day6hours; ?></textarea>
                </td>
                </tr>
        
                <tr>
                <td>
                        <label for="<?php echo $this->get_field_id( 'day7' ); ?>"><?php _e('Day 7', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day7'); ?>" name="<?php echo $this->get_field_name('day7'); ?>"><?php echo $day7; ?></textarea>  
                </td>                        
                <td>
                        <label for="<?php echo $this->get_field_id( 'day7hours' ); ?>"><?php _e('Day 7 hours', 'gxg_textdomain') ?></label>
                        <textarea class="widefat" id="<?php echo $this->get_field_id('day7hours'); ?>" name="<?php echo $this->get_field_name('day7hours'); ?>"><?php echo $day7hours; ?></textarea>
                </td>
                </tr>
        </table>        
	<?php		
	} // end form

	
} // end class


/*--------------------------------------------------*/
/* REGISTER THE WIDGET
/*--------------------------------------------------*/
function lemonchili_register_hours_widget() { 
	register_widget( 'lemonchili_Hours_Widget' );
}
add_action( 'widgets_init', 'lemonchili_register_hours_widget' );
?>