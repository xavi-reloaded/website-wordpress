<?php get_header(); ?>
    
                <div class="box-nm">
                        
                <!-- Start the Loop. -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                
                        $team_thumb = get_the_post_thumbnail($post->ID, 'square2', array('title' => ''));                                                            
                        $name = rwmb_meta( 'gxg_name' );
                        $position = rwmb_meta( 'gxg_position' );
                        $email = rwmb_meta( 'gxg_email' );
                        $about = rwmb_meta( 'gxg_about' );
                        
                        ?>
                        <div class="text-center">
                                
                                <?php if ($name){
                                ?>                                                            
                                        <h1 class="pagetitle text-center"> <?php the_title_attribute(); ?> </h1>
                                <?php
                                }
                                
                                if ($position){
                                ?>   
                                        <div class="team-position"> <?php echo $position; ?> </div>
                                <?php
                                }
                                
                                if ($email){
                                ?>   
                                        <div class="team-email"> <?php echo $email; ?> </div>
                                <?php
                                }
                                
                                if($team_thumb) {
                                ?>
                                <div class="team-thumb">                                                
                                        <?php echo $team_thumb; ?>   
                                </div> 
                                <?php
                                }
                                
                                if ($about){
                                ?>   
                                        <div class="team-about"> <?php echo $about; ?> </div>
                                <?php
                                }
                                ?>                                                        

                        </div> 
                
                <?php endwhile; else: ?>
                
                <!-- what if there are no Posts? -->
                <div id="no_posts">
                <p> <br /> <br />  <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
                </div>
                
                <!-- REALLY stop The Loop. -->
                <?php endif; ?>

                </div><!-- .box-nm-->

<?php get_footer(); ?>