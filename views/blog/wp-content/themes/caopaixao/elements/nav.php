<div class="container">
  <nav>
    <?php wp_nav_menu(array( 'theme_location' => 'primary-menu')); ?>
    <div class="logo-container">
			<?php the_custom_logo(); ?>
      <h2>C<span>ão</span>paixão</h2>
		</div>
    <?php wp_nav_menu(array( 'theme_location' => 'secondary-menu')); ?>
  </nav>
</div>
