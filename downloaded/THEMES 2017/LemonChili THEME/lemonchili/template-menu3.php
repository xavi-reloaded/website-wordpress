<?php
/*
Template Name: Menu 3 Columns
*/
?>

<?php get_header(); ?>
   
                <div class="menuwrap">
                        
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
                        
                        <ul class="menu3 centered m-container js-masonry ">
                        
                        <?php foreach($posts as $post) {

                        $menu_title = $post->post_title;
                        $menu_description = rwmb_meta( 'gxg_menu_description' );
                        $price = rwmb_meta( 'gxg_price' );
                        $cents = rwmb_meta( 'gxg_cents' );
                        ?>                     
                                        
                                <li class="menu-item box col4 boxbg">
                                        
                                        <div class="inner-box text-center">
                                                
                                               <h6 class="menu-title"><?php echo $menu_title; ?></h6>   
                                                
                                                <?php if ($menu_description){
                                                ?>   
                                                        <div class="menu-description"> <?php echo apply_filters('the_content', get_post_meta($post->ID, 'gxg_menu_description', true)); ?> </div>
                                                <?php
                                                }
                                                ?>                                                                        
                            
                                                <div class="clear"></div>
                                                
                                                <div class="price-wrap">
	                                                       <?php if ($price){
	                                                       ?>   
	                                                              <div class="price"> <?php echo $price; ?> </div>
	                                                       <?php
	                                                       }
	                                                       ?>
	                                                       
	                                                       <?php if ($cents){
	                                                       ?>   <div class="cents"> <?php echo $cents ?> </div>
	                                                       <?php
	                                                       }
	                                                       ?>                                                         
                                                </div>
                                                
                                                <?php if ( has_post_thumbnail() ) {
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                                                ?>								
                                                <div class="menu-thumb prettyimage-wrap">
                                                        <a class='pretty_image' title='<?php echo $menu_title; ?>' data-rel='prettyPhoto[pp_gallery]' href='<?php echo $image[0] ?>'><span class='image-rollover'><i class='gallery-resize-icon fa fa-expand'></i></span><?php the_post_thumbnail('square3', 'alt= '); ?></a>                      
                                                </div>
                                           
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <?php
                                                }
                                                ?>                                                                        

                                        </div>

                                </li>
                                <?php 
                                } ?>
                                
                        </ul>
                        
                        </li>
                        
                                       
                        
                <?php } 
                ?>
                </ul> 
                </div> <!-- .masonry -->

<?php get_footer(); ?>