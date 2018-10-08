<?php

  include_once 'config.php';

  function atribuirNota($id, $nota) {
    global $pdo;

    try {
      $query = $pdo->query("UPDATE `chamado` SET `nota`='".$nota."' WHERE `id` = " . $id);
    } catch (PDOException $e) {
      error_log($e);
    }

  }

  if (isset($_GET['id']) && (!(empty($_GET['id']))) && (isset($_GET['id'])) && (!(empty($_GET['id'])))) {
    atribuirNota($_GET['id'], $_GET['nota']);
  }

 ?>
