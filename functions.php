<?

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