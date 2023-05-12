<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Compartilhamento.php');

    $iddoc = $_GET['iddoc'] ?? false;
    $idpes = $_GET['idpes'] ?? false;
    $nivel = $_GET['nivel'] ?? 0;

    $comp = new Compartilhamento();
    $comp = $comp->create(['idDocCom' => $iddoc,'idUserDocCom' => $_SESSION['user'],'idUserCom' => $iddoc, 'nivel_per' => $visualizar,]);
    header('location: documentos_lista.php');
