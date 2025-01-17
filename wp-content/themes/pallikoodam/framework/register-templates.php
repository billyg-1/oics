<?php
// Templates Path
if( !function_exists( 'pallikoodam_template_path' ) ) {
	function pallikoodam_template_path() {
		return apply_filters( 'pallikoodam_template_path', 'framework/templates' );
	}
}

// Get Template Part
if( !function_exists( 'pallikoodam_get_template_part' ) ) {
	function pallikoodam_get_template_part( $slug, $name = '' ) {
		$template = '';

		// Look in yourtheme/slug-name.php and yourtheme/framework/templates/slug-name.php
		if ( $name ) {
			$template = locate_template( array( "{$slug}-{$name}.php", pallikoodam_template_path() . "/{$slug}-{$name}.php" ) );
		}

		// Get default slug-name.php
		if ( !$template && $name && file_exists( PALLIKOODAM_THEME_URI . "/framework/templates/{$slug}-{$name}.php" ) ) {
			$template = PALLIKOODAM_THEME_URI . "/framework/templates/{$slug}-{$name}.php";
		}
		
		// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/framework/templates/slug.php
		if ( !$template ) {
			$template = locate_template( array( "{$slug}.php", pallikoodam_template_path() . "{$slug}.php" ) );
		}

		// Allow 3rd party plugin filter template file from their plugin
		if ( $template ) {
			$template = apply_filters( 'pallikoodam_get_template_part', $template, $slug, $name );
		}
		if ( $template && file_exists( $template ) ) {
			load_template( $template, false );
		}
		
		return $template;
	}
}

// Get Template
if( !function_exists( 'pallikoodam_get_template' ) ) {
	function pallikoodam_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
		if ( $args && is_array( $args ) ) {
			extract( $args );
		}

		$located = pallikoodam_locate_template( $template_name, $template_path, $default_path );

		if ( !file_exists( $located ) ) {
			_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
			return;
		}
		// Allow 3rd party plugin filter template file from their plugin
		$located = apply_filters( 'pallikoodam_get_template', $located, $template_name, $args, $template_path, $default_path );

		do_action( 'pallikoodam_before_template_part', $template_name, $template_path, $located, $args );

		if ( $located && file_exists( $located ) ) {
			include( $located );
		}

		do_action( 'pallikoodam_after_template_part', $template_name, $template_path, $located, $args );
	}
}

// Locate Template
if( !function_exists( 'pallikoodam_locate_template' ) ) {
	function pallikoodam_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	
		if ( !$template_path ) {
			$template_path = pallikoodam_template_path();
		}
	
		if ( !$default_path ) {
			$default_path = PALLIKOODAM_THEME_URI . '/framework/templates/';
		}
		
		$template = null;
		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				trailingslashit( $template_path ) . $template_name,
				$template_name
			)
		);
	
		// Get default template
		if ( !$template ) {
			$template = $default_path . $template_name;
		}
	
		// Return what we found
		return apply_filters( 'pallikoodam_locate_template', $template, $template_name, $template_path );
	}
}