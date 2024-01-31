<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Footer Title Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-footer-title-section',
			array(
				'title'    => esc_html__('Title', 'pallikoodam'),
				'panel'    => 'site-footer-main-panel',
			)
		)
	);
	
	/**
	 * Option :Footer Title Typo
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[footer-title-typo]', array(
				'default'           =>  pallikoodam_get_option( 'footer-title-typo' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Typography(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[footer-title-typo]', array(
					'type'    => 'dt-typography',
					'section' => 'site-footer-title-section',
					'label'   => esc_html__( 'Typography', 'pallikoodam'),
				)
			)
		);

	/**
	 * Option : Footer Title Color
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[footer-title-color]', array(
				'default'           => pallikoodam_get_option( 'footer-title-color' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[footer-title-color]', array(
					'label'   => esc_html__( 'Color', 'pallikoodam' ),
					'section' => 'site-footer-title-section',
				)
			)
		);