<?php get_header(); ?>
    
                <div class="box-nm text-center singlemenu">
                        
                        <h1 class="pagetitle text-center"> <?php the_title(); ?> </h1>  
                        
                        <!-- Start the Loop. -->
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                        
                                $menu_title = $post->post_title;
                                $menu_description = rwmb_meta( 'gxg_menu_description' );
                                $price = rwmb_meta( 'gxg_price' );


                                if ($menu_description){
                                ?>   
                                        <div class="menu-description"> <?php echo $menu_description; ?></div>
                                <?php
                                }
                                ?>                                                                        

								<div class="price-wrap">
								                     <?php if ($price){  ?>
								                               <div class="price"> <?php echo $price; ?> </div>
								                     <?php   }  ?>
								
								                     <?php
								                     $cents = rwmb_meta( 'gxg_cents' );
								                     if ($cents){  ?>
								                            <div class="cents"> <?php echo $cents ?> </div>
								                     <?php } ?>
								</div>
								<?php
                              
                                if ( has_post_thumbnail() ) {
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                                        ?>
                                        <div class="menu-thumb">
                                                <a class='pretty_image' title='' data-rel='prettyPhoto' href='<?php echo $image[0] ?>'><?php the_post_thumbnail(''); ?></a>
                                        </div>
                                        <?php
                                }
                              
                                
                        endwhile; else: ?>
                        
                        <!-- what if there are no Posts? -->
                        <div id="no_posts">
                        <p> <br /> <br />  <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
                        </div>
                        
                        <!-- REALLY stop The Loop. -->
                        <?php endif; ?>

                </div><!-- .box-nm-->

<?php get_footer(); ?>