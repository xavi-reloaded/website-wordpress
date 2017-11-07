<?php 
	global $woocommerce;
	function flatsome_checkout_breadcrumb_class($endpoint){
		$classes = array();
		if($endpoint == 'cart' && is_cart() ||
			$endpoint == 'checkout' && is_checkout() && !is_wc_endpoint_url('order-received') ||
			$endpoint == 'order-received' && is_wc_endpoint_url('order-received')) {
			$classes[] = 'current';
		} else{
			$classes[] = 'hide-for-small';
		}
		return implode(' ', $classes);
	}
	
?>

<div class="checkout-page-title">
	<!-- <div class="page-title-inner flex-row medium-flex-wrap container"> -->
	  <!-- <div class="flex-col flex-grow medium-text-center"> -->
  	 	 <nav class="checkout-breadcrumbs">
    	   <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="<?php echo flatsome_checkout_breadcrumb_class('cart'); ?>"><?php _e('Shopping Cart', 'flatsome'); ?></a>
    	  
    	   <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="<?php echo flatsome_checkout_breadcrumb_class('checkout') ?>"><?php _e('Checkout details', 'flatsome'); ?></a>
    	 
    	   <a href="#" class="no-click <?php echo flatsome_checkout_breadcrumb_class('order-received'); ?>"><?php _e('Order Complete', 'flatsome'); ?></a>
		 </nav>
	  <!-- </div>.flex-left -->
	<!-- </div>flex-row -->
</div><!-- .page-title -->
