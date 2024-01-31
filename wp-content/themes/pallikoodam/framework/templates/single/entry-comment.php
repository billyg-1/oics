<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php
 	if( ! post_password_required() ) {
		if( $post_Style == 'breadcrumb-fixed' ): ?>
			<div class="comment-wrap"><?php
				comments_popup_link('<i class="fas fa-comment"> </i> 0', '<i class="fas fa-comment"> </i> 1', '<i class="fas fa-comment"> </i> %', '', '<i class="fas fa-comment"> </i> 0'); ?>
			</div><?php
		else:
			comments_popup_link('<i class="fas fa-comment"> </i> 0', '<i class="fas fa-comment"> </i> 1', '<i class="fas fa-comment"> </i> %', '', '<i class="fas fa-comment"> </i> 0');				
		endif;
	} else {
		if( $post_Style == 'breadcrumb-fixed' ): ?>
			<div class="comment-wrap"><?php
				echo '<i class="fas fa-ban"> </i>'.esc_html__('Enter your password to view comments.', 'pallikoodam'); ?>
            </div><?php
		else:
			echo '<i class="fas fa-ban"> </i>'.esc_html__('Enter your password to view comments.', 'pallikoodam');
		endif;
	}?>