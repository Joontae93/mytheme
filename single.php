<? get_header();
wp_enqueue_script('postJS', get_stylesheet_directory_uri() . '/build/singles.js', array(), '1.0', true);
?>
<main class="single">
    <article id="post-<?php the_ID(); ?>" <?php post_class("the-post"); ?>>
        <figure class="the-post__featured-image">
            <? the_post_thumbnail() ?>
        </figure>
        <h1 class="title headline the-post__headline">
            <? the_title() ?>
        </h1>
        <? the_content() ?>
    </article>
</main>
<? get_footer() ?>