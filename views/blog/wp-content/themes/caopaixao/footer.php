    <footer>
      <div class="container">
        <?php wp_nav_menu(array( 'theme_location' => 'footer-menu')); ?>
        <?php get_template_part('elements/social'); ?>
      </div>
    </footer>

    <script src="<?= get_template_directory_uri() ?>/js/main.js" charset="utf-8"></script>

  </body>
</html>
