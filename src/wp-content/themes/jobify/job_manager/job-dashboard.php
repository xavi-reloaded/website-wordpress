<?php
/**
 * Job dashboard shortcode content.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-dashboard.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.27.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div id="job-manager-job-dashboard">
	<p><?php _e( 'Your listings are shown in the table below.', 'wp-job-manager' ); ?></p>
    <?php if ( ! $jobs ) : ?>
        <div><?php _e( 'You do not have any active listings.', 'wp-job-manager' ); ?></div>
    <?php else : ?>
        <?php foreach ( $jobs as $job ) : ?>
        <div class="dashboardCompany">
            <div class="title">Titulo</div>
            <?php foreach ( $job_dashboard_columns as $key => $column ) : ?>
                <?php if ('job_title' === $key ) : ?>
                    <?php if ( $job->post_status == 'publish' ) : ?>
                        <div class="job"><a href="<?php echo get_permalink( $job->ID ); ?>"><?php wpjm_the_job_title( $job ); ?></a></div>
                    <?php else : ?>
                        <div class="job"><?php wpjm_the_job_title( $job ); ?> (<?php the_job_status( $job ); ?>)</div>
                    <?php endif; ?>
                    <?php
                    $actions = array();

                    switch ( $job->post_status ) {
                        case 'publish' :
                            $actions['edit'] = array( 'label' => __( 'Edit', 'wp-job-manager' ), 'nonce' => false );

                            if ( is_position_filled( $job ) ) {
                                $actions['mark_not_filled'] = array( 'label' => __( 'Mark not filled', 'wp-job-manager' ), 'nonce' => true );
                            } else {
                                $actions['mark_filled'] = array( 'label' => __( 'Mark filled', 'wp-job-manager' ), 'nonce' => true );
                            }

                            $actions['duplicate'] = array( 'label' => __( 'Duplicate', 'wp-job-manager' ), 'nonce' => true );
                            break;
                        case 'expired' :
                            if ( job_manager_get_permalink( 'submit_job_form' ) ) {
                                $actions['relist'] = array( 'label' => __( 'Relist', 'wp-job-manager' ), 'nonce' => true );
                            }
                            break;
                        case 'pending_payment' :
                        case 'pending' :
                            if ( job_manager_user_can_edit_pending_submissions() ) {
                                $actions['edit'] = array( 'label' => __( 'Edit', 'wp-job-manager' ), 'nonce' => false );
                            }
                            break;
                    }

                    $actions['delete'] = array( 'label' => __( 'Delete', 'wp-job-manager' ), 'nonce' => true );
                    $actions           = apply_filters( 'job_manager_my_job_actions', $actions, $job );

                    foreach ( $actions as $action => $value ) {
                        $action_url = add_query_arg( array( 'action' => $action, 'job_id' => $job->ID ) );
                        if ( $value['nonce'] ) {
                            $action_url = wp_nonce_url( $action_url, 'job_manager_my_job_actions' );
                        }
                        echo '<div class="job-dashboard-actions"><a href="' . esc_url( $action_url ) . '" class="job-dashboard-action-' . esc_attr( $action ) . '">' . esc_html( $value['label'] ) . '</a></div>';
                    }
                    ?>
                <?php elseif ('date' === $key ) : ?>
                    <div class="left">Fecha de publicación</div>
                    <div class="right"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $job->post_date ) ); ?></div>
                <?php elseif ('expires' === $key ) : ?>
                    <div class="left">El anuncio caduca</div>
                    <div class="right"><?php echo $job->_job_expires ? date_i18n( get_option( 'date_format' ), strtotime( $job->_job_expires ) ) : '&ndash;'; ?></div>
                <?php elseif ('filled' === $key ) : ?>
                    <div class="left">¿Disponible?</div>
                    <div class="right"><?php echo is_position_filled( $job ) ? '&ndash;' : '&#10004;'; ?></div>
                <?php else : ?>
                    <?php do_action( 'job_manager_job_dashboard_column_' . $key, $job ); ?>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

	<?php get_job_manager_template( 'pagination.php', array( 'max_num_pages' => $max_num_pages ) ); ?>
</div>
