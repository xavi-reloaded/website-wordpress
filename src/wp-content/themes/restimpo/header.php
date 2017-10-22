<?php
/**
 * The header template file.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width" />  
<?php if ( ! function_exists( '_wp_render_title_tag' ) ) { ?><title><?php wp_title( '|', true, 'right' ); ?></title><?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">  
<?php wp_head(); ?>  
</head>
 
<body <?php body_class(); ?> id="wrapper"> 
<header id="wrapper-header">
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( has_nav_menu( 'top-navigation' ) || get_theme_mod('restimpo_header_facebook_link', restimpo_default_options('restimpo_header_facebook_link')) != '' || get_theme_mod('restimpo_header_twitter_link', restimpo_default_options('restimpo_header_twitter_link')) != '' || get_theme_mod('restimpo_header_google_link', restimpo_default_options('restimpo_header_google_link')) != '' || get_theme_mod('restimpo_header_rss_link', restimpo_default_options('restimpo_header_rss_link')) != '' ) {  ?>
  <div class="top-navigation-wrapper">
    <div class="top-navigation">
<?php if ( has_nav_menu( 'top-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'top-nav', 'theme_location'=>'top-navigation' ) ); } ?>
      
      <div class="header-icons">
<?php if (get_theme_mod('restimpo_header_facebook_link', restimpo_default_options('restimpo_header_facebook_link')) != ''){ ?>
        <a class="social-icon facebook-icon" target="_blank" href="<?php echo esc_url(get_theme_mod('restimpo_header_facebook_link', restimpo_default_options('restimpo_header_facebook_link'))); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-facebook.png" alt="Facebook" /></a>
<?php } ?>
<?php if (get_theme_mod('restimpo_header_twitter_link', restimpo_default_options('restimpo_header_twitter_link')) != ''){ ?>
        <a class="social-icon twitter-icon" target="_blank" href="<?php echo esc_url(get_theme_mod('restimpo_header_twitter_link', restimpo_default_options('restimpo_header_twitter_link'))); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-twitter.png" alt="Twitter" /></a>
<?php } ?>
<?php if (get_theme_mod('restimpo_header_google_link', restimpo_default_options('restimpo_header_google_link')) != ''){ ?>
        <a class="social-icon google-icon" target="_blank" href="<?php echo esc_url(get_theme_mod('restimpo_header_google_link', restimpo_default_options('restimpo_header_google_link'))); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-google.png" alt="Google +" /></a>
<?php } ?>
<?php if (get_theme_mod('restimpo_header_rss_link', restimpo_default_options('restimpo_header_rss_link')) != ''){ ?>
        <a class="social-icon rss-icon" target="_blank" href="<?php echo esc_url(get_theme_mod('restimpo_header_rss_link', restimpo_default_options('restimpo_header_rss_link'))); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-rss.png" alt="RSS" /></a>
<?php } ?>
      </div>
    </div>
  </div>
<?php }} ?>
  
  <div class="header-content-wrapper">
    <div class="header-content">
      <div class="title-box">
<?php if ( get_theme_mod('restimpo_logo_url', restimpo_default_options('restimpo_logo_url')) == '' ) { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url(get_theme_mod('restimpo_logo_url', restimpo_default_options('restimpo_logo_url'))); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
      </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
      <div class="menu-box">
<?php if ( has_nav_menu( 'main-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); } ?>
      </div>
<?php } ?>
    </div>
  </div>
<?php if ( is_home() || is_front_page() ) { ?> 
<?php if ( get_header_image() != '' ) { ?> 
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    <div class="header-image-container">
    <div class="header-image-text-wrapper">
      <div class="header-image-text">
<?php if ( get_theme_mod('restimpo_header_image_headline', restimpo_default_options('restimpo_header_image_headline')) != '' ) { ?>
        <p class="header-image-headline"><?php echo esc_attr(get_theme_mod('restimpo_header_image_headline', restimpo_default_options('restimpo_header_image_headline'))); ?></p>
<?php } if ( get_theme_mod('restimpo_header_image_text', restimpo_default_options('restimpo_header_image_text')) != '' ) { ?>
        <p class="header-image-info"><?php echo esc_attr(get_theme_mod('restimpo_header_image_text', restimpo_default_options('restimpo_header_image_text'))); ?></p>
<?php } if ( get_theme_mod('restimpo_header_image_link_url', restimpo_default_options('restimpo_header_image_link_url')) != '' || get_theme_mod('restimpo_header_image_link_text', restimpo_default_options('restimpo_header_image_link_text')) != '' ) { ?>
        <a class="header-image-link" href="<?php echo esc_url(get_theme_mod('restimpo_header_image_link_url', restimpo_default_options('restimpo_header_image_link_url'))); ?>"><span><?php echo esc_attr(get_theme_mod('restimpo_header_image_link_text', restimpo_default_options('restimpo_header_image_link_text'))); ?></span></a>
<?php } ?>
      </div>
    </div>
    </div>
  </div>
<?php }} else { ?>
<?php if ( get_theme_mod('restimpo_display_header_image', restimpo_default_options('restimpo_display_header_image')) == 'Everywhere' && get_header_image() != '' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
  </div>
<?php }} ?>
<?php if ( is_home() && get_theme_mod('restimpo_display_site_description', restimpo_default_options('restimpo_display_site_description')) != 'Hide' ) { ?>  
  <div class="header-description-wrapper">
    <div class="header-description">
      <h1><?php bloginfo( 'description' ); ?></h1>
    </div>
  </div>
<?php } ?>
</header> <!-- end of wrapper-header -->