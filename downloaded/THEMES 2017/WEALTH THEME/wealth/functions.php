<?php
global $wealth_option;
if ( ! class_exists( 'ReduxFramewrk' ) ) {
    require_once( get_template_directory() . '/framework/sample-config.php' );
    function removeDemoModeLink() { // Be sure to rename this function to something more unique
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        }
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
        }
    }
    add_action('init', 'removeDemoModeLink');
}

//Custom fields:
require_once get_template_directory() . '/framework/widget/recentpost.php';
require_once get_template_directory() . '/framework/meta-boxes.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';

//Theme Set up:
function wealth_theme_setup() {

    /** Set Content width **/
    if ( ! isset( $content_width ) ) {
        $content_width = 900;
    }

   /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on cubic, use a find and replace
     * to change 'cubic' to the name of your theme in all the template files
     */
	load_theme_textdomain( 'wealth', get_template_directory() . '/languages' );

    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
	add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    //Post formats
    add_theme_support( 'post-formats', array(
        'audio',  'gallery', 'image', 'video',
    ) );

	//Tags
	add_theme_support( 'title-tag' );

    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__('Primary Menu', 'wealth'),        
	) );
}
add_action( 'after_setup_theme', 'wealth_theme_setup' );

function wealth_load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/framework/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wealth_load_custom_wp_admin_style' );

function wealth_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $roboto1 = _x( 'on', 'Roboto Condensed font: on or off', 'wealth' );
    $lato = _x( 'on', 'Lato font: on or off', 'wealth' );
    $vidaloka = _x( 'on', 'Vidaloka font: on or off', 'wealth' );
    $Pacifico = _x( 'on', 'Pacifico font: on or off', 'wealth' );
    $roboto2 = _x( 'on', 'Roboto Lap font: on or off', 'wealth' );
    $source = _x( 'on', 'Source Sans Pro font: on or off', 'wealth' );
    $pt = _x( 'on', 'PT Sans Narrow font: on or off', 'wealth' );
    $roboto3 = _x( 'on', 'Roboto font: on or off', 'wealth' );
    $comfortaa = _x( 'on', 'Comfortaa font: on or off', 'wealth' );
    $roboto4 = _x( 'on', 'Roboto font: on or off', 'wealth' );
    $open = _x( 'on', 'Open Sans font: on or off', 'wealth' );
    $contrail = _x( 'on', 'Contrail One font: on or off', 'wealth' );
    $cabin = _x( 'on', 'Cabin font: on or off', 'wealth' );
    $hammersmith = _x( 'on', 'Hammersmith One font: on or off', 'wealth' );
    $pt2 = _x( 'on', 'PT Sans font: on or off', 'wealth' );
    $roboto5 = _x( 'on', 'Roboto font: on or off', 'wealth' );
    $domine = _x( 'on', 'Domine font: on or off', 'wealth' );
    $oswald = _x( 'on', 'Oswald font: on or off', 'wealth' );
    $roboto6 = _x( 'on', 'Roboto font: on or off', 'wealth' );
    $montserrat = _x( 'on', 'Montserrat font: on or off', 'wealth' );
    $roboto7 = _x( 'on', 'Roboto font: on or off', 'wealth' );
    $source1 = _x( 'on', 'Source Sans Pro font: on or off', 'wealth' );
    $roboto8 = _x( 'on', 'Roboto font: on or off', 'wealth' );
    $open1 = _x( 'on', 'Open Sans font: on or off', 'wealth' );
    $cabin1 = _x( 'on', 'Cabin font: on or off', 'wealth' );
    $source2 = _x( 'on', 'Source Sans Pro font: on or off', 'wealth' );
    $playfair = _x( 'on', 'Playfair Display font: on or off', 'wealth' );
    $josefin = _x( 'on', 'Josefin Sans font: on or off', 'wealth' );
    $asap = _x( 'on', 'Asap font: on or off', 'wealth' );
    $pacifico = _x( 'on', 'Pacifico font: on or off', 'wealth' );

    if ( 'off' !== $roboto1 || 'off' !== $lato || 'off' !== $vidaloka || 'off' !== $pacifico || 'off' !== $roboto2 || 'off' !== $source || 'off' !== $pt || 'off' !== $roboto3 || 'off' !== $comfortaa || 'off' !== $roboto4 || 'off' !== $open || 'off' !== $contrail || 'off' !== $cabin || 'off' !== $hammersmith || 'off' !== $pt2 || 'off' !== $roboto5 || 'off' !== $domine || 'off' !== $oswald || 'off' !== $roboto6 || 'off' !== $montserrat || 'off' !== $roboto7 || 'off' !== $source || 'off' !== $roboto8 || 'off' !== $open1 || 'off' !== $cabin1 || 'off' !== $source2 || 'off' !== $playfair || 'off' !== $josefin || 'off' !== $asap ) {
        $font_families = array();
 
        if ( 'off' !== $roboto1 ) {
            $font_families[] = 'Roboto Condensed:400,700,400italic,700italic';
        }
        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:400,700,900,300italic,400italic,700italic';
        }
        if ( 'off' !== $vidaloka ) {
            $font_families[] = 'Vidaloka';
        }
        if ( 'off' !== $pacifico ) {
            $font_families[] = 'Pacifico';
        }
        if ( 'off' !== $roboto2 ) {
            $font_families[] = 'Roboto Slab:400,300,700';
        }
        if ( 'off' !== $source ) {
            $font_families[] = 'Source Sans Pro:400,700italic,700,600italic,600,400italic,300';
        }
        if ( 'off' !== $pt ) {
            $font_families[] = 'PT Sans Narrow:400,700';
        }
        if ( 'off' !== $roboto3 ) {
            $font_families[] = 'Roboto';
        }
        if ( 'off' !== $comfortaa ) {
            $font_families[] = 'Comfortaa:400,700,300';
        }
        if ( 'off' !== $roboto4 ) {
            $font_families[] = 'Roboto:400,500,700,700italic,900';
        }
        if ( 'off' !== $open ) {
            $font_families[] = 'Open Sans:400,600,700';
        }
        if ( 'off' !== $contrail ) {
            $font_families[] = 'Contrail One';
        }
        if ( 'off' !== $cabin ) {
            $font_families[] = 'Cabin:400,500,600,700,700italic';
        }
        if ( 'off' !== $hammersmith ) {
            $font_families[] = 'Hammersmith One';
        }
        if ( 'off' !== $pt2 ) {
            $font_families[] = 'PT Sans:400,700,400italic,700italic';
        }
        if ( 'off' !== $roboto5 ) {
            $font_families[] = 'Roboto:400,300,500,300italic';
        }
        if ( 'off' !== $domine ) {
            $font_families[] = 'Domine:400,700';
        }
        if ( 'off' !== $oswald ) {
            $font_families[] = 'Oswald:400,300,700';
        }
        if ( 'off' !== $roboto6 ) {
            $font_families[] = 'Roboto:400,300italic,300,500,700';
        }
        if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }
        if ( 'off' !== $roboto7 ) {
            $font_families[] = 'Roboto:400,500,700';
        }
        if ( 'off' !== $source1 ) {
            $font_families[] = 'Source Sans Pro:400,700';
        }
        if ( 'off' !== $roboto8 ) {
            $font_families[] = 'Roboto:500,400italic,300,300italic,400';
        }
        if ( 'off' !== $open1 ) {
            $font_families[] = 'Open Sans:400italic,600italic,700italic,400,600,700,800';
        }
        if ( 'off' !== $cabin1 ) {
            $font_families[] = 'Cabin:400,500,600,700,500italic,600italic';
        }
        if ( 'off' !== $source2 ) {
            $font_families[] = 'Source Sans Pro:400,400italic,600,700';
        }
        if ( 'off' !== $playfair ) {
            $font_families[] = 'Playfair Display:400,700';
        }
        if ( 'off' !== $josefin ) {
            $font_families[] = 'Josefin Sans:400,700';
        }
        if ( 'off' !== $asap ) {
            $font_families[] = 'Asap:400,700';
        }
     
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

function wealth_theme_scripts_styles() {
	global $wealth_option;
	$protocol = is_ssl() ? 'https' : 'http';
    
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'wealth-fonts', wealth_fonts_url(), array(), null );
	
    /** All frontend css files **/ 
    wp_enqueue_style( 'wealth-bootstrap-css', get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style( 'wealth-style', get_stylesheet_uri(), array(), '21-05-2015' );
    wp_enqueue_style( 'wealth-carousel-css', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style( 'wealth-theme-owl', get_template_directory_uri().'/css/owl.theme.css');
    wp_enqueue_style( 'wealth-font-awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css');

    wp_enqueue_style( 'wealth-datepick', get_template_directory_uri().'/css/jquery.datepick.css'); 

    if( !class_exists( 'ReduxFramewrk' ) ) {
        wp_enqueue_style( 'wealth-color', get_template_directory_uri() .'/framework/color.php');
    }
    
    /** Js for comment on single post **/    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    	wp_enqueue_script( 'comment-reply' );
	}

    /** All frontend js files **/      
	wp_enqueue_script("wealth-bootstrap-js", get_template_directory_uri()."/js/bootstrap.min.js",array( 'jquery' ), '1.0.0',true);
    wp_enqueue_script("easing-js", get_template_directory_uri()."/js/jquery.easing.min.js",array( 'jquery' ), '1.0.0',true);
    wp_enqueue_script("wealth-back-to-top", get_template_directory_uri()."/js/back-to-top.js",array( 'jquery' ), '1.0.0',true);
	wp_enqueue_script("wealth-scrolling-nav", get_template_directory_uri()."/js/scrolling-nav.js",array( 'jquery' ), '1.0.0',true);	
	wp_enqueue_script("wealth-carousel", get_template_directory_uri()."/js/owl.carousel.min.js",array( 'jquery' ), '1.0.0',false);
    wp_enqueue_script("wealth-plugin", get_template_directory_uri()."/js/jquery.plugin.js",array( 'jquery' ), '1.0.0',false);
    wp_enqueue_script("wealth-datepick", get_template_directory_uri()."/js/jquery.datepick.js",array( 'jquery' ), '1.0.0',false);    
	wp_enqueue_script("wealth-isotope", get_template_directory_uri()."/js/jquery.isotope.min.js",array( 'jquery' ), '1.0.0',true);
    wp_enqueue_script("wealth-script", get_template_directory_uri()."/js/script.js",array( 'jquery' ), '1.0.0',true);
    

	// if(!is_page_template('page-templates/template-coming-soon-page.php') || !is_page_template('page-templates/template-coming-soon-video.php')){ 
 //        wp_enqueue_script("wealth-classie", get_template_directory_uri()."/js/classie.js",array( 'jquery' ), '1.0.0',true);
	//  }
    //wp_enqueue_script("wealth-resize", get_template_directory_uri()."/js/video.resize.js",array( 'jquery' ), '1.0.0',true);
    
    
}
add_action( 'wp_enqueue_scripts', 'wealth_theme_scripts_styles');

if(!function_exists('wealth_custom_frontend_style')){
	function wealth_custom_frontend_style(){
	global $wealth_option;
	echo '<style type="text/css">'.$wealth_option['custom-css'].'</style>';
}
}
add_action('wp_head', 'wealth_custom_frontend_style');

function wealth_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wealth_mime_types');

// Widget Sidebar
function wealth_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'wealth' ),
        'id'            => 'sidebar-1',        
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'wealth' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h2>',        
		'after_title'   => '</h2>'
    ) );
	
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One Widget Area', 'wealth' ),
		'id'            => 'footer-area-1',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'wealth' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two Widget Area', 'wealth' ),
		'id'            => 'footer-area-2',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'wealth' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three Widget Area', 'wealth' ),
		'id'            => 'footer-area-3',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'wealth' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Fourth Widget Area', 'wealth' ),
		'id'            => 'footer-area-4',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'wealth' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );    
    
}
add_action( 'widgets_init', 'wealth_widgets_init' );

/**custom function tag widgets**/
function wealth_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 14; //largest tag
	$args['smallest'] = 14; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = ''; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'wealth_tag_cloud_widget' );

/** Custom theme option post excerpt **/
function wealth_excerpt() {
  global $wealth_option;
  if(isset($wealth_option['blog_excerpt'])){
    $limit = $wealth_option['blog_excerpt'];
  }else{
    $limit = 15;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//pagination
function wealth_pagination($prev = '<i class="fa fa-angle-double-left"></i>', $next = '<i class="fa fa-angle-double-right"></i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' => $prev,
        'next_text' => $next,		
        'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
);
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '', $return );
}

/* Custom form search */
function wealth_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url(home_url( '/' )) . '" >  
    	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.__('type to search and hit enter', 'wealth').'" />
    	<button class="submit-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        <div class="clearfix"></div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'wealth_search_form' );

if ( ! function_exists( 'wealth_custom_favicon' ) ) :
/**
 * Prints HTML with Custom Favicon.
 */
function wealth_custom_favicon() {
    global $wealth_option;
    
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {        
        if($wealth_option['favicon']['url'] !=''){ 
            echo '<link rel="shortcut icon" href="'.($wealth_option['favicon']['url']).'">';    
         } 
         if($wealth_option['favicon']['url'] !=''){ 
            echo "\n\t".'<link rel="apple-touch-icon" href="'.($wealth_option['apple_icon']['url']).'">';    
         } 
         if($wealth_option['favicon']['url'] !=''){ 
            echo "\n\t".'<link rel="apple-touch-icon" sizes="72x72" href="'.($wealth_option['apple_icon_72']['url']).'">';    
         } 
         if($wealth_option['favicon']['url'] !=''){ 
            echo "\n\t".'<link rel="apple-touch-icon" sizes="114x114" href="'.($wealth_option['apple_icon_114']['url']).'">';    
         } 
    } 
}
endif;

/**
* Code Visual Compurso.
* Add new Param in Row
**/
require_once get_template_directory() . '/shortcodes.php';
require_once get_template_directory() . '/vc_shortcode.php';
if(function_exists('vc_add_param')){
vc_add_param('vc_row',array(
                              "type" => "dropdown",
                              "heading" => esc_html__('Fullwidth', 'wealth'),
                              "param_name" => "fullwidth",
                              "value" => array(   
                                                esc_html__('No', 'wealth') => 'no',  
                                                esc_html__('Yes', 'wealth') => 'yes',                                                                                
                                              ),
                              "description" => esc_html__("Select Fullwidth yes or not, Default: No fullwidth", 'wealth'),      
                            ) 
    );
	
// Add new Param in Column	
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => esc_html__('Container Class', 'wealth'),
                              "param_name" => "containerclass",
                              "value" => "",
                              "description" => esc_html__("Container Class", 'wealth'),      
                            ) 
    );
	

vc_remove_param( "vc_row", "parallax" );
vc_remove_param( "vc_row", "parallax_image" );
vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "full_height" );
vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_parallax" );
vc_remove_param( "vc_row", "content_placement" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_param( "vc_row", "parallax_speed_bg" );
vc_remove_param( "vc_row", "parallax_speed_video" );
vc_remove_param( "vc_row", "equal_height" );
vc_remove_param( "vc_row", "columns_placement" );
vc_remove_param( "vc_row", "gap" );

}
//}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'wealth_theme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function wealth_theme_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // Plugin Download the http://wordpress.org
        array(
            'name'               => 'Meta Box',
            'slug'               => 'meta-box',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'                     => 'Redux Framework', // The plugin name
            'slug'                     => 'redux-framework', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
            'force_activation'   => false,
            'force_deactivation' => false,
        ),

        array(
            'name'                     => 'Contact Form 7', // The plugin name
            'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
		
		array(
            'name'                     => 'Newsletter', // The plugin name
            'slug'                     => 'newsletter', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),		

        // This is an example of how to include a plugin from an arbitrary external source in your theme.
        array(            
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/wealth/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        
        array(            
            'name'               => 'OT Portfolios', // The plugin name.
            'slug'               => 'ot_portfolio', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/wealth/ot_portfolio.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
        
        array(            
            'name'               => 'OT Testimonial', // The plugin name.
            'slug'               => 'ot_testimonial', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/wealth/ot_testimonial.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
        array(            
            'name'               => 'OT Holiday', // The plugin name.
            'slug'               => 'ot_holiday', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/wealth/ot_holiday.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => 'OT Room', // The plugin name.
            'slug'               => 'ot_room', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/wealth/ot_room.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => 'OT Services', // The plugin name.
            'slug'               => 'ot_service', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/wealth/ot_service.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => 'OT Team', // The plugin name.
            'slug'               => 'ot_team', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/wealth/ot_team.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(            
            'name'               => 'OT One Click Import Demo', // The plugin name.
            'slug'               => 'ot-themes-one-click-import', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/wealth/ot-themes-one-click-import.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}
?>