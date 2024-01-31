<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Global Sidebar Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[site-global-sidebar-layout]', array(
			'default'           => pallikoodam_get_option( 'site-global-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Radio_Image(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[site-global-sidebar-layout]', array(
			'type' => 'dt-radio-image',
			'label' => esc_html__( 'Global Sidebar Layout', 'pallikoodam'),
			'section' => 'site-global-sidebar-section',
			'choices' => apply_filters( 'pallikoodam_global_sidebar_layout_options', array(
				'content-full-width' => array(
					'label' => esc_html__( 'Without Sidebar', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/without-sidebar.png'
				),
				'with-left-sidebar' => array(
					'label' => esc_html__( 'Left Sidebar', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/left-sidebar.png'
				),
				'with-right-sidebar' => array(
					'label' => esc_html__( 'Right Sidebar', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/right-sidebar.png'
				),
				'with-both-sidebar' => array(
					'label' => esc_html__( 'Both Sidebar', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/both-sidebar.png'
				),
			)),
			'description' => esc_html__('Choose sidebar layout for site wide.', 'pallikoodam')
        )
    ));