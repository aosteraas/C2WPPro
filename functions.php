<?php 
/* =================================================================
Scripts
==================================================================*/

function wppro_script_enqueuer() {
    //////////////////////////////////////////////////////////////////////////////////////
    ///////////// CSS
    //////////////////////////////////////////////////////////////////////////////////////	

	//first we register the styles
	wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.css');
	wp_register_style( 'bootstrap-responsive', get_stylesheet_directory_uri().'/assets/css/bootstrap-responsive.css');
	wp_register_style( 'docs', get_stylesheet_directory_uri().'/assets/css/docs.css');
	wp_register_style( 'prettify', get_stylesheet_directory_uri().'/assets/js/google-code-prettify/prettify.css');
	wp_register_style( 'our-css', get_stylesheet_directory_uri().'/assets/css/style.css');
    //now we enqueue them
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap-responsive' );
    wp_enqueue_style( 'docs' );
    wp_enqueue_style( 'prettify' );
    wp_enqueue_style( 'our-css' );

    //////////////////////////////////////////////////////////////////////////////////////
    ///////////// JavaScript
    //////////////////////////////////////////////////////////////////////////////////////

    //First we register the scripts
    wp_register_script( 'jquery-flatstrap', get_stylesheet_directory_uri().'/assets/js/jquery.js', '', '1.8.1', true );
    wp_register_script( 'collapse', get_stylesheet_directory_uri().'/assets/js/bootstrap-collapse.js', array( 'jquery-flatstrap' ), '2.3.1', true);
    //Now we enqueue them
    wp_enqueue_script('jquery-flatstrap');
    wp_enqueue_script( 'collapse');

}
add_action( 'wp_enqueue_scripts', 'wppro_script_enqueuer');

function wppro_comment_enqueue() {
    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );}
	}
add_action( 'wp_enqueue_scripts', 'wppro_comment_enqueue');
function wppro_custom_excerpt_end( $more ) {
	return '';
	//return ''; returns nothing - this is just an example
	//return ' <a class="btn btn-small pull-right" href="'. get_permalink( get_the_ID() ) . '">Continue Reading <i class="icon-hand-right"></i></a>';

}
add_filter('excerpt_more', 'wppro_custom_excerpt_end');

function wppro_comments($comment, $args, $depth) {
	    $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>" >
    <a class="pull-left" href="#">
      <?php echo get_avatar( $comment, 64 ); ?>
    </a>
    <div class="media-body">
      <h4 class="media-heading"><?php comment_author_link(); ?></h4>
      <?php comment_text(); ?>
      <?php comment_reply_link(array_merge( $args, array('depth' =>$depth, 'max_depth' => $args['max_depth']))) ?>
<?php }

function wppro_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'wppro_menus' );