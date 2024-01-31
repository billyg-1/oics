<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Footer Content Section 
 */
$wp_customize->add_section( 
	new PALLIKOODAM_WP_Customize_Section(
		$wp_customize,
		'site-footer-content-section',
		array(
			'title'    => esc_html__('Content', 'pallikoodam'),
			'panel'    => 'site-footer-main-panel',
		)
	)
);

	/**
	 * Option :Footer Content Typo
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[footer-content-typo]', array(
				'default'           =>  pallikoodam_get_option( 'footer-content-typo' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),				
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Typography(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[footer-content-typo]', array(
					'type'    => 'dt-typography',
					'section' => 'site-footer-content-section',
					'label'   => esc_html__( 'Typography', 'pallikoodam'),
				)
			)
		);

	/**
	 * Option : Footer Content Color
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[footer-content-color]', array(
				'default'           => pallikoodam_get_option( 'footer-content-color' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[footer-content-color]', array(
					'label'   => esc_html__( 'Color', 'pallikoodam' ),
					'section' => 'site-footer-content-section',
				)
			)
		);

	/**
	 * Option : Footer Content Anchor Color
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[footer-content-a-color]', array(
				'default'           => pallikoodam_get_option( 'footer-content-a-color' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[footer-content-a-color]', array(
					'label'   => esc_html__( 'Anchor Color', 'pallikoodam' ),
					'section' => 'site-footer-content-section',
				)
			)
		);

	/**
	 * Option : Footer Content Anchor hover Color
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[footer-content-a-hover-color]', array(
				'default'           => pallikoodam_get_option( 'footer-content-a-hover-color' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[footer-content-a-hover-color]', array(
					'label'   => esc_html__( 'Anchor Color', 'pallikoodam' ),
					'section' => 'site-footer-content-section',
				)
			)
		);