<?php
use DTElementor\Widgets\DTElementorWidgetBase;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

class Elementor_AnyCarousel extends DTElementorWidgetBase {

    public function get_name() {
        return 'dt-anycarousel';
    }

    public function get_title() {
        return __('Any Carousel', 'dt-elementor');
    }

    public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_style_depends() {
		return array( 'swiper' );
	}

	public function get_script_depends() {
		return array( 'swiper', 'dt.anycarousel' );
	}

    protected function register_controls() {

        $this->start_controls_section( 'dt_section_general', array(
            'label' => __( 'General', 'dt-elementor'),
        ) );

		$content = new Repeater();
		$content->add_control('dt_carousel_slider_template', array(
			'label'         => __( 'Select Template', 'dt-elementor' ),
			'type'          => Controls_Manager::SELECT,
			'options'       => $this->dt_get_elementor_page_list()
		));

		$this->add_control( 'dt_carousel_slider_content', array(
			'type'        => Controls_Manager::REPEATER,
			'label'       => __('Carousel Items', 'dt-elementor'),
			'description' => __('Carousel items is a template which you can choose from Elementor library. Each template will be a carousel content', 'dt-elementor' ),
			'fields'      => array_values( $content->get_controls() ),
		) );

        $this->end_controls_section();

		$this->start_controls_section( 'dt_section_additional', array(
			'label' => __( 'Carousel Options', 'dt-elementor'),
		) );

		$slides_per_view = range( 1, 10 );
		$slides_per_view = array_combine( $slides_per_view, $slides_per_view );

		$this->add_responsive_control( 'slides_to_show', array(
			'type' => Controls_Manager::SELECT,
			'label' => __( 'Slides to Show', 'dt-elementor' ),
			'options' => $slides_per_view,
			'default' => 1,
			'frontend_available' => true
		) );

		$this->add_responsive_control( 'slides_to_scroll', array(
			'type' => Controls_Manager::SELECT,
			'label' => __( 'Slides to Scroll', 'dt-elementor' ),
			'options' => $slides_per_view,
			'default' => 1,
			'frontend_available' => true
		) );

		$this->add_control( 'effect', array(
			'label' => __( 'Effect', 'dt-elementor' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'slide',
			'options' => array(
				'slide' => __( 'Slide', 'dt-elementor' ),
				'fade' => __( 'Fade', 'dt-elementor' ),
				'cube' => __( 'Cube', 'dt-elementor' ),
				'coverflow' => __( 'Coverflow', 'dt-elementor' ),
				'flip' => __( 'Flip', 'dt-elementor' ),
			),
			'frontend_available' => true,
		));

		$this->add_control( 'arrows', array(
			'label' => __( 'Arrows', 'dt-elementor' ),
			'type' => Controls_Manager::SWITCHER,
			'frontend_available' => true
		) );

		$this->add_control( 'direction', array(
			'label' => __( 'Direction', 'dt-elementor' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'horizontal',
			'options' => array(
				'horizontal' => __( 'Horizontal', 'dt-elementor' ),
				'vertical' => __( 'Vertical', 'dt-elementor' ),
			),
			'frontend_available' => true
		));

		$this->add_control( 'pagination', array(
			'label' => __( 'Pagination', 'dt-elementor' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'bullets',
			'options' => array(
				'' => __( 'None', 'dt-elementor' ),
				'bullets' => __( 'Dots', 'dt-elementor' ),
				'fraction' => __( 'Fraction', 'dt-elementor' ),
				'progressbar' => __( 'Progress', 'dt-elementor' ),
				'scrollbar' => __( 'Scrollbar', 'dt-elementor' ),
			),
			'frontend_available' => true
		));

		$this->add_control( 'speed', array(
			'label' => __( 'Transition Duration', 'dt-elementor' ),
			'type' => Controls_Manager::NUMBER,
			'default' => 2000,
			'frontend_available' => true
		));

		$this->add_control( 'autoplay', array(
			'label' => __( 'Autoplay', 'dt-elementor' ),
			'type' => Controls_Manager::SWITCHER,
			'separator' => 'before',
			'frontend_available' => true
		));

		$this->add_control( 'autoplay_speed', array(
			'label' => __( 'Autoplay Speed', 'dt-elementor' ),
			'type' => Controls_Manager::NUMBER,
			'default' => 5000,
			'condition' => array(
				'autoplay' => 'yes',
				'carousel' => 'yes'
			),
			'frontend_available' => true
		));

		$this->add_control( 'loop', array(
			'label' => __( 'Infinite Loop', 'dt-elementor' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
			'frontend_available' => true
		));

		$this->add_control( 'pause_on_interaction', array(
			'label' => __( 'Pause on Interaction', 'dt-elementor' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
			'condition' => array(
				'autoplay' => 'yes',
				'carousel' => 'yes'
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

        $carousel_settings = array(
            'slides_to_show' 			=> !empty( $slides_to_show ) ? $slides_to_show : 3,
            'slides_to_scroll'      	=> !empty( $slides_to_scroll ) ? $slides_to_scroll : 1,
			'effect'					=> $effect,
			'arrows'					=> $arrows,
			'direction'					=> $direction,
			'pagination'				=> $pagination,
			'speed'						=> $speed,
			'autoplay'   				=> $autoplay,
			'autoplay_speed'   			=> !empty( $autoplay_speed ) ? $autoplay_speed : '',
			'loop'						=> $loop,
			'pause_on_interaction'		=> $pause_on_interaction,

            'slides_to_show_tablet'		=> $slides_to_show_tablet,
            'slides_to_scroll_tablet'   => $slides_to_scroll_tablet,

			'slides_to_show_mobile'   	=> $slides_to_show_mobile,
			'slides_to_scroll_mobile'   => $slides_to_scroll_mobile,
        );

		$out = "<div class='dt-sc-any-carousel-wrapper {$el_class} carousel_items' data-settings='".wp_json_encode($carousel_settings)."'>";

			if( count( $dt_carousel_slider_content ) > 0 ):

				$out .= '<div class="dt-sc-any-carousel swiper-wrapper">';

					foreach( $dt_carousel_slider_content as $key => $item ):

						$out .= '<div class="swiper-slide">';
							$frontend = Elementor\Frontend::instance();
							$template_content = $frontend->get_builder_content( $item['dt_carousel_slider_template'], true );
							$out .= "{$template_content}";
						$out .= '</div>';

					endforeach;

				$out .= '</div>';

				if ( count( $dt_carousel_slider_content ) > 1 ) :
					if ( isset( $pagination ) && $pagination == 'scrollbar' ) :
						$out .= '<div class="swiper-scrollbar"></div>';
					elseif ( isset( $pagination ) && $pagination != 'scrollbar' ) :
						$out .= '<div class="swiper-pagination"></div>';
					endif;
					if ( isset( $arrows ) && $arrows == 'yes' ) :
						$out .= '<div class="dt-swiper-navigations">';
							$out .= '<div class="dt-swiper-button swiper-button-prev">';
								$out .= '<i class="fas fa-chevron-left"></i>';
							$out .= '</div>';
							$out .= '<div class="dt-swiper-button swiper-button-next">';
								$out .= '<i class="fas fa-chevron-right"></i>';
							$out .= '</div>';
						$out .= '</div>';
					endif;
				endif;

			endif;

		$out .= '</div>';

		echo $out;
	}

    protected function content_template() {
    }
}