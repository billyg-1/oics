<?php
/**
 * Site Sociable Main Section
 */
$wp_customize->add_section( 
	new PALLIKOODAM_WP_Customize_Section(
		$wp_customize,
		'site-sociable-main-section',
		array(
			'title'    => esc_html__('Sociable', 'pallikoodam'),
			'priority' => 10
		)
	)
);

/**
 * Option : Delicious
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-delicious]', array(
			'default'           => pallikoodam_get_option( 'sociable-delicious' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-delicious]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Delicious', 'pallikoodam' ),
				'description' => esc_html__('Put sociable url, wants to show on front-end.', 'pallikoodam'),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Delicious', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Deviantart
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-deviantart]', array(
			'default'           => pallikoodam_get_option( 'sociable-deviantart' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-deviantart]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Deviantart', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Deviantart', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Digg
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-digg]', array(
			'default'           => pallikoodam_get_option( 'sociable-digg' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-digg]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Digg', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Digg', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Dribbble
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-dribbble]', array(
			'default'           => pallikoodam_get_option( 'sociable-dribbble' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-dribbble]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Dribbble', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Dribbble', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Envelope
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-envelope]', array(
			'default'           => pallikoodam_get_option( 'sociable-envelope' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-envelope]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Envelope', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Envelope', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Facebook
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-facebook]', array(
			'default'           => pallikoodam_get_option( 'sociable-facebook' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-facebook]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Facebook', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Facebook', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Flickr
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-flickr]', array(
			'default'           => pallikoodam_get_option( 'sociable-flickr' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-flickr]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Flickr', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Flickr', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Google Plus
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-google-plus]', array(
			'default'           => pallikoodam_get_option( 'sociable-google-plus' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-google-plus]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Google Plus', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Google Plus', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : GTalk
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-gtalk]', array(
			'default'           => pallikoodam_get_option( 'sociable-gtalk' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-gtalk]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'GTalk', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'GTalk', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Instagram
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-instagram]', array(
			'default'           => pallikoodam_get_option( 'sociable-instagram' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-instagram]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Instagram', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Instagram', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Lastfm
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-lastfm]', array(
			'default'           => pallikoodam_get_option( 'sociable-lastfm' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-lastfm]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Lastfm', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Lastfm', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Linkedin
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-linkedin]', array(
			'default'           => pallikoodam_get_option( 'sociable-linkedin' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-linkedin]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Linkedin', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Linkedin', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Pinterest
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-pinterest]', array(
			'default'           => pallikoodam_get_option( 'sociable-pinterest' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-pinterest]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Pinterest', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Pinterest', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Reddit
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-reddit]', array(
			'default'           => pallikoodam_get_option( 'sociable-reddit' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-reddit]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Reddit', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Reddit', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : RSS
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-rss]', array(
			'default'           => pallikoodam_get_option( 'sociable-rss' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-rss]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'RSS', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'RSS', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Skype
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-skype]', array(
			'default'           => pallikoodam_get_option( 'sociable-skype' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-skype]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Skype', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Skype', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Stumbleupon
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-stumbleupon]', array(
			'default'           => pallikoodam_get_option( 'sociable-stumbleupon' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-stumbleupon]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Stumbleupon', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Stumbleupon', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Tumblr
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-tumblr]', array(
			'default'           => pallikoodam_get_option( 'sociable-tumblr' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-tumblr]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Tumblr', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Tumblr', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Twitter
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-twitter]', array(
			'default'           => pallikoodam_get_option( 'sociable-twitter' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-twitter]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Twitter', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Twitter', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Viadeo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-viadeo]', array(
			'default'           => pallikoodam_get_option( 'sociable-viadeo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-viadeo]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Viadeo', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Viadeo', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Vimeo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-vimeo]', array(
			'default'           => pallikoodam_get_option( 'sociable-vimeo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-vimeo]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Vimeo', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Vimeo', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Yahoo
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-yahoo]', array(
			'default'           => pallikoodam_get_option( 'sociable-yahoo' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-yahoo]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Yahoo', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Yahoo', 'pallikoodam' ),
				),
			)
		)
	);

/**
 * Option : Youtube
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[sociable-youtube]', array(
			'default'           => pallikoodam_get_option( 'sociable-youtube' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[sociable-youtube]', array(
				'type'    	  => 'text',
				'section'     => 'site-sociable-main-section',
//				'label'       => esc_html__( 'Youtube', 'pallikoodam' ),
				'input_attrs' => array(
					'placeholder' => esc_html__( 'Youtube', 'pallikoodam' ),
				),
			)
		)
	);