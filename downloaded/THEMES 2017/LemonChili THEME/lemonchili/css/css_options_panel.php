<?php

function options_panel_styles() {
        
        ?>        
        <style type="text/css">
        <?php
        
        
        /** CUSTOM STYLES (THEME OPTIONS PANEL) **/
        
        
        /* team columns */
        if ( of_get_option('gg_teamcols') == '2cols' ) {
        ?>         
		.team .box {
		    	width: 340px;
		}
                .team-thumb img {
                        max-width: 180px;
                }
                
                @media only screen and (min-width: 768px) and (max-width: 959px) {              
			.team .box {
			    	width: 460px;
			}
                }                

                @media only screen and (max-width: 767px) {              
			.team .box {
			    	width: 420px;
			}
                }  

                @media only screen and (max-width: 479px) {                
			.team .box {
			    	width: 290px;
			}
                }                  
        <?php }



        /* Navigation Menu active/hover color */
        $navicolor = of_get_option('gg_navicolor');
        
        if ( of_get_option('gg_navicolor') ) { ?>
        
        .sf-menu li a:hover,
        .sf-menu a:focus,
        .sf-menu a:hover,
        .sf-menu a:active,
        .sf-menu ul a:hover,
        .sfHover a, li.sfHover a,
        .sf-menu li.selected a,
        .sf-menu li.current-cat a,
        .sf-menu li.current-cat-parent a,
        .sf-menu li.current_page_item a,
        .current-menu-parent a.sf-with-ul {
                background-color: <?php echo $navicolor; ?>;
        }

        .sf-menu li li {
                background-color: <?php echo $navicolor; ?>;
        } 
   
        <?php }
        
     
       
        
        /* top bar color and font size*/
        $topbarfontsize = of_get_option('gg_topbarfontsize');
        $topbariconsize = of_get_option('gg_topbariconsize');
        $topbartextcolor = of_get_option('gg_topbartextcolor');
        
        if ( of_get_option('gg_topbarfontsize') ) { ?>
        
                #top-bar {
                        font-size: <?php echo $topbarfontsize; ?>px;
                        }
                        
        <?php }
        
        if ( of_get_option('gg_topbariconsize') ) { ?>
         
                #top-bar i {
                        font-size: <?php echo $topbariconsize; ?>px;
                        }
  
        <?php }
        
        if ( of_get_option('gg_topbartextcolor') ) { ?>
        
                #topinfo,
                #topinfo a,
                #topinfo a:link,
                #topinfo a:visited {
                        color: <?php echo $topbartextcolor; ?>;
                        }
                        
        <?php }
        
        


        /* background color */
        $bg_color = of_get_option('gg_bg_color');
        
        if ( of_get_option('gg_bg_color') ) {
        ?>
                html {
                        background: <?php echo $bg_color; ?>;
                }
        <?php                                  
        }
        
        
        /* background position*/
        
        $bg_custom = of_get_option('gg_bg_image_custom', 'full');
        
        if ( of_get_option('gg_bg_image_custom') && of_get_option('gg_bg_position') == 'repeat' ) {
        ?>
                html {
                        background: url("<?php echo $bg_custom; ?>");
                        background-repeat: repeat;
                        }
        <?php
        }
        elseif ( of_get_option('gg_bg_image_custom') && of_get_option('gg_bg_position') == 'stretched' ) {
        ?>
                #bg-image {
                        background-repeat: no-repeat;
                        background-attachment:fixed;
                        background-position: center top;
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;          
                        filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='.myBackground.jpg', sizingMethod='scale');
                        -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='myBackground.jpg', sizingMethod='scale')";
                        max-width: 100%;
                        max-height: 100 %;
                        }                
        <?php
        }
        elseif ( of_get_option('gg_bg_image_custom') && of_get_option('gg_bg_position') == 'fixed' ) {
        ?>
                html{
                        background: url("<?php echo $bg_custom; ?>");
                        background-color: <?php echo $bg_color; ?>;
                        background-repeat: no-repeat;
                        background-position: center top;                
                        }
        <?php
        }
        else {
        ?>
                #bg-image {
                        background-repeat: repeat;
                }
        <?php
        }
        
        
        /* box shadow */
        if ( of_get_option('gg_shadow') && of_get_option('gg_skin') == 'light' ) {
        ?>
        #left #social,
        #logo,
        #search-left,
        #topnavi,
        #navi-icon,
        #content,
        #slide-bg
        {        
                box-shadow: 0 1px 2px rgba(30, 70, 70, 0.23);
                }
        <?php
        }
        
        if ( of_get_option('gg_shadow') && of_get_option('gg_skin') == 'dark' ) {
        ?>
        #left #social,
        #logo,
        #search-left,
        #topnavi,
        #navi-icon,
        #content,
        #slide-bg {        
                box-shadow: 0 1px 2px rgba(10, 20, 20, 0.28);
                }
        <?php
        }
        
        
        /* border radius */
        if ( of_get_option('gg_borderradius') ) {
        ?>
        #logo{
                -moz-border-radius: 4px 4px 0 0;
                border-radius: 4px 4px 0 0;
                -webkit-border-radius: 4px 4px 0 0;
                }
                
        #social {
                -moz-border-radius: 0 0 4px 4px;
                border-radius: 0 0 4px 4px;
                -webkit-border-radius: 0 0 4px 4px;
                }
                
        #content,
        #slide-bg {  
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
                }
                    
                
        <?php
                if ( !of_get_option('gg_searchbar')
                                && of_get_option('gg_social_pos') == 'top'
                                or ( !of_get_option('gg_searchbar')
                                             && !of_get_option('gg_instagram')
                                        && !of_get_option('gg_foursquare')
                                        && !of_get_option('gg_twitter')
                                        && !of_get_option('gg_yelp')
                                        && !of_get_option('gg_fb')
                                        && !of_get_option('gg_pinterest')                
                                        && !of_get_option('gg_flickr')                    
                                        && !of_get_option('gg_googleplus') 
                                )
                ) {
                ?>                
                        #topnavi {
                                border-radius: 0 0 4px 4px;
                        }
                <?php
                } 
        
                if ( of_get_option('gg_social_pos') == 'top'
                                or (
                                        !of_get_option('gg_instagram')
                                        && !of_get_option('gg_foursquare')
                                        && !of_get_option('gg_twitter')
                                        && !of_get_option('gg_yelp')
                                        && !of_get_option('gg_fb')
                                        && !of_get_option('gg_pinterest')                
                                        && !of_get_option('gg_flickr')                    
                                        && !of_get_option('gg_googleplus') 
                                )
                ) {
                ?>                
                        #search-left {
                                border-radius: 0 0 0 4px;
                        }
                <?php
                }               
        
        }
        
        
        
        /* left content and top bar scrollable */
        ?>
        @media only screen and (min-width: 768px) and (max-width: 9999px) {
                
                <?php if ( of_get_option('gg_scroll') ) { ?>
               
               		#left {        
	                        position: relative;
	                        top: 0 !important;
	                        z-index: 99;
	                        }

	                #contentwrap {        
	                        margin-left: 20px;
	                        }        
                        
                <?php } ?>

                <?php if ( of_get_option('gg_scroll_top') ) { ?>
               
               		.stickytop {        
	                        position: relative;
	                        }

	                #wrapper {
	                	margin-top: 20px !important;
		                }      
                        
                <?php } ?>
        }
        <?php
        










        
        /* center logo*/
        $logo_width = of_get_option('gg_logo_width');
        
        if ( of_get_option('gg_logo_width') ) {
        ?>
                .centerwrap {
                        width: <?php echo $logo_width; ?>px;
                }
        <?php
        }
        
        
        
        /* copyrightcolor */
        $colorpicker = of_get_option('gg_copyright_colorpicker');
        if ( of_get_option('gg_copyright_colorpicker') ) {
        ?>
        #copyright
                 {
                 color: <?php echo $colorpicker; ?>;
                 }
        <?php
        }
        
        
        
        /* color */
        $color = of_get_option('gg_link_color');
        if ( of_get_option('gg_link_color') ) {
        ?>
        a, 
        a:active,
        a:visited,
        h1 a:hover, h1 a:active,
        h2 a:hover, h2 a:active,
        h3 a:hover, h3 a:active,
        h4 a:hover, h4 a:active,
        h5 a:hover, h5 a:active,
        h6 a:hover, h6 a:active,
        #footer-widget-area a:hover,
        #footer-widget-area a:active,
        
        #topinfo a:hover,
        #topinfo a:active,
        
        .sf-menu ul li a:hover,
        
        #topnavi .sbOptions a:hover,
        #topnavi .sbOptions a:focus,
        #topnavi .sbOptions a.sbFocus,
        
        .tags a:hover,
        .comment-nr a:hover,
        ul.single-postinfo li a:hover,
        
        li.author a:hover
                {
                color: <?php echo $color; ?>;
                }
        
        
        .button1,
        .buttonS,
        .highlight1,
        .highlight2,
        ul.tabs li a,
        .pagination_main a:hover,
        .pagination_main .current,
        span.page-numbers,
        a.page-numbers:hover,
        li.comment .reply,
        #submit,
        .moretext,
        .gallery-resize-icon
                {
                background-color: <?php echo $color; ?>;
                }
                   
        a:hover.nivo-nextNav,
        a:hover.nivo-prevNav,
        .nivo-caption p
                {
                background-color: <?php echo $color; ?>;
                }         
        
        .nivo-caption p
                {
                box-shadow: 10px 0 0 <?php echo $color; ?>, -11px 0 0 <?php echo $color; ?>;
                }  
        
        .sticky {
                border-bottom: 6px solid <?php echo $color; ?>;
                border-top: 6px solid <?php echo $color; ?>;
                }
        
        <?php
        }
        
        
        
        /* colorpicker */
        $colorpicker = of_get_option('gg_link_colorpicker');
        if ( of_get_option('gg_link_colorpicker') ) {
        ?>
        a, 
        a:active,
        a:visited,
        h1 a:hover, h1 a:active,
        h2 a:hover, h2 a:active,
        h3 a:hover, h3 a:active,
        h4 a:hover, h4 a:active,
        h5 a:hover, h5 a:active,
        h6 a:hover, h6 a:active,
        #footer-widget-area a:hover,
        #footer-widget-area a:active,
        
        #topinfo a:hover,
        #topinfo a:active,
        
        .sf-menu ul li a:hover,
        
        #topnavi .sbOptions a:hover,
        #topnavi .sbOptions a:focus,
        #topnavi .sbOptions a.sbFocus,
        
        .tags a:hover,
        .comment-nr a:hover,
        ul.single-postinfo li a:hover,
        
        li.author a:hover
                {
                color: <?php echo $colorpicker; ?>;
                }
        
        .button1,
        .buttonS,
        .highlight1,
        .highlight2,
        ul.tabs li a,
        .pagination_main a:hover,
        .pagination_main .current,
        span.page-numbers,
        a.page-numbers:hover,
        li.comment .reply,
        #submit,
        .moretext,
        .gallery-resize-icon
                {
                background-color: <?php echo $colorpicker; ?>;
                }           
        
        a:hover.nivo-nextNav,
        a:hover.nivo-prevNav,
        .nivo-caption p
                {
                background-color: <?php echo $colorpicker; ?> !important;
                }           
        
        .nivo-caption p
                {
                box-shadow: 10px 0 0 <?php echo $colorpicker; ?>, -10px 0 0 <?php echo $colorpicker; ?>;  
                }
                
        <?php
        }
        
        
        
        
        /* hover color */
        $hovercolor = of_get_option('gg_hovercolor');
        if ( of_get_option('gg_hovercolor') ) {
        ?>
        a:hover {
                color: <?php echo $hovercolor; ?>;
                }
        
        .button1:hover,
        .buttonS:hover,
        .moretext:hover,
        li.comment .reply:hover,
        #submit:hover {
                background-color: <?php echo $hovercolor; ?>;
                }
        <?php
        }
        
        
        
        /* font */
        $font = of_get_option('gg_font');
        $font2 = of_get_option('gg_font2');
        
        if ( of_get_option('gg_font2') ) {
        ?>
        h1, h2, h3, h4, h5, h6,
        .sf-menu a,
        .sf-menu li li a,
        #navi-icon, 
        .dropcap,
        .nivo-caption,
        .button1,
        .buttonS,
        span.reply,
        h3#reply-title,
        li.comment cite,
        .moretext,
        .events1col .event-date
                 {
                 font-family: "<?php echo $font2; ?>" , "Helvetica Neue", Arial, "sans-serif";
                 }
        <?php
        } elseif ( of_get_option('gg_font') ) {
        ?>
        h1, h2, h3, h4, h5, h6,
        .sf-menu a,
        .sf-menu li li a,
        #navi-icon, 
        .dropcap,
        .nivo-caption,
        .button1,
        .buttonS,
        span.reply,
        h3#reply-title,
        li.comment cite,
        .moretext,
        .events1col .event-date
                 {
                 font-family: "<?php echo $font; ?>" , "Helvetica Neue", Arial, "sans-serif";
                 }
        <?php
        }
        
        
        
        $trans = of_get_option('gg_trans');
        if ( of_get_option('gg_trans') ) {
        ?>
        .sf-menu a,
        #navi-icon, 
        .events1col .event-date,
        h6.menu-title,
        h6.menu-title2,
        h3.widgettitle,
        .date-h,
        .moretext,
        #search-button,
        .reply,
        #submit,
        h3#reply-title,
        li.comment cite,
        h1.title,
        h1.pagetitle,
        h1.team-title,
        #content h3.widgettitle,
        .nivo-caption,
        h1.menu-cat,
        h1.event-title,
        h1.event-title-w,
        h1.gg-gallery-title,
        h4.eventsmonth, 
        h6
                {
                text-transform: <?php echo $trans; ?>;
                }         
        <?php
        }
        
        
        
        

        if ( of_get_option('gg_fontweight') ) {
		$fontweight = of_get_option('gg_fontweight');
        } else {
        	$fontweight = 800;
	        }

        ?>
        h1, h2, h3, h4, h5, h6,
        #navi-icon, 
        .dropcap,
        .nivo-caption,
        .nivo-caption p,
        .sf-menu a,
        .sf-menu li li a,
        
        .button1,
        .buttonS,
        span.reply,
        .moretext,
        h3#reply-title,
        
        .events1col .event-date,
        h6.menu-title,
        h6.menu-title2,
        h1.gg-gallery-title,
        h3.widgettitle,
        .date-h,
        h1.title,
        h1.pagetitle,
        #content h3.widgettitle,
        h1.menu-cat,
        h1.event-title,
        h1.event-title-w {
                font-weight: <?php echo $fontweight; ?>;
                }
        <?php
        
        
        
        $letterspacing = of_get_option('gg_letterspacing');
        if ( of_get_option('gg_letterspacing') ) {
        ?>
        #content h3.widgettitle,
        h1.menu-cat,
        h1.pagetitle,
        .nivo-caption p 
                 {
                 letter-spacing: <?php echo $letterspacing; ?>px;
                 }         
        <?php
        }
        
        
        
        /* custom css */
        echo of_get_option('gg_custom_css');
        

        ?>
        </style>
        <?php

}
add_action( 'wp_head', 'options_panel_styles', 100 );

?>