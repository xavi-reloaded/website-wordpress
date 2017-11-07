<?php

/**
 * Show previews from portfolio category
 */
class Widget_Portfolio extends Widget_Default implements Widget_Interface_Cache
{
	const PORTFOLIO_POST_TRANSIENT = 'JH8wo0sd';

	public function __construct() {

		$this->setClassName( 'widget_portfolio' );
		$this->setName( 'From Portfolio' );
		$this->setDescription( 'Show previews from portfolio category' );
		$this->setIdSuffix( 'portfolio' );
		parent::__construct();
		add_action( 'save_post', array( &$this, 'action_clear_widget_cache' ) );
	}

	function action_clear_widget_cache( $postID ) {
		if ( get_post_type( $postID ) == Custom_Posts_Type_Portfolio::POST_TYPE ) {
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

		$title = apply_filters( 'widget_title', $instance['title'] );
		$wport = $this->getPortfolios( $instance );

		// HTML
		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		if ( $wport->have_posts() ) : ?>
			<ul>
			<?php  while ( $wport->have_posts() ) : $wport->the_post();?>
				<li class="<?php if ( ($wport->current_post % 2 ) == 0  ) { echo('first');} ?>" >
						 
							<a href="<?php the_permalink() ?>" title="<?php echo the_title(); ?>" class="imgborder">
								<?php if ( has_post_thumbnail() ) {
									echo '<div class="widget-img-wrap">';
									// theme_post_thumbnail('portfolio_widget');
										get_theme_post_thumbnail( get_the_ID(), 'portfolio_widget' );
										echo '<span class="widget-shadow transparent-shadow"></span>';
									echo '</div>';

} else {
	echo '<div class="widget-img-wrap"><span class="placeholder"></span></div>';
}?>
							</a>
						
				</li>
			<?php endwhile; ?>
			</ul>
		<?php endif;

		wp_reset_postdata();
		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['category'] = strip_tags( $new_instance['category'] );
		$this->deleteWidgetCache();

		return $instance;
	}


	function form( $instance ) {

		// Defaults
		$portfolio_terms = '';
		$defaults = array( 'title' => __( 'From portfolio', 'retro' ), 'number' => '4' );
		$instance = wp_parse_args( (array) $instance, $defaults );

		// if(term_exists($this->portfolioCustomPost->getTaxonomyName()))
		{
			$portfolio_terms = get_terms( Custom_Posts_Type_Portfolio::TAXONOMY );

		}
		?>

		<div>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">
					<?php _e( 'Title:', 'retro' ); ?>
				</label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'category' ); ?>" >
					<?php _e( 'Category of portfolio:', 'retro' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'category' ); ?>" id="<?php echo $this->get_field_id( 'category' ); ?>"  style="width:100%;">
					<option value="">None</option>
					<?php
					if ( $portfolio_terms ) {
						foreach ( $portfolio_terms as $cat ) {
							if ( isset( $instance['category'] ) && $instance['category'] == $cat->slug ) {
								$selected = "selected='selected'";
							} else {
								$selected = '';
							}
							echo "<option $selected value='" . $cat->slug . "'>" . $cat->name . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of items to show:', 'retro' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $instance['number']; ?>" style="width:100%;" />
			</p>
	
		</div>
		<div style="clear:both;">&nbsp;</div>
	<?php
	}

	private function getPortfolios( $instance ) {
		if ( false === ($portfolio = $this->getCachedWidgetData()) ) {
			$this->reinitWidgetCache( $instance );
		} else {
			return $portfolio;
		}
		return $this->getCachedWidgetData();
	}

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
		$key = self::PORTFOLIO_POST_TRANSIENT;
		if ( $code ) {
			$key .= '_' . $code;
		} elseif ( $this->isWPML_PluginActive() ) {
			$key .= '_' . ICL_LANGUAGE_CODE;
		}

		return $this->get_field_id( $key );
	}

	public function reinitWidgetCache( $instance ) {
		$number		= (int) $instance['number'];
		$category	= $instance['category'];

		$wport = new WP_Query( 'post_type=' . Custom_Posts_Type_Portfolio::POST_TYPE . '&' . Custom_Posts_Type_Portfolio::TAXONOMY . '=' . $category . '&post_status=publish&posts_per_page=' . $number . '&order=DESC' );
		set_site_transient( $this->getTransientId(), $wport, $this->getExparationTime() );
	}
}
?>
