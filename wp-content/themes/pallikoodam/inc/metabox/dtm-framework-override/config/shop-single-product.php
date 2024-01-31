<?php
// -----------------------------------------
// Header And Footer Options Metabox
// -----------------------------------------

function pallikoodam_shop_single_product() {

  $size_guides = array (
                      ''             => esc_html__('None', 'pallikoodam'),
                      'size-guide-1' => esc_html__('Size Guide 1', 'pallikoodam'), 
                      'size-guide-2' => esc_html__('Size Guide 2', 'pallikoodam'), 
                      'size-guide-3' => esc_html__('Size Guide 3', 'pallikoodam'), 
                      'size-guide-4' => esc_html__('Size Guide 4', 'pallikoodam'), 
                      'size-guide-5' => esc_html__('Size Guide 5', 'pallikoodam')
                    );
  
  $product_meta_layout_section = array(
    'name'   => 'general_section',
    'title'  => esc_html__('General', 'pallikoodam'),
    'icon'   => 'fa fa-angle-double-right',
    'fields' =>  array(
        array(
            'id'         => 'page-layout',
            'type'       => 'image_select',
            'title'      => esc_html__('Page Layout', 'pallikoodam'),
            'options'    => array(
                'admin-option'         => DTM_URL . 'images/admin-option.png',
                'content-full-width'   => DTM_URL . 'images/without-sidebar.png',
                'with-left-sidebar'    => DTM_URL . 'images/left-sidebar.png',
                'with-right-sidebar'   => DTM_URL . 'images/right-sidebar.png',
            ),
            'default'    => 'admin-option',
            'attributes' => array( 'data-depend-id' => 'page-layout' )
        ),
        array(
            'id'         => 'show-standard-sidebar',
            'type'       => 'switcher',
            'title'      => esc_html__('Show Standard Sidebar', 'pallikoodam'),
            'dependency' => array( 'page-layout', 'any', 'with-left-sidebar,with-right-sidebar' )
        ),
        array(
            'id'         => 'product-widgetareas',
            'type'       => 'select',
            'title'      => esc_html__('Choose Custom Widget Area', 'pallikoodam'),
            'class'      => 'chosen',
            'options'    => pallikoodam_customizer_custom_widgets(),
            'dependency' => array( 'page-layout', 'any', 'with-left-sidebar,with-right-sidebar' ),
            'attributes' => array(
                'multiple'         => 'multiple',
                'data-placeholder' => esc_attr__('Select Widget Areas', 'pallikoodam'),
                'style'            => 'width: 400px;'
            ),
        ),

        # Product Template
        array(
            'id'      => 'product-template',
            'type'    => 'select',
            'title'   => esc_html__('Product Template', 'pallikoodam'),
            'class'   => 'chosen',
            'options' => array(
                'admin-option'    => esc_html__( 'Admin Option', 'pallikoodam' ),
                'woo-default'     => esc_html__( 'WooCommerce Default', 'pallikoodam' ),
                'custom-template' => esc_html__( 'Custom Template', 'pallikoodam' )
            ),
            'default'    => 'admin-option',
            'info'       => esc_html__('Don\'t use product shortcodes in content area when "WooCommerce Default" template is chosen.', 'pallikoodam')
        ),
               
        array(
            'id'         => 'show-upsell',
            'type'       => 'select',
            'title'      => esc_html__('Show Upsell Products', 'pallikoodam'),
            'class'      => 'chosen',
            'default'    => 'admin-option',
            'attributes' => array( 'data-depend-id' => 'show-upsell' ),
            'options'    => array(
                'admin-option' => esc_html__( 'Admin Option', 'pallikoodam' ),
                'true'         => esc_html__( 'Show', 'pallikoodam'),
                null           => esc_html__( 'Hide', 'pallikoodam'),
            ),
            'dependency' => array( 'product-template', '!=', 'custom-template')
        ),
        array(
            'id'         => 'upsell-column',
            'type'       => 'select',
            'title'      => esc_html__('Choose Upsell Column', 'pallikoodam'),
            'class'      => 'chosen',
            'default'    => 4,
            'options'    => array(
                'admin-option' => esc_html__( 'Admin Option', 'pallikoodam' ),
                1              => esc_html__( 'One Column', 'pallikoodam' ),
                2              => esc_html__( 'Two Columns', 'pallikoodam' ),
                3              => esc_html__( 'Three Columns', 'pallikoodam' ),
                4              => esc_html__( 'Four Columns', 'pallikoodam' ),
            ),
            'dependency' => array( 'product-template|show-upsell', '!=|==', 'custom-template|true')
        ),
        array(
            'id'         => 'upsell-limit',
            'type'       => 'select',
            'title'      => esc_html__('Choose Upsell Limit', 'pallikoodam'),
            'class'      => 'chosen',
            'default'    => 4,
            'options'    => array(
                'admin-option' => esc_html__( 'Admin Option', 'pallikoodam' ),
                1              => esc_html__( 'One', 'pallikoodam' ),
                2              => esc_html__( 'Two', 'pallikoodam' ),
                3              => esc_html__( 'Three', 'pallikoodam' ),
                4              => esc_html__( 'Four', 'pallikoodam' ),
                5              => esc_html__( 'Five', 'pallikoodam' ),
                6              => esc_html__( 'Six', 'pallikoodam' ),
                7              => esc_html__( 'Seven', 'pallikoodam' ),
                8              => esc_html__( 'Eight', 'pallikoodam' ),
                9              => esc_html__( 'Nine', 'pallikoodam' ),
                10              => esc_html__( 'Ten', 'pallikoodam' ),                                                
            ),
            'dependency' => array( 'product-template|show-upsell', '!=|==', 'custom-template|true')
        ),        
        array(
            'id'         => 'show-related',
            'type'       => 'select',
            'title'      => esc_html__('Show Related Products', 'pallikoodam'),
            'class'      => 'chosen',
            'default'    => 'admin-option',
            'attributes' => array( 'data-depend-id' => 'show-related' ),
            'options'    => array(
                'admin-option' => esc_html__( 'Admin Option', 'pallikoodam' ),
                'true'         => esc_html__( 'Show', 'pallikoodam'),
                null           => esc_html__( 'Hide', 'pallikoodam'),
            ),
            'dependency' => array( 'product-template', '!=', 'custom-template')
        ),
        array(
            'id'         => 'related-column',
            'type'       => 'select',
            'title'      => esc_html__('Choose Related Column', 'pallikoodam'),
            'class'      => 'chosen',
            'default'    => 4,
            'options'    => array(
                'admin-option' => esc_html__( 'Admin Option', 'pallikoodam' ),
                2              => esc_html__( 'Two Columns', 'pallikoodam' ),
                3              => esc_html__( 'Three Columns', 'pallikoodam' ),
                4              => esc_html__( 'Four Columns', 'pallikoodam' ),
            ),
            'dependency' => array( 'product-template|show-related', '!=|==', 'custom-template|true')
        ),
        array(
            'id'         => 'related-limit',
            'type'       => 'select',
            'title'      => esc_html__('Choose Related Limit', 'pallikoodam'),
            'class'      => 'chosen',
            'default'    => 4,
            'options'    => array(
                'admin-option' => esc_html__( 'Admin Option', 'pallikoodam' ),
                1              => esc_html__( 'One', 'pallikoodam' ),
                2              => esc_html__( 'Two', 'pallikoodam' ),
                3              => esc_html__( 'Three', 'pallikoodam' ),
                4              => esc_html__( 'Four', 'pallikoodam' ),
                5              => esc_html__( 'Five', 'pallikoodam' ),
                6              => esc_html__( 'Six', 'pallikoodam' ),
                7              => esc_html__( 'Seven', 'pallikoodam' ),
                8              => esc_html__( 'Eight', 'pallikoodam' ),
                9              => esc_html__( 'Nine', 'pallikoodam' ),
                10              => esc_html__( 'Ten', 'pallikoodam' ),                                                
            ),
            'dependency' => array( 'product-template|show-related', '!=|==', 'custom-template|true')
        ),

        # Product Additional Tabs
        array(
          'id'              => 'product-additional-tabs',
          'type'            => 'group',
          'title'           => esc_html__('Additional Tabs', 'pallikoodam'),
          'info'            => esc_html__('Click button to add title and description.', 'pallikoodam'),
          'button_title'    => esc_html__('Add New Tab', 'pallikoodam'),
          'accordion_title' => esc_html__('Adding New Tab Field', 'pallikoodam'),
          'fields'          => array(
            array(
            'id'          => 'tab_title',
            'type'        => 'text',
            'title'       => esc_html__('Title', 'pallikoodam'),
            ),

            array(
            'id'          => 'tab_description',
            'type'        => 'textarea',
            'title'       => esc_html__('Description', 'pallikoodam')
            ),
          )
        ),

        # Product New Label
         array(
            'id'         => 'product-new-label',
            'type'       => 'switcher',
            'title'      => esc_html__('Add "New" label', 'pallikoodam'),
        ), 

        array(
          'id'         => 'dt-single-product-size-guides',
          'type'       => 'select',
          'title'      => esc_html__('Product Size Guides', 'pallikoodam'),
          'options'    => $size_guides,
        ),              

        array(
          'id'          => 'description',
          'type'        => 'textarea',
          'title'       => esc_html__('Description', 'pallikoodam'),
          'info'       => esc_html__('This content will be used in description tab, when "Custom Template" is chosen.', 'pallikoodam')
          ),

    )
  );

  $options[] = array(
    'id'        => '_custom_settings',
    'title'     => esc_html__('Product Settings','pallikoodam'),
    'post_type' => 'product',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
      $product_meta_layout_section
    )
  );

  $options[] = array(
    'id'        => '_360viewer_gallery',
    'title'     => esc_html__('Product 360 View Gallery','pallikoodam'),
    'post_type' => 'product',
    'context'   => 'side',
    'priority'  => 'low',
    'sections'  => array(
                    array(
                    'name'   => '360view_section',
                    'fields' =>  array(
                                    array (
                                      'id'          => 'product-360view-gallery',
                                      'type'        => 'gallery',
                                      'title'       => esc_html__('Gallery Images', 'pallikoodam'),
                                      'desc'        => esc_html__('Simply add images to gallery items.', 'pallikoodam'),
                                      'add_title'   => esc_html__('Add Images', 'pallikoodam'),
                                      'edit_title'  => esc_html__('Edit Images', 'pallikoodam'),
                                      'clear_title' => esc_html__('Remove Images', 'pallikoodam'),
                                    )
                                )
                    )
                  )
    );

  return $options;

}