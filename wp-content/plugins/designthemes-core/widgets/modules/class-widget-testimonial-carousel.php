<?php
use DTElementor\Widgets\DTElementorWidgetBase;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;

class Elementor_Testimonial_Carousel_Special extends DTElementorWidgetBase {

	public function get_name() {
		return 'dt-testimonial-carousel-special';
	}

	public function get_title() {
		return __( 'Testimonial Carousel - Special', 'dt-elementor' );
	}

    public function get_icon() {
		return 'far fa-comment-dots';
	}

	public function get_style_depends() {
		return array( 'dt-common' );
	}

	public function get_script_depends() {
		return array( 'jquery-caroufredsel', 'dt.anycarousel' );
	}

	public function get_keywords() {
		return array( 'testimonial', 'carousel', 'image' );
	}

	protected function register_controls() {
		$this->slides_tab();
		$this->additional_tab();
		$this->style_tab();
	}

	protected function slides_tab() {
		// Slides
		$this->start_controls_section( 'dt_section_slides', array(
			'label' => __( 'Slides', 'dt-elementor'),
		) );

			$this->add_control( 'title', array(
				'type'    => Controls_Manager::TEXT,
				'label'   => __('Title', 'dt-elementor')
			) );

			$this->add_control( 'subtitle', array(
				'type'    => Controls_Manager::TEXT,
				'label'   => __('Sub Title', 'dt-elementor')
			) );

            $content = new Repeater();
            $content->add_control( 'item_image', array(
                'type'    => Controls_Manager::MEDIA,
                'label'   => __('Image', 'dt-elementor'),
				'default' => array( 'url' => \Elementor\Utils::get_placeholder_image_src(), ),
            ) );

            $content->add_control( 'item_name', array(
                'type'    => Controls_Manager::TEXT,
                'label'   => __('Name', 'dt-elementor'),
                'default' => __('John Doe', 'dt-elementor'),
            ) );

            $content->add_control( 'item_role', array(
                'type'    => Controls_Manager::TEXT,
                'label'   => __('Role', 'dt-elementor'),
                'default' => __('CEO', 'dt-elementor'),
            ) );

            $content->add_control( 'item_content', array(
                'type'    => Controls_Manager::WYSIWYG,
				'label'   => __('Content', 'dt-elementor'),
                'default' => __( 'I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.', 'dt-elementor' ),
            ) );

            $this->add_control( 'carousel_items', array(
                'type'    => Controls_Manager::REPEATER,
                'label'   => __('Slides', 'dt-elementor'),
                'fields'  => array_values( $content->get_controls() ),
				'default' => $this->get_repeater_defaults(),
            ) );

			$this->add_control( 'alignment', array(
				'label' => __( 'Alignment', 'dt-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'default' => 'center',
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'dt-elementor' ),
						'icon' => 'fa fa-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'dt-elementor' ),
						'icon' => 'fa fa-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'dt-elementor' ),
						'icon' => 'fa fa-align-right',
					),
				)
			) );

			$this->add_responsive_control( 'width', array(
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Width', 'dt-elementor' ),
				'range' => array(
					'px' => array(
						'min' => 100,
						'max' => 1200,
					),
					'%' => array(
						'min' => 50,
					),
				),
				'size_units' => array( '%', 'px' ),
				'default' => array(
					'unit' => '%',
				),
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container' => 'width: {{SIZE}}{{UNIT}};',
				),
			) );

		$this->end_controls_section();
	}

	protected function additional_tab() {
		// Additional Options
		$this->start_controls_section( 'dt_section_additional', array(
			'label' => __( 'Additional Options', 'dt-elementor'),
		) );

			$this->add_control( 'autoplay', array(
				'label' => __( 'Autoplay', 'dt-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'frontend_available' => true,
			) );

			$this->add_control( 'speed', array(
				'label' => __( 'Speed', 'dt-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 300,
				'frontend_available' => true,
			) );

			$this->add_control( 'el_class', array(
				'type'        => Controls_Manager::TEXT,
				'label'       => __('Extra class name', 'dt-elementor'),
				'description' => __('Style particular element differently - add a class name and refer to it in custom CSS', 'dt-elementor')
			) );

		$this->end_controls_section();
	}

	protected function style_tab() {
		// Style Tab
		$this->start_controls_section( 'dt_section_slides_style', array(
			'label' => __( 'Slides', 'dt-elementor' ),
			'tab' => Controls_Manager::TAB_STYLE,
		));

			$this->add_control( 'slide_background_color', array(
				'label' => __( 'Background Color', 'dt-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container' => 'background-color: {{VALUE}}',
				),
			));
	
			$this->add_control( 'slide_border_size', array(
				'label' => __( 'Border Size', 'dt-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			));
	
			$this->add_control( 'slide_border_radius', array(
				'label' => __( 'Border Radius', 'dt-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range' => array(
					'%' => array( 'max' => 50 ),
				),
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container' => 'border-radius: {{SIZE}}{{UNIT}}',
				),
			));
	
			$this->add_control( 'slide_border_color', array(
				'label' => __( 'Border Color', 'dt-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container' => 'border-color: {{VALUE}}',
				),
			));
	
			$this->add_control( 'slide_padding', array(
				'label' => __( 'Padding', 'dt-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
				'separator' => 'before',
			));

		$this->end_controls_section();

		$this->start_controls_section( 'dt_section_content_style', array(
			'label' => __( 'Content', 'dt-elementor' ),
			'tab' => Controls_Manager::TAB_STYLE,
		));

			$this->add_responsive_control( 'content_gap', array(
				'label' => __( 'Gap', 'dt-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-special-wrapper' => 'margin-top: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .dt-sc-special-testimonial-container .alignright h6' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-special-wrapper' => 'padding-right: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-images' => 'padding-left: {{SIZE}}{{UNIT}}',
				),
			));

			$this->add_control( 'content_color', array(
				'label' => __( 'Text Color', 'dt-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-special-wrapper .dt-sc-testimonial-quote' => 'color: {{VALUE}}',
				),
				'scheme' => array(
					'type' => Color::get_type(),
					'value' => Color::COLOR_3,
				),
			));

			$this->add_group_control(
				Group_Control_Typography::get_type(), array(
					'name' => 'content_typography',
					'selector' => '{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-special-wrapper .dt-sc-testimonial-quote',
					'scheme' => Typography::TYPOGRAPHY_3,
				)
			);

			$this->add_control( 'name_title_style', array(
				'label' => __( 'Name', 'dt-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			));

			$this->add_control( 'name_color', array(
				'label' => __( 'Text Color', 'dt-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-special-wrapper .dt-sc-testimonial-author cite' => 'color: {{VALUE}}',
				),
				'scheme' => array(
					'type' => Color::get_type(),
					'value' => Color::COLOR_3,
				),
			));

			$this->add_group_control(
				Group_Control_Typography::get_type(), array(
					'name' => 'name_typography',
					'selector' => '{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-special-wrapper .dt-sc-testimonial-author cite',
					'scheme' => Typography::TYPOGRAPHY_1,
				)
			);

			$this->add_control( 'role_title_style', array(
				'label' => __( 'Role', 'dt-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			));

			$this->add_control( 'role_color', array(
				'label' => __( 'Text Color', 'dt-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-special-wrapper .dt-sc-testimonial-author cite small' => 'color: {{VALUE}}',
				),
				'scheme' => array(
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				),
			));

			$this->add_group_control(
				Group_Control_Typography::get_type(), array(
					'name' => 'role_typography',
					'selector' => '{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-special-wrapper .dt-sc-testimonial-author cite small',
					'scheme' => Typography::TYPOGRAPHY_2,
				)
			);

		$this->end_controls_section();

		$this->start_controls_section( 'dt_section_image_style', array(
			'label' => __( 'Image', 'dt-elementor' ),
			'tab' => Controls_Manager::TAB_STYLE,
		));

			$this->add_control( 'image_size', array(
				'label' => __( 'Size', 'dt-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => array(
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-images img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
				),
			));

			$this->add_control( 'image_border', array(
				'label' => __( 'Border', 'dt-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-images img' => 'border-style: solid',
				),
			));

			$this->add_control( 'image_border_color', array(
				'label' => __( 'Border Color', 'dt-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-images img' => 'border-color: {{VALUE}}',
				),
				'condition' => array(
					'image_border' => 'yes',
				),
			));

			$this->add_responsive_control( 'image_border_width', array(
				'label' => __( 'Border Width', 'dt-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => array(
					'px' => array(
						'min' => 0,
						'max' => 20,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-images img' => 'border-width: {{SIZE}}{{UNIT}}',
				),
				'condition' => array(
					'image_border' => 'yes',
				),
			));

			$this->add_control( 'image_border_radius', array(
				'label' => __( 'Border Radius', 'dt-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => array(
					'{{WRAPPER}} .dt-sc-special-testimonial-container .dt-sc-testimonial-images img' => 'border-radius: {{SIZE}}{{UNIT}}',
				),
			));

		$this->end_controls_section();
	}

	protected function get_repeater_defaults() {
		$placeholder_image_src = Utils::get_placeholder_image_src();

		return array(
			array(
				'item_content' => __( 'I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit.', 'dt-elementor' ),
				'item_name'    => __( 'John Doe', 'dt-elementor' ),
				'item_role'    => __( 'CEO', 'dt-elementor' ),
				'item_image'   => array(
					'url' => $placeholder_image_src,
				),
			),
			array(
				'item_content' => __( 'I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit.', 'dt-elementor' ),
				'item_name'    => __( 'John Doe', 'dt-elementor' ),
				'item_role'    => __( 'CEO', 'dt-elementor' ),
				'item_image'   => array(
					'url' => $placeholder_image_src,
				),
			),
			array(
				'item_content' => __( 'I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit.', 'dt-elementor' ),
				'item_name'    => __( 'John Doe', 'dt-elementor' ),
				'item_role'    => __( 'CEO', 'dt-elementor' ),
				'item_image'   => array(
					'url' => $placeholder_image_src,
				),
			),
		);
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        extract($settings);

		$layout = !empty( $layout ) ? $layout : '';
		$align = !empty( $alignment ) ? 'align'.$alignment : '';

        $carousel_settings = array(
			'autoplay'   				=> $autoplay,
			'speed'   					=> $speed,
        );

		$out = "<div class='dt-sc-special-testimonial-container ".$el_class." ".$align."' data-settings='".wp_json_encode($carousel_settings)."'>";
			$out .= '<div class="column dt-sc-one-half first">';
			$out .= '	<div class="dt-sc-special-testimonial-content">';
			$out .= 		!empty($title) ? '<h2>'.$title.'</h2>' : '';
			$out .= 		!empty($subtitle) ? '<p>'.$subtitle.'</p>' : '';
			$out .= '		<div class="dt-sc-hr-invisible-small"> </div>';
			$out .= '		<div class="dt-sc-clear"></div>';
			$out .= '		<div class="dt-sc-testimonial-special-wrapper">';
			$out .= '			<ul class="dt-sc-testimonial-special">';
									foreach( $carousel_items as $key => $item ) {

										$name = isset( $item['item_name'] ) ? $item['item_name'] : '';
										$role = isset( $item['item_role'] ) ? '<small>'.$item['item_role'].'</small>' : '';

										$out .= '<li class="dt-sc-testimonial-wrapper">';
										$out .= '	<div class="dt-sc-testimonial special-testimonial-carousel">';
										$out .= '		<div class="dt-sc-testimonial-author">';
										$out .=	'			<h4>'.$name.'</h4>';
										$out .=	'			<cite>'.$role.'</cite>';
										$out .= '		</div>';
										$out .= '		<div class="dt-sc-testimonial-quote"><blockquote>'.do_shortcode( $item['item_content'] ).'</blockquote></div>';
										$out .= '	</div>';
										$out .= '</li>';
									}
			$out .= '			</ul>';
			$out .= '		</div>';		
			$out .= '	</div>';
			$out .= '</div>';

			$out .= '<div class="column dt-sc-one-half">';
				$out .= '<ul class="dt-sc-testimonial-images">';
							foreach( $carousel_items as $key => $item ){

								$image = '';
								if( isset( $item['item_image']['id'] ) && $item['item_image']['id'] != '' ):
									$image = wp_get_attachment_image( $item['item_image']['id'], 'full' );
									$image = $image;
								else:
									$image = '<img src="'.$item['item_image']['url'].'" alt="'.$name.'" />';
								endif;

								if( $image != '')
									$out .= '<li><div><a href="">'.$image.'</a></div></li>';
							}
				$out .= '</ul>';
			$out .= '</div>';
		$out .= '</div>';

		echo $out;
	}
}