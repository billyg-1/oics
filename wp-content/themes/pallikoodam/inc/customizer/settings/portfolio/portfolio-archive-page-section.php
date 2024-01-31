<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Page Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-archives-page-layout]', array(
			'default'           => pallikoodam_get_option( 'portfolio-archives-page-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Radio_Image(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[portfolio-archives-page-layout]', array(
				'type'     => 'dt-radio-image',
				'label'    => esc_html__( 'Layout', 'pallikoodam'),
				'section'  => 'portfolio-archive-page-section',
				'choices'  => apply_filters( 'pallikoodam_shop_page_layout_options', array(
					'content-full-width'  => array( 'label' => esc_html__( 'Without Sidebar', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/without-sidebar.png' ),
					'with-left-sidebar' => array( 'label' => esc_html__( 'Left Sidebar', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/left-sidebar.png' ),
					'with-right-sidebar' => array( 'label' => esc_html__( 'Right Sidebar', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/right-sidebar.png' ),
				) )
			)
		)
	);

/**
* Option : Show Standard Sidebar
*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-archives-show-standard-sidebar]', array(
			'default'           => pallikoodam_get_option( 'portfolio-archives-show-standard-sidebar' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[portfolio-archives-show-standard-sidebar]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Standard Sidebar', 'pallikoodam'),
				'section' => 'portfolio-archive-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array( 'portfolio-archives-page-layout', 'any', 'with-left-sidebar,with-right-sidebar' )
			)
		)
	);


/**
 * Option : Product Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-archives-post-layout]', array(
			'default'           => pallikoodam_get_option( 'portfolio-archives-post-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Radio_Image(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[portfolio-archives-post-layout]', array(
				'type'     => 'dt-radio-image',
				'label'    => esc_html__( 'Post Layout', 'pallikoodam'),
				'section'  => 'portfolio-archive-page-section',
				'choices'  => apply_filters( 'pallikoodam_portfolio_archives_post_layout_options', array(
					'dtportfolio-one-column'  => array( 'label' => esc_html__( 'One Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/portfolio/one-column.png' ),
					'dtportfolio-one-half-column' => array( 'label' => esc_html__( 'One Half Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/portfolio/one-half-column.png' ),
					'dtportfolio-one-third-column' => array( 'label' => esc_html__( 'One Third Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/portfolio/one-third-column.png' ),
					'dtportfolio-one-fourth-column' => array( 'label' => esc_html__( 'One Fourth Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/portfolio/one-fourth-column.png' ),
				) )
			)
		)
	);

/**
 * Option : Hover Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-hover-style]', array(
			'default'           => pallikoodam_get_option( 'portfolio-hover-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[portfolio-hover-style]', array (
				'type'     => 'select',
				'label'    => esc_html__( 'Hover Style', 'pallikoodam'),
				'section'  => 'portfolio-archive-page-section',
				'choices'  => apply_filters( 'pallikoodam_portfolio_hover_styles', array (
					''                    => esc_html__('Default','pallikoodam'), 
					'modern-title'        => esc_html__('Modern Title','pallikoodam'), 
					'title-icons-overlay' => esc_html__('Title & Icons Overlay','pallikoodam'), 
					'title-overlay'       => esc_html__('Title Overlay','pallikoodam'),
					'icons-only'          => esc_html__('Icons Only','pallikoodam'), 
					'classic'             => esc_html__('Classic','pallikoodam'), 
					'minimal-icons'       => esc_html__('Minimal Icons','pallikoodam'),
					'presentation'        => esc_html__('Presentation','pallikoodam'), 
					'girly'               => esc_html__('Girly','pallikoodam'), 
					'art'                 => esc_html__('Art','pallikoodam'), 
					'extended'            => esc_html__('Extended','pallikoodam'), 
					'boxed'               => esc_html__('Boxed','pallikoodam'), 
					'centered-box'        => esc_html__('Centered Box','pallikoodam'),
					'with-gallery-thumb'  => esc_html__('With Gallery Thumb','pallikoodam'), 
					'with-gallery-list'   => esc_html__('With Gallery List','pallikoodam'), 
					'grayscale'           => esc_html__('Grayscale','pallikoodam'), 
					'highlighter'         => esc_html__('Highlighter','pallikoodam'), 
					'with-details'        => esc_html__('With Details','pallikoodam'), 
					'bottom-border'       => esc_html__('Bottom Border','pallikoodam'),
					'with-intro'          => esc_html__('With Intro','pallikoodam')
				) )
			)
		)
	);

/**
 * Option : Cursor Hover Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-cursor-hover-style]', array(
			'default'           => pallikoodam_get_option( 'portfolio-cursor-hover-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[portfolio-cursor-hover-style]', array (
				'type'     => 'select',
				'label'    => esc_html__( 'Cursor Hover Style', 'pallikoodam'),
				'section'  => 'portfolio-archive-page-section',
				'choices'  => apply_filters( 'pallikoodam_portfolio_cursor_hover_styles', array (
					''                    => esc_html__('Default', 'pallikoodam'), 
					'cursor-hover-style1' => esc_html__('Style 1', 'pallikoodam'), 
					'cursor-hover-style2' => esc_html__('Style 2', 'pallikoodam') ,
					'cursor-hover-style3' => esc_html__('Style 3', 'pallikoodam'),
					'cursor-hover-style4' => esc_html__('Style 4', 'pallikoodam'),
					'cursor-hover-style5' => esc_html__('Style 5', 'pallikoodam'),
					'cursor-hover-style6' => esc_html__('Style 6', 'pallikoodam'), 
				) )
			)
		)
	);

/**
 * Option : Allow Grid Space
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-grid-space]', array(
			'default'           => pallikoodam_get_option( 'portfolio-grid-space' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[portfolio-grid-space]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Allow Grid Space', 'pallikoodam'),
				'section' => 'portfolio-archive-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Allow Full Width
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-allow-full-width]', array(
			'default'           => pallikoodam_get_option( 'portfolio-allow-full-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[portfolio-allow-full-width]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Allow Full Width', 'pallikoodam'),
				'section' => 'portfolio-archive-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Disable Individual Portfolio Item Options
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-disable-item-options]', array(
			'default'           => pallikoodam_get_option( 'portfolio-disable-item-options' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[portfolio-disable-item-options]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Disable Individual Portfolio Item Options', 'pallikoodam'),
				'section' => 'portfolio-archive-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);