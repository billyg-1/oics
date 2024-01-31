<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<?php
$type = pallikoodam_get_option( 'notfound-style' );
$darkbg = pallikoodam_get_option( 'notfound-darkbg' );
$type .= !empty( $darkbg ) ? ' dt-sc-dark-bg' : '';

$bgoptions = pallikoodam_get_option('notfound_background');

$bg 		= !empty( $bgoptions['background-image'] ) ? $bgoptions['background-image'] : '';
$attach 	= !empty( $bgoptions['background-attachment'] ) ? $bgoptions['background-attachment'] :'scroll';
$position 	= !empty( $bgoptions['background-position'] ) ? $bgoptions['background-position'] :'center center';
$size   	= !empty( $bgoptions['background-size'] ) ? $bgoptions['background-size'] :'auto';
$repeat		= !empty( $bgoptions['background-repeat'] ) ? $bgoptions['background-repeat'] :'no-repeat';
$color 		= !empty( $bgoptions['background-color'] ) ? $bgoptions['background-color'] : '#ffffff';

$estyle = pallikoodam_get_option( 'notfound-bg-style' );

$style  = !empty($bg) ? "background:url($bg) $position / $size $repeat $attach;" : '';
$style .= " background-color:$color;";
$style .= !empty($estyle) ? ' '.$estyle : ''; ?>

<body <?php body_class(); ?>>

<div class="wrapper <?php echo esc_attr($type); ?>" style="<?php echo esc_attr($style); ?>">
	<div class="container">
        <div class="center-content-wrapper">
            <div class="center-content"><?php
                $pageid = pallikoodam_get_option( 'notfound-pageid' );
                if( pallikoodam_get_option( 'enable-404message' ) && !empty($pageid) ):
                    $page = get_post( $pageid, ARRAY_A );
					$content = do_shortcode( stripslashes( $page['post_content'] ) );
					echo pallikoodam_wp_kses( $content );
                elseif( pallikoodam_get_option( 'enable-404message' ) ):
					echo '<div class="error-box square"><div class="error-box-inner"><h3>'.esc_html__('Oops!', 'pallikoodam').'</h3><h2>404</h2><h4>'.esc_html__('Page Not Found', 'pallikoodam').'</h4></div></div>';
					echo '<div class="dt-sc-hr-invisible-xsmall"></div>';
					echo '<p>'.esc_html__("It seems you've ventured too far.", "pallikoodam").'</p>';
					echo '<div class="dt-sc-hr-invisible-xsmall"></div>';
                    echo '<a class="dt-sc-button filled small" target="_self" href="'.esc_url(home_url('/')).'">'.esc_html__('Back to Home','pallikoodam').'</a>';
                endif; ?>
            </div>
        </div>
    </div>    
</div>
<?php wp_footer(); ?>
</body>
</html>