<?php
add_action( 'wp_enqueue_scripts', 'pallikoodam_child_enqueue_styles', 100 );
function pallikoodam_child_enqueue_styles() {
    wp_enqueue_style( 'pallikoodam-parent', get_template_directory_uri() . '/style.css' );
}
?>