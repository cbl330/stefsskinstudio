<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Remove parent theme's styles and scripts.
 */
function understrap_remove_scripts() {
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');
    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

/**
 * Enqueue child theme styles and scripts.
 */
function theme_enqueue_styles() {
    $theme_version = wp_get_theme()->get('Version');
    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

    // Child theme styles
    wp_enqueue_style(
        'child-understrap-styles',
        get_stylesheet_directory_uri() . "/css/child-theme{$suffix}.css",
        array(),
        $theme_version . '.' . filemtime(get_stylesheet_directory() . "/css/child-theme{$suffix}.css")
    );

    // Child theme scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'child-understrap-scripts',
        get_stylesheet_directory_uri() . "/js/child-theme{$suffix}.js",
        array('jquery'),
        $theme_version . '.' . filemtime(get_stylesheet_directory() . "/js/child-theme{$suffix}.js"),
        true
    );

    // Comments reply script for threaded comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Load Font Awesome 5.
 */
function understrap_child_enqueue_fontawesome() {
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        array(),
        '5.15.4'
    );
}
add_action('wp_enqueue_scripts', 'understrap_child_enqueue_fontawesome');

/**
 * Load Google Fonts.
 */
function enqueue_updated_google_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Signika:wght@300..700&display=swap',
        array(),
        null
    );
}
add_action('wp_head', 'enqueue_updated_google_fonts');

/**
 * Load text domain for translations.
 */
function add_child_theme_textdomain() {
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');

/**
 * Set default Bootstrap version to Bootstrap 5.
 */
function understrap_default_bootstrap_version() {
    return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);

/**
 * Load customizer controls JavaScript.
 */
function understrap_child_customize_controls_js() {
    wp_enqueue_script(
        'understrap_child_customizer',
        get_stylesheet_directory_uri() . '/js/customizer-controls.js',
        array('customize-preview'),
        '20130508',
        true
    );
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');

/**
 * Register ACF Gutenberg Blocks.
 */
function register_acf_blocks() {
    $blocks = array(
        'block-awards',
        'block-cta',
        'block-faq',
        'block-image-content',
        'block-wysiwyg',
        'block-services',
        'block-testimonies'
    );
    foreach ($blocks as $block) {
        register_block_type(__DIR__ . '/blocks/' . $block);
    }
}
add_action('init', 'register_acf_blocks');

/**
 * Register custom navigation menus.
 */
function register_theme_menus() {
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'understrap-child'),
        'footer_menu' => __('Footer Menu', 'understrap-child'),
    ));
}
add_action('init', 'register_theme_menus');

/**
 * Enqueue Slick Slider.
 */
function enqueue_slick_slider_cdn() {
    wp_enqueue_style('slick-slider-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1');
    wp_enqueue_style('slick-slider-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array('slick-slider-css'), '1.8.1');
    wp_enqueue_script('slick-slider-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
    wp_enqueue_script('slick-slider-init', get_stylesheet_directory_uri() . '/js/slick-init.js', array('slick-slider-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_slider_cdn');





// /**
//  * Understrap Child Theme functions and definitions
//  *
//  * @package UnderstrapChild
//  */

// // Exit if accessed directly.
// defined( 'ABSPATH' ) || exit;



// /**
//  * Removes the parent themes stylesheet and scripts from inc/enqueue.php
//  */
// function understrap_remove_scripts() {
// 	wp_dequeue_style( 'understrap-styles' );
// 	wp_deregister_style( 'understrap-styles' );

// 	wp_dequeue_script( 'understrap-scripts' );
// 	wp_deregister_script( 'understrap-scripts' );
// }
// add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



// /**
//  * Enqueue our stylesheet and javascript file
//  */
// function theme_enqueue_styles() {

// 	// Get the theme data.
// 	$the_theme     = wp_get_theme();
// 	$theme_version = $the_theme->get( 'Version' );

// 	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
// 	// Grab asset urls.
// 	$theme_styles  = "/css/child-theme{$suffix}.css";
// 	$theme_scripts = "/js/child-theme{$suffix}.js";
	
// 	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

// 	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
// 	wp_enqueue_script( 'jquery' );
	
// 	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
	
// 	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// /**
//  * Load Font Awesome 5
//  */
// function understrap_child_enqueue_fontawesome() {
//     wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
// }
// add_action('wp_enqueue_scripts', 'understrap_child_enqueue_fontawesome');


// /**
//  * Load the child theme's text domain
//  */
// function add_child_theme_textdomain() {
// 	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
// }
// add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



// /**
//  * Overrides the theme_mod to default to Bootstrap 5
//  *
//  * This function uses the `theme_mod_{$name}` hook and
//  * can be duplicated to override other theme settings.
//  *
//  * @return string
//  */
// function understrap_default_bootstrap_version() {
// 	return 'bootstrap5';
// }
// add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



// /**
//  * Loads javascript for showing customizer warning dialog.
//  */
// function understrap_child_customize_controls_js() {
// 	wp_enqueue_script(
// 		'understrap_child_customizer',
// 		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
// 		array( 'customize-preview' ),
// 		'20130508',
// 		true
// 	);
// }
// add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


// /**
//  * Register ACF Gutenberg Blocks
//  * ------------------------------------------------------------------------------
//  */

//  add_action('init', 'register_acf_blocks');

//  function register_acf_blocks() {
// 	 register_block_type( __DIR__ . '/blocks/block-awards' );
// 	 register_block_type( __DIR__ . '/blocks/block-cta' );
// 	 register_block_type( __DIR__ . '/blocks/block-faq' );
// 	 register_block_type( __DIR__ . '/blocks/block-image-content' );
// 	 register_block_type( __DIR__ . '/blocks/block-wysiwyg' );
// 	 register_block_type( __DIR__ . '/blocks/block-services' );
// 	 register_block_type( __DIR__ . '/blocks/block-testimonies' );
//  };

// //  Custom Navigation Settings
// function register_theme_menus() {
//     register_nav_menus(array(
//         'header_menu' => __('Header Menu', 'stefs-skin-studio'),
//         'footer_menu' => __('Footer Menu', 'stefs-skin-studio'),
//     ));
// }
// add_action('init', 'register_theme_menus');

// /**
//  * Enqeue Google Fonts
//  * ------------------------------------------------------------------------------
//  */

// //   font-family: "Signika", sans-serif
// //   font-family: "Lato", sans-serif;

// function enqueue_updated_google_fonts() {
//     // Add preconnect links for optimal font loading
//     echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
//     echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    
//     // Enqueue the updated Google Fonts stylesheet
//     wp_enqueue_style(
//         'google-fonts',
//         'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Signika:wght@300..700&display=swap',
//         array(), // No dependencies
//         null // Version not set to avoid cache issues
//     );
// }
// add_action('wp_head', 'enqueue_updated_google_fonts');

// /**
//  * Enqeue Slick Slider
//  * ------------------------------------------------------------------------------
//  */
// function enqueue_slick_slider_cdn() {
//     // Enqueue Slick Slider CSS
//     wp_enqueue_style('slick-slider-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1');
//     wp_enqueue_style('slick-slider-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array('slick-slider-css'), '1.8.1');

//     // Enqueue Slick Slider JS
//     wp_enqueue_script('slick-slider-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);

//     // Enqueue Custom JS for Slider Initialization
//     wp_enqueue_script('slick-slider-init', get_stylesheet_directory_uri() . '/js/slick-init.js', array('slick-slider-js'), '1.0', true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_slick_slider_cdn');
