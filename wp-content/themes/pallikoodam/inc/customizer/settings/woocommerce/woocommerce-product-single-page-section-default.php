<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default Settings
 */
$wp_customize->add_section( 
	new PALLIKOODAM_WP_Customize_Section(
		$wp_customize,
		'woocommerce-product-single-page-default-section',
		array(
			'title'    => esc_html__('Default Settings', 'pallikoodam'),
			'panel'    => 'woocommerce-product-single-page-section',
			'priority' => 25,
		)
	)
);
	
	/**
	 * Option : Product Template
	 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-default-template]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-default-template' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-default-template]', array(
			'type'     => 'select',
			'label'    => esc_html__( 'Product Template', 'pallikoodam'),
			'section'  => 'woocommerce-product-single-page-default-section',
			'choices'  => apply_filters( 'pallikoodam_shop_page_widgetareas', array(
							'woo-default'     => esc_html__( 'WooCommerce Default', 'pallikoodam' ),
							'custom-template' => esc_html__( 'Custom Template', 'pallikoodam' )
						) )
		)
	);

	/**
	* Option : Enable Sale Countdown Timer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-sale-countdown-timer]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-sale-countdown-timer' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-sale-countdown-timer]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Sale Countdown Timer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-default-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

	/**
	* Option : Enable Size Guide Button
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-enable-size-guide]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-enable-size-guide' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-enable-size-guide]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Size Guide Button', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-default-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

	/**
	* Option : Enable Ajax Add To Cart
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-enable-ajax-addtocart]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-enable-ajax-addtocart' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-enable-ajax-addtocart]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Ajax Add To Cart', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-default-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

	/**
	* Option : Enable Breadcrumb
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-enable-breadcrumb]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-enable-breadcrumb' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-enable-breadcrumb]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Breadcrumb', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-default-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

	/**
	* Option : Sticky Add to Cart
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-addtocart-sticky]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-addtocart-sticky' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-addtocart-sticky]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Sticky Add to Cart', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-default-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

	/**
	* Option : Show Product 360 Viewer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-360-viewer]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-360-viewer' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-360-viewer]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Product 360 Viewer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-default-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'description'   => esc_html__('This option is applicable only for "WooCommerce Default" single page.', 'pallikoodam'),
			)
		)
	);