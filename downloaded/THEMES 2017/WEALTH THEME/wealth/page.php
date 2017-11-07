<?php get_header(); ?>

<!-- subheader begin -->
<section class="rich-header">  
    <h1 class="page-title"><?php the_title(); ?></h1>
</section>
<!-- subheader close -->

<div id="content" class="sbar">
    <div class="container">
        <div class="row">
            
        	<div class="col-md-9">   
                <div id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
            		<?php while (have_posts()) : the_post()?>
                        
                        <?php the_post_thumbnail() ?>
            			
                        <?php the_content(); ?>
                        <?php

                         if ( comments_open() || get_comments_number() ) :
                          comments_template();
                         endif; 
                        ?>
                        <?php
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wealth' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'wealth' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ) );
                        ?>
            		<?php endwhile; ?>
                </div>    
        	</div>

        	<div class="col-md-3">
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>