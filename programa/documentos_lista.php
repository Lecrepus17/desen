<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Documento.php');
    require('models/Usuario.php');
    $doc = new Documento();
    $teste = 1;
    $documentos = $doc->getALL(['usuarios_idusuarios' => $teste]);
    echo $twig->render('documentos_lista.html', [
        'doc' => $documentos,
        ]);



    
