<?php
/**
 * Laser Vision functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Laser_Vision
 */

 define( 'THEME_URI', get_template_directory_uri() );


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'laser_vision_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function laser_vision_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Laser Vision, use a find and replace
		 * to change 'laser-vision' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'laser-vision', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'laser-vision' ),
				'menu-2' => esc_html__( 'Secondary', 'laser-vision' ),
				'site-nav' => __( 'Site Nav', 'laser-vision' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'laser_vision_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'laser_vision_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function laser_vision_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'laser_vision_content_width', 640 );
}
add_action( 'after_setup_theme', 'laser_vision_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function laser_vision_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'laser-vision' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'laser-vision' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 2', 'laser-vision' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'laser-vision' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'laser_vision_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function laser_vision_scripts() {
	wp_enqueue_style( 'laser-vision-normalize', THEME_URI . '/css/normalize.css', array(), _S_VERSION );

	wp_enqueue_style('slick_css', get_template_directory_uri() . '/css/slick-theme.css');

	wp_register_style('slick_main', get_template_directory_uri() . '/css/slick.css');
	
	wp_enqueue_style( 'laser-vision-style', get_stylesheet_uri(), array(), _S_VERSION );

	// other styles
	wp_enqueue_style( 'laser-vision-main', THEME_URI . '/css/main.css', array(), _S_VERSION );

	// wp_enqueue_style('laser-vision-fonts', get_template_directory_uri() . '/Fonts/hero_new_regular-webfont.woff2');

	// wp_enqueue_style(('icomoon'), get_template_directory_uri(). '/icomoon/style.css', false);
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.2.4.min.js', false, null, false );
    wp_enqueue_script( 'jquery' );

   
    wp_enqueue_style('slick_main');
	// other scripts
	wp_register_script('slick', get_template_directory_uri() . '/js/slick.min.js', ['jquery'], false, true );
    wp_enqueue_script('slick');

	wp_enqueue_script( 'laser-vision-main', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true );


	wp_enqueue_script( 'laser-vision-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'laser_vision_scripts' );


// Custom logo
add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() {
  $defaults = array(
  'height'      => 277,
  'width'       => 72,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'logo', 'site-logo' ),
 'unlink-homepage-logo' => true, 
  );
//   add_theme_support( 'custom-logo', $defaults );
 }
 add_action( 'after_setup_theme', 'themename_custom_logo_setup' );



 //Menu
add_theme_support('menus');

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require_once "inc/cpt.php";
