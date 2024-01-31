<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option :  Body BG Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[body-bg-color]', array(
			'default'           => pallikoodam_get_option( 'body-bg-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control_Color(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[body-bg-color]', array(
			'label'   => esc_html__( 'Site BG Color', 'pallikoodam' ),
			'section' => 'site-layout-typography-section',
		)
	));

/**
 * Option :  Body Content Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[body-content-color]', array(
			'default'           => pallikoodam_get_option( 'body-content-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[body-content-color]', array(
				'label'   => esc_html__( 'Site Content Color', 'pallikoodam' ),
				'section' => 'site-layout-typography-section',
			)
		)
	);

/**
 * Option :  Body Content Link Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[body-content-link-color]', array(
			'default'           => pallikoodam_get_option( 'body-content-link-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[body-content-link-color]', array(
				'label'   => esc_html__( 'Site Link Color', 'pallikoodam' ),
				'section' => 'site-layout-typography-section',
			)
		)
	);

/**
 * Option :  Body Content Link Hover Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[body-content-link-hover-color]', array(
			'default'           => pallikoodam_get_option( 'body-content-link-hover-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[body-content-link-hover-color]', array(
				'label'   => esc_html__( 'Site Link Hover Color', 'pallikoodam' ),
				'section' => 'site-layout-typography-section',
			)
		)
	);

	/**
	 * Divider
	 */	
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[body-content-link-hover-color-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section'  => 'site-layout-typography-section',
				'settings' => array(),
			)
		)
	);
/**
 * Option : Body Content Typo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[body-typo]', array(
			'default'           =>  pallikoodam_get_option( 'body-typo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Typography(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[body-typo]', array(
				'type'    => 'dt-typography',
				'section' => 'site-layout-typography-section',
				'label'   => esc_html__( 'Body & Content', 'pallikoodam'),
			)
		)
	);