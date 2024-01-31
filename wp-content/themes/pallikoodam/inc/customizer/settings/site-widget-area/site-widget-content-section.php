<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Widget Content Typography Section

/**
 * Option : Widget Content Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[widget-content-color]', array(
			'default'           => pallikoodam_get_option( 'widget-content-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Color(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-content-color]', array(
				'type'    => 'dt-color',
				'label'   => esc_html__( 'Content Color', 'pallikoodam' ),
				'section' => 'site-widgets-content-section',
			)
		)
	);

/**
 * Option : Widget Content Link Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[widget-content-link-color]', array(
			'default'           => pallikoodam_get_option( 'widget-content-link-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Color(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-content-link-color]', array(
				'type'    => 'dt-color',
				'label'   => esc_html__( 'Link Color', 'pallikoodam' ),
				'section' => 'site-widgets-content-section',
			)
		)
	);

/**
 * Option : Widget Content Link Hover Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[widget-content-link-h-color]', array(
			'default'           => pallikoodam_get_option( 'widget-content-link-h-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Color(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-content-link-h-color]', array(
				'type'    => 'dt-color',
				'label'   => esc_html__( 'Link Hover Color', 'pallikoodam' ),
				'section' => 'site-widgets-content-section',
			)
		)
	);

	/**
	 * Divider
	 */	
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-content-color-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section'  => 'site-widgets-content-section',
				'settings' => array(),
			)
		)
	);		

/**
 * Option : Widget Content Typography
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[widget-content-typo]', array(
			'default'           =>  pallikoodam_get_option( 'widget-content-typo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),			
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Typography(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-content-typo]', array(
				'type'    => 'dt-typography',
				'section' => 'site-widgets-content-section',
				'label'   => esc_html__( 'Content Typography', 'pallikoodam'),
			)
		)
	);
