<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>



<li>

  <div class="preview">

    <div class="post-media">

      <iframe height="430px" width="100%" src="<?php echo esc_url($link_video); ?>"></iframe>

    </div> 

    <h3 class="blog-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="post-meta">
      <span class="date"><i class="fa fa-calendar-o"></i><a href="<?php the_permalink(); ?>"><?php the_date( get_option( 'date_format' ) ); ?></a></span>
      <span class="author"><i class="fa fa-pencil-square-o"></i><?php the_author_posts_link(); ?></span>
      <?php if(has_category()) { ?>
      <span>
        <i class="fa fa-folder-open-o"></i><?php the_category( ', ' ); ?>
      </span> 
      <?php } ?>
      <span class="comments"><i class="fa fa-comment-o"></i><?php comments_popup_link( esc_html__('0 comment', 'wealth'), esc_html__('1 comment', 'wealth'), esc_html__('% comments', 'wealth') ); ?></span>
    </div>
    <p class="excerpt"><?php echo wealth_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" class="button2 sdark"><?php esc_html_e('Read More', 'wealth'); ?></a>

</li>