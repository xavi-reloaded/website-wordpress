<?php
/*
Plugin Name: News Widget
Plugin URI: http://www.red-sun-design.com
Description: Display your latest News Entries
Version: 1.0
Author: Gerda Gimpl
Author URI: http://www.red-sun-design.com
*/

class lemonchili_News_Widget extends WP_Widget {

	/*--------------------------------------------------*/
	/* CONSTRUCT THE WIDGET
	/*--------------------------------------------------*/
	public function __construct() {
	$widget_options = array( 
		'classname' => 'news_widget', 
		'description' => esc_html__( 'Display your latest News Entries.', 'gxg_textdomain' ) 
	);
	parent::__construct( 'news-widget', 'LEMONCHILI - News', $widget_options );
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
	<ul class="news-widget-list">
		
        	<?php 
		$query = new WP_Query();
		$query->query('posts_per_page='. $number);
		while ($query->have_posts()) : $query->the_post(); 
		?>
						
		<li <?php post_class('news-widget-item'); ?> id="news-widget-<?php the_ID(); ?>">
 				
                                <h1 class="title text-center"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                               
		                <div class="postinfo widget-post-info">        
			                        <ul>  
			                        
			                                <li class="post-date">
			                                
			                                        <i class="fa fa-calendar"></i><?php the_time('M d, Y') ?>
			                                </li> <!-- .post-date-->
	
	                                                <?php if ( has_tag() ) { ?>
			                                <li>
			                                          <ul class="tags">
			                                                <li>                                                
			                                                        <?php echo the_tags('<i class="fa fa-tag"></i> ', ', ', '' ); ?>
			                                                </li>  
			                                        </ul> <!-- .tags -->   
			                                </li>                                                  
	                                                <?php }  
	                                                
		                              		    if (!of_get_option('gg_commentremove')) { ?> 
		                                                <li class="comment-nr">
		                                                	  <i class="fa fa-comment"></i>
		                                                        <a href="<?php comments_link(); ?>">
		                                                        <?php                                                
		                                                        echo comments_number( ' 0 ', ' 1 ', ' % ');
		                                                        ?> </a> 
		                                                </li>
		                                                <?php }                                                
                                                                ?>
	                                                
                                                                <!--
			                                        <li class="author">
			                                        <i class="fa fa-pencil"></i>
			                                                by <?php echo the_author_posts_link(); ?>
			                                        </li>
                                                                -->
			                                        
                                                        <div class="clear"></div>                      
			                                      
			                        </ul>                
		                </div> <!-- .postinfo -->
                                
                                
				<div>
				
                                        <?php the_post_thumbnail(); ?>
                                        
                                        <div class="text-center">
                                                <?php global $more; $more = 0; ?>
                                                <?php the_content(__('<span class="moretext"> Read more </span>', 'gxg_textdomain')); ?>
                                        </div><!-- .entry -->
                                
                                     </div>                            
                                
			</li><!-- .post-? -->		
            	
		<?php endwhile; wp_reset_query(); ?>
		
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
				'icon' => 'fa-pencil',
				'title' => 'The Latest',
				'number' => 1
			)
		);
		
	
	// Display the admin form
	?>
         <p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Icon (choose from <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a>) </br> Example: <b>fa-pencil</b> ', 'gxg_textdomain') ?></label>
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
	<?php		
		
	} // end form

	
} // end class


/*--------------------------------------------------*/
/* REGISTER THE WIDGET
/*--------------------------------------------------*/
function lemonchili_register_news_widget() { 
	register_widget( 'lemonchili_News_Widget' );
}
add_action( 'widgets_init', 'lemonchili_register_news_widget' );
?>