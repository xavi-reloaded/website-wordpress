<?php get_header(); ?>
<div class="row content-area clearfix">
	
	<div class="<?php if ( get_option( SHORTNAME . '_post_listing_layout' ) == 'left' ) { echo 'for-left-sidebar ';
} echo (get_option( SHORTNAME . '_post_listing_layout' ) == 'none') ? 'grid_12' : 'grid_8'; ?>"> 

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'posts_listing' ) ?> id="post-<?php the_ID(); ?>">
			<div class="post_area clearfix">
				<div class="thumb-area">
							
							<div class="post-date">
								<div class="post-day"><?php echo  get_the_date( 'j' ); ?></div>
								<div class="post-month"><?php echo  get_the_date( 'F' ); ?></div>
							</div>
						</div>
				<div class="extra-wrap">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-content">
						<?php if ( get_option( SHORTNAME . '_excerpt' ) ) { the_content( '', false );
} else { the_excerpt();}?>
					</div>
					<div class="postmeta">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"  class="ox_button btn_small"><span><?php _e( 'read more &rarr;', 'retro' ); ?></span></a>
					</div>
				</div>
			</div>
		</article>
	<?php endwhile; ?>

			<?php
			global $wp_query, $wp_rewrite;
			$total = $wp_query->max_num_pages;
			// only bother with the rest if we have more than 1 page!
			if ( $total > 1 ) {
				?>
				<div class="pagination clearfix">
					<?php
					$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

					$pagination = array(
						'base' => esc_url_raw( @add_query_arg( 'paged', '%#%' ) ),
						'format' => '',
						'total' => $wp_query->max_num_pages,
						'current' => $current,
						'show_all' => true,
						'type' => 'list',
					);

				if ( $wp_rewrite->using_permalinks() ) {
					$pagination['base'] = esc_url_raw( user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ) ); }

				if ( ! empty( $wp_query->query_vars['s'] ) ) {
					$pagination['add_args'] = array( 's' => esc_url_raw( urlencode( get_query_var( 's' ) ) ) ); }

					echo paginate_links( $pagination );
					?>
				</div>
			<?php } ?>
		
			<?php else : ?>
				<h2 class="entry-title">
					<?php _e( 'Not Found', 'retro' ); ?>
				</h2>
				<p class="center">
					<?php _e( "Sorry, but you are looking for something that isn't here.", 'retro' ); ?>
				</p>
			<?php endif; ?>
	</div>
	<?php if ( get_option( SHORTNAME . '_post_listing_layout' ) == 'left' ) { ?>
		<aside class="grid_4">
			<div class="left-sidebar"><?php (get_option( SHORTNAME . '_post_listing_sidebar' )) ? $sidebar = get_option( SHORTNAME . '_post_listing_sidebar' ) : $sidebar = 'default-sidebar';
				generated_dynamic_sidebar_th( $sidebar );
			?></div>
		</aside>
	<?php } ?>
	<?php if ( get_option( SHORTNAME . '_post_listing_layout' ) == 'right' ) { ?>
		<aside class="grid_4">
			<div class="right-sidebar"><?php (get_option( SHORTNAME . '_post_listing_sidebar' )) ? $sidebar = get_option( SHORTNAME . '_post_listing_sidebar' ) : $sidebar = 'default-sidebar';
				generated_dynamic_sidebar_th( $sidebar );
			?></div>
		</aside>
	<?php } ?>
</div>
<?php get_footer(); ?>
