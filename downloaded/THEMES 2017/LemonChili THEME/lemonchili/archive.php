<?php get_header(); ?>
               
                	      <h1 class="pagetitle col12 text-center">
                                <?php
                                global $wp_query;
                                $curauth = $wp_query->get_queried_object();
                                ?>
        
                                <?php /* If this is a category archive */ if (is_category()) { ?>
                                <?php echo single_cat_title(); ?>

                                <?php /* If this is a tags archive */ } elseif (is_tag()) { ?>
                                <?php echo single_tag_title(); ?>
        
                                <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                                <?php _e('All posts on', 'gxg_textdomain') ?> <?php the_time('F jS, Y'); ?>
        
                                <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                                <?php _e('All posts in', 'gxg_textdomain') ?>  <?php the_time('F Y'); ?>
        
                                <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                                <?php _e('All posts in', 'gxg_textdomain') ?>  <?php the_time('Y'); ?>
        
                                <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                                <?php _e('Author', 'gxg_textdomain') ?> <?php echo $curauth->nickname; ?>
        
                                <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                                <?php _e('Blog Archives', 'gxg_textdomain') ?>
                                <?php } ?>                        
                                </h1>               

		<div class="centered m-container js-masonry">

                        <?php
                        get_template_part('loop');
                        ?>

                </div> <!-- .masonry -->
                
                <div class="clear"></div> 
                <div id="pagination" class="box col12">
                        <?php gg_pagination(); ?>
                </div><!-- #pagination-->                
                

<?php get_footer(); ?>