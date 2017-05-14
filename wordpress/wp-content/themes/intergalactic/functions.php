<?php
/**
 * Intergalactic functions and definitions
 *
 * @package Intergalactic
 */
add_filter( 'widget_categories_args', 'wpb_force_empty_cats' );
function wpb_force_empty_cats($cat_args) {
    $cat_args['hide_empty'] = 0;

    return $cat_args;
}
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'event',
        array(
            'labels' => array(
                'name' => __( 'events' ),
                'singular_name' => __( 'event' )
            ),
            'public' => true,
            'has_archive' => true,
            'capability_type' => array('event','events'),
            'map_meta_cap' => true,
        )
    );

    register_post_type( 'eventStatus',
        array(
            'labels' => array(
                'name' => __( 'eventStatuses' ),
                'singular_name' => __( 'eventStatus' )
            ),
            'public' => true,
            'has_archive' => true,
            'capability_type' => array('eventStatus','eventStatuses'),
            'map_meta_cap' => true,
        )
    );
}

add_action('admin_init','psp_add_role_caps',999);
function psp_add_role_caps()
{

    // Add the roles you'd like to administer the custom post types
    $roles = array('subscriber', 'administrator');

    // Loop through each role and assign capabilities
    foreach ($roles as $the_role) {

        $role = get_role($the_role);

        $role->add_cap('read');
        $role->add_cap('read_event');
        $role->add_cap('read_private_events');
        $role->add_cap('edit_event');
        $role->add_cap('edit_events');
        $role->add_cap('edit_others_events');
        $role->add_cap('edit_published_events');
        $role->add_cap('publish_events');
        $role->add_cap('delete_others_events');
        $role->add_cap('delete_private_events');
        $role->add_cap('delete_published_events');

    }
}
//add_action( 'init', 'sk_add_category_taxonomy_to_events' );
//function sk_add_category_taxonomy_to_events() {
//    register_taxonomy_for_object_type( 'category', 'events' );
//}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_event_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_event_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

    $labels = array(
        'name' => _x( 'Event categorys', 'taxonomy general name' ),
        'singular_name' => _x( 'Event category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Event categorys' ),
        'all_items' => __( 'All Event categorys' ),
        'parent_item' => __( 'Parent Event category' ),
        'parent_item_colon' => __( 'Parent Event category:' ),
        'edit_item' => __( 'Edit Event category' ),
        'update_item' => __( 'Update Event category' ),
        'add_new_item' => __( 'Add New Event category' ),
        'new_item_name' => __( 'New Event category Name' ),
        'menu_name' => __( 'Event categorys' ),
    );

// Now register the taxonomy

    register_taxonomy('event_category',array('event'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'event_category' ),
        'capabilities' => array (
            'manage_terms'=> 'manage_event_categories',
            'edit_terms'=> 'manage_event_categories',
            'delete_terms'=> 'manage_event_categories',
            'assign_terms' => 'edit_events',
            ),
    ));

}
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'intergalactic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function intergalactic_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Intergalactic, use a find and replace
	 * to change 'intergalactic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'intergalactic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'intergalactic-large', '1440', '960', false );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'intergalactic' ),
		'social'  => __( 'Social Links Menu', 'intergalactic' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'intergalactic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	add_editor_style( array( 'editor-style.css' ) );
}
endif; // intergalactic_setup
add_action( 'after_setup_theme', 'intergalactic_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function intergalactic_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'intergalactic' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'intergalactic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function intergalactic_scripts() {
	wp_enqueue_style( 'intergalactic-style', get_stylesheet_uri() );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	wp_enqueue_script( 'intergalactic-script', get_template_directory_uri() . '/js/intergalactic.js', array( 'jquery' ), '20140905', true );

	wp_enqueue_script( 'intergalactic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'intergalactic-lato', intergalactic_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'intergalactic_scripts' );

/**
 * Register Google Fonts
 */
function intergalactic_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$arimo = _x( 'on', 'Lato font: on or off', 'intergalactic' );

	if ( 'off' !== $arimo ) {
		$font_families = array();
		$font_families[] = 'Lato:300,400,700,300italic,400italic,700italic&subset=latin,latin-ext';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

if ( ! function_exists( 'intergalactic_editor_styles' ) ) {
/**
 * Enqueue Google Fonts for Editor Styles
 */
function intergalactic_editor_styles() {
    add_editor_style( array( 'editor-style.css', intergalactic_fonts_url() ) );
}
add_action( 'after_setup_theme', 'intergalactic_editor_styles' );

} // if ! function_exists( 'intergalactic_editor_styles' )


if ( ! function_exists( 'intergalactic_admin_scripts' ) ) {
/**
 * Enqueue Google Fonts for custom headers
 */
function intergalactic_admin_scripts( $hook_suffix ) {

	wp_enqueue_style( 'intergalactic-lato', intergalactic_fonts_url(), array(), null );

}
add_action( 'admin_print_styles-appearance_page_custom-header', 'intergalactic_admin_scripts' );

} // if ! function_exists( 'intergalactic_admin_scripts' )

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


add_action( 'wp_enqueue_scripts', 'ajax_event_buttons_scripts' );
function ajax_event_buttons_scripts() {
//    var_dump(get_template_directory_uri().'/js/event-buttons.js');
//    var_dump(get_stylesheet_directory_uri().'/js/event-buttons.js');
    wp_enqueue_script( 'events-js', get_template_directory_uri().'/js/event-buttons.js', array('jquery'), '1.0', true );
//    var_dump($foo); die('done');
}

wp_localize_script( 'event-buttons', 'event', array(
    'ajp_nonce' => wp_create_nonce('afp_nonce'),
    'ajax_url' => admin_url( 'admin-ajax.php' ),
));

add_action( 'wp_ajax_nopriv_event_status', 'create_update_event_status' );
add_action( 'wp_ajax_wp_status', 'create_update_event_status' );

function create_update_event_status()
{
    echo 'succes';
}


