<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Site Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[site-layout]', array(
			'default'           => pallikoodam_get_option( 'site-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[site-layout]', array(
				'type'    => 'select',
				'section' => 'site-layout-container-section',
				'label'   => esc_html__( 'Site Layout', 'pallikoodam' ),
				'choices' => array(
					'boxed' => esc_html__( 'Boxed', 'pallikoodam'),
					'wide'  => esc_html__( 'Wide', 'pallikoodam'),
				)
			)
		)
	);

/**
 * Option : Customize Boxed Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[site-boxed-layout]', array(
			'default'           => pallikoodam_get_option( 'site-boxed-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[site-boxed-layout]', array(
				'type'       => 'dt-switch',
				'label'      => esc_html__( 'Customize Boxed Layout?', 'pallikoodam'),
				'section'    => 'site-layout-container-section',
				'dependency' => array( 'site-layout', '==', 'boxed' ),
				'choices'    => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Customize Boxed Layout
 */	
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[site-bg]', array(
			'default'           =>  '',
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Background(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[site-bg]', array(
				'type'       => 'dt-background',
				'section'    => 'site-layout-container-section',
				'dependency' => array( 'site-layout|site-boxed-layout', '==|==', 'boxed|true' ),
				'label'      => esc_html__( 'Background', 'pallikoodam' ),
			)
		)		
	);