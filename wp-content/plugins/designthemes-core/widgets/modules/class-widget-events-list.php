<?php
use DTElementor\Widgets\DTElementorWidgetBase;
use Elementor\Controls_Manager;
use Elementor\Utils;

class Elementor_EventsList extends DTElementorWidgetBase {

    public function get_name() {
        return 'dt-events-list';
    }

    public function get_title() {
        return __('Events List', 'dt-elementor');
    }

    public function get_icon() {
		return 'fa fa-calendar';
	}

    public function get_style_depends() {
        return array( 'dt-common' );
    }

    protected function register_controls() {

        $this->start_controls_section( 'dt_section_general', array(
            'label' => __( 'General', 'dt-elementor'),
        ) );

            $this->add_control( '_post_categories', array(
                'label' => esc_html__( 'Categories', 'dt-elementor' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => $this->dt_event_categories()
            ) );

            $this->add_control( 'count', array(
                'type'        => Controls_Manager::NUMBER,
                'label'       => __('Post Counts', 'dt-elementor'),
                'default'     => '5',
                'placeholder' => __( 'Enter post count', 'dt-elementor' ),
            ) );

            $this->add_control( 'event_post_layout', array(
                'type'    => Controls_Manager::SELECT,
				'label'   => __('Post Layout', 'dt-elementor'),
                'default' => 'event-grid',
                'options' => array(
                    'event-grid'  => __('Grid', 'dt-elementor'),
                    'event-list'  => __('List', 'dt-elementor'),
                    'event-overlay' => __('Overlay', 'dt-elementor'),
                )
            ) );

            $this->add_control( 'event_post_columns', array(
                'type'    => Controls_Manager::SELECT,
				'label'   => __('Columns', 'dt-elementor'),
                'default' => 'one-third-column',
                'options' => array(
                    'one-column'  => __('I Column', 'dt-elementor'),
                    'one-half-column'  => __('II Columns', 'dt-elementor'),
                    'one-third-column'  => __('III Columns', 'dt-elementor'),
                    'one-fourth-column' => __('IV Columns', 'dt-elementor'),
                ),
                'condition' => array( 'event_post_layout' => array( 'event-grid', 'event-overlay' ) )
            ) );

            $this->add_control( 'enable_equal_height', array(
                'type'         => Controls_Manager::SWITCHER,
                'label'        => __('Enable Equal Height?', 'dt-elementor'),
                'label_on'     => __( 'Yes', 'dt-elementor' ),
                'label_off'    => __( 'No', 'dt-elementor' ),
                'return_value' => 'yes',
                'default'      => '',
                'condition' => array( 'event_post_layout' => array( 'event-grid', 'event-overlay' ) )
            ) );            

            $this->add_control( 'enable_excerpt_text', array(
                'type'         => Controls_Manager::SWITCHER,
                'label'        => __('Enable Excerpt Text?', 'dt-elementor'),
                'label_on'     => __( 'Yes', 'dt-elementor' ),
                'label_off'    => __( 'No', 'dt-elementor' ),
                'return_value' => 'yes',
                'default'      => '',
            ) );

            $this->add_control( 'event_excerpt_length', array(
                'type'        => Controls_Manager::NUMBER,
                'label'       => __('Excerpt Length', 'dt-elementor'),
                'default'     => '25',
                'condition' => array( 'enable_excerpt_text' => 'yes' )
            ) );

            $this->add_control( 'event_pagination', array(
                'type'    => Controls_Manager::SELECT,
				'label'   => __('Pagination Style', 'dt-elementor'),
                'default' => 'older_newer',
                'options' => array(
                    ''  => __('None', 'dt-elementor'),
                    'older_newer'  => __('Older & Newer', 'dt-elementor'),
                    'numbered'  => __('Numbered', 'dt-elementor')
                ),
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

        global $post; $out = '';

        $holder_class = $combine_class = array();
        $post_style = '';

        $post_layout = $event_post_layout;
        $combine_class[] = $post_layout.'-layout';

        $post_equal_height = $enable_equal_height;
        if( ( $post_layout == 'event-grid' || $post_layout == 'event-overlay' ) && $post_equal_height == true ):
            $holder_class[] = 'apply-equal-height';
        elseif( $post_layout == 'event-grid' || $post_layout == 'event-overlay' ):
            $holder_class[] = 'apply-isotope';
        elseif( $post_layout == 'event-list' ):
            $holder_class[] = '';
        endif;                

        $holder_class[] = $el_class;

        $post_columns = $event_post_columns;
        $post_columns = isset( $post_columns ) ? $post_columns : 'one-half-column';

        switch( $post_columns ):

            default:
            case 'one-column':
                $post_class = "column dt-sc-one-column dt-sc-event-entry ";
                $columns = 1;
            break;

            case 'one-half-column':
                $post_class = "column dt-sc-one-half dt-sc-event-entry ";
                $columns = 2;
            break;

            case 'one-third-column':
                $post_class = "column dt-sc-one-third dt-sc-event-entry ";
                $columns = 3;
            break;

            case 'one-fourth-column':
                $post_class = "column dt-sc-one-fourth dt-sc-event-entry ";
                $columns = 4;
            break;
        endswitch;

        $post_class .= implode(' ', $combine_class);

        // select categories
        if(empty($_post_categories)) {
            $cats = get_categories('taxonomy=tribe_events_cat&hide_empty=1');
            $cats = get_terms( array('tribe_events_cat'), array('fields' => 'ids'));
        } else {
            $cats = $_post_categories;
        }

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) { 
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		$args = array( 'paged' => $paged, 'posts_per_page' => $count, 'post_status' => 'publish', 'post_style' => 'tribe_events', 'tax_query'=> array( array( 'taxonomy' => 'tribe_events_cat', 'field' => 'term_id', 'terms' => $cats ) ) );

    	$out .= '<div class="dt-sc-events-list-wrapper">';
        	$events = new WP_Query( $args );
            if( $events->have_posts() ): $i = 1;

                $out .= "<div class='tpl-events-holder ".implode(' ', $holder_class)."'>";
    	            $out .= "<div class='grid-sizer ".$post_class."'></div>";

    	            while( $events->have_posts() ):
    	                $events->the_post();

    	                $event_id = $post->ID;

    	                $temp_class = "";

    	                if($i == 1) $temp_class = $post_class.' first'; else $temp_class = $post_class;
    	                if($i == $columns) $i = 1; else $i = $i + 1;

    	                $out .= '<div class="'.esc_attr($temp_class).'">';
    	                    $out .= '<article id="event-'.get_the_ID().'" class="'.implode( " ", get_post_class( $post_classes ) ).'">';

                                $out .= '<div class="dt-sc-event-thumb-wrapper">';
        	                         $out .= '<div class="dt-sc-event-thumb">';
        	                         	$out .= '<a href="'.get_permalink().'">';
        		                            if(has_post_thumbnail()):
        		                                $attr = array('title' => get_the_title(), 'alt' => get_the_title());
        		                                $out .= get_the_post_thumbnail($post->ID, 'pallikoodam-event-medium', $attr);
        		                            else:
        		                                $out .= '<img src="https://place-hold.it/602x374&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
        		                            endif;
        		                        $out .= '</a>';
        	                         $out .= '</div>';

        	                         $out .= '<div class="dt-sc-event-meta">';
                                        $colors = array('#8800ff', '#65c8ff', '#f1aa00', '#95b226', '#5d58f0', '#3cd8e8', '#14d99b', '#799f05', '#3b5998','#ff236c');
                                        $key = array_rand($colors);
                                        $color = $colors[$key];

        	                            $out .= '<p class="event-timing" style="background-color:'.esc_attr($color).';">'.tribe_get_start_date ( $event_id, true, 'M d, Y' ).'</p>';

        	                            $out .= '<div class="event-btns">';
        	                                $out .= '<a class="event-link" href="'.get_permalink().'"><span class="fa fa-link"></span></a>';

        									$out .= '<a href="'.get_the_post_thumbnail_url( $event_id, 'full' ).'" title="'.the_title_attribute('echo=0').'" class="event-zoom mag-pop">';
        						                $out .= '<span class="fa fa-arrows-alt"></span>';
        						            $out .= '</a>';
        	                            $out .= '</div>';
        	                         $out .= '</div>';
                                $out .= '</div>';     

    	                       	$out .= '<div class="dt-sc-event-content-wrapper">';
                                    $out .= '<div class="dt-sc-event-title"><h2><a href="'.get_permalink().'">'.get_the_title().'</a></h2></div>';

        	                        if( $enable_excerpt_text != '' && $event_excerpt_length > 0 ):
        	                             $out .= '<div class="dt-sc-event-content">';
        	                             	$out .= pallikoodam_excerpt( $event_excerpt_length );
        	                             $out .= '</div>';
        	                        endif;
                                $out .= '</div>';    
    	 
    	                    $out .= '</article>';
    	                $out .= '</div>';

    	            endwhile;

    	            wp_reset_postdata();

    			$out .= '</div>';

                if( $event_pagination == 'numbered' ):
                    $out .= '<div class="pagination blog-pagination">'.pallikoodam_pagination($events).'</div>';

                elseif( $event_pagination == 'older_newer' ):

                    $out .= '<div class="pagination blog-pagination"><div class="newer-posts">'.get_previous_posts_link( '<i class="fa fa-angle-left"></i>'.esc_html__(' Newer Posts', 'dt-elementor') ).'</div>';
                    $out .= '<div class="older-posts">'.get_next_posts_link( esc_html__('Older Posts ', 'dt-elementor').'<i class="fa fa-angle-right"></i>', $events->max_num_pages ).'</div></div>';
                endif;            

    		else:
    			$out = "<div class='dt-sc-warning-box'>".esc_html__('No Events Found','dt-elementor')."</div>";
    		endif;

        $out .= '</div>';

        echo $out;
	}

    protected function content_template() {
    }
}