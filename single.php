<?php get_header();

//Start the loop
while (have_posts()) : the_post(); ?>
    <section class="single-top-section">
        <div class="single-photo-and-description">
            <div class="single-description">
                <h1><?php the_title() ?></h1>
                <p>Référence : <?php echo get_field('reference'); ?></p>
                <p>Catégorie : <?php echo strip_tags(get_the_term_list($post->ID, 'category')); ?></p>
                <p>Format : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
                <p>Type : <?php echo get_field('type'); ?></p>
                <p>Année : <?php echo get_the_date('Y'); ?></p>
                <div class='single-description-border'></div>
            </div>
            <div class="single-photo-image-container">
                <img class="single-photo-image" src="<?php echo get_field('photo'); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ?>">
            </div>
        </div>
        <div class="single-photo-nav-section">
            <div class="single-photo-nav-section-left">
                <p class="texte">Cette photo vous intéresse ?</p>
                <div class="mota-button " id="single-contact-btn">Contact</div>
            </div>

            <div class="single-photo-nav-section-right">
                <div class="single-nav-container">
                    <div class="single-photo-nav-preview">
                        <?php
                        $prevPhoto = get_previous_post();
                        $nextPhoto = get_next_post();
                        if ($prevPhoto) : ?>
                            <img class="previous-nav-thumbnail" src="<?php echo get_the_post_thumbnail_url($prevPhoto->ID); ?>" alt="Photo précédente">
                        <?php endif; ?>
                        <?php if ($nextPhoto) : ?>
                            <img class="next-nav-thumbnail" src="<?php echo get_the_post_thumbnail_url($nextPhoto->ID); ?>" alt="Photo suivante">
                        <?php endif; ?>
                    </div>

                    <div class="single-photo-nav">
                        <?php

                        if ($prevPhoto) : ?>
                            <a class="single-prev-photo-arrow" href="<?php echo get_permalink($prevPhoto->ID); ?>">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/left-arrow.png'; ?>" alt="Previous Photo" />
                            </a>
                        <?php endif; ?>
                        <?php if ($nextPhoto) : ?>
                            <a class="single-next-photo-arrow" href="<?php echo get_permalink($nextPhoto->ID); ?>">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/right-arrow.png'; ?>" alt="Next Photo" />
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="single-bottom-section">
        <h2>VOUS AIMEREZ AUSSI</h2>

        <div class="similar-photos">

            <?php
            $similarPhotos = new WP_Query([
                'post_type' => 'photo',
                'post__not_in' => [get_the_ID()],
                'posts_per_page' => '2',
                'category_name' => get_the_category()[0]->cat_name,
                'orderby' => 'rand',
            ]);
            ?>
            <?php while ($similarPhotos->have_posts()) : $similarPhotos->the_post();
                get_template_part('template-parts/photo-card');
            ?>
            <?php endwhile;
            wp_reset_postdata(); ?>

        </div>

        <a class="mota-button single-more-btn" href="<?php echo get_home_url() ?>">
            Toutes les photos
        </a>
    </section>
<?php endwhile; ?>
</main>

<?php get_footer(); ?>