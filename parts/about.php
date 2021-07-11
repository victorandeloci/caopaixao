<?php $about = get_page_by_path('sobre-a-caopaixao', OBJECT, 'home'); ?>

<section id="about">
  <div class="background" style="background-image: url(<?= get_the_post_thumbnail_url($about) ?>);"></div>
  <div class="container">
    <div class="banner">
      <div class="content">
        <h2><?= $about->post_title ?></h2>
        <?= $about->post_content ?>
      </div>
      <div class="thumb" style="background-image: url(<?= get_the_post_thumbnail_url($about) ?>);"></div>
    </div>
  </div>
</section>
