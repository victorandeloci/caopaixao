<?php

require_once(dirname(__DIR__, 1) . '/config.php');
require_once(dirname(__DIR__, 1) . '/controllers/Helper.php');

abstract class Item {

  protected $helper;
  protected $conn;

  protected function __construct() {

    $this->helper = new Helper();
    try {
      $this->conn = new PDO('mysql:dbname=' . CP_DB_NAME . '; host=localhost', CP_DB_USER, CP_DB_PASSWORD);

      if ($this->conn) {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      }

    } catch (PDOException $e) {
      $msg = $e->getMessage();
      $this->helper->log->generateLog($msg);
    }

  }
}
