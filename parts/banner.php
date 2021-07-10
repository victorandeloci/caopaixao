<?php $about = get_page_by_path('sobre-a-caopaixao', OBJECT, 'home'); ?>

<section id="banner">
  <div class="container">
    <div class="card">
      <h2><?= $about->post_title ?></h2>
      <div class="content">
        <?= $about->post_content ?>
      </div>
    </div>
    <div class="card banner" style="background-image: url(<?= get_the_post_thumbnail_url($about) ?>);"></div>
  </div>
</section>
