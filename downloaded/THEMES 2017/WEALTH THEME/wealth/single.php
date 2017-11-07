<?php
 $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
 $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
get_header(); ?>

<!-- subheader begin -->
<section class="rich-header">  
  <h1 class="page-title"><?php esc_html_e('The Blog Single', 'wealth'); ?></h1>
</section>
<!-- subheader close -->

<!-- CONTENT BLOG -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="blog-list">
                <?php while (have_posts()) : the_post(); ?>
                <li>
                  <div class="preview page-content">
                    <?php $format = get_post_format(); ?>
                    <?php if($format=='audio'){ ?>
                    <div class="post-media">
                      <iframe style="width:100%" src="<?php echo esc_url($link_audio); ?>"></iframe>
                    </div>
                    <?php } elseif($format=='video'){ ?>
                      <div class="post-media">
                        <iframe height="430" width="100%" src="<?php echo esc_url($link_video); ?>"></iframe>
                      </div>
                    <?php } elseif($format=='gallery'){ ?>
                      <div id="owl-demo-<?php the_ID(); ?>" class="post-media post-gallery">
                      <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                      
                        <?php 
                        foreach ( $images as $image ) { 
                        ?>
                        <?php $img = $image['full_url']; ?>
                        <img src="<?php echo esc_url($img); ?>" alt="">
                        <?php } ?> 
                      
                      <?php } ?> 
                      </div>
                      <script type="text/javascript">
                        (function ($) { 
                        "use strict";
                          $("#owl-demo-<?php the_ID(); ?>").owlCarousel({
                            slideSpeed: 400,
                            paginationSpeed: 400,
                            rewindSpeed: 800,
                            singleItem: true
                          });
                        })(jQuery);
                      </script>
                    <?php } elseif($format=='image') { ?>
                      <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                      <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                      <div class="post-media">
                        <?php  
                        foreach ( $images as $image ) { 
                        ?>
                        <?php $img = $image['full_url']; ?>
                        <img src="<?php echo esc_url($img); ?>" alt="">
                        <?php } ?> 
                      </div>
                      <?php } ?>
                    <?php } ?>
                  <h3 class="blog-title"><?php the_title(); ?></h3>
                  <div class="post-meta">
                    <span class="date"><i class="fa fa-calendar-o"></i><a href="<?php the_permalink(); ?>"><?php the_time('M d, Y'); ?></a></span>
                    <span class="author"><i class="fa fa-pencil-square-o"></i><?php the_author_posts_link(); ?></span>
                    <?php if(has_category()) { ?>
                    <span>
                      <i class="fa fa-folder-open-o"></i><?php the_category( ', ' ); ?>
                    </span> 
                    <?php } ?>
                    <?php if(has_tag()) { ?>
                    <span>
                      <i class="fa fa-tag"></i><?php the_tags('', ', ' ); ?>
                    </span> 
                    <?php } ?>
                    <span class="comments"><i class="fa fa-comment-o"></i><?php comments_popup_link( esc_html__('0 comment', 'wealth'), esc_html__('1 comment', 'wealth'), esc_html__('% comments', 'wealth') ); ?></span>
                  </div>
    
                  <?php the_content(); ?>

                  </div>
              </li>
              <?php endwhile;?>
              </ul>
              <div id="blog-comment">
                <div class='comments-box'>
                  <?php comments_number( esc_html__('0 comment', 'wealth'), esc_html__('1 comment', 'wealth'), esc_html__('% comments', 'wealth') ); ?>
                </div>
                <?php comments_template(); ?> 
              </div>
            </div>

            <div class="col-md-4">
                <?php get_sidebar();?>
            </div>

        </div>

    </div>
</div>
<!-- END CONTENT BLOG -->

<?php get_footer(); ?>  	





  