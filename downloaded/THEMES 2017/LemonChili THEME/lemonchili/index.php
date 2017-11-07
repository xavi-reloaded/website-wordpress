<?php get_header(); ?>

                <h1 class="pagetitle col12 text-center"> <?php single_post_title(); ?> </h1> 
                     
               <div class="transitions-enabled centered clearfix m-container js-masonry"> 
                <?php
                        get_template_part('loop');
                ?>
                </div> <!-- .js-masonry -->
                
                <div id="pagination" class="col12">
                        <?php gg_pagination(); ?>
                </div><!-- #pagination-->

                <div class="clear">
                </div><!-- .clear-->

<?php get_footer(); ?>