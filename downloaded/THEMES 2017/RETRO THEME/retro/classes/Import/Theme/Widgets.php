<?php

class Import_Theme_Widgets implements Import_Theme_Item
{

	public function import() {

		$sidebars = get_option( 'sidebars_widgets' );
		$sidebars['default-sidebar'] = array();
		$sidebars['footer-1'] = array( 'retro-recent-posts-2' );
		$sidebars['footer-2'] = array( 'retro-twitter-2' );
		$sidebars['footer-3'] = array( 'retro-contactform-2' );
		$sidebars['footer-4'] = array();
		$sidebars['ox_sidebar-1'] = array( 'search-9', 'retro-popular-posts-3', 'retro-recent-posts-3', 'tag_cloud-7' );
		$sidebars['ox_sidebar-2'] = array( 'retro-popular-posts-2', 'retro-portfolio-2', 'retro-twitter-3' );
		$sidebars['ox_sidebar-3'] = array( 'nav_menu-3', 'retro-testimonials-4' );
		$sidebars['ox_sidebar-4'] = array( 'nav_menu-4' );
		$sidebars['ox_sidebar-5'] = array( 'retro-feedburner-2', 'retro-recent-posts-4', 'text-3' );
		$sidebars['ox_sidebar-6'] = array( 'search-8', 'retro-portfolio-4', 'retro-testimonials-5', 'recent-comments-2', 'retro-twitter-4', 'retro-contactform-3', 'tag_cloud-5' );
		$sidebars['ox_sidebar-7'] = array( 'retro-feedburner-3', 'text-4', 'text-6', 'text-5', 'retro-popular-posts-5', 'retro-recent-posts-6', 'retro-popular-posts-4', 'retro-recent-posts-5' );
		$sidebars['ox_sidebar-8'] = array( 'search-2', 'retro-portfolio-3', 'categories-2', 'retro-testimonials-3' );
		update_option( 'sidebars_widgets', $sidebars );

		// Widget Retro recent posts
		$retro_recent_posts = get_option( 'widget_retro-recent-posts' );
		$retro_recent_posts[2] = array( 'title' => 'RECENT POSTS', 'number' => '2', 'show_image' => '' );
		$retro_recent_posts[3] = array( 'title' => 'RECENT POSTS', 'number' => '2', 'show_image' => '' );
		$retro_recent_posts[4] = array( 'title' => 'RECENT POSTS', 'number' => '3', 'show_image' => '' );
		$retro_recent_posts[5] = array( 'title' => 'RECENT POSTS', 'number' => '2', 'show_image' => '' );
		$retro_recent_posts[6] = array( 'title' => 'RECENT WITH IMAGE', 'number' => '2', 'show_image' => 'on' );
		$retro_recent_posts['_multiwidget'] = 1;
		update_option( 'widget_retro-recent-posts', $retro_recent_posts );

		// Widget Retro twitter
		$retro_twitter = get_option( 'widget_retro-twitter' );
		$retro_twitter[2] = array( 'title' => 'TWITTER', 'username' => 'olegnax', 'num' => '3', 'update' => 'on', 'linked' => '', 'hyperlinks' => 'on', 'twitter_users' => 'on', 'encode_utf8' => 'on', 'target_blank' => '' );
		$retro_twitter[3] = array( 'title' => 'TWITTER', 'username' => 'olegnax', 'num' => '2', 'update' => 'on', 'linked' => '', 'hyperlinks' => 'on', 'twitter_users' => 'on', 'encode_utf8' => 'on', 'target_blank' => '' );
		$retro_twitter[4] = array( 'title' => 'TWITTER', 'username' => 'olegnax', 'num' => '3', 'update' => 'on', 'linked' => '', 'hyperlinks' => 'on', 'twitter_users' => 'on', 'encode_utf8' => 'on', 'target_blank' => '' );
		$retro_twitter['_multiwidget'] = 1;
		update_option( 'widget_retro-twitter', $retro_twitter );

		// Widget Retro contactform
		$retro_contactform = get_option( 'widget_retro-contactform' );
		$retro_contactform[2] = array( 'title' => 'GET IN TOUCH', 'recipient' => '' );
		$retro_contactform[3] = array( 'title' => 'FEEDBACK FORM', 'recipient' => '' );
		$retro_contactform['_multiwidget'] = 1;
		update_option( 'widget_retro-contactform', $retro_contactform );

		// Widget Search
		$search = get_option( 'widget_search' );
		$search[2] = array( 'title' => '' );
		$search[7] = array( 'title' => '' );
		$search[8] = array( 'title' => '' );
		$search[9] = array( 'title' => '' );
		$search['_multiwidget'] = 1;
		update_option( 'widget_search', $search );

		// Widget Retro popular posts
		$retro_popular_posts = get_option( 'widget_retro-popular-posts' );
		$retro_popular_posts[2] = array( 'title' => 'POPULAR POSTS', 'number' => '2', 'show_image' => '' );
		$retro_popular_posts[3] = array( 'title' => 'POPULAR POSTS', 'number' => '2', 'show_image' => 'on' );
		$retro_popular_posts[4] = array( 'title' => 'POPULAR POSTS', 'number' => '2', 'show_image' => '' );
		$retro_popular_posts[5] = array( 'title' => 'POPULAR WITH IMAGE', 'number' => '2', 'show_image' => 'on' );
		$retro_popular_posts['_multiwidget'] = 1;
		update_option( 'widget_retro-popular-posts', $retro_popular_posts );

		// Widget Tag_cloud
		$tag_cloud = get_option( 'widget_tag_cloud' );
		$tag_cloud[5] = array( 'title' => 'Tags', 'taxonomy' => 'post_tag' );
		$tag_cloud[7] = array( 'title' => 'TAGS', 'taxonomy' => 'post_tag' );
		$tag_cloud['_multiwidget'] = 1;
		update_option( 'widget_tag_cloud', $tag_cloud );

		// Widget Retro portfolio
		$retro_portfolio = get_option( 'widget_retro-portfolio' );
		$retro_portfolio[2] = array( 'title' => 'FROM PORTFOLIO', 'number' => '6', 'category' => 'portfolio' );
		$retro_portfolio[3] = array( 'title' => 'FROM PORTFOLIO', 'number' => '6', 'category' => 'portfolio' );
		$retro_portfolio[4] = array( 'title' => 'From portfolio', 'number' => '6', 'category' => 'portfolio' );
		$retro_portfolio['_multiwidget'] = 1;
		update_option( 'widget_retro-portfolio', $retro_portfolio );

		// Widget Nav_menu
		$nav_menu = get_option( 'widget_nav_menu' );
		global $wpdb;
		$table_db_name = $wpdb->prefix . 'terms';
		$rows = $wpdb->get_results( 'SELECT * FROM ' . $table_db_name . " where name='features' OR name='features' OR name='Shortccodes'", ARRAY_A );
		$menu_ids = array();
		foreach ( $rows as $row ) {
			$menu_ids[ $row['name'] ] = $row['term_id']; }

		$nav_menu[2] = array( 'title' => 'Features', 'nav_menu' => $menu_ids['features'] );
		$nav_menu[3] = array( 'title' => 'FEATURES OVERVIEW', 'nav_menu' => $menu_ids['features'] );
		$nav_menu[4] = array( 'title' => 'SHORTCODES', 'nav_menu' => $menu_ids['Shortccodes'] );
		$nav_menu['_multiwidget'] = 1;
		update_option( 'widget_nav_menu', $nav_menu );

		// Widget Retro testimonials
		$retro_testimonials = get_option( 'widget_retro-testimonials' );
		$retro_testimonials[3] = array( 'category' => 'small_testimonials', 'effect' => 'fade', 'randomize' => '', 'time' => '10', 'title' => 'TESTIMONIALS' );
		$retro_testimonials[4] = array( 'category' => 'small_testimonials', 'effect' => 'fade', 'randomize' => '', 'time' => '10', 'title' => 'WHAT PEOPLE SAY' );
		$retro_testimonials[5] = array( 'category' => 'small_testimonials', 'effect' => 'fade', 'randomize' => '', 'time' => '10', 'title' => 'Testimonials' );
		$retro_testimonials['_multiwidget'] = 1;
		update_option( 'widget_retro-testimonials', $retro_testimonials );

		// Widget Retro feedburner
		$retro_feedburner = get_option( 'widget_retro-feedburner' );
		$retro_feedburner[2] = array( 'title' => 'Sign up for our Newsletter', 'description' => '', 'feedname' => 'olegnax' );
		$retro_feedburner[3] = array( 'title' => 'SIGN UP FOR OUR NEWSLETTERS', 'description' => '', 'feedname' => 'olegnax' );
		$retro_feedburner['_multiwidget'] = 1;
		update_option( 'widget_retro-feedburner', $retro_feedburner );

		// Widget Text
		$text = get_option( 'widget_text' );
		$text[3] = array( 'title' => 'TABS', 'text' => '[tabgroup] [tab title="Tab 1"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac sapien mi. Pellentesque et tellus ut mi cursus auctor sit amet sit amet orci. In condimentum elementum elit, dictum varius felis commodo et. .[/tab] [tab title="Tab 2"]In condimentum elementum elit, dictum varius felis commodo et. Sed consectetur, felis ac ultrices sollicitudin, lorem augue pretium nisi, et euismod lectus mi id velit.[/tab] [tab title="Tab 3"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac sapien mi.Cras dolor odio, fermentum vitae scelerisque a, dictum vel ante. [/tab] [/tabgroup]', 'filter' => '' );
		$text[4] = array( 'title' => 'SOCIAL ICONS', 'text' => '[social_link style="default" type="rss_feed" url="" target="" ] [social_link style="default" type="facebook_account" url="" target="" ] [social_link style="default" type="twitter_account" url="" target="" ] [social_link style="default" type="dribble_account" url="" target="" ] [social_link style="default" type="flicker_account" url="" target="" ] [social_link style="default" type="vimeo_account" url="" target="" ] [social_link style="default" type="email_to" url="" target="" ] [social_link style="default" type="youtube_account" url="" target="" ] [social_link style="default" type="pinterest_account" url="" target="" ] [social_link style="default" type="google_plus_account" url="" target="" ] [social_link style="default" type="linked_in_account" url="" target="" ]', 'filter' => '' );
		$text[5] = array( 'title' => 'TABS', 'text' => '[tabgroup] [tab title="Tab 1"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac sapien mi. Pellentesque et tellus ut mi cursus auctor sit amet sit amet orci. In condimentum elementum elit, dictum varius felis commodo et. bibendum.[/tab] [tab title="Tab 2"]In condimentum elementum elit, dictum varius felis commodo et. Sed consectetur, felis ac ultrices sollicitudin, lorem augue pretium nisi, et euismod lectus mi id velit.[/tab] [tab title="Tab 3"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac sapien mi.Cras dolor odio, fermentum vitae scelerisque a, dictum vel ante. Duis tellus mauris, accumsan vel porta vitae, molestie nec elit. Fusce rhoncus pharetra mi sed consequat. Donec cursus faucibus felis ac bibendum.[/tab] [/tabgroup]', 'filter' => '' );
		$text[6] = array( 'title' => 'TOGGLES', 'text' => '[toggle type="white" title="First Sample Toggle"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac sapien mi. Pellentesque et tellus ut mi cursus auctor sit amet sit amet orci. In condimentum elementum elit, dictum varius felis commodo et. Sed consectetur, felis ac ultrices sollicitudin, lorem augue pretium nisi, et euismod lectus mi id velit. Suspendisse viverra arcu eleifend magna posuere at posuere nibh sagittis. Cras dolor odio, fermentum vitae scelerisque a, dictum vel ante. Duis tellus mauris, accumsan vel porta vitae, molestie nec elit. Fusce rhoncus pharetra mi sed consequat. Donec cursus faucibus felis ac bibendum.[/toggle] [toggle type="white" title="Second Sample Toggle"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac sapien mi. Pellentesque et tellus ut mi cursus auctor sit amet sit amet orci. In condimentum elementum elit, dictum varius felis commodo et. In condimentum elementum elit, dictum varius felis commodo et. Sed consectetur, felis ac ultrices sollicitudin, lorem augue pretium nisi, et euismod lectus mi id velit.Sed consectetur, felis ac ultrices sollicitudin, lorem augue pretium nisi, et euismod lectus mi id velit. Suspendisse viverra arcu eleifend magna posuere at posuere nibh sagittis. Cras dolor odio, fermentum vitae scelerisque a, dictum vel ante. Duis tellus mauris, accumsan vel porta vitae, molestie nec elit. Fusce rhoncus pharetra mi sed consequat. Donec cursus faucibus felis ac bibendum.[/toggle] [toggle type="white" title="Third Sample Toggle"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac sapien mi. Pellentesque et tellus ut mi cursus auctor sit amet sit amet orci. Suspendisse viverra arcu eleifend magna posuere at posuere nibh sagittis. Cras dolor odio, fermentum vitae scelerisque a, dictum vel ante. Duis tellus mauris, accumsan vel porta vitae, molestie nec elit. Fusce rhoncus pharetra mi sed consequat. Donec cursus faucibus felis ac bibendum.[/toggle]', 'filter' => '' );
		$text['_multiwidget'] = 1;
		update_option( 'widget_text', $text );

		// Widget Recent comments
		$recent_comments = get_option( 'widget_recent-comments' );
		$recent_comments[2] = array( 'title' => 'RECENT COMMENTS', 'number' => '5' );
		$recent_comments['_multiwidget'] = 1;
		update_option( 'widget_recent-comments', $recent_comments );

		// Widget Categories
		$categories = get_option( 'widget_categories' );
		$categories[2] = array( 'title' => 'CATEGORIES', 'count' => '0', 'hierarchical' => '0', 'dropdown' => '0' );
		$categories['_multiwidget'] = 1;
		update_option( 'widget_categories', $categories );
	}
}

?>
