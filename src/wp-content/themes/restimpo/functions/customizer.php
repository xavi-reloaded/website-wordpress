<?php
/**
 * RestImpo Theme Customizer.
 * @package RestImpo
 * @since RestImpo 2.0.0
*/

/**
 * Default values - backwards compatibility for older RestImpo versions.
 *  
*/ 
function restimpo_default_options($key) {

$restimpo_theme_options = get_option('restimpo_options');

/* Define the array of defaults */ 
$restimpo_defaults = array(
			'restimpo_css' => 'Green (default)',
      'restimpo_display_header_image' => 'Only on Homepage',
			'restimpo_page_title_width' => '50',
			'restimpo_header_menu_width' => '50',
			'restimpo_logo_url' => '',
			'restimpo_own_css' => '',
			'restimpo_display_sidebar' => 'Display',
			'restimpo_content_archives' => 'Content',
			'restimpo_display_image_post' => 'Display',
			'restimpo_display_meta_post' => 'Display',
			'restimpo_next_preview_post' => 'Display',
			'restimpo_display_image_page' => 'Display',
      'restimpo_header_facebook_link' => '',
      'restimpo_header_twitter_link' => '',
      'restimpo_header_google_link' => '',
      'restimpo_header_rss_link' => '',
			'restimpo_header_image_headline' => '',  
      'restimpo_header_image_text' => '',
			'restimpo_header_image_link_url' => '',
			'restimpo_header_image_link_text' => '',
			'restimpo_display_site_description' => 'Display',
      'restimpo_display_latest_posts' => 'Display',
      'restimpo_latest_posts_headline' => 'Latest Posts',
			'restimpo_body_google_fonts' => 'default',
			'restimpo_headings_google_fonts' => 'default',
      'restimpo_description_google_fonts' => 'default',
			'restimpo_headline_google_fonts' => 'default',
      'restimpo_headline_box_google_fonts' => 'default',
			'restimpo_postentry_google_fonts' => 'default',
			'restimpo_sidebar_google_fonts' => 'default',
			'restimpo_menu_google_fonts' => 'default',
      'restimpo_top_menu_google_fonts' => 'default' );

$restimpo_theme_options = wp_parse_args( $restimpo_theme_options, $restimpo_defaults );

if ( isset($restimpo_theme_options[$key]) ) {
return $restimpo_theme_options[$key]; } else {
return false;
}}

/**
 * Register Customizer sections and options.
 *  
*/
function restimpo_customize_register($wp_customize){

$restimpo_fonts = array(
			'default' => 'default',	
			'Abel' => 'Abel',			
			'Aclonica' => 'Aclonica',
			'Actor' => 'Actor',
			'Adamina' => 'Adamina',
			'Aldrich' => 'Aldrich',
			'Alegreya Sans' => 'Alegreya Sans',
			'Alice' => 'Alice',
			'Alike' => 'Alike',
			'Allan' => 'Allan',
			'Allerta' => 'Allerta',
      'Amarante' => 'Amarante',
			'Amaranth' => 'Amaranth',
      'Andika' => 'Andika',
			'Antic' => 'Antic',
			'Anton' => 'Anton',
			'Arimo' => 'Arimo',	
			'Artifika' => 'Artifika',
			'Arvo' => 'Arvo',
			'Bitter' => 'Bitter',
			'Brawler' => 'Brawler',
			'Buda' => 'Buda',	
      'Butcherman' => 'Butcherman',	
      'Cabin' => 'Cabin',
			'Candal' => 'Candal',
			'Cantarell' => 'Cantarell',	
      'Cherry Swash' => 'Cherry Swash',				
			'Chivo' => 'Chivo',			
			'Coda' => 'Coda',	
      'Concert One' => 'Concert One',		
			'Copse' => 'Copse',
			'Corben' => 'Corben',
			'Cousine' => 'Cousine',			
			'Coustard' => 'Coustard',
			'Covered By Your Grace' => 'Covered By Your Grace',
			'Crafty Girls' => 'Crafty Girls',
			'Crimson Text' => 'Crimson Text',
			'Crushed' => 'Crushed',
			'Cuprum' => 'Cuprum',
			'Damion' => 'Damion',
			'Dancing Script' => 'Dancing Script',
			'Dawning of a New Day' => 'Dawning of a New Day',
			'Days One' => 'Days One',
			'Delius' => 'Delius',
			'Delius Swash Caps' => 'Delius Swash Caps',
			'Delius Unicase' => 'Delius Unicase',
			'Didact Gothic' => 'Didact Gothic',
			'Dorsa' => 'Dorsa',
			'Dosis' => 'Dosis',
			'Droid Sans' => 'Droid Sans',
			'Droid Sans Mono' => 'Droid Sans Mono',
      'Droid Serif' => 'Droid Serif',
			'EB Garamond' => 'EB Garamond',
			'Expletus Sans' => 'Expletus Sans',
			'Fanwood Text' => 'Fanwood Text',
			'Federo' => 'Federo',
			'Fontdiner Swanky' => 'Fontdiner Swanky',
			'Forum' => 'Forum',
			'Francois One' => 'Francois One',
			'Gentium Basic' => 'Gentium Basic',
			'Gentium Book Basic' => 'Gentium Book Basic',
			'Geo' => 'Geo',
			'Geostar' => 'Geostar',
			'Geostar Fill' => 'Geostar Fill',
      'Gilda Display' => 'Gilda Display',
			'Give You Glory' => 'Give You Glory',
			'Gloria Hallelujah' => 'Gloria Hallelujah',
			'Goblin One' => 'Goblin One',
			'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
			'Gravitas One' => 'Gravitas One',
			'Gruppo' => 'Gruppo',
			'Hammersmith One' => 'Hammersmith One',
			'Hind' => 'Hind',
			'Holtwood One SC' => 'Holtwood One SC',
			'Homemade Apple' => 'Homemade Apple',
			'Inconsolata' => 'Inconsolata',
			'Indie Flower' => 'Indie Flower',
      'IM Fell English' => 'IM Fell English',
			'Irish Grover' => 'Irish Grover',
			'Irish Growler' => 'Irish Growler',
			'Istok Web' => 'Istok Web',
			'Judson' => 'Judson',
			'Julee' => 'Julee',
			'Just Another Hand' => 'Just Another Hand',
			'Just Me Again Down Here' => 'Just Me Again Down Here',
			'Kameron' => 'Kameron',
			'Kelly Slab' => 'Kelly Slab',
			'Kenia' => 'Kenia',
			'Kranky' => 'Kranky',
			'Kreon' => 'Kreon',
			'Kristi' => 'Kristi',
			'La Belle Aurore' => 'La Belle Aurore',
      'Lato' => 'Lato',
			'League Script' => 'League Script',
			'Leckerli One' => 'Leckerli One',
			'Lekton' => 'Lekton',
      'Lily Script One' => 'Lily Script One',
			'Limelight' => 'Limelight',
			'Lobster' => 'Lobster',
			'Lobster Two' => 'Lobster Two',
			'Lora' => 'Lora',
			'Love Ya Like A Sister' => 'Love Ya Like A Sister',
			'Loved by the King' => 'Loved by the King',
      'Lovers Quarrel' => 'Lovers Quarrel',
			'Luckiest Guy' => 'Luckiest Guy',
			'Maiden Orange' => 'Maiden Orange',
			'Mako' => 'Mako',
			'Marvel' => 'Marvel',
			'Maven Pro' => 'Maven Pro',
			'Meddon' => 'Meddon',
			'MedievalSharp' => 'MedievalSharp',
      'Medula One' => 'Medula One',
			'Megrim' => 'Megrim',
			'Merienda One' => 'Merienda One',
			'Merriweather' => 'Merriweather',
			'Metrophobic' => 'Metrophobic',
			'Michroma' => 'Michroma',
			'Miltonian Tattoo' => 'Miltonian Tattoo',
			'Miltonian' => 'Miltonian',
			'Modern Antiqua' => 'Modern Antiqua',
			'Molengo' => 'Molengo',
      'Monofett' => 'Monofett',
			'Monoton' => 'Monoton',
      'Montaga' => 'Montaga',
			'Montez' => 'Montez',
      'Montserrat' => 'Montserrat',
			'Mountains of Christmas' => 'Mountains of Christmas',
			'Muli' => 'Muli',
			'Neucha' => 'Neucha',
			'Neuton' => 'Neuton',
			'News Cycle' => 'News Cycle',
			'Nixie One' => 'Nixie One',
			'Nobile' => 'Nobile',
			'Noto Sans' => 'Noto Sans',
			'Nova Cut' => 'Nova Cut',
			'Nova Flat' => 'Nova Flat',
			'Nova Mono' => 'Nova Mono',
			'Nova Oval' => 'Nova Oval',
			'Nova Round' => 'Nova Round',
			'Nova Script' => 'Nova Script',
			'Nova Slim' => 'Nova Slim',
			'Nova Square' => 'Nova Square',
			'Numans' => 'Numans',
			'Nunito' => 'Nunito',
      'Open Sans' => 'Open Sans',
			'Oswald' => 'Oswald',
			'Over the Rainbow' => 'Over the Rainbow',
			'Ovo' => 'Ovo',
			'Oxygen' => 'Oxygen',
			'Pacifico' => 'Pacifico',
			'Passero One' => 'Passero One',
			'Passion One' => 'Passion One',
			'Patrick Hand' => 'Patrick Hand',
			'Paytone One' => 'Paytone One',
			'Permanent Marker' => 'Permanent Marker',
			'Philosopher' => 'Philosopher',
			'Play' => 'Play',
			'Playfair Display' => 'Playfair Display',
			'Podkova' => 'Podkova',
			'Poller One' => 'Poller One',
			'Pompiere' => 'Pompiere',
			'Prata' => 'Prata',
			'Prociono' => 'Prociono',
			'PT Sans' => 'PT Sans',
			'PT Sans Caption' => 'PT Sans Caption',
			'PT Sans Narrow' => 'PT Sans Narrow',
			'PT Serif' => 'PT Serif',
			'PT Serif Caption' => 'PT Serif Caption',
			'Puritan' => 'Puritan',
			'Quattrocento' => 'Quattrocento',
			'Quattrocento Sans' => 'Quattrocento Sans',
			'Questrial' => 'Questrial',
			'Radley' => 'Radley',
			'Raleway' => 'Raleway', 
      'Rationale' => 'Rationale',
			'Redressed' => 'Redressed',
      'Reenie Beanie' => 'Reenie Beanie', 
      'Roboto' => 'Roboto',
      'Roboto Condensed' => 'Roboto Condensed',
			'Rock Salt' => 'Rock Salt',
			'Rochester' => 'Rochester',
			'Rokkitt' => 'Rokkitt',
			'Rosario' => 'Rosario',
			'Ruslan Display' => 'Ruslan Display',
      'Sancreek' => 'Sancreek',
			'Sansita One' => 'Sansita One',
			'Schoolbell' => 'Schoolbell',
			'Shadows Into Light' => 'Shadows Into Light',
			'Shanti' => 'Shanti',
			'Short Stack' => 'Short Stack',
			'Sigmar One' => 'Sigmar One',
			'Six Caps' => 'Six Caps',
			'Slackey' => 'Slackey',
			'Smokum' => 'Smokum',
			'Smythe' => 'Smythe',
			'Sniglet' => 'Sniglet',
			'Snippet' => 'Snippet',
			'Sorts Mill Goudy' => 'Sorts Mill Goudy',
			'Special Elite' => 'Special Elite',
			'Spinnaker' => 'Spinnaker',
			'Stardos Stencil' => 'Stardos Stencil',
			'Sue Ellen Francisco' => 'Sue Ellen Francisco',
			'Sunshiney' => 'Sunshiney',
			'Swanky and Moo Moo' => 'Swanky and Moo Moo',
			'Syncopate' => 'Syncopate',
			'Tangerine' => 'Tangerine',
			'Tenor Sans' => 'Tenor Sans',
			'Terminal Dosis Light' => 'Terminal Dosis Light',
			'Tinos' => 'Tinos',
			'Titillium Web' => 'Titillium Web',
			'Tulpen One' => 'Tulpen One',
			'Ubuntu' => 'Ubuntu',
			'Ultra' => 'Ultra',
      'UnifrakturCook' => 'UnifrakturCook',
			'UnifrakturMaguntia' => 'UnifrakturMaguntia',
      'Unkempt' => 'Unkempt',
			'Unna' => 'Unna',
			'Varela' => 'Varela',
			'Varela Round' => 'Varela Round',
			'Vibur' => 'Vibur',
			'Vidaloka' => 'Vidaloka',
			'Volkhov' => 'Volkhov',
			'Vollkorn' => 'Vollkorn',
			'Voltaire' => 'Voltaire',
			'VT323' => 'VT323',
			'Waiting for the Sunrise' => 'Waiting for the Sunrise',
			'Wallpoet' => 'Wallpoet',
			'Walter Turncoat' => 'Walter Turncoat',
			'Wire One' => 'Wire One',
			'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
			'Yellowtail' => 'Yellowtail',
			'Yeseva One' => 'Yeseva One',
			'Zeyada' => 'Zeyada');
      
/**
 * Textarea custom control.
 *  
*/ 
class restimpo_customize_textarea_control extends WP_Customize_Control {
    public $type = 'textarea'; 
    public function render_content() { ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
<?php }}

/**
 * Sections and Options.
 *  
*/     
    $wp_customize->add_section('restimpo_general_settings', array(
        'title'    => __('RestImpo General Settings', 'restimpo'),
        'description' => '',
        'priority' => 120,
    ));
    $wp_customize->add_section('restimpo_header_settings', array(
        'title'    => __('RestImpo Header Settings', 'restimpo'),
        'description' => '',
        'priority' => 130,
    ));
    $wp_customize->add_section('restimpo_posts_settings', array(
        'title'    => __('RestImpo Posts/Pages Settings', 'restimpo'),
        'description' => '',
        'priority' => 140,
    ));
    $wp_customize->add_section('restimpo_homepage_settings', array(
        'title'    => __('RestImpo Homepage/Blog Page Settings', 'restimpo'),
        'description' => '',
        'priority' => 150,
    ));
    $wp_customize->add_section('restimpo_font_settings', array(
        'title'    => __('RestImpo Font Settings', 'restimpo'),
        'description' => '',
        'priority' => 160,
    ));     
 
    //  =============================
    //  = Color Scheme              =
    //  =============================
    $wp_customize->add_setting('restimpo_css', array(
        'default'        => restimpo_default_options('restimpo_css'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_css_control', array(
        'label'      => __('Color Scheme', 'restimpo'),
        'section'    => 'restimpo_general_settings',
        'settings'   => 'restimpo_css',
        'type'       => 'radio',
        'choices'    => array(
            'Green (default)' => __( 'Green (default)' , 'restimpo' ),
            'Brown' => __( 'Brown' , 'restimpo' ),
            'Forest' => __( 'Forest' , 'restimpo' ),
            'Lime' => __( 'Lime' , 'restimpo' ),
            'Pink' => __( 'Pink' , 'restimpo' ),
            'Tan' => __( 'Tan' , 'restimpo' ),
        ),
    ));
    
    //  ==================================
    //  = Display Sidebar                =
    //  ==================================
    $wp_customize->add_setting('restimpo_display_sidebar', array(
        'default'        => restimpo_default_options('restimpo_display_sidebar'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_display_sidebar_control', array(
        'label'      => __('Display Sidebar', 'restimpo'),
        'section'    => 'restimpo_general_settings',
        'settings'   => 'restimpo_display_sidebar',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'restimpo' ),
            'Hide' => __( 'Hide' , 'restimpo' ),
        ),
    ));
    
    //  ===============================
    //  = Content/Excerpt Displaying  =
    //  ===============================
    $wp_customize->add_setting('restimpo_content_archives', array(
        'default'        => restimpo_default_options('restimpo_content_archives'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_content_archives_control', array(
        'label'      => __('Content/Excerpt Displaying', 'restimpo'),
        'section'    => 'restimpo_general_settings',
        'settings'   => 'restimpo_content_archives',
        'type'       => 'radio',
        'choices'    => array(
            'Content' => __( 'Content' , 'restimpo' ),
            'Excerpt' => __( 'Excerpt' , 'restimpo' ),
        ),
    ));
    
    //  =============================
    //  = Excerpt Length            =
    //  =============================
    $wp_customize->add_setting('restimpo_excerpt_length', array(
        'default'        => '30',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_excerpt_length_control', array(
        'label'      => __('Excerpt Length (number of words)', 'restimpo'),
        'section'    => 'restimpo_general_settings',
        'settings'   => 'restimpo_excerpt_length',
    ));
    
    //  =================================
    //  = Display Scroll-top Button     =
    //  =================================
    $wp_customize->add_setting('restimpo_display_scroll_top', array(
        'default'        => 'Display',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_display_scroll_top_control', array(
        'label'      => __('Display Scroll-top Button', 'restimpo'),
        'section'    => 'restimpo_general_settings',
        'settings'   => 'restimpo_display_scroll_top',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'restimpo' ),
            'Hide' => __( 'Hide' , 'restimpo' ),
        ),
    ));
    
    //  ==================================
    //  = Display Header Image           =
    //  ==================================
    $wp_customize->add_setting('restimpo_display_header_image', array(
        'default'        => restimpo_default_options('restimpo_display_header_image'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_display_header_image_control', array(
        'label'      => __('Display Header Image', 'restimpo'),
        'section'    => 'restimpo_header_settings',
        'settings'   => 'restimpo_display_header_image',
        'type'       => 'radio',
        'choices'    => array(
            'Only on Homepage' => __( 'Only on Homepage' , 'restimpo' ),
            'Everywhere' => __( 'Everywhere' , 'restimpo' ),
        ),
    ));
    
    //  =================================
    //  = Title Box/Logo width          =
    //  =================================
    $wp_customize->add_setting('restimpo_page_title_width', array(
        'default'        => restimpo_default_options('restimpo_page_title_width'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_page_title_width_control', array(
        'label'      => __('Title Box/Logo width', 'restimpo'),
        'section'    => 'restimpo_header_settings',
        'settings'   => 'restimpo_page_title_width',
        'type'       => 'radio',
        'choices'    => array(
            '100' => '100%',
            '90' => '90%',
            '80' => '80%',
            '70' => '70%',
            '60' => '60%',
            '50' => '50%',
            '40' => '40%',
            '30' => '30%',
            '20' => '20%',
            '10' => '10%',
            '0' => '0%',
        ),
    ));
    
    //  =================================
    //  = Menu Box width                =
    //  =================================
    $wp_customize->add_setting('restimpo_header_menu_width', array(
        'default'        => restimpo_default_options('restimpo_header_menu_width'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_header_menu_width_control', array(
        'label'      => __('Main Header Menu Box width', 'restimpo'),
        'section'    => 'restimpo_header_settings',
        'settings'   => 'restimpo_header_menu_width',
        'type'       => 'radio',
        'choices'    => array(
            '100' => '100%',
            '90' => '90%',
            '80' => '80%',
            '70' => '70%',
            '60' => '60%',
            '50' => '50%',
            '40' => '40%',
            '30' => '30%',
            '20' => '20%',
            '10' => '10%',
            '0' => '0%',
        ),
    ));
    
    //  =============================
    //  = Header Logo               =
    //  =============================
    $wp_customize->add_setting('restimpo_logo_url', array(
        'default'        => restimpo_default_options('restimpo_logo_url'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_uri',
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'restimpo_logo_url_control', array(
        'label'    => __('Header Logo', 'restimpo'),
        'section'  => 'restimpo_header_settings',
        'settings' => 'restimpo_logo_url',
    )));
    
    //  =============================
    //  = Facebook Link             =
    //  =============================
    $wp_customize->add_setting('restimpo_header_facebook_link', array(
        'default'        => restimpo_default_options('restimpo_header_facebook_link'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_uri',
    ));
 
    $wp_customize->add_control('restimpo_header_facebook_link_control', array(
        'label'      => __('Facebook Link', 'restimpo'),
        'section'    => 'restimpo_header_settings',
        'settings'   => 'restimpo_header_facebook_link',
    ));
    
    //  =============================
    //  = Twitter Link              =
    //  =============================
    $wp_customize->add_setting('restimpo_header_twitter_link', array(
        'default'        => restimpo_default_options('restimpo_header_twitter_link'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_uri',
    ));
 
    $wp_customize->add_control('restimpo_header_twitter_link_control', array(
        'label'      => __('Twitter Link', 'restimpo'),
        'section'    => 'restimpo_header_settings',
        'settings'   => 'restimpo_header_twitter_link',
    ));
    
    //  =============================
    //  = Google+ Link              =
    //  =============================
    $wp_customize->add_setting('restimpo_header_google_link', array(
        'default'        => restimpo_default_options('restimpo_header_google_link'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_uri',
    ));
 
    $wp_customize->add_control('restimpo_header_google_link_control', array(
        'label'      => __('Google+ Link', 'restimpo'),
        'section'    => 'restimpo_header_settings',
        'settings'   => 'restimpo_header_google_link',
    ));
    
    //  =============================
    //  = RSS Link                  =
    //  =============================
    $wp_customize->add_setting('restimpo_header_rss_link', array(
        'default'        => restimpo_default_options('restimpo_header_rss_link'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_uri',
    ));
 
    $wp_customize->add_control('restimpo_header_rss_link_control', array(
        'label'      => __('RSS Link', 'restimpo'),
        'section'    => 'restimpo_header_settings',
        'settings'   => 'restimpo_header_rss_link',
    ));
    
    //  ==========================================
    //  = Display Featured Image on single posts =
    //  ==========================================
    $wp_customize->add_setting('restimpo_display_image_post', array(
        'default'        => restimpo_default_options('restimpo_display_image_post'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_display_image_post_control', array(
        'label'      => __('Display Featured Image on single posts', 'restimpo'),
        'section'    => 'restimpo_posts_settings',
        'settings'   => 'restimpo_display_image_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'restimpo' ),
            'Hide' => __( 'Hide' , 'restimpo' ),
        ),
    ));
    
    //  ====================================
    //  = Display Meta Box on single posts =
    //  ====================================
    $wp_customize->add_setting('restimpo_display_meta_post', array(
        'default'        => restimpo_default_options('restimpo_display_meta_post'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_display_meta_post_control', array(
        'label'      => __('Display Meta Box on posts', 'restimpo'),
        'section'    => 'restimpo_posts_settings',
        'settings'   => 'restimpo_display_meta_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'restimpo' ),
            'Hide' => __( 'Hide' , 'restimpo' ),
        ),
    ));
    
    //  =================================
    //  = Next/Previous Post Navigation =
    //  =================================
    $wp_customize->add_setting('restimpo_next_preview_post', array(
        'default'        => restimpo_default_options('restimpo_next_preview_post'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_next_preview_post_control', array(
        'label'      => __('Display Next/Previous Post Navigation on single posts', 'restimpo'),
        'section'    => 'restimpo_posts_settings',
        'settings'   => 'restimpo_next_preview_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'restimpo' ),
            'Hide' => __( 'Hide' , 'restimpo' ),
        ),
    ));
    
    //  ==========================================
    //  = Display Featured Image on pages        =
    //  ==========================================
    $wp_customize->add_setting('restimpo_display_image_page', array(
        'default'        => restimpo_default_options('restimpo_display_image_page'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_display_image_page_control', array(
        'label'      => __('Display Featured Image on pages', 'restimpo'),
        'section'    => 'restimpo_posts_settings',
        'settings'   => 'restimpo_display_image_page',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'restimpo' ),
            'Hide' => __( 'Hide' , 'restimpo' ),
        ),
    ));
    
    //  =============================
    //  = Header Image Headline     =
    //  =============================
    $wp_customize->add_setting('restimpo_header_image_headline', array(
        'default'        => restimpo_default_options('restimpo_header_image_headline'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_header_image_headline_control', array(
        'label'      => __('Homepage Header Image Headline', 'restimpo'),
        'section'    => 'restimpo_homepage_settings',
        'settings'   => 'restimpo_header_image_headline',
    ));
    
    //  =============================
    //  = Header Image Text         =
    //  =============================
    $wp_customize->add_setting('restimpo_header_image_text', array(
        'default'        => restimpo_default_options('restimpo_header_image_text'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control( new restimpo_customize_textarea_control($wp_customize, 'restimpo_header_image_text_control', array(
        'label'    => __('Homepage Header Image Text', 'restimpo'),
        'section'  => 'restimpo_homepage_settings',
        'settings' => 'restimpo_header_image_text',
    )));
    
    //  =============================
    //  = Header Image Link URL     =
    //  =============================
    $wp_customize->add_setting('restimpo_header_image_link_url', array(
        'default'        => restimpo_default_options('restimpo_header_image_link_url'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_uri',
    ));
 
    $wp_customize->add_control('restimpo_header_image_link_url_control', array(
        'label'      => __('Homepage Header Image Link URL', 'restimpo'),
        'section'    => 'restimpo_homepage_settings',
        'settings'   => 'restimpo_header_image_link_url',
    ));
    
    //  =============================
    //  = Header Image Link Text    =
    //  =============================
    $wp_customize->add_setting('restimpo_header_image_link_text', array(
        'default'        => restimpo_default_options('restimpo_header_image_link_text'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_header_image_link_text_control', array(
        'label'      => __('Homepage Header Image Link Text', 'restimpo'),
        'section'    => 'restimpo_homepage_settings',
        'settings'   => 'restimpo_header_image_link_text',
    ));
    
    //  ====================================
    //  = Display Site Description         =
    //  ====================================
    $wp_customize->add_setting('restimpo_display_site_description', array(
        'default'        => restimpo_default_options('restimpo_display_site_description'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_display_site_description_control', array(
        'label'      => __('Display Site Description on Latest Posts (Blog) page', 'restimpo'),
        'section'    => 'restimpo_homepage_settings',
        'settings'   => 'restimpo_display_site_description',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'restimpo' ),
            'Hide' => __( 'Hide' , 'restimpo' ),
        ),
    ));
    
    //  ====================================
    //  = Display Latest Posts             =
    //  ====================================
    $wp_customize->add_setting('restimpo_display_latest_posts', array(
        'default'        => restimpo_default_options('restimpo_display_latest_posts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_display_latest_posts_control', array(
        'label'      => __('Display Latest Posts section on Latest Posts (Blog) page', 'restimpo'),
        'section'    => 'restimpo_homepage_settings',
        'settings'   => 'restimpo_display_latest_posts',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'restimpo' ),
            'Hide' => __( 'Hide' , 'restimpo' ),
        ),
    ));
    
    //  =================================
    //  = Latest Posts section headline =
    //  =================================
    $wp_customize->add_setting('restimpo_latest_posts_headline', array(
        'default'        => restimpo_default_options('restimpo_latest_posts_headline'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_latest_posts_headline_control', array(
        'label'      => __('Latest Posts section headline', 'restimpo'),
        'section'    => 'restimpo_homepage_settings',
        'settings'   => 'restimpo_latest_posts_headline',
    ));
    
    //  ==============================
    //  = Character Set              =
    //  ==============================
    $wp_customize->add_setting('restimpo_character_set', array(
        'default'        => 'latin',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
    ));
 
    $wp_customize->add_control('restimpo_character_set_control', array(
        'label'      => __('Character Set', 'restimpo'),
        'section'    => 'restimpo_font_settings',
        'settings'   => 'restimpo_character_set',
        'type'       => 'radio',
        'choices'    => array(
            'latin' => __( 'Latin' , 'restimpo' ),
            'latin-ext' => __( 'Latin Extended' , 'restimpo' ),
            'cyrillic' => __( 'Cyrillic' , 'restimpo' ),
            'cyrillic-ext' => __( 'Cyrillic Extended' , 'restimpo' ),
            'greek' => __( 'Greek' , 'restimpo' ),
            'greek-ext' => __( 'Greek Extended' , 'restimpo' ),
            'vietnamese' => __( 'Vietnamese' , 'restimpo' ),
        ),
    ));
    
    //  =============================
    //  = Body font                 =
    //  =============================
     $wp_customize->add_setting('restimpo_body_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_body_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_body_google_fonts_control', array(
        'settings' => 'restimpo_body_google_fonts',
        'label'   => __('Body font', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  =============================
    //  = Site Title font           =
    //  =============================
     $wp_customize->add_setting('restimpo_headings_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_headings_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_headings_google_fonts_control', array(
        'settings' => 'restimpo_headings_google_fonts',
        'label'   => __('Site Title font', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  =============================
    //  = Site Description font     =
    //  =============================
     $wp_customize->add_setting('restimpo_description_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_description_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_description_google_fonts_control', array(
        'settings' => 'restimpo_description_google_fonts',
        'label'   => __('Site Description font', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  =============================
    //  = Page/Post Headlines font  =
    //  =============================
     $wp_customize->add_setting('restimpo_headline_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_headline_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_headline_google_fonts_control', array(
        'settings' => 'restimpo_headline_google_fonts',
        'label'   => __('Page/Post Headlines (h1 - h6) font', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  =========================================
    //  = RestImpo Posts Widgets headlines font =
    //  =========================================
     $wp_customize->add_setting('restimpo_headline_box_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_headline_box_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_headline_box_google_fonts_control', array(
        'settings' => 'restimpo_headline_box_google_fonts',
        'label'   => __('RestImpo Posts Widgets headlines font (in Latest Posts Homepage widget area)', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  =============================
    //  = Post Entry Headline font  =
    //  =============================
     $wp_customize->add_setting('restimpo_postentry_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_postentry_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_postentry_google_fonts_control', array(
        'settings' => 'restimpo_postentry_google_fonts',
        'label'   => __('Post Entry Headline font', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  ========================================
    //  = Sidebar/Footer Widget Headlines font =
    //  ========================================
     $wp_customize->add_setting('restimpo_sidebar_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_sidebar_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_sidebar_google_fonts_control', array(
        'settings' => 'restimpo_sidebar_google_fonts',
        'label'   => __('Sidebar/Footer Widget Headlines font', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  =============================
    //  = Main Header Menu font     =
    //  =============================
     $wp_customize->add_setting('restimpo_menu_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_menu_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_menu_google_fonts_control', array(
        'settings' => 'restimpo_menu_google_fonts',
        'label'   => __('Main Header Menu font', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  =============================
    //  = Top Header Menu font      =
    //  =============================
     $wp_customize->add_setting('restimpo_top_menu_google_fonts', array(
        'default'        => restimpo_default_options('restimpo_top_menu_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'restimpo_sanitize_text',
 
    ));
    $wp_customize->add_control( 'restimpo_top_menu_google_fonts_control', array(
        'settings' => 'restimpo_top_menu_google_fonts',
        'label'   => __('Top Header Menu font', 'restimpo'),
        'section' => 'restimpo_font_settings',
        'type'    => 'select',
        'choices'    => $restimpo_fonts,
    ));
    
    //  =============================
    //  = Custom CSS                =
    //  =============================
    $wp_customize->add_setting('restimpo_own_css', array(
        'default'        => restimpo_default_options('restimpo_own_css'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 
    $wp_customize->add_control( new restimpo_customize_textarea_control($wp_customize, 'restimpo_own_css_control', array(
        'label'    => __('Custom CSS', 'restimpo'),
        'section'  => 'restimpo_general_settings',
        'settings' => 'restimpo_own_css',
    )));
}

add_action('customize_register', 'restimpo_customize_register');

/**
 * Sanitize URIs
*/
function restimpo_sanitize_uri($uri) {
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}

/**
 * Sanitize Texts
*/
function restimpo_sanitize_text($str) {
	if('' === $str){
		return '';
	}
	return sanitize_text_field( $str);
} ?>