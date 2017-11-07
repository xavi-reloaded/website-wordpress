<?php get_header(); ?>

                <div class="box-nm single-gallery-content">
                        
                        <h1 class="pagetitle text-center"> <?php the_title(); ?> </h1>
                
	                <!-- Display the gallery images in a div box. -->
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	                
                        <ul class="gg-gallery gallery-single">
                                
                                <?php 
                                        
                                $images = rwmb_meta( 'gxg_gallery_images', 'type=image&size=gallery' );
                                
                                foreach ( $images as $image ) {
                                        
                                        $imageurl = $image['url'];
                                        $imagecaption = $image['caption'];
                                        $imagefull = $image['full_url'];
                                        
                                        ?>
                                        <li class="box col4">      
                                                <a class="pretty_image" title="<?php echo $imagecaption ?>" data-rel="prettyPhoto[pp_gallery]" href="<?php echo $imagefull ?>">
                                                        <span class="image-rollover" >
                                                                <p><?php echo $imagecaption ?></p>
                                                                <i class="gallery-resize-icon fa fa-expand"></i>
                                                        </span>
                                                       
                                                        <img class="gallery-thumb-single" alt="" src="<?php echo $imageurl ?>">
                                                </a>
                                        </li>

                                      <?php	
                                        }                     
                                ?>
                        </ul>

	                <div class="clear"> </div>

	                <!-- Stop The Loop (but note the "else:" - see next line). -->
	                <?php endwhile; else: ?>
	
	                <!-- what if there are no Posts? -->
	                <p><?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain') ?></p>
	
	                <!-- REALLY stop The Loop. -->
	                <?php endif; ?>
  
                </div><!-- .box-nm-->

<?php get_footer(); ?>        