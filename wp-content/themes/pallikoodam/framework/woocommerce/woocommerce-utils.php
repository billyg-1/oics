<?php
// Filter HTML Output

if ( ! function_exists( 'pallikoodam_html_output' ) ) {

	function pallikoodam_html_output( $html ) {

		return apply_filters( 'pallikoodam_html_output', $html );

	}

}


// Shop Layout & Widgets

if( ! function_exists( 'pallikoodam_shop_archive_page' ) ) {

	function pallikoodam_shop_archive_page() {

		$widgets = $shop_archive_page_widgetareas = array ();
		$shop_archive_page_layout = '';

		if( is_shop() ) {

			$shop_archive_page_layout = pallikoodam_get_option( 'shop-page-layout' );
			$shop_archive_page_layout = isset($shop_archive_page_layout) ? $shop_archive_page_layout : '';

			$show_archive_standard_sidebar = pallikoodam_get_option( 'shop-page-show-standard-sidebar' );

			$shop_archive_page_widgetareas = pallikoodam_get_option( 'shop-page-widgetareas' );
			$shop_archive_page_widgetareas = isset( $shop_archive_page_widgetareas ) ? array ($shop_archive_page_widgetareas) : array ();

		} elseif( is_product_category() ) {

			$shop_archive_page_layout = pallikoodam_get_option( 'dt-woo-category-archive-layout' );
			$shop_archive_page_layout = isset($shop_archive_page_layout) ? $shop_archive_page_layout : '';

			$show_archive_standard_sidebar = pallikoodam_get_option( 'dt-woo-category-archive-show-standard-sidebar' );

			$shop_archive_page_widgetareas = pallikoodam_get_option( 'dt-woo-category-archive-widgetareas' );
			$shop_archive_page_widgetareas = isset( $shop_archive_page_widgetareas ) ? array ($shop_archive_page_widgetareas) : array ();

		} elseif( is_product_tag() ) {

			$shop_archive_page_layout = pallikoodam_get_option( 'dt-woo-tag-archive-layout' );
			$shop_archive_page_layout = isset($shop_archive_page_layout) ? $shop_archive_page_layout : '';

			$show_archive_standard_sidebar = pallikoodam_get_option( 'dt-woo-tag-archive-show-standard-sidebar' );

			$shop_archive_page_widgetareas = pallikoodam_get_option( 'dt-woo-tag-archive-widgetareas' );
			$shop_archive_page_widgetareas = isset( $shop_archive_page_widgetareas ) ? array ($shop_archive_page_widgetareas) : array ();

		}

		if( isset( $show_archive_standard_sidebar ) && !empty( $show_archive_standard_sidebar ) ) {

			if( $shop_archive_page_layout == 'with-left-sidebar' ) {
				$widgets[] = 'standard-sidebar-left';
			} else if( $shop_archive_page_layout == 'with-right-sidebar' ) {
				$widgets[] = 'standard-sidebar-right';
			}

		}		

		if( is_array( $shop_archive_page_widgetareas ) ) {
			$widgets = array_merge( $widgets, $shop_archive_page_widgetareas );
		}

		return array( 
			'page-layout' => $shop_archive_page_layout,
			'widgets'     => $widgets 
		);

	}

}


// Single Product Layout & Widgets

if( ! function_exists( 'pallikoodam_single_product' ) ) {

	function pallikoodam_single_product( $id , $position ) {

		$widgets  = array();
		$settings = get_post_meta( $id, '_custom_settings', true );

		if( is_array( $settings ) ) {
			$settings = array_filter( $settings );
		} else {
			$settings = array( 
				'page-layout'  => 'admin-option',
				'show-upsell'  => 'admin-option',
				'show-related' => 'admin-option'
				);
		}

		$prodcut_page_layout = $settings['page-layout'];

		if( $prodcut_page_layout == 'admin-option' ) {

			$prodcut_page_layout = pallikoodam_get_option( 'site-global-sidebar-layout' );
			$standard_sidebar = true;

			if( $standard_sidebar ) {
				$widgets[] = ( $position == "left" ) ? 'standard-sidebar-left' : 'standard-sidebar-right';
			}

		} elseif( $prodcut_page_layout == 'with-left-sidebar' || $prodcut_page_layout == 'with-right-sidebar' ) {

			if( isset( $settings['show-standard-sidebar'] ) && $settings['show-standard-sidebar'] ) {
				$widgets[] = ( $position == "left" ) ? 'standard-sidebar-left' : 'standard-sidebar-right';
			}

 			$custom_widgets = isset( $settings['product-widgetareas'] ) ? $settings['product-widgetareas'] : array();
			$custom_widgets = isset( $custom_widgets ) ? $custom_widgets : array ();

			if( is_array( $custom_widgets ) ) {
				$widgets = array_merge( $widgets, $custom_widgets );
			}

		}

		return array( 
			'page-layout' => $prodcut_page_layout,
			'widgets'     => $widgets 
		);
	}

}


// Single Product Settings

if( ! function_exists( 'pallikoodam_single_product_settings' ) ) {

	function pallikoodam_single_product_settings ( $id ) {

		$settings = get_post_meta( $id, '_custom_settings', true );

		if( is_array( $settings ) ) {
			$settings = array_filter( $settings );
		} else {
			$settings = array( 
				'page-layout'    => 'admin-option',
				'show-upsell'    => 'admin-option',
				'upsell-column'  => 'admin-option',
				'upsell-limit'  => 'admin-option',
				'show-related'   => 'admin-option',
				'related-column' => 'admin-option',
				'related-limit' => 'admin-option'
			);
		}

		if( isset( $settings['show-upsell'] ) && $settings['show-upsell'] == 'admin-option' ) {
			$settings['show-upsell']   = pallikoodam_get_option( 'dt-single-product-default-show-upsell' );
			$settings['upsell-column'] = pallikoodam_get_option( 'dt-single-product-upsell-column' );
			$settings['upsell-limit']  = pallikoodam_get_option( 'dt-single-product-upsell-limit' );
		}

		if( $settings['upsell-column'] == 'admin-option' ) {
			$settings['upsell-column'] = pallikoodam_get_option( 'dt-single-product-upsell-column' );
		}			

		if( $settings['upsell-limit'] == 'admin-option' ) {
			$settings['upsell-limit'] = pallikoodam_get_option( 'dt-single-product-upsell-limit' );
		}

		if( isset( $settings['show-related'] ) && $settings['show-related'] == 'admin-option' ) {
			$settings['show-related']   = pallikoodam_get_option( 'dt-single-product-default-show-related' );
			$settings['related-column'] = pallikoodam_get_option( 'dt-single-product-related-column' );
			$settings['related-limit']  = pallikoodam_get_option( 'dt-single-product-related-limit' );
		}

		if( $settings['related-column'] == 'admin-option' ) {
			$settings['related-column'] = pallikoodam_get_option( 'dt-single-product-related-column' );
		}

		if( $settings['related-limit'] == 'admin-option' ) {
			$settings['related-limit'] = pallikoodam_get_option( 'dt-single-product-related-limit' );
		}
		
		return $settings;	
	}

}


// Remove Anonymous action

if( ! function_exists( 'pallikoodam_woo_remove_anonymous_object_action' ) ) {

	function pallikoodam_woo_remove_anonymous_object_action( $tag, $class, $method, $priority = null ){

		if( empty($GLOBALS['wp_filter'][ $tag ]) ){
			return;
		}

		foreach ( $GLOBALS['wp_filter'][ $tag ] as $filterPriority => $filter ){
			if( !($priority===null || $priority==$filterPriority) )
				continue;

			foreach ( $filter as $identifier => $function ){
				if( is_array( $function)
					and is_a( $function['function'][0], $class )
					and $method === $function['function'][1]
				){
					remove_action(
						$tag,
						array ( $function['function'][0], $method ),
						$filterPriority
					);
				}
			}
		}
	}

}


// Product Loop Column Class

if( ! function_exists( 'pallikoodam_woo_loop_column_class' ) ) {

	function pallikoodam_woo_loop_column_class($columns) {

		$columns = intval( $columns );

		$options = pallikoodam_shop_archive_page();

		if($options['page-layout'] == 'with-left-sidebar' || $options['page-layout'] == 'with-right-sidebar') {

			switch( $columns ) {
				case 1:
					$class = 'dt-col dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12';
				break;

				case 2:
					$class = 'dt-col dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-6 dt-col-qxlg-6 dt-col-lg-6';
				break;

				case 3:
					$class = 'dt-col dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4';
				break;

				case 4:
				default:
					$class = 'dt-col dt-col-xs-12 dt-col-sm-12 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4';
				break;						
			}

		} else {

			switch( $columns ) {
				case 1:
					$class = 'dt-col dt-col-xs-12 dt-col-sm-12 dt-col-md-12 dt-col-lg-12';
				break;

				case 2:
					$class = 'dt-col dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-6 dt-col-hxlg-6 dt-col-lg-6';
				break;

				case 3:
					$class = 'dt-col dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-4 dt-col-lg-4';
				break;

				case 4:
				default:
					$class = 'dt-col dt-col-xs-12 dt-col-sm-6 dt-col-md-6 dt-col-qxlg-4 dt-col-hxlg-3 dt-col-lg-3';
				break;						
			}

		}

		return $class;

	}

}


// Check item is in cart

if(!function_exists('pallikoodam_check_item_is_in_cart')) {
	function pallikoodam_check_item_is_in_cart( $product_id ){

		if ( $product_id > 0 ) {

			foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
				$cart_product = $values['data'];
				if( $product_id == $cart_product->get_id() ) {
					return true;
				}
			}
			
		}

		return false;

	}
}


// Single page product navigation

if( ! function_exists( 'pallikoodam_single_product_nav' ) ) {
	function pallikoodam_single_product_nav() {

	    $next = get_next_post();
	    $prev = get_previous_post();

		$next_id = ( ! empty( $next ) ) ? $next->ID : '';
		$prev_id = ( ! empty( $prev ) ) ? $prev->ID : '';

	    $next = ( ! empty( $next ) ) ? wc_get_product( $next->ID ) : false;
		$prev = ( ! empty( $prev ) ) ? wc_get_product( $prev->ID ) : false;

		if ( ! empty( $next ) ) {
			$next_thumbnail_id = get_post_thumbnail_id($next_id);
			$next_image_src    = wp_get_attachment_image_src($next_thumbnail_id, 'woocommerce_thumbnail', false);
			$next_image_src    = isset($next_image_src[0]) ? $next_image_src[0] : wc_placeholder_img_src( 'woocommerce_thumbnail' );
		}

		if ( ! empty( $prev ) ) {
			$prev_thumbnail_id = get_post_thumbnail_id($prev_id);
			$prev_image_src    = wp_get_attachment_image_src($prev_thumbnail_id, 'woocommerce_thumbnail', false);
			$prev_image_src    = isset($prev_image_src[0]) ? $prev_image_src[0] : wc_placeholder_img_src( 'woocommerce_thumbnail' );
		}
		
	    $output = '';

		$output .= '<div class="dt-sc-single-product-nav">';

			if ( ! empty( $prev ) ) {

				$output .= '<div class="dt-sc-single-product-nav-btn product-nav-prev">';
					$output .= '<a href="'.esc_url( $prev->get_permalink() ).'">'.esc_html__('Previous product', 'pallikoodam').'<span class="product-nav-btn-icon"></span></a>';
					$output .= '<div class="dt-sc-single-product-nav-intro-wrapper">';
						$output .= '<div class="product-nav-intro">';
							$output .= '<div class="product-nav-intro-image">';
								$output .= '<a href="'.esc_url( $prev->get_permalink() ).'" class="product-thumb">';
									$output .= '<span class="prev-image" style="background-image:url('.esc_url($prev_image_src).')"></span>';
								$output .= '</a>';
							$output .= '</div>';
							$output .= '<div class="product-nav-intro-description">';
								$output .= '<a href="'.esc_url( $prev->get_permalink() ).'" class="product-title">';
									$output .= esc_html( $prev->get_title() );
								$output .= '</a>';
								$output .= '<span class="price">';
									$output .= $prev->get_price_html();
								$output .= '</span>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';

			}

			$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
			$output .= '<a href="'.esc_url($shop_page_url).'" class="dt-sc-single-product-nav-back-btn"><span>'.esc_html__('Back to products', 'pallikoodam').'</span></a>';

			if ( ! empty( $next ) ) {

				$output .= '<div class="dt-sc-single-product-nav-btn product-nav-next">';
					$output .= '<a href="'.esc_url( $next->get_permalink() ).'">'.esc_html__('Next product', 'pallikoodam').'<span class="product-nav-btn-icon"></span></a>';
					$output .= '<div class="dt-sc-single-product-nav-intro-wrapper">';
						$output .= '<div class="product-nav-intro">';
							$output .= '<div class="product-nav-intro-image">';
								$output .= '<a href="'.esc_url( $next->get_permalink() ).'" class="product-thumb">';
									$output .= '<span class="next-image" style="background-image:url('.esc_url($next_image_src).')"></span>';
								$output .= '</a>';
							$output .= '</div>';
							$output .= '<div class="product-nav-intro-description">';
								$output .= '<a href="'.esc_url( $next->get_permalink() ).'" class="product-title">';
									$output .= esc_html( $next->get_title() );
								$output .= '</a>';
								$output .= '<span class="price">';
									$output .= $next->get_price_html();
								$output .= '</span>';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';

			}


		$output .= '</div>';

		return $output;

	}
}


// Single page product sociable share / follow

if( ! function_exists( 'pallikoodam_single_product_sociable_share_follow' ) ) {
	function pallikoodam_single_product_sociable_share_follow($product_id, $share_follow_type, $social_icon_style_cls, $social_icon_radius_cls, $social_icon_inline_alignment_cls) {

		$sstitle = get_the_title($product_id);
		$ssurl = get_permalink($product_id);

	    $output = '';

	    if($share_follow_type == 'share') {

			$output .= '<div class="dt-sc-single-product-share-container '.esc_attr($social_icon_style_cls).' '.esc_attr($social_icon_radius_cls).' '.esc_attr($social_icon_inline_alignment_cls).'">';

				$output .= '<a class="dt-sc-single-product-share-item-icon">'.esc_html__('Share', 'pallikoodam').'</a>';

				$output .= '<ul class="dt-sc-single-product-share-list">';

					$show_sharer_facebook    = pallikoodam_get_option( 'dt-single-product-show-sharer-facebook' );
					$show_sharer_delicious   = pallikoodam_get_option( 'dt-single-product-show-sharer-delicious' );
					$show_sharer_digg        = pallikoodam_get_option( 'dt-single-product-show-sharer-digg' );
					$show_sharer_stumbleupon = pallikoodam_get_option( 'dt-single-product-show-sharer-stumbleupon' );
					$show_sharer_twitter     = pallikoodam_get_option( 'dt-single-product-show-sharer-twitter' );
					$show_sharer_googleplus  = pallikoodam_get_option( 'dt-single-product-show-sharer-googleplus' );
					$show_sharer_linkedin    = pallikoodam_get_option( 'dt-single-product-show-sharer-linkedin' );
					$show_sharer_pinterest   = pallikoodam_get_option( 'dt-single-product-show-sharer-pinterest' );

					if($show_sharer_facebook == 'true') {
						$output .= '<li> <a href="//www.facebook.com/sharer.php?u='.esc_url($ssurl).'&amp;t='.urlencode($sstitle).'" title="facebook" target="_blank"> <span class="fab fa-facebook"></span>  </a> </li>';
					}
					if($show_sharer_delicious == 'true') {
						$output .= '<li> <a href="//del.icio.us/post?url='.esc_url($ssurl).'&amp;title='.urlencode($sstitle).'" title="delicious" target="_blank"> <span class="fab fa-delicious"></span>  </a> </li>';
					}
					if($show_sharer_digg == 'true') {
						$output .= '<li> <a href="//digg.com/submit?phase=2&amp;url='.esc_url($ssurl).'&amp;title='.urlencode($sstitle).'" title="digg" target="_blank"> <span class="fab fa-digg"></span>  </a> </li>';
					}
					if($show_sharer_stumbleupon == 'true') {
						$output .= '<li> <a href="//www.stumbleupon.com/submit?url='.esc_url($ssurl).'&amp;title='.urlencode($sstitle).'" title="stumbleupon" target="_blank"> <span class="fab fa-stumbleupon"></span>  </a> </li>';
					}
					if($show_sharer_twitter == 'true') {
						$output .= '<li> <a href="//twitter.com/home/?status='.esc_url($ssurl).':'.urlencode($sstitle).'" title="twitter" target="_blank"> <span class="fab fa-twitter"></span>  </a> </li>';
					}
					if($show_sharer_googleplus == 'true') {
						$output .= '<li> <a href="//plus.google.com/share?url='.esc_url($ssurl).'" title="googleplus" target="_blank" onclick="javascript:window.open(this.href,\"\",\"menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\");return false;"> <span class="fab fa-google-plus"></span>  </a> </li>';
					}
					if($show_sharer_linkedin == 'true') {
						$output .= '<li> <a href="//www.linkedin.com/shareArticle?mini=true&amp;title='.urlencode($sstitle).'&amp;url='.esc_url($ssurl).'" title="linkedin" target="_blank"> <span class="fab fa-linkedin"></span>  </a> </li>';
					}
					if($show_sharer_pinterest == 'true') {

						$featured_image_id = get_post_thumbnail_id($product_id);
						$image_details = wp_get_attachment_image_src($featured_image_id, 'full');

						$media = $image_details[0]; 

						$output .= '<li> <a href="//pinterest.com/pin/create/button/?url='.esc_url($ssurl).'&amp;media='.esc_url($media).'" title="pinterest" target="_blank"> <span class="fab fa-pinterest"></span>  </a> </li>'; 

					}

				$output .= '</ul>';
					
			$output .= '</div>';

		} else if($share_follow_type == 'follow') {

			$social_follow = array (
			  'delicious' 	 => esc_html__('Delicious', 'pallikoodam'),
			  'deviantart' 	 => esc_html__('Deviantart', 'pallikoodam'),
			  'digg' 	  	 => esc_html__('Digg', 'pallikoodam'),
			  'dribbble' 	 => esc_html__('Dribbble', 'pallikoodam'),
			  'envelope' 	 => esc_html__('Envelope', 'pallikoodam'),
			  'facebook' 	 => esc_html__('Facebook', 'pallikoodam'),
			  'flickr' 		 => esc_html__('Flickr', 'pallikoodam'),
			  'google-plus'  => esc_html__('Google Plus', 'pallikoodam'),
			  'gtalk'  		 => esc_html__('GTalk', 'pallikoodam'),
			  'instagram'	 => esc_html__('Instagram', 'pallikoodam'),
			  'lastfm'	 	 => esc_html__('Lastfm', 'pallikoodam'),
			  'linkedin'	 => esc_html__('Linkedin', 'pallikoodam'),
			  'pinterest'	 => esc_html__('Pinterest', 'pallikoodam'),
			  'reddit'		 => esc_html__('Reddit', 'pallikoodam'),
			  'rss'		 	 => esc_html__('RSS', 'pallikoodam'),
			  'skype'		 => esc_html__('Skype', 'pallikoodam'),
			  'stumbleupon'	 => esc_html__('Stumbleupon', 'pallikoodam'),
			  'tumblr'		 => esc_html__('Tumblr', 'pallikoodam'),
			  'twitter'		 => esc_html__('Twitter', 'pallikoodam'),
			  'viadeo'		 => esc_html__('Viadeo', 'pallikoodam'),
			  'vimeo'		 => esc_html__('Vimeo', 'pallikoodam'),
			  'yahoo'		 => esc_html__('Yahoo', 'pallikoodam'),
			  'youtube'		 => esc_html__('Youtube', 'pallikoodam')
			);

			$socials_selected = array ();
			foreach($social_follow as $socialfollow_key => $socialfollow) {

				$show_follow_option = pallikoodam_get_option( 'dt-single-product-show-follow-'.$socialfollow_key );

				if($show_follow_option == 'true') {
					array_push($socials_selected, $socialfollow_key);
				}
			}

			$sociable_flds = pallikoodam_get_sociable_links();
			if( is_array( $sociable_flds ) && !empty( $sociable_flds ) ) {

				$list = '';
				foreach( $sociable_flds as $key => $sf) {

					if(in_array($key, $socials_selected)) {
						$list .= '<li class="'.esc_attr( $key ).'"><a target="_blank" href="'.esc_url( $sf ).'"></a></li>';
					}
				}

				if(!empty( $list )) {

					$output .= '<div class="dt-sc-single-product-follow-container '.esc_attr($social_icon_style_cls).' '.esc_attr($social_icon_radius_cls).' '.esc_attr($social_icon_inline_alignment_cls).'">';
						$output .= '<a class="dt-sc-single-product-follow-item-icon">'.esc_html__('Follow', 'pallikoodam').'</a>';
						$output .= '<ul class="dt-sc-single-product-follow-list">'.$list.'</ul>';
					$output .= '</div>';

				}
			}
		}

		return $output;
	}
}


// Product Shortcode - Ajax Call

if ( ! function_exists( 'pallikoodam_products_ajax_call' ) ) {

	function pallikoodam_products_ajax_call() {

		WPBMap::addAllMappedShortcodes();

		$shortcodeattrs_array = json_decode(html_entity_decode(stripslashes($_REQUEST['shortcodeattrs'])), true);

		$shortcode = '[dt_sc_products';

			foreach($shortcodeattrs_array as $cda_key => $cda_val) {
				$shortcode .= ' '.$cda_key.'="'.$cda_val.'"';
			}

			$current_page = isset($_REQUEST['current_page']) ? $_REQUEST['current_page'] : 1;
			$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;

			$shortcode .= ' current_page="'.$current_page.'"';
			$shortcode .= ' offset="'.$offset.'"';

		$shortcode .= ' /]';

		echo do_shortcode($shortcode);

		wp_die();

	}

	add_action( 'wp_ajax_pallikoodam_products_ajax_call', 'pallikoodam_products_ajax_call' );
	add_action( 'wp_ajax_nopriv_pallikoodam_products_ajax_call', 'pallikoodam_products_ajax_call' );

}

// Product Shortcode - Ajax Pagination

if ( ! function_exists( 'pallikoodam_products_ajax_pagination' ) ) {

	function pallikoodam_products_ajax_pagination($max_num_pages, $current_page, $post_per_page, $function_call, $output_div, $shortcode_attrs) {

		$output = '';

		if($max_num_pages > 1) {

			$output .= '<div class="dt-sc-product-pagination dt-sc-product-ajax-pagination" data-postperpage="'.$post_per_page.'" data-functioncall="'.$function_call.'" data-outputdiv="'.$output_div.'"  data-shortcodeattrs="'.esc_js($shortcode_attrs).'">';
					
				if($current_page > 1) {
					$output .= '<div class="prev-post"><a href="#" data-currentpage="'.$current_page.'"><span class="fas fa-angle-double-left"></span></a></div>';
				}

				$output .= paginate_links ( array (
							  'base' 		 => '#',
							  'format' 		 => '',
							  'current' 	 => $current_page,
							  'type'     	 => 'list',
							  'end_size'     => 2,
							  'mid_size'     => 3,
							  'prev_next'    => false,
							  'total' 		 => $max_num_pages 
						  ) );

				if ($current_page < $max_num_pages) {
					$output .= '<div class="next-post"><a href="#" data-currentpage="'.$current_page.'"><span class="fas fa-angle-double-right"></span></a></div>';
				}

			$output .= '</div>';

	    }

	    return $output;

	}

}

// Product Countdown Timer

if ( ! function_exists( 'pallikoodam_products_sale_countdown_timer' ) ) {

	function pallikoodam_products_sale_countdown_timer() {

		$product_template = pallikoodam_woo_product_single_template_option();

		if( $product_template == 'woo-default' ) {

			$sale_countdown_timer = pallikoodam_get_option( 'dt-single-product-sale-countdown-timer' );
			$sale_countdown_timer = (isset($sale_countdown_timer) && $sale_countdown_timer == 'true') ? true : false;

			if(!$sale_countdown_timer) {
				return;
			}

		}

		$output = '';

		global $product;
        $sale_date_end = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
		$sale_date_start = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );

		if ( $product->get_type() == 'variable' && $variations = $product->get_available_variations() ) {
			$sale_date_end = get_post_meta( $variations[0]['variation_id'], '_sale_price_dates_to', true );
			$sale_date_start = get_post_meta( $variations[0]['variation_id'], '_sale_price_dates_from', true );
		}

		$curent_date = strtotime( date( 'Y-m-d H:i:s' ) );

		if ( $sale_date_end < $curent_date || $curent_date < $sale_date_start ) {
			return;
		}

		$gmt_offset = get_option('gmt_offset');

		echo '<div class="dt-sc-product-sale-countdown-holder">';
			echo '<div class="downcount" data-date="'.esc_attr( date( 'Y-m-d H:i:s', $sale_date_end ) ).'" data-offset="'.esc_attr($gmt_offset).'">';
				echo '<div class="dt-sc-counter-wrapper">';
					echo '<div class="counter-icon-wrapper">';
						echo '<div class="dt-sc-counter-number days">00</div>';
					echo '</div>';
					echo '<h3 class="title">'.esc_html__('Day(s)', 'pallikoodam').'</h3>';
				echo '</div>';
				echo '<div class="dt-sc-counter-wrapper">';
					echo '<div class="counter-icon-wrapper">';
						echo '<div class="dt-sc-counter-number hours">00</div>';
					echo '</div>';
					echo '<h3 class="title">'.esc_html__('Hr(s)', 'pallikoodam').'</h3>';
				echo '</div>';
				echo '<div class="dt-sc-counter-wrapper">';
					echo '<div class="counter-icon-wrapper">';
						echo '<div class="dt-sc-counter-number minutes">00</div>';
					echo '</div>';
					echo '<h3 class="title">'.esc_html__('Min(s)', 'pallikoodam').'</h3>';
				echo '</div>';
				echo '<div class="dt-sc-counter-wrapper last">';
					echo '<div class="counter-icon-wrapper">';
						echo '<div class="dt-sc-counter-number seconds">00</div>';
					echo '</div>';
					echo '<h3 class="title">'.esc_html__('Sec(s)', 'pallikoodam').'</h3>';
				echo '</div>';
			echo '</div>';
		echo '</div>';

	}

	add_action( 'woocommerce_single_product_summary', 'pallikoodam_products_sale_countdown_timer', 15 );

}

// Product Shortcode - Ajax Call

if ( ! function_exists( 'pallikoodam_size_guide_popup' ) ) {

	function pallikoodam_size_guide_popup() {

		$product_id = (isset($_REQUEST['product_id']) && $_REQUEST['product_id'] != '') ? $_REQUEST['product_id'] : -1;

		if($product_id > -1) {

			$settings = get_post_meta( $product_id, '_custom_settings', true );
			$single_product_size_guides = (isset($settings['dt-single-product-size-guides']) && $settings['dt-single-product-size-guides'] != '') ? $settings['dt-single-product-size-guides'] : false;	
			
			if($single_product_size_guides) {
				echo '<div class="dt-sc-size-guide-popup-container">';
					echo '<div class="dt-sc-size-guide-popup-content">';

						if($single_product_size_guides == 'size-guide-1') {

							$woo_size_guide_title = pallikoodam_get_option( 'dt-woo-size-guide-title-1' );
							$woo_size_guide_title = (isset($woo_size_guide_title) && $woo_size_guide_title != '') ? $woo_size_guide_title : '';
						
							$woo_size_guide_content = pallikoodam_get_option( 'dt-woo-size-guide-content-1' );
							$woo_size_guide_content = (isset($woo_size_guide_content) && $woo_size_guide_content != '') ? $woo_size_guide_content : '';

						} else if($single_product_size_guides == 'size-guide-2') {

							$woo_size_guide_title = pallikoodam_get_option( 'dt-woo-size-guide-title-2' );
							$woo_size_guide_title = (isset($woo_size_guide_title) && $woo_size_guide_title != '') ? $woo_size_guide_title : '';
						
							$woo_size_guide_content = pallikoodam_get_option( 'dt-woo-size-guide-content-2' );
							$woo_size_guide_content = (isset($woo_size_guide_content) && $woo_size_guide_content != '') ? $woo_size_guide_content : '';

						} else if($single_product_size_guides == 'size-guide-3') {

							$woo_size_guide_title = pallikoodam_get_option( 'dt-woo-size-guide-title-3' );
							$woo_size_guide_title = (isset($woo_size_guide_title) && $woo_size_guide_title != '') ? $woo_size_guide_title : '';
						
							$woo_size_guide_content = pallikoodam_get_option( 'dt-woo-size-guide-content-3' );
							$woo_size_guide_content = (isset($woo_size_guide_content) && $woo_size_guide_content != '') ? $woo_size_guide_content : '';

						} else if($single_product_size_guides == 'size-guide-4') {

							$woo_size_guide_title = pallikoodam_get_option( 'dt-woo-size-guide-title-4' );
							$woo_size_guide_title = (isset($woo_size_guide_title) && $woo_size_guide_title != '') ? $woo_size_guide_title : '';
						
							$woo_size_guide_content = pallikoodam_get_option( 'dt-woo-size-guide-content-4' );
							$woo_size_guide_content = (isset($woo_size_guide_content) && $woo_size_guide_content != '') ? $woo_size_guide_content : '';

						} else if($single_product_size_guides == 'size-guide-5') {

							$woo_size_guide_title = pallikoodam_get_option( 'dt-woo-size-guide-title-5' );
							$woo_size_guide_title = (isset($woo_size_guide_title) && $woo_size_guide_title != '') ? $woo_size_guide_title : '';
						
							$woo_size_guide_content = pallikoodam_get_option( 'dt-woo-size-guide-content-5' );
							$woo_size_guide_content = (isset($woo_size_guide_content) && $woo_size_guide_content != '') ? $woo_size_guide_content : '';

						}

  						if(isset($woo_size_guide_content) && $woo_size_guide_content != '') {
  							echo '<div class="dt-sc-size-guide-popup-content-title">'.esc_html($woo_size_guide_title).'</div>';
	  						echo '<div class="dt-sc-size-guide-popup-content-details"><img src="'.esc_url($woo_size_guide_content).'" alt="'.esc_attr($woo_size_guide_title).'" /></div>';
  						}
  						
					echo '</div>';
					echo '<div class="dt-sc-size-guide-popup-close">'.esc_html__('Close','pallikoodam').'</div>';
				echo '</div>';
			}		

		}

		wp_die();

	}

	add_action( 'wp_ajax_pallikoodam_size_guide_popup', 'pallikoodam_size_guide_popup' );
	add_action( 'wp_ajax_nopriv_pallikoodam_size_guide_popup', 'pallikoodam_size_guide_popup' );

}