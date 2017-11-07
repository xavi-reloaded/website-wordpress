<?php
/*
Template Name: Events 2 columns
*/
?>

<?php get_header(); ?>
    
	               
	                <h1 class="pagetitle  col12 text-center"> <?php the_title(); ?> </h1>
                        
                        <?php if ($post->post_content!="" and have_posts() ) : while ( have_posts() ) : the_post(); ?>                         	                               
                                <div class="topcontent  col12 text-center"><?php the_content(); ?></div> 
                        <?php endwhile; endif; ?>   
	                                                        
                        <ul class="events events2col centered m-container js-masonry">
                        
                        <?php  
                        global $post;
                        
                        $args = array(
                                        'orderby' => 'meta_value',
                                        'meta_key' => 'gxg_date',                                        
                                        'order_by' => 'meta_value',                                        
                                        'order' => 'ASC',
                                        'post_type' => 'events',
                                        'posts_per_page' => -1 );
    
                        $loop = new WP_Query( $args );
                            
                                
                        if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();

                                $today = date('U') - (60 * 60 * 24);
                                $date = get_post_meta($post->ID, 'gxg_date', true);
                                $timestamp = strtotime($date);
                                $timestamp = strtotime($date);   
                                $pretty_date_yy = date('Y', $timestamp);
                                $pretty_date_M = date('M', $timestamp);
                                $pretty_date_d = date('d', $timestamp);
                                $pretty_date_l = date('l', $timestamp);
                                
                                $enddate = get_post_meta($post->ID, 'gxg_eventenddate', true);
                                
                                
                                if ( of_get_option('gg_showevents') == 'keep' ) {
                                	$showdate = date('U') + (60 * 60 * 24 * 99999);
                                }                                
                                elseif ($enddate) {
                                	$showdate = strtotime($enddate);
                                }
                                else {
                                	$showdate = strtotime($date);
                                }
                                
                                $time = get_post_meta($post->ID, 'gxg_time', true);
                                $event_thumb = get_the_post_thumbnail($post->ID, 'full', array('title' => ''));  
                                                                                                
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
                                
                                //recurring events
                                $recurring = get_post_meta($post->ID, 'gxg_recurring', true);
                                if ($recurring) {  
                                ?>
                                <li class="box col6 boxbg">
                                        <div class="inner-box">
                                                <h1 class="event-title-w text-center"><?php the_title(); ?></h1>
                                                  
                                                <div class="recurring text-center">
                                                <?php echo $recurring; ?>    
                                                </div>
        
                                                <div class="clear"></div>
        
                                                <div class="event-info text-center"> 
                                                        <?php global $more; $more = 0; ?>
                                                        <?php the_content(__('<span class="moretext"> view details </span>', 'gxg_textdomain')); ?>
                                                </div>
                                                
                                                <div class="clear"></div>
                                                
                                                <?php if ($event_thumb){
                                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                                                ?>   
                                                        <div class="events-thumb prettyimage-wrap">   
                                                                <a class="pretty_image" data-rel="prettyPhoto" href="<?php echo $image[0] ?>"><span class='image-rollover'><i class='gallery-resize-icon fa fa-expand'></i></span>                                             
                                                                        <?php echo $event_thumb; ?>
                                                                </a>    
                                                        </div> 
                                                <?php
                                                }
                                                ?>                                                      
        
                                        </div> 
                                </li>
                                <?php
                                }
          
                                // regular events                                     
                               elseif ($showdate > $today ) {          
                                        
                                ?>
                                     
                                <li class="box col6 boxbg">
                                        <div class="inner-box">
                                                <h1 class="event-title-w text-center"><?php the_title(); ?></h1>
                                                  
                                                <div class="pretty-date text-center">
                                              
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
                                                		
                                                <?php if ($time) { ?> <div class="event-time text-center"> - <?php echo $time; ?> - </div> <?php } ?> 


                                                <div class="clear"></div>

                                                
                                                <div class="event-info text-center"> 
                                                        <?php global $more; $more = 0; ?>
                                                        <?php the_content(__('<span class="moretext"> view details </span>', 'gxg_textdomain')); ?>
                                                </div>
                                                
                                                <div class="clear"></div>
                                                
	                                        <?php if ($event_thumb){
	                                        	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
	                                        ?>   
	                                                <div class="events-thumb prettyimage-wrap">   
	                                                
	                                                	<a class="pretty_image" data-rel="prettyPhoto" href="<?php echo $image[0] ?>"><span class='image-rollover'><i class='gallery-resize-icon fa fa-expand'></i></span>                                             
	                                                        	<?php echo $event_thumb; ?>
	                                                        	
	                                                        </a>    
	                                                </div> 
	                                        <?php
	                                        }
	                                        ?>                                                      

                                        </div> 
                                </li>
                                                        
                        <?php } 
                        
                        endwhile;
                        
                        else:  ?>
                                             
                                <!-- what if there are no dates? -->
                                <div class="no_dates box col12 text-center">
                                <p> <?php _e('There are no dates yet.', 'gxg_textdomain'); ?> </p>
                                </div>
                        <?php
                         
                        endif;
                        
                        // Always include a reset at the end of a loop to prevent conflicts with other possible loops                 
                        wp_reset_query();                        
                        
                        ?>
                        </ul>
        
        
        <div class="clear">
        </div><!-- .clear-->

<?php get_footer(); ?>