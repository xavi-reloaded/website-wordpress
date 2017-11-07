<?php
/**
 * Template Name: Blog Left Sidebar
 */
get_header(); ?>

<!-- subheader begin -->

<section class="rich-header">            
    
        <h1 class="page-title"><?php esc_html_e('BLOG', 'wealth'); ?></h1>
        
    
</section>

<!-- subheader close -->

<!-- content begin -->

<div id="content">

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <?php get_sidebar();?>

            </div>

            <div class="col-md-8">

                <ul class="blog-list">
                 <?php if(have_posts()) : ?>
                    <?php 
                    $args = array( 

                      'paged' => $paged,

                      'post_type' => 'post',

                      );
                    $wp_query = new WP_Query($args);
                    while ($wp_query -> have_posts()): $wp_query -> the_post();
                        get_template_part( 'content', get_post_format() ) ; ?> 
                    <?php endwhile;?>
                    <?php else: ?>
                    <h1><?php esc_html_e('Nothing Found Here!', 'wealth'); ?></h1>
                    <?php endif; ?>   
                </ul>



                <div class="pagination text-center ">

                    <ul>

                        <?php echo wealth_pagination(); ?>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- content close -->

<?php get_footer(); ?>