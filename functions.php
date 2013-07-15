<?php 
    //////////////////////////////////////////////////////////////////////////////////////
    ///////////// CSS & JavaScript
    //////////////////////////////////////////////////////////////////////////////////////	

	function wppro_script_enqueuer() {
    
    /////////////
    // CSS
	/////////////

	//first we register the styles
	wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.css');
	wp_register_style( 'bootstrap-responsive', get_stylesheet_directory_uri().'/assets/css/bootstrap-responsive.css');
	wp_register_style( 'docs', get_stylesheet_directory_uri().'/assets/css/docs.css');
	wp_register_style( 'prettify', get_stylesheet_directory_uri().'/assets/js/google-code-prettify/prettify.css');
	wp_register_style( 'our-css', get_stylesheet_directory_uri().'/assets/css/style.css');
	wp_register_style( 'home', get_stylesheet_directory_uri().'/assets/css/home.css');
    //now we enqueue them
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap-responsive' );
    wp_enqueue_style( 'docs' );
    wp_enqueue_style( 'prettify' );
    wp_enqueue_style( 'our-css' );
    if (is_home()){
    	wp_enqueue_style( 'home' );
    }
 
    /////////////
    // JavaScript
    /////////////

    //First we register the scripts
    wp_register_script( 'jquery-flatstrap', get_stylesheet_directory_uri().'/assets/js/jquery.js', '', '1.8.1', true ); //true is to place it in the footer
    wp_register_script( 'collapse', get_stylesheet_directory_uri().'/assets/js/bootstrap-collapse.js', array( 'jquery-flatstrap' ), '2.3.1', true);
    wp_register_script( 'bootstrap', get_stylesheet_directory_uri().'/assets/js/bootstrap.min.js','2.3.1','', true );
    //Now we enqueue them
    wp_enqueue_script('jquery-flatstrap');
    wp_enqueue_script( 'collapse');
    wp_enqueue_script( 'bootstrap' );
	}

	//Adding our function wppro_script_enqueuer to the action wp_enqueue_scripts
	add_action( 'wp_enqueue_scripts', 'wppro_script_enqueuer'); 

    //////////////////////////////////////////////////////////////////////////////////////
    ///////////// Custom Excerpt
    //////////////////////////////////////////////////////////////////////////////////////

	function wppro_custom_excerpt_end( $more ) {
	return '';
	//return ''; 
	//returns nothing - this is just an example

	//return ' <a class="btn btn-small pull-right" href="'. get_permalink( get_the_ID() ) . '">Continue Reading <i class="icon-hand-right"></i></a>'; - this 
	//returns a button. Just an example of what you could do. Only works on posts where excerpts aren't defined
	}

	//Adding our function wppro_custom_excerpt_end to the action excerpt_more
	add_filter('excerpt_more', 'wppro_custom_excerpt_end');

    //////////////////////////////////////////////////////////////////////////////////////
    ///////////// Custom Comments List & Comment Reply Script
    //////////////////////////////////////////////////////////////////////////////////////	

	//Enqueueing the comment reply script if it's a singular page, comments are open, and threaded.

	function wppro_comment_enqueue() {
	    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
			wp_enqueue_script( 'comment-reply' );}
		}

	//Adding our function wppro_comment_enqueue to the action wp_enqueuye_scripts
	add_action( 'wp_enqueue_scripts', 'wppro_comment_enqueue');

	//Creating a custom comments list for presenting the comments in line with the Flatstrap framework

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

    //////////////////////////////////////////////////////////////////////////////////////
    ///////////// Menus
    //////////////////////////////////////////////////////////////////////////////////////	

	//Registering out menu as the header menu within a function
	function wppro_menus() {
	  register_nav_menu('header-menu',__( 'Header Menu' ));
	}

	//Adding our function wppro_menus to the action init
	add_action( 'init', 'wppro_menus' );

    //////////////////////////////////////////////////////////////////////////////////////
    ///////////// Sidebars
    //////////////////////////////////////////////////////////////////////////////////////
	function wppro_sidebar_widgets(){
		register_sidebar( array( 
			'name'			=> 'Sidebar Widgets',
			'id'			=> 'sidebar-widgets',
			'description'	=> 'This is for widgets on the left hand side of our theme',
			//'before_widget'	=> '', default is <li id="%1$s" class="widget %2$s">
			//'after_widget'	=> '', default is </li>\n
			'before_title'	=> '<h3 class="widgettitle">', //default is <h2 class="widgettitle">
			'after_title'	=> "</h3>\n" //default is </h2>\n
			)	
		);
	}
	add_action( 'widgets_init' ,'wppro_sidebar_widgets' );
	
// Custom WP Login Screen
function wppro_custom_login_css() { 	
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/assets/css/login.css" />'; 
}   
add_action('login_head', 'wppro_custom_login_css');

function wppro_login_logo_url( $url ) {     
return get_bloginfo( 'url' ); 
} 
add_filter( 'login_headerurl', 'wppro_login_logo_url' );

//remove the automatic paragraph tags in the excerpt on the home page
if (!is_page_template( 'home.php' )){
	remove_filter( 'the_excerpt', 'wpautop' );
}

//Post Thumbnails
add_theme_support( 'post-thumbnails' ); 
add_image_size('featured', 1550, 500); //images for the homepage
add_image_size('featurette', 140, 140); //images for items below slider

//////////////////////////////////////////////////////////////////////////
////////////Custom Author Profiles
//////////////////////////////////////////////////////////////////////////
function wppro_author_profile($user_contactmethods) {
	
	//use unset to remove the values we don't want
	unset($user_contactmethods['aim']);
	unset($user_contactmethods['yim']);
	unset($user_contactmethods['jabber']);

	//adding additional contact methods
	$user_contactmethods['twitter'] = 'Twitter';
	$user_contactmethods['facebook'] = 'Facebook';

	//return the array for processing
	return $user_contactmethods;
}

add_filter('user_contactmethods', 'wppro_author_profile');














