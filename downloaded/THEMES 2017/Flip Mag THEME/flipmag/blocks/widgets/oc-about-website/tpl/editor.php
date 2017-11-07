<div id="flipmag-bid-<?php echo esc_attr($instance['widget_id']); ?>">
	<?php if( !empty( $instance['title'] ) ) echo wp_kses_stripslashes($args['before_title']) . esc_html($instance['title']) . wp_kses_stripslashes($args['after_title']) ?>

	<div class="siteorigin-widget-tinymce textwidget">
		<?php echo ($text); ?>
	</div>
</div>