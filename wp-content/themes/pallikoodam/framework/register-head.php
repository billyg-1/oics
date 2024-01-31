<?php
/* ---------------------------------------------------------------------------
 * Loading Theme Scripts
 * --------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'pallikoodam_enqueue_scripts');
function pallikoodam_enqueue_scripts() {

	// comment reply script ------------------------------------------------------
	if (is_singular() AND comments_open()):
		wp_enqueue_script( 'comment-reply' );
	endif;

	// scipts variable -----------------------------------------------------------
	$loadingbar = pallikoodam_get_option( 'show-loader' );
	$loadingbar = !empty( $loadingbar ) ?  "enable" : "disable";

	if(is_rtl()) $rtl = true; else $rtl = false;

	wp_enqueue_script('jquery-ui-totop', get_theme_file_uri('/framework/js/jquery.ui.totop.min.js'), array(), false, true);
	wp_enqueue_script('jquery-easing', get_theme_file_uri('/framework/js/jquery.easing.js'), array(), false, true);
	wp_enqueue_script('jquery-caroufredsel', get_theme_file_uri('/framework/js/jquery.caroufredsel.js'), array(), false, true);
	wp_enqueue_script('jquery-debouncedresize', get_theme_file_uri('/framework/js/jquery.debouncedresize.js'), array(), false, true);
	wp_enqueue_script('jquery-prettyphoto', get_theme_file_uri('/framework/js/jquery.prettyphoto.js'), array(), false, true);
	wp_enqueue_script('jquery-touchswipe', get_theme_file_uri('/framework/js/jquery.touchswipe.js'), array(), false, true);
	wp_enqueue_script('jquery-parallax', get_theme_file_uri('/framework/js/jquery.parallax.js'), array(), false, true);
	wp_enqueue_script('jquery-downcount', get_theme_file_uri('/framework/js/jquery.downcount.js'), array(), false, true);
	wp_enqueue_script('jquery-nicescroll', get_theme_file_uri('/framework/js/jquery.nicescroll.min.js'), array(), false, true);
	wp_enqueue_script('jquery-bxslider', get_theme_file_uri('/framework/js/jquery.bxslider.js'), array(), false, true);
	wp_enqueue_script('jquery-fitvids', get_theme_file_uri('/framework/js/jquery.fitvids.js'), array(), false, true);
	wp_enqueue_script('jquery-sticky', get_theme_file_uri('/framework/js/jquery.sticky.js'), array(), false, true);
	wp_enqueue_script('jquery-simple-sidebar', get_theme_file_uri('/framework/js/jquery.simple-sidebar.js'), array(), false, true);
	wp_enqueue_script('jquery-classie', get_theme_file_uri('/framework/js/jquery.classie.js'), array(), false, true);
	wp_enqueue_script('jquery-placeholder', get_theme_file_uri('/framework/js/jquery.placeholder.js'), array(), false, true);
	wp_enqueue_script('jquery-visualnav', get_theme_file_uri('/framework/js/jquery.visualNav.min.js'), array(), false, true);
	wp_enqueue_script('resizesensor', get_theme_file_uri('/framework/js/ResizeSensor.min.js'), array(), false, true);
	wp_enqueue_script('theia-sticky-sidebar', get_theme_file_uri('/framework/js/theia-sticky-sidebar.min.js'), array(), false, true);
	wp_register_script('particles', get_theme_file_uri('/framework/js/particles.min.js'), array(), false, true);
	wp_enqueue_script('matchheight', get_theme_file_uri('/framework/js/matchHeight.js'), array(), false, true);
	wp_enqueue_script('jquery-waypoints', get_theme_file_uri('/framework/js/jquery.waypoints.min.js'), array(), false, true);
	wp_enqueue_script('jquery-inview', get_theme_file_uri('/framework/js/jquery.inview.js'), array(), false, true);

	if(class_exists('Tribe__Events__Pro__Main')) {
		if(!tribe_is_photo()) {
			wp_enqueue_script('isotope-pkgd', get_theme_file_uri('/framework/js/isotope.pkgd.min.js'), array(), false, true);
		}
	} else {
		wp_enqueue_script('isotope-pkgd', get_theme_file_uri('/framework/js/isotope.pkgd.min.js'), array(), false, true);
	}

	if( pallikoodam_get_option('enable-cookie-consent') == "true" ) {
		wp_enqueue_script('pallikoodam-cookieconsent', get_theme_file_uri('/framework/js/cookieconsent.js'), array(), false, true);
	}

	wp_enqueue_script('jquery-magnific-popup', get_theme_file_uri('/framework/js/magnific/jquery.magnific-popup.min.js'), array(), false, true);

	if( $loadingbar == 'enable' ) {
		wp_enqueue_script('pace', get_theme_file_uri('/framework/js/pace.min.js'),array(),false,true);
		wp_localize_script('pace', 'paceOptions', array(
			'restartOnRequestAfter' => 'false',
			'restartOnPushState' => 'false'
		));
	}

	if( function_exists( 'is_woocommerce' ) ){
		wp_enqueue_script('wc-cart-fragments');
		wp_enqueue_script('pallikoodam-woocommerce', get_theme_file_uri('/framework/js/woocommerce.js'), array(), false, true);
	}
	wp_enqueue_script('pallikoodam-jqcustom', get_theme_file_uri('/framework/js/custom.js'), array(), false, true);

	$enable_ajax_addtocart = pallikoodam_get_option( 'dt-single-product-enable-ajax-addtocart' );
	$enable_ajax_addtocart = (isset($enable_ajax_addtocart) && $enable_ajax_addtocart == 'true') ? true : false;

	$enable_totop = pallikoodam_get_option( 'show-to-top' );
	$enable_totop = (isset($enable_totop) && $enable_totop == '1') ? true : false;

	wp_localize_script('jquery-nicescroll', 'dttheme_urls', array(
		'theme_base_url' => esc_js(PALLIKOODAM_THEME_URI),
		'framework_base_url' => esc_js(PALLIKOODAM_THEME_URI).'/framework/',
		'ajaxurl' => esc_url( admin_url('admin-ajax.php') ),
		'url' => get_site_url(),
		'isRTL' => esc_js($rtl),
		'loadingbar' => esc_js($loadingbar),
		'advOptions' => esc_html__('Show Advanced Options', 'pallikoodam'),
		'wpnonce' => wp_create_nonce('rating-nonce'),
		'enable_ajax_addtocart' => esc_js($enable_ajax_addtocart),
		'enable_totop' => esc_js($enable_totop)
	));
}

/* ---------------------------------------------------------------------------
 * Scripts of Custom JS from Theme Back-End
* --------------------------------------------------------------------------- */
function pallikoodam_scripts_custom() {

	$enable_custom_js = (int) get_theme_mod( 'enable-custom-js', pallikoodam_defaults('enable-custom-js') );
	$custom_js = get_theme_mod( 'custom-js', '');

	if( !empty( $enable_custom_js ) && !empty( $custom_js ) ){
		wp_add_inline_script('pallikoodam-jqcustom', pallikoodam_wp_kses(stripslashes($custom_js)) ,'after');
	}
}
add_action('wp_enqueue_scripts', 'pallikoodam_scripts_custom', 100);

/* ---------------------------------------------------------------------------
 * Loading Theme Styles
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'pallikoodam_enqueue_styles', 101 );
function pallikoodam_enqueue_styles() {

	// site icons ---------------------------------------------------------------
	if ( ! has_site_icon() ):
		$url = PALLIKOODAM_THEME_URI . "/images/favicon.ico";
		echo "<link href='$url' rel='shortcut icon' type='image/x-icon' />\n";
	endif;

	// wp_enqueue_style ---------------------------------------------------------------
	wp_enqueue_style( 'pallikoodam', get_stylesheet_uri(), false, PALLIKOODAM_THEME_VERSION, 'all' );

	wp_enqueue_style( 'pallikoodam-base',		  get_theme_file_uri('/css/base.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	wp_enqueue_style( 'pallikoodam-grid', 		  get_theme_file_uri('/css/grid.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	wp_enqueue_style( 'pallikoodam-widget', 	  get_theme_file_uri('/css/widget.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	wp_enqueue_style( 'pallikoodam-layout', 	  get_theme_file_uri('/css/layout.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	wp_enqueue_style( 'pallikoodam-blog',	      get_theme_file_uri('/css/blog.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	wp_enqueue_style( 'pallikoodam-contact',	  get_theme_file_uri('/css/contact.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	wp_enqueue_style( 'pallikoodam-custom-class', get_theme_file_uri('/css/custom-class.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	wp_enqueue_style( 'pallikoodam-browsers', 	  get_theme_file_uri('/css/browsers.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );

	wp_enqueue_style( 'prettyphoto',	get_theme_file_uri('/css/prettyPhoto.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );

	if (function_exists('bp_add_cover_image_inline_css')) {
		$inline_css = bp_add_cover_image_inline_css( true );
		wp_add_inline_style( 'bp-parent-css', strip_tags( $inline_css['css_rules'] ) );
	}

	// icon fonts ---------------------------------------------------------------------
	wp_enqueue_style ( 'custom-font-awesome',		get_theme_file_uri('/css/all.min.css'), array () );
	wp_enqueue_style ( 'pe-icon-7-stroke',			get_theme_file_uri('/css/pe-icon-7-stroke.css'), array () );
	wp_enqueue_style ( 'stroke-gap-icons-style',	get_theme_file_uri('/css/stroke-gap-icons-style.css'), array () );
	wp_enqueue_style ( 'icon-moon',					get_theme_file_uri('/css/icon-moon.css'), array () );
	wp_enqueue_style ( 'material-design-iconic',	get_theme_file_uri('/css/material-design-iconic-font.min.css'), array () );

	// comingsoon css
	if( pallikoodam_get_option( 'enable-comingsoon' ) )
		wp_enqueue_style("pallikoodam-comingsoon",  get_theme_file_uri("/css/comingsoon.css"), false, PALLIKOODAM_THEME_VERSION, 'all' );

	// notfound css
	if ( is_404() )
		wp_enqueue_style("pallikoodam-notfound",	get_theme_file_uri("/css/notfound.css"), false, PALLIKOODAM_THEME_VERSION, 'all' );

	// loader css
	$loadingbar = pallikoodam_get_option( 'show-loader' );
	if( !empty( $loadingbar ) )
		wp_enqueue_style("pallikoodam-loader", 		get_theme_file_uri("/css/loaders.css"), false, PALLIKOODAM_THEME_VERSION, 'all' );

	// woocommerce css
	if( function_exists( 'is_woocommerce' ) ):
		wp_enqueue_style( 'pallikoodam-woo', 				get_theme_file_uri('/css/woocommerce.css'), 'woocommerce-general-css', PALLIKOODAM_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pallikoodam-woo-default', 		get_theme_file_uri('/css/woocommerce/woocommerce-default.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pallikoodam-woo-hovers', 		get_theme_file_uri('/css/woocommerce/woocommerce-hovers.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pallikoodam-woo-custom', 		get_theme_file_uri('/css/woocommerce/woocommerce-custom.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	endif;

	// tribe-events -------------------------------------------------------------------
	wp_enqueue_style( 'pallikoodam-customevent', 		get_theme_file_uri('/tribe-events/custom.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );

	// cookie-consent -----------------------------------------------------------------
	if( pallikoodam_get_option('enable-cookie-consent') == "true" ) {
		wp_enqueue_style( 'pallikoodam-cookieconsent', 	get_theme_file_uri('/css/cookieconsent.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	}

	wp_enqueue_style( 'pallikoodam-magnific-popup', 	get_theme_file_uri('/framework/js/magnific/magnific-popup.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );

	wp_enqueue_style( 'jquery-bxslider', 					get_theme_file_uri('/css/jquery.bxslider.min.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );

	// blog single css ---------------------------------------------------------------------
	wp_enqueue_style( 'pallikoodam-custom', get_theme_file_uri('/css/blog-single.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );

	// jquery scripts --------------------------------------------
	wp_enqueue_script('modernizr-custom', 	get_theme_file_uri('/framework/js/modernizr.custom.js'), array('jquery'));

	// rtl ----------------------------------------------------------------------------
	if(is_rtl()) wp_enqueue_style('pallikoodam-rtl', 	get_theme_file_uri('/css/rtl.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );

	// gutenberg css ---------------------------------------------------------------------
	wp_enqueue_style( 'pallikoodam-gutenberg', get_theme_file_uri('/css/gutenberg.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );

	$primary_color = pallikoodam_get_option( 'primary-color' );
	$secondary_color = pallikoodam_get_option( 'secondary-color' );
	$tertiary_color = pallikoodam_get_option( 'tertiary-color' );

	$css = '';

	if( !empty( $primary_color ) ) {

		$rgba = pallikoodam_hex2rgb( $primary_color );
		$rgba = implode(',', $rgba);

		# Widget Style
		$widget_style = pallikoodam_get_option( 'widget-title-style' );
		if( $widget_style == 'type5' ) {
			$css .= '.secondary-sidebar .type5 .widgettitle { border-color:rgba('.$rgba.', 0.5) }'."\n";
		} if( $widget_style == 'type12' ) {
			$css .= '.secondary-sidebar .type12 .widgettitle { background: rgba('.$rgba.', 0.2) }'."\n";
		}

		$css .= '.dt-sc-menu-sorting a { color: rgba('.$rgba.', 0.6) }'."\n";
		$css .= '.dt-sc-team.type2 .dt-sc-team-thumb .dt-sc-team-thumb-overlay, .dt-sc-hexagon-image span:before, .dt-sc-keynote-speakers .dt-sc-speakers-thumb .dt-sc-speakers-thumb-overlay {  background: rgba('.$rgba.', 0.9) }'."\n";

		$css .= '.portfolio .image-overlay, .recent-portfolio-widget ul li a:before, .dt-sc-fitness-program-short-details-wrapper .dt-sc-fitness-program-short-details { background: rgba('.$rgba.', 0.9) }'."\n";

		# Blog
		$css .= '.dt-sc-boxed-style.dt-sc-post-entry .blog-entry.sticky, .dt-sc-post-entry.entry-cover-layout .blog-entry.sticky  { box-shadow: inset 0 0 1px 3px '.$primary_color.'}'."\n";
		$css .= '.apply-no-space .dt-sc-boxed-style.dt-sc-post-entry .blog-entry.sticky, .apply-no-space .dt-sc-post-entry.entry-cover-layout .blog-entry.sticky { box-shadow: inset 0 0 1px 3px '.$primary_color.'}'."\n";
		$css .= '.dt-related-carousel div[class*="carousel-"] > div { box-shadow: 0 0 1px 1px '.$primary_color.'}'."\n";
		$css .= '.dt-sc-content-overlay-style.dt-sc-post-entry.entry-grid-layout .blog-entry.sticky .entry-thumb { box-shadow: 0 -3px 0 0 '.$primary_color.'}'."\n";
		$css .= '.dt-sc-modern-style.dt-sc-post-entry .blog-entry:hover { box-shadow: 0 5px 0 0 '.$primary_color.'}'."\n";
		$css .= '.dt-sc-grungy-boxed-style.dt-sc-post-entry .blog-entry:before, .dt-sc-title-overlap-style.dt-sc-post-entry .blog-entry:before { box-shadow: inset 0 0 0 1px '.$primary_color.'}'."\n";


		# Shortcode
		$css .= '.dt-sc-icon-box.type10 .icon-wrapper:before, .dt-sc-pr-tb-col.type2 .dt-sc-tb-header:before { box-shadow:5px 0px 0px 0px '.$primary_color.'}'."\n";
		$css .= '.dt-sc-icon-box.type10:hover .icon-wrapper:before { box-shadow:7px 0px 0px 0px '.$primary_color.'}'."\n";
		$css .= '.dt-sc-counter.type6 .dt-sc-counter-icon-holder:before { box-shadow:5px 1px 0px 0px '.$primary_color.'}'."\n";
		$css .= '.dt-sc-button.with-shadow.white, .dt-sc-pr-tb-col.type2 .dt-sc-buy-now a { box-shadow:3px 3px 0px 0px '.$primary_color.'}'."\n";

		$css .= '.dt-sc-restaurant-events-list .dt-sc-restaurant-event-details h6:before { border-bottom-color: rgba('.$rgba.',0.6) }'."\n";
		$css .= '.portfolio.type4 .image-overlay, .dt-sc-timeline-section.type4 .dt-sc-timeline-thumb-overlay, .dt-sc-yoga-classes .dt-sc-yoga-classes-image-wrapper:before, .dt-sc-yoga-course .dt-sc-yoga-course-thumb-overlay, .dt-sc-yoga-program .dt-sc-yoga-program-thumb-overlay, .dt-sc-yoga-pose .dt-sc-yoga-pose-thumb:before, .dt-sc-yoga-teacher .dt-sc-yoga-teacher-thumb:before, .dt-sc-doctors .dt-sc-doctors-thumb-overlay, .dt-sc-event-addon > .dt-sc-event-addon-date, .dt-sc-course .dt-sc-course-overlay, .dt-sc-process-steps .dt-sc-process-thumb-overlay { background: rgba('.$rgba.',0.85) }'."\n";

		$css .= '.dt-sc-pr-tb-col.type3 .dt-sc-tb-header, .dt-sc-pr-tb-col.type3:hover .dt-sc-pr-tb-col-wrapper, .dt-sc-pr-tb-col.type3.selected .dt-sc-pr-tb-col-wrapper, .dt-sc-pr-tb-col ul.dt-sc-pricing-table-type4-item li.first, .dt-sc-pr-tb-col:hover ul.dt-sc-pricing-table-type4-item, .dt-sc-pr-tb-col ul.dt-sc-pricing-table-type4-item.selected { background: rgba('.$rgba.',0.2) }'."\n";

		$css .= '@media only screen and (max-width: 767px) { .dt-sc-contact-info.type4:after, .dt-sc-icon-box.type10 .icon-content h4:after, .dt-sc-counter.type6.last h4::before, .dt-sc-counter.type6 h4::after { background-color:'.$primary_color.'} }'."\n";
		$css .= '@media only screen and (max-width: 767px) { .dt-sc-timeline-section.type2, .dt-sc-timeline-section.type2::before { border-color:'.$primary_color.'} }'."\n";

		$css .= '.dt-sc-contact-info.type4:hover span:after {
			-webkit-box-shadow: -5px -5px 0px 0px'.$primary_color.';
			-moz-box-shadow: -5px -5px 0px 0px'.$primary_color.';
			-ms-box-shadow: -5px -5px 0px 0px'.$primary_color.';
			-o-box-shadow: -5px -5px 0px 0px'.$primary_color.';
			box-shadow: -5px -5px 0px 0px'.$primary_color.';
		}'."\n";


		# WooCommerce
		if( function_exists( 'is_woocommerce' ) ){

			$css .= '.dt-sc-product-image-360-popup-viewer-holder .dt-sc-product-image-360-viewer-enlarger { background-color: rgba('.$rgba.', 0.75) }'."\n";
			$css .= '.dt-sc-product-image-gallery-container .dt-sc-product-image-gallery-thumb-enlarger { background-color: rgba('.$rgba.', 0.95) }'."\n";

			$css .= '.woocommerce ul.products.product-border-type-default.product-border-position-left.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-left.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-border-type-default.product-border-position-left.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-left.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: -4px 0 0 0 '.$primary_color.'; box-shadow: -4px 0 0 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-border-type-default.product-border-position-right.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-right.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-border-type-default.product-border-position-right.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-right.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: 4px 0 0 0 '.$primary_color.'; box-shadow: 4px 0 0 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-border-type-default.product-border-position-top.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-top.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-border-type-default.product-border-position-top.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-top.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: 0 -4px 0 0 '.$primary_color.'; box-shadow: 0 -4px 0 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-border-type-default.product-border-position-bottom.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-bottom.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-border-type-default.product-border-position-bottom.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-bottom.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: 0 4px 0 0 '.$primary_color.'; box-shadow: 0 4px 0 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-border-type-default.product-border-position-top-left.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-top-left.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-border-type-default.product-border-position-top-left.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-top-left.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: -4px -4px 0 0 '.$primary_color.'; box-shadow: -4px -4px 0 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-border-type-default.product-border-position-top-right.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-top-right.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-border-type-default.product-border-position-top-right.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-top-right.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: 4px -4px 0 0 '.$primary_color.'; box-shadow: 4px -4px 0 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-border-type-default.product-border-position-bottom-left.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-bottom-left.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-border-type-default.product-border-position-bottom-left.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-bottom-left.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: -4px 4px 0 0 '.$primary_color.'; box-shadow: -4px 4px 0 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-border-type-default.product-border-position-bottom-right.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-bottom-right.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-border-type-default.product-border-position-bottom-right.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-border-type-thumb.product-border-position-bottom-right.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: 4px 4px 0 0 '.$primary_color.'; box-shadow: 4px 4px 0 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-shadow-type-default.product-shadow-position-default.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-default.product-bordershadow-highlight-default li.product .product-wrapper .product-thumb,

			.woocommerce ul.products.product-shadow-type-default.product-shadow-position-default.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-default.product-bordershadow-highlight-onhover li.product:hover .product-wrapper .product-thumb { -webkit-box-shadow: 0 0 5px 1px '.$primary_color.'; box-shadow: 0 0 5px 1px '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-shadow-type-default.product-shadow-position-top-left.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-top-left.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-shadow-type-default.product-shadow-position-top-left.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-top-left.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: -5px -5px 5px 0 '.$primary_color.'; box-shadow: -5px -5px 5px 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-shadow-type-default.product-shadow-position-top-right.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-top-right.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-shadow-type-default.product-shadow-position-top-right.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-top-right.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: 5px -5px 5px 0 '.$primary_color.'; box-shadow: 5px -5px 5px 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-shadow-type-default.product-shadow-position-bottom-left.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-bottom-left.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-shadow-type-default.product-shadow-position-bottom-left.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-bottom-left.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: -5px 5px 5px 0 '.$primary_color.'; box-shadow: -5px 5px 5px 0 '.$primary_color.'; }'."\n";


			$css .= '.woocommerce ul.products.product-shadow-type-default.product-shadow-position-bottom-right.product-bordershadow-highlight-default li.product .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-bottom-right.product-bordershadow-highlight-default li.product .product-thumb,

			.woocommerce ul.products.product-shadow-type-default.product-shadow-position-bottom-right.product-bordershadow-highlight-onhover li.product:hover .product-wrapper,
			.woocommerce ul.products.product-shadow-type-thumb.product-shadow-position-bottom-right.product-bordershadow-highlight-onhover li.product:hover .product-thumb { -webkit-box-shadow: 5px 5px 5px 0 '.$primary_color.'; box-shadow: 5px 5px 5px 0 '.$primary_color.'; }'."\n";
		}
	}

	if( !empty( $secondary_color ) ) {

		$rgba = pallikoodam_hex2rgb( $secondary_color );
		$rgba = implode(',', $rgba);

		$css .= '.dt-sc-event-month-thumb .dt-sc-event-read-more, .dt-sc-training-thumb-overlay{ background: rgba('.$rgba.',0.85) }'."\n";

		$css .= '.dt-sc-team.hide-social-role-show-on-hover { background: rgba('.$rgba.',0.05) }'."\n";

		$css .= '.dt-sc-contact-info.type4 span:after {
			-webkit-box-shadow: 5px 5px 0px 0px'.$secondary_color.';
			-moz-box-shadow: 5px 5px 0px 0px'.$secondary_color.';
			-ms-box-shadow: 5px 5px 0px 0px'.$secondary_color.';
			-o-box-shadow: 5px 5px 0px 0px'.$secondary_color.';
			box-shadow: 5px 5px 0px 0px'.$secondary_color.';
		}'."\n";
		$css .= '.dt-sc-boxed-style.dt-sc-post-entry .blog-entry .entry-author img { box-shadow: 0 0 0 3px '.$secondary_color.'}'."\n";


		# Shortcode
		$css .= '@media only screen and (max-width: 767px) { .dt-sc-highlight .dt-sc-testimonial.type6 .dt-sc-testimonial-author:after,.dt-sc-highlight .dt-sc-testimonial.type6 .dt-sc-testimonial-author:after,.skin-highlight .dt-sc-testimonial.type6 .dt-sc-testimonial-author:after { background-color:'.$secondary_color.'} }'."\n";

		# WooCommerce
		if( function_exists( 'is_woocommerce' ) ){


		}
	}

	if( !empty( $tertiary_color ) ) {

		$rgba = pallikoodam_hex2rgb( $tertiary_color );
		$rgba = implode(',', $rgba);

		$css .= '.dt-sc-faculty .dt-sc-faculty-thumb-overlay { background: rgba('.$rgba.',0.9) }'."\n";

		# WooCommerce
		if( function_exists( 'is_woocommerce' ) ){

		}
	}

	if( !empty($primary_color) && !empty($secondary_color) && !empty($tertiary_color) ) {

		$css .= '@-webkit-keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; }  100% { color:'.$tertiary_color.'; } }'."\n";
		$css .= '@-moz-keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; } 100% { color:'.$tertiary_color.'; } }'."\n";
		$css .= '@-ms-keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; } 100% { color:'.$tertiary_color.'; }	}'."\n";
		$css .= '@-o-keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; } 100% { color:'.$tertiary_color.'; }	}'."\n";
		$css .= '@keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; } 100% { color:'.$tertiary_color.'; }	}'."\n";


		// For Gradient Colors
		$rgba_primary = pallikoodam_hex2rgb( $primary_color );
		$rgba_primary = implode(',', $rgba_primary);

		$rgba_second = pallikoodam_hex2rgb( $secondary_color );
		$rgba_second = implode(',', $rgba_second);

		$rgba_third = pallikoodam_hex2rgb( $tertiary_color );
		$rgba_third = implode(',', $rgba_third);

		$css .= '.dt-sc-destination-item .image-overlay:before { background: linear-gradient(to right,rgba('.$rgba_second.', 0.9) 0%, rgba('.$rgba_third.', 0.9) 100%); background: -webkit-linear-gradient(to right,rgba('.$rgba_second.', 0.9) 0%, rgba('.$rgba_third.', 0.9) 100%); background: -moz-linear-gradient(to right,rgba('.$rgba_second.', 0.9) 0%, rgba('.$rgba.', 0.9) 100%); background: -ms-linear-gradient(to right,rgba('.$rgba_second.', 0.9) 0%, rgba('.$rgba_third.', 0.9) 100%); }'."\n";

		// New Ofiz

		$css .= '.side-navigation.type4 ul.side-nav li.current_page_item a{
				background-image: -webkit-linear-gradient(to right, '.$tertiary_color.', '.$primary_color.');
				background-image: -moz-linear-gradient(to right, '.$tertiary_color.', '.$primary_color.');
				background-image: -o-linear-gradient(to right, '.$tertiary_color.', '.$primary_color.');
				background-image: -ms-linear-gradient(to right, '.$tertiary_color.', '.$primary_color.');
				background-image: linear-gradient(to right, '.$tertiary_color.', '.$primary_color.'); }'."\n";

	}

	wp_add_inline_style( 'pallikoodam-custom', $css );

}

/* ---------------------------------------------------------------------------
 * Custom Inline Style
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'pallikoodam_enqueue_custom_inline', 999 );
if ( ! function_exists( 'pallikoodam_enqueue_custom_inline' ) ) {
	function pallikoodam_enqueue_custom_inline() {
		wp_register_style( 'pallikoodam-custom-inline', '', array(), PALLIKOODAM_THEME_VERSION, 'all' );
	}
}

/* ---------------------------------------------------------------------------
 * Site SSL Compatibility
 * --------------------------------------------------------------------------- */
function pallikoodam_ssl(){
	$ssl = '';
	if( is_ssl() ) $ssl = 's';
	return $ssl;
}

/* ---------------------------------------------------------------------------
 * Body Class Filter for layout changes
 * --------------------------------------------------------------------------- */
function pallikoodam_body_classes( $classes ) {

	// layout
	$classes[] = 'layout-'.  pallikoodam_get_option( 'site-layout' );

	if( is_page() ) {
		global $post;
		$page_meta = get_post_meta( $post->ID, '_tpl_default_settings', true );
		$page_meta = is_array( $page_meta ) ? $page_meta : array();

		if( array_key_exists( 'show_slider', $page_meta ) && $page_meta['show_slider'] ) {
			$classes[] = "page-with-slider";
		}
		if( array_key_exists( 'enable-sub-title', $page_meta ) && !($page_meta['enable-sub-title']) ) {
			$classes[] = "no-breadcrumb";
		}
	} elseif( is_singular('post') ) {
		global $post;
		$post_meta = get_post_meta( $post->ID, '_dt_post_settings', true );
		$post_meta = is_array( $post_meta ) ? $post_meta : array();

		if( array_key_exists( 'enable-sub-title', $post_meta ) && !($post_meta['enable-sub-title']) ) {
			$classes[] = "no-breadcrumb";
		}
	} elseif( is_home() ) {
		$pageid = get_option('page_for_posts');
		$page_meta = get_post_meta( $pageid, '_tpl_default_settings', true );
		$page_meta = is_array( $page_meta ) ? $page_meta : array();

		if( array_key_exists( 'show_slider', $page_meta ) && $page_meta['show_slider'] ) {
			$classes[] = "page-with-slider";
		}
	} elseif( function_exists( 'is_woocommerce' ) && is_shop() ) {
		$shop_breadcrumb = pallikoodam_get_option( 'shop-page-enable-breadcrumb' );
		$shop_breadcrumb = ( isset($shop_breadcrumb ) && !empty( $shop_breadcrumb ) ) ? true : false;
		if( !$shop_breadcrumb ) {
			$classes[] = "no-breadcrumb";
		}
	} elseif( function_exists( 'is_woocommerce' ) && is_singular('product') ) {
		$product_breadcrumb = pallikoodam_get_option( 'dt-single-product-enable-breadcrumb' );
		$product_breadcrumb = ( isset($product_breadcrumb ) && !empty( $product_breadcrumb ) ) ? true : false;
		if( !$product_breadcrumb ) {
			$classes[] = "no-breadcrumb";
		}
	} elseif( function_exists( 'is_woocommerce' ) && is_product_category() ) {
		$pcategory_breadcrumb = pallikoodam_get_option( 'dt-woo-category-archive-enable-breadcrumb' );
		$pcategory_breadcrumb = ( isset($pcategory_breadcrumb ) && !empty( $pcategory_breadcrumb ) ) ? true : false;
		if( !$pcategory_breadcrumb ) {
			$classes[] = "no-breadcrumb";
		}
	} elseif( function_exists( 'is_woocommerce' ) && is_product_tag() ) {
		$ptag_breadcrumb = pallikoodam_get_option( 'dt-woo-tag-archive-enable-breadcrumb' );
		$ptag_breadcrumb = ( isset($ptag_breadcrumb ) && !empty( $ptag_breadcrumb ) ) ? true : false;
		if( !$ptag_breadcrumb ) {
			$classes[] = "no-breadcrumb";
		}
	} else {
		$show_breadcrump = pallikoodam_get_option('show-breadcrumb');
		if( is_null( $show_breadcrump ) ) {
			$classes[] = "no-breadcrumb";
		}
	}

	# Gutenberg Class
	if ( is_singular() && function_exists('has_blocks') && has_blocks() ) {

		$classes[] = 'has-gutenberg-blocks';
	}

	return $classes;
}
add_filter( 'body_class', 'pallikoodam_body_classes' );?>