<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Compartilhamento.php');
    require('models/Usuario.php');


    $id = $_GET['id'] ?? false;    
    $iddoc = $_GET['iddoc'] ?? false;
    $tipo = $_GET['tipo'] ?? false;
    if($tipo == 'visualizar'){
    
        $doc = new Compartilhamento();
        $doc->create([
            'iddocumentos' => $iddoc,
            'idUserDocCom' => $_SESSION['user'],
            'idUserCom' => $id,
            'nivel_per' => '1',
        ]);
            header('location: documentos_lista.php');
    }elseif($tipo == 'alterar'){


      
        $doc = new Compartilhamento();
        $doc->create([
            'iddocumentos' => $iddoc,
            'idUserDocCom' => $_SESSION['user'],
            'idUserCom' => $id,
            'nivel_per' => '2',
        ]);
        header('location: documentos_lista.php');
    }elseif($tipo == 'excluir'){
     
          
        $doc = new Compartilhamento();
        $doc->create([
            'iddocumentos' => $iddoc,
            'idUserDocCom' => $_SESSION['user'],
            'idUserCom' => $id,
            'nivel_per' => '3',
        ]);
            header('location: documentos_lista.php');
        }
else{
    $user = new Usuario();
    $usuarios = $user->getALL();

    
    echo $twig->render('usuarios.html', [
        'user' => $usuarios,
        'iddoc' => $iddoc
        ]);

}
