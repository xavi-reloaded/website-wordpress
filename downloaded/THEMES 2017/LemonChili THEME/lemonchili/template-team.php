<?php
/*
Template Name: Team
*/
?>

<?php get_header(); ?>
    	               
	                <h1 class="pagetitle col12 text-center"> <?php the_title(); ?> </h1>

                                <?php if ($post->post_content!="" and have_posts() ) : while ( have_posts() ) : the_post(); ?>    
                                        <div class="topcontent col12 text-center"><?php the_content(); ?></div> 
                                <?php endwhile; endif; ?>  
	                                                        
	                        <ul class="team centered m-container js-masonry">
                                
                                <?php  
	                        global $post;
                                
                                
                                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                                if (is_plugin_active( 'simple-page-ordering/simple-page-ordering.php')) {
                                        $args = array(
                                                'orderby' => 'menu_order',
                                                'order' => 'ASC',
	                                        'post_type' => 'team',
	                                        'posts_per_page' => -1
                                        );
                                } else {
                                        $args = array(
	                                        'post_type' => 'team',
	                                        'posts_per_page' => -1
                                        );
                                }                                
	    
	                        $loop = new WP_Query( $args );
	                            
	                        if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
	                                
                                        $team_thumb = get_the_post_thumbnail($post->ID, 'square2', array('title' => ''));                                                            
	                                $name = rwmb_meta( 'gxg_name' );
	                                $position = rwmb_meta( 'gxg_position' );
	                                $email = rwmb_meta( 'gxg_email' );
	                                $about = rwmb_meta( 'gxg_about' );
                                        
	                                ?>

                                        <li class="box col4 boxbg">
                                                <div class="inner-box text-center">
                                                        
                                                        <?php if($team_thumb) {
                                                        ?>
                                                        <div class="team-thumb">                                                
                                                                <?php echo $team_thumb; ?>   
                                                        </div> 
                                                        <?php
                                                        }
                                                        ?>

                                                        <?php if ($name){
                                                        ?>                                                            
                                                        <h1 class="team-title text-center"> <?php the_title_attribute(); ?> </h1>
                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                        <?php if ($position){
                                                        ?>   
                                                                <div class="team-position"><i class="fa fa-user"></i> <?php echo $position; ?> </div>
                                                        <?php
                                                        }
                                                        ?>                                                        
                                                        
                                                        <?php if ($email){
                                                        ?>   
                                                                <div class="team-email"><i class="fa fa-envelope"></i> <?php echo $email; ?> </div>
                                                        <?php
                                                        }
                                                        ?>                                                        
                                                        
                                                        <?php if ($about){
                                                        ?>   
                                                                <div class="team-about"> <?php echo $about; ?> </div>
                                                        <?php
                                                        }
                                                        ?>                                                        
     
                                                </div> 
                                        </li>
	                                
	                        <?php
	                        
	                        endwhile;
	                        
	                        endif;
	                        
	                        // Always include a reset at the end of a loop to prevent conflicts with other possible loops                 
	                        wp_reset_query();                        
	                        
	                        ?>
                                </ul>
                
                <div class="clear">
                </div><!-- .clear-->

<?php get_footer(); ?>