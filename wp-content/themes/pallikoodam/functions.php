<?php
/**
 * Theme Functions
 *
 * @package DTtheme
 * @author DesignThemes
 * @link http://wedesignthemes.com
 */
define( 'PALLIKOODAM_THEME_DIR', get_template_directory() );
define( 'PALLIKOODAM_THEME_URI', get_template_directory_uri() );
define( 'PALLIKOODAM_THEME_SETTINGS', 'pallikoodam-settings' );

if (function_exists ('wp_get_theme')) :
	$themeData = wp_get_theme();
	define( 'PALLIKOODAM_THEME_NAME', $themeData->get('Name'));
	define( 'PALLIKOODAM_THEME_VERSION', $themeData->get('Version'));
endif;

/* ---------------------------------------------------------------------------
 * Load default theme options
 * ---------------------------------------------------------------------------*/
require_once PALLIKOODAM_THEME_DIR .'/inc/class-theme-options.php';

/* ---------------------------------------------------------------------------
 * Loads Customizer
 * ---------------------------------------------------------------------------*/
require_once( PALLIKOODAM_THEME_DIR .'/inc/customizer/lib/class-fontawesome.php' );
require_once( PALLIKOODAM_THEME_DIR .'/inc/customizer/lib/class-font-families.php' );
require_once( PALLIKOODAM_THEME_DIR .'/inc/customizer/lib/class-customizer-sanitizes.php' );
require_once( PALLIKOODAM_THEME_DIR .'/inc/customizer/index.php' );
require_once( PALLIKOODAM_THEME_DIR .'/inc/metabox/index.php' );
function pallikoodam_defaults() {}

/* ---------------------------------------------------------------------------
 * Widget Area
 * ---------------------------------------------------------------------------*/
require_once PALLIKOODAM_THEME_DIR .'/inc/widget-area/class-widget-area.php';

/* ---------------------------------------------------------------------------
 * Dynamic CSS
 * ---------------------------------------------------------------------------*/
require_once PALLIKOODAM_THEME_DIR .'/inc/class-theme-dynamic-css.php';
require_once PALLIKOODAM_THEME_DIR .'/inc/class-theme-dynamic-skin-css.php';

/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * ---------------------------------------------------------------------------*/ 
define( 'PALLIKOODAM_LANG_DIR', PALLIKOODAM_THEME_DIR. '/languages' );
load_theme_textdomain( 'pallikoodam', PALLIKOODAM_LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------*/

// Functions --------------------------------------------------------------------
require_once( PALLIKOODAM_THEME_DIR .'/framework/register-functions.php' );

// Header -----------------------------------------------------------------------
require_once( PALLIKOODAM_THEME_DIR .'/framework/register-head.php' );

// Hooks ------------------------------------------------------------------------
require_once( PALLIKOODAM_THEME_DIR .'/framework/register-hooks.php' );

// Post Functions ---------------------------------------------------------------
require_once( PALLIKOODAM_THEME_DIR .'/framework/register-post-functions.php' );
new pallikoodam_post_functions;

// Plugins ---------------------------------------------------------------------- 
require_once( PALLIKOODAM_THEME_DIR .'/framework/register-plugins.php' );

// WooCommerce ------------------------------------------------------------------
if( function_exists( 'is_woocommerce' ) ){
	require_once( PALLIKOODAM_THEME_DIR .'/framework/woocommerce/register-woocommerce.php' );
}

// Register Templates -----------------------------------------------------------
require_once( PALLIKOODAM_THEME_DIR .'/framework/register-templates.php' );