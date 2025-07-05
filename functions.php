<?php 

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

function devnahian_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'devnahian', get_template_directory() . '/languages' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    add_theme_support( 'woocommerce' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails', array( 'post', 'tutorial', 'themes' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'devnahian' ),
            'footer-1' => esc_html__( 'Footer 1', 'devnahian' ),
            'footer-2' => esc_html__( 'Footer 2', 'devnahian' ),
        )
    );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
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
            'devnahian_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
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
add_action( 'after_setup_theme', 'devnahian_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devnahian_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'devnahian_content_width', 640 );
}
add_action( 'after_setup_theme', 'devnahian_content_width', 0 );

function devnahian_scripts() {
    // Google Font
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&amp;display=swap', array(), null );

    // Font Awesome CSS 
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), _S_VERSION, 'all' );

    // Elegant Font Icons
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/owlcarousel/css/owl.carousel.min.css', array(), _S_VERSION, 'all' );

    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/assets/owlcarousel/css/owl.theme.default.min.css', array(), _S_VERSION, 'all' );

    // Bootstrap CSS
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION, 'all' );

    // Slicknav CSS
    wp_enqueue_style( 'mobilemenu', get_template_directory_uri() . '/assets/css/jquery-simple-mobilemenu.css', array(), _S_VERSION, 'all' );
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), _S_VERSION, 'all' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), _S_VERSION, 'all' );
    wp_enqueue_style( 'YouTubePopUp', get_template_directory_uri() . '/assets/css/YouTubePopUp.css', array(), _S_VERSION, 'all' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), _S_VERSION, 'all' );
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), _S_VERSION, 'all' );

    // Style CSS
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION, 'all' );

    // Responsive CSS
    wp_enqueue_style( 'responsive-theme', get_template_directory_uri() . '/assets/css/responsive.css', array(), _S_VERSION, 'all' );

    // Main stylesheet
    wp_enqueue_style( 'devnahian-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'devnahian-style', 'rtl', 'replace' );

    // Bootstrap JS
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), _S_VERSION, true );

    // Slicknav JS
    wp_enqueue_script( 'simple-mobilemenu', get_template_directory_uri() . '/assets/js/jquery-simple-mobilemenu.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/owlcarousel/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'YouTubePopUp', get_template_directory_uri() . '/assets/js/YouTubePopUp.jquery.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'yvpopup-active', get_template_directory_uri() . '/assets/js/yvpopup-active.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'scrolltopcontrol', get_template_directory_uri() . '/assets/js/scrolltopcontrol.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), _S_VERSION, true );

    // Main JS
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'devnahian_scripts' );

// Remove multiple fields and sections from the WooCommerce checkout
add_filter( 'woocommerce_checkout_fields', 'custom_remove_checkout_fields' );
function custom_remove_checkout_fields( $fields ) {
    // Unset individual fields
    unset($fields['billing']['billing_company']); // Company name
    unset($fields['billing']['billing_country']); // Country / Region
    unset($fields['billing']['billing_address_1']); // Street address
    unset($fields['billing']['billing_address_2']); // Apartment, suite, etc.
    unset($fields['billing']['billing_city']); // Town / City
    unset($fields['billing']['billing_district']); // District (if custom field)
    unset($fields['billing']['billing_postcode']); // Postcode / ZIP
    unset($fields['order']['order_comments']); // Additional information

    return $fields;
}


function restrict_username_registration($user_login) {
    // Define the disallowed pattern for "blogspot"
    $disallowed_pattern = '/blogspot/i'; // The "i" makes the match case-insensitive

    // Check if the username contains the disallowed pattern
    if (preg_match($disallowed_pattern, $user_login)) {
        // Throw an error if the username contains "blogspot"
        wp_die(
            'Registration failed: Usernames containing "blogspot" are not allowed.', 
            'Username Restriction Error', 
            array('back_link' => true)
        );
    }

    return $user_login;
}
add_filter('pre_user_login', 'restrict_username_registration');


function allow_webp_uploads($mime_types) {
    $mime_types['webp'] = 'image/webp';
    return $mime_types;
}
add_filter('upload_mimes', 'allow_webp_uploads');

/**
 * Register hero block
 */
add_action('acf/init', 'hero');
function hero() {
    // check function exists
    if( function_exists('acf_register_block') ) {
        // register a collection block
        acf_register_block(array(
            'name'              => 'collection',
            'title'             => __('Collection'),
            'description'       => __('Image background with text & call to action.'),
            'render_callback'   => 'collection_render_callback',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array( 'collection', 'image' ),
        ));
    }
}

/**
 * This is the callback that displays the hero block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block content (empty string).
 * @param bool $is_preview True during AJAX preview.
 */
function collection_render_callback( $block, $content = '', $is_preview = false ) {
    // create id attribute for specific styling
    $id = 'collection-' . $block['id'];

    // create align class ("alignwide") from block setting ("wide")
    $align_class = $block['align'] ? 'align' . $block['align'] : '';

    // ACF field variables
    $item_image = get_field('item_image');
    $item_author_name = get_field('item_author_name');
    $item_link = get_field('item_link');
    $item_made_with = get_field('item_made_with');
    $item_title = get_field('item_title');
    $item_description = get_field('item_description');
    $item_compatible_browsers = get_field('item_compatible_browsers');
    $item_responsive = get_field('item_responsive');
    $item_dependencies = get_field('item_dependencies');
    ?>

    <div class="item">
        <div class="item-file">
            <img src="<?php echo esc_url($item_image['url']); ?>" alt="">
        </div>
        <div class="item-meta">
            <div class="single-item-meta">
                <span>Author</span>
                <p><?php echo esc_html($item_author_name); ?></p>
            </div>
            <div class="single-item-meta">
                <span>Links</span>
                <p><a href="<?php echo esc_url($item_link); ?>">Preview & Download</a></p>
            </div>
            <div class="single-item-meta">
                <span>Made With</span>
                <p><?php echo esc_html($item_made_with); ?></p>
            </div>
        </div>

        <div class="item-content">
            <span>About Code</span>
            <h4><?php echo esc_html($item_title); ?></h4>
            <p><?php echo esc_html($item_description); ?></p>
        </div>

        <div class="item-bottom">
            <table>
                <tr>
                    <td>Compatible browsers:</td>
                    <td><?php echo esc_html(implode(', ', $item_compatible_browsers)); ?></td>
                </tr>
                <tr>
                    <td>Responsive:</td>
                    <td><?php echo esc_html($item_responsive); ?></td>
                </tr>
                <tr>
                    <td>Dependencies:</td>
                    <td><?php echo esc_html($item_dependencies); ?></td>
                </tr>
            </table>
        </div>
    </div>
    
    <?php
}

/**
 * Change ACF JSON save point.
 */
function my_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

remove_action( 'woocommerce_before_order_notes', 'woocommerce_checkout_coupon_form', 10 );
remove_action( 'woocommerce_checkout_before_order_review_heading', 'woocommerce_checkout_shipping', 10 );
remove_action( 'woocommerce_before_order_notes', 'woocommerce_checkout_order_review', 10 );

// This removes the "Additional information" fields section
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

function add_page_slug_to_body_class($classes) {
    if (is_page()) {
        global $post;
        if (isset($post->post_name)) {
            // Add the page slug to body class
            $classes[] = 'page-' . sanitize_html_class($post->post_name);
        }
    }
    return $classes;
}
add_filter('body_class', 'add_page_slug_to_body_class');

function show_all_courses_on_archive( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'courses' ) ) {
        $query->set( 'posts_per_page', 1 ); // Show all courses
    }
}
add_action( 'pre_get_posts', 'show_all_courses_on_archive' );


require get_template_directory() . '/inc/custom-post.php';