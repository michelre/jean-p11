<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathalie Mota</title>
    <?php
    wp_head();
    ?>
</head>

<body>
    <header>
        <div class="header">
            <a href="<?php echo get_home_url() ?>">
                <img class="header__logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Nathalie Mota Logo" />
            </a>
            <nav>
                <?php wp_nav_menu(['theme_location' => 'header', 'container' => 'false']) ?>
            </nav>
        </div>

    </header>
    <main>