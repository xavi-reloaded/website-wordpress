                <!-- Start the Loop. -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                
                <div id="post-<?php the_ID(); ?>" <?php post_class('box col6 boxbg'); ?>>
                        
                        <div class="inner-box">
                                
                                <h1 class="title text-center"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to', 'gxg_textdomain') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                
		                <div class="postinfo widget-post-info">        
		                        <ul>  
		                                <li class="post-date">
		                                        <i class="fa fa-calendar"></i> <?php the_time('M d, Y') ?>
		                                </li> <!-- .post-date-->

                                                <?php if ( has_tag() ) { ?>
		                                <li>
		                                          <ul class="tags">
		                                                <li>                                                
		                                                        <?php echo the_tags('<i class="fa fa-tag"></i> ', ', ', '' ); ?>
		                                                </li>  
		                                        </ul> <!-- .tags -->   
		                                </li>                                                  
                                                <?php } ?>
                                                
                                                <!-- 
                                                <li class="categories">
                                                        <i class="fa fa-folder"></i>
                                                        posted in: <?php echo get_the_category_list(', '); ?>
                                                </li>
                                                -->                                                   
                                                
	                              		<?php if (!of_get_option('gg_commentremove') &&  comments_open() ) { ?> 
	                                                <li class="comment-nr">
	                                                	  <i class="fa fa-comment"></i>
	                                                        <a href="<?php comments_link(); ?>">
	                                                        <?php                                                
	                                                        echo comments_number( ' 0 ', ' 1 ', ' % ');
	                                                        ?> </a> 
	                                                </li>
	                                        <?php } ?>                                               
		                                
                                                <!--  
                                                <li class="author">
                                                <i class="fa fa-pencil"></i>
                                                        by <?php echo the_author_posts_link(); ?>
                                                </li>   
                                                -->
                                                
		                                <div class="clear"></div>    
		                        </ul>                
		                </div> <!-- .postinfo -->   
                                
                                <div>
                                        <div class="tnail">
                                                <?php if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail();
                                                }
                                                ?>
                                        </div> <!-- .tnail -->
                                        
                                        <div class="clear"></div> 
                                        
                                        <div class="entry text-center">
                                                <?php the_content(__('<span class="moretext"> Read more </span>', 'gxg_textdomain')); ?>
                                        </div><!-- .entry -->
                                </div>
                
                        </div><!-- .inner-box -->

                </div> <!-- .boxbg -->

                <?php endwhile; else: ?>
                
                <!-- what if there are no Posts? -->
                <div id="no_posts" class="text-center box col12">
                <p> <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
                </div>
                
                <!-- REALLY stop The Loop. -->
                <?php endif; ?>