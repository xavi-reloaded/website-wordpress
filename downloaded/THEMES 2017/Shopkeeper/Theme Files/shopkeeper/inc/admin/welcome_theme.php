<div class="wrap about-wrap getbowtied-about-wrap getbowtied-welcome-wrap">

	<?php 
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( !is_plugin_active('getbowtied-tools/getbowtied-tools.php') ): ?>
			<div class="inner">
				<img src="<?php echo get_template_directory_uri();?>/images/shopkeeper-thumb.png" alt="welcome" />
				<h1>Welcome to Shopkeeper!</h1>
				<p>You’re almost there. Install the <b>Get Bowtied - Tools</b> plugin to <br> continue with the setup wizard.</p>
				
				<?php 

					$plugins = TGM_Plugin_Activation::$instance->plugins;
					$item = $plugins['getbowtied-tools'];
					$item['sanitized_plugin'] = $item['name'];

					$installed_plugins = get_plugins();

					/** We need to display the 'Install' hover link */
					if ( ! isset( $installed_plugins['getbowtied-tools/getbowtied-tools.php'] ) ) {
						$actions = array(
							'button' => sprintf(
								'<a href="%1$s" class="button button-primary" title="Install %2$s">Install Now</a>',
								esc_url( wp_nonce_url(
									add_query_arg(
										array(
											'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
											'plugin'        => urlencode( $item['slug'] ),
											'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
											'tgmpa-install' => 'install-plugin',
										),
										TGM_Plugin_Activation::$instance->get_tgmpa_url()
									),
									'tgmpa-install',
									'tgmpa-nonce'
								) ),
								$item['sanitized_plugin']
							),
						);
					}
					/** We need to display the 'Activate' hover link */
					elseif ( is_plugin_inactive( 'getbowtied-tools/getbowtied-tools.php' ) ) {
						$actions = array(
							'button' => sprintf(
								'<a href="%1$s" class="button button-primary" title="Activate %2$s">Activate</a>',
								esc_url( add_query_arg(
									array(
										'plugin'               => urlencode( $item['slug'] ),
										'plugin_name'          => urlencode( $item['sanitized_plugin'] ),
										// 'plugin_source'        => urlencode( $item['source'] ),
										'getbowtied-activate'       => 'activate-plugin',
										'getbowtied-activate-nonce' => wp_create_nonce( 'getbowtied-activate' ),
									),
									admin_url( 'admin.php?page=getbowtied_theme' )
								) ),
								$item['sanitized_plugin']
							),
						);
					}

					echo $actions['button'];
				?>
				<br/><a href="http://shopkeeper.wp-theme.help/hc/en-us/articles/206678019-Getting-Started-Installation-Setup"  target="_blank" class="video-guide"><span class="dashicons dashicons-video-alt3"></span> <?php echo __("Installation & Setup <span class='dashicons dashicons-minus'></span> Video Guide"); ?></a>

				<p class="theme-disclaimer">* Get Bowtied Tools is a one-stop spot that enables you to: install/update the plugins coming with the theme, import demo content and update the theme without leaving the dashboard.</p>
			
			</div>
		<?php endif; ?>


</div>