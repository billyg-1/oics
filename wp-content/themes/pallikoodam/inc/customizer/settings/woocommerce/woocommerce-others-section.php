<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
* Option : Enable Plus / Minus Button - Quantity
*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-quantity-plusnminus]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-quantity-plusnminus' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-quantity-plusnminus]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Plus / Minus Button - Quantity', 'pallikoodam'),
				'section' => 'woocommerce-others-section',
				'choices' => array(
					'on'  => esc_html__( 'Yes', 'pallikoodam' ),
					'off' => esc_html__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Divider : Separator
 */
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-separator1]', array(
				'type'     => 'dt-separator',
				'section'  => 'woocommerce-others-section',
				'settings' => array()
			)
		)
	);

/**
 * Option : Add To Cart Custom Action
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-addtocart-custom-action]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-addtocart-custom-action' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-addtocart-custom-action]', array(
				'type'     => 'select',
				'label'    => esc_html__( 'Add To Cart Custom Action', 'pallikoodam'),
				'section'  => 'woocommerce-others-section',
				'choices'  => apply_filters( 'pallikoodam_others_addtocart_custom_action', 
					array(
						''                    => esc_html__('None', 'pallikoodam'),
						'sidebar_widget'      => esc_html__('Sidebar Widget', 'pallikoodam'),
						'notification_widget' => esc_html__('Notification Widget', 'pallikoodam'),
					)
				)
			)
		)
	);

/**
 * Option : Cross Sell Product Column
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-cross-sell-column]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-cross-sell-column' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Radio_Image(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-cross-sell-column]', array(
				'type'     => 'dt-radio-image',
				'label'    => esc_html__( 'Cross Sell Product Column', 'pallikoodam'),
				'section'  => 'woocommerce-others-section',
				'choices'  => apply_filters( 'pallikoodam_cross_sell_column_options', array(
					2 => array( 'label' => esc_html__( 'One Half Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-half-column.png' ),
					3 => array( 'label' => esc_html__( 'One Third Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-third-column.png' ),
					4 => array( 'label' => esc_html__( 'One Fourth Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-fourth-column.png' ),
				) )
			)
		)
	);

/**
 * Option : Cross Sell Title
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-cross-sell-title]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-cross-sell-title' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-cross-sell-title]', array(
			'type'       => 'text',
			'section'    => 'woocommerce-others-section',
			'label'      => esc_html__( 'Cross Sell Title', 'pallikoodam' )
		)
	);

/**
 * Option : Product Style Template
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-cross-sell-style-template]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-cross-sell-style-template' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-cross-sell-style-template]', array(
				'type'     => 'select',
				'label'    => esc_html__( 'Product Style Template', 'pallikoodam'),
				'section'  => 'woocommerce-others-section',
				'choices'  => apply_filters( 'pallikoodam_shop_product_templates', pallikoodam_customizer_shop_product_templates() )
			)
		)
	);	