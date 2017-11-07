<?php
/*
  Template Name: LeftSidebar
 */
?>
<?php get_header(); ?>
<div class="row content-area clearfix"> 
	<div class="grid_8 for-left-sidebar">    
		<?php get_template_part( 'loop' ); ?>
	</div>
	<aside class="grid_4">
		<div class="left-sidebar">
			<?php (get_post_meta( get_the_ID(), SHORTNAME . '_page_sidebar', true )) ? $sidebar = get_post_meta( get_the_ID(), SHORTNAME . '_page_sidebar', true ) : $sidebar = 'default-sidebar';
			generated_dynamic_sidebar_th( $sidebar ); ?>
		</div>
	</aside>
</div>
<?php get_footer(); ?>
