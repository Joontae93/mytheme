<? get_header() ?>
<main>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <figure class="featured-image">
            <? the_post_thumbnail() ?>
        </figure>
        <h1 class="headline post-headline">
            <? the_title() ?>
        </h1>
        <? the_content() ?>
    </article>
    <aside class="sidebar">
        <h3 class="sidebar__header">In This article:</h3>
        <ul class="article-headers"></ul>
    </aside>
</main>
<? get_footer() ?>