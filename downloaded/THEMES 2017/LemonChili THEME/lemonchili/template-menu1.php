<?php
/*
Template Name: Menu 1 Column
*/
?>

<?php get_header(); ?>
                           
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="topcontent col12 text-center">
                        <?php the_content(); ?>
                        </div>
                <?php endwhile; endif; ?>    
                
                <div class="clear">
                </div><!-- .clear-->                          
                
                <ul class="menu-categories">           
                                
                        <?php                       

                        $cat_args = array(                                     
                                'menu_order' => 'ASC',
                        );

                        $categories = wp_get_post_terms($post->ID, 'menu_category', $cat_args);

                        foreach($categories as $category) {                                        
                               
                        ?>
                        
                        <li> 
                                
                                <div class="menu-category col12 text-center">
                                        <h1 class="menu-cat"> <?php echo $category->name; ?> </h1>
                                        
                                        <?php if($category->description) { ?>
                                                <div class="menu-desc"><?php echo $category->description; ?></div>
                                        <?php } ?>
                                </div>
                                
                                <?php

                                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                                if (is_plugin_active( 'simple-page-ordering/simple-page-ordering.php')) {
                                        $post_args = array(
                                                'orderby' => 'menu_order',
                                                'order' => 'ASC',
                                                'numberposts' => -1,
                                                'post_type' => 'menu',
                                                'menu_category' => $category->slug
                                        );
                                } else {
                                        $post_args = array(
                                                'numberposts' => -1,
                                                'post_type' => 'menu',
                                                'menu_category' => $category->slug
                                        );
                                }
                                
                                $posts = get_posts($post_args);
                                
                                ?>
                                
                                <ul class="menu1 centered m-container js-masonry ">
                                   
                                       <?php  foreach($posts as $post) {
    
                                        $menu_title = $post->post_title;
                                        $menu_description = rwmb_meta( 'gxg_menu_description' );
                                        $price = rwmb_meta( 'gxg_price' );
                                        $cents = rwmb_meta( 'gxg_cents' );
                                        ?>                     

                                        <li class="menu-item box col12 boxbg">
                                                
                                                <div class="inner-box ">
                                                        
                                                        <h6 class="menu-title2"><?php echo $menu_title; ?></h6>
                                                        
                                                        <div class="right">    
	                                                        <?php if ($price){ ?> <div class="price2"> <?php echo $price; ?> </div> <?php } ?>
	                                                        <?php if ($cents){ ?>   <div class="cents2"> <?php echo $cents ?> </div> <?php } ?> 
	                                               </div>  
                                                                                                                 
                                                        <div class="clear"></div>                                                                    
                                                        
                                                        <?php if ($menu_description){
                                                        ?>   
                                                                <div class="menu-description2"> <?php echo $menu_description; ?></div>
                                                        <?php
                                                        }
                                                        ?>                                                                        
                                                        
                                                        <div class="clear"></div>

                                                </div>
        
                                        </li>

                                        <?php 
                                        }?>
                                        
                                </ul>
                                
                                </li>

                        <?php }  

                        ?>
                </ul>        

<?php get_footer(); ?>