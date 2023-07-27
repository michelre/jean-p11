<?php get_header(); ?>



<div class="">
    <div class="">
        <h1><?php the_title() ?></h1>
        <p>Référence : <?php echo get_field('reference'); ?></p>
        <p>Catégorie : <?php echo strip_tags(get_the_term_list($post->ID, 'categories')); ?></p>
        <p>Format : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
        <p>Type : <?php echo get_field('type'); ?></p>
        <p>Année : <?php echo get_the_date('Y'); ?></p>
    </div>
    <img class="photo-image" src="<?php echo get_field('photo'); ?>">
</div>

<p class="texte">Cette photo vous intéresse ?</p>
<button>Contact</button>

<?php
$prevPhoto = get_previous_post();
$nextPhoto = get_next_post();

?>

<div class="single-photo-nav">
    <?php if ($prevPhoto) : ?>
        <a class="prev-photo-arrow" href="<?php echo get_permalink($prevPhoto->ID); ?>">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/left-arrow.png'; ?>" alt="Previous Photo" />
        </a>
    <?php endif; ?>
    <?php if ($nextPhoto) : ?>
        <a class="next-photo-arrow" href="<?php echo get_permalink($nextPhoto->ID); ?>">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/right-arrow.png'; ?>" alt="Next Photo" />
        </a>
    <?php endif; ?>
</div>

<div class="single-photo-nav-preview">
    <?php if ($prevPhoto) : ?>
        <img class="previous-image " src="<?php echo get_the_post_thumbnail_url($prevPhoto->ID); ?>" alt="Photo précédente">
    <?php endif; ?>
    <?php if ($nextPhoto) : ?>
        <img class="next-image" src="<?php echo get_the_post_thumbnail_url($nextPhoto->ID); ?>" alt="Photo suivante">
    <?php endif; ?>
</div>




</main>

<?php get_footer(); ?>