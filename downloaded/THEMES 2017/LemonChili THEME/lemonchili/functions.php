<?php

/****************************************
** LEMONCHILI functions and definitions ******
****************************************/

if ( ! function_exists( 'lemonchili_setup' ) ) :
function lemonchili_setup() {

	/** Theme translation ********************************************************/
	load_theme_textdomain( 'lemonchili', get_template_directory() );

	/** Feed links ***************************************************************/
	add_theme_support('automatic-feed-links');

	/** Title Tags ***************************************************************/
   	add_theme_support( 'title-tag' );

	/** Thumbnails ***************************************************************/
        add_theme_support( 'post-thumbnails' );  
        set_post_thumbnail_size(470, 220, true); // default
        add_image_size('square1', 140, 140, true); 
        add_image_size('square2', 260, 260, true);
        add_image_size('square3', 380, 380, true);        
        add_image_size('gallery', 440, 320, true); 
        add_image_size('menu', 380, 520, true);
        add_image_size('slider', 700, 340, true);

	/* Custom Background ***************************************************************/
	add_theme_support( 'custom-background', apply_filters( 'marni_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );



}
endif;
add_action( 'after_setup_theme', 'lemonchili_setup' );




/** SIDEBARS ******************************************************************/
function lemonchili_widgets_init() {
	register_sidebar(array(
	                  'name'=>'sidebar home',
	                  'id' => 'home_sidebar',
	                  'description' => __( 'sidebar on homepage', 'gxg_textdomain' ),
	                  'before_widget' => '<div id="%1$s" class="widget %2$s box col6 boxbg">',
	                  'after_widget' => '</div>',
	                  'before_title' => '<h3 class="widgettitle text-center">',
	                  'after_title' => '</h3>', ));

	register_sidebar(array(
	                  'name'=>'contact sidebar',
	                  'id' => 'contact_sidebar',
	                  'description' => __( 'sidebar on contact page. Will display below content.', 'gxg_textdomain' ),
	                  'before_widget' => '<div id="%1$s" class="widget %2$s box col6 boxbg">',
	                  'after_widget' => '</div>',
	                  'before_title' => '<h3 class="widgettitle text-center">',
	                  'after_title' => '</h3>', ));
}
add_action( 'widgets_init', 'lemonchili_widgets_init' );







/** MENUS *********************************************************************/

//regular menu
if (function_exists('wp_nav_menu')) {
         function register_my_menus() {
                  register_nav_menus(
                  array(
                           'main-menu' => __( 'LEMONCHILI Main Menu', 'gxg_textdomain' )
                  )
         	  );
         }
         add_action( 'init', 'register_my_menus' );
}


//responsive menu
function wp_nav_menu_select( $args = array() ) {
     
        $defaults = array(
                'theme_location' => '',
                'menu_class' => 'select-menu',
        );
         
        $args = wp_parse_args( $args, $defaults );
         
        if ( ( $menu_locations = get_nav_menu_locations() ) && isset( $menu_locations[ $args['theme_location'] ] ) ) {
                $menu = wp_get_nav_menu_object( $menu_locations[ $args['theme_location'] ] );
             
                $menu_items = wp_get_nav_menu_items( $menu->term_id );
                
                if ( of_get_option('gg_navitext') ) { 
                $navitext = of_get_option('gg_navitext');
                } else { 
                $navitext = "Navigation";
                }
                
                ?>
                        <select id="menu-<?php echo $args['theme_location'] ?>" class="<?php echo $args['menu_class'] ?>">
                                <?php foreach( (array) $menu_items as $key => $menu_item ) : ?>
                                        <option value="<?php echo $menu_item->url ?>" class="<?php echo $menu_item->classes[0] ?>"><?php echo $menu_item->title ?></option>
                                <?php endforeach; ?>
                        </select>
                        <div id="navi-icon"><i class="fa fa-bars"></i><?php echo $navitext; ?></div>
                <?php
        }
}


/** EXCERPT LENGTH AND READ MORE LINK *****************************************/
function lemonchili_excerpt_length($length) {
        return 30;
}
add_filter('excerpt_length', 'lemonchili_excerpt_length');


function lemonchili_excerpt_more($more) {
         global $post;
         return '...';
}
add_filter('excerpt_more', 'lemonchili_excerpt_more');

function lemonchili_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'lemonchili_remove_more_link_scroll' );



/** CONTENT WIDTH *************************************************************/
function lemonchili_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lemonchili_content_width', 700 );
}
add_action( 'after_setup_theme', 'lemonchili_content_width', 0 );




/** ALLOW HTML IN CATEGORY AND TAXONOMY DESCRIPTIONS **************************/
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );



/** GET RID OF DEFAULT GALLERY STYLE ******************************************/
add_filter( 'use_default_gallery_style', '__return_false' );



/** INCLUDE THEME OPTIONS******************************************************/
$admin_path = get_template_directory() . '/includes/admin/';
require_once ($admin_path . 'options-framework.php');



/** INCLUDE TGM PLUGIN ACTIVATION *********************************************/
$tgm_path = get_template_directory() . '/includes/tgm-plugin-activation/';
include_once ($tgm_path . 'tgm-activation.php');



/** INCLUDE RETINA AND THEME OPTIONS PANEL STYLES ****************************************/
$options_path = get_template_directory() . '/css/';
include_once ($options_path . 'retina.php');
include_once ($options_path . 'css_options_panel.php');

if ( of_get_option('gg_responsive') ) { 
        include_once ($options_path . 'css_options_panel_responsive.php');
}



/** INCLUDE THEME FUNCTIONS ***************************************************/
$functions_path = get_template_directory() . '/includes/functions/';
include_once ($functions_path . 'theme_functions.php');
include_once ($functions_path . 'mobile_detect.php');



/** INCLUDE WIDGETS ***********************************************************/
define( 'LEMONCHILI_WIDGETS_DIRECTORY', trailingslashit( get_template_directory().'/includes/widgets' ) );
include LEMONCHILI_WIDGETS_DIRECTORY . 'widget-flickr.php';
include LEMONCHILI_WIDGETS_DIRECTORY . 'widget-news.php';
include LEMONCHILI_WIDGETS_DIRECTORY . 'widget-events.php';
include LEMONCHILI_WIDGETS_DIRECTORY . 'widget-images.php';
include LEMONCHILI_WIDGETS_DIRECTORY . 'widget-gallery.php';
include LEMONCHILI_WIDGETS_DIRECTORY . 'widget-hours.php';
include LEMONCHILI_WIDGETS_DIRECTORY . 'widget-featureddish.php';



/** INCLUDE CUSTOM POST TYPES *************************************************/
include_once(get_template_directory() . '/includes/posttypes/menu.php');
include_once(get_template_directory() . '/includes/posttypes/events.php');
include_once(get_template_directory() . '/includes/posttypes/gallery.php');
include_once(get_template_directory() . '/includes/posttypes/team.php');
include_once(get_template_directory() . '/includes/posttypes/slider.php');





/** INCLUDE META BOXES*********************************************************/
define( 'META_BOXES_DIRECTORY', trailingslashit( get_template_directory().'/includes/meta-boxes' ) );

// basic
require META_BOXES_DIRECTORY . 'basic/meta-box.php'; 

// config
require META_BOXES_DIRECTORY . 'config-meta-boxes.php';

// extension include exclude
require META_BOXES_DIRECTORY . 'meta-box-include-exclude/meta-box-include-exclude.php';




/** INCLUDE SHORTCODES ********************************************************/
include_once(get_template_directory() . '/includes/shortcodes/shortcodes.php');



/** CUSTOM GRAVATAR ********************************************************/
function lemonchili_custom_gravatar( $avatar_defaults ) {
    $gg_avatar = of_get_option('gg_gravatar');
    $avatar_defaults[$gg_avatar] = 'Custom Gravatar';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'lemonchili_custom_gravatar' );



/** GOOGLE FONTS ***************************************************************/
function lemonchili_fonts_url() {
	$fonts_url = '';
	 
	/* Translators: If there are characters in your language that are not
	* supported by the chosen font(s), translate this to 'off'. Do not translate
	* into your own language.
	*/	 
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'lemonchili' );

	if ( of_get_option('gg_font') || of_get_option('gg_font2')  ) {
		global $wp_styles;

	        if ( of_get_option('gg_font2') ) {
	        	$headings_font = of_get_option('gg_font2');
	        } elseif ( of_get_option('gg_font') ) {
	        	$headings_font = of_get_option('gg_font');
	        }

	        $fontweight = '400,700,800,900';

		$dynamic_font = _x( 'on', esc_html( $headings_font ) . ' font: on or off', 'lemonchili' );
	}
	 
	if ( 'off' !== $open_sans || 'off' !== $dynamic_font ) {
		$font_families = array();
		 
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,600,700,800';
		}

		if ( of_get_option('gg_font') || of_get_option('gg_font2') ) {
			if ( 'off' !== $dynamic_font ) {
				$font_families[] = esc_textarea( $headings_font ) . ':400,' . intval( $fontweight );
			}
		}
		 
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		 
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );
}



/** JQUERY ********************************************************************/
function lemonchili_register_scripts() {
        if (!is_admin()) {
                wp_register_style('light', get_template_directory_uri().'/css/skins/light.css', false, 'screen');
                wp_register_style('dark', get_template_directory_uri().'/css/skins/dark.css', false, 'screen');                  
        }
}
add_action('init', 'lemonchili_register_scripts');

function lemonchili_enqueue_scripts() {
        
        global $wp_styles;
        
        if (!is_admin()) {

        	// Google fonts 
        	wp_enqueue_style( 'lemonchili-fonts', lemonchili_fonts_url(), array(), '1.0.0' );

		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-tabs');   
		wp_enqueue_script('imagesloaded', get_template_directory_uri().'/js/imagesloaded.pkgd.min.js', array('jquery'), '3.1.6', true);		              
		wp_enqueue_script('masonry', get_template_directory_uri().'/js/jquery.masonry.min.js', array('jquery'), '3.1.5', true);
		wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js', array('jquery'), '1.4.8', true); 
		wp_enqueue_script('modernizr-transitions', get_template_directory_uri().'/js/modernizr-transitions.js', array('jquery'), '1.7', true);
		wp_enqueue_script('hoverIntent', get_template_directory_uri().'/js/hoverIntent.js', array('jquery'), ' ', true);
		wp_enqueue_script('selectbox', get_template_directory_uri().'/js/jquery.selectbox.js', array('jquery'), '0.2', true);
		wp_enqueue_script('prettyPhoto', get_template_directory_uri().'/js/prettyPhoto.js', array('jquery'), '3.1.6', true);  
		wp_enqueue_script('fitVids', get_template_directory_uri().'/js/fitVids.js', array('jquery'), '1.0', true);  
		
		wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js', array('jquery'), ' ', true);  
		if ( of_get_option('gg_bg_image_custom')  ) { 
			wp_enqueue_script('backstretch', get_template_directory_uri().'/js/backstretch.js', array('jquery'), '2.0.3', false);   
		}

		wp_enqueue_style('style', get_stylesheet_uri() );                    
		wp_enqueue_style('masonry', get_template_directory_uri().'/css/masonry.css', false, 'screen');            
		wp_enqueue_style('iconfont', get_template_directory_uri().'/fonts/fontawesome/font-awesome.min.css', false, 'screen');
		wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css', false, 'screen');
		wp_enqueue_style('shortcodes', get_template_directory_uri().'/css/shortcodes.css', false, 'screen');
                  
		// skin css
		$template_skin = of_get_option('gg_skin');                    
		wp_enqueue_style($template_skin);

		$wp_styles->add_data('oldie', 'conditional', 'IE');
		wp_enqueue_style('oldie', get_template_directory_uri().'/css/ie8-and-down.css', false, 'screen'); // old IE styles
         }
}
add_action('wp_enqueue_scripts', 'lemonchili_enqueue_scripts');


// load on homepage
function lemonchili_home_scripts() {
	if (is_page_template('template-home.php') && !is_admin() )
                  wp_enqueue_style('nivoSlider', get_template_directory_uri().'/css/nivoSlider.css', 'screen');
                  wp_enqueue_script('nivoSlider', get_template_directory_uri().'/js/nivoSlider.js', array('jquery'), '3.2', true);
}
add_action('wp_enqueue_scripts', 'lemonchili_home_scripts');


// load on single pages
function lemonchili_single_scripts() {
        if ( is_singular() && get_option( 'thread_comments' ) )
                wp_enqueue_script( 'comment-reply' );
        }
add_action('wp_enqueue_scripts', 'lemonchili_single_scripts');


// responsive style
function lemonchili_responsive_style() {
	if ( of_get_option('gg_responsive') && !is_admin() ) { 
                  wp_enqueue_style('layout', get_template_directory_uri().'/css/layout-responsive.css', false, 'screen');
        }
}
add_action('wp_enqueue_scripts', 'lemonchili_responsive_style');
?>