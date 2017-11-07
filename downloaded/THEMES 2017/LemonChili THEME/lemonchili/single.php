<?php get_header(); ?>
                
                <div id="post-<?php the_ID(); ?>" <?php post_class('box-nm'); ?>>
                        
                        <h1 class="pagetitle text-center"> <?php the_title(); ?> </h1>
                                                
			<!-- Start the Loop. -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <div class="single-entry">
                        
                                <div class="single-left">
                                                
                                        <div class="pretty-date">
                                      
                                                <div class="pretty-day"><?php the_time('d') ?></div>
                                                         
                                                <div class="pretty-date-right">
                                                        <div class="pretty-date-top">
                                                                <?php the_time('M') ?>
                                                        </div>
                                                        <div class="pretty-date-bottom">
                                                                <div class="pretty-weekday"> <?php the_time('Y') ?> </div>
                                                        </div>
                                                </div>
                                                
                                        </div>
                                        
                                        
                                        <ul class="single-postinfo">
        
                                                <?php if ( has_tag() ) { ?>
                                                        <li class="tags-single">
                                                                          <?php echo the_tags('<i class="fa fa-tag"></i> ', ', ', '' ); ?>
                                                        </li> <!-- .tags -->   
                                                <?php }  ?>

                                                
                                                <li class="categories">
                                                        <i class="fa fa-folder"></i>
                                                        <?php _e('posted in:', 'gxg_textdomain') ?> <?php echo get_the_category_list(', '); ?>
                                                </li> <!-- .tags -->   
                                                 
                                                
        
                                                <?php if (of_get_option('gg_author')) { ?> 
                                                        <li class="author">
                                                        <i class="fa fa-pencil"></i>
                                                                <?php _e('by:', 'gxg_textdomain') ?> <?php echo the_author_posts_link(); ?>
                                                        </li> <!-- .author -->                        
                                                <?php } 
                                                
                                                
                                                if (!of_get_option('gg_commentremove') &&  comments_open() ) { ?>  
                                                        <li class="comment-nr">
                                                                <i class="fa fa-comment"></i>
                                                                <a href="<?php comments_link(); ?>">
                                                                <?php                                                
        
                                                                echo comments_number(__('no comments', 'gxg_textdomain'), __('1 comment', 'gxg_textdomain'), __('% comments', 'gxg_textdomain'));                                                                                
                                                                ?> </a> 
                                                        </li>
                                                <?php } ?>                                                         
              
                                        </ul>
                                        
                                        <ul class="share">
                                                
                                                <li class="sharetitle"><?php _e('SHARE:', 'gxg_textdomain') ?></li>
                                                
                                                <li class="tweet-button">               
                                                        <a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
                                                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>  
                                           
                                                </li>                                                 
                                                
                                                <li class="fb-button">
                                                <!--[if IE]>
                                                <iframe class="fb-like" src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>%2F&amp;layout=button_count&amp;show_faces=false&amp;width=300&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21&amp;locale=en_US" scrolling="no" frameborder="0" style="border-style:none; overflow:hidden; width:47px; height:21px;" allowTransparency="true">
                                                </iframe>
                                                <![endif]-->
                                                <!--[if !IE]>-->                        
                                                <?php
                                                //test if mobile device
                                                $detect = new Mobile_Detect();                        
                                                if ($detect->isMobile()) {
                                                ?>
                                                <iframe class="fb-like" src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>%2F&amp;layout=button_count&amp;show_faces=false&amp;width=300&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21&amp;locale=en_US" scrolling="no" frameborder="0" style="border-style:none; overflow:hidden; width:47px; height:21px;" allowTransparency="true">
                                                </iframe>                        
                                                <?php
                                                } else {
                                                ?> 
                                                <iframe class="fb-like" src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>%2F&amp;layout=button_count&amp;show_faces=false&amp;width=300&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21&amp;locale=en_US" style="border-style:none; overflow:hidden; width:45px; height:21px;">
                                                </iframe>
                                                <?php
                                                } ?> 
                                                <!--<![endif]-->   
                                                </li>                                                                
                                                
                                        </ul>
                                
                                </div>       		
                                
                                <div class="single-right">
                                        
                                        <div class="thumbnail">
                                                <?php if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail();
                                                }
                                                ?>
                                        </div> <!-- .tnail -->
                                
                                        <div class="justify"> 
                                                <?php the_content(); ?>
                                        </div>
                                        
                                </div>                                
                                
                        </div> 
     
                        <div class="clear"> </div>
                        
                        <div class="single-post-pagination"> 
                                <?php wp_link_pages(); ?>
                        </div>
                        
                        <?php endwhile; else: ?>
                        
                        <!-- what if there are no Posts? -->
                        <div id="no_posts">
                        <p> <br /> <br />  <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
                        </div>
                        
                        <!-- REALLY stop The Loop. -->
                        <?php endif; ?>
        
                        <?php if (!of_get_option('gg_commentremove') &&  comments_open() ) { ?>  
                        
                        <div id="comments" >
                                <?php comments_template(); ?>
                        </div><!-- #comments-->
                        <?php } ?>

                </div><!-- .box-nm-->

<?php get_footer(); ?>