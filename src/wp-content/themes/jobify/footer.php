<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package Jobify
 * @since Jobify 1.0
 */
?>

		</div><!-- #main -->

		<?php if ( get_theme_mod( 'cta-display', true ) ) : ?>
		<div class="footer-cta">
			<div class="container">
				<?php echo wpautop( get_theme_mod( 'cta-text', '<h2>Alguna pregunta?</h2>Estamos deseando ayudarte a encontrar el puesto ideal para ti. Envianos un email o llámanos al número 123456789' ) ); ?>
			</div>
		</div>
		<?php endif; ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( is_active_sidebar( 'widget-area-footer' ) ) : ?>
			<div class="footer-widgets">
				<div class="container">
					<div class="row">
						<?php for ( $i = 1; $i <= 4; $i++ ) : ?> 
						<div class="col-xs-12 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'widget-area-footer' . ( $i > 1 ? ( '-' . absint( $i ) ) : '' ) ); ?>
						</div>
						<?php endfor; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<div class="copyright">
				<div class="container">
					<div class="site-info">
                        <p>Todos los derechos reservados. Diseñado por <a target="_blank" href="http://justdigital.agency">JustDigital Venture Builder</a></p>
					</div><!-- .site-info -->

					<?php
						if ( has_nav_menu( 'footer-social' ) ) :
							$social = wp_nav_menu( array(
								'theme_location'  => 'footer-social',
								'container_class' => 'footer-social',
								'items_wrap'      => '%3$s',
								'depth'           => 1,
								'echo'            => false,
								'link_before'     => '<span class="screen-reader-text">',
								'link_after'      => '</span>',
							) );

							echo strip_tags( $social, '<a><div><span>' );
						endif;
					?>

					<a href="#page" class="btt <?php if ( ! has_nav_menu( 'footer-social' ) ) : ?>btt--no-social<?php endif; ?>"><span class="screen-reader-text"><?php _e( 'Back to Top', 'jobify' ); ?></span></a>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<div id="ajax-response"></div>

	<?php wp_footer(); ?>
</body>
</html>
