<?php
/* ---------------------------------------------------------------------------
 * Theme support
 * --------------------------------------------------------------------------- */
if (!function_exists('pallikoodam_features')) {

	function pallikoodam_features() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array('status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat'));
		add_theme_support( 'buddypress-use-legacy' );

		# post thumbnails
		if ( function_exists( 'add_theme_support' ) ) {

			add_theme_support( 'post-thumbnails' );
			add_image_size( 'pallikoodam-blog-thumb', 150, 120, true  ); 	// blog - list
			add_image_size( 'pallikoodam-blog-i-column', 580, 380, true  ); 	// blog - i column
			add_image_size( 'pallikoodam-blog-ii-column', 750, 488, true  ); 	// blog - ii column
			add_image_size( 'pallikoodam-blog-iii-column', 570, 480, true  ); 	// blog - iii column
			add_image_size( 'pallikoodam-blog-list', 600, 400, true  ); 	// blog - list
			add_image_size( 'pallikoodam-blog-ii-column-masonry', 750 ); 	// blog - ii column masonry
			add_image_size( 'pallikoodam-blog-iii-column-masonry', 540 ); 	// blog - iii column masonry

			add_image_size( 'pallikoodam-event-list', 420, 336, true  ); 	// event-calendar - list
			add_image_size( 'pallikoodam-event-single-type1', 812, 546, true  ); // event-calendar - single
			add_image_size( 'pallikoodam-event-single-type4', 570, 460, true  ); // event-calendar - single
			add_image_size( 'pallikoodam-event-single-type5', 746, 770, true  ); // event-calendar - single
			add_image_size( 'pallikoodam-event-list2', 420, 275, true  ); 	// event-calendar - shortcode list
		}

		# add custom background
		$args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
			'wp-head-callback' => '_custom_background_cb',
			'admin-head-callback' => '',
			'admin-preview-callback' => ''
		);
		add_theme_support('custom-background', $args);

		# add custom header
		$args = array( 'default-image'=>'', 'random-default'=>false, 'width'=>0, 'height'=>0,
			'flex-height'=> false, 'flex-width'=> false, 'default-text-color'=> '', 'header-text'=> false,
			'uploads'=> true, 'wp-head-callback'=> '', 'admin-head-callback'=> '', 'admin-preview-callback' => ''
		);
		add_theme_support('custom-header', $args);

		register_nav_menus( array(
			'main-menu' => esc_html__('Main Menu', 'pallikoodam'),
		) );

		# Gutenberg Compatible
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );

		# Header and Footer Compatible
		add_theme_support( 'header-footer-elementor' );

		# Theme Color Palette
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Primary Color', 'pallikoodam' ),
				'slug' => 'primary-color',
				'color' => pallikoodam_get_option( 'primary-color' ),
			),
			array(
				'name' => esc_html__( 'Secondary Color', 'pallikoodam' ),
				'slug' => 'secondary-color',
				'color' => pallikoodam_get_option( 'secondary-color' ),
			),
			array(
				'name' => esc_html__( 'Tertiary Color', 'pallikoodam' ),
				'slug' => 'tertiary-color',
				'color' => pallikoodam_get_option( 'tertiary-color' ),
			)
		));
	}
	add_action('after_setup_theme', 'pallikoodam_features');
}

/* ---------------------------------------------------------------------------
 *	Set Max Content Width
 * --------------------------------------------------------------------------- */
if ( ! isset( $content_width ) ) $content_width = 1230;

/* ---------------------------------------------------------------------------
 * Filter to modify default category widget view
 * --------------------------------------------------------------------------- */
if( !function_exists('pallikoodam_wp_list_categories') ){
	function pallikoodam_wp_list_categories( $output ){
		if (strpos($output, "</span>") <= 0) {
			$output = str_replace('</a> (', '<span> (', $output);
			$output = str_replace(')', ') </span></a> ', $output);
		}
		
		return $output;
	}
	
	add_filter('wp_list_categories', 'pallikoodam_wp_list_categories');
}

/* ---------------------------------------------------------------------------
 * Filter to modify default list archive widget view
 * --------------------------------------------------------------------------- */
if( !function_exists('pallikoodam_wp_list_archive') ){
	function pallikoodam_wp_list_archive( $link_html,$url, $text, $format, $before, $after ) {
		
		if( $format == 'html' ) {
			$link_html = "\t<li>$before<a href='$url'>$text <span>$after</span></a></li>\n";
		}
		
		return $link_html;
	}
	add_filter('get_archives_link', 'pallikoodam_wp_list_archive', 10, 6);	
}

/* ---------------------------------------------------------------------------
 * Filter to execute shortcode inside contact form7
 * --------------------------------------------------------------------------- */
if( !function_exists('pallikoodam_wpcf7_form_elements') ){
	function pallikoodam_wpcf7_form_elements($form) {
		$form = do_shortcode( $form );
		return $form;
	}
	add_filter('wpcf7_form_elements', 'pallikoodam_wpcf7_form_elements');
}

/* ---------------------------------------------------------------------------
 * Pagination for Blog and Portfolio
 * --------------------------------------------------------------------------- */
function pallikoodam_pagination( $query = false, $load_more = false ){
	global $wp_query;
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );

	// default $wp_query
	if( $query ) {
		$custom_query = $query;
	} else {
		$custom_query = $wp_query;
	}

	$custom_query->query_vars['paged'] > 1 ? $current = $custom_query->query_vars['paged'] : $current = 1;

	if( empty( $paged ) ) $paged = 1;
	$prev = $paged - 1;
	$next = $paged + 1;

	$end_size = 1;
	$mid_size = 2;
	$show_all = pallikoodam_get_option( 'showall-pagination' );
	$dots = false;

	if( ! $total = $custom_query->max_num_pages ) $total = 1;

	$output = '';
	if( $total > 1 )
	{
		if( $load_more ){
			// ajax load more -------------------------------------------------
			if( $paged < $total ){
				$output .= '<div class="column one pager_wrapper pager_lm">';
					$output .= '<a class="pager_load_more button button_js" href="'. get_pagenum_link( $next ) .'">';
						$output .= '<span class="button_icon"><i class="icon-layout"></i></span>';
						$output .= '<span class="button_label">'. esc_html__('Load more', 'pallikoodam') .'</span>';
					$output .= '</a>';
				$output .= '</div>';
			}

		} else {
			// default --------------------------------------------------------	
			$output .= '<div class="column one pager_wrapper">';

				$big = 999999999; // need an unlikely integer
				$args = array(
					'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'total'              => $custom_query->max_num_pages,
					'current'            => max( 1, get_query_var('paged') ),
					'show_all'           => $show_all,
					'end_size'           => $end_size,
					'mid_size'           => $mid_size,
					'prev_next'          => true,
					'prev_text'          => '<i class="fas fa-angle-double-left"></i>'.esc_html__('Prev', 'pallikoodam'),
					'next_text'          => esc_html__('Next', 'pallikoodam').'<i class="fas fa-angle-double-right"></i>',
					'type'               => 'list'
				);
				$output .= paginate_links( $args );

			$output .= '</div>'."\n";
		}
	}
	return $output;
}

function pallikoodam_events_title() {
	
	global $wp_query;
	
	$title = '';
	$date_format = apply_filters( 'tribe_events_pro_page_title_date_format', 'l, F jS Y' );
	
	if( tribe_is_month() && !is_tax() ) { 
		$title = sprintf( esc_html__( 'Events for %s', 'pallikoodam' ), date_i18n( 'F Y', strtotime( tribe_get_month_view_date() ) ) );
	} elseif( class_exists('Tribe__Events__Pro__Main') && tribe_is_week() )  {
		$title = sprintf( esc_html__('Events for week of %s', 'pallikoodam'), date_i18n( $date_format, strtotime( tribe_get_first_week_day($wp_query->get('start_date') ) ) ) );
	} elseif( class_exists('Tribe__Events__Pro__Main') && tribe_is_day() ) {
		$title = esc_html__( 'Events for', 'pallikoodam' ) . ' ' . date_i18n( $date_format, strtotime( $wp_query->get('start_date') ) );
	} elseif( class_exists('Tribe__Events__Pro__Main') && (tribe_is_map() || tribe_is_photo()) ) {
		if( tribe_is_past() ) {
			$title = esc_html__( 'Past Events', 'pallikoodam' );
		} else {
			$title = esc_html__( 'Upcoming Events', 'pallikoodam' );
		}
	
	} elseif( tribe_is_list_view() )  {
		$title = esc_html__('Upcoming Events', 'pallikoodam');
	} elseif (is_single())  {
		$title = $wp_query->post->post_title;
	} elseif( tribe_is_month() && is_tax() ) {
		$term_slug = $wp_query->query_vars['tribe_events_cat'];
		$term = get_term_by('slug', $term_slug, 'tribe_events_cat');
		$name = $term->name;
		$title = $name;
	} elseif( is_tag() )  {
		$title = esc_html__('Tag Archives','pallikoodam');
	}
	return $title;
}

/* ---------------------------------------------------------------------------
 * Excerpt
 * --------------------------------------------------------------------------- */
function pallikoodam_excerpt($limit = NULL) {
	$limit = !empty($limit) ? $limit : 10;

	$excerpt = explode(' ', get_the_excerpt(), $limit);
	$excerpt = array_filter($excerpt);

	if (!empty($excerpt)) {
		if (count($excerpt) >= $limit) {
			array_pop($excerpt);
			$excerpt = implode(" ", $excerpt).'...';
		} else {
			$excerpt = implode(" ", $excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
		$excerpt = str_replace('&nbsp;', '', $excerpt);
		if(!empty ($excerpt))
			return "<p>{$excerpt}</p>";
	}
}

/* ---------------------------------------------------------------------------
 * WordPress wp_kses function for allowed html
 * --------------------------------------------------------------------------- */
function pallikoodam_wp_kses($content) {
	$dt_allowed_html_tags = array(
		'a' => array('class' => array(), 'data-product_id' => array(), 'href' => array(), 'title' => array(), 'target' => array(), 'id' => array(), 'data-post-id' => array(), 'data-gal' => array(), 'data-image' => array(), 'rel' => array()),
		'abbr' => array('title' => array()),
		'address' => array(),
		'area' => array('shape' => array(), 'coords' => array(), 'href' => array(), 'alt' => array()),
		'article' => array('id' => array(), 'class' => array()),
		'aside' => array('id' => array(), 'class' => array()),
		'audio' => array('autoplay' => array(), 'controls' => array(), 'loop' => array(), 'muted' => array(), 'preload' => array(), 'src' => array()),
		'b' => array(),
		'base' => array('href' => array(), 'target' => array()),
		'bdi' => array(),
		'bdo' => array('dir' => array()), 
		'blockquote' => array('cite' => array()), 
		'br' => array(),
		'button' => array('autofocus' => array(), 'disabled' => array(), 'form' => array(), 'formaction' => array(), 'formenctype' => array(), 'formmethod' => array(), 'formnovalidate' => array(), 'formtarget' => array(), 'name' => array(), 'type' => array(), 'value' => array()),
		'canvas' => array('height' => array(), 'width' => array()),
		'caption' => array('align' => array()),
		'cite' => array(),
		'code' => array(),
		'col' => array(),
		'colgroup' => array(),
		'datalist' => array('id' => array()),
		'dd' => array(),
		'del' => array('cite' => array(), 'datetime' => array()),
		'details' => array('open' => array()),
		'dfn' => array(),
		'dialog' => array('open' => array()),
		'div' => array('class' => array(), 'id' => array(), 'style' => array(), 'align' => array(), 'data-for' => array(), 'data-date' => array(), 'data-offset' => array()),
		'dl' => array(),
		'dt' => array(),
		'em' => array(),
		'embed' => array('height' => array(), 'src' => array(), 'type' => array(), 'width' => array()),
		'fieldset' => array('disabled' => array(), 'form' => array(), 'name' => array()),
		'figcaption' => array(),
		'figure' => array(),
		'form' => array('accept' => array(), 'accept-charset' => array(), 'action' => array(), 'autocomplete' => array(), 'enctype' => array(), 'method' => array(), 'name' => array(), 'novalidate' => array(), 'target' => array(), 'id' => array(), 'class' => array()),
		'h1' => array('class' => array()), 'h2' => array('class' => array()), 'h3' => array('class' => array()), 'h4' => array('class' => array()), 'h5' => array('class' => array()), 'h6' => array('class' => array()),
		'hr' => array(), 
		'i' => array('class' => array(), 'id' => array()), 
		'iframe' => array('name' => array(), 'seamless' => array(), 'src' => array(), 'srcdoc' => array(), 'width' => array(), 'height' => array(), 'frameborder' => array(), 'allowfullscreen' => array(), 'mozallowfullscreen' => array(), 'webkitallowfullscreen' => array(), 'title' => array()),
		'img' => array('alt' => array(), 'crossorigin' => array(), 'height' => array(), 'ismap' => array(), 'src' => array(), 'usemap' => array(), 'width' => array(), 'title' => array(), 'data-default' => array()),
		'input' => array('align' => array(), 'alt' => array(), 'autocomplete' => array(), 'autofocus' => array(), 'checked' => array(), 'disabled' => array(), 'form' => array(), 'formaction' => array(), 'formenctype' => array(), 'formmethod' => array(), 'formnovalidate' => array(), 'formtarget' => array(), 'height' => array(), 'list' => array(), 'max' => array(), 'maxlength' => array(), 'min' => array(), 'multiple' => array(), 'name' => array(), 'pattern' => array(), 'placeholder' => array(), 'readonly' => array(), 'required' => array(), 'size' => array(), 'src' => array(), 'step' => array(), 'type' => array(), 'value' => array(), 'width' => array(), 'id' => array(), 'class' => array()),
		'ins' => array('cite' => array(), 'datetime' => array()),
		'label' => array('for' => array(), 'form' => array(), 'class' => array()),
		'legend' => array('align' => array()), 
		'li' => array('type' => array(), 'value' => array(), 'class' => array(), 'id' => array()),
		'link' => array('crossorigin' => array(), 'href' => array(), 'hreflang' => array(), 'media' => array(), 'rel' => array(), 'sizes' => array(), 'type' => array()),
		'main' => array(), 
		'map' => array('name' => array()), 
		'mark' => array(), 
		'menu' => array('label' => array(), 'type' => array()),
		'menuitem' => array('checked' => array(), 'command' => array(), 'default' => array(), 'disabled' => array(), 'icon' => array(), 'label' => array(), 'radiogroup' => array(), 'type' => array()),
		'meta' => array('charset' => array(), 'content' => array(), 'http-equiv' => array(), 'name' => array()),
		'object' => array('form' => array(), 'height' => array(), 'name' => array(), 'type' => array(), 'usemap' => array(), 'width' => array()),
		'ol' => array('class' => array(), 'reversed' => array(), 'start' => array(), 'type' => array()),
		'option' => array('value' => array(), 'selected' => array()),
		'p' => array('class' => array()), 
		'q' => array('cite' => array()), 
		'section' => array(), 
		'select' => array('autofocus' => array(), 'disabled' => array(), 'form' => array(), 'multiple' => array(), 'name' => array(), 'required' => array(), 'size' => array(), 'class' => array()),
		'small' => array(), 
		'source' => array('media' => array(), 'src' => array(), 'type' => array()),
		'span' => array('class' => array()), 
		'strong' => array(),
		'style' => array('media' => array(), 'scoped' => array(), 'type' => array()),
		'sub' => array(),
		'sup' => array(),
		'table' => array('sortable' => array()), 
		'tbody' => array(), 
		'td' => array('colspan' => array(), 'headers' => array()),
		'textarea' => array('autofocus' => array(), 'cols' => array(), 'disabled' => array(), 'form' => array(), 'maxlength' => array(), 'name' => array(), 'placeholder' => array(), 'readonly' => array(), 'required' => array(), 'rows' => array(), 'wrap' => array()),
		'tfoot' => array(),
		'th' => array('abbr' => array(), 'colspan' => array(), 'headers' => array(), 'rowspan' => array(), 'scope' => array(), 'sorted' => array()),
		'thead' => array(), 
		'time' => array('datetime' => array()), 
		'title' => array(), 
		'tr' => array(), 
		'track' => array('default' => array(), 'kind' => array(), 'label' => array(), 'src' => array(), 'srclang' => array()), 
		'u' => array(), 
		'ul' => array('class' => array(), 'id' => array()), 
		'var' => array(), 
		'video' => array('autoplay' => array(), 'controls' => array(), 'height' => array(), 'loop' => array(), 'muted' => array(), 'muted' => array(), 'poster' => array(), 'preload' => array(), 'src' => array(), 'width' => array()),
		'wbr' => array(),
	);

	$data = wp_kses($content, $dt_allowed_html_tags);
	return $data;
}

/**
 * Widget:
 * 	Before, After Widget wp_kses
 */
function pallikoodam_before_after_widget ( $content ) {
	$allowed_html = array(
		'aside' => array(
			'id'    => array(),
			'class' => array()
		),
		'div' => array(
			'id'    => array(),
			'class' => array(),
		)
	);

	$data = wp_kses( $content, $allowed_html );

	return $data;
}

/**
 * Widget : Title wp_kses
 */
function pallikoodam_widget_title( $content ) {

	$allowed_html = array(
		'div' => array(
			'id'    => array(),
			'class' => array()
		),
		'h2' => array(
			'class' => array()
		),
		'h3' => array(
			'class' => array()
		),				
	);

	$data = wp_kses( $content, $allowed_html );

	return $data;
}

/* ---------------------------------------------------------------------------
 * Hexadecimal to RGB color conversion
 * --------------------------------------------------------------------------- */
if(!function_exists('pallikoodam_hex2rgb')) {

	function pallikoodam_hex2rgb($hex) {
		
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
}

/* ---------------------------------------------------------------------------
 * Theme Comment Style
 * --------------------------------------------------------------------------- */
function pallikoodam_comment_style( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ($comment->comment_type ) :
	case 'pingback':
	case 'trackback':
		echo '<li class="post pingback">';
		echo "<p>";
		esc_html_e('Pingback:', 'pallikoodam');
		comment_author_link();
		edit_comment_link(esc_html__('Edit', 'pallikoodam'), ' ', '');
		echo "</p>";
		break;

	default:
	case '':
		echo "<li ";
		comment_class();
		echo ' id="li-comment-';
		comment_ID();
		echo '">';
		echo '<article class="comment" id="comment-';
		comment_ID();
		echo '">';

		echo '<header class="comment-author">'.get_avatar($comment, 450).'</header>';

		echo '<section class="comment-details">';
		echo '	<div class="author-name">';
		echo 		get_comment_author_link();
		echo '		<span class="commentmetadata">'.get_the_date ( get_option('date_format') ).'</span>';
		echo '	</div>';
		echo '  <div class="comment-body">';
					comment_text();
					if ($comment->comment_approved == '0') :
						esc_html_e('Your comment is awaiting moderation.', 'pallikoodam');
					endif;
					edit_comment_link(esc_html__('Edit', 'pallikoodam'));
		echo '	</div>';
		echo '	<div class="reply">';
		echo 		comment_reply_link(array_merge($args, array('reply_text' => esc_html__('Reply', 'pallikoodam'), 'depth' => $depth, 'max_depth' => $args['max_depth'])));
		echo '	</div>';
		echo '</section>';
		echo '</article><!-- .comment-ID -->';
		break;
	endswitch;
}

/* ---------------------------------------------------------------------------
 * Custom Function To Get Page Permalink By Its Template
 * --------------------------------------------------------------------------- */
function pallikoodam_get_page_permalink_by_its_template( $template ) {
	$permalink = '#';

	$pages = get_posts( array(
			'post_type' => 'page',
			'meta_key' => '_wp_page_template',
			'meta_value' => $template,
			'suppress_filters' => false  ) );

	if ( is_array( $pages ) && count( $pages ) > 0 ) {
		$login_page = $pages[0];
		$permalink = get_permalink( $login_page->ID );
	}
	return $permalink;
}

/* ---------------------------------------------------------------------------
 * Theme show sidebar
 * --------------------------------------------------------------------------- */
function pallikoodam_show_sidebar( $type, $id, $position = 'right' ) {
	
	$wtstyle = pallikoodam_get_option( 'widget-title-style' );
	$sidebars = $settings = array();

	if( $type == 'page' ){
		$settings = get_post_meta($id,'_tpl_default_settings',TRUE);
		$settings = is_array( $settings ) ?  array_filter( $settings )  : array();

		if( empty($settings) || ( array_key_exists( 'layout', $settings ) && $settings['layout'] == 'global-site-layout' ) ) {
			$settings['layout'] = pallikoodam_get_option( 'site-global-sidebar-layout' );
			$settings['show-standard-sidebar-left'] = true;
			$settings['show-standard-sidebar-right'] = true;
			unset($settings['widget-area-left']);
			unset($settings['widget-area-right']);
		}
	} elseif( $type == 'post' ){
		$settings = get_post_meta($id,'_dt_post_settings',TRUE);
		$settings = is_array( $settings ) ?  array_filter( $settings )  : array();

		if( empty($settings) || ( array_key_exists( 'layout', $settings ) && $settings['layout'] == 'global-site-layout' ) ) {
			$settings['layout'] = pallikoodam_get_option( 'site-global-sidebar-layout' );
			$settings['show-standard-sidebar-left'] = true;
			$settings['show-standard-sidebar-right'] = true;
			unset($settings['widget-area-left']);
			unset($settings['widget-area-right']);
		}
	} elseif( $type == 'dt_portfolios' ){
		$settings = get_post_meta($id,'_portfolio_settings',TRUE);

	} elseif( $type == 'tribe_events' ){
		$settings = get_post_meta($id,'_custom_settings',TRUE);
		$settings = is_array( $settings ) ?  array_filter( $settings )  : array();

		if( empty($settings) || ( array_key_exists( 'layout', $settings ) && $settings['layout'] == 'global-site-layout' ) ) {
			$settings['layout'] = pallikoodam_get_option( 'site-global-sidebar-layout' );
			$settings['show-standard-sidebar-left'] = true;
			$settings['show-standard-sidebar-right'] = true;
			unset($settings['widget-area-left']);
			unset($settings['widget-area-right']);
		}

	} else {
		$settings = get_post_meta($id,'_custom_settings',TRUE);		
	}
	
	$settings = is_array($settings) ? $settings  : array();
	$active_sidebars = array();
	
	$k = 'show-standard-sidebar-'.$position;
	if( array_key_exists( $k, $settings ) && $settings[$k] ){
		$sidebar = 'standard-sidebar-'.$position;
		if( is_active_sidebar( $sidebar ) ){
			array_push($active_sidebars, $sidebar );
		}
	}

	$k = 'widget-area-'.$position;
	if( array_key_exists($k, $settings) ){
		foreach($settings[$k] as $widgetarea ){
			$sidebars[] = mb_convert_case($widgetarea, MB_CASE_LOWER, "UTF-8");
		}	
	}

	if( !empty( $sidebars ) ) {
		foreach( $sidebars as $sidebar ) {
			if( is_active_sidebar( $sidebar ) ) {
				array_push($active_sidebars, $sidebar );
			}
		}
	}

	if( $active_sidebars ) {
		echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';
		foreach( $active_sidebars as $sidebar ) {
			dynamic_sidebar( $sidebar );
		}		
		echo !empty( $wtstyle ) ? '</div>' : '';
	}
}

/* ---------------------------------------------------------------------------
 * Theme active custom widgetarea
 * --------------------------------------------------------------------------- */
function pallikoodam_active_custom_widgetarea( $type, $id, $position = 'left' ) {

	$flag = false;
	$product_widget = false;

	if( $type == 'page' ){
		$settings = get_post_meta($id,'_tpl_default_settings',TRUE);
		$settings = is_array( $settings ) ?  array_filter( $settings )  : array();

		if( empty($settings) || ( array_key_exists( 'layout', $settings ) && $settings['layout'] == 'global-site-layout' ) ) {
			unset($settings['widget-area-left']);
			unset($settings['widget-area-right']);
		}
	} elseif( $type == 'post' ){
		$settings = get_post_meta($id,'_dt_post_settings',TRUE);
		$settings = is_array( $settings ) ?  array_filter( $settings )  : array();

		if( empty($settings) || ( array_key_exists( 'layout', $settings ) && $settings['layout'] == 'global-site-layout' ) ) {
			unset($settings['widget-area-left']);
			unset($settings['widget-area-right']);
		}
	} elseif( $type == 'dt_portfolios' ){
		$settings = get_post_meta($id,'_portfolio_settings',TRUE);
	} elseif( $type == 'product' ){
		$settings = get_post_meta($id,'_custom_settings',TRUE);
		$product_widget = true;
	} else {
		$settings = get_post_meta($id,'_custom_settings',TRUE);		
	}

	$settings = is_array($settings) ? $settings  : array();

	if($product_widget) {
		$k = 'product-widgetareas';
	} else {
		$k = 'widget-area-'.$position;
	}

	if( array_key_exists($k, $settings) ){
		foreach($settings[$k] as $widgetarea ){
			$sidebars[] = mb_convert_case($widgetarea, MB_CASE_LOWER, "UTF-8");
		}	
	}

	if( !empty( $sidebars ) ) {
		foreach( $sidebars as $sidebar ) {
			if( is_active_sidebar( $sidebar ) ) {
				$flag = true;
			}
		}
	}

	return $flag;
}

/* ---------------------------------------------------------------------------
 * Check global variables
 * --------------------------------------------------------------------------- */
function pallikoodam_global_variables($variable = '') {

	global $woocommerce, $product, $woocommerce_loop, $post, $wp_query, $pagenow;

	switch($variable) {
		
		case 'woocommerce':
			return $woocommerce;
		break;
		case 'product':
			return $product;
		break;
		case 'woocommerce_loop':
			return $woocommerce_loop;
		break;
		case 'post':
			return $post;
		break;
		case 'wp_query':
			return $wp_query;
		break;
		case 'pagenow':
			return $pagenow;
		break;
	}
	return false;
}

/* ---------------------------------------------------------------------------
 * Walker Page for pallikoodam_new_wp_page_menu
 * --------------------------------------------------------------------------- */
class PALLIKOODAM_Walker_Page extends Walker_Page {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		$indent = str_repeat( $t, $depth );
		$output .= "{$n}{$indent}<ul class='sub-menu is-hidden'>{$n}";
		$output .= '<li class="close-nav"></li>';
		$output .= '<li class="go-back"><a href="javascript:void(0);"></a></li>';
		$output .= '<li class="see-all"></li>';
	}
}

/* ---------------------------------------------------------------------------
 * Walker for default header without core plugin
 * --------------------------------------------------------------------------- */
class DTWPHeaderMenuWalker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		$classes = array( 'sub-menu', 'is-hidden' );

		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<ul$class_names>{$n}";
		$output .= '<li class="close-nav"></li>';
		$output .= '<li class="go-back"><a href="javascript:void(0);"></a></li>';
		$output .= '<li class="see-all"></li>';
	}
	
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent  = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
    }
	
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
 
        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'menu-item-depth-' . $depth; //@EDIT
 
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
 
        $output .= $indent . '<li' . $id . $class_names . '>';
 
        $atts           = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        if ( '_blank' === $item->target && empty( $item->xfn ) ) {
            $atts['rel'] = 'noopener noreferrer';
        } else {
            $atts['rel'] = $item->xfn;
        }
        $atts['href']         = ! empty( $item->url ) ? $item->url : '';
        $atts['aria-current'] = $item->current ? 'page' : '';
 
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
 
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
 
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );
 
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 
        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
 
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }		
}

/* ---------------------------------------------------------------------------
 * Add new mimes to use custom font upload
 * --------------------------------------------------------------------------- */
add_filter('upload_mimes', 'pallikoodam_upload_mimes');
function pallikoodam_upload_mimes( $existing_mimes = array() ){
	$existing_mimes['woff'] = 'font/woff';
	$existing_mimes['woff2'] = 'font/woff2';
	$existing_mimes['ttf'] 	= 'font/ttf';
	$existing_mimes['svg'] 	= 'image/svg+xml';

	return $existing_mimes;
}

/* ---------------------------------------------------------------------------
 * Gutenberg Admin style
 * --------------------------------------------------------------------------- */
add_action( 'enqueue_block_editor_assets', 'pallikoodam_backend_editor_styles' );
if(!function_exists('pallikoodam_backend_editor_styles')){
	function pallikoodam_backend_editor_styles() {
		wp_enqueue_style( 'pallikoodam-googleapis', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i', array(), null );
		wp_enqueue_style( 'pallikoodam-gutenberg', get_theme_file_uri('/css/admin-gutenberg.css'), false, PALLIKOODAM_THEME_VERSION, 'all' );
	}
}

/* ---------------------------------------------------------------------------
* Whitelist Associate
* --------------------------------------------------------------------------- */
if ( ! function_exists( 'pallikoodam_array_whitelist_assoc' ) ) {
	function pallikoodam_array_whitelist_assoc( Array $array1, Array $array2 ) {
		if ( func_num_args() > 2 ) {
			$args = func_get_args();
			array_shift( $args );
			$array2 = call_user_func_array( 'array_merge', $args );
		}

		return array_intersect_key( $array1, array_flip( $array2 ) );
	}
}

// -----------------------------------------
// Custom Widgets                    -
// -----------------------------------------
function pallikoodam_customizer_custom_widgets() {

	$custom_widgets = array();
	
	$widget_areas = pallikoodam_get_option( 'widget-areas', array() );

	if( isset( $widget_areas ) ):
		foreach ( $widget_areas as $widget ) :
		  $id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
		  $id = str_replace(" ", "", $id);
		  $custom_widgets[$id] = $widget;
		endforeach;
	endif;

	return $custom_widgets;
}

// -----------------------------------------
// Product Style Template
// -----------------------------------------
function pallikoodam_customizer_shop_product_templates() {

	$shop_product_templates[-1] = esc_html__('Default', 'pallikoodam');

	$args = array (
				'post_type'   => 'dt_product_template',
				'post_status' => 'publish'
			);

	$product_template_pages = get_posts( $args );

	foreach($product_template_pages as $product_template_page) {
		$id = $product_template_page->ID;
		$shop_product_templates[$id] = get_the_title($id);
	}

	return $shop_product_templates;
}

// -----------------------------------------
// Retrieves published pages.
// -----------------------------------------
if ( ! function_exists( 'pallikoodam_get_customizer_pages' ) ) {

	function pallikoodam_get_customizer_pages( $selected = '' ) {

		$choices = array();

		$args = array( 'post_type' => 'page', 'post_status' => 'publish' ); 
		$pages = get_pages($args);

		$choices[''] = esc_html__('Choose the page', 'pallikoodam');
		foreach( $pages as $page ):
			$choices[$page->ID]	= $page->post_title;
		endforeach;

		return $choices;
	}
}

// -----------------------------------------
// Retrieves published custom posts.
// -----------------------------------------
if ( ! function_exists( 'pallikoodam_get_customizer_cpt_post_list' ) ) {

	function pallikoodam_get_customizer_cpt_post_list( $post_type = 'page', $label = '' ) {

		$choices = array();
		$choices[''] = $label;

		$args = array( 'post_type' => $post_type, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'post_status' => 'publish' ); 
		$pages = get_posts($args);

		if ( ! is_wp_error( $pages ) && ! empty( $pages ) ) {

			foreach( $pages as $page ):
				$choices[$page->ID]	= $page->post_title;
			endforeach;
		}

		return $choices;
	}
}

// -----------------------------------------
// Retrieves enabled social links.
// -----------------------------------------
if( !function_exists( 'pallikoodam_get_sociable_links' ) ) {

	function pallikoodam_get_sociable_links() {

		$sociables = array();

		$delicious = pallikoodam_get_option( 'sociable-delicious' );
		if( $delicious )
			$sociables['delicious'] = $delicious;

		$deviantart = pallikoodam_get_option( 'sociable-deviantart' );
		if( $deviantart )
			$sociables['deviantart'] = $deviantart;

		$digg = pallikoodam_get_option( 'sociable-digg' );
		if( $digg )
			$sociables['digg'] = $digg;

		$dribbble = pallikoodam_get_option( 'sociable-dribbble' );
		if( $dribbble )
			$sociables['dribbble'] = $dribbble;

		$envelope = pallikoodam_get_option( 'sociable-envelope' );
		if( $envelope )
			$sociables['envelope'] = $envelope;

		$facebook = pallikoodam_get_option( 'sociable-facebook' );
		if( $facebook )
			$sociables['facebook'] = $facebook;

		$flickr = pallikoodam_get_option( 'sociable-flickr' );
		if( $flickr )
			$sociables['flickr'] = $flickr;

		$google_plus = pallikoodam_get_option( 'sociable-google-plus' );
		if( $google_plus )
			$sociables['google-plus'] = $google_plus;

		$gtalk = pallikoodam_get_option( 'sociable-gtalk' );
		if( $gtalk )
			$sociables['gtalk'] = $gtalk;

		$instagram = pallikoodam_get_option( 'sociable-instagram' );
		if( $instagram )
			$sociables['instagram'] = $instagram;

		$lastfm = pallikoodam_get_option( 'sociable-lastfm' );
		if( $lastfm )
			$sociables['lastfm'] = $lastfm;

		$linkedin = pallikoodam_get_option( 'sociable-linkedin' );
		if( $linkedin )
			$sociables['linkedin'] = $linkedin;

			$pinterest = pallikoodam_get_option( 'sociable-pinterest' );
		if( $pinterest )
			$sociables['pinterest'] = $pinterest;

		$reddit = pallikoodam_get_option( 'sociable-reddit' );
		if( $reddit )
			$sociables['reddit'] = $reddit;

		$rss = pallikoodam_get_option( 'sociable-rss' );
		if( $rss )
			$sociables['rss'] = $rss;

		$skype = pallikoodam_get_option( 'sociable-skype' );
		if( $skype )
			$sociables['skype'] = $skype;

		$stumbleupon = pallikoodam_get_option( 'sociable-stumbleupon' );
		if( $stumbleupon )
			$sociables['stumbleupon'] = $stumbleupon;

		$tumblr = pallikoodam_get_option( 'sociable-tumblr' );
		if( $tumblr )
			$sociables['tumblr'] = $tumblr;

		$twitter = pallikoodam_get_option( 'sociable-twitter' );
		if( $twitter )
			$sociables['twitter'] = $twitter;

		$viadeo = pallikoodam_get_option( 'sociable-viadeo' );
		if( $viadeo )
			$sociables['viadeo'] = $viadeo;

		$vimeo = pallikoodam_get_option( 'sociable-vimeo' );
		if( $vimeo )
			$sociables['vimeo'] = $vimeo;

		$yahoo = pallikoodam_get_option( 'sociable-yahoo' );
		if( $yahoo )
			$sociables['yahoo'] = $yahoo;

		$youtube = pallikoodam_get_option( 'sociable-youtube' );
		if( $youtube )
			$sociables['youtube'] = $youtube;

		return($sociables);
	}
}

if( !function_exists( 'pallikoodam_add_mobile_menu_wp_nav_menu' ) ) {
	function pallikoodam_add_mobile_menu_wp_nav_menu( $nav_menu, $args ) {

		$nav_menu .= '<div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="dummy-menu">
						  <div class="menu-trigger menu-trigger-icon" data-menu="dummy-menu">
						  	<i></i><span>'.esc_html__('Menu', 'pallikoodam').'</span>
						  </div>
						  <div class="mobile-menu" data-menu="dummy-menu"></div>
						  <div class="overlay"></div>
					  </div>';

		return $nav_menu;
	}
	add_filter( 'wp_nav_menu', 'pallikoodam_add_mobile_menu_wp_nav_menu', 10, 2 );
}

if( !function_exists( 'pallikoodam_alter_wp_nav_menu_args' ) ) {
	function pallikoodam_alter_wp_nav_menu_args( $args ) {

		$args['menu_class'] = 'dt-primary-nav';
		$args['items_wrap'] = '<ul id = "%1$s" class = "%2$s" data-menu = "dummy-menu"> <li class = "close-nav"></li> %3$s </ul> <div class = "sub-menu-overlay"></div>';
		$args['walker']     = new DTWPHeaderMenuWalker;

		return $args;

	}
	add_filter( 'wp_nav_menu_args', 'pallikoodam_alter_wp_nav_menu_args' );
}

if( !function_exists( 'pallikoodam_get_elementor_page_list' ) ) {
	function pallikoodam_get_elementor_page_list() {
		$pagelist = get_posts( array(
			'post_type' => 'elementor_library',
			'showposts' => 999,
		));

		if ( ! empty( $pagelist ) && ! is_wp_error( $pagelist ) ) {

			foreach ( $pagelist as $post ) {
				$options[ $post->ID ] = $post->post_title;
			}

			$options[0] = esc_html__('-- Select Section --', 'pallikoodam');
			asort($options);

	        return $options;
		}
	}
}