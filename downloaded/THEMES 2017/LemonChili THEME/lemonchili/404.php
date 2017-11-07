<?php get_header(); ?>

		       <div id="error">
		       <!-- Error Message -->
		       <p>
		       <?php
		       if ( of_get_option('gg_404error') ) {
		       echo stripslashes(of_get_option('gg_404error'));
		       } else {
		       ?>
		       <h1> <?php _e('404 ERROR - Not Found', 'gxg_textdomain'); ?></h1>  	
		       <p> <?php _e('The page you requested does not exist.', 'gxg_textdomain'); ?></p> 
		       <?php       
		       }
		       ?>
		       </p>
		       </div><!-- #error-->

<?php get_footer(); ?> 