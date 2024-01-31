<?php
if ( ! class_exists( 'Pallikoodam_Dynamic_Skin_CSS' ) ) {

	class Pallikoodam_Dynamic_Skin_CSS {

		private static $instance;

		public $primary_color = '';
		public $secondary_color = '';
		public $tertiary_color = '';

		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public function __construct() {

			$this->primary_color 	    = pallikoodam_get_option( 'primary-color' );
			$this->secondary_color    = pallikoodam_get_option( 'secondary-color' );
			$this->tertiary_color 	   = pallikoodam_get_option( 'tertiary-color' );

			// Add our CSS
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 999 );
		}

		public function enqueue_styles() {
			$css = '';

			$css .= $this->primary_color_style( $this->primary_color );
			$css .= $this->secondary_color_style( $this->secondary_color );
			$css .= $this->tertiary_color_style( $this->tertiary_color );

			if( !empty( $css ) ) {
				wp_register_style( 'pallikoodam-customiser-skin-inline', '', array(), PALLIKOODAM_THEME_VERSION, 'all' );
				wp_enqueue_style( 'pallikoodam-customiser-skin-inline' );

				wp_add_inline_style( 'pallikoodam-customiser-skin-inline', $css );
			}
		}

		public function debug( $result ) {

			echo '<pre>';
			var_dump( $result );
			echo '</pre>';
		}

		public function hex2rgb($hex) {

			$pos = strpos($hex, '#');

			if( is_int($pos) ):
				$hex = str_replace ( "#", "", $hex );

				if (strlen ( $hex ) == 3) :
					$r = hexdec ( substr ( $hex, 0, 1 ) . substr ( $hex, 0, 1 ) );
					$g = hexdec ( substr ( $hex, 1, 1 ) . substr ( $hex, 1, 1 ) );
					$b = hexdec ( substr ( $hex, 2, 1 ) . substr ( $hex, 2, 1 ) );
				 else :
					$r = hexdec ( substr ( $hex, 0, 2 ) );
					$g = hexdec ( substr ( $hex, 2, 2 ) );
					$b = hexdec ( substr ( $hex, 4, 2 ) );
				endif;
			else:
				$spos = strpos($hex, '(');
				$epos = strripos($hex, ',');
				$spos += 1;
				$n = $epos - $spos;

				$c = substr($hex, $spos, $n);
				$c = explode(',', $c);

				$r = isset($c[0]) ? $c[0] : '';
				$g = isset($c[1]) ? $c[1] : '';
				$b = isset($c[2]) ? $c[2] : '';
			endif;

			$rgb = array($r, $g, $b);
			return $rgb;
		}

		public function primary_color_style( $color ) {
			$css = '';

			if( $color != '' ) {
				# Primary Color - Base
				$css .= 'a, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .breadcrumb a:hover { color:'.$color.'; }';

				# Primary Color - Widgets
				$css .= '.widget #wp-calendar td a:hover, .dt-sc-dark-bg .widget #wp-calendar td a:hover, .secondary-sidebar .widget ul li > a:hover, .dt-sc-practices-list li:before, .secondary-sidebar .type15 .widget.widget_recent_reviews ul li .reviewer, .secondary-sidebar .type15 .widget.widget_top_rated_products ul li .amount.amount,

				#main-menu .menu-item-widget-area-container .widget ul li > a:hover, #main-menu .dt-sc-dark-bg .menu-item-widget-area-container .widget ul li > a:hover, #main-menu .dt-sc-dark-bg .menu-item-widget-area-container .widget_recent_posts .entry-title h4 a:hover, #main-menu ul li.menu-item-simple-parent.dt-sc-dark-bg ul li a:hover, #main-menu .menu-item-widget-area-container .widget li:hover:before { color:'.$color.'; }';

				# Primary Color - New
				$css .= '.intro-section .elementor-column-wrap.elementor-element-populated:hover .elementor-widget-button a.elementor-button, #searchform:hover:before, .elementor-widget-jet-map .gm-style .gm-style-iw-d span, .contact-info a:hover, .elementor-widget-icon-list .elementor-icon-list-text:hover, .services-provided .elementor-column-wrap:hover .elementor-widget-heading.elementor-widget-heading h2.elementor-heading-title, .testi-words .jet-testimonials__content:hover .jet-testimonials__icon .jet-testimonials__icon-inner i, #footer .footer-social .elementor-social-icon:hover i, .dt-sc-simple-style.dt-sc-post-entry .blog-entry:hover .entry-button a.dt-sc-button span, .dtportfolio-sorting a:hover, .dtportfolio-sorting a.active-sort, .post-nav-container .post-next-link a:hover, .post-nav-container .post-prev-link a:hover, .post-nav-container .post-archive-link-wrapper a:hover, article.blog-single-entry.post-overlay > .entry-categories > a:hover { color:'.$color.'; }';

				# Primary Color fill - New
				$css .= '.testi-words .jet-testimonials .jet-testimonials__content:hover .jet-testimonials__icon svg{ fill:'.$color.'; }';

				# Primary Bg Color - New
				$css .= '.jet-carousel .jet-slick-dots li:hover span, .jet-carousel .jet-slick-dots li.slick-active span, .ico-hover-bg.elementor-widget-icon-box.elementor-view-stacked:hover .elementor-icon, .gradient-progress .jet-progress-bar__percent:before, .elementor-widget-icon-box.elementor-view-stacked.ico-type1.alter:hover .elementor-icon, .swiper-scrollbar .swiper-scrollbar-drag, #main .white .elementor-button:hover, .elementor-widget-image-box.ico-type1.alter:hover .elementor-image-box-img{ background-color:'.$color.'; }';

				# Primary Color - Footer
				$css .= '#footer .footer-copyright .menu-links li a:hover, #footer .footer-copyright .copyright-left a:hover, #footer .dt-sc-dark-bg .recent-posts-widget li .entry-meta a:hover, #footer .dt-sc-dark-bg .entry-title h4 a:hover, #footer .dt-sc-dark-bg a:hover, .left-header-footer .dt-sc-sociable.filled li a, .footer-widgets a:hover, #footer a:hover, .dt-sc-skin-color, .dt-sc-skin-color a, #footer .wpcf7-form.bottom-bordered input[type="submit"], #footer .wpcf7-form.bottom-bordered button, #footer .wpcf7-form.bottom-bordered input[type="button"], #footer .wpcf7-form.bottom-bordered input[type="reset"], #footer h1 strong, #footer h2 strong, #footer h3 strong, #footer h4 strong, #footer h5 strong, #footer h6 strong, #footer .dt-sc-dark-bg.map-with-overlay .map-overlay.wpb_column .dt-sc-tabs-horizontal-container ul.dt-sc-tabs-horizontal .scroll_tab_inner li > a:hover, #footer .dt-sc-dark-bg.map-with-overlay .map-overlay.wpb_column .dt-sc-tabs-horizontal-container ul.dt-sc-tabs-horizontal .scroll_tab_inner li > a.current, #footer .dt-sc-light-bg.map-with-overlay .map-overlay.wpb_column .dt-sc-tabs-horizontal-container ul.dt-sc-tabs-horizontal .scroll_tab_inner li > a:hover, #footer .dt-sc-light-bg.map-with-overlay .map-overlay.wpb_column .dt-sc-tabs-horizontal-container ul.dt-sc-tabs-horizontal .scroll_tab_inner li > a.current, .footer-20 .widget .recent-posts-widget li .entry-meta p, #footer .footer-21 .dt-sc-sociable.partially-rounded li > a:hover > i, #footer .footer-22 .dt-sc-newsletter-section.type6 .dt-sc-subscribe-frm input[type="submit"], #footer .footer-22 .dt-sc-newsletter-section.type6 .dt-sc-subscribe-frm input[type="email"], #footer .footer-22 .dt-sc-newsletter-section.type6 .dt-sc-subscribe-frm input[type="text"], #footer .footer-24 .widget.widget_recent_entries ul li .post-date, #footer .footer-25.dt-sc-skin-highlight input[type="submit"], #footer .footer-25.dt-sc-skin-highlight button, #footer .footer-25.dt-sc-skin-highlight input[type="button"], #footer .footer-25.dt-sc-skin-highlight input[type="reset"], #footer .footer-29 .dt-sc-button.fully-rounded-border, .footer-29 .dt-sc-contact-info.type1:hover span, .footer-30 .dt-sc-contact-info.type1 span, #footer .footer-30 .dt-mc-subscribe form .btn-wrap.icon-only i, .footer-34 .wpb_column:hover h3:before, #footer .footer-27 .dt-sc-contact-info.type1 a:hover, #footer .footer-28.footer-copyright.dt-sc-dark-bg a:hover { color:'.$color.'; }';

				# Primary Color - Blog
				$css .= '.dt-sc-post-entry .blog-entry a, .dt-sc-post-entry .blog-entry .entry-title h4 a:hover, .dt-sc-post-entry.entry-cover-layout .blog-entry .entry-title h4 a:hover, .dt-sc-post-entry.entry-cover-layout .blog-entry .entry-button a.dt-sc-button:hover, .dt-sc-post-entry.entry-cover-layout .blog-entry:after, .dt-sc-boxed-style.dt-sc-post-entry .blog-entry > div.entry-meta-group .div:not(.entry-social-share) i, .dt-sc-post-entry.entry-cover-layout .blog-entry .entry-format a:after, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry.type-post .entry-format a:hover, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry div.entry-tags a, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry > div.entry-date i, .dt-sc-post-entry.entry-cover-layout .blog-entry > div.entry-format a:hover, .dt-sc-simple-withbg-style.dt-sc-post-entry .blog-entry .entry-social-share .share > i, .dt-sc-simple-withbg-style.dt-sc-post-entry .blog-entry .entry-button a.dt-sc-button, .dt-sc-simple-withbg-style.dt-sc-post-entry .blog-entry .entry-format a, .dt-sc-trendy-style.dt-sc-post-entry.entry-cover-layout .blog-entry .entry-details a, .dt-sc-trendy-style.dt-sc-post-entry.entry-cover-layout .blog-entry > div a, .dt-sc-trendy-style.dt-sc-post-entry.entry-cover-layout .blog-entry > div.entry-button a:hover, .dt-sc-mobilephone-style.dt-sc-post-entry.entry-cover-layout:hover .blog-entry .entry-title h4 a:hover, .dt-sc-mobilephone-style.dt-sc-post-entry.entry-cover-layout:hover .blog-entry:before, .dt-sc-mobilephone-style.dt-sc-post-entry.entry-cover-layout .blog-entry.sticky:before, .dt-sc-alternate-style.dt-sc-post-entry:hover .blog-entry .entry-format a:before, .dt-sc-simple-withbg-style.dt-sc-post-entry .blog-entry .entry-title h4 span.sticky-post, .dt-sc-simple-withbg-style.dt-sc-post-entry .blog-entry .entry-title h4 span.sticky-post i, .dt-sc-classic-overlay-style.dt-sc-post-entry.entry-grid-layout .blog-entry > .entry-tags > a,    .dt-sc-classic-overlay-style.dt-sc-post-entry.entry-grid-layout .blog-entry.sticky .entry-thumb .entry-format a:before, .dt-sc-classic-overlay-style.dt-sc-post-entry .blog-entry .entry-thumb:first-child + .entry-meta-group > div > a:hover, .blog-single-entry.post-custom-minimal div[class*="metagroup-"] div[class*="entry-"] a:hover, .dt-sc-grungy-boxed-style.dt-sc-post-entry .blog-entry.has-post-thumbnail > div.entry-thumb + div.entry-comments a:hover, .dt-sc-grungy-boxed-style.dt-sc-post-entry .blog-entry.has-post-thumbnail > div.entry-thumb + div.entry-likes-views a:hover, .dt-sc-grungy-boxed-style.dt-sc-post-entry .blog-entry:not(.has-post-thumbnail) > div.entry-comments:first-child a:hover, .dt-sc-grungy-boxed-style.dt-sc-post-entry .blog-entry:not(.has-post-thumbnail) > div.entry-likes-views:first-child a:hover, .commentlist li.comment .reply a,.blog-single-entry .related-article .content > span, .blog-single-entry .related-article article .entry-summary h2, .blog-single-entry.post-overlay > .entry-thumb > .entry-format > a:hover,.blog-single-entry.post-overlay > .entry-author span:hover,.blog-single-entry.post-overlay > .entry-author span:hover a,.blog-single-entry.post-overlay > .entry-categories a, .blog-single-entry.post-overlay > .entry-title h1:hover a,.blog-single-entry.post-overlay > .entry-tags a:hover,.blog-single-entry.post-overlay > .entry-comments a:hover,.blog-single-entry.post-overlay > .entry-likes-views .dt-sc-like-views a:hover,.blog-single-entry.post-overlay > .entry-social-share .share .dt-share-list li a:hover,.blog-single-entry.post-overlay > .entry-author-bio .details h3 a:hover,.blog-single-entry.post-overlay > .entry-post-navigation .post-prev-link:hover p,.blog-single-entry.post-overlay > .entry-post-navigation .post-next-link:hover p,.blog-single-entry.post-overlay > .entry-post-navigation .post-prev-link:hover span,.blog-single-entry.post-overlay > .entry-post-navigation .post-next-link:hover span,.blog-single-entry.post-overlay > div.entry-meta-group .share .dt-share-list li a:hover,.blog-single-entry.post-overlay > div.entry-meta-group .entry-categories a:hover,.blog-single-entry.post-overlay > div.entry-meta-group .entry-author span:hover, .blog-single-entry.post-overlay > div.entry-meta-group .entry-author span:hover a,.blog-single-entry.post-overlap > .entry-thumb .entry-overlap .entry-bottom-details > * a:hover,.blog-single-entry.post-overlap > .entry-author-bio > .details h3 a:hover,.blog-single-entry.post-breadcrumb-fixed > .dt-post-sticky-wrapper h4 > span,.blog-single-entry.post-overlap > .commententries #respond h3#reply-title small a:hover,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-author-bio > .details h3 a:hover,.blog-single-entry.post-breadcrumb-parallax > .entry-tags a:hover, .blog-single-entry.post-breadcrumb-parallax > .entry-categories a:hover,.blog-single-entry.post-breadcrumb-parallax > .entry-comments a:hover,.blog-single-entry.post-breadcrumb-parallax > .entry-author a:hover,.blog-single-entry.post-breadcrumb-parallax > .entry-likes-views .dt-sc-like-views a:hover,.blog-single-entry.post-breadcrumb-parallax > .entry-social-share .share .dt-share-list li a:hover, .blog-single-entry.post-custom-classic div[class*="entry-format"] a:hover, .blog-single-entry.post-custom-classic div[class*="meta-elements-boxed"]:hover i, .blog-single-entry.post-custom-classic div[class*="meta-elements-boxed"] a:hover, .blog-single-entry[class*="post-custom-classic"] .entry-author-bio .details h3 span, .blog-single-entry[class*="post-custom-classic"] .entry-post-navigation > div > .nav-title-wrap h3 a:hover, div[class*="metagroup-"] div[class*="entry-"] a, div[class*="meta-elements"] a, .blog-single-entry.post-custom-classic div[class*="metagroup-"] div[class*="entry-"] a:hover, .blog-single-entry.post-overlay > .entry-meta-group .entry-tags a:hover { color:'.$color.'; }';

				# Primary Color - Portfolio
				$css .= '.portfolio .image-overlay .links a:hover, .portfolio.type7 .image-overlay .links a, .project-details li a:hover, .portfolio-categories a:hover, .dt-portfolio-single-slider-wrapper #bx-pager a.active:hover:before, .dt-portfolio-single-slider-wrapper #bx-pager a, .portfolio.type8 .image-overlay .links a { color:'.$color.'; }';

				# Primary Color - Miscellaneous/Shortcodes
				$css .= '.dt-skin-primary-color, ul.side-nav li a:hover, .available-domains li span, .dt-sc-popular-procedures .details .duration, .dt-sc-popular-procedures .details .price, .dt-sc-text-with-icon span, .dt-sc-contact-info.type3 span, .dt-sc-events-list .dt-sc-event-title h5 a, .woocommerce-MyAccount-navigation ul > li.is-active > a, .side-navigation.type5 ul.side-nav li.current_page_item a, .side-navigation.type5 ul.side-nav>li>a:hover, .carousel-arrows a:hover:before, .dt-sc-pr-tb-col.type5:hover .dt-sc-tb-header .dt-sc-tb-price h2 span, .dt-sc-pr-tb-col.type5:hover .dt-sc-tb-title h5, .dt-sc-pr-tb-col.type5.selected .dt-sc-tb-title h5, .dt-sc-pr-tb-col.type5.selected .dt-sc-tb-header .dt-sc-tb-price h2 span, .dt-sc-testimonial.type2 blockquote:after, .dt-sc-contact-info span, .dt-sc-contact-info.type2 span, ul.dt-sc-fancy-list.skin-color li:before, .dt-sc-sociables.hexagon-with-border li a:hover { color:'.$color.'; }';

				# Primary Color - Buttons
				$css .= '.dt-sc-button.fully-rounded-border, .dt-sc-button.rounded-border, .dt-sc-button.bordered, .dt-sc-button.with-shadow.white, .dt-sc-skin-highlight .dt-sc-button.rounded-border:hover, .dt-sc-skin-highlight .dt-sc-button.bordered:hover, .dt-sc-dark-bg.skin-color .dt-sc-button.fully-rounded-border:hover { color:'.$color.'; }';

				# Primary Color - Icon Boxes
				$css .= '.dt-sc-icon-box.type1 .icon-wrapper *, .dt-sc-icon-box.type2 .icon-wrapper *, .dt-sc-icon-box.type4 .icon-wrapper span, .dt-sc-icon-box.type5:hover .icon-content h4 a, .dt-sc-icon-box.type5.no-icon-bg .icon-wrapper span, .dt-sc-icon-box.type5.no-icon-bg:hover .icon-wrapper span, .dt-sc-icon-box.type10 .icon-wrapper span, .dt-sc-icon-box.type10:hover .icon-content h4, .dt-sc-icon-box.type14 .icon-content h4, .dt-sc-icon-box.type5.no-icon-bg .icon-content h5, .dt-sc-icon-box.type5.no-icon .icon-content h5, .dt-sc-icon-box.type12 .icon-wrapper span, .dt-sc-icon-box.type12 .icon-content h4 strong, .dt-sc-icon-box.type15 .icon-wrapper span, .dt-sc-icon-box.type16 .icon-content h4 { color:'.$color.'; }';

				# Primary Color - Testimonials
				$css .= '.dt-sc-testimonial.type4 .dt-sc-testimonial-author cite, .dt-sc-testimonial.type5 .dt-sc-testimonial-author cite, .dt-sc-testimonial.type8 .dt-sc-testimonial-quote blockquote q:before, .dt-sc-testimonial.type8 .dt-sc-testimonial-quote blockquote q:after, .dt-sc-testimonial-special-wrapper:after, .dt-sc-special-testimonial-images-holder .dt-sc-testimonial-image.slick-current .dt-sc-testimonial-author cite, .dt-sc-team-carousel-wrapper .dt-sc-team-details .dt-sc-team-social li a:hover, .dt-sc-special-testimonial-details-holder .dt-sc-testimonial-description:before, .dt-sc-testimonial.type7:hover .dt-sc-testimonial-author:before, .dt-sc-testimonial.type8:hover blockquote:before, .dt-sc-special-testimonial-container .dt-sc-testimonial.special-testimonial-carousel:after, .dt-sc-dark-bg-bullet.custom-testimonial:hover .elementor-widget-icon .elementor-icon i { color:'.$color.'; }';

				# Primary Color - Horizontal Tabs
				$css .= 'ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current, ul.dt-sc-tabs-horizontal .scroll_tab_inner li > a.current, ul.dt-sc-tabs-horizontal .scroll_tab_inner li > a:hover, ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a:hover, .type7 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current, .dt-sc-tabs-horizontal-frame-container.type6 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current, .dt-sc-tabs-horizontal-frame-container.type4 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current > span, .dt-sc-tabs-horizontal-frame-container.type4 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a:hover > span, .dt-sc-tabs-horizontal-frame-container.type6 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner li a:before { color:'.$color.'; }';

				# Primary Color - Vertical Tabs
				$css .= 'ul.dt-sc-tabs-vertical-frame > li > a:hover, ul.dt-sc-tabs-vertical-frame > li.current a, ul.dt-sc-tabs-vertical > li > a.current, .dt-sc-tabs-vertical-frame-container.type2 ul.dt-sc-tabs-vertical-frame > li > a.current:before, ul.dt-sc-tabs-vertical > li > a:hover, .dt-sc-tabs-vertical-frame-container.type4 ul.dt-sc-tabs-vertical-frame > li > a.current, .dt-sc-tabs-vertical-frame-container.type4 ul.dt-sc-tabs-vertical-frame > li > a:hover { color:'.$color.'; }';

				# Primary Color - Toggles
				$css .= '.dt-sc-toggle-frame-set > .dt-sc-toggle-accordion.active > a, .dt-sc-toggle-group-set .dt-sc-toggle.active > a, .dt-sc-toggle-frame h5.dt-sc-toggle-accordion.active a, .dt-sc-toggle-frame h5.dt-sc-toggle.active a, .dt-sc-toggle-panel h2 span { color:'.$color.'; }';

				# Primary Color - Headings/Titles
				$css .= '.dt-sc-title.with-sub-title .dt-sc-sub-heading, .dt-sc-title.script-with-sub-title .dt-sc-main-heading, .dt-sc-title.with-two-color-stripe .dt-sc-main-heading, #footer .footer-22 .dt-sc-title.script-with-sub-title h3, .side-navigation-content .dt-sc-title.script-with-sub-title strong, .dt-sc-title.with-dual-color .dt-sc-main-heading, .dt-sc-title.decorated .dt-sc-main-heading { color:'.$color.'; }';

				# Primary Color - Image Caption
				$css .= '.dt-sc-image-with-caption h3 a, .dt-sc-image-caption.type3 .dt-sc-image-content h3, .dt-sc-event-image-caption .dt-sc-image-content h3, .dt-sc-image-caption.type8:hover .dt-sc-image-content h3 a:hover, .dt-sc-image-caption.type3 .dt-sc-image-wrapper .icon-wrapper span, .dt-sc-image-caption.type4 .dt-sc-image-title h6, .dt-sc-image-caption.type6:hover .dt-sc-image-content .icon-wrapper span { color:'.$color.'; }';

				# Primary Color - Team
				$css .= '.dt-sc-team.rounded.team_rounded_border:hover .dt-sc-team-details h4, .dt-sc-team.type2 .dt-sc-team-social.rounded-border li a:hover,  .dt-sc-team.type2 .dt-sc-team-social.hexagon-border li a:hover, .dt-sc-team.type2 .dt-sc-team-social.diamond-square-border li a:hover, .dt-sc-team.rounded:hover .dt-sc-team-thumb:before { color:'.$color.'; }';
				# Primary Color - Timeline
				$css .= '.dt-sc-timeline .dt-sc-timeline-content h2 span, .dt-sc-hr-timeline-section.type2 .dt-sc-hr-timeline-content:hover h3, .dt-sc-timeline-section.type4 .dt-sc-timeline:hover .dt-sc-timeline-content h2, .dt-sc-timeline-description h5, .dt-sc-timeline-item.slick-current h4, .dt-sc-timeline-section.dt-sc-vc-special .dt-sc-timeline-image-wrapper .dt-sc-timeline-thumb-overlay h5, .dt-sc-timeline-section.dt-sc-vc-special .dt-sc-timeline .dt-sc-timeline-content span, .dt-sc-timeline-section.dt-sc-vc-special .dt-sc-timeline:hover .dt-sc-timeline-content h2, .dt-sc-timeline-section.type2 .dt-sc-timeline-icon-wrapper span { color:'.$color.'; }';

				# Primary Color - Sociables
				$css .= '.dt-sc-sociable.diamond-square-border li:hover a, .dt-sc-sociable.hexagon-border li:hover a, .dt-sc-sociable.hexagon-with-border li:hover a, .dt-sc-sociable.no-margin li a, .dt-sc-sociables.diamond-square-border li a:hover { color:'.$color.'; }';

				# Primary Color - Counters
				$css .= '.dt-sc-counter.type3.diamond-square h4, .dt-sc-counter.type6:hover h4, .dt-sc-counter.type1 .icon-wrapper span, .dt-sc-counter.type2 .dt-sc-counter-icon-holder, .dt-sc-counter.type2 .icon-wrapper span, .dt-sc-counter.type2 span:before, .dt-sc-counter.type3 .dt-sc-counter-number, .dt-sc-counter.type6 .dt-sc-counter-icon-holder .icon-wrapper span { color:'.$color.'; }';

				# Primary BG Color - Base
				$css .= '.page-template-default .blog-single-entry table thead, .post-template-default .blog-single-entry table thead, table:not(.shop_attributes) > tbody:first-child > tr > th, th, input[type="submit"], button, input[type="reset"], .loader { background-color:'.$color.'; }';

				# Primary BG Color - Header
				$css .= '.overlay .overlay-close, #header .header-25 .dt-sc-sociable li a, #header .header-27 .cart-info:before, #header .header-28 .cart-icon span { background-color:'.$color.'; }';
				# Primary BG Color - Footer
				$css .= '#footer .wpcf7-form.bottom-bordered input[type="submit"]:hover, #footer .wpcf7-form.bottom-bordered button:hover, #footer .wpcf7-form.bottom-bordered input[type="button"]:hover, #footer .wpcf7-form.bottom-bordered input[type="reset"]:hover, .footer-20 .footer-20-contact .vc_column-inner, #footer .footer-22 .dt-sc-newsletter-section.type6 .dt-sc-subscribe-frm input[type="submit"]:hover, #footer .footer-24 .widget.widget_recent_entries ul li:before, .footer-29 h3:before, .footer-28 .dt-sc-contact-info.type8:hover span { background-color:'.$color.'; }';

				# Primary BG Color - Widgets
				$css .= '.widget .dt-sc-newsletter-section.boxed .dt-sc-subscribe-frm input[type="submit"]:hover, .tagcloud a:hover, .widgettitle:before, .dt-sc-dark-bg .tagcloud a:hover, .dt-sc-dark-bg .widget.widget_categories ul li > a:hover span, #footer .dt-sc-dark-bg .widget.widget_categories ul li > a:hover span, #footer .dt-sc-dark-bg .widget.widget_archive ul li > a:hover span { background-color:'.$color.'; }';

				# Primary BG Color - Blog
				$css .= '.blog-entry .entry-title h4 span.sticky-post, .blog-entry .entry-social-share .share > i, .dt-sc-post-entry .blog-entry .entry-button a.dt-sc-button, .dt-sc-post-entry.entry-cover-layout .blog-entry .entry-social-share .share > i, .dt-sc-post-entry .blog-entry .entry-format a, .dt-sc-simple-style.dt-sc-post-entry .blog-entry .entry-format a:hover, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry div.entry-categories a, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry > div.entry-tags a:hover, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry > div.entry-author > a:hover, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry div.entry-comments > a:hover, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry div.entry-tags a:hover, .dt-sc-simple-withbg-style.dt-sc-post-entry .blog-entry, .dt-sc-simple-withbg-style.dt-sc-post-entry .blog-entry .entry-format a:hover, .dt-sc-simple-withbg-style.dt-sc-post-entry .blog-entry.sticky .entry-format a, .dt-sc-simple-withbg-style.dt-sc-post-entry.entry-grid-layout .blog-entry .entry-thumb .bx-wrapper, .dt-sc-mobilephone-style.dt-sc-post-entry.entry-cover-layout:hover .blog-entry div.entry-format a, .dt-sc-mobilephone-style.dt-sc-post-entry.entry-cover-layout .blog-entry.sticky div.entry-format a, .pagination .newer-posts a, .pagination .older-posts a, .pagination a.loadmore-btn, .dt-sc-alternate-style.dt-sc-post-entry:hover .entry-title h4 a:before, .dt-sc-alternate-style.dt-sc-post-entry .blog-entry .entry-format a:after, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry div.entry-author a:hover, .dt-sc-classic-overlay-style.dt-sc-post-entry .blog-entry > .entry-categories > a:hover, .dt-sc-overlap-style.dt-sc-post-entry .blog-entry .entry-format a:after, .dt-related-carousel div[class*="carousel-"] > div, .dt-related-carousel .carousel-pager > a.selected, .dt-related-carousel .carousel-pager > a:hover, .dt-sc-overlay-iii-style.dt-sc-post-entry.entry-list-layout .blog-entry > .entry-thumb:before, .dt-sc-modern-style.dt-sc-post-entry .blog-entry .entry-meta-group div.entry-tags a, .dt-sc-overlay-style.dt-sc-post-entry.entry-cover-layout .blog-entry .entry-details > .entry-tags, .dt-sc-minimal-style.dt-sc-post-entry.entry-grid-layout .blog-entry:after, .dt-sc-title-overlap-style.dt-sc-post-entry .blog-entry.sticky > div.entry-title:before, .dt-sc-title-overlap-style.dt-sc-post-entry .blog-entry:hover > div.entry-title:before, .post-edit-link:hover, .vc_inline-link:hover,ul.commentlist li .reply a:hover,.single-post-header-wrapper > .container .post-categories a, .blog-single-entry .related-article .arrow, .blog-single-entry.post-overlay > .entry-thumb > .entry-format > a,.blog-single-entry.post-overlay > .entry-thumb .share .dt-share-list li a:hover,.blog-single-entry.post-overlay:hover > .entry-title h1:before,.blog-single-entry.post-overlay > .entry-author span,.blog-single-entry.post-overlap > .entry-thumb > .entry-format > a,.blog-single-entry.post-overlap > .entry-comments a:hover i,.blog-single-entry.post-overlap > .entry-author > .author-wrap:hover i,.blog-single-entry.post-overlap > .entry-date > .date-wrap:hover i,.blog-single-entry.post-overlap > .entry-categories > .category-wrap:hover i,.blog-single-entry.post-overlap > .entry-likes-views .dt-sc-like-views > div:hover > i,.blog-single-entry.post-overlay > div.entry-meta-group .entry-author span,.blog-single-entry.post-overlap > div.entry-meta-group .entry-comments a:hover i,.blog-single-entry.post-overlap > div.entry-meta-group .entry-author > .author-wrap:hover i,.blog-single-entry.post-overlap > div.entry-meta-group .entry-date > .date-wrap:hover i,.blog-single-entry.post-overlap > div.entry-meta-group > .entry-categories > .category-wrap:hover i,.blog-single-entry.post-overlap > div.entry-meta-group .entry-likes-views .dt-sc-like-views > div:hover > i,.blog-single-entry.post-breadcrumb-fixed > .dt-post-sticky-wrapper .entry-social-share .share ul li:hover,.blog-single-entry.post-breadcrumb-fixed > .column .commententries #respond h3#reply-title small a:hover,.blog-single-entry.post-breadcrumb-fixed > .column > div.entry-meta-group .entry-comments a:hover i,.blog-single-entry.post-breadcrumb-fixed > .column > div.entry-meta-group .entry-author > .author-wrap:hover i,.blog-single-entry.post-breadcrumb-fixed > .column > div.entry-meta-group .entry-likes-views .dt-sc-like-views > div:hover > i,.blog-single-entry.post-breadcrumb-fixed > .column > div.entry-meta-group .entry-date .date-wrap:hover i,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-comments a:hover i,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-author > .author-wrap:hover i,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-likes-views .dt-sc-like-views > div:hover > i,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-date .date-wrap:hover i,.single-post-header-wrapper.dt-parallax-bg > .container .post-categories a:hover,.blog-single-entry.post-breadcrumb-parallax > .entry-thumb > .entry-format > a, .blog-single-entry.post-custom-classic div[class*="entry-format"] a, div[class*="metagroup-elements-filled"] div[class*="entry-"], div[class*="meta-elements-filled"], div[class*="metagroup-elements-boxed"] div[class*="entry-"]:hover, div[class*="metagroup-elements-filled"] div[class*="entry-social"]:hover .share > i, div[class*="meta-elements-boxed"]:hover, .blog-single-entry div[class*="meta-elements-filled"]:hover .share > i, .post-custom-modern div.nav-title-wrap > span, .page-link > span, .page-link > a:hover, div[class*="meta-elements"].entry-social-share .share:hover > i, .blog-single-entry .entry-format a, .dt-sc-boxed-style.dt-sc-post-entry .blog-entry > div.entry-meta-group .entry-likes-views .dt-sc-like-views > div.likes, .dt-sc-event-entry article div.dt-sc-event-meta .event-btns > a.event-zoom, .dt-sc-event-entry.event-overlay-layout article div.dt-sc-event-meta div.event-btns > a, .dt-sc-boxed-style.dt-sc-post-entry .blog-entry > div.entry-meta-group .entry-categories i { background-color:'.$color.'; }';

				# Primary BG Color - Portfolio
				$css .= '.dt-sc-portfolio-sorting a.active-sort, .dt-sc-portfolio-sorting a:hover, .dt-sc-portfolio-sorting a:hover:before, .dt-sc-portfolio-sorting a:hover:after, .dt-sc-portfolio-sorting a.active-sort:before, .dt-sc-portfolio-sorting a.active-sort:after, .portfolio.type2 .image-overlay-details, .portfolio.type2 .image-overlay .links a:hover, .dt-sc-portfolio-sorting.type2, .dt-sc-portfolio-sorting.type2:before, .portfolio.type6 .image-overlay .links a:hover, .portfolio.type7 .image-overlay-details .categories a:before, .portfolio.type7 .image-overlay .links a:hover:before { background-color:'.$color.'; }';

				# Primary BG Color - Miscellaneous/Shortcodes
				$css .= '.dt-skin-primary-bg, div[class*="dt-skin-primary-bg-opaque"]:not(.ult-vc-hide-row):before, div[class*="dt-skin-primary-bg-opaque"] .upb_row_bg:before, section[class*="dt-skin-primary-bg-opaque"]:before, ul.side-nav li a:hover:before, ul.side-nav > li.current_page_item > a:before, ul.side-nav > li > ul > li.current_page_item > a:before, ul.side-nav > li > ul > li > ul > li.current_page_item > a:before, .dt-sc-small-separator, .dt-sc-diamond-separator, .dt-sc-titled-box h6.dt-sc-titled-box-title, .diamond-narrow-square-border li:hover:before, .dt-sc-sociable.hexagon-with-border li, .dt-sc-skin-highlight, .dt-sc-skin-highlight.extend-bg-fullwidth-left:after, .dt-sc-skin-highlight.extend-bg-fullwidth-right:after, .dt-skin-primary-bg.extend-bg-fullwidth-left:after, .dt-skin-primary-bg.extend-bg-fullwidth-right:after, .two-color-section:before, .dt-sc-readmore-plus-icon:hover:before, .dt-sc-readmore-plus-icon:hover:after, .dt-sc-content-with-hexagon-shape, .dt-sc-hexagons li .dt-sc-hexagon-overlay, .available-domains li .tdl:before, .available-domains li:hover .dt-sc-button, .domain-search-container .domain-search-form, .dt-sc-newsletter-section.type1 h2:before, .dt-sc-newsletter-section.type1 h2:after, .dt-mc-subscribe.only-border-bottom form:before, blockquote.type4, .dt-sc-newsletter-section.type2 .dt-sc-subscribe-frm input[type="submit"], .dt-sc-sociables.rounded-square li a, .dt-sc-sociables.hexagon-with-border li { background-color:'.$color.'; }';

				# Primary BG Color - Buttons
				$css .= '.dt-sc-button.filled, .dt-sc-button:hover, .dt-sc-button.rounded-border:hover, .dt-sc-button.bordered:hover, .dt-sc-button.fully-rounded-border:hover, .dt-sc-colored-big-buttons:hover, .dt-sc-colored-big-buttons span { background-color:'.$color.'; }';

				# Primary BG Color - Contact Info
				$css .= '.dt-sc-contact-info.type3, .dt-sc-contact-info.type4 span:after, .dt-sc-contact-info.type4:before, .dt-sc-contact-info.type5 .dt-sc-contact-icon, .dt-sc-contact-info.type5:hover, .dt-sc-contact-info.type6, .dt-sc-contact-info.type7 span:after, .dt-sc-contact-info.type4:after, .university-contact-form .button-field i, .map-form-switcher .switcher-toggle, .dt-sc-map-form-holder.map-active .map-form-switcher .switcher-bg, .dt-sc-map-form-holder.map-active .map-form-switcher .switcher-toggle .icon, .dt-sc-contact-info.type8 span, .dt-sc-contact-info.type8:after, .dt-sc-contact-info.type8 h6:after, .dt-sc-contact-info.type7 span, .dt-sc-contact-info.type9:hover { background-color:'.$color.'; }';
				# Primary BG Color - Counters
				$css .= '.dt-sc-counter.type1 .icon-wrapper:before, .dt-sc-counter.type3.diamond-square .dt-sc-counter-icon-holder .icon-wrapper:before, .dt-sc-counter.type4:hover .dt-sc-counter-icon-holder, .dt-sc-counter.type5:hover:after, .dt-sc-counter.type6 h4:before, .dt-sc-counter.type6:hover .dt-sc-counter-icon-holder:before, .dt-sc-counter.type2:hover .icon-wrapper span.zmdi, .dt-sc-counter.type2:hover .icon-wrapper span.pe-icon, .dt-sc-counter.type2:hover .icon-wrapper span.icon, .dt-sc-counter.type2:hover .icon-wrapper span.fa, .dt-sc-counter.type2:hover .icon-wrapper span.fas, .dt-sc-counter.type2:hover h4:after, .dt-sc-counter.type2 h4:after, .dt-sc-counter.type3 .dt-sc-counter-number:after, .dt-sc-counter.type5 h4:after { background-color:'.$color.'; }';

				# Primary BG Color - Icon Boxes
				$css .= '.dt-sc-icon-box.type1 .icon-content h4:before, .dt-sc-icon-box.type3 .icon-wrapper span, .dt-sc-icon-box.type3.dt-sc-diamond:hover .icon-wrapper:after, .dt-sc-icon-box.type5.rounded-skin .icon-wrapper, .dt-sc-icon-box.type5.rounded:hover .icon-wrapper, .dt-sc-icon-box.type5.alter .icon-wrapper:before, .dt-sc-icon-box.type6 .icon-wrapper, .dt-sc-icon-box.type7 .icon-wrapper, .dt-sc-contact-info.type8:hover span, .dt-sc-icon-box.type10:hover .icon-wrapper:before, .dt-sc-icon-box.type10 .icon-content h4:before, .dt-sc-icon-box.type11:before, .dt-sc-icon-box.type14:hover, .dt-sc-icon-box.type12 .icon-content h5:after, .dt-sc-icon-box.type5 .icon-wrapper:before, .dt-sc-icon-box.type10 .icon-content h4:after, .dt-sc-icon-box.type15 .icon-wrapper h4:after { background-color:'.$color.'; }';

				# Primary BG Color - Testimonials
				$css .= '.dt-sc-testimonial-wrapper .dt-sc-testimonial-bullets a:hover, .dt-sc-testimonial-wrapper .dt-sc-testimonial-bullets a.active, .dt-sc-testimonial.type8:hover, .dt-sc-special-testimonial-container .dt-sc-testimonial.special-testimonial-carousel, .custom-testimonial:hover .elementor-widget-icon .elementor-icon { background-color:'.$color.'; }';

				# Primary BG Color - Headings/Titles
				$css .= '.dt-sc-title.with-before-after-shape .dt-sc-main-heading:before, .dt-sc-title.with-before-after-shape .dt-sc-main-heading:after, .dt-sc-title.with-vertical-solid-line .dt-sc-main-heading:before, .dt-sc-title.with-vertical-solid-line .dt-sc-main-heading:after, .mz-title .mz-title-content h2, .mz-title-content h3.widgettitle, .mz-title .mz-title-content:before, .mz-blog .comments a, .mz-blog div.vc_gitem-post-category-name, .mz-blog .ico-format, .side-navigation-content .dt-sc-wings-heading:after, .animated-twin-lines:after { background-color:'.$color.'; }';

				# Primary BG Color - Team
				$css .= '.dt-sc-team-social.hexagon-border li:hover, .dt-sc-team .dt-sc-team-social.diamond-square-border li:hover, .dt-sc-team.hide-social-role-show-on-hover .dt-sc-team-social.rounded-square li:hover a, .dt-sc-infinite-portfolio-load-more, .dt-sc-single-hexagon .dt-sc-single-hexagon-overlay, .dt-sc-team-social.rounded-border li a:hover, .dt-sc-team-social.rounded-square li a, .dt-sc-team.hide-social-show-on-hover:hover .dt-sc-team-details, .dt-sc-team-social.square-border li a:hover, .dt-sc-team.hide-social-role-show-on-hover.default .dt-sc-team-social li, .dt-sc-team.style2 .dt-sc-sociable li a, .dt-sc-team.style2 .dt-sc-team-details .view-details:hover, .dt-sc-team.type2:hover:after, .dt-sc-team.hide-social-role-show-on-hover .dt-sc-team-details h5:after, .dt-sc-team.hide-social-role-show-on-hover .dt-sc-team-thumb:before, .dt-sc-team.hide-social-role-show-on-hover:hover .dt-sc-team-thumb, .dt-sc-team.flip-details-on-hover .dt-sc-team-thumb .team-title { background-color:'.$color.'; }';

				# Primary BG Color - Pricing Tables
				$css .= '.dt-sc-pr-tb-col.minimal:hover .dt-sc-price, .dt-sc-pr-tb-col.minimal.selected .dt-sc-price, .dt-sc-pr-tb-col:hover .dt-sc-buy-now a, .dt-sc-pr-tb-col.selected .dt-sc-buy-now a, .dt-sc-pr-tb-col.minimal:hover .icon-wrapper:before, .dt-sc-pr-tb-col.minimal.selected .icon-wrapper:before, .dt-sc-pr-tb-col.type1:not(.classic):hover .dt-sc-tb-header, .dt-sc-pr-tb-col.type1.selected .dt-sc-tb-header, .dt-sc-pr-tb-col.type2 .dt-sc-tb-header .dt-sc-tb-title:before, .dt-sc-pr-tb-col.type2 .dt-sc-tb-content:before, .dt-sc-pr-tb-col.type2 .dt-sc-tb-content li .highlight, .dt-sc-pr-tb-col.type2:hover .dt-sc-price:before, .dt-sc-pr-tb-col.type2.selected .dt-sc-price:before, .dt-sc-pr-tb-col.type2:hover .dt-sc-buy-now a, .dt-sc-pr-tb-col.type2:hover .dt-sc-tb-header, .dt-sc-pr-tb-col.type2.selected .dt-sc-tb-header, .dt-sc-pr-tb-col:hover .dt-sc-pricing-buy-now a i.fa, .dt-sc-pr-tb-col:hover .dt-sc-pricing-buy-now a i.fa:after, .dt-sc-pr-tb-col.type3:hover .dt-sc-pricing-icon, .dt-sc-pr-tb-col.type3.selected .dt-sc-pricing-icon, .dt-sc-pr-tb-col.selected .dt-sc-pricing-buy-now a i.fa, .dt-sc-pr-tb-col.selected .dt-sc-pricing-buy-now a i.fa:after, .dt-sc-pr-tb-col .dt-sc-pricing-buy-now a, .dt-sc-pr-tb-col.type3.selected:before, .dt-sc-pr-tb-col.type3.selected:after, ul.dt-sc-pricing-table.type4 ul.dt-sc-pricing-table-type4-item.selected:before, .dt-sc-pr-tb-col ul.dt-sc-pricing-table-type4-item.selected .dt-sc-pricing-buy-now a i.fa, .dt-sc-pr-tb-col ul.dt-sc-pricing-table-type4-item.selected .dt-sc-pricing-buy-now a i.fa:after, .dt-sc-pr-tb-col.type5 .dt-sc-tb-price:after, .dt-sc-pr-tb-col.type5.selected, .dt-sc-pr-tb-col.type5:hover, .dt-sc-pr-tb-col.type1.classic:hover, .dt-sc-pr-tb-col.type1.classic.selected, .dt-sc-pr-tb-col.type5.selected:after, .dt-sc-pr-tb-col.type5:hover:after, .dt-sc-pr-tb-col.type5:hover:after, .dt-sc-pr-tb-col.type5.selected:after { background-color:'.$color.'; }';

				# Primary BG Color - HR Timeline
				$css .= '.dt-sc-hr-timeline-section.type1:before, .dt-sc-hr-timeline-section.type1 .dt-sc-hr-timeline .dt-sc-hr-timeline-content:after, .dt-sc-hr-timeline-section.type1 .dt-sc-hr-timeline-wrapper:before, .dt-sc-hr-timeline-section.type1 .dt-sc-hr-timeline-wrapper:after, .dt-sc-hr-timeline-section.type2 .dt-sc-hr-timeline-content h3:before, .dt-sc-hr-timeline-section.type2 .dt-sc-hr-timeline:hover .dt-sc-hr-timeline-thumb:after, .dt-sc-timeline-item.slick-current span { background-color:'.$color.'; }';

				# Primary BG Color - Vertical Timeline
				$css .= '.dt-sc-timeline-section.type3 .dt-sc-timeline .dt-sc-timeline-content h2:before, .dt-sc-timeline-section.type4 .dt-sc-timeline .dt-sc-timeline-content h2:before, .dt-sc-timeline-section.type4 .dt-sc-timeline:hover .dt-sc-timeline-thumb:before, .dt-sc-timeline-section.dt-sc-vc-special:before, .dt-sc-timeline-section.type2:before { background-color:'.$color.'; }';
				# Primary BG Color - Image Caption
				$css .= '.dt-sc-image-caption.type2:hover .dt-sc-image-title:before, .dt-sc-image-caption.type4:hover .dt-sc-button, .dt-sc-event-image-caption:hover, .dt-sc-image-caption.type7.dt-sc-rounded .dt-sc-image-content h3:after, .dt-sc-image-caption.type7.dt-sc-rounded .dt-sc-image-wrapper, .dt-sc-image-caption.type8 .dt-sc-image-wrapper .icon-wrapper:before, .dt-sc-image-caption.type4:hover .dt-sc-image-content:before, .dt-sc-image-caption.type5 .dt-sc-image-content:after, .dt-sc-image-caption.type9 .dt-sc-image-wrapper .icon-wrapper, .dt-sc-image-caption.type9:hover .dt-sc-image-content { background-color:'.$color.'; }';

				# Primary BG Color - Horizontal Tabs
				$css .= '.dt-sc-tabs-horizontal-frame-container.type5 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current, .dt-sc-tabs-horizontal-frame-container.type6 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a, .type8 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current, .type8 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a:hover, .dt-sc-tabs-horizontal-frame-container.type6 ul.dt-sc-tabs-horizontal-frame:after, .dt-sc-tabs-horizontal-frame-container.type6 ul.dt-sc-tabs-horizontal-frame:before, .scroll_tabs_container .scroll_tab_left_button, .scroll_tabs_container .scroll_tab_right_button, .scroll_tabs_container .scroll_tab_left_button, .scroll_tabs_container .scroll_tab_right_button { background-color:'.$color.'; }';

				# Primary BG Color - Vertical Tabs
				$css .= '.dt-sc-tabs-vertical-frame-container.type3 ul.dt-sc-tabs-vertical-frame > li > a:hover, .dt-sc-tabs-vertical-frame-container.type3 ul.dt-sc-tabs-vertical-frame > li > a.current, .dt-sc-tabs-vertical-frame-container.type4 ul.dt-sc-tabs-vertical-frame > li > a.current:before { background-color:'.$color.'; }';

				# Primary BG Color - Toggles
				$css .= '.dt-sc-toggle-frame h5.dt-sc-toggle-accordion.active a:before, h5.dt-sc-toggle-accordion.active a:before, .dt-sc-toggle-frame h5.dt-sc-toggle.active a:before, h5.dt-sc-toggle.active a:before, .type2 .dt-sc-toggle-frame h5.dt-sc-toggle-accordion.active, .type2 .dt-sc-toggle-frame h5.dt-sc-toggle.active, .dt-sc-toggle-frame-set.type2 > h5.dt-sc-toggle-accordion.active:after, .dt-sc-toggle-icon { background-color:'.$color.'; }';

				# Primary BG Color - Video Manager
				$css .= '.dt-sc-video-wrapper .video-overlay-inner a, .dt-sc-video-item:hover .dt-sc-vitem-detail, .dt-sc-video-item.active .dt-sc-vitem-detail, .type2 .dt-sc-video-item:hover, .type2 .dt-sc-video-item.active, .nicescroll-rails.dt-sc-skin { background-color:'.$color.'; }';

				# Primary BG Color - Add-ons/Custom Modules
				$css .= '.live-chat a, .dt-bmi-inner-content tbody th, .dt-bmi-inner-content tbody tr:nth-child(2n+1) th, .dt-sc-menu .menu-categories a:before, .hotel-search-container form input[type="submit"]:hover, .hotel-search-container .selection-box:after, .dt-sc-training-details-overlay, .custom-navigation .vc_images_carousel .vc_carousel-indicators li, .dt-sc-doctors.style1 .dt-sc-doctors-thumb-wrapper .dt-sc-button, .dt-sc-doctors-single .dt-sc-doctors.style1 .dt-sc-doctors-details ul.dt-sc-sociable li a, .dt-sc-procedure-item:hover, .dt-sc-fitness-procedure-sorting a, ul.dt-sc-vertical-nav > li.active > a, ul.time-table > li, ul.time-slots > li a:hover, .dt-sc-available-times ul.time-slots, #wpsl-search-btn, #wpsl-stores li > p span, #wpsl-stores li > p, #wpsl-stores li > p ~ .wpsl-directions, .dt-sc-toggle-advanced-options span, .slick-dots li.slick-active, .slick-dots li:hover { background-color:'.$color.'; }';

				# Primary Color - New
				$css .= '.dtportfolio-project-details li a:hover{ color:'.$color.'; }';

				# Primary BG Color - New
				$css .= '.woocommerce ul.products.default-shop li.product:hover .product-details, .event-meta-tab ul.dt-sc-tabs-horizontal-frame > li > a { background-color:'.$color.'; }';


				# Primary Border Color - Footer
				$css .= '#footer .wpcf7-form.bottom-bordered input[type="submit"]:hover, #footer .wpcf7-form.bottom-bordered button:hover, #footer .wpcf7-form.bottom-bordered input[type="button"]:hover, #footer .wpcf7-form.bottom-bordered input[type="reset"]:hover, #footer .footer-22 .dt-sc-newsletter-section.type6 .dt-sc-subscribe-frm input[type="submit"]:hover, .footer-26 .tagcloud a:hover { border-color:'.$color.'; }';

				# Primary Border Color - Widgets
				$css .= '.widget .dt-sc-newsletter-section.boxed, .widget .dt-sc-newsletter-section.boxed .dt-sc-subscribe-frm input[type="submit"], .tagcloud a:hover, .dt-sc-dark-bg .tagcloud a:hover, .secondary-sidebar .type3 .widgettitle, .secondary-sidebar .type6 .widgettitle, .secondary-sidebar .type13 .widgettitle:before, .secondary-sidebar .type14 .widgettitle, .secondary-sidebar .type16 .widgettitle { border-color:'.$color.'; }';

				# Primary Border Color - Blog
				$css .= '.blog-entry .entry-social-share .share, .dt-sc-post-entry.entry-cover-layout .blog-entry.sticky, .dt-sc-post-entry.entry-cover-layout .blog-entry .entry-social-share .share, .dt-sc-content-overlay-style.dt-sc-post-entry .blog-entry div.entry-tags a:hover, .dt-sc-classic-style.dt-sc-post-entry .blog-entry.sticky > div.entry-meta-group > div, .dt-sc-classic-overlay-style.dt-sc-post-entry .blog-entry > .entry-categories > a:hover, .dt-sc-overlay-style.dt-sc-post-entry.entry-list-layout .blog-entry .entry-thumb, .dt-sc-overlay-style.dt-sc-post-entry.entry-list-layout.entry-right-thumb .blog-entry .entry-thumb, .dt-sc-overlay-style.dt-sc-post-entry.entry-grid-layout .blog-entry > div.entry-thumb, .dt-sc-minimal-style.dt-sc-post-entry.entry-list-layout .blog-entry.sticky, .dt-sc-minimal-style.dt-sc-post-entry.entry-list-layout .blog-entry.sticky > div.entry-meta-group, .dt-sc-title-overlap-style.dt-sc-post-entry .blog-entry.sticky > div.entry-title:after, .dt-sc-title-overlap-style.dt-sc-post-entry .blog-entry:hover > div.entry-title:after, .blog-single-entry.post-overlay .author span,.commentlist li.comment .reply a,.blog-single-entry.post-overlap > .entry-comments a:hover,.blog-single-entry.post-overlap > .entry-author > .author-wrap:hover,.blog-single-entry.post-overlap > .entry-date > .date-wrap:hover,.blog-single-entry.post-overlap > .entry-categories > .category-wrap:hover,.blog-single-entry.post-overlap > .entry-likes-views .dt-sc-like-views > div:hover,.blog-single-entry.post-overlap > div.entry-meta-group .entry-comments a:hover,.blog-single-entry.post-overlap > div.entry-meta-group .entry-author > .author-wrap:hover,.blog-single-entry.post-overlap > div.entry-meta-group .entry-date > .date-wrap:hover,.blog-single-entry.post-overlap > div.entry-meta-group > .entry-categories > .category-wrap:hover,.blog-single-entry.post-overlap > div.entry-meta-group .entry-likes-views .dt-sc-like-views > div:hover,.blog-single-entry.post-breadcrumb-fixed,.blog-single-entry.post-breadcrumb-fixed > .column > div.entry-meta-group .entry-comments a:hover,.blog-single-entry.post-breadcrumb-fixed > .column > div.entry-meta-group .entry-author > .author-wrap:hover,.blog-single-entry.post-breadcrumb-fixed > .column > div.entry-meta-group .entry-likes-views .dt-sc-like-views > div:hover,.blog-single-entry.post-breadcrumb-fixed > .column > div.entry-meta-group .entry-date .date-wrap:hover,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-comments a:hover,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-author > .author-wrap:hover,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-likes-views .dt-sc-like-views > div:hover,.blog-single-entry.post-breadcrumb-fixed > .column > .entry-date .date-wrap:hover,.single-post-header-wrapper.dt-parallax-bg > .container .post-categories a:hover, div[class*="metagroup-elements-filled"] div[class*="entry-"], div[class*="meta-elements-filled"], div[class*="metagroup-elements-boxed"] div[class*="entry-"]:hover, div[class*="meta-elements-boxed"]:hover, .dt-related-carousel .carousel-pager > a { border-color:'.$color.'; }';

				# Primary Border Color - Portfolios
				$css .= '.dt-sc-portfolio-sorting a.active-sort, .dt-sc-portfolio-sorting a:hover, .portfolio.type7 .image-overlay .links a:before { border-color:'.$color.'; }';

				# Primary Border Color - Buttons
				$css .= '.dt-sc-colored-big-buttons, .dt-sc-button.fully-rounded-border, .dt-sc-button.fully-rounded-border:hover, .dt-sc-button.rounded-border.black:hover, .dt-sc-button.bordered.black:hover, .dt-sc-button.bordered:hover, .dt-sc-button.rounded-border:hover { border-color:'.$color.'; }';

				# Primary Border Color - Sociables
				$css .= '.dt-sc-sociable.rounded-border li a:hover, .dt-sc-dark-bg .dt-sc-sociable.rounded-border li a:hover, .dt-sc-dark-bg .dt-sc-sociable.square-border li a:hover, .dt-sc-sociable.diamond-square-border li:hover, .diamond-narrow-square-border li:before, .dt-sc-sociables.rounded-border li a:hover, .dt-sc-sociables.diamond-square-border li:hover, .dt-sc-sociables.square-border li a:hover { border-color:'.$color.'; }';

				# Primary Border Color - Team
				$css .= '.dt-sc-team.type2:hover, .dt-sc-team .dt-sc-team-social.diamond-square-border li:hover, .dt-sc-team-social.hexagon-border li:hover, .dt-sc-team-social.hexagon-border li:hover:before, .dt-sc-team-social.hexagon-border li:hover:after, .dt-sc-team-social.rounded-border li a:hover, .dt-sc-team-social.square-border li a:hover, .dt-sc-team.team_rounded_border.rounded:hover .dt-sc-team-thumb:before, .dt-sc-team.flip-details-on-hover .dt-sc-team-thumb { border-color:'.$color.'; }';

				# Primary Border Color - Testimonials
				$css .= '.dt-sc-testimonial.type5 .dt-sc-testimonial-quote, .dt-sc-testimonial-wrapper .dt-sc-testimonial-bullets a:hover, .dt-sc-testimonial-wrapper .dt-sc-testimonial-bullets a.active, .dt-sc-testimonial-wrapper .dt-sc-testimonial-bullets a.active:before, .dt-sc-testimonial-wrapper .dt-sc-testimonial-bullets a.active:hover:before, .dt-sc-testimonial.type5 .dt-sc-testimonial-author img, blockquote.type3:before, blockquote.type3:after, .dt-sc-testimonial.type7 .dt-sc-testimonial-quote blockquote cite, .dt-sc-testimonial.type7:hover .dt-sc-testimonial-author span, .dt-sc-testimonial.type7 .dt-sc-testimonial-quote blockquote cite:after, .dt-sc-testimonial-images li.selected div img, .dt-sc-special-testimonial-container .dt-sc-testimonial.special-testimonial-carousel:after, .dt-sc-testimonial-images li.selected div, .custom-testimonial:hover .elementor-widget-icon .elementor-icon { border-color:'.$color.'; }';

				# Primary Border Color - Tabs
				$css .= 'ul.dt-sc-tabs-horizontal .scroll_tab_inner li > a.current, ul.dt-sc-tabs-vertical > li > a.current,
				.dt-sc-tabs-vertical-frame-container.type3 ul.dt-sc-tabs-vertical-frame > li > a:hover, .dt-sc-tabs-vertical-frame-container.type3 ul.dt-sc-tabs-vertical-frame > li > a.current, .dt-sc-tabs-horizontal-frame-container.type6 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li:before, .dt-sc-tabs-vertical-frame-container.type4 ul.dt-sc-tabs-vertical-frame > li > a.current:before, .dt-sc-tabs-vertical-frame-container.type4 ul.dt-sc-tabs-vertical-frame > li > a.current:before { border-color:'.$color.'; }';

				# Primary Border Top Color - Tabs
				$css .= '.dt-sc-pr-tb-col.type5:hover:after, .dt-sc-pr-tb-col.type5.selected:after, .blog-single-entry.post-breadcrumb-fixed > .column > .entry-thumb > .entry-format a:after { border-top-color:'.$color.'; }';

				# Primary Border Color - Toggles
				$css .= '.type2 .dt-sc-toggle-frame h5.dt-sc-toggle-accordion.active, .type2 .dt-sc-toggle-frame h5.dt-sc-toggle.active { border-color:'.$color.'; }';

				# Primary Border Color - Timeline
				$css .= '.dt-sc-hr-timeline-section.type1 .dt-sc-hr-timeline .dt-sc-hr-timeline-content:before, .dt-sc-timeline-section.type2 .dt-sc-timeline-image-wrapper, .dt-sc-timeline-section.type2 .dt-sc-timeline .dt-sc-timeline-content:after, .dt-sc-timeline-section.type2:after { border-color:'.$color.'; }';

				# Primary Border Color - Counters
				$css .= '.dt-sc-counter.type3 .icon-wrapper:before, .dt-sc-counter.type3.diamond-square, .dt-sc-counter.type5:hover:before, .dt-sc-counter.type5:hover:after, .dt-sc-counter.type6, .dt-sc-counter.type6 .dt-sc-counter-icon-holder:before { border-color:'.$color.'; }';

				# Primary Border Color - Contact Info
				$css .= '.dt-sc-contact-info.type2:hover, .dt-sc-contact-info.type4, .last .dt-sc-contact-info.type4, .dt-sc-contact-info.type2 span, .dt-sc-contact-info.type7 { border-color:'.$color.'; }';

				# Primary Border Color - Icon Boxes
				$css .= '.dt-sc-icon-box.type5.no-icon .icon-content h4, .dt-sc-icon-box.type5.no-icon, .dt-sc-icon-box.type7:hover, .dt-sc-icon-box.type10, .dt-sc-icon-box.type10 .icon-wrapper:before, .dt-sc-icon-box.type3.dt-sc-diamond:hover .icon-wrapper:after, .dt-sc-icon-box.type11:before, .dt-sc-icon-box.type16 .icon-wrapper, .dt-sc-icon-box.type15 { border-color:'.$color.'; }';

				# Primary Border Color - Image Caption
				$css .= '.dt-sc-image-caption.type2 .dt-sc-image-title:before, .dt-sc-image-caption.type4, .dt-sc-image-caption.type4:hover .dt-sc-button, .dt-sc-icon-box.type10:hover .icon-wrapper:before, .dt-sc-image-caption.type5:hover img, .dt-sc-image-caption.type5:hover .dt-sc-image-wrapper:before { border-color:'.$color.'; }';

				# Primary Border Color - Miscellaneous/Shortcodes
				$css .= '.dt-skin-primary-border, .dt-sc-title.with-right-border-decor h2:before, .dt-sc-pr-tb-col.type2 .dt-sc-tb-header:before, .dt-sc-newsletter-section.type2 .dt-sc-subscribe-frm input[type="text"], .dt-sc-newsletter-section.type2 .dt-sc-subscribe-frm input[type="email"], .dt-sc-text-with-icon.border-bottom, .dt-sc-text-with-icon.border-right, .dt-sc-hexagons li:hover, .dt-sc-hexagons li:hover:before, .dt-sc-hexagons li:hover:after, .dt-sc-hexagons li, .dt-sc-hexagons li:before, .dt-sc-hexagons li .dt-sc-hexagon-overlay:before, .dt-sc-hexagons li:after, .dt-sc-hexagons li .dt-sc-hexagon-overlay:after, .dt-sc-single-hexagon, .dt-sc-single-hexagon:before, .dt-sc-single-hexagon .dt-sc-single-hexagon-overlay:before, .dt-sc-single-hexagon:after, .dt-sc-single-hexagon .dt-sc-single-hexagon-overlay:after, .dt-sc-single-hexagon:hover, .dt-sc-single-hexagon:hover:before, .dt-sc-single-hexagon:hover:after, .carousel-arrows a:hover, .vc_custom_carousel .slick-slider .slick-dots, .vc_custom_carousel .slick-slider:before, .dt-sc-team-navigation .dt-sc-team-pager-prev:before, .dt-sc-team-navigation .dt-sc-team-pager-next:before, ul.dt-sc-vertical-nav, ul.dt-sc-vertical-nav > li:first-child > a, .dt-sc-loading:before, .side-navigation.type2 ul.side-nav, .side-navigation.type2 ul.side-nav li, .side-navigation.type2 ul.side-nav li ul, .dt-sc-images-carousel li, .dt-sc-pr-tb-col.type2:hover, .dt-sc-pr-tb-col.type2.selected { border-color:'.$color.'; }';

				# Primary Border Top Color - Miscellaneous/Shortcodes
				$css .= '.dt-sc-triangle-wrapper:hover .dt-sc-triangle-content:before, .dt-sc-pr-tb-col.type2 .dt-sc-tb-content:after, .dt-sc-content-with-hexagon-shape:after, .type7 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current:before, .type7 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current:after, .dt-sc-doctors-filter .selection-box:before, .dt-sc-newsletter-section.type2 .input-content:hover:before, .dt-sc-newsletter-section.type2 .input-content:focus:before, .dt-sc-newsletter-section.type2 .input-content:hover:before, .dt-sc-newsletter-section.type2 .input-content:focus:before, .dt-sc-icon-box.type15:hover .icon-wrapper h4:before { border-top-color:'.$color.'; }';

				# Primary Border Bottom Color - Miscellaneous/Shortcodes
				$css .= '.dt-sc-up-arrow:before, .dt-sc-image-caption .dt-sc-image-wrapper .icon-wrapper:before, .dt-sc-triangle-wrapper.alter:hover .dt-sc-triangle-content:before, .dt-sc-content-with-hexagon-shape:before, .dt-sc-tabs-horizontal-frame-container.type3 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current, .dt-sc-tabs-horizontal-frame-container.type4 ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a.current, #footer .footer-22 .dt-sc-newsletter-section.type6, .dt-sc-tabs-horizontal-frame-container.type6 ul.dt-sc-tabs-horizontal-frame, .dt-sc-image-caption.type5 .dt-sc-image-content, .dt-sc-newsletter-section.type2 .input-content:hover:after, .dt-sc-newsletter-section.type2 .input-content:focus:after, .dt-sc-newsletter-section.type2 .input-content:hover:after, .dt-sc-newsletter-section.type2 .input-content:focus:after { border-bottom-color:'.$color.'; }';

				# Primary Border Left Color - Miscellaneous/Shortcodes
				$css .= '.type3 .dt-sc-toggle-frame .dt-sc-toggle-content, .dt-sc-tabs-vertical-frame-container.type3 ul.dt-sc-tabs-vertical-frame > li > a.current:before, .dt-sc-event-image-caption:hover .dt-sc-image-content:before, .side-navigation.type2 ul.side-nav > li.current_page_item > a:after, .side-navigation.type2 ul.side-nav > li > ul > li.current_page_item > a:after, .dt-sc-special-testimonial-images-holder.slick-slider button.slick-next:before, .dt-sc-newsletter-section.type2 .input-content:hover:after, .dt-sc-newsletter-section.type2 .input-content:focus:after, .dt-sc-newsletter-section.type2 .input-content:hover:after, .dt-sc-newsletter-section.type2 .input-content:focus:after { border-left-color:'.$color.'; }';

				# Primary Border Right Color - Miscellaneous/Shortcodes
				$css .= '.dt-sc-newsletter-section.type2 .input-content:hover:before, .dt-sc-newsletter-section.type2 .input-content:focus:before, .dt-sc-newsletter-section.type2 .input-content:hover:before, .dt-sc-newsletter-section.type2 .input-content:focus:before { border-right-color:'.$color.'; }';

				# Primary Border Right Color - Footer
				$css .= '#footer .footer-22.slope-bg.dt-sc-skin-highlight:before, #footer .footer-22 .dt-sc-newsletter-section.type6, .dt-sc-map-form-holder .map-form-switcher .switcher-toggle:before, .dt-sc-special-testimonial-images-holder.slick-slider button.slick-prev:before { border-right-color:'.$color.'; }';

				# Primary Border Color - Add-ons/Custom Modules
				$css .= '.dt-sc-attorney-sorting, .dt-sc-menu-sorting a.active-sort, .dt-sc-menu .image-overlay .price, .hotel-search-container form input[type="submit"] { border-color:'.$color.'; }';
				# Primary Border Color - Pricing Table
				$css .= '.dt-sc-pr-tb-col .dt-sc-pricing-buy-now a, .dt-sc-pr-tb-col.type3 .dt-sc-pr-tb-col-wrapper, .dt-sc-pr-tb-col.type3 ul.dt-sc-tb-content li, ul.dt-sc-pricing-table.type4, ul.dt-sc-pricing-table.type4 .dt-sc-tb-title, ul.dt-sc-pricing-table.type4 > li.dt-sc-pr-tb-col { border-color:'.$color.'; }';

				# Primary BG Color - 404/Not-Found
				$css .= '.error404 .type2 a.dt-sc-back, .error404 .type4 .error-box:before, .error404 .type4 .dt-sc-newsletter-section input[type="submit"], .error404 .type8 .dt-go-back { background-color:'.$color.'; }';

				# Primary Color - 404/Not-Found
				$css .= '.error404 .type2 h2, .error404 .type8 h2, .error404 .type8 .dt-go-back:hover i { color:'.$color.'; }';

				# Primary BG Color - Coming Soon
				$css .= '.under-construction.type4 .dt-sc-counter-wrapper, .under-construction.type1 .dt-sc-newsletter-section form input[type="submit"], .under-construction.type1 .dt-sc-counter-wrapper .counter-icon-wrapper:before, .under-construction.type2 .dt-sc-sociable > li:hover a, .under-construction.type7 .dt-sc-sociable > li:hover a, .under-construction.type3 .dt-sc-newsletter-section form input[type="submit"], .under-construction.type3 .dt-sc-sociable > li:hover a, .under-construction.type7 .dt-sc-counter-wrapper, .under-construction.type7 .dt-sc-newsletter-section form input[type="submit"] { background-color:'.$color.'; }';

				# Primary Border Color - Coming Soon
				$css .= '.under-construction.type3 .dt-sc-sociable > li:hover a { border-color:'.$color.'; }';

				# Primary Color - Coming Soon
				$css .= '.under-construction.type4 .wpb_wrapper > h2 span, .under-construction.type4 .read-more i, .under-construction.type4  .wpb_wrapper >  h4:after, .under-construction.type4 .wpb_wrapper > h4:before, .under-construction.type1 .read-more span.fa, .under-construction.type1 .read-more a:hover, .under-construction.type2 .counter-icon-wrapper .dt-sc-counter-number, .under-construction.type2 h2, .under-construction.type2 .dt-sc-counter-wrapper h3, .under-construction.type2 .mailchimp-newsletter h3,  .under-construction.type7 h2, .under-construction.type7 .mailchimp-newsletter h3, .under-construction.type3 p, .under-construction.type5 h2 span, .under-construction.type5 .dt-sc-counter-number, .under-construction.type5 footer .dt-sc-team-social li:hover a, .under-construction.type5 input[type="email"], .under-construction.type7 .aligncenter .wpb_text_column h2 { color:'.$color.'; }';

				# Primary BG Color - BuddyPress
				$css .= '#buddypress div.pagination .pagination-links span, #buddypress div.pagination .pagination-links a:hover, #buddypress #group-create-body #group-creation-previous, #item-header-content #item-meta > #item-buttons .group-button, #buddypress div#subnav.item-list-tabs ul li.feed a:hover, #buddypress div.activity-meta a:hover, #buddypress div.item-list-tabs ul li.selected a span, #buddypress .activity-list li.load-more a, #buddypress .activity-list li.load-newest a { background-color:'.$color.'; }';

				# Primary Border Color - BuddyPress
				$css .= '#buddypress div.pagination .pagination-links span, #buddypress div.pagination .pagination-links a:hover, #buddypress #members-dir-list ul li:hover { border-color:'.$color.'; }';
				# Primary Color - BuddyPress
				$css .= '#members-list.item-list.single-line li h5 span.small a.button, #buddypress div.item-list-tabs ul li.current a, #buddypress #group-create-tabs ul li.current a, #buddypress a.bp-primary-action:hover span, #buddypress div.item-list-tabs ul li.selected a,
				.widget.buddypress div.item-options a:hover, .widget.buddypress div.item-options a.selected, #footer .footer-widgets.dt-sc-dark-bg .widget.buddypress div.item-options a.selected, .widget.widget_bp_core_members_widget div.item .item-title a:hover, .widget.buddypress .bp-login-widget-user-links > div.bp-login-widget-user-link a:hover { color:'.$color.'; }';

				# Primary BG Color - BbPress
				$css .= '#bbpress-forums li.bbp-header, .bbp-submit-wrapper #bbp_topic_submit, .bbp-reply-form #bbp_reply_submit, .bbp-pagination-links a:hover, .bbp-pagination-links span.current, #bbpress-forums #subscription-toggle a.subscription-toggle { background-color:'.$color.'; }';

				# Primary Border Color - BbPress
				$css .= '.bbp-pagination-links a:hover, .bbp-pagination-links span.current { border-color:'.$color.'; }';

				# Primary Color - BbPress
				$css .= '.bbp-forums .bbp-body .bbp-forum-info::before { color:'.$color.'; }';

				# Primary BG Color - Events
				$css .= '#tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:hover, #tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option.tribe-bar-active a:hover, #tribe-bar-form .tribe-bar-submit input[type="submit"], #tribe-bar-views .tribe-bar-views-list li.tribe-bar-active a, .tribe-events-calendar thead th, #tribe-events-content .tribe-events-tooltip h4, .tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"], .tribe-events-read-more, #tribe-events .tribe-events-button, .tribe-events-button, .tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] > a, .tribe-events-back > a, #tribe_events_filters_toggle { background-color:'.$color.'; }';

				# Primary Border Color - Events
				$css .= '.tribe-events-list .tribe-events-event-cost span { border-color:'.$color.'; }';

				# Primary BG Color - Events Pro
				$css .= '.tribe-grid-header, .tribe-grid-allday .tribe-events-week-allday-single, .tribe-grid-body .tribe-events-week-hourly-single { background-color:'.$color.'; }';

				# Primary BG Color - Event Detail
				$css .= '.type1.tribe_events .event-image-wrapper .event-datetime > span, .type3.tribe_events .event-date, .event-meta-tab ul.dt-sc-tabs-horizontal-frame .scroll_tab_inner > li > a { background-color:'.$color.'; }';

				# Primary Color - Event Detail
				$css .= '.type1 .event-schedule, .type1.tribe_events .nav-top-links a:hover, .type1.tribe_events .event-image-wrapper .event-datetime > i, .type1.tribe_events .event-image-wrapper .event-venue > i, .type1.tribe_events h4 a, .type2.tribe_events .date-wrapper p span, .type2.tribe_events h4 a, .type3.tribe_events .right-calc a:hover, .type3.tribe_events .tribe-events-sub-nav li a:hover, .type3.tribe_events .tribe-events-sub-nav li a span, .type4.tribe_events .data-wrapper p span, .type4.tribe_events .data-wrapper p i, .type4.tribe_events .event-organize h4 a, .type4.tribe_events .event-venue h4 a, .type5.tribe_events .event-details h3, .type5.tribe_events .event-organize h3, .type5.tribe_events .event-venue h3, .type5.tribe_events .data-wrapper p span, .data-wrapper p i, .type5.tribe_events .event-organize h4 a, .type5.tribe_events .event-venue h4 a { color:'.$color.'; }';

				# Primary BG Color - Event Listing Shortcode
				$css .= '.dt-sc-event.type1 .dt-sc-event-thumb p, .dt-sc-event.type1 .dt-sc-event-meta:before, .dt-sc-event.type2:hover .dt-sc-event-meta, .dt-sc-event.type3 .dt-sc-event-date, .dt-sc-event.type3:hover .dt-sc-event-meta { background-color:'.$color.'; }';

				# Primary Border Bottom Color - Event Listing Shortcode
				$css .= '.dt-sc-event.type4 .dt-sc-event-date:after { border-bottom-color:'.$color.'; }';

				# Primary Color - Event Listing Shortcode
				$css .= '.dt-sc-event.type1 .dt-sc-event-meta p span, .dt-sc-event.type1:hover h2.entry-title a, .dt-sc-event.type3:hover h2.entry-title a, .dt-sc-event.type4 .dt-sc-event-date span { color:'.$color.'; }';

				# Primary BG Color - Event Widgets
				$css .= '.widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td,

				.widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-present, .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-has-events.tribe-mini-calendar-today, .tribe-mini-calendar .tribe-events-has-events.tribe-events-present a:hover, .widget.tribe_mini_calendar_widget .tribe-mini-calendar td.tribe-events-has-events.tribe-mini-calendar-today a:hover,

				.dt-sc-dark-bg .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-present, .dt-sc-dark-bg .widget.tribe_mini_calendar_widget .tribe-mini-calendar .tribe-events-has-events.tribe-mini-calendar-today, .dt-sc-dark-bg .tribe-mini-calendar .tribe-events-has-events.tribe-events-present a:hover, .dt-sc-dark-bg .widget.tribe_mini_calendar_widget .tribe-mini-calendar td.tribe-events-has-events.tribe-mini-calendar-today a:hover { background-color:'.$color.'; }';

				# Primary Border Color - Event Widgets
				$css .= '.widget.tribe_mini_calendar_widget .tribe-mini-calendar thead.tribe-mini-calendar-nav td { border-color:'.$color.'; }';

				# Primary Color - Event Widgets
				$css .= '.widget.tribe-events-countdown-widget .tribe-countdown-text a:hover { color:'.$color.'; }';

				# Primary BG Color - WooCommerce Defaults
				$css .= '.woocommerce ul.products li.product .product-buttons-wrapper.product-button .wc_inline_buttons .wc_btn_inline, .woocommerce ul.products li.product .product-buttons-wrapper.product-icons a, .woocommerce ul.products li.product .product-buttons-wrapper.product-icons button, .woocommerce ul.products li.product .product-buttons-wrapper.product-icons .button, .woocommerce ul.products li.product .product-buttons-wrapper.product-icons a.button,

				.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce .wishlist_table .add_to_cart.button, .woocommerce .yith-wcwl-popup-button a.add_to_wishlist, .woocommerce .wishlist_table a.ask-an-estimate-button, .woocommerce .wishlist-title a.show-title-form, .woocommerce .hidden-title-form a.hide-title-form, .woocommerce .yith-wcwl-wishlist-new button, .woocommerce .wishlist_manage_table a.create-new-wishlist, .woocommerce .wishlist_manage_table button.submit-wishlist-changes, .woocommerce .yith-wcwl-wishlist-search-form button.wishlist-search-button, .woocommerce .cart input.button, .woocommerce .shop_table th, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:after, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page button, .woocommerce-page input.button, .woocommerce-page input[type=button], .woocommerce-page input[type=submit], .woocommerce-page #respond input#submit,

				.woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page .wishlist_table .add_to_cart.button, .woocommerce-page .yith-wcwl-popup-button a.add_to_wishlist, .woocommerce-page .wishlist_table a.ask-an-estimate-button, .woocommerce-page .wishlist-title a.show-title-form, .woocommerce-page .hidden-title-form a.hide-title-form, .woocommerce-page .yith-wcwl-wishlist-new button, .woocommerce-page .wishlist_manage_table a.create-new-wishlist, .woocommerce-page .wishlist_manage_table button.submit-wishlist-changes, .woocommerce-page .yith-wcwl-wishlist-search-form button.wishlist-search-button, .woocommerce-page .cart input.button,

				.woocommerce-page .shop_table th, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a:after, .woocommerce ul.products li.product .featured-tag, .woocommerce ul.products li.product:hover .featured-tag, .woocommerce.single-product .featured-tag, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce ul.products li.product .dt-default .product-buttons-wrapper .wc_inline_buttons > .wc_btn_inline a:hover, .woocommerce .view-mode a:hover, .woocommerce .view-mode a.active, .swiper-button-prev, .swiper-button-next, .woocommerce ul.products li.product .dt-default .product-buttons-wrapper a.added_to_cart.wc-forward,


				.woocommerce .product .summary a.button:hover, .woocommerce .product .summary button.button:hover,
				.woocommerce .product .summary button:hover, .woocommerce .product .summary .button:hover,
				.woocommerce .product .summary .compare:hover, .woocommerce .product .summary .dt-wcsg-button:hover,
				.woocommerce .product .summary .yith-wcqv-button:hover, .woocommerce .product .summary .yith-wcwl-add-to-wishlist a:hover,

				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline a,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline a.button,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline button,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline button.button,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline .button.alt,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline .button.disabled,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline .button[disabled],
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline .button.alt.disabled,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-bgfill .wc_btn_inline .button.alt[disabled],

				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline a:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline a.button:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline button:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline button.button:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline .button.alt:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline .button.disabled:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline .button[disabled]:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline .button.alt.disabled:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline .button.alt[disabled]:hover,

				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.product-button.style-bgfill.hide-button-text .compare:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.product-button.style-bgfill.hide-button-text .yith-wcwl-add-to-wishlist a:hover,

				.woocommerce .product .dt-sc-product-summary .dt-sc-single-product-share-container.style-bgfill .dt-sc-single-product-share-list li a:hover,
				.woocommerce .product .dt-sc-product-summary .dt-sc-single-product-follow-container.style-bgfill .dt-sc-single-product-follow-list li a:hover,

				.dt-sc-single-product-share-container.style-bgfill .dt-sc-single-product-share-list li a:hover,
				.dt-sc-single-product-follow-container.style-bgfill .dt-sc-single-product-follow-list li a:hover,

				.dt-sc-single-product-share-container.style-skin-bgfill .dt-sc-single-product-share-list li a,
				.dt-sc-single-product-follow-container.style-skin-bgfill .dt-sc-single-product-follow-list li a,

				.woocommerce div.product .dt-sc-product-tabs .woocommerce-tabs ul.tabs li a:before, .woocommerce div.product .dt-sc-product-tabs .woocommerce-tabs ul.tabs li a:after,

				.woocommerce .product > .summary form.cart div.quantity ~ .single_add_to_cart_button:hover, .dt-sc-shop-single-sticky-addtocart-section a.added_to_cart.wc-forward, .woocommerce-page .woocommerce .dt-sc-cart-coupon-holder .coupon .button:hover, .woocommerce-page .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a:hover, .woocommerce-page .woocommerce .dt-sc-cart-button .button:hover, .woocommerce-account .woocommerce .woocommerce-MyAccount-content button:hover, .woocommerce form.login .button:hover, .woocommerce .wishlist_table td.product-add-to-cart a:hover, .woocommerce .cart-collaterals table.shop_table tr td .woocommerce-shipping-calculator button:hover, .woocommerce-checkout-header .woocommerce-checkout-header-coupon .checkout_coupon .form-row-last .button:hover, .woocommerce-checkout #payment div.form-row.place-order > #place_order:hover,

				.dt-sc-shop-menu-icon ul.cart_list li a.remove:hover,
				.dt-sc-product-pagination ul li a:hover, .dt-sc-product-pagination ul li span.current,
				.dt-sc-product-pagination .prev-post a:hover, .dt-sc-product-pagination .next-post a:hover,

				.woocommerce ul.products.dt-redart-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a:after,
				.woocommerce ul.products.dt-redart-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a.button:after,
				.woocommerce ul.products.dt-redart-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button:after,
				.woocommerce ul.products.dt-redart-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button.button:after,
				.woocommerce ul.products.dt-redart-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline .button:after,

				.woocommerce ul.products.dt-petworld-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a:hover,
				.woocommerce ul.products.dt-petworld-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a.button:hover,
				.woocommerce ul.products.dt-petworld-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button:hover,
				.woocommerce ul.products.dt-petworld-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button.button:hover,
				.woocommerce ul.products.dt-petworld-layout[class*="product-thumb-iconsgroup-style-skinbgfill"] li.product .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline .button:hover,

				.woocommerce ul.products.dt-spalab-layout[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a:hover:after,
				.woocommerce ul.products.dt-spalab-layout[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a.button:hover:after,
				.woocommerce ul.products.dt-spalab-layout[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button:hover:after,
				.woocommerce ul.products.dt-spalab-layout[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button.button:hover:after,
				.woocommerce ul.products.dt-spalab-layout[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline .button:hover:after,

				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a,
				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a.button,
				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button,
				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button.button,
				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline .button,

				.woocommerce ul.products.dt-petworld-layout li.product .product-price .price,

				.woocommerce ul.products.dt-breezewedding-layout li.product .product-thumb-content .product-element-group-wrapper .product-title h5 a,
				.woocommerce ul.products.dt-breezewedding-layout li.product .product-thumb-content .product-element-group-wrapper .product-price { background-color:'.$color.'; }';

				# Primary Border Color - WooCommerce Defaults
				$css .= '.woocommerce ul.products li.product .featured-tag:after, .woocommerce ul.products li.product:hover .featured-tag:after, .woocommerce.single-product .featured-tag:after,

				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-brdrfill .yith-wcwl-add-to-wishlist a:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.product-button.style-bgfill.hide-button-text .compare:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.product-button.style-bgfill.hide-button-text .yith-wcwl-add-to-wishlist a:hover,

				.woocommerce ul.products.product-hover-fade-skinborder li.product:hover .product-wrapper:before,
				.woocommerce ul.products.product-hover-thumb-fade-skinborder li.product:hover .product-thumb .image:before,
				.woocommerce ul.products.product-border-type-thumb.product-border-position-default[class*="product-bordershadow-highlight"] li.product .product-thumb,
				.woocommerce ul.products.product-border-type-default.product-border-position-default[class*="product-bordershadow-highlight"] li.product .product-wrapper,

				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a:after,
				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline a.button:after,
				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button:after,
				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline button.button:after,
				.woocommerce ul.products.dt-hifashion-layout li.product:hover .product-wrapper .product-details .product-buttons-wrapper.product-icons .wc_inline_buttons > .wc_btn_inline .button:after { border-color:'.$color.'; }';

				# Primary Color - WooCommerce Defaults
				$css .= '.woocommerce ul.products li.product .product-details div[class$="product-buttons-wrapper"] a, .woocommerce ul.products li.product .product-details div[class$="product-buttons-wrapper"] button, .woocommerce ul.products li.product .product-details div[class$="product-buttons-wrapper"] .button, .woocommerce-checkout #payment ul.payment_methods li a:hover,

				.woocommerce .woocommerce-breadcrumb a:hover, .dt-sc-single-product-nav .dt-sc-single-product-nav-btn a:hover span:before, .dt-sc-single-product-nav .dt-sc-single-product-nav-back-btn:hover span:before, .dt-sc-single-product-nav .dt-sc-single-product-nav-back-btn:hover span:after,


				.woocommerce .product .summary .product-button.style-simple .compare:hover,
				.woocommerce .product .summary .product-button.style-simple .dt-wcsg-button:hover,
				.woocommerce .product .summary .product-button.style-simple .yith-wcqv-button:hover,
				.woocommerce .product .summary .product-button.style-simple .yith-wcwl-add-to-wishlist a:hover,

				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline a:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline a.button:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline button:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline button.button,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline .button:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline .button.alt:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline .button.disabled:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline .button[disabled]:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline .button.alt.disabled:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper .wc_btn_inline .button.alt[disabled]:hover,

				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline a,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline a.button,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline button,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline button.button,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline .button,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline .button.alt,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline .button.disabled,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline .button[disabled],
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline .button.alt.disabled,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-skin-brdrfill .wc_btn_inline .button.alt[disabled],

				.dt-sc-single-product-share-list li a:hover, .dt-sc-single-product-follow-list li a:hover,
				.woocommerce .product .dt-sc-product-summary .dt-sc-single-product-share-container.style-simple .dt-sc-single-product-share-list li a:hover,
				.woocommerce .product .dt-sc-product-summary .dt-sc-single-product-follow-container.style-simple .dt-sc-single-product-follow-list li a:hover,

				.woocommerce .product .dt-sc-product-summary .dt-sc-single-product-share-container.style-brdrfill .dt-sc-single-product-share-list li a:hover,
				.woocommerce .product .dt-sc-product-summary .dt-sc-single-product-follow-container.style-brdrfill .dt-sc-single-product-follow-list li a:hover,

				.woocommerce .product .dt-sc-product-summary .dt-sc-single-product-share-container.style-skin-brdrfill .dt-sc-single-product-share-list li a,
				.woocommerce .product .dt-sc-product-summary .dt-sc-single-product-follow-container.style-skin-brdrfill .dt-sc-single-product-follow-list li a,

				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-brdrfill .yith-wcwl-add-to-wishlist a:hover,
				.woocommerce .product .dt-sc-product-summary .product-buttons-wrapper.style-bgfill .wc_btn_inline .variations_button .quantity a:hover,

				.woocommerce .cart .quantity > a[class*="arrow"]:hover, .woocommerce-page .cart .quantity > a[class*="arrow"]:hover, .woocommerce.single-product div.product .cart .quantity > a[class*="arrow"]:hover, .woocommerce table.cart td.product-name a:not(.button):hover, .woocommerce-page .woocommerce table.shop_table tbody td .quantity > a:hover, .woocommerce .quantity.quantity-with-plusminus input:not(.qty):hover, .woocommerce-page .quantity.quantity-with-plusminus input:not(.qty):hover,

				.woocommerce div.product .dt-sc-single-product-nav-intro-wrapper .product-nav-intro .product-nav-intro-description a.product-title:hover,
				.woocommerce .woocommerce-MyAccount-content a:hover, .woocommerce .product .summary form.cart .group_table td label a:hover, .woocommerce-page table.shop_table.cart .quantity > a:hover i,

				.woocommerce ul.products.product-thumb-iconsgroup-style-simple li.product .product-thumb .product-buttons-wrapper.product-icons a:hover,
				.woocommerce ul.products.product-thumb-iconsgroup-style-simple li.product .product-thumb .product-buttons-wrapper.product-icons a.button:hover,
				.woocommerce ul.products.product-thumb-iconsgroup-style-simple li.product .product-thumb .product-buttons-wrapper.product-icons button:hover,
				.woocommerce ul.products.product-thumb-iconsgroup-style-simple li.product .product-thumb .product-buttons-wrapper.product-icons button.button:hover,
				.woocommerce ul.products.product-thumb-iconsgroup-style-simple li.product .product-thumb .product-buttons-wrapper.product-icons .button:hover,

				.woocommerce ul.products.product-thumb-buttonelement-style-simple li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline:hover,
				.woocommerce ul.products.product-thumb-buttonelement-style-simple li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline a:hover,
				.woocommerce ul.products.product-thumb-buttonelement-style-simple li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline a.button:hover,
				.woocommerce ul.products.product-thumb-buttonelement-style-simple li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline button:hover,
				.woocommerce ul.products.product-thumb-buttonelement-style-simple li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline button.button:hover,
				.woocommerce ul.products.product-thumb-buttonelement-style-simple li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline .button:hover,

				.woocommerce ul.products.product-content-iconsgroup-style-simple li.product .product-details .product-buttons-wrapper.product-icons a:hover,
				.woocommerce ul.products.product-content-iconsgroup-style-simple li.product .product-details .product-buttons-wrapper.product-icons a.button:hover,
				.woocommerce ul.products.product-content-iconsgroup-style-simple li.product .product-details .product-buttons-wrapper.product-icons button:hover,
				.woocommerce ul.products.product-content-iconsgroup-style-simple li.product .product-details .product-buttons-wrapper.product-icons button.button:hover,
				.woocommerce ul.products.product-content-iconsgroup-style-simple li.product .product-details .product-buttons-wrapper.product-icons .button:hover,

				.woocommerce ul.products.product-content-buttonelement-style-simple li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline:hover,
				.woocommerce ul.products.product-content-buttonelement-style-simple li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline a:hover,
				.woocommerce ul.products.product-content-buttonelement-style-simple li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline a.button:hover,
				.woocommerce ul.products.product-content-buttonelement-style-simple li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline button:hover,
				.woocommerce ul.products.product-content-buttonelement-style-simple li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline button.button:hover,
				.woocommerce ul.products.product-content-buttonelement-style-simple li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline .button:hover,

				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons a:hover,
				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons a.button:hover,
				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons button:hover,
				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons button.button:hover,
				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons .button:hover,

				.woocommerce ul.products[class*="product-thumb-buttonelement-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline:hover,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline a:hover,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline a.button:hover,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline button:hover,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline button.button:hover,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-brdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline .button:hover,

				.woocommerce ul.products[class*="product-content-iconsgroup-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-icons a:hover,
				.woocommerce ul.products[class*="product-content-iconsgroup-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-icons a.button:hover,
				.woocommerce ul.products[class*="product-content-iconsgroup-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-icons button:hover,
				.woocommerce ul.products[class*="product-content-iconsgroup-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-icons button.button:hover,
				.woocommerce ul.products[class*="product-content-iconsgroup-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-icons .button:hover,

				.woocommerce ul.products[class*="product-content-buttonelement-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline:hover,
				.woocommerce ul.products[class*="product-content-buttonelement-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline a:hover,
				.woocommerce ul.products[class*="product-content-buttonelement-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline a.button:hover,
				.woocommerce ul.products[class*="product-content-buttonelement-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline button:hover,
				.woocommerce ul.products[class*="product-content-buttonelement-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline button.button:hover,
				.woocommerce ul.products[class*="product-content-buttonelement-style-brdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline .button:hover,

				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons a,
				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons a.button,
				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons button,
				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons button.button,
				.woocommerce ul.products[class*="product-thumb-iconsgroup-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-icons .button,

				.woocommerce ul.products[class*="product-thumb-buttonelement-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline a,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline a.button,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline button,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline button.button,
				.woocommerce ul.products[class*="product-thumb-buttonelement-style-skinbrdrfill"] li.product .product-thumb .product-buttons-wrapper.product-button .wc_btn_inline .button,

				.woocommerce ul.products[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons a,
				.woocommerce ul.products[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons a.button,
				.woocommerce ul.products[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons button,
				.woocommerce ul.products[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons button.button,
				.woocommerce ul.products[class*="product-content-iconsgroup-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-icons .button,

				.woocommerce ul.products[class*="product-content-buttonelement-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline,
				.woocommerce ul.products[class*="product-content-buttonelement-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline a,
				.woocommerce ul.products[class*="product-content-buttonelement-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline a.button,
				.woocommerce ul.products[class*="product-content-buttonelement-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline button,
				.woocommerce ul.products[class*="product-content-buttonelement-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline button.button,
				.woocommerce ul.products[class*="product-content-buttonelement-style-skinbrdrfill"] li.product .product-details .product-buttons-wrapper.product-button .wc_btn_inline .button,

				.woocommerce ul.products.dt-reebok-layout li.product .product-wrapper .product-details .product-title h5 a:not(:hover) { color:'.$color.'; }';

				# Primary Color - Cookie and Privacy Settings
				$css .= '.dt-inline-modal > h4 { background-color:'.$color.'; }';
			}

			#RGBA
			$rgba = $this->hex2rgb( $color );
			$rgba = implode(',', $rgba);

			$css .= '.dt-sc-testimonial-images li.selected div { box-shadow: 0 0 30px 0 rgba('.$rgba.', 0.20); }';

			return $css;
		}

		public function secondary_color_style( $color ) {
			$css = '';

			# Secondary Color - Miscellaneous/Shortcodes
			$css .= '.dt-skin-secondary-color, .dt-sc-title.with-dual-color .dt-sc-main-heading strong, .commententries ul.commentlist li .reply a.comment-reply-login:hover, .widget #wp-calendar td a, .widget ul li:before, .widget.widget_nav_menu ul.dt-primary-nav li > a:before, div.tribe-events-list-event-detail h2 a:hover, .tribe-events-list.tribe-events-photo #tribe-events-photo-events .tribe-events-event-details h2 a:hover, .custom-hover-icon-box .elementor-widget-icon-box:hover .elementor-icon-box-content .elementor-icon-box-description a, .custom-icon-box-with-gd.elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-description a, .dt-sc-boxed-style.dt-sc-post-entry .blog-entry .entry-button a.dt-sc-button.read-more:hover, .dt-sc-boxed-style.dt-sc-post-entry .blog-entry .entry-button a.dt-sc-button:hover, .dt-sc-event-entry article .dt-sc-event-title h2 a:hover, .recent-events-list-widget ul li .entry-title h4 a:hover { color:'.$color.'; }';

			# Secondary BG Color - Miscellaneous/Shortcodes
			$css .= '.dt-skin-secondary-bg, div[class*="dt-skin-secondary-bg-opaque"]:not(.ult-vc-hide-row):before, div[class*="dt-skin-secondary-bg-opaque"] .upb_row_bg:before, section[class*="dt-skin-secondary-bg-opaque"]:before, .dt-skin-secondary-bg.extend-bg-fullwidth-left:after, .dt-skin-secondary-bg.extend-bg-fullwidth-right:after, input[type="submit"]:hover, button:hover, input[type="reset"]:hover, .mz-blog .comments a:hover, .mz-blog div.vc_gitem-post-category-name:hover,  .dt-sc-infinite-portfolio-load-more:hover, .dt-sc-button.filled:hover, .dt-sc-button.with-icon.icon-right.type1:hover, .dt-sc-icon-box.type3:hover .icon-wrapper span, .dt-sc-newsletter-section.type2 .dt-sc-subscribe-frm input[type="submit"]:hover, .skin-highlight .dt-sc-testimonial.type6 .dt-sc-testimonial-author:before, .skin-highlight .dt-sc-testimonial.type6:after, .dt-sc-team-social.rounded-square li a:hover, .dt-sc-video-wrapper .video-overlay-inner a:hover, .side-navigation.type2 ul.side-nav li a:before, .side-navigation.type2 ul.side-nav > li.current_page_item > a:before, .side-navigation.type2 ul.side-nav > li > ul > li.current_page_item > a:before, .side-navigation.type2 ul.side-nav > li > ul > li > ul > li.current_page_item > a:before,  .dt-sc-icon-box.type5:hover .icon-wrapper:before, .dt-sc-image-caption.type2:hover, .dt-sc-team.hide-social-role-show-on-hover:hover .dt-sc-team-details h5:after, .animated-twin-lines:before, .dt-sc-pr-tb-col.type5 .dt-sc-tb-title:after, .dt-sc-pr-tb-col.type1.classic.selected .dt-sc-buy-now a, .dt-sc-pr-tb-col.type1.classic:hover .dt-sc-buy-now a, .dt-sc-contact-info.type4 h6:after, .dt-sc-contact-info.type8 span:after, .dt-sc-contact-info.type4:hover span:after, .slick-dots li, .dt-related-carousel .carousel-pager > a, .dt-related-carousel div[class*=carousel-] > div:hover, .dt-sc-sociables.rounded-square li a:hover, #wpsl-stores li > p ~ .wpsl-directions:hover, /* New */ .intro-section .elementor-column-wrap.elementor-element-populated .elementor-widget-button a.elementor-button:hover, .dt-sc-boxed-style.dt-sc-post-entry .blog-entry > div.entry-meta-group .entry-likes-views .dt-sc-like-views > div.views, .custom-contact-form.elementor-widget-contact-form-7 .wpcf7 input.wpcf7-submit:hover, .custom-hover-icon-box .elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-description a:after, .dt-sc-any-carousel-wrapper .swiper-pagination-bullet, .swiper-button-prev:hover, .swiper-button-next:hover, .custom-icon-box-with-gd.elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-description a:after, .dt-sc-event-entry article div.dt-sc-event-meta .event-btns > a.event-link, .dt-sc-event-entry.event-overlay-layout article div.dt-sc-event-meta div.event-btns > a:hover { background-color:'.$color.'; }';

			# Secondary BG Color - New
			$css .= '.dt-sc-simple-style.dt-sc-post-entry .blog-entry:hover .entry-button a.dt-sc-button:hover span, .responsive-map .gm-style .gm-style-iw-c, .responsive-map .poi-info-window div{ background-color:'.$color.'; }';

			# Secondary Border Top Color - New
			$css .= '.responsive-map .gm-style .gm-style-iw-t:after{ border-top-color:'.$color.'; }';

			# Secondary Border Color - Miscellaneous/Shortcodes
			$css .= '.dt-skin-secondary-border, .dt-sc-contact-info.type5 .dt-sc-contact-icon, .dt-sc-contact-info.type5 .dt-sc-contact-icon:before, .dt-sc-contact-info.type5 .dt-sc-contact-icon:after, .dt-sc-image-caption.type2:hover .dt-sc-image-title, .dt-sc-sociable.hexagon-with-border li, .dt-sc-sociable.hexagon-with-border li:before, .dt-sc-sociable.hexagon-with-border li:after, .side-navigation.type5 ul.side-nav, .side-navigation.type5 ul.side-nav li a, .side-navigation.type5 ul.side-nav li ul, .dt-sc-sociables.hexagon-with-border li, .dt-sc-sociables.hexagon-with-border li:before, .dt-sc-sociables.hexagon-with-border li:after, /* New */ .intro-section .elementor-column-wrap.elementor-element-populated:hover .elementor-widget-button a.elementor-button, .dt-sc-simple-style.dt-sc-post-entry .blog-entry:hover .entry-button a.dt-sc-button span,.active-centered .dt-sc-simple-style.dt-sc-post-entry.entry-grid-layout:nth-child(3) .blog-entry .entry-button a.dt-sc-button span, .fullwidth-icon-carousel .elementor-column-gap-extended>.elementor-row>.elementor-column>.elementor-element-populated .elementor-widget-button a.elementor-button:hover, .fullwidth-icon-carousel .elementor-column-gap-extended>.elementor-row>.elementor-column>.elementor-element-populated:hover .elementor-widget-button a.elementor-button, .dt-sc-any-carousel-wrapper .swiper-pagination-bullet { border-color:'.$color.'; }';
			# Secondary BG Color - 404/Not-Found
			$css .= '.error404 .type2 a.dt-sc-back:hover, .error404 .type4 .dt-sc-newsletter-section input[type="submit"]:hover { background-color:'.$color.'; }';

			# Secondary BG Color - BuddyPress
			$css .= '#item-header-content #item-meta > #item-buttons .group-button:hover, #buddypress .activity-list li.load-more a:hover, #buddypress .activity-list li.load-newest a:hover { background-color:'.$color.'; }';

			# Secondary BG Color - BbPress
			$css .= '#bbpress-forums #subscription-toggle a.subscription-toggle:hover, .bbp-submit-wrapper #bbp_topic_submit:hover { background-color:'.$color.'; }';

			# Secondary BG Color - Events
			$css .= '#tribe-bar-form .tribe-bar-submit input[type="submit"]:hover, .tribe-events-read-more:hover, #tribe-events .tribe-events-button:hover, .tribe-events-button:hover, .tribe-events-back > a:hover, .datepicker thead tr:first-child th:hover, .datepicker tfoot tr th:hover, #tribe_events_filters_toggle:hover, .tribe-events-grid .tribe-grid-header .tribe-week-today, .tribe-grid-body div[id*="tribe-events-event-"]:hover { background-color:'.$color.'; }';

			# Secondary BG Color - Events Pro
			$css .= '.tribe-grid-header .tribe-week-today { background-color:'.$color.'; }';

			# Secondary BG Color - WooCommerce Defaults
			$css .= '.woocommerce ul.products li.product .product-buttons-wrapper.product-icons .wc_inline_buttons .wc_btn_inline a:hover, .woocommerce ul.products li.product .product-buttons-wrapper.product-icons .wc_inline_buttons .wc_btn_inline button:hover,

				.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce button:hover, .woocommerce input.button:hover, .woocommerce input[type=button]:hover, .woocommerce input[type=submit]:hover, .woocommerce #respond input#submit:hover,

				.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce .wishlist_table .add_to_cart.button:hover, .woocommerce .yith-wcwl-popup-button a.add_to_wishlist:hover, .woocommerce .wishlist_table a.ask-an-estimate-button:hover, .woocommerce .wishlist-title a.show-title-form:hover, .woocommerce .hidden-title-form a.hide-title-form:hover, .woocommerce .yith-wcwl-wishlist-new button:hover, .woocommerce .wishlist_manage_table a.create-new-wishlist:hover, .woocommerce .wishlist_manage_table button.submit-wishlist-changes:hover, .woocommerce .yith-wcwl-wishlist-search-form button.wishlist-search-button:hover, .woocommerce .cart input.button:hover,

				.woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page button:hover, .woocommerce-page input.button:hover, .woocommerce-page input[type=button]:hover, .woocommerce-page input[type=submit]:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page .wishlist_table .add_to_cart.button:hover, .woocommerce-page .yith-wcwl-popup-button a.add_to_wishlist:hover, .woocommerce-page .wishlist_table a.ask-an-estimate-button:hover, .woocommerce-page .wishlist-title a.show-title-form:hover, .woocommerce-page .hidden-title-form a.hide-title-form:hover, .woocommerce-page .yith-wcwl-wishlist-new button:hover, .woocommerce-page .wishlist_manage_table a.create-new-wishlist:hover, .woocommerce-page .wishlist_manage_table button.submit-wishlist-changes:hover, .woocommerce-page .yith-wcwl-wishlist-search-form button.wishlist-search-button:hover, .woocommerce-page .cart input.button:hover,

				.woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover,

				.woocommerce a.button.alt.disabled, .woocommerce a.button.alt[disabled]:disabled, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt[disabled]:disabled, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt[disabled]:disabled, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt[disabled]:disabled,

				.woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt[disabled]:disabled:hover, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt[disabled]:disabled:hover, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt[disabled]:disabled:hover { background-color:'.$color.'; }';

			#RGBA
				$rgba = $this->hex2rgb( $color );
				$rgba = implode(',', $rgba);

				$css .= '.recent-events-list-widget ul li:hover .entry-thumb img { box-shadow: 0 0 20px 0 rgba('.$rgba.', 0.25); }';

			return $css;
		}

		public function tertiary_color_style( $color ) {
			$css = '';

			# Primary Color - Header
			$css .= '.dt-header-menu ul.dt-primary-nav li > a:hover, .dt-header-menu ul.dt-primary-nav li:hover > a, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav > li > a:hover,

			.dt-header-menu ul.dt-primary-nav li.current-menu-item > a, .dt-header-menu ul.dt-primary-nav li.current-page-item > a, .dt-header-menu ul.dt-primary-nav li.current-menu-ancestor > a, .dt-header-menu ul.dt-primary-nav li.current-page-ancestor > a,

			.dt-header-menu ul.dt-primary-nav li.current_menu_item > a, .dt-header-menu ul.dt-primary-nav li.current_page_item > a, .dt-header-menu ul.dt-primary-nav li.current_menu_ancestor > a, .dt-header-menu ul.dt-primary-nav li.current_page_ancestor > a,

			.elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li.current-menu-item > a, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li.current-page-item > a, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li.current-menu-ancestor > a, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li.current-page-ancestor > a,

			.elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li.current_menu_item > a, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li.current_page_item > a, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li.current_menu_ancestor > a, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li.current_page_ancestor > a,

			.mobile-menu ul.dt-primary-nav li > a:hover, .mobile-menu ul.dt-primary-nav li:hover > a, .mobile-menu ul.dt-primary-nav li ul.sub-menu li > a:hover, .mobile-menu ul.dt-primary-nav li ul.sub-menu li:hover > a,

			.mobile-menu ul.dt-primary-nav li.current-menu-item > a, .mobile-menu ul.dt-primary-nav li.current-page-item > a, .mobile-menu ul.dt-primary-nav li.current-menu-ancestor > a, .mobile-menu ul.dt-primary-nav li.current-page-ancestor > a,

			.mobile-menu ul.dt-primary-nav li.current_menu_item > a, .mobile-menu ul.dt-primary-nav li.current_page_item > a, .mobile-menu ul.dt-primary-nav li.current_menu_ancestor > a, .mobile-menu ul.dt-primary-nav li.current_page_ancestor > a,

			.mobile-menu ul.dt-primary-nav li ul.sub-menu li.current-menu-item > a, .mobile-menu ul.dt-primary-nav li ul.sub-menu li.current-page-item > a, .mobile-menu ul.dt-primary-nav li ul.sub-menu li.current-menu-ancestor > a, .mobile-menu ul.dt-primary-nav li ul.sub-menu li.current-page-ancestor > a,

			.mobile-menu ul.dt-primary-nav li ul.sub-menu li.current_menu_item > a, .mobile-menu ul.dt-primary-nav li ul.sub-menu li.current_page_item > a, .mobile-menu ul.dt-primary-nav li ul.sub-menu li.current_menu_ancestor > a, .mobile-menu ul.dt-primary-nav li ul.sub-menu li.current_page_ancestor > a,

			.mobile-menu ul.dt-primary-nav li ul.children li.current-menu-item > a, .mobile-menu ul.dt-primary-nav li ul.children li.current-page-item > a, .mobile-menu ul.dt-primary-nav li ul.children li.current-menu-ancestor > a, .mobile-menu ul.dt-primary-nav li ul.children li.current-page-ancestor > a,

			.mobile-menu ul.dt-primary-nav li ul.children li.current_menu_item > a, .mobile-menu ul.dt-primary-nav li ul.children li.current_page_item > a, .mobile-menu ul.dt-primary-nav li ul.children li.current_menu_ancestor > a, .mobile-menu ul.dt-primary-nav li ul.children li.current_page_ancestor > a,

			.menu-icons-wrapper .overlay-search #searchform:before, #header .header-25 .dt-sc-sociable:before, #header .header-25 .menu-icons-wrapper .search a, #header .header-25 .cart-info:before, #header .header-25  .dt-header-menu .dt-primary-nav > li:before, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li:hover > a, .no-header-menu ul li a, .dt-header-menu .dt-primary-nav li a, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li a { color:'.$color.'; }';

			# Tertiary Color - New
			$css .= '#header .elementor-widget-wp-widget-nav_menu .mobile-menu ul.dt-primary-nav li a:hover, #header .elementor-widget-wp-widget-nav_menu .mobile-menu ul.dt-primary-nav li ul.sub-menu > li a:hover, #header .elementor-widget-wp-widget-nav_menu .mobile-menu ul.dt-primary-nav li.current_page_item a, #header .elementor-widget-wp-widget-nav_menu .mobile-menu ul.dt-primary-nav li.current_page_item ul.sub-menu > li.current_page_item a { color:'.$color.'; }';

			# Tertiary Color - Miscellaneous/Shortcodes
			$css .= '.dt-skin-tertiary-color, .custom-hover-icon-box .elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-description a:hover { color:'.$color.'; }';

			# Tertiary Border Color - New
			$css .= '.no-header-menu ul > li > a:after, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li a:after, .pagination ul li span, .pagination ul li a:hover, .page-link > span, .page-link > a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .elementor-widget-wp-widget-nav_menu > .elementor-widget-container .dt-primary-nav li:hover > a:after { border-color:'.$color.'; }';

			# Tertiary BG Color - Miscellaneous/Shortcodes
			$css .= '.dt-skin-tertiary-bg, div[class*="dt-skin-tertiary-bg-opaque"]:not(.ult-vc-hide-row):before, div[class*="dt-skin-tertiary-bg-opaque"] .upb_row_bg:before, section[class*="dt-skin-tertiary-bg-opaque"]:before, .dt-skin-tertiary-bg.extend-bg-fullwidth-left:after, .dt-skin-tertiary-bg.extend-bg-fullwidth-right:after, .dt-sc-icon-box.type10 .icon-wrapper:after, .side-navigation.type1 ul.side-nav > li.current_page_item > a, .side-navigation.type1 ul.side-nav > li > ul > li.current_page_item > a, .side-navigation.type1 ul.side-nav > li > ul > li > ul > li.current_page_item > a,

			.dt-sc-shop-single-sticky-addtocart-section a.added_to_cart.wc-forward:hover, .pagination ul li span, .pagination ul li a:hover, .dt-header-menu .menu-container ul.dt-primary-nav li ul.sub-menu li a:after, .page-link > span, .page-link > a:hover, #header .elementor-widget-wp-widget-nav_menu .dt-primary-nav li ul.sub-menu li a:after,
			#header .elementor-widget-wp-widget-nav_menu .elementor-widget-container > div:not(.mobile-nav-container) .dt-primary-nav li ul.sub-menu li a:after, .custom-hover-icon-box .elementor-widget-icon-box .elementor-icon-box-content .elementor-icon-box-description a:hover:after, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current { background-color:'.$color.'; }';

			# Tertiary Border Color - Miscellaneous/Shortcodes
			$css .= '.dt-skin-tertiary-border { border-color:'.$color.'; }';

			return $css;
		}

	}
}

Pallikoodam_Dynamic_Skin_CSS::get_instance();