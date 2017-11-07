<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php global $wealth_option; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wealth_custom_favicon(); ?>
	
<?php wp_head(); ?>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" <?php body_class(); ?> >

<div class="lp-header"> <!--lp-header-->
    <?php 
        if(isset($wealth_option['header_layout']) and $wealth_option['header_layout']=="header2" ){
            get_template_part('framework/headers/header2');
        }else{  
    ?>
    
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation"><!--navbar-default-->
        <!--navbar-default-->
        <div class="container"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"><!--navbar-header-->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-5" aria-expanded="false"> 
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand page-scroll"  href="<?php echo esc_url( home_url('/') ); ?>"> 
                    <?php if ($wealth_option['logo'] != ''){ ?>
                        <img src="<?php echo esc_url($wealth_option['logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" class="img-responsive">
                    <?php }else{ ?>
                         <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="img-responsive"> 
                    <?php } ?>
                </a> 
            </div>
            <!--/.navbar-header-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-5"> 
            <!-- Collect the nav links, forms, and other content for toggling -->
              
                <?php
                    $primary = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => '',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                        'walker'          => new wp_bootstrap_navwalker(),
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
                        'depth'           => 0,
                    );
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( $primary );
                    }
                ?>
            </div>
        </div>
    </nav>
    <?php } ?>
    
<!--/.navbar navbar-default--> 
</div>