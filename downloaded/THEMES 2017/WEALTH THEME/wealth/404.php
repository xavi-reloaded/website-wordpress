<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>

<section class="rich-header">            
    
        <h1 class="page-title"><?php esc_html_e('ERROR', 'wealth'); ?></h1>
        
    
</section>

<!-- subheader close -->

<!-- content begin -->

<div id="content">

    <div class="container">

        <div class="row">            

            <div class="col-md-offset-1 col-md-10 center margin-bottom-150">

                <h1 class="title_404">404</h1>
                <div class="content_404">
                <p><?php esc_html_e('The page you are looking for no longer exists. Perhaps you can return back to the sites homepage see you can find what you are looking for.', 'wealth'); ?></p>
                </div>
                <div class="center"><a class="btn btn-404" href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-arrow-circle-left"></i> <?php esc_html_e('Back To Home', 'wealth'); ?></a></div> 

            </div>

        </div>

    </div>

</div>

<!-- content close -->

<?php get_footer(); ?>