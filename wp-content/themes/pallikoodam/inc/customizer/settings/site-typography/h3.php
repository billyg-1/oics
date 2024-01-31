<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option :H3 Typo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[h3-typo]', array(
			'default'           =>  pallikoodam_get_option( 'h3-typo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Typography(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[h3-typo]', array(
				'type'    => 'dt-typography',
				'section' => 'site-h3-section',
				'label'   => esc_html__( 'H3 Tag', 'pallikoodam'),
			)
		)
	);

/**
 * Option : H3 Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[h3-color]', array(
			'default'           => pallikoodam_get_option( 'h3-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[h3-color]', array(
				'label'   => esc_html__( 'Color', 'pallikoodam' ),
				'section' => 'site-h3-section',
			)
		)
	);	