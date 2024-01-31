<?php
/**
 * Site Skin Main Section
 */
$wp_customize->add_section( 
	new PALLIKOODAM_WP_Customize_Section(
		$wp_customize,
		'site-skin-main-section',
		array(
			'title'    => esc_html__('Site Skin', 'pallikoodam'),
			'priority' => 10
		)
	)
);


/**
 * Option : Primary Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[primary-color]', array(
			'default'           => pallikoodam_get_option( 'primary-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control_Color(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[primary-color]', array(
			'label'   => esc_html__( 'Primary Color', 'pallikoodam' ),
			'section' => 'site-skin-main-section',
		)
	));

/**
 * Option : Secondary Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[secondary-color]', array(
			'default'           => pallikoodam_get_option( 'secondary-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control_Color(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[secondary-color]', array(
			'label'   => esc_html__( 'Secondary Color', 'pallikoodam' ),
			'section' => 'site-skin-main-section',
		)
	));

/**
 * Option : Tertiary Color
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[tertiary-color]', array(
			'default'           => pallikoodam_get_option( 'tertiary-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control_Color(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[tertiary-color]', array(
			'label'   => esc_html__( 'Tertiary Color', 'pallikoodam' ),
			'section' => 'site-skin-main-section',
		)
	));
	
/**
 * Divider : Tertiary Color Bottom
 */
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[tertiary-color-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section'  => 'site-skin-main-section',
				'settings' => array(),
			)
		)
	);