<div class="photo-card">
    <?php the_post_thumbnail('large', 'class= photo-card-image') ?>

    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fullscreen-icon.png" alt="Agrandir la photo" class="fullscreen-icon">

    <a class="eye-icon" href="<?php echo get_post_permalink(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eye-icon.png" alt="Voir la photo">
    </a>

    <p class="photo-card-title"><?php the_title(); ?></p>
    <div class="photo-card-category"><?php echo strip_tags(get_the_term_list($post->ID, 'category')); ?></div>

</div>