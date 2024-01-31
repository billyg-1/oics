<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Enable Top Hook
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-top-hook]', array(
			'default'           => pallikoodam_get_option( 'enable-top-hook' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-top-hook]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Top Hook', 'pallikoodam'),
				'section' => 'site-top-hook-section',
				'description' => esc_html__('YES! to enable top hook.', 'pallikoodam'),
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Top Hook
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[top-hook]', array(
			'default'           => pallikoodam_get_option( 'top-hook' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[top-hook]', array(
				'type'    	  => 'textarea',
				'section'     => 'site-top-hook-section',
				'label'       => esc_html__( 'Top Hook', 'pallikoodam' ),
				'description' => sprintf( esc_html__('Paste your top hook, Executes after the opening %s tag.', 'pallikoodam'), '&lt;body&gt;')
			)
		)
	);