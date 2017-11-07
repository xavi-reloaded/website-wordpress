<?php

class Import_Theme_Options implements Import_Theme_Item
{

	public function import() {

		update_option( 'rt_sidebar_generator', unserialize( 'a:8:{s:4:"blog";s:4:"blog";s:9:"portfolio";s:9:"portfolio";s:8:"features";s:8:"features";s:10:"shortcodes";s:10:"shortcodes";s:8:"blogpost";s:8:"blogpost";s:4:"left";s:4:"left";s:5:"right";s:5:"right";s:13:"blogshortcode";s:13:"blogshortcode";}' ) );

		update_option( 'tax_meta_2', unserialize( 'a:4:{s:22:"rt_post_listing_layout";s:19:"layout_none_sidebar";s:23:"rt_post_listing_sidebar";s:8:"blogpost";s:13:"rt_tax_slider";s:7:"Disable";s:22:"rt_tax_revslider_alias";s:21:"retro_revslider_dummy";}' ) );
		update_option( 'tax_meta_3', unserialize( 'a:4:{s:22:"rt_post_listing_layout";s:19:"layout_left_sidebar";s:23:"rt_post_listing_sidebar";s:4:"blog";s:13:"rt_tax_slider";s:9:"revSlider";s:22:"rt_tax_revslider_alias";s:21:"retro_revslider_dummy";}' ) );
		update_option( 'tax_meta_4', unserialize( 'a:3:{s:22:"rt_post_listing_layout";s:20:"layout_right_sidebar";s:23:"rt_post_listing_sidebar";s:8:"blogpost";s:22:"rt_tax_revslider_alias";s:21:"retro_revslider_dummy";}' ) );

		update_option( SHORTNAME . '_header_logo_tinymce', '<p style="color:#a18077;">This is additional content area. <a href="#">Learn more</a></p>' );
		update_option( SHORTNAME . '_header_custom_content', '<a href="#">Frequently Asked Questions</a> &nbsp;  •  &nbsp;<a href="http://help.olegnax.com/"> Need Help?</a></p>' );
		update_option( SHORTNAME . '_post_listing_layout', 'right' );
		update_option( SHORTNAME . '_post_listing_sidebar', 'left' );
		update_option( SHORTNAME . '_authorbox', 'on' );
		// slideshow
		// blog
		update_option( SHORTNAME . '_post_layout', 'right' );
		update_option( SHORTNAME . '_post_sidebar', 'blog' );
		update_option( SHORTNAME . '_portfolios_listing_sidebar', 'blog' );
		update_option( SHORTNAME . '_testimonials_listing_sidebar', 'blog' );
		update_option( SHORTNAME . '_testimonial_sidebar', 'blog' );
		update_option(SHORTNAME . '_footer_tinymce ', '[social_link style="dark" type="rss_feed" url="" target="" ]
[social_link style="dark" type="facebook_account" url="http://www.facebook.com/olegnax" target="" ]
[social_link style="dark" type="twitter_account" url="https//twitter.com/olegnax" target="" ]
[social_link style="dark" type="dribble_account" url="http://dribbble.com/olegnax" target="" ]
[social_link style="dark" type="flicker_account" url="#" target="" ]
[social_link style="dark" type="vimeo_account" url="#" target="" ]
[social_link style="dark" type="email_to" url="#" target="" ]
[social_link style="dark" type="youtube_account" url="#" target="" ]
[social_link style="dark" type="pinterest_account" url="#" target="" ]
[social_link style="dark" type="google_plus_account" url="#" target="" ]
[social_link style="dark" type="linked_in_account" url="#" target="" ]');

		update_option( 'show_on_front', 'page' );
		$HOME = get_page_by_title( 'HOME' );
		update_option( 'page_on_front', $HOME->ID );
		$BLOG = get_page_by_title( 'BLOG' );
		update_option( 'page_for_posts', $BLOG->ID );
		// update_option(SHORTNAME . '');
		// update_option(SHORTNAME . '');
		// update_option(SHORTNAME . '');
		// update_option(SHORTNAME . '');
		// update_option(SHORTNAME . '');
	}
}

?>
