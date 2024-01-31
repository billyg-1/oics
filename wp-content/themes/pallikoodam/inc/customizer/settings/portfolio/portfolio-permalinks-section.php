<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Option : Single Portfolio Slug
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[single-portfolio-slug]', array(
			'default'           => pallikoodam_get_option( 'single-portfolio-slug' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[single-portfolio-slug]', array(
			'type'       => 'text',
			'section'    => 'portfolio-permalinks-section',
			'label'      => esc_html__( 'Single Portfolio Slug', 'pallikoodam' )
		)
	);	


/**
 * Option : Portfolio Category Slug
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-category-slug]', array(
			'default'           => pallikoodam_get_option( 'portfolio-category-slug' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-category-slug]', array(
			'type'       => 'text',
			'section'    => 'portfolio-permalinks-section',
			'label'      => esc_html__( 'Portfolio Category Slug', 'pallikoodam' )
		)
	);

/**
 * Option : Portfolio Tag Slug
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-tag-slug]', array(
			'default'           => pallikoodam_get_option( 'portfolio-tag-slug' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		PALLIKOODAM_THEME_SETTINGS . '[portfolio-tag-slug]', array(
			'type'       => 'text',
			'section'    => 'portfolio-permalinks-section',
			'label'      => esc_html__( 'Portfolio Tag Slug', 'pallikoodam' )
		)
	);