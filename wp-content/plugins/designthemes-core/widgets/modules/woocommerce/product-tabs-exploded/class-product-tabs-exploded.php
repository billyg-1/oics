<?php
use DTElementor\Widgets\DTElementorWidgetBase;
use Elementor\Controls_Manager;

class DTElementor_Woo_Product_Tabs_Exploded extends DTElementorWidgetBase {

	public function get_name() {
		return 'dt-shop-product-single-tabs-exploded';
	}

	public function get_title() {
		return __( 'Product Single - Tabs Exploded', 'dt-elementor' );
	}

	public function get_style_depends() {
		return array( 'dtel-product-single-tabs-exploded' );
	}

	public function get_script_depends() {
		return array( 'jquery.nicescroll', 'dtel-product-single-tabs-exploded' );
	}

	protected function register_controls() {
		$this->start_controls_section( 'product_tabs_exploded_section', array(
			'label' => esc_html__( 'General', 'dt-elementor' ),
		) );

			$this->add_control( 'product_id', array(
				'label'       => esc_html__( 'Product Id', 'dt-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__('Provide product id for which you have to display product summary items. No need to provide ID if it is used in Product single page.', 'dt-elementor'),				
			) );

			$this->add_control( 'tab', array(
				'label'       => __( 'Tab', 'dt-elementor' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__('Choose tab that you would like to use.', 'dt-elementor'),
				'default'     => 'description',
				'options'     => array(
					'description'            => esc_html__( 'Description', 'dt-elementor' ),
					'review'                 => esc_html__( 'Review', 'dt-elementor' ),
					'additional_information' => esc_html__( 'Additional Information', 'dt-elementor' ),
					'custom_tab_1'           => esc_html__( 'Custom Tab 1', 'dt-elementor' ),
					'custom_tab_2'           => esc_html__( 'Custom Tab 2', 'dt-elementor' ),
					'custom_tab_3'           => esc_html__( 'Custom Tab 3', 'dt-elementor' ),
					'custom_tab_4'           => esc_html__( 'Custom Tab 4', 'dt-elementor' ),					
				),
			) );			

			$this->add_control( 'hide_title', array(
				'label'        => __( 'Hide Title', 'dt-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'yes', 'dt-elementor' ),
				'label_off'    => __( 'no', 'dt-elementor' ),
				'default'      => '',
				'return_value' => 'true',
				'description'  => esc_html__( 'If you wish to hide title you can do it here', 'dt-elementor' ),
			) );			

			$this->add_control( 'apply_scroll', array(
				'label'        => __( 'Apply Content Scroll', 'dt-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'yes', 'dt-elementor' ),
				'label_off'    => __( 'no', 'dt-elementor' ),
				'default'      => '',
				'return_value' => 'true',
				'description'  => esc_html__( 'If you wish to apply scroll you can do it here', 'dt-elementor' ),
			) );

			$this->add_control( 'scroll_height', array(
				'label'       => esc_html__( 'Scroll Height (px)', 'dt-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Specify height for your section here.', 'dt-elementor' ),
				'condition'   => array( 'apply_scroll' => 'true' ),
			) );						

			$this->add_control(
				'class',
				array (
					'label' => __( 'Class', 'dt-elementor' ),
					'type'  => Controls_Manager::TEXT
				)
			);

		$this->end_controls_section();					
	}

	protected function render() {

		$settings = $this->get_settings();

		$output = '';
	
		if($settings['product_id'] == '' && is_singular('product')) {
			global $post;
			$settings['product_id'] = $post->ID;
		}

		if($settings['product_id'] != '') {

			$hide_title_class = '';
			if($settings['hide_title'] == 'true') {
				$hide_title_class = 'dt-sc-product-hide-tab-title';
			}

			$scroll_class = $scroll_height_style_attr = '';
			if($settings['apply_scroll'] == 'true') {
				$scroll_class             = 'dt-sc-content-scroll';
				$scroll_height            = ($settings['scroll_height'] != '') ? $settings['scroll_height'] : 400;
				$scroll_height_style_attr = 'style = "height:'.esc_attr($scroll_height).'px"';
			}			

			$output .= '<div class="dt-sc-product-tabs dt-sc-product-tabs-exploded '.$settings['class'].' '.$hide_title_class.' '.$scroll_class.'" '.$scroll_height_style_attr.'>';

				if($settings['tab'] == 'description') {

					ob_start();
					woocommerce_product_description_tab();
					$output .= ob_get_clean();

				}

				if($settings['tab'] == 'review') {

					ob_start();
					comments_template();
					$output .= ob_get_clean();

				}

				if($settings['tab'] == 'additional_information') {

					ob_start();
					woocommerce_product_additional_information_tab();
					$output .= ob_get_clean();

				}


				// Custom Tabs

				if($settings['tab'] == 'custom_tab_1' || $settings['tab'] == 'custom_tab_2' || $settings['tab'] == 'custom_tab_3' || $settings['tab'] == 'custom_tab_4') {

					$settings = get_post_meta( $settings['product_id'], '_custom_settings', true );
					$product_additional_tabs = (isset($settings['product-additional-tabs']) && $settings['product-additional-tabs'] != '') ? $settings['product-additional-tabs'] : array ();	

					// Tab 1
					if($settings['tab'] == 'custom_tab_1' && isset($product_additional_tabs[1])) {

						ob_start();
						$tab_title = $product_additional_tabs[1]['tab_title'];
						$tab_title = preg_replace('/[^A-Za-z0-9\-]/', '', $tab_title);
						$tab_key = 'dt_'.strtolower(str_replace(' ', '', $tab_title));
						pallikoodam_woo_additional_product_tabs_content( $tab_key );
						$output .= ob_get_clean();

					}	

					// Tab 2
					if($settings['tab'] == 'custom_tab_2' && isset($product_additional_tabs[2])) {

						ob_start();
						$tab_title = $product_additional_tabs[2]['tab_title'];
						$tab_title = preg_replace('/[^A-Za-z0-9\-]/', '', $tab_title);
						$tab_key = 'dt_'.strtolower(str_replace(' ', '', $tab_title));
						pallikoodam_woo_additional_product_tabs_content( $tab_key );
						$output .= ob_get_clean();

					}

					// Tab 3
					if($settings['tab'] == 'custom_tab_3' && isset($product_additional_tabs[3])) {

						ob_start();
						$tab_title = $product_additional_tabs[3]['tab_title'];
						$tab_title = preg_replace('/[^A-Za-z0-9\-]/', '', $tab_title);
						$tab_key = 'dt_'.strtolower(str_replace(' ', '', $tab_title));
						pallikoodam_woo_additional_product_tabs_content( $tab_key );
						$output .= ob_get_clean();

					}

					// Tab 4
					if($settings['tab'] == 'custom_tab_4' && isset($product_additional_tabs[4])) {

						ob_start();
						$tab_title = $product_additional_tabs[4]['tab_title'];
						$tab_title = preg_replace('/[^A-Za-z0-9\-]/', '', $tab_title);
						$tab_key = 'dt_'.strtolower(str_replace(' ', '', $tab_title));
						pallikoodam_woo_additional_product_tabs_content( $tab_key );
						$output .= ob_get_clean();

					}					

				}

			$output .= '</div>';
			
		} else {
		
			$output .= esc_html__('Please provide product id to display corresponding data!', 'dt-elementor');
			
		}

		echo $output;

	}

}		