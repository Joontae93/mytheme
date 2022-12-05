<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KJ Roelke</title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <? wp_head(); ?>
</head>

<body <? body_class(); ?>>
    <header>
        <nav class="nav">
            <h1><a href="/">K.J. Roelke</a></h1>
            <ul class="nav__container" role="list">
                <li class="nav__list-item"><a href="/about" class="nav__list-item--link">About</a></li>
                <li class="nav__list-item"><a href="/blog" class="nav__list-item--link">Blog</a></li>
                <li class="nav__list-item"><a href="/work" class="nav__list-item--link">Work</a></li>
            </ul>
        </nav>
    </header>