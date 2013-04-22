<?php
/**
 * cilento_theme functions and definitions
 *
 * @package cilento_theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'cilento_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function cilento_theme_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on cilento_theme, use a find and replace
	 * to change 'cilento_theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cilento_theme', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cilento_theme' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // cilento_theme_setup
add_action( 'after_setup_theme', 'cilento_theme_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function cilento_theme_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'cilento_theme_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'cilento_theme_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function cilento_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cilento_theme' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cilento_theme_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function cilento_theme_scripts() {
	wp_enqueue_style( 'cilento_theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cilento_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'cilento_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'cilento_theme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}

	wp_register_style( 'EB Garamond',
		get_template_directory_uri() . '/fonts.googleapis.com/css?family=EB+Garamond', false, '1', 'all' );

	// enqueing:
		wp_enqueue_style( 'EB Garamond' );

		add_action( 'wp_enqueue_scripts', 'cilento_theme_scripts' );

add_action( 'init', 'create_my_post_types' );

    function create_my_post_types() {
		register_post_type( 'session_page',
			array(
				'labels' => array(
				'name' => __( 'Session Pages' ),
				'singular_name' => __( 'Session Page' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Session Page' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Session Page' ),
				'new_item' => __( 'New Session Page' ),
				'view' => __( 'View Session Page' ),
				'view_item' => __( 'View Session Page' ),
				'search_items' => __( 'Search Session Pages' ),
				'not_found' => __( 'No Session Pages found' ),
				'not_found_in_trash' => __( 'No Session Pages found in Trash' ),
				'parent' => __( 'Parent Session Page' ),
		),
				'public' => true,
				'menu_position' => 4,
				'rewrite' => array('slug' => 'session_pages'),
				'supports' => array( 'title', 'editor', 'thumbnail' ),
				'taxonomies' => array('category', 'post_tag'),
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
		)
	);
}




/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
