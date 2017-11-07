<?php
define( 'SHORTCODE_URL', get_template_directory_uri() . '/lib/shortcode/' );
add_filter( 'widget_text', 'do_shortcode' );

locate_template( array( '/lib/shortcode/contact-form.php' ), true, true );
locate_template( array( '/lib/shortcode/eventsCalendar.php' ), true, true );


if ( ! function_exists( 'ox_ed_add_buttons' ) ) {

	function ox_ed_add_buttons( $buttons ) {
		array_push( $buttons, 'highlight', 'list', 'table', 'notifications', 'buttons', 'divider', 'toggle', 'tabs', 'contactForm', 'social_link', 'social_button', 'teaser', 'testimonials', 'slogan' );

		switch ( get_post_type() ) {
			case 'page':
				array_push( $buttons, 'blog', 'terms_portfolio', 'portfolio_carousel' );
			break;
		}
		array_push( $buttons, 'columns' );
		return $buttons;
	}
}
add_filter( 'mce_buttons_3', 'ox_ed_add_buttons', 0 );

if ( ! function_exists( 'ox_ed_register' ) ) {

	function ox_ed_register( $plugin_array ) {
		$url = get_template_directory_uri() . '/lib/shortcode/shortcodes.js';

		$plugin_array['ox_buttons'] = $url;
		return $plugin_array;
	}
}
add_filter( 'mce_external_plugins', 'ox_ed_register' );

if ( ! function_exists( 'ox_cleanup_shortcodes' ) ) {

	function ox_cleanup_shortcodes( $content ) {
		$array = array(
	    '<p>['		 => '[',
	    ']</p>'		 => ']',
	    ']<br />'	 => ']',
		);

		$content = strtr( $content, $array );
		return $content;
	}
}
add_filter( 'the_content', 'ox_cleanup_shortcodes' );



// Columns
if ( ! function_exists( 'col_one_half' ) ) {

	function col_one_half( $atts, $content = null ) {
		extract( shortcode_atts( array( 'last' => '' ), $atts ) );
		$out = "<div class='one_half " . $last . "' >" . do_shortcode( $content ) . '</div>';
		return $out;
	}
}
add_shortcode( 'one_half', 'col_one_half' );

if ( ! function_exists( 'col_one_third' ) ) {

	function col_one_third( $atts, $content = null ) {
		extract( shortcode_atts( array( 'last' => '' ), $atts ) );

		$out = "<div class='one_third " . $last . "' >" . do_shortcode( $content ) . '</div>';

		return $out;
	}
}
add_shortcode( 'one_third', 'col_one_third' );



if ( ! function_exists( 'col_one_fourth' ) ) {

	function col_one_fourth( $atts, $content = null ) {
		extract( shortcode_atts( array( 'last' => '' ), $atts ) );
		$out = "<div class='one_fourth " . $last . "' >" . do_shortcode( $content ) . '</div>';
		return $out;
	}
}
add_shortcode( 'one_fourth', 'col_one_fourth' );

if ( ! function_exists( 'col_two_third' ) ) {

	function col_two_third( $atts, $content = null ) {
		extract( shortcode_atts( array( 'last' => '' ), $atts ) );

		$out = "<div class='two_third " . $last . "' >" . do_shortcode( $content ) . '</div>';

		return $out;
	}
}
add_shortcode( 'two_third', 'col_two_third' );


if ( ! function_exists( 'col_three_fourth' ) ) {

	function col_three_fourth( $atts, $content = null ) {
		extract( shortcode_atts( array( 'last' => '' ), $atts ) );

		$out = "<div class='three_fourth " . $last . "' >" . do_shortcode( $content ) . '</div>';

		return $out;
	}
}
add_shortcode( 'three_fourth', 'col_three_fourth' );

if ( ! function_exists( 'col_clear' ) ) {

	function col_clear( $atts, $content = null ) {

		return "<div class='clearfix'></div>";
	}
}
add_shortcode( 'clear', 'col_clear' );

// Highlight
if ( ! function_exists( 'highlight' ) ) {

	function highlight( $atts, $content = null ) {
		extract( shortcode_atts( array(), $atts ) );

		$out = "<span class='hdark' >" . do_shortcode( $content ) . '</span>';

		return $out;
	}
}
add_shortcode( 'highlight', 'highlight' );

// Buttons
if ( ! function_exists( 'button' ) ) {

	function button( $atts, $content = null ) {
		extract( shortcode_atts( array( 'type' => '', 'url' => '', 'button_color_fon' => '', 'target' => '' ), $atts ) );
		if ( $target != '' ) : $target = "target='_blank'";
	endif;

		$html = '';
		if ( $type == 'btn_text' ) {
			$html .= 'color: ' . $button_color_fon;
		} elseif ( $type == 'btn_small' ) {
			$html .= 'background-color: ' . $button_color_fon;
		} elseif ( $type == 'btn_border' ) {
			$html .= 'background-color: ' . $button_color_fon . '; border-color: ' . $button_color_fon;
		} else {
			$html .= 'background-color: ' . $button_color_fon;
		}
		$out = "<a class='" . $type . " ' style='" . $html . "'  href='" . $url . "' " . $target . '  ><span>' . do_shortcode( $content ) . '</span></a>';

		return $out;
	}
}
add_shortcode( 'button', 'button' );

// Blog
if ( ! function_exists( 'blog_shortcode' ) ) {

	function blog_shortcode( $atts, $content = null ) {
		$out = '';
		// get the current page
		if ( is_front_page() ) {
			$current_page = (get_query_var( 'page' )) ? get_query_var( 'page' ) : 1;
		} else {
			$current_page = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
		}

		extract( shortcode_atts( array( 'category' => '', 'perpage' => '1', 'pagination' => '' ), $atts ) );

		$args		 = array(
		'posts_per_page'	 => $perpage,
	    'post_status'		 => 'publish',
	    'cat'			 => $category,
	    'post_type'		 => 'post',
	    'paged'			 => $current_page,
	    'ignore_sticky_posts'	 => true,
	    'order'			 => 'DESC',
		);
		$post_list	 = new WP_Query( $args );

		ob_start();
		if ( $post_list && $post_list->have_posts() ) :
			?>

			<?php while ( $post_list->have_posts() ) : $post_list->the_post(); ?>
		<?php global $more;
		$more = 0; ?>
		<article <?php post_class( 'posts_listing blog_shortcode clearfix blog_2' ) ?> id="post-<?php the_ID(); ?>">
			<div class="thumb-area">
			<?php
			if ( has_post_thumbnail() ) {
			    ?>
		    	<a href="<?php the_permalink() ?>" title="<?php echo the_title(); ?>" class="clearfix thumb listing"><b><?php get_theme_post_thumbnail( get_the_ID(), 'square_thumbnail' ); ?><span class="portfolio-shadow transparent-shadow"></span></b></a>
			<?php } ?>
			<div class="<?php if ( has_post_thumbnail() ) {
				echo('post-date-image');
} else {
	echo('post-date');
} ?> updated">
			    <div class="post-day"><?php echo get_the_date( 'j' ); ?></div>
			    <div class="post-month"><?php echo get_the_date( 'F' ); ?></div>
			</div>
			</div>
			<div class="extra-wrap">
			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry-content">
			    <?php
			    if ( get_option( SHORTNAME . '_excerpt' ) ) {
					the_content( '', false );
			    } else {
					the_excerpt();
			    }
			    ?>
			</div>
			<div class="postmeta">
			    <?php if ( comments_open() ) : comments_popup_link( __( 'Comments (0)', 'retro' ), __( 'Comment (1)', 'retro' ), __( 'Comments (%)', 'retro' ), 'commentslink' );
			    endif; ?>
			    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"  class="more-link"><?php _e( 'Read more', 'retro' ); ?></a>
		<?php edit_post_link( __( 'Edit', 'retro' ), '<span class="edit-link">', '</span>' ); ?>
			    <span class="vcard author" style="display:none"><span class="fn"><?php the_author(); ?></span></span>
			</div>
			</div>
		</article>
	    <?php endwhile; ?>


			<?php
			$total = $post_list->max_num_pages;
			if ( $pagination && $total > 1 ) {
			?>
			<div class="pagination clearfix">
		    <?php
		    // structure of “format” depends on whether we’re using pretty permalinks
		    $permalink_structure = get_option( 'permalink_structure' );
		    if ( empty( $permalink_structure ) ) {
				if ( is_front_page() ) {
					$format = '?paged=%#%';
				} else {
					$format = '&paged=%#%';
				}
			} else {
				$format = 'page/%#%/';
			}

				echo paginate_links( array(
					'base'		 => get_pagenum_link( 1 ) . '%_%',
					'format'	 => $format,
					'current'	 => $current_page,
					'total'		 => $total,
					'mid_size'	 => 10,
					'type'		 => 'list',
				) );
				?>
			</div><?php
			}
	    endif;
	    $out = ob_get_clean();

	    wp_reset_postdata();

	    return $out;
	}
}
	add_shortcode( 'blog', 'blog_shortcode' );

if ( ! function_exists( 'portfolio_shortcode' ) ) {

	function portfolio_shortcode( $atts, $content = null ) {

	    $out = '';
	    // get the current page
	    if ( is_front_page() ) {
			$current_page = (get_query_var( 'page' )) ? get_query_var( 'page' ) : 1;
	    } else {
			$current_page = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
	    }

	    extract( shortcode_atts( array( 'terms' => '', 'isotope' => '', 'perpage' => '1', 'pagination' => '', 'layout' => '' ), $atts ) );
		$isotope = filter_var( $isotope, FILTER_VALIDATE_BOOLEAN );
	    if ( $isotope ) {
			$perpage = -1;
	    }
	    $args = array(
		'posts_per_page' => $perpage,
		'post_status'	 => 'publish',
		'post_type'		 => Custom_Posts_Type_Portfolio::POST_TYPE,
		'paged'			 => $current_page,
		'ignore_sticky_posts'	 => true,
		'order'			 => 'DESC',
		'tax_query'		 => array(
		    array(
			'taxonomy'	 => Custom_Posts_Type_Portfolio::TAXONOMY,
			'field'		 => 'id',
			'terms'		 => explode( ',', $terms ),
		    ),
		),
	    );

	    $post_list = new WP_Query( $args );

	    ob_start();
	    if ( $post_list && $post_list->have_posts() ) :
		?>

	    <?php
	    if ( $isotope ) {
			wp_enqueue_script( 'isotope' );
		?>
		<div class="clearfix filters">
		<?php
		$term	 = get_term_by( 'id', $terms, Custom_Posts_Type_Portfolio::TAXONOMY );
		$parent	 = $term->term_id;

		$args = array(
		    'taxonomy'		 => Custom_Posts_Type_Portfolio::TAXONOMY,
		    'child_of'		 => $parent,
		    'title_li'		 => '',
		    'show_option_none'	 => '',
		    'hierarchical'		 => false,
		    'hide_empty'		 => 1,
			);
		?>
		    <h2><?php _e( 'SORT BY', 'retro' ) ?></h2>
			<ul>
			<li><a href="#" class="selected"><?php _e( 'All', 'retro' ) ?></a></li>
		<?php echo wp_list_categories( $args ); ?>
			</ul>
		</div>
		    <?php } ?>

		<div class="row <?php if ( $layout == 'medium' ) { echo 'portfolio-medium'; }
			elseif ( $layout == 'small' ) { echo 'portfolio-small'; } else {echo 'portfolio-big';}?>">
	        <div class="portfolio_wrap clearfix  <?php if ( $layout == 'medium' ) { echo 'portfolio-medium'; }
			if ( $layout == 'small' ) { echo 'portfolio-small'; } ?>">
	    <?php while ( $post_list->have_posts() ) : $post_list->the_post(); ?>
			<?php
			$disable_thumb	 = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_hide_thumb', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_hide_thumb', true ) : null;
			$live_url	 = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_url', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_url', true ) : null;
			$live_button	 = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_url_button', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_url_button', true ) : __( 'Launch project', 'retro' );
			$preview_url	 = (get_post_meta( get_the_ID(), SHORTNAME . '_url_lightbox', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_url_lightbox', true ) : null;
			$use_lightbox	 = (get_post_meta( get_the_ID(), SHORTNAME . '_use_lightbox', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_use_lightbox', true ) : null;
			$hide_more	 = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_hide_more', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_hide_more', true ) : null;
			$more_button	 = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_more_text', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_more_text', true ) : __( 'more info', 'retro' );
			$live_target	 = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_target', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_target', true ) : null;
			$ext		 = null;
			$term_id	 = null;
			$terms		 = wp_get_post_terms( get_the_ID(), Custom_Posts_Type_Portfolio::TAXONOMY );
			foreach ( $terms as $termid ) {
			    $term_id = $term_id . ' cat-item-' . $termid->term_id;
			}
			if ( $preview_url ) {

			    $hostname = parse_url( $preview_url, PHP_URL_HOST );

			    if ( preg_match( "/\b(?:vimeo|youtube|dailymotion|youtu)\.(?:com|be)\b/i", $hostname ) ) {
					$ext = 'video';
			    } else {

					$path = parse_url( $preview_url, PHP_URL_PATH );

					$ext = pathinfo( $path, PATHINFO_EXTENSION );
			    }
			}

			global $post_layout, $rt_isFooter;

			$layout_page = ($post_layout == 'layout_none_sidebar' || $rt_isFooter ) ? 'grid_12' : 'grid_8';

			switch ( $layout ) {
			    case 'medium':
					global $post_layout, $rt_isFooter;
					$num = ($post_layout == 'layout_none_sidebar' || $rt_isFooter ) ? '3' : '2';

					$linebreak = (($post_list->current_post) % $num == 0 ) ? 'clearboth' : '';
				?>
				<article <?php post_class( $term_id . ' portfolios_listing  small grid_4 vc_col-sm-4 ' . $linebreak ) ?> id="post-<?php the_ID(); ?>">
				<?php if ( has_post_thumbnail() ) { ?>
			    	    <a href="<?php
						if ( $preview_url ) {
							echo $preview_url;
						} elseif ( ! $preview_url && $use_lightbox ) {

							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

							echo $imgsrc[0];

							$ext = 'jpg';
						} else {
							the_permalink();
						}
				    ?>" <?php echo ($use_lightbox) ? 'data-pp="lightbox[]"' : ''; ?>  title="<?php echo the_title(); ?>" class="portfolio-lightbox-small portfolio-lightbox <?php echo $ext; ?>"><b><?php get_theme_post_thumbnail( get_the_ID(), 'portfolio_modern' ); ?><span class="portfolio-shadow transparent-shadow"></span></b><span class="portfolio-zoom "><?php _e( 'view', 'retro' ); ?></span></a>
				    <?php } ?>
					<div class="postcontent  clearfix">
					<h2 class="entry-title"><?php if ( isset( $icon ) && $icon ) {
					?><img src="<?php echo $icon ?>" alt="<?php the_title() ?>"  ><?php
}
				    ?><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
					</h2>
					<div class="meta" style="display:none"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
					    <div class="entry-date updated"><?php echo get_the_date(); ?></div>
					</div>
					<div class="entry-content">
						<?php excerpt( 200 ); ?>
					</div>

					</div>
				</article>
					    <?php
					    break;
				case 'small':
					global $post_layout, $rt_isFooter;
					$num = ($post_layout == 'layout_none_sidebar' || $rt_isFooter) ? '4' : '3';

					$linebreak = (($post_list->current_post) % $num == 0 ) ? 'clearboth' : '';
					if ( has_post_thumbnail() ) {
						?>
			    	<article <?php post_class( $term_id . ' portfolios_listing  small grid_3 vc_col-sm-3 ' . $linebreak ) ?> id="post-<?php the_ID(); ?>">
			    	    <a href="<?php
						if ( $preview_url ) {
							echo $preview_url;
						} elseif ( ! $preview_url && $use_lightbox ) {

							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

							echo $imgsrc[0];

							$ext = 'jpg';
						} else {
							the_permalink();
						}
						?>" <?php echo ($use_lightbox) ? 'data-pp="lightbox[]"' : ''; ?>  title="<?php echo the_title(); ?>" class="portfolio-lightbox-small portfolio-lightbox <?php echo $ext; ?>"><b><?php get_theme_post_thumbnail( get_the_ID(), 'portfolio_small' ); ?><span class="portfolio-shadow transparent-shadow"></span></b><span class="portfolio-zoom "><?php _e( 'view', 'retro' ); ?></span></a>
					</article>
				    <?php
				    }
				    break;
				default:
				    ?>
				<article <?php post_class( $term_id . ' portfolios_listing clearfix ' . $layout_page. ' vc_col-sm-12' ) ?> id="post-<?php the_ID(); ?>">
				    <?php if ( has_post_thumbnail() ) { ?>
			    	    <a href="<?php
						if ( $preview_url ) {
							echo $preview_url;
						} elseif ( ! $preview_url && $use_lightbox ) {

							$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

							echo $imgsrc[0];

							$ext = 'jpg';
						} else {
							the_permalink();
						}
					?>" <?php echo ($use_lightbox) ? 'data-pp="lightbox[]"' : ''; ?>  title="<?php echo the_title(); ?>" class="fleft portfolio-lightbox portfolio-lightbox-big <?php echo $ext; ?>"><?php get_theme_post_thumbnail( get_the_ID(), 'portfolio_big' ); ?><span class="portfolio-zoom-big transparent-shadow"></span><span class="portfolio-area-zoom"><span class="portfolio-zoom-round"></span><span class="portfolio-zoom-line"><?php _e( 'view', 'retro' ) ?></span></span></a>
				    <?php } ?>
					<div class="extra-wrap clearfix">
					<h2 class="entry-title"><?php
				    if ( isset( $icon ) && $icon ) {
					?><img src="<?php echo $icon ?>" alt="<?php the_title() ?>"  ><?php } ?><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
					<div class="entry-date">
				    <?php echo the_time( get_option( 'date_format' ) ); ?>
					</div>
					<div class="meta" style="display:none"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
					    <div class="entry-date updated"><?php echo get_the_date(); ?></div>
					</div>
					<div class="entry-content">
					    <p><?php excerpt( 240 ); ?></p>
					</div>
				    <?php if ( $live_url || ! $hide_more ) { ?>
						<div class="buttons">
					<?php if ( $live_url ) { ?>
						    <a href="<?php echo $live_url; ?>" class="btn-pf" <?php echo ($live_target) ? 'target="_blank"' : ''; ?>  ><?php echo $live_button; ?></a>
						<?php } ?>
						<?php if ( ! $hide_more ) { ?>
						    <a href="<?php the_permalink(); ?>" class="btn-pf" ><?php echo $more_button ?></a>
						<?php } ?>
						</div>
					    <?php } ?>
					</div>
				</article>
			<?php
			break;
			}
		?>
	    <?php endwhile; ?>
			</div>
			    <?php
			    $total = $post_list->max_num_pages;

			    if ( $pagination && ! $isotope && $total > 1 ) {
				?>
			<div class="pagination clearfix">
				    <?php
				    // structure of “format” depends on whether we’re using pretty permalinks
				    $permalink_structure = get_option( 'permalink_structure' );
				    if ( empty( $permalink_structure ) ) {
						if ( is_front_page() ) {
							$format = '?paged=%#%';
						} else {
							$format = '&paged=%#%';
						}
				    } else {
						$format = 'page/%#%/';
				    }

				    echo paginate_links( array(
						'base'		 => get_pagenum_link( 1 ) . '%_%',
						'format'	 => $format,
						'current'	 => $current_page,
						'total'		 => $total,
						'mid_size'	 => 10,
						'type'		 => 'list',
				    ) );
				    ?>

		    </div><?php }
				?>
		</div>
		    <?php
		endif;
		$out = ob_get_clean();

		wp_reset_postdata();
		return $out;
	}
}
	add_shortcode( 'terms_portfolio', 'portfolio_shortcode' );


if ( ! function_exists( 'portfolio_carousel_shortcode' ) ) {

	function portfolio_carousel_shortcode( $atts, $content = null ) {
		wp_enqueue_script( 'flexslider' );

		$mycarousel_options	 = new stdClass();
		$data			 = '';
		$out			 = '';

		extract( shortcode_atts( array( 'title' => '', 'terms' => '', 'number' => -1, 'autoplay' => false, 'timeout' => 4000 ), $atts ) );

		$args		 = array(
		'posts_per_page'	 => $number,
		    'post_status'		 => 'publish',
		    'post_type'		 => Custom_Posts_Type_Portfolio::POST_TYPE,
		    'ignore_sticky_posts'	 => true,
		    'order'			 => 'DESC',
		    'tax_query'		 => array(
			array(
			    'taxonomy'	 => Custom_Posts_Type_Portfolio::TAXONOMY,
			    'field'		 => 'id',
			    'terms'		 => explode( ',', $terms ),
			),
		    ),
			);
			$post_list	 = new WP_Query( $args );

		if ( $post_list && $post_list->have_posts() ) :
			$mycarousel_options->slideshow		 = ! empty( $autoplay );
			$mycarousel_options->slideshowSpeed	 = $timeout;
			$data					 = htmlspecialchars( json_encode( $mycarousel_options ) );

			ob_start();
			?>
			<div class="portfolio-carousel-wrap"><div class="portfolio-carousel flexslider carousel" data-carousel="<?php echo $data; ?>">
			<div class="flex-viewport">
				<!---->
				<ul class="flex-direction-nav carousel-nav">
	    		<li><a class="flex-prev" href="#"><?php _e( 'Previous', 'retro' ) ?></a></li>
	    		<li><h2 class="carousel-title"><?php echo $title; ?></h2></li>
	    		<li><a class="flex-next" href="#"><?php _e( 'Next', 'retro' ) ?></a></li>
				</ul>
				<!---->
				<ul class="slides">
			<?php
			while ( $post_list->have_posts() ) : $post_list->the_post();
				global $post_layout;
				$ext = '';

				$preview_url	 = get_post_meta( get_the_ID(), SHORTNAME . '_url_lightbox', true );
				$use_lightbox	 = get_post_meta( get_the_ID(), SHORTNAME . '_use_lightbox', true ) != '';

				if ( has_post_thumbnail() ) {
					?>
					<li>
		    		    <article <?php // post_class( ' portfolios_listing  small grid_3 ') ?> id="post-<?php the_ID(); ?>">
		    			<a href="<?php
						if ( $preview_url ) {
							echo $preview_url;
						} elseif ( ! $preview_url && $use_lightbox ) {
							$imgsrc	 = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
							echo $imgsrc[0];
							$ext	 = 'jpg';
						} else {
							the_permalink();
						}
					?>" <?php echo ($use_lightbox) ? 'data-pp="lightbox[]"' : ''; ?>  title="<?php echo the_title(); ?>" class="portfolio-lightbox  <?php echo $ext; ?>">
							<b>
				    <?php get_theme_post_thumbnail( get_the_ID(), 'portfolio_carousel' ); ?>
							<span class="portfolio-shadow transparent-shadow"></span>
							</b>
							<span class="portfolio-zoom-carousel"></span>
						</a>
						<div class="portfolio-carusel-content">
		    			    <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a>
						</div>
						</article>
					</li>
					<?php }
				endwhile;
				?>
				</ul>
				</div>
				</div></div>
				<?php
				$out .= ob_get_clean();
				endif;
				wp_reset_postdata();
				return $out;
	}
}
			add_shortcode( 'portfolio_carousel', 'portfolio_carousel_shortcode' );

if ( ! function_exists( 'contactForm' ) ) {

	function contactForm( $atts, $content = null ) {
		return '';
	}
}
			add_shortcode( 'contactForm', 'contactForm' );

	// Notifications
if ( ! function_exists( 'notification' ) ) {

	function notification( $atts, $content = null ) {
		extract( shortcode_atts( array( 'type' => '' ), $atts ) );
		$out = "<div class='ox_notification " . $type . "' >" . do_shortcode( $content ) . '</div>';

		return $out;
	}
}

			add_shortcode( 'notification', 'notification' );

	// Toggles
if ( ! function_exists( 'toggle_shortcode' ) ) {

	function toggle_shortcode( $atts, $content = null ) {
		wp_enqueue_script( 'jquery-ui-core' );
		extract( shortcode_atts( array( 'title' => '', 'type' => '', 'active' => '' ), $atts ) );
		return '<div class="toggle toggle-' . $type . '"><h4 class="trigger ' . $active . '"><span class="t_ico"></span><a href="#">' . $title . '</a></h4><div class="toggle_container  ' . $active . '">' . do_shortcode( $content ) . '</div></div>';
	}
}
			add_shortcode( 'toggle', 'toggle_shortcode' );


	// Tabs
			add_shortcode( 'tabgroup', 'jquery_tab_group' );

function jquery_tab_group( $atts, $content ) {
	// wp_enqueue_script('jquery-ui-tabs');
	extract( shortcode_atts( array( 'type' => '' ), $atts ) );

	$GLOBALS['tab_count'] = 0;
	$GLOBALS['tabs'] = array();

	do_shortcode( $content );

	if (is_array($GLOBALS['tabs']) && ! empty($GLOBALS['tabs'])) {
		$int = '1';
		foreach ( $GLOBALS['tabs'] as $tab ) {
			$tabs[]	 = '

  <li><a href="#tabs-' . $int . '">' . $tab['title'] . '</a></li>

';
			$panes[] = '
<div class="panel entry-content" id="tabs-' . $int . '">' . $tab['content'] . '</div>';
			$int ++;
		}
		$return	 = "\n";
		$return	 = '<div class="tabacc">';
		foreach ( $tabs as $index => $tab ) {
			$return .= '<ul class="tabs">' . $tab . '</ul>'
			. $panes[ $index ];
		}
		$return .= '</div>';
		$return .= "\n";

		// $return = "\n" . '
		// <ul class="tabs">' . implode("\n", $tabs) . '</ul>
		// ' . "\n" . ' ' . implode("\n", $panes) . "\n";
	}
	return $return;
}

			add_shortcode( 'tab', 'jquery_tab' );

function jquery_tab( $atts, $content ) {
	extract( shortcode_atts( array( 'title' => 'Tab %d' ), $atts ) );

	$x			 = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][ $x ]	 = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' => do_shortcode( $content ) );

	$GLOBALS['tab_count'] ++;
}

if ( ! function_exists( 'refresh_mce' ) ) {

	function refresh_mce( $ver ) {
		$ver += 3;
		return $ver;
	}
}
			add_filter( 'tiny_mce_version', 'refresh_mce' );

if ( ! function_exists( 'html_editor' ) ) {

	function html_editor() {

		if ( basename( $_SERVER['SCRIPT_FILENAME'] ) == 'post-new.php' || basename( $_SERVER['SCRIPT_FILENAME'] ) == 'post.php' ) {

			echo "<style type='text/css'>#ed_toolbar input#one_half, #ed_toolbar input#one_third, #ed_toolbar input#one_fourth, #ed_toolbar input#two_third, #ed_toolbar input#one_half_last, #ed_toolbar input#one_third_last, #ed_toolbar input#one_fourth_last, #ed_toolbar input#two_third_last, #ed_toolbar input#clear {font-weight:700;color:#2EA2C8;text-shadow:1px 1px white}
                    #ed_toolbar input#one_half_last, #ed_toolbar input#one_third_last, #ed_toolbar input#one_fourth_last, #ed_toolbar input#two_third_last, #ed_toolbar input#three_fourth, #ed_toolbar input#three+fourth_last {color:#888;text-shadow:1px 1px white}
                    #ed_toolbar input#raw {color:red;text-shadow:1px 1px white;font-weight:700;}
				</style>";
		}
	}
}
			add_action( 'admin_head', 'html_editor' );

if ( ! function_exists( 'custom_quicktags' ) ) {

	function custom_quicktags() {
		if ( basename( $_SERVER['SCRIPT_FILENAME'] ) == 'post-new.php' || basename( $_SERVER['SCRIPT_FILENAME'] ) == 'post.php' ) {
			wp_enqueue_script( 'custom_quicktags', get_template_directory_uri() . '/lib/shortcode/shortcodes/quicktags.js', array( 'quicktags' ), '1.0.0' );
		}
	}
}
			add_action( 'admin_print_scripts', 'custom_quicktags' );

if ( ! function_exists( 'ox_gallery_shortcode' ) ) {

	function ox_gallery_shortcode( $attr ) {
		global $post, $wp_locale;

		static $instance = 0;
		$instance ++;

		$output = apply_filters( 'post_gallery', '', $attr );
		if ( $output != '' ) {
			return $output; }

		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( ! $attr['orderby'] ) {
				unset( $attr['orderby'] ); }
		}

		extract( shortcode_atts( array( 'order' => 'ASC', 'orderby' => 'menu_order ID', 'id' => $post->ID, 'icontag' => 'figure', 'captiontag' => 'figcaption', 'columns' => 3, 'size' => 'thumbnail', 'include' => '', 'exclude' => '' ), $attr ) );

		$id	 = intval( $id );
		if ( 'RAND' == $order ) {
			$orderby = 'none'; }

		if ( ! empty( $include ) ) {
			$include	 = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments	 = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[ $val->ID ] = $_attachments[ $key ];
			}
		} elseif ( ! empty( $exclude ) ) {
			$exclude	 = preg_replace( '/[^0-9,]+/', '', $exclude );
			$attachments	 = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
		} else {
			$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
		}

		if ( empty( $attachments ) ) {
			return ''; }

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment ) {
				$output .= wp_get_attachment_link( $att_id, $size, true ) . "\n"; }
			return $output;
		}

		$captiontag	 = tag_escape( $captiontag );
		$columns	 = intval( $columns );
		$itemwidth	 = $columns > 0 ? floor( 100 / $columns ) : 100;
		$float		 = is_rtl() ? 'right' : 'left';

		$selector = "gallery-{$instance}";

		$gallery_style	 = $gallery_div	 = '';
		if ( apply_filters( 'use_default_gallery_style', true ) ) {
			$gallery_style	 = ''; }
		$size_class	 = sanitize_html_class( $size );
		$gallery_div	 = "<section id='$selector' class='clearfix gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
		$output		 = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

		$i = 0;
		foreach ( $attachments as $id => $attachment ) {

			$link = isset( $attr['link'] ) && $attr['link'] === 'attachment' ?
			str_replace( 'class="attachment-thumbnail"', 'class="attachment-thumbnail imgborder"', wp_get_attachment_link( $id, $size, true, false ) ) :
			str_replace( 'class="attachment-thumbnail"', 'class="attachment-thumbnail imgborder"', wp_get_attachment_link( $id, $size, false, false ) );
			$output .= "
      <{$icontag} class=\"gallery-item\">
        $link
      ";
			if ( $captiontag && trim( $attachment->post_excerpt ) ) {
				$output .= "
        <{$captiontag} class=\"gallery-caption\">
        " . wptexturize( $attachment->post_excerpt ) . "
        </{$captiontag}>";
			}
			$output .= "</{$icontag}>";
			if ( $columns > 0 && ++ $i % $columns == 0 ) {
				$output .= ''; }
		}

		$output .= "</section>\n";

		return $output;
	}
}

	// remove_shortcode('gallery');
	// add_shortcode('gallery', 'ox_gallery_shortcode');
if ( ! function_exists( 'ox_social_link' ) ) {

	function ox_social_link( $atts, $content = null ) {
		extract( shortcode_atts( array( 'url' => '#', 'style' => 'default', 'type' => '', 'target' => '' ), $atts ) );

		if ( $target ) {
			$target = 'target="_blank"';
		}
		/**
				 * @todo add  correct classes
				 */
		$link = '<a class="social_links ' . $style . ' ' . $type . '" href="' . $url . '" ' . $target . '><span>' . $type . '</span></a>';
		if ( $style == 'stamp' ) {
			return sprintf( '<div class="stamp-wrap">%s</div>', $link );
		} else { 			return $link; }
	}
}
			add_shortcode( 'social_link', 'ox_social_link' );

			/**
			 * Insert social buttons(google+, facebook, twitter)
			 */
if ( ! function_exists( 'ox_social_button' ) ) {

	function ox_social_button( $atts, $content = null ) {
		$default_values = array(
		'button'	 => '',
		'url'		 => '',
		'gurl'		 => in_the_loop() ? get_permalink() : '', // google
		'gsize'		 => '',
		'gannatation'	 => '',
		'ghtml5'	 => '',
		'text'		 => '',
		'turl'		 => in_the_loop() ? get_permalink() : '', // twitter
		'ttext'		 => in_the_loop() ? get_the_title() : '',
		'tcount'	 => '',
		'tsize'		 => '',
		'tvia'		 => '',
		'trelated'	 => '',
		'furl'		 => in_the_loop() ? get_permalink() : '', // facebook
		'flayout'	 => '',
		'fsend'		 => '',
		'fshow_faces'	 => '',
		'fwidth'	 => 450,
		'faction'	 => '',
		'fcolorsheme'	 => '',
		'purl'		 => in_the_loop() ? get_permalink() : '', // pinterest
		'pmedia'	 => wp_get_attachment_url( get_post_thumbnail_id() ),
		'vcpmedia'	 => '',
		'ptext'		 => in_the_loop() ? get_the_title() : '',
		'pcount'	 => '',
		);

		$shortcode_html	 = $shortcode_js	 = '';
		extract( shortcode_atts( $default_values, $atts ) );

		if ( ! empty( $url ) ) {
			$gurl = $url;
			$turl = $url;
			$furl = $url;
			$purl = $url;
		}
		if ( ! empty( $text ) ) {
			$ttext = $text;
			$ptext = $text;
		}
		$vcpmedia = absint( $vcpmedia );
		if ( $vcpmedia ) {
			$pmedia = wp_get_attachment_url( $vcpmedia );
		}

		switch ( $button ) {
			/**
				     * insert google+ button
				     */
			case 'google':
				$shortcode_js = "<script type='text/javascript'>(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>";
				if ( $ghtml5 ) {
					$shortcode_html = sprintf( '<div class="g-plusone" data-size="%s" data-annotation="%s" data-href="%s"></div>', $gsize, $gannatation, $gurl );
				} else {
					$shortcode_html = sprintf( '<g:plusone size="%s" annotation="%s" href="%url"></g:plusone>', $gsize, $gannatation, $gurl );
				}
			break;
			/**
				     * Insert Twitter follow button
				     */
			case 'twitter':
				$shortcode_js	 = '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
				$template	 = '<a href="https://twitter.com/share" class="twitter-share-button"  data-url="%s"	data-text="%s" data-count="%s" data-size="%s" data-via="%s" data-related="%s" data-lang="">Tweet</a>';
				$shortcode_html	 = sprintf( $template, $turl, $ttext, $tcount, $tsize, $tvia, $trelated );
			break;
			/**
				     * Insert facebook button.
				     */
			case 'facebook':
				$shortcode_js	 = <<<JS
                    <div id="fb-root"></div>
                  <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>
JS;
				$template	 = <<<HTML
                <div class="fb-like" data-href="%s" data-send="%s" data-layout="%s" data-width="%d" data-show-faces="%s" data-action="%s" data-colorscheme="%s"></div>
HTML;
				$shortcode_html	 = sprintf( $template, $furl, ($fsend) ? 'true' : 'false', $flayout, $fwidth, ($fshow_faces) ? 'true' : 'false', $faction, $fcolorsheme
				);
			break;

			case 'pinterest':
				$query_params	 = $template	 = '';
				$filtered_params = array();

				$params = array(
				'url'		 => $purl,
				'media'		 => $pmedia,
				'description'	 => $ptext,
				);

				$filtered_params = array_filter( $params );

				$query_params = http_build_query( $filtered_params );

				if ( strlen( $query_params ) ) {
					$query_params = '?' . $query_params;
				}

				$template = '<a href="http://pinterest.com/pin/create/button/%s" class="pin-it-button" count-layout="%s"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>';

				$shortcode_html	 = sprintf( $template, $query_params, $pcount );
				$shortcode_js	 = '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>';

			break;
		}
		return $shortcode_html . $shortcode_js;
	}
}
			add_shortcode( 'social_button', 'ox_social_button' );

if ( ! function_exists( 'ox_teaser' ) ) {

	function ox_teaser( $atts, $button_title = null ) {
		$target_html	 = '';
		extract( shortcode_atts( array( 'url' => home_url(), 'vcurl' => '', 'title' => get_bloginfo( 'name' ), 'src' => '', 'vcsrc' => '', 'post' => '', 'target' => '', 'content' => '', 'excerpt' => '' ), $atts ) );
		$html		 = '<div class="teaser_wrap"><div class="teaser_box">';

		if ( function_exists( 'vc_build_link' ) ) {
			$vcurl = vc_build_link( $vcurl );
			if ( ! empty( $vcurl['url'] ) ) {
				$url = $vcurl['url'];
			}
			if ( ! empty( $vcurl['target'] ) ) {
				$target_html = ' target="' . $vcurl['target'] . '"';
			}
			if ( ! empty( $vcurl['rel'] ) ) {
				$target_html = ' rel="' . $vcurl['rel'] . '"';
			}
		}
		if ( $title ) {
			$html .= '<span class="teaser_title">' . $title . '</span>';
		}
		if ( $target ) {
			$target_html = ' target="_blank"';
		}
		$vcsrc = absint( $vcsrc );
		if ( $vcsrc ) {
			$src = wp_get_attachment_url( $vcsrc );
		}
		if ( $src && strlen( $src ) ) {
			$html .= '<div class="teaser_image"><a href="' . esc_url( $url ) . '" ' . $target_html . '><img class="imgborder" src="' . esc_url( $src ) . '" alt="' . esc_html( $title ) . '"></a></div>';
		} elseif ( $post ) {
			ob_start();
			get_theme_post_thumbnail( $post, 'teaser-thumbnail' );
			$img = ob_get_clean();

			$html .= '<div class="teaser_image"><a href="' . esc_url( $url ) . '" ' . $target_html . '>' . $img . '</a></div>';
		}
		if ( $excerpt ) {
			$html .= '<div class="teaser_entry">' . $excerpt . '</div>';
		}
		if ( $button_title ) {
			$html .= '<div class="teaser_more_area"><a class="teaser_more" href="' . esc_url( $url ) . '" ' . $target_html . '>' . $button_title . '</a></div>';
		}
		$html .= '</div></div><div class="teaser_bottom_indent"></div><div class="clear"></div>';
		return $html;
	}
}
			add_shortcode( 'teaser', 'ox_teaser' );


if ( ! function_exists( 'ox_audio' ) ) {

	function ox_audio( $atts, $title = null ) {
		if ( ! isset( $GLOBALS['audio_iterator'] ) ) {
			$GLOBALS['audio_iterator'] = 1;
		}

		extract( shortcode_atts( array( 'href' => '', 'hide_title' => '' ), $atts ) );

		if ( parse_url( $href ) ) {
			wp_enqueue_script( 'jplayer' );

			switch ( pathinfo( $href, PATHINFO_EXTENSION ) ) {
				case 'mp3':  // mp3
					$media		 = "{mp3: '$href'}";
					$supplied	 = 'supplied: "mp3",';
				break;
				case 'm4a':  // mp4
					$media		 = "{m4a: '$href'}";
					$supplied	 = 'supplied: "m4a, mp3",';
				break;
				case 'ogg': // ogg
					$media		 = "{oga: '$href'}";
					$supplied	 = 'supplied: "oga, ogg, mp3",';
				break;
				case 'oga': // oga
					$media		 = "{oga: '$href'}";
					$supplied	 = 'supplied: "oga, ogg, mp3",';
				break;
				case 'webma': // webma
					$media		 = "{webma: '$href'}";
					$supplied	 = 'supplied: "webma, mp3",';
				break;
				case 'webm': // webma
					$media		 = "{webma: '$href'}";
					$supplied	 = 'supplied: "webma, mp3",';
				break;
				case 'wav':
					$media		 = "{wav: '$href'}";
					$supplied	 = 'supplied: "wav, mp3",';
				break;
				default:
					// not supporteg audio format
				return;
				break;
			}

			$html = <<<HTML
            <div id="jquery_jplayer_{$GLOBALS[ 'audio_iterator' ]}" class="jp-jplayer"></div>
            <div id="jp_container_{$GLOBALS[ 'audio_iterator' ]}" class="jp-audio">
            <div class="jp-type-single"><div class="jp-control"><a href="javascript:;" class="jp-play" tabindex="1">play</a><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></div> <div class="jp-gui jp-interface"><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-volume"><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div></div>
                </div>
HTML;
			if ( ! $hide_title ) {
				$html .= <<<HTML
                <div class="jp-title"><strong>{$title}</strong> -  <span class="jp-current-time"></span> / <span class="jp-duration"></span></div>
HTML;
			}
			$html .= <<<HTML
                <div class="jp-no-solution"><span>Update Required</span>To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.</div></div></div>
        <script type='text/javascript'>
            jQuery(document).ready(function() {
                jQuery.jPlayer.timeFormat.showHour = true;
                jQuery("#jquery_jplayer_{$GLOBALS[ 'audio_iterator' ]}").jPlayer({
                    ready: function(event) {
                        jQuery(this).jPlayer("setMedia", {$media});
                    },
                    play: function() {
                        jQuery(this).jPlayer("pauseOthers",0);
                    },
                    swfPath: THEME_URI+"/swf",
                    solution: "html, flash",
                    preload: "metadata",
                    wmode: "window",
                    {$supplied}
                    cssSelectorAncestor: '#jp_container_{$GLOBALS[ 'audio_iterator' ]}'
                });
            });
        </script>
HTML;
			$GLOBALS['audio_iterator'] = $GLOBALS['audio_iterator'] + 1;
			return $html;
		}
	}
}
			add_shortcode( 'thaudio', 'ox_audio' );


if ( ! function_exists( 'ox_testimonial' ) ) {

	function ox_testimonial( $atts ) {
		if ( ! isset( $GLOBALS['shortcode_iterator'] ) ) {
			$GLOBALS['shortcode_iterator'] = 1;
		}

		extract( shortcode_atts( array( 'category' => 'all', 'time' => 10, 'effect' => 'fade', 'randomize' => '' ), $atts ) );

		$query = 'post_type=' . Custom_Posts_Type_Testimonial::POST_TYPE . '&post_status=publish&posts_per_page=-1&order=DESC';
		if ( $category != 'all' ) {
			$query .= '&' . Custom_Posts_Type_Testimonial::TAXONOMY . '=' . $category;
		}
		$testimonials	 = new WP_Query( $query );
		$have_posts	 = $testimonials->have_posts();
		ob_start();
		?><div id="shortcode_testimonial_<?php echo $GLOBALS['shortcode_iterator'] ?>" class='shortcode_testimonial'>

	<?php if ( $have_posts ) : ?>

			<div class="jcycle">
	    <?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
			<div class="testimonial">
				<div class="testimonial_quote">
				<div class="testimonial_indent">
		<?php echo the_content(); ?>
				</div>
				</div>
				<div class="testimonial_meta">
				<span class="testimonial_author"><?php echo get_post_meta( get_the_ID(), SHORTNAME . '_testimonial_author', true ); ?></span>
				<span class="testimonial_description"><?php echo get_post_meta( get_the_ID(), SHORTNAME . '_testimonial_author_job', true ); ?></span>
				</div>
			</div>
	    <?php endwhile; ?>
			</div>
	    <?php if ( $testimonials->post_count > 1 ) :  ?>
			<div class="controls">
			<a class="prev" href="#">Previous</a>
			<a class="next" href="#">Next</a>
			</div>
	    <?php endif; ?>

	    <?php
	endif;
if ( $testimonials->post_count < 2 ) {
	$randomize = false;
}
echo '</div>'; // <div id="shortcode_testimpnial_
if ( $have_posts && $testimonials->post_count > 1 ) {
	Widget_Testimonial::printWidgetJS( "shortcode_testimonial_{$GLOBALS[ 'shortcode_iterator' ]}", $effect, $randomize, $time );
}
wp_reset_postdata();
$GLOBALS['shortcode_iterator'] ++;
$html = ob_get_clean();
return $html;
	}
}
	add_shortcode( 'testimonials', 'ox_testimonial' );

if ( ! function_exists( 'youtube_id_from_url' ) ) {

	function youtube_id_from_url( $url ) {
		$pattern = '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        %x'
		;
		$result	 = preg_match( $pattern, $url, $matches );
		if ( false !== $result && isset( $matches[1] ) ) {
			return $matches[1];
		}
		return false;
	}
}
if ( ! function_exists( 'vimeo_id_from_url' ) ) {

	function vimeo_id_from_url( $url ) {
		$result = preg_match( '/(\d+)/', $url, $matches );
		if ( false !== $result && isset( $matches[1] ) ) {
			return $matches[1];
		}
		return false;
	}
}


	// List
if ( ! function_exists( 'ox_list' ) ) {

	function ox_list( $atts, $content = null ) {
		extract( shortcode_atts( array( 'type' => '' ), $atts ) );

		$content = str_replace( '<ul>', '<ul class=' . $type . '>', do_shortcode( $content ) );
		$content = str_replace( '<li>', '<li>', do_shortcode( $content ) );

		return $content;
	}
}
	add_shortcode( 'ox_list', 'ox_list' );


	// Table
if ( ! function_exists( 'ox_table' ) ) {

	function ox_table( $atts, $content = null ) {
		$content = str_replace( '<table>', '<table class="ox_table">', do_shortcode( $content ) );
		return $content;
	}
}
	add_shortcode( 'ox_table', 'ox_table' );

if ( ! function_exists( 'ox_slogan' ) ) {

	function ox_slogan( $atts, $content = '' ) {
		extract( shortcode_atts( array( 'h1' => '', 'h3' => '' ), $atts ) );
		$h1_html = $h3_html = '';

		if ( $h1 ) {
			$h1_html = '<h1>' . $h1 . '</h1>';
		}

		if ( $h3 ) {
			$h3_html = '<h3>' . $h3 . '</h3>';
		}

		return sprintf( '<div class="box-info"><div>%s %s <span>%s</span></div></div>', $h1_html, $h3_html, do_shortcode( $content ) );
	}
}
	add_shortcode( 'slogan', 'ox_slogan' );

add_action( 'vc_after_init', 'retro_vc_update_shortcode_param' );
function retro_vc_update_shortcode_param() {
	// message
	$param		 = WPBMap::getParam( 'vc_message', 'message_box_style' );
	$dep_value	 = array_values( $param[ 'value' ] );

	$param['value'][ __( 'Retro', 'retro' ) ] = 'retro';
	vc_update_shortcode_param( 'vc_message', $param );
	vc_add_param( 'vc_message', array(
		'type'			 => 'dropdown',
		'heading'		 => __( 'Retro Type', 'retro' ),
		'param_name'	 => 'type',
		'value'			 => array(
			__( 'Success', 'js_composer' )		 => 'success',
			__( 'Error', 'js_composer' )		 => 'error',
			__( 'Informational', 'js_composer' ) => 'info',
			__( 'Warning', 'js_composer' )		 => 'warning',
		),
		'description'	 => __( 'Select message box type.', 'retro' ),
		'dependency'	 => array(
			'element'	 => 'message_box_style',
			'value'		 => 'retro',
		),
	) );

	$hide_fields = array( 'style', 'message_box_color', 'icon_type' );
	foreach ( $hide_fields as $field ) {
		$param = WPBMap::getParam( 'vc_message', $field );
		if ( is_array( $param ) && !empty( $param ) ) {
			$param['dependency']['element']				 = 'message_box_style';
			$param['dependency']['value_not_equal_to']	 = 'retro';
			vc_update_shortcode_param( 'vc_message', $param );
		}
	}
	WPBMap::modify( 'vc_message', 'js_view', 'VcMessageView_Backend_retro' );

	// btn
	$param = WPBMap::getParam( 'vc_btn', 'style' );

	$param['value'][ __( 'Retro Small', 'retro' ) ]	 = 'retro-sm';
	$param['value'][ __( 'Retro Border', 'retro' ) ] = 'retro-brd';
	$param['value'][ __( 'Retro Text', 'retro' ) ]	 = 'retro-txt';
	vc_update_shortcode_param( 'vc_btn', $param );
	$param = WPBMap::getParam( 'vc_btn', 'color' );
	$param['dependency']['value_not_equal_to'][] = 'retro-sm';
	$param['dependency']['value_not_equal_to'][] = 'retro-brd';
	$param['dependency']['value_not_equal_to'][] = 'retro-txt';
	vc_update_shortcode_param( 'vc_btn', $param );
	vc_add_param( 'vc_btn', array(
		'type'			 => 'colorpicker',
		'heading'		 => __( 'Button Color', 'retro' ),
		'param_name'	 => 'retro_color',
		'value'			 => '#723f32',
		'description'	 => __( 'Select button color.', 'retro' ),
		'dependency'	 => array(
			'element'	 => 'style',
			'value'		 => array( 'retro-sm', 'retro-brd', 'retro-txt' ),
		),
	) );
	vc_add_param( 'vc_btn', array(
		'type'			 => 'colorpicker',
		'heading'		 => __( 'Button Color Text', 'retro' ),
		'param_name'	 => 'retro_color_text',
		'value'			 => '#fefdfb',
		'description'	 => __( 'Select button text color.', 'retro' ),
		'dependency'	 => array(
			'element'	 => 'style',
			'value'		 => array( 'retro-sm', 'retro-brd' ),
		),
	) );
	vc_add_param( 'vc_btn', array(
		'type'			 => 'colorpicker',
		'heading'		 => __( 'Hover Button Color', 'retro' ),
		'param_name'	 => 'retro_color_hover',
		'value'			 => '#959d3b',
		'description'	 => __( 'Select button hover color.', 'retro' ),
		'dependency'	 => array(
			'element'	 => 'style',
			'value'		 => array( 'retro-sm', 'retro-brd', 'retro-txt' ),
		),
	) );
	vc_add_param( 'vc_btn', array(
		'type'			 => 'colorpicker',
		'heading'		 => __( 'Hover Button Color Text', 'js_composer' ),
		'param_name'	 => 'retro_color_text_hover',
		'value'			 => '#ffffff',
		'description'	 => __( 'Select button text hover color.', 'retro' ),
		'dependency'	 => array(
			'element'	 => 'style',
			'value'		 => array( 'retro-sm', 'retro-brd' ),
		),
	) );

	// accordion
	$param		 = WPBMap::getParam( 'vc_tta_accordion', 'style' );
	$dep_value	 = array_values( $param['value'] );

	$param['value'][ __( 'Retro White', 'retro' ) ]	 = 'retro-white';
	$param['value'][ __( 'Retro Grey', 'retro' ) ]	 = 'retro-grey';
	vc_update_shortcode_param( 'vc_tta_accordion', $param );

	$hide_fields = array( 'shape', 'spacing', 'tab_position', 'alignment' );
	foreach ( $hide_fields as $field ) {
		$param = WPBMap::getParam( 'vc_tta_accordion', $field );
		if ( is_array( $param ) && !empty( $param ) ) {
			$param['dependency']['element']	 = 'style';
			$param['dependency']['value_not_equal_to']	 = array( 'retro-white', 'retro-grey' );
			vc_update_shortcode_param( 'vc_tta_accordion', $param );
		}
	}

	// tabs
	$param		 = WPBMap::getParam( 'vc_tta_tabs', 'style' );

	$param['value'][ __( 'Retro', 'retro' ) ]	 = 'retro';
	vc_update_shortcode_param( 'vc_tta_tabs', $param );

	$hide_fields = array( 'shape', 'spacing', 'tab_position', 'alignment' );
	foreach ( $hide_fields as $field ) {
		$param = WPBMap::getParam( 'vc_tta_tabs', $field );
		if ( is_array( $param ) && !empty( $param ) ) {
			$param['dependency']['element']	 = 'style';
			$param['dependency']['value_not_equal_to']	 = 'retro';
			vc_update_shortcode_param( 'vc_tta_tabs', $param );
		}
	}

	// toggle
	$param		 = WPBMap::getParam( 'vc_toggle', 'style' );
	$param['value'][ __( 'Retro', 'retro' ) ]	 = 'retro';
	vc_update_shortcode_param( 'vc_toggle', $param );

	// tour
	$param		 = WPBMap::getParam( 'vc_tta_tour', 'style' );
	$param['value'][ __( 'Retro', 'retro' ) ]	 = 'retro';
	vc_update_shortcode_param( 'vc_tta_tour', $param );
}

add_filter( 'vc_tta_accordion_general_classes', 'retro_vc_update_shortcode_tabs', 1000, 2);
function retro_vc_update_shortcode_tabs( $classes, $atts ){
	if ( 'retro' === $atts['style'] || 'retro-white' === $atts['style'] || 'retro-grey' === $atts['style'] ) {
		foreach ( $classes as $key => $value ) {
			if ( preg_match( '/^vc_tta-(shape|spacing|tabs-position|controls-align)/i', $value ) ) {
				unset( $classes[ $key ] );
			}
		}
	}
	return $classes;
}

include_once 'vcshortcode.php';
include_once 'vcwidgetshortcode.php';

?>
