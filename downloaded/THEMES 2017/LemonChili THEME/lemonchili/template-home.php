<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
       
                <?php if ($post->post_content!="" and have_posts() ) : while ( have_posts() ) : the_post(); ?> 
                <div class="welcome col12 text-center">	
                        <?php the_content(); ?>	                        
                </div>                
                <?php endwhile; endif; ?>             
    
   
                <?php if ( is_active_sidebar( 'home_sidebar' ) ) : ?>
                <div class="m-container js-masonry widget-area centered"> 
                                <?php dynamic_sidebar( 'home_sidebar' ); ?>
                </div><!-- .widget-area -->
                <?php endif; ?>        

<?php get_footer(); ?>