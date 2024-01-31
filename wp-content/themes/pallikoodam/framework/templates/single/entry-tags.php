<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

	if( $post_Style == 'breadcrumb-fixed' ):
		the_tags( '<div class="tag-wrap"><span>'.esc_html__('A story about', 'pallikoodam').'</span><p>', ' ', '</p></div>' );
	elseif( $post_Style == 'overlay' ):
		the_tags( '<span>'.esc_html__('Tags : ', 'pallikoodam').'</span>', ', ', '' );
	elseif( $post_Style == 'overlap' ):
		the_tags( '', ' ', '' );
	else:
		the_tags( '<i class="fas fa-bookmark"> </i> ', ' ', '' );
	endif; ?>