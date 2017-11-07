<?php
class Widget_Twitter extends Widget_Default
{


	function __construct() {

		$this->setClassName( 'widget_twitter' );
		$this->setName( 'Twitter' );
		$this->setDescription( 'Show latest tweets' );
		$this->setIdSuffix( 'twitter' );
		parent::__construct();
	}

	function widget( $args, $instance ) {
		extract( $args );
		$aMessage = '';
		$title = esc_attr( $instance['title'] );
		$username = $instance['username'];
		$num = $instance['num'];
		$update = $instance['update'];
		$extractLinks = $instance['hyperlinks'];
		$extractUsers = $instance['twitter_users'];
		$encode = $instance['encode_utf8'];
		$target_blank	= isset( $instance['target_blank'] )?$instance['target_blank']:false;

		if ( empty( $username ) ) {
			return false;
		}
		if ( $this->isCurlExist() ) {
			$aMessage = $this->getTwitterFeedItems( $instance );
		}
		if ( $aMessage == 'Error' || ! $this->isCurlExist() ) {
			$content = '<p class="notice">' . __( 'Can\'t connect to twitter.', 'retro' ) . '</p>';
		} else {
			if ( empty( $aMessage ) ) {
				$content = '<p class="notice">' . __( 'There are no public messages.', 'retro' ) . '</p>';
			} else {
				$content = $this->generateMessageOutput( $aMessage, $update, $username );
			}
		}

		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		echo $content;

		echo $after_widget;
	}

	private function getTwitterFeedItems( $instance ) {
		$username		= $instance['username'];
		$num			= $instance['num'];
		$extractLinks	= $instance['hyperlinks'];
		$extractUsers	= $instance['twitter_users'];
		$encode			= $instance['encode_utf8'];
		$target			= (isset( $instance['target_blank'] )) ? $instance['target_blank'] : false;

		$oFeed = new Widget_Twitter_Feed();
		$feedsItems = $oFeed->getFeedItems( $username, $num, $encode, $extractLinks, $extractUsers, $target );

		return $feedsItems;
	}







	protected function generateMessageOutput( $aMessage, $update = true, $username ) {

		$output = '<ul class="tweet_list">';

		foreach ( $aMessage as $item ) {

			$content = $item['description'];
			$link = $item['link'];

			$output .= sprintf(
				'<li class="twitter-item"><div class="twitter-item-indent"><span class="twitter-ico"></span>%s%s</div></li>', $content, $update ? sprintf( '<a href="%s" class="twitter-date">%s</a>', $link, $item['date-posted'] ) : ''
			);
		}
		$output .= '</ul>';

		return $output;
	}

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['username']	= strip_tags( $new_instance['username'] );
		$instance['num']		= strip_tags( $new_instance['num'] );
		$instance['update']		= strip_tags( $new_instance['update'] );
		$instance['linked']		= strip_tags( $new_instance['linked'] );
		$instance['hyperlinks'] = strip_tags( $new_instance['hyperlinks'] );
		$instance['twitter_users'] = strip_tags( $new_instance['twitter_users'] );
		$instance['encode_utf8'] = strip_tags( $new_instance['encode_utf8'] );
		$instance['target_blank'] = strip_tags( $new_instance['target_blank'] );

		return $instance;
	}

	function form( $instance ) {

		/**
		 * if twetter oAuth details not provided
		 */
		if ( $this->notCompletedAuthList() ) {
			global $blog_id;
			$notice = '<p>';
			$notice .= __( 'You\'ll need to set up Twitter Feed Authenticate options before using it. ', 'retro' ) . __( 'You can make your changes', 'retro' ) . ' <a href="' . get_admin_url( $blog_id ) . 'admin.php?page=' . SHORTNAME . '_twitter">' . __( 'here', 'retro' ) . '.</a>';
			$notice .= '</p>';
			echo $notice;
			return;
		}

		if ( ! $this->isCurlExist() ) {
			$notice = '<p>' . __( 'cURL extension requred.', 'retro' ) . '</p>';
			$notice .= '<p>' . __( 'Please contact your System Administrator.', 'retro' ) . '</p>';
			echo $notice;
			return;
		}

		// Defaults
		$defaults = array( 'title' => __( 'Twitter', 'retro' ), 'username' => 'olegnax', 'num' => '1',  'update' => '1', 'linked' => '1', 'hyperlinks' => '1', 'twitter_users' => '1', 'encode_utf8' => '1', 'target_blank' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr( $instance['title'] );
		$username = esc_attr( $instance['username'] );
		$number = esc_attr( $instance['num'] );
		$update = esc_attr( $instance['update'] );
		$linked = esc_attr( $instance['linked'] );
		$hyperlinks = esc_attr( $instance['hyperlinks'] );
		$twitter_users = esc_attr( $instance['twitter_users'] );
		$encode = esc_attr( $instance['encode_utf8'] );
		$target_blank = esc_attr( $instance['target_blank'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'retro' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Twitter username:', 'retro' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo $username; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e( 'Number of tweets:', 'retro' ); ?>
				<input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="text" value="<?php echo $number; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'update' ); ?>"><?php _e( 'Show date posted:', 'retro' ); ?>
				<input id="<?php echo $this->get_field_id( 'update' ); ?>" name="<?php echo $this->get_field_name( 'update' ); ?>" type="checkbox" <?php echo $update ? 'checked="checked"' : ''; ?> />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'hyperlinks' ); ?>"><?php _e( 'Discover hyperlinks:', 'retro' ); ?>
				<input id="<?php echo $this->get_field_id( 'hyperlinks' ); ?>" name="<?php echo $this->get_field_name( 'hyperlinks' ); ?>" type="checkbox" <?php echo $hyperlinks ? 'checked="checked"' : ''; ?> />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_users' ); ?>"><?php _e( 'Discover @replies:', 'retro' ); ?>
				<input id="<?php echo $this->get_field_id( 'twitter_users' ); ?>" name="<?php echo $this->get_field_name( 'twitter_users' ); ?>" type="checkbox" <?php echo $twitter_users ? 'checked="checked"' : ''; ?> />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'encode_utf8' ); ?>"><?php _e( 'UTF8 Encode:', 'retro' ); ?>
				<input id="<?php echo $this->get_field_id( 'encode_utf8' ); ?>" name="<?php echo $this->get_field_name( 'encode_utf8' ); ?>" type="checkbox" <?php echo $encode ? 'checked="checked"' : ''; ?> />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'target_blank' ); ?>"><?php _e( 'Open in new tab:', 'retro' ); ?>
				<input id="<?php echo $this->get_field_id( 'target_blank' ); ?>" name="<?php echo $this->get_field_name( 'target_blank' ); ?>" type="checkbox" <?php echo $target_blank ? 'checked="checked"' : ''; ?> />
			</label>
		</p>
		<?php
	}


	private function notCompletedAuthList() {
		return ! (get_option( SHORTNAME . '_consumer_key' ) && get_option( SHORTNAME . '_consumer_secret' ) && get_option( SHORTNAME . '_access_token' ) && get_option( SHORTNAME . '_access_token_secret' ));
	}

	private function isCurlExist() {
		return function_exists( 'curl_version' );
	}
}
?>
