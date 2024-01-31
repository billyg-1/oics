<div class="dt-no-header-builder-content dt-no-header-pallikoodam"><?php

	$site_title = pallikoodam_get_option( 'display-site-title' );
	$site_tag = pallikoodam_get_option( 'display-site-tagline' );

	if( $site_tag )  { ?>
        <div class="no-header-top">
            <span class="site-tag-line"><?php echo get_bloginfo( 'description', 'display' ); ?></span>
        </div><?php
    } ?>

    <div class="no-header">
        <div class="no-header-logo"><?php
			$logo  = pallikoodam_get_option( 'custom-logo' );
			$alogo = pallikoodam_get_option( 'custom-alternate-logo' );

			if( !empty( $logo ) ):

				$logo  = wp_get_attachment_image_url( $logo, 'full' );
				$alogo = wp_get_attachment_image_url( $alogo, 'full' );?>
				<a href="<?php echo esc_url( home_url('/') );?>" title="<?php bloginfo('title'); ?>">
					<img class="normal_logo" src="<?php echo esc_url( $logo );?>" alt="<?php bloginfo('title'); ?>" title="<?php bloginfo('title'); ?>" /><?php
                    if( !empty( $alogo ) ): ?>
                    	<img class="alternate_logo" src="<?php echo esc_url( $alogo );?>" alt="<?php bloginfo('title'); ?>" title="<?php bloginfo('title'); ?>" /><?php
					endif; ?>
                </a><?php

                if( !empty( $site_title ) ): ?>
                 	<h2 class="site-title"><a href="<?php  echo esc_url( get_site_url() );?>"><?php echo get_bloginfo( 'name' ); ?></a></h2><?php
				endif;

                if( !empty( $site_tag ) ): ?>
                 	<span class="site-tag-line"><?php echo get_bloginfo( 'description' ); ?></span><?php
				endif;

			elseif( $site_title || $site_tag ):
				if( !empty( $site_title ) ): ?>
					<h2 class="site-title"><a href="<?php  echo esc_url( get_site_url() );?>"><?php echo get_bloginfo( 'name' ); ?></a></h2><?php
				endif;

				if( !empty( $site_tag ) ): ?>
					<span class="site-tag-line"><?php echo get_bloginfo( 'description' ); ?></span><?php
				endif;
			else: ?>
            	 <a href="<?php echo esc_url( home_url('/') );?>" title="<?php bloginfo('title'); ?>">
                    <img class="normal_logo" src="<?php echo PALLIKOODAM_THEME_URI.'/images/logo.png'; ?>" alt="<?php echo esc_attr__('Logo', 'pallikoodam'); ?>" title="<?php echo esc_attr__('Logo', 'pallikoodam'); ?>">
                    <img class="alternate_logo" src="<?php echo PALLIKOODAM_THEME_URI.'/images/light-logo.png'; ?>" alt="<?php echo esc_attr__('Alternate Logo', 'pallikoodam'); ?>" title="<?php echo esc_attr__('Alternate Logo', 'pallikoodam'); ?>" />
                 </a><?php
			endif; ?>
        </div>

        <div class="no-header-menu dt-header-menu" data-menu="dummy-menu"><?php
			$args = array(
				'theme_location'  => 'main-menu',
				'container_class' => 'menu-container',
				'items_wrap' 	  => '<ul id="%1$s" class="%2$s" data-menu="dummy-menu"> <li class="close-nav"></li> %3$s </ul> <div class="sub-menu-overlay"></div>',
				'menu_class' 	  => 'dt-primary-nav',
				'link_before' 	  => '<span>',
				'link_after' 	  => '</span>',
				'fallback_cb'	  => false,
				'walker' 		  => new DTWPHeaderMenuWalker
			);

			wp_nav_menu( $args );
		?></div>

    </div>
</div>