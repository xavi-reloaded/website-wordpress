<?php
/* Start the Loop  */
if ( is_category() || is_tag() ) {

	global $wp_query;
		$term = $wp_query->get_queried_object();
		$post_layout_variation = (get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_variation', true )) ? get_tax_meta( $term->term_id, SHORTNAME . '_post_listing_variation', true ) : get_option( SHORTNAME . '_post_listing_variation' );

} else {
	$post_layout_variation = get_option( SHORTNAME . '_post_listing_variation' );
}


if ( have_posts() ) :
	while ( have_posts() ) : the_post();



		/* Attachment post */
		if ( is_attachment() ) :
			?>
			<article <?php post_class( 'clearfix' ) ?> >
				<div class="single-post-area clearfix">
					<div class="post-date date updated">
						<div class="post-day"><?php echo  get_the_date( 'j' ); ?></div>
						<div class="post-month"><?php echo  get_the_date( 'F' ); ?></div>
					</div>
					<div class="extra-wrap">
						<div class="entry-valign-title">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
				<div class="singlemeta"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></div>  
				<div class="entry-content">                 
					
					<?php
					the_content();
					?>
					<?php
					if ( ! get_option( SHORTNAME . '_authorbox' ) ) {
						?>
						<div id="authorbox" class="clearfix">
							<div class="alignleft"><?php
							if ( function_exists( 'get_avatar' ) ) {
								echo get_avatar( get_the_author_meta( 'email' ), '100' );
							}
								?></div>
								<div class="extra-wrap">
									<h5><?php _e( 'Author: ', 'retro' );
									echo '<span class="vcard author"><span class="fn">';
									the_author_posts_link();
									echo '</span></span>';?></h5>
									<?php the_author_meta( 'description' ); ?>
								
								</div>
							</div>
					<?php } ?>
				</div>
				<?php comments_template( '', true ); ?>
			
			</article>

			<?php
			/* Default page */
		elseif ( is_page() ) :
			?>

			<article id="page-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
				<div class="singlemeta"><span class="entry-title"><?php the_title(); ?></span><span class="post_date date updated"><?php the_time( 'j F,Y' ); ?></span><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></div> 
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<?php wp_link_pages(); ?>
				<div class="clear"></div>
				<?php comments_template( '', true ); ?>
				
			</article>

			

			<?php
			/* Single post */
		elseif ( is_single() ) :
			?>
			<article <?php post_class( 'clearfix' ) ?> >
				<div class="single-post-area clearfix">
					<div class="post-date date updated">
						<div class="post-day"><?php echo  get_the_date( 'j' ); ?></div>
						<div class="post-month"><?php echo  get_the_date( 'F' ); ?></div>
					</div>
					<div class="extra-wrap">
						<div class="entry-valign-title">
							<h1 class="entry-title"><?php the_title(); ?></h1>
							
							<?php // the_category(', ');?><!--<br>-->
							<?php // if (get_the_tags()) { the_tags(); }?>
							<div class="tags">
								<?php if ( get_the_category() ) { ?>
									<?php _e( '<span>Categories:</span>', 'retro' ); ?><?php the_category( ', ' ); ?><br>
								<?php } ?>
								<?php if ( get_the_tags() ) { ?>
									<?php _e( '<span>Tags:</span>', 'retro' ); ?><?php the_tags( '' ); ?>
								<?php } ?>
							</div>
							
						</div>
					</div>
				</div>
				<div class="singlemeta"><span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></div>
				<div class="entry-content">                 
					<?php the_content();?>
					<?php wp_link_pages(); ?>
					<?php
					if ( ! get_option( SHORTNAME . '_authorbox' ) ) {
						?>
						<div id="authorbox" class="clearfix">
							<div class="alignleft"><?php
							if ( function_exists( 'get_avatar' ) ) {
								echo get_avatar( get_the_author_meta( 'email' ), '100' );
							}
								?></div>
								<div class="extra-wrap">
									<h5><?php _e( 'Author: ', 'retro' );
									echo '<span>';
									the_author_posts_link();
									echo '</span>';?></h5>
									<?php the_author_meta( 'description' ); ?>
								
								</div>
							</div>
					<?php } ?>
				</div>
				<?php comments_template( '', true ); ?>
			
			</article>


			

			<?php
			/* Categories/tags/archives listing */
		elseif ( is_archive() ) :
			switch ( $post_layout_variation ) {

				case 'Square feature image':
				?>

				<article <?php post_class( 'posts_listing square clearfix blog_2' ) ?> id="post-<?php the_ID(); ?>">
				<div class="thumb-area">
					
					<?php
					if ( has_post_thumbnail() ) {
						?>      
						<a href="<?php the_permalink() ?>" title="<?php echo the_title(); ?>" class="clearfix thumb listing"><b><?php get_theme_post_thumbnail( get_the_ID(), 'square_thumbnail' ); ?><span class="portfolio-shadow transparent-shadow"></span></b></a>
					<?php } ?>
						<div class="<?php if ( has_post_thumbnail() ) { echo('post-date-image date updated');
} else { echo('post-date date updated');} ?>">
						<div class="post-day"><?php echo  get_the_date( 'j' ); ?></div>
						<div class="post-month"><?php echo  get_the_date( 'F' ); ?></div>
						</div>
					
					</div>
					<div class="extra-wrap">
						<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-content">
						<?php
						if ( get_option( SHORTNAME . '_excerpt' ) ) {
							the_content( '', false );
						} else {
							the_excerpt();
						}
						?>
						</div>
						<div class="postmeta">
						<span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
						<?php if ( comments_open() ) : comments_popup_link( __( 'Comments (0)', 'retro' ), __( 'Comment (1)', 'retro' ), __( 'Comments (%)', 'retro' ), 'commentslink' );
endif;?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"  class="more-link"><?php _e( 'Read more', 'retro' ); ?></a>
						<?php edit_post_link( __( 'Edit', 'retro' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
					</div>
				</article>

				<?php
			break;

				default:
				?>

				<article <?php post_class( 'posts_listing' ) ?> id="post-<?php the_ID(); ?>">
				<?php if ( has_post_thumbnail() ) { ?>        
					<div class="thumb-indent"><a href="<?php the_permalink() ?>" title="<?php echo the_title(); ?>" class="clearfix thumb listing"><?php get_theme_post_thumbnail( get_the_ID(), 'post_thumbnail' ); ?><span class="portfolio-shadow transparent-shadow"></span></a></div>
				<?php } ?>
				<div class="post_area clearfix">
					<div class="post-date date updated">
						<div class="post-day"><?php echo  get_the_date( 'j' ); ?></div>
						<div class="post-month"><?php echo  get_the_date( 'F' ); ?></div>
					</div>
					<div class="extra-wrap">
						<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-content">
							<?php if ( get_option( SHORTNAME . '_excerpt' ) ) { the_content( '', false );
} else { the_excerpt();}?>
						</div>
						<div class="postmeta">
							<span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
							<?php if ( comments_open() ) : comments_popup_link( __( 'Comments (0)', 'retro' ), __( 'Comment (1)', 'retro' ), __( 'Comments (%)', 'retro' ), 'commentslink' );
endif;?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"  class="more-link"><?php _e( 'Read more', 'retro' ); ?></a>
							<?php edit_post_link( __( 'Edit', 'retro' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
					</div>
				</div>
			</article>
	<?php
			break;
			} /* Blog posts */
		else :
			// square
			switch ( $post_layout_variation ) {

				case 'Square feature image':
				?>

				<article <?php post_class( 'posts_listing square clearfix blog_2' ) ?> id="post-<?php the_ID(); ?>">
				<div class="thumb-area">
					<?php
					if ( has_post_thumbnail() ) {
					?>      
						<a href="<?php the_permalink() ?>" title="<?php echo the_title(); ?>" class="clearfix thumb listing"><?php get_theme_post_thumbnail( get_the_ID(), 'square_thumbnail' ); ?><span class="portfolio-shadow transparent-shadow"></span></a>
					<?php } ?>
					<div class="<?php if ( has_post_thumbnail() ) { echo('post-date-image date updated');
} else { echo('post-date date updated');} ?>">
						<div class="post-day"><?php echo  get_the_date( 'j' ); ?></div>
						<div class="post-month"><?php echo  get_the_date( 'F' ); ?></div>
					</div>
					</div>
					<div class="extra-wrap">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-content">
						<?php
						if ( get_option( SHORTNAME . '_excerpt' ) ) {
							the_content( '', false );
						} else {
							the_excerpt();
						}
						?>
						</div>
						<div class="postmeta">
						<span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
						<?php if ( comments_open() ) : comments_popup_link( __( 'Comments (0)', 'retro' ), __( 'Comment (1)', 'retro' ), __( 'Comments (%)', 'retro' ), 'commentslink' );
endif;?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"  class="more-link"><?php _e( 'Read more', 'retro' ); ?></a>
						<?php edit_post_link( __( 'Edit', 'retro' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
					</div>
				</article>

				<?php
				break;
				// default
				default:
			?>
				<article <?php post_class( 'posts_listing' ) ?> id="post-<?php the_ID(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>        
						<div class="thumb-indent"><a href="<?php the_permalink() ?>" title="<?php echo the_title(); ?>" class="clearfix thumb listing"><?php get_theme_post_thumbnail( get_the_ID(), 'post_thumbnail' ); ?><span class="portfolio-shadow transparent-shadow"></span></a></div>
					<?php } ?>
					<div class="post_area clearfix">
						<div class="post-date date updated">
							<div class="post-day"><?php echo  get_the_date( 'j' ); ?></div>
							<div class="post-month"><?php echo  get_the_date( 'F' ); ?></div>
						</div>
						<div class="extra-wrap">
							<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<div class="entry-content">
								<?php if ( get_option( SHORTNAME . '_excerpt' ) ) { the_content( '', false );
} else { the_excerpt();}?>
							</div>
							<div class="postmeta">
								<span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>
								<?php if ( comments_open() ) : comments_popup_link( __( 'Comments (0)', 'retro' ), __( 'Comment (1)', 'retro' ), __( 'Comments (%)', 'retro' ), 'commentslink' );
endif;?>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'retro' ); ?> <?php the_title_attribute(); ?>"  class="more-link"><?php _e( 'Read more', 'retro' ); ?></a>
								<?php edit_post_link( __( 'Edit', 'retro' ), '<span class="edit-link">', '</span>' ); ?>
							</div>
						</div>
					</div>
				</article>

			<?php break;
			}
		endif; ?>
	<?php endwhile; ?>
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
			// structure of “format” depends on whether we’re using pretty permalinks
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
