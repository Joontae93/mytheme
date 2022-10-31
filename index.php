<? get_header() ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <a href="<? the_permalink() ?>" class="post__link">
        <div class="post">
            <h2>
                <? the_title(); ?>
            </h2>
            <p class="post__content">
                <? the_content() ?>
            </p>
        </div>
    </a>
    <?php endwhile; ?>
    <? else : ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</main>
<? get_footer() ?>