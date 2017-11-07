<?php
global $is_opera;
?>
<?php
global $post, $post_layout;
if ( ! is_404() && ! is_search() ) {
	$pid = get_the_ID();
} else {
	$pid = null;
}
if ( is_home() && get_option( 'page_for_posts' ) ) {
	$pid = get_option( 'page_for_posts' );
}
//
// single post & type
if ( is_single() && ($post->post_type == 'post' || $post->post_type == 'product') ) {
	$post_layout = (get_post_meta( $pid, SHORTNAME . '_post_layout', true )) ? get_post_meta( $pid, SHORTNAME . '_post_layout', true ) : 'layout_' . get_option( SHORTNAME . '_product_layout' ) . '_sidebar';
} elseif ( is_single() && $post->post_type == Custom_Posts_Type_Portfolio::POST_TYPE ) {
	$post_layout = (get_post_meta( $pid, SHORTNAME . '_post_layout', true )) ? get_post_meta( $pid, SHORTNAME . '_post_layout', true ) : 'layout_' . get_option( SHORTNAME . '_gallery_layout' ) . '_sidebar';
} elseif ( is_single() && $post->post_type == Custom_Posts_Type_Testimonial::POST_TYPE ) {
	$post_layout = (get_post_meta( $pid, SHORTNAME . '_post_layout', true )) ? get_post_meta( $pid, SHORTNAME . '_post_layout', true ) : 'layout_' . get_option( SHORTNAME . '_testimonial_layout' ) . '_sidebar';
} // taxonomy
elseif ( is_category() || is_tag() ) {
	global $wp_query;
	$term = $wp_query->get_queried_object();
	$post_layout = (get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true )) ? get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true ) : 'layout_' . get_option( SHORTNAME . '_post_listing_layout' ) . '_sidebar';
} elseif ( is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
	global $wp_query;
	$term = $wp_query->get_queried_object();
	if ( get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true ) ) {
		$post_layout = get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true );
	} else {
		$pid = wc_get_page_id( 'shop' );
		if ( get_option( SHORTNAME . '_products_listing_layout' ) ) {
			$post_layout = 'layout_' . get_option( SHORTNAME . '_products_listing_layout' ) . '_sidebar';
		} elseif ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-leftsidebar.php' ) {
			$post_layout = 'layout_left_sidebar';
		} elseif ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-rightsidebar.php' ) {
			$post_layout = 'layout_right_sidebar';
		} else {
			$post_layout = 'layout_none_sidebar';
		}
	}
} elseif ( is_tax( Custom_Posts_Type_Portfolio::TAXONOMY ) ) {
	global $wp_query;
	$term = $wp_query->get_queried_object();
	$post_layout = (get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true )) ? get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true ) : 'layout_' . get_option( SHORTNAME . '_galleries_listing_layout' ) . '_sidebar';
} elseif ( is_tax( Custom_Posts_Type_Testimonial::TAXONOMY ) ) {
	global $wp_query;
	$term = $wp_query->get_queried_object();
	$post_layout = (get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true )) ? get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true ) : 'layout_' . get_option( SHORTNAME . '_testimonials_listing_layout' ) . '_sidebar';
} elseif ( is_home() || is_404() || is_search() || is_date() ) {
	$post_layout = 'layout_' . get_option( SHORTNAME . '_post_listing_layout' ) . '_sidebar';
} // page
elseif ( is_page() ) {
	if ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-leftsidebar.php' ) {
		$post_layout = 'layout_left_sidebar';
	} elseif ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-rightsidebar.php' ) {
		$post_layout = 'layout_right_sidebar';
	} else {
		$post_layout = 'layout_none_sidebar';
	}
} elseif ( is_post_type_archive( 'product' ) ) {
	if ( is_shop() ) {
		$pid = wc_get_page_id( 'shop' );
		if ( get_option( SHORTNAME . '_products_listing_layout' ) ) {
			$post_layout = 'layout_' . get_option( SHORTNAME . '_products_listing_layout' ) . '_sidebar';
		} elseif ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-leftsidebar.php' ) {
			$post_layout = 'layout_left_sidebar';
		} elseif ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-rightsidebar.php' ) {
			$post_layout = 'layout_right_sidebar';
		} else {
			$post_layout = 'layout_none_sidebar';
		}
	} else {
		if ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-leftsidebar.php' ) {
			$post_layout = 'layout_left_sidebar';
		} elseif ( get_post_meta( $pid, '_wp_page_template', true ) == 'template-rightsidebar.php' ) {
			$post_layout = 'layout_right_sidebar';
		} else {
			$post_layout = 'layout_none_sidebar';
		}
	}
} else {
	$post_layout = 'layout_none_sidebar';
}

/**
 * slideshow...
 */
if ( ! is_404() && ! is_search() /* && !is_archive() */ ) {

	global $wp_query;
	$current_term = $wp_query->get_queried_object();

	if ( (is_tax() || is_tag() || is_category()) && $current_term && get_tax_meta( $current_term->term_id, SHORTNAME . '_tax_slider', true ) && (get_tax_meta( $current_term->term_id, SHORTNAME . '_tax_slider', true ) !== 'Disable') ) {
		$slideshow = 'ox_slideshow';
	} // post page
	elseif ( ! is_archive() && get_post_meta( $pid, SHORTNAME . '_post_slider', true ) && (get_post_meta( $pid, SHORTNAME . '_post_slider', true ) !== 'Disable') ) {
		$slideshow = get_post_meta( $pid, SHORTNAME . '_post_slider', true );
	} elseif ( $current_term && (isset( $current_term->term_id ) && get_tax_meta( $current_term->term_id, SHORTNAME . '_tax_slider', true ) == 'Disable') || ($pid && get_post_meta( $pid, SHORTNAME . '_post_slider', true ) == 'Disable') ) {
		$slideshow = '';
	} // global slideshow settings
	else {
		$slideshow = (get_option( SHORTNAME . '_global_slider' ) !== 'Disable') ? 'ox_slideshow' : '';
	}
} else {
	$slideshow = '';
}

$logo_position = get_option( SHORTNAME . '_logo_position' );
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js  lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js  lt-ie10 lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js  lt-ie10 lt-ie9 ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10 ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
		$font_family = '';

		if ( ! get_option( SHORTNAME . '_gfontdisable' ) ) {
			?>
			<link href='//fonts.googleapis.com/css?family=<?php
			$gfont = array();

			$gfont[] = get_option( SHORTNAME . '_gfont' );
			$gfont[] = get_option( SHORTNAME . '_logo_font' );

			echo Admin_Theme_Element_Select_Gfont::font_queue( $gfont );
			?>' rel='stylesheet' type='text/css'>
<?php } ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">



		<meta name="author" content="<?php echo home_url(); ?>">
		<title>
			<?php
			if ( ! defined( 'WPSEO_VERSION' ) ) {
				// if there is no WordPress SEO plugin activated
				wp_title( ' | ', true, 'right' );
				?>
				<?php bloginfo( 'name' ); ?> | <?php
				bloginfo( 'description' ); // or some WordPress default
			} else {
				// WordPress SEO plugin active
				wp_title();
			}
			?>
		</title>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> <?php _e( 'Feed', 'retro' ) ?>" href="<?php bloginfo( 'rss2_url' ); ?>">

		<script> var THEME_URI = '<?php echo get_template_directory_uri(); ?>';</script>
		<?php
		if ( is_singular() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_head();
		?>
		<?php
		if ( in_array( 'woocommerce-new-product-badge/new-badge.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			?>
			<style  type="text/css" media="screen">
				.wc-new-badge {
					background-color:<?php echo get_option( 'wc_nb_newness_background' ); ?>;
					color:<?php echo get_option( 'wc_nb_newness_color' ); ?>
				}
			</style>
		<?php } ?>
		<?php
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

			global $post_layout, $shop_catalog_image, $woo_ratio, $responsive_ratio_1024, $responsive_ratio_768, $responsive_ratio_480;
			$item_width = (isset( $shop_catalog_image['width'] ) ? $shop_catalog_image['width'] : '226');
			?>
			<style  type="text/css" media="screen">
				.woocommerce span.onsale, .woocommerce-page span.onsale {
					background-color:<?php echo get_option( 'woo_sale_label_background' ); ?>;
					color:<?php echo get_option( 'woo_sale_label_color' ); ?>
				}
				.retro_product {width:<?php echo ($post_layout == 'layout_none_sidebar') ? (($item_width + 16 < 1050) ? $item_width + 16 : 1050) : ((round( $item_width * $woo_ratio ) + 16 < 690) ? round( $item_width * $woo_ratio ) + 16 : 690); ?>px}
				@media only screen and (min-width: 1024px) and (max-width: 1230px) {
					.retro_product {width:<?php echo ($post_layout == 'layout_none_sidebar') ? (($item_width * $responsive_ratio_1024 + 16 < 900) ? $item_width * $responsive_ratio_1024 + 16 : 900) : ((round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 < 590) ? round( $item_width * $responsive_ratio_1024 * $woo_ratio ) + 16 : 590); ?>px}
				}
				@media only screen and (min-width: 768px) and (max-width: 1023px) {
					.retro_product {width:<?php echo ($item_width * $responsive_ratio_768 + 16 < 648 ) ? $item_width * $responsive_ratio_768 + 16 : 648; ?>px}  
				}
				@media only screen and (min-width: 480px) and (max-width: 767px) {
					.retro_product {width:<?php echo ($item_width * $responsive_ratio_480 + 16 < 456) ? $item_width * $responsive_ratio_480 + 16 : 456; ?>px}   
				}
				@media only screen and (max-width: 479px) {
					.retro_product {width:<?php echo ($item_width + 16 < 280) ? $item_width + 16 : 280; ?>px}   
				}               
			</style>
<?php } ?>
	</head>
	<body <?php body_class( $post_layout . ' ' . $slideshow /* . ' ' . $widget_title */ ); ?>>
	<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
		<div style="overflow:hidden"><div class="container <?php echo $logo_position ?>">
				<div class="container-shdow">
					<div class="container-top-tail clearfix">
						<div class="fleft">
							<div class="entry-content">
								<?php
								if ( $header_logo_tinymce = get_option( SHORTNAME . '_header_logo_tinymce' ) ) :
									echo ox_the_content( $header_logo_tinymce );
								endif;
								?>
							</div>
						</div>
						<div class="fright">
							<div class="entry-content">
								<?php
								$wishlist_plug_name = defined( 'TINVWL_LOAD_PREMIUM' ) ? TINVWL_LOAD_PREMIUM : ( defined( 'TINVWL_LOAD_FREE' ) ? TINVWL_LOAD_FREE : false );
								$wishlist_plug = $wishlist_plug_name ? in_array( $wishlist_plug_name, apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) : false;
								$woocommerce_plug = in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
								
								if ( ( ( $woocommerce_plug && get_option( SHORTNAME . '_my_account' ) && get_option( SHORTNAME . '_shopping_cart' ) ) || ! $woocommerce_plug ) && ( ( $wishlist_plug && get_option( SHORTNAME . '_wishlist' ) ) || ! $wishlist_plug ) ) {
									if ( $header_custom_content = get_option( SHORTNAME . '_header_custom_content' ) ) :
										echo ox_the_content( $header_custom_content );
									endif;
								}

								if ( $woocommerce_plug && ! get_option( SHORTNAME . '_my_account' ) ) {
									if ( is_user_logged_in() ) {
										?>
										<a class="top_account" href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="<?php _e( 'My Account', 'retro' ); ?>"><?php _e( 'My Account', 'retro' ); ?></a>
										<?php
									} else {
										?>
										<a class="top_account" href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="<?php _e( 'Login / Register', 'retro' ); ?>"><?php _e( 'Login / Register', 'retro' ); ?></a>
										<?php
									}
								}

								if ( $wishlist_plug && ! get_option( SHORTNAME . '_wishlist' )  ) {
									if ( tinv_url_wishlist_default() && ( is_user_logged_in() || false !== tinv_get_option( 'general', 'guests' ) ) ) {
										?><div class="topline_wishlist"><a class="top_account" href="<?php echo esc_url( tinv_url_wishlist_default() ); ?>" title="<?php _e( 'Wishlist', 'tinvwl' ); ?>"><img src="<?php echo esc_url( get_option( SHORTNAME . '_wishlist_icon' ) ? get_option( SHORTNAME . '_wishlist_icon' ) : get_template_directory_uri() . '/images/icon_heart_plus.png' ); ?>" width="15"><?php _e( 'Wishlist', 'tinvwl' ); ?></a></div><?php
									}
								}

								if ( $woocommerce_plug && ! get_option( SHORTNAME . '_shopping_cart' ) ) {
									?>  

	<?php global $woocommerce; ?>
									<div class="top_cart">
										<span class="top_cart_text"><?php echo sprintf( __( 'Bag - %1$d', 'retro' ), $woocommerce->cart->cart_contents_count ); ?></span>
										<div class="topline_shopping_cart widget_shopping_cart" style="display:none; z-index: 1000; opacity: 0;">
											<div class="widget_shopping_cart_content">
	<?php woocommerce_mini_cart(); ?>
											</div>
										</div>
									</div>

									<?php
								}
								?>
							</div>
						</div>
						<div style="width:100%; clear:both;"></div>
					</div>


					<header class="header">
						<div class="nav-block-ribbon"><div class="nav-block">

								<div class="nav-block-indent">
									<div class="clearfix">
										<div class="logo">
											<?php 
											if ( is_front_page() ) {
												?><h1><?php } ?>
												<?php
												if ( get_option( SHORTNAME . '_logo_txt' ) ) {
													if ( get_bloginfo( 'name' ) ) {
														?><a href="<?php echo (get_option( SHORTNAME . '_preview' )) ? '/' : wpml_get_home_url(); ?>"><div class="logo-text-wrap"><div class="logo-text"><div class="logo-text-align"><?php echo ($is_opera) ? strtoupper( get_bloginfo( 'name', 'display' ) ) : bloginfo( 'name' ); ?></div></div></div></a><?php
													}
												} elseif ( get_skin_option( SHORTNAME . '_logo_custom' ) ) {
													$data_retina = '';
													?>
													<a href="<?php echo (get_option( SHORTNAME . '_preview' )) ? '/' : wpml_get_home_url(); ?>"><img src="<?php echo get_skin_option( SHORTNAME . '_logo_custom' ); ?>" alt="<?php bloginfo( 'name' ); ?>"<?php echo $data_retina; ?>><span class="hidden"><?php bloginfo( 'name' ); ?></span></a>
													<?php
												}
												if ( is_front_page() ) {
													?></h1><?php } ?>
										</div>
										<div class="header-menu-container">
											<div class="device-menu main_menu_mobile">
												<div class="navigation-title" id="menu-icon">
													<div class="icon"><span></span><span></span><span></span></div><a href="#"><?php _e( 'Navigation', 'retro' ); ?></a>                                              
												</div>
												<div class="sf-menu">
													<ul id="menu-main-1" class="sub-menu mobile-menu">
														<?php wp_nav_menu( array( 'theme_location' => 'header-menu-left', 'container_class' => 'main_menu main_menu_left', 'menu_class' => 'sf-menu', 'fallback_cb' => '', 'container' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '%3$s', 'walker' => new Walker_Nav_Menu_Sub() ) ); ?>
<?php wp_nav_menu( array( 'theme_location' => 'header-menu-right', 'container_class' => 'main_menu main_menu_right', 'menu_class' => 'sf-menu', 'fallback_cb' => '', 'container' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '%3$s', 'walker' => new Walker_Nav_Menu_Sub() ) ); ?>
													</ul>
												</div>
												<!--<div class="sf-menu">
													<ul class="sub-menu">
														
													</ul>
												</div>-->
											</div>

												<?php if ( $logo_position != 'left' ) : ?>
												<div class="left-menu-container menu-container">
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu-left', 'container_class' => 'main_menu main_menu_left', 'menu_class' => 'sf-menu', 'fallback_cb' => '', 'container' => 'nav', 'link_before' => '', 'link_after' => '', 'walker' => new Walker_Nav_Menu_Sub() ) ); ?>
													<div class="menu-fix-bg"></div>
												</div>
											<?php endif; ?>
												<?php if ( $logo_position != 'right' ) : ?>
												<div class="right-menu-container menu-container">
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu-right', 'container_class' => 'main_menu main_menu_right', 'menu_class' => 'sf-menu', 'fallback_cb' => '', 'container' => 'nav', 'link_before' => '', 'link_after' => '', 'walker' => new Walker_Nav_Menu_Sub() ) ); ?>
													<div class="menu-fix-bg"></div>
												</div>
<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</header>
					<div class="main-bg">
						<section id="color_header" class="clearfix">
							<?php
							// echo ($sliderAlias != '') ? '<div class="rev_slider_custom">'. do_shortcode("[rev_slider $sliderAlias]") .'</div>' : '';
							?>
<?php get_template_part( 'title' ); ?>
						</section>
						<div class="main-top"></div>
						<div role="main" class="main main-pattern-line-left"><div class="main-pattern-indent main-pattern-line-right"><div class="main-shadow"></div><div class="main-pattern">
