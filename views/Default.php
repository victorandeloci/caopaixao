<?php

require_once(dirname(__DIR__, 1) . '/controllers/Helper.php');
require_once(dirname(__DIR__, 1) . '/models/Default.php');

class DefaultView {

  protected $helper;
  private $model;

  public function __construct() {
    $this->helper = new Helper();
    $this->model = new DefaultModel();
  }

  public function load($view = DEFAULT_VIEW, $contents = null) {
    $path = (__DIR__ . '/' . $view);
    if ($path) {
      $files = scandir($path);
      foreach ($files as $key => $value) {
        if ($value == 'index.html' || $value == 'index.php' || $value == 'default.html' || $value == 'default.php') {
          include_once($path . '/' . $value);
          break;
        }
      }
    }
  }

  public function pathExists($view) {
    return is_dir(__DIR__ . '/' . $view);
  }

  public function checkStatus() {
    echo $this->model->checkConnection();
  }
}
