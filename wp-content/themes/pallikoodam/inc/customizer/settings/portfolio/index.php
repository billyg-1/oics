<?php
/**
 * Portfolio Main Panel
 */
$wp_customize->add_panel( 
	new PALLIKOODAM_WP_Customize_Panel(
		$wp_customize,
		'portfolio-main-panel',
		array(
			'title'    => esc_html__('Portfolio', 'pallikoodam'),
			'priority' => 125
		)
	)
);



	/**
	 * Portfolio Archive Page Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'portfolio-archive-page-section',
			array(
				'title'    => esc_html__('Archive Pages', 'pallikoodam'),
				'panel'    => 'portfolio-main-panel',
				'priority' => 5,
			)
		)
	);

	require_once 'portfolio-archive-page-section.php';

	/**
	 * Portfolio Permalinks Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'portfolio-permalinks-section',
			array(
				'title'    => esc_html__('Permalinks', 'pallikoodam'),
				'panel'    => 'portfolio-main-panel',
				'priority' => 10,
			)
		)
	);

	require_once 'portfolio-permalinks-section.php';

	/**
	 * Custom Fields Section 
	 */
	$wp_customize->add_section( 
		new PALLIKOODAM_WP_Customize_Section(
			$wp_customize,
			'portfolio-custom-fields-section',
			array(
				'title'    => esc_html__('Custom Fields', 'pallikoodam'),
				'panel'    => 'portfolio-main-panel',
				'priority' => 15,
			)
		)
	);

	require_once 'portfolio-custom-fields-section.php';