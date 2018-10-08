<?php

  include_once 'config.php';

  require 'vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  function enviarEmail($id) {

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPDebug = 3;
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';
    $mail->Username = 'c54431daa56f16';
    $mail->Password = '1cb2286ab3bead';

    $mail->From = "concept@proof.com.br";
    $mail->FromName = "Lucas Buzzo";

    $mail->addAddress("lucas.buzzo@dcomp.sor.ufscar.br", "Lucas Buzzo");

    $mail->isHTML(true);

    $mail->Subject = "Concept Proof";
    $mail->Body = "<html>
      <body>
        <h1>Olá!<h1>
        <p>Selecione a nota que deseja dar para o seu chamado</p>
        <a href='http://127.0.0.1/nota.php?id=".$id."&nota=1'>1</a><br/>
        <a href='http://127.0.0.1/nota.php?id=".$id."&nota=2'>2</a><br/>
        <a href='http://127.0.0.1/nota.php?id=".$id."&nota=3'>3</a><br/>
        <a href='http://127.0.0.1/nota.php?id=".$id."&nota=4'>4</a><br/>
        <a href='http://127.0.0.1/nota.php?id=".$id."&nota=5'>5</a><br/>
      </body>
    </html>";

    if(!$mail->send())
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
        echo "Message has been sent successfully";
    }

  }

  function createChamado() {
    global $pdo;

    try {
      $query = $pdo->query("INSERT INTO `chamado` (`texto`, `cliente`) VALUES ('Apenas mais um teste, para prova de conceito', '1');");
      enviarEmail($pdo->lastInsertId());
    } catch (PDOException $e) {
      error_log($e);
    }
  }

  createChamado();

 ?>
