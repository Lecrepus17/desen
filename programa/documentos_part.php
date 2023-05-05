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
var_dump($compartilhamentos);

foreach ($compartilhamentos as $compartilhamento) {
    echo $compartilhamento['idDocCom'] . "<br>";
}
    foreach ($compartilhamentos as $compartilhamento) {
        $documentos = $doc->getAll(['iddocumentos' => $compartilhamento['idDocCom'], 'OR']);
    }
    
    
    
    echo $twig->render('documentos_lista.html', [
        'doc' => $documentos,
        ]);

    
