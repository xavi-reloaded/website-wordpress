<?php
/**
 * Template Name: Jobs: Pricing Plans
 *
 * @package Jobify
 * @since Jobify 1.0
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

	<?php if ( Jobify_Page_Header::show_page_header() ) : ?>
    <header class="page-header">
        <h2 class="page-title"><?php the_title(); ?></h2>
    </header>
	<?php endif; ?>

    <div id="primary" class="container content-area" role="main">
        <?php if ( jobify()->get( 'woocommerce' ) ) : ?>
            <?php wc_print_notices(); ?>
        <?php endif; ?>

        <div class="page-content">
            <?php the_content(); ?>
        </div>

        <?php
            do_action( 'jobify_pricing_page_before' );

            if ( jobify()->get( 'wp-job-manager-wc-advanced-paid-listings' ) ) {
                $widget = 'Jobify_Widget_Price_Table_WC';
			} else if ( jobify()->get( 'wp-job-manager-wc-paid-listings' ) ) {
                $widget = 'Jobify_Widget_Price_Table_WC';
            } else if ( jobify()->get( 'restrict-content-pro' ) ) {
                $widget = 'Jobify_Widget_Price_Table_RCP';
            } else {
                $widget = 'Jobify_Widget_Price_Table';
            }

            the_widget(
                $widget,
                array(
                    'title'       => null,
                    'description' => null,
                ),
                array(
                    'widget_id'     => 'widget-area-front-page',
                    'before_widget' => '',
                    'after_widget'  => '',
                    'before_title'  => '',
                    'after_title'   => '',
                )
            );

            do_action( 'jobify_pricing_page_after' );
        ?>

        <?php do_action( 'jobify_loop_after' ); ?>
    </div><!-- #primary -->

    <?php endwhile; ?>

<?php get_footer(); ?>
