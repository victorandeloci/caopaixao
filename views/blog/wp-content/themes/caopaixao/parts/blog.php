<section id="blog">
  <h2>Notícias & Atualizações</h2>
  <div class="decoration">
    <img src="<?= get_template_directory_uri() ?>/img/blue_title_decoration.svg" alt="">
  </div>
  <div class="container post-container">
    <?php
      wp_reset_query();

      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'category_name' => 'noticias'
      );

      $query = new WP_Query( $args );

      if ($query->have_posts()):
        while($query->have_posts()):

          $query->the_post();
          get_template_part( 'elements/post' );

        endwhile;
      endif;
    ?>
  </div>
</section>
