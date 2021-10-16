<?php

require_once(dirname(__DIR__, 1) . '/config.php');
require_once('Helper.php');

require_once(dirname(__DIR__, 1) . '/models/Default.php');


class DefaultController {

	private $helper;
	private $model;

	public function __construct() {
		$this->helper = new Helper();
		$this->model = new DefaultModel();
	}

	public function checkConnection() {
		return $this->model->checkConnection();
	}

	public function contactForm() {
		if ($this->helper->validateSpam()) {
			if (isset($_POST['email']) && isset($_POST['message'])) {

				$toEmail = 'contato@caopaixao.org.br';

				switch ($_POST['subject']) {
					case 'volunteer':
						$subject = 'Voluntariado - Contato via site';
						break;

					case 'donate':
						$subject = 'Doação - Contato via site';
						break;

					case 'animal':
						$subject = 'Adoção - Contato via site';
						break;

					default:
						$subject = 'Contato via site';
						break;
				}

				$message = $this->helper->renderPhp('email/contact', [
					'title' => 'Contato via site',
					'body' => $_POST['message'],
					'name' => $_POST['name'] ?? '',
					'email' => $_POST['email'],
				]);

				return $this->helper->sendMail($toEmail, $subject, $message);
			}
		}
	}
}
