<?php
if ( ! class_exists( 'Gutenberg_Editor_CSS' ) ) :

	class Gutenberg_Editor_CSS {

		private static $instance;

		public $google_fonts     = array();
		public static $google_fonts_url;

		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}			

		function __construct() {

			add_action( 'admin_enqueue_scripts', array( $this, 'pallikoodam_backend_editor_fonts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'pallikoodam_backend_block_styles' ) );
			add_filter( 'tiny_mce_before_init', array( $this, 'pallikoodam_theme_editor_dynamic_styles' ) );
			add_action( 'current_screen', array( $this,  'pallikoodam_current_screen_hook' ) );			
		}

		function pallikoodam_backend_editor_fonts( $hook ) {

			if( $hook == 'post-new.php' || $hook == 'post.php' ) {

				$this->backend_font_options();
				$this->enqueue_google_fonts();				
			}		
		}

		function pallikoodam_backend_block_styles() {
			$css = '';

			# Body
				$body_typo =  pallikoodam_get_option( 'body-typo' );
				$body_css  =  $this->font_family_callback( $body_typo );
				if( !empty( $body_css ) ) {
					$css .= ".editor-block-list__block, .editor-styles-wrapper .editor-rich-text p[role='textbox'], .wp-block-code {".$body_css.'}'."\n";
				}

				$body_bg_color = pallikoodam_get_option( 'body-bg-color' );
				if( !empty( $body_bg_color ) ) {
					$css .= 'body.block-editor-page {background-color:'.$body_bg_color.'!important;}'."\n";
				}

				$body_content_color = pallikoodam_get_option( 'body-content-color' );
				if( !empty( $body_content_color ) ) {
					$css .= 'body.block-editor-page, .editor-styles-wrapper, .wp-block-preformatted pre, .editor-styles-wrapper pre, pre, body:not(.block-editor-page) .editor-styles-wrapper p {color:'.$body_content_color.'!important;}'."\n";	
				}

				$body_content_a_color = pallikoodam_get_option( 'body-content-link-color' );
				if( !empty( $body_content_a_color ) ) {
					$css .= '.editor-styles-wrapper a {color:'.$body_content_a_color.'!important;}'."\n";
				}

				$body_content_a_hover_color = pallikoodam_get_option( 'body-content-link-hover-color' );
				if( !empty( $body_content_a_hover_color ) ) {
					$css .= '.editor-styles-wrapper a:hover {color:'.$body_content_a_hover_color.'!important;}'."\n";					
				}

			# Heading Tags
				for( $i = 1; $i <= 6; $i++ ) {

					$typo  =  pallikoodam_get_option( "h{$i}-typo" );
					$color = pallikoodam_get_option( "h{$i}-color" );

					$heading_tag_css = $this->font_family_callback( $typo );
					$heading_tag_css .= !empty( $color ) ? 'color:'.$color.';' : '';

					if($i == 1) {
						$css .= ".wp-block-heading H1, .editor-styles-wrapper .editor-post-title__block .editor-post-title__input {". $heading_tag_css .'}'."\n";

					} else {
						$css .= ".wp-block-heading H{$i} {". $heading_tag_css .'}'."\n";
					}
				}

			# Custom Font
				$css .= $this->enqueue_custom_fonts();

			wp_enqueue_style( 'pallikoodam-gutenberg', get_theme_file_uri('/css/gutenberg.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );			

			if( !empty( $css ) ) {
				wp_add_inline_style( 'pallikoodam-gutenberg', $css );
			}
		}

		function pallikoodam_backend_tiny_mce_styles() {
			$css = '';

			# Body
				$body_typo =  pallikoodam_get_option( 'body-typo' );
				$body_css  =  $this->font_family_callback( $body_typo );
				if( !empty( $body_css ) ) {
					$css .= "body, pre {".$body_css.'}';
				}

				$body_bg_color = pallikoodam_get_option( 'body-bg-color' );
				if( !empty( $body_bg_color ) ) {
					$css .= 'body {background-color:'.$body_bg_color.'!important;}';
				}

				$body_content_color = pallikoodam_get_option( 'body-content-color' );
				if( !empty( $body_content_color ) ) {
					$css .= 'body {color:'.$body_content_color.'!important;}';					
				}

				$body_content_a_color = pallikoodam_get_option( 'body-content-link-color' );
				if( !empty( $body_content_a_color ) ) {
					$css .= 'body a{color:'.$body_content_a_color.'!important;}';
				}

				$body_content_a_hover_color = pallikoodam_get_option( 'body-content-link-hover-color' );
				if( !empty( $body_content_a_hover_color ) ) {
					$css .= 'body a:hover{color:'.$body_content_a_hover_color.'!important;}';					
				}

			# Heading Tags
				for( $i = 1; $i <= 6; $i++ ) {
					$typo  =  pallikoodam_get_option( "h{$i}-typo" );
					$color = pallikoodam_get_option( "h{$i}-color" );

					$heading_tag_css = $this->font_family_callback( $typo );
					$heading_tag_css .= !empty( $color ) ? 'color:'.$color.';' : '';
					$css .= ".editor-styles-wrapper .block-editor H{$i} {". $heading_tag_css .'}';
				}

			return $css;
		}


		function pallikoodam_theme_editor_dynamic_styles( $mceInit ) {

			$css = $this->enqueue_custom_fonts();
			$css .= $this->pallikoodam_backend_tiny_mce_styles();

			if( !empty( $css ) ) {
				if ( isset( $mceInit['content_style'] ) ) {
					$mceInit['content_style'] .= ' ' . $css . ' ';
				} else {
					$mceInit['content_style'] = $css . ' ';
				}				
			}

			return $mceInit;
		}

		function pallikoodam_current_screen_hook( $current_screen ) {

			if ( 'post' == $current_screen->base ) {

				$this->backend_font_options();
				$urls = $this->google_fonts_url();

				add_editor_style( $urls );

				$custom_fonts = $this->enqueue_custom_fonts();
				if(!empty($custom_font)) {
					add_editor_style( $custom_fonts );
				}

				add_editor_style( 'css/editor-style.css' );				
			}
		}

		function backend_font_options() {
			# Body
				$body_typo =  pallikoodam_get_option( 'body-typo' );

				# Loading Google Font
				if( isset( $body_typo['font-type'] ) && $body_typo['font-type'] == 'google' ) {
					$weight = isset( $body_typo['font-weight'] ) ? ':'. $body_typo['font-weight'] : '';
					$this->google_fonts[] = $body_typo['font-family'] . $weight;
				}

			# H1
				$h1_typo =  pallikoodam_get_option( 'h1-typo' );

				# Loading Google Font
				if( isset( $h1_typo['font-type'] ) && $h1_typo['font-type'] == 'google' ) {
					$weight = isset( $h1_typo['font-weight'] ) ? ':'. $h1_typo['font-weight'] : '';
					$this->google_fonts[] = $h1_typo['font-family'] . $weight;
				}

			# H2
				$h2_typo =  pallikoodam_get_option( 'h2-typo' );
				
				# Loading Google Font
				if( isset( $h2_typo['font-type'] ) && $h2_typo['font-type'] == 'google' ) {
					$weight = isset( $h2_typo['font-weight'] ) ? ':'. $h2_typo['font-weight'] : '';
					$this->google_fonts[] = $h2_typo['font-family'] . $weight;
				}

			# H3
				$h3_typo =  pallikoodam_get_option( 'h3-typo' );
				
				# Loading Google Font
				if( isset( $h3_typo['font-type'] ) && $h3_typo['font-type'] == 'google' ) {
					$weight = isset( $h3_typo['font-weight'] ) ? ':'. $h3_typo['font-weight'] : '';
					$this->google_fonts[] = $h3_typo['font-family'] . $weight;
				}

			# H4
				$h4_typo =  pallikoodam_get_option( 'h4-typo' );
				
				# Loading Google Font
				if( isset( $h4_typo['font-type'] ) && $h4_typo['font-type'] == 'google' ) {
					$weight = isset( $h4_typo['font-weight'] ) ? ':'. $h4_typo['font-weight'] : '';
					$this->google_fonts[] = $h4_typo['font-family'] . $weight;
				}

			# H5
				$h5_typo =  pallikoodam_get_option( 'h5-typo' );
				
				# Loading Google Font
				if( isset( $h5_typo['font-type'] ) && $h5_typo['font-type'] == 'google' ) {
					$weight = isset( $h5_typo['font-weight'] ) ? ':'. $h5_typo['font-weight'] : '';
					$this->google_fonts[] = $h5_typo['font-family'] . $weight;
				}

			# H6
				$h6_typo =  pallikoodam_get_option( 'h6-typo' );
				
				# Loading Google Font
				if( isset( $h6_typo['font-type'] ) && $h6_typo['font-type'] == 'google' ) {
					$weight = isset( $h6_typo['font-weight'] ) ? ':'. $h6_typo['font-weight'] : '';
					$this->google_fonts[] = $h6_typo['font-family'] . $weight;
				}			
		}

		function enqueue_google_fonts() {
			$subset = apply_filters( 'dt_theme_google_font_supsets', 'latin-ext' );
			$fonts = array_filter( $this->google_fonts );

			foreach( $fonts as $font ) {

				$font = str_replace( ' ', '+', $font );
				$font = explode( ":", $font );
				
				$url = '//fonts.googleapis.com/css?family=' . $font[0].':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';
				$url .= !empty( $subset ) ? '&subset=' . $subset : '';

				$key = md5( $font[0] . $subset );				

				// check that the URL is valid. we're going to use transients to make this faster.
				$url_is_valid = get_transient( $key );

				// transient does not exist				
				if ( false === $url_is_valid ) { 
					$response = wp_remote_get( 'https:' . $url );
					if ( ! is_array( $response ) ) {
						// the url was not properly formatted,
						// cache for 12 hours and continue to the next field
						set_transient( $key, null, 12 * HOUR_IN_SECONDS );
						continue;
					}

					// check the response headers.
					if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
						if ( 200 == $response['response']['code'] ) {
							// URL was ok
							// set transient to true and cache for a week
							set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
							$url_is_valid = true;
						}
					}
				}

				// If the font-link is valid, enqueue it.
				if ( $url_is_valid ) {
					wp_enqueue_style( $key, $url, null, null );
				}
			}
		}

		function google_fonts_url() {
			$subset = apply_filters( 'dt_theme_google_font_supsets', 'latin-ext' );
			$fonts  = array_filter( $this->google_fonts );
			$urls   = array();

			foreach( $fonts as $font ) {

				$font = str_replace( ' ', '+', $font );
				$font = explode( ":", $font );
				
				$url = '//fonts.googleapis.com/css?family=' . $font[0].':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';
				$url .= !empty( $subset ) ? '&subset=' . $subset : '';

				$key = md5( $font[0] . $subset );				

				// check that the URL is valid. we're going to use transients to make this faster.
				$url_is_valid = get_transient( $key );

				// transient does not exist				
				if ( false === $url_is_valid ) { 
					$response = wp_remote_get( 'https:' . $url );
					if ( ! is_array( $response ) ) {
						// the url was not properly formatted,
						// cache for 12 hours and continue to the next field
						set_transient( $key, null, 12 * HOUR_IN_SECONDS );
						continue;
					}

					// check the response headers.
					if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
						if ( 200 == $response['response']['code'] ) {
							// URL was ok
							// set transient to true and cache for a week
							set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
							$url_is_valid = true;
						}
					}
				}

				// If the font-link is valid, enqueue it.
				if ( $url_is_valid ) {
					$urls[] = $url;
				}
			}

			return array_unique( $urls );
		}

		function font_family_callback( $option ) {
			$css = '';

			if( isset( $option['font-fallback'] ) && !empty( $option['font-fallback'] ) ) {
				$css .= 'font-family:'.$option['font-fallback'].';';
			}

			if( isset( $option['font-weight'] ) && !empty( $option['font-weight'] ) ) {
				$css .= 'font-weight:'.$option['font-weight'].';';
			}

			if( isset( $option['font-style'] ) && !empty( $option['font-style'] ) ) {
				$css .= 'font-style:'.$option['font-style'].';';
			}

			if( isset( $option['text-transform'] ) && !empty( $option['text-transform'] ) ) {
				$css .= 'text-transform:'.$option['text-transform'].';';
			}

			if( isset( $option['text-align'] ) && !empty( $option['text-align'] ) ) {
				$css .= 'text-align:'.$option['text-align'].';';
			}

			if( isset( $option['text-decoration'] ) && !empty( $option['text-decoration'] ) ) {
				$css .= 'text-decoration:'.$option['text-decoration'].';';
			}

			if( isset( $option['fs-desktop'] ) && !empty( $option['fs-desktop'] ) ) {
				$css .= 'font-size:'.$option['fs-desktop'].$option['fs-desktop-unit'].';';
			}

			if( isset( $option['lh-desktop'] ) && !empty( $option['lh-desktop'] ) ) {
				$css .= 'line-height:'.$option['lh-desktop'].'px;';
			}

			if( isset( $option['ls-desktop'] ) && !empty( $option['ls-desktop'] ) ) {
				$css .= 'letter-spacing:'.$option['ls-desktop'].$option['ls-desktop-unit'].';';
			}			

			return $css;
		}

		function enqueue_custom_fonts() {

			$css = '';

			$font1_name = pallikoodam_get_option( 'custom-font1-name' );
			if( !empty ( $font1_name ) ){

				$font1_woff = pallikoodam_get_option( 'custom-font1-woff' );
				$font1_woff2 = pallikoodam_get_option( 'custom-font1-woff2' );

				$css .= '@font-face {';
					$css .= 'font-family: "'. $font1_name .'";';
					$css .= 'src: url("'. $font1_woff .'") format("woff"),';
						$css .= 'url("'. $font1_woff2 .'") format("woff2");';
					$css .= 'font-weight: normal;';
					$css .= 'font-style: normal;';
				$css .= '}';
			}

			$font2_name = pallikoodam_get_option( 'custom-font2-name' );
			if( !empty ( $font2_name ) ){

				$font2_woff = pallikoodam_get_option( 'custom-font2-woff' );
				$font2_woff2 = pallikoodam_get_option( 'custom-font2-woff2' );

				$css .= '@font-face {';
					$css .= 'font-family: "'. $font2_name .'";';
					$css .= 'src: url("'. $font2_woff .'") format("woff"),';
						$css .= 'url("'. $font2_woff2 .'") format("woff2");';
					$css .= 'font-weight: normal;';
					$css .= 'font-style: normal;';
				$css .= '}';
			}

			return $css;
		}		

		function debug( $result ) {
			echo '<pre>';
			var_dump( $result );
			echo '</pre>';
		}		
	}
endif;

Gutenberg_Editor_CSS::get_instance();