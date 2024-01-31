<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Enable Bottom Hook
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-bottom-hook]', array(
			'default'           => pallikoodam_get_option( 'enable-bottom-hook' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-bottom-hook]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Bottom Hook', 'pallikoodam'),
				'section' => 'site-bottom-hook-section',
				'description' => esc_html__('YES! to enable bottom hook.', 'pallikoodam'),
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Bottom Hook
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[bottom-hook]', array(
			'default'           => pallikoodam_get_option( 'bottom-hook' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[bottom-hook]', array(
				'type'    	  => 'textarea',
				'section'     => 'site-bottom-hook-section',
				'label'       => esc_html__( 'Bottom Hook', 'pallikoodam' ),
				'description' => esc_html__('Paste your bottom hook, Executes after the closing &lt;/body&gt; tag.', 'pallikoodam'),
			)
		)
	);