<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Enable Content Before Hook
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-content-before-hook]', array(
			'default'           => pallikoodam_get_option( 'enable-content-before-hook' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-content-before-hook]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Content Before Hook', 'pallikoodam'),
				'section' => 'site-content-before-hook-section',
				'description' => esc_html__('YES! to enable content before hook.', 'pallikoodam'),
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Content Before Hook
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[content-before-hook]', array(
			'default'           => pallikoodam_get_option( 'content-before-hook' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[content-before-hook]', array(
				'type'    	  => 'textarea',
				'section'     => 'site-content-before-hook-section',
				'label'       => esc_html__( 'Content Before Hook', 'pallikoodam' ),
				'description' => sprintf( esc_html__('Paste your content before hook, Executes before the opening %s tag.', 'pallikoodam'), '&lt;#primary&gt;' )
			)
		)
	);