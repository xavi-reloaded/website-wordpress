<?php
$query = siteorigin_widget_post_selector_process_query( $instance['posts'] );

$query = array_merge( $query, array( $query, 'meta_query' => array(array('key' => '_thumbnail_id' ) ) ) );

$options['id'] = $instance['widget_id'];
$options['title'] =  $args['before_title'] . esc_html($instance['title']) . $args['after_title'];
$options['pagination'] = $instance['controls']['pagination'];
$options['animation'] = $instance['controls']['animation'];
$options['date_format'] = $instance['controls']['date_format'];
$options['disable_date'] = $instance['controls']['disable_date'];
$options['date_link'] = $instance['controls']['date_link'];
$options['disable_cat'] = $instance['controls']['disable_cat'];
$options['disable_comment'] = $instance['controls']['disable_comment'];
$options['disable_author'] = $instance['controls']['disable_author'];
$options['disable_excerpt'] = $instance['controls']['disable_excerpt'];
$options['excerpt_length'] = $instance['controls']['excerpt_length'];
$options['disable_more'] = $instance['controls']['disable_more'];
$options['thumb_size'] = "flipmag-main-full";

if( class_exists('Flipmag')){echo wp_kses_stripslashes(Flipmag::blocks()->Module_7( $options, $query ));} ?>