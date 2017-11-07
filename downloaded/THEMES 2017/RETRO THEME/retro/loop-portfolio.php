<?php if ( ! is_single() ) { ?>
	<div class="row"><div class="portfolio_wrap portfolio_listing_page clearfix  portfolio-medium">
<?php } ?>
<?php
/*	Start the Loop  */
if ( have_posts() ) :?>
<?php	while ( have_posts() ) : the_post();

		$disable_thumb = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_hide_thumb', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_hide_thumb', true ) : null;
		$live_url = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_url', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_url', true ) : null;
		$live_button = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_url_button', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_url_button', true ) : __( 'Launch project', 'retro' );
		$preview_url = (get_post_meta( get_the_ID(), SHORTNAME . '_url_lightbox', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_url_lightbox', true ) : null;
		$use_lightbox = (get_post_meta( get_the_ID(), SHORTNAME . '_use_lightbox', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_use_lightbox', true ) : null;
		$hide_more = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_hide_more', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_hide_more', true ) : null;
		$show_feature = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_show_feature', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_show_feature', true ) : null;
		$more_button = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_more_text', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_more_text', true ) : __( 'Learn more', 'retro' );
		$live_target = (get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_target', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_target', true ) : null;
		$ext = null;
		$post_layout = (get_post_meta( get_the_ID(), SHORTNAME . '_post_layout', true )) ? get_post_meta( get_the_ID(), SHORTNAME . '_post_layout', true ) : 'layout_' . get_option( SHORTNAME . '_portfolio_layout' ) . '_sidebar';


	if ( $preview_url ) {
		$hostname = parse_url( $preview_url, PHP_URL_HOST );

		if ( preg_match( "/\b(?:vimeo|youtube|dailymotion|youtu)\.(?:com|be)\b/i", $hostname ) ) {
			$ext = 'video';
		} else {
			$path = parse_url( $preview_url, PHP_URL_PATH );
			$ext = pathinfo( $path, PATHINFO_EXTENSION );
		}
	}
		/*	Single page */
	if ( is_single() ) :
	?>
	
	<div class="portfolio_single">
		<article <?php post_class( 'clearfix' ) ?> >
			<?php wp_enqueue_script( 'flexslider' ); ?>
				
				
			<div class="<?php if ( $post_layout == 'layout_left_sidebar' ) {echo ('for-left-sidebar ');
} echo ($post_layout == 'layout_none_sidebar') ? 'grid_12' : 'grid_8'; ?>">
				<?php
					$portfolio_slides = get_post_meta( get_the_ID(), SHORTNAME . '_project_slider' );
				if ( $portfolio_slides && isset( $portfolio_slides[0][0]['slide-img-src'] ) && $portfolio_slides[0][0]['slide-img-src'] != '' ) :?>
							<div class="flexslider">
								<ul class="slides">
								<?php foreach ( array_shift( $portfolio_slides ) as $slides ) :?>
									<li>
										<img src="<?php echo  $slides['slide-img-src']?>">
									</li>
								<?php endforeach;?>
								</ul>
							</div>
						<?php elseif ( has_post_thumbnail() && $show_feature ) :
							get_theme_post_thumbnail( get_the_ID(), 'large' );
						endif;
					?>
					<div class="entry-content">
					<?php the_content(); ?>
						<?php if ( $live_url ) { ?>
							<div class="clearfix line_btn"><a href="<?php echo $live_url; ?>" class="btn_border" <?php echo ($live_target) ? 'target="_blank"' : ''; ?> ><span><?php echo $live_button; ?></span></a></div>
						<?php } ?>
					</div>
					<?php comments_template( '', true ); ?>
				</div>
				<?php if ( $post_layout == 'layout_left_sidebar' ) { ?>
					<aside class="grid_4">
						<div class="left-sidebar">
							<div class="entry-content">
								<?php echo ox_the_content( get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_additional', true ) ); ?>
							</div>
						</div>
					</aside>
				<?php } ?>
				<?php if ( $post_layout == 'layout_right_sidebar' ) { ?>
					<aside class="grid_4">
						<div class="right-sidebar">
							<div class="entry-content">
								<?php echo ox_the_content( get_post_meta( get_the_ID(), SHORTNAME . '_portfolio_additional', true ) ); ?>
							</div>
						</div>
					</aside>
				<?php } ?>
			</article>
		</div>
	
			<?php
			/*	Categories/tags/archives listing */
		elseif ( is_archive() ) :

			global $wp_query;
			$term = $wp_query->get_queried_object();
			// get local option
			$post_layout = (get_tax_meta( $term->term_id, SHORTNAME . '_port_listing_layout', true ))
					? get_tax_meta( $term->term_id, SHORTNAME . '_port_listing_layout', true )
					: null;
			// echo '1'.get_tax_meta($term->term_id, SHORTNAME . "_port_listing_layout", true).'2';
			// get global option
			// $post_layout = (!$post_layout) ? 'layout_' . get_option(SHORTNAME . '_portfolios_listing_layout') . '_sidebar' : $post_layout;
			echo $post_layout;
					$num = ($post_layout == 'layout_none_sidebar') ? '3' : '2';
					$linebreak = ($wp_query->current_post % $num == 0  )? 'clearboth':'';
				?>
						<article <?php post_class( ' portfolios_listing  medium grid_4 ' . $linebreak ) ?> id="post-<?php the_ID(); ?>">
							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php
								if ( $preview_url ) {
									echo $preview_url;
								} elseif ( ! $preview_url && $use_lightbox ) {
									$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
									echo $imgsrc[0];
									$ext = 'jpg';
								} else {
									the_permalink();
								}
									?>" <?php echo ($use_lightbox) ? 'data-pp="lightbox[]"' : ''; ?>  title="<?php echo the_title(); ?>" class="portfolio-lightbox-small portfolio-lightbox <?php echo $ext; ?>"><b><?php get_theme_post_thumbnail( get_the_ID(), 'portfolio_modern' ); ?><span class="portfolio-shadow transparent-shadow"></span></b><span class="portfolio-zoom "><?php _e( 'view','retro' ) ?></span></a>
							<?php } ?>
							<div class="postcontent  clearfix">
								<h2 class="entry-title"><?php if ( isset( $icon ) && $icon ) {
										?><img src="<?php echo $icon ?>" alt="<?php the_title() ?>"  ><?php
}
									?><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
								</h2>
								<div class="meta" style="display:none"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
										 	<div class="entry-date updated"><?php echo  get_the_date(); ?></div>
										</div>  
								<div class="entry-content">
									<?php excerpt( 200 ); ?>
								</div>
							</div>
						</article>
				
			<?php endif; ?>
		<?php endwhile; ?>


<?php if ( ! is_single() ) { ?>
	</div>
<?php } ?>



		<?php
		// get total number of pages
		global $wp_query;
		$total = $wp_query->max_num_pages;
		// only bother with the rest if we have more than 1 page!
		if ( $total > 1 ) {
			?>
		<div class="pagination clearfix">
			<?php
			// get the current page
			if ( get_query_var( 'paged' ) ) {
				$current_page = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$current_page = get_query_var( 'page' );
			} else {
				$current_page = 1;
			}
			// structure of "format" depends on whether we're using pretty permalinks
			$permalink_structure = get_option( 'permalink_structure' );
			if ( empty( $permalink_structure ) ) {
				if ( is_front_page() ) {
					$format = '?paged=%#%';
				} else {
					$format = '&paged=%#%';
				}
			} else {
				$format = 'page/%#%/';
			}



			echo paginate_links(array(
				'base' => get_pagenum_link( 1 ) . '%_%',
				'format' => $format,
				'current' => $current_page,
				'total' => $total,
				'mid_size' => 10,
				'type' => 'list',
			));
			?>
		</div>
	<?php } ?>
<?php else : ?>
	<article class="hentry">
		<h1>
	<?php _e( 'Not Found', 'retro' ); ?>
		</h1>
		<p class="center">
	<?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'retro' ); ?>
		</p>
	</article>
<?php endif; ?>

<?php if ( ! is_single() ) { ?>
	</div>
<?php } ?>

<?php wp_reset_query(); ?>
