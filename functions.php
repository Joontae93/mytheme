<?

/** Styles 'n' Scripts */
function enqueue_styles() {
    wp_enqueue_style('kj-Styles', get_stylesheet_directory_uri() . '/build/global.css', array(), '1.0');
    wp_enqueue_script('kj-data', get_stylesheet_directory_uri() . '/build/global.js', array(), '1.0', true);
    wp_localize_script('kj-data', 'myData', array(
        'root_url' => get_site_url(),
        'day' => date('D'),
        'year' => date('Y')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

define('WPSE_PAGE_TEMPLATE_SUB_DIR', 'templates');

function wpse312159_page_template_add_subdir($templates = array()) {
    // Generally this doesn't happen, unless another plugin / theme does modifications of their own. In that case, it's better not to mess with it again with our code.
    if (empty($templates) || !is_array($templates) || count($templates) < 3)
        return $templates;

    $page_tpl_idx = 0;
    if ($templates[0] === get_page_template_slug()) {
        // if there is custom template, then our page-{slug}.php template is at the next index 
        $page_tpl_idx = 1;
    }

    $page_tpls = array(WPSE_PAGE_TEMPLATE_SUB_DIR . '/' . $templates[$page_tpl_idx]);

    // As of WordPress 4.7, the URL decoded page-{$slug}.php template file is included in the
    // page template hierarchy just before the URL encoded page-{$slug}.php template file.
    // Also, WordPress always keeps the page id different from page slug. So page-{slug}.php will
    // always be different from page-{id}.php, even if you try to input the {id} as {slug}.
    // So this check will work for WordPress versions prior to 4.7 as well.
    if ($templates[$page_tpl_idx] === urldecode($templates[$page_tpl_idx + 1])) {
        $page_tpls[] = WPSE_PAGE_TEMPLATE_SUB_DIR . '/' . $templates[$page_tpl_idx + 1];
    }

    array_splice($templates, $page_tpl_idx, 0, $page_tpls);

    return $templates;
}
add_filter('page_template_hierarchy', 'wpse312159_page_template_add_subdir');

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