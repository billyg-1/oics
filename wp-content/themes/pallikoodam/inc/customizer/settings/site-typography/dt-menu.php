<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option :Menu Typo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[menu-typo]', array(
			'default'           =>  pallikoodam_get_option( 'menu-typo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Typography(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[menu-typo]', array(
				'type'    => 'dt-typography',
				'section' => 'site-menu-section',
				'label'   => esc_html__( 'Menu', 'pallikoodam'),
			)
		)
	);

/**
 * Option : Menu Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[menu-color]', array(
			'default'           => pallikoodam_get_option( 'menu-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[menu-color]', array(
				'label'   => esc_html__( 'Color', 'pallikoodam' ),
				'section' => 'site-menu-section',
			)
		)
	);