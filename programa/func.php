<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Documento.php');
    require('models/Compartilhamento.php');
    $pag = $_GET['pag'] ?? false;
    $id = $_GET['view'] ?? false;   
     
        $doc = new Documento();
        $comp = new Compartilhamento();
        $documento = $doc->getById($id);
        $compartilhamento = $comp->getByIdComp($id);


        if($compartilhamento['nivel_per'] >= 3 or $_SESSION['user'] == $documento['usuarios_idusuarios']){
               $comp->delete( $id);
               $doc->delete($id);
               header("location: documentos_$pag.php");
    }else{
        header("location: documentos_$pag.php");
    }





   


