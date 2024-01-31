<?php
/**
 * Site Identity Main Panel
 */
$wp_customize->add_panel( 
	new PALLIKOODAM_WP_Customize_Panel(
		$wp_customize,
		'site-identity-main-panel',
		array(
			'title'    => esc_html__('Site Identity', 'pallikoodam'),
			'priority' => 5
		)
	)
);
	/**
	 * Site Identity Logo & Favicon Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-identity-logo-section',
			array(
				'title'    => esc_html__('Site Logo & Icon', 'pallikoodam'),
				'panel'    => 'site-identity-main-panel',
				'priority' => 5,
			)
		)
	);

	require_once 'site-identity-logo-section.php';

	/**
	 * Site Identity Colors & Background Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-identity-color-section',
			array(
				'title'    => esc_html__('Colors', 'pallikoodam'),
				'panel'    => 'site-identity-main-panel',
				'priority' => 10,
			)
		)
	);

	require_once 'site-identity-color-section.php';

	/**
	 * Site Identity Typography Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-identity-typography-section',
			array(
				'title'    => esc_html__('Typography', 'pallikoodam'),
				'panel'    => 'site-identity-main-panel',
				'priority' => 15,
			)
		)
	);

	require_once 'site-identity-typography-section.php';