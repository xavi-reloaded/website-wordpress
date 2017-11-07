<!DOCTYPE html>   
<!--[if IE 7 ]>    <html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js"><!--<![endif]-->        
        
        
<!-- BEGIN head -->
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />

	<?php if ( of_get_option('gg_responsive') ) { ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php } ?>

        <?php if ( of_get_option('gg_favicon') ) { ?>
                  <!-- Favicon -->
                  <link rel="shortcut icon" href="<?php echo of_get_option('gg_favicon'); ?>" />
        <?php } ?>
         
        <?php if ( of_get_option('gg_google_analytics') ) {
                ?>
                <script type="text/javascript">
                <!-- Google Analytics -->
                <?php
                echo of_get_option('gg_google_analytics');  
                ?>
                </script>
        <?php } ?>
                
        <!-- Calls Wordpress head functions -->
        <?php wp_head(); ?>                

</head><!-- END head -->



<?php 
$detect = new Mobile_Detect;
if ($detect->isMobile()) {  
	$mobileclass = "mobile";
} else {
	$mobileclass = "no-mobile";
} 

if ( !of_get_option('gg_scroll_top') ) { 
	$stickyclass = "sticky-top-bar";
} else {
	$stickyclass = "no-sticky-top-bar";
}

$bodyclass = $mobileclass . " " . $stickyclass;
?>

<!-- BEGIN body -->
<body <?php body_class( $bodyclass ); ?>>

<?php do_action( 'gxg_body_hook' ); ?>

<?php if ( of_get_option('gg_scroll_top') ) { ?> <div id="page-wrap"><?php } ?>

<?php if (
        of_get_option('gg_phone') || 
        of_get_option('gg_address') || 
        ( of_get_option('gg_social_pos') == 'top' &&  ( 
        	of_get_option('gg_instagram') ||
                of_get_option('gg_foursquare') ||
                of_get_option('gg_twitter') ||
                of_get_option('gg_yelp') ||
                of_get_option('gg_tripadvisor') ||
                of_get_option('gg_fb') ||
                of_get_option('gg_flickr') ||
                of_get_option('gg_pinterest') ||
                of_get_option('gg_youtube') ||
                of_get_option('gg_googleplus') ||
                of_get_option('gg_linkedin') ||
                of_get_option('gg_skype')
        	)
        )        
) { ?>


<div id="top-bar">

	<?php if ( of_get_option('gg_social_pos') == 'top' ) { 
		get_template_part( 'template-parts/social' ); 
	} ?>
 
        <div id="topinfo">     
                <ul>
                        <?php
                        

                        if ($detect->isMobile() && of_get_option('gg_phone')  && of_get_option('gg_taptocall') ) { ?>
                                 <li><i class="fa fa-phone"></i>
                                         <a href="tel:<?php echo of_get_option('gg_taptocall'); ?>" class="phonecall"><?php echo of_get_option('gg_phone'); ?></a>
                                 </li>
                        <?php }

                        elseif (of_get_option('gg_phone') ) { ?>
                                <li><i class="fa fa-phone"></i><?php echo of_get_option('gg_phone'); ?> </li>
                        <?php } ?>

                        <?php if (of_get_option('gg_address')  && of_get_option('gg_googlemaps') ) { ?>

                        <li><i class="fa fa-map-marker"></i>
                                <a class="location" href="<?php echo of_get_option('gg_googlemaps'); ?>" target="_blank"> <?php echo of_get_option('gg_address'); ?> </a> 
                        </li>
                        <?php } 

                        elseif (of_get_option('gg_address') ) { ?>
                                <li><i class="fa fa-map-marker"></i><?php echo of_get_option('gg_address'); ?> </li>
                        <?php } ?>

                </ul>                        
        </div>       
</div>
<?php } ?>

<?php if ( !of_get_option('gg_scroll_top') ) { ?> <div id="page-wrap"> <?php } ?>

<?php if ( of_get_option('gg_bg_image_custom') ) { ?>
<div id="bg-image">
<?php } ?>

<div class="clear"></div>

<div id="wrapper">

        <div id="left">
                
                <?php if ( of_get_option('gg_logo_image') ) {
                ?><div id="logo" class="logo-regular">
                        <a href="<?php echo home_url(); ?>" > <img class="logoimage" alt="<?php bloginfo('name'); ?>" src="<?php echo of_get_option('gg_logo_image'); ?>"   <?php if ( of_get_option('gg_logo_width') ) { ?> width="<?php echo of_get_option('gg_logo_width'); ?>"<?php } ?> <?php if ( of_get_option('gg_logo_height') ) { ?> height="<?php echo of_get_option('gg_logo_height'); ?>"<?php } ?> /> </a>
                </div> <!-- #logo-->
                <?php }

                
                if ( of_get_option('gg_logo_retina') ) {
                ?><div id="logo" class="logo-retina">
                        <a href="<?php echo home_url(); ?>" > <img class="logoimage" alt="<?php bloginfo('name'); ?>" src="<?php echo of_get_option('gg_logo_retina'); ?>"   <?php if ( of_get_option('gg_logo_width') ) { ?> width="<?php echo of_get_option('gg_logo_width'); ?>"<?php } ?> <?php if ( of_get_option('gg_logo_height') ) { ?> height="<?php echo of_get_option('gg_logo_height'); ?>"<?php } ?> /> </a>
                </div> <!-- #logo-->
                <?php }  ?>


                <div id="topnavi">
                <?php
                         wp_nav_menu( array(
                                 'theme_location' => 'main-menu',
                                 'menu_class' => 'sf-menu sf-vertical regular-menu',
                                 'fallback_cb' => 'wp_page_menu',
                                 )
                         );
                ?>                       
        
                <?php
                //test if mobile device
                $detect = new Mobile_Detect;
                
                if ($detect->isMobile() ) {
                        
                         wp_nav_menu_select( array(
                                 'theme_location' => 'main-menu',
                                 'menu_class' => 'sf-menu mobile-menu',
                                 'fallback_cb' => 'wp_page_menu',
                                 )
                         );
                       
                } else {        
                         wp_nav_menu_select( array(
                                 'theme_location' => 'main-menu',
                                 'menu_class' => 'sf-menu responsive-menu',
                                 'fallback_cb' => 'wp_page_menu',
                                 )
                         );                         
                         
                } ?>        
                </div><!-- #topnavi -->
                
                <div class="clear"></div>

                <?php
                if ( of_get_option('gg_searchbar') ) { ?>
                	<div id="search-left">     
                		<?php get_template_part( 'searchform' ); ?>
                	</div>  
                <?php } ?>
 
		<?php if ( of_get_option('gg_social_pos') == 'left' ) { 
			get_template_part( 'template-parts/social' ); 
		} ?>

        </div> <!-- .left-->
        
        <div id="contentwrap">   
        
		<?php
                if( of_get_option('gg_slider') != "" && is_page_template('template-home.php') ) {                        
                ?>
                        <div id="slide-bg"> 
                                <div id="slideshow">                         
                                        <?php get_template_part( 'slider' ); ?>
                                </div><!-- #slideshow-->
                        </div><!-- #slide-bg-->    
                <?php }
                ?>

        	<div id="content">          