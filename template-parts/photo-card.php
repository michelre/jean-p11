<?php
    $title = $args['post_title'] ?? get_the_title();
    $thumbnail = get_the_post_thumbnail($args['ID'] ?? get_the_ID(), 'large', 'class= photo-card-image');
    $categories = strip_tags(get_the_term_list($args['ID'] ?? get_the_ID(), 'category'));
?>

<div class="photo-card">
<?php echo $thumbnail ?>

    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fullscreen-icon.png" alt="Agrandir la photo" class="fullscreen-icon" data-category="<?php echo strip_tags(get_the_term_list($post->ID, 'category')); ?>" data-reference="<?php echo get_field('reference'); ?>">

    <a class="eye-icon" href="<?php echo get_post_permalink(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eye-icon.png" alt="Voir la photo">
    </a>

    <p class="photo-card-title"><?php echo $title ?></p>
    <div class="photo-card-category"><?php echo $categories; ?></div>

</div>