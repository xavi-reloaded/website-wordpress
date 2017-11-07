<?php get_header(); ?>
<?php
global $wp_query;
$term = $wp_query->get_queried_object();
$post_layout = (get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true ))
					? get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_layout', true )
					: 'layout_' . get_option( SHORTNAME . '_portfolios_listing_layout' ) . '_sidebar';

$post_sidebar = (get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_sidebar', true ))
					? get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_sidebar', true )
					: get_option( SHORTNAME . '_portfolios_listing_sidebar' );

?>
<div class="row content-area clearfix">
		
	<div class="<?php if ( $post_layout == 'layout_left_sidebar' ) {echo ('for-left-sidebar ');
} echo ($post_layout == 'layout_none_sidebar') ? 'grid_12' : 'grid_8'; ?>">    
		<?php get_template_part( 'loop','portfolio' ); ?>
	</div>
	<?php if ( $post_layout == 'layout_left_sidebar' ) { ?>
		<aside class="grid_4">
			<div class="left-sidebar">
				<?php $sidebar = ($post_sidebar) ? $post_sidebar : 'default-sidebar';
					generated_dynamic_sidebar_th( $sidebar );
				?>
			</div>
		</aside>
	<?php } ?>
	<?php if ( $post_layout == 'layout_right_sidebar' ) { ?>
		<aside class="grid_4">
			<div class="right-sidebar">
				<?php $sidebar = ($post_sidebar) ? $post_sidebar : 'default-sidebar';
					generated_dynamic_sidebar_th( $sidebar );
				?>
			</div>
		</aside>
	<?php } ?>
</div>
<?php get_footer(); ?>