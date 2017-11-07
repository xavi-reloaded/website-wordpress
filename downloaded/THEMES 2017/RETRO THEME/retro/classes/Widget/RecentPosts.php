<?php
/**
 *  Show recent posts
 */
class Widget_RecentPosts extends Widget_Default implements Widget_Interface_Cache
{
	const RECENT_POST_TRANSIENT = 'sDF12as';
	const TITLE = 'title';
	const NUMBER = 'number';
	const SHOW_IMAGE = 'show_image';

	function __construct() {

		$this->setClassName( 'widget_recent_posts' );
		$this->setName( 'Recent posts' );
		$this->setDescription( 'Show recent posts' );
		$this->setIdSuffix( 'recent-posts' );
		parent::__construct();
		add_action( 'save_post', array( &$this, 'action_clear_widget_cache' ) );
	}

	function action_clear_widget_cache( $postID ) {
		if ( get_post_type( $postID ) == 'post' ) {
			$temp_number = $this->number;

			$settings = $this->get_settings();

			if ( is_array( $settings ) ) {
				foreach ( array_keys( $settings ) as $number ) {
					if ( is_numeric( $number ) ) {
						$this->number = $number;
						$this->deleteWidgetCache();
					}
				}
			}
			$this->number = $temp_number;
		}
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance[ self::TITLE ] );

		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		$recent_posts = $this->getRecentPosts( $instance );

		if ( $recent_posts->have_posts() ) : ?>
			<ul>
				<?php   while ( $recent_posts->have_posts() ) : $recent_posts->the_post();?>
					<li class="widget_post_area clearfix <?php if ( isset( $instance[ self::SHOW_IMAGE ] ) && $instance[ self::SHOW_IMAGE ] ) { echo('widget_post_thumbnail'); }?>">
						<?php if ( $instance[ self::SHOW_IMAGE ] ) :?>
							<!--theme_post_thumbnail('recent_posts');-->
							<a href="<?php echo get_permalink( get_the_ID() ); ?>" title="<?php the_title(); ?>" class="imgborder">
								<?php
								if ( has_post_thumbnail( get_the_ID() ) ) {
									echo '<div class="widget-img-wrap">';
										get_theme_post_thumbnail( get_the_ID(), 'recent_posts' );
										echo '<span class="widget-shadow transparent-shadow"></span>';
									echo '</div>';
								} else { echo '<div class="widget-img-wrap"><span class="placeholder"></span></div>';}
								?>        
							</a>
						<?php else : ?>
							<div class="post-date">
								<div class="post-day"><?php echo  get_the_date( 'j' ); ?></div>
								<div class="post-month"><?php echo  get_the_date( 'F' ); ?></div>
							</div>
						<?php endif;?>
						<div class="recent-txt-content"><a class="recent-title" href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) { the_title();
} else { the_ID(); } ?></a><?php excerpt( 80 );?></div>
					</li>
				<?php endwhile; ?>
				<?php
					// Reset Post Data
					wp_reset_postdata();
				?>
			</ul>
		<?php
		endif;
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$this->deleteWidgetCache();

		$instance = $old_instance;
		$instance[ self::TITLE ] = strip_tags( $new_instance[ self::TITLE ] );
		$instance[ self::NUMBER ] = abs( strip_tags( $new_instance[ self::NUMBER ] ) );
		$instance[ self::SHOW_IMAGE ] = strip_tags( $new_instance[ self::SHOW_IMAGE ] );

		return $instance;
	}

	function form( $instance ) {

		// Defaults
		$instance = wp_parse_args( (array) $instance, $this->getDefaultFieldValues() );
		?>
		<div>
			<p>
				<label for="<?php echo $this->get_field_id( self::TITLE ); ?>"><?php _e( 'Title:', 'retro' ); ?></label>
				<input id="<?php echo $this->get_field_id( self::TITLE ); ?>" name="<?php echo $this->get_field_name( self::TITLE ); ?>" type="text" value="<?php echo $instance[ self::TITLE ]; ?>" style="width:100%;" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( self::SHOW_IMAGE ); ?>"><?php _e( 'Show post thumbnail:', 'retro' ); ?></label>
				<input id="<?php echo $this->get_field_id( self::SHOW_IMAGE ); ?>"
					   name="<?php echo $this->get_field_name( self::SHOW_IMAGE ); ?>"
					   type="checkbox" <?php echo esc_attr( isset( $instance[ self::SHOW_IMAGE ] ) && $instance[ self::SHOW_IMAGE ] ) ? 'checked="checked"' : ''; ?> />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( self::NUMBER ); ?>"><?php _e( 'Number of posts to show:', 'retro' ); ?></label>
				<input id="<?php echo $this->get_field_id( self::NUMBER ); ?>" name="<?php echo $this->get_field_name( self::NUMBER ); ?>" type="text" value="<?php echo $instance[ self::NUMBER ]; ?>" style="width:100%;" />
			</p>
		</div>
		<div style="clear:both;">&nbsp;</div>
		<?php
	}

	/**
	 * Default field values
	 *
	 * @return array
	 */
	private function getDefaultFieldValues() {

		$default_values = array(
					self::TITLE		=> __( 'Recent posts', 'retro' ),
					self::NUMBER	=> 5,
					self::SHOW_IMAGE	=> 1,
		);

		return $default_values;
	}

	private function getRecentPosts( $instance ) {
		if ( false === ($post_list = $this->getCachedWidgetData()) ) {
			$this->reinitWidgetCache( $instance );
		} else {
			return $post_list;
		}
		return $this->getCachedWidgetData();
	}

	/**
	 * Delete cache
	 *
	 * @global type $sitepress WPML plugin
	 * @param boolean $all - delete for all language cache
	 */
	public function deleteWidgetCache() {

		global $sitepress;

		if ( $sitepress && is_object( $sitepress ) &&  method_exists( $sitepress, 'get_active_languages' ) ) {
			foreach ( $sitepress->get_active_languages() as $lang ) {

				if ( isset( $lang['code'] ) ) {
					delete_site_transient( $this->getTransientId( $lang['code'] ) );
				}
			}
		}

		delete_site_transient( $this->getTransientId() ); // clear cache
	}

	public function getCachedWidgetData() {

		return  get_site_transient( $this->getTransientId() );
	}

	public function getExparationTime() {

		return self::EXPIRATION_HOUR;
	}

	public function getTransientId( $code = '' ) {
		$key = self::RECENT_POST_TRANSIENT;
		if ( $code ) {
			$key .= '_' . $code;
		} elseif ( $this->isWPML_PluginActive() ) {
			$key .= '_' . ICL_LANGUAGE_CODE;
		}

		return $this->get_field_id( $key );
	}

	public function reinitWidgetCache( $instance ) {
		$number = (int) $instance[ self::NUMBER ];
		$recent_posts = new WP_Query( array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) );

		set_site_transient( $this->getTransientId(), $recent_posts, $this->getExparationTime() );
	}
}
?>
