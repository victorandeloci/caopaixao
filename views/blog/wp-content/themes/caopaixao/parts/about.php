<?php $about = get_page_by_path('sobre-a-caopaixao', OBJECT, 'home'); ?>

<section id="about">
  <div class="background"></div>
  <div class="container">
    <div class="content">
      <div class="title">
        <h2><?= $about->post_title ?></h2>
        <img src="<?= get_template_directory_uri() ?>/img/title_decoration.svg" alt="">
      </div>
      <?= $about->post_content ?>
    </div>
    <div class="thumb-container" id="3d">
      <img src="<?= get_the_post_thumbnail_url($about) ?>" alt="">
    </div>
  </div>
</section>
