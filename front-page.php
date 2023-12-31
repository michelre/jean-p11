<?php get_header() ?>
<section class="hero-section">
    <img class="banner-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.png" alt="Photograph event">
</section>

<section class="filter-section">
    <div class="left-filter-section">
        <div class="dropdown">
            <div class="dropDownBtn categories-btn ">
                <p class="dropDownBtntext">Categories</p>
                <img class="chevron categories-chevron" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down.png?>" alt="">
            </div>
            <ul class="dropDownList categories-list ">
                <?php $categories = get_terms(array(
                    'taxonomy' => 'category',
                    'orderby' => 'name'
                ));
                ?><li data-id class="dropDownListItem categoryReset "><span class="list-padding"></span></li><?php
                foreach ($categories as $category) {
                    echo '<li data-id="' . $category->term_id . '" class="dropDownListItem categoriesListItem ' . $category->name . 'ListItem " ><span class="list-padding">' . $category->name . '</li>';
                }
                ?>
            </ul>
        </div>
        <div class="dropdown">
            <div class="dropDownBtn formats-btn">
                <p class="dropDownBtntext">Formats</p>
                <img class="chevron formats-chevron" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down.png?>" alt="">
            </div>
            <ul class="dropDownList formats-list">
                <?php $formats = get_terms(array(
                    'taxonomy' => 'format',
                    'orderby' => 'name'
                ));
                ?><li data-id  class="dropDownListItem formatsReset "><span class="list-padding"></span></li><?php
                foreach ($formats as $format) {
                    echo '<li data-id="' . $format->term_id . '" class="dropDownListItem formatsListItem ' . $format->name . 'ListItem " ><span class="list-padding">' . $format->name . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="right-filter-section">
        <div class="dropdown">
            <div class="dropDownBtn sort-btn">
                <p class="dropDownBtntext">Trier par</p>
                <img class="chevron sort-chevron" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down.png?>" alt="">
            </div>
            <ul class="dropDownList sort-list">
                <li data-order="DESC" class="dropDownListItem sortListItem"><span class="list-padding">Des plus récentes aux plus anciennes</span></li>
                <li data-order="ASC" class="dropDownListItem sortListItem"><span class="list-padding">Des plus anciennes au plus récentes</span></li>
            </ul>
        </div>
    </div>
</section>
<section class="gallery-section">
    <?php
    $galleryPhotos = new WP_Query(
        array(
            'post_type' => 'photo',
            'posts_per_page' => 12,
            'orderby' => 'date',
            'order' => 'DESC',
        )
    );
    while ($galleryPhotos->have_posts()) : $galleryPhotos->the_post();
        get_template_part('template-parts/photo-card');

    endwhile;
    wp_reset_postdata();
    ?>

</section>
<div class="mota-button load-more-btn">Charger plus</div>
<div class="lightbox-container"></div>
</main>

<?php get_footer() ?>