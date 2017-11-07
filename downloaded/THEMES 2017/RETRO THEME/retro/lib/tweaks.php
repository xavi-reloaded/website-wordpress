<?php
// CLEANUP
// remove WordPress version from RSS feed
if ( ! function_exists( 'ox_no_generator' ) ) {

	function ox_no_generator() {

		return '';
	}
}
add_filter( 'the_generator', 'ox_no_generator' );

// cleanup wp_head
if ( ! function_exists( 'ox_noindex' ) ) {

	function ox_noindex() {

		if ( get_option( 'blog_public' ) === '0' ) {
			echo '<meta name="robots" content="noindex,nofollow">', "\n";
		}
	}
}

if ( ! function_exists( 'ox_rel_canonical' ) ) {

	function ox_rel_canonical() {

		if ( ! is_singular() ) {
			return;
		}

		global $wp_the_query;
		if ( ! $id = $wp_the_query->get_queried_object_id() ) {
			return;
		}

		$link = get_permalink( $id );
		echo "\t<link rel=\"canonical\" href=\"$link\">\n";
	}
}

// remove CSS from recent comments widget
if ( ! function_exists( 'ox_remove_recent_comments_style' ) ) {

	function ox_remove_recent_comments_style() {

		global $wp_widget_factory;
		if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
			remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
		}
	}
}

// remove CSS from portfolio
if ( ! function_exists( 'ox_portfolio_style' ) ) {

	function ox_portfolio_style( $css ) {
		return preg_replace( "/<style type='text\/css'>(.*?)<\/style>/s", '', $css );
	}
}

if ( ! function_exists( 'ox_head_cleanup' ) ) {

	function ox_head_cleanup() {

		// http://wpengineer.com/1438/wordpress-header/
		remove_action( 'wp_head', 'feed_links', 2 );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
		remove_action( 'wp_head', 'noindex', 1 );

		add_action( 'wp_head', 'ox_noindex' );
		remove_action( 'wp_head', 'rel_canonical' );
		add_action( 'wp_head', 'ox_rel_canonical' );
		add_action( 'wp_head', 'ox_remove_recent_comments_style', 1 );
		add_filter( 'portfolio_style', 'ox_portfolio_style' );
	}
}

add_action( 'init', 'ox_head_cleanup' );

//
// OTHER TWEAKS
//
// we don't need to self-close these tags in html5:
// <img>, <input>
if ( ! function_exists( 'ox_remove_self_closing_tags' ) ) {

	function ox_remove_self_closing_tags( $input ) {
		return str_replace( ' />', '>', $input );
	}
}
add_filter( 'get_avatar', 'ox_remove_self_closing_tags' );
add_filter( 'comment_id_fields', 'ox_remove_self_closing_tags' );

// set the post revisions to 5 unless the constant
// was set in wp-config.php to avoid DB bloat
if ( ! defined( 'WP_POST_REVISIONS' ) ) {
	define( 'WP_POST_REVISIONS', 5 ); }

// allow more tags in TinyMCE including iframes
if ( ! function_exists( 'ox_change_mce_options' ) ) {

	function ox_change_mce_options( $options ) {
		$ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
		if ( isset( $initArray['extended_valid_elements'] ) ) {
			$options['extended_valid_elements'] .= ',' . $ext;
		} else {
			$options['extended_valid_elements'] = $ext;
		}
		return $options;
	}
}
add_filter( 'tiny_mce_before_init', 'ox_change_mce_options' );

// clean up the default WordPress style tags
if ( ! function_exists( 'ox_clean_style_tag' ) ) {

	function ox_clean_style_tag( $input ) {
		preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );
		// only display media if it's print
		$media = $matches[3][0] === 'print' ? ' media="print"' : '';
		return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
	}
}
add_filter( 'style_loader_tag', 'ox_clean_style_tag' );

// lightbox replace
if ( ! function_exists( 'ox_addlightboxrel_replace' ) ) {

	function ox_addlightboxrel_replace( $content ) {
		global $post;
		if ( ! empty( $post ) ) {
			$pattern = "/(<a\s*(?!.*\bdata-pp=)[^>]*) ?(href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")) ?(class=('|\")(.*?)('|\"))?/i";
			$replacement = '$1 href=$3$4.$5$6 data-pp="lightbox[' . $post->ID . ']" class="autolink lightbox $9" ';
			$content = preg_replace( $pattern, $replacement, $content );
		}
		return $content;
	}
}
add_filter( 'the_content', 'ox_addlightboxrel_replace', 11 );
add_filter( 'get_comment_text', 'ox_addlightboxrel_replace' );
add_filter( 'prepend_attachment', 'ox_addlightboxrel_replace' );

// SEO meta
if ( ! function_exists( 'ox_add_theme_favicon' ) ) {

	function ox_add_theme_favicon() {

		if ( get_option( SHORTNAME . '_favicon' ) ) :
			?>
			<link rel="shortcut icon" href="<?php echo get_option( SHORTNAME . '_favicon' ); ?>" /><?php
		endif;
	}
}
add_action( 'wp_head', 'ox_add_theme_favicon' );

if ( ! function_exists( 'ox_default_comments_off' ) ) {

	function ox_default_comments_off( $data ) {
		// each custom post type has default_comments_off method to.
		if ( ($data['post_type'] == 'page' || $data['post_type'] == 'ox_portfolio' || $data['post_type'] == 'ox_testimonials' || $data['post_type'] == 'ox_slideshows') && $data['post_status'] == 'auto-draft' ) {
			$data['comment_status'] = 0;
			$data['ping_status'] = 0;
		}

		return $data;
	}
}
add_filter( 'wp_insert_post_data', 'ox_default_comments_off' );


if ( ! function_exists( 'ox_imgborder_from_editor' ) ) {

	function ox_imgborder_from_editor( $class ) {
		$class = $class . ' imgborder';
		return $class;
	}
}
add_filter( 'get_image_tag_class', 'ox_imgborder_from_editor' );


if ( ! function_exists( 'ox_default_widgets_init' ) ) {

	function ox_default_widgets_init() {

		if ( isset( $_GET['activated'] ) ) {
			update_option('sidebars_widgets', array(
				'default-sidebar' => array( 'search' ),
			));
		}
	}
}
add_action( 'widgets_init', 'ox_default_widgets_init' );



// CUSTOMIZE ADMIN MENU ORDER
if ( ! function_exists( 'ox_custom_menu_order' ) ) {

	function ox_custom_menu_order( $menu_ord ) {
		if ( ! $menu_ord ) {
			return true;
		}

		return array(
			'index.php',
			'separator1',
			'edit.php',
			'edit.php?post_type=page',
			'edit.php?post_type=' . Custom_Posts_Type_Portfolio::POST_TYPE,
			'revslider',
			'edit.php?post_type=' . Custom_Posts_Type_Testimonial::POST_TYPE,
			'separator2',
			SHORTNAME . '_general',
			'separator-last',
		);
	}
}
add_filter( 'custom_menu_order', 'ox_custom_menu_order' );
add_filter( 'menu_order', 'ox_custom_menu_order' );

// CUSTOM USER PROFILE FIELDS
if ( ! function_exists( 'ox_custom_userfields' ) ) {

	function ox_custom_userfields( $contactmethods ) {
		// ADD CONTACT CUSTOM FIELDS
		$contactmethods['conatct_twitter'] = 'Twitter';
		$contactmethods['conatct_facebook'] = 'Facebook';
		$contactmethods['conatct_gplus'] = 'Gplus';
		$contactmethods['contact_phone_office'] = 'Office Phone';
		$contactmethods['contact_phone_mobile'] = 'Mobile Phone';
		$contactmethods['contact_office_fax'] = 'Office Fax';

		// ADD ADDRESS CUSTOM FIELDS
		$contactmethods['address_line_1'] = 'Address Line 1';
		$contactmethods['address_line_2'] = 'Address Line 2 (optional)';
		$contactmethods['address_city'] = 'City';
		$contactmethods['address_state'] = 'State';
		$contactmethods['address_zipcode'] = 'Zipcode';
		return $contactmethods;
	}
}
add_filter( 'user_contactmethods', 'ox_custom_userfields', 10, 1 );


// Remove read more page jump
if ( ! function_exists( 'ox_remove_more_jump_link' ) ) {

	function ox_remove_more_jump_link( $link ) {
		$offset = strpos( $link, '#more-' );
		if ( $offset ) {
			$end = strpos( $link, '"', $offset );
		}
		if ( $end ) {
			$link = substr_replace( $link, '', $offset, $end - $offset );
		}
		return $link;
	}
}

add_filter( 'the_content_more_link', 'ox_remove_more_jump_link' );

// remove pings to self
if ( ! function_exists( 'ox_no_self_ping' ) ) {

	function ox_no_self_ping( &$links ) {
		$home = home_url();
		foreach ( $links as $l => $link ) {
			if ( 0 === strpos( $link, $home ) ) {
				unset( $links[ $l ] ); }
		}
	}
}
add_action( 'pre_ping', 'ox_no_self_ping' );

// customize admin footer text
if ( ! function_exists( 'ox_custom_admin_footer' ) ) {

	function ox_custom_admin_footer() {

		echo 'Copyrighted by ' . get_option( 'blogname' ) . '. | Developed by <a href="http://olegnax.com" title="WordPress Premium Themes" >Olegnax</a>.';
	}

	add_filter( 'admin_footer_text', 'ox_custom_admin_footer' );
}

if ( ! function_exists( 'ox_new_excerpt_more' ) ) {

	function ox_new_excerpt_more( $more ) {
		return '...';
	}
}
add_filter( 'excerpt_more', 'ox_new_excerpt_more' );

// excerpt length
if ( ! function_exists( 'excerpt' ) ) {

	function excerpt( $num ) {
		$limit = $num + 1;
		$original_excerpt = get_the_excerpt();

		$cleaned = $text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $original_excerpt );
		$excerpt = mb_substr( $cleaned, 0, $limit );

		if ( mb_strlen( $original_excerpt ) > mb_strlen( $excerpt ) ) {
			$excerpt .= '...'; }

		echo $excerpt;
	}
}


// Searchbox placeholder
if ( ! function_exists( 'ox_search_form' ) ) {

	function ox_search_form( $form ) {
		return '<form role="search" method="get" id="searchform" action="' . esc_url( home_url() ) . '">
                    <div>
						<label class="screen-reader-text" for="s">' . __( 'Search for:', 'retro' ) . '</label>
						<input type="text" value="' . ( is_search() ? get_search_query() : '' ) . '" name="s" id="s" placeholder="' . __( 'To search type and hit enter', 'retro' ) . '">
						<input type="submit" id="searchsubmit" value="' . __( 'Search', 'retro' ) . '">
                    </div>
				</form>';
	}
}
add_filter( 'get_search_form', 'ox_search_form', 99999 );

if ( ! function_exists( 'ox_the_content' ) ) {

	function ox_the_content( $content ) {
		add_filter( 'ox_the_content', 'capital_P_dangit', 11 );
		add_filter( 'ox_the_content', 'do_shortcode', 11 );
		add_filter( 'ox_the_content', 'wptexturize', 10 );
		add_filter( 'ox_the_content', 'convert_smilies', 10 );
		add_filter( 'ox_the_content', 'convert_chars', 10 );
		add_filter( 'ox_the_content', 'wpautop', 10 );
		add_filter( 'ox_the_content', 'shortcode_unautop', 10 );
		// add_filter('ox_the_content', 'prepend_attachment', 10);
		add_filter( 'ox_the_content', 'ox_cleanup_shortcodes', 10 );
		add_filter( 'ox_the_content', 'my_replaceblankparas', 10 );
		add_filter( 'ox_the_content', 'ox_addlightboxrel_replace', 12 );

		$content = apply_filters( 'ox_the_content', $content );
		$content = str_replace( ']]>', ']]&gt;', $content );

		return $content;
	}
}

function print_filters_for( $hook = '' ) {
	global $wp_filter;
	if ( empty( $hook ) || ! isset( $wp_filter[ $hook ] ) ) {
		return; }

	print '<pre>';
	print_r( $wp_filter[ $hook ] );
	print '</pre>';
}

if ( ! function_exists( 'get_skin_option' ) ) {

	function get_skin_option( $option, $skip_default_suffix = true ) {
		$skin = getRetroSkin();

		if ( $skin == Admin_Theme_Menu_SkinGroup::NAME && $skip_default_suffix ) {
			return get_option( $option );
		} else {
			return get_option( $option . '_' . $skin );
		}

		return null;
	}
}

// Remove protocols from URLs
if ( ! function_exists( 'remove_protocol_for_img_options' ) ) {

	function remove_protocol_for_img_options( $name = '', $default = false ) {

		if ( empty( $name ) ) {
			$name = preg_replace( '/pre_option_/', '', current_filter() ); }

		remove_filter( 'pre_option_' . $name, 'remove_protocol_for_img_options' );

		$value = str_replace( array( 'http://', 'https://' ), '//', get_option( $name ) );

		add_filter( 'pre_option_' . $name, 'remove_protocol_for_img_options' );

		if ( $value ) {
			return $value; }

		return $default;
	}

	$img_options = array( SHORTNAME . '_logo_custom', SHORTNAME . '_logo_footer_custom', SHORTNAME . '_favicon', SHORTNAME . '_logo_custom_skin1', SHORTNAME . '_logo_footer_custom_skin1', SHORTNAME . '_logo_custom_skin2', SHORTNAME . '_logo_footer_custom_skin2', SHORTNAME . '_logo_custom_skin3', SHORTNAME . '_logo_footer_custom_skin3', SHORTNAME . '_logo_custom_skin4', SHORTNAME . '_logo_footer_custom_skin4' );

	foreach ( $img_options as $option ) {
		add_filter( 'pre_option_' . $option, 'remove_protocol_for_img_options', 10, 2 );
	}
}


if ( ! function_exists( 'check_protocol_for_thumbnail_urls' ) ) {

	function check_protocol_for_thumbnail_urls( $url ) {
		if ( is_ssl() ) {
			$url = str_replace( 'http://', 'https://', $url );
		}
		return $url;
	}

	add_filter( 'wp_get_attachment_url', 'check_protocol_for_thumbnail_urls', 10, 2 );
}



// feed images protocol fix
if ( ! function_exists( 'feed_images_protocol_fix' ) ) {

	function feed_images_protocol_fix( $content ) {
		if ( is_feed() ) {
			$regex = "/(<img.+?src=[\"'])(\/\/)(.*?>)/";

			$replace = '$1http://$3';

			$output = preg_replace( $regex, $replace, $content );
			return $output;
		}
		return $content;
	}
}

add_filter( 'the_content', 'feed_images_protocol_fix' );



if ( ! function_exists( 'ajax_captcha_check' ) ) {

	function ajax_captcha_check() {

		require_once get_template_directory() . '/lib/recaptchalib.php';
		$resp = recaptcha_check_answer(
		get_option( SHORTNAME . '_captcha_private_key' ), $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);

		header( 'Content-Type: application/json' );
		die( json_encode( $resp ) );
	}
}
add_action( 'wp_ajax_captcha_check', 'ajax_captcha_check' );
add_action( 'wp_ajax_nopriv_captcha_check', 'ajax_captcha_check' );

if ( ! function_exists( 'ox_recaptcha_get_html' ) ) {

	function ox_recaptcha_get_html( $error = null ) {
		if ( get_option( SHORTNAME . '_captcha_private_key' ) ) {
			if ( $publickey = get_option( SHORTNAME . '_captcha_public_key' ) ) {
				require_once get_template_directory() . '/lib/recaptchalib.php';
				return recaptcha_get_html( $publickey, $error, is_ssl() );
			}
		}
		return '';
	}
}

if ( ! function_exists( 'ox_ajax_send_contact_form' ) ) {

	function ox_ajax_send_contact_form() {

		require_once get_template_directory() . '/lib/shortcode/contactForm/contactsend.php';
		die();
	}
}
add_action( 'wp_ajax_send_contact_form', 'ox_ajax_send_contact_form' );
add_action( 'wp_ajax_nopriv_send_contact_form', 'ox_ajax_send_contact_form' );

if ( ! function_exists( 'ox_revert_email' ) ) {

	function ox_revert_email( $emails ) {
		$pattern = '/(.+)@(.+)/';
		$list = explode( ',', $emails );
		$reverted_list = array();
		foreach ( $list as $email ) {
			preg_match( $pattern, $email, $matches );
			if ( isset( $matches[1] ) && isset( $matches[2] ) ) {
				$reverted_list[] = strrev( $matches[1] ) . '@' . strrev( $matches[2] );
			}
		}

		return implode( ',', $reverted_list );
	}
}

if ( ! function_exists( 'ox_sharrre_box' ) ) {

	function ox_sharrre_box( $echo = false ) {

		$regex = '/(^\/\/)/';

		$replace = 'http://';

		ob_start();
		?>
		<div class="share_box"
			 data-url="<?php the_permalink(); ?>"
			 data-curl="<?php echo get_template_directory_uri() . '/lib/sharrre.php'; ?>"
			 data-title="<?php the_title(); ?>"
			 data-text="<?php the_title(); ?>"
			 data-media="<?php echo preg_replace( $regex, $replace, wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" >
		</div>
		<?php
		$content = ob_get_clean();

		if ( $echo ) {
			echo $content;
		} else {
			return $content;
		}
	}
}

if ( ! function_exists( 'share_button_after_content' ) ) {

	function share_button_after_content( $content ) {
		if ( is_singular() ) {
			if ( get_option( SHORTNAME . Admin_Theme_Item_Share::SHOW ) ) {
				wp_enqueue_script( 'sharrre' );
				$post_type = get_post_type();
				$share_content = '';

				if ( ($post_type == 'post' && get_option( SHORTNAME . Admin_Theme_Item_Share::POST )) ||
						($post_type == 'page' && get_option( SHORTNAME . Admin_Theme_Item_Share::PAGE )) ||
						($post_type == Custom_Posts_Type_Portfolio::POST_TYPE && get_option( SHORTNAME . Admin_Theme_Item_Share::PORTFOLIO )) ||
						($post_type == 'product' && get_option( SHORTNAME . Admin_Theme_Item_Share::PRODUCT ))
				) {
					$style = get_option( SHORTNAME . Admin_Theme_Item_Share::STYLE );

					if ( get_option( SHORTNAME . Admin_Theme_Item_Share::FACEBOOK ) ) {
						$share_content .= ox_social_link( array( 'style' => $style, 'type' => 'facebook_account' ) ); // '<a href="#" class="facebook" title="facebook">f</a>';
					}

					if ( get_option( SHORTNAME . Admin_Theme_Item_Share::TWITTER ) ) {
						$share_content .= ox_social_link( array( 'style' => $style, 'type' => 'twitter_account' ) ); // '<a href="#" class="facebook" title="facebook">f</a>';
					}

					if ( get_option( SHORTNAME . Admin_Theme_Item_Share::GOOGLE ) ) {
						$share_content .= ox_social_link( array( 'style' => $style, 'type' => 'google_plus_account' ) ); // '<a href="#" class="facebook" title="facebook">f</a>';
					}

					if ( get_option( SHORTNAME . Admin_Theme_Item_Share::PINTEREST ) ) {
						$share_content .= ox_social_link( array( 'style' => $style, 'type' => 'pinterest_account' ) ); // '<a href="#" class="facebook" title="facebook">f</a>';
					}

					if ( get_option( SHORTNAME . Admin_Theme_Item_Share::LINKEDIN ) ) {
						$share_content .= ox_social_link( array( 'style' => $style, 'type' => 'linked_in_account' ) ); // '<a href="#" class="facebook" title="facebook">f</a>';
					}

					if ( $share_content ) {
						$share_content = sprintf( '<div class="box"><div class="middle">%s</div></div>', $share_content );
						$title = get_option( SHORTNAME . Admin_Theme_Item_Share::TITLE );
						if ( $title ) {
							$title = sprintf( '<h2 class="share_title">%s</h2>', $title );
						}
						wp_localize_script( 'ox_scripts', 'sharreData', $share_content );
						return $content . '<div class="share_wrap clearfix">' . $title . ox_sharrre_box() . '</div>';
					}
				}
			}
		}
		return $content;
	}
}
add_filter( 'the_content', 'share_button_after_content' );

if ( ! function_exists( 'getRetroSkin' ) ) {

	function getRetroSkin() {

		$id = SHORTNAME . Admin_Theme_Menu_SkinGroup::ACTIVE_SKIN_OPTION;
		if ( get_option( SHORTNAME . '_preview' ) ) {
			if ( isset( $_SESSION[ $id ] ) ) {
				return $_SESSION[ $id ];
			}
		}
		return get_option( $id );
	}
}


if ( ! function_exists( 'remove_filters_for_anonymous_class' ) ) {

	function remove_filters_for_anonymous_class( $hook_name = '', $class_name = '', $method_name = '', $priority = 0 ) {
		global $wp_filter;

		// Take only filters on right hook name and priority
		if ( ! isset( $wp_filter[ $hook_name ]->callbacks[ $priority ] ) || ! is_array( $wp_filter[ $hook_name ]->callbacks[ $priority ] ) ) {
			return false; }

		// Loop on filters registered
		foreach ( (array) $wp_filter[ $hook_name ]->callbacks[ $priority ] as $unique_id => $filter_array ) {
			// Test if filter is an array ! (always for class/method)
			if ( isset( $filter_array['function'] ) && is_array( $filter_array['function'] ) ) {
				// Test if object is a class, class and method is equal to param !
				if ( is_object( $filter_array['function'][0] ) && get_class( $filter_array['function'][0] ) && get_class( $filter_array['function'][0] ) == $class_name && $filter_array['function'][1] == $method_name ) {
					unset( $wp_filter[ $hook_name ]->callbacks[ $priority ][ $unique_id ] );
				}
			}
		}

		return false;
	}
}






if ( ! function_exists( 'remove_filters_for_anonymous_class' ) ) {

	function remove_filters_for_anonymous_class( $hook_name = '', $class_name = '', $method_name = '', $priority = 0 ) {

		global $wp_filter;

		// Take only filters on right hook name and priority
		if ( ! isset( $wp_filter[ $hook_name ][ $priority ] ) || ! is_array( $wp_filter[ $hook_name ][ $priority ] ) ) {
			return false;
		}

		// Loop on filters registered
		foreach ( (array) $wp_filter[ $hook_name ][ $priority ] as $unique_id => $filter_array ) {
			// Test if filter is an array ! (always for class/method)
			if ( isset( $filter_array['function'] ) && is_array( $filter_array['function'] ) ) {
				// Test if object is a class, class and method is equal to param !
				if ( is_object( $filter_array['function'][0] ) && get_class( $filter_array['function'][0] ) && get_class( $filter_array['function'][0] ) == $class_name && $filter_array['function'][1] == $method_name ) {
					unset( $wp_filter[ $hook_name ][ $priority ][ $unique_id ] );
				}
			}
		}

		return false;
	}
}

// Updater notice
if ( ( ! get_option( SHORTNAME . '_envato_nick' ) || ! get_option( SHORTNAME . '_envato_api' ) ) && ! get_option( 'theme-updater-notice-dismissed' ) ) {
	add_action( 'admin_notices', 'theme_updater_notice' );
}

function theme_updater_notice() {
	?>
	<div class="notice updated theme-updater-notice is-dismissible" >
		<p><?php printf( __( 'If you want to receive the notice when the new theme update is available please, put your Marketplace Username and Secret API key here: <a href="%s" >link</a>', 'retro' ), admin_url( 'admin.php?page=' . SHORTNAME . '_update' ) ); ?></p>
	</div>


	<?php
}

function theme_updater_check() {
	?>
	<div class="notice error" >
		<p><?php printf( __( 'Theme update Check FAILED! Wrong Marketplace Username and Secret API key here: <a href="%s" >link</a>', 'retro' ), admin_url( 'admin.php?page=' . SHORTNAME . '_update' ) ); ?></p>
	</div>


	<?php
}


add_action( 'admin_enqueue_scripts', 'theme_updater_notice_ajax' );

function theme_updater_notice_ajax() {
	wp_enqueue_script( 'theme-updater-notice-ajax', get_template_directory_uri() . '/backend/js/updater-notice.js', array( 'jquery' ), null );
}

function theme_updater_notice_dismiss() {

	add_option( 'theme-updater-notice-dismissed', 1 );
}

add_action( 'wp_ajax_theme_updater_notice_dismiss', 'theme_updater_notice_dismiss' );
