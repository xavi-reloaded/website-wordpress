<?php get_header(); ?>

                        <h1 class="pagetitle col12 text-center">
                                <?php _e('Search Results for ', 'gxg_textdomain'); 
                                /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1");
                                $key = esc_html($s, 1);
                                $count = $allsearch->post_count;
                                
                                _e('&ldquo;', 'gxg_textdomain');
                                echo $key;
                                _e('&rdquo;', 'gxg_textdomain');
                                ?>
                        </h1>
                        
                        <h6 class="pagetitle col12 text-center">        
                                <?php                                 
                                echo $count . ' '; _e('results', 'gxg_textdomain');
                                wp_reset_query(); 
                                ?>
                        </h6>
                        
              <div class="centered m-container js-masonry">
     
                        <!-- Start the Loop. -->
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                        
                        $menu_description = rwmb_meta( 'gxg_menu_description' );
                        
                        ?>
                        
                        <div class="box col6 boxbg">
                                
                                <div class="inner-box">
                                  
                                        <h1 class="title text-center"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to', 'gxg_textdomain') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                        </h1>         
                                        
                                        <div>
                                                <div class="tnail">
                                                        <?php if ( has_post_thumbnail() ) {
                                                                the_post_thumbnail();
                                                        }
                                                        ?>
                                                </div> <!-- .tnail -->
                                                
                                                <?php if ($menu_description){
                                                ?>   
                                                        <div class="menu-description text-center"> <?php echo $menu_description; ?></div>
                                                <?php
                                                }
                                                ?>  
                                                
                                                <div class="entry text-center">
                                                        <?php the_excerpt(); ?>
                                                </div><!-- .entry -->
                                        </div>
                                        
                                </div>
                        
                        </div> <!-- .blogentry -->
                        
                        <?php endwhile; else: ?>
                        
                        <!-- what if there are no Posts? -->
                        <div id="no_posts" class="text-center box col12">
                        <p> <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
                        </div>
                        
                        <!-- REALLY stop The Loop. -->
                        <?php endif; ?>

                 </div><!-- .masonry-->

                <div class="clear"></div> 
                <div id="pagination">
                        <?php gg_pagination(); ?>
                </div><!-- #pagination-->                 

<?php get_footer(); ?>