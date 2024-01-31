<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Breadcrumb Show
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[show-breadcrumb]', array(
			'default'           => pallikoodam_get_option( 'show-breadcrumb' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[show-breadcrumb]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Breadcrumb', 'pallikoodam'),
				'section' => 'site-breadcrumb-container-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Breadcrumb Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-style]', array(
			'default'           => pallikoodam_get_option( 'breadcrumb-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-style]', array(
			'type'    => 'select',
			'section' => 'site-breadcrumb-container-section',
			'label'   => esc_html__( 'Style', 'pallikoodam' ),
			'choices' => array(
				'default'                           => esc_html__('Default', 'pallikoodam'),
				'aligncenter'                       => esc_html__('Align Center', 'pallikoodam'),
				'alignright'                        => esc_html__('Align Right', 'pallikoodam'),
				'breadcrumb-left'                   => esc_html__('Left Side Breadcrumb', 'pallikoodam'),
				'breadcrumb-right'                  => esc_html__('Right Side Breadcrumb', 'pallikoodam'),
				'breadcrumb-top-right-title-center' => esc_html__('Top Right Title Center', 'pallikoodam'),
				'breadcrumb-top-left-title-center'  => esc_html__('Top Left Title Center', 'pallikoodam'),
			)
		)
	);

/**
 * Option : Breadcrumb Position
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-position]', array(
			'default'           => pallikoodam_get_option( 'breadcrumb-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-position]', array(
			'type'    => 'select',
			'section' => 'site-breadcrumb-container-section',
			'label'   => esc_html__( 'Position', 'pallikoodam' ),
			'choices' => array(
				'header-top-absolute' => esc_html__('Behind the Header','pallikoodam'),
				'header-top-relative' => esc_html__('Default','pallikoodam'),
			)
		)
	);

/**
 * Option : Breadcrumb Delimiter
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-delimiter]', array(
			'default'   => pallikoodam_get_option( 'breadcrumb-delimiter' ),
			'type'      => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),			
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Fontawesome(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-delimiter]', array(
				'type'    => 'dt-fontawesome',
				'section' => 'site-breadcrumb-container-section',
				'label'   => esc_html__( 'Breadcrumb Delimiter', 'pallikoodam'),
			)
		)
	);