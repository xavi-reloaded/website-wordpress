<?php
/*
Template Name: Events 1 column
*/
?>

<?php get_header(); ?>
    	               
	                <h1 class="pagetitle col12 text-center"> <?php the_title(); ?> </h1>
                        
                        <?php if ($post->post_content!="" and have_posts() ) : while ( have_posts() ) : the_post(); ?>                          	                               
                                <div class="topcontent col12 text-center"><?php the_content(); ?></div> 
                        <?php endwhile; endif; ?>  
	                                                        
                        <ul class="events events1col centered m-container js-masonry">
                        
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
                                $pretty_date_F = date('F', $timestamp);
                                $pretty_date_d = date('d', $timestamp);
                                $pretty_date_l = date('l', $timestamp);
                                $time = get_post_meta($post->ID, 'gxg_time', true);

                                $enddate = get_post_meta($post->ID, 'gxg_eventenddate', true);
                                $endtime = get_post_meta($post->ID, 'gxg_eventendtime', true);
                                $timestamp_end = strtotime($enddate);
                                $pretty_enddate_yy = date('Y', $timestamp_end);
                                $pretty_enddate_F = date('F', $timestamp_end);
                                $pretty_enddate_d = date('d', $timestamp_end);
                                $pretty_enddate_l = date('l', $timestamp_end);
                                
                               
                                if ( of_get_option('gg_showevents') == 'keep' ) {
                                	$showdate = date('U') + (60 * 60 * 24 * 99999);
                                }                                
                                elseif ($enddate) {
                                	$showdate = strtotime($enddate);
                                }
                                else {
                                	$showdate = strtotime($date);
                                }
                                
                                $info = get_the_content();
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
                                        
                                        switch($pretty_date_F) /*make month translation ready */
                                        {
                                                case "January":  $pretty_date_F = __('January', 'gxg_textdomain');  break;
                                                case "February":  $pretty_date_F = __('February', 'gxg_textdomain');  break;
                                                case "March":  $pretty_date_F = __('March', 'gxg_textdomain');  break;
                                                case "April":  $pretty_date_F = __('April', 'gxg_textdomain');  break;
                                                case "May":  $pretty_date_F = __('May', 'gxg_textdomain');  break;
                                                case "June":  $pretty_date_F = __('June', 'gxg_textdomain');  break;
                                                case "July":  $pretty_date_F = __('July', 'gxg_textdomain');  break;                                                
                                                case "August":  $pretty_date_F = __('August', 'gxg_textdomain');  break;
                                                case "September":  $pretty_date_F = __('September', 'gxg_textdomain');  break;
                                                case "October":  $pretty_date_F = __('October', 'gxg_textdomain');  break;
                                                case "November":  $pretty_date_F = __('November', 'gxg_textdomain');  break;
                                                case "December":  $pretty_date_F = __('December', 'gxg_textdomain');  break;                                                
                                                default:     $pretty_date_F = ""; break;
                                        }
                                        
                                        switch($pretty_enddate_l) /*make weekday translation ready */
                                        {
                                                case "Monday":  $pretty_enddate_l = __('Monday', 'gxg_textdomain');  break;
                                                case "Tuesday":  $pretty_enddate_l = __('Tuesday', 'gxg_textdomain');  break;
                                                case "Wednesday":  $pretty_enddate_l = __('Wednesday', 'gxg_textdomain');  break;
                                                case "Thursday":  $pretty_enddate_l = __('Thursday', 'gxg_textdomain');  break;
                                                case "Friday":  $pretty_enddate_l = __('Friday', 'gxg_textdomain');  break;
                                                case "Saturday":  $pretty_enddate_l = __('Saturday', 'gxg_textdomain');  break;
                                                case "Sunday":  $pretty_enddate_l = __('Sunday', 'gxg_textdomain');  break;
                                                default:     $pretty_enddate_l = ""; break;
                                        }                                        
                                        
                                        switch($pretty_enddate_F) /*make month translation ready */
                                        {
                                                case "January":  $pretty_enddate_F = __('January', 'gxg_textdomain');  break;
                                                case "February":  $pretty_enddate_F = __('February', 'gxg_textdomain');  break;
                                                case "March":  $pretty_enddate_F = __('March', 'gxg_textdomain');  break;
                                                case "April":  $pretty_enddate_F = __('April', 'gxg_textdomain');  break;
                                                case "May":  $pretty_enddate_F = __('May', 'gxg_textdomain');  break;
                                                case "June":  $pretty_enddate_F = __('June', 'gxg_textdomain');  break;
                                                case "July":  $pretty_enddate_F = __('July', 'gxg_textdomain');  break;                                                
                                                case "August":  $pretty_enddate_F = __('August', 'gxg_textdomain');  break;
                                                case "September":  $pretty_enddate_F = __('September', 'gxg_textdomain');  break;
                                                case "October":  $pretty_enddate_F = __('October', 'gxg_textdomain');  break;
                                                case "November":  $pretty_enddate_F = __('November', 'gxg_textdomain');  break;
                                                case "December":  $pretty_enddate_F = __('December', 'gxg_textdomain');  break;                                                
                                                default:     $pretty_enddate_F = ""; break;
                                        }                                      
                                        
                                ?>
                                
                                <?php
                                
                                
                                
                                
                                //recurring events
                                $recurring = get_post_meta($post->ID, 'gxg_recurring', true);
                                if ($recurring) {  
                                ?>
                                <li class="box col12 boxbg">
                                        <div class="inner-box">
                                                <h1 class="event-title text-center"><?php the_title(); ?></h1>
                                               
                                                <div class="clear"></div>

                                                <?php if($info){?>
                                                <div class="event-more-info moretext more-regular"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to', 'gxg_textdomain') ?> <?php the_title_attribute(); ?>"><?php _e('view details', 'gxg_textdomain') ?></a></div>
                                                <?php } ?>
                                                
                                                <div class="recurring recurring1">
                                                        <?php echo $recurring; ?>                                                 
                                                </div>
						
						<div class="clear"></div><!-- .clear-->
						
						<?php if($info){?>
						<div class="event-more-info moretext more-responsive"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to', 'gxg_textdomain') ?> <?php the_title_attribute(); ?>"><?php _e('view details', 'gxg_textdomain') ?></a></div>
						<?php } ?>

                                        </div> 
                                </li>
                                <?php
                                }
          
                                // regular events                                 
                                elseif ($showdate > $today) {   

                                $month = $pretty_date_F . ' ' . $pretty_date_yy;
                                
                                if (!isset($month_check) || isset($month_check) && $month !== $month_check) { ?>
                                
                                <li class="box col12 text-center events-month">
                                        <h4 class="eventsmonth"><?php echo $month; ?></h4>
                                </li>
                                
                                <?php }
                                
                                $month_check = $month;                               
                                
                                ?>
                                 
                                <li class="box col12 boxbg">
                                        <div class="inner-box">              	
                                        
                                                <h1 class="event-title"><?php the_title(); ?></h1>
                                                
                                                <div class="clear"></div>
                                                <?php if($info){?>
                                                <div class="event-more-info moretext more-regular"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to', 'gxg_textdomain') ?> <?php the_title_attribute(); ?>"><?php _e('view details', 'gxg_textdomain') ?></a></div>
                                                <?php } ?>
                                                
                                                <div class="event-date">
                                                        <?php echo $pretty_date_l; ?>, <?php echo $pretty_date_d; ?> <?php echo $pretty_date_F; ?> <?php echo $pretty_date_yy; ?><?php if ($time) { ?><div class="event-time">, <?php echo $time; ?></div> <?php } ?> 
                                                
                                                
                                                
                                                	<?php if ( ($enddate) || ($endtime) ) { ?>
                                                                	<span class="until">-</span>                                                     
                                                                
                                                                        <?php if ($enddate) { ?>
                                                                                <?php echo $pretty_enddate_l; ?>, <?php echo $pretty_enddate_d; ?> <?php echo $pretty_enddate_F; ?> <?php echo $pretty_enddate_yy; ?><?php }
                                                                        
                                                                        if ( ($enddate) AND ($endtime) ) { ?>, <?php } ?>
                                                                        
                                                                        <?php if ($endtime) { ?>
                                                                                <?php echo $endtime; ?>
                                                                        <?php } ?>
                                                	<?php } ?> 

                                                </div>
						
						<div class="clear"></div><!-- .clear-->
						
						<?php if($info){?>
						<div class="event-more-info moretext more-responsive"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to', 'gxg_textdomain') ?> <?php the_title_attribute(); ?>"><?php _e('view details', 'gxg_textdomain') ?></a></div>
						<?php } ?>	                                                
 
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