<?php
/**
 * Site General Section
 */
$wp_customize->add_section( 
	new PALLIKOODAM_WP_Customize_Section(
		$wp_customize,
		'site-general-section',
		array(
			'title'    => esc_html__('Site General', 'pallikoodam'),
			'priority' => 1
		)
	)
);

	/**
	 * Option : Custom Header
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[site-custom-header]', array(
				'default'           => pallikoodam_get_option( 'site-custom-header' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
			)
		);

		$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[site-custom-header]', array(
				'type'    => 'select',
				'section' => 'site-general-section',
				'label'   => esc_html__( 'Site Header', 'pallikoodam' ),
				'choices' => pallikoodam_get_customizer_cpt_post_list( 'dt_headers', esc_html__('Select Header', 'pallikoodam' ) ),
				'description' => esc_html__('Choose the header for your site.', 'pallikoodam'),
			)
		));

	/**
	 * Option : Custom Footer
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[site-custom-footer]', array(
				'default'           => pallikoodam_get_option( 'site-custom-footer' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
			)
		);

		$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[site-custom-footer]', array(
				'type'    => 'select',
				'section' => 'site-general-section',
				'label'   => esc_html__( 'Site Footer', 'pallikoodam' ),
				'choices' => pallikoodam_get_customizer_cpt_post_list( 'dt_footers', esc_html__('Select Footer', 'pallikoodam' ) ),
				'description' => esc_html__('Choose the footer for your site.', 'pallikoodam'),
			)
		));

	/**
	 * Option : Show Loader
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[show-loader]', array(
				'default'           => pallikoodam_get_option( 'show-loader' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Switch(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[show-loader]', array(
					'type'    => 'dt-switch',
					'label'   => esc_html__( 'Site Loader', 'pallikoodam'),
					'section' => 'site-general-section',
					'choices' => array(
						'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
						'off' => esc_attr__( 'No', 'pallikoodam' )
					)
				)
			)
		);

	/**
	 * Option : Show Page Comments
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[show-pagecomments]', array(
				'default'           => pallikoodam_get_option( 'show-pagecomments' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Switch(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[show-pagecomments]', array(
					'type'        => 'dt-switch',
					'label'       => esc_html__( 'Globally Show Page Comments', 'pallikoodam'),
					'section'     => 'site-general-section',
					'description' => esc_html__('YES! to show comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings.', 'pallikoodam'),
					'choices'     => array(
						'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
						'off' => esc_attr__( 'No', 'pallikoodam' )
					)
				)
			)
		);

	/**
	 * Option : Show all Pages in Pagination
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[showall-pagination]', array(
				'default'           => pallikoodam_get_option( 'showall-pagination' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),				
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Switch(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[showall-pagination]', array(
					'type'        => 'dt-switch',
					'label'       => esc_html__( 'Show all pages in Pagination', 'pallikoodam'),
					'section'     => 'site-general-section',
					'description' => esc_html__('YES! to show all the pages instead of dots near the current page.', 'pallikoodam'),
					'choices'     => array(
						'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
						'off' => esc_attr__( 'No', 'pallikoodam' )
					)
				)
			)
		);

	/**
	 * Option : Google Map Key
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[google-map-key]', array(
				'default'           => pallikoodam_get_option( 'google-map-key' ),
				'type'              => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			)
		);

		$wp_customize->add_control(
			PALLIKOODAM_THEME_SETTINGS . '[google-map-key]', array(
				'type'    	  => 'text',
				'section'     => 'site-general-section',
				'label'       => esc_html__( 'Google Map Key', 'pallikoodam' ),
				'description' => esc_html__('Put a valid google account api key here', 'pallikoodam'),
			)
		);

	/**
	 * Option : Mailchimp Key
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[mailchimp-key]', array(
				'default'           => pallikoodam_get_option( 'mailchimp-key' ),
				'type'              => 'option',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
			)
		);

		$wp_customize->add_control(
			PALLIKOODAM_THEME_SETTINGS . '[mailchimp-key]', array(
				'type'    	  => 'text',
				'section'     => 'site-general-section',
				'label'       => esc_html__( 'Mailchimp Key', 'pallikoodam' ),
				'description' => esc_html__('Put a valid mailchimp account api key here', 'pallikoodam'),
			)
		);

	/**
	 * Option : Show To Top
	 */
		$wp_customize->add_setting(
			PALLIKOODAM_THEME_SETTINGS . '[show-to-top]', array(
				'default'           => pallikoodam_get_option( 'show-to-top' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
			)
		);

		$wp_customize->add_control(
			new PALLIKOODAM_Customize_Control_Switch(
				$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[show-to-top]', array(
					'type'    => 'dt-switch',
					'label'   => esc_html__( 'Show To Top', 'pallikoodam'),
					'section' => 'site-general-section',
					'description' => esc_html__('YES! to enable to top for your site.', 'pallikoodam'),
					'choices' => array(
						'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
						'off' => esc_attr__( 'No', 'pallikoodam' )
					)
				)
			)
		);		