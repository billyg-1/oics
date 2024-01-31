<?php
// -----------------------------------------
// Header And Footer Options Metabox
// -----------------------------------------

function pallikoodam_shop_product_template() {

  $options[] = array (
    'id'	                     => '_dt_shop_product_template_settings',
    'title'	                   => esc_html__('Product Template Settings','pallikoodam'),
    'post_type'                => 'dt_product_template',
    'priority'                 => 'high',
    'context'                  => 'normal', 
    'sections'                 => array (
    
      # Default Options
      array (
        'name'                 => 'default_options_section',
        'title'                => esc_html__('Default', 'pallikoodam'),
        'icon'                 => 'fa fa-angle-double-right',
        'fields'               => array (
        
          array (
            'id'         => 'product-style',
            'type'       => 'select',
            'title'      => esc_html__('Product Style', 'pallikoodam'),
            'options'    => array (
                      'product-style-default'              => esc_html__('Default', 'pallikoodam'),
                      'product-style-cornered'             => esc_html__('Cornered', 'pallikoodam'),
                      'product-style-title-eg-highlighter' => esc_html__('Title & Element Group Highlighter', 'pallikoodam'),
                      'product-style-content-highlighter'  => esc_html__('Content Highlighter', 'pallikoodam'),
                      'product-style-egrp-overlap-pc'      => esc_html__('Element Group Overlap Product Content', 'pallikoodam'),
                      'product-style-egrp-reveal-pc'       => esc_html__('Element Group Reveal Product Content', 'pallikoodam'),
                      'product-style-igrp-over-pc'         => esc_html__('Icon Group over Product Content', 'pallikoodam'),
                      'product-style-egrp-over-pc'         => esc_html__('Element Group over Product Content', 'pallikoodam')
                    ),
            'default'    => 'product-style-default'
          )	

        )
      ),
      # Default Settings


      # Hover Options
      array (
        'name'                 => 'hover_options_section',
        'title'                => esc_html__('Hover Options', 'pallikoodam'),
        'icon'                 => 'fa fa-angle-double-right',
        'fields'               => array (
        
          array(
            'id'         => 'product-hover-styles',
            'type'       => 'select',
            'title'      => esc_html__('Hover Styles', 'pallikoodam'),
            'options'    => array(
                      ''                                        => esc_html__('None', 'pallikoodam'),
                      'product-hover-fade-border'               => esc_html__('Fade - Border', 'pallikoodam'),
                      'product-hover-fade-skinborder'           => esc_html__('Fade - Skin Border', 'pallikoodam'),
                      'product-hover-fade-gradientborder'       => esc_html__('Fade - Gradient Border', 'pallikoodam'),
                      'product-hover-fade-shadow'               => esc_html__('Fade - Shadow', 'pallikoodam'),
                      'product-hover-fade-inshadow'             => esc_html__('Fade - InShadow', 'pallikoodam'),
                      'product-hover-thumb-fade-border'         => esc_html__('Fade Thumb Border', 'pallikoodam'),
                      'product-hover-thumb-fade-skinborder'     => esc_html__('Fade Thumb SkinBorder', 'pallikoodam'),
                      'product-hover-thumb-fade-gradientborder' => esc_html__('Fade Thumb Gradient Border', 'pallikoodam'),
                      'product-hover-thumb-fade-shadow'         => esc_html__('Fade Thumb Shadow', 'pallikoodam'),
                      'product-hover-thumb-fade-inshadow'       => esc_html__('Fade Thumb InShadow', 'pallikoodam')
                    ),
            'default'    => 'product-hover-fade-border'
          ),

          array(
            'id'         => 'product-overlay-bgcolor',
            'type'       => 'color_picker',
            'title'      => esc_html__('Overlay Background Color', 'pallikoodam')
          ),

          array(
            'id'         => 'product-overlay-dark-bgcolor',
            'type'       => 'switcher',
            'title'      => esc_html__('Overlay Dark Background', 'pallikoodam'),
          ),

          array(
            'id'         => 'product-overlay-effects',
            'type'       => 'select',
            'title'      => esc_html__('Overlay Effects', 'pallikoodam'),
            'options'    => array(
                      ''                                    => esc_html__('None', 'pallikoodam'),
                      'product-overlay-fixed'               => esc_html__('Fixed', 'pallikoodam'),
                      'product-overlay-toptobottom'         => esc_html__('Top to Bottom', 'pallikoodam'),
                      'product-overlay-bottomtotop'         => esc_html__('Bottom to Top', 'pallikoodam'),
                      'product-overlay-righttoleft'         => esc_html__('Right to Left', 'pallikoodam'),
                      'product-overlay-lefttoright'         => esc_html__('Left to Right', 'pallikoodam'),
                      'product-overlay-middle'              => esc_html__('Middle', 'pallikoodam'),
                      'product-overlay-middleradial'        => esc_html__('Middle Radial', 'pallikoodam'),
                      'product-overlay-gradienttoptobottom' => esc_html__('Gradient - Top to Bottom', 'pallikoodam'),
                      'product-overlay-gradientbottomtotop' => esc_html__('Gradient - Bottom to Top', 'pallikoodam'),
                      'product-overlay-gradientrighttoleft' => esc_html__('Gradient - Right to Left', 'pallikoodam'),
                      'product-overlay-gradientlefttoright' => esc_html__('Gradient - Left to Right', 'pallikoodam'),
                      'product-overlay-gradientradial'      => esc_html__('Gradient - Radial', 'pallikoodam'),
                      'product-overlay-flash'               => esc_html__('Flash', 'pallikoodam'),
                      'product-overlay-scale'               => esc_html__('Scale', 'pallikoodam'),
                      'product-overlay-horizontalelastic'   => esc_html__('Horizontal - Elastic', 'pallikoodam'),
                      'product-overlay-verticalelastic'     => esc_html__('Vertical - Elastic', 'pallikoodam')
                    ),
            'default'    => ''
          ),

          array(
            'id'         => 'product-hover-image-effects',
            'type'       => 'select',
            'title'      => esc_html__('Hover Image Effects', 'pallikoodam'),
            'options'    => array(
                      ''                                => esc_html__('None', 'pallikoodam'),
                      'product-hover-image-blur'        => esc_html__('Blur', 'pallikoodam'),
                      'product-hover-image-blackwhite'  => esc_html__('Black & White', 'pallikoodam'),
                      'product-hover-image-fadeinleft'  => esc_html__('Fade In Left', 'pallikoodam'),
                      'product-hover-image-fadeinright' => esc_html__('Fade In Right', 'pallikoodam'),
                      'product-hover-image-rotate'      => esc_html__('Rotate', 'pallikoodam'),
                      'product-hover-image-rotatealt'   => esc_html__('Rotate - Alt', 'pallikoodam'),
                      'product-hover-image-scalein'     => esc_html__('Scale In', 'pallikoodam'),
                      'product-hover-image-scaleout'    => esc_html__('Scale Out', 'pallikoodam'),
                      'product-hover-image-floatout'    => esc_html__('Float Up', 'pallikoodam')
                    ),
            'default'    => ''
          ),

          array(
            'id'         => 'product-hover-secondary-image-effects',
            'type'       => 'select',
            'title'      => esc_html__('Hover Secondary Image Effects', 'pallikoodam'),
            'options'    => array(
                      'product-hover-secimage-fade'              => esc_html__('Fade', 'pallikoodam'),
                      'product-hover-secimage-zoomin'            => esc_html__('Zoom In', 'pallikoodam'),
                      'product-hover-secimage-zoomout'           => esc_html__('Zoom Out', 'pallikoodam'),
                      'product-hover-secimage-zoomoutup'         => esc_html__('Zoom Out Up', 'pallikoodam'),
                      'product-hover-secimage-zoomoutdown'       => esc_html__('Zoom Out Down', 'pallikoodam'),
                      'product-hover-secimage-zoomoutleft'       => esc_html__('Zoom Out Left', 'pallikoodam'),
                      'product-hover-secimage-zoomoutright'      => esc_html__('Zoom Out Right', 'pallikoodam'),
                      'product-hover-secimage-pushup'            => esc_html__('Push Up', 'pallikoodam'),
                      'product-hover-secimage-pushdown'          => esc_html__('Push Down', 'pallikoodam'),
                      'product-hover-secimage-pushleft'          => esc_html__('Push Left', 'pallikoodam'),
                      'product-hover-secimage-pushright'         => esc_html__('Push Right', 'pallikoodam'),
                      'product-hover-secimage-slideup'           => esc_html__('Slide Up', 'pallikoodam'),
                      'product-hover-secimage-slidedown'         => esc_html__('Slide Down', 'pallikoodam'),
                      'product-hover-secimage-slideleft'         => esc_html__('Slide Left', 'pallikoodam'),
                      'product-hover-secimage-slideright'        => esc_html__('Slide Right', 'pallikoodam'),		
                      'product-hover-secimage-hingeup'           => esc_html__('Hinge Up', 'pallikoodam'),
                      'product-hover-secimage-hingedown'         => esc_html__('Hinge Down', 'pallikoodam'),
                      'product-hover-secimage-hingeleft'         => esc_html__('Hinge Left', 'pallikoodam'),
                      'product-hover-secimage-hingeright'        => esc_html__('Hinge Right', 'pallikoodam'),		
                      'product-hover-secimage-foldup'            => esc_html__('Fold Up', 'pallikoodam'),
                      'product-hover-secimage-folddown'          => esc_html__('Fold Down', 'pallikoodam'),
                      'product-hover-secimage-foldleft'          => esc_html__('Fold Left', 'pallikoodam'),
                      'product-hover-secimage-foldright'         => esc_html__('Fold Right', 'pallikoodam'),
                      'product-hover-secimage-fliphoriz'         => esc_html__('Flip Horizontal', 'pallikoodam'),
                      'product-hover-secimage-flipvert'          => esc_html__('Flip Vertical', 'pallikoodam')
                    ),
            'default'    => 'product-hover-secimage-fade'
          ),

          array(
            'id'         => 'product-content-hover-effects',
            'type'       => 'select',
            'title'      => esc_html__('Content Hover Effects', 'pallikoodam'),
            'options'    => array(
                      ''                                   => esc_html__('None', 'pallikoodam'),
                      'product-content-hover-fade'         => esc_html__('Fade', 'pallikoodam'),
                      'product-content-hover-zoom'         => esc_html__('Zoom', 'pallikoodam'),
                      'product-content-hover-slidedefault' => esc_html__('Slide Default', 'pallikoodam'),
                      'product-content-hover-slideleft'    => esc_html__('Slide From Left', 'pallikoodam'),
                      'product-content-hover-slideright'   => esc_html__('Slide From Right', 'pallikoodam'),
                      'product-content-hover-slidetop'     => esc_html__('Slide From Top', 'pallikoodam'),
                      'product-content-hover-slidebottom'  => esc_html__('Slide From Bottom', 'pallikoodam')
                    ),
            'default'    => ''
          ),

          array(
            'id'         => 'product-icongroup-hover-effects',
            'type'       => 'select',
            'title'      => esc_html__('Icon Group Hover Effects', 'pallikoodam'),
            'options'    => array(
                      ''                               => esc_html__('None', 'pallikoodam'),
                      'product-icongroup-hover-flipx'  => esc_html__('Flip X', 'pallikoodam'),
                      'product-icongroup-hover-flipy'  => esc_html__('Flip Y', 'pallikoodam'),
                      'product-icongroup-hover-bounce' => esc_html__('Bounce', 'pallikoodam')
                    ),
            'default'    => ''
          ),

        )
      ),
      # Hover Options


      # Common Options
      array (
        'name'                 => 'common_options_section',
        'title'                => esc_html__('Common Options', 'pallikoodam'),
        'icon'                 => 'fa fa-angle-double-right',
        'fields'               => array (
        
          array(
            'id'         => 'product-borderorshadow',
            'type'       => 'select',
            'title'      => esc_html__('Border or Shadow', 'pallikoodam'),
            'options'    => array(
                      ''                              => esc_html__('None', 'pallikoodam'),
                      'product-borderorshadow-border' => esc_html__('Border', 'pallikoodam'),
                      'product-borderorshadow-shadow' => esc_html__('Shadow', 'pallikoodam')
                    ),
            'default'    => '',
            'desc'      => esc_html__('Choose either Border or Shadow for your product listing.', 'pallikoodam')
          ),										
          array(
            'id'         => 'product-border-type',
            'type'       => 'select',
            'title'      => esc_html__('Border - Type', 'pallikoodam'),
            'options'    => array(
                      'product-border-type-default' => esc_html__('Default', 'pallikoodam'),
                      'product-border-type-thumb'   => esc_html__('Thumb', 'pallikoodam')
                    ),
            'default'    => 'product-border-type-default',
          ),													
          array(
            'id'         => 'product-border-position',
            'type'       => 'select',
            'title'      => esc_html__('Border - Position', 'pallikoodam'),
            'options'    => array(
                      'product-border-position-default'      => esc_html__('Default', 'pallikoodam'),
                      'product-border-position-left'         => esc_html__('Left', 'pallikoodam'),
                      'product-border-position-right'        => esc_html__('Right', 'pallikoodam'),
                      'product-border-position-top'          => esc_html__('Top', 'pallikoodam'),
                      'product-border-position-bottom'       => esc_html__('Bottom', 'pallikoodam'),
                      'product-border-position-top-left'     => esc_html__('Top Left', 'pallikoodam'),
                      'product-border-position-top-right'    => esc_html__('Top Right', 'pallikoodam'),
                      'product-border-position-bottom-left'  => esc_html__('Bottom Left', 'pallikoodam'),
                      'product-border-position-bottom-right' => esc_html__('Bottom Right', 'pallikoodam')														
                    ),
            'default'    => 'product-border-position-default',
          ),	
          array(
            'id'         => 'product-shadow-type',
            'type'       => 'select',
            'title'      => esc_html__('Shadow - Type', 'pallikoodam'),
            'options'    => array(
                      'product-shadow-type-default' => esc_html__('Default', 'pallikoodam'),
                      'product-shadow-type-thumb'   => esc_html__('Thumb', 'pallikoodam')
                    ),
            'default'    => 'product-shadow-type-default',
          ),
          array(
            'id'         => 'product-shadow-position',
            'type'       => 'select',
            'title'      => esc_html__('Shadow - Position', 'pallikoodam'),
            'options'    => array(
                      'product-shadow-position-default'      => esc_html__('Default', 'pallikoodam'),
                      'product-shadow-position-top-left'     => esc_html__('Top Left', 'pallikoodam'),
                      'product-shadow-position-top-right'    => esc_html__('Top Right', 'pallikoodam'),
                      'product-shadow-position-bottom-left'  => esc_html__('Bottom Left', 'pallikoodam'),
                      'product-shadow-position-bottom-right' => esc_html__('Bottom Right', 'pallikoodam')
                    ),
            'default'    => 'product-shadow-position-default',
          ),

          array(
            'id'         => 'product-bordershadow-highlight',
            'type'       => 'select',
            'title'      => esc_html__('Border / Shadow - Highlight', 'pallikoodam'),
            'options'    => array(
                      ''                                       => esc_html__('None', 'pallikoodam'),
                      'product-bordershadow-highlight-default' => esc_html__('Default', 'pallikoodam'),
                      'product-bordershadow-highlight-onhover' => esc_html__('On Hover', 'pallikoodam')
                    ),
            'default'    => '',
          ),

          array(
            'id'         => 'product-background-bgcolor',
            'type'       => 'color_picker',
            'title'      => esc_html__('Background - Background Color', 'pallikoodam')
          ),

          array(
            'id'         => 'product-background-dark-bgcolor',
            'type'       => 'switcher',
            'title'      => esc_html__('Background - Dark Background', 'pallikoodam')
          ),
        
          array(
            'id'         => 'product-padding',
            'type'       => 'select',
            'title'      => esc_html__('Padding', 'pallikoodam'),
            'options'    => array(
                      'product-padding-default' => esc_html__('Default', 'pallikoodam'),
                      'product-padding-overall' => esc_html__('Product', 'pallikoodam'),
                      'product-padding-thumb'   => esc_html__('Thumb', 'pallikoodam'),
                      'product-padding-content' => esc_html__('Content', 'pallikoodam'),
                    ),
            'default'    => 'product-padding-default'
          ),
          array(
            'id'         => 'product-space',
            'type'       => 'select',
            'title'      => esc_html__('Space', 'pallikoodam'),
            'options'    => array(
                      'product-without-space' => esc_html__('False', 'pallikoodam'),
                      'product-with-space'  => esc_html__('True', 'pallikoodam')
                    ),
            'default'    => 'product-with-space'
          ),
          array(
            'id'         => 'product-display-type',
            'type'       => 'select',
            'title'      => esc_html__('Display Type', 'pallikoodam'),
            'options'    => array(
                      'grid' => esc_html__('Grid', 'pallikoodam'),
                      'list'  => esc_html__('List', 'pallikoodam')
                    ),
            'default'    => 'grid'
          ),
          array(
            'id'         => 'product-display-type-list-options',
            'type'       => 'select',
            'title'      => esc_html__('List Options', 'pallikoodam'),
            'options'    => array(
                      'left-thumb'  => esc_html__('Left Thumb', 'pallikoodam'),
                      'right-thumb' => esc_html__('Right Thumb', 'pallikoodam')
                    ),
            'default'    => 'left-thumb'
          ),	
          array(
            'id'         => 'product-show-labels',
            'type'       => 'select',
            'title'      => esc_html__('Show Product Labels', 'pallikoodam'),
            'options'    => array(
                      'true'  => esc_html__('True', 'pallikoodam'),
                      'false' => esc_html__('False', 'pallikoodam')
                    ),
            'default'    => 'true'
          ),															
          array(
            'id'         => 'product-label-design',
            'type'       => 'select',
            'title'      => esc_html__('Product Label Design', 'pallikoodam'),
            'options'    => array(
                      'product-label-boxed'      => esc_html__('Boxed', 'pallikoodam'),
                      'product-label-circle'  => esc_html__('Circle', 'pallikoodam'),
                      'product-label-rounded'   => esc_html__('Rounded', 'pallikoodam'),
                      'product-label-angular'   => esc_html__('Angular', 'pallikoodam'),
                      'product-label-ribbon'   => esc_html__('Ribbon', 'pallikoodam'),
                    ),
            'default'    => 'product-label-boxed',
          ),

          array(
            'id'         => 'product-custom-class',
            'type'       => 'text',
            'title'      => esc_html__('Custom Class', 'pallikoodam')
          ),	

        )
      ),
      # Common Options


      # Thumb Options
      array (
        'name'                 => 'thumb_options_section',
        'title'                => esc_html__('Thumb Options', 'pallikoodam'),
        'icon'                 => 'fa fa-angle-double-right',
        'fields'               => array (

          array(
            'id'         => 'product-thumb-secondary-image-onhover',
            'type'       => 'switcher',
            'title'      => esc_html__('Show Secondary Image On Hover', 'pallikoodam'),
            'desc'	 => esc_html__('YES! to show secondary image on product hover. First image in the gallery will be used as secondary image.', 'pallikoodam')
          ),

          array(
            'id'             => 'product-thumb-content',
            'type'           => 'sorter',
            'title'          => esc_html__('Content', 'pallikoodam'),
            'default'        => array(
              'enabled'      => array(
                'title'          => esc_html__('Title', 'pallikoodam'),
                'category'       => esc_html__('Category', 'pallikoodam'),
                'price'          => esc_html__('Price', 'pallikoodam'),
                'button_element' => esc_html__('Button Element', 'pallikoodam'),
                'icons_group'    => esc_html__('Icons Group', 'pallikoodam'),
              ),
              'disabled'     => array(
                'excerpt'       => esc_html__('Excerpt', 'pallikoodam'),
                'rating'        => esc_html__('Rating', 'pallikoodam'),
                'countdown'     => esc_html__('Count Down', 'pallikoodam'),
                'separator'     => esc_html__('Separator', 'pallikoodam'),
                'element_group' => esc_html__('Element Group', 'pallikoodam'),
                'swatches'      => esc_html__('Swatches', 'pallikoodam'),
              ),
            ),
            'enabled_title'  => esc_html__('Active Elements', 'pallikoodam'),
            'disabled_title' => esc_html__('Deatcive Elements', 'pallikoodam'),
          ),

          array(
            'id'         => 'product-thumb-alignment',
            'type'       => 'select',
            'title'      => esc_html__('Alignment', 'pallikoodam'),
            'options'    => array(
                      'product-thumb-alignment-top'          => esc_html__('Top', 'pallikoodam'),
                      'product-thumb-alignment-top-left'     => esc_html__('Top Left', 'pallikoodam'),
                      'product-thumb-alignment-top-right'    => esc_html__('Top Right', 'pallikoodam'),
                      'product-thumb-alignment-middle'       => esc_html__('Middle', 'pallikoodam'),
                      'product-thumb-alignment-bottom'       => esc_html__('Bottom', 'pallikoodam'),
                      'product-thumb-alignment-bottom-left'  => esc_html__('Bottom Left', 'pallikoodam'),
                      'product-thumb-alignment-bottom-right' => esc_html__('Bottom Right', 'pallikoodam')
                    ),
            'default'    => 'product-thumb-alignment-top'
          ),

          array(
            'id'         => 'product-thumb-iconsgroup-icons',
            'type'       => 'select',
            'title'      => esc_html__('Icons Group - Icons', 'pallikoodam'),
            'options'    => array(
                      'cart'      => esc_html__('Cart', 'pallikoodam'),
                      'wishlist'  => esc_html__('Wishlist', 'pallikoodam'),
                      'compare'   => esc_html__('Compare', 'pallikoodam'),
                      'quickview' => esc_html__('Quick View', 'pallikoodam')
                    ),
            'class'         => 'chosen',
            'attributes'    => array(
              'multiple'    => 'multiple',
            ),							
          ),

          array(
            'id'         => 'product-thumb-iconsgroup-style',
            'type'       => 'select',
            'title'      => esc_html__('Icons Group - Style', 'pallikoodam'),
            'options'    => array(
                      'product-thumb-iconsgroup-style-simple'  => esc_html__('Simple', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-bgfill-square'  => esc_html__('Background Fill Square', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-bgfill-rounded-square' => esc_html__('Background Fill Rounded Square', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-bgfill-rounded'  => esc_html__('Background Fill Rounded', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-brdrfill-square'  => esc_html__('Border Fill Square', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-brdrfill-rounded-square' => esc_html__('Border Fill Rounded Square', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-brdrfill-rounded'  => esc_html__('Border Fill Rounded', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-skinbgfill-square'  => esc_html__('Skin Background Fill Square', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-skinbgfill-rounded-square' => esc_html__('Skin Background Fill Rounded Square', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-skinbgfill-rounded'  => esc_html__('Skin Background Fill Rounded', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-skinbrdrfill-square'  => esc_html__('Skin Border Fill Square', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-skinbrdrfill-rounded-square' => esc_html__('Skin Border Fill Rounded Square', 'pallikoodam'),
                      'product-thumb-iconsgroup-style-skinbrdrfill-rounded'  => esc_html__('Skin Border Fill Rounded', 'pallikoodam')																											
                    ),
            'default'    => 'product-thumb-iconsgroup-style-simple'
          ),

          array(
            'id'         => 'product-thumb-iconsgroup-position',
            'type'       => 'select',
            'title'      => esc_html__('Icons Group - Position', 'pallikoodam'),
            'options'    => array(

                    ''                                                                              => esc_html__('Default', 'pallikoodam'),

                    'product-thumb-iconsgroup-position-horizontal horizontal-position-top'          => esc_html__('Horizontal Top', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-horizontal horizontal-position-top-left'     => esc_html__('Horizontal Top Left', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-horizontal horizontal-position-top-right'    => esc_html__('Horizontal Top Right', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-horizontal horizontal-position-middle'       => esc_html__('Horizontal Middle', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-horizontal horizontal-position-bottom'       => esc_html__('Horizontal Bottom', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-horizontal horizontal-position-bottom-left'  => esc_html__('Horizontal Bottom Left', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-horizontal horizontal-position-bottom-right' => esc_html__('Horizontal Bottom Right', 'pallikoodam'),

                    'product-thumb-iconsgroup-position-vertical vertical-position-top-left'         => esc_html__('Vertical Top Left', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-vertical vertical-position-top-right'        => esc_html__('Vertical Top Right', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-vertical vertical-position-middle-left'      => esc_html__('Vertical Middle Left', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-vertical vertical-position-middle-right'     => esc_html__('Vertical Middle Right', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-vertical vertical-position-bottom-left'      => esc_html__('Vertical Bottom Left', 'pallikoodam'),
                    'product-thumb-iconsgroup-position-vertical vertical-position-bottom-right'     => esc_html__('Vertical Bottom Right', 'pallikoodam')

                  ),
            'default'    => ''
          ),

          array(
            'id'         => 'product-thumb-buttonelement-button',
            'type'       => 'select',
            'title'      => esc_html__('Button Element - Button', 'pallikoodam'),
            'options'    => array(
                      ''          => esc_html__('None', 'pallikoodam'),
                      'cart'      => esc_html__('Cart', 'pallikoodam'),
                      'wishlist'  => esc_html__('Wishlist', 'pallikoodam'),
                      'compare'   => esc_html__('Compare', 'pallikoodam'),
                      'quickview' => esc_html__('Quick View', 'pallikoodam')
                    )
          ),	

          array(
            'id'         => 'product-thumb-buttonelement-secondary-button',
            'type'       => 'select',
            'title'      => esc_html__('Button Element - Secondary Button', 'pallikoodam'),
            'options'    => array(
                      ''          => esc_html__('None', 'pallikoodam'),
                      'cart'      => esc_html__('Cart', 'pallikoodam'),
                      'wishlist'  => esc_html__('Wishlist', 'pallikoodam'),
                      'compare'   => esc_html__('Compare', 'pallikoodam'),
                      'quickview' => esc_html__('Quick View', 'pallikoodam')
                    )
          ),

          array(
            'id'         => 'product-thumb-buttonelement-style',
            'type'       => 'select',
            'title'      => esc_html__('Button Element - Style', 'pallikoodam'),
            'options'    => array(
                      'product-thumb-buttonelement-style-simple'  => esc_html__('Simple', 'pallikoodam'),
                      'product-thumb-buttonelement-style-bgfill-square'  => esc_html__('Background Fill Square', 'pallikoodam'),
                      'product-thumb-buttonelement-style-bgfill-rounded-square' => esc_html__('Background Fill Rounded Square', 'pallikoodam'),
                      'product-thumb-buttonelement-style-bgfill-rounded'  => esc_html__('Background Fill Rounded', 'pallikoodam'),
                      'product-thumb-buttonelement-style-brdrfill-square'  => esc_html__('Border Fill Square', 'pallikoodam'),
                      'product-thumb-buttonelement-style-brdrfill-rounded-square' => esc_html__('Border Fill Rounded Square', 'pallikoodam'),
                      'product-thumb-buttonelement-style-brdrfill-rounded'  => esc_html__('Border Fill Rounded', 'pallikoodam'),
                      'product-thumb-buttonelement-style-skinbgfill-square'  => esc_html__('Skin Background Fill Square', 'pallikoodam'),
                      'product-thumb-buttonelement-style-skinbgfill-rounded-square' => esc_html__('Skin Background Fill Rounded Square', 'pallikoodam'),
                      'product-thumb-buttonelement-style-skinbgfill-rounded'  => esc_html__('Skin Background Fill Rounded', 'pallikoodam'),
                      'product-thumb-buttonelement-style-skinbrdrfill-square'  => esc_html__('Skin Border Fill Square', 'pallikoodam'),
                      'product-thumb-buttonelement-style-skinbrdrfill-rounded-square' => esc_html__('Skin Border Fill Rounded Square', 'pallikoodam'),
                      'product-thumb-buttonelement-style-skinbrdrfill-rounded'  => esc_html__('Skin Border Fill Rounded', 'pallikoodam')																
                    ),
            'default'    => 'product-thumb-buttonelement-style-simple'
          ),

          array(
            'id'         => 'product-thumb-buttonelement-stretch',
            'type'       => 'select',
            'title'      => esc_html__('Button Element - Stretch', 'pallikoodam'),
            'options'    => array(
                      ''                                    => esc_html__('False', 'pallikoodam'),
                      'product-thumb-buttonelement-stretch' => esc_html__('True', 'pallikoodam')
                    )
          ),

          array(
            'id'             => 'product-thumb-element-group',
            'type'           => 'sorter',
            'title'          => esc_html__('Element Group Content', 'pallikoodam'),
            'default'        => array(
              'enabled'      => array(
                'title' => esc_html__('Title', 'pallikoodam'),
                'price' => esc_html__('Price', 'pallikoodam')
              ),
              'disabled'     => array(
                'cart'           => esc_html__('Cart', 'pallikoodam'),
                'wishlist'       => esc_html__('Wishlist', 'pallikoodam'),
                'compare'        => esc_html__('Compare', 'pallikoodam'),
                'quickview'      => esc_html__('Quick View', 'pallikoodam'),
                'category'       => esc_html__('Category', 'pallikoodam'),
                'button_element' => esc_html__('Button Element', 'pallikoodam'),
                'icons_group'    => esc_html__('Icons Group', 'pallikoodam'),
                'excerpt'        => esc_html__('Excerpt', 'pallikoodam'),
                'rating'         => esc_html__('Rating', 'pallikoodam'),
                'separator'      => esc_html__('Separator', 'pallikoodam'),
                'swatches'       => esc_html__('Swatches', 'pallikoodam')
              ),
            ),
            'enabled_title'  => esc_html__('Active Elements', 'pallikoodam'),
            'disabled_title' => esc_html__('Deatcive Elements', 'pallikoodam'),
          ),


        )
      ),
      # Thumb Options

      # Content Options
      array (
        'name'                 => 'content_options_section',
        'title'                => esc_html__('Content Options', 'pallikoodam'),
        'icon'                 => 'fa fa-angle-double-right',
        'fields'               => array (

          array(
            'id'         => 'product-content-enable',
            'type'       => 'switcher',
            'title'      => esc_html__('Enable Content Section', 'pallikoodam'),
            'desc'	 => esc_html__('YES! to enable content section.', 'pallikoodam')
          ),

          array(
            'id'             => 'product-content-content',
            'type'           => 'sorter',
            'title'          => esc_html__('Content', 'pallikoodam'),
            'default'        => array(
              'enabled'      => array(
                'title'          => esc_html__('Title', 'pallikoodam'),
                'category'       => esc_html__('Category', 'pallikoodam'),
                'price'          => esc_html__('Price', 'pallikoodam'),
                'button_element' => esc_html__('Button Element', 'pallikoodam'),
                'icons_group'    => esc_html__('Icons Group', 'pallikoodam'),
              ),
              'disabled'     => array(
                'excerpt'       => esc_html__('Excerpt', 'pallikoodam'),
                'rating'        => esc_html__('Rating', 'pallikoodam'),
                'countdown'     => esc_html__('Count Down', 'pallikoodam'),
                'separator'     => esc_html__('Separator', 'pallikoodam'),
                'element_group' => esc_html__('Element Group', 'pallikoodam'),
                'swatches'      => esc_html__('Swatches', 'pallikoodam'),
              ),
            ),
            'enabled_title'  => esc_html__('Active Elements', 'pallikoodam'),
            'disabled_title' => esc_html__('Deatcive Elements', 'pallikoodam'),
          ),

          array(
            'id'         => 'product-content-alignment',
            'type'       => 'select',
            'title'      => esc_html__('Alignment', 'pallikoodam'),
            'options'    => array(
                      'product-content-alignment-left'   => esc_html__('Left', 'pallikoodam'),
                      'product-content-alignment-right'  => esc_html__('Right', 'pallikoodam'),
                      'product-content-alignment-center' => esc_html__('Center', 'pallikoodam')
                    ),
            'default'    => 'product-content-alignment-left'
          ),

          array(
            'id'         => 'product-content-iconsgroup-icons',
            'type'       => 'select',
            'title'      => esc_html__('Icons Group - Icons', 'pallikoodam'),
            'options'    => array(
                      'cart'      => esc_html__('Cart', 'pallikoodam'),
                      'wishlist'  => esc_html__('Wishlist', 'pallikoodam'),
                      'compare'   => esc_html__('Compare', 'pallikoodam'),
                      'quickview' => esc_html__('Quick View', 'pallikoodam')
                    ),
            'class'         => 'chosen',
            'attributes'    => array(
              'multiple'    => 'multiple',
            ),							
          ),

          array(
            'id'         => 'product-content-iconsgroup-style',
            'type'       => 'select',
            'title'      => esc_html__('Icons Group - Style', 'pallikoodam'),
            'options'    => array(
                      'product-content-iconsgroup-style-simple'  => esc_html__('Simple', 'pallikoodam'),
                      'product-content-iconsgroup-style-bgfill-square'  => esc_html__('Background Fill Square', 'pallikoodam'),
                      'product-content-iconsgroup-style-bgfill-rounded-square' => esc_html__('Background Fill Rounded Square', 'pallikoodam'),
                      'product-content-iconsgroup-style-bgfill-rounded'  => esc_html__('Background Fill Rounded', 'pallikoodam'),
                      'product-content-iconsgroup-style-brdrfill-square'  => esc_html__('Border Fill Square', 'pallikoodam'),
                      'product-content-iconsgroup-style-brdrfill-rounded-square' => esc_html__('Border Fill Rounded Square', 'pallikoodam'),
                      'product-content-iconsgroup-style-brdrfill-rounded'  => esc_html__('Border Fill Rounded', 'pallikoodam'),
                      'product-content-iconsgroup-style-skinbgfill-square'  => esc_html__('Skin Background Fill Square', 'pallikoodam'),
                      'product-content-iconsgroup-style-skinbgfill-rounded-square' => esc_html__('Skin Background Fill Rounded Square', 'pallikoodam'),
                      'product-content-iconsgroup-style-skinbgfill-rounded'  => esc_html__('Skin Background Fill Rounded', 'pallikoodam'),
                      'product-content-iconsgroup-style-skinbrdrfill-square'  => esc_html__('Skin Border Fill Square', 'pallikoodam'),
                      'product-content-iconsgroup-style-skinbrdrfill-rounded-square' => esc_html__('Skin Border Fill Rounded Square', 'pallikoodam'),
                      'product-content-iconsgroup-style-skinbrdrfill-rounded'  => esc_html__('Skin Border Fill Rounded', 'pallikoodam')																													
                    ),
            'default'    => 'product-content-iconsgroup-style-simple'
          ),

          array(
            'id'         => 'product-content-buttonelement-button',
            'type'       => 'select',
            'title'      => esc_html__('Button Element - Button', 'pallikoodam'),
            'options'    => array(
                      ''          => esc_html__('None', 'pallikoodam'),
                      'cart'      => esc_html__('Cart', 'pallikoodam'),
                      'wishlist'  => esc_html__('Wishlist', 'pallikoodam'),
                      'compare'   => esc_html__('Compare', 'pallikoodam'),
                      'quickview' => esc_html__('Quick View', 'pallikoodam')
                    )
          ),	

          array(
            'id'         => 'product-content-buttonelement-secondary-button',
            'type'       => 'select',
            'title'      => esc_html__('Button Element - Secondary Button', 'pallikoodam'),
            'options'    => array(
                      ''          => esc_html__('None', 'pallikoodam'),
                      'cart'      => esc_html__('Cart', 'pallikoodam'),
                      'wishlist'  => esc_html__('Wishlist', 'pallikoodam'),
                      'compare'   => esc_html__('Compare', 'pallikoodam'),
                      'quickview' => esc_html__('Quick View', 'pallikoodam')
                    )
          ),

          array(
            'id'         => 'product-content-buttonelement-style',
            'type'       => 'select',
            'title'      => esc_html__('Button Element - Style', 'pallikoodam'),
            'options'    => array(
                      'product-content-buttonelement-style-simple'  => esc_html__('Simple', 'pallikoodam'),
                      'product-content-buttonelement-style-bgfill-square'  => esc_html__('Background Fill Square', 'pallikoodam'),
                      'product-content-buttonelement-style-bgfill-rounded-square' => esc_html__('Background Fill Rounded Square', 'pallikoodam'),
                      'product-content-buttonelement-style-bgfill-rounded'  => esc_html__('Background Fill Rounded', 'pallikoodam'),
                      'product-content-buttonelement-style-brdrfill-square'  => esc_html__('Border Fill Square', 'pallikoodam'),
                      'product-content-buttonelement-style-brdrfill-rounded-square' => esc_html__('Border Fill Rounded Square', 'pallikoodam'),
                      'product-content-buttonelement-style-brdrfill-rounded'  => esc_html__('Border Fill Rounded', 'pallikoodam'),
                      'product-content-buttonelement-style-skinbgfill-square'  => esc_html__('Skin Background Fill Square', 'pallikoodam'),
                      'product-content-buttonelement-style-skinbgfill-rounded-square' => esc_html__('Skin Background Fill Rounded Square', 'pallikoodam'),
                      'product-content-buttonelement-style-skinbgfill-rounded'  => esc_html__('Skin Background Fill Rounded', 'pallikoodam'),
                      'product-content-buttonelement-style-skinbrdrfill-square'  => esc_html__('Skin Border Fill Square', 'pallikoodam'),
                      'product-content-buttonelement-style-skinbrdrfill-rounded-square' => esc_html__('Skin Border Fill Rounded Square', 'pallikoodam'),
                      'product-content-buttonelement-style-skinbrdrfill-rounded'  => esc_html__('Skin Border Fill Rounded', 'pallikoodam')																													
                    ),
            'default'    => 'product-content-buttonelement-style-simple'
          ),

          array(
            'id'         => 'product-content-buttonelement-stretch',
            'type'       => 'select',
            'title'      => esc_html__('Button Element - Stretch', 'pallikoodam'),
            'options'    => array(
                      ''                                    => esc_html__('False', 'pallikoodam'),
                      'product-content-buttonelement-stretch' => esc_html__('True', 'pallikoodam')
                    )
          ),

          array(
            'id'             => 'product-content-element-group',
            'type'           => 'sorter',
            'title'          => esc_html__('Element Group Content', 'pallikoodam'),
            'default'        => array(
              'enabled'      => array(
                'title'          => esc_html__('Title', 'pallikoodam'),
                'price'          => esc_html__('Price', 'pallikoodam')
              ),
              'disabled'     => array(
                'cart'           => esc_html__('Cart', 'pallikoodam'),
                'wishlist'       => esc_html__('Wishlist', 'pallikoodam'),
                'compare'        => esc_html__('Compare', 'pallikoodam'),
                'quickview'      => esc_html__('Quick View', 'pallikoodam'),
                'category'       => esc_html__('Category', 'pallikoodam'),
                'button_element' => esc_html__('Button Element', 'pallikoodam'),
                'icons_group'    => esc_html__('Icons Group', 'pallikoodam'),
                'excerpt'        => esc_html__('Excerpt', 'pallikoodam'),
                'rating'         => esc_html__('Rating', 'pallikoodam'),
                'separator'      => esc_html__('Separator', 'pallikoodam'),
                'swatches'       => esc_html__('Swatches', 'pallikoodam')
              ),
            ),
            'enabled_title'  => esc_html__('Active Elements', 'pallikoodam'),
            'disabled_title' => esc_html__('Deactive Elements', 'pallikoodam')
          ),


        )
      ),
      # Content Options

    )
  );

  return $options;

}