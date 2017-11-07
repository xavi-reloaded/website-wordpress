<?php
/**
 * Job: Tags
 *
 * @since Jobify 1.6.0
 */
class Jobify_Widget_Job_Tags extends Jobify_Widget {

	public function __construct() {
		$this->widget_cssclass    = 'jobify_widget_job_tags';
		$this->widget_description = __( 'Display the job\'s tags', 'jobify' );
		$this->widget_id          = 'jobify_widget_job_tags';
		$this->widget_name        = __( 'Jobify - Job: Tags', 'jobify' );
		$this->settings           = array(
			'job_listing' => array(
				'std' => __( 'Job', 'jobify' ),
				'type' => 'widget-area'
			),
			'title' => array(
				'type'  => 'text',
				'std'   => 'Tags',
				'label' => __( 'Title:', 'jobify' )
			)
		);

		parent::__construct();
	}

	function widget( $args, $instance ) {
		$output = $content = '';

		$title = apply_filters( 'widget_title', isset ( $instance[ 'title' ] ) ? $instance[ 'title' ] : '', $instance, $this->id_base );
		$tags  = get_the_terms( get_the_ID(), 'job_listing_tag' );

		if ( empty( $tags ) ) {
			return;
		}

		$output .= $args[ 'before_widget' ];

		if ( $title ) {
			$output .= $args[ 'before_title' ] . $title . $args[ 'after_title' ]; 
		}

		foreach ( $tags as $tag ) {
			$content .= sprintf(
				'<a href="%s" class="job-tag">%s</a>',
				esc_url( get_term_link( $tag, 'job_listing_tag' ) ),
				esc_attr( $tag->name )
			);
		}

		$output .= apply_filters( $this->widget_id . '_content', $content, $instance, $args );

		$output .= $args[ 'after_widget' ];

		$output = apply_filters( $this->widget_id, $output, $instance, $args );

		echo $output;
	}
}
