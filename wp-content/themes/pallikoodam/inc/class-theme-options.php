<?php
if ( ! class_exists( 'Pallikoodam_Options' ) ) {

	class Pallikoodam_Options {

		private static $instance;

		private static $db_options;

		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {

				self::$instance = new self;
			}

			return self::$instance;
		}

		public function __construct() {
			// Refresh options variables after customizer save.
			add_action( 'after_setup_theme', array( $this, 'refresh' ) );
		}

		public static function defaults() {
			$defaults = array(
				// General
					'show-loader' => '0',
					'show-pagecomments' => '1',
					'showall-pagination' => '0',
					'google-map-key' => '',
					'mailchimp-key' => '',
					'show-to-top' => '1',

				// Site Identity
					'display-site-title' => 0,
					'display-site-tagline' => 0,
					'site-title-color' => '',
					'site-title-h-color' => '',
					'site-tagline-color' => '',
		  			'site-title-typo' => array(
		  				'font-family' => 'ABeeZee',
		  				'font-fallback' => "'ABeeZee',sans-serif",
		  				'font-type' => 'google',
		  				'font-weight' => '400',
		  				'font-style' => 'normal',
		  				'text-transform' => '',
		  				'text-align' => '',
		  				'text-decoration' => '',
		  				'fs-desktop' => '',
		  				'fs-desktop-unit' => '',
		  				'fs-tablet' => '',
		  				'fs-tablet-unit' => '',
		  				'fs-tablet-landscape' => '',
		  				'fs-tablet-landscape-unit' => '',
		  				'fs-mobile' => '',
		  				'fs-mobile-unit' => '',
		  				'lh-desktop' => '',
		  				'lh-tablet' => '',
		  				'lh-tablet-landscape' => '',
		  				'lh-mobile' => '',
		  				'ls-desktop' => '',
		  				'ls-desktop-unit' => '',
		  				'ls-tablet' => '',
		  				'ls-tablet-unit' => '',
		  				'ls-tablet-landscape' => '',
		  				'ls-tablet-landscape-unit' => '',
		  				'ls-mobile' => '',
		  				'ls-mobile-unit' => '',		  				
		  			),
		  			'site-tagline-typo' => array(
		  				'font-family' => 'ABeeZee',
		  				'font-fallback' => "'ABeeZee',sans-serif",
		  				'font-type' => 'google',
		  				'font-weight' => '400',
		  				'font-style' => 'normal',
		  				'text-transform' => '',
		  				'text-align' => '',
		  				'text-decoration' => '',
		  				'fs-desktop' => '',
		  				'fs-desktop-unit' => '',
		  				'fs-tablet' => '',
		  				'fs-tablet-unit' => '',
		  				'fs-tablet-landscape' => '',
		  				'fs-tablet-landscape-unit' => '',
		  				'fs-mobile' => '',
		  				'fs-mobile-unit' => '',
		  				'lh-desktop' => '',
		  				'lh-tablet' => '',
		  				'lh-tablet-landscape' => '',
		  				'lh-mobile' => '',
		  				'ls-desktop' => '',
		  				'ls-desktop-unit' => '',
		  				'ls-tablet' => '',
		  				'ls-tablet-unit' => '',
		  				'ls-tablet-landscape' => '',
		  				'ls-tablet-landscape-unit' => '',
		  				'ls-mobile' => '',
		  				'ls-mobile-unit' => '',		  				
		  			),					

				// Breadcrumb
				'show-breadcrumb' => '1',
				'breadcrumb-style' => 'aligncenter',
				'breadcrumb-position' => 'header-top-relative',
				'breadcrumb-delimiter' => 'fas fa-caret-right',
				'breadcrumb-title-color' => '#ffffff',
				'breadcrumb-text-color' => '#ffffff',
				'breadcrumb-link-color' => '#d6ece5',
				'breadcrumb-link-h-color' => '#ffffff',
					'breadcrumb-bg' => array(
						'background-color' => 'rgba(0,0,0,0.7)',
						'background-repeat' => 'no-repeat',
						'background-position' => 'center center',
						'background-size' => 'auto',
						'background-attachment' => 'fixed'
					),
					'breadcrumb-overlay-bg-color' => '1',
					'breadcrumb-title-typo' => array(
						'font-family' => 'Quicksand',
						'font-fallback' => "'Quicksand',sans-serif",
						'font-type' => 'google',
						'font-weight' => '700',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '46',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),
					'breadcrumb-typo' => array(
						'font-family' => 'Raleway',
						'font-fallback' => "'Raleway',sans-serif",
						'font-type' => 'google',
						'font-weight' => '500',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '16',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),		  			

				// Site Layout
					'site-layout' => 'wide',
					'site-boxed-layout' => '1',

				// Typography
					'menu-typo' => array(
						'font-family'              => 'Raleway',
						'font-fallback'            => "'Raleway',sans-serif",
						'font-type'                => 'google',
						'font-weight'              => '600',
						'font-style'               => 'normal',
						'text-transform'           => 'none',
						'text-align'               => 'unset',
						'text-decoration'          => 'none',
						'fs-desktop'               => '16',
						'fs-desktop-unit'          => 'px',
						'fs-tablet'                => '',
						'fs-tablet-unit'           => '',
						'fs-tablet-landscape'      => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile'                => '',
						'fs-mobile-unit'           => '',
						'lh-desktop'               => '',
						'lh-tablet'                => '',
						'lh-tablet-landscape'      => '',
						'lh-mobile'                => '',
						'ls-desktop'               => '',
						'ls-desktop-unit'          => '',
						'ls-tablet'                => '',
						'ls-tablet-unit'           => '',
						'ls-tablet-landscape'      => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile'                => '',
						'ls-mobile-unit'           => '',		  				
					),				

					'h1-typo' => array(
						'font-family'              => 'Quicksand',
						'font-fallback'            => "'Quicksand',sans-serif",
						'font-type'                => 'google',
						'font-weight'              => '700',
						'font-style'               => 'normal',
						'text-transform'           => 'none',
						'text-align'               => 'unset',
						'text-decoration'          => 'none',
						'fs-desktop'               => '56',
						'fs-desktop-unit'          => 'px',
						'fs-tablet'                => '',
						'fs-tablet-unit'           => '',
						'fs-tablet-landscape'      => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile'                => '',
						'fs-mobile-unit'           => '',
						'lh-desktop'               => '',
						'lh-tablet'                => '',
						'lh-tablet-landscape'      => '',
						'lh-mobile'                => '',
						'ls-desktop'               => '0',
						'ls-desktop-unit'          => '',
						'ls-tablet'                => '',
						'ls-tablet-unit'           => '',
						'ls-tablet-landscape'      => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile'                => '',
						'ls-mobile-unit'           => '',		  				
					),

					'h2-typo' => array(
						'font-family' => 'Quicksand',
						'font-fallback' => "'Quicksand',sans-serif",
						'font-type' => 'google',
						'font-weight' => '700',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '46',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '0',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),

					'h3-typo' => array(
						'font-family' => 'Quicksand',
						'font-fallback' => "'Quicksand',sans-serif",
						'font-type' => 'google',
						'font-weight' => '700',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '36',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '0',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),

					'h4-typo' => array(
						'font-family' => 'Quicksand',
						'font-fallback' => "'Quicksand',sans-serif",
						'font-type' => 'google',
						'font-weight' => '700',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '26',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '0',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),

					'h5-typo' => array(
						'font-family' => 'Quicksand',
						'font-fallback' => "'Quicksand',sans-serif",
						'font-type' => 'google',
						'font-weight' => '700',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '20',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '0',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),

					'h6-typo' => array(
						'font-family' => 'Quicksand',
						'font-fallback' => "'Quicksand',sans-serif",
						'font-type' => 'google',
						'font-weight' => '700',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '16',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '0',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),

					'footer-title-typo' => array(
						'font-family' => 'Quicksand',
						'font-fallback' => "'Quicksand',sans-serif",
						'font-type' => 'google',
						'font-weight' => '700',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '26',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '30',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),

					'footer-content-typo' => array(
						'font-family' => 'Raleway',
						'font-fallback' => "'Raleway',sans-serif",
						'font-type' => 'google',
						'font-weight' => '500',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '16',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '30',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),		  			

		  			'extra-1-typo' => array(
		  				'font-family' => 'Quicksand',
		  				'font-fallback' => "'Quicksand',sans-serif",
		  				'font-type' => 'google',
		  				'font-weight' => '700',
		  				'font-style' => 'normal',
		  				'text-transform' => 'none',
		  				'text-align' => 'unset',
		  				'text-decoration' => 'none',
		  				'fs-desktop' => '',
		  				'fs-desktop-unit' => '',
		  				'fs-tablet' => '',
		  				'fs-tablet-unit' => '',
		  				'fs-tablet-landscape' => '',
		  				'fs-tablet-landscape-unit' => '',
		  				'fs-mobile' => '',
		  				'fs-mobile-unit' => '',
		  				'lh-desktop' => '',
		  				'lh-tablet' => '',
		  				'lh-tablet-landscape' => '',
		  				'lh-mobile' => '',
		  				'ls-desktop' => '',
		  				'ls-desktop-unit' => '',
		  				'ls-tablet' => '',
		  				'ls-tablet-unit' => '',
		  				'ls-tablet-landscape' => '',
		  				'ls-tablet-landscape-unit' => '',
		  				'ls-mobile' => '',
		  				'ls-mobile-unit' => '',		  				
		  			),

		  			'extra-2-typo' => array(
		  				'font-family' => 'Raleway',
		  				'font-fallback' => "'Raleway',sans-serif",
		  				'font-type' => 'google',
		  				'font-weight' => '500',
		  				'font-style' => 'normal',
		  				'text-transform' => '',
		  				'text-align' => '',
		  				'text-decoration' => '',
		  				'fs-desktop' => '',
		  				'fs-desktop-unit' => '',
		  				'fs-tablet' => '',
		  				'fs-tablet-unit' => '',
		  				'fs-tablet-landscape' => '',
		  				'fs-tablet-landscape-unit' => '',
		  				'fs-mobile' => '',
		  				'fs-mobile-unit' => '',
		  				'lh-desktop' => '',
		  				'lh-tablet' => '',
		  				'lh-tablet-landscape' => '',
		  				'lh-mobile' => '',
		  				'ls-desktop' => '',
		  				'ls-desktop-unit' => '',
		  				'ls-tablet' => '',
		  				'ls-tablet-unit' => '',
		  				'ls-tablet-landscape' => '',
		  				'ls-tablet-landscape-unit' => '',
		  				'ls-mobile' => '',
		  				'ls-mobile-unit' => '',		  				
		  			),

		  		// Color
					'menu-color' => '#808080',
					'h1-color' => '#000000',
					'h2-color' => '#000000',
					'h3-color' => '#000000',
					'h4-color' => '#000000',
					'h5-color' => '#000000',
					'h6-color' => '#000000',

					'footer-title-color' => '#000000',
					'footer-content-color' => '#ffffff',
					'footer-content-a-color' => '#ffffff',
					'footer-content-a-hover-color' => '#fff565',

				// Widget Area Tile
					'widget-title-style' => 'default',
					'widget-title-color' => '#000000',
					'widget-title-bg-color' => '',
					'widget-title-border-style' => 'none',
					'widget-title-border' => array(),
					'widget-title-border-color' => '',
					'widget-title-border-radius' => array(),
					'widget-title-typo' => array(
		  				'font-family' => 'Quicksand',
		  				'font-fallback' => "'Quicksand',sans-serif",
		  				'font-type' => 'google',
		  				'font-weight' => '700',
		  				'font-style' => 'normal',
		  				'text-transform' => 'none',
		  				'text-align' => 'unset',
		  				'text-decoration' => 'none',
		  				'fs-desktop' => '24',
		  				'fs-desktop-unit' => 'px',
		  				'fs-tablet' => '',
		  				'fs-tablet-unit' => '',
		  				'fs-tablet-landscape' => '',
		  				'fs-tablet-landscape-unit' => '',
		  				'fs-mobile' => '',
		  				'fs-mobile-unit' => '',
		  				'lh-desktop' => '',
		  				'lh-tablet' => '',
		  				'lh-tablet-landscape' => '',
		  				'lh-mobile' => '',
		  				'ls-desktop' => '',
		  				'ls-desktop-unit' => '',
		  				'ls-tablet' => '',
		  				'ls-tablet-unit' => '',
		  				'ls-tablet-landscape' => '',
		  				'ls-tablet-landscape-unit' => '',
		  				'ls-mobile' => '',
		  				'ls-mobile-unit' => '',		  				
		  			),

		  			'widget-content-color' => '#808080',
		  			'widget-content-link-color' => '#f0aa00',
		  			'widget-content-link-h-color' => '#ff236c',
					'widget-content-typo' => array(
		  				'font-family' => 'Raleway',
		  				'font-fallback' => "'Raleway',sans-serif",
		  				'font-type' => 'google',
		  				'font-weight' => '500',
		  				'font-style' => 'normal',
		  				'text-transform' => 'none',
		  				'text-align' => 'unset',
		  				'text-decoration' => 'none',
		  				'fs-desktop' => '16',
		  				'fs-desktop-unit' => 'px',
		  				'fs-tablet' => '',
		  				'fs-tablet-unit' => '',
		  				'fs-tablet-landscape' => '',
		  				'fs-tablet-landscape-unit' => '',
		  				'fs-mobile' => '',
		  				'fs-mobile-unit' => '',
		  				'lh-desktop' => '',
		  				'lh-tablet' => '',
		  				'lh-tablet-landscape' => '',
		  				'lh-mobile' => '',
		  				'ls-desktop' => '',
		  				'ls-desktop-unit' => '',
		  				'ls-tablet' => '',
		  				'ls-tablet-unit' => '',
		  				'ls-tablet-landscape' => '',
		  				'ls-tablet-landscape-unit' => '',
		  				'ls-mobile' => '',
		  				'ls-mobile-unit' => '',		  				
		  			),

				// WooCommerce

					// Shop Page Section 
						'shop-page-layout'                 => 'content-full-width',
						'shop-page-show-standard-sidebar'  => '',
						'shop-page-widgetareas'            => '',
						'shop-page-product-per-page'       => 12,
						'shop-page-product-layout'         => 4,
						'shop-page-product-style-template' => -1,
						'shop-page-enable-breadcrumb'      => '1',
						'shop-page-bottom-hook'            => '',
						'shop-page-show-sorter-on-header'  => '1',
						'shop-page-sorter-header-elements' => array(
							'filter',
							'display_mode',
							'display_mode_options',
							'result_count'
						),
						'shop-page-show-sorter-on-footer'  => '1',
						'shop-page-sorter-footer-elements' => array(
							'pagination'
						),

					// Category Archive Page Section 
						'dt-woo-category-archive-layout'                => 'with-left-sidebar',
						'dt-woo-category-archive-show-standard-sidebar' => '',
						'dt-woo-category-archive-widgetareas'           => '',
						'dt-woo-category-archive-product-per-page'      => 12,
						'dt-woo-category-archive-product-layout'        => 4,
						'dt-woo-category-product-style-template'        => -1,
						'dt-woo-category-archive-enable-breadcrumb'     => '1',

					// Tag Archive Page Section 
						'dt-woo-tag-archive-layout'                     => 'with-left-sidebar',
						'dt-woo-tag-archive-show-standard-sidebar'      => '',
						'dt-woo-tag-archive-widgetareas'                => '',
						'dt-woo-tag-archive-product-per-page'           => 12,
						'dt-woo-tag-archive-product-layout'             => 4,
						'dt-woo-tag-product-style-template'             => -1,
						'dt-woo-tag-archive-enable-breadcrumb'          => '1',

					// Product Single Page Section 
						'dt-single-product-default-template'        => 'woo-default',
						'dt-single-product-sale-countdown-timer'    => '',
						'dt-single-product-enable-size-guide'       => '',
						'dt-single-product-enable-ajax-addtocart'   => '',
						'dt-single-product-enable-breadcrumb'       => '',
						'dt-single-product-addtocart-sticky'        => '',
						'dt-single-product-show-360-viewer'         => '',
						'dt-single-product-default-show-upsell'     => '1',
						'dt-single-product-upsell-title'            => '',
						'dt-single-product-upsell-column'           => 4,
						'dt-single-product-upsell-limit'            => 4,
						'dt-single-product-upsell-style-template'   => -1,
						'dt-single-product-default-show-related'    => '1',
						'dt-single-product-related-title'           => '',
						'dt-single-product-related-column'          => 4,
						'dt-single-product-related-limit'           => 4,
						'dt-single-product-related-style-template'  => -1,
						'dt-single-product-show-sharer-facebook'    => '',
						'dt-single-product-show-sharer-delicious'   => '',
						'dt-single-product-show-sharer-digg'        => '',
						'dt-single-product-show-sharer-stumbleupon' => '',
						'dt-single-product-show-sharer-twitter'     => '',
						'dt-single-product-show-sharer-googleplus'  => '',
						'dt-single-product-show-sharer-linkedin'    => '',
						'dt-single-product-show-sharer-pinterest'    => '',

					// Others Section
						'dt-woo-quantity-plusnminus'       => '',
						'dt-woo-addtocart-custom-action'   => '',
						'dt-woo-cross-sell-column'         => 2,
						'dt-woo-cross-sell-title'          => '',
						'dt-woo-cross-sell-style-template' => -1,

					// Size Guide Section
						'dt-woo-size-guide-title-1'   => '',
						'dt-woo-size-guide-content-1' => '',
						'dt-woo-size-guide-title-2'   => '',
						'dt-woo-size-guide-content-2' => '',
						'dt-woo-size-guide-title-3'   => '',
						'dt-woo-size-guide-content-3' => '',
						'dt-woo-size-guide-title-4'   => '',
						'dt-woo-size-guide-content-4' => '',
						'dt-woo-size-guide-title-5'   => '',
						'dt-woo-size-guide-content-5' => '',


				// All Page Settings
					// Archive Pages
						'site-global-sidebar-layout'					=> 'with-both-sidebar',
						'blog-archives-page-layout'						=> 'with-both-sidebar',
						'show-standard-left-sidebar-for-post-archives'  => '1',
						'show-standard-right-sidebar-for-post-archives' => '1',
						'blog-post-layout'								=> 'entry-grid',
						'blog-post-grid-list-style'						=> 'dt-sc-boxed',
						'blog-post-cover-style'							=> 'dt-sc-boxed',
						'blog-post-columns'								=> 'one-half-column',
						'blog-list-thumb'								=> 'entry-left-thumb',
						'blog-alignment'								=> 'alignnone',
						'enable-equal-height'							=> '0',
						'enable-no-space'								=> '0',
						'enable-gallery-slider'							=> '0',
						'blog-elements-position'						=> array(
							'feature_image',
							'meta_group',
							'title',
							'content',
							'read_more'
						),
						'blog-meta-position'							=> array(
							'date',
						),
						'enable-post-format'							=> '0',
						'enable-excerpt-text'							=> '1',
						'blog-excerpt-length'							=> '25',
						'enable-video-audio'							=> '1',
						'blog-readmore-text'							=> esc_html__('Read More', 'pallikoodam'),
						'blog-image-hover-style'						=> 'dt-sc-default',
						'blog-image-overlay-style'						=> 'dt-sc-default',
						'blog-pagination'								=> 'numbered',

					// Single Page
						'post-elements-position'						=> array(
							'content',
							'meta_group',
							'navigation',
							'comment_box'
						),
						'post-meta-position'							=> array(
							'tags'
						),
						'post-related-title'							=> esc_html__('Related Posts', 'pallikoodam'),
						'post-related-columns'							=> 'one-third-column',
						'post-related-count'							=> '3',
						'enable-related-excerpt'						=> '0',
						'post-related-excerpt'							=> '25',
						'enable-related-carousel'						=> '0',
						'related-carousel-nav'							=> '',
						'enable-image-lightbox'							=> '0',
						'post-comments-list-style'						=> 'rounded',

					// 404 Page Settings
						'enable-404message'								=> '1',
						'notfound-style'								=> 'type1',
						'notfound-darkbg'								=> '0',
						'notfound-pageid'								=> '',
						'notfound_background'							=> '',
						'notfound-bg-style'								=> '',

					// Coming Soon Settings
						'enable-comingsoon'								=> '0',
						'comingsoon-style'								=> 'type1',
						'uc-darkbg'										=> '0',
						'comingsoon-pageid'								=> '',
						'show-launchdate'								=> '0',
						'comingsoon-launchdate'							=> date( 'm/d/Y h:i:s' ),
						'comingsoon-timezone'							=> '0',
						'comingsoon_background'							=> '',
						'comingsoon-bg-style'							=> '',

				// Hooks
						'enable-top-hook'								=> '0',
						'top-hook'										=> '',
						'enable-content-before-hook'					=> '0',
						'content-before-hook'							=> '',
						'enable-content-after-hook'						=> '0',
						'content-after-hook'							=> '',
						'enable-bottom-hook'							=> '0',
						'bottom-hook'									=> '',
						'enable-analytics-code'							=> '0',
						'analytics-code'								=> '',
						
				// Sociable
						'sociable-delicious'							=> '',
						'sociable-deviantart'							=> '',
						'sociable-digg'									=> '',
						'sociable-dribbble'								=> '',
						'sociable-envelope'								=> '',
						'sociable-facebook'								=> '',
						'sociable-flickr'								=> '',
						'sociable-google-plus'							=> '#',
						'sociable-gtalk'								=> '',
						'sociable-instagram'							=> '',
						'sociable-lastfm'								=> '',
						'sociable-linkedin'								=> '#',
						'sociable-pinterest'							=> '',
						'sociable-reddit'								=> '',
						'sociable-rss'									=> '',
						'sociable-skype'								=> '',
						'sociable-stumbleupon'							=> '',
						'sociable-tumblr'								=> '#',
						'sociable-twitter'								=> '',
						'sociable-viadeo'								=> '',
						'sociable-vimeo'								=> '',
						'sociable-yahoo'								=> '',
						'sociable-youtube'								=> '',

				// Skin
					'primary-color'					=> '#f1aa00',
					'secondary-color'				=> '#ff236c',
					'tertiary-color'				=> '#a5c347',

					'body-bg-color'					=> '#ffffff',
					'body-content-color'	        => '#808080',
					'body-content-link-color'		=> '#f0aa00',
					'body-content-link-hover-color' => '#ff236c',
					'body-typo' => array(
						'font-family' => 'Raleway',
						'font-fallback' => "'Raleway',sans-serif",
						'font-type' => 'google',
						'font-weight' => '500',
						'font-style' => 'normal',
						'text-transform' => 'none',
						'text-align' => 'unset',
						'text-decoration' => 'none',
						'fs-desktop' => '16',
						'fs-desktop-unit' => 'px',
						'fs-tablet' => '',
						'fs-tablet-unit' => '',
						'fs-tablet-landscape' => '',
						'fs-tablet-landscape-unit' => '',
						'fs-mobile' => '',
						'fs-mobile-unit' => '',
						'lh-desktop' => '30',
						'lh-tablet' => '',
						'lh-tablet-landscape' => '',
						'lh-mobile' => '',
						'ls-desktop' => '',
						'ls-desktop-unit' => '',
						'ls-tablet' => '',
						'ls-tablet-unit' => '',
						'ls-tablet-landscape' => '',
						'ls-tablet-landscape-unit' => '',
						'ls-mobile' => '',
						'ls-mobile-unit' => '',		  				
					),
				
				// Portfolio

					// Archive Pages 
						'portfolio-archives-page-layout'                => 'content-full-width',
						'portfolio-archives-page-show-standard-sidebar' => '',
						'portfolio-archives-post-layout'                => 'dtportfolio-one-fourth-column',
						'portfolio-hover-style'                         => '',
						'portfolio-cursor-hover-style'                  => '',
						'portfolio-grid-space'                          => '',
						'portfolio-allow-full-width'                    => '',
						'portfolio-post-per-page'                       => 12,
						'portfolio-disable-item-options'                => '',

					// Permalinks
						'single-portfolio-slug'   => '',
						'portfolio-category-slug' => '',
						'portfolio-tag-slug' => '',

					// Custom Fields
						'singleportfolioslug'   => '',

				
				// Privacy & Cookies

					// Privacy Policy
						'privacy-commentform'       => '',
						'privacy-commentform-msg'   => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'pallikoodam'),
						'privacy-subscribeform'     => '',
						'privacy-subscribeform-msg' => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'pallikoodam'),
						'privacy-loginform'         => '',
						'privacy-loginform-msg'     => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'pallikoodam'),

					// Cookies
						'enable-cookie-consent'                        => '',
						'cookie-consent-msg'                           => '',
						'cookie-bar-position'                          => 'bottom',
						'enable-dismiss-the-notification'              => '',
						'dismiss-the-notification-label'               => '',
						'enable-link-to-another-page'                  => '',
						'link-to-another-page-label'                   => '',
						'link-to-another-page-link'                    => '',
						'enable-open-infomodal-on-privacy-and-cookies' => '',
						'open-infomodal-on-privacy-and-cookies-label'  => '',
						'enable-custom-model-content'                  => '',
						'custom-model-heading'                         => esc_html__('Cookie and Privacy Settings', 'pallikoodam'),
						'custom-model-tabs'                            => '',


				// Additional JS
					'additional-js' => '',

					
			);

			return apply_filters( 'dttheme_default_settings', $defaults  );
		}

		public static function get_options() {
			self::refresh();
			return self::$db_options;
		}		

		/**
		 * Update theme static option array with sane defaults.
		 * @link  https://make.wordpress.org/themes/2014/07/09/using-sane-defaults-in-themes/
		 */
		public static function refresh() {
			self::$db_options = wp_parse_args(
				get_option( PALLIKOODAM_THEME_SETTINGS, array() ),
				self::defaults()
			);
		}
	}
}

Pallikoodam_Options::get_instance();

/**
 * Retrieves an option value based on an option name.
 *
 */
if ( ! function_exists( 'pallikoodam_get_option' ) ) {

	function pallikoodam_get_option( $option, $default = '' ) {

		$theme_options = Pallikoodam_Options::get_options();

		/**
		 * 
		 */
		$theme_options = apply_filters( 'pallikoodam_get_option_array', $theme_options, $option, $default );

		$value = ( isset( $theme_options[ $option ] ) && '' !== $theme_options[ $option ] ) ? $theme_options[ $option ] : $default;

		/**
		 * Dynamic filter pallikoodam_get_option_$option.
		 */
		return apply_filters( "pallikoodam_get_option_{$option}", $value, $option, $default );
	}
}