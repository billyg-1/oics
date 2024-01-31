<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

	<h4>
	    <?php if( is_sticky( $post_ID ) ) echo '<span class="sticky-post"><i class="fas fa-star"></i><span>'.esc_html__('Featured', 'pallikoodam').'</span></span>'; ?>
    	<a href="<?php echo get_permalink( $post_ID );?>" title="<?php printf(esc_attr__('Permalink to %s','pallikoodam'), the_title_attribute('echo=0'));?>"><?php the_title();?></a>
	</h4>