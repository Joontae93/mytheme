<?

/** Styles 'n' Scripts */
function enqueue_styles() {
    wp_enqueue_style('kj-Styles', get_stylesheet_directory_uri() . '/build/index.css', array(), '1.0');
    wp_enqueue_script('kj-data', get_stylesheet_directory_uri() . '/build/index.js', array(), '1.0', true);
    wp_localize_script('kj-data', 'myData', array(
        'root_url' => get_site_url(),
        'day' => date('D'),
        'year' => date('Y')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

/** Custom Filters */
add_filter('excerpt_length', function ($length) {
    return 30;
}, PHP_INT_MAX);

/** Custom Supports */
function myThemeSupports() {
    add_theme_support('post-formats', array('link', 'standard', 'video', 'audio'));
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'myThemeSupports');

/** Custom Post Types */
function my_cpts() {
    register_post_type(
        'work',
        array(
            'labels' => array(
                'name' => __('Work'),
                'singular_name' => __('Work'),
                'all_items'           => __('All Works', 'kjr'),
                'view_item'           => __('View Work', 'kjr'),
                'add_new_item'        => __('Add New Work', 'kjr'),
                'add_new'             => __('Add New', 'kjr'),
                'edit_item'           => __('Edit Work', 'kjr'),
                'update_item'         => __('Update Work', 'kjr'),
                'search_items'        => __('Search Work', 'kjr'),
                'not_found'           => __('Work Not Found', 'kjr'),
                'not_found_in_trash'  => __('Not found in Trash', 'kjr'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'work'),
            'menu_position' => 20,
            'menu_icon' => 'dashicons-laptop',
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'excerpt',  'thumbnail', 'comments', 'revisions', 'trackbacks', 'post-formats')
        )
    );
}
add_action('init', 'my_cpts');