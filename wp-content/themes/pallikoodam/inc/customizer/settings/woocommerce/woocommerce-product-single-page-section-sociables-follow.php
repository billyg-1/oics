<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sociable Follow Settings
 */
$wp_customize->add_section( 
	new PALLIKOODAM_WP_Customize_Section(
		$wp_customize,
		'woocommerce-product-single-page-sociables-follow-section',
		array(
			'title'    => esc_html__('Sociable Follow Settings', 'pallikoodam'),
			'panel'    => 'woocommerce-product-single-page-section',
			'priority' => 45,
		)
	)
);
	
	/**
	* Option : Follow Description
	*/
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-follow-description]', array(
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-follow-description]', array(
				'type'    => 'dt-description',
				'label'   => esc_html__( 'Note :', 'pallikoodam'),
				'section' => 'woocommerce-product-single-page-sociables-follow-section',
				'description'   => esc_html__( 'This option is applicable only for WooCommerce "Custom Template".', 'pallikoodam'),
			)
		)
	);

$social_follow = array (
	'delicious' 	 => esc_html__('Delicious', 'pallikoodam'),
	'deviantart'  => esc_html__('Deviantart', 'pallikoodam'),
	'digg' 	  	   => esc_html__('Digg', 'pallikoodam'),
	'dribbble' 	  => esc_html__('Dribbble', 'pallikoodam'),
	'envelope' 	  => esc_html__('Envelope', 'pallikoodam'),
	'facebook' 	  => esc_html__('Facebook', 'pallikoodam'),
	'flickr' 		   => esc_html__('Flickr', 'pallikoodam'),
	'google-plus' => esc_html__('Google Plus', 'pallikoodam'),
	'gtalk'  		   => esc_html__('GTalk', 'pallikoodam'),
	'instagram'	  => esc_html__('Instagram', 'pallikoodam'),
	'lastfm'	 	   => esc_html__('Lastfm', 'pallikoodam'),
	'linkedin'	   => esc_html__('Linkedin', 'pallikoodam'),
	'pinterest'	  => esc_html__('Pinterest', 'pallikoodam'),
	'reddit'		    => esc_html__('Reddit', 'pallikoodam'),
	'rss'		 	     => esc_html__('RSS', 'pallikoodam'),
	'skype'		     => esc_html__('Skype', 'pallikoodam'),
	'stumbleupon' => esc_html__('Stumbleupon', 'pallikoodam'),
	'tumblr'		    => esc_html__('Tumblr', 'pallikoodam'),
	'twitter'		   => esc_html__('Twitter', 'pallikoodam'),
	'viadeo'		    => esc_html__('Viadeo', 'pallikoodam'),
	'vimeo'		     => esc_html__('Vimeo', 'pallikoodam'),
	'yahoo'		     => esc_html__('Yahoo', 'pallikoodam'),
	'youtube'		   => esc_html__('Youtube', 'pallikoodam')
);

foreach($social_follow as $socialfollow_key => $socialfollow) {

	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-follow-'.$socialfollow_key.']', array(
			'default'           => pallikoodam_get_option( 'dt-single-product-show-follow-'.$socialfollow_key ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[dt-single-product-show-follow-'.$socialfollow_key.']', array(
				'type'    => 'dt-switch',
				'label'   => sprintf(esc_html__('Show %1$s Follow', 'pallikoodam'), $socialfollow),
				'section' => 'woocommerce-product-single-page-sociables-follow-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

}