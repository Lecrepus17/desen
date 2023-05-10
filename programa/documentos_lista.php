<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Documento.php');
    require('models/Usuario.php');

    
 
    $doc = new Documento();
    $documentos = $doc->getALL(['usuarios_idusuarios' => $_SESSION['user']]);
    echo $twig->render('documentos_lista.html', [
        'doc' => $documentos,
        ]);

    
