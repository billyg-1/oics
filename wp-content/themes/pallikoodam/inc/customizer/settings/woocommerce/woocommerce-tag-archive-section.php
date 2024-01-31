<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Page Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-layout]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-tag-archive-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Radio_Image(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-layout]', array(
				'type'     => 'dt-radio-image',
				'label'    => esc_html__( 'Layout', 'pallikoodam'),
				'section'  => 'woocommerce-tag-archive-section',
				'choices'  => apply_filters( 'pallikoodam_tag_archive_layout_options', array(
					'content-full-width'  => array( 'label' => esc_html__( 'Without Sidebar', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/without-sidebar.png' ),
					'with-left-sidebar' => array( 'label' => esc_html__( 'Left Sidebar', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/left-sidebar.png' ),
					'with-right-sidebar' => array( 'label' => esc_html__( 'Right Sidebar', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/right-sidebar.png' ),
				) )
			)
		)
	);

/**
 * Option : Show Standard Sidebar
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-show-standard-sidebar]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-tag-archive-show-standard-sidebar' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-show-standard-sidebar]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Standard Sidebar', 'pallikoodam'),
				'section' => 'woocommerce-tag-archive-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array( 'dt-woo-tag-archive-layout', 'any', 'with-left-sidebar,with-right-sidebar' )
			)
		)
	);

/**
 * Option : Widget Areas
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-widgetareas]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-tag-archive-widgetareas' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-widgetareas]', array(
			'type'     => 'select',
			'label'    => esc_html__( 'Choose Custom Widget Area', 'pallikoodam'),
			'section'  => 'woocommerce-tag-archive-section',
			'choices'  => apply_filters( 'pallikoodam_tag_archive_widgetareas', pallikoodam_customizer_custom_widgets() ),
			'dependency' => array( 'dt-woo-tag-archive-layout', 'any', 'with-left-sidebar,with-right-sidebar' )
		)
	);

/**
 * Option : Products Per Page
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-product-per-page]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-tag-archive-product-per-page' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-product-per-page]', array(
			'type'       => 'number',
			'section'    => 'woocommerce-tag-archive-section',
			'label'      => esc_html__( 'Products Per Page', 'pallikoodam' )
		)
	);


/**
 * Option : Product Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-product-layout]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-tag-archive-product-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Radio_Image(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-product-layout]', array(
				'type'     => 'dt-radio-image',
				'label'    => esc_html__( 'Product Layout', 'pallikoodam'),
				'section'  => 'woocommerce-tag-archive-section',
				'choices'  => apply_filters( 'pallikoodam_tag_archive_product_layout_options', array(
					1  => array( 'label' => esc_html__( 'One Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-column.png' ),
					2 => array( 'label' => esc_html__( 'One Half Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-half-column.png' ),
					3 => array( 'label' => esc_html__( 'One Third Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-third-column.png' ),
					4 => array( 'label' => esc_html__( 'One Fourth Column', 'pallikoodam' ), 'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/woocommerce/one-fourth-column.png' ),
				) )
			)
		)
	);

/**
 * Option : Product Style Template
 */
$wp_customize->add_setting(
	PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-product-style-template]', array(
		'default'           => pallikoodam_get_option( 'dt-woo-tag-product-style-template' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-product-style-template]', array(
			'type'     => 'select',
			'label'    => esc_html__( 'Product Style Template', 'pallikoodam'),
			'section'  => 'woocommerce-tag-archive-section',
			'choices'  => apply_filters( 'pallikoodam_shop_product_templates', pallikoodam_customizer_shop_product_templates() )
		)
	)
);

/**
 * Option : Enable Breadcrumb
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-enable-breadcrumb]', array(
			'default'           => pallikoodam_get_option( 'dt-woo-tag-archive-enable-breadcrumb' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-woo-tag-archive-enable-breadcrumb]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Breadcrumb', 'pallikoodam'),
				'section' => 'woocommerce-tag-archive-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);