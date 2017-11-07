<div class="loading-spinner">
        <i class="fa fa-spinner fa-spin"></i>
</div>

<div id="slider" class="nivoSlider">
        
        <?php
        
                if ( of_get_option('gg_slider') && of_get_option('gg_sliderimages') ) { 
                        
                        global $wpdb, $post;
                        
                        $slider = of_get_option('gg_sliderimages');

                        $images = rwmb_meta( 'gxg_slider_images', 'size=slider', $slider );

                        if ( !empty( $images ) ) {

	                        foreach ( $images as $image ) {

	                                $caption = $image['slidercaption'];
	                                $caption = htmlspecialchars($caption, ENT_QUOTES);

	                                $cf = $image['sliderurl'];

	                                if ($cf) {    
	                                echo "<a href='$cf'><img src='{$image['url']}' alt='{$image['alt']}' title='$caption' /></a>";
	                                } else {    
	                                echo "<img src='{$image['url']}' alt='{$image['alt']}' title='$caption' />";
	                                }
	                                
	                        } 
                        }
                }      
        ?>
</div><!-- .slider-->