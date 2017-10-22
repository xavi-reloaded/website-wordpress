<?php

//Displays the current page's title. Used in the main banner area.
if(!function_exists('cpotheme_page_title')){
	function cpotheme_page_title(){
		global $post;
		if(isset($post->ID)) $current_id = $post->ID; else $current_id = false;		
		$title_tag = function_exists('is_woocommerce') && is_woocommerce() && is_singular('product') ? 'span' : 'h1';
		
		echo '<'.$title_tag.' class="pagetitle-title heading">';
		if(function_exists('is_woocommerce') && is_woocommerce()){
			woocommerce_page_title();
		}elseif(is_category() || is_tag() || is_tax()){
			echo single_tag_title('', true);
		}elseif(is_author()){
			the_author();
		}elseif(is_date()){
			_e('Archive', 'affluent');
		}elseif(is_404()){
			echo __('Page Not Found', 'affluent');
		}elseif(is_search()){
			echo __('Search Results for', 'affluent').' "'.get_search_query().'"';
		}else{
			echo get_the_title($current_id);
		}
		echo '</'.$title_tag.'>';
	}
}


//Displays the current page's title. Used in the main banner area.
if(!function_exists('cpotheme_header_image')){
	function cpotheme_header_image(){
		$url = apply_filters('cpotheme_header_image', get_header_image());
		if($url != '')
			return $url;
		else
			return false;
	}
}
	
	
//Add theme-specific body classes
add_filter('body_class', 'cpotheme_body_class');
function cpotheme_body_class($body_classes = ''){
	$current_id = cpotheme_current_id();
	$classes = '';
	
	//Sidebar Layout
	$classes .= ' sidebar-'.cpotheme_get_sidebar_position();
	
	$body_classes[] = esc_attr($classes);
	
	return $body_classes;
}


//Display viewport tag
add_action('wp_head','cpotheme_viewport');
if(!function_exists('cpotheme_viewport')){
	function cpotheme_viewport(){
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>'."\n";
	}
}


//Print pingback metatag
add_action('wp_head','cpotheme_pingback');
if(!function_exists('cpotheme_pingback')){
	function cpotheme_pingback(){
		if(get_option('default_ping_status') == 'open')
			echo '<link rel="pingback" href="'.esc_url(get_bloginfo('pingback_url')).'"/>'."\n";
	}
}


//Print charset metatag
add_action('wp_head','cpotheme_charset');
if(!function_exists('cpotheme_charset')){
	function cpotheme_charset(){
		echo '<meta charset="'.esc_attr(get_bloginfo('charset')).'"/>'."\n";
	}
}


//Display shortcut edit links for logged in users
if(!function_exists('cpotheme_edit')){
	function cpotheme_edit(){
		if(cpotheme_get_option('general_editlinks'))
			edit_post_link(__('Edit', 'affluent'));
	}
}


//Display the site's logo
if(!function_exists('cpotheme_logo')){
	function cpotheme_logo($width = 0, $height = 0){
		$output = '<div id="logo" class="logo">';
		if(cpotheme_get_option('general_texttitle') == false){
			
			if(!function_exists('get_custom_logo')){
				//Old CPOThemes logo
				if(defined('CPOTHEME_LOGO_WIDTH')) $width = intval(CPOTHEME_LOGO_WIDTH);
				if(cpotheme_get_option('general_logo') == ''){
					$output .= '<a class="site-logo" href="'.esc_url(home_url()).'"><img src="'.get_template_directory_uri().'/images/logo.png" alt="'.esc_attr(get_bloginfo('name')).'" width="'.esc_attr($width).'" height="'.esc_attr($height).'"/></a>';
				}else{
					$logo_width = cpotheme_get_option('general_logo_width');
					$logo_url = cpotheme_get_option('general_logo');
					if($logo_width != '') $logo_width = ' style="width:'.esc_attr($logo_width).'px;"';
					$output .= '<a class="site-logo" href="'.esc_url(home_url()).'"><img src="'.esc_url($logo_url).'" alt="'.esc_attr(get_bloginfo('name')).'"'.$logo_width.'/></a>';
				}
			}else{
				//Native WordPress logo
				if(!has_custom_logo()){
					$output .= '<a class="site-logo" href="'.esc_url(home_url()).'"><img src="'.get_template_directory_uri().'/images/logo.png" alt="'.esc_attr(get_bloginfo('name')).'" width="'.esc_attr($width).'" height="'.esc_attr($height).'"/></a>';
				}else{
					$output .= get_custom_logo();
				}
			}
		}
		
		$classes = '';
		if(cpotheme_get_option('general_texttitle') == false){
			$classes = ' hidden';
		}
		
		if(!is_front_page()){
			$output .= '<span class="title site-title'.esc_attr($classes).'"><a href="'.esc_url(home_url()).'">'.esc_attr(get_bloginfo('name')).'</a></span>';
		}else{
			$output .= '<h1 class="title site-title '.esc_attr($classes).'"><a href="'.esc_url(home_url()).'">'.esc_attr(get_bloginfo('name')).'</a></h1>';
		}
		
		$output .= '</div>';
		echo $output;
	}	
}


//Print an option content
if(!function_exists('cpotheme_block')){
	function cpotheme_block($option, $wrapper = '', $subwrapper = ''){
		$content = cpotheme_get_option($option);
		if(trim($content) != ''){
			if($wrapper != '') echo '<div id="'.esc_attr($wrapper).'" class="'.esc_attr($wrapper).'">';
			if($subwrapper != '') echo '<div class="'.esc_attr($subwrapper).'">';
			echo do_shortcode(wp_kses_post(cpotheme_get_option($option)));
			if($subwrapper != '') echo '</div>';
			if($wrapper != '') echo '</div>';
		}
	}
}


//Print 404 message
if(!function_exists('cpotheme_404')){
	function cpotheme_404(){
		echo apply_filters('cpotheme_404', __('The requested page could not be found. It could have been deleted or changed location. Try searching for it using the search function.', 'affluent'));
	}
}


//Print subfooter sidebars
if(!function_exists('cpotheme_subfooter')){
	function cpotheme_subfooter(){		
		$footer_columns = 3;
		for($count = 1; $count <= $footer_columns; $count++){ 
			if(is_active_sidebar('footer-widgets-'.$count)){ 
				$footer_last = $count == $footer_columns ? ' col-last' : '';
				echo '<div class="column col'.esc_attr($footer_columns.$footer_last).'">';
				dynamic_sidebar('footer-widgets-'.$count); 
				echo '</div>';
			} 
		}
		echo '<div class="clear"></div>';
	}
}


//Print footer copyright line
if(!function_exists('cpotheme_footer')){
	function cpotheme_footer(){		
		echo '<div class="footer-content">';
		echo '&copy; '.esc_attr(get_bloginfo('name')).' '.date("Y").'. '.sprintf(__('<a href="%s">%s</a> theme by CPOThemes.', 'affluent'), esc_url(CPOTHEME_PREMIUM_URL), esc_attr(CPOTHEME_NAME)); 
		echo '</div>';
	}
}


//Print submenu navigation
if(!function_exists('cpotheme_submenu')){
	function cpotheme_submenu(){		
		$ancestors = array_reverse(get_post_ancestors(get_the_ID()));
		if(empty($ancestors[0]) || $ancestors[0] == 0) $ancestors[0] = get_the_ID();
		echo '<ul id="submenu" class="menu-sub">';
		wp_list_pages(apply_filters('cpotheme_submenu_query', "title_li=&child_of=".$ancestors[0]));
		echo '</ul>';
	}
}


//Print submenu navigation
if(!function_exists('cpotheme_sitemap')){
	function cpotheme_sitemap(){		
		//Print page list
		echo '<div class="column col2">';
		echo '<h3>'.__('Pages', 'affluent').'</h3>';
		echo '<ul>'.wp_list_pages('sort_column=menu_order&title_li=&echo=0').'</ul>';
		echo '</div>';
		
		//Print post categories and tag cloud
		echo '<div class="column col2 col-last">';
		echo '<h3>'.__('Post Categories', 'affluent').'</h3>';
		echo '<ul>'.wp_list_categories('title_li=&show_count=1&echo=0').'</ul>';
		echo '<h3>'.__('Post Tags', 'affluent').'</h3>';
		echo '<ul>'.wp_tag_cloud('echo=0').'</ul>';
		echo '</div>';
		
		echo '<div class="clear"></div>';
	}
}


//Enqueue custom font stylesheets from Google Fonts
if(!function_exists('cpotheme_fonts')){
	function cpotheme_fonts($font_name, $load_variants = false){
		$font_variants = $load_variants != false ? ':100,300,400,700' : '';
		if(is_array($font_name)){
			foreach($font_name as $current_font)
				if(!in_array($current_font, array('Arial', 'Georgia', 'Times+New+Roman', 'Verdana'))){
					$font_id = 'cpotheme-font-'.strtolower(str_replace('+', '-', $current_font));
					wp_enqueue_style($font_id, '//fonts.googleapis.com/css?family='.str_replace('%2B', '+', rawurlencode($current_font.$font_variants)));
				}
		}else{
			if(!in_array($font_name, array('Arial', 'Georgia', 'Times+New+Roman', 'Verdana'))){
				$font_id = 'cpotheme-font-'.strtolower(str_replace('+', '-', $font_name));
				wp_enqueue_style($font_id, '//fonts.googleapis.com/css?family='.str_replace('%2B', '+', rawurlencode($font_name.$font_variants)));
			}
		}
	}
}



//Creates a grid of columns for display templated content, running the WordPress loop
if(!function_exists('cpotheme_grid')){
	function cpotheme_grid($posts, $element, $template, $columns = 3, $args = null){
		if($posts == null){
			cpotheme_grid_default($element, $template, $columns, $args);
		}else{
			global $post;
			cpotheme_grid_custom($posts, $element, $template, $columns, $args);
		}
	}
}


//Runs the grid using the default loop
if(!function_exists('cpotheme_grid_default')){
	function cpotheme_grid_default($element, $template, $columns = 3, $args = null){
		$class = isset($args['class']) ? $args['class'] : '';
		if($columns == '') $columns = 3;
		
		echo '<div class="row">';
		$count = 0;
		while(have_posts()){ 
			the_post();
			if($count % $columns == 0 && $count > 0){
				echo '</div>';
				do_action('cpotheme_grid_'.esc_attr($template));
				echo '<div class="row">';
			}
			$count++;
			echo '<div class="column '.esc_attr($class).' col'.esc_attr($columns).'">';
			get_template_part('template-parts/'.esc_attr($element), esc_attr($template));
			echo '</div>';
		}
		echo '</div>';
	}
}


//Runs the grid using a custom loop
if(!function_exists('cpotheme_grid_custom')){
	function cpotheme_grid_custom($posts, $element, $template, $columns = 3, $args = null){
		global $post;
		$class = isset($args['class']) ? $args['class'] : '';
		if($columns == '') $columns = 3;
		
		echo '<div class="row">';
		$count = 0;
		foreach($posts as $post){ 
			setup_postdata($post);
			if($count % $columns == 0 && $count > 0){
				echo '</div>';
				do_action('cpotheme_grid_'.esc_attr($template));
				echo '<div class="row">';
			}
			$count++;
			echo '<div class="column '.esc_attr($class).' col'.esc_attr($columns).'">';
			get_template_part('template-parts/'.esc_attr($element), esc_attr($template));
			echo '</div>';
		}
		echo '</div>';
	}
}


// Generates breadcrumb navigation
if(!function_exists('cpotheme_breadcrumb')){
	function cpotheme_breadcrumb($display = false){
		if(!is_home() && !is_front_page()){
			//Use WooCommerce navigation if it's a shop page
			if(function_exists('is_woocommerce') && function_exists('woocommerce_breadcrumb') && is_woocommerce()){
				woocommerce_breadcrumb();
				return;
			}
			
			$result = '';
			if(function_exists('yoast_breadcrumb')){
				$result = yoast_breadcrumb('','', false);
			}
			
			if($result == ''){
				global $post;
				if(is_object($post)) $pid = $post->ID; else $pid = '';
				$result = '';
				
				if($pid != ''){
					$result = "<span class='breadcrumb-separator'></span>";
					//Add post hierarchy
					if(is_singular()):
						$post_data = get_post($pid);
						$result .= "<span class='breadcrumb-title'>".apply_filters('the_title', $post_data->post_title)."</span>\n";
						//Add post hierarchy
						while($post_data->post_parent):
							$post_data = get_post($post_data->post_parent);
							$result = "<span class='breadcrumb-separator'></span><a class='breadcrumb-link' href='".esc_url(get_permalink($post_data->ID))."'>".apply_filters('the_title', $post_data->post_title)."</a>\n".$result;
						endwhile;
						
					elseif(is_tax()):
						$result .= single_tag_title('', false);
						
					elseif(is_author()):
						$author = get_userdata(get_query_var('author'));
						$result .= $author->display_name;
						
					//Prefix with a taxonomy if possible
					elseif(is_category()):					
						$post_data = get_the_category($pid);
						if(isset($post_data[0])):
							$data = get_category_parents($post_data[0]->cat_ID, TRUE, ' &raquo; ');
							if(!is_object($data)):
								$result .= substr($data, 0, -8);
							endif;
						endif;
						
					elseif(is_search()):					
						$result .= __('Search Results', 'affluent');
					else:
						if(isset($post->ID)) $current_id = $post->ID; else $current_id = false;
						if($current_id){
							$result .= get_the_title($current_id);
						}
					endif;
				}elseif(is_404()){
					$result = "<span class='breadcrumb-separator'></span>";
					$result .= __('Page Not Found', 'affluent');
				}
				$result = '<a class="breadcrumb-link" href="'.home_url().'">'.__('Home', 'affluent').'</a>'.$result;
			}
			
			$output = '<div id="breadcrumb" class="breadcrumb">'.$result.'</div>';
			echo $output;
		}
	}
}


//Displays the search form on search pages
add_action('cpotheme_before_content', 'cpotheme_search_form');
if(!function_exists('cpotheme_search_form')){
	function cpotheme_search_form(){
		if(is_search()){
			$search_query = '';
			if(isset($_GET['s'])){ 
				$search_query = esc_attr(get_search_query());
			}
			echo '<div class="search-form">';
			echo '<form role="search" method="get" id="search-form" class="search-form" action="'.esc_url(home_url('/')).'">';
			echo '<input type="text" value="'.$search_query.'" name="s" id="s" />';
			echo '<input type="submit" id="search-submit" value="'.__('Search', 'affluent').'" />';
			echo '</form>';
			echo '</div>';
			
			if(!have_posts()){
				echo '<p class="search-submit">'.__('No results were found. Please try searching with different terms.', 'affluent').'</p>';
			}
		}
	}
}


//Displays the post image on listings and blog posts
if(!function_exists('cpotheme_postpage_image')){
	function cpotheme_postpage_image(){
		if(has_post_thumbnail()){
			if(!is_singular('post')){
				echo '<a href="'.esc_url(get_permalink(get_the_ID())).'" title="'.sprintf(esc_attr__('Go to %s', 'affluent'), the_title_attribute('echo=0')).'" rel="bookmark">';
				the_post_thumbnail('cpotheme-portfolio');
				echo '</a>';
			}else{
				the_post_thumbnail();
			}
		}
	}
}


//Displays the post title on listings
if(!function_exists('cpotheme_postpage_title')){
	function cpotheme_postpage_title(){
		if(!is_singular('post')){
			echo '<h2 class="post-title">';
			echo '<a href="'.esc_url(get_permalink(get_the_ID())).'" title="'.sprintf(esc_attr__('Go to %s', 'affluent'), the_title_attribute('echo=0')).'" rel="bookmark">';
			the_title();
			echo '</a>';
			echo '</h2>';
		}
	}
}


//Displays the post content
if(!function_exists('cpotheme_postpage_content')){
	function cpotheme_postpage_content(){
		if(cpotheme_get_option('postpage_preview') === true || is_singular('post')){
			the_content(); 
			cpotheme_post_pagination();
		}else{ 
			the_excerpt();
		}
	}
}

//Displays the post date
if(!function_exists('cpotheme_postpage_date')){
	function cpotheme_postpage_date($display = false, $date_format = '', $format_text =''){
		if($date_format != '') {
			$date_string = get_the_date($date_format);
		}
		else{
			$date_format = get_option('date_format');
			$date_string = get_the_date($date_format);
		}
		if($format_text != '') $date_string = sprintf($format_text, $date_string);
		echo '<div class="post-date">'.$date_string.'</div>';
	}
}

	
//Displays the author link
if(!function_exists('cpotheme_postpage_author')){
	function cpotheme_postpage_author($display = false, $format_text =''){
		$author_alt = sprintf(esc_attr__('View all posts by %s', 'affluent'), get_the_author());
		$author = sprintf('<a href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url(get_the_author_meta('ID')), $author_alt,get_the_author());
		if($format_text != ''){
			$author = sprintf($format_text, $author);
		}
		echo '<div class="post-author">'.$author.'</div>';
	}
}


//Displays the category list for the current post
if(!function_exists('cpotheme_postpage_categories')){
	function cpotheme_postpage_categories($display = false, $format_text =''){
		$category_list = get_the_category_list(', ');
		if($format_text != ''){
			$category_list = sprintf($format_text, $category_list);
		}
		echo '<div class="post-category">'.$category_list.'</div>';
	}
}


//Displays the number of comments for the post
if(!function_exists('cpotheme_postpage_comments')){
	function cpotheme_postpage_comments($display = false, $format_text = ''){
		$comments_num = get_comments_number();
		
		//Format comment texts
		if($format_text != ''){
			$text = $format_text;
		}else{
			if($comments_num == 0)
				$text = __('No Comments', 'affluent');
			elseif($comments_num == 1)
				$text = __('One Comment', 'affluent');
			else
				$text = __('%1$s Comments', 'affluent');
		}
		
		$comments = sprintf($text, number_format_i18n($comments_num));
		echo '<div class="post-comments">'.sprintf('<a href="%1$s">%2$s</a>', esc_url(get_permalink(get_the_ID())).'#comments', $comments).'</div>';	
	}
}


//Displays the post tags
if(!function_exists('cpotheme_postpage_tags')){
	function cpotheme_postpage_tags($display = false, $before = '', $separator = ', ', $after = ''){
		echo '<div class="post-tags">';
		the_tags($before, $separator, $after);
		echo '</div>';
	}
}


//Display Read More link for post excerpts
if(!function_exists('cpotheme_postpage_readmore')){
	function cpotheme_postpage_readmore($classes = ''){
		if(!is_singular('post')){
			echo '<a class="post-readmore '.esc_attr($classes).'" href="'.esc_url(get_permalink(get_the_ID())).'">';
			echo apply_filters('cpotheme_readmore', __('Read More', 'affluent'));
			echo '</a>';
		}
	}
}


//Displays the author box
if(!function_exists('cpotheme_author')){
	function cpotheme_author(){
		if(get_the_author_meta('description')){
			if(function_exists('ts_fab_add_author_box')){
				echo ts_fab_add_author_box('');
			}else{
				echo '<div id="author-info" class="author-info">';
				echo '<div class="author-content">';
				echo '<div class="author-image">'.get_avatar(get_the_author_meta('user_email'), 100).'</div>';
				echo '<div class="author-body">';
				echo '<h4 class="author-name">';
				echo '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a>';
				echo '</h4>';
				echo '<div class="author-description">';
				the_author_meta('description');
				echo '</div>';
				//Social links
				echo '<div class="author-social">';
				$user_meta = get_the_author_meta('user_url'); 
				if($user_meta != '')
					echo '<a target="_blank" rel="nofollow" class="author-web" href="'.esc_attr($user_meta).'">'.__('Website', 'affluent').'</a>';
				$user_meta = get_the_author_meta('facebook'); 
				if($user_meta != '')
					echo '<a target="_blank" rel="nofollow" class="author-facebook" href="'.esc_attr($user_meta).'">'.__('Facebook', 'affluent').'</a>';
				$user_meta = get_the_author_meta('twitter'); 
				if($user_meta != '')
					echo '<a target="_blank" rel="nofollow" class="author-twitter" href="//twitter.com/'.esc_attr($user_meta).'">'.__('Twitter', 'affluent').'</a>';
				$user_meta = get_the_author_meta('googleplus'); 
				if($user_meta != '')
					echo '<a target="_blank" rel="nofollow" class="author-googleplus" href="'.esc_attr($user_meta).'">'.__('Google+', 'affluent').'</a>';
				do_action('cpotheme_author_links');
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
		}
	}
	remove_filter('the_content', 'ts_fab_add_author_box', 15);
}


//Displays visual media of a particular post
if(!function_exists('cpotheme_post_media')){
	function cpotheme_post_media($post_id){
		the_post_thumbnail('full', array('class' => 'single-image'));
	}
}


//Paginates a list of posts, such as the blog or portfolio
if(!function_exists('cpotheme_numbered_pagination')){
	function cpotheme_numbered_pagination($query = ''){
		the_posts_pagination();
	}
}


//Paginates a single post by using a numbered list
if(!function_exists('cpotheme_post_pagination')){
	function cpotheme_post_pagination(){
		wp_link_pages(array('before' => '<div class="postpagination">', 'after' => '</div>', 'pagelink' => '<span>%</span>', 'separator' => ''));
	}
}


//Prints the main navigation menu
if(!function_exists('cpotheme_menu')){
	function cpotheme_menu($options = null){
		if(has_nav_menu('main_menu')){
			if(isset($options['toggle']) && $options['toggle'] == true) cpotheme_menu_toggle();
			wp_nav_menu(array('menu_id' => 'menu-main', 'menu_class' => 'menu-main', 'theme_location' => 'main_menu', 'depth' => '4', 'container' => false, 'fallback_cb' => 'cpotheme_default_menu', 'walker' => new Cpotheme_Menu_Walker()));
		}
	}
}


//Prints the mobile navigation menu
add_action('wp_footer', 'cpotheme_mobile_menu');
if(!function_exists('cpotheme_mobile_menu')){
	function cpotheme_mobile_menu($options = null){
		if(has_nav_menu('main_menu')){
			echo '<div id="menu-mobile-close" class="menu-mobile-close menu-mobile-toggle"></div>';
			wp_nav_menu(array('menu_id' => 'menu-mobile', 'menu_class' => 'menu-mobile', 'theme_location' => 'main_menu', 'depth' => '4', 'container' => false, 'fallback_cb' => 'cpotheme_default_menu', 'walker' => new Cpotheme_Menu_Walker()));
		}
	}
}


//Prints the main navigation menu
if(!function_exists('cpotheme_menu_toggle')){
	function cpotheme_menu_toggle(){
		if(has_nav_menu('main_menu'))
			echo '<div id="menu-mobile-open" class=" menu-mobile-open menu-mobile-toggle"></div>';
	}
}


//Prints the footer navigation menu
if(!function_exists('cpotheme_top_menu')){
	function cpotheme_top_menu(){
		if(has_nav_menu('top_menu')){
			echo '<div id="topmenu" class="topmenu">';
			wp_nav_menu(array('menu_class' => 'menu-top', 'theme_location' => 'top_menu', 'depth' => 1, 'fallback_cb' => null, 'walker' => new Cpotheme_Menu_Walker()));
			echo '</div>';
		}
	}
}


//Prints the footer navigation menu
if(!function_exists('cpotheme_footer_menu')){
	function cpotheme_footer_menu(){
		if(has_nav_menu('footer_menu')){
			echo '<div id="footermenu" class="footermenu">';
			wp_nav_menu(array('menu_class' => 'menu-footer', 'theme_location' => 'footer_menu', 'depth' => '1', 'fallback_cb' => false, 'walker' => new Cpotheme_Menu_Walker()));
			echo '</div>';
		}
	}
}


//Prints a custom navigation menu based around a single taxonomy
if(!function_exists('cpotheme_secondary_menu')){
	function cpotheme_secondary_menu($taxonomy = 'cpo_portfolio_category', $class){
		if(taxonomy_exists($taxonomy)){
			$feature_posts = get_terms($taxonomy, 'order=ASC&orderby=name');
			if(sizeof($feature_posts) > 0){ 
				$current_id = cpotheme_current_id();
				echo '<div id="menu-secondary '.$class.'" class="menu-secondary '.$class.'">';
				foreach($feature_posts as $current_item){
					$active_item = '';
					if($current_item->term_id == $current_id)
						$active_item = ' menu-item-active';
					echo '<a href="'.get_term_link($current_item, 'cpo_portfolio_category').'" class="menu-item'.$active_item.'">';
					echo '<div class="menu-title">'.$current_item->name.'</div>';
					echo '</a>';
				}
				echo '</div>';
			}
		}
	}
}


//TODO: Print a default navigation menu when there is none, using the theme markup
if(!function_exists('cpotheme_default_menu')){
	function cpotheme_default_menu(){
		$args = array('sort_column' => 'menu_order, post_title');
		$pages = get_pages($args);
		
		if($pages){
			$count = 0;
			$output = '';
			$output .= '<ul class="menu-main">';
			foreach($pages as $current_page){
				$count++;
				if($current_page->post_parent == 0 && $count < 17){
					$output .= '<li class="menu-item">';
					$output .= '<a href="'.esc_url(get_permalink($current_page->ID)).'">';
					$output .= '<span class="menu-link">';
					$output .= '<span class="menu-title">'.$current_page->post_title.'</span>';
					$output .= '</span>';
					$output .= '</a>';
					$output .= '</li>';	
				}
			}
			$output .= '</ul>';
		}
		echo $output;
	}
}


//Print comment protected message
if(!function_exists('cpotheme_comments_protected')){
	function cpotheme_comments_protected(){
		if(post_password_required()){
			echo '<p class="comments-protected">';
			_e('This page is protected. Please type the password to be able to read its contents.', 'affluent');
			echo '</p>';
			return true;
		}
		return false;
	}
}


//Print comment list title
if(!function_exists('cpotheme_comments_title')){
	function cpotheme_comments_title(){
		echo '<h3 id="comments-title" class="comments-title">';
		if(get_comments_number() == 1) 
			_e('One comment', 'affluent');
		else 
			printf(__('%s comments', 'affluent'), number_format_i18n(get_comments_number()));
		echo '</h3>';
	}
}


//Print comment markup
if(!function_exists('cpotheme_comment')){
	function cpotheme_comment($comment, $args, $depth){
		$GLOBALS['comment'] = $comment;
		
		//Normal Comments
		switch($comment->comment_type): case '': ?>
		<li <?php comment_class('comment'); ?> id="comment-<?php comment_ID(); ?>">
			<div class="comment-avatar">
				<?php echo get_avatar($comment, 100); ?>
			</div>
			<div class="comment-body">
				<div class="comment-title">
					<div class="comment-options">
						<?php edit_comment_link(__('Edit', 'affluent')); ?>
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					</div>
					<div class="comment-author">
						<?php echo get_comment_author_link(); ?>
					</div>
					<div class="comment-date">
						<a rel="nofollow" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
							<?php printf(__('%1$s at %2$s', 'affluent'), get_comment_date(),  get_comment_time()); ?>
						</a>
					</div>
				</div>
				
				<div class="comment-content">    
					<?php if($comment->comment_approved == '0'): ?>
						<span class="comment-approval"><?php _e('Your comment is awaiting approval.', 'affluent'); ?></span>
					<?php endif; ?>

					<?php comment_text(); ?>
				</div>
			</div>
		<?php break;
		
		//Pingbacks & Trackbacks
		case 'pingback': case 'trackback': ?>
		<li class="pingback">
			<?php comment_author_link(); ?>
			<?php edit_comment_link(__('Edit', 'affluent'), ' (', ')'); ?>
		<?php break;
		endswitch;
	}
}

//Print comment list pagination
if(!function_exists('cpotheme_comments_pagination')){
	function cpotheme_comments_pagination(){
		if(get_comment_pages_count() > 1 && get_option('page_comments')){
			echo '<div class="comments-navigation">';
			echo '<div class="comments-previous">';
			previous_comments_link(__('Older', 'affluent'));
			echo '</div>';
			echo '<div class="comments-next">';
			next_comments_link(__('Newer', 'affluent'));
			echo '</div>';
			echo '</div>';
		}
	}
}


//Print Tagline title
if(!function_exists('cpotheme_tagline_title')){
	function cpotheme_tagline_title(){
		$tagline = cpotheme_get_option('home_tagline');
		if($tagline != ''){
			echo '<div class="tagline-title">';
			echo $tagline;
			echo '</div>';
			
		}
	}
}


//Print Tagline content
if(!function_exists('cpotheme_tagline_content')){
	function cpotheme_tagline_content(){
		$tagline = cpotheme_get_option('home_tagline_content');
		if($tagline != ''){
			echo '<div class="tagline-content">';
			echo $tagline;
			echo '</div>';
			
		}
	}
}