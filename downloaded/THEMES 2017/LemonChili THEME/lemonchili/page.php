<?php get_header(); ?>
                
                <div class="box-nm">
                        
                        <h1 class="pagetitle text-center"> <?php the_title(); ?> </h1>
                
	                <div class="page-content">
	                
	                <!-- Start the Loop. -->
	                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	                                
	                <!-- Display the Post's Content in a div box. -->
	                <div class="single_entry">
	                        <?php the_content(); ?>
	                </div>
	                                
	                <div class="clear"> </div>
                        
                        <div class="post-pagination"> 
                                <?php wp_link_pages(); ?>
                        </div>                        
	                                
	                <!-- Stop The Loop (but note the "else:" - see next line). -->
	                <?php endwhile; else: ?>
	                                
	                <!-- what if there are no Posts? -->
	                <p><?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
	                                
	                <!-- REALLY stop The Loop. -->
	                <?php endif; ?>
	                
	                </div><!-- .page-content-->
                        
                        <div class="clear">
                        </div><!-- .clear-->
                        
                        <?php if (!of_get_option('gg_commentremove') &&  comments_open() ) { ?> 
	                        
	                        <div id="comments" >
	                                <?php comments_template(); ?>
	                        </div><!-- #comments-->

                        <?php } ?>                          
                                		                
                </div><!-- .box-nm-->

<?php get_footer(); ?>