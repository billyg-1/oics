<?php
class Pallikoodam_Events_List extends WP_Widget {
	#1.constructor
	function __construct() {
		$widget_options = array(
			'classname'   => 'widget_events_list',
			'description' => esc_html__('To list out events', 'dt-elementor')
		);

		parent::__construct(false,PALLIKOODAM_THEME_NAME.esc_html__(' Events List','dt-elementor'),$widget_options);
	}

	#2.widget input form in back-end
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'            => '',
			'_post_count'      => '',
			'_post_categories' => ''
		) );

		$title            = strip_tags($instance['title']);
		$_post_count      = !empty($instance['_post_count']) ? strip_tags($instance['_post_count']) : "-1";
		$_post_categories = !empty($instance['_post_categories']) ? $instance['_post_categories']: array(); ?>

        <!-- Form -->
        <p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        		<?php esc_html_e('Title:','dt-elementor');?>
        		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
			</label>
		</p>
           
	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id('_post_categories')); ?>">
	    		<?php esc_html_e('Choose the categories you want to display (multiple selection possible)','dt-elementor');?>
	    	</label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('_post_categories').'[]');?>" name="<?php echo esc_attr($this->get_field_name('_post_categories').'[]');?>" multiple="multiple">
            	<option value=""><?php esc_html_e("Select",'dt-elementor');?></option><?php
            	$cats = get_categories( 'taxonomy=tribe_events_cat&orderby=name&hide_empty=0' );
            	foreach ($cats as $cat):
					$id       = esc_attr($cat->term_id);
					$selected = ( in_array($id,$_post_categories)) ? 'selected="selected"' : '';
					$title    = esc_html($cat->name);?>
        			<option <?php echo esc_attr($selected);?> value="<?php echo esc_attr($id);?>"><?php echo esc_attr($title);?></option><?php					
				endforeach;?>
            </select>
        </p>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id('_post_count'));?>">
	    		<?php esc_html_e('No.of posts to show:','dt-elementor');?>
	    	</label>
		    <input id="<?php echo esc_attr($this->get_field_id('_post_count')); ?>" name="<?php echo esc_attr($this->get_field_name('_post_count')); ?>" value="<?php echo esc_attr($_post_count);?>"/>
		</p><!-- Form end--><?php
	}

	#3.processes & saves the twitter widget option
	function update( $new_instance,$old_instance ) {
		$instance = $old_instance;

		$instance['title']            = strip_tags($new_instance['title']);
		$instance['_post_count']      = strip_tags($new_instance['_post_count']);
		$instance['_post_categories'] = $new_instance['_post_categories'];

		return $instance;
	}

	#4.output in front-end
	function widget($args, $instance) {
		extract($args);

		global $post;

		$title            = empty($instance['title']) ?	'' : strip_tags($instance['title']);
		$_post_count      = (int) $instance['_post_count'];

		$_post_categories = "";
		if( !empty($instance['_post_categories'] ) ) {
			$_post_categories = $instance['_post_categories'];
		}

		$arg = array( 'posts_per_page' => $_post_count, 'post_status' => 'publish', 'post_style' => 'tribe_events', 'tax_query'=> array( array( 'taxonomy' => 'tribe_events_cat', 'field' => 'term_id', 'terms' => $_post_categories ) ) );

		echo pallikoodam_before_after_widget( $before_widget );

		if( !empty( $title ) ) {
			echo pallikoodam_widget_title( $before_title . $title . $after_title );
		}

		echo "<div class='recent-events-list-widget'><ul>";
			 $the_query = new WP_Query($arg);
			 if($the_query->have_posts()) :
			 while($the_query->have_posts()):
			 	$the_query->the_post();
				$title = get_the_title();
				echo "<li>";
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail', false);
					$image = ( $image != false)? $image[0] : PALLIKOODAM_THEME_URI . '/images/dummy-images/post-thumb.jpg';
					echo "<div class='entry-thumb'><a href='".get_permalink()."' class='thumb'>";
						echo "<img src='{$image}' alt='{$title}'/>";
					echo "</a></div>";

					echo '<div class="entry-content-wrapper">';
						echo "<div class='entry-title'><h4><a href='".get_permalink()."'>{$title}</a></h4></div>";
						echo "<div class='entry-content'>".pallikoodam_excerpt(10)."</div>";
					echo '</div>';
				echo "</li>";
			 endwhile;
			 else:
			 	echo "<li><h4>".esc_html__('No Events found','dt-elementor')."</h4></li>";
			 endif;
			 wp_reset_postdata();
	 	echo "</ul></div>";

		echo pallikoodam_before_after_widget( $after_widget );
	}
}?>