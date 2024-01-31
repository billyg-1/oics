<?php
namespace DTElementor\Widgets;

use Elementor\Widget_Base;

abstract class DTElementorWidgetBase extends Widget_Base {

	/**
	 * Get categories
	 */
	public function get_categories() {
		return [ 'dt-widgets' ];
	}

	public function dt_post_categories(){
		$terms = get_terms( array(
			'taxonomy'   => 'category',
			'hide_empty' => true,
		));

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $term ) {
				$options[ $term->term_id ] = $term->name;
			}
		}

		return $options;
	}

	public function dt_event_categories(){
		$terms = get_terms( array(
			'taxonomy'   => 'tribe_events_cat',
			'hide_empty' => true,
		));

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $term ) {
				$options[ $term->term_id ] = $term->name;
			}
		}

		return $options;
	}

	public function dt_get_post_types(){
		$dt_cpts = get_post_types( array( 'public'  => true, 'show_in_nav_menus' => true ), 'object' );
		$dt_exclude_cpts = array( 'elementor_library', 'attachment', 'dt_mega_menus' );

		foreach ( $dt_exclude_cpts as $exclude_cpt ) {
			unset($dt_cpts[$exclude_cpt]);
		}
		$post_types = array_merge($dt_cpts);
		foreach( $post_types as $type ) {
			$types[ $type->name ] = $type->label;
		}

		return $types;
	}

	public function dt_get_elementor_page_list(){
		$pagelist = get_posts(array(
			'post_type' => 'elementor_library',
			'showposts' => 999,
		));

		if ( ! empty( $pagelist ) && ! is_wp_error( $pagelist ) ){
			foreach ( $pagelist as $post ) {
				$options[ $post->ID ] = __( $post->post_title, 'dt-elementor' );
			}
	        return $options;
		}
	}
}