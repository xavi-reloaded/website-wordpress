<?php
/**
 * Single view Job meta box
 *
 * Hooked into single_job_listing_start priority 20
 *
 * @since  3.0.0
 */
global $post;

do_action( 'single_job_listing_meta_before' ); ?>

<ul class="job-listing-meta meta">
	<?php do_action( 'single_job_listing_meta_start' ); ?>

	<li class="job-type <?php echo jobify_get_the_job_type() ? sanitize_title( jobify_get_the_job_type()->slug ) : ''; ?>"><?php jobify_the_job_type(); ?></li>

	<li class="location"><?php echo jobify_get_formatted_address(); ?></li>

	<li class="date-posted"><date><?php printf( __( 'Posted %s ago', 'jobify' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>

	<?php if ( jobify_is_listing_position_filled() ) : ?>
		<li class="position-filled"><?php _e( 'This position has been filled', 'jobify' ); ?></li>
	<?php elseif ( ! candidates_can_apply() && 'preview' !== $post->post_status ) : ?>
		<li class="listing-expired"><?php _e( 'Applications have closed', 'jobify' ); ?></li>
	<?php endif; ?>

	<?php do_action( 'single_job_listing_meta_end' ); ?>
</ul>

<?php do_action( 'single_job_listing_meta_after' ); ?>
