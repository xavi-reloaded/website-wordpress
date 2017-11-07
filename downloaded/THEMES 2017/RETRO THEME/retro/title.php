<?php
if ( is_tax() || is_tag() || is_category() ) {
	global $wp_query;
	$term = $wp_query->get_queried_object();
	$sliderAlias = (get_tax_meta( $term->term_id, SHORTNAME . '_tax_slider', true )) ? get_tax_meta( $term->term_id, SHORTNAME . '_tax_slider', true ) : get_option( SHORTNAME . Admin_Theme_Item_Slideshow::TYPE );
} elseif ( is_home() && ! get_option( 'page_on_front' ) ) {
	$sliderAlias = get_option( SHORTNAME . '_blog_slideshow' );
} elseif ( is_home() && get_post_meta( get_option( 'page_for_posts' ), SHORTNAME . '_post_slider', true ) ) {
	$sliderAlias = get_post_meta( get_option( 'page_for_posts' ), SHORTNAME . '_post_slider', true );
} elseif ( is_home() && ! get_post_meta( get_option( 'page_for_posts' ), SHORTNAME . '_post_slider', true ) ) {
	$sliderAlias = get_option( SHORTNAME . Admin_Theme_Item_Slideshow::TYPE );
} elseif ( is_post_type_archive( 'product' ) ) {
	if ( is_shop() ) {
		$pid = wc_get_page_id( 'shop' );
		$sliderAlias = (get_post_meta( $pid, SHORTNAME . '_post_slider', true )) ? get_post_meta( $pid, SHORTNAME . '_post_slider', true ) : get_option( SHORTNAME . Admin_Theme_Item_Slideshow::TYPE );
	}
} elseif ( is_page() || (is_single() && $post->post_type == 'post') || (is_single() && $post->post_type == Custom_Posts_Type_Portfolio::POST_TYPE) || (is_single() && $post->post_type == Custom_Posts_Type_Testimonial::POST_TYPE) || (is_single() && $post->post_type == 'product') ) {

	// Slideshow
	$pid = (isset( $post->ID )) ? $post->ID : null;
	$sliderAlias = (get_post_meta( $pid, SHORTNAME . '_post_slider', true )) ? get_post_meta( $pid, SHORTNAME . '_post_slider', true ) : get_option( SHORTNAME . Admin_Theme_Item_Slideshow::TYPE );
} else {
	$sliderAlias = '';
}


if ( $sliderAlias !== false && $sliderAlias !== '' ) {
	switch ( $sliderAlias ) {
		case 'revSlider':
			{
				locate_template( array( 'cycleRev.php' ), true, true );
				break;
		}
		case 'Disable':
			{
				break;
		}
		default:
			{
			if ( $sliderAlias = get_option( SHORTNAME . Admin_Theme_Item_Slideshow::TYPE ) ) {
				switch ( $sliderAlias ) {
					case 'revSlider':
						{
							locate_template( array( 'cycleRev.php' ), true, true );
							break;
					}
				}
			}
		}
		}
}

// Title
if ( ! is_front_page() && ( ! $sliderAlias || $sliderAlias == 'Disable') && ! is_single() ) {
	?>
	<div id="pagetitle">
		<div class="pagetitle-bg1"><div class="pagetitle-bg2">
				<div class="row clearfix">
					<div class="grid_12">
						<h1 class="page-title">
							<?php
							if ( is_day() ) {
								printf( __( 'Daily Archives: <span>%s</span>', 'retro' ), get_the_date() );
							} elseif ( is_month() ) {
								printf( __( 'Monthly Archives: <span>%s</span>', 'retro' ), get_the_date( 'F Y' ) );
							} elseif ( is_year() ) {
								printf( __( 'Yearly Archives: <span>%s</span>', 'retro' ), get_the_date( 'Y' ) );
							} elseif ( is_tag() ) {
								echo single_tag_title( '', false );
							} elseif ( is_category() ) {
								echo single_cat_title( '', false );
							} elseif ( is_404() ) {
								_e( '404 - Oops!', 'retro' );
							} elseif ( is_search() ) {
								_e( 'Results for: ', 'retro' );
								the_search_query();
								;
							} elseif ( is_tax() ) {
								global $wp_query;
								$term = $wp_query->get_queried_object();
								echo $term->name;
							} elseif ( get_option( 'show_on_front' ) == 'page' && is_home() ) {
								echo get_the_title( get_option( 'page_for_posts' ) );
							} elseif ( is_author() ) {
								if ( have_posts() ) :
									the_post();
									_e( 'Author Archives: ', 'retro' );
									the_author();
									rewind_posts();
								else :
									_e( 'No posts for current author', 'retro' );
								endif;
							} elseif ( is_post_type_archive( 'product' ) ) {
								if ( is_shop() ) {
									$pid = wc_get_page_id( 'shop' );
									echo get_the_title( $pid );
								} else {
									the_title();
								}
							} else {
								the_title();
							}
							?>  
						</h1>
					</div>
				</div>
			</div></div>
	</div>

<?php } ?>

<?php
if ( ( ! $sliderAlias || $sliderAlias == 'Disable') && (is_single() && $post->post_type == 'post') && get_option( 'page_on_front' ) ) :
	$blogpage = get_option( 'page_for_posts' );
	?>
	<div id="pagetitle">
		<div class="row clearfix">
			<div class="grid_12">
				<h1 class="page-title"><?php echo get_the_title( $blogpage ); ?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php
if ( ( ! $sliderAlias || $sliderAlias == 'Disable') && is_front_page() && ! get_option( 'page_on_front' ) && get_option( SHORTNAME . '_blog_title' ) ) :
	$blogpage = get_option( 'page_for_posts' );
	?>
	<div id="pagetitle">
		<div class="row clearfix">
			<div class="grid_12">
				<h1 class="page-title"><?php echo get_option( SHORTNAME . '_blog_title' ); ?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php
if ( ( ! $sliderAlias || $sliderAlias == 'Disable') && (is_single() && $post->post_type == 'post') && ! get_option( 'page_on_front' ) && get_option( SHORTNAME . '_blog_title' ) ) :
	$blogpage = get_option( 'page_for_posts' );
	?>
	<div id="pagetitle">
		<div class="row clearfix">
			<div class="grid_12">
				<h1 class="page-title"><?php echo get_option( SHORTNAME . '_blog_title' ); ?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>



<?php
if ( (is_single() && $post->post_type == 'product') && ( ! $sliderAlias || $sliderAlias == 'Disable') ) :
	$pid = wc_get_page_id( 'shop' );
	?>
	<div id="pagetitle">
		<div class="row clearfix">
			<div class="grid_12">
				<h1 class="page-title"><?php echo get_the_title( $pid ); ?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php if ( is_single() && $post->post_type == Custom_Posts_Type_Portfolio::POST_TYPE && ( ! $sliderAlias || $sliderAlias == 'Disable') ) : ?>
	<div id="pagetitle">
		<div class="row clearfix">
			<div class="grid_12" style=" overflow:hidden;">
				<h2 class="page-title"><?php echo get_the_title( get_the_ID() ); ?></h2>
			</div>
			<ul class="pagination">
				<?php
				if ( get_adjacent_post( false, '', true ) ) {
					?>
					<li class="prev-item"><?php previous_post_link( ' %link ', '' ); ?></li>
				<?php } ?>
				<?php
				if ( get_adjacent_post( false, '', false ) ) {
					?>
					<li class="next-item"><?php next_post_link( ' %link ', '' ); ?></li>
	<?php } ?>
			</ul>
		</div>
	</div>
<?php endif; ?>
