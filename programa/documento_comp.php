<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Compartilhamento.php');

    $iddoc = $_GET['iddoc'] ?? false;
    $idpes = $_GET['idpes'] ?? false;
    $visualizar = $_GET['visualizar'] ?? 0;
    $alterar = $_GET['alterar'] ?? 0;   
    $excluir = $_GET['excluir'] ?? 0;

    $comp = new Compartilhamento();
    $comp = $comp->create(['idDocCom' => $iddoc,'idUserDocCom' => $_SESSION['user'],'idUserCom' => $iddoc, 'visualizar' => $visualizar,'alterar' => $alterar,'excluir' => $excluir,]);
    header('location: documentos_lista.php');
