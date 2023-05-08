<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Compartilhamento.php');
    require('models/Usuario.php');
    require('models/Documento.php');
    $com = new Compartilhamento();
    $doc = new Documento();
    $compartilhamentos = $com->getIdDoc(['idUserCom' => $_SESSION['user']]);

    $documentos = $doc->getALL();


    
    
    echo $twig->render('documentos_part.html', [
        'doc' => $documentos,
        'com' => $compartilhamentos
        ]);

    
