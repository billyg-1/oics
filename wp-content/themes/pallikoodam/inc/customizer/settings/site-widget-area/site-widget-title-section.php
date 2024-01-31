<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Widget Title Tag
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[widget-title-tag]', array(
			'default'           => pallikoodam_get_option( 'widget-title-tag' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[widget-title-tag]', array(
			'type'    => 'select',
			'section' => 'site-widgets-title-section',
			'label'   => esc_html__( 'Title Tag', 'pallikoodam' ),
			'choices' => array(
				'h2'   => 'h2',
				'h3'   => 'h3',
				'h4'   => 'h4',
				'h5'   => 'h5',
				'h6'   => 'h6',
				'span' => 'span',
				'div'  => 'div',
				'p'    => 'p',
			)
		)
	);

	/**
	 * Divider
	 */	
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-tag-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section'  => 'site-widgets-title-section',
				'settings' => array(),
			)
		)
	);

	/**
	 * Option : Widget Title Style
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[widget-title-style]', array(
				'default'           => pallikoodam_get_option( 'widget-title-style' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-style]', array(
					'type'    => 'select',
					'section' => 'site-widgets-title-section',
					'label'   => esc_html__( 'Title Style', 'pallikoodam' ),
					'choices' => array(
						'default'=> esc_html__('Default', 'pallikoodam'),
						'type1'  => esc_html__('Double Border', 'pallikoodam'),
						'type2'  => esc_html__('Tooltip', 'pallikoodam'),
						'type3'  => esc_html__('Title Top Border', 'pallikoodam'),
						'type4'  => esc_html__('Left Border & Pattren', 'pallikoodam'),
						'type5'  => esc_html__('Bottom Border', 'pallikoodam'),
						'type6'  => esc_html__('Tooltip Border', 'pallikoodam'),
						'type7'  => esc_html__('Boxed Modern', 'pallikoodam'),
						'type8'  => esc_html__('Elegant Border', 'pallikoodam'),
						'type9'  => esc_html__('Needle', 'pallikoodam'),
						'type10' => esc_html__('Ribbon', 'pallikoodam'),
						'type11' => esc_html__('Content Background', 'pallikoodam'),
						'type12' => esc_html__('Classic BG', 'pallikoodam'),
						'type13' => esc_html__('Tiny Boders', 'pallikoodam'),
						'type14' => esc_html__('BG & Border', 'pallikoodam'),
						'type15' => esc_html__('Classic BG Alt', 'pallikoodam'),
						'type16' => esc_html__('Left Border & BG', 'pallikoodam'),
						'type17' => esc_html__('BG & Pattern', 'pallikoodam'),
					)
				)	
			)
		);

	/**
	 * Divider
	 */	
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-style-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section'  => 'site-widgets-title-section',
				'settings' => array(),
			)
		)
	);

// Widget Title Color Section

	/**
	 * Option : Widget Title Color
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[widget-title-color]', array(
				'default'           => pallikoodam_get_option( 'widget-title-color' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Color(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-color]', array(
					'type'    => 'dt-color',
					'label'   => esc_html__( 'Title Color', 'pallikoodam' ),
					'section' => 'site-widgets-title-section',
				)
			)
		);

		/**
		 * Divider
		 */	
		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Separator(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-color-bottom-separator]', array(
					'type'     => 'dt-separator',
					'section'  => 'site-widgets-title-section',
					'settings' => array(),
				)
			)
		);

// Widget Title Border Color Section ( Widget Title Style = Double Border )

	/**
	 * Option : Widget Title Color
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[widget-title-border-color]', array(
				'default'           => pallikoodam_get_option( 'widget-title-border-color' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Color(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-border-color]', array(
					'type'    => 'dt-color',
					'label'   => esc_html__( 'Title Border Color', 'pallikoodam' ),
					'dependency' => array( 'widget-title-style', 'any', 'type1,type3,type4,type5,type6,type7,type8,type9,type10,type13,type14,type16'),
					'section' => 'site-widgets-title-section',
				)
			)
		);

		/**
		 * Divider
		 */	
		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Separator(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-border-bottom-separator]', array(
					'type'     => 'dt-separator',
					'dependency' => array( 'widget-title-style', 'any', 'type1,type3,type4,type5,type6,type7,type8,type9,type10,type13,type14,type16'),
					'section'  => 'site-widgets-title-section',
					'settings' => array(),
				)
			)
		);		

	// Widget Title Background Section

	/**
	 * Option : Widget Title Background Color
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[widget-title-bg-color]', array(
				'default'           =>  pallikoodam_get_option( 'widget-title-bg-color' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Color(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-bg-color]', array(
					'type'    => 'dt-color',
					'label'   => esc_html__( 'Title Background Color', 'pallikoodam' ),
					'dependency' => array( 'widget-title-style', 'any', 'type2,type10,type12,type14,type15,type17' ),
					'section' => 'site-widgets-title-section',
				)
			)
		);

		/**
		 * Divider
		 */	
		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Separator(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-bg-color-bottom-separator]', array(
					'type'     => 'dt-separator',
					'dependency' => array( 'widget-title-style', 'any', 'type2,type10,type12,type14,type15,type17' ),
					'section'  => 'site-widgets-title-section',
					'settings' => array(),
				)
			)
		);

	// Widget Background Section

	/**
	 * Option : Widget Background Color
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[widget-bg-color]', array(
				'default'           =>  pallikoodam_get_option( 'widget-bg-color' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Color(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-bg-color]', array(
					'type'    => 'dt-color',
					'label'   => esc_html__( 'Widget Background Color', 'pallikoodam' ),
					'dependency' => array( 'widget-title-style', 'any', 'type11,type12' ),
					'section' => 'site-widgets-title-section',
				)
			)
		);

		/**
		 * Divider
		 */	
		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Separator(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-bg-bottom-separator]', array(
					'type'     => 'dt-separator',
					'dependency' => array( 'widget-title-style', 'any', 'type11,type12' ),
					'section'  => 'site-widgets-title-section',
					'settings' => array(),
				)
			)
		);
			

// Widget Title Typography Section

	/**
	 * Option : Widget Title Typography
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[widget-title-typo]', array(
				'default'           =>  pallikoodam_get_option( 'widget-title-typo' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Typography(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[widget-title-typo]', array(
					'type'    => 'dt-typography',
					'section' => 'site-widgets-title-section',
					'label'   => esc_html__( 'Title Typography', 'pallikoodam'),
				)
			)
		);