<?php

class Widget_FeedburnerEmail extends Widget_Default
{
	/**
	 * Wiget constructor
	 */
	function __construct() {

		$this->setClassName( 'widget_feedburner' );
		$this->setName( 'FeedburnerEmail form' );
		$this->setDescription( 'Feedburner subscribe by email form.' );
		$this->setIdSuffix( 'feedburner' );
		parent::__construct();
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$description = $instance['description'];
		$name = $instance['feedname'];

		global $wid;
		$wid = $args['widget_id'];

		$args = array(
			'description' => $description,
			'feedname' => $name,

		);

		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		?>
		<!--<label class="feed-txt" for="email<?php // global $wid; echo $wid ?>"><?php // echo $description ?></label>-->
	    <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $name ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<div class="form-wrap">
				<div class="form-top-tail"><div class="form-bottom-tail"><div class="form-left-tail"><div class="form-right-tail">
					<div class="form-left-top"><div class="form-right-top"><div class="form-left-bottom"><div class="form-right-bottom">    
			
						<div class="preloader"></div>
						<fieldset>
							<button type="submit"><?php _e( 'Submit', 'retro' ); ?></button>
							<div class="input-overlow"><input type="text"  name="email" id="email<?php global $wid; echo $wid ?>" placeholder="<?php _e( 'Your E-Mail', 'retro' ); ?>"></div>             
							<input type="hidden" value="<?php echo $name ?>" name="uri"><input type="hidden" name="loc" value="en_US">
						</fieldset>
					
					</div></div></div></div>
				</div></div></div></div>
			</div>
			
		</form>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['feedname'] = strip_tags( $new_instance['feedname'] );

		return $instance;
	}


	function form( $instance ) {

		// Defaults
		$defaults = array( 'title' => __( 'Sign up for our Newsletter', 'retro' ),'description' => __( 'Keep up with the latest news and events.', 'retro' ), 'feedname' => 'olegnax' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<div>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'retro' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>" style="width:100%;" />
			</p>
			<!--<p>
				<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'retro' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo $instance['description']; ?>" style="width:100%;" />
			</p>-->
			<p>
				<label for="<?php echo $this->get_field_id( 'feedname' ); ?>"><?php _e( 'Write only feedburner name:', 'retro' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'feedname' ); ?>" name="<?php echo $this->get_field_name( 'feedname' ); ?>" type="text" value="<?php echo $instance['feedname']; ?>" style="width:100%;" />
			</p>
		</div>
		<div style="clear:both;">&nbsp;</div>
	<?php
	}
}
?>
