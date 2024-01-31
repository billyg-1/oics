<?php
use DTElementor\Widgets\DTElementorWidgetBase;
use Elementor\Controls_Manager;
use Elementor\Utils;

class Elementor_Post_Title extends DTElementorWidgetBase {

    public function get_name() {
        return 'dt-post-title';
    }

    public function get_title() {
        return __('Post - Title', 'dt-elementor');
    }

    public function get_icon() {
		return 'fa fa-header';
	}

    protected function register_controls() {

        $this->start_controls_section( 'dt_section_general', array(
            'label' => __( 'General', 'dt-elementor'),
        ) );

            $this->add_control( 'post_id', array(
                'type'        => Controls_Manager::NUMBER,
                'label'       => __('Post ID', 'dt-elementor'),
                'description' => __( 'Enter Post ID (In single post no need to enter).', 'dt-elementor' ),
            ) );

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

		if( empty( $post_id ) ) {
			global $post;
			$post_id =  $post->ID;
		}

		$template = 'framework/templates/single/no-loop/entry-title.php';
		$template_args['post_ID'] = $post_id;

		$out .= '<!-- Entry Title -->';
		$out .= '<div class="entry-title '.$el_class.'">';
			ob_start();
			pallikoodam_get_template( $template, $template_args );
			$out .= ob_get_clean();
		$out .= '</div><!-- Entry Title -->';

		echo $out;
	}

    protected function content_template() {
    }
}