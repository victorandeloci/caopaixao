<?php
  $post = get_post();
?>

<a href="<?= get_permalink() ?>" class="post">
  <div class="thumbnail" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);"></div>
  <div class="content">
    <h3><?= get_the_title() ?></h3>
    <div class="details">
      <div class="date">
        <span class="material-icons-outlined">calendar_today</span>
        <?= get_the_date('d/m/Y') ?>
      </div>
      <img src="<?= get_avatar_url($post->post_author) ?>" alt="<?= get_the_author_meta('first_name', $post->post_author) . ' ' . get_the_author_meta('last_name', $post->post_author) ?>" title="<?= get_the_author_meta('first_name', $post->post_author) . ' ' . get_the_author_meta('last_name', $post->post_author) ?>">
    </div>
    <div class="post-content">
      <?= excerpt(20) ?>
    </div>
  </div>
</a>
