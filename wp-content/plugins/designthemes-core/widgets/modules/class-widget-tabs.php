<?php
use DTElementor\Widgets\DTElementorWidgetBase;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;
use Elementor\Utils;

class Elementor_Tabs extends DTElementorWidgetBase {

    public function get_name() {
        return 'dt-tabs';
    }

    public function get_title() {
        return __('Tabs', 'dt-elementor');
    }

    public function get_icon() {
		return 'far fa-window-restore';
	}

	public function get_style_depends() {
		return array( 'dt-common' );
	}

	public function get_script_depends() {
		return array( 'jquery-tabs', 'dt.anycarousel' );
	}

    protected function register_controls() {

        $this->start_controls_section( 'dt_section_general', array(
            'label' => __( 'General', 'dt-elementor'),
        ) );

		$content = new Repeater();

		$content->add_control('dt_tabs_title', array(
			'label'         => __( 'Tab Title', 'dt-elementor' ),
			'type'          => Controls_Manager::TEXT,
		));

		$content->add_control( 'dt_tabs_title_bg_color', array(
			'label' => __( 'Title BG Color', 'dt-elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ul.dt-sc-tabs-horizontal-frame li{{CURRENT_ITEM}} a' => 'background-color: {{VALUE}}',
			),
		));

		$content->add_control( 'dt_tabs_title_color', array(
			'label' => __( 'Title Color', 'dt-elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ul.dt-sc-tabs-horizontal-frame li{{CURRENT_ITEM}} a' => 'color: {{VALUE}}',
			),
		));

		$content->add_group_control( Group_Control_Box_Shadow::get_type(), array(
			'name' => 'dt_tabs_title_box_shadow',
			'label' => __( 'Title Box Shadow', 'dt-elementor' ),
			'selector' => '{{WRAPPER}} ul.dt-sc-tabs-horizontal-frame li{{CURRENT_ITEM}} a.current, {{WRAPPER}} ul.dt-sc-tabs-horizontal-frame li{{CURRENT_ITEM}} a:hover'
		));

		$content->add_control( 'dt_tabs_switch_content', array(
			'label' => __( 'Enable Content?', 'dt-elementor' ),
			'type' => Controls_Manager::SWITCHER,
			'frontend_available' => true
		));

		$content->add_control('dt_tabs_template', array(
			'label'         => __( 'Select Template', 'dt-elementor' ),
			'type'          => Controls_Manager::SELECT,
			'options'       => $this->dt_get_elementor_page_list(),
			'condition' => array(
				'dt_tabs_switch_content' => ''
			),
		));

		$content->add_control( 'dt_tabs_content', array(
			'type'    => Controls_Manager::WYSIWYG,
			'label'   => __('Content', 'dt-elementor'),
			'description' => __( 'Content for this tab.', 'dt-elementor' ),
			'condition' => array(
				'dt_tabs_switch_content' => 'yes'
			),
		) );

		$this->add_control( 'dt_tabs_repeater_content', array(
			'type'        => Controls_Manager::REPEATER,
			'label'       => __('Tabs', 'dt-elementor'),
			'description' => __('Tabs template which you can choose from Elementor library. Each template will be a tab content', 'dt-elementor' ),
			'fields'      => array_values( $content->get_controls() ),
			'title_field' => 'Tab: {{{ dt_tabs_title }}}'
		) );

        $this->end_controls_section();

		$this->start_controls_section( 'dt_section_style', array(
			'label' => __( 'Style Options', 'dt-elementor'),
		) );

		$this->add_control( 'type', array(
			'label' => __( 'Type', 'dt-elementor' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'type1',
			'options' => array(
				'type1' => __( 'Type 1', 'dt-elementor' ),
				'type2' => __( 'Type 2', 'dt-elementor' ),
				'type3' => __( 'Type 3', 'dt-elementor' ),
			),
			'frontend_available' => true
		));

		$this->add_control( 'el_class', array(
			'type'        => Controls_Manager::TEXT,
			'label'       => __('Extra class name', 'dt-elementor'),
			'description' => __('Style particular element differently - add a class name and refer to it in custom CSS', 'dt-elementor')
		) );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        extract($settings);

		$out = '';

		if( count( $dt_tabs_repeater_content ) > 0 ):

			$out .= '<div class="dt-sc-tabs-horizontal-frame-container '.$el_class.' '.$type.'">';

				$out .= '<ul class="dt-sc-tabs-horizontal-frame">';

					foreach( $dt_tabs_repeater_content as $key => $item ):
						if( array_key_exists( 'dt_tabs_title', $item ) ) {
							$out .= '<li class="elementor-repeater-item-'.$item['_id'].'"><a href="#">'.$item['dt_tabs_title'].'</a></li>';
						}
					endforeach;

				$out .= '</ul>';

				foreach( $dt_tabs_repeater_content as $key => $item ):

					$out .= '<div class="dt-sc-tabs-horizontal-frame-content">';

						if( array_key_exists( 'dt_tabs_switch_content', $item ) && $item['dt_tabs_switch_content'] == 'yes' ):
							$out .= $item['dt_tabs_content'];
						else:
							$frontend = Elementor\Frontend::instance();
							$template_content = $frontend->get_builder_content( $item['dt_tabs_template'], true );
							$out .= "{$template_content}";
						endif;

					$out .= '</div>';

				endforeach;

			$out .= '</div>';

		endif;

		echo $out;
	}

    protected function content_template() {
    }
}