<?php
/*
  Template Name: RightSidebar
 */
?>
<?php get_header(); ?>
<div class="row content-area clearfix">
	<div class="grid_8">    
		<?php get_template_part( 'loop' ); ?>
	</div>
	<aside class="grid_4">
		<div class="right-sidebar">
			<?php (get_post_meta( get_the_ID(), SHORTNAME . '_page_sidebar', true )) ? $sidebar = get_post_meta( get_the_ID(), SHORTNAME . '_page_sidebar', true ) : $sidebar = 'default-sidebar';
			generated_dynamic_sidebar_th( $sidebar ); ?>
		</div>
	</aside>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>
