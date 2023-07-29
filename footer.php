<footer class="footer">
    <?php get_template_part('/template-parts/lightbox') ?>
    <nav class="footer-nav" >
        <?php wp_nav_menu(['theme_location' => 'footer', 'container' => 'false']) ?>
        <ul class="rights">
            <li>Tous droits réservés</li>
        </ul>
    </nav>
    <?php
    wp_footer();
    ?>
</footer>

</body>

</html>