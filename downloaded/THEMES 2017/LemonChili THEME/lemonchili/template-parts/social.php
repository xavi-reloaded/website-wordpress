<?php if (
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
        ) { ?>            
        
        <div id="social">
                <ul id="socialicons">
                        <?php
                        if ( of_get_option('gg_fb') ) {
                        ?> <li class="fb"> <a href="<?php echo of_get_option('gg_fb'); ?>" target="_blank" > <i class="fa fa-facebook"></i> </a> </li>                        
                        <?php }

                        if ( of_get_option('gg_twitter') ) {
                        ?> <li class="twitter"> <a href="<?php echo of_get_option('gg_twitter'); ?>" target="_blank" > <i class="fa fa-twitter"></i> </a> </li>                        
                        <?php }
                        
                        if ( of_get_option('gg_googleplus') ) {
                        ?> <li class="googleplus"> <a href="<?php echo of_get_option('gg_googleplus'); ?>" target="_blank" > <i class="fa fa-google-plus"></i> </a> </li>                        
                        <?php }                                 
                        
                        if ( of_get_option('gg_yelp') ) {
                        ?> <li class="yelp"> <a href="<?php echo of_get_option('gg_yelp'); ?>" target="_blank" > <i class="fa fa-yelp"></i> </a> </li>                        
                        <?php }                                        

                        if ( of_get_option('gg_tripadvisor') ) {
                        ?> <li class="tripadvisor"> <a href="<?php echo of_get_option('gg_instagram'); ?>" target="_blank" > <i class="fa fa-tripadvisor"></i> </a> </li>                        
                        <?php }  
                        
                        if ( of_get_option('gg_instagram') ) {
                        ?> <li class="instagram"> <a href="<?php echo of_get_option('gg_instagram'); ?>" target="_blank" > <i class="fa fa-instagram"></i> </a> </li>                        
                        <?php }                                
                        
                        if ( of_get_option('gg_youtube') ) {
                        ?> <li class="youtube"> <a href="<?php echo of_get_option('gg_youtube'); ?>" target="_blank" > <i class="fa fa-youtube"></i> </a> </li>                        
                        <?php }
                        
                        if ( of_get_option('gg_foursquare') ) {
                        ?> <li class="foursquare"> <a href="<?php echo of_get_option('gg_foursquare'); ?>" target="_blank" > <i class="fa fa-foursquare"></i> </a> </li>                        
                        <?php }
                        
                        if ( of_get_option('gg_pinterest') ) {
                        ?> <li class="pinterest"> <a href="<?php echo of_get_option('gg_pinterest'); ?>" target="_blank" > <i class="fa fa-pinterest"></i> </a> </li>                        
                        <?php }                                 

                        if ( of_get_option('gg_flickr') ) {
                        ?> <li class="flickr"> <a href="<?php echo of_get_option('gg_flickr'); ?>" target="_blank" > <i class="fa fa-flickr"></i> </a> </li>                        
                        <?php }
                        
                        if ( of_get_option('gg_linkedin') ) {
                        ?> <li class="linkedin"> <a href="<?php echo of_get_option('gg_linkedin'); ?>" target="_blank" > <i class="fa fa-linkedin"></i> </a> </li>                        
                        <?php }                          
                        
                        if ( of_get_option('gg_skype') ) {
                        ?> <li class="skype"> <a href="<?php echo of_get_option('gg_skype'); ?>" target="_blank" > <i class="fa fa-skype"></i> </a> </li>                        
                        <?php }                          
                  
                        ?>
                </ul>
        </div><!-- .social-->
<?php } ?>




