<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sociable Share Settings
 */
$wp_customize->add_section( 
	new PALLIKOODAM_WP_Customize_Section(
		$wp_customize,
		'woocommerce-product-single-page-sociables-share-section',
		array(
			'title'    => esc_html__('Sociable Share Settings', 'pallikoodam'),
			'panel'    => 'woocommerce-product-single-page-section',
			'priority' => 40,
		)
	)
);
	
	/**
	* Option : Sharer Description
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-description]', array(
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-description]', array(
				'type'    => 'dt-description',
				'label'   => esc_html__( 'Note :', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'description'   => esc_html__( 'This option is applicable only for WooCommerce "Custom Template".', 'pallikoodam'),
			)
		)
	);

	/**
	* Option : Show Facebook Sharer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-facebook]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-sharer-facebook' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-facebook]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Facebook Sharer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);
	
	/**
	* Option : Show Delicious Sharer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-delicious]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-sharer-delicious' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-delicious]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Delicious Sharer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);
	
	/**
	* Option : Show Digg Sharer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-digg]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-sharer-digg' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-digg]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Digg Sharer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);
	
	/**
	* Option : Show Stumble Upon Sharer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-stumbleupon]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-sharer-stumbleupon' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-stumbleupon]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Stumble Upon Sharer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);
	
	/**
	* Option : Show Twitter Sharer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-twitter]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-sharer-twitter' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-twitter]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Twitter Sharer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);
	
	/**
	* Option : Show Google Plus Sharer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-googleplus]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-sharer-googleplus' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-googleplus]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Google Plus Sharer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);
	
	/**
	* Option : Show LinkedIn Sharer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-linkedin]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-sharer-linkedin' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-linkedin]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show LinkedIn Sharer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);
	
	/**
	* Option : Show Pinterest Sharer
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-pinterest]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-sharer-pinterest' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-sharer-pinterest]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Pinterest Sharer', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-share-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);