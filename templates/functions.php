<?php
/**
 * WP React Professional Theme functions and definitions
 *
 * @package WP_React_Starter_Theme
 * @version 1.0.0
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function wp_react_professional_theme_setup() {
    /*
     * Make theme available for translation.
     */
    load_theme_textdomain('wp-react-starter-theme', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support('post-thumbnails');

    // Add image sizes for better performance
    add_image_size('hero-image', 1920, 800, true);
    add_image_size('featured-image', 800, 600, true);
    add_image_size('thumbnail-large', 400, 300, true);

    // Register multiple navigation menus
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'wp-react-starter-theme'),
            'footer' => esc_html__('Footer Menu', 'wp-react-starter-theme'),
            'mobile' => esc_html__('Mobile Menu', 'wp-react-starter-theme'),
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
            'navigation-widgets',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'wp_react_professional_theme_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
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

    /**
     * Add support for Gutenberg wide and full width blocks.
     */
    add_theme_support('align-wide');

    /**
     * Add support for responsive embeds.
     */
    add_theme_support('responsive-embeds');

    /**
     * Add support for custom line height controls.
     */
    add_theme_support('custom-line-height');

    /**
     * Add support for experimental link color control.
     */
    add_theme_support('experimental-link-color');

    /**
     * Add support for custom units.
     */
    add_theme_support('custom-units');
}
add_action('after_setup_theme', 'wp_react_professional_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function wp_react_professional_theme_content_width() {
    $GLOBALS['content_width'] = apply_filters('wp_react_professional_theme_content_width', 1200);
}
add_action('after_setup_theme', 'wp_react_professional_theme_content_width', 0);

/**
 * Register widget areas.
 */
function wp_react_professional_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'wp-react-starter-theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'wp-react-starter-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer Widget Area 1', 'wp-react-starter-theme'),
            'id'            => 'footer-1',
            'description'   => esc_html__('Add widgets here.', 'wp-react-starter-theme'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer Widget Area 2', 'wp-react-starter-theme'),
            'id'            => 'footer-2',
            'description'   => esc_html__('Add widgets here.', 'wp-react-starter-theme'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer Widget Area 3', 'wp-react-starter-theme'),
            'id'            => 'footer-3',
            'description'   => esc_html__('Add widgets here.', 'wp-react-starter-theme'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer Widget Area 4', 'wp-react-starter-theme'),
            'id'            => 'footer-4',
            'description'   => esc_html__('Add widgets here.', 'wp-react-starter-theme'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'wp_react_professional_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wp_react_professional_theme_scripts() {
    // Enqueue the main theme stylesheet
    wp_enqueue_style('wp-react-starter-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    
    // Enqueue React and ReactDOM from CDN for production
    if (!is_admin()) {
        wp_enqueue_script('react', 'https://unpkg.com/react@18/umd/react.production.min.js', array(), '18.2.0', true);
        wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@18/umd/react-dom.production.min.js', array('react'), '18.2.0', true);
    }
    
    // Enqueue React app bundle if it exists
    $react_bundle_path = get_template_directory() . '/dist/bundle.js';
    if (file_exists($react_bundle_path)) {
        wp_enqueue_script('wp-react-starter-theme-react', get_template_directory_uri() . '/dist/bundle.js', array('react', 'react-dom'), _S_VERSION, true);
    }

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Enqueue navigation script
    wp_enqueue_script('wp-react-starter-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'wp_react_professional_theme_scripts');

/**
 * Add preconnect for Google Fonts.
 */
function wp_react_professional_theme_resource_hints($urls, $relation_type) {
    if (wp_style_is('wp-react-starter-theme-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter('wp_resource_hints', 'wp_react_professional_theme_resource_hints', 10, 2);

/**
 * Add custom image sizes to media library.
 */
function wp_react_professional_theme_custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'hero-image' => __('Hero Image', 'wp-react-starter-theme'),
        'featured-image' => __('Featured Image', 'wp-react-starter-theme'),
        'thumbnail-large' => __('Large Thumbnail', 'wp-react-starter-theme'),
    ));
}
add_filter('image_size_names_choose', 'wp_react_professional_theme_custom_image_sizes');

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

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add theme support for WooCommerce.
 */
function wp_react_professional_theme_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'wp_react_professional_theme_woocommerce_setup');

/**
 * Add customizer support for React app configuration.
 */
function wp_react_professional_theme_customize_register($wp_customize) {
    // Add section for React app settings
    $wp_customize->add_section('react_app_settings', array(
        'title' => __('React App Settings', 'wp-react-starter-theme'),
        'priority' => 30,
    ));

    // Add setting for React app title
    $wp_customize->add_setting('react_app_title', array(
        'default' => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('react_app_title', array(
        'label' => __('React App Title', 'wp-react-starter-theme'),
        'section' => 'react_app_settings',
        'type' => 'text',
    ));

    // Add setting for React app description
    $wp_customize->add_setting('react_app_description', array(
        'default' => get_bloginfo('description'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('react_app_description', array(
        'label' => __('React App Description', 'wp-react-starter-theme'),
        'section' => 'react_app_settings',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'wp_react_professional_theme_customize_register');

/**
 * Add data for React app to WordPress.
 */
function wp_react_professional_theme_add_react_data() {
    if (!is_admin()) {
        $react_data = array(
            'siteInfo' => array(
                'name' => get_bloginfo('name'),
                'description' => get_bloginfo('description'),
                'url' => get_bloginfo('url'),
                'adminUrl' => admin_url(),
            ),
            'menuItems' => wp_react_professional_theme_get_menu_items('primary'),
            'footerMenuItems' => wp_react_professional_theme_get_menu_items('footer'),
            'customizerData' => array(
                'reactAppTitle' => get_theme_mod('react_app_title', get_bloginfo('name')),
                'reactAppDescription' => get_theme_mod('react_app_description', get_bloginfo('description')),
            ),
        );

        wp_localize_script('wp-react-starter-theme-react', 'wpReactThemeData', $react_data);
    }
}
add_action('wp_enqueue_scripts', 'wp_react_professional_theme_add_react_data', 20);

/**
 * Get menu items for React app.
 */
function wp_react_professional_theme_get_menu_items($location) {
    $menu_items = array();
    
    if (has_nav_menu($location)) {
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[$location]);
        
        if ($menu) {
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            
            // Format menu items for React
            $formatted_items = array();
            foreach ($menu_items as $item) {
                $formatted_items[] = array(
                    'id' => $item->ID,
                    'title' => $item->title,
                    'url' => $item->url,
                    'target' => $item->target,
                    'classes' => $item->classes,
                    'menu_item_parent' => $item->menu_item_parent,
                );
            }
            
            return $formatted_items;
        }
    }
    
    return array();
}

/**
 * Add REST API support for menu items.
 */
function wp_react_professional_theme_rest_api_init() {
    register_rest_route('wp-react-theme/v1', '/menus/(?P<location>[a-zA-Z0-9-]+)', array(
        'methods' => 'GET',
        'callback' => 'wp_react_professional_theme_get_menu_rest',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'wp_react_professional_theme_rest_api_init');

/**
 * REST API callback for menu items.
 */
function wp_react_professional_theme_get_menu_rest($request) {
    $location = $request['location'];
    $menu_items = wp_react_professional_theme_get_menu_items($location);
    
    return new WP_REST_Response($menu_items, 200);
}

/**
 * Fallback menu function for when no menu is assigned.
 */
function wp_react_professional_theme_fallback_menu() {
    echo '<ul id="primary-menu" class="nav-menu">';
    // Output top-level pages as fallback items
    wp_list_pages(
        array(
            'title_li' => '',
            'depth'    => 1,
        )
    );
    echo '</ul>';
}
