<?php /* Template Name: Como Ajudar */ ?>

<?php get_header(); ?>

<?php
  $page = get_post();
?>

<main id="howToHelp" class="how-to-help">
  <article>
    <div class="container">
      <div class="title">
        <h1><?= get_the_title() ?></h1>
        <div class="details">
          <div class="date">
            <span class="material-icons-outlined">calendar_today</span>
            <?= get_the_date('d/m/Y') ?>
          </div>
          <img src="<?= get_avatar_url($page->post_author) ?>" alt="<?= get_the_author_meta('first_name', $page->post_author) . ' ' . get_the_author_meta('last_name', $page->post_author) ?>" title="<?= get_the_author_meta('first_name', $page->post_author) . ' ' . get_the_author_meta('last_name', $page->post_author) ?>">
          <?= get_the_author_meta('first_name', $page->post_author) . ' ' . get_the_author_meta('last_name', $page->post_author) ?>
        </div>
      </div>
      <?php get_template_part('elements/sharer'); ?>
      <div class="content">
        <?= the_content() ?>
      </div>
    </div>
  </article>
</main>

<?php get_footer(); ?>
