<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option : Archive Page Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-archives-page-layout]', array(
			'default'           => pallikoodam_get_option( 'blog-archives-page-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Radio_Image(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-archives-page-layout]', array(
			'type' => 'dt-radio-image',
			'label' => esc_html__( 'Page Layout', 'pallikoodam'),
			'section' => 'site-post-archives-section',
			'choices' => apply_filters( 'pallikoodam_archive_page_layout_options', array(
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
			))
        )
    ));

/**
 * Option : Show Standard Left Sidebar
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[show-standard-left-sidebar-for-post-archives]', array(
			'default'           => pallikoodam_get_option( 'show-standard-left-sidebar-for-post-archives' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[show-standard-left-sidebar-for-post-archives]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Standard Left Sidebar', 'pallikoodam'),
				'section' => 'site-post-archives-section',
				'dependency' => array( 'blog-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Show Standard Right Sidebar
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[show-standard-right-sidebar-for-post-archives]', array(
			'default'           => pallikoodam_get_option( 'show-standard-right-sidebar-for-post-archives' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[show-standard-right-sidebar-for-post-archives]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Show Standard Right Sidebar', 'pallikoodam'),
				'section' => 'site-post-archives-section',
				'dependency' => array( 'blog-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Archive Post Layout
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-post-layout]', array(
			'default'           => pallikoodam_get_option( 'blog-post-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Radio_Image(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-post-layout]', array(
			'type' => 'dt-radio-image',
			'label' => esc_html__( 'Post Layout', 'pallikoodam'),
			'section' => 'site-post-archives-section',
			'choices' => apply_filters( 'pallikoodam_archive_post_layout_options', array(
				'entry-grid' => array(
					'label' => esc_html__( 'Grid', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/entry-grid.png'
				),
				'entry-list' => array(
					'label' => esc_html__( 'List', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/entry-list.png'
				),
				'entry-cover' => array(
					'label' => esc_html__( 'Cover', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/entry-cover.png'
				),
			))
        )
    ));

/**
 * Option : Post Grid, List Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-post-grid-list-style]', array(
			'default'           => pallikoodam_get_option( 'blog-post-grid-list-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-post-grid-list-style]', array(
			'type'    => 'select',
			'section' => 'site-post-archives-section',
			'label'   => esc_html__( 'Post Style', 'pallikoodam' ),
			'choices' => array(
				'dt-sc-boxed' 			=> esc_html__('Boxed', 'pallikoodam'),
				'dt-sc-simple'      	=> esc_html__('Simple', 'pallikoodam'),
				'dt-sc-overlap'      	=> esc_html__('Overlap', 'pallikoodam'),
				'dt-sc-content-overlay' => esc_html__('Content Overlay', 'pallikoodam'),
				'dt-sc-simple-withbg'	=> esc_html__('Simple with Background', 'pallikoodam'),
				'dt-sc-overlay'   	    => esc_html__('Overlay', 'pallikoodam'),
				'dt-sc-overlay-ii'      => esc_html__('Overlay II', 'pallikoodam'),			  
				'dt-sc-overlay-iii'     => esc_html__('Overlay III', 'pallikoodam'),			  
				'dt-sc-alternate'	 	=> esc_html__('Alternate', 'pallikoodam'),
				'dt-sc-minimal'       	=> esc_html__('Minimal', 'pallikoodam'),
				'dt-sc-modern' 	      	=> esc_html__('Modern', 'pallikoodam'),
				'dt-sc-classic'	 		=> esc_html__('Classic', 'pallikoodam'),
				'dt-sc-classic-ii'	 	=> esc_html__('Classic II', 'pallikoodam'),
				'dt-sc-classic-overlay' => esc_html__('Classic Overlay', 'pallikoodam'),
				'dt-sc-grungy-boxed' 	=> esc_html__('Grungy Boxed', 'pallikoodam'),
				'dt-sc-title-overlap'	=> esc_html__('Title Overlap', 'pallikoodam'),
			),
			'dependency' => array( 'blog-post-layout', 'any', 'entry-grid,entry-list' )
		)
	));

/**
 * Option : Post Cover Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-post-cover-style]', array(
			'default'           => pallikoodam_get_option( 'blog-post-cover-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-post-cover-style]', array(
			'type'    => 'select',
			'section' => 'site-post-archives-section',
			'label'   => esc_html__( 'Post Style', 'pallikoodam' ),
			'choices' => array(
				'dt-sc-boxed' 			=> esc_html__('Boxed', 'pallikoodam'),
				'dt-sc-canvas'      	=> esc_html__('Canvas', 'pallikoodam'),
				'dt-sc-content-overlay' => esc_html__('Content Overlay', 'pallikoodam'),
				'dt-sc-overlay'   	    => esc_html__('Overlay', 'pallikoodam'),
				'dt-sc-overlay-ii'      => esc_html__('Overlay II', 'pallikoodam'),
				'dt-sc-overlay-iii'     => esc_html__('Overlay III', 'pallikoodam'),
				'dt-sc-trendy' 			=> esc_html__('Trendy', 'pallikoodam'),
				'dt-sc-mobilephone' 	=> esc_html__('Mobile Phone', 'pallikoodam'),
			),
			'dependency'   => array( 'blog-post-layout', '==', 'entry-cover' )
		)
	));

/**
 * Option : Post Columns
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-post-columns]', array(
			'default'           => pallikoodam_get_option( 'blog-post-columns' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Radio_Image(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-post-columns]', array(
			'type' => 'dt-radio-image',
			'label' => esc_html__( 'Columns', 'pallikoodam'),
			'section' => 'site-post-archives-section',
			'choices' => apply_filters( 'pallikoodam_archive_post_columns_options', array(
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
			'dependency' => array( 'blog-post-layout', 'any', 'entry-grid,entry-cover' ),
        )
    ));

/**
 * Option : List Thumb
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-list-thumb]', array(
			'default'           => pallikoodam_get_option( 'blog-list-thumb' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Radio_Image(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-list-thumb]', array(
			'type' => 'dt-radio-image',
			'label' => esc_html__( 'List Type', 'pallikoodam'),
			'section' => 'site-post-archives-section',
			'choices' => apply_filters( 'pallikoodam_archive_list_thumb_options', array(
				'entry-left-thumb' => array(
					'label' => esc_html__( 'Left Thumb', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/entry-left-thumb.png'
				),
				'entry-right-thumb' => array(
					'label' => esc_html__( 'Right Thumb', 'pallikoodam' ),
					'path' => PALLIKOODAM_THEME_URI . '/inc/customizer/assets/images/entry-right-thumb.png'
				),
			)),
			'dependency' => array( 'blog-post-layout', '==', 'entry-list' ),
        )
    ));

/**
 * Option : Post Alignment
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-alignment]', array(
			'default'           => pallikoodam_get_option( 'blog-alignment' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-alignment]', array(
			'type'    => 'select',
			'section' => 'site-post-archives-section',
			'label'   => esc_html__( 'Elements Alignment', 'pallikoodam' ),
			'choices' => array(
			  'alignnone'	=> esc_html__('None', 'pallikoodam'),
			  'alignleft' 	=> esc_html__('Align Left', 'pallikoodam'),
			  'aligncenter' => esc_html__('Align Center', 'pallikoodam'),
			  'alignright'  => esc_html__('Align Right', 'pallikoodam'),
			),
			'dependency'   => array( 'blog-post-layout', 'any', 'entry-grid,entry-cover' ),
		)
	));

/**
 * Option : Equal Height
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-equal-height]', array(
			'default'           => pallikoodam_get_option( 'enable-equal-height' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-equal-height]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Equal Height', 'pallikoodam'),
				'section' => 'site-post-archives-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array( 'blog-post-layout', 'any', 'entry-grid,entry-cover' ),
			)
		)
	);

/**
 * Option : No Space
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-no-space]', array(
			'default'           => pallikoodam_get_option( 'enable-no-space' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-no-space]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable No Space', 'pallikoodam'),
				'section' => 'site-post-archives-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array( 'blog-post-layout', 'any', 'entry-grid,entry-cover' ),
			)
		)
	);

/**
 * Option : Gallery Slider
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-gallery-slider]', array(
			'default'           => pallikoodam_get_option( 'enable-gallery-slider' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-gallery-slider]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Display Gallery Slider', 'pallikoodam'),
				'section' => 'site-post-archives-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array( 'blog-post-layout', 'any', 'entry-grid,entry-list' ),
			)
		)
	);

/**
 * Divider : Blog Gallery Slider Bottom
 */
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-gallery-slider-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section'  => 'site-post-archives-section',
				'settings' => array(),
			)
		)
	);

/**
 * Option : Blog Elements
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-elements-position]', array(
			'default'           => pallikoodam_get_option( 'blog-elements-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Sortable(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-elements-position]', array(
			'type' => 'dt-sortable',
			'label' => esc_html__( 'Elements Positioning', 'pallikoodam'),
			'section' => 'site-post-archives-section',
			'choices' => apply_filters( 'pallikoodam_archive_post_elements_options', array(
				'feature_image'	=> esc_html__('Feature Image', 'pallikoodam'),
				'title'      	=> esc_html__('Title', 'pallikoodam'),
				'content'    	=> esc_html__('Content', 'pallikoodam'),
				'read_more'  	=> esc_html__('Read More', 'pallikoodam'),
				'meta_group' 	=> esc_html__('Meta Group', 'pallikoodam'),
				'author'		=> esc_html__('Author', 'pallikoodam'),
				'date'     		=> esc_html__('Date', 'pallikoodam'),
				'comments' 		=> esc_html__('Comments', 'pallikoodam'),
				'categories'    => esc_html__('Categories', 'pallikoodam'),
				'tags'  		=> esc_html__('Tags', 'pallikoodam'),
				'social_share'  => esc_html__('Social Share', 'pallikoodam'),
				'likes_views'   => esc_html__('Likes & Views', 'pallikoodam'),
			)),
        )
    ));

/**
 * Option : Blog Meta Elements
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-meta-position]', array(
			'default'           => pallikoodam_get_option( 'blog-meta-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);

    $wp_customize->add_control( new PALLIKOODAM_Customize_Control_Sortable(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-meta-position]', array(
			'type' => 'dt-sortable',
			'label' => esc_html__( 'Meta Group Positioning', 'pallikoodam'),
			'section' => 'site-post-archives-section',
			'choices' => apply_filters( 'pallikoodam_archive_post_meta_elements_options', array(
				'author'		=> esc_html__('Author', 'pallikoodam'),
				'date'     		=> esc_html__('Date', 'pallikoodam'),
				'comments' 		=> esc_html__('Comments', 'pallikoodam'),
				'categories'    => esc_html__('Categories', 'pallikoodam'),
				'tags'  		=> esc_html__('Tags', 'pallikoodam'),
				'social_share'  => esc_html__('Social Share', 'pallikoodam'),
				'likes_views'   => esc_html__('Likes & Views', 'pallikoodam'),
			)),
			'description' => esc_html__('Note: Use max 3 items for better results.', 'pallikoodam'),
        )
    ));

/**
 * Divider : Blog Meta Elements Bottom
 */
	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Separator(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-meta-elements-bottom-separator]', array(
				'type'     => 'dt-separator',
				'section'  => 'site-post-archives-section',
				'settings' => array(),
			)
		)
	);

/**
 * Option : Post Format
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-post-format]', array(
			'default'           => pallikoodam_get_option( 'enable-post-format' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-post-format]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Post Format', 'pallikoodam'),
				'section' => 'site-post-archives-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				)
			)
		)
	);

/**
 * Option : Enable Excerpt
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-excerpt-text]', array(
			'default'           => pallikoodam_get_option( 'enable-excerpt-text' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-excerpt-text]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Enable Excerpt Text', 'pallikoodam'),
				'section' => 'site-post-archives-section',
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
		PALLIKOODAM_THEME_SETTINGS . '[blog-excerpt-length]', array(
			'default'           => pallikoodam_get_option( 'blog-excerpt-length' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-excerpt-length]', array(
				'type'    	  => 'text',
				'section'     => 'site-post-archives-section',
				'label'       => esc_html__( 'Excerpt Length', 'pallikoodam' ),
				'description' => esc_html__('Put Excerpt Length', 'pallikoodam'),
				'input_attrs' => array(
					'value'	=> 25,
				),
				'dependency'  => array( 'enable-excerpt-text', '==', 'true' ),
			)
		)
	);

/**
 * Option : Enable Video Audio
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[enable-video-audio]', array(
			'default'           => pallikoodam_get_option( 'enable-video-audio' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_tweek' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control_Switch(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[enable-video-audio]', array(
				'type'    => 'dt-switch',
				'label'   => esc_html__( 'Display Video & Audio for Posts', 'pallikoodam'),
				'description' => esc_html__('YES! to display video & audio, instead of feature image for posts', 'pallikoodam'),
				'section' => 'site-post-archives-section',
				'choices' => array(
					'on'  => esc_attr__( 'Yes', 'pallikoodam' ),
					'off' => esc_attr__( 'No', 'pallikoodam' )
				),
				'dependency' => array( 'blog-post-layout', 'any', 'entry-grid,entry-list' ),
			)
		)
	);

/**
 * Option : Readmore Text
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-readmore-text]', array(
			'default'           => pallikoodam_get_option( 'blog-readmore-text' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);

	$wp_customize->add_control(
		new PALLIKOODAM_Customize_Control(
			$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-readmore-text]', array(
				'type'    	  => 'text',
				'section'     => 'site-post-archives-section',
				'label'       => esc_html__( 'Read More Text', 'pallikoodam' ),
				'description' => esc_html__('Put the read more text here', 'pallikoodam'),
				'input_attrs' => array(
					'value'	=> esc_html__('Read More', 'pallikoodam'),
				)
			)
		)
	);

/**
 * Option : Image Hover Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-image-hover-style]', array(
			'default'           => pallikoodam_get_option( 'blog-image-hover-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-image-hover-style]', array(
			'type'    => 'select',
			'section' => 'site-post-archives-section',
			'label'   => esc_html__( 'Image Hover Style', 'pallikoodam' ),
			'choices' => array(
			  'dt-sc-default' 	  => esc_html__('Default', 'pallikoodam'),
			  'dt-sc-blur'        => esc_html__('Blur', 'pallikoodam'),
			  'dt-sc-bw'   		  => esc_html__('Black and White', 'pallikoodam'),
			  'dt-sc-brightness'  => esc_html__('Brightness', 'pallikoodam'),
			  'dt-sc-fadeinleft'  => esc_html__('Fade InLeft', 'pallikoodam'),
			  'dt-sc-fadeinright' => esc_html__('Fade InRight', 'pallikoodam'),
			  'dt-sc-hue-rotate'  => esc_html__('Hue-Rotate', 'pallikoodam'),
			  'dt-sc-invert'	  => esc_html__('Invert', 'pallikoodam'),
			  'dt-sc-opacity'     => esc_html__('Opacity', 'pallikoodam'),
			  'dt-sc-rotate'	  => esc_html__('Rotate', 'pallikoodam'),
			  'dt-sc-rotate-alt'  => esc_html__('Rotate Alt', 'pallikoodam'),
			  'dt-sc-scalein'     => esc_html__('Scale In', 'pallikoodam'),
			  'dt-sc-scaleout' 	  => esc_html__('Scale Out', 'pallikoodam'),
			  'dt-sc-sepia'	   	  => esc_html__('Sepia', 'pallikoodam'),
			  'dt-sc-tint'		  => esc_html__('Tint', 'pallikoodam'),
			),
			'description' => esc_html__('Choose image hover style to display archives pages.', 'pallikoodam'),
		)
	));

/**
 * Option : Image Hover Style
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-image-overlay-style]', array(
			'default'           => pallikoodam_get_option( 'blog-image-overlay-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-image-overlay-style]', array(
			'type'    => 'select',
			'section' => 'site-post-archives-section',
			'label'   => esc_html__( 'Image Overlay Style', 'pallikoodam' ),
			'choices' => array(
			  'dt-sc-default' 			=> esc_html__('None', 'pallikoodam'),
			  'dt-sc-fixed' 			=> esc_html__('Fixed', 'pallikoodam'),
			  'dt-sc-tb' 				=> esc_html__('Top to Bottom', 'pallikoodam'),
			  'dt-sc-bt'   				=> esc_html__('Bottom to Top', 'pallikoodam'),
			  'dt-sc-rl'   				=> esc_html__('Right to Left', 'pallikoodam'),
			  'dt-sc-lr'				=> esc_html__('Left to Right', 'pallikoodam'),
			  'dt-sc-middle'			=> esc_html__('Middle', 'pallikoodam'),
			  'dt-sc-middle-radial'		=> esc_html__('Middle Radial', 'pallikoodam'),
			  'dt-sc-tb-gradient' 		=> esc_html__('Gradient - Top to Bottom', 'pallikoodam'),
			  'dt-sc-bt-gradient'   	=> esc_html__('Gradient - Bottom to Top', 'pallikoodam'),
			  'dt-sc-rl-gradient'   	=> esc_html__('Gradient - Right to Left', 'pallikoodam'),
			  'dt-sc-lr-gradient'		=> esc_html__('Gradient - Left to Right', 'pallikoodam'),
			  'dt-sc-radial-gradient'	=> esc_html__('Gradient - Radial', 'pallikoodam'),
			  'dt-sc-flash' 			=> esc_html__('Flash', 'pallikoodam'),
			  'dt-sc-circle' 			=> esc_html__('Circle', 'pallikoodam'),
			  'dt-sc-hm-elastic'		=> esc_html__('Horizontal Elastic', 'pallikoodam'),
			  'dt-sc-vm-elastic'		=> esc_html__('Vertical Elastic', 'pallikoodam'),
			),
			'description' => esc_html__('Choose image overlay style to display archives pages.', 'pallikoodam'),
			'dependency' => array( 'blog-post-layout', 'any', 'entry-grid,entry-list' ),
		)
	));

/**
 * Option : Pagination
 */
	$wp_customize->add_setting(
		PALLIKOODAM_THEME_SETTINGS . '[blog-pagination]', array(
			'default'           => pallikoodam_get_option( 'blog-pagination' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'PALLIKOODAM_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control( new PALLIKOODAM_Customize_Control(
		$wp_customize, PALLIKOODAM_THEME_SETTINGS . '[blog-pagination]', array(
			'type'    => 'select',
			'section' => 'site-post-archives-section',
			'label'   => esc_html__( 'Pagination Style', 'pallikoodam' ),
			'choices' => array(
			  'older_newer' 	=> esc_html__('Older & Newer', 'pallikoodam'),
			  'numbered'      	=> esc_html__('Numbered', 'pallikoodam'),
			  'load_more'      	=> esc_html__('Load More', 'pallikoodam'),
			  'infinite_scroll'	=> esc_html__('Infinite Scroll', 'pallikoodam'),
			),
			'description' => esc_html__('Choose pagination style to display archives pages.', 'pallikoodam')
		)
	));