<?php
if( !class_exists('DTCoreShortcodes') ){

	class DTCoreShortcodes {
		
		function __construct() {

			add_action("init", array(
				$this,
				'dt_init'
			));

			add_shortcode("dt_sc_post_view_count", array(
				$this,
				'dt_sc_post_view_count'
			) );
	
			add_shortcode("dt_sc_post_like_count", array(
				$this,
				'dt_sc_post_like_count'
			) );
	
			add_shortcode("dt_sc_post_social_share", array(
				$this,
				'dt_sc_post_social_share'
			) );
	
			add_action( 'wp_ajax_dt_wp_post_rating_like', array(
				$this,
				'dt_wp_post_rating_like'
			) );
	
			add_action( 'wp_ajax_nopriv_dt_wp_post_rating_like', array(
				$this,
				'dt_wp_post_rating_like'
			) );
		}
	
		/**
		 * view count
		 * @return string
		 */
		function dt_sc_post_view_count($attrs, $content = null) {
			extract ( shortcode_atts ( array (
				'post_id' => ''
			), $attrs ) );
	
			$post_meta = get_post_meta ( $post_id, '_dt_post_settings', TRUE );
			$post_meta = is_array ( $post_meta ) ? $post_meta : array ();
	
			$v = array_key_exists("view_count", $post_meta) && !empty( $post_meta['view_count'] ) ?  $post_meta['view_count'] : 0;
			$v = $v + 1;
			$post_meta['view_count'] = $v;
	
			update_post_meta( $post_id, '_dt_post_settings', $post_meta );
	
			return $v;
		}
	
		/**
		 * like count
		 * @return string
		 */
		function dt_sc_post_like_count($attrs, $content = null) {
			extract ( shortcode_atts ( array (
				'post_id' => ''
			), $attrs ) );
	
			$post_meta = get_post_meta ( $post_id, '_dt_post_settings', TRUE );
			$post_meta = is_array ( $post_meta ) ? $post_meta : array ();
	
			$v = array_key_exists("like_count",$post_meta) && !empty( $post_meta['like_count'] ) ?  $post_meta['like_count'] : '0';
	
			return $v;
		}
	
		/**
		 * post social share
		 * @return string
		 */
		function dt_sc_post_social_share($attrs, $content = null) {
			extract ( shortcode_atts ( array (
				'post_id' => ''
			), $attrs ) );
	
			$out = '<div class="share">';
				$out .= '<span>'.esc_html__('Share', 'dt-elementor').'</span>';
				$link = get_permalink( $post_id );
				$link = rawurlencode( $link );
	  
				$title = get_the_title( $post_id );
				$title = urlencode($title);
	
				$out .= '<ul class="dt-share-list">';
					$out .= '<li><a href="https://www.facebook.com/sharer.php?u='.$link.'&amp;t='.$title.'" class="fab fa-facebook-f" target="_blank"></a></li>';
					$out .= '<li><a href="https://twitter.com/share?text='.$title.'&amp;url='.$link.'" class="fab fa-twitter" target="_blank"></a></li>';
					$out .= '<li><a href="https://plus.google.com/share?url='.$link.'" class="fab fa-google-plus-g" target="_blank"></a></li>';
					$out .= '<li><a href="https://pinterest.com/pin/create/button/?url='.$link.'&media='.get_the_post_thumbnail_url($post_id, 'full').'" class="fab fa-pinterest" target="_blank"></a></li>';
				$out .= '</ul>';
			$out .= '</div>';
	
			return $out;
		}
	
		function dt_wp_post_rating_like() {
	
			$out = '';
			$postid = $_REQUEST['post_id'];
			$nonce = $_REQUEST['nonce'];
			$action = $_REQUEST['doaction'];
			$arr_pids = array();
	
			if ( wp_verify_nonce( $nonce, 'rating-nonce' ) && $postid > 0 ) {
	
				$post_meta = get_post_meta ( $postid, '_dt_post_settings', TRUE );
				$post_meta = is_array ( $post_meta ) ? $post_meta : array ();
				$var_count = ($action == 'like') ? 'like_count' : 'unlike_count';
	
				if( isset( $_COOKIE['arr_pids'] ) ) {
	
					// article voted already...
					if( in_array( $postid, explode(',', $_COOKIE['arr_pids']) ) ) {
	
						$out = esc_html__('Already', 'dt-elementor');
	
					} else {
						// article first vote...
						$v = array_key_exists($var_count, $post_meta) ?  $post_meta[$var_count] : 0;
						$v = $v + 1;
						$post_meta[$var_count] = $v;
						update_post_meta( $postid, '_dt_post_settings', $post_meta );
	
						$out = $v;
	
						$arr_pids = explode(',', $_COOKIE['arr_pids']);
						array_push( $arr_pids, $postid);
						setcookie( "arr_pids", implode(',', $arr_pids ), time()+1314000, "/" );
					}
				} else {
	
					// site first vote...
					$v = array_key_exists($var_count, $post_meta) ?  $post_meta[$var_count] : 0;
					$v = $v + 1;
					$post_meta[$var_count] = $v;
					update_post_meta( $postid, '_dt_post_settings', $post_meta );
	
					$out = $v;
	
					array_push( $arr_pids, $postid);
					setcookie( "arr_pids", implode(',', $arr_pids ), time()+1314000, "/" );
				}
			} else {
				$out = esc_html__('Security check', 'dt-elementor');
			}
	
			echo do_shortcode($out);
	
			die();
		}

		function dt_init() {
			/* ---------------------------------------------------------------------------
			 *	Under Construction
			 * --------------------------------------------------------------------------- */
			if( ! function_exists('pallikoodam_under_construction') ){
				function pallikoodam_under_construction(){
					if( ! is_user_logged_in() && ! is_admin() && ! is_404() ) {
						get_template_part('tpl-comingsoon');
						exit();
					}
				}
			}

			if( pallikoodam_get_option( 'enable-comingsoon' ) ):
				add_action('template_redirect', 'pallikoodam_under_construction', 30);

				// getting shortcode css ----------------------
				add_action('wp_enqueue_scripts', 'pallikoodam_rand_css', 101);
				function pallikoodam_rand_css() {
					$id = pallikoodam_get_option( 'comingsoon-pageid' );
					if ( $id ) {
						$shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
						if ( ! empty( $shortcodes_custom_css ) ) {

							wp_register_style( 'vc_shortcodes-custom-'.$id, '', false, PALLIKOODAM_THEME_VERSION, 'all' );	
							wp_enqueue_style( 'vc_shortcodes-custom-'.$id );
							wp_add_inline_style( 'vc_shortcodes-custom-'.$id, $shortcodes_custom_css );

						}
					}
				}
			endif;
		}
	}
	new DTCoreShortcodes();
}

// Post Social Share
if(!function_exists('dt_blog_single_social_share')) {
	function dt_blog_single_social_share($post_ID) {

		$output = '<div class="share">';

			$title = get_the_title( $post_ID );
			$title = urlencode($title);

			$link = get_permalink( $post_ID );
			$link = rawurlencode( $link );

			$output .= '<i class="fas fa-share-alt-square"></i>';
			$output .= '<ul class="dt-share-list">';
				$output .= '<li><a href="http://www.facebook.com/sharer.php?u='.esc_attr($link).'&amp;t='.esc_attr($title).'" class="fab fa-facebook-f" target="_blank"></a></li>';
				$output .= '<li><a href="http://twitter.com/share?text='.esc_attr($title).'&amp;url='.esc_attr($link).'" class="fab fa-twitter" target="_blank"></a></li>';
				$output .= '<li><a href="http://plus.google.com/share?url='.esc_attr($link).'" class="fab fa-google-plus-g" target="_blank"></a></li>';
				$output .= '<li><a href="http://pinterest.com/pin/create/button/?url='.esc_attr($link).'&media='.get_the_post_thumbnail_url($post_ID, 'full').'" class="fab fa-pinterest" target="_blank"></a></li>';
			$output .= '</ul>';

		$output .= '</div>';

		return $output;
	}
}