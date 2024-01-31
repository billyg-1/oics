<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Option : Enable Cookie Consent
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-cookie-consent]', array (
			'default'           => pallikoodam_get_option( 'enable-cookie-consent' ),
			'type'              => 'option',
			'sanitize_callback' => array ( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-cookie-consent]', array (
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Cookie Message Bar', 'pallikoodam'),
				'description'   => esc_html__('Enable cookie consent message bar', 'pallikoodam'),
				'section' => 'cookie-consent-section',
				'choices' => array (
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
* Option : Cookie Consent Message
*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[cookie-consent-msg]', array (
			'default'           => pallikoodam_get_option( 'cookie-consent-msg' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[cookie-consent-msg]', array (
				'type'    => 'textarea',
				'label'   => esc_html__( 'Message', 'pallikoodam'),
				'description'   => esc_html__('Provide a message which indicates that your site uses cookies.', 'pallikoodam'),
				'section' => 'cookie-consent-section',
				'dependency' => array ( 'enable-cookie-consent', '==', '1' )
			)
		)
	);

/**
 * Option : Message Bar Position
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[cookie-bar-position]', array(
			'default'           => pallikoodam_get_option( 'cookie-bar-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[cookie-bar-position]', array(
				'type'     => 'select',
				'label'    => esc_html__( 'Message Bar Position', 'pallikoodam'),
				'section'  => 'cookie-consent-section',
				'choices'  => apply_filters( 'pallikoodam_others_addtocart_custom_action', 
					array(
						'top' 	        => esc_html__('Top', 'pallikoodam'),
						'bottom'       => esc_html__('Bottom', 'pallikoodam'),
						'top-left' 	   => esc_html__('Top Left Corner', 'pallikoodam'),
						'top-right' 	  => esc_html__('Top Right Corner', 'pallikoodam'),
						'bottom-left'	 => esc_html__('Bottom Left Corner', 'pallikoodam'),
						'bottom-right' => esc_html__('Bottom Right Corner', 'pallikoodam'),
					)
				),
				'dependency' => array ( 'enable-cookie-consent', '==', '1' )
			)
		)
	);

/**
 * Option : Enable Dismiss the notification
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-dismiss-the-notification]', array (
			'default'           => pallikoodam_get_option( 'enable-dismiss-the-notification' ),
			'type'              => 'option',
			'sanitize_callback' => array ( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-dismiss-the-notification]', array (
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Dismiss the notification', 'pallikoodam'),
				'section' => 'cookie-consent-section',
				'choices' => array (
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array ( 'enable-cookie-consent', '==', '1' )
			)
		)
	);

/**
 * Option : Dismiss the notification label
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dismiss-the-notification-label]', array(
			'default'           => pallikoodam_get_option( 'dismiss-the-notification-label' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dismiss-the-notification-label]', array(
				'type'       => 'text',
				'section' 	 => 'cookie-consent-section',
				'label'      => esc_html__( 'Dismiss the notification label', 'pallikoodam' ),
				'dependency' => array ( 'enable-cookie-consent|enable-dismiss-the-notification', '==|==', '1|1' )
			)
		)
	);

/**
 * Option : Enable Link to another page
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-link-to-another-page]', array (
			'default'           => pallikoodam_get_option( 'enable-link-to-another-page' ),
			'type'              => 'option',
			'sanitize_callback' => array ( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-link-to-another-page]', array (
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Link to another page', 'pallikoodam'),
				'section' => 'cookie-consent-section',
				'choices' => array (
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array ( 'enable-cookie-consent', '==', '1' )
			)
		)
	);

/**
 * Option : Link to another page label
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[link-to-another-page-label]', array(
			'default'           => pallikoodam_get_option( 'link-to-another-page-label' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[link-to-another-page-label]', array(
				'type'       => 'text',
				'section' 	 => 'cookie-consent-section',
				'label'      => esc_html__( 'Link to another page label', 'pallikoodam' ),
				'dependency' => array ( 'enable-cookie-consent|enable-link-to-another-page', '==|==', '1|1' )
			)
		)
	);

/**
 * Option : Link to another page link
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[link-to-another-page-link]', array(
			'default'           => pallikoodam_get_option( 'link-to-another-page-link' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[link-to-another-page-link]', array(
				'type'       => 'text',
				'section' 	 => 'cookie-consent-section',
				'label'      => esc_html__( 'Link to another page link', 'pallikoodam' ),
				'dependency' => array ( 'enable-cookie-consent|enable-link-to-another-page', '==|==', '1|1' )
			)
		)
	);

/**
 * Option : Enable Open info modal on privacy and cookies
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-open-infomodal-on-privacy-and-cookies]', array (
			'default'           => pallikoodam_get_option( 'enable-dismiss-the-notification' ),
			'type'              => 'option',
			'sanitize_callback' => array ( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-open-infomodal-on-privacy-and-cookies]', array (
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Open info modal on privacy and cookies', 'pallikoodam'),
				'section' => 'cookie-consent-section',
				'choices' => array (
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array ( 'enable-cookie-consent', '==', '1' )
			)
		)
	);

/**
* Option : Open info modal on privacy and cookies label
*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[open-infomodal-on-privacy-and-cookies-label]', array(
			'default'           => pallikoodam_get_option( 'open-infomodal-on-privacy-and-cookies-label' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[open-infomodal-on-privacy-and-cookies-label]', array(
				'type'       => 'text',
				'section' 	 => 'cookie-consent-section',
				'label'      => esc_html__( 'Open info modal on privacy and cookies label', 'pallikoodam' ),
				'dependency' => array ( 'enable-cookie-consent|enable-open-infomodal-on-privacy-and-cookies', '==|==', '1|1' )
			)
		)
	);


/**
 * Option : Model Window Custom Content
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-custom-model-content]', array (
			'default'           => pallikoodam_get_option( 'enable-custom-model-content' ),
			'type'              => 'option',
			'sanitize_callback' => array ( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-custom-model-content]', array (
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Model Window Custom Content', 'pallikoodam'),
				'description'   => esc_html__('Instead of displaying the default content set custom content yourself', 'pallikoodam'),
				'section' => 'cookie-consent-section',
				'choices' => array (
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array ( 'enable-cookie-consent', '==', '1' )
			)
		)
	);

/**
 * Option : Main Heading
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[custom-model-heading]', array(
			'default'           => pallikoodam_get_option( 'custom-model-heading' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[custom-model-heading]', array(
				'type'        => 'text',
				'section'     => 'cookie-consent-section',
				'label'       => esc_html__( 'Main Heading', 'pallikoodam' ),
				'description' => esc_html__('Cookie and Privacy Settings', 'pallikoodam'),
				'dependency'  => array ( 'enable-cookie-consent|enable-custom-model-content', '==|==', '1|1' )
			)
		)
	);

/**
* Option : Model Window Custom Content
*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[custom-model-content]', array (
			'default'           => pallikoodam_get_option( 'custom-model-content' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[custom-model-content]', array (
				'type'    => 'textarea',
				'label'   => esc_html__( 'Model Window Custom Content', 'pallikoodam'),
				'section' => 'cookie-consent-section',
				'dependency'  => array ( 'enable-cookie-consent|enable-custom-model-content', '==|==', '1|1' )
			)
		)
	);