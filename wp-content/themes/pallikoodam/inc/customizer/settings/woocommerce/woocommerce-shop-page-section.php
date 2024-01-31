<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Option : Page Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-layout]', array(
			'default'           => pallikoodam_get_option( 'shop-page-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Radio_Image(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-layout]', array(
				'type'     => 'dt-radio-image',
				'label'    => esc_html__( 'Layout', 'pallikoodam'),
				'section'  => 'woocommerce-shop-page-section',
				'choices'  => apply_filters( 'pallikoodam_shop_page_layout_options', array(
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
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-show-standard-sidebar]', array(
			'default'           => pallikoodam_get_option( 'shop-page-show-standard-sidebar' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-show-standard-sidebar]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Standard Sidebar', 'pallikoodam'),
				'section' => 'woocommerce-shop-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array( 'shop-page-layout', 'any', 'with-left-sidebar,with-right-sidebar' )
			)
		)
	);

/**
 * Option : Widget Areas
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-widgetareas]', array(
			'default'           => pallikoodam_get_option( 'shop-page-widgetareas' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-widgetareas]', array(
			'type'     => 'select',
			'label'    => esc_html__( 'Choose Custom Widget Area', 'pallikoodam'),
			'section'  => 'woocommerce-shop-page-section',
			'choices'  => apply_filters( 'pallikoodam_shop_page_widgetareas', pallikoodam_customizer_custom_widgets() ),
			'dependency' => array( 'shop-page-layout', 'any', 'with-left-sidebar,with-right-sidebar' )
		)
	);

/**
 * Option : Products Per Page
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-product-per-page]', array(
			'default'           => pallikoodam_get_option( 'shop-page-product-per-page' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-product-per-page]', array(
			'type'       => 'number',
			'section'    => 'woocommerce-shop-page-section',
			'label'      => esc_html__( 'Products Per Page', 'pallikoodam' )
		)
	);


/**
 * Option : Product Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-product-layout]', array(
			'default'           => pallikoodam_get_option( 'shop-page-product-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Radio_Image(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-product-layout]', array(
				'type'     => 'dt-radio-image',
				'label'    => esc_html__( 'Product Layout', 'pallikoodam'),
				'section'  => 'woocommerce-shop-page-section',
				'choices'  => apply_filters( 'pallikoodam_shop_product_layout_options', array(
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
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-product-style-template]', array(
			'default'           => pallikoodam_get_option( 'shop-page-product-style-template' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-product-style-template]', array(
				'type'     => 'select',
				'label'    => esc_html__( 'Product Style Template', 'pallikoodam'),
				'section'  => 'woocommerce-shop-page-section',
				'choices'  => apply_filters( 'pallikoodam_shop_product_templates', pallikoodam_customizer_shop_product_templates() )
			)
		)
	);


/**
 * Option : Enable Breadcrumb
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-enable-breadcrumb]', array(
			'default'           => pallikoodam_get_option( 'shop-page-enable-breadcrumb' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-enable-breadcrumb]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Breadcrumb', 'pallikoodam'),
				'section' => 'woocommerce-shop-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);


/**
 * Option : Bottom Hook
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-bottom-hook]', array(
			'default'           => pallikoodam_get_option( 'shop-page-bottom-hook' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-bottom-hook]', array(
			'type'    => 'textarea',
			'label'   => esc_html__( 'Bottom Hook', 'pallikoodam'),
			'section' => 'woocommerce-shop-page-section'
		)
	);


/**
 * Divider : Separator
 */
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-separator1]', array(
				'type'     => 'dt-separator',
				'section'  => 'woocommerce-shop-page-section',
				'settings' => array()
			)
		)
	);


/**
 * Option : Show Sorter On Header
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-show-sorter-on-header]', array(
			'default'           => pallikoodam_get_option( 'shop-page-show-sorter-on-header' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-show-sorter-on-header]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Sorter On Header', 'pallikoodam'),
				'section' => 'woocommerce-shop-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);


/**
 * Option : Sorter Header Elements
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-sorter-header-elements]', array(
			'default'           => pallikoodam_get_option( 'shop-page-sorter-header-elements' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Sortable(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-sorter-header-elements]', array(
				'type'     => 'dt-sortable',
				'section'  => 'woocommerce-shop-page-section',
				'label'    => esc_html__( 'Sorter Header Elements', 'pallikoodam' ),
				'choices'  => array(
					'filter'               => esc_html__( 'Filter', 'pallikoodam' ),
					'result_count'         => esc_html__( 'Result Count', 'pallikoodam' ),
					'pagination'           => esc_html__( 'Pagination', 'pallikoodam' ),
					'display_mode'         => esc_html__( 'Display Mode', 'pallikoodam' ),
					'display_mode_options' => esc_html__( 'Display Mode Options', 'pallikoodam' ),
				)
			)
		)
	);


/**
 * Option : Show Sorter On Footer
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-show-sorter-on-footer]', array(
			'default'           => pallikoodam_get_option( 'shop-page-show-sorter-on-footer' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-show-sorter-on-footer]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Sorter On Footer', 'pallikoodam'),
				'section' => 'woocommerce-shop-page-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);


/**
 * Option : Sorter Footer Elements
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[shop-page-sorter-footer-elements]', array(
			'default'           => pallikoodam_get_option( 'shop-page-sorter-footer-elements' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Sortable(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[shop-page-sorter-footer-elements]', array(
				'type'     => 'dt-sortable',
				'section'  => 'woocommerce-shop-page-section',
				'label'    => esc_html__( 'Sorter Footer Elements', 'pallikoodam' ),
				'choices'  => array(
					'filter'               => esc_html__( 'Filter', 'pallikoodam' ),
					'result_count'         => esc_html__( 'Result Count', 'pallikoodam' ),
					'pagination'           => esc_html__( 'Pagination', 'pallikoodam' ),
					'display_mode'         => esc_html__( 'Display Mode', 'pallikoodam' ),
					'display_mode_options' => esc_html__( 'Display Mode Options', 'pallikoodam' ),
				)
			)
		)
	);