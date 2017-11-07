<?php get_header(); ?>

<!-- subheader begin -->

<section class="rich-header">            
  <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
</section>

<!-- subheader close -->

<!-- content begin -->

<div id="content">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <ul class="blog-list">

                 <?php if(have_posts()) : ?>  



                  <?php 

                  while (have_posts()) : the_post();

                  get_template_part( 'content', get_post_format() ) ;   // End the loop

                  endwhile;
                  
                  ?>


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



            <div class="col-md-4">

                <?php get_sidebar();?>

            </div>

        </div>

    </div>

</div>

<!-- content close -->

<?php get_footer(); ?>