<?php get_header() ?>
<img class="banner-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.png" alt="Photograph event">

<section class="filter-section">
    <div class="left-filter-section">
        <div class="dropdown">
            <div class="dropDownBtn categories-btn ">
                <p class="dropDownBtntext">Categories</p>
                <img class="chevron categories-chevron" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down.png?>" alt="">
            </div>
            <ul class="dropDownList categories-list ">
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
            </ul>
        </div>
        <div class="dropdown">
            <div class="dropDownBtn formats-btn">
                <p class="dropDownBtntext">Formats</p>
                <img class="chevron formats-chevron" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down.png?>" alt="">
            </div>
            <ul class="dropDownList formats-list">
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
                <li class="dropDownListItem"><span class="list-padding">ubiuzece</span></li>
            </ul>
        </div>
    </div>
    <div class="right-filter-section" >
    <div class="dropdown">
            <div class="dropDownBtn sort-btn">
                <p class="dropDownBtntext">Trier par</p>
                <img class="chevron sort-chevron" src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down.png?>" alt="">
            </div>
            <ul class="dropDownList sort-list">
                <li class="dropDownListItem"><span class="list-padding">Des plus récentes aux plus anciennes</span></li>
                <li class="dropDownListItem"><span class="list-padding">Des plus anciennes au plus récentes</span></li>
            </ul>
        </div>
    </div>


</section>
</main>

<?php get_footer() ?>