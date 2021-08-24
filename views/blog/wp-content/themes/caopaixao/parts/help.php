<?php

  $howToHelp = get_page_by_path('como-ajudar', OBJECT, 'home');
  $volunteer = get_page_by_path('seja-voluntario', OBJECT, 'home');

?>

<section id="help">
  <div class="container">
    <div class="volunteer">
      <h2><?= $volunteer->post_title ?></h2>
      <div class="content">
        <?= $volunteer->post_content ?>
      </div>
      <div class="form-container">
        <form id="volunteerForm">
          <input placeholder="Nome" type="text" name="name" required>
          <input placeholder="E-mail" type="mail" name="email" required>
          <textarea placeholder="Sua mensagem" name="message"></textarea>
          <div class="action">
            <button type="submit">
              Enviar
              <span class="material-icons-outlined">arrow_forward</span>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="how-to-help">
      <h2><?= $howToHelp->post_title ?></h2>
      <div class="content">
        <?= $howToHelp->post_content ?>
      </div>
    </div>
  </div>
</section>
