<?php

function options_responsive_styles() { ?>

        <style type="text/css">
        
        /** CUSTOM STYLES RESPONSIVE (THEME OPTIONS PANEL) **/

        <?php
        //test if mobile device
        $detect = new Mobile_Detect;
        
        if ($detect->isMobile() ) { 
        
                /* color */
                $color = of_get_option('gg_link_color');
                if ( of_get_option('gg_link_color') ) {
                ?>
                
                        /* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
                        @media only screen and (max-width: 767px) {
                                
                                #topinfo a,
                                #topinfo a:link,
                                #topinfo a:visited
                                         {
                                         color: <?php echo $color; ?>;
                                         }
                        }
                
                <?php
                }
                
                /* colorpicker */
                $colorpicker = of_get_option('gg_link_colorpicker');
                if ( of_get_option('gg_link_colorpicker') ) {
                ?>
                
                        /* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
                        @media only screen and (max-width: 767px) {
                                
                                #topinfo a,
                                #topinfo a:link,
                                #topinfo a:visited
                                         {
                                         color: <?php echo $colorpicker; ?>;
                                         }
                        }
                   
                <?php
                }
                
        }           
        ?>

        </style>
        
<?php }

add_action( 'wp_head', 'options_responsive_styles', 100 );

?>