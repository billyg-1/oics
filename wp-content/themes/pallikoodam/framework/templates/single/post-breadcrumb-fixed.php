<div class="column dt-sc-one-sixth dt-post-sticky-wrapper first"><?php

	$template = 'framework/templates/single/entry-social.php';
	$template_args['post_ID'] = $ID; ?>

	<!-- Entry Social Share -->
	<div class="entry-social-share">
		<?php pallikoodam_get_template( $template, $template_args ); ?>
	</div><!-- Entry Social Share --><?php

    $post_cats = wp_get_post_categories( $ID );
	if( !empty( $post_cats ) ): ?>
    	<h4><?php esc_html_e('Trending In', 'pallikoodam'); ?> <span><?php echo get_cat_name($post_cats[0]); ?></span></h4>
        <div class="list-trending">
			<ul><?php
				$args = array( 'posts_per_page' => 3, 'cat' => $post_cats[0], 'ignore_sticky_posts' => true, 'post__not_in' => array($ID) );
				$tposts = new WP_Query( $args );
				if ( $tposts->have_posts() ) :
					while( $tposts->have_posts() ):
		                $tposts->the_post();
						$post_ID = get_the_ID();

						if( has_post_thumbnail( $post_ID ) ): ?>
							<li class="list-trending-item"><a href="<?php echo get_permalink($post_ID);?>" title="<?php printf(esc_attr__('Permalink to %s','pallikoodam'), the_title_attribute('echo=0'));?>"><?php echo get_the_post_thumbnail( $post_ID, 'medium' );?></a></li><?php
						endif;
					endwhile;
					wp_reset_postdata();
				endif; ?>
            </ul>
        </div><?php
	endif; ?>
</div>
<div class="column dt-sc-five-sixth"><?php

	// Getting values from theme options...
	$template = 'framework/templates/single/entry-elements-loop.php';
	$template_args['ID'] = $ID;
	$template_args['Post_Style'] = $Post_Style;
	$template_args['Post_Meta'] = $Post_Meta;

	pallikoodam_get_template( $template, $template_args ); ?>
</div>