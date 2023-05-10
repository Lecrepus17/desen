<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Documento.php');

    $id = $_POST['view'] ?? $_GET['view'] ?? false;




// renderiza tela
$doc = new Documento();
$documento = $doc->getById($id);

echo $twig->render('documentos.html', [
    $documento => 'documento',
      ]);
    die;
   