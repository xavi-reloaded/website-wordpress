<?php global $wealth_option; ?> 

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation"><!--navbar-default-->
      <!--navbar-default-->
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header"><!--navbar-header-->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-5" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand page-scroll"  href="<?php echo esc_url( home_url('/') ); ?>"> <img src="<?php echo esc_url($wealth_option['logo']['url']); ?>" alt="" class="img-responsive"> </a> </div>
        <!--/.navbar-header-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-5"> 
          <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="social-menu">
                <?php if($wealth_option['facebook']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['facebook']); ?>"><i class="fa fa-facebook-square"></i></a>                                    
                <?php } ?>                
                <?php if($wealth_option['twitter']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['twitter']); ?>"><i class="fa fa-twitter-square"></i></a>                                    
                <?php } ?>
                <?php if($wealth_option['rss']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['rss']); ?>"><i class="fa fa-rss-square"></i></a>                                    
                <?php } ?>
                <?php if($wealth_option['google']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['google']); ?>"><i class="fa fa-google-plus-square"></i></a>                                    
                <?php } ?>
                <?php if($wealth_option['youtube']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['youtube']); ?>"><i class="fa fa-youtube-square"></i></a>                                    
                <?php } ?>
                <?php if($wealth_option['linkedin']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['linkedin']); ?>"><i class="fa fa-linkedin-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['skype']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_attr($wealth_option['skype']); ?>"><i class="fa fa-skype"></i></a>
                <?php } ?>
                <?php if($wealth_option['dribbble']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['dribbble']); ?>"><i class="fa fa-dribbble"></i></a>
                <?php } ?>
                <?php if($wealth_option['pinterest']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['pinterest']); ?>"><i class="fa fa-pinterest-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['instagram']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['instagram']); ?>"><i class="fa fa-instagram"></i></a>
                <?php } ?>  
                <?php if($wealth_option['github']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['github']); ?>"><i class="fa fa-github-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['vimeo']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['tumblr']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['tumblr']); ?>"><i class="fa fa-tumblr-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['soundcloud']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['soundcloud']); ?>"><i class="fa fa-soundcloud"></i></a>
                <?php } ?>
                <?php if($wealth_option['behance']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['behance']); ?>"><i class="fa  fa-behance-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['lastfm']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['lastfm']); ?>"><i class="fa fa-lastfm-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['social_extended']!=''){ ?>
                    <?php echo  htmlspecialchars_decode($wealth_option['social_extended']); ?>
                <?php } ?>
            </div>
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
