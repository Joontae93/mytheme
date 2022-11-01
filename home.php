<? get_header() ?>
<main>
    <h1>The Blog</h1>
    <?php
    if (have_posts()) : ?>
    <? while (have_posts()) : the_post(); ?>
    <article class="post">
        <a href="<? the_permalink() ?>" class="post__link">
            <h2 class="post__title">
                <? the_title() ?>
            </h2>
            <p class="post__excerpt">
                <? the_excerpt(); ?>
            </p>
        </a>
    </article>
    <? endwhile; ?>
    <? else : ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <? endif; ?>
</main>
<? get_footer() ?>