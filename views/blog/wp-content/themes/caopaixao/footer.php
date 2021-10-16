    <footer>
      <div class="container">
        <?php wp_nav_menu(array( 'theme_location' => 'footer-menu')); ?>
        <?php get_template_part('elements/social'); ?>
        <p>CNPJ: 12.363.777/0001-08</p>
      </div>
    </footer>

    <script type="text/javascript">
      var isHome = false;
      <?php
        if ( is_home() ) {
          echo 'isHome = true;';
        }
      ?>
    </script>

    <script src="<?= get_template_directory_uri() ?>/js/main.js" charset="utf-8"></script>

    <?php wp_footer(); ?>

  </body>
</html>
