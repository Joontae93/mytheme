<? get_header() ?>
<main>
    <h1 class="title">
        My Work
    </h1>
    <?php
    if (have_posts()) : ?>
    <ul class="post-card__container" role="list">
        <? while (have_posts()) : the_post(); ?>
        <!-- IF featured post / ELSE -->
        <li class="post-card">
            <a href="<? the_permalink() ?>" class="post__link post-card__link">
                <article class="post">
                    <h2 class="post__title post-card__title">
                        <? the_title() ?>
                    </h2>
                    <p class="post__excerpt post-card__excerpt">
                        <? echo get_the_excerpt(); ?>
                    </p>
                </article>
            </a>
        </li>
        <? endwhile; ?>
    </ul>
    <? else : ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <? endif; ?>
</main>
<? get_footer() ?>