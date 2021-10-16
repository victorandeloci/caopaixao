<?php /* Template Name: Contato */ ?>

<?php get_header(); ?>

<?php
  $page = get_post();
?>

<main id="contact">
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
      <div class="row">
        <div class="column">
          <div class="content">
            <?= the_content() ?>
          </div>
        </div>
        <div class="column">
          <div class="form-container">
            <form id="contactForm">
              <select name="subject">
                <option value="default">Selecine o assunto</option>
                <option value="volunteer">Quero me voluntariar</option>
                <option value="donate">Doação</option>
                <option value="animal">Adoção responsável</option>
              </select>
              <input placeholder="Nome" type="text" name="name" required>
              <input placeholder="E-mail" type="mail" name="email" required>
              <textarea placeholder="Sua mensagem" name="message"></textarea>
              <input type="hidden" name="annon_edhellen_edro_hi_ammen" value="">
              <div class="action">
                <button type="submit">
                  Enviar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </article>
</main>

<?php get_footer(); ?>
