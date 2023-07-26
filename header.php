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
        <div class="header desktop-header">
            <a href="<?php echo get_home_url() ?>">
                <img class="header-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Nathalie Mota Logo" />
            </a>
            <nav class="header-nav">
                <?php wp_nav_menu(['theme_location' => 'header', 'container' => 'false']) ?>
            </nav>
        </div>

        <div class="mobile-header">
            <div class="mobile-header-container">
                <a href="<?php echo get_home_url() ?>">
                    <img class="mobile-header-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Nathalie Mota Logo" />
                </a>
                <img class="burger-menu" src="<?php echo get_template_directory_uri(); ?>/assets/images/burger-menu.png" alt="close" />
                <img class="mobile-close-menu-btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/close-icon.png" alt="close" />
            </div>
            <nav class="mobile-header-nav">
                <?php wp_nav_menu(['theme_location' => 'header', 'container' => 'false']) ?>
            </nav>
        </div>
        <?php
        get_template_part('contact-modal') 
        ?>
    </header>
    <main>