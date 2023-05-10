<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Documento.php');
    require('models/Compartilhamento.php');

    $id = $_GET['view'] ?? false;    
        $comp = new Compartilhamento();
        $comp->delete( $id);
        $doc = new Documento();
        $doc->delete($id);
            header('location: documentos_lista.php');
        
