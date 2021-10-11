<?php get_header(); ?>

<?php
  if (get_the_category()) $category = get_the_category()[0];
  $post = get_post();
?>

<main id="post">
  <article>
    <div class="container">
      <div class="title">
        <h1><?= get_the_title() ?></h1>
        <div class="details">
          <a href="<?= get_category_link($category) ?>"><?= $category->name ?></a>
          <div class="date">
            <span class="material-icons-outlined">calendar_today</span>
            <?= get_the_date('d/m/Y') ?>
          </div>
          <img src="<?= get_avatar_url($post->post_author) ?>" alt="<?= get_the_author_meta('first_name', $post->post_author) . ' ' . get_the_author_meta('last_name', $post->post_author) ?>" title="<?= get_the_author_meta('first_name', $post->post_author) . ' ' . get_the_author_meta('last_name', $post->post_author) ?>">
          <?= get_the_author_meta('first_name', $post->post_author) . ' ' . get_the_author_meta('last_name', $post->post_author) ?>
        </div>
      </div>
      <div class="thumbnail" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);"></div>
      <?php get_template_part('elements/sharer'); ?>
      <div class="content">
        <?= the_content() ?>
      </div>
    </div>
  </article>

  <div class="container post-container">
    <?php
      wp_reset_query();

      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'category_name' => 'noticias',
        'post__not_in' => [$post->ID],
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
</main>

<?php get_footer(); ?>
