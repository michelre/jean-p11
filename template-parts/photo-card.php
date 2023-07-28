<div class="photo-card">
    <?php the_post_thumbnail('large', 'class= photo-card-image') ?>

    <a class="eye-icon" href="<?php echo get_post_permalink(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eye-icon.png" alt="Voir la photo">
    </a>

    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fullscreen-icon.png" alt="Agrandir la photo" class="fullscreen-icon">

    <p class="photo-card-title"><?php the_title(); ?></p>
    <div class="photo-card-category"><?php the_category() ?></div>

</div>