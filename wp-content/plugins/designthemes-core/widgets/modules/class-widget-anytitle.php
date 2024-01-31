<?php
use DTElementor\Widgets\DTElementorWidgetBase;
use Elementor\Controls_Manager;
use Elementor\Utils;

class Elementor_AnyTitle extends DTElementorWidgetBase {

    public function get_name() {
        return 'dt-anytitle';
    }

    public function get_title() {
        return __('Any Title', 'dt-elementor');
    }

    public function get_icon() {
		return 'fa fa-heading';
	}

	public function get_style_depends() {
		return array( 'dt-common' );
	}

    protected function register_controls() {

        $this->start_controls_section( 'dt_section_general', array(
            'label' => __( 'General', 'dt-elementor'),
        ) );

		$this->add_control( 'title', array(
			'type'        => Controls_Manager::TEXT,
			'label'       => __('Enter Title', 'dt-elementor'),
			'description' => __('Enter the text of title.', 'dt-elementor')
		) );

		$this->add_control( 'tag', array(
			'label' => __( 'Tag', 'dt-elementor' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'h2',
			'options' => array(
				'h1' => __( 'H1', 'dt-elementor' ),
				'h2' => __( 'H2', 'dt-elementor' ),
				'h3' => __( 'H3', 'dt-elementor' ),
				'h4' => __( 'H4', 'dt-elementor' ),
				'h5' => __( 'H5', 'dt-elementor' ),
				'h6' => __( 'H6', 'dt-elementor' ),
			),
			'frontend_available' => true
		));

		$this->add_control( 'el_class', array(
			'type'        => Controls_Manager::TEXT,
			'label'       => __('Extra class name', 'dt-elementor'),
			'description' => __('Style particular element differently - add a class name and refer to it in custom CSS', 'dt-elementor')
		) );

        $this->end_controls_section();

		$this->start_controls_section( 'dt_section_style', array(
			'label' => __( 'Style Options', 'dt-elementor'),
		) );

		$this->add_responsive_control( 'alignment', array(
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
			),
			'selectors' => array(
				'{{WRAPPER}} .dt-sc-anytitle' => 'text-align: {{value}}',
			),
		) );

		$this->add_responsive_control( 'title_font_size', array(
			'label' => __( 'Title Font Size', 'dt-elementor' ),
			'type' => Controls_Manager::SLIDER,
			'default' => array(
				'size' => 34,
			),
			'range' => array(
				'px' => array(
					'min' => 10,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .dt-sc-anytitle > h1' => 'font-size: {{SIZE}}{{UNIT}}',
				'{{WRAPPER}} .dt-sc-anytitle > h2' => 'font-size: {{SIZE}}{{UNIT}}',
				'{{WRAPPER}} .dt-sc-anytitle > h3' => 'font-size: {{SIZE}}{{UNIT}}',
				'{{WRAPPER}} .dt-sc-anytitle > h4' => 'font-size: {{SIZE}}{{UNIT}}',
				'{{WRAPPER}} .dt-sc-anytitle > h5' => 'font-size: {{SIZE}}{{UNIT}}',
			),
		));

		$this->add_control( 'text_color', array(
			'label' => __( 'Color', 'dt-elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .dt-sc-anytitle .anytitle-heading' => 'color: {{VALUE}}',
			),
		));

		$this->add_control( 'border_color', array(
			'label' => __( 'Border Color', 'dt-elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .dt-sc-anytitle span' => 'border-color: {{VALUE}}',
				'{{WRAPPER}} .dt-sc-anytitle span:after' => 'background-color: {{VALUE}}',
			),
		));

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        extract($settings);

		$out = '';

		$out .= '<div class="dt-sc-anytitle '.$el_class.'">';
			$out .= '<'.$tag.' class="anytitle-heading">'.$title.'</'.$tag.'>';
			$out .= '<span></span>';
		$out .= '</div>';

		echo $out;
	}

    protected function content_template() {
    }
}