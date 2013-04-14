<?php 
/* =================================================================
Scripts
==================================================================*/

function wppro_script_enqueuer() {
	//first we register the styles
	wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.css');
	wp_register_style( 'bootstrap-responsive', get_stylesheet_directory_uri().'/assets/css/bootstrap-responsive.css');
	wp_register_style( 'docs', get_stylesheet_directory_uri().'/assets/css/docs.css');
	wp_register_style( 'prettify', get_stylesheet_directory_uri().'/assets/js/google-code-prettify/prettify.css');
    //now we enqueue them
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap-responsive' );
    wp_enqueue_style( 'docs' );
    wp_enqueue_style( 'prettify' );
}
add_action( 'wp_enqueue_scripts', 'wppro_script_enqueuer');

function wppro_custom_excerpt_end( $more ) {
	return '';
	//return ''; returns nothing - this is just an example
	//return ' <a class="btn btn-small pull-right" href="'. get_permalink( get_the_ID() ) . '">Continue Reading <i class="icon-hand-right"></i></a>';

}
add_filter('excerpt_more', 'wppro_custom_excerpt_end');
