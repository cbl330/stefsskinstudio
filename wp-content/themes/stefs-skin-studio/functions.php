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
    $block_dir = __DIR__ . '/blocks/';
    $blocks = array_diff(scandir($block_dir), array('..', '.')); // Get all folder names

    foreach ($blocks as $block) {
        register_block_type($block_dir . $block);
    }

    // Store block names for rendering
    add_filter('custom_blocks_list', function () use ($blocks) {
        return $blocks;
    });
}
add_action('init', 'register_acf_blocks');

/**
 * Exclude specific blocks from the Gutenberg editor for posts.
 */
function exclude_blocks_in_post_editor( $allowed_block_types, $block_editor_context ) {
    // Check if we are in the post editor
    if ( isset( $block_editor_context->post ) && $block_editor_context->post->post_type === 'post' ) {
        // List of blocks to exclude in the editor
        $excluded_blocks = [
            'acf/block-cta',
            'acf/block-testimonies',
            'acf/block-related-posts',
        ];

        // If $allowed_block_types is not an array (could be true/false),
        // just return it to avoid errors with array_filter.
        if ( ! is_array( $allowed_block_types ) ) {
            return $allowed_block_types;
        }

        // Remove excluded blocks from the allowed list
        return array_filter( $allowed_block_types, function ( $block ) use ( $excluded_blocks ) {
            return ! in_array( $block, $excluded_blocks, true );
        });
    }

    // Return all blocks for other contexts
    return $allowed_block_types;
}
add_filter( 'allowed_block_types_all', 'exclude_blocks_in_post_editor', 10, 2 );



// /**
//  * Exclude specific blocks from the Gutenberg editor for posts.
//  */
// function exclude_blocks_in_post_editor( $allowed_block_types, $block_editor_context ) {
//     // Check if we are in the post editor
//     if ( isset( $block_editor_context->post ) && $block_editor_context->post->post_type === 'post' ) {
//         // List of blocks to exclude in the editor
//         $excluded_blocks = [
//             'acf/block-cta',
//             'acf/block-testimonies',
//             'acf/block-related-posts',
//         ];

//         // Remove excluded blocks from the allowed list
//         return array_filter( $allowed_block_types, function ( $block ) use ( $excluded_blocks ) {
//             return !in_array( $block, $excluded_blocks, true );
//         });
//     }

//     // Return all blocks for other contexts
//     return $allowed_block_types;
// }
// add_filter( 'allowed_block_types_all', 'exclude_blocks_in_post_editor', 10, 2 );

// /**
//  * Register ACF Gutenberg Blocks.
//  */
// function register_acf_blocks() {
//     $blocks = array(
//         'block-awards',
//         'block-cta',
//         'block-faq',
//         'block-image-content',
//         'block-wysiwyg',
//         'block-services',
//         'block-testimonies',
//         'block-related-posts'
//     );
//     foreach ($blocks as $block) {
//         register_block_type(__DIR__ . '/blocks/' . $block);
//     }
// }
// add_action('init', 'register_acf_blocks');

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

/**
 * Outputs pagination for a custom WP_Query.
 *
 * @param WP_Query $query The custom query object for which pagination is being rendered.
 * @param string   $aria_label Optional. Accessible label for the pagination, defaults to 'Pagination'.
 */
function render_pagination($query, $aria_label = 'Pagination') {
    if ($query->max_num_pages > 1) {
        echo '<div class="pagination" aria-label="' . esc_attr($aria_label) . '">';
        echo paginate_links(array(
            'total'        => $query->max_num_pages,
            'current'      => max(1, get_query_var('paged')),
            'prev_text'    => '<<',
            'next_text'    => '>>',
        ));
        echo '</div>';
    }
}

// Remove the Gravatar profile picture section from the WordPress user profile page
add_action('admin_head', function() {
    echo '<style>
        .user-profile-picture { display: none; }
    </style>';
});
