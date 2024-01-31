<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php
 	if( ! post_password_required() ) {
		if( $post_Style == 'dt-sc-simple-style' || $post_Style == 'dt-sc-simple-withbg-style' || $post_Style == 'dt-sc-overflow-style' ):
			comments_popup_link( esc_html__('Add Comment', 'pallikoodam'), esc_html__('1 Comment', 'pallikoodam'), esc_html__('% Comments', 'pallikoodam'), '', esc_html__('Comments Off', 'pallikoodam'));
		elseif( $post_Style == 'dt-sc-classic-style' || $post_Style == 'dt-sc-classic-ii-style' ):
			comments_popup_link('<i class="pe-icon pe-chat"> </i> 0', '<i class="pe-icon pe-chat"> </i> 1', '<i class="pe-icon pe-chat"> </i> %', '', '<i class="pe-icon pe-chat"> </i> 0');
		else:
			comments_popup_link('<i class="fas fa-comment"> </i> 0', '<i class="fas fa-comment"> </i> 1', '<i class="fas fa-comment"> </i> %', '', '<i class="fas fa-comment"> </i> 0');
		endif;
	} else {
		if( $post_Style == 'dt-sc-simple-style' || $post_Style == 'dt-sc-simple-withbg-style' || $post_Style == 'dt-sc-overflow-style' ):
			echo esc_html__('Enter your password to view comments.', 'pallikoodam');
		elseif( $post_Style == 'dt-sc-classic-style' ):
			echo '<i class="zmdi zmdi-lock zmdi-hc-fw"> </i>'.esc_html__('Enter your password to view comments.', 'pallikoodam');
		else:
			echo '<i class="fas fa-ban"> </i>'.esc_html__('Enter your password to view comments.', 'pallikoodam');
		endif;
	}?>