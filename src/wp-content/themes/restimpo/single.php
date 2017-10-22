<?php
/**
 * The post template file.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="content-headline-wrapper">
    <div class="content-headline">
      <h1 class="title single-title entry-title"><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="container">
  <div id="main-content">
    <article id="content">
      <div class="post-thumbnail"><?php restimpo_get_display_image_post(); ?></div> 
<?php if ( get_theme_mod('restimpo_display_meta_post', restimpo_default_options('restimpo_display_meta_post')) != 'Hide' ) { ?>
      <p class="post-info"><span class="post-info-author vcard author"><span class="fn"><?php the_author_posts_link(); ?></span></span><span class="post-info-date post_date date updated"><?php echo get_the_date(); ?></span><span class="post-info-category"><?php the_category(', '); ?></span><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
<?php } ?>
      <div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'restimpo' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( '(Edit)', 'restimpo' ), '<p class="edit-link">', '</p>' ); ?>
      </div>
<?php endwhile; endif; ?>
<?php if (get_theme_mod('restimpo_next_preview_post', restimpo_default_options('restimpo_next_preview_post')) == '' || get_theme_mod('restimpo_next_preview_post', restimpo_default_options('restimpo_next_preview_post')) == 'Display') :  restimpo_prev_next('restimpo-post-nav');  endif; ?> 
<?php comments_template( '', true ); ?>
    </article> <!-- end of content -->
  </div>
<?php get_sidebar(); ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>