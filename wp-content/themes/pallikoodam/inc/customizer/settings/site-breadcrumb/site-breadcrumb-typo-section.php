<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Breadcrumb Title Typo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-title-typo]', array(
			'default'           =>  pallikoodam_get_option( 'breadcrumb-title-typo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Typography(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-title-typo]', array(
				'type'    => 'dt-typography',
				'section' => 'site-breadcrumb-typography-section',
				'label'   => esc_html__( 'Title', 'pallikoodam'),
			)
		)
	);

	/**
	 * Divider : Breadcrumb Title Typo Bottom
	 */
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-title-typo-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section'  => 'site-breadcrumb-typography-section',
				'settings' => array(),
			)
		)
	);		

/**
 * Option : Breadcrumb Typo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-typo]', array(
			'default'   =>  pallikoodam_get_option( 'breadcrumb-typo' ),
			'type'      => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),			
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Typography(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[breadcrumb-typo]', array(
				'type'    => 'dt-typography',
				'section' => 'site-breadcrumb-typography-section',
				'label'   => esc_html__( 'Breadcrumb', 'pallikoodam'),
			)
		)
	);