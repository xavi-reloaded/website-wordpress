<?php
/**
 * Headerdata of Theme options.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/  

// additional js and css
if(!is_admin()){
function restimpo_fonts_include () {
// Google Fonts
$bodyfont = get_theme_mod('restimpo_body_google_fonts', restimpo_default_options('restimpo_body_google_fonts'));
$headingfont = get_theme_mod('restimpo_headings_google_fonts', restimpo_default_options('restimpo_headings_google_fonts'));
$descriptionfont = get_theme_mod('restimpo_description_google_fonts', restimpo_default_options('restimpo_description_google_fonts'));
$headlinefont = get_theme_mod('restimpo_headline_google_fonts', restimpo_default_options('restimpo_headline_google_fonts'));
$headlineboxfont = get_theme_mod('restimpo_headline_box_google_fonts', restimpo_default_options('restimpo_headline_box_google_fonts'));
$postentryfont = get_theme_mod('restimpo_postentry_google_fonts', restimpo_default_options('restimpo_postentry_google_fonts'));
$sidebarfont = get_theme_mod('restimpo_sidebar_google_fonts', restimpo_default_options('restimpo_sidebar_google_fonts'));
$menufont = get_theme_mod('restimpo_menu_google_fonts', restimpo_default_options('restimpo_menu_google_fonts'));
$topmenufont = get_theme_mod('restimpo_top_menu_google_fonts', restimpo_default_options('restimpo_top_menu_google_fonts'));

$fonturl = "//fonts.googleapis.com/css?family=";
$character_set = "&amp;subset=" . get_theme_mod('restimpo_character_set', 'latin');

$bodyfonturl = $fonturl.$bodyfont.$character_set;
$headingfonturl = $fonturl.$headingfont.$character_set;
$descriptionfonturl = $fonturl.$descriptionfont.$character_set;
$headlinefonturl = $fonturl.$headlinefont.$character_set;
$headlineboxfonturl = $fonturl.$headlineboxfont.$character_set;
$postentryfonturl = $fonturl.$postentryfont.$character_set;
$sidebarfonturl = $fonturl.$sidebarfont.$character_set;
$menufonturl = $fonturl.$menufont.$character_set;
$topmenufonturl = $fonturl.$topmenufont.$character_set;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('restimpo-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('restimpo-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('restimpo-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('restimpo-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('restimpo-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('restimpo-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('restimpo-google-font8', $menufonturl);
		 }
     if ($topmenufont != 'default' && $topmenufont != ''){
      wp_enqueue_style('restimpo-google-font9', $topmenufonturl);
		 }
     if ($headlineboxfont != 'default' && $headlineboxfont != ''){
      wp_enqueue_style('restimpo-google-font10', $headlineboxfonturl); 
		 }
}
add_action( 'wp_enqueue_scripts', 'restimpo_fonts_include' );
}

// additional js and css
function restimpo_css_include () {    
    if (get_theme_mod('restimpo_css', restimpo_default_options('restimpo_css')) == 'Brown'){
			wp_enqueue_style('restimpo-style-brown', get_template_directory_uri().'/css/brown.css');
		}
    
    if (get_theme_mod('restimpo_css', restimpo_default_options('restimpo_css')) == 'Forest'){
			wp_enqueue_style('restimpo-style-forest', get_template_directory_uri().'/css/forest.css');
		}
    
    if (get_theme_mod('restimpo_css', restimpo_default_options('restimpo_css')) == 'Lime'){
			wp_enqueue_style('restimpo-style-lime', get_template_directory_uri().'/css/lime.css');
		}
    
		if (get_theme_mod('restimpo_css', restimpo_default_options('restimpo_css')) == 'Pink'){
			wp_enqueue_style('restimpo-style-pink', get_template_directory_uri().'/css/pink.css');
		}
    
    if (get_theme_mod('restimpo_css', restimpo_default_options('restimpo_css')) == 'Tan'){
			wp_enqueue_style('restimpo-style-tan', get_template_directory_uri().'/css/tan.css');
		}
}
add_action( 'wp_enqueue_scripts', 'restimpo_css_include' );

// Background color - Entry headlines
function restimpo_background_color() {
    $background_color = get_background_color(); 
		if ($background_color != '') { ?>
		<?php _e('#wrapper .entry-headline .entry-headline-text { background-color: #', 'restimpo'); ?><?php echo $background_color ?><?php _e(';}', 'restimpo'); ?>
<?php } 
}

// Display sidebar
function restimpo_display_sidebar() {
    $display_sidebar = get_theme_mod('restimpo_display_sidebar', restimpo_default_options('restimpo_display_sidebar')); 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper .container #main-content { width: 100%; }', 'restimpo'); ?>
<?php } 
}

// Title Box width
function restimpo_get_page_title_width() {
    $page_title_width = get_theme_mod('restimpo_page_title_width', restimpo_default_options('restimpo_page_title_width')); 
		if ($page_title_width != '' && $page_title_width != '50%') { ?>
		<?php _e('#wrapper #wrapper-header .title-box { width: ', 'restimpo'); ?><?php echo $page_title_width ?><?php _e('%;}', 'restimpo'); ?>
<?php } 
}

// Menu Box width
function restimpo_get_header_menu_width() {
    $header_menu_width = get_theme_mod('restimpo_header_menu_width', restimpo_default_options('restimpo_header_menu_width')); 
		if ($header_menu_width != '' && $header_menu_width != '50%') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box { width: ', 'restimpo'); ?><?php echo $header_menu_width ?><?php _e('%;}', 'restimpo'); ?>
<?php } 
}

// TEXT COLORS AND FONTS
// Body font
function restimpo_get_body_font() {
    $bodyfont = get_theme_mod('restimpo_body_google_fonts', restimpo_default_options('restimpo_body_google_fonts'));
    if ($bodyfont != 'default' && $bodyfont != '') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper .container #commentform .form-allowed-tags, #wrapper .container #commentform p, #wrapper input, #wrapper button, #wrapper select { font-family: "', 'restimpo'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// Site title font
function restimpo_get_headings_google_fonts() {
    $headingfont = get_theme_mod('restimpo_headings_google_fonts', restimpo_default_options('restimpo_headings_google_fonts')); 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #wrapper-header .site-title { font-family: "', 'restimpo'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// Site description font
function restimpo_get_description_font() {
    $descriptionfont = get_theme_mod('restimpo_description_google_fonts', restimpo_default_options('restimpo_description_google_fonts')); 
    if ($descriptionfont != 'default' && $descriptionfont != '') { ?>
    <?php _e('#wrapper #wrapper-header .header-description h1 {font-family: "', 'restimpo'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// Page/post headlines font
function restimpo_get_headlines_font() {
    $headlinefont = get_theme_mod('restimpo_headline_google_fonts', restimpo_default_options('restimpo_headline_google_fonts'));
    if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading { font-family: "', 'restimpo'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// RestImpo Posts Widgets headlines font
function restimpo_get_headline_box_google_fonts() {
    $headline_box_google_fonts = get_theme_mod('restimpo_headline_box_google_fonts', restimpo_default_options('restimpo_headline_box_google_fonts')); 
		if ($headline_box_google_fonts != 'default' && $headline_box_google_fonts != '') { ?>
		<?php _e('#wrapper .container #main-content section .entry-headline { font-family: "', 'restimpo'); ?><?php echo $headline_box_google_fonts ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// Post entry font
function restimpo_get_postentry_font() {
    $postentryfont = get_theme_mod('restimpo_postentry_google_fonts', restimpo_default_options('restimpo_postentry_google_fonts')); 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .slides li, #wrapper #main-content .home-list-posts ul li, #wrapper #main-content .home-thumbnail-posts .thumbnail-hover { font-family: "', 'restimpo'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// Sidebar and Footer widget headlines font
function restimpo_get_sidebar_widget_font() {
    $sidebarfont = get_theme_mod('restimpo_sidebar_google_fonts', restimpo_default_options('restimpo_sidebar_google_fonts'));
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'restimpo'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// Main Header menu font
function restimpo_get_menu_font() {
    $menufont = get_theme_mod('restimpo_menu_google_fonts', restimpo_default_options('restimpo_menu_google_fonts')); 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul li { font-family: "', 'restimpo'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// Top Header menu font
function restimpo_get_top_menu_font() {
    $topmenufont = get_theme_mod('restimpo_top_menu_google_fonts', restimpo_default_options('restimpo_top_menu_google_fonts')); 
		if ($topmenufont != 'default' && $topmenufont != '') { ?>
		<?php _e('#wrapper #wrapper-header .top-navigation ul li { font-family: "', 'restimpo'); ?><?php echo $topmenufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'restimpo'); ?>
<?php } 
}

// User defined CSS.
function restimpo_get_own_css() {
    $own_css = get_theme_mod('restimpo_own_css'); 
    $own_css_def = restimpo_default_options('restimpo_own_css');
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } elseif ($own_css == '' && $own_css_def != '') { echo esc_attr($own_css_def); } 
}

// Display custom CSS.
function restimpo_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php restimpo_get_own_css(); ?>
<?php restimpo_background_color(); ?>
<?php restimpo_display_sidebar(); ?>
<?php restimpo_get_page_title_width(); ?>
<?php restimpo_get_header_menu_width(); ?>
<?php restimpo_get_body_font(); ?>
<?php restimpo_get_headings_google_fonts(); ?>
<?php restimpo_get_description_font(); ?>
<?php restimpo_get_headlines_font(); ?>
<?php restimpo_get_headline_box_google_fonts(); ?>
<?php restimpo_get_postentry_font(); ?>
<?php restimpo_get_sidebar_widget_font(); ?>
<?php restimpo_get_menu_font(); ?>
<?php restimpo_get_top_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'restimpo_custom_styles');	?>