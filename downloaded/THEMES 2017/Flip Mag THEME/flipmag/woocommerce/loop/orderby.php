<?php
/**
 * Show options for ordering
 */

global $woocommerce, $wp_query;

if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() )
	return;
?>
<form class="woocommerce-ordering" method="get">
		<input type="hidden" name="orderby" value="" />

		<?php
			$catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
				'menu_order' => _x('Default sorting', 'woocommerce', 'flipmag'),
				'popularity' => _x('Sort by popularity', 'woocommerce', 'flipmag'),				
				'date'       => _x('Sort by newness', 'woocommerce', 'flipmag'),
				'price'      => _x('Sort by price: low to high', 'woocommerce', 'flipmag'),
				'price-desc' => _x('Sort by price: high to low', 'woocommerce', 'flipmag')
			) );

			$selected = current($catalog_orderby);
			
			if (array_key_exists($orderby, $catalog_orderby)) {
				$selected = $catalog_orderby[$orderby];
			}				
		?>
		
		<div class="order-select">
		
			<span><?php echo esc_html($selected); ?> <i class="fa fa-caret-down"></i></span>
		
			<ul class="drop">
			<?php 	
				foreach ($catalog_orderby as $id => $name) {
					echo '<li data-value="' . esc_attr($id) . '" class="' . ($orderby == $id ? 'active' : '') . '"><a href="javascript:void(0);">' . esc_html($name) . '</a></li>';
				}
			?>			
			</ul>
		</div>
		
		
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' == $key )
				continue;
			
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			
			} else {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>