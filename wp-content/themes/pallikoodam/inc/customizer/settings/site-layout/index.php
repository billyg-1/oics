<?php
/**
 * Site Layout Main Panel
 */
$wp_customize->add_panel( 
	new PALLIKOODAM_WP_Customize_Panel(
		$wp_customize,
		'site-layout-main-panel',
		array(
			'title'    => esc_html__('Site Layout', 'pallikoodam'),
			'priority' => 25
		)
	)
);
	/**
	 * Site Layout Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-layout-container-section',
			array(
				'title'    => esc_html__('Layout', 'pallikoodam'),
				'panel'    => 'site-layout-main-panel',
				'priority' => 5,
			)
		)
	);

		require_once 'site-layout-container-section.php';


	/**
	 * Site Typography Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'site-layout-typography-section',
			array(
				'title'    => esc_html__('Color & Typography', 'pallikoodam'),
				'panel'    => 'site-layout-main-panel',
				'priority' => 10,
			)
		)
	);
		require_once 'site-layout-typography-section-section.php';