<?php get_header(); ?>
<main role="main">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php _e('Oops! That page can’t be found.', 'twentyfifteen'); ?></h1>
        </header>
        <div class="page-content">
            <?php _e('It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen'); ?>
            <?php get_search_form(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>