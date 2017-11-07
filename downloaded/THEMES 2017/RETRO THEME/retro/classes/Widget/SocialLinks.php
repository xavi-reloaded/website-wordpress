<?php

/**
 * Social Links Widget.
 */
class Widget_SocialLinks extends Widget_Default
{
	const HIDE				= 'hide_icon';
	const TARGET			= 'target_blank';
	const TITLE				= 'title';
	const TWITTER			= 'twitter_account';
	const TWITTER_TITLE		= 'twitter_account_title';
	const FACEBOOK			= 'facebook_account';
	const FACEBOOK_TITLE	= 'facebook_account_title';
	const GOOGLE_PLUS		= 'google_plus_account';
	const GOOGLE_PLUS_TITLE	= 'google_plus_account_title';
	const RSS				= 'rss_feed';
	const RSS_TITLE			= 'rss_feed_title';
	const EMAIL				= 'email_to';
	const EMAIL_TITLE		= 'email_to_title';
	const FLIKER			= 'flicker_account';
	const FLIKER_TITLE		= 'flicker_account_title';
	const VIMEO				= 'vimeo_account';
	const VIMEO_TITLE		= 'vimeo_account_title';
	const DRIBBLE			= 'dribble_account';
	const DRIBBLE_TITLE		= 'dribble_account_title';



	function __construct() {

		$this->setClassName( 'widget_social_links' );
		$this->setName( 'Social Links' );
		$this->setDescription( 'Show social network links' );
		$this->setIdSuffix( 'social-links' );
		$this->setWidth( 400 );
		parent::__construct();
	}

	public function widget( $args, $instance ) {
		$frontend_html = '';
		$social_link_list = $this->getFields(); // array 'id'->'link'

		if ( isset( $instance[ self::TITLE ] ) ) {
			$title = apply_filters( 'widget_title', $instance[ self::TITLE ] );
		}

		$link_class  = (isset( $instance[ self::HIDE ] ) && $instance[ self::HIDE ])?' no_icon':'';
		$target_blank = (isset( $instance[ self::TARGET ] ) && $instance[ self::TARGET ])?' target="_blank"':'';

		$frontend_html = $args['before_widget'];
		if ( $title ) {
			$frontend_html .= $args['before_title'] . $title . $args['after_title'];
		}

		$frontend_html .= '<ul>';
		foreach ( $instance as $id => $account ) {
			if ( $id != self::TITLE ) {
				if ( strlen( $account ) && isset( $social_link_list[ $id ] ) ) {
					$http = 'http://';
					$frontend_html .= '<li>';
					if ( $id == self::EMAIL ) {
						$http = '';
					}
					if ( $id != self::RSS ) {
						$frontend_html .= sprintf('<a href="%s%s%s" class="%s%s"%s>%s</a>',
							$http,
							$social_link_list[ $id ]['link'],
							$account,
							$id,
							$link_class,
							$target_blank,
						$instance[ $id . '_title' ]);
					} else {
						// Preventing the repetition http://
						if ( preg_match( '/^http:\/\//', $account ) ) {
							$http = '';
						}

						$frontend_html .= sprintf('<a href="%s%s/feed" class="%s%s"%s>%s</a>',
							$http,
							$account,
							$id,
							$link_class,
							$target_blank,
						$instance[ $id . '_title' ]);

					}

					$frontend_html .= '</li>';
				}
			}
		}
		$frontend_html .= '</ul>';
		$frontend_html .= $args['after_widget'];

		echo $frontend_html;
	}

	public function form( $instance ) {
		$instance	 = wp_parse_args( (array) $instance, $this->getDefaultFieldValues() ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( self::HIDE ); ?>"><?php _e( 'Hide icon:', 'retro' ); ?>
				<input id="<?php echo $this->get_field_id( self::HIDE ); ?>"
					   name="<?php echo $this->get_field_name( self::HIDE ); ?>"
					   type="checkbox" <?php echo esc_attr( isset( $instance[ self::HIDE ] ) && $instance[ self::HIDE ] ) ? 'checked="checked"' : ''; ?> />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( self::TARGET ); ?>"><?php _e( 'Open in new tab:', 'retro' ); ?>
				<input id="<?php echo $this->get_field_id( self::TARGET ); ?>"
					   name="<?php echo $this->get_field_name( self::TARGET ); ?>"
					   type="checkbox" <?php echo esc_attr( isset( $instance[ self::TARGET ] ) && $instance[ self::TARGET ] ) ? 'checked="checked"' : ''; ?> />
			</label>
		</p>
		
		<?php
		foreach ( $this->getFields() as $field_id => $details ) :?>
			<?php if ( $field_id != self::TITLE ) :?>
				<p style='clear: both; margin-bottom: 15px;overflow:hidden;'>
						<label for="<?php echo $this->get_field_id( $field_id . '_title' ); ?>" style="width: 190px; float: left; margin-right: 8px;"><?php _e( 'Title', 'retro' ); ?>
							<input class="widefat" id="<?php echo $this->get_field_id( $field_id . '_title' ); ?>" name="<?php echo $this->get_field_name( $field_id . '_title' ); ?>" type="text" value="<?php echo esc_attr( $instance[ $field_id . '_title' ] ); ?>" />
						</label>
					<label for="<?php echo $this->get_field_id( $field_id ); ?>" style="width: 190px; float: left; margin-right: 8px;"><?php echo $details['link']; ?>
						<input class="widefat" id="<?php echo $this->get_field_id( $field_id ); ?>" name="<?php echo $this->get_field_name( $field_id ); ?>" type="text" value="<?php echo esc_attr( $instance[ $field_id ] ); ?>" />
					</label>
				</p>
			<?php else : ?>
				<p>
					<label for="<?php echo $this->get_field_id( $field_id ); ?>"><?php echo $details['link']; ?>
						<input class="widefat" id="<?php echo $this->get_field_id( $field_id ); ?>" name="<?php echo $this->get_field_name( $field_id ); ?>" type="text" value="<?php echo esc_attr( $instance[ $field_id ] ); ?>" />
					</label>
				</p>
			<?php endif;?>
		<?php endforeach; ?>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ self::HIDE ] = strip_tags( $new_instance[ self::HIDE ] );
		$instance[ self::TARGET ] = strip_tags( $new_instance[ self::TARGET ] );

		foreach ( $this->getFields() as $field_id => $title ) {
			// if(isset($new_instance[$field_id]))
			{
				$instance[ $field_id ] = strip_tags( trim( $new_instance[ $field_id ] ) );
			if ( ! in_array( $field_id, array( self::TITLE, self::HIDE ) ) ) {
				$instance[ $field_id . '_title' ] = strip_tags( trim( $new_instance[ $field_id . '_title' ] ) ); }
				}
		}
		return $instance;
	}


	private function getFields() {

		$fields = array(
			self::TITLE			=> array( 'link' => 'Widget Title' ),

			self::TWITTER		=> array(
			'title'	=> 'Twitter',
										  'link'	=> 'twitter.com/',
			),

			self::FACEBOOK		=> array(
			'title'	=> 'Facebook',
										  'link'	=> 'Facebook.com/',
			),

			self::GOOGLE_PLUS	=> array(
			'title'	=> 'Google Plus',
										  'link'	=> 'Plus.google.com/',
			),

			self::RSS			=> array(
			'title'	=> 'RSS',
										  'link'	=> get_site_url() . '/feed/',
			),

			self::EMAIL			=> array(
			'title'	=> 'Email',
										  'link'	=> 'Mailto:',
			),

			self::FLIKER		=> array(
			'title'	=> 'Flicker',
										  'link'	=> 'flickr.com/photos/',
			),

			self::VIMEO			=> array(
			'title'	=> 'Vimeo',
										  'link'	=> 'Vimeo.com/',
			),

			self::DRIBBLE		=> array(
			'title'	=> 'Dribbble',
										  'link'	=> 'dribbble.com/',
			),

		);
		return $fields;
	}

	private function getDefaultFieldValues() {

		$list = array(
			self::TITLE				=> 'Follow us',
			self::HIDE				=> '',
			self::TARGET			=> '',
			self::TWITTER			=> 'olegnax',
			self::TWITTER_TITLE		=> 'Twitter',
			self::FACEBOOK			=> 'olegnax',
			self::FACEBOOK_TITLE	=> 'Facebook',
			self::GOOGLE_PLUS		=> 'olegnax',
			self::GOOGLE_PLUS_TITLE	=> 'Google Plus',
			self::RSS				=> get_site_url() . '/feed',
			self::RSS_TITLE			=> 'RSS',
			self::EMAIL				=> 'olegnax',
			self::EMAIL_TITLE		=> 'Email',
			self::FLIKER			=> 'olegnax',
			self::FLIKER_TITLE		=> 'Flicker',
			self::VIMEO				=> 'olegnax',
			self::VIMEO_TITLE		=> 'Vimeo',
			self::DRIBBLE			=> 'olegnax',
			self::DRIBBLE_TITLE		=> 'Dribbble',

		);

		return $list;
	}
}

?>
