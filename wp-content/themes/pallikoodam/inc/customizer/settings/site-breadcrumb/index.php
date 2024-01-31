<?php
/**
 * Site Breadcrumb Main Panel
 */
$wp_customize->add_panel( 
	new PALLIKOODAM_WP_Customize_Panel(
		$wp_customize,
		'site-breadcrumb-main-panel',
		array(
			'title'    => esc_html__('Site Breadcrumb', 'pallikoodam'),
			'priority' => 10
		)
	)
);
	/**
	 * Breadcrumb Layout Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-breadcrumb-container-section',
			array(
				'title'    => esc_html__('Layout', 'pallikoodam'),
				'panel'    => 'site-breadcrumb-main-panel',
				'priority' => 5,
			)
		)
	);

	require_once 'site-breadcrumb-layout-section.php';


	/**
	 * Breadcrumb Color & Background Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-breadcrumb-color-section',
			array(
				'title'    => esc_html__('Colors & Background', 'pallikoodam'),
				'panel'    => 'site-breadcrumb-main-panel',
				'priority' => 10,
			)
		)
	);

	require_once 'site-breadcrumb-color-section.php';


	/**
	 * Breadcrumb Typography Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-breadcrumb-typography-section',
			array(
				'title'    => esc_html__('Typography', 'pallikoodam'),
				'panel'    => 'site-breadcrumb-main-panel',
				'priority' => 15,
			)
		)
	);

	require_once 'site-breadcrumb-typo-section.php';