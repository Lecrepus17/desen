<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Documento.php');
    require('func/search.php');


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $resultado = search($_POST['pesquisa']);
        echo $twig->render('documentos_lista.html', [
            'doc' => $resultado,
            ]);
    }else{
 
        $doc = new Documento();
        $documentos = $doc->getALL(['usuarios_idusuarios' => $_SESSION['user']]);
        echo $twig->render('documentos_lista.html', [
            'doc' => $documentos,
            ]);
    }






    
