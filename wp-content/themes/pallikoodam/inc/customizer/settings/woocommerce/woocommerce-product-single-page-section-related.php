<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Related Settings
 */
$wp_customize->add_section( 
	new PALLIKOODAM_WP_Customize_Section(
		$wp_customize,
		'woocommerce-product-single-page-related-section',
		array(
			'title'    => esc_html__('Related Settings', 'pallikoodam'),
			'panel'    => 'woocommerce-product-single-page-section',
			'priority' => 35,
		)
	)
);
	

	/**
	* Option : Show Related Products
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-default-show-related]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-default-show-related' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-default-show-related]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Related Products', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-related-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

	/**
	 * Option : Related Title
	 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-related-title]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-related-title' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-related-title]', array(
			'type'       => 'text',
			'section'    => 'woocommerce-product-single-page-related-section',
			'label'      => esc_html__( 'Related Title', 'pallikoodam' )
		)
	);

	/**
	 * Option : Related Column
	 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-related-column]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-related-column' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Radio_Image(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-related-column]', array(
				'type'     => 'dt-radio-image',
				'label'    => esc_html__( 'Related Column', 'pallikoodam'),
				'section'  => 'woocommerce-product-single-page-related-section',
				'choices'  => apply_filters( 'pallikoodam_single_product_related_column_options', array(
					1  => array( 'label' => esc_html__( 'One Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-column.png' ),
					2 => array( 'label' => esc_html__( 'One Half Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-half-column.png' ),
					3 => array( 'label' => esc_html__( 'One Third Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-third-column.png' ),
					4 => array( 'label' => esc_html__( 'One Fourth Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-fourth-column.png' ),
				) )
			)
		)
	);

	/**
	* Option : Related Limit
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-related-limit]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-related-limit' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-related-limit]', array(
				'type'     => 'select',
				'label'    => esc_html__( 'Related Limit', 'pallikoodam'),
				'section'  => 'woocommerce-product-single-page-related-section',
				'choices'  => array (
					1 => esc_html__( '1', 'pallikoodam' ),
					2 => esc_html__( '2', 'pallikoodam' ),
					3 => esc_html__( '3', 'pallikoodam' ),
					4 => esc_html__( '4', 'pallikoodam' ),
					5 => esc_html__( '5', 'pallikoodam' ),
					6 => esc_html__( '6', 'pallikoodam' ),
					7 => esc_html__( '7', 'pallikoodam' ),
					8 => esc_html__( '8', 'pallikoodam' ),	
					9 => esc_html__( '9', 'pallikoodam' ),
					10 => esc_html__( '10', 'pallikoodam' ),	
				)
			)
		)
	);

	
	/**
	 * Option : Product Style Template
	 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-related-style-template]', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-related-style-template' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-related-style-template]', array(
				'type'     => 'select',
				'label'    => esc_html__( 'Product Style Template', 'pallikoodam'),
				'section'  => 'woocommerce-product-single-page-related-section',
				'choices'  => apply_filters( 'pallikoodam_shop_product_templates', pallikoodam_customizer_shop_product_templates() )
			)
		)
	);