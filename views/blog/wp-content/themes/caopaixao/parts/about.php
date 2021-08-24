<?php $about = get_page_by_path('sobre-a-caopaixao', OBJECT, 'home'); ?>

<section id="about">
  <div class="container">
    <div class="content">
      <div class="title">
        <h2><?= $about->post_title ?></h2>
      </div>
      <img src="<?= get_template_directory_uri() ?>/img/title_decoration.svg" alt="">
      <?= $about->post_content ?>
      <img src="<?= get_template_directory_uri() ?>/img/title_decoration.svg" alt="">
    </div>
  </div>
  <div class="thumb-container" style="background-image: url(<?= get_the_post_thumbnail_url($about) ?>);"></div>
</section>
