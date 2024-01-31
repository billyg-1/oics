<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : 404 Meaage
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-404message]', array(
			'default'           => pallikoodam_get_option( 'enable-404message' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-404message]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Message', 'pallikoodam'),
				'description' => esc_html__('YES! to enable not-found page message.', 'pallikoodam'),
				'section' => 'site-404-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Template Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[notfound-style]', array(
			'default'           => pallikoodam_get_option( 'notfound-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[notfound-style]', array(
			'type'    => 'select',
			'section' => 'site-404-page-section',
			'label'   => esc_html__( 'Template Style', 'pallikoodam' ),
			'choices' => array(
				'type1'  => esc_html__('Modern', 'pallikoodam'),
				'type2'  => esc_html__('Classic', 'pallikoodam'),
				'type4'  => esc_html__('Diamond', 'pallikoodam'),
				'type5'  => esc_html__('Shadow', 'pallikoodam'),
				'type6'  => esc_html__('Diamond Alt', 'pallikoodam'),
				'type7'  => esc_html__('Stack', 'pallikoodam'),
				'type8'  => esc_html__('Minimal', 'pallikoodam'),
			),
			'description' => esc_html__('Choose the style of not-found template page.', 'pallikoodam'),
		)
	));

/**
 * Option : Notfound Dark BG
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[notfound-darkbg]', array(
			'default'           => pallikoodam_get_option( 'notfound-darkbg' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[notfound-darkbg]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( '404 Dark BG', 'pallikoodam'),
				'description' => esc_html__('YES! to use dark bg notfound page for this site.', 'pallikoodam'),
				'section' => 'site-404-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Custom Page
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[notfound-pageid]', array(
			'default'           => pallikoodam_get_option( 'notfound-pageid' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[notfound-pageid]', array(
			'type'    => 'select',
			'section' => 'site-404-page-section',
			'label'   => esc_html__( 'Custom Page', 'pallikoodam' ),
			'choices' => pallikoodam_get_customizer_pages(),
			'description' => esc_html__('Choose the page for not-found content.', 'pallikoodam'),
		)
	));

/**
 * Option : 404 Background
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[notfound_background]', array(
			'default'           =>  '',
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Background(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[notfound_background]', array(
				'type'    => 'dt-background',
				'section' => 'site-404-page-section',
				'label'   => esc_html__( 'Background', 'pallikoodam' ),
			)
		)		
	);

/**
 * Option : Custom Styles
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[notfound-bg-style]', array(
			'default'           => pallikoodam_get_option( 'notfound-bg-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[notfound-bg-style]', array(
				'type'    	  => 'textarea',
				'section'     => 'site-404-page-section',
				'label'       => esc_html__( 'Custom Inline Styles', 'pallikoodam' ),
				'description' => esc_html__('Paste custom CSS styles for not found page.', 'pallikoodam'),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'color:#ff00bb; text-align:left;', 'pallikoodam' ),
				),
			)
		)
	);