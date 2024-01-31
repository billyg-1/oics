<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Privacy Comment Form
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[privacy-commentform]', array (
			'default'           => pallikoodam_get_option( 'privacy-commentform' ),
			'type'              => 'option',
			'sanitize_callback' => array ( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[privacy-commentform]', array (
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Append a privacy policy message to your comment form?', 'pallikoodam'),
				'description'   => esc_html__( 'Check to append a message to the comment form for unregistered users. Commenting without consent is no longer possible', 'pallikoodam'),
				'section' => 'privacy-policy-section',
				'choices' => array (
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Message below comment form
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[privacy-commentform-msg]', array (
			'default'           => pallikoodam_get_option( 'privacy-commentform-msg' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[privacy-commentform-msg]', array (
				'type'    => 'textarea',
				'label'   => esc_html__( 'Message below comment form', 'pallikoodam'),
				'description'   => esc_html__( 'A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'pallikoodam'),
				'section' => 'privacy-policy-section',
				'dependency' => array ( 'privacy-commentform', '==', '1' )
			)
		)
	);	


/**
 * Option : Privacy Subscribe Form
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[privacy-subscribeform]', array (
			'default'           => pallikoodam_get_option( 'privacy-subscribeform' ),
			'type'              => 'option',
			'sanitize_callback' => array ( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[privacy-subscribeform]', array (
				'type'    => 'dt-switch',
				'label'   => esc_html__('Append a privacy policy message to mailchimp contact forms?', 'pallikoodam'),
				'description'   => esc_html__('Check to append a message to all of your mailchimp forms.', 'pallikoodam'),
				'section' => 'privacy-policy-section',
				'choices' => array (
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
* Option : Privacy Subscribe Form Message
*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[privacy-subscribeform-msg]', array (
			'default'           => pallikoodam_get_option( 'privacy-subscribeform-msg' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[privacy-subscribeform-msg]', array (
				'type'    => 'textarea',
				'label'   => esc_html__('Message below mailchimp subscription forms', 'pallikoodam'),
				'description'   => esc_html__('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'pallikoodam'),
				'section' => 'privacy-policy-section',
				'dependency' => array ( 'privacy-subscribeform', '==', '1' )
			)
		)
	);


/**
 * Option : Privacy Login Form
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[privacy-loginform]', array (
			'default'           => pallikoodam_get_option( 'privacy-loginform' ),
			'type'              => 'option',
			'sanitize_callback' => array ( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[privacy-loginform]', array (
				'type'    => 'dt-switch',
				'label'   => esc_html__('Append a privacy policy message to your login forms?', 'pallikoodam'),
				'description'   => esc_html__('Check to append a message to the default login and registrations forms.', 'pallikoodam'),
				'section' => 'privacy-policy-section',
				'choices' => array (
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
* Option : Privacy Login Form Message
*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[privacy-loginform-msg]', array (
			'default'           => pallikoodam_get_option( 'privacy-loginform-msg' ),
			'type'              => 'option',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[privacy-loginform-msg]', array (
				'type'    => 'textarea',
				'label'   => esc_html__('Message below login forms', 'pallikoodam'),
				'description'   => esc_html__('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'pallikoodam'),
				'section' => 'privacy-policy-section',
				'dependency' => array ( 'privacy-loginform', '==', '1' )
			)
		)
	);