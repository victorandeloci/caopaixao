<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= bloginfo('name') ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="theme-color" content="#F5F5FD">

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css">

		<?php wp_head();?>

  </head>
  <body>
    <header>
      <?php get_template_part('elements/nav'); ?>
    </header>
