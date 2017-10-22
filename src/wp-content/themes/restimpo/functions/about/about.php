<?php
/**
 * About RestImpo admin page framework.
 * @package RestImpo
 * @since RestImpo 2.0.0
*/   

add_action('admin_init', 'restimpo_about_setup');
function restimpo_about_setup() {
$restimpo_about = array (

array( "name" => __( 'RestImpo' , 'restimpo' ),
	"type" => "title"),

array( "type" => "open"),

// Start Tabs
array( "name" => "Start Tabs",
		"type" => "tabs-open",
		"icon" => "layout"),

	// Home
	array( "name" => __( '<i class="icon_house" aria-hidden="true"></i>Welcome' , 'restimpo' ),
			"id" => "tab_menu_0",
			"type" => "tab",
			"icon" => "layout",
			"class" => " selected first"),

  // Get Premium
	array( "name" => __( '<i class="icon_cart" aria-hidden="true"></i>GET PREMIUM' , 'restimpo' ),
			"type" => "tab",
			"id" => "tab_menu_1",
			"class" => ""),
	
array( "name" => "Close Tabs",
		"type" => "tabs-close",
		"icon" => "layout"),


array( "name" => "Start Container",
		"type" => "container-open",
		"icon" => "layout"),

array( "name" => "tab_content_0",
		"type" => "tabcontent-open",
		"display" => "block",
		"icon" => "layout"),

	// Home
	array( "name" => __( 'Welcome to RestImpo!' , 'restimpo' ),
		"type" => "heading",
		"icon" => "layout"),
	
	array("name" => __( 'First of all, I would like to thank you for choosing the RestImpo theme! I firmly believe that you will be satisfied with this template.' , 'restimpo' ),
		"type" => "infotext"),
	
	array( "name" => __( 'About RestImpo' , 'restimpo' ),
		"type" => "heading",
		"icon" => "layout"),
	
	array("name" => __( 'RestImpo is an easily customizable WordPress multipurpose theme. It is a fully responsive theme that allows for easy viewing on any device. <br />Welcome to the World of <strong>Rest</strong>ricted <strong>Impo</strong>ssibilities!' , 'restimpo' ),
		"type" => "infotext"),
    
	array("name" => __( 'Since version 2.0.0, the Theme Options have been moved to the <a href="customize.php">Customizer</a>.' , 'restimpo' ),
		"type" => "infotext"),

  array( "name" => "tab_content_0",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Home

// Open Get Premium
array( "name" => "tab_content_1",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),

	array( "name" => __( 'Get RestImpo Premium Version' , 'restimpo' ),
		"type" => "heading",
		"icon" => "layout"),
		
  array( "type" => "infotext",
		"name" => __( 'If you would like to purchase the RestImpo Premium Version, you can do so on <a href="http://themes.tomastoman.cz/downloads/restimpo-premium/" target="_blank">Developers Official Website</a>.' , 'restimpo' )),
    
  array( "type" => "infotext",
		"name" => __( '<strong>What the RestImpo Premium Version offers in addition?</strong><br />
    - Drag-and-drop Page Builder with 34 default widgets for creating custom page templates<br />
    - 10 pre-defined color schemes altogether (Blue, Brown, Forest, Green, Lime, Orange, Pink, Purple, Red and Tan)<br />
    - Unlimited ability to set custom Colors<br />
    - Ability to set different Header Images for individual pages<br />
    - Homepage Header Slideshow<br />
    - Font size settings<br />
    - Related posts box on the single posts<br />
    - 5 Custom widgets for displaying the latest posts from the specific categories (as a Grid, List, Slider, Thumbnails and Default)<br />
    - RestImpo Tab Widget (displays popular posts, recent posts, comments and tags in tabbed format)<br />
    - Info-Box Custom widget<br />
    - Social networking Custom widget<br />
    - Facebook Like Box Custom widget<br />
    - Twitter Following Custom widget<br />
    - Integrated Facebook/Twitter/Google +1 share buttons on posts/pages/post entries<br />
    - Integrated automatic Sitemap generator with advanced options<br />
    - Integrated Breadcrumb Navigation<br />
    - Custom Shortcode for adding tables anywhere you like<br />
    - Custom Shortcode for displaying Google maps<br />
    - Custom Shortcode for displaying specific listing of posts anywhere you like<br />
    - 9 Custom Page templates<br />
    - Ability to add custom JavaScript code' , 'restimpo' )),
    
  array( "name" => "tab_content_1",
		"type" => "tabcontent-close",
		"icon" => "layout"),
    
// Close Get Premium

array("name" => "Close Container",
		"type" => "container-close",
		"icon" => "layout"),

array( "type" => "close") 
); return $restimpo_about; }

add_action('admin_head', 'restimpo_admin_css');

function restimpo_admin_css() { ?>
     
	<script language="JavaScript">
		jQuery.noConflict();
		jQuery(document).ready(function($) {
	
		$(".tabs .tab[id^=tab_menu]").click(function() {
			var curMenu=$(this);
			$(".tabs .tab[id^=tab_menu]").removeClass("selected");
			curMenu.addClass("selected");
	
			var index=curMenu.attr("id").split("tab_menu_")[1];
			$(".curvedContainer .tabcontent").css("display","none");
			$(".curvedContainer #tab_content_"+index).css("display","block");
		});
	});
	</script>

<?php }
function restimpo_add_admin() {
	add_theme_page( __( 'About RestImpo' , 'restimpo' ), __( 'About RestImpo' , 'restimpo' ), 'edit_theme_options', 'about.php', 'restimpo_admin', '', '1' );
}

function restimpo_admin() {
$restimpo_about = restimpo_about_setup(); 
  wp_enqueue_style('restimpo-framework-style', get_template_directory_uri() . '/functions/about/css.css');
  wp_enqueue_style('restimpo-framework-icons', get_template_directory_uri() . '/css/elegantfont.css');
  $restimpo_manualurl = get_template_directory_uri() . '/docs/documentation.html';
?>

	<div id="wrap_fm"><!-- [ Header ]-->
		<div class="header_fm">
			<div class="logo_fm"><?php _e( 'RestImpo Theme' , 'restimpo' ); ?></div>
		</div>

		<!-- [ Top Menu ]-->
		<div class="top_menu_fm">
			<a target="_blank" class="doc_fm" href="<?php echo esc_url($restimpo_manualurl); ?>"><?php _e( 'Documentation' , 'restimpo' ); ?></a><a target="_blank" class="support_fm" href="http://themes.tomastoman.cz/support"><?php _e( 'Support' , 'restimpo' ); ?></a><a target="_blank" class="premium_fm" href="http://themes.tomastoman.cz/downloads/restimpo-premium/"><?php _e( 'Get Premium Version' , 'restimpo' ); ?></a>
		</div>

	<?php 
	foreach ($restimpo_about as $value) {
	switch ( $value['type'] ) {
	case "open":
	?> 
	<?php break; case "title": ?> 

	<!-- [ Body ]-->
	<div id="wrap_body_fm">
	<div class="tabscontainer">

	<?php break; case "close": ?> 

</div></div>
	
	<?php break; case "heading":?>
	<h1><?php echo $value['name']; ?></h1>
	
	<?php break; case "subheader":?>
	<div class="name_fm"><?php echo $value['name']; ?></div>
	
  <?php break; case "infotext":?>
	<div class="infotext"><?php echo $value['name']; ?></div>
	
	<?php break; case "paragraph":?>
	<div class="desc_fm"><small><?php echo $value['name']; ?></small></div>
  	
	<?php break; case "tabs-open":?>	
	<div class="tabs">
	
	<?php break; case "tabs-close":?>	
	</div>	
	
	<?php break; case "tab":?>	
	<div class="tab<?php echo $value['class']; ?>" id="<?php echo $value['id']; ?>">
	<div class="link"><?php echo $value['name']; ?></div>
	<div class="arrow"></div>
	</div>
 	
 	<?php break; case "container-open":?>	
	<div class="curvedContainer">
 	
 	<?php break; case "container-close":?>	
	</div>	
 	
	<?php break; case "tabcontent-open":?>	
	<div class="tabcontent" id="<?php echo $value['name']; ?>" style="display:<?php echo $value['display']; ?>" >
	
	<?php break; case "tabcontent-close":?>	
	</div>
	 	
<?php break;
}
}
?>

<?php
}
add_action('admin_menu', 'restimpo_add_admin'); ?>