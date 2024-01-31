<?php
/**
 * ------------------------------------------------------------------------------------------------
 * Cart
 * ------------------------------------------------------------------------------------------------
 */

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

if( ! function_exists( 'pallikoodam_cross_sell_display' ) ) {
	
	function pallikoodam_cross_sell_display() {

		$columns = pallikoodam_get_option( 'dt-woo-cross-sell-column' );

		$product_style_template = pallikoodam_get_option( 'dt-woo-cross-sell-style-template' );
		pallikoodam_product_style_setup_template_prop($product_style_template); /* Call Product Style Variables Setup */

		woocommerce_cross_sell_display( $limit = $columns, $columns = $columns, $orderby = 'rand', $order = 'desc' );

		pallikoodam_product_style_reset_template_prop();  /* Reset Product Style Variables Setup */

	}

	add_action( 'woocommerce_cart_collaterals', 'pallikoodam_cross_sell_display', 15 );

}


if( ! function_exists( 'pallikoodam_woo_cart_fragments' ) ) {

	function pallikoodam_woo_cart_fragments( $fragments  ) {

		$addtocart_custom_action = pallikoodam_get_option( 'dt-woo-addtocart-custom-action' );
		$addtocart_custom_action = (isset($addtocart_custom_action) && $addtocart_custom_action != '') ? $addtocart_custom_action : '';


		if ( $cart_action = get_site_transient( 'cart_action' ) ) {

			$addtocart_custom_action = $cart_action;
			
		}

		if($addtocart_custom_action == 'sidebar_widget') {

			// Total items in cart
			ob_start();
			echo count(WC()->cart->get_cart());
			$count = ob_get_clean();
			
			// Get mini cart
			ob_start();
			woocommerce_mini_cart();
			$mini_cart = ob_get_clean();


			$fragments ['.dt-sc-shop-cart-widget-header'] = '<div class="dt-sc-shop-cart-widget-header">
																<h3>'.esc_html__( 'Shopping cart', 'pallikoodam' ).'
																	<span>'.esc_html($count).'</span>
																	<a href="#" class="dt-sc-shop-cart-widget-close-button">'.esc_html__( 'Close', 'pallikoodam' ).'</a>
																</h3>
															</div>';
			$fragments ['.dt-sc-shop-cart-widget-content'] = '<div class="dt-sc-shop-cart-widget-content">'.pallikoodam_html_output($mini_cart).'</div>';


		}


		if($addtocart_custom_action == 'notification_widget') {

			global $woocommerce;

			$items = $woocommerce->cart->get_cart();

			$ids = array();
			foreach($items as $item => $values) { 
		        $_product = $values['data']->post; 
		        $ids[] = $_product->ID; 
			} 

			$last_product_id = end($ids);

			$product = wc_get_product( $last_product_id );

			$fragments ['.dt-sc-shop-cart-widget-header'] = '<div class="dt-sc-shop-cart-widget-header">
																<a href="#" class="dt-sc-shop-cart-widget-close-button">'.esc_html__( 'Close', 'pallikoodam' ).'</a>
															</div>';
			$fragments ['.dt-sc-shop-cart-widget-content'] = '<div class="dt-sc-shop-cart-widget-content">
																<div class="dt-sc-shop-cart-widget-content-thumb">
																	<a class="image" href="'.esc_url($product->get_permalink()).'" title="'.esc_attr($product->get_name()).'">'.pallikoodam_html_output($product->get_image()).'</a>
																</div>
																<div class="dt-sc-shop-cart-widget-content-info">
																	'.sprintf( esc_html__( 'Product %1$s has been added to cart sucessfully.', 'pallikoodam' ), '<a class="image" href="'.esc_url($product->get_permalink()).'" title="'.esc_attr($product->get_name()).'">'.pallikoodam_html_output($product->get_name()).'</a>').'
																</div>																
															</div>';

		}


		// Shortcode

		// Total items in cart
		$count = count(WC()->cart->get_cart());
		
		// Total items in cart
		$subtotal = WC()->cart->get_cart_subtotal();

		// Get mini cart
		ob_start();
		woocommerce_mini_cart();
		$mini_cart = ob_get_clean();


		$fragments ['.dt-sc-shop-menu-cart-number'] = '<span class="dt-sc-shop-menu-cart-number">'.pallikoodam_html_output($count).'</span>';
		$fragments ['.dt-sc-shop-menu-cart-subtotal'] = '<span class="dt-sc-shop-menu-cart-subtotal">'.pallikoodam_html_output($subtotal).'</span>';
		$fragments ['.dt-sc-shop-menu-cart-totals'] = '<span class="dt-sc-shop-menu-cart-totals">'.pallikoodam_html_output($subtotal).'</span>';
		$fragments ['.dt-sc-shop-menu-cart-content'] = '<div class="dt-sc-shop-menu-cart-content">'.pallikoodam_html_output($mini_cart).'</div>';


		
		return $fragments;

	}

	add_filter('woocommerce_add_to_cart_fragments', 'pallikoodam_woo_cart_fragments');

}


if ( ! function_exists( 'pallikoodam_woo_sidebar_widget' ) ) {

	function pallikoodam_woo_sidebar_widget() {

		$addtocart_custom_action = pallikoodam_get_option( 'dt-woo-addtocart-custom-action' );
		$addtocart_custom_action = (isset($addtocart_custom_action) && $addtocart_custom_action != '') ? $addtocart_custom_action : '';

		$notification_class = '';
		if($addtocart_custom_action == 'notification_widget') {

			$notification_class = 'cart-notification-widget';

		} else if($addtocart_custom_action == 'sidebar_widget') {

			$notification_class = 'activate-sidebar-widget';

		} else {

			if ( $cart_action = get_site_transient( 'cart_action' ) ) {

				if($cart_action == 'sidebar_widget') {
					$notification_class = 'activate-sidebar-widget';				
				}

			}

		}

		if($notification_class != '') {

			echo '<div class="dt-sc-shop-cart-widget '.esc_attr($notification_class).'">';
				echo '<div class="dt-sc-shop-cart-widget-inner">';
					echo '<div class="dt-sc-shop-cart-widget-header">';
						echo '<h3>'.esc_html__( 'Your Shopping cart', 'pallikoodam' ).'<span></span></h3>';
						echo '<a href="#" class="dt-sc-shop-cart-widget-close-button">'.esc_html__( 'Close', 'pallikoodam' ).'</a>';
					echo '</div>';
					echo '<div class="dt-sc-shop-cart-widget-content-wrapper">';
						echo '<div class="dt-sc-shop-cart-widget-content"></div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="dt-sc-shop-cart-widget-overlay"></div>';

		}

	}

	add_action( 'wp_footer', 'pallikoodam_woo_sidebar_widget', 10 );

}