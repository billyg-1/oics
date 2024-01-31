<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<?php
$type = pallikoodam_get_option( 'comingsoon-style' );
$darkbg = pallikoodam_get_option( 'uc-darkbg' );
$type .= !empty( $darkbg ) ? ' dt-sc-dark-bg' : '';

$bgoptions = pallikoodam_get_option('comingsoon_background');

$bg 		= !empty( $bgoptions['background-image'] ) ? $bgoptions['background-image'] : '';
$attach 	= !empty( $bgoptions['background-attachment'] ) ? $bgoptions['background-attachment'] :'scroll';
$position 	= !empty( $bgoptions['background-position'] ) ? $bgoptions['background-position'] :'center center';
$size   	= !empty( $bgoptions['background-size'] ) ? $bgoptions['background-size'] :'auto';
$repeat		= !empty( $bgoptions['background-repeat'] ) ? $bgoptions['background-repeat'] :'no-repeat';
$color 		= !empty( $bgoptions['background-color'] ) ? $bgoptions['background-color'] : '#ffffff';

$estyle = pallikoodam_get_option( 'comingsoon-bg-style' );

$style  = !empty($bg) ? "background:url($bg) $position / $size $repeat $attach;" : '';
$style .= " background-color:$color;";
$style .= !empty($estyle) ? ' '.$estyle : ''; ?>

<body <?php body_class(); ?>>

<div class="wrapper under-construction <?php echo esc_attr($type); ?>" style="<?php echo esc_attr($style); ?>"><?php
	$pageid = pallikoodam_get_option( 'comingsoon-pageid' );
	if( !empty($pageid) ):
		$page = get_post( $pageid, ARRAY_A );
		$content = do_shortcode( stripslashes( $page['post_content'] ) );
		echo pallikoodam_wp_kses( $content );
	else:
		echo '<div class="uc-wrapper-inner">';
			echo '<h2>'.esc_html__('Website is almost ready', 'pallikoodam').'</h2>';
			echo '<p>'.esc_html__('Our website is under construction.', 'pallikoodam').'</p>';
			echo '<p>'.esc_html__("We'll be here soon with our new awesome.", 'pallikoodam').'</p>';
			echo '<div class="dt-sc-hr-invisible-xsmall"></div>';

			if( pallikoodam_get_option( 'show-launchdate' ) == 'true' ):
				$date = pallikoodam_get_option( 'comingsoon-launchdate' );
				$datetime = new DateTime('tomorrow');
				$date = !empty( $date ) ? $date : $datetime->format('m/d/Y');
				$offset = pallikoodam_get_option( 'comingsoon-timezone' );
				$offset = !empty( $offset ) ? $offset : '+5';

				echo '<div class="downcount" data-date="'.$date.'" data-offset="'.$offset.'">';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number days">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Days', 'pallikoodam').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number hours">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Hours', 'pallikoodam').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number minutes">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Minutes', 'pallikoodam').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper last">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number seconds">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Seconds', 'pallikoodam').'</h3>';
					echo '</div>';
				echo '</div>';
			endif;
		echo '</div>';
	endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>