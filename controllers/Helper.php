<?php

require_once(dirname(__DIR__, 1) . '/views/Console.php');

require_once('Log.php');
require_once('Encryption.php');

class Helper {

  public $log;
  public $encryption;
  public $console;

  public function __construct() {
    $this->log = new Log();
    $this->encryption = new Encryption();
    $this->console = new Console();
  }

  public function createMessage($status, $content = null, $msg = null) {

    $response = [
      'status' => $status,
      'content' => $content,
      'message' => $msg
    ];

    header('Content-Type: application/json; charset=utf-8');
    return json_encode((object) $response);
  }

  public function validateSpam() {
    $allowedDomains = [$_SERVER['SERVER_NAME']];

    $referer = $_SERVER['HTTP_REFERER'];
    $origin = parse_url($referer);
    $domain = $origin['host'];

    $valid = true;

    // just actual host
    if (!in_array($domain, $allowedDomains))
      $valid = false;

    // validate honeypot
    if (!isset($_REQUEST['annon_edhellen_edro_hi_ammen']) || $_REQUEST['annon_edhellen_edro_hi_ammen'] != 'mellon')
      $valid = false;

    return $valid;
  }

  public function renderPhp($template, array $args) {

    $basePath = '';
    if (str_contains($template, '/')) {
      $templateData = explode('/', $template);
      $template = $templateData[count($templateData) - 1];
      $templateData[count($templateData) - 1] = '';

      $basePath = implode('/', $templateData);
    }

    $path = dirname(__DIR__, 1) . '/templates/' . $basePath;
    if ($path) {

      $files = scandir($path);
      foreach ($files as $key => $value) {
        if (str_contains($value, $template)) {

          ob_start();
          include_once($path . $value);
          $content = ob_get_contents();
          ob_end_clean();

          return $content;
        }
      }
    }
  }

  public function sendMail($email, $subject, $message) {
    $server = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $to = $email;
    $from = 'dev@caopaixao.org.br';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $sent = (bool) mail($to, $subject, $message, $headers);

    return $this->createMessage($sent);
  }
}
