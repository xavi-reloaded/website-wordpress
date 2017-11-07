<?php
/**
 *  Contact form widget
 */
class Widget_ContactForm extends Widget_Default {

	function __construct() {

		$this->setClassName( 'widget_contactform' );
		$this->setName( 'Contact form' );
		$this->setDescription( 'Contact form widget' );
		$this->setIdSuffix( 'contactform' );
		parent::__construct();
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		// $wdescription = $instance['wdescription'];
		$to = (isset( $instance['recipient'] )
						&& ! empty( $instance['recipient'] )
						&& filter_var( $instance['recipient'], FILTER_VALIDATE_EMAIL ))
					? $instance['recipient']
					: get_bloginfo( 'admin_email' );

		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title; }

		global $wid;
		$wid = $args['widget_id'];
		global $am_validate;
		$am_validate = true;

		?><form class="contactformWidget" method="post" action="#contactformWidget">
						<div class="contactform-wrap">
							<div class="clearfix form_line"><span><?php _e( 'Name:','retro' ); ?></span><div class="input-overlow"><input name="name" class="name" type="text"></div></div>
							<div class="clearfix form_line"><span><?php _e( 'Email:','retro' ); ?></span><div class="input-overlow"><input  name="email" class="email" type="text"></div></div>
							<div class="form_textarea"><textarea  name="comments" rows="5" cols="20" placeholder="<?php _e( 'Your message...', 'retro' )?>"></textarea></div>
						</div>
						<div class="contactform-bg">
							
							<div class="form-wrap">
								<div class="form-top-tail"><div class="form-bottom-tail"><div class="form-left-tail"><div class="form-right-tail">
									<div class="form-left-top"><div class="form-right-top"><div class="form-left-bottom"><div class="form-right-bottom">
							
										<div class="preloader"></div>
										<div class="contactform-indent">
											<button type="submit"><?php _e( 'Send', 'retro' )?></button>
										</div>                                  
							
									</div></div></div></div>
								</div></div></div></div>
							</div>
							
						</div>
						<input type="hidden" name="to" value="<?php echo ox_revert_email( $to );?>">
						<input type='hidden' class = 'th-email-from' name = 'th-email-from' value='email_from'>
					</form><script type="text/javascript">
					jQuery(document).ready(function() {
					jQuery("#<?php global $wid;
					echo $wid; ?> .contactformWidget").validate({
						submitHandler: function(form) { 
							jQuery("#<?php global $wid;
							echo $wid; ?> .contactformWidget button").attr('disabled', 'disabled');     
							ajaxContact(form);
							return false;
						},
						 rules: {
								comments: "required",
								email: "required email",
								name: "required"
						},
						 messages: {
							name: "<?php _e( 'Please specify your name.','retro' ); ?>",
							comments: "<?php _e( 'Please enter your message.','retro' ); ?>",
							email: {
								required: "<?php _e( 'We need your email address to contact you.','retro' ); ?>",
								email: "<?php _e( 'Your email address must be in the format of name@domain.com','retro' ); ?>"
							}
					 }
					});
					});
					</script><?php
					echo $after_widget;

					wp_enqueue_script( 'validate' );
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['recipient'] = strip_tags( $new_instance['recipient'] );
		return $instance;
	}


	function form( $instance ) {

		// Defaults
		$defaults = array( 'title' => __( 'Contact us', 'retro' ), 'recipient' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'retro' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'recipient' ); ?>"><?php _e( 'Recipient email:', 'retro' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'recipient' ); ?>" name="<?php echo $this->get_field_name( 'recipient' ); ?>" type="text" value="<?php echo $instance['recipient']; ?>" style="width:100%;" />
		</p>
		</div>
		<div style="clear:both;">&nbsp;</div>
	<?php
	}
}
