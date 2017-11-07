<?php
/*
Template Name: Gallery
*/
?>

<?php get_header(); ?>
    
	               
	                <h1 class="pagetitle  col12 text-center"> <?php the_title(); ?> </h1>
                        
                        <?php if ($post->post_content!="" and have_posts() ) : while ( have_posts() ) : the_post(); ?>                          	                               
                                <div class="topcontent col12 text-center"><?php the_content(); ?></div> 
                        <?php endwhile; endif; ?>  
	                
                        <ul class="gg-gallery centered m-container js-masonry">
                                
                                <?php  
                                global $post;
                                
                                $args = array(
                                                'order' => 'DESC',
                                                'post_type' => 'gallery',
                                                'posts_per_page' => -1 );
                                
                                $loop = new WP_Query( $args );
                                
                                while ( $loop->have_posts() ) : $loop->the_post();
                                
                                $gallery_title = $post->post_title;
                                $gallery_thumb = get_the_post_thumbnail($post->ID, 'gallery', array('title' => ''))     
                                ?>                
                        
                                <li class="box col4">
                                                <div class="gg-gallery-item boxbg prettyimage-wrap">
                                                        <a href="<?php the_permalink() ?>">
                                                        <span class='image-rollover'></span>
                                                                <div class="gg-gallery-thumb">                                                
                                                                        <?php echo $gallery_thumb; ?>    
                                                                </div>
                                                        </a>
                                                </div>
                                                <h1 class="gg-gallery-title text-center"><?php echo $gallery_title; ?></h1>
                                </li>
                                <?php       
                                        endwhile;
                                        
                                        // Always include a reset at the end of a loop to prevent conflicts with other possible loops                 
                                        wp_reset_query();
                                ?>
                        </ul>
                   
        
        <div class="clear">
        </div><!-- .clear-->

<?php get_footer(); ?>