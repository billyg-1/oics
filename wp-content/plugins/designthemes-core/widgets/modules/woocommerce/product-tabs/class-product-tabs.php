<?php
use DTElementor\Widgets\DTElementorWidgetBase;
use Elementor\Controls_Manager;

class DTElementor_Woo_Product_Tabs extends DTElementorWidgetBase {

	public function get_name() {
		return 'dt-shop-product-single-tabs';
	}

	public function get_title() {
		return __( 'Product Single - Tabs', 'dt-elementor' );
	}

	public function get_style_depends() {
		return array( 'dtel-product-single-tabs' );
	}

	protected function register_controls() {

		$this->start_controls_section( 'product_tabs_section', array(
			'label' => esc_html__( 'General', 'dt-elementor' ),
		) );

			$this->add_control( 'product_id', array(
				'label'       => esc_html__( 'Product Id', 'dt-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__('Provide product id for which you have to display product summary items. No need to provide ID if it is used in Product single page.', 'dt-elementor'),				
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

			$output .= '<div class="dt-sc-product-tabs-wrapper '.$settings['class'].' '.$hide_title_class.'">';

				ob_start();
				woocommerce_output_product_data_tabs();
				$output .= ob_get_clean();

			$output .= '</div>';
			
		} else {
		
			$output .= esc_html__('Please provide product id to display corresponding data!', 'dt-elementor');
			
		}

		echo $output;

	}

}		