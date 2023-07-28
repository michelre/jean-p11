<div class="photo-card">
    <?php the_post_thumbnail('large', 'class= photo-card-image') ?>

    <a href="<?php echo get_post_permalink(); ?>">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/eye-icon.png" alt="Voir la photo" class="eye-icon">
    </a>

    <img src="<?php echo get_template_directory_uri() ?>/assets/images/fullscreen-icon.png" alt="Agrandir la photo" class="fullscreen-icon">

    <p class="photo-card-title"><?php the_title() ?></p>
    <p class="photo-card-category"><?php the_category() ?></p>
</div>