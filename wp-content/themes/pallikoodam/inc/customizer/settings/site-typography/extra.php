<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option :Extra 1 Typo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[extra-1-typo]', array(
			'default'           =>  pallikoodam_get_option( 'extra-1-typo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Typography(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[extra-1-typo]', array(
				'type'    => 'dt-typography',
				'section' => 'site-extra-font-section',
				'label'   => esc_html__( 'Extra 1', 'pallikoodam'),
				'choices' => array( 
					'font_family'     => esc_html__( 'Font Family', 'pallikoodam'),
				)
			)
		)
	);

	/**
	 * Divider : Extra 1 Typo Bottom
	 */
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[extra-1-typo-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section' => 'site-extra-font-section',
				'settings' => array(),
			)
		)
	);	

/**
 * Option :Extra 2 Typo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[extra-2-typo]', array(
			'default'           =>  pallikoodam_get_option( 'extra-2-typo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Typography(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[extra-2-typo]', array(
				'type'    => 'dt-typography',
				'section' => 'site-extra-font-section',
				'label'   => esc_html__( 'Extra 2', 'pallikoodam'),
				'choices' => array( 
					'font_family'     => esc_html__( 'Font Family', 'pallikoodam'),
				)
			)
		)
	);	