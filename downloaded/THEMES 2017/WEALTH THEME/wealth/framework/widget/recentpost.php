<?php 



class recentpost_widget extends WP_Widget {



function __construct() {



parent::__construct(



// Base ID of your widget



'recentpost_widget', 







// Widget name will appear in UI



esc_html__('Latest News', 'wealth'), 







// Widget description



array( 'description' => esc_html__( 'Latest News Wealth', 'wealth' ), ) 



);



}







// Creating widget front-end



// This is where the action happens



public function widget( $args, $instance ) {



	// these are the widget options



	//$title = apply_filters( 'widget_title', $instance['title'] );



    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Latest News', 'wealth' ) : $instance['title'], $instance, $this->id_base );

	$date = ! empty( $instance['count'] ) ? '1' : '0';





// before and after widget arguments are defined by themes



echo htmlspecialchars_decode($args['before_widget']);



if ( ! empty( $title ) ){

	echo htmlspecialchars_decode($args['before_title']) . $title . htmlspecialchars_decode($args['after_title']); 

}?>

    <div class="latest_news">

        <ul class="bloglist-small">

            <?php 

            $recent = new WP_Query( array(

            'post_type' => 'post', 

            'posts_per_page' => $instance['posts_per_page']

              ) );

            while ($recent->have_posts()) :$recent-> the_post();?>

            <li>

                <div class="post-thumb">
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
                  </a>
                </div>
                <div class="post-content">

                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php if($date){ ?>
                    <div class="post-meta">
                        <span class="date"><i class="fa fa-calendar-o"></i><?php the_time('M d, Y'); ?></span>                       
                    </div>
                    <?php } ?>
                </div>

            </li>

            <?php endwhile; ?>   

        </ul>

    </div></div>



<?php 



echo htmlspecialchars_decode($after_widget);

}



public function update( $new_instance, $old_instance ) {

    $instance = $old_instance;

    $instance['title'] = strip_tags($new_instance['title']);

    $instance['count'] = !empty($new_instance['count']) ? 1 : 0;

    $instance['posts_per_page'] = ( ! empty( $new_instance['posts_per_page'] ) ) ? strip_tags( $new_instance['posts_per_page'] ) : '';



    return $instance;

}	



// Widget Backend 



public function form( $instance ) {



// Check values



     //$title = esc_attr($instance['title']);



	 $title = esc_attr( $instance['title'] );

	 $count = isset($instance['count']) ? (bool) $instance['count'] :false;

     $posts_per_page = esc_attr($instance['posts_per_page']);



// Widget admin form



?>









<p><label><?php esc_html_e( 'Title:', 'wealth' ); ?></label>

    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>



<p><input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>"<?php checked( $count ); ?> />

<label><?php esc_html_e( 'Show date time', 'wealth' ); ?></label><br /></p>

<p>

<label><?php esc_html_e( 'Number of posts to show:', 'wealth' ); ?></label> 



<input size="3" class="widefat" id="<?php echo esc_attr($this->get_field_id('posts_per_page')); ?>" name="<?php echo esc_attr($this->get_field_name('posts_per_page')); ?>" type="text" value="<?php echo esc_attr($posts_per_page); ?>" />



</p>

<?php 



}

	



} // Class wpb_widget ends here







// Register and load the widget



function wpb_recentpost_widget() {



	register_widget( 'recentpost_widget' );



}



add_action( 'widgets_init', 'wpb_recentpost_widget' );



