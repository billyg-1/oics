<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Enable Coming Soon
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-comingsoon]', array(
			'default'           => pallikoodam_get_option( 'enable-comingsoon' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-comingsoon]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Coming Soon', 'pallikoodam'),
				'description' => esc_html__('YES! to check under construction page of your website.', 'pallikoodam'),
				'section' => 'site-comingsoon-page-section',
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
		PALLIKOODAM_THEME_SETTINGS . '[comingsoon-style]', array(
			'default'           => pallikoodam_get_option( 'comingsoon-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[comingsoon-style]', array(
			'type'    => 'select',
			'section' => 'site-comingsoon-page-section',
			'label'   => esc_html__( 'Template Style', 'pallikoodam' ),
			'choices' => array(
				'type1'  => esc_html__('Diamond', 'pallikoodam'),
				'type2'  => esc_html__('Teaser', 'pallikoodam'),
				'type3'  => esc_html__('Minimal', 'pallikoodam'),
				'type4'  => esc_html__('Counter Only', 'pallikoodam'),
				'type5'  => esc_html__('Belt', 'pallikoodam'),
				'type6'  => esc_html__('Classic', 'pallikoodam'),
				'type7'  => esc_html__('Boxed', 'pallikoodam')
			),
			'description' => esc_html__('Choose the style of coming soon template.', 'pallikoodam'),
		)
	));

/**
 * Option : Comingsoon Dark BG
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[uc-darkbg]', array(
			'default'           => pallikoodam_get_option( 'uc-darkbg' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[uc-darkbg]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Coming Soon Dark BG', 'pallikoodam'),
				'description' => esc_html__('YES! to use dark bg coming soon page for this site.', 'pallikoodam'),
				'section' => 'site-comingsoon-page-section',
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
		PALLIKOODAM_THEME_SETTINGS . '[comingsoon-pageid]', array(
			'default'           => pallikoodam_get_option( 'comingsoon-pageid' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[comingsoon-pageid]', array(
			'type'    => 'select',
			'section' => 'site-comingsoon-page-section',
			'label'   => esc_html__( 'Custom Page', 'pallikoodam' ),
			'choices' => pallikoodam_get_customizer_pages(),
			'description' => esc_html__('Choose the page for comingsoon content.', 'pallikoodam'),
		)
	));

/**
 * Option : Show Launch Date
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[show-launchdate]', array(
			'default'           => pallikoodam_get_option( 'show-launchdate' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[show-launchdate]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Launch Date', 'pallikoodam'),
				'description' => esc_html__('YES! to show launch date text.', 'pallikoodam'),
				'section' => 'site-comingsoon-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Launch Date
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[comingsoon-launchdate]', array(
			'default'           => pallikoodam_get_option( 'comingsoon-launchdate' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[comingsoon-launchdate]', array(
				'type'    	  => 'text',
				'section'     => 'site-comingsoon-page-section',
				'label'       => esc_html__( 'Launch Date', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => '10/30/2016 12:00:00',
				),
				'description' => esc_html__('Put Format: 12/30/2016 12:00:00 month/day/year hour:minute:second', 'pallikoodam'),
			)
		)
	);

/**
 * Option : Timezone
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[comingsoon-timezone]', array(
			'default'           => pallikoodam_get_option( 'comingsoon-timezone' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[comingsoon-timezone]', array(
			'type'    => 'select',
			'section' => 'site-comingsoon-page-section',
			'label'   => esc_html__( 'UTC Timezone', 'pallikoodam' ),
			'choices' => array(
				'-12' => '-12', '-11' => '-11', '-10' => '-10', '-9' => '-9', '-8' => '-8', '-7' => '-7', '-6' => '-6', '-5' => '-5', 
				'-4' => '-4', '-3' => '-3', '-2' => '-2', '-1' => '-1', '0' => '0', '+1' => '+1', '+2' => '+2', '+3' => '+3', '+4' => '+4',
				'+5' => '+5', '+6' => '+6', '+7' => '+7', '+8' => '+8', '+9' => '+9', '+10' => '+10', '+11' => '+11', '+12' => '+12'
			),
			'description' => esc_html__('Choose utc timezone, by default UTC:00:00', 'pallikoodam'),
		)
	));

/**
 * Option : Comingsoon Background
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[comingsoon_background]', array(
			'default'           =>  '',
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Background(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[comingsoon_background]', array(
				'type'    => 'dt-background',
				'section' => 'site-comingsoon-page-section',
				'label'   => esc_html__( 'Background', 'pallikoodam' ),
			)
		)		
	);

/**
 * Option : Custom Styles
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[comingsoon-bg-style]', array(
			'default'           => pallikoodam_get_option( 'comingsoon-bg-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[comingsoon-bg-style]', array(
				'type'    	  => 'textarea',
				'section'     => 'site-comingsoon-page-section',
				'label'       => esc_html__( 'Custom Inline Styles', 'pallikoodam' ),
				'description' => esc_html__('Paste custom CSS styles for under construction page.', 'pallikoodam'),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'color:#ff00bb; text-align:left;', 'pallikoodam' ),
				),
			)
		)
	);