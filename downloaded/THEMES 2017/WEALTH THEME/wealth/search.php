<?php get_header(); ?>
<!-- subheader begin -->
<section class="rich-header">            
  <h1 class="page-title">
    <?php printf( esc_html__( 'Search results for: %s', 'wealth' ), get_search_query() ); ?>
  </h1>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php if(have_posts()) : ?>
                <ul class="blog-list">
                  <?php                      
                      while (have_posts()) : the_post();
                        get_template_part( 'content', get_post_format() ) ;   // End the loop
                      endwhile;                    
                  ?>                  
                
                </ul>
                <div class="pagination text-center ">
                    <ul>
                        <?php echo wealth_pagination(); ?>
                    </ul>
                </div>
                <?php else: ?>
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'eleos' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'eleos' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
</div>
<!-- content close -->

<?php get_footer(); ?>