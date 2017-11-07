<?php
global $rt_isFooter;
$rt_isFooter = true;
?>
</div><!-- / main-patern -->
				</div></div><!-- / main -->
				<div class="main-bottom">
					<div class="contact-page-bottom contact-page-bottom-left"><div class="contact-page-bottom-right"><div class="contact-page-bottom-tail"></div></div></div>               
				</div>

					<!-- SECOND CONTENT AREA -->

						<?php locate_template( array( 'bottom_content.php' ), true, false ); ?>
		
						
					<!-- / SECOND CONTENT AREA -->
						

			</div><!-- / main-bg -->
			
			<?php if ( get_option( SHORTNAME . '_footer_widgets_enable' ) != '' ) {
				$column_class = 'grid_' . (12 / get_option( SHORTNAME . '_footer_widgets_columns' ));
			?>
				<div class="footer-area-divider"></div>
				<section class="footer-area">
					<div class="clearfix row">                      
						<?php
							$i = 1;
						while ( $i <= (int) get_option( SHORTNAME . '_footer_widgets_columns' ) ) { ?>
							<aside class="<?php echo $column_class ?>">
								<?php dynamic_sidebar( 'footer-' . $i )?>
							</aside>
						<?php $i++;} ?>
					</div>
				</section><!-- / footer-area -->
			<?php } ?>
		
		</div><!-- / main-shadow  -->

		<footer>
			<div class="row clearfix">
<p>All rights reserved. Design by <a target="_blank" href="http://gettinder.net">gettinder.net</a></p>
				<div class="grid_6">
					<div class="footer-content-area">
						<div class="entry-content">
							<?php if ( $footer_tinymce = get_option( SHORTNAME . '_footer_tinymce' ) ) :
								echo ox_the_content( $footer_tinymce );
							endif;?>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- / footer -->
		
		<div class="footer-logo">
			<?php
			if ( is_front_page() ) {
			?><h1><?php } ?>
			<?php
			if ( get_option( SHORTNAME . '_logo_footer_txt' ) ) {
				if ( get_bloginfo( 'name' ) ) {
					?><a href="<?php echo (get_option( SHORTNAME . '_preview' ))? '/' : wpml_get_home_url(); ?>"><span><?php bloginfo( 'name' ); ?></span></a><?php
				}
			} elseif ( get_skin_option( SHORTNAME . '_logo_footer_custom' ) ) {
				$data_retina = '';
				// $retina = get_option(SHORTNAME . "_logo_footer_retina_custom");
				// if($retina)
				// {
				// $data_retina = ' data-retina="'.$retina.'" ';
				// }
			?>
			<a href="<?php echo (get_option( SHORTNAME . '_preview' ))? '/' : wpml_get_home_url(); ?>"><img src="<?php echo get_skin_option( SHORTNAME . '_logo_footer_custom' ); ?>" alt="<?php bloginfo( 'name' ); ?>"<?php echo $data_retina; ?>><span class="hidden"><?php bloginfo( 'name' ); ?></span></a>
			<?php }
			if ( is_front_page() ) {
			?></h1><?php } ?>
		</div><!-- / footer-logo -->
		
	</div><!-- /container  --></div>
	<?php  echo stripslashes( get_option( SHORTNAME . '_GA' ) ); ?>
	<?php  wp_footer(); ?>  
</body></html>
