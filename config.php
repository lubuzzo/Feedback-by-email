<?php

  include 'env.php';

  try {
    $pdo = new PDO($driver . ":host=" . $host . ";dbname=" . $db, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    $pdo->exec("set names utf8");
    $pdo->exec("SET character_set_connection=utf8");
//    $pdo->exec("SET character_set_cliente=utf8");
    $pdo->exec("SET character_set_results=utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ini_set('precision', 8);
  }
  catch (PDOException $e) {
      die('Error: unable to connect to database -> ' . $e->getMessage());
  }
