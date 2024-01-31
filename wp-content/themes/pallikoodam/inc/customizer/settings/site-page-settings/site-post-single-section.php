<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Post Elements
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[post-elements-position]', array(
			'default'           => pallikoodam_get_option( 'post-elements-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Sortable(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[post-elements-position]', array(
			'type' => 'dt-sortable',
			'label' => esc_html__( 'Post Elements Positioning', 'pallikoodam'),
			'section' => 'site-post-single-section',
			'choices' => apply_filters( 'pallikoodam_single_post_elements_options', array(
				'feature_image'	=> esc_html__('Feature Image', 'pallikoodam'),
				'title'      	=> esc_html__('Title', 'pallikoodam'),
				'content'    	=> esc_html__('Content', 'pallikoodam'),
				'meta_group' 	=> esc_html__('Meta Group', 'pallikoodam'),
				'navigation'    => esc_html__('Navigation', 'pallikoodam'),
				'author_bio' 	=> esc_html__('Author Bio', 'pallikoodam'),
				'comment_box' 	=> esc_html__('Comment Box', 'pallikoodam'),
				'related_posts' => esc_html__('Related Posts', 'pallikoodam'),
				'author'		=> esc_html__('Author', 'pallikoodam'),
				'date'     		=> esc_html__('Date', 'pallikoodam'),
				'comments' 		=> esc_html__('Comments', 'pallikoodam'),
				'categories'    => esc_html__('Categories', 'pallikoodam'),
				'tags'  		=> esc_html__('Tags', 'pallikoodam'),
				'social_share'  => esc_html__('Social Share', 'pallikoodam'),
				'likes_views'   => esc_html__('Likes & Views', 'pallikoodam'),
				'related_article' 	=> esc_html__('Related Article( Only Fixed )', 'pallikoodam'),
			)),
        )
    ));

/**
 * Option : Meta Elements
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[post-meta-position]', array(
			'default'           => pallikoodam_get_option( 'post-meta-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Sortable(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[post-meta-position]', array(
			'type' => 'dt-sortable',
			'label' => esc_html__( 'Meta Group Positioning', 'pallikoodam'),
			'section' => 'site-post-single-section',
			'choices' => apply_filters( 'pallikoodam_single_post_meta_elements_options', array(
				'author'		=> esc_html__('Author', 'pallikoodam'),
				'date'     		=> esc_html__('Date', 'pallikoodam'),
				'comments' 		=> esc_html__('Comments', 'pallikoodam'),
				'categories'    => esc_html__('Categories', 'pallikoodam'),
				'tags'  		=> esc_html__('Tags', 'pallikoodam'),
				'social_share'  => esc_html__('Social Share', 'pallikoodam'),
				'likes_views'   => esc_html__('Likes & Views', 'pallikoodam'),
			))
        )
    ));

/**
 * Option : Post Related Title
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[post-related-title]', array(
			'default'           => pallikoodam_get_option( 'post-related-title' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[post-related-title]', array(
				'type'    	  => 'text',
				'section'     => 'site-post-single-section',
				'label'       => esc_html__( 'Related Posts Section Title', 'pallikoodam' ),
				'description' => esc_html__('Put the related posts section title here', 'pallikoodam'),
				'input_attrs' => array(
					'value'	=> esc_html__('Related Posts', 'pallikoodam'),
				)
			)
		)
	);

/**
 * Option : Related Columns
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[post-related-columns]', array(
			'default'           => pallikoodam_get_option( 'post-related-columns' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Radio_Image(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[post-related-columns]', array(
			'type' => 'dt-radio-image',
			'label' => esc_html__( 'Columns', 'pallikoodam'),
			'section' => 'site-post-single-section',
			'choices' => apply_filters( 'pallikoodam_single_related_columns_options', array(
				'one-column' => array(
					'label' => esc_html__( 'One Column', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/one-column.png'
				),
				'one-half-column' => array(
					'label' => esc_html__( 'One Half Column', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/one-half-column.png'
				),
				'one-third-column' => array(
					'label' => esc_html__( 'One Third Column', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/one-third-column.png'
				),
			)),
        )
    ));

/**
 * Option : Related Count
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[post-related-count]', array(
			'default'           => pallikoodam_get_option( 'post-related-count' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[post-related-count]', array(
				'type'    	  => 'text',
				'section'     => 'site-post-single-section',
				'label'       => esc_html__( 'No.of Posts to Show', 'pallikoodam' ),
				'description' => esc_html__('Put the no.of related posts to show', 'pallikoodam'),
				'input_attrs' => array(
					'value'	=> 3,
				),
			)
		)
	);

/**
 * Option : Enable Excerpt
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-related-excerpt]', array(
			'default'           => pallikoodam_get_option( 'enable-related-excerpt' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-related-excerpt]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Excerpt Text', 'pallikoodam'),
				'section' => 'site-post-single-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Excerpt Text
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[post-related-excerpt]', array(
			'default'           => pallikoodam_get_option( 'post-related-excerpt' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[post-related-excerpt]', array(
				'type'    	  => 'text',
				'section'     => 'site-post-single-section',
				'label'       => esc_html__( 'Excerpt Length', 'pallikoodam' ),
				'description' => esc_html__('Put Excerpt Length', 'pallikoodam'),
				'input_attrs' => array(
					'value'	=> 25,
				),
				'dependency' => array( 'enable-related-excerpt', '==', 'true' ),
			)
		)
	);

/**
 * Option : Related Carousel
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-related-carousel]', array(
			'default'           => pallikoodam_get_option( 'enable-related-carousel' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-related-carousel]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Carousel', 'pallikoodam'),
				'description' => esc_html__('YES! to enable carousel related posts', 'pallikoodam'),
				'section' => 'site-post-single-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Related Carousel Nav
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[related-carousel-nav]', array(
			'default'           => pallikoodam_get_option( 'related-carousel-nav' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[related-carousel-nav]', array(
			'type'    => 'select',
			'section' => 'site-post-single-section',
			'label'   => esc_html__( 'Navigation Style', 'pallikoodam' ),
			'choices' => array(
				'' 			 => esc_html__('None', 'pallikoodam'),
				'navigation' => esc_html__('Navigations', 'pallikoodam'),
				'pager'   	 => esc_html__('Pager', 'pallikoodam'),
			),
			'description' => esc_html__('Choose navigation style to display related post carousel.', 'pallikoodam'),
			'dependency' => array( 'enable-related-carousel', '==', 'true' ),
		)
	));

/**
 * Option : Image Lightbox
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-image-lightbox]', array(
			'default'           => pallikoodam_get_option( 'enable-image-lightbox' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-image-lightbox]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Feature Image Lightbox', 'pallikoodam'),
				'description' => esc_html__('YES! to enable lightbox for feature image. Will not work in "Overlay" style.', 'pallikoodam'),
				'section' => 'site-post-single-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Comment List Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[post-comments-list-style]', array(
			'default'           => pallikoodam_get_option( 'post-comments-list-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[post-comments-list-style]', array(
			'type'    => 'select',
			'section' => 'site-post-single-section',
			'label'   => esc_html__( 'Comments List Style', 'pallikoodam' ),
			'choices' => array(
			  'rounded' 	=> esc_html__('Rounded', 'pallikoodam'),
			  'square'   	=> esc_html__('Square', 'pallikoodam'),
			),
			'description' => esc_html__('Choose comments list style to display single post.', 'pallikoodam'),
		)
	));