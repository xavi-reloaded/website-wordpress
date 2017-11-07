<?php get_header(); ?>
    
                <div class="box-nm">
                        
                        <h1 class="pagetitle text-center"> <?php the_title(); ?> </h1>  
                        
                        <!-- Start the Loop. -->
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                        
                        $today = date('U') - (60 * 60 * 24);
                                $date = get_post_meta($post->ID, 'gxg_date', true);
                                $timestamp = strtotime($date);
                                $pretty_date_yy = date('Y', $timestamp);
                                $pretty_date_M = date('M', $timestamp);
                                $pretty_date_d = date('d', $timestamp);
                                $pretty_date_l = date('l', $timestamp);
                                $time = get_post_meta($post->ID, 'gxg_time', true);
                                
                                $enddate = get_post_meta($post->ID, 'gxg_eventenddate', true);
                                $endtime = get_post_meta($post->ID, 'gxg_eventendtime', true);
                                $timestamp_end = strtotime($enddate);
                                $pretty_enddate_yy = date('Y', $timestamp_end);
                                $pretty_enddate_M = date('M', $timestamp_end);
                                $pretty_enddate_d = date('d', $timestamp_end);
                                
                                $facebookevent = get_post_meta($post->ID, 'gxg_facebookevent', true);
                                                                                                
                                        switch($pretty_date_l) /*make weekday translation ready */
                                        {
                                                case "Monday":  $pretty_date_l = __('Monday', 'gxg_textdomain');  break;
                                                case "Tuesday":  $pretty_date_l = __('Tuesday', 'gxg_textdomain');  break;
                                                case "Wednesday":  $pretty_date_l = __('Wednesday', 'gxg_textdomain');  break;
                                                case "Thursday":  $pretty_date_l = __('Thursday', 'gxg_textdomain');  break;
                                                case "Friday":  $pretty_date_l = __('Friday', 'gxg_textdomain');  break;
                                                case "Saturday":  $pretty_date_l = __('Saturday', 'gxg_textdomain');  break;
                                                case "Sunday":  $pretty_date_l = __('Sunday', 'gxg_textdomain');  break;
                                                default:     $pretty_date_l = ""; break;
                                        }
                                        
                                        switch($pretty_date_M) /*make month translation ready */
                                        {
                                                case "Jan":  $pretty_date_M = __('Jan', 'gxg_textdomain');  break;
                                                case "Feb":  $pretty_date_M = __('Feb', 'gxg_textdomain');  break;
                                                case "Mar":  $pretty_date_M = __('Mar', 'gxg_textdomain');  break;
                                                case "Apr":  $pretty_date_M = __('Apr', 'gxg_textdomain');  break;
                                                case "May":  $pretty_date_M = __('May', 'gxg_textdomain');  break;
                                                case "Jun":  $pretty_date_M = __('Jun', 'gxg_textdomain');  break;
                                                case "Jul":  $pretty_date_M = __('Jul', 'gxg_textdomain');  break;                                                
                                                case "Aug":  $pretty_date_M = __('Aug', 'gxg_textdomain');  break;
                                                case "Sep":  $pretty_date_M = __('Sep', 'gxg_textdomain');  break;
                                                case "Oct":  $pretty_date_M = __('Oct', 'gxg_textdomain');  break;
                                                case "Nov":  $pretty_date_M = __('Nov', 'gxg_textdomain');  break;
                                                case "Dec":  $pretty_date_M = __('Dec', 'gxg_textdomain');  break;                                                
                                                default:     $pretty_date_M = ""; break;
                                        }
                                        
                                        switch($pretty_enddate_M) /*make month (end date) translation ready */
                                        {
                                                case "Jan":  $pretty_enddate_M = __('Jan', 'gxg_textdomain');  break;
                                                case "Feb":  $pretty_enddate_M = __('Feb', 'gxg_textdomain');  break;
                                                case "Mar":  $pretty_enddate_M = __('Mar', 'gxg_textdomain');  break;
                                                case "Apr":  $pretty_enddate_M = __('Apr', 'gxg_textdomain');  break;
                                                case "May":  $pretty_enddate_M = __('May', 'gxg_textdomain');  break;
                                                case "Jun":  $pretty_enddate_M = __('Jun', 'gxg_textdomain');  break;
                                                case "Jul":  $pretty_enddate_M = __('Jul', 'gxg_textdomain');  break;                                                
                                                case "Aug":  $pretty_enddate_M = __('Aug', 'gxg_textdomain');  break;
                                                case "Sep":  $pretty_enddate_M = __('Sep', 'gxg_textdomain');  break;
                                                case "Oct":  $pretty_enddate_M = __('Oct', 'gxg_textdomain');  break;
                                                case "Nov":  $pretty_enddate_M = __('Nov', 'gxg_textdomain');  break;
                                                case "Dec":  $pretty_enddate_M = __('Dec', 'gxg_textdomain');  break;                                                
                                                default:     $pretty_enddate_M = ""; break;
                                        }
                                        
                        ?>

                        <div class="single-entry">
                        
                                <div class="single-left">
                                
					 <?php 
					 //recurring events
					 $recurring = get_post_meta($post->ID, 'gxg_recurring', true);
					 if ($recurring) {  
					 ?>
					
					     <div class="pretty-date-top">
					     <?php echo $recurring; ?>    
					     </div> 
					     <br>                              
					 
					<?php }
					
					 // regular events                                     
					else  { ?>                               
					                                                              
					<div class="pretty-date">
					
					        <div class="pretty-day"><?php echo $pretty_date_d; ?></div>
					 
					        <div class="pretty-date-right">
					                <div class="pretty-date-top">
					                        <?php echo $pretty_date_M ; ?> <?php echo $pretty_date_yy; ?> 
					                </div>
					                <div class="pretty-date-bottom">
					                        <div class="pretty-weekday"><?php echo $pretty_date_l; ?> </div>
					                </div>
					        </div>
					        
					</div>
					<?php } ?>
                                        
                                        <ul class="single-postinfo">
        
                                                <?php if ($time) { ?>
                                                        <li class="event-time">
                                                                <i class="fa fa-clock-o"></i>
                                                                <?php echo $time; ?>
                                                        </li>
                                                <?php } ?> 
                                                
                                                
                                                <?php if ( ($enddate) || ($endtime) ) { ?>
                                                        <li>
                                                                <i class="fa fa-arrow-right"></i>
                                                                <?php _e('event ends:', 'gxg_textdomain') ?>
                                                                
                                                                </br>
                                                                
                                                                <div class="enddateandtime">
                                                                        <?php if ($enddate) { ?>
                                                                                <div class="event-end-date"><?php echo $pretty_enddate_d; ?> <?php echo $pretty_enddate_M; ?> <?php echo $pretty_enddate_yy; ?></div>
                                                                        <?php }
                                                                        
                                                                        if ( ($enddate) AND ($endtime) ) { ?>, <?php } ?>
                                                                        
                                                                        <?php if ($endtime) { ?>
                                                                                <div class="event-end-time"> <?php echo $endtime; ?></div>
                                                                        <?php } ?>
                                                                </div>
                                                        </li>
                                                <?php } ?> 
                                                
                                                <?php if ( has_tag() ) { ?>
                                                        <li class="tags-single">
                                                                          <?php echo the_tags('<i class="fa fa-tag"></i> ', ', ', '' ); ?>
                                                        </li> <!-- .tags -->   
                                                <?php }  
                                                
                                                
                                                if (!of_get_option('gg_commentremove')) { ?> 
                                                        <li class="comment-nr">
                                                                  <i class="fa fa-comment"></i>
                                                                <a href="<?php comments_link(); ?>">
                                                                <?php                                                
        
                                                                echo comments_number(__('no comments', 'gxg_textdomain'), __('1 comment', 'gxg_textdomain'), __('% comments', 'gxg_textdomain'));                                                                                
                                                                ?> </a> 
                                                        </li>
                                                <?php } ?>                                                         


                                                <?php if ($facebookevent) { ?>
                                                <li>
                                                        <i class="fa fa-facebook"></i>
                                                        <a href="<?php echo $facebookevent; ?>" target="_blank"><?php _e('join facebook event', 'gxg_textdomain') ?></a>
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
                                                <iframe class="fb-like" src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>%2F&amp;layout=button_count&amp;show_faces=false&amp;width=300&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21&amp;locale=en_US" scrolling="no" frameborder="0" style="border-style:none; overflow:hidden; width:45px; height:21px;" allowTransparency="true">
                                                </iframe>                        
                                                <?php
                                                } else {
                                                ?> 
                                                <iframe class="fb-like" src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>%2F&amp;layout=button_count&amp;show_faces=false&amp;width=300&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21&amp;locale=en_US" style="border-style:none; overflow:hidden; width:47px; height:21px;">
                                                </iframe>
                                                <?php
                                                } ?> 
                                                <!--<![endif]-->   
                                                </li>                                                                
                                                
                                        </ul>
                             
                                        <div class="clear"></div>
                                
                                        <?php if ( has_post_thumbnail() ) {
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                                        ?>						
                                        <div class="events-thumb">
                                               <a class="pretty_image" data-rel="prettyPhoto" href="<?php echo $image[0] ?>"><?php the_post_thumbnail('full', 'alt= '); ?></a>
                                        </div>
                                        <div class="clear"></div> 
                                        <?php
                                        }
                                        ?>                                                  
                                
                                </div>       		
                                
                                <div class="single-right">
        
                                      <div class="event-info justify"> 
                                              <?php the_content(); ?>
                                      </div>
                                        
                                </div>
                        
                        </div>
                        
                        <div class="clear"> </div>                
                        
                        <?php endwhile; else: ?>
                        
                        <!-- what if there are no Posts? -->
                        <div id="no_posts">
                        <p> <br /> <br />  <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
                        </div>
                        
                        <!-- REALLY stop The Loop. -->
                        <?php endif; ?>
                        
                        <?php if (!of_get_option('gg_commentremove')) { ?> 
                        
                        <div id="comments" >
                                <?php comments_template(); ?>
                        </div><!-- #comments-->
                        <?php } ?>

                </div><!-- .box-nm-->

<?php get_footer(); ?>